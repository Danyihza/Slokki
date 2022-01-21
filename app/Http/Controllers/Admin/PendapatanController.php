<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendapatanLain;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class PendapatanController extends Controller
{
    public function pendapatanView()
    {
        $data['state'] = 'pendapatan';
        return view('admin.pendapatan', $data);
    }

    public function addPendapatan(Request $request)
    {
        try {
            $request->validate([
                'bulan' => 'required',
                'nama_pendapatan' => 'required',
                'jumlah_pendapatan' => 'required|numeric',
            ]);
            
            $newpendapatan = new PendapatanLain;
            $newpendapatan->id_pendapatan = Uuid::uuid4();
            $newpendapatan->bulan = $request->bulan . '-01';
            $newpendapatan->nama_pendapatan = $request->nama_pendapatan;
            $newpendapatan->jumlah = $request->jumlah_pendapatan;
            $newpendapatan->save();
            
            return redirect()->back()->with('success', 'Pendapatan berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Pendapatan gagal ditambahkan');
        }
    }
}
