<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use App\Models\Product;
use App\Models\FavouriteProduct;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\UserCard;
use App\Models\ProductColor;
use App\Models\ProductRank;
use App\Models\Profile;
use App\User;
use App\Mail\Common;

use Mail;
use Auth;
use Cart;
use Image;

use Yajra\Datatables\Facades\Datatables;
class OrderController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $data['title'] = "カタログ購入一覧";
        $data['user_id'] = 0;
        $data['category_id'] = 0;
        $data['status'] = null;
    	return view('admin.order.list', $data);
    }

    public function data()
    {
        $OrderDetail = OrderDetail::whereHas('order', function ($query) {
            $query->where('status', 1);
        })->get();

        return Datatables::of($OrderDetail)

        ->editColumn('created_at', function($result){
            return str_limit($result->created_at, $limit=11, $end='');
        })
        ->addColumn('order_by', function ($result) {
            return '<a href="'.route('admin-user-details',['id'=>$result->order->user_id]).'">'. $result->order->order_by->first_name.' '.$result->order->order_by->last_name.'</a>
                    <button id="msg_send_btn" onclick="buyerId(this,'.$result->order->user_id.')" class="p-2 text-white btn btn-md btn-block btn-default w6-14 " data-user_id="'.$result->order->user_id.'" data-project_username="'.$result->order->order_by->first_name.' '.$result->order->order_by->last_name.'" style="cursor:pointer; color:#fff;background-color:gray !important;font-size:12px"> <span style="color:#fff !important;">
                        <i class="fa fa-envelope"></i> </span>メッセージを送る
                    </button>';
        })
        ->addColumn('purchase_price', function ($result) {
            return number_format($result->order->total_point);
        })
        ->addColumn('deposit_price', function ($result) {
            return number_format($result->order->total_point);
        })
        ->addColumn('product_owner', function ($result) {
            return '<a href="'.route('admin-user-details',['id'=>$result->product->user_id]).'">'. $result->product->user->first_name.' '.$result->product->user->last_name.'</a>
                    <button id="msg_send_btn" onclick="ownerId(this,'.$result->product->user_id.')" class="p-2 text-white btn btn-md btn-block w6-14 btn-default" data-user_id="'.$result->product->user_id.'" data-project_username="'.$result->product->user->first_name.' '.$result->product->user->last_name.'" style="cursor:pointer; color:#fff;background-color:gray !important;font-size:12px"> <span style="color:#fff !important;">
                        <i class="fa fa-envelope"></i> </span>メッセージを送る
                    </button>';
        })
        ->editColumn('order_no', function ($result) {
            return '<a href="'.route('admin-order-details',['id'=>$result->order->id]).'" target="_blank">'.$result->order->order_no.'</a>';
        })
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-info">Pending</span>';
            }
            else if ($result->status==1) {
                return '<span style="color:#FF391A">新規受注</span>';
            }
            else if ($result->status==2) {
                return '<span  style="color:#FFBC00">配送準備中</span>';
            }
            else if ($result->status==3) {
                return '<span style="color:#6BB82D">配送済み</span>';
            }
            else if ($result->status==4) {
                return '<span  style="color:#4B4B4B">キャンセル</span>';
            }
            else{
                return '<span class="text-default">Unknown</span>';
            }
        })
        ->addColumn('action', function ($result) {
            $returnData = '';
            if($result->status == 4){
                $returnData = '';
            }
            else{
                if ($result->order->payment_status==1) {
                    $returnData .= '
                        <select id="modalOption" onchange="selectvalue(this,'.$result->order->id.');" class="form-control order_actions" data-id = '.$result->order->id.' data-order-id =  '.$result->order->id.'>
                            <option value="1" selected style="color:red;font-size:14px" >入金前</option>
                            <option value="2" style="color:#FFBC00;font-size:14px">入金予定</option>
                            <option value="3" style="color:green;font-size:14px" >入金完了</option>
                        </select>
                    ';
                }
                else if ($result->order->payment_status==2) {
                    $returnData .= '
                        <select id="modalOption" class="form-control order_actions" onchange="selectvalue(this,'.$result->order->id.')" data-id = '.$result->order->id.'  data-order-id = '.$result->order->id.'>
                            <option  class="color2" style="color:#FFBC00;font-size:14px" value="2" selected>入金予定</option>
                            <option  class="color3" style="color:green;font-size:14px" value="3" >入金完了</option>
                        </select>
                        ';
                }
                else if ($result->order->payment_status==3) {
                    $returnData .= '
                        <select id="modalOption" class="form-control order_actions" onchange="selectvalue(this,'.$result->order->id.')" data-id = '.$result->order->id.' data-order-id = '.$result->order->id.'>
                            <option class="color3" style="color:green;font-size:14px" value="3" selected>入金完了</option>
                        </select>
                    ';
                }
            }
        return $returnData;

        })
        ->rawColumns(['order_no','created_at', 'order_by', 'action', 'product_owner' ,'status','price'])
        ->make(true);
    }

    public function data2()
    {
        $OrderDetail = OrderDetail::leftJoin('orders', 'orders.id','=','order_details.order_id')
                            ->leftJoin('users', 'users.id','=','orders.user_id')
                            ->leftJoin('products', 'products.id','=','order_details.product_id')
                            ->whereIn('order_details.product_id', Product::where('user_id', Auth::user()->id)->get()->pluck(['id']))
                            ->select(['*','order_details.status as status','order_details.id as order_details_id'])
                            ->get();

        return Datatables::of($OrderDetail)

        ->editColumn('created_at', '{!! date("j M Y h:i A", strtotime($created_at)) !!}')
        ->addColumn('order_by', function ($result) {
            return $result->first_name.' '.$result->last_name;
        })
        ->editColumn('title', function ($result) {
            return '<a href="'.route('front-product-details',['id'=>$result->id]).'" target="_blank">'.$result->title.'</a>';
        })
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-info">Pending</span>';
            }
            else if ($result->status==1) {
                return '<span class="text-success">Active</span>';
            }
            else if ($result->status==2) {
                return '<span class="text-primary">Delivered</span>';
            }
            else if ($result->status==3) {
                return '<span class="text-warning">Hold</span>';
            }
            else if ($result->status==4) {
                return '<span class="text-danger">Rejected</span>';
            }
            else{
                return '<span class="text-default">Unknown</span>';
            }
        })
        ->addColumn('action', function ($result) {
            $returnData = '';

            if ($result->status==0) {

                $returnData .= '<div class="dropdown">
		    <button class="dropbtn">Dropdown
		      <i class="fa fa-caret-down"></i>
		    </button>
		    <div class="dropdown-content"><a href="'.route('user-order-status-change',['id'=>$result->order_details_id, 'status'=>1]).'" class="">Active</a> <a href="'.route('user-order-status-change',['id'=>$result->order_details_id, 'status'=>4]).'" class="">R</a>    </div>
			  </div>';
            }
            else if ($result->status==1) {
                $returnData .= '<div class="dropdown">
		    <button class="dropbtn">Dropdown
		      <i class="fa fa-caret-down"></i>
		    </button>
		    <div class="dropdown-content"><a href="'.route('user-order-status-change',['id'=>$result->order_details_id, 'status'=>3]).'" class="">Hold</a> <a href="'.route('user-order-status-change',['id'=>$result->order_details_id, 'status'=>4]).'" class="">R</a> </div></div>';
            }
            else if ($result->status==3) {
                $returnData .= '<div class="dropdown">
		    <button class="dropbtn">Dropdown
		      <i class="fa fa-caret-down"></i>
		    </button>
		    <div class="dropdown-content"><a href="'.route('user-order-status-change',['id'=>$result->order_details_id, 'status'=>1]).'" class="">Active</a>   </div>  </div>';
            }
            return $returnData;
        })
        ->rawColumns(['order_no','created_at', 'order_by', 'action', 'status'])
        ->make(true);
    }

    public function statusChange(Request $request)
    {
        $OrderDetail = OrderDetail::find($request->id);
        $OrderDetail->status = $request->status;
        $OrderDetail->save();
        //send mail to seller
        if($request->status == 2){
            $order = Order::find($OrderDetail->order_id);
            $buyer = User::find($order->user_id);
            $product = Product::find($OrderDetail->product_id);
            $seller = User::find($product->user_id);
            $emailData = [
                'name' => $seller->first_name.' '.$seller->last_name,
                'register_token' =>'',
                'subject' => '【Crofun】商品発送の件、承りました',
                'from_email' => 'noreply@crofun.jp',
                'from_name' => 'Crofun',
                'template' => 'user.email.27',
                'root'     => $request->root(),
                'email'     => $seller->email,
                'product_name'  =>$product->title,
                'point' =>$OrderDetail->total_point,
                'user_name' =>$buyer->first_name.' '.$buyer->last_name,
                'delivery_address'=>$order->custom_address,
                'shipping_company' =>$order->shipping_company,
                'date_and_time_of_arrangement' =>'',
                'voucher_number' =>$order->order_no,
                
                ];
        
                Mail::to($seller->email)
                    ->send(new Common($emailData));
        }

        elseif($request->status == 3){
            //send mail to buyer
            $order = Order::find($OrderDetail->order_id);
            $buyer = User::find($order->user_id);
            $product = Product::find($OrderDetail->product_id);
            $emailData = [
                'name' => $buyer->first_name.' '.$buyer->last_name,
                'register_token' =>'',
                'subject' => '【Crofun】商品発送のお知らせ',
                'from_email' => 'noreply@crofun.jp',
                'from_name' => 'Crofun',
                'template' => 'user.email.26',
                'root'     => $request->root(),
                'email'     => $buyer->email,
                'product_name'  =>$product->title,
                'point' =>$OrderDetail->total_point,
                'user_name' =>$buyer->first_name.' '.$buyer->last_name,
                'delivery_address'=>$order->custom_address,
                'shipping_company' =>$order->shipping_company,
                'date_and_time_of_arrangement' =>'',
                'voucher_number' =>$order->order_no,
                ];
                Mail::to($buyer->email)
                    ->send(new Common($emailData));
        }
        return redirect()->back()->with('success_message', 'status updated');
    }
    
    public function orderStatusChange(Request $request)
    {
        $Order = Order::find($request->id);
        $Order->status = $request->status;
        $Order->save();
        return redirect()->back()->with('success_message', 'status updated');
    }

    public function paymentStatusChange(Request $request)
    {
        $Order = Order::find($request->id);
        $Order->payment_status = $request->status;
        $Order->save();
        return redirect()->back()->with('success_message', 'status updated');
    }

    public function paymentDate(Request $request){
        $Order = Order::where('id', $request->id)->first();
        $Order->seller_payment_date = $request->seller_payment_date;
        $Order->save();
        return redirect()-> route('admin-payment-status-change',['id'=>$request->id, 'status'=>$request->status]);
    }
    
    public function orderCancel(Request $request){
        $Order = Order::where('id', $request->id)->first();
        $Order->cancel_content = $request->cancel_content;
        $Order->save();
        if ($request->detail_id) {
            return redirect()-> route('user-order-status-change',['id'=>$request->detail_id, 'status'=>$request->status]);
        }
        return redirect()-> route('user-order-details-status-change',['id'=>$request->id, 'status'=>$request->status]);
    }

    public function orderDetails(Request $request)
    {
        $data['order'] = Order::where('id', $request->id)->first();
        $data['orderDetails'] = OrderDetail::where('order_id', $request->id)->with('product')->get();
        $data['orderDetailsFull']=OrderDetail::where('order_id', $request->id)->get();
        return view('admin.order.details', $data);
    }
}
