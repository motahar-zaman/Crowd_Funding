<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Message;
use App\Models\Threads;

use Yajra\Datatables\Facades\Datatables;
use App\Mail\Common;
use Auth;
use Mail;

class MessageController extends Controller
{
    
	public function __construct()
    {

    }
    public function messageInbox(){
        $data['title'] = "メッセージ一覧";
    	return view('admin.message.message_inbox', $data);
    }
    public function data(Request $request)
    {
    	$Message = Threads::where(function ($query) {
                                $query->where('side_2', 0)->where('is_delete', 1);
                            })->orWhere(function($query) {
                                $query->where('side_1', 0)
                                    ->where('is_delete', 1);	
                            })
                            ->orderBy('last_message_time','desc')
                            ->with('side1')
                            ->with('side2')
                            ->get();
        return Datatables::of($Message)
        ->editColumn('created_at', function($result){
            return ($result->last_message_time);
        })

        ->addColumn('created_by', function ($result) {
            if($result->side_1 == 0){
                return '<a href="'.route('admin-message-details',['id'=>$result->id]).'" class="pt-3 {{('.$result->read_status_side1.' == 2) ? "" : "bold"}}">'. $result->side2->first_name.' '.$result->side2->last_name.'</a>';
            }
        })
        
        ->addColumn('title', function ($result) {
            if($result->side_1 == 0) {
                return '<a href="'.route('admin-message-details',['id'=>$result->id]).'" class="pt-3 {{('.$result->read_status_side1.' == 2) ? "" : "bold"}}">'.$result->title.'</a>';
            }
        })
        
        ->rawColumns(['title', 'created_at', 'created_by'])
        ->make(true);
    }

    public function sendMessage(Request $request)
    {
        // dd($request->to_id);
        if($request->id == 0){
            $thread_id = 0;
            $is_exist = Threads::where('title', $request->subject)->first();
            if($is_exist == null){
                $thrd = new Threads();
                $thrd->side_1 = 0;
                $thrd->side_2 = $request->to_id;
                $thrd->location = 1;
                $thrd->title = $request->subject;
                $thrd->last_message_time = date('Y-m-d H:i:s');
                $thrd->status = 1;
                $thrd->read_status = 1;
                $thrd->read_status_side1 = 2;
                $thrd->read_status_side2 = 1;
                $thrd->save();

                $thread_id = $thrd->id;
            } else if(($is_exist->side_1 == 0 && $is_exist->side_2 == $request->to_id) || ($is_exist->side_2 == 0 && $is_exist->side_1 == $request->to_id)){
                $is_exist->last_message_time = date('Y-m-d H:i:s');
                if($is_exist->side_2 == 0){
                    $is_exist->location = 2;
                }
                $is_exist->save();
                $thread_id = $is_exist->id;
            } else {
                $thrd = new Threads();
                $thrd->side_1 = 0;
                $thrd->side_2 = $request->to_id;
                $thrd->location = 1;
                $thrd->title = $request->subject;
                $thrd->last_message_time = date('Y-m-d H:i:s');
                $thrd->status = 1;
                $thrd->read_status = 1;
                $thrd->save();
                $thread_id = $thrd->id;
            }
            // $user = User::where('id', Auth::user()->id)->with('profile')->first();
            // $data['user'] = $user;
            $Message = new Message();
            $Message->to_id = $request->to_id;
            $Message->from_id = 0;
            $Message->subject = $request->subject;
            $Message->thread_id = $thread_id;
            $Message->message = $request->message;
            $Message->save();
       
        } else {
        //Thread generation
            $thread_id = 0;
            $is_exist = Threads::where('title', $request->subject)->first();
            if($is_exist == null){
                $thrd = new Threads();
                $thrd->side_1 = Auth::user()->id;
                $thrd->side_2 = $request->to_id;
                $thrd->location = 1;
                $thrd->title = $request->subject;
                $thrd->last_message_time = date('Y-m-d H:i:s');
                $thrd->status = 1;
                $thrd->read_status = 1;
                $thrd->read_status_side1 = 2;
                $thrd->read_status_side2 = 1;
                $thrd->save();

                $thread_id = $thrd->id;
            } else if(($is_exist->side_1 == Auth::user()->id && $is_exist->side_2 == $request->to_id) || ($is_exist->side_2 == Auth::user()->id && $is_exist->side_1 == $request->to_id)){
                $is_exist->last_message_time = date('Y-m-d H:i:s');
                if($is_exist->side_2 == Auth::user()->id){
                    $is_exist->location = 2;
                }
                $is_exist->save();
                $thread_id = $is_exist->id;
            } else {
                $thrd = new Threads();
                $thrd->side_1 = Auth::user()->id;
                $thrd->side_2 = $request->to_id;
                $thrd->location = 1;
                $thrd->title = $request->subject;
                $thrd->last_message_time = date('Y-m-d H:i:s');
                $thrd->status = 1;
                $thrd->read_status = 1;
                $thrd->save();
                $thread_id = $thrd->id;
            }
            //Message generation
            $user = User::where('id', Auth::user()->id)->with('profile')->first();
            $data['user'] = $user;
            $Message = new Message();
            $Message->to_id = $request->to_id;
            $Message->from_id = Auth::user()->id;
            $Message->subject = $request->subject;
            $Message->thread_id = $thread_id;
            $Message->message = $request->message;
            $Message->save();
        }
 

       
        // send mail to msg receiver
        $Receiver = User::find($Message->to_id);
        $emailData = [
            'name' => $Receiver->first_name.' '.$Receiver->last_name,
            'register_token' =>'',
            'subject' => '【Crofun】メッセージ受信のお知らせ',
            'from_email' => 'noreply@crofun.jp',
            'from_name' => 'CROFUN',
            'template' => 'user.email.12',
            'root'     => $request->root(),
            'email'     => $Receiver->email,
    
        ];
    
        Mail::to($Receiver->email)
            ->send(new Common($emailData));

        return redirect()->back()->with('success', 'Message sent successfully');
    }

    public function details(Request $request){
        $data['title'] = "メッセージ詳細";
        $thread = Threads::where('id', $request->id)->first();
        if($thread->side_1 == 0){
            Threads::where('id', $request->id)->update(['read_status_side1' => 2]);
        } else {
            Threads::where('id', $request->id)->update(['read_status_side2' => 2]);
        }


        $thread = Threads::where('id', $request->id)->update(['read_status' => 2]);

        // $user = User::where('id', Auth::user()->id)->with('profile')->first();
        // $data['user'] = $user;
        $message = Message::where('thread_id', $request->id)->get();
        $lastMessage = Message::where('thread_id', $request->id)->orderBy('id','desc')->get();
        // dd($message);
        $data['messages'] = $message;
        $data['lastMessage'] = $lastMessage;
        $data['thread'] = Threads::where('id', $request->id)->with('side1')->with('side2')->first();
    	return view('admin.message.message_details', $data);
    }

    public function reply(Request $request){
        $messageReply = new Message();
        $messageReply->subject = $request->input('subject');
        $messageReply->to_id = $request->input('to_id');
        $messageReply->reply_message_id = $request->input('reply_message_id');
        $messageReply->thread_id = $request->input('thread_id');

        $messageReply->from_id = 0;
        $messageReply->message = $request->input('message');
        // dd($messageReply);
        $messageReply->save();
        
        $thrd = Threads::where('id', $request->input('thread_id'))->first();
        if($thrd->side_2 == 0){
            $thrd->last_message_time = date('Y-m-d H:i:s');
            $thrd->location = 2;
            $thrd->read_status_side1 = 1;
            $thrd->save();
        } else {
            $thrd->read_status_side2 = 1;
            $thrd->save();
        }

         // send mail to msg receiver
         $Receiver = User::find($messageReply->to_id);
         $emailData = [
             'name' => $Receiver->first_name.' '.$Receiver->last_name,
             'register_token' =>'',
             'subject' => '【Crofun】メッセージ受信のお知らせ',
             'from_email' => 'noreply@crofun.jp',
             'from_name' => 'CROFUN',
             'template' => 'user.email.12',
             'root'     => $request->root(),
             'email'     => $Receiver->email,
     
         ];
     
         Mail::to($Receiver->email)
             ->send(new Common($emailData));
             
        return redirect()->back();

    }
}
