<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function transactionView()
    {
        $data['state'] = 'Transaksi';
        $data['transactions'] = Transaksi::orderBy('tanggal_transaksi', 'DESC')->get();
        // dd($data['transactions']);
        // $data['transaksi'] = Transaksi::where('id_transaksi', $request->id_transaksi)->first();
        return view('admin.transaksi', $data);
    }

    public function updateTransaction(Request $request)
    {

        $request->validate([
            'ongkir' => 'nullable|numeric',
        ]);

        $id_transaksi = $request->id_transaksi;
        $ongkir = $request->ongkir;
        $no_resi = $request->no_resi;
        if ($request->file('resi_file')) {
            $resi_file = $request->file('resi_file');
        }
        $diproses = $request->diproses ? 1 : 0;
        $dikemas = $request->dikemas ? 1 : 0;
        $dikirim = $request->dikirim ? 1 : 0;
        $diterima = $request->diterima ? 1 : 0;
        $status = $diproses * 25 + $dikemas * 25 + $dikirim * 25 + $diterima * 25;

        $transaction = Transaksi::where('id_transaksi', $id_transaksi)->first();
        $transaction->ongkir = $ongkir;
        $transaction->no_resi = $no_resi;
        if ($request->file('resi_file')) {
            $transaction->bukti_resi = $resi_file->getClientOriginalName();
        }
        $transaction->total_amount += $ongkir;
        $transaction->status = [
            'diproses' => $diproses,
            'dikemas' => $dikemas,
            'dikirim' => $dikirim,
            'diterima' => $diterima,
            'status' => $status . '%',
        ];
        $transaction->save();

        if ($request->file('resi_file')) {
            $resi_file->move('./assets/payments/', $resi_file->getClientOriginalName());
        }

        return redirect()->route('admin.transactionView')->with([
            'success' => "Transaksi $id_transaksi berhasil diubah",
            'last_transaction' => $id_transaksi
        ]);

    }
}
