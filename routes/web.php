<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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


Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
    Route::get('/register', [AuthController::class, 'registerView'])->name('registerView');
    Route::post('/signUp', [AuthController::class, 'signUp'])->name('signUp');
});
Route::group(['as' => 'home'], function () {
    Route::get('/', [HomeController::class, 'homeView'])->name('homeView');
});
// Route::get('/', [HomeController::class, 'homeView']);