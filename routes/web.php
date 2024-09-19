<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PackageController as AdminPackageController;
use App\Http\Controllers\Admin\PortofolioController as AdminPortofolioController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PortofolioController;
use Illuminate\Support\Facades\Route;

//Frontend Route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/abouts', [AboutController::class, 'index'])->name('about');
Route::get('/portofolios', [PortofolioController::class, 'index'])->name('portofolio');
Route::get('/blogs', [BlogController::class, 'index'])->name('blog');
Route::get('/packages', [PackageController::class, 'index'])->name('package');
Route::get('/contacts', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store')->middleware('throttle:2, 1');

//Login Admin Route
Route::controller(AuthController::class)
    ->prefix('auth')
    ->middleware('guest')
    ->group(function () {
        Route::get('/login', 'loginPage')->name('loginPage');
        Route::post('/login', 'loginProccess')->name('loginProccess');
});

//Admin Panel Route
Route::prefix('admin')
    ->middleware(['role:admin'])
    ->group(function () {

        //Logout
        Route::controller(AuthController::class)->group( function () {
            Route::get('/logout', 'logout')->name('admin.logout');
        });
        
        //Dashboard Admin
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'index')->name('admin.dashboard');
        });
        
        //Category
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category', 'index')->name('admin.category.index');
            Route::get('/category/create', 'create')->name('admin.category.create');
            Route::post('/category/store', 'store')->name('admin.category.store');
            Route::get('/category/{category}/edit', 'edit')->name('admin.category.edit');
            Route::patch('/category/{category}/update', 'update')->name('admin.category.update');
            Route::delete('/category/{category}/delete', 'destroy')->name('admin.category.delete');
        });

        //About
        Route::controller(AdminAboutController::class)->group(function () {
            Route::get('/about', 'index')->name('admin.about.index');
            Route::get('/about/create', 'create')->name('admin.about.create');
            Route::post('/about/store', 'store')->name('admin.about.store');
            Route::get('/about/{about}/edit', 'edit')->name('admin.about.edit');
            Route::patch('/about/{about}/update', 'update')->name('admin.about.update');
            Route::delete('/about/{about}/delete', 'destroy')->name('admin.about.delete');
        });

        //Portofolio
        Route::controller(AdminPortofolioController::class)->group(function () {
            Route::get('/portofolio', 'index')->name('admin.portofolio.index');
            Route::get('/portofolio/create', 'create')->name('admin.portofolio.create');
            Route::post('/portofolio/store', 'store')->name('admin.portofolio.store');
            Route::get('/portofolio/{portofolio}/edit', 'edit')->name('admin.portofolio.edit');
            Route::patch('/portofolio/{portofolio}/update', 'update')->name('admin.portofolio.update');
            Route::delete('/portofolio/{portofolio}/delete', 'destroy')->name('admin.portofolio.delete');
        });
                
        //Blog
        Route::controller(AdminBlogController::class)->group(function () {
            Route::get('/blog', 'index')->name('admin.blog.index');
            Route::get('/blog/create', 'create')->name('admin.blog.create');
            Route::post('/blog/store', 'store')->name('admin.blog.store');
            Route::get('/blog/{blog}/edit', 'edit')->name('admin.blog.edit');
            Route::patch('/blog/{blog}/update', 'update')->name('admin.blog.update');
            Route::delete('/blog/{blog}/delete', 'destroy')->name('admin.blog.delete');
        });
                
        //Package
        Route::controller(AdminPackageController::class)->group(function () {
            Route::get('/package', 'index')->name('admin.package.index');
            Route::get('/package/create', 'create')->name('admin.package.create');
            Route::post('/package/store', 'store')->name('admin.package.store');
            Route::get('/package/{package}/edit', 'edit')->name('admin.package.edit');
            Route::patch('/package/{package}/update', 'update')->name('admin.package.update');
            Route::delete('/package/{package}/delete', 'destroy')->name('admin.package.delete');
        });

        //Contact
        Route::controller(AdminContactController::class)->group(function () {
            Route::get('/contact', 'index')->name('admin.contact.index');
            Route::delete('/contact/delete/{contact}', 'destroy')->name('admin.contact.delete');
        });
});