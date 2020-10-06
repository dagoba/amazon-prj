<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckAdminGroup;
use App\Imports\AmzItemsImport;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use DB;
use App\AmzItem;
use File;

class AmzController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(CheckAdminGroup::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amzItems = DB::table('amz_items')->get();
        $components = [
            'user_group'=> Auth::user()->group,
            'amzItems'=>$amzItems
        ];
        return view('adminpanel.amz',$components);
    }
    
    public function addAmz(Request $request)
    {
        if($request->file('amz_xls'))
        {
            DB::table('amz_items')->truncate();
            Excel::import(new AmzItemsImport, $request->file('amz_xls'));
        }

        return redirect(route('admin-amz'));
    }
}
