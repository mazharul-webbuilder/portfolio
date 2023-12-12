<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AdminDetail;
use App\Models\AdminSocial;
use App\Models\Blog;
use App\Models\Feature;
use App\Models\Meta;
use App\Models\Portfolio;
use App\Models\Pricing;
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

        $blogs = Blog::with('blogCategory')->latest()->get();

        $staticPricing = Pricing::whereHas('pricingCategory', function ($q){
            return $q->where('constant', 'static');
        })->first();
        $standardPricing = Pricing::whereHas('pricingCategory', function ($q){
            return $q->where('constant', 'standard');
        })->first();
        $premiumPricing = Pricing::whereHas('pricingCategory', function ($q){
            return $q->where('constant', 'premium');
        })->first();

        $portfolios = Portfolio::latest()->get();

       return \view('frontend.home.home',
           compact('adminDetails',
               'adminFacebook',
               'adminInstagram',
               'adminLinkedin',
               'features',
               'metaData',
               'blogs',
               'staticPricing',
               'standardPricing',
               'premiumPricing',
                'portfolios'
           ));
    }
}
