<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BahanBaku;
use App\Models\Customer;
use App\Models\DetailPenyuplaian;
use App\Models\DetailTransaksi;
use App\Models\Pengeluaran;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function checkEmail(Request $request)
    {
        $email = $request->email;
        $user = Customer::where('email', $email)->first();
        
        if ($user) {
            return response()->json([
                'code' => 200,
                'status' => 'success',
                'data' => $user
            ]);
        } else {
            return response()->json([
                'code' => 404,
                'status' => 'error',
                'message' => 'Email tidak ditemukan'
            ]);
        }
    }

    public function checkUsername(Request $request)
    {
        $username = $request->username;
        $user = Customer::where('username', $username)->first();
        
        if ($user) {
            return response()->json([
                'code' => 200,
                'status' => 'success',
                'data' => $user
            ]);
        } else {
            return response()->json([
                'code' => 404,
                'status' => 'error',
                'message' => 'Username tidak ditemukan'
            ]);
        }
    }

    public function getTransaction(Request $request)
    {
        $id = $request->id;
        $transaction = Transaksi::where('id_transaksi', $id)->with('detailTransaksi','customer','DetailTransaksi.produk','DetailTransaksi.transaksi')->first();
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'data' => $transaction
        ]);
    }

    public function getBahanBakuDetail(Request $request)
    {
        $id_bahan_baku = $request->id;
        $bahan_baku = BahanBaku::where('id_bahan_baku', $id_bahan_baku)->first();
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'data' => $bahan_baku
        ]);
    }

    public function getAllDetailTransaksi(Request $request)
    {
        $month = explode('-', $request->month);
        $transactions = DetailTransaksi::whereMonth('created_at', $month[1])->whereYear('created_at', $month[0])->orderBy('created_at', 'ASC')->with('transaksi', 'produk', 'Transaksi.customer')->get();
        if (count($transactions) < 1) {
            return response()->json([
                'code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ]);
        }
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'data' => $transactions
        ]);
    }

    public function getRekapPenyuplaian(Request $request)
    {
        $month = explode('-', $request->month);
        $penyuplaian = DetailPenyuplaian::join('penyuplaian', 'detail_penyuplaian.id_penyuplaian', '=', 'penyuplaian.id_penyuplaian')
        ->whereMonth('penyuplaian.tanggal_penyuplaian', $month[1])
        ->whereYear('penyuplaian.tanggal_penyuplaian', $month[0])
        ->orderBy('penyuplaian.tanggal_penyuplaian', 'ASC')
        ->with('penyuplaian', 'bahan_baku', 'penyuplaian.supplier')
        ->get();

        if (count($penyuplaian) < 1) {
            return response()->json([
                'code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ]);
        }
        
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'data' => $penyuplaian
        ]);
    }

    public function getRekapPengeluaran(Request $request)
    {
        $month = explode('-', $request->month);
        $pengeluaran = Pengeluaran::whereMonth('tanggal_pengeluaran', $month[1])
        ->whereYear('tanggal_pengeluaran', $month[0])
        ->orderBy('tanggal_pengeluaran', 'ASC')
        ->get();
        
        if (count($pengeluaran) < 1) {
            return response()->json([
                'code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ]);
        }

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'data' => $pengeluaran
        ]);
    }

    
}
