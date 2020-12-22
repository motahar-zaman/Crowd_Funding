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


use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\Product;
use App\Models\ProductsTemp;
use App\Models\FavouriteProduct;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Message;
use App\Models\Profile;

use App\Models\UserCard;
use App\Models\ProductColor;
use App\Models\ProductsColorTemp;
use App\Models\ProductRank;
use App\Models\Product_rating;
use App\Mail\Common;
use App\User;

use Auth;
use Cart;
use Mail;
use Image;

class ProductController extends Controller
{
	public function __construct()
    {
    }

    public function purchaseList(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
        $data['products'] = OrderDetail::whereHas('order', function ($query) {
                                $query->where('user_id', Auth::user()->id)->where('status', 1);
                            })->with('order')->with('product')->orderBy('created_at', 'desc')->get();
        $data['productsDetailsStatus'] = OrderDetail::whereHas('order', function ($query) {
                                            $query->where('user_id', Auth::user()->id);
                                        })->orderBy('created_at', 'desc')->get();
        return view('user.my-purchase-list', $data);
    }

    public function productRating(Request $request){
        $ratings = new Product_rating();
        $ratings->user_id = Auth::user()->id;
        $ratings->product_id = $request->product_id;
        $ratings->user_rating = $request->user_rating;
        $ratings->order_id = $request->order_id;
        $ratings->save();

        return redirect()->back();
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
        $data['products'] = Product::where('user_id', Auth::user()->id)->where('status',1)->orderBy('created_at','dsec')->get();
        $data['OrderDetailsNotification'] = OrderDetail::where('status', 1)
                                                    ->whereHas('product', function($q){
                                                        $q->where('user_id', Auth::user()->id)->where('status', 1);
                                                    })
                                                    ->whereHas('order', function($q){
                                                        $q->where('status', 1);
                                                    })
                                                    ->orderBy('created_at', 'desc')
                                                    ->get();
    	return view('user.my_product_list', $data);
    }

    public function preNew()
    {
    	return view('user.pre_new_product');
    }

    public function add(Request $request)
    {
        $finish = false;
        if($request->finish){
            $finish = true;
        }
        $data['finish'] = $finish;
        $data['category'] = ProductCategory::where('status', 1)->get();
        $data['subcategory'] = ProductSubCategory::where('status', 1)->get();

        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
    	return view('user.new_product', $data);
    }

    public function addAction(Request $request)
    {
        $Product = new Product();
        $Product->title = $request->title;

        $name = '';
        if ($request->hasFile('image')) {
            $extension = $request->image->extension();
            $name = time().rand(1000,9999).'.'.$extension;
            $img = Image::make($request->image);
            $img->save(public_path().'/uploads/products/'.$name, 60);
        }

        $Product->image = $name;
        $Product->user_id = Auth::user()->id;
        $Product->subcategory_id = $request->subcategory;
        $Product->price = $request->price;
        $Product->description = $request->description;
        $Product->explanation = $request->explanation;

        $Product->company_name = $request->company_name;
        $Product->company_info = $request->company_info;
        
        if ($request->hasFile('company_info_image')) {
            $extension = $request->company_info_image->extension();
            $name = time().rand(1000,9999).'.'.$extension;
            $img = Image::make($request->company_info_image)->resize(300, 300);
            $img->save(public_path().'/uploads/products/'.$name, 60);
            $Product->company_info_image = $name;
        }

        $Product->profile_info = '';
        $Product->status = 0;
        $Product->no_of_time_added = 1;
        $Product->save();
      
        //send mail to admin
        $User = Auth::user();
        $emailData = [
            'name' => $User->first_name.' '.$User->last_name,
            'register_token' =>'',
            'subject' => '【Crofun管理者用】新規商品掲載申請の通知',
            'from_email' => 'noreply@crofun.jp',
            'from_name' => 'Crofun',
            'template' => 'user.email.18',
            'root'     => $request->root(),
            'email'     => 'administrator@crofun.jp',
            'user_name' =>$User->first_name.' '.$User->last_name,
            'product_name'  =>$Product->title,
            'application_date' =>$Product->created_at,
            'detailed_url' =>'https://crofun.jp/admin/product/details/'.$Product->id,
            
            ];
            Mail::to('administrator@crofun.jp')
                ->send(new Common($emailData));
        //send mail to seller
        $emailData = [
            'name' => $User->first_name.' '.$User->last_name,
            'register_token' =>'',
            'subject' => '【Crofun】商品『'.$Product->title.'』の掲載申請を受け付けました',
            'from_email' => 'noreply@crofun.jp',
            'from_name' => 'Crofun',
            'template' => 'user.email.17',
            'product_name'  =>$Product->title,
            'price' => $Product->price,
            'root'     => $request->root(),
            'email'     => $User->email,
        
            ];
            Mail::to($User->email)
                ->send(new Common($emailData));

        foreach ($request->color as $key => $value) {           
                if(!empty($value) || !empty($request->type[$key])){
                    $ProductColor = new ProductColor();
                    $ProductColor->product_id = $Product->id;
                    $ProductColor->color = $value;
                    $ProductColor->color = $value;
                    $ProductColor->type = $request->type[$key];
                    $ProductColor->save();
                }
        }
        return redirect()->to(route('user-product-add', ['finish' => 1]));
    }

