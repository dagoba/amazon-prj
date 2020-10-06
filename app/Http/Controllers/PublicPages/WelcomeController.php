<?php

namespace App\Http\Controllers\PublicPages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $amz_data = DB::table('amz_items')->get();
        $components = [
            'amz_data' => $amz_data,
        ];
        return view('publicpages.welcome', $components);
    }
}
