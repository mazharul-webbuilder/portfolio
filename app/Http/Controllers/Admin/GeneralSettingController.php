<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show General Setting Page
    */
    public function index(): View
    {
        return \view('admin.setting.general-setting');
    }
}
