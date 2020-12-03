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
use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;

use App\Models\Withdrawal;
use App\Models\Profile;
use App\Mail\Common;

use Mail;
use Auth;

class UserController extends Controller
{
	public function __construct()
    {
        
    }

    public function index()
    {
    	$data['title'] = "ユーザ一覧 ";
    	return view('admin.user.list', $data);
    }

    public function data(Request $request)
    {
    	$User = User::get();

    	// dd($User[0]->createdBy->name);

        return Datatables::of($User)

        ->editColumn('created_at', function($result){
            return str_limit($result->created_at, $limit=11, $end='');
        })
        ->editColumn('first_name', function($result){
            return '<a href="'.route('admin-user-details', ['id' => $result->id]).'" class="" >'.$result->first_name.' '.$result->last_name.'</a> ';
        })
        // ->editColumn('last_name', function($result){
        //     return '<a href="'.route('admin-user-details', ['id' => $result->id]).'" class="" >'.$result->last_name.'</a> ';
        // })

        // ->editColumn('created_at', '{!! date("j M Y h:i A", strtotime($created_at)) !!}')
        ->editColumn('last_login_date', '{!! date("j M Y h:i A", strtotime($last_login_date)) !!}')
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-danger">無効</span>';
            }
            else{
                return '<span class="text-success">有効</span>';
            }
        })

        ->addColumn('cancel_request', function ($result) {
            $Withdrawal = Withdrawal::where('user_id', $result->id)->first();
            if(!empty($Withdrawal)){
                // return '<a href="#" data-remote="'.route('admin-cancel-requests', ['id' => $result->id]).'" data="'.$Withdrawal.'" class="btn btn-link" data-toggle="modal" data-target="#cancelRequestModal">View Request</a> ';
                return '<a href="#"  onclick="selectvalue(this,'.$Withdrawal->id.')" class=" btn-link" >申請理由</a> ';
            }
        })
        ->editColumn('is_email_verified', function ($result) {
            if ($result->is_email_verified==0) {
                return '<span class="text-danger">No</span>';
            }
            else{
                return '<span class="text-success">Yes</span>';
            }
        })
        ->addColumn('total_projects', function ($result) {
            return '<div class="text-center"><a href="'.route('admin-project-list', ['user_id' => $result->id]).'" class="btn btn-link text-center">'.$result->projects->count().'</a> </div>';
        })
        ->addColumn('point', function ($result) {
            return '<div class="text-center">'.$result->point.'</div>';
        })
        ->addColumn('total_products', function ($result) {
            return '<div class="text-center"><a href="'.route('admin-product-list', ['user_id' => $result->id]).'" class="btn btn-link text-center">'.$result->products->count().'</a> </div>';
        })
        ->addColumn('action', function ($result) {
            $output = '';
            if ($result->status==0) {
                $output .= '<a href="'.route('admin-user-status-change', ['id' => $result->id, 'status'=> 1]).'" class="btn btn-sm btn-success">有効にする</a> ';
            }
            else{
                $output .= '<a href="'.route('admin-user-quit-request', ['id' => $result->id,'status'=> 0]).'" class="btn btn-sm btn-danger"> 無効にする</a>';
                // $output .= '<a href="'.route('admin-project-category-status-change', ['id' => $result->id, 'status'=> 0]).'" class="btn btn-xs btn-danger">Disable</a> ';
            }
            // $output .= '<a href="'.route('admin-project-category-edit', ['id' => $result->id]).'" class="btn btn-xs btn-info">Edit</a>';
            

            // $output .= ' <a href="'.route('admin-user-delete', ['id' => $result->id]).'" class="btn btn-sm btn-danger delete-sure">Delete</a>';
            // dd($result->quit_request);
            // if($result->withdrawRequest()==1 && $result->status==1){
            //     $output .= ' <a href="'.route('admin-user-quit-request', ['id' => $result->id, 'status'=> 0]).'" class="btn btn-sm btn-success" style="">Deactive</a> ';
            // }

            // $withdraw = Withdrawal::where('user_id', $request->id)->first();
            // if($withdraw){
            //     $output .= ' <a href="'.route('admin-user-quit-request', ['id' => $result->id, 'status'=> 0]).'" class="btn btn-sm btn-success">Deactive</a> ';
            // }
            
            return $output;
            
        })
        ->rawColumns(['first_name','total_projects','total_products','created_at', 'last_login_date', 'is_email_verified', 'action', 'status', 'cancel_request','point'])
        ->make(true);
    }

    public function statusChange(Request $request)
    {
        // dd($request->status);
        $User = User::find($request->id);
        $User->status = $request->status;
        $User->save();
        return redirect()->back()->with('success_message', 'status updated');
    }

    public function quitRequest(Request $request)
    {
    	// dd($request->status);
    	$User = User::find($request->id);
        $User->status = $request->status;
    	$User->quit_request = 0;
    	$User->save();
    	return redirect()->back()->with('success_message', 'status updated');
    }

    public function delete($id=0)
    {
        if (!empty($id)) {
            $User = User::find($id);
            if (!empty($User)) {
                if ($User->delete()) {
                    return redirect()->back()->with('success_message', 'Successfully Deleted!');
                }
            }
        }
        return redirect()->back()->with('error_message', 'Data Not Found!');
    }

    public function cancelRequestShow($user_id='')
    {
        $withdrawal = Withdrawal::where('user_id', $user_id)->first();
        if(!empty($withdrawal)){
            $user = User::find($withdrawal->user_id);
            $profile = Profile::where('user_id', $user->id)->first();
            //send mail to admin
            $emailData = [
                'name' => '',
                'register_token' => $user->register_token,
                'subject' => '【Crofun管理者用】アカウント解除・退会の通知',
                'from_email' => 'noreply@crofun.jp',
                'from_name' => 'Crofun',
                'template' => 'user.email.29',
                'root'     => '',
                'email'     => 'administrator@crofun.jp',
                'user_name'  => $user->first_name.' '.$user->last_name,
                'birthday' =>$profile->dob,
                'address' => $profile->address,
                'address2' => $Profile->prefectures,
                'address3' => $Profile->municipility,
                'address4' => $Profile->address,
                'address5' => $Profile->room_no,
                'phone_number'=> $profile->phone_no,
                'occupation' =>'',
                
                ];
        
                Mail::to('administrator@crofun.jp')
                    ->send(new Common($emailData));
        //send mail to user
            $emailData = [
                'name' => $user->first_name.' '.$user->last_name,
                'register_token' => $user->register_token,
                'subject' => '【Crofun】アカウント解除・退会を承りました',
                'from_email' => 'noreply@crofun.jp',
                'from_name' => 'Crofun',
                'template' => 'user.email.28',
                'root'     => '',
                'email'     => $user->email,
                'your_name'  =>$user->first_name.' '.$user->last_name,
                'birthday' =>$profile->dob,
                'address' =>$profile->address,
                'address2' => $Profile->prefectures,
                'address3' => $Profile->municipility,
                'address4' => $Profile->address,
                'address5' => $Profile->room_no,
                'phone_number'=> $profile->phone_no,
                'occupation' =>'',
            
                ];
    
                Mail::to($user->email)
                    ->send(new Common($emailData));
            return '<h4>退会理由</h4>'.'<strong>'.$withdrawal->reason.'</strong><br /><br />'.'<h4>理由詳細</h4>'.'<p>'.$withdrawal->reason_details.'</p>';
        }
        else{
            return 'No Data Found!';
        }
    }

    public function details(Request $request){
        //echo "test";exit();
        $userDetails = User::where('id',$request->id)->with('profile')->first();
        // $userDetailsProfile = Profile::where('user_id',$request->id)->with('user')->first();
        // $userDetails = User::where('id', $request->id)->first();
         $userDetailsProfile = Profile::where('user_id',$request->id)   ->first();
        //dd( $userDetails,$userDetailsProfile);
        
        // dd($userDetails->profile);
        // dd($request->id);
        // dd($userDetailsProfile, $userDetails);
        $data['title'] = $userDetails->first_name.$userDetails->last_name.'\'s details' ;
        $data['userDetails'] = $userDetails;

        // dd( $request->id ,$data);
        return view('admin.user.details',$data);

    }
    public function cancelRequest(Request $request){
        $id = $request->get('id');
        $test = Withdrawal::where('id', $id)->first();
        return response()->json($test);
    }


}