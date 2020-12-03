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
use App\Models\Project;
use App\Models\Investment;
use App\Models\InvestmentDetails;
use App\Models\InvestmentReward;
use App\Models\Reward;
use App\User;
use App\Models\Withdrawal;
use App\Models\Message;
use App\Models\OrderDetail;
use Carbon\Carbon;

use App\Models\UserCard;
use Auth;
use Mail;
use App\Mail\Common;

class InvestController extends Controller
{
	public function __construct()
    {

    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
        $investments = Investment::where('user_id', Auth::user()->id)->where('status', 1)->with('project')->orderBy('created_at', 'desc')->get();
      
        $invested_projects = Project::where('end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                                            ->whereIn('status', [1,3])->whereHas('investment', function ($query) {
						$query->where('user_id', Auth::user()->id)->where('status', 1);
				})->orderBy('created_at', 'desc')->get();
				$data['investments'] = $invested_projects;
				$data['investments_history'] = $investments;
        return view('user.invest_list', $data);
    }
		public function user_withdrawal(){
            $user = User::where('id', Auth::user()->id)->with('profile')->first();
            $data['user'] = $user;
            $data['title'] = '退会申請 | Crofun';
			return view('user.user-withdrawal',$data);
		}
		public function user_withdrawal2(Request $request ){
			$finish = false;
			if($request->finish){
					$finish = true;
			}
			$data['finish'] = $finish;
			return view('user.user-withdrawal2', $data);
		}
		public function user_withdrawal_action(Request $request){
            $withdrawal = Withdrawal::where('user_id', Auth::user()->id)->first();
            if(empty($withdrawal)){
                $withdrawal = new Withdrawal();
            }
			
			$withdrawal->user_id = Auth::user()->id;

			$withdrawal->reason = $request->reason;
			$withdrawal->reason_details = $request->reason_details;
            $withdrawal->save();

			return redirect()->to(route('user-withdrawal2', ['finish' => true]));
		}
		public function user_withdrawal3(){
			return view('user.user-withdrawal3');
		}
		public function user_withdrawal4(){
			return view('user.user-withdrawal4');
		}

    public function invest(Request $request)
    {
        $finish = false;
        if($request->finish){
            $finish = true;
        }
        $data['finish'] = $finish;
        $data['p'] = Project::where('status', 1)->where('id', $request->id)->first();
				$data['user'] = User::where('id', Auth::user()->id)->first();
				$data['p_id'] = $request->id;
				// dd($data['user']);
    	return view('user.invest', $data);
			// return view('user.invest-backup', $data);

    }
    public function investAction(Request $request)
    {
	
        // return redirect()->to(route('user-invest', ['id' => $request->id, 'finish' => true]));


        $date = date("YmdHis");

        $User = User::find(Auth::user()->id);
        
        $order_no = 'ORD-'.time().Auth::user()->id.rand(1000,9999);
        $amount = 0;
        $point = 0;
        
        $reward = Reward::find($request->reward_id);
        $amount = $reward->amount;
        $point = $reward->is_crofun_point;

        $Investment = new Investment();
        $Investment->user_id = Auth::user()->id;
        $Investment->project_id = $request->id;
        $Investment->amount = $amount;
        $Investment->point = $point;
        $Investment->order_no = $order_no;
        $Investment->status = false;


        if($request->shipping_address_radio == 1){
            $Investment->shipping_address = $User->shipping_address;
            $Investment->shipping_street_address = $User->shipping_street_address;
            $Investment->shipping_city = $User->shipping_city;
            $Investment->shipping_state = $User->shipping_state;
            $Investment->shipping_postal_code = $User->shipping_postal_code;
            $Investment->shipping_country = $User->shipping_country;
        }elseif($request->shipping_address_radio == 2){
            $Investment->shipping_address = $request->address;
            $User->shipping_address = $request->address;
            $Investment->shipping_street_address = $request->shipping_street_address;
            $User->shipping_street_address = $request->shipping_street_address;
            $Investment->shipping_city = $request->shipping_city;
            $User->shipping_city = $request->shipping_city;
            $Investment->shipping_state = $request->shipping_state;
            $User->shipping_state = $request->shipping_state;
            $Investment->shipping_postal_code = $request->postal_code;
            $User->shipping_postal_code = $request->postal_code;
            $Investment->shipping_country = $request->shipping_country;
            $User->shipping_country = $request->shipping_country;

        }
        
        $Investment->created_at = date('Y-m-d H:i:s', strtotime($date));
        $Investment->updated_at = date('Y-m-d H:i:s', strtotime($date));
        $Investment->save();
        
        $InvestmentReward = new InvestmentReward();
        $InvestmentReward->investment_id = $Investment->id;
        $InvestmentReward->reward_id = $reward->id;
        $InvestmentReward->quantity = 1;
        $InvestmentReward->total = $reward->amount;
        $InvestmentReward->save();

        $InvestmentDetails = new InvestmentDetails();
        $InvestmentDetails->investment_id = $Investment->id;
        $InvestmentDetails->amount = $amount;
        $InvestmentDetails->payment_method = 1;


        //dummy data
        $InvestmentDetails->name = 1;
        $InvestmentDetails->number = 1;
        $InvestmentDetails->exp_year = 1;
        $InvestmentDetails->exp_month = 1;
        $InvestmentDetails->cvv = 1;
        
        $InvestmentDetails->save();

        


        return view('user.invest_payment', [
            'orderNo'   => $order_no,
            'amount'    => $amount,
            'date'      => $date,
            'retUrl'    => route('invest-payment-response'),
            'cancelUrl' => route('user-invest', ['id' => $request->id])
        ]);
    	// return redirect()->to(route('user-invest', ['id' => $request->id, 'finish' => true]));
		
    }

    function investPaymentResponse(Request $request){
        //dd($request->OrderID);

  
        
        $check = Investment::where('order_no', $request->OrderID)->where('status', false)->first();
        if($check){
            
            if(!$request->Approve) return redirect()->to(route('user-invest', ['id' => $check->project_id]))->with('error_message', '支払いが完了していません。もう一度お試しください');
    
            //percentage check starts

            $totalAmount=Investment::where('project_id',$request->id)->sum('amount');
            $totalBudget=Project::select('budget')->where('id',$request->id)->first();
            if( $totalAmount >= $totalBudget){
                Project::where('id',$request->id)->update(['status'=>2]);
            }

            //percentage check ends

            $check->status = true;
            $check->save();
            $User = User::find($check->user_id);
            $User->point = $User->point+$check->point;
            $User->save();
            // $project=Project::find($check->project_id);
            $project=Project::where('id', $check->project_id)->with('reward')->first();
            $project_owner=User::find($project->user_id);

            //send mail project Owner after project completion and payment time, not needed now, may be in future.
            // $emailData = [
            //     'name' => $project_owner->first_name.' '.$project_owner->last_name,
            //     'register_token' => $User->register_token,
            //     'subject' => '【Crofun】プロジェクト支援金の振込みについて',
            //     'from_email' => 'noreply@crofun.com',
            //     'from_name' => 'Crofun',
            //     'template' => 'user.email.31',
            //     'root'     => $request->root(),
            //     'email'     => $project_owner->email,
            //     'project_name'  =>$project->title,
            //     'total_funds' => $check->amount,
            //     'our_commission' => $check->amount * 10 / 100,
            //     'debit_transfer_amount'=> $check->amount

            // ];
    
            // Mail::to($project_owner->email)
            //     ->send(new Common($emailData));


            //send mail project Donner
            $emailData = [
                'name' => $User->first_name.' '.$User->last_name,
                'register_token' => $User->register_token,
                'subject' => '【Crofun】プロジェクト支援の御礼',
                'from_email' => 'noreply@crofun.jp',
                'from_name' => 'Crofun',
                'template' => 'user.email.11',
                'root'     => $request->root(),
                'email'     => Auth::user()->email,
                'founder'  => $project_owner->first_name.' '.$project_owner->last_name,
                'project_name'  => $project->title,
                'support_course' => $check->amount ,
                'return' => $project->reward[0]->is_other,
                

            ];
    
            Mail::to(Auth::user()->email)
                ->send(new Common($emailData));
            
             //send mail project owner
             $emailData = [
                'name' => $project_owner->first_name.' '.$project_owner->last_name,
                'register_token' => $User->register_token,
                'subject' => '【Crofun】'.$User->last_name.'様より支援を承りました',
                'from_email' => 'noreply@crofun.jp',
                'from_name' => 'Crofun',
                'template' => 'user.email.10',
                'root'     => $request->root(),
                'email'     => $project_owner->email,
                'person_name'  => $User->first_name.' '.$User->last_name,
                'amount_of_support'  => $check->amount,
                'project_url'  => 'http://crofun.jp/project-details/'.$check->project_id,

            ];
    
            Mail::to($project_owner->email)
                ->send(new Common($emailData));


            return redirect()->to(route('user-invest', ['id' => $check->project_id, 'finish' => true]));
        }

        return redirect()->to(route('front-home'));
    }
}
