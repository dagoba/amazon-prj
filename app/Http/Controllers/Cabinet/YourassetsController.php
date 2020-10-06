<?php

namespace App\Http\Controllers\Cabinet;

use App\Shop;
use App\UserRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class YourassetsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_rates = UserRate::select(
                'user_rates.id', 
                'shops.title', 
                'shops.seller', 
                'shops.category', 
                'shops.rating',
                'shops.percent',
                'shops.period_percent', 
                'user_rates.cost', 
                'user_rates.created_at'
            )
            ->join('shops','shops.id','=','shop_id')
            ->where(['user_rates.user_id' => Auth::user()->id])
            ->paginate(20);
        $component = [
            'user_rates' => $user_rates
        ];
        return view('cabinet.yourassets', $component);
    }
}
