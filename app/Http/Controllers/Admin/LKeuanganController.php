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
        $date = explode('-', '2022-01');

        $data['bahan_baku_awal'] = (int) StokBahanBaku::whereMonth('bulan', $date[1])->whereYear('bulan', $date[0])->first()->stok_awal * 6500;
        $data['pembelian_bahan_baku'] = (int) DetailPenyuplaian::join('penyuplaian', 'detail_penyuplaian.id_penyuplaian', '=', 'penyuplaian.id_penyuplaian')
            ->whereMonth('penyuplaian.tanggal_penyuplaian', $date[1])
            ->whereYear('penyuplaian.tanggal_penyuplaian', $date[0])
            ->with('penyuplaian', 'bahan_baku', 'penyuplaian.supplier')
            ->sum(DB::raw('harga_beli * kuantitas'));
        $data['pers_bahan_baku_tersedia'] = (int) $data['bahan_baku_awal'] + $data['pembelian_bahan_baku'];
        $data['pers_bahan_baku_akhir'] = (int) StokBahanBaku::whereMonth('bulan', $date[1])->whereYear('bulan', $date[0])->first()->stok_akhir * 6500;
        $data['pemakaian_bahan_baku'] = (int) $data['pers_bahan_baku_tersedia'] - $data['pers_bahan_baku_akhir'];
        $data['biaya_tenaga_kerja_langsung'] = 2550000;
        $data['bahan_penolong'] = 0;
        $data['bop_d'] = (int) Pengeluaran::whereMonth('tanggal_pengeluaran', $date[1])->whereYear('tanggal_pengeluaran', $date[0])->where('jenis_pengeluaran', 'Biaya Overhead')->sum(DB::raw('harga * jumlah_pengeluaran')) + 223333;
        $data['jumlah_biaya_overhead'] = (int) $data['bahan_penolong'] + $data['bop_d'];
        $data['jumlah_biaya_produksi'] = (int) $data['pemakaian_bahan_baku'] + $data['biaya_tenaga_kerja_langsung'] + $data['biaya_tenaga_kerja_langsung'];
        $stokbarangproses = StokBarangProses::whereMonth('bulan', $date[1])->whereYear('bulan', $date[0])->first();
        $x = $stokbarangproses->fermentasi_awal;
        $y = $stokbarangproses->roasting_awal;
        $data['persediaan_bdp_awal'] = (int) ($x * 6500 + 0.5 * $x * 8 * 2500 / 1000 + $x * 236) + ($y * 6500 + 0.5 * $y * 8 * 2500 / 1000 + $y * 236 + $y * 5600 / 2 + $y * 720);
        $data['jumlah_barang_dalam_proses'] = (int) $data['jumlah_biaya_produksi'] + $data['persediaan_bdp_awal'];
        $p = $stokbarangproses->fermentasi_akhir;
        $q = $stokbarangproses->roasting_akhir;
        $data['persediaan_bdp_akhir'] = (int) ($p * 6500 + 0.5 * $p * 8 * 2500 / 1000 + $p * 236) + ($q * 6500 + 0.5 * $q * 8 * 2500 / 1000 + $q * 236 + $q * 5600 / 2 + $q * 720);
        $data['harga_pokok_produksi'] = (int) $data['jumlah_barang_dalam_proses'] - $data['persediaan_bdp_akhir'];
        // dd($data);

        return view('admin.laporan_keuangan', $data);
    }
}
