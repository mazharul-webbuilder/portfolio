<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use Illuminate\Support\Facades\Route;

/*Landing Page*/
Route::get('/', [HomeController::class, 'index'])->name('home');
/*Contact Data*/
Route::post('/contact/with/me', [ContactController::class, 'contact'])->name('contact');

