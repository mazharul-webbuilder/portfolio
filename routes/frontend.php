<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\BlogController;

/*Landing Page*/
Route::get('/', [HomeController::class, 'index'])->name('home');

/*Get Blog Details*/
Route::get('/get/blog/details', [BlogController::class, 'details'])->name('blog.details');

/*Contact Data*/
Route::post('/contact/with/me', [ContactController::class, 'contact'])->name('contact');

