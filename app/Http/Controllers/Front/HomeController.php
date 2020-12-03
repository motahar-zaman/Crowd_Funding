<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-16 13:36:56
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-16 13:37:10
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Investment;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\Product;
use App\Models\RecentlyViewedProduct;
use App\Models\FavouriteProduct;
use App\User;
use Carbon\Carbon;
use App\Mail\Common;
use App\Models\ContactUs;
use App\Models\FavouriteProject;
use Illuminate\Pagination\LengthAwarePaginator;

use Cart;
use Auth;
use Mail;
use DB;

class HomeController extends Controller
{
	public function __construct()
    {

    }

    public function test()
    {

        return view('user.invest_payment');

        $shopId = '9101225942865';
        $shopName = 'Clofan';
        $shopPassword = 'k555429a';

        // \GMO\API\Defaults::setShopID($shopId);
        // \GMO\API\Defaults::setShopName($shopName);
        // \GMO\API\Defaul ts::setPassword($shopPassword);
        define('GMO_SHOP_ID', $shopId); // ショップＩＤ
        define('GMO_SHOP_PASSWORD', $shopPassword); // ショップ名
        define('GMO_SHOP_NAME', $shopName); // ショップパスワード
        define('GMO_TRIAL_MODE', false);


        // A wrapper object that does everything for you.
        $payment = new \GMO\ImmediatePayment();
         // Unique ID for every payment; probably should be taken from an auto-increment field from the database.
        $payment->paymentId = time();
        $payment->amount = '100';
        // This card number can be used for tests.
        $payment->cardNumber = '4111111111111111';
        // A date in the future.
        $payment->cardYear = '2020';
        $payment->cardMonth = '12';
        $payment->cardCode = '123';

        // Returns false on an error.
        if (!$payment->execute()) {
            $errors = $payment->getErrors();
            dd($errors);
            return redirect()->back()->with('error_message', 'payment failed');
            foreach ($errors as $errorCode => $errorDescription) {
                // Show an error code and a description to the customer? Your choice.
                // Probably you want to log the error too.
            }
            // return;
        }

        // Success!
        $response = $payment->getResponse();
        dd($response);

        return view('auth.email.reset', ['token' => 'sdfsdf']);

        // $data = [

        //         'amount' => 1000,
        //         'currency' => 'JPY',
        //         'metadata' => [
        //             'foobar' => 'hoge'
        //         ],
        //         'payment_details' => [
        //             'family_name' => 'Yamada',
        //             'given_name' => 'Taro',
        //             'month' => 12,
        //             'number' => '4111111111111111',
        //             'type' => 'credit_card',
        //             'verification_value' => '123',
        //             'year' => 2018
        //         ]

        // ];


        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL,"https://sandbox.komoju.com/api/v1/payments");
        // curl_setopt($ch, CURLOPT_USERNAME, 'sk_a9c133483cba199c92e5e5b38f71d47e5b3c16e6');
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        // in real life you should use something like:
        // curl_setopt($ch, CURLOPT_POSTFIELDS,
        //          http_build_query(array('postvar1' => 'value1')));

        // receive server response ...
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // $server_output = curl_exec ($ch);

        // curl_close ($ch);

        // dd(json_decode($server_output));







        // $client = new \GuzzleHttp\Client();

        // $res = $client->post('https://sandbox.komoju.com/api/v1/payments', $data);
        // dd($res);
        //echo $res->getStatusCode(); // 200
        // dd($res->getBody());
    }

    public function index(Request $request)
    {
        // $start = strtotime("now");
        // $end = strtotime(date('Y-m-d 23:59:59', strtotime($p->end)));
        // $days_between = ceil(abs($end - $start) / 86400);

        Project::where('start', '>', Carbon::now())->update(['starting_status' => 2]);
        Project::where('start', '<=', Carbon::now())->update(['starting_status' => 1]);
        $projects = Project::select('projects.*', DB::raw('projects.end  >=  CURRENT_TIMESTAMP() As current_projects'))
                            ->where('projects.status', 1)
                            ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                            // ->where('projects.end','<', projects.end)

                            ->orderBy('current_projects','desc')
                            ->orderBy('starting_status', 'asc')
                            ->orderBy('start', 'desc')
                            ->limit(9)
                            ->get();

        $most_earned_100 = Project::select('projects.*',
                                        DB::raw('SUM(investments.amount)/projects.budget As total'),
                                        DB::raw('SUM(investments.amount) As x'),
                                        DB::raw('projects.budget As y'))
                                    ->where('projects.status', 1)
                                    ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                                    ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
                                    ->groupBy('projects.id')
                                    ->orderby('total','desc')
                                    ->orderBy('projects.end', 'asc')
                                    ->limit(3)
                                    ->get();

                
        $most_earned = Project::select('projects.*', DB::raw('SUM(investments.amount) As total'))
                        ->where('projects.status', 1)
                        ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                        // ->where('investments.status', 1)
                        ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
                        ->groupBy('projects.id')
                        ->orderby('total','desc')
                        ->orderby('end','desc')
                        ->limit(3)
                        ->get();
        $most_donors = Project::select('projects.*', DB::raw('COUNT(investments.amount) As total'))
                        ->where('projects.status', 1)
                        ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                        // ->where('investments.status', 1)
                        ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
                        ->groupBy('projects.id')
                        ->orderby('total','desc')
                        ->orderby('end','desc')
                        ->limit(3)
                        ->get();
        // $most_solds = Product::with('orderDetails')->get()->sortByDesc(function($most_solds)
        //             {
        //                 return $most_solds->orderDetails->where('status', 2)->count();
        //             })->take(3);
        $most_solds = Product::select('products.*', DB::raw('COUNT(order_details.id) As total'))
                    ->where('products.status', 1)
                    // ->where('investments.status', 1)
                    ->leftJoin('order_details', 'order_details.product_id', '=', 'products.id')
                    ->groupBy('products.id')
                    ->orderby('total','desc')
                    ->limit(3)
                    ->get();

        $data['projects'] = $projects;
        $data['most_earned_100'] = $most_earned_100;
        $data['most_earned'] = $most_earned;
        $data['most_donors'] = $most_donors;
        $data['most_solds'] = $most_solds;
        if(Auth::check()){
            $user = User::where('id', Auth::user()->id)->with('profile')->first();
            $data['user'] = $user;
            // dd($data['user'] );
        }
        // dd('asdasd');
                // dd($projects);
        $data['title'] = 'Crofun';        
    	return view('front.home', $data);
    }

    public function projectList(Request $request)
    {
        $data['projects'] = $this->projectData($request);
        // return view('front.project_list', $data);
       
        if($request->s == 'd'){
            $data['totalProjects'] = Project::where('projects.status', 1)->count('projects.id');
        } elseif($request->s == 'per'){
            $data['totalProjects'] = Project::select('projects.*', 
                                                    DB::raw('SUM(investments.amount)/projects.budget As total'), 
                                                    DB::raw('SUM(investments.amount) As x'),
                                                    DB::raw('projects.budget As y'))
                                    // ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
                                    ->where('projects.status', 1)
                                    // ->where('investments.status', 1)
                                    // ->groupBy('projects.id')
                                    ->count('projects.id');
            // $data = Project::where('status', 1);
        } elseif($request->s == 'c'){
            // $data = Project::where('status', 1);
            $data['totalProjects'] = Project::select('projects.*', DB::raw('SUM(investments.amount) As total'))
                    ->where('projects.status', 1)
                    // ->where('investments.status', 1)
                    ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
                    ->groupBy('projects.id')
                    // ->orderBy('projects.starting_status', 'asc')
                    // ->orderby('total','desc')
                    ->count('projects.id');
        } elseif($request->s == 'i'){
            $data['totalProjects']= Project::select('projects.*', DB::raw('COUNT(investments.amount) As total'))
                        ->where('projects.status', 1)
                        // ->where('investments.status', 1)
                        ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
                        ->groupBy('projects.id')
                        // ->orderBy('projects.starting_status', 'asc')
                        // ->orderby('total','desc')
                        ->count('projects.id');
        } elseif($request->s == 'p'){
            $data['totalProjects']= Project::where('status', 1)->count('id');
        }

        if(!empty($request->c) && $request->c != 'p'){
            $data['totalProjects'] =Project::where('status', 1)
                                            ->where('start', '<=', Carbon::today())
                                            ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                                            ->where('category_id', $request->c)
                                            ->count('id');
        }
        if((!empty($request->s) && $request->s == 'd') || (empty($request->s) && empty($request->c))){
            $data['totalProjects'] = Project::where('status', 1)
                                            ->where('start', '<=', Carbon::today())
                                            ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                                            ->count('id');
        }
        if(!empty($request->s) && $request->s == 'c'){
            $data['totalProjects'] = Project::where('status', 1)
                                            ->where('start', '<=', Carbon::today())
                                            ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                                            ->count('id');
        }
        if(!empty($request->title)){
            $data['totalProjects'] = Project::where('status', 1)
                                            ->where('start', '<=', Carbon::today())
                                            ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                                            ->where('title', 'like', '%'.$request->title.'%')->count('id');
        }
        if(!empty($request->min_point)){
            $data['totalProjects'] = Project::where('status', 1)
                                            ->where('start', '<=', Carbon::today())
                                            ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                                            ->whereHas('reward', function ($query) use ($request){
                                                $query->where('crofun_amount', '>=', $request->min_point);
                                            })
                                            ->count('id');
        }

        
			return view('front.project_list', $data);

    }
    public function projectListbycat(Request $request)
    {
        $data['projects'] = $this->projectDataNewtop($request);
        // return view('front.project_list', $data);
        $data['rank'] = 0;

        if($request->s == 'd'){
            $ProjectData = Project::where('status', 1);
            $data['totalProjects'] = $ProjectData->count();
            // dd($data['totalProjects']);
        } elseif($request->s == 'per'){
            $ProjectData = Project::select('projects.*', 
                                                    DB::raw('SUM(investments.amount)/projects.budget As total'), 
                                                    DB::raw('SUM(investments.amount) As x'),
                                                    DB::raw('projects.budget As y'))
                                    // ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
                                    // ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                                    ->where('projects.status', 1);
                                    // ->where('investments.status', 1)
                                    // ->groupBy('projects.id');
                                    // ->count('projects.id');
            $data['totalProjects'] = $ProjectData->count('projects.id');
            // $data = Project::where('status', 1);
        } elseif($request->s == 'c'){
            // $data = Project::where('status', 1);
            $ProjectData  = Project::select('projects.*', DB::raw('SUM(investments.amount) As total'))
                                    // ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                                    ->where('projects.status', 1);
                    // ->where('investments.status', 1)
                    // ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
                    // ->groupBy('projects.id');
                    // ->orderBy('projects.starting_status', 'asc')
                    // ->orderby('total','desc')
                    // ->count('projects.id');
            $data['totalProjects'] = $ProjectData->count();
        } elseif($request->s == 'i'){
            $ProjectData = Project::select('projects.*', DB::raw('COUNT(investments.amount) As total'))
                        ->where('projects.status', 1)
                        // ->where('investments.status', 1)
                        ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
                        ->groupBy('projects.id');
                        // ->orderBy('projects.starting_status', 'asc')
                        // ->orderby('total','desc')
                        // ->count('projects.id');
            $data['totalProjects']= $ProjectData->count('projects.id');
        } elseif($request->s == 'p'){
            $ProjectData = Project::selectRaw('projects.*,count(favourite_projects.project_id) as total_fav')
                            //  ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                            ->where('projects.status', 1);



            // ==== old block
            // $ProjectData = Project::selectRaw('projects.*,count(favourite_projects.project_id) as total_fav')
            //                  ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
            //                 ->where('projects.status', 1);


                            // ->leftJoin('favourite_projects','projects.id','=','favourite_projects.project_id')
                            // ->groupBy('projects.id')
                            // ->orderBy('total_fav','desc')
                            // ->orderby('projects.end','desc');
            // $data['totalProjects']= Project::where('status', 1)->count('id');
            $data['totalProjects']= $ProjectData->count('id');            
        }

        if(!empty($request->c) && $request->c != 'p'){
            $ProjectDataCategory = $ProjectData->where('category_id', $request->c);
            $data['totalProjects'] = $ProjectDataCategory->count();
            // dd($data['totalProjects']);
        }
        // if((!empty($request->s) && $request->s == 'd') || (empty($request->s) && empty($request->c))){
        //     $data['totalProjects'] = Project::where('status', 1)->count('id');
        // }
        // if(!empty($request->s) && $request->s == 'c'){
        //     $data['totalProjects'] = Project::where('status', 1)->count('id');
        // }
        if(!empty($request->title)){
            $data['totalProjects'] = Project::where('status', 1)->where('title', 'like', '%'.$request->title.'%')->count('id');
        }
        if(!empty($request->min_point)){
            $data['totalProjects'] = Project::where('status', 1)->whereHas('reward', function ($query) use ($request){
                $query->where('crofun_amount', '>=', $request->min_point);
            })->count('projects.id');
            
        }

        // dd($data);
		return view('front.project_list', $data);

    }

    public function projectListByRank(Request $request)
    {
        $data['projects'] = $this->projectDataNewtop($request);
        $data['rank'] = 1;
        // return view('front.project_list', $data);
        

        if($request->s == 'd'){
            $data['totalProjects'] = Project::where('projects.status', 1)->count('projects.id');
        } elseif($request->s == 'per'){
            $data['totalProjects'] = Project::select('projects.*', 
                                                    DB::raw('SUM(investments.amount)/projects.budget As total'), 
                                                    DB::raw('SUM(investments.amount) As x'),
                                                    DB::raw('projects.budget As y'))
                                    // ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
                                    ->where('projects.status', 1)
                                    // ->where('investments.status', 1)
                                    // ->groupBy('projects.id')
                                    ->count('projects.id');
            // $data = Project::where('status', 1);
        } elseif($request->s == 'c'){
            // $data = Project::where('status', 1);
            $data['totalProjects'] = Project::select('projects.*', DB::raw('SUM(investments.amount) As total'))
                    ->where('projects.status', 1)
                    // ->where('investments.status', 1)
                    ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
                    ->groupBy('projects.id')
                    // ->orderBy('projects.starting_status', 'asc')
                    // ->orderby('total','desc')
                    ->count('projects.id');
        } elseif($request->s == 'r'){
            $data['totalProjects']= Project::select('projects.*', DB::raw('COUNT(investments.amount) As total'))
                        ->where('projects.status', 1)
                        // ->where('investments.status', 1)
                        // ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
                        // ->groupBy('projects.id')
                        // ->orderBy('projects.starting_status', 'asc')
                        // ->orderby('total','desc')
                        ->count('projects.id');
        } elseif($request->s == 'p'){
            
            $data['totalProjects']= Project::where('status', 1)->count('id');
        }

        if(!empty($request->c) && $request->c != 'p'){
            $data['totalProjects'] = Project::where('status', 1)->where('category_id', $request->c)->count('id');
        }
        if((!empty($request->s) && $request->s == 'd') || (empty($request->s) && empty($request->c))){
            
            $data['totalProjects'] = Project::where('status', 1)->count('id');
        }
        if(!empty($request->s) && $request->s == 'c'){
            $data['totalProjects'] = Project::where('status', 1)->count('id');
        }
        if(!empty($request->title)){
            $data['totalProjects'] = Project::where('status', 1)->where('title', 'like', '%'.$request->title.'%')->count('id');
        }
        if(!empty($request->min_point)){
            $data['totalProjects'] = Project::where('status', 1)->whereHas('reward', function ($query) use ($request){
                $query->where('crofun_amount', '>=', $request->min_point);
            })->count('projects.id');
            
        }
			return view('front.project_list', $data);

    }

    public function ratingProjectList(Request $request)
    {
            $data['projects'] = $this->projectData($request);
            // return view('front.project_list', $data);
            return view('front.project_list', $data);
    }

    public function search(Request $request)
    {
        $data['projects'] = $this->projectData($request);

    	return view('front.newsearch', $data);
    }

    private function projectData($request)
    {
        // dd($request);

        $data = Project::where('status', 1)
                        ->where('start', '<=', Carbon::today())
                        ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                        ->orderBy('starting_status', 'asc')
                        ->orderby('start','desc');
        if(!empty($request->c) && $request->c != 'p'){
            $data = $data->where('category_id', $request->c);
        }
        if((!empty($request->s) && $request->s == 'd') || (empty($request->s) && empty($request->c))){
            $data = $data->orderBy('start', 'desc');
        }
        if(!empty($request->s) && $request->s == 'c'){
            $data = $data->orderBy('end', 'asc');
        }
        if(!empty($request->title)){
            $data = $data->where('title', 'like', '%'.$request->title.'%');
        }
        if(!empty($request->min_point)){
            $data = $data->whereHas('reward', function ($query) use ($request){
                $query->where('crofun_amount', '>=', $request->min_point);
            });
        }


        $paginated_data = $data->paginate(9);
        $data = false;
        if($request->c == 'p' || $request->s == 'p'){
            $data = $paginated_data->sortByDesc(function($project)
            {
                return $project->favourite->count();
            });
        }
        if($request->s == 'i'){
            $data = $paginated_data->sortByDesc(function($project)
            {
                return $project->investment->sum('amount');
            });
        }

        if($data){
            return new LengthAwarePaginator($data, $paginated_data->total(), $paginated_data->perPage());
        }
        return $paginated_data;


    }

    private function projectDataNewtop($request)
    {
        
        if($request->s == 'd'){
            
            $data = Project::select('projects.*', 
                                        DB::raw('projects.end  >=  CURRENT_TIMESTAMP() As current_projects')
                                    )
                            ->where('status', 1)
                            ->orderBy('current_projects','desc')
                            ->orderBy('starting_status', 'asc')
                            ->orderBy('start','desc');
                            // dd($data->get());
        } elseif($request->s == 'per'){
            $data = Project::select('projects.*', 
                                    DB::raw('SUM(investments.amount)/projects.budget As total'), 
                                    DB::raw('SUM(investments.amount) As x'),
                                    DB::raw('projects.budget As y'))
                    ->where('projects.status', 1)
                    // ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                    // ->where('investments.status', 1)
                    ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
                    ->groupBy('projects.id')
                    ->orderBy('projects.starting_status', 'asc')
                    ->orderby('total','desc');
            // $data = Project::where('status', 1);
        } elseif($request->s == 'c'){
            // $data = Project::where('status', 1);
            $data = Project::select('projects.*', DB::raw('SUM(investments.amount) As total'))
                    ->where('projects.status', 1)
                    // ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                    // ->whereOr('insvestments.project_id', null)
                    // ->where('investments.status', 1)
                    ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
                    ->groupBy('projects.id')
                    ->orderBy('projects.starting_status', 'asc')
                    
                    ->orderby('total','desc')
                    ->orderby('projects.end','desc');
                //    dd($data->get());
        } elseif($request->s == 'r'){
            $data = Project::select('projects.*', 
                        DB::raw('COUNT(investments.amount) As total'),
                        DB::raw('projects.end  >=  CURRENT_TIMESTAMP() As current_projects'),
                        DB::raw('(CASE WHEN SUM(investments.amount)/projects.budget > 0 THEN SUM(investments.amount)/projects.budget ELSE 0 END) As total_percentage')
                        )
            ->whereIn('projects.status', [1,2])
            ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
            ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
            ->groupBy('projects.id')
            ->orderBy('current_projects','desc')
            ->orderBy('is_100%','asc')
            ->orderBy('total','desc')
            ->orderBy('start','desc');
            // $data = Project::where('status',1)->where('end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
            // $data = Project::select('projects.*', 
            //                         DB::raw('COUNT(investments.amount) As total'),
            //                         DB::raw('projects.end  >=  CURRENT_TIMESTAMP() As current_projects'),
            //                         DB::raw('(CASE WHEN SUM(investments.amount)/projects.budget > 0 THEN SUM(investments.amount)/projects.budget ELSE 0 END) As total_percentage')
            //                         )
            //             ->whereIn('projects.status', [1,2])
            //             ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
            //             ->leftJoin('investments', 'investments.project_id', '=', 'projects.id')
            //             ->groupBy('projects.id')
            //             ->orderBy('current_projects','desc')
            //             ->orderBy('status','asc')
            //             ->orderBy('total','desc')
            //             ->orderBy('start','desc');
                        // dd($data->get());
        } elseif($request->s == 'p'){
           

            //  ======== old code block
            // $data = Project::selectRaw('projects.*,count(favourite_projects.project_id) as total_fav')
            //                 ->where('projects.status', 1)
            //                 ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
            //                 ->leftJoin('favourite_projects','projects.id','=','favourite_projects.project_id')
            //                 ->groupBy('projects.id')
            //                 ->orderBy('total_fav','desc')
            //                 ->orderby('projects.end','desc');
           
 


            $data = Project::selectRaw('projects.*,count(favourite_projects.project_id) as total_fav')                            
                            // ->where('projects.end', '>=', Carbon::now()->subDays(365)->toDateTimeString())
                            ->leftJoin('favourite_projects','projects.id','=','favourite_projects.project_id')
                            ->where('projects.status', 1)
                            ->whereOr('favourite_projects.project_id', null)
                            ->groupBy('projects.id')
                            ->orderBy('total_fav','desc')
                            ->orderby('projects.end','desc');
           

            
            // dd($data->get());
            

            // $data = DB::raw("SELECT p.id, p.user_id, p.category_id, p.sub_category, p.is_featured, p.title, p.purpose, p.beneficiary, p.description, p.colors, p.budget, 
            //         p.budget_usage_breakdown, p.start, p.end, p.featured_image, p.status, p.starting_status, p.`is_100%`,
            //         p.created_at, p.updated_at,count(fp.project_id) as total_fav
            //         FROM favourite_projects as fp
            //         right join  `projects` as p on (fp.project_id = p.id)
            //         where p.status=1
            //         GROUP by p.id
            //         order by total_fav desc,p.end DESC
            // ");
                        
            
            // dd($data->get());
            
            
            // FavouriteProject::selectRaw('projects.*, count(fp.project_id) as total_fav')
            //                 ->where('projects.status', 1)                           
            //                 ->rightJoin('favourite_projects as fp','projects.id','=','fp.project_id')
            //                 ->groupBy('projects.id')
            //                 ->orderBy('total_fav','desc'); 
            // select * from favourite_projects RIGHT JOIN projects on (favourite_projects.project_id = projects.id) where projects.status=1

            // \DB::enableQueryLog();
            // dd(\DB::getQueryLog());
            // dd($projectsList->get(), $projectsFavouriteList);
        }

        if(!empty($request->c) && $request->c != 'p'){
            $data = $data->where('category_id', $request->c);
        }
        // if((!empty($request->s) && $request->s == 'd') || (empty($request->s) && empty($request->c))){
        //     $data = $data->orderBy('start', 'desc');
        // }
        // if(!empty($request->s) && $request->s == 'c'){
        //     $data = $data->orderBy('end', 'asc');
        // }
        if(!empty($request->title)){
            $data = $data->where('title', 'like', '%'.$request->title.'%');
        }
        if(!empty($request->min_point)){
            $data = $data->whereHas('reward', function ($query) use ($request){
                $query->where('crofun_amount', '>=', $request->min_point);
            });
        }

        $paginated_data = $data->paginate(9);
        $data = false;

       // dd($data,$paginated_data);
        // if($request->c == 'p' || $request->s == 'p'){
        //     $data = $paginated_data->sortByDesc(function($project)
        //     {
        //         return $project->favourite->count();
        //     });
        // }
        // if($request->s == 'c'){
        //     $data = $paginated_data->sortByDesc(function($project)
        //     {
        //         return $project->investment->sum('amount');
        //     });
        // }
        // if($request->s == 'per'){
        //     $data = $paginated_data->sortByDesc(function($project)
        //     {
        //         return $project->investment->where('status', 1)->sum('amount')/$project->budget;
        //     });
        // }

        if($data){
            return new LengthAwarePaginator($data, $paginated_data->total(), $paginated_data->perPage());
        }
        return $paginated_data;


    }

    public function projectDetails(Request $request)
    {
        $query = Project::where('status', 1)->where('id', $request->id);
        $data['isFavourite'] = [];
        if(Auth::check()){
          $data['isFavourite'] = Investment::where('project_id', $request->id)->where('user_id', Auth::user()->id)->first();
          $data['favourite'] = FavouriteProject::where('project_id', $request->id)->where('user_id', Auth::user()->id)->first();
        }

        if(Auth::check()){
            $query = $query->withCount(['favourite' => function($q){
                $q->where('user_id', Auth::user()->id);
            }]);
            $user = User::where('id', Auth::user()->id)->with('profile')->first();
            $data['user'] = $user;
            $data['user_profile'] = User::where('id', Auth::user()->id)->first();
            
        }
        $data['supports'] = Investment::where('project_id', $request->id)->where('status', true)->count();
        $data['project'] = $query->with('user')->first();
				// dd($data['project']);
				// dd($data['project']);
        // dd($data['project']);
        $data['social_title'] = $data['project']->title;
        $data['social_image'] = asset('uploads/projects/'. $data['project']->featured_image);
        $data['social_description'] = $data['project']->description ;
        $data['title'] = 'プロジェクト - '. $data['project']->title .' | Crofun';
        // dd($data);
        return view('front.project_details', $data);
    }

    // public function projectDoneStatus(Request $request){
    //     $project = Project::find($request->id);
    //     $project->status = $request->status;
    //     $project->save();
    //     return redirect()->back()->with('success_message', 'status updated');
    // }

    public function projectDetailsAfterLogin(Request $request){
        //  dd( $request->id);
        // return $request->id;


        return view('auth.login-project-details');
    }

    public function homeAfterLogin(){

        // return $request->id;
        return view('auth.login-project-details');
    }

    public function home_action(Request $request){
        if (!Auth::attempt($request->only(['email', 'password']) )) {
        return redirect()->back()->with('error', 'Credentials do not match');
        }
        return redirect()->route('front-home');
        // return 'hi';
    }

    public function login_project_details_action(Request $request){
        if (!Auth::attempt($request->only(['email', 'password']) )) {
        return redirect()->back()->with('error', 'Credentials do not match');
        }
        return redirect()->route('front-project-details', $request->id);
        // return 'hi';
    }

    public function productDetailsAfterLogin(Request $request){
        // dd( $request->id);
        // return $request->id;
        return view('auth.login-product-details');
    }

    public function login_product_details_action(Request $request){
        if (!Auth::attempt($request->only(['email', 'password']) )) {
            return redirect()->back()->with('error', 'Credentials do not match');
        }
        return redirect()->route('front-product-details', $request->id);
        // return 'hi';
    }

    public function productList(Request $request)
    {

        $pdata = $this->productData($request);
        $data['products'] = $pdata['data'];
        


       // dd($data);
        // $data['title'] = $pdata['title'];
        // dd($data);
        // $data['recent_products'] = [];

        // if(Auth::check()){
        //     $data['recent_products'] = RecentlyViewedProduct::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        // }
        // dd($data['recent_products']);
        // $data['featured_products'] = Product::where('status', 1)->where('is_featured', 1)->where('id', '!=', $request->id)->limit(8)->get();
        $data['title'] = $pdata['title'];
        return view('front.product_list', $data);
    }

    private function productData($request)
    {
        $title = 'カタログ一覧';
        $sampleData  = null;
        if($request->s == 'most'){
            // $products = Product::where('status', 1)->with('orderDetails')->sortByDesc(function($most_solds)
            //         {
            //             return $most_solds->orderDetails->where('status', 2)->count();
            //         });
            $products = Product::select('products.*', DB::raw('COUNT(order_details.id) As total'))
                    ->where('products.status', 1)
                    // ->where('investments.status', 1)
                    ->leftJoin('order_details', 'order_details.product_id', '=', 'products.id')
                    ->groupBy('products.id')
                    ->orderby('is_featured', 1)
                    ->orderby('total','desc');
                    
            $title = '人気の商品';
        } 
        if($request->s == 'p'){
            // echo "favourite";         


            //             select products.*, COUNT(*) AS TOTAL from `products`
            // left join `favourite_products` on `favourite_products`.`product_id` = `products`.`id`  
            // GROUP BY products.id
            //  order by `products`.`is_featured` desc, TOTAL desc

            $products = Product::select('products.*', DB::raw('COUNT(*) As total'))                                                     
                    ->leftJoin('favourite_products', 'favourite_products.product_id', '=', 'products.id') 
                    ->where('products.status', 1)                                    
                    ->groupBy('products.id')                       
                    ->orderByRaw('products.is_featured desc, total desc');
                    // ->orderby('total','desc');

                  
            $title = '人気の商品';
        } 
        
        else {
            // echo "others";
            $products = Product::where('status', 1)          
                        ->orderby('is_featured', 1)
                        ->orderBy('created_at', 'desc')            
                        ;

                         
        }
        if(!empty($request->c)){
            $products = $products->whereHas('subCategory', function($q) use ($request) {
                            $q->where('category_id', $request->c);
                        });
            $title = ProductCategory::find($request->c)->name;
        }
        if(!empty($request->sc)){
            $products = $products->where('subcategory_id', $request->sc);
            $catDetail = ProductSubCategory::with('category')->find($request->sc);
            $title = $catDetail->category->name.' / '.$catDetail->name;
            // $title = ProductSubCategory::find($request->sc)->name;
        }

        if(!empty($request->title)){
            $products = $products->where('title', 'like', '%'.$request->title.'%');
            $title = $request->title;
        }
        

        $paginated_data = $products->paginate(9)->setPath('/product-list');

        //  dd($paginated_data); 
        $data = false;


        // dd($products[0]->orderDetails);
        if($request->s == 'p'){            
            $data = $paginated_data->sortByDesc(function($product)
            {
                // return $data->orderDetails->sum('qty');
                return $product->favourite->count();
            });
            $title = 'お気に入り順';
        }

         
        if($data){        
            //  dd($data); 
            
            $paginated_data = new LengthAwarePaginator($data, $paginated_data->total(), $paginated_data->perPage());
            $paginated_data->setPath('/product-list');
            //  dd($paginated_data);
        }
       
        // dd($paginated_data);
        
        return ['data' => $paginated_data, 'title' => $title];
    }

    public function productDetails(Request $request)
    {
        $query = Product::where('status', 1)->where('id', $request->id);
        if(Auth::check()){
            $query = $query->withCount(['favourite' => function($q){
                $q->where('user_id', Auth::user()->id);
            }]);
            $user = User::where('id', Auth::user()->id)->with('profile')->first();
            $data['user'] = $user;
        }
        $data['product'] = $query->first();
        $company_name = $data['product']->company_name;
        $user_id = $data['product']->user_id;
        $data['any_two'] = Product::where('user_id', $user_id)-> where('id', '!=', $request->id)->where('status',1)->orderBy('created_at','DESC')->take(3)->get();
        $data['title'] = 'プロダクト - '.  $data['product']->title .' | Crofun';

        // dd($data);
        return view('front.product_details', $data);
    }

    public function cartAdd(Request $request)
    {
        if(!empty($request->id) && !empty($request->title) && !empty($request->quantity) && !empty($request->price)){
            $additionals = [];
            if(!empty($request->color)) $additionals['color'] = $request->color;
            if(!empty($request->size)) $additionals['size'] = $request->size;
            Cart::add($request->id, $request->title, $request->quantity, $request->price, $additionals);
        }
        return redirect()->route('front-product-details', ['id' => $request->id])->with('cart-success', 'カートに商品を追加しました。');
    }

    public function cartAddFavourite(Request $request)
    {
        if(!empty($request->id) && !empty($request->title) && !empty($request->quantity) && !empty($request->price)){
            $additionals = [];
            if(!empty($request->color)) $additionals['color'] = $request->color;
            if(!empty($request->size)) $additionals['size'] = $request->size;
            Cart::add($request->id, $request->title, $request->quantity, $request->price, $additionals);
        }
        return redirect()->route('user-favourite-product-list', ['id' => $request->id])->with('cart-success', 'カートに商品を追加しました。');
    }

    public function cartUpdate(Request $request)
    {
        Cart::update($request->row_id, $request->quantity);
        return redirect()->back();
    }

    public function cartRemove(Request $request)
    {
        Cart::remove($request->id);
        if(Cart::count() == 0){
            return redirect()->route( 'front-cart-empty' );
        } else {
            return redirect()->route( 'front-cart' );
        }
        // Cart::destroy();
    }

    public function cart(Request $request)
    {
        if(Auth::check()){
            $finish = false;
            if($request->finish){
                    $finish = true;
            }
            $data['finish'] = $finish;
            $data['user'] =  User::where('id', Auth::user()->id)->first();
            $data['title'] = 'カート | Crofun';
            return view('front.cart', $data);
        }else{
            return redirect()->route('front-cart-login');
        }
    }

    public function cartempty(Request $request)
    {      
        if(Auth::check()){
            $finish = false;
            if($request->finish){
                    $finish = true;
            }
            $data['finish'] = $finish;
            if(Auth::check()){
                $data['user'] =  User::where('id', Auth::user()->id)->first();
            }
            $data['title'] = 'カート | Crofun';
            return view('front.cartEmpty', $data);
        }else{
            return redirect()->route('front-cart-login');
        }
    }

    public function login_cart_action(Request $request){
        if(Cart::count() > 0){
            if (!Auth::attempt($request->only(['email', 'password']) )) {
                return redirect()->back()->with('error', 'Credentials do not match');
            }
            return redirect()->route('front-cart');
        }else{
            if (!Auth::attempt($request->only(['email', 'password']) )) {
                return redirect()->back()->with('error', 'Credentials do not match');
            }
            return redirect()->route('front-cart-empty');
        }
        // return 'hi';
    }
    public function cartAfterLogin(Request $request){
        return view('auth.login-cart');
    }

    public function checkOut(Request $request)
    {
        return view('front.checkout-backup');
    }

    public function companyProfile()
    {
        $data['content'] = Content::find(5);
        $data['title'] = '運営会社 | Crofun';
        return view('front.content', $data);
        // $data['iframeUrl'] = 'http://road-frontier.com/company';
        // return view('front.iframe', $data);
    }

    public function userProfile()
    {
        return view('front.user_profile');
    }

    public function userProjectDetails()
    {
        return view('front.user_project_details');
    }
    public function about()
    {
        $data['content'] = Content::find(1);
        $data['title'] = 'クロファンとは? | Crofun';
        return view('front.content', $data);
    }
    public function faq()
    {
        $data['content'] = Content::find(2);
        return view('front.faq', $data);
    }
    public function howToUse()
    {
        $data['content'] = Content::find(3);
        return view('front.content', $data);
    }
    public function media()
    {
        $data['content'] = Content::find(4);
        $data['title'] = 'メディア実績 | Crofun';
        return view('front.content', $data);
        // $data['iframeUrl'] = 'http://road-frontier.com/media';
        // return view('front.iframe', $data);
    }
    public function profile(Request $request)
    {
        $data['profile'] = User::find($request->id);
        return view('front.profile', $data);
    }
    public function terms()
    {
        $data['content'] = Content::find(6);
        $data['title'] = '利用規約 | Crofun';
        return view('front.content', $data);
    }
    public function privacy()
    {
        $data['content'] = Content::find(7);      
        $data['title'] = 'プライバシーポリシー | Crofun';  
        return view('front.content', $data);
    }
    public function transactionLaw()
    {
        $data['content'] = Content::find(8);
        $data['title'] = '特定商取引法に関する表記 | Crofun';
        return view('front.content', $data);
    }

    public function contact(){
        $data['title'] = 'Crofun';
        if(Auth::check()){
            $user = User::where('id', Auth::user()->id)->with('profile')->first();
            $data['username'] = $user->first_name.' '.$user->last_name;
            $data['useremail'] = $user->email;
            $data['user'] = $user;
            // dd($data['useremail'] );            
            return view('front.contact',$data);
        }else{
            
            return view('front.contact',$data);
        }
    }

    public function contactAction(Request $request){
        // dd($request['g-recaptcha-response']);
        if($request['g-recaptcha-response'] == null){
            $data = [
                'captcha_err' => 'あなたが人間であることを確認してください！'
            ];
            return view('front.contact', $data);
        }
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'details' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);
        $contact = new ContactUs();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->details = $request->details;

        $contact->save();

        //send to admin.......................
        $date = Carbon::now()->toDateTimeString();
        $emailData = [
            'name' => '',
            'register_token' =>'',
            'subject' => '【Crofun管理者用】新規問合せの通知',
            'from_email' => 'noreply@crofun.jp',
            'from_name' => 'Crofun',
            'template' => 'user.email.22',
            'root'     => $request->root(),
            'email'     => 'administrator@crofun.jp',
            'person_name'=> $request->name,
            'inquiry'  => $request->details,
            'inquiry_date' => $date,
            'inquiry_url' =>'https://crofun.jp/admin/contact-us/list',
            
            ];
            Mail::to('administrator@crofun.jp')
                ->send(new Common($emailData));

        //send mail to inquery person
        $emailData = [
            'name' => $request->name,
            'register_token' =>'',
            'subject' => '【Crofun】お問い合わせありがとうございます。',
            'from_email' => 'noreply@crofun.jp',
            'from_name' => 'Crofun',
            'template' => 'user.email.21',
            'root'     => $request->root(),
            'email'     => $request->email,
            'person_name'=> $request->name,
            'inquiry'  => $request->details,
            'inquiry_date' => $date,
            'inquiry_url' =>'',
                    
            ];
            Mail::to($request->email)
                ->send(new Common($emailData));
  

        return redirect()->back()->with('success_message', 'お問い合わせありがとうございました。');
    }

    public function passwordReset(){
       if(Auth::check()){
            Auth::logout();
            return redirect()->route('password.request');
        }else{
            return redirect()->route('password.request');
        }
    }

}
