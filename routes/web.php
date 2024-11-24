<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Http\Request;
// use App\Livewire\Admin\Brand\Index;
use Illuminate\Support\Facades\Route;

// Frontend
Route::group([], function(){

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/home', [FrontendController::class, 'index']);
    Route::get('/collection', [FrontendController::class, 'AllProducts']);
    Route::get('/collection/{category_slug}', [FrontendController::class, 'products']);
    Route::get('/collection/{category_slug}/{product_slug}', [FrontendController::class, 'product']);

    Route::middleware('guest')->group(function(){
        Route::get('/login', [FrontendAuthController::class, 'login'])->name('login');
        Route::get('/register', [FrontendAuthController::class, 'register'])->name('register');
    });

    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::get('/cart', [CartController::class, 'index']);

    Route::middleware(['auth'])->group(function(){

        Route::middleware('verified')->group(function () {
            Route::get('/profile', [ProfileController::class, 'index']);
            Route::get('/track-order/{tracking_no}', [ProfileController::class, 'track'])->name('track_order');
            Route::get('/checkout/{product_slug}', [CheckoutController::class, 'single'])->name('singleCheckout');
            Route::get('/payment', [PaymentController::class, 'pay'])->name('payment');
            Route::get('/thank-you', [FrontendController::class, 'thankyou']);
            Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
            Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);
            Route::get('/checkout', [CheckoutController::class, 'index']);
        });
        Route::post('/logout', [FrontendAuthController::class, 'logout'])->name('user.logout');

        Route::get('/email/verify', [FrontendAuthController::class, 'verifyEmail'])->middleware('auth')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}',[FrontendAuthController::class, 'emailVerify'])->middleware(['auth', 'signed'])->name('verification.verify');
    });



});



// Admin
Route::prefix('admin')->group(function () {

    Route::middleware(['auth', 'is_admin', 'admin_device'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Category
        Route::resource('category', CategoryController::class)->only(['index', 'create', 'edit']);

        // Sub Category
        Route::resource('subcategory', SubCategoryController::class)->only(['index', 'create', 'edit']);

        // Product
        Route::resource('product', ProductController::class);

        // Color
        Route::resource('/color', ColorController::class);

        // Orders
        Route::resource('/orders', OrderController::class);

        // Users
        Route::resource('/users', UserController::class);

        Route::get('/invoice/{id}', [OrderController::class, 'viewInvoice'])->name('order.invoice');

        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
    });

    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'login']);
        Route::get('/register', [AuthController::class, 'register']);
        Route::resource('login', AuthController::class)->only(['store', 'create']);
    });

});
