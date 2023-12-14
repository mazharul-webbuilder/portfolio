<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminDetail;
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
        $adminDetails = AdminDetail::first();

        return \view('admin.setting.general-setting', compact('adminDetails'));
    }
}
