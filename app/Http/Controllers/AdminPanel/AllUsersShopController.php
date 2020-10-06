<?php

namespace App\Http\Controllers\AdminPanel;

use DB;
use App\User;
use App\Shop;
use App\UserRate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdminGroup;

class AllUsersShopController extends Controller
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
    public function index($id)
    {
        $shop = Shop::where(['id'=>$id])->first();
        $users = UserRate::select(DB::raw(
                'user_rates.id,'.
                'users.name,'.
                'user_rates.user_id,'.
                'user_rates.cost,'.
                "(SELECT SUM(cost) FROM `investment_profits` where investment_profits.rate_id = user_rates.id ORDER BY investment_profits.created_at DESC LIMIT 1) as profit_cost,".
                "(SELECT cost FROM `investment_profits` where investment_profits.rate_id = user_rates.id ORDER BY investment_profits.created_at DESC LIMIT 1) as last_profit_cost,".
                "(SELECT created_at FROM `investment_profits` where investment_profits.rate_id = user_rates.id ORDER BY investment_profits.created_at DESC LIMIT 1) as last_profit_created_at"
            ))
            ->leftjoin('users','users.id', '=', 'user_rates.user_id')
            // ->leftjoin('shops','shops.id', '=', 'user_rates.shop_id')
            ->where('shop_id','=',$id)
            ->paginate(20);
        $components = [
            'shop' => $shop,
            'users' => $users,
        ];
        return view('adminpanel.allusersshop', $components);
    }
}
