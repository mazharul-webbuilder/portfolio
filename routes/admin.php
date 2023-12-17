<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MetaDataSettingController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\Admin\BlogController;

/**
 * Admin Routes
*/

// Auth
Route::middleware('guest')->prefix('admin/')->name('admin.')->group(function (){
    // Login
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login/auth', [LoginController::class, 'authCheck'])->name('auth.check');
});

// Auth Routes
Route::middleware('admin')->prefix('admin/')->name('admin.')->group(function (){
    // Logout
    Route::post('logout', LogoutController::class)->name('logout');
    // Admin Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Menus
    Route::get('menu/setting', [MenuController::class, 'index'])->name('menus');
    Route::get('menu/setting/datatable', [MenuController::class, 'datatable'])->name('menus.datatable');
    Route::post('menu/setting/datatable', [MenuController::class, 'updateMenuStatus'])->name('menu.status.change');
    Route::get('menu/get', [MenuController::class, 'getMenu'])->name('menu.get');
    Route::post('menu/update', [MenuController::class, 'updateMenu'])->name('menu.update');
    // Features
    Route::get('/features', [FeatureController::class, 'index'])->name('features');
    Route::get('/features/datatable', [FeatureController::class, 'datatable'])->name('features.datatable');
    Route::get('/features/get', [FeatureController::class, 'getFeature'])->name('feature.get');
    Route::post('/features/update', [FeatureController::class, 'updateFeature'])->name('feature.update');
    // Clients
    Route::get('/clients', [ClientsController::class, 'index'])->name('clients');
    Route::get('/clients/datatable', [ClientsController::class, 'datatable'])->name('clients.datatable');
    Route::get('/client/create', [ClientsController::class, 'create'])->name('client.create');
    Route::post('/client/store', [ClientsController::class, 'store'])->name('client.store');
    Route::get('/client/get', [ClientsController::class, 'getClient'])->name('client.get');
    Route::post('/client/update', [ClientsController::class, 'update'])->name('client.update');
    Route::post('/clients/delete', [ClientsController::class, 'delete'])->name('client.delete');
    // Portfolio
    Route::get('/portfolios', [PortfolioController::class, 'index'])->name('portfolio');
    Route::get('/portfolios/datatable', [PortfolioController::class, 'datatable'])->name('portfolio.datatable');
    Route::get('/portfolios/create', [PortfolioController::class, 'create'])->name('portfolio.create');
    Route::post('/portfolios/create', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::post('/portfolios/delete', [PortfolioController::class, 'delete'])->name('portfolio.delete');
    // Pricing
    Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');
    Route::get('/datatable', [PricingController::class, 'datatable'])->name('pricing.datatable');
    Route::get('/edit/price/{id}', [PricingController::class, 'edit'])->name('pricing.edit');
    Route::post('/update/price/info', [PricingController::class, 'update'])->name('pricing.update');

    // Blog
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('/datatable', [BlogController::class, 'datatable'])->name('blog.datatable');
    Route::get('/create/new/blog', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog/post', [BlogController::class, 'postBlog'])->name('blog.post');
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/blog/update', [BlogController::class, 'update'])->name('blog.post.update');
    Route::post('/blog/delete', [BlogController::class, 'delete'])->name('blog.delete');

    // Setting
    Route::get('/general/setting', [GeneralSettingController::class, 'index'])->name('general.setting');
    Route::post('/general/setting', [GeneralSettingController::class, 'updateGeneralSetting'])->name('general.setting.update');
    Route::get('/meta/data/setting', [MetaDataSettingController::class, 'index'])->name('meta.data.setting');
    Route::post('/meta/data/setting', [MetaDataSettingController::class, 'updateMetaSetting'])->name('meta.data.setting.update');
});



