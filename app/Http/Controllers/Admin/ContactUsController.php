<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Yajra\Datatables\Facades\Datatables;

class ContactUsController extends Controller
{
    public function __construct()
    {
        
    }

    public function contactUsList()
    {
    	$data['title'] = "お問合せ";
    	return view('admin.contact_us.list', $data);
    }

    public function data(Request $request)
    {
    	$Content = ContactUs::get();
        return Datatables::of($Content)
        ->addColumn('name', function ($result) {
            return $result->name;
        })
        ->addColumn('details', function ($result) {
            return '<a href="'.route('admin-contact-us-details',['id'=>$result->id]).'">'.str_limit($result->details,$limit = 35, $end = '...').'</a>';
        })
        // ->editColumn('created_at', '{!! date("j M Y h:i A", strtotime($created_at)) !!}')
        ->editColumn('created_at', function($result){
            return  $result->created_at;
        })
        ->rawColumns(['created_at','name','details'])
        ->make(true);
    }
   public function details(Request $res)
   {
       $data['details']=ContactUs::find($res->id);
       return view('admin.contact_us.details',$data);
   }
}
