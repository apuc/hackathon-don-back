<?php

use App\Http\Controllers\IncidentCategoryController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('/', UserController::class);
    Route::resource('users', UserController::class);
    Route::resource('incident-categories', IncidentCategoryController::class);
    Route::resource('petitions', PetitionController::class);
    Route::resource('news', NewsController::class);
});
//->middleware(['auth']);





