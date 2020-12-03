<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-18 12:06:40
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 15:26:28
 */


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Models\ProjectCategory;
use App\Models\Project;

use Yajra\Datatables\Facades\Datatables;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Auth;

class ProjectCategoryController extends Controller
{
	public function __construct()
    {
        
    }

    public function categoryList()
    {
    	$data['title'] = "プロジェクトカテゴリ一覧";
    	return view('admin.project_category.list', $data);
    }

    public function data(Request $request)
    { 
    	$ProjectCategory = ProjectCategory::withCount('project')->get();
    	// dd($ProjectCategory[0]->createdBy->name);
        return Datatables::of($ProjectCategory)

        ->editColumn('created_at', function($result){
            return str_limit($result->created_at , $limit = 11, $end = '');
            // return  str_limit($result->created_at, $limit = 11, $end = '');
        })

        // ->editColumn('created_at', '{!! date("j M Y h:i A", strtotime($created_at)) !!}')
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-danger">非公開</span>';
            }
            else{
                return '<span class="text-success">公開</span>';
            }
        })
        ->editColumn('created_by', function ($result) {
            return $result->createdBy->name;
        })
        ->editColumn('name', function ($result) {
            return '<a href="'.route('admin-project-active-list',['category_id'=>$result->id]).'">'.$result->name.'</a>';
        })
        ->editColumn('projects_count', function ($result) {
            return '<a href="'.route('admin-project-active-list',['category_id'=>$result->id]).'">'.$result->project_count.'</a>';
        })
        ->addColumn('action', function ($result) {
            $output = '';
            if ($result->status==0) {
                $output .= '<a href="'.route('admin-project-category-status-change', ['id' => $result->id, 'status'=> 1]).'" class="btn btn-sm btn-success">公開にする</a> ';
            }
            else{
                $output .= '<a href="'.route('admin-project-category-status-change', ['id' => $result->id, 'status'=> 0]).'" class="btn btn-sm btn-danger">非公開にする</a> ';
            }
            $output .= '<a href="'.route('admin-project-category-edit', ['id' => $result->id]).'" class="btn btn-sm btn-info">編集</a>';
            return $output;
            
        })
        ->rawColumns(['name','projects_count','created_at', 'action', 'status'])
        ->make(true);
    }

    public function statusChange(Request $request)
    {
    	// dd($request->status);
    	$ProjectCategory = ProjectCategory::find($request->id);
    	$ProjectCategory->status = $request->status;
    	$ProjectCategory->save();
    	return redirect()->back()->with('success_message', 'status updated');
    }

    public function delete(Request $request)
    {
    	ProjectCategory::find($request->id)->delete();
    	return redirect()->back()->with('success_message', 'Project category deleted successfully');
    }

    public function add()
    {
    	$data['title'] = "新規カテゴリー追加";
    	return view('admin.project_category.add', $data);
    }
    public function addAction(Request $request)
    {
    	$this->validate($request, [	        
	        'name' => 'required|max:255|unique:project_category'
	    ]);
	    $ProjectCategory = new ProjectCategory();
	    $ProjectCategory->name = $request->name;
	    $ProjectCategory->created_by = Auth::guard('admin')->user()->id;
	    $ProjectCategory->status = true;
	    $ProjectCategory->save();

	    return redirect()->back()->with('success_message', 'Project category successfully added !!');
    } 
    public function edit(Request $request)
    {
    	$data['title'] = "カテゴリー編集";
    	$data['details'] = ProjectCategory::find($request->id);
    	return view('admin.project_category.edit', $data);
    }
    public function editAction(Request $request)
    {
    	$this->validate($request, [	        
	        'name' => 'required|max:255|unique:project_category,name,'.$request->id
	    ]);
	    $ProjectCategory = ProjectCategory::find($request->id);
	    $ProjectCategory->name = $request->name;
	    $ProjectCategory->save();

	    return redirect()->back()->with('success_message', 'Project category successfully updated !!');
    }
    public function donate(Request $request)
    {
        $data['title'] = 'Project Donation List';
        $data['id'] = $request->id;
        return view('admin.project_category.donate_details', $data);
    }
    public function dataDonate(Request $request)
    {
        $data = Investment::where('project_id', $request->id)->whereHas('project', function($q){
            $q->where('status', true);
        });
        $Project = $data->get();

        return Datatables::of($Project)
        ->editColumn('created_at', '{!! date("j M Y ", strtotime($created_at)) !!}')
        ->addColumn('amount', function ($result) {
            return  $result->amount;
        })
        ->addColumn('return_name', function ($result) {
            return  $result->rewardname->reward->is_other;
        })
        ->addColumn('crofun_points', function ($result) {
            return $result->point .'ポイント';
        })
       ->addColumn('supporter_name', function ($result) {
            return $result->user->first_name .''.$result->user->last_name;
        })
        ->rawColumns([ 'created_at','amount','return_name','crofun_points','supporter_name'])
        ->make(true);
    }
}