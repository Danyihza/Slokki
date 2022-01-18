<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Transaksi;
use Illuminate\Http\Request;

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
}
