<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\User\HomeController;

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'checkAdmin'
], function () {

    Route::get('dashboard', [AuthenController::class, 'dashboard'])->name('dashboard');

     // Users Routes
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


    // Categories Routes
    Route::group([
        'prefix' => 'categories',
        'as' => 'categories.',
    ], function () {
        Route::get('/', [CategoryController::class, 'listCategories'])->name('listCategories');
        Route::get('add-category', [CategoryController::class, 'addCategory'])->name('addCategory');
        Route::post('add-category', [CategoryController::class, 'addPostCategory'])->name('addPostCategory');
        Route::delete('delete-category', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
        Route::get('update-category/{idCategory}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
        Route::patch('update-category', [CategoryController::class, 'updatePatchCategory'])->name('updatePatchCategory');
    });

     // Productes Routes
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
});

Route::get('login', [AuthenController::class, 'login'])->name('login');
Route::post('login', [AuthenController::class, 'postlogin'])->name('postlogin');
Route::get('logout', [AuthenController::class, 'logout'])->name('logout');







Route::group([
    'prefix' => 'users',     
    'as' => 'users.',       
], function () {

    // Route cho trang 'home' của người dùng
    Route::get('home', [HomeController::class, 'home'])->name('home');
    Route::get('detail-product/{id}', [HomeController::class, 'detailProduct'])->name('detailProduct');

});

Route::get('/', function(){
    return redirect()->route('users.home');
});
