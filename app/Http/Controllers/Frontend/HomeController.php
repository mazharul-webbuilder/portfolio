<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AdminDetail;
use App\Models\AdminSocial;
use App\Models\Feature;
use App\Models\Meta;
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

        $adminFacebook = AdminSocial::where('name', 'Facebook')->first();
        $adminInstagram = AdminSocial::where('name', 'Instagram')->first();
        $adminLinkedin = AdminSocial::where('name', 'LinkedIn')->first();
        $features = Feature::latest()->get();
        $metaData = Meta::first();

       return \view('frontend.home.home',
           compact('adminDetails', 'adminFacebook', 'adminInstagram', 'adminLinkedin', 'features', 'metaData'));
    }
}
