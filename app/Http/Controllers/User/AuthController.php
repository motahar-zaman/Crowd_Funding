<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-16 13:37:36
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-16 13:37:41
 */

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Mail\Common;
use App\Models\Profile;
use App\User;

use Auth;
use Hash;
use Mail;
use App\Http\Controllers\Controller;
use Socialite;
use Validator;
use Cart;

class AuthController extends Controller
{
	public function __construct()
    {

    }

    public function kickAndSend()
    {
        // if(Auth::check()){
            Auth::logout();
            return redirect()->route('password.request');
        // }else{
        //     return redirect()->route('password.request');
        // }
    }

    public function user_registration_rules(array $data)
    {
      $messages = [
        'email.required' => ' この項目は必須です',
        'email.unique' => 'メールアドレスはすでに存在します'
      ];

      $validator = Validator::make($data, [
            'email' => 'required|email|unique:users'
      ], $messages);

      return $validator;
    }

    public function registerRequest(Request $request)
    {
        $data['title'] = '新規登録 | Crofun';
        return view('auth.register_request', $data);
    }

    public function registerRequestAction(Request $request)
    {
        $validator = $this->user_registration_rules($request->toArray());
        if($validator->fails())
        {
          return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $User = new User();
        $User->first_name = 'welcome user';
        $User->email = $request->email;
        $User->password = Hash::make(rand(100000,999999));
        $User->register_token = time().rand(1000,9999);
        $User->save();

        $Profile = new Profile();
        $Profile->user_id = $User->id;
        $Profile->save();

        $emailData = [
            'name' => 'User',
            'contact_person' => 'Smith',
            'register_token' => $User->register_token,
            'subject' => '【Crofun】アカウントの仮登録',
            'from_email' => 'noreply@crofun.jp',
            'from_name' => 'CROFUN',
            'template' => 'user.email.registration_process',
            'root'     => $request->root(),
            'email'     => $request->email
        ];

        Mail::to($request->email)
            ->send(new Common($emailData));

        return redirect()->back()->with('success_message', 'メールを送信しました。');

    }

    public function register(Request $request)
    {
        $token = $request->token;
        $data['user'] = User::where('register_token', $token)->first();
        if($data['user']){
            return view('auth.register', $data);
        }
        abort(404);

    }

    public function registerAction(Request $request)
    {
        // dd(2);
        $this->validate($request, [
            'first_name' => 'required|max:10',
            'last_name' => 'required|max:10',
            'email' => 'required',
            'password' => ['required', 
            'min:8',
            'confirmed']
        ],[
            // 'password.regex'=> 'パスワードの書式が間違えています。確認してください。',
            'password.min' => 'パスワードは８文字以上にする必要があります',
            'password.confirmed' => 'パスワードの確認が一致しません'
        ]);
        $count = 0;
        
        if(preg_match('/([a-z])/', $request->password)){
            $count++;
        }
        if(preg_match('/([A-Z])/', $request->password)){
            $count++;
        }
        if(preg_match('/([0-9])/', $request->password)){
            $count++;
        }
        //if(preg_match('/([!@#$%^&*])/', $request->password)){
        //     $count++;
        // }
        if($count < 2 || preg_match('/([!$%^&*]+)/', $request->password)){
            return redirect()->back()->withInput()->with('error_message', 'パスワードの書式が間違えています。確認してください。');
        }
        // dd($count);
        
        $User = User::where('register_token', $request->token)->first();
        $User->first_name = $request->first_name;
        $User->last_name = $request->last_name;
        $User->register_token = '';
        $User->password = Hash::make($request->password);
        $User->is_email_verified = true;
        $User->status = true;
        $User->save();

        $Profile = new Profile();
        $Profile->user_id = $User->id;
        $Profile->save();


        $emailData = [
            'name' => $User->first_name.' '.$User->last_name,
            'contact_person' => 'Smith',
            'subject' => '【Crofun】アカウントの登録完了のお知らせ',
            'from_email' => 'noreply@crofun.jp',
            'from_name' => 'Crofun',
            'template' => 'user.email.registration_complete_user',
            'root'     => $request->root()
        ];

        Mail::to($request->email)
            ->send(new Common($emailData));


        $adminEmailData = [
            'name' => $User->first_name.' '.$User->last_name,
            'contact_person' => 'Smith',
            'subject' => '【Crofun管理者用】新規ユーザー登録',
            'from_email' => 'noreply@crofun.jp',
            'from_name' => 'Crofun',
            'template' => 'user.email.registration_admin',
            'root'     => $request->root()
        ];

        // Mail::to($request->email)
        //     ->send(new Common($emailData));

        Mail::to('administrator@crofun.jp')
            ->send(new Common($adminEmailData));

        return redirect()->to(route('login'))->with('success_message', '<span style="font-size:10px;">ユーザー登録が完了しました。　下記より、ログインしてCrofunをご利用ください。<br> よろしくお願いいたします。</span>');

    }

    public function changePassword(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        // if ($user->facebook_id != null || $user->google_id != null || $user->twitter_id !=null || $user->facebook_id != '' || $user->google_id != '' || $user->twitter_id != ''){
        //     return redirect()->route('front-home');
        // }
        $data['user'] = $user;
        $data['title'] = 'パスワード変更 | Crofun';
        return view('user.change_password',$data);
    }

    public function changePasswordAction(Request $request)
    {
        // dd($request);
    	$this->validate($request, [
            'current_password' => 'required',
            // 'password' => 'required|confirmed'
            'password' => ['required', 
            'min:8',
            'confirmed']
        ],[
            'password.min' => 'パスワードは８文字以上にする必要があります',
            'password.confirmed' => 'パスワードの確認が一致しません'
        ]);
        $count = 0;
        if(preg_match('/([a-z])/', $request->password)){
            $count++;
        }if(preg_match('/([A-Z])/', $request->password)){
            $count++;
        }
        if(preg_match('/([0-9])/', $request->password)){
            $count++;
        }
        //if(preg_match('/([!@#$%^&*])/', $request->password)){
        //     $count++; 
        // }
        if($count < 2 || preg_match('/([!$%^&*]+)/', $request->password)){
            return redirect()->back()->withInput()->with('error_message', 'パスワードの書式が間違えています。確認してください。');
        }

        $User = User::find(Auth::user()->id);
        if (Hash::check($request->current_password, $User->password)) {
            $User->password = Hash::make($request->password);
            $User->save();
            return redirect()->back()->with('success_message', 'パスワードは正常に変更されました');
        }
        return redirect()->back()->with('error_message', '現在のパスワードが一致しません');
    }

    public function facebook(Request $request)
    {
		$redirectUrl = $request->root().'/facebook-action';
				// $redirectUrl = 'https://crofun.jp/facebook-action';
        return Socialite::driver('facebook')->setScopes(['email'])->redirectUrl($redirectUrl)->redirect();
    }

    public function facebookAction(Request $request)
    {
        if (!$request->has('code') || $request->has('denied')) {
            return redirect()->to(route('login'));
        }
        $redirectUrl = $request->root().'/facebook-action';
        $user = Socialite::driver('facebook')->redirectUrl($redirectUrl)->user();
        $check = User::where('email', $user->email)->first();
        if($check){
            $check->facebook_id = $user->id;
            $check->is_email_verified = true;
            $check->status = true;
            $check->save();
            $userId = $check->id;
        }else{
            $User = new User();
            $User->facebook_id = $user->id;
            $User->first_name = $user->name;
            $User->pic = $user->avatar_original;
            $User->last_name = '';
            $User->email = $user->email;
            $User->is_email_verified = true;
            $User->status = true;
            $User->created_at = date('Y-m-d H:i:s');
            $User->updated_at = date('Y-m-d H:i:s');
            $User->save();

            $Profile = new Profile();
            $Profile->user_id = $User->id;
            $Profile->save();

            $userId = $User->id;


            // $this->updateProfile($User);

        }


        if(Auth::check()){
            return redirect()->to(route('user-social'))->with('success_message', 'Facebook connected!');
        }

        Auth::loginUsingId($userId, true);
        // return redirect()->intended(route('user-profile-update'));
        return redirect()->intended(route('user-my-page'));


    }


    public function google(Request $request)
    {
        $redirectUrl = $request->root().'/google-action';
        return Socialite::driver('google')->redirectUrl($redirectUrl)->redirect();
    }

    public function googleAction(Request $request)
    {
        // if (!$request->has('code') || $request->has('denied')) {
        //     return redirect()->to(route('login'));
        // }
        $redirectUrl = $request->root().'/google-action';
        // $user = Socialite::driver('google')->redirectUrl($redirectUrl)->user();
        $user = Socialite::driver('google')->user();
        $check = User::where('email', $user->email)->first();
        if($check){
            $check->google_id = $user->id;
            $check->is_email_verified = true;
            $check->status = true;
            $check->save();
            $userId = $check->id;
        }else{
            //separate username into first and last
            $name = explode(" ", $user->name);
            $first_name = '';
            for ($i=0; $i<count($name)-1; $i++){
                $first_name = $first_name.$name[$i];
            }
            // dd($user->name);
            $User = new User();
            $User->google_id = $user->id;
            $User->first_name = $first_name;
            $User->last_name = $name[count($name)-1];
            $User->pic = $user->avatar_original;
            $User->email = $user->email;
            $User->is_email_verified = true;
            $User->status = true;
            $User->created_at = date('Y-m-d H:i:s');
            $User->updated_at = date('Y-m-d H:i:s');
            $User->save();

            $Profile = new Profile();
            $Profile->user_id = $User->id;
            $Profile->save();
            $userId = $User->id;
        }


        if(Auth::check()){
            return redirect()->to(route('user-social'))->with('success_message', 'Google connected!');
        }
        Auth::loginUsingId($userId, true);
        // return redirect()->intended(route('user-profile-update'));
        return redirect()->intended(route('user-my-page'));


    }


    public function twitter(Request $request)
    {
        $redirectUrl = $request->root().'/twitter-action';
        return Socialite::driver('twitter')->redirect();
    }

    public function twitterAction(Request $request)
    {
        $redirectUrl = $request->root().'/twitter-action';
        $user = Socialite::driver('twitter')->user();
        // dd($user);
        $check = User::where('twitter_id', $user->id)->first();
        if($check){
            $check->twitter_id = $user->id;
            $check->is_email_verified = true;
            $check->status = true;
            $check->save();
            $userId = $check->id;
        }else{
            $User = new User();
            $User->twitter_id = $user->id;
            $User->first_name = $user->name;
            $User->pic = $user->avatar_original;
            $User->last_name = '';
            $User->email = 'user'.$User->twitter_id.rand(1000,9999).'@example.com';
            $User->is_email_verified = true;
            $User->status = true;
            $User->created_at = date('Y-m-d H:i:s');
            $User->updated_at = date('Y-m-d H:i:s');
            $User->save();

            $Profile = new Profile();
            $Profile->user_id = $User->id;
            $Profile->save();

            $userId = $User->id;

            // $this->updateProfile($User);

        }


        if(Auth::check()){
            return redirect()->to(route('user-social'))->with('success_message', 'Twitter connected!');
        }

        Auth::loginUsingId($userId, true);
        // return redirect()->intended(route('user-profile-update'));
        return redirect()->intended(route('user-my-page'));

    }


    public function line(Request $request)
    {
        $redirectUrl = $request->root().'/line-action';
        return Socialite::driver('line')->redirect();
    }

    public function lineAction(Request $request)
    {
        $redirectUrl = $request->root().'/line-action';
        $user = Socialite::driver('line')->user();
        // dd($user);
        $check = User::where('line_id', $user->id)->first();
        if($check){
            $check->line_id = $user->id;
            $check->is_email_verified = true;
            $check->status = true;
            $check->save();
            $userId = $check->id;
        }else{
            $User = new User();
            $User->line_id = $user->id;
            $User->first_name = $user->name;
            $User->pic = $user->avatar_original;
            $User->last_name = '';
            $User->email = 'user'.$User->line_id.rand(1000,9999).'@example.com';
            $User->is_email_verified = true;
            $User->status = true;
            $User->created_at = date('Y-m-d H:i:s');
            $User->updated_at = date('Y-m-d H:i:s');
            $User->save();

            $Profile = new Profile();
            $Profile->user_id = $User->id;
            $Profile->save();

            $userId = $User->id;

            // $this->updateProfile($User);

        }


        if(Auth::check()){
            return redirect()->to(route('user-social'))->with('success_message', 'Line connected!');
        }

        Auth::loginUsingId($userId, true);
        // return redirect()->intended(route('user-profile-update'));
        return redirect()->intended(route('user-my-page'));

    }


    public function yahoo(Request $request)
    {
        $redirectUrl = $request->root().'/yahoo-action';
        return Socialite::driver('yahoo')->redirect();
    }

    public function yahooAction(Request $request)
    {
        $redirectUrl = $request->root().'/yahoo-action';
        $user = Socialite::driver('yahoo')->user();
        // dd($user);
        $check = User::where('email', $user->email)->first();
        if($check){
            $check->twitter_id = $user->id;
            $check->is_email_verified = true;
            $check->status = true;
            $check->save();
            $userId = $check->id;
        }else{
            $User = new User();
            $User->google_id = $user->id;
            $User->first_name = $user->name;
            $User->pic = $user->avatar_original;
            $User->last_name = '';
            $User->email = $user->email;
            $User->is_email_verified = true;
            $User->status = true;
            $User->created_at = date('Y-m-d H:i:s');
            $User->updated_at = date('Y-m-d H:i:s');
            $User->save();

            $Profile = new Profile();
            $Profile->user_id = $User->id;
            $Profile->save();

            $userId = $User->id;

            // $this->updateProfile($User);

        }

        if(Auth::check()){
            return redirect()->to(route('user-social'))->with('success_message', 'Yahoo connected!');
        }

        Auth::loginUsingId($userId, true);
        // return redirect()->intended(route('user-profile-update'));
        return redirect()->intended(route('user-my-page'));

    }



    public function logout()
    {
        Cart::destroy();
    	Auth::logout();
    	return redirect()->to(route('front-home'));
    }
}
