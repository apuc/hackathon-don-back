<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('api')->group(function () {
    Route::prefix('petition')->group(function () {
        Route::get('show/{petition_id}', [\Api\Http\Controllers\Api\v1\PetitionController::class, 'show'])->name('show');
        Route::get('show-by-user/{user_id}', [\Api\Http\Controllers\Api\v1\PetitionController::class, 'showByUser'])->name('show-by-user');
    });
    Route::prefix('user')->group(function () {
        Route::get('show/{user_id}', [\Api\Http\Controllers\Api\v1\UserController::class, 'show'])->name('show');
    });
    Route::prefix('categories')->group(function () {
        Route::get('show', [\Api\Http\Controllers\Api\v1\IncidentCategoryController::class, 'show'])->name('show');
    });
});

require __DIR__.'/auth.php';
