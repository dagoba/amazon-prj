<?php

namespace App\Http\Controllers\AdminPanel;

use DB;
use App;
use App\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdminGroup;

class AllShopsController extends Controller
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
        $shops = Shop::where([
                'state' => TRUE
            ])
            ->paginate(20);
        $components = [
            'shops' => $shops,
        ];
        return view('adminpanel.allshops', $components);
    }

    public function closedShop(Request $request)
    {
        $request_data = $request->All();
        $shop = Shop::where('id',$request_data['theme'])->first();
        if($shop['state'] === 0){
            return response()->json(array('error' => [__('controller_adminpanel.all_shop_error')]), 400);
        }elseif($shop['state'] === 1) {
            Shop::where('id',$request_data['theme'])
                ->update([
                    'state' => 0,
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);
            if (App::isLocale('en')) {
                $success = 'You closed "'.$shop->title.'".';
            }else {
                $success = 'Вы закрыли "'.$shop->title.'".';
            }
            return response()->json(array('success' => $success), 200);
        }else {
            return response()->json(array('error' => [__('controller_adminpanel.standard_error')]), 400);
        }      
    }
}
