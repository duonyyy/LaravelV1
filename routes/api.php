<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('list-products', [ProductController::class, 'getListProducts'])->name('getListProducts');
Route::get('product/{id}', [ProductController::class, 'getProduct'])->name('getProduct'); 
Route::post('product', [ProductController::class, 'addPostProduct'])->name('addPostProduct');
Route::delete('delete-product', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
Route::patch('update-product/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct');