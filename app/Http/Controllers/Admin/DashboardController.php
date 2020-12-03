<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 11:15:24
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 13:27:04
 */


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\User;
use App\Models\Project;
use App\Models\Product;

class DashboardController extends Controller
{
	public function __construct()
    {
        
    }

    public function index()
    {
    	$data['title'] = "ダッシュボード";
    	$data['total_user'] = User::count();
    	$data['total_project'] = Project::where('status',1)->count();
    	$data['hold_project'] = Project::where('status',3)->count();
    	$data['total_pending_project'] = Project::where('status', 0)->count();
    	$data['total_product'] = Product::where('status', 1)->count();
    	$data['total_pending_product'] = Product::where('status', 0)->count();
    	$data['order_history'] = OrderDetail::query()->count();
    	return view('admin.dashboard', $data);
    }
}