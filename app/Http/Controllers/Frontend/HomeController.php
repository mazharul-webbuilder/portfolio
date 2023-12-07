<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display Landing Page
    */
    public function index(): View
    {
       dd(url('/admin/login'));
    }
}
