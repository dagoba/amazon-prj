<?php

namespace App\Http\Controllers\Cabinet;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class BalanceController extends Controller
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
        $transactions = Transaction::where([
            'user_id' => Auth::user()->id
            ])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        $components = [
            'transactions' => $transactions,
        ];
        return view('cabinet.balance', $components);
    }
}
