<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\ProductController as AdminProductController;
use App\Http\Controllers\AdminPanel\CategoryController;
use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\AdminPanel\CartController;
use App\Http\Controllers\AdminPanel\DashboardController;
use App\Http\Controllers\AdminPanel\OrderController;
use App\Http\Controllers\AdminPanel\PaymentController;
use App\Http\Controllers\Website\AuthController;
use App\Http\Controllers\Website\CollectionController;
use App\Http\Controllers\Website\HomePageController;
use App\Http\Controllers\Website\PageController;
use App\Http\Controllers\Website\ProductController as WebsiteProductController;
use App\Http\Controllers\Website\OrderController as WebsiteOrderController;


// Routes cho Admin
Route::controller(AdminController::class)->prefix('admin')->group(function () {
    Route::get('login', 'login')->name('admin.login');
    Route::post('login', 'loginAction')->name('admin.login.action');
    Route::get('logout', 'logout')->name('admin.logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', 'profile')->name('admin.profile');

    // User routes (quản lý người dùng)
    Route::controller(AdminController::class)->prefix('users')->group(function() {
        Route::get('', 'index')->name('users');
        Route::put('lock/{id}', 'lockUser')->name('users.lock');
        Route::put('unlock/{id}', 'unlockUser')->name('users.unlock');
    });

    // Product routes
    Route::controller(AdminProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });

    // Category routes
    Route::controller(CategoryController::class)->prefix('categories')->group(function () {
        Route::get('', 'index')->name('categories');
        Route::get('create', 'create')->name('categories.create');
        Route::post('store', 'store')->name('categories.store');
        Route::get('show/{id}', 'show')->name('categories.show');
        Route::get('edit/{id}', 'edit')->name('categories.edit');
        Route::put('edit/{id}', 'update')->name('categories.update');
        Route::delete('destroy/{id}', 'destroy')->name('categories.destroy');
    });

    // Order routes
    Route::controller(OrderController::class)->prefix('orders')->group(function () {
        Route::get('', 'index')->name('orders');
        Route::get('show/{id}', 'show')->name('orders.show');
        Route::put('update/{id}', 'update')->name('orders.update');
        Route::delete('destroy/{id}', 'destroy')->name('orders.destroy');
    });

    // Payment routes
    Route::controller(PaymentController::class)->prefix('payments')->group(function() {
        Route::get('', 'index')->name('payments');
        Route::put('update/{id}', 'update')->name('payments.update');
    });

    // Cart routes
    Route::controller(CartController::class)->prefix('carts')->group(function() {
        Route::get('', 'index')->name('carts');
    });
});

// Routes cho User (đăng nhập, đăng ký)
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/forgot-password', 'ShowForgetPasswordForm')->name('auth.forgetPassword');
    Route::post('/forgot-password', 'SubmitForgotPasswordForm')->name('auth.SubmitForgotPassword');
    Route::get('/reset-password/{token}', 'ShowResetPasswordForm')->name('auth.ShowResetPassword');
    Route::post('/reset-password' ,'SubmitResetPasswordForm')->name('auth.SubmitResetPassword');
});


// Route cho Dashboard
Route::get('/', [HomePageController::class, 'index'])->name('homepage');

// Routes cho Collections
Route::controller(CollectionController::class)->prefix('collections')->group(function () {
    Route::get('all-products', 'showAllProduct')->name('collections.all-products');
    Route::get('/{categoryName}', 'showCategory')->name('collections.category');
});

// Routes cho Pages
Route::controller(PageController::class)->prefix('pages')->group(function () {
    Route::get('about', 'about')->name('pages.about');
    Route::get('blog', 'blog')->name('pages.blog');
    Route::get('contact', 'contact')->name('pages.contact');
    Route::get('cart', 'cart')->name('pages.cart');
    Route::get('order-tracking', 'checkOrder')->name('pages.checkOrder');
    Route::post('cart/add/{productId}', 'addToCart')->name('cart.add');
    Route::delete('cart/remove/{productId}', 'removeFromCart')->name('cart.remove');
    Route::put('cart/update/{productId}', 'updateCartQuantity')->name('cart.update');
    Route::post('proceedToCheckout','proceedToCheckout')->name('cart.proceedToCheckout');
    Route::get('checkout','checkout')->name('pages.checkout');
    Route::get('privacy-policy', 'privacyPolicy')->name('pages.privacy_policy');
    Route::get('terms-of-service', 'termsOfService')->name('pages.terms_of_service');
    Route::get('account', 'account')->name('pages.account');
    Route::get('wishlist', 'wishlist')->name('pages.wishlist');
    Route::post('wishlist/add/{productId}', 'addToWishlist')->name('wishlist.add');
    Route::delete('wishlist/remove/{productId}', 'removeFromWishlist')->name('wishlist.remove');
    Route::get('countQuantity','countQuantity')->name('pages.countQuantity');
    Route::post('/momo-ipn', 'momoIpn')->name('payments.momo_ipn');

});

Route::controller(WebsiteProductController::class)->prefix('products')->group(function () {
    Route::get('search', 'searchProduct')->name('products.search');
    Route::get('{id}', 'show')->name('products.detail');
});

Route::controller(WebsiteOrderController::class)->prefix('orders')->group(function () {
    Route::post('placeOrder', 'placeOrder')->name('orders.placeOrder');
    Route::get('order_confirmation', 'orderConfirmation')->name('orders.order_confirmation');
    Route::get('order_detail/{orderId}', 'orderDetail')->name('orders.order_detail');
    Route::patch('{order_id}/cancel', 'cancelOrder')->name('orders.cancel');
    Route::post('{order_id}/feedback',  'submitFeedback')->name('orders.feedback');
});
