<?php

namespace App\Http\Controllers\AdminPanel;

use App;
use App\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdminGroup;

class ClosedShopsController extends Controller
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
                'state' => FALSE
            ])
            ->paginate(20);
        $components = [
            'shops' => $shops,
        ];
        return view('adminpanel.closedshops', $components);
    }

    public function activateShop(Request $request)
    {
        $request_data = $request->All();
        $shop = Shop::where('id',$request_data['shop'])->first();
        if($shop['state'] === 1){
            return response()->json(array('error' => [__('controller_adminpanel.closed_shops_error')]), 400);
        }else if($shop['state'] === 0) {
            Shop::where('id',$request_data['shop'])
                ->update([
                    'state' => 1,
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);
            if (App::isLocale('en')) {
                $success = 'You unlocked the store "'.$shop->title.'".';
            } else {
                $success = 'Вы разблокировали магазин "'.$shop->title.'".';
            }
            return response()->json(array('success' => $success), 200);
        }else {
            return response()->json(array('error' => [__('controller_adminpanel.standard_error')]), 400);
        }
    }
}
