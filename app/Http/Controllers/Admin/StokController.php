<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\StokBahanBaku;
use App\Models\StokBarangProses;
use App\Models\StokProdukJadi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class StokController extends Controller
{
    public function stokView()
    {
        $data['state'] = 'stok';
        $data['produk'] = Produk::all();

        return view('admin.stok', $data);
    }

    public function addStokBahanBaku(Request $request)
    {
        try {
            
            $request->validate([
                'bulan' => 'required',
                'stok_awal' => 'required|numeric',
                'stok_akhir' => 'required|numeric'
            ]);
            
            $bulan = date('Y-m-d',strtotime($request->bulan));
            $stok_awal = $request->stok_awal;
            $stok_akhir = $request->stok_akhir;
            
            $data['stokbahan'] = StokBahanBaku::where('bulan', $bulan);
            if($data['stokbahan']->first()){
                DB::delete('DELETE FROM stok_bahan_baku WHERE bulan = ?', [$bulan]);
            }

            $stokBahan = new StokBahanBaku;
            $stokBahan->id_stok_bahan_baku = Uuid::uuid4();
            $stokBahan->bulan = $bulan;
            $stokBahan->stok_awal = $stok_awal;
            $stokBahan->stok_akhir = $stok_akhir;
            $stokBahan->save();

            return redirect()->route('admin.stokView')->with('success', 'Berhasil tambah data stok bahan baku');
        } catch (\Throwable $th) {
            return redirect()->route('admin.stokView')->with('error', $th->getMessage());
        }
    }

    public function addStokBarangProses(Request $request)
    {
        try {
            $request->validate([
                'bulan' => 'required',
                'fermentasi_awal' => 'required|numeric',
                'fermentasi_akhir' => 'required|numeric',
                'roasting_awal' => 'required|numeric',
                'roasting_akhir' => 'required|numeric'
            ]);

            $bulan = date('Y-m-d',strtotime($request->bulan));
            $fermentasi_awal = $request->fermentasi_awal;
            $fermentasi_akhir = $request->fermentasi_akhir;
            $roasting_awal = $request->roasting_awal;
            $roasting_akhir = $request->roasting_akhir;

            $data['stokbarang'] = StokBarangProses::where('bulan', $bulan);
            if($data['stokbarang']->first()){
                DB::delete('DELETE FROM stok_barang_proses WHERE bulan = ?', [$bulan]);
            }

            $stokBarang = new StokBarangProses;
            $stokBarang->id_stok_barang_proses = Uuid::uuid4();
            $stokBarang->bulan = $bulan;
            $stokBarang->fermentasi_awal = $fermentasi_awal;
            $stokBarang->fermentasi_akhir = $fermentasi_akhir;
            $stokBarang->roasting_awal = $roasting_awal;
            $stokBarang->roasting_akhir = $roasting_akhir;
            $stokBarang->save();

            return redirect()->route('admin.stokView')->with('success', 'Berhasil tambah data stok barang dalam proses');
        } catch (\Throwable $th) {
            return redirect()->route('admin.stokView')->with('error', $th->getMessage());
        }
    }

    public function addStokProdukJadi(Request $request)
    {
        try {
            $data['produk'] = Produk::all();

            $rules = [
                'bulan' => 'required'
            ];

            foreach ($data['produk'] as $produk) {
                $rules['awal_'.$produk->id_produk] = 'required';
                $rules['akhir_'.$produk->id_produk] = 'required';
            }
            $request->validate($rules);

            $bulan = date('Y-m-d',strtotime($request->bulan));

            $data['stokproduk'] = StokProdukJadi::where('bulan', $bulan);
            if($data['stokproduk']->first()){
                DB::delete('DELETE FROM stok_produk_jadi WHERE bulan = ?', [$bulan]);
            }
            
            foreach ($data['produk'] as $produk) {
                $stokawal = $request->input('awal_'.$produk->id_produk);
                $stokakhir = $request->input('akhir_'.$produk->id_produk);

                $stokProduk = new StokProdukJadi();
                $stokProduk->id_stok_produk_jadi = Uuid::uuid4();
                $stokProduk->bulan = $bulan;
                $stokProduk->id_produk = $produk->id_produk;
                $stokProduk->stok_awal = $stokawal;
                $stokProduk->stok_akhir = $stokakhir;
                $stokProduk->save();
            }
            return redirect()->route('admin.stokView')->with('success', 'Berhasil tambah data stok produk jadi');
        } catch (\Throwable $th) {
            return redirect()->route('admin.stokView')->with('error', $th->getMessage());
        }
    }
}
