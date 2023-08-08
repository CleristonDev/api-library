<?php

use App\Http\Controllers\auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\auth\RegisterController;

# Public routes
Route::prefix('v1')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::prefix('auth')->group(function () {
            Route::post('/register', 'register');
        });
    });
});

# Private routes
Route::group(
    ['middleware' => ['auth:sanctum']],
    function () {
    Route::prefix('v1')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::prefix('users')->group(function () {
                Route::get('/', 'listAll');
                Route::get('/{user}', 'listOne');
                Route::post('/', 'create');
                Route::patch('/{user}', 'update');
                Route::delete('/{user}', 'delete');
            });
        });
    });
});
