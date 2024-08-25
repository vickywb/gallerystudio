<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PortofolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/abouts', [AboutController::class, 'index'])->name('about');
Route::get('/portofolios', [PortofolioController::class, 'index'])->name('portofolio');
Route::get('/blogs', [BlogController::class, 'index'])->name('blog');
Route::get('/packages', [PackageController::class, 'index'])->name('package');
Route::get('/contacts', [ContactController::class, 'index'])->name('contact');

Route::controller(AuthController::class)
    ->prefix('auth')
    ->middleware('guest')
    ->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'loginProccess')->name('loginProccess');
});

Route::get('/admin', [DashboardController::class, 'index']);