<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-18 12:06:40
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 15:26:28
 */


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\User;
use App\Models\Project;
use App\Models\Investment;
use Yajra\Datatables\Facades\Datatables;

use App\Http\Controllers\Controller;
use App\Mail\Common;
use App\Models\ProjectDetails;

use Carbon\Carbon;
use Mail;
use Auth;
use DB;
class ProjectController extends Controller
{
	public function __construct()
    {
        
    }

    public function projectEndMail(Request $request)
    {
        $yesterdayDate = date("Y-m-d", strtotime('-1 days'));
        $threedayDate = date("Y-m-d", strtotime('3 days'));
        // dd($threedayDate);
        $ExpiredProjects = Project::where('end', '>=', $yesterdayDate." 00:00:00")
                                ->where('end', '<=', $yesterdayDate." 23:59:59")
                                ->get();
        $ExpiredProjectsThreeDaysBefore = Project::selectRaw('projects.*,sum(investments.amount)/projects.budget*100 as total,SUM(investments.amount) As total_amount')
                                                ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
                                                ->where('projects.status', 1)
                                                ->where('projects.end', '=', $threedayDate." 00:00:00")
                                                ->groupBy('projects.id')
                                                // ->where('projects.end', '=', $threedayDate." 23:59:59")
                                                ->get();
        // dd($ExpiredProjectsThreeDaysBefore);
        // $project = Project::select('projects.*', 
        //                     DB::raw('SUM(investments.amount)/projects.budget As total'), 
        //                     DB::raw('SUM(investments.amount) As x'),
        //                     DB::raw('projects.budget As y'))
        //             ->where('projects.status', 1)
        //             // ->where('investments.status', 1)
        //             ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
        //             ->groupBy('projects.id')
        //             ->orderBy('projects.starting_status', 'asc')
        //             ->orderby('total','desc'); 
                                //  dd($ExpiredProjectsThreeDaysBefore);
                                //  dd($ExpiredProjects);
        
        
        foreach ($ExpiredProjectsThreeDaysBefore as $ExpiredProject) {
            if($ExpiredProject->total == 100){
                $supporters = Investment::where('project_id', '=', $ExpiredProject->id)->get();
                // dd($ExpiredProject);
                foreach ($supporters as $supporter){
                    $User = User::find($supporter->user_id);
                    $emailData = [
                        'name' => $User->first_name.' '.$User->last_name,
                        'register_token' =>'',
                        'subject' => '【Crofun】支援プロジェクトの経過報告',
                        'from_email' => 'noreply@crofun.jp',
                        'from_name' => 'Crofun',
                        'template' => 'user.email.34',
                        'root'     => $request->root(),
                        'email'     => $User->email,
                        'project_name' =>$ExpiredProject->title, 
                        'total' => $ExpiredProject->total,
                        'total_amount' => $ExpiredProject->total_amount,
                        ];
                        Mail::to($User->email)
                            ->send(new Common($emailData));
                }
            }else{
                //send mail to supporters
                $supporters = Investment::where('project_id', '=', $ExpiredProject->id)->get();
                // dd($ExpiredProject);
                foreach ($supporters as $supporter){
                    $User = User::find($supporter->user_id);
                    // dd($ExpiredProject);
                    $emailData = [
                        'name' => $User->first_name.' '.$User->last_name,
                        'register_token' =>'',
                        'subject' => '【Crofun】支援プロジェクトの経過報告',
                        'from_email' => 'noreply@crofun.jp',
                        'from_name' => 'Crofun',
                        'template' => 'user.email.35',
                        'root'     => $request->root(),
                        'email'     => $User->email,
                        'project_name' =>$ExpiredProject->title,
                        'total' => $ExpiredProject->total,
                        'total_amount' => $ExpiredProject->total_amount,
                        ];
                        Mail::to($User->email)
                            ->send(new Common($emailData));
                }
            }
        }

        foreach ($ExpiredProjects as $ExpiredProject) {
            //send mail to admin
                $emailData = [
                    'name' => '',
                    'register_token' =>'',
                    'subject' => '【Crofun管理者用】期間終了プロジェクトの通知',
                    'from_email' => 'noreply@crofun.jp',
                    'from_name' => 'Crofun',
                    'template' => 'user.email.25',
                    'root'     => $request->root(),
                    'email'     => 'administrator@crofun.jp',
                    'project_name' =>$ExpiredProject->title,
                    'project_url' => 'http://crofun.jp/project-details/'.$ExpiredProject->id
                    
                    ];
                    Mail::to('administrator@crofun.jp')
                        ->send(new Common($emailData));

            //send mail to supporters
            $supporters = Investment::where('project_id', '=', $ExpiredProject->id)->get();
            foreach ($supporters as $supporter){
                $User = User::find($supporter->user_id);
                $emailData = [
                    'name' => $User->first_name.' '.$User->last_name,
                    'register_token' =>'',
                    'subject' => '【Crofun】支援プロジェクトの期間終了のお知らせ',
                    'from_email' => 'noreply@crofun.jp',
                    'from_name' => 'Crofun',
                    'template' => 'user.email.24',
                    'root'     => $request->root(),
                    'email'     => $User->email,
                    'project_name' =>$ExpiredProject->title
                    
                    ];
                    Mail::to($User->email)
                        ->send(new Common($emailData));
            }

            //send mail to Owner
            $Owner = User::find($ExpiredProject->user_id);
            $emailData = [
                'name' => $Owner->first_name.' '.$Owner->last_name,
                'register_token' =>'',
                'subject' => '【Crofun】プロジェクト期間終了のお知らせ',
                'from_email' => 'noreply@crofun.jp',
                'from_name' => 'Crofun',
                'template' => 'user.email.23',
                'root'     => $request->root(),
                'email'     => $Owner->email,
                'project_name' =>$ExpiredProject->title,
                'project_url' => 'http://crofun.jp/project-details/'.$ExpiredProject->id
                
                ];
                Mail::to($Owner->email)
                    ->send(new Common($emailData));
                
        }
               
    }

