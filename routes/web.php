<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\OderController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ClientController;


// Default Route
Route::get('/', function () {
    return redirect()->route('users.home');
});

// Authentication Routes
Route::get('login', [AuthenController::class, 'login'])->name('login');
Route::post('login', [AuthenController::class, 'postlogin'])->name('postlogin');
Route::get('logout', [AuthenController::class, 'logout'])->name('logout');


Route::get('register', [AuthenController::class, 'register'])->name('register');

// Admin Routes
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'checkAdmin'
], function () {

    Route::get('dashboard', [AuthenController::class, 'dashboard'])->name('dashboard');

    // User Management Routes
    Route::group([
        'prefix' => 'users',
        'as' => 'users.',
    ], function () {
        Route::get('/', [UserController::class, 'listUsers'])->name('listUsers');
        Route::post('add-user', [UserController::class, 'addUsers'])->name('addUsers');
        Route::delete('delete/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
        Route::get('detail-user', [UserController::class, 'detailUser'])->name('detailUser');
        Route::patch('update-user', [UserController::class, 'updateUser'])->name('updateUser');
    });

    // Category Management Routes
    Route::group([
        'prefix' => 'categories',
        'as' => 'categories.',
    ], function () {
        Route::get('/', [CategoryController::class, 'listCategories'])->name('listCategories');
        Route::get('add-category', [CategoryController::class, 'addCategory'])->name('addCategory');
        Route::post('add-category', [CategoryController::class, 'addPostCategory'])->name('addPostCategory');
        Route::delete('delete-category/{idCategory}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
        Route::get('update-category/{idCategory}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
        Route::patch('update-category', [CategoryController::class, 'updatePatchCategory'])->name('updatePatchCategory');
    });

    // Product Management Routes
    Route::group([
        'prefix' => 'products',
        'as' => 'products.',
    ], function () {
        Route::get('/', [ProductController::class, 'listProducts'])->name('listProducts');
        Route::get('add-product', [ProductController::class, 'addProduct'])->name('addProduct');
        Route::post('add-product', [ProductController::class, 'addPostProduct'])->name('addPostProduct');
        Route::delete('delete-product/{idProduct}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
        Route::get('update-product/{idProduct}', [ProductController::class, 'updateProduct'])->name('updateProduct');
        Route::patch('update-product', [ProductController::class, 'updatePatchProduct'])->name('updatePatchProduct');
    });
    // slider
    Route::group([
        'prefix' => 'sliders',
        'as' => 'sliders.',

    ], function () {
        Route::get('/', [SlidersController::class, 'listSliders'])->name('listSliders');
        Route::get('add-slider', [SlidersController::class, 'addSlider'])->name('addSlider');
        Route::post('add-slider', [SlidersController::class, 'addPostSlider'])->name('addPostSlider');
        Route::delete('delete-slider/{idSlider}', [SlidersController::class, 'deleteSlider'])->name('deleteSlider');
        Route::get('update-slider/{idSlider}', [SlidersController::class, 'updateSlider'])->name('updateSlider');
        Route::patch('update-slider', [SlidersController::class, 'updatePatchSlider'])->name('updatePatchSlider');
    });
    //socials  
    Route::group([
        'prefix' => 'socials',
        'as' => 'socials.',

    ], function () {
        Route::get('/', [SocialController::class, 'listSocial'])->name('listSocial');
        Route::get('add-social', [SocialController::class, 'addSocial'])->name('addSocial');
        Route::post('add-social', [SocialController::class, 'addPostSocial'])->name('addPostSocial');
        Route::delete('delete-social/{idSocial}', [SocialController::class, 'deleteSocial'])->name('deleteSocial');
        Route::get('update-social/{idSocial}', [SocialController::class, 'updateSocial'])->name('updateSocial');
        Route::patch('update-social/{idSocial}', [SocialController::class, 'updatePatchSocial'])->name('updatePatchSocial');
    });

    Route::group([
        'prefix' => 'managers',
        'as' => 'managers.',
    ], function () {
        // Term
        Route::get('term', [TermController::class, 'getTerm'])->name('getTerm');
        Route::patch('store-or-update-term', [TermController::class, 'storeOrUpdateTerm'])->name('storeOrUpdateTerm');
        // Contact
        Route::get('contact', [ContactController::class, 'getContact'])->name('getContact');
        Route::patch('store-or-update-contact', [ContactController::class, 'storeOrUpdateContact'])->name('storeOrUpdateContact');
        // About
        Route::get('about', [AboutController::class, 'getAbout'])->name('getAbout');
        Route::patch('store-or-update-about', [AboutController::class, 'storeOrUpdateAbout'])->name('storeOrUpdateAbout');
        // Setting
        Route::get('setting', [SettingController::class, 'getSetting'])->name('getSetting');
        Route::patch('store-or-update-setting', [SettingController::class, 'storeOrUpdateSetting'])->name('storeOrUpdateSetting');
    });

    Route::group([
        'prefix' => 'orders',
        'as' => 'orders.',
    ], function () {
        Route::get('/', [OderController::class, 'listOrders'])->name('listOrders');
        Route::delete('delete-order/{order_id}', [OderController::class, 'deleteOrder'])->name('deleteOrder');
    });
});



// User Routes
Route::group([
    'prefix' => 'users',
    'as' => 'users.',
], function () {
    // Public User Routes
    Route::get('home', [HomeController::class, 'home'])->name('home');
    Route::get('category_products/{categoryId}', [HomeController::class, 'categoryProducts'])->name('categoryProducts');
    Route::get('detail-product/{id}', [HomeController::class, 'detailProduct'])->name('detailProduct');

    // Protected User Routes (Requires checkUser middleware)
    Route::group([
        'middleware' => 'checkUser',
    ], function () {
        // Cart Routes
        Route::post('add-to-cart', [ClientController::class, 'addToCart'])->name('addToCart');
        Route::get('view-cart', [ClientController::class, 'cart'])->name('cart');
        Route::patch('update-cart', [ClientController::class, 'updateCart'])->name('updateCart');
        Route::delete('delete-cart-item/{cartItemId}', [ClientController::class, 'deleteCart'])->name('deleteCart');
        Route::delete('delete-cart/{id}', [ClientController::class, 'deleteCartAjax'])->name('users.deleteCartAjax');


        // Checkout Routes
        Route::get('checkout', [OrderController::class, 'showCheckout'])->name('showCheckout');
        Route::post('process-checkout', [OrderController::class, 'processCheckout'])->name('processCheckout');

        // Comment Routes
        Route::post('add-comment', [ClientController::class, 'store'])->name('store');
        Route::put('comments/{id}', [ClientController::class, 'updateComment'])->name('updateComment');
        Route::delete('comments/{id}', [ClientController::class, 'deleteComment'])->name('deleteComment');
    });
});
