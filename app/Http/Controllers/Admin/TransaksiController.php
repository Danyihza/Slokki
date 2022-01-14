<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function transactionView(Request $request)
    {
        $data['state'] = 'Transaksi';
        $data['transactions'] = Transaksi::orderBy('tanggal_transaksi', 'DESC')->get();
        // dd($data['transactions']);
        $data['transaksi'] = Transaksi::where('id_transaksi', $request->id_transaksi)->first();
        return view('admin.transaksi', $data);
    }
}
