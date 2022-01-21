<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\LaporanKeuanganController;
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
    Route::get('/addToCart', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/getTransaction', [ApiController::class, 'getTransaction'])->name('getTransaction');
    Route::get('/getBahanBakuDetail', [ApiController::class, 'getBahanBakuDetail'])->name('getBahanBakuDetail');
    Route::get('/getAllDetailTransaksi', [ApiController::class, 'getAllDetailTransaksi'])->name('getAllDetailTransaksi');
    Route::get('/getRekapPenyuplaian', [ApiController::class, 'getRekapPenyuplaian'])->name('getRekapPenyuplaian');
    Route::get('/getRekapPengeluaran', [ApiController::class, 'getRekapPengeluaran'])->name('getRekapPengeluaran');

    Route::group(['prefix' => 'laporan', 'as' => 'laporan.'], function(){
        Route::get('/getHargaPokokProduksi', [LaporanKeuanganController::class, 'getHargaPokokProduksi'])->name('getHargaPokokProduksi');
        Route::get('/getHargaPokokPenjualan', [LaporanKeuanganController::class, 'getHargaPokokPenjualan'])->name('getHargaPokokPenjualan');
        Route::get('/getLabaRugi', [LaporanKeuanganController::class, 'getLabaRugi'])->name('getLabaRugi');
    });
});