<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show Index Page
    */
    public function index(): View
    {
        return \view('admin.portfolio.index');
    }
}
