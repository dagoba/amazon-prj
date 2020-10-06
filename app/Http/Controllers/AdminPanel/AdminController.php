<?php

namespace App\Http\Controllers\AdminPanel;

use DB;
use App\User;
use App\UserRate;
use App\ReferralProfit;
use App\InvestmentProfit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckAdminGroup;

class AdminController extends Controller
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
        $year = date('Y');
        $rates = [];
        $rates['jan'] = UserRate::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-01-%')
            ->first()['cost'];
        $rates['feb'] = UserRate::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-02-%')
            ->first()['cost'];
        $rates['mar'] = UserRate::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-03-%')
            ->first()['cost'];
        $rates['apr'] = UserRate::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-04-%')
            ->first()['cost'];
        $rates['mai'] = UserRate::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-05-%')
            ->first()['cost'];
        $rates['jun'] = UserRate::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-06-%')
            ->first()['cost'];
        $rates['jul'] = UserRate::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-07-%')
            ->first()['cost'];
        $rates['aug'] = UserRate::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-08-%')
            ->first()['cost'];
        $rates['sep'] = UserRate::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-09-%')
            ->first()['cost'];
        $rates['oct'] = UserRate::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-10-%')
            ->first()['cost'];
        $rates['nov'] = UserRate::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-11-%')
            ->first()['cost'];
        $rates['dec'] = UserRate::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-12-%')
            ->first()['cost'];
        
        $profits = [];
        $profits['jan'] = ReferralProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-01-%')
            ->first()['cost'];
        $profits['feb'] = ReferralProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-02-%')
            ->first()['cost'];
        $profits['mar'] = ReferralProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-03-%')
            ->first()['cost'];
        $profits['apr'] = ReferralProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-04-%')
            ->first()['cost'];
        $profits['mai'] = ReferralProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-05-%')
            ->first()['cost'];
        $profits['jun'] = ReferralProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-06-%')
            ->first()['cost'];
        $profits['jul'] = ReferralProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-07-%')
            ->first()['cost'];
        $profits['aug'] = ReferralProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-08-%')
            ->first()['cost'];
        $profits['sep'] = ReferralProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-09-%')
            ->first()['cost'];
        $profits['oct'] = ReferralProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-10-%')
            ->first()['cost'];
        $profits['nov'] = ReferralProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-11-%')
            ->first()['cost'];
        $profits['dec'] = ReferralProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-12-%')
            ->first()['cost'];

        $profits['jan'] += InvestmentProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-01-%')
            ->first()['cost'];
        $profits['feb'] += InvestmentProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-02-%')
            ->first()['cost'];
        $profits['mar'] += InvestmentProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-03-%')
            ->first()['cost'];
        $profits['apr'] += InvestmentProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-04-%')
            ->first()['cost'];
        $profits['mai'] += InvestmentProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-05-%')
            ->first()['cost'];
        $profits['jun'] += InvestmentProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-06-%')
            ->first()['cost'];
        $profits['jul'] += InvestmentProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-07-%')
            ->first()['cost'];
        $profits['aug'] += InvestmentProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-08-%')
            ->first()['cost'];
        $profits['sep'] += InvestmentProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-09-%')
            ->first()['cost'];
        $profits['oct'] += InvestmentProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-10-%')
            ->first()['cost'];
        $profits['nov'] += InvestmentProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-11-%')
            ->first()['cost'];
        $profits['dec'] += InvestmentProfit::select(DB::raw('SUM(cost) as cost'))
            ->where('created_at','LIKE', $year.'-12-%')
            ->first()['cost'];
        

        $components = [
            'year' => $year,
            'rates' => $rates,
            'profits' => $profits,
        ];
        return view('adminpanel.index', $components);
    }
}
