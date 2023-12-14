<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MetaDataSettingController;
use App\Http\Controllers\Admin\GeneralSettingController;

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
    // Setting
    Route::get('/general/setting', [GeneralSettingController::class, 'index'])->name('general.setting');
    Route::post('/general/setting', [GeneralSettingController::class, 'updateGeneralSetting'])->name('general.setting.update');
    Route::get('/meta/data/setting', [MetaDataSettingController::class, 'index'])->name('meta.data.setting');
    Route::post('/meta/data/setting', [MetaDataSettingController::class, 'updateMetaSetting'])->name('meta.data.setting.update');
});