    public function edit(Request $request)
    {
        $finish = false;

        if($request->finish){
            $finish = true;
        }
        $data['finish'] = $finish;
        $data['category'] = ProductCategory::where('status', 1)->get();
        $data['subcategory'] = ProductSubCategory::where('status', 1)->get();
        $data['product'] = Product::where('id', $request->id)->first();
        $data['productColor'] = ProductColor::where('product_id', $request->id)->get();

        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
    	return view('user.edit_product', $data);
    }

    protected function productEditDataTemporaryStore($oldProductData, $newProductData, $oldProductColorData, $newProductColorData) {
        if ($newProductData->id != null){
            $isCount = ProductsTemp::where('product_id', $newProductData->id)->count();
            if($isCount == 0) {
                $p = new ProductsTemp();
                $p->product_id = $newProductData->id;
                $p->title = $oldProductData->title;
                $p->image = $oldProductData->image;
                $p->user_id = $oldProductData->user_id;
                $p->subcategory_id = $oldProductData->subcategory_id;
                $p->price = $oldProductData->price;
                $p->description = $oldProductData->description;
                $p->explanation = $oldProductData->explanation;
                $p->company_name = $oldProductData->company_name;
                $p->company_info = $oldProductData->company_info;
                $p->company_info_image = $oldProductData->company_info_image;
                $p->profile_info = $oldProductData->profile_info;
                $p->status = $oldProductData->status;
                $p->save();      
            }
            else {
                $pp = ProductsTemp::where('product_id', $newProductData->id)->orderBy('id', 'desc')->first();
                $pp->product_id = $newProductData->id;
                $pp->title = $oldProductData->title;
                $pp->image = $oldProductData->image;
                $pp->user_id = $oldProductData->user_id;
                $pp->subcategory_id = $oldProductData->subcategory_id;
                $pp->price = $oldProductData->price;
                $pp->description = $oldProductData->description;
                $pp->explanation = $oldProductData->explanation;
                $pp->company_name = $oldProductData->company_name;
                $pp->company_info = $oldProductData->company_info;
                $pp->company_info_image = $oldProductData->company_info_image;
                $pp->profile_info = $oldProductData->profile_info;
                $pp->status = $oldProductData->status;
                $pp->save(); 
            }
        }
    }

    public function editAction(Request $request)
    {
        $oldProductData = Product::where('id', $request->id)->first();
        $Product = Product::where('id', $request->id)->first();
        $Product->title = $request->title;

        if ($request->hasFile('image')) {
            $extension = $request->image->extension();
            $name = time().rand(1000,9999).'.'.$extension;
            $img = Image::make($request->image);
            $img->save(public_path().'/uploads/products/'.$name, 60);
        }

        if ($request->hasFile('image')) {
            $Product->image = $name;
        }

        $Product->user_id = Auth::user()->id;
        $Product->subcategory_id = $request->subcategory;
        $Product->price = $request->price;
        $Product->description = $request->description;
        $Product->explanation = $request->explanation;
       
        $Product->company_name = $request->company_name;
        $Product->company_info = $request->company_info;
        if ($request->hasFile('company_info_image')) {
            $extension = $request->company_info_image->extension();
            $name = time().rand(1000,9999).'.'.$extension;
            $img = Image::make($request->company_info_image)->resize(300, 300);
            $img->save(public_path().'/uploads/products/'.$name, 60);
            $Product->company_info_image = $name;
        }
        $Product->profile_info = '';
        $Product->no_of_time_added =  $Product->no_of_time_added + 1;
        Product::where('id', $request->id)->update(['status'=> 0]);
        $Product->save();

        $oldProductColorData =  ProductColor::where('product_id', $request->id)->get();           
        $newProductColorData = null;

        if(!empty($request->color)){
            $ProductColor = ProductColor::where('product_id', $request->id)->delete();
            foreach ($request->color as $key => $value) {
                    $ProductColor = new ProductColor();
                    $ProductColor->product_id = $Product->id;
                    $ProductColor->color = $value;
                    $ProductColor->type = $request->type[$key];
                    $ProductColor->save();
            }

            $ProductColorTemp = ProductsColorTemp::where('product_id', $request->id)->delete();            
            foreach ($oldProductColorData as $key => $value) {
                $ProductColorTemp = new ProductsColorTemp();
                $ProductColorTemp->product_id = $value->product_id;
                $ProductColorTemp->color = $value->color;
                $ProductColorTemp->type = $value->type;
                $ProductColorTemp->save();
            }
            $newProductColorData = $ProductColor;
        }
        //==== to store user changes into temporary table
        $this->productEditDataTemporaryStore($oldProductData ,$Product, $oldProductColorData, $newProductColorData);

        $User = Auth::user();
        $emailData = [
            'name' => $User->first_name.' '.$User->last_name,
            'register_token' =>'',
            'subject' => '【Crofun管理者用】商品編集の通知',
            'from_email' => 'noreply@crofun.jp',
            'from_name' => 'Crofun',
            'template' => 'user.email.33',
            'root'     => $request->root(),
            'email'     => 'administrator@crofun.jp',
            'user_name' =>$User->first_name.' '.$User->last_name,
            'product_name'  =>$Product->title,
            'application_date' =>$Product->created_at,
            'detailed_url' =>'https://crofun.jp/admin/product/details/'.$Product->id,
            
        ];
        Mail::to('administrator@crofun.jp')
            ->send(new Common($emailData));
        return redirect()->to(route('user-product-edit', [ 'id' => $request->id, 'finish' => 1]));
    }

    public function addFavourite(Request $request)
    {
        $id = $request->id;
        $check = FavouriteProduct::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        if($check) return redirect()->back();
        $FavouriteProduct = new FavouriteProduct();
        $FavouriteProduct->user_id = Auth::user()->id;
        $FavouriteProduct->product_id = $id;
        $FavouriteProduct->save();
        return redirect()->back();
    }

    public function favouriteList(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
        $data['products'] = FavouriteProduct::where('status', 1)
                            ->whereHas('product', function($q){
                                $q->where('status', 1);
                            })
                            ->where('user_id', Auth::user()->id)
                            ->orderBy('created_at','dsec')
                            ->get();
        return view('user.favourite_product_list', $data);
    }

    public function removeFavourite(Request $request)
    {
        $id = $request->id;
        FavouriteProduct::where('product_id', $id)->where('user_id', Auth::user()->id)->delete();
        return redirect()->back();
    }

    public function payment(Request $request)
    {
    }

    public function purchase(Request $request)
    {
        Cart::update($request->row_id, $request->quantity);
        $date = date("YmdHis");
        $order_no = 'ORD-'.time().Auth::user()->id.rand(1000,9999);
        $remaining = 0;
        $cartSubtotal = (float)Cart::subtotal(false, false, false);
        $accountPoint = $cartSubtotal;
        if($cartSubtotal > Auth::user()->point){
            $remaining = $cartSubtotal-Auth::user()->point;
            $accountPoint = Auth::user()->point;
        }

        //make address for buyer
        $buyer = User::with('profile')->find(Auth::user()->id);
        if ($request->first_name == '' || $request->first_name == null){
            $name = $buyer->first_name.' '.$buyer->last_name;
            $postal_code = $buyer->shipping_postal_code;
            $prefecture = $buyer->shipping_prefecture;
            $shipping_municipility = $buyer->shipping_municipility;
            $address = $buyer->shipping_address.','.$buyer->shipping_street_address;
            $room = $buyer->shipping_room_num;
            $phone = $buyer->shipping_phone_num;
        }
        else {
            $name = $request->first_name.' '.$request->last_name;
            $postal_code = $request->postal_code;
            $prefecture = $request->prefectures;
            $shipping_municipility = $request->municipility;
            $address = $request->address;
            $room = $request->room_no;
            $phone = $request->phone_num;
        }

        $Order = new Order();
        $Order->user_id = Auth::user()->id;
        $Order->order_no = $order_no;
        $Order->qty = Cart::count();
        $Order->total_point = $cartSubtotal;
        $Order->account_point = $accountPoint;
        $Order->purchase_point = $remaining;        
        $Order->delivery_option = '1';        
        $Order->delivery_date = '2012-12-12';        
        $Order->delivery_time = time();
        $Order->name = 1;
        $Order->number = 1;
        $Order->cvv = 1;
        $Order->exp_month = 1;
        $Order->ShipmentFirstName = isset($request->first_name)?$request->first_name:$buyer->first_name;
        $Order->ShipmentSecondName = isset($request->last_name)?$request->last_name:$buyer->second_name;
        $Order->custom_postal_code = $postal_code;
        $Order->prefecture = $prefecture;
        $Order->custom_municipility = $shipping_municipility;
        $Order->custom_address = $address;
        $Order->custom_room_no = $room;
        $Order->custom_phone_no = $phone;
        $Order->status = true;

        if($remaining > 0){
            $Order->status = false;
        }

        $Order->created_at = date('Y-m-d H:i:s', strtotime($date));
        $Order->updated_at = date('Y-m-d H:i:s', strtotime($date));
        $Order->save(); 

        foreach(Cart::content() as $p) {
            $OrderDetail = new OrderDetail();
            $OrderDetail->order_id = $Order->id;
            $OrderDetail->product_id = $p->id;
            $OrderDetail->qty = $p->qty;
            $OrderDetail->color = isset($p->options['color']) ? $p->options['color'] : null;
            $OrderDetail->size = isset($p->options['size']) ? $p->options['size'] : null;
            $OrderDetail->unit_point = $p->price;
            $OrderDetail->total_point = $p->price*$p->qty;
            $OrderDetail->status = 1;
            $OrderDetail->save();
        }

        if($remaining > 0){
            $Order->status = false;
            return view('user.invest_payment', [
                'orderNo'   => $order_no,
                'amount'    => $remaining,
                'date'      => $date,
                'retUrl'    => route('purchase-payment-response'),
                'cancelUrl' => route('front-cart')
            ]); 
        }
        else{
            $User = User::find(Auth::user()->id);
            $User->point -= $accountPoint;
            $User->save();

            $Profile = Profile::where('user_id', Auth::user()->id)->first();
            $check = Order::where('order_no', $order_no)->first();
            $OrderDetails = OrderDetail::where('order_id', $check->id)->first();

            $Product = Product::find($OrderDetails->product_id);
            $Seller = User::find($Product->user_id);
            $Sellerprofile = Profile::where('user_id', $Product->user_id)->first();
            //send mail to admin
            $emailData = [
               'name' => '',
               'register_token' => $User->register_token,
               'subject' => '【Crofun管理者用】商品購入の通知',
               'from_email' => 'noreply@crofun.jp',
               'from_name' => 'Crofun',
               'template' => 'user.email.9',
               'root'     => $request->root(),
               'email'     => 'administrator@crofun.jp',
               'buyer_name'  => $name,
               'buyer_reading'  => '',
               // 'buyer_address' => $Profile->address,
               'buyer_address1' => $postal_code,
               'buyer_address2' => $prefecture,
               'buyer_address3' => $shipping_municipility,
               'buyer_address4' => $address,
               'buyer_address5' => $room,
               'buyer_phone_number' => $phone,
               'product_name' =>  $Product->title,
               'point'  => $check->total_point,
               'seller_name'  => $Seller->first_name.' '.$Seller->last_name,
               'seller_reading'  => '',
               'seller_address1' => $Sellerprofile->postal_code,
               'seller_address2' => $Sellerprofile->prefectures,
               'seller_address3' => $Sellerprofile->municipility,
               'seller_address4' => $Sellerprofile->address,
               'seller_address5' => $Sellerprofile->room_no,
               // 'seller_address' => $Sellerprofile->address,
               'seller_phone_number' => $Sellerprofile->phone_no,

           ];
   
           Mail::to('administrator@crofun.jp')
               ->send(new Common($emailData));

           //send mail to seller
           $emailData = [
               'name' => $Seller->first_name.' '.$Seller->last_name,
               'company_name'=>$Product->company_name,
               'register_token' => $User->register_token,
               'subject' => '【Crofun】商品発注・発送のお願い',
               'from_email' => 'noreply@crofun.jp',
               'from_name' => 'Crofun',
               'template' => 'user.email.8',
               'root'     => $request->root(),
               'email'     => $Seller->email,
               'product_name' =>  $Product->title,
               'buyer_name'  => $name,
               // 'buyer_home' => $Profile->address,
               'buyer_home1' => $postal_code,
               'buyer_home2' => $prefecture,
               'buyer_home3' => $shipping_municipility,
               'buyer_home4' => $address,
               'buyer_home5' => $room,
               'buyer_phone_number' => $phone,              
               'orderDetailId' => $OrderDetails->id 
           ];
   
           Mail::to($Seller->email)
               ->send(new Common($emailData));
           
           //send mail to buyer
           $emailData = [
               'name' => $User->first_name.' '.$User->last_name,
               'register_token' => $User->register_token,
               'subject' => '【Crofun】ご注文完了のお知らせ',
               'from_email' => 'noreply@crofun.jp',
               'from_name' => 'Crofun',
               'template' => 'user.email.7',
               'root'     => $request->root(),
               'email'     => $User->email,
               'product_name' =>  $Product->title,
               'point'  => $check->total_point,
               'buyer_name'  => $name,
               'address1' => $postal_code,
               'address2' => $prefecture,
               'address3' => $shipping_municipility,
               'address4' => $address,
               'address5' => $room,
             
           ];
           Mail::to($User->email)
               ->send(new Common($emailData));
   
            Cart::destroy();
            return redirect()->to(route('front-cart', ['finish' => true]));
        }
    }

