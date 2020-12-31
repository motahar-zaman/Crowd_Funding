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
use App\Models\Product;
use App\Models\ProductsTemp;
use App\Models\ProductsColorTemp;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Mail\Common;
use App\Models\ProductColor;
use Mail;
use Auth;

class ProductController extends Controller
{
	public function __construct()
    {
        
    }

    public function productList(Request $request)
    {
        $data['title'] = "カタログ一覧";
        $data['user_id'] = 0;
        $data['category_id'] = 0;
    	$data['subcategory_id'] = 0;
        $data['status'] = null;
        if(!empty($request->user_id)){
            $data['user_id'] = $request->user_id;
        }
        if(!empty($request->category_id)){
            $data['category_id'] = $request->category_id;
        }
        if(!empty($request->subcategory_id)){
            $data['subcategory_id'] = $request->subcategory_id;
        }
        if($request->status !== null){
            $data['status'] = $request->status;
        }
    	return view('admin.product.list', $data);
    }

    public function data(Request $request)
    {
    	$query = Product::query();
        if(!empty($request->user_id)){
            $query->where('user_id', $request->user_id);
        }
        if(!empty($request->category_id)){
            $subcategories = ProductSubcategory::where('category_id', $request->category_id)->get()->pluck('id');
            $query->whereIn('subcategory_id', $subcategories);
        }
        if(!empty($request->subcategory_id)){
            $query->where('subcategory_id', $request->subcategory_id);
        }
        if($request->status !== null){
            $query->where('status', $request->status);
        }
        $Product = $query->whereIn('status',[1,3])->get();

        return Datatables::of($Product)
            ->addColumn('price', function ($result) {
                return number_format($result->price);
            })

        ->editColumn('created_at', function($result){
            return  str_limit($result->created_at, $limit = 11, $end = '');
        })

        ->addColumn('created_by', function ($result) {
            return '<a href="'.route('admin-user-details',['id'=>$result->user_id]).'">'. $result->user->first_name.' '.$result->user->last_name.'</a>
                    <button id="msg_send_btn" onclick="selectvalue(this,'.$result->user_id.')" class="p-2 text-white btn btn-md btn-block w6-14 btn-default" data-user_id="'.$result->user_id.'" data-project_username="'.$result->user->first_name.' '.$result->user->last_name.'" style="cursor:pointer; color:#fff;background-color:gray !important;font-size:12px"> <span style="color:#fff !important;">
                        <i class="fa fa-envelope"></i> </span>メッセージを送る
                    </button>';
        })

        ->addColumn('title', function ($result) {
            return '<a href="'.route('admin-product-details',['id'=>$result->id]).'">'.$result->title.'</a>';
        })
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-info">Pending</span>';
            }
            else if ($result->status==1) {
                return '<span class="text-success">公開</span>';
            }
            else if ($result->status==2) {
                return '<span class="text-primary">Out of Stock</span>';
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
        ->addColumn('action', function ($result) {
            $returnData = '';

            if ($result->is_featured==0) {
                $returnData .= '<a href="'.route('admin-product-feature-status-change',['id'=>$result->id, 'status'=>1]).'" class="btn btn-sm btn-success inline">オススメにする</a> ';
            }
            else{
                $returnData .= '<a href="'.route('admin-product-feature-status-change',['id'=>$result->id, 'status'=>0]).'" class="btn btn-sm btn-danger inline">オススメ削除</a> ';
            }
            if ($result->status==1) {
                $returnData .= '<a href="'.route('admin-product-status-change',['id'=>$result->id, 'status'=>3]).'" class="btn btn-sm btn-warning inline" style="color:#fff">非公開にする</a> ';
            }
            else if ($result->status==3) {
                $returnData .= '<a href="'.route('admin-product-status-change',['id'=>$result->id, 'status'=>1]).'" class="btn btn-sm btn-success inline">公開にする</a> ';
            }
            else{
            }
            return $returnData;
        })
        ->rawColumns(['title','created_at', 'created_by', 'action', 'status'])
        ->make(true);
    }

    public function productPendingList(Request $request)
    {
        $data['title'] = "申請中カタログ一覧";
        $data['user_id'] = 0;
        $data['category_id'] = 0;
    	$data['subcategory_id'] = 0;
        $data['status'] = null;
        if(!empty($request->user_id)){
            $data['user_id'] = $request->user_id;
        }
        if(!empty($request->category_id)){
            $data['category_id'] = $request->category_id;
        }
        if(!empty($request->subcategory_id)){
            $data['subcategory_id'] = $request->subcategory_id;
        }
        if($request->status !== null){
            $data['status'] = $request->status;
        }
    	return view('admin.product.pendingList', $data);
    }

    public function pendingData(Request $request)
    {
    	$query = Product::where('status',0)->orWhere('status', 4)->orderBy('created_at','desc');
        if(!empty($request->user_id)){
            $query->where('user_id', $request->user_id);
        }
        if(!empty($request->category_id)){
            $subcategories = ProductSubcategory::where('category_id', $request->category_id)->get()->pluck('id');
            $query->whereIn('subcategory_id', $subcategories);
        }
        if(!empty($request->subcategory_id)){
            $query->where('subcategory_id', $request->subcategory_id);
        }
        if($request->status !== null){
            $query->where('status', $request->status);
        }
        $Product = $query->get();
        return Datatables::of($Product)
        ->editColumn('created_at', function($result){
            return  str_limit($result->created_at, $limit = 11, $end = '');
        })
        ->addColumn('created_by', function ($result) {
            return '<a href="'.route('admin-user-details',['id'=>$result->user_id]).'">'. $result->user->first_name.' '.$result->user->last_name.'</a>
            <button id="msg_send_btn" onclick="selectvalue(this,'.$result->user_id.')" class="p-2 text-white btn btn-md btn-block w6-14 btn-default" data-user_id="'.$result->user_id.'" data-project_username="'.$result->user->first_name.' '.$result->user->last_name.'" style="cursor:pointer; color:#fff;background-color:gray !important;font-size:12px"> <span style="color:#fff !important;">
                            <i class="fa fa-envelope"></i> </span>メッセージを送る
                        </button>';
        })
        ->addColumn('price', function ($result) {
            return number_format($result->price);
        })

        ->addColumn('title', function ($result) {
            return '<a href="'.route('admin-product-details',['id'=>$result->id]).'">'.$result->title.'</a>';
        })
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-info">申請中</span>';
            }
            else if ($result->status==1) {
                return '<span class="text-success">Active</span>';
            }
            else if ($result->status==2) {
                return '<span class="text-primary">Out of Stock</span>';
            }
            else if ($result->status==3) {
                return '<span class="text-warning">Hold</span>';
            }
            else if ($result->status==4) {
                return '<span class="text-danger">拒否</span>';
            }
            else{
                return '<span class="text-default">Unknown</span>';
            }
        })
        ->addColumn('action', function ($result) {
            $returnData = '';

            $returnData .= '<a href="'.route('admin-product-details', ['id' => $result->id]).'" class="btn btn-sm btn-success">詳細をみる</a>';

            if ($result->status==1) {
                $returnData .= '<a href="'.route('admin-product-status-change',['id'=>$result->id, 'status'=>3]).'" class="btn btn-sm btn-warning inline">Hold</a> ';
                $returnData .= '<a href="'.route('admin-product-status-change',['id'=>$result->id, 'status'=>4]).'" class="btn btn-sm btn-danger inline">Reject</a> ';
            }
            else if ($result->status==3) {
                $returnData .= '<a href="'.route('admin-product-status-change',['id'=>$result->id, 'status'=>1]).'" class="btn btn-sm btn-success inline">承認する</a> ';
                $returnData .= '<a href="'.route('admin-product-status-change',['id'=>$result->id, 'status'=>4]).'" class="btn btn-sm btn-danger inline">拒否する</a> ';
            }
            else{
            }
            return $returnData;
        })
        ->rawColumns(['title','created_at', 'created_by', 'action', 'status'])
        ->make(true);
    }

    public function statusChange(Request $request)
    {
        $Product = Product::find($request->id);
        $Product->status = $request->status;

        $no_of_time_added = 1;
        if($request->status == 1) {
            if ($Product->no_of_time_added <=1) {
                $no_of_time_added = $Product->no_of_time_added + 1;           
            }                               
            else {                                
                $no_of_time_added = 2;                                                
            }            
        }        
        // echo $no_of_time_added;
        $Product->no_of_time_added = $no_of_time_added;
        $Product->save();


        //temporary product data remove
        $countProductsTemp = ProductsTemp::where('product_id', $request->id)->count();
        if ($countProductsTemp > 0 ) {
            ProductsTemp::where('product_id', $request->id)->delete();
        }
        
        //temporary color data remove
        $countProductsColorTemp = ProductsColorTemp::where('product_id', $request->id)->count();
        if ($countProductsColorTemp > 0 ) {
            ProductsColorTemp::where('product_id', $request->id)->delete();
        }

        if($Product->status == 4){
        $seller = User::find($Product->user_id);
        $emailData = [
            'name' => $seller->first_name.' '.$seller->last_name,
            'register_token' =>'',
            'subject' => '【Crofun】商品掲載選考結果',
            'from_email' => 'noreply@crofun.jp',
            'from_name' => 'Crofun',
            'template' => 'user.email.20',
            'root'     => $request->root(),
            'email'     => $seller->email,
            'seller_name'=> $seller->first_name.' '.$seller->last_name,
         
            ];
            Mail::to($seller->email)
                ->send(new Common($emailData));
        }

        //send mail to seller if Aprove
        if($Product->status == 1){
            $seller = User::find($Product->user_id);
            $emailData = [
                'name' => $seller->first_name.' '.$seller->last_name,
                'register_token' =>'',
                'subject' => '【Crofun】商品掲載選考結果',
                'from_email' => 'noreply@crofun.jp',
                'from_name' => 'Crofun',
                'template' => 'user.email.19',
                'root'     => $request->root(),
                'email'     => $seller->email,
                'product_url' => 'https://crofun.jp/product-details/'.$request->id,
                
                ];
                Mail::to($seller->email)
                    ->send(new Common($emailData));
        }
        return redirect()->back()->with('success_message', 'status updated');
    }
    
    public function featureStatusChange(Request $request)
    {
        $Product = Product::find($request->id);
        $Product->is_featured = $request->status;
        $Product->save();
        return redirect()->back()->with('success_message', 'status updated');
    }

    public function delete(Request $request)
    {
        Product::find($request->id)->delete();
        return redirect()->back()->with('success_message', 'Product deleted successfully');
    }
    
    public function details(Request $request)
    {
        $data['product'] = Product::find($request->id);
        $data['productColor'] = ProductColor::where('product_id', $request->id)->get();
        
        //==== old data fetching feature
        $count = ProductsTemp::where('product_id', $request->id)->count();
        if ($count > 0 ) {
            $data['oldProductData'] = ProductsTemp::where('product_id', $request->id)->first();
        }else{
            $data['oldProductData'] = null;
        }
         
        $oldColorCount = ProductsColorTemp::where('product_id', $request->id)->count();
        if ($oldColorCount >0) {
            $data['oldProductColorData'] = ProductsColorTemp::where('product_id', $request->id)->get();
        }else {
            $data['oldProductColorData'] = [];
        }
        
        return view('admin.product.details', $data);
    }
}