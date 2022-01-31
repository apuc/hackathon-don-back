<?php

use Api\Http\Controllers\Api\v1\IncidentCategoryController;
use Api\Http\Controllers\Api\v1\PetitionController;
use Api\Http\Controllers\Api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    Route::prefix('petition')->group(function () {
        Route::get('show/{petition_id}', [ PetitionController::class, 'show'])->name('show');
        Route::get('show-by-user/{user_id}', [ PetitionController::class, 'showByUser'])->name('show-by-user');
        Route::post('store', [ PetitionController::class, 'store'])->name('store');
    });

    Route::prefix('user')->group(function () {
        Route::get('show/{user_id}', [ UserController::class, 'show'])->name('show');
        Route::post('store', [ UserController::class, 'store'])->name('store');
        Route::post('send-auth-code', [ UserController::class, 'sendAuthCode' ])
            ->name('sendAuthCode')
            ->withoutMiddleware('auth:api')
        ;
        Route::post('check-auth-code', [ UserController::class, 'checkAuthCode' ])
            ->name('checkAuthCode')
            ->withoutMiddleware('auth:api')
        ;
    });

    Route::prefix('categories')->group(function () {
        Route::get('show/{category_id?}', [ IncidentCategoryController::class, 'show'])->name('show');
    });
});

Route::prefix('news')->group(function () {
    Route::get('show/{category_id?}', [\Api\Http\Controllers\Api\v1\NewsController::class, 'show'])->name('show');
});
