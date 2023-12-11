<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AdminDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display Landing Page
    */
    public function index(): View
    {
        $adminDetails = AdminDetail::first();
       return \view('frontend.home.home', compact('adminDetails'));
    }
}
