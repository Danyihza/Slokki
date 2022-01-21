<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailPenyuplaian;
use App\Models\PendapatanLain;
use App\Models\Pengeluaran;
use App\Models\StokBahanBaku;
use App\Models\StokBarangProses;
use App\Models\StokProdukJadi;
use App\Models\Transaksi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanKeuanganController extends Controller
{
    public function getHargaPokokProduksi(Request $request)
    {
        try {
            $date = explode('-', $request->month);
            $data['bahan_baku_awal'] = (int) StokBahanBaku::whereMonth('bulan', $date[1])->whereYear('bulan', $date[0])->first()?->stok_awal * 6500;
            $data['pembelian_bahan_baku'] = (int) DetailPenyuplaian::join('penyuplaian', 'detail_penyuplaian.id_penyuplaian', '=', 'penyuplaian.id_penyuplaian')
                ->whereMonth('penyuplaian.tanggal_penyuplaian', $date[1])
                ->whereYear('penyuplaian.tanggal_penyuplaian', $date[0])
                ->with('penyuplaian', 'bahan_baku', 'penyuplaian.supplier')
                ->sum(DB::raw('harga_beli * kuantitas'));
            $data['pers_bahan_baku_tersedia'] = (int) $data['bahan_baku_awal'] + $data['pembelian_bahan_baku'];
            $data['pers_bahan_baku_akhir'] = (int) StokBahanBaku::whereMonth('bulan', $date[1])->whereYear('bulan', $date[0])->first()?->stok_akhir * 6500;
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

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            switch ($th->getMessage()) {
                case 'Attempt to read property "stok_awal" on null':
                    return response()->json([
                        'code' => 404,
                        'status' => 'error',
                        'message' => 'Data bahan baku (awal) tidak ditemukan'
                    ], 404);
                    break;

                case 'Attempt to read property "stok_akhir" on null':
                    return response()->json([
                        'code' => 404,
                        'status' => 'error',
                        'message' => 'Data persediaan bahan baku (akhir) tidak ditemukan'
                    ], 404);
                    break;

                case 'Attempt to read property "fermentasi_awal" on null':
                case 'Attempt to read property "roasting_awal" on null':
                case 'Attempt to read property "fermentasi_akhir" on null':
                case 'Attempt to read property "roasting_akhir" on null':
                    return response()->json([
                        'code' => 404,
                        'status' => 'error',
                        'message' => 'Data Stok Barang Dalam Proses tidak ditemukan'
                    ], 404);
                    break;

                default:
                    return response()->json([
                        'code' => 404,
                        'status' => 'error',
                        'message' => $th->getMessage()
                    ], 404);
                    break;
            }
        }
    }

    public function getHargaPokokPenjualan(Request $request)
    {
        try {
            $date = explode('-', $request->month);

            $stokprodukjadi = StokProdukJadi::join('produk', 'stok_produk_jadi.id_produk', '=', 'produk.id_produk')
                ->whereMonth('bulan', $date[1])
                ->whereYear('bulan', $date[0]);
            if (count($stokprodukjadi->get()) == 0) {
                throw new Exception("Data Stok Produk Jadi Tidak Ditemukan", 1);
            }
            $data['persediaan_awal'] = (int) $stokprodukjadi->sum(DB::raw('harga_jual * stok_awal'));

            $total_pengeluaran = (int) Pengeluaran::whereMonth('tanggal_pengeluaran', $date[1])
                ->whereYear('tanggal_pengeluaran', $date[0])
                ->where('jenis_pengeluaran', 'Biaya Overhead')
                ->sum(DB::raw('harga * jumlah_pengeluaran'));

            $total_penyuplaian = (int) DetailPenyuplaian::join('penyuplaian', 'detail_penyuplaian.id_penyuplaian', '=', 'penyuplaian.id_penyuplaian')
                ->whereMonth('penyuplaian.tanggal_penyuplaian', $date[1])
                ->whereYear('penyuplaian.tanggal_penyuplaian', $date[0])
                ->with('penyuplaian', 'bahan_baku', 'penyuplaian.supplier')
                ->sum(DB::raw('harga_beli * kuantitas'));

            $data['pembelian_bersih'] = $total_pengeluaran + $total_penyuplaian + 2550000;

            $data['persediaan_akhir'] = (int) $stokprodukjadi->sum(DB::raw('harga_jual * stok_akhir'));

            $data['total_hpp'] = $data['persediaan_awal'] + $data['pembelian_bersih'] - $data['persediaan_akhir'];

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 404,
                'status' => 'error',
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function getLabaRugi(Request $request)
    {
        try {
            $date = explode('-', $request->month);
            $data['penjualan'] = (int) Transaksi::whereMonth('tanggal_transaksi', $date[1])
                ->whereYear('tanggal_transaksi', $date[0])
                ->sum(DB::raw('total_amount + ongkir'));

            $data['pendapatan_lain'] = (int) PendapatanLain::whereMonth('bulan', $date[1])
                ->whereYear('bulan', $date[0])
                ->sum(DB::raw('jumlah'));

            $data['total_pendapatan'] = $data['penjualan'] + $data['pendapatan_lain'];

            $pengeluaran = Pengeluaran::whereMonth('tanggal_pengeluaran', $date[1])
                ->whereYear('tanggal_pengeluaran', $date[0])
                ->where('jenis_pengeluaran', 'Beban Operasional');

            $data['beban_operasional'] = $pengeluaran->get();

            $data['total_biaya'] = (int) $pengeluaran->sum(DB::raw('harga * jumlah_pengeluaran'));


            return response()->json([
                'code' => 200,
                'status' => 'success',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 404,
                'status' => 'success',
                'message' => $th->getMessage()
            ], 404);
        }
    }
}
