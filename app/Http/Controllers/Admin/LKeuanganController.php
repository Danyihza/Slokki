<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LKeuanganController extends Controller
{
    public function laporanKeuanganView()
    {
        $data['state'] = 'laporan_keuangan';

        return view('admin.laporan_keuangan', $data);
    }
}
