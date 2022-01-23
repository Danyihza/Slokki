<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPenyuplaian;
use App\Models\Pengeluaran;
use App\Models\Penyuplaian;
use App\Models\StokBahanBaku;
use App\Models\StokBarangProses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LKeuanganController extends Controller
{
    public function laporanKeuanganView()
    {
        $data['state'] = 'laporan_keuangan';
        return view('admin.laporan_keuangan', $data);
    }
}
