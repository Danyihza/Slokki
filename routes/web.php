<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\LKeuanganController;
use App\Http\Controllers\Admin\PengeluaranController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\StokController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
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
    Route::post('/signIn', [AuthController::class, 'signIn'])->name('signIn');
    Route::get('/register', [AuthController::class, 'registerView'])->name('registerView');
    Route::post('/signUp', [AuthController::class, 'signUp'])->name('signUp');
    Route::get('/signOut', [AuthController::class, 'signOut'])->name('signOut');
});

Route::group(['as' => 'home.'], function () {
    Route::get('/', [HomeController::class, 'homeView'])->name('homeView');
});

Route::group(['prefix' => 'catalogue', 'as' => 'catalogue.'], function () {
    Route::get('/', [CatalogueController::class, 'catalogueView'])->name('catalogueView');
});

Route::group(['middleware' => 'authorization', 'prefix' => 'checkout'], function () {
    Route::post('/', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('/checkoutView', [CheckoutController::class, 'checkoutView'])->name('checkoutView');
    Route::get('/changeAddressView', [CheckoutController::class, 'changeAddressView'])->name('changeAddressView');
    Route::post('/changeAddress', [CheckoutController::class, 'changeAdress'])->name('changeAddress');
});

Route::group(['middleware' => 'authorization', 'prefix' => 'order', 'as' => 'order.'], function() {
    Route::get('/', [OrderController::class, 'orderDetailView'])->name('orderDetailView');
    Route::post('/addOrder', [OrderController::class, 'addOrder'])->name('addOrder');
    Route::post('/uploadBuktiPembayaran', [OrderController::class, 'uploadBuktiPembayaran'])->name('uploadBuktiPembayaran');
});

Route::group(['middleware' => 'authorization', 'as' => 'cart.'], function () {
    Route::get('/addToCart', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/showCart', [CartController::class, 'showCart'])->name('showCart');
    Route::get('/flushCart', [CartController::class, 'flushCart'])->name('flushCart');
    Route::get('/increaseQuantity', [CartController::class, 'increaseQuantity'])->name('increaseQuantity');
    Route::get('/decreaseQuantity', [CartController::class, 'decreaseQuantity'])->name('decreaseQuantity');
});
// Route::get('/', [HomeController::class, 'homeView']);

// OWNER ROUTES \\
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'authorization'], function(){
    Route::get('/', [AdminHomeController::class, 'homeView'])->name('homeView');
    Route::get('/transaksi', [TransaksiController::class, 'transactionView'])->name('transactionView');
    Route::get('/stok', [StokController::class, 'stokView'])->name('stokView');
    Route::post('/addStokBahanBaku', [StokController::class, 'addStokBahanBaku'])->name('addStokBahanBaku');
    Route::post('/addStokBarangProses', [StokController::class, 'addStokBarangProses'])->name('addStokBarangProses');
    Route::post('/addStokProdukJadi', [StokController::class, 'addStokProdukJadi'])->name('addStokProdukJadi');
    Route::get('/report', [ReportController::class, 'reportView'])->name('reportView');
    Route::post('/transaksi/updateTransaksi', [TransaksiController::class, 'updateTransaction'])->name('updateTransaction');
    Route::get('/laporanKeuangan', [LKeuanganController::class, 'laporanKeuanganView'])->name('laporanKeuanganView');
    Route::get('/pengeluaran', [PengeluaranController::class, 'pengeluaranView'])->name('pengeluaranView');
    Route::post('pengeluaran/addPenyuplaian', [PengeluaranController::class, 'addPenyuplaian'])->name('addPenyuplaian');
});