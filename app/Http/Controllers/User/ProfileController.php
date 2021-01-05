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
use App\User;
use App\Models\Profile;
use App\Models\UserCard;
use App\Models\Message;
use App\Models\Product;
use App\Models\Project;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Threads;

use Carbon\Carbon;
use App\Models\Investment;
// use App\Models\Message;

use App\Mail\Common;



use Image;
use Auth;
use Mail;

class ProfileController extends Controller
{
	public function __construct()
    {

    }

    public function index(Request $request)
    {
        $data['title'] = 'プロフィール編集 | Crofun';
    	$user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
		return view('user.profile_update', $data);
    }

    public function indexAction(Request $request)
    {
        $validator =\Validator::make($request->all() ,
            [
                'first_name' => 'required|max:10',
                'last_name' => 'required|max:10',
                'phonetic' => 'required|regex:/[\x{30A0}-\x{30FF}]/u',
                'phonetic2' => 'required|regex:/[\x{30A0}-\x{30FF}]/u',
                'url' => 'nullable|url',
                'postal_code' => 'required',
                'phone_no' => ['min:10','max:11']
            ],[
                'phonetic.regex' => 'カタカナで入力してください ',
                'phonetic2.regex' => 'カタカナで入力してください ',
                'phone_no.min' => '電話番号は10文字以上にする必要があります。',
                'phone_no.max' => '電話番号は11文字を超えることはできません。'
            ]);
        if ($validator->fails()) {           
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $User = User::find(Auth::user()->id);
        
        $userFirstName = $request->first_name;
        $pattern = " " . "　";
        $userFirstName = trim(mb_ereg_replace("[{$pattern}]+", ' ',urldecode($userFirstName))); 
        $User->first_name = $userFirstName;

        $userLastName = $request->last_name;
        $pattern = " " . "　";
        $userLastName = trim(mb_ereg_replace("[{$pattern}]+", ' ',urldecode($userLastName))); 
        $User->last_name = $userLastName;

        $userphonetic1 = $request->phonetic;
        $pattern = " " . "　";
        $userphonetic1 = trim(mb_ereg_replace("[{$pattern}]+", ' ',urldecode($userphonetic1))); 
        $User->phonetic_first = $userphonetic1;

        $userphonetic2 = $request->phonetic2;
        $pattern = " " . "　";
        $userphonetic2 = trim(mb_ereg_replace("[{$pattern}]+", ' ',urldecode($userphonetic2))); 
        $User->phonetic_last = $userphonetic2;


	    if ($request->hasFile('pic')) {
            $extension = $request->pic->extension();
            $name = time().rand(1000,9999).'.'.$extension;
            $img = Image::make($request->pic)->resize(300, 300);
            $img->save(public_path().'/uploads/profile/'.$name, 60);
            $User->pic = 'profile/'.$name;
        }

        $User->shipping_address = $request->address;
        $User->shipping_municipility = $request->municipility;
        $User->shipping_prefecture = $request->prefectures;
        $User->shipping_room_num = $request->room_no;
        $User->shipping_postal_code = $request->postal_code;
        $User->shipping_phone_num = $request->phone_no;

        $User->save();

        $Profile = Profile::where('user_id', $User->id)->first();
        if(!$Profile){
            $Profile = new Profile();
            $Profile->user_id = $User->id;
        }

        /* remove whitespace for japanees language */

        $profilePhonetic = $request->phonetic;
        $pattern = " " . "　";
        $profilePhonetic = trim(mb_ereg_replace("[{$pattern}]+", ' ',urldecode($profilePhonetic))); 
        $Profile->phonetic = $profilePhonetic;

        $profilePhonetic2 = $request->phonetic2;
        $pattern = " "."　";
        $profilePhonetic2 = trim(mb_ereg_replace("[{$pattern}]+", ' ',urldecode($profilePhonetic2)));  
		$Profile->phonetic2 = $profilePhonetic2;

        $Profile->url = $request->url;
        $Profile->profile = $request->profile;
        $Profile->dob = $request->dob;
        $Profile->postal_code = $request->postal_code;
        $Profile->prefectures = $request->prefectures;
        $Profile->municipility = $request->municipility;
        $Profile->address = $request->address;
        $Profile->room_no = $request->room_no;
        $Profile->phone_no = $request->phone_no;
        $Profile->sex = $request->sex;
        $Profile->save();
        //send mail to user
        $emailData = [
            'name' => $User->first_name.' '.$User->last_name,
            'register_token' => $User->register_token,
            'subject' => '【Crofun】アカウントの変更完了のお知らせ',
            'from_email' => 'noreply@crofun.jp',
            'from_name' => 'Crofun',
            'template' => 'user.email.5',
            'root'     => $request->root(),
            'email'     => $User->email,
            'your_name' =>  $User->first_name.' '.$User->last_name,
           'birth_date'  => $Profile->dob,
            'address1' => $Profile->postal_code,
            'address2' => $Profile->prefectures,
            'address3' => $Profile->municipility,
            'address4' => $Profile->address,
            'address5' => $Profile->room_no,
            'phone_number' => $Profile->phone_no,
        ];

        Mail::to($User->email)
            ->send(new Common($emailData));

         //send mail to admin
        $emailData = [
            'name' => '',
            'register_token' => $User->register_token,
            'subject' => '【Crofun管理者用】アカウントの変更通知',
            'from_email' => 'noreply@crofun.jp',
            'from_name' => 'Crofun',
            'template' => 'user.email.6',
            'root'     => $request->root(),
            'email'     => 'administrator@crofun.jp',
            'person_name' =>  $User->first_name.' '.$User->last_name,
            'birth_date'  => $Profile->dob,
            'address1' => $Profile->postal_code,
            'address2' => $Profile->prefectures,
            'address3' => $Profile->municipility,
            'address4' => $Profile->address,
            'address5' => $Profile->room_no,
            'phone_number' => $Profile->phone_no,
        ];

        Mail::to('administrator@crofun.jp')->send(new Common($emailData));

        return redirect()->back()->with('success', 'プロフィール情報を更新しました。');
    }

    public function emailChange(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
        $data['title'] = 'メールアドレス変更 | Crofun';
    	return view('user.change_email',$data);
    }

    public function emailChangeAction(Request $request)
    {
    	$this->validate($request, [
            'email' => 'required',
            'email_confirmation' => 'required'
        ],
        [
            'email.email' => '正しいメールアドレスを入力してください。',
        ]);
        
        $User = User::find(Auth::user()->id);
        $old_email = Auth::user()->email;

        $allUsers = User::where('email',$request->email)->first();

        if(!empty($request->email != $request->email_confirmation)){
            return redirect()->back()->with('error_message', 'メールアドレスが一致しません');
        } else if($old_email == $request->email ){
            return redirect()->back()->with('error_message', '現在と同じアドレスです');
        }else if($allUsers){
            return redirect()->back()->with('error_message', 'このメールアドレスは既に利用されています。');
        }

        $User->email = $request->email;
        $User->save();
        
        $emailData = [
            'name' => Auth::user()->first_name.' '.Auth::user()->last_name,
            'contact_person' => 'Smith',
            'subject' => '【Crofun】メールアドレスの変更完了のお知らせ',
            'from_email' => 'noreply@crofun.jp',
            'from_name' => 'Crofun',
            'template' => 'user.email.update_email',
            'root'     => $request->root(),
            'email'     => $request->email,
            'oldEmail' => Auth::user()->email,
        ];

        Mail::to($request->email)
            ->send(new Common($emailData));
        Mail::to($old_email)
            ->send(new Common($emailData));
        return redirect()->back()->with('success_message', 'メールアドレスが更新されました');
    }

    public function sendMessage(Request $request)
    {
        if($request->id !=null){
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
            $user = User::where('id', Auth::user()->id)->with('profile')->first();
            $data['user'] = $user;
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

    public function inboxMessage(Request $request)
    {
        $data['current_user'] = User::where('id', Auth::user()->id)->first();

        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
        $data['messages'] = Message::where('to_id', Auth::user()->id)->where('is_deleted', false)->orderBy('created_at', 'desc')->paginate(20);
        Message::where('to_id', Auth::user()->id)->where('is_deleted', false)->update(['is_read'=>true]);
        $data['threads'] = Threads::where(function ($query) {
                                $query->where('side_2', Auth::user()->id)->where('is_delete', 1);
                            })->orWhere(function($query) {
                                $query->where('side_1', Auth::user()->id)
                                    ->where('location', '=', 2)->where('is_delete', 1);	
                            })
                            ->with('side1')
                            ->with('side2')
                            ->orderBy('last_message_time', 'desc')
                            ->paginate(20);
        return view('user.message_inbox', $data);
    }

    public function sentMessage(Request $request)
    {
        $data['current_user'] = User::where('id', Auth::user()->id)->first();
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
        $data['messages'] = Message::where('from_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(20);
        $data['threads'] = Threads::where(function ($query) {
                                $query->where('side_1', Auth::user()->id)->where('is_delete', 1);
                                })->orWhere(function($query) {
                                    $query->where('side_2', Auth::user()->id)
                                        ->where('location', '=', 2)->where('is_delete', 1);	
                                })
                                ->where('is_delete', 1)
                                ->with('side1')
                                ->with('side2')
                                ->orderBy('last_message_time', 'desc')
                                ->paginate(20);
        return view('user.message_inbox', $data);
    }
    
    public function trashMessage(Request $request)
    {
        $data['current_user'] = User::where('id', Auth::user()->id)->first();
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
        $data['messages'] = Message::where('to_id', Auth::user()->id)->where('is_deleted', true)->orderBy('created_at', 'desc')->paginate(20);
        $data['threads'] = Threads::where(function ($query) {
                                $query->where('side_1', Auth::user()->id)->where('is_delete', '=', 2);
                                })->orWhere(function($query) {
                                    $query->where('side_2', Auth::user()->id)
                                            ->where('location', '=', 2)
                                            ->where('is_delete', '=', 2);	
                                })
                                ->with('side1')
                                ->with('side2')
                                ->orderBy('last_message_time', 'desc')
                                ->paginate(20);
        return view('user.message_inbox', $data);
    }

    public function showMessage(Request $request){
        // change unread status
        $thread = Threads::where('id', $request->id)->first();
        if($thread->side_1 == Auth::user()->id){
            Threads::where('id', $request->id)->update(['read_status_side1' => 2]);
        } else {
            Threads::where('id', $request->id)->update(['read_status_side2' => 2]);
        }

        $thread = Threads::where('id', $request->id)->update(['read_status' => 2]);

        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
        $message = Message::where('thread_id', $request->id)->get();
        $lastMessage = Message::where('thread_id', $request->id)->orderBy('id','desc')->get();

        $data['messages'] = $message;
        $data['lastMessage'] = $lastMessage;
        $data['thread'] = Threads::where('id', $request->id)->with('side1')->with('side2')->first();

        return view('user.show-message', $data);
    }

    public function replyMessage(Request $request){
        $messageReply = new Message();
        $messageReply->subject = $request->input('subject');
        $messageReply->to_id = $request->input('to_id');
        $messageReply->reply_message_id = $request->input('reply_message_id');
        $messageReply->thread_id = $request->input('thread_id');

        $messageReply->from_id = Auth::user()->id;
        $messageReply->message = $request->input('message');
        $messageReply->save();
        
        $thrd = Threads::where('id', $request->input('thread_id'))->first();
        if($thrd->side_2 == Auth::user()->id){
            $thrd->last_message_time = date('Y-m-d H:i:s');
            $thrd->location = 2;
            $thrd->read_status_side1 = 1;
            $thrd->save();
        } else {
            $thrd->read_status_side2 = 1;
            $thrd->save();
        }

        if($messageReply->to_id == 0){
             // send mail to msg receiver
             $Receiver = User::find($messageReply->to_id);
             $emailData = [
                 'name' => 'Admin',
                 'register_token' =>'',
                 'subject' => '【Crofun管理者用】メッセージ受信のお知らせ',
                 'from_email' => 'noreply@crofun.jp',
                 'from_name' => 'CROFUN',
                 'template' => 'user.email.12',
                 'root'     => $request->root(),
                 'email'     => 'administrator@crofun.jp',
         
             ];
         
             Mail::to('administrator@crofun.jp')
                 ->send(new Common($emailData));
        }
        else{
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
        }
        return redirect()->back();
    }

    public function deleteMessage(Request $request){
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
        Message::where('id', $request->id)->update(['is_deleted' => true]);
        return redirect()->back();
    }

    public function deleteMultipleMessage(Request $request){
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
        $delete = $request->input('delete');
        if(!empty($delete)){
            Threads::whereIn('id', $delete)->where('is_delete', 2)->delete();
            Threads::whereIn('id', $delete)->where('is_delete', 1)->update(['is_delete' => 2]);
            
        }
        return redirect()->back();
    }

    public function shippingAddressUpdate()
    {   
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user1'] = $user;
        $data['title'] = '配送先情報 | Crofun';
        $data['user'] = User::find(Auth::user()->id);
        return view('user.shipping_address', $data);
    }

    public function shippingAddressUpdateAction(Request $request)
    {
        $this->validate($request, [
            'shipping_phone_num' => ['min:10','max:11']
        ],[
            'phone_no.min' => '電話番号は10文字以上にする必要があります。',
            'phone_no.max' => '電話番号は11文字を超えることはできません。'
        ]);
        $User = User::find(Auth::user()->id);

        $User->shipping_address = $request->input('shipping_address');
        $User->shipping_municipility = $request->input('shipping_municipility');
        $User->shipping_prefecture = $request->input('prefectures');
        $User->shipping_room_num = $request->input('shipping_room_num');
        $User->shipping_postal_code = $request->input('shipping_postal_code');
        $User->shipping_phone_num = $request->input('shipping_phone_num');
        $User->first_name = $request->input('first_name');
        $User->last_name = $request->input('last_name');

        $User->save();

        $User->profile->phonetic = $request->input('phonetic1');
        $User->profile->phonetic2 = $request->input('phonetic2');
        $User->profile->save();
        
        return redirect()->back()->with('success', '配送先情報を更新完了です。');
    }

    public function quitMembership()
    {
        return view('user.quit_membership');
    }

    public function quitMembershipUpdate(Request $request)
    {
        $User = User::find(Auth::user()->id);
        $User->quit_request = true;
        $User->save();
        return redirect()->back()->with('success_message', 'Your request is submitted,we will get back to you soon.');
    }

    public function social(Request $request)
    {
        return view('user.social');
    }

    public function mypage(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
        $projects = Project::where('user_id', $user_id )->where('end', '>=', Carbon::now()->subDays(365)->toDateTimeString())->with('favourite')->orderBy('created_at', 'desc')->get();

        $data['projects'] = $projects;
        $data['products'] = Product::where('user_id', $user_id )->orderBy('created_at','desc')->get();
        $invested_projects = Project::where('end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                                    ->whereIn('status', [1,3])
                                    ->whereHas('investment', function ($query) {
                                            $query->where('user_id', Auth::user()->id)->where('status', 1);
                                    })
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        $data['invested_projects'] = $invested_projects;
        $data['OrderDetails'] = OrderDetail::whereHas('order', function ($query) {
                                    $query->where('user_id', Auth::user()->id)->where('status', 1);
                                })
                                ->with('order')
                                ->with('product')
                                ->orderBy('created_at', 'desc')
                                ->get();

        $data['OrderDetailsNotification'] = OrderDetail::where('status', 1)
                                            ->whereHas('product', function($q){
                                                $q->where('user_id', Auth::user()->id)->where('status', 1);
                                            })
                                            ->whereHas('order', function($q){
                                                $q->where('status', 1);
                                            })
                                            ->orderBy('created_at', 'desc')
                                            ->get();
        return view('user.my_page', $data);
    }
}
