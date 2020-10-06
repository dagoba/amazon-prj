<?php

namespace App\Http\Controllers\Cabinet;

use DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReferralsController extends Controller
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
        $referrals = User::select(DB::raw(
                'users.id,'.
                'users.name,'.
                "(SELECT SUM(cost) FROM `referral_profits` where referral_profits.referral_id = users.id ORDER BY referral_profits.created_at DESC LIMIT 1) as profit_cost,".
                "(SELECT cost FROM `referral_profits` where referral_profits.referral_id = users.id ORDER BY referral_profits.created_at DESC LIMIT 1) as last_profit_cost,".
                "(SELECT created_at FROM `referral_profits` where referral_profits.referral_id = users.id ORDER BY referral_profits.created_at DESC LIMIT 1) as last_profit_created_at"
            ))
            ->where([
                'verified' => TRUE,
                'referred_by' => Auth::user()->affiliate_id
            ])
            ->paginate(20);
        $components = [
            'referrals' => $referrals
        ];
        return view('cabinet.referrals', $components);
    }
}
