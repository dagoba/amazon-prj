<?php

namespace App\Http\Controllers\PublicPages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{
    public function index()
    {
        return view('publicpages.reviews');
    }
}