    function purchasePaymentResponse(Request $request){
	    $check = Order::where('order_no', $request->OrderID)->where('status', false)->first();
        if($check){
            if(!$request->Approve){
                return redirect()->to(route('front-cart'))->with('error_message', '支払いが完了していません。もう一度お試しください');
            }

            $check->status = true;
            $check->save();
            $User = User::find($check->user_id);
            $User->point -= $check->account_point;
            $User->save();

            $Profile = Profile::where('user_id', $check->user_id)->first();
            $OrderDetails = OrderDetail::where('order_id', $check->id)->first();
            $Product = Product::find($OrderDetails->product_id);
            $Seller = User::find($Product->user_id);
            $Sellerprofile = Profile::where('user_id', $Product->user_id)->first();
            //send mail to admin
            $emailData = [
                'name' => '',
                'register_token' => $User->register_token,
                'subject' => '【Crofun管理者用】商品購入の通知',
                'from_email' => 'noreply@crofun.jp',
                'from_name' => 'Crofun',
                'template' => 'user.email.9',
                'root'     => $request->root(),
                'email'     => 'administrator@crofun.jp',
                'buyer_name'  => $check->ShipmentFirstName.' '.$check->ShipmentSecondName,
                'buyer_reading'  => '',
                // 'buyer_address' => $Profile->address,
                'buyer_address1' => $check->custom_postal_code,
                'buyer_address2' => $check->prefecture,
                'buyer_address3' => $check->custom_municipility,
                'buyer_address4' => $check->custom_address,
                'buyer_address5' => $check->custom_room_no,
                'buyer_phone_number' => $check->custom_phone_no,
                'product_name' =>  $Product->title,
                'point'  => $check->total_point,
                'seller_name'  => $Seller->first_name.' '.$Seller->last_name,
                'seller_reading'  => '',
                'seller_address1' => $Sellerprofile->postal_code,
                'seller_address2' => $Sellerprofile->prefectures,
                'seller_address3' => $Sellerprofile->municipility,
                'seller_address4' => $Sellerprofile->address,
                'seller_address5' => $Sellerprofile->room_no,
                'seller_phone_number' => $Sellerprofile->phone_no,
            ];

            Mail::to('administrator@crofun.jp')
             ->send(new Common($emailData));

            //send mail to seller
            $emailData = [
                'name' => $Seller->first_name.' '.$Seller->last_name,
                'company_name'=>$Product->company_name,
                'register_token' => $User->register_token,
                'subject' => '【Crofun】商品発注・発送のお願い',
                'from_email' => 'noreply@crofun.jp',
                'from_name' => 'Crofun',
                'template' => 'user.email.8',
                'root'     => $request->root(),
                'email'     => $Seller->email,
                'product_name' =>  $Product->title,
                'buyer_name'  => $check->ShipmentFirstName.' '.$check->ShipmentSecondName,
                'buyer_home1' => $check->custom_postal_code,
                'buyer_home2' => $check->prefecture,
                'buyer_home3' => $check->custom_municipility,
                'buyer_home4' => $check->custom_address,
                'buyer_home5' => $check->custom_room_no,
                'buyer_phone_number' => $check->custom_phone_no,
                'orderDetailId' => $OrderDetails->id
            ];
            Mail::to($Seller->email)
                ->send(new Common($emailData));

            //send mail to buyer
            $emailData = [
                'name' => $User->first_name.' '.$User->last_name,
                'register_token' => $User->register_token,
                'subject' => '【Crofun】ご注文完了のお知らせ',
                'from_email' => 'noreply@crofun.jp',
                'from_name' => 'Crofun',
                'template' => 'user.email.7',
                'root'     => $request->root(),
                'email'     => $User->email,
                'product_name' =>  $Product->title,
                'point'  => $check->total_point,
                'buyer_name'  => $check->ShipmentFirstName.' '.$check->ShipmentSecondName,
                'address1' => $check->custom_postal_code,
                'address2' => $check->prefecture,
                'address3' => $check->custom_municipility,
                'address4' => $check->custom_address,
                'address5' => $check->custom_room_no,
            ];
            Mail::to($User->email)
            ->send(new Common($emailData));

            Cart::destroy();

            return redirect()->to(route('front-cart', ['finish' => true]));
        }
        if( redirect('front-cart')){
            return redirect('front-cart');
        }
        else{

        }
	}

    public function getSubCategory(Request $request)
    {
        $id = $request->id;
        $data['sub_category'] = ProductSubCategory::where('category_id', $id)->where('status', 1)->get();
        return view('user.sub_category', $data);
    }

    public function sendRank(Request $request)
    {
        $product_id = $request->product_id;
        $rank = $request->rank;
        ProductRank::where('product_id', $product_id)->where('user_id', Auth::user()->id)->delete();
        $ProductRank = new ProductRank();
        $ProductRank->user_id = Auth::user()->id;
        $ProductRank->product_id = $product_id;
        $ProductRank->rank = $rank;
        $ProductRank->save();
        return redirect()->back()->with('success_message', 'Rank done');
    }
    
    public function details(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->with('profile')->first();
        $data['user'] = $user;
        $data['product'] = Product::find($request->id);
        $data['productColor'] = ProductColor::where('product_id', $request->id) ->with('product')->get();
        
        return view('user.my_products_details', $data);
    }
}
