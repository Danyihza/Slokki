<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BahanBaku;
use App\Models\DetailPenyuplaian;
use App\Models\Penyuplaian;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class PengeluaranController extends Controller
{
    public function pengeluaranView()
    {
        $data['state'] = 'pengeluaran';
        $data['bahan_baku'] = BahanBaku::All();
        $data['supplier'] = Supplier::All();

        return view('admin.pengeluaran', $data);
    }

    public function addPenyuplaian(Request $request)
    {
        try {
            
            $request->validate([
                'tanggal' => 'required',
                'id_supplier' => 'required',
                'id_bahan_baku' => 'required',
                'harga_beli' => 'required|numeric',
                'kuantitas' => 'required|numeric'
            ]);
            
            $id_penyuplaian = Uuid::uuid4();
            $id_dtpenyuplaian = Uuid::uuid4();
            $tanggal = $request->tanggal;
            $id_supplier = $request->id_supplier;
            $id_bahan_baku = $request->id_bahan_baku;
            $harga_beli = $request->harga_beli;
            $kuantitas = $request->kuantitas;

            $penyuplaian = new Penyuplaian;
            $penyuplaian->id_penyuplaian = $id_penyuplaian;
            $penyuplaian->id_owner = session('owner')->id_owner;
            $penyuplaian->id_supplier = $id_supplier;
            $penyuplaian->tanggal_penyuplaian = $tanggal;
            $penyuplaian->save();

            $dtpenyuplaian = new DetailPenyuplaian;
            $dtpenyuplaian->id_detail_penyuplaian = $id_dtpenyuplaian;
            $dtpenyuplaian->id_penyuplaian = $id_penyuplaian;
            $dtpenyuplaian->id_bahan_baku = $id_bahan_baku;
            $dtpenyuplaian->harga_beli = $harga_beli;
            $dtpenyuplaian->kuantitas = $kuantitas;
            $dtpenyuplaian->save();

            return redirect()->route('admin.pengeluaranView')->with('success', 'Berhasil tambah data penyuplaian');
        } catch (\Throwable $th) {
            return redirect()->route('admin.pengeluaranView')->with('error', $th->getMessage());
        }
    }
}
