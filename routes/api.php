<?php

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

Route::prefix('petition')->group(function () {
    Route::get('show/{petition_id}', [\Api\Http\Controllers\Api\v1\PetitionController::class, 'show'])->name('show');
    Route::get('show-by-user/{user_id}', [\Api\Http\Controllers\Api\v1\PetitionController::class, 'showByUser'])->name('show-by-user');
    Route::post('store', [\Api\Http\Controllers\Api\v1\PetitionController::class, 'store'])->name('store');
});
Route::prefix('user')->group(function () {
    Route::get('show/{user_id}', [\Api\Http\Controllers\Api\v1\UserController::class, 'show'])->name('show');
    Route::post('store', [\Api\Http\Controllers\Api\v1\UserController::class, 'store'])->name('store');
});

Route::prefix('categories')->group(function () {
    Route::get('show', [\Api\Http\Controllers\Api\v1\IncidentCategoryController::class, 'show'])->name('show');
});
