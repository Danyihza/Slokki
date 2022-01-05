<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\Region;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['as' => 'api.'], function(){
    Route::get('/regency', [Region::class, 'getRegencies'])->name('getRegencies');
    Route::get('/district', [Region::class, 'getDistricts'])->name('getDistricts');
    Route::get('/village', [Region::class, 'getVillages'])->name('getVillages');
    Route::get('/checkEmail', [ApiController::class, 'checkEmail'])->name('checkEmail');
    Route::get('/checkUsername', [ApiController::class, 'checkUsername'])->name('checkUsername');
});