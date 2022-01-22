<?php

use Illuminate\Support\Facades\Route;
use Mahmud\GglinkTest\Http\Controllers\HomeController;
use Mahmud\GglinkTest\Http\Controllers\AuthController;
use Mahmud\GglinkTest\Http\Controllers\UserController;

Route::group(['namespace' => 'Mahmud\GglinkTest\Http\Controllers'], function() {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'show'])->name('user.show');
        Route::get('/create', [UserController::class, 'show'])->name('user.create');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit', [UserController::class, 'store'])->name('user.edit');
        Route::put('update', [UserController::class, 'update'])->name('user.update');
        Route::delete('/delete', [UserController::class, 'destroy'])->name('user.destroy');
    });
});
