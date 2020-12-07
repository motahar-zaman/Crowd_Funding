<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-16 13:37:36
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-16 13:37:41
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProjectCategory;
use App\Models\Project;
use App\Models\Reward;
use App\Models\ProjectDetails;
use App\Models\FavouriteProject;
use App\Models\Message;
use App\Models\OrderDetail;
use App\User;

use Carbon\Carbon;
use App\Models\Investment;
use App\Mail\Common;

use Mail;
use Auth;
use Image;
use DateTime;

class ProjectController extends Controller
{
	public function __construct()
    {

    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
        $projects = Project::where('user_id', Auth::user()->id)->orderBy('created_at','dsec')->get();
        $data['projects'] = $projects;
    	return view('user.my_project_list', $data);
    }

    public function preNew()
    {
    	return view('user.pre_new_project');
    }

    public function add(Request $request)
    {
        $finish = false;
        if($request->finish){
            $finish = true;
        }
        $data['finish'] = $finish;
        $data['category'] = ProjectCategory::where('status', 1)->get();
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
    	return view('user.new_project', $data);
    }

    public function addAction(Request $request)
    {
        $Project = new Project();
        $Project->title = $request->title;

        $name = '';

        if ($request->hasFile('featured_image')) {
            $extension = $request->featured_image->extension();
            $name = Auth::user()->id.time().rand(1000,9999).'.'.$extension;
            $fullPath = 'uploads/projects/'.$name;
            $fullPathOriginal = 'uploads/projects/original/'.$name;
            $img = Image::make($request->featured_image);
            $img->save($fullPath);
        }

        $Project->featured_image = $name;
        $Project->user_id = Auth::user()->id;
        $Project->category_id = $request->category;
        $Project->sub_category = $request->sub_category;
        $Project->purpose = $request->purpose;
        $Project->start = $request->from;
        $Project->end = $request->to;
        $Project->budget = $request->budget;
        $Project->budget_usage_breakdown = $request->budget_usage_breakdown;
        $Project->beneficiary = $request->beneficiary;
        $Project->description = $request->description;
        $Project->status = 0;
        $Project->save();

        for($i=0; $i<count($request->amount);$i++) {
            $Reward = new Reward();
            $Reward->project_id = $Project->id;
            $Reward->amount = $request->amount[$i];
            $Reward->is_crofun_point = 0;
            if(isset($request->is_crofun_point[$i])){
                $Reward->is_crofun_point = $request->is_crofun_point[$i];
            }
            // $Reward->crofun_amount = $request->crofun_amount[$i];
            $Reward->is_other = 0;
            if(isset($request->is_other[$i])){
                $Reward->is_other = $request->is_other[$i];
            }

            $Reward->other_description = $request->other_description[$i];
            if ($request->hasFile('other_file.'.$i)) {
                $extension = $request->other_file[$i]->extension();
                $name = time().rand(1000,9999).'.'.$extension;
                $path = $request->other_file[$i]->storeAs('projects', $name);

                $Reward->other_file = $name;
            }
            $Reward->save();
        }

        for($i=0; $i<count($request->details_title);$i++) {
            if(!empty($request->details_title[$i]) && !empty($request->details_description[$i])){
                $ProjectDetails = new ProjectDetails();
                $ProjectDetails->project_id = $Project->id;
                $ProjectDetails->details_title = $request->details_title[$i];
                $ProjectDetails->details_description = $request->details_description[$i];

                if ($request->hasFile('draft_file.'.$i)) {
                    $extension = $request->draft_file[$i]->extension();
                    $name = time().rand(1000,9999).'.'.$extension;
                    $path = $request->draft_file[$i]->storeAs('projects', $name);
                    $ProjectDetails->draft_file = $name;
                }

                $ProjectDetails->save();
            }

        }

         //send mail to admin
         $Owner = User::find($Project->user_id);
         $emailData = [
             'name' => $Owner->first_name.' '.$Owner->last_name,
             'register_token' =>'',
             'subject' => '【Crofun管理者用】新規プロジェクト申請の通知',
             'from_email' => 'noreply@crofun.jp',
             'from_name' => 'Crofun',
             'template' => 'user.email.14',
             'root'     => $request->root(),
             'email'     => 'administrator@crofun.jp',
             'person_name'  =>$Owner->first_name.' '.$Owner->last_name,
             'project_name'  =>$Project->title ,
             'project_application_date'  =>$Project->created_at,
             'project_url'  => 'http://crofun.jp/admin/project/details/'.$Project->id,
             ];
     
             Mail::to('administrator@crofun.jp')
                 ->send(new Common($emailData));
         
          //send mail to Project owner
          $emailData = [
             'name' => $Owner->first_name.' '.$Owner->last_name,
             'register_token' =>'',
             'subject' => '【Crofun】プロジェクト申請を受け付けました',
             'from_email' => 'noreply@crofun.jp',
             'from_name' => 'Crofun',
             'template' => 'user.email.13',
             'root'     => $request->root(),
             'email'     => $Owner->email,
     
             ];
     
             Mail::to($Owner->email)
                 ->send(new Common($emailData));

        return redirect()->to(route('user-project-add', ['finish' => true]));
    }

    public function edit(Request $request)
    {
        $finish = false;
        if($request->finish){
            $finish = true;
        }
        $data['finish'] = $finish;
        $data['category'] = ProjectCategory::where('status', 1)->get();
        $data['project'] = Project::where('id', $request->id)->with('details')->first();
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
    	return view('user.edit_project', $data);
    }

    public function editAction(Request $request)
    {
        $Project = Project::find($request->id);
        for($i=0; $i<count($request->details_title);$i++) {
            if(!empty($request->details_title[$i]) && !empty($request->details_description[$i])){
                $ProjectDetails = new ProjectDetails();
                $ProjectDetails->project_id = $Project->id;
                $ProjectDetails->details_title = $request->details_title[$i];
                $ProjectDetails->details_description = $request->details_description[$i];

                if ($request->hasFile('draft_file.'.$i)) {
                    $extension = $request->draft_file[$i]->extension();
                    $name = time().rand(1000,9999).'.'.$extension;
                    $path = $request->draft_file[$i]->storeAs('projects', $name);

                    $ProjectDetails->draft_file = $name;
                }

                $ProjectDetails->save();
            }

        }

         //send mail to admin
        $Owner = User::find($Project->user_id);
        $emailData = [
            'name' => $Owner->first_name.' '.$Owner->last_name,
            'register_token' =>'',
            'subject' => '【Crofun管理者用】プロジェクト編集の通知',
            'from_email' => 'noreply@crofun.jp',
            'from_name' => 'Crofun',
            'template' => 'user.email.32',
            'root'     => $request->root(),
            'email'     => 'administrator@crofun.jp',
            'person_name'  =>$Owner->first_name.' '.$Owner->last_name,
            'project_name'  =>$Project->title ,
            'project_application_date'  =>$Project->created_at,
            'project_url'  => 'http://crofun.jp/admin/project/details/'.$Project->id,
         ];

         Mail::to('administrator@crofun.jp')
             ->send(new Common($emailData));

        return redirect()->to(route('user-project-edit', [ 'id' => $request->id,'finish' => true]));
    }

    public function addFavourite(Request $request)
    {
        $id = $request->id;
        $check = FavouriteProject::where('project_id', $id)->where('user_id', Auth::user()->id)->first();
        if($check) return redirect()->back();
        $FavouriteProject = new FavouriteProject();
        $FavouriteProject->user_id = Auth::user()->id;
        $FavouriteProject->project_id = $id;
        $FavouriteProject->save();
        return redirect()->back();
    }

    public function favouriteList(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
        $data['projects'] = FavouriteProject::where('status', 1)
                            ->whereHas('project', function($q){
                                    $q->where('end', '>=', Carbon::now()->subDays(365)->toDateTimeString());
                            })
                            ->where('user_id', Auth::user()->id)
                            ->orderBy('created_at','dsec')
                            ->get();
        return view('user.favourite_project_list', $data);
    }

    public function removeFavourite(Request $request)
    {
        $id = $request->id;
        FavouriteProject::where('project_id', $id)->where('user_id', Auth::user()->id)->delete();
        return redirect()->back();
    }

    public function details(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
        $data['project'] = Project::find($request->id);
        $data['supports'] = Investment::where('project_id', $request->id)->where('status', true)->count();
        $data['details']=ProjectDetails::where('project_id', $request->id)->with('project')->get();
        return view('user.my_project_details', $data);
    }

    public function payment(Request $request)
    {
    }
}
