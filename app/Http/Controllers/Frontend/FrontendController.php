<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class FrontendController extends Controller
{
    function index() : View {
        return view('frontend.pages.home.index');
    }
}
