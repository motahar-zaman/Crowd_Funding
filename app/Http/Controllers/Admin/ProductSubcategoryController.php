<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-18 15:04:43
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 15:25:34
 */


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Models\ProductSubcategory;
use App\Models\ProductCategory;

use Yajra\Datatables\Facades\Datatables;

use App\Http\Controllers\Controller;

use Auth;

class ProductSubcategoryController extends Controller
{
	public function __construct()
    {
        
    }

    public function categoryList(Request $request)
    {
        $projectSubCategory = ProductCategory::where('id',$request->category_id)->first();
        $data['title'] = "$projectSubCategory->name カタログサブカテゴリー 一覧";
        $data['category_id'] = $request->category_id;
    	return view('admin.product_subcategory.list', $data);
    }

    public function data(Request $request)
    {
        $ProductSubcategory = ProductSubcategory::withCount('products');
        if(!empty($request->category_id)){
            $ProductSubcategory = $ProductSubcategory->where('category_id', $request->category_id);
        }
        $ProductSubcategory = $ProductSubcategory->get();

    	// dd($ProductSubcategory[0]->createdBy->name);

        return Datatables::of($ProductSubcategory)

        ->editColumn('created_at', function($result){
            return  str_limit($result->created_at,$limit=11,$end='');
        })

        // ->editColumn('created_at', '{!! date("j M Y h:i A", strtotime($created_at)) !!}')
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<div class="text-center pr-3" ><span class="text-danger">非公開</span></div>';
            }
            else{
                return '<div class="text-center pr-3"><span class="text-success">公開</span></div>';
            }
        })
        ->editColumn('created_by', function ($result) {
            return  $result->createdBy->name ;
        })
        ->editColumn('category_id', function ($result) {
            return $result->category->name;
        })

        ->editColumn('name', function ($result) {
            return '<a href="'.route('admin-product-list',['subcategory_id'=>$result->id]).'">'.$result->name.'</a> ';
        })
        ->editColumn('products_count', function ($result) {
            return '<div class="text-center pr-3" > <a href="'.route('admin-product-list',['subcategory_id'=>$result->id]).'">'.$result->products_count.'</a> </div>';
        })
        ->addColumn('action', function ($result) {
            $output = '';
            if ($result->status==0) {
                $output .= '<a href="'.route('admin-product-subcategory-status-change', ['id' => $result->id, 'status'=> 1]).'" class="btn btn-sm btn-success">公開にする</a> ';
            }
            else{
                $output .= '<a href="'.route('admin-product-subcategory-status-change', ['id' => $result->id, 'status'=> 0]).'" class="btn btn-sm btn-danger">非公開にする</a> ';
            }
            $output .= '<a href="'.route('admin-product-subcategory-edit', ['id' => $result->id]).'" class="btn btn-sm btn-info">編集</a> ';
            return $output;
            
        })
        ->rawColumns(['name', 'products_count', 'created_at', 'action', 'status'])
        ->make(true);
    }

    public function statusChange(Request $request)
    {
    	// dd($request->status);
    	$ProductSubcategory = ProductSubcategory::find($request->id);
    	$ProductSubcategory->status = $request->status;
    	$ProductSubcategory->save();
    	return redirect()->back()->with('success_message', 'status updated');
    }

    public function delete(Request $request)
    {
    	ProductSubcategory::find($request->id)->delete();
    	return redirect()->back()->with('success_message', 'Product category deleted successfully');
    }

    public function add()
    {
    	$data['title'] = "新規サブカテゴリー追加";
    	$data['category'] = ProductCategory::where('status', 1)->get();
    	return view('admin.product_subcategory.add', $data);
    }
    public function addAction(Request $request)
    {
    	$this->validate($request, [	        
            'name' => 'required|max:255|unique:product_subcategory',
	        'category' => 'required',
	    ]);
	    $ProductSubcategory = new ProductSubcategory();
        $ProductSubcategory->category_id = $request->category;
	    $ProductSubcategory->name = $request->name;
	    $ProductSubcategory->created_by = Auth::guard('admin')->user()->id;
	    $ProductSubcategory->status = true;
	    $ProductSubcategory->save();

	    return redirect()->back()->with('success_message', 'Product category successfully added !!');
    } 
    public function edit(Request $request)
    {
    	$data['title'] = "サブカテゴリー更新";
    	$data['category'] = ProductCategory::where('status', 1)->get();
    	$data['details'] = ProductSubcategory::find($request->id);
    	return view('admin.product_subcategory.edit', $data);
    }
    public function editAction(Request $request)
    {
    	$this->validate($request, [	        
            'name' => 'required|max:255|unique:product_subcategory,name,'.$request->id,
	        'category' => 'required'
	    ]);
	    $ProductSubcategory = ProductSubcategory::find($request->id);
        $ProductSubcategory->category_id = $request->category;
	    $ProductSubcategory->name = $request->name;
	    $ProductSubcategory->save();

	    return redirect()->back()->with('success_message', 'Product category successfully updated !!');
    }
}