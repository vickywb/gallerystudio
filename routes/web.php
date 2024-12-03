<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PackageController as AdminPackageController;
use App\Http\Controllers\Admin\PortofolioController as AdminPortofolioController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Checkout\TransactionController;
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
Route::get('/blogs/{blog:slug}', [BlogController::class, 'view'])->name('blog.detail');
Route::get('/packages', [PackageController::class, 'index'])->name('package');
Route::get('/contacts', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/captcha-refresh', [ContactController::class, 'captchaRefresh'])->name('captcha.refresh');

//Checkout Package
// Route::get('/packages/{package:slug}/detail-packages', [TransactionController::class, 'checkoutPage'])->name('checkout.package');
// Route::post('/packages/payments/{package:slug}', [TransactionController::class, 'payment'])->name('checkout.payment');
Route::controller(TransactionController::class)->group(function () {
    Route::get('/packages/{package:slug}/detail-packages', 'checkoutPage')->name('checkout.package');
    Route::post('/packages/payments/{package:slug}', 'checkoutStore')->name('checkout.package.store');
    Route::get('/payments/{transaction:external_id}', 'paymentPage')->name('payment.page');
    Route::post('/callback-notification', 'callbakNotification')->name('callbakNotification');
    Route::get('/payments/status/success', 'paymentSuccess')->name('payment.success');
    Route::get('/payments/status/failed', 'paymentFailed')->name('payment.failed');
});

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
        Route::controller(AdminCategoryController::class)->group(function () {
            Route::get('/categories', 'index')->name('admin.category.index');
            Route::get('/categories/create', 'create')->name('admin.category.create');
            Route::post('/categories/store', 'store')->name('admin.category.store');
            Route::get('/categories/{category}/edit', 'edit')->name('admin.category.edit');
            Route::patch('/categories/{category}/update', 'update')->name('admin.category.update');
            Route::delete('/categories/{category}/delete', 'destroy')->name('admin.category.delete');
        });

        //About
        Route::controller(AdminAboutController::class)->group(function () {
            Route::get('/abouts', 'index')->name('admin.about.index');
            Route::get('/abouts/create', 'create')->name('admin.about.create');
            Route::post('/abouts/store', 'store')->name('admin.about.store');
            Route::get('/abouts/{about}/edit', 'edit')->name('admin.about.edit');
            Route::patch('/abouts/{about}/update', 'update')->name('admin.about.update');
            Route::delete('/abouts/{about}/delete', 'destroy')->name('admin.about.delete');
        });

        //Portofolio
        Route::controller(AdminPortofolioController::class)->group(function () {
            Route::get('/portofolios', 'index')->name('admin.portofolio.index');
            Route::get('/portofolios/create', 'create')->name('admin.portofolio.create');
            Route::post('/portofolios/store', 'store')->name('admin.portofolio.store');
            Route::get('/portofolios/{portofolio}/edit', 'edit')->name('admin.portofolio.edit');
            Route::patch('/portofolios/{portofolio}/update', 'update')->name('admin.portofolio.update');
            Route::delete('/portofolios/{portofolio}/delete', 'destroy')->name('admin.portofolio.delete');
        });
                
        //Blog
        Route::controller(AdminBlogController::class)->group(function () {
            Route::get('/blogs', 'index')->name('admin.blog.index');
            Route::get('/blogs/create', 'create')->name('admin.blog.create');
            Route::post('/blogs/store', 'store')->name('admin.blog.store');
            Route::get('/blogs/{blog}/edit', 'edit')->name('admin.blog.edit');
            Route::patch('/blogs/{blog}/update', 'update')->name('admin.blog.update');
            Route::delete('/blogs/{blog}/delete', 'destroy')->name('admin.blog.delete');
        });
                
        //Package
        Route::controller(AdminPackageController::class)->group(function () {
            Route::get('/packages', 'index')->name('admin.package.index');
            Route::get('/packages/create', 'create')->name('admin.package.create');
            Route::post('/packages/store', 'store')->name('admin.package.store');
            Route::get('/packages/{package}/edit', 'edit')->name('admin.package.edit');
            Route::patch('/packages/{package}/update', 'update')->name('admin.package.update');
            Route::delete('/packages/{package}/delete', 'destroy')->name('admin.package.delete');

            //Package Detail
            Route::get('/packages/{package}/detail', 'detail')->name('admin.package.detail');
        });

        //Contact
        Route::controller(AdminContactController::class)->group(function () {
            Route::get('/contacts', 'index')->name('admin.contact.index');
            Route::delete('/contacts/delete/{contact}', 'destroy')->name('admin.contact.delete');
        });

        //User
        Route::controller(AdminUserController::class)->group(function () {
            Route::get('/users', 'index')->name('admin.user.index');
            Route::get('/users/create', 'create')->name('admin.user.create');
        });

        //Transaction
        Route::controller(AdminTransactionController::class)->group(function () {
            Route::get('/transactions', 'index')->name('admin.transaction.index');
            Route::get('/transactions/{transaction}/edit', 'edit')->name('admin.transaction.edit');
            Route::patch('/transactions/{transaction}/update', 'update')->name('admin.transaction.update');
        });
});