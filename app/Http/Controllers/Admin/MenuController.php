<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show Menus
    */
    public function index(): View
    {
        return \view('admin.menu.index');
    }
}
