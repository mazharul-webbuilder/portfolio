<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MetaDataSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Admin Meta Data Setting Page
    */
    public function index(): View
    {
        return \view('admin.setting.meta-data');
    }
}