    public function projectList(Request $request)
    {
    	$data['title'] = "Project List";
        $data['user_id'] = 0;
        $data['category_id'] = 0;
        $data['status'] = null;
        if(!empty($request->user_id)){
            $data['user_id'] = $request->user_id;
        }
        if(!empty($request->category_id)){
            $data['category_id'] = $request->category_id;
        }
        if($request->status !== null){
            $data['status'] = $request->status;
        }
    	return view('admin.project.list', $data);
    }

    public function data(Request $request)
    {
    	$query = Project::query();
        if(!empty($request->user_id)){
            $query->where('user_id', $request->user_id);
        }
        if(!empty($request->category_id)){
            $query->where('category_id', $request->category_id);
        }
        if($request->status !== null){
            $query->where('status', $request->status);
        }
        $Project = $query->get();

        return Datatables::of($Project)
        ->editColumn('created_at', function($result){
            return str_limit($result->created_at,$limit=11,$end='');
        })
        // ->editColumn('created_at', '{!! date("j M Y ", strtotime($created_at)) !!}')
        //->editColumn('end', '{!! date("j M Y h:i A", strtotime($end)) !!}')
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-info">Pending</span>';
            }
            else if ($result->status==1) {
                return '<span class="text-success">Active</span>';
            }
            else if ($result->status==2) {
                return '<span class="text-primary">Completed</span>';
            }
            else if ($result->status==3) {
                return '<span class="text-warning">Inactive</span>';
            }
            else if ($result->status==4) {
                return '<span class="text-danger">Rejected</span>';
            }
            else{
                return '<span class="text-default">Unknown</span>';
            }
        })
        ->addColumn('created_by', function ($result) {
            return '<a href="'.route('admin-user-details',['id'=>$result->user_id]).'">'. $result->user->first_name.' '.$result->user->last_name.'</a> <button id="msg_send_btn" onclick="selectvalue(this,'.$result->user_id.')" class="p-2 text-white btn btn-md btn-block w6-14 btn-default" data-user_id="'.$result->user_id.'" data-project_username="'.$result->user->first_name.' '.$result->user->last_name.'" style="cursor:pointer; color:#fff;background-color:gray !important;font-size:12px"> <span style="color:#fff !important;">
            <i class="fa fa-envelope"></i> </span>メッセージを送る
        </button>';
        })
        
        /*->addColumn('category', function ($result) {
            return $result->category->name;
        })*/
        ->addColumn('total_point', function ($result) {
            if ($result->status!=0) {
                return  '<a href="'.route('admin-project-donate',['id'=>$result->id]).'">'.$result->investment->sum('point').'</a>';
            }
            // return $result->reward->sum('amount');
        })
        ->addColumn('total_invested', function ($result) {
            if ($result->status!=0) {
                return  '<a href="'.route('admin-project-donate',['id'=>$result->id]).'">'.$result->investment->count().'</a>';
            }
            // return $result->investment->count();
        })
       ->addColumn('total_invested_amount', function ($result) {
            if ($result->status!=0) {
                return  '<a href="'.route('admin-project-donate',['id'=>$result->id]).'">'.$result->investment->sum('amount').'</a>';
            }
        })
        ->addColumn('title', function ($result) {
            return '<a href="'.route('admin-project-details',['id'=>$result->id]).'">'.$result->title.'</a>';
        })
        ->addColumn('action', function ($result) {
            $returnData = '';
            if ($result->status==0) {
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>1]).'" class="btn btn-xs btn-success inline">Approve</a> '; //last_interest_at = current date time
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>4]).'" class="btn btn-xs btn-danger inline">Reject</a> ';
            }
            else if ($result->status==1) {
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>3]).'" class="btn btn-xs btn-warning inline">Hold</a> ';
                // $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>4]).'" class="btn btn-xs btn-danger inline">Reject</a> ';
            }
            else if ($result->status==3) {
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>1]).'" class="btn btn-xs btn-success inline">Active</a> ';
                // $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>4]).'" class="btn btn-xs btn-danger inline">Reject</a> ';
            }
            else{
                //
            }

            // $returnData .= '<a href="'.route('admin-project-delete', ['id' => $result->id]).'" class="btn btn-xs btn-danger delete-sure">Delete</a>';

            return $returnData;
            
        })
        ->rawColumns(['title', 'created_at', 'created_by', 'action', 'status','total_point','total_invested_amount','total_invested'])
        ->make(true);
    }

    public function projectActiveList(Request $request)
    {
    	$data['title'] = "プロジェクト一覧";
        $data['user_id'] = 0;
        $data['category_id'] = 0;
        $data['status'] = null;
        if(!empty($request->user_id)){
            $data['user_id'] = $request->user_id;
        }
        if(!empty($request->category_id)){
            $data['category_id'] = $request->category_id;
        }
        if($request->status !== null){
            $data['status'] = $request->status;
        }
    	return view('admin.project.active_page', $data);
    }

    public function activeData(Request $request)
    {
    	$query = Project::query();
        if(!empty($request->user_id)){
            $query->where('user_id', $request->user_id);
        }
        if(!empty($request->category_id)){
            $query->where('category_id', $request->category_id);
        }
        if($request->status !== null){
            $query->where('status', $request->status);
        }
        // $s = $query->where('status',1)->get();
        $Project = $query->whereIn('status',[1, 3])->get();
// dd($Project);
        
        return Datatables::of($Project)

        ->editColumn('created_at', function($result){
            return  str_limit($result->start, $limit = 11, $end = '');
        })
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-info">Pending</span>';
            }
            else if ($result->status==1) {
                return '<span class="text-success">公開</span>';
            }
            else if ($result->status==2) {
                return '<span class="text-primary">Completed</span>';
            }
            else if ($result->status==3) {
                return '<span class="text-warning">非公開</span>';
            }
            else if ($result->status==4) {
                return '<span class="text-danger">Rejected</span>';
            }
            else{
                return '<span class="text-default">Unknown</span>';
            }
        })
        ->addColumn('created_by', function ($result) {
            return '<a href="'.route('admin-user-details',['id'=>$result->user_id]).'">'. $result->user->first_name.' '.$result->user->last_name.'</a><button id="msg_send_btn" onclick="selectvalue(this,'.$result->user_id.')" class="p-2 text-white btn btn-md btn-block w6-14 btn-default" data-user_id="'.$result->user_id.'" data-project_username="'.$result->user->first_name.' '.$result->user->last_name.'" style="cursor:pointer; color:#fff;background-color:gray !important;font-size:12px"> <span style="color:#fff !important;">
                        <i class="fa fa-envelope"></i> </span>メッセージを送る
                    </button>';
        })
        ->addColumn('total_point', function ($result) {
                return  '<div class="text-center"><a href="'.route('admin-project-donate',['id'=>$result->id]).'">'.$result->investment->sum('point').'</a></div>';
        })
        ->addColumn('total_invested', function ($result) {
                return  '<div class="text-center"><a href="'.route('admin-project-donate',['id'=>$result->id]).'">'.$result->investment->count().'</a></div>';
        })
       ->addColumn('total_invested_amount', function ($result) {
                return  '<div class="text-center"><a href="'.route('admin-project-donate',['id'=>$result->id]).'">'.$result->investment->sum('amount').'</a></div>';
        })
        ->addColumn('title', function ($result) {
            return '<a href="'.route('admin-project-details',['id'=>$result->id]).'">'.$result->title.'</a>';
        })
        ->addColumn('action', function ($result) {
            $returnData = '';
            if ($result->status==0) {
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>1]).'" class="btn btn-xs btn-success inline">Approve</a> '; //last_interest_at = current date time
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>4]).'" class="btn btn-xs btn-danger inline">Reject</a> ';
            }
            else if ($result->status==1) {
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>3]).'" class="btn btn-xs btn-warning inline" style="color:#fff">非公開にする</a> ';
            }
            else if ($result->status==3) {
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>1]).'" class="btn btn-xs btn-success inline">公開にする</a> ';
            }
            else{
                //
            }
            return $returnData;
        })
        ->rawColumns(['title', 'created_at', 'created_by', 'action', 'status','total_point','total_invested_amount','total_invested'])
        ->make(true);
    }

    public function projectPendingList(Request $request)
    {
    	$data['title'] = "申請中プロジェクト一覧";
        $data['user_id'] = 0;
        $data['category_id'] = 0;
        $data['status'] = null;
        if(!empty($request->user_id)){
            $data['user_id'] = $request->user_id;
        }
        if(!empty($request->category_id)){
            $data['category_id'] = $request->category_id;
        }
        if($request->status !== null){
            $data['status'] = $request->status;
        }
    	return view('admin.project.pendingList', $data);
    }

    public function pendingData(Request $request)
    {
    	$query = Project::where('status',0)->orWhere('status', 4);
        if(!empty($request->user_id)){
            $query->where('user_id', $request->user_id);
        }
        if(!empty($request->category_id)){
            $query->where('category_id', $request->category_id);
        }
        if($request->status !== null){
            $query->where('status', $request->status);
        }
        $Project = $query->get();

    	
        
        return Datatables::of($Project)
        ->editColumn('created_at', function($result){
            return  str_limit($result->created_at, $limit = 11, $end = '');
        })
        // ->editColumn('created_at', '{!! date("j M Y ", strtotime($created_at)) !!}')
        //->editColumn('end', '{!! date("j M Y h:i A", strtotime($end)) !!}')
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-info">申請中</span>';
            }
            else if ($result->status==1) {
                return '<span class="text-success">Approve</span>';
            }
            else if ($result->status==2) {
                return '<span class="text-primary">Completed</span>';
            }
            else if ($result->status==3) {
                return '<span class="text-warning">Hold</span>';
            }
            else if ($result->status==4) {
                return '<span class="text-danger">拒否されました</span>';
            }
            else{
                return '<span class="text-default">Unknown</span>';
            }
        })
        ->addColumn('created_by', function ($result) {
            return '<a href="'.route('admin-user-details',['id'=>$result->user_id]).'">'. $result->user->first_name.' '.$result->user->last_name.'</a> <button id="msg_send_btn" onclick="selectvalue(this,'.$result->user_id.')" class="p-2 text-white btn btn-md btn-block w6-14 btn-default" data-user_id="'.$result->user_id.'" data-project_username="'.$result->user->first_name.' '.$result->user->last_name.'" style="cursor:pointer; color:#fff;background-color:gray !important;font-size:12px"> <span style="color:#fff !important;">
                                    <i class="fa fa-envelope"></i> </span>メッセージを送る
                                </button>';
        })

        ->addColumn('total_point', function ($result) {
            if ($result->status!=0) {
                return  '<div class="text-center"><a href="'.route('admin-project-donate',['id'=>$result->id]).'">'.$result->investment->sum('point').'</a></div>';
            }
        })
        ->addColumn('total_invested', function ($result) {
            if ($result->status!=0) {
                return  '<div class="text-center"><a href="'.route('admin-project-donate',['id'=>$result->id]).'">'.$result->investment->count().'</a></div>';
            }
        })
       ->addColumn('total_invested_amount', function ($result) {
            if ($result->status!=0) {
                return  '<div class="text-center"><a href="'.route('admin-project-donate',['id'=>$result->id]).'">'.$result->investment->sum('amount').'</a></div>';
            }
        })
        ->addColumn('title', function ($result) {
            return '<a href="'.route('admin-project-details',['id'=>$result->id]).'">'.$result->title.'</a>';
        })
        ->addColumn('action', function ($result) {
            $returnData = '';
            if ($result->status==0) {
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>1]).'" class="btn btn-xs btn-success inline">承認する</a> '; //last_interest_at = current date time
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>4]).'" class="btn btn-xs btn-danger inline">拒否する</a> ';
            }
            else if ($result->status==1) {
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>3]).'" class="btn btn-xs btn-warning inline">Hold</a> ';
            }
            else if ($result->status==3) {
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>1]).'" class="btn btn-xs btn-success inline">Active</a> ';
            }
            else{
            }

            return $returnData;
            
        })
        ->rawColumns(['title', 'created_at', 'created_by', 'action', 'status'])
        ->make(true);
    }

    public function statusChange(Request $request)
    {
        $Project = Project::find($request->id);
        $Project->status = $request->status;
        $Project->save();
        $Owner = User::find($Project->user_id);
        //send mail to project owner
        if($Project->status == 4){
             
             $emailData = [
                'name' =>  $Owner->first_name.' '.$Owner->last_name,
                'register_token' =>'',
                'subject' => '【Crofun】プロジェクト選考結果',
                'from_email' => 'noreply@crofun.jp',
                'from_name' => 'Crofun',
                'template' => 'user.email.16',
                'root'     => $request->root(),
                'email'     => $Owner->email,
       
                ];
        
                Mail::to($Owner->email)
                    ->send(new Common($emailData));
        }

        //send mail to project owner
        if($Project->status == 1){
            $Owner = User::find($Project->user_id);
            $emailData = [
               'name' => $Owner->first_name.' '.$Owner->last_name,
               'register_token' =>'',
               'subject' => '【Crofun】プロジェクト選考結果',
               'from_email' => 'noreply@crofun.jp',
               'from_name' => 'Crofun',
               'template' => 'user.email.15',
               'root'     => $request->root(),
               'email'     => $Owner->email,
               'project_name'  =>$Project->title ,
               'project_summary'  =>$Project->description ,
               'project_url' => 'http://crofun.jp/project-details/'.$request->id,
      
               ];
       
               Mail::to($Owner->email)
                   ->send(new Common($emailData));
       }
        return redirect()->back()->with('success_message', 'status updated');
    }

    public function delete(Request $request)
    {
        Project::find($request->id)->delete();
        return redirect()->back()->with('success_message', 'Project deleted successfully');
    }

    public function details(Request $request)
    {
        $data['project'] = Project::find($request->id);
        $data['supports'] = Investment::where('project_id', $request->id)->where('status', true)->count();
        $data['details']=ProjectDetails::where('project_id', $request->id)->with('project')->get();
        return view('admin.project.details', $data);
    }

    public function donate(Request $request)
    {
        $data['title'] = 'Project Donation List';
        $data['id'] = $request->id;
        return view('admin.project.donate_details', $data);
    }

    public function dataDonate(Request $request)
    {
        $data = Investment::where('project_id', $request->id)->whereHas('project', function($q){
            $q->where('status', true);
        });
        $data = Investment::where('project_id', $request->id)->with('project');
        $Project = $data->get();

        return Datatables::of($Project)
        ->editColumn('created_at', function($result){
            return  str_limit($result->created_at, $limit = 11, $end = '');
        })
        ->addColumn('amount', function ($result) {
            return  '<div class="text-center">'.$result->amount.'</div>';
        })
        ->addColumn('return_name', function ($result) {
            return  $result->rewardname->reward->is_other;
        })
        ->addColumn('crofun_points', function ($result) {
            return '<div class="text-center">'.$result->point .'ポイント </div>';
        })
       ->addColumn('supporter_name', function ($result) {
            return '<a href="'.route('admin-user-details',['id'=>$result->user_id]).'">'. $result->user->first_name.' '.$result->user->last_name.'</a>
                    <button id="msg_send_btn" onclick="selectvalue(this,'.$result->user_id.')" class="p-2 text-white btn btn-md btn-block w6-14 btn-default" data-user_id="'.$result->user_id.'" data-project_username="'.$result->user->first_name.' '.$result->user->last_name.'" style="cursor:pointer; color:#fff;background-color:gray !important;font-size:14px"> <span style="color:#fff !important;">
                        <i class="fa fa-envelope"></i> </span>メッセージを送る
                    </button>';

       
            // return $result->user->first_name .''.$result->user->last_name;
        })
    //    ->addColumn('message', function ($result) {
    //         return '<button class="p-2 text-white btn btn-md btn-block font-weight-bold msg_send_btn btn-default" data-user_id="'.$result->user_id.'" data-project_username="'.$project->user->first_name.' '.$project->user->last_name.'" style="cursor:pointer; color:#fff;"> <span style="color:#fff !important;">
    //                     <i class="fa fa-envelope"></i> </span>メッセージを送る
    //                 </button>';
    //         // return $result->user->first_name .''.$result->user->last_name;
    //     })
        ->rawColumns([ 'created_at','amount','return_name','crofun_points','supporter_name'])
        ->make(true);
    }
}