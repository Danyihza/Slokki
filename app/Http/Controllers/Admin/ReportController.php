<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reportView()
    {
        $data['state'] = 'report';
        $data['transaksi'] = DetailTransaksi::with('transaksi', 'produk', 'transaksi.customer')->get();
        // dd($data['transaksi']);
        return view('admin.report', $data);
    }
}
