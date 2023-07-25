<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 */


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
