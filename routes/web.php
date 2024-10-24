<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {
    Route::group([
        'prefix' => 'users',
        'as' => 'users.',
    ], function () {
        Route::get('/', [UserController::class, 'listUsers'])->name('listUsers');
    });
});

route::get('get',function(){
    return view('user.home');
});

