<?php

use Api\Http\Controllers\Api\v1\IncidentCategoryController;
use Api\Http\Controllers\Api\v1\NewsController;
use Api\Http\Controllers\Api\v1\PetitionController;
use Api\Http\Controllers\Api\v1\UserController;
use App\Http\Middleware\TelegramSecret;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::middleware('auth:api')->group(function () {
        Route::prefix('petition')->group(function () {
            Route::get('show-by-phone', [ PetitionController::class, 'showByPhone' ])
                ->name('show-by-phone')
                ->withoutMiddleware('auth:api')
                ->middleware(TelegramSecret::class);
            Route::get('show/{petition_id}', [ PetitionController::class, 'show' ])->name('show');
            Route::get('show-by-user/{user_id}', [ PetitionController::class, 'showByUser' ])->name('show-by-user');

            Route::post('store', [ PetitionController::class, 'store' ])->name('store');
            Route::post('store-anonymously', [ PetitionController::class, 'storeAnonymously' ])
                ->name('storeAnonymously')
                ->withoutMiddleware('auth:api');
        });

        Route::prefix('user')->group(function () {
            Route::get('show/{user_id}', [ UserController::class, 'show' ])->name('show');
            Route::post('store', [ UserController::class, 'store' ])->name('store')->withoutMiddleware('auth:api');
            Route::post('send-auth-code', [ UserController::class, 'sendAuthCode' ])
                ->name('sendAuthCode')
                ->withoutMiddleware('auth:api');
            Route::post('check-auth-code', [ UserController::class, 'checkAuthCode' ])
                ->name('checkAuthCode')
                ->withoutMiddleware('auth:api');
        });

        Route::prefix('categories')->group(function () {
            Route::get('', [ IncidentCategoryController::class, 'index' ])
                ->name('index')
                ->withoutMiddleware('auth:api');
            Route::get('/{category_id}', [ IncidentCategoryController::class, 'show' ])
                ->name('show')
                ->withoutMiddleware('auth:api');
        });
    });

    Route::prefix('news')->group(function () {
        Route::get('', [ NewsController::class, 'index' ])
            ->name('index');
        Route::get('show/{category_id}', [ NewsController::class, 'show' ])
            ->name('show');
    });
});
