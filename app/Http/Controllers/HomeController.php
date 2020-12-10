<?php

namespace App\Http\Controllers;

use App\Mail\Common;
use App\Models\Project;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function warnMailToProjectOwner(){
        $projects = Project::with('user')->with('investment')
            ->where('status', 1)
            ->where('end','<=', date("Y-m-d", strtotime('+3 days')))
            ->where('end','>', date("Y-m-d", strtotime('+2 days')))
            ->get();
        foreach ($projects as $project){
            $totalAmount = $project->investment->sum('amount');
            $percentage = round(($totalAmount/$project->budget)*100, 2);
            if($project['is_100%']){
                $emailData = [
                    'name' => $project->user->first_name .' '. $project->user->last_name,
                    'register_token' => $project->user->register_token,
                    'subject' => '【Crofun】支援プロジェクトの経過報告',
                    'from_email' => 'noreply@crofun.jp',
                    'from_name' => 'Crofun',
                    'template' => 'user.email.projectTargetAmountFullfilled',
                    'email'     => $project->user->email,
                    'project_name'  => $project->title,
                    'amount'  => $totalAmount,
                    'percentage' => $percentage,
                ];
            }
            else{
                $emailData = [
                    'name' => $project->user->first_name .' '. $project->user->last_name,
                    'register_token' => $project->user->register_token,
                    'subject' => '【Crofun】支援プロジェクトの経過報告',
                    'from_email' => 'noreply@crofun.jp',
                    'from_name' => 'Crofun',
                    'template' => 'user.email.projectTargetAmountNotFullfill',
                    'email'     => $project->user->email,
                    'project_name'  => $project->title,
                    'amount'  => $totalAmount,
                    'percentage' => $percentage,
                ];
            }
            Mail::to($project->user->email)->send(new Common($emailData));
        }
    }
}
