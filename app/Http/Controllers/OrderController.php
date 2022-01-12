<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class OrderController extends Controller
{
    public function orderDetailView(Request $request)
    {
        $id_transaksi = $request->id_transaksi;
        $data['transaksi'] = Transaksi::where('id_transaksi', $id_transaksi)->with('customer', 'detailTransaksi')->first();
        // dd($data['transaksi']->status);
        $data['state'] = 'Pesanan';
        return view('order_detail', $data);
    }

    public function addOrder(Request $request)
    {
        $confirmed_product = session()->get('confirm_product');
        $id_transaksi = Transaksi::generateTransactionId();
        // dd($confirmed_product);
        $newTransaksi = new Transaksi();
        $newTransaksi->id_transaksi = $id_transaksi;
        $newTransaksi->id_customer = session()->get('user')->id_customer;
        $newTransaksi->total_amount = $confirmed_product['total'];
        $newTransaksi->payment_method = strtoupper($request->payment_method);
        $newTransaksi->address = $request->alamat;
        $newTransaksi->tanggal_transaksi = now();
        $newTransaksi->status = [
            'diproses' => 0,
            'dikemas' => 0,
            'dikirim' => 0,
            'diterima' => 0,
            'status' => '0%',
        ];
        $newTransaksi->save();

        foreach ($confirmed_product['data'] as $key => $value) {
            $newDetailTransaksi = new DetailTransaksi();
            $newDetailTransaksi->id_detail_transaksi = Uuid::uuid4();
            $newDetailTransaksi->id_transaksi = $id_transaksi;
            $newDetailTransaksi->id_produk = $key;
            $newDetailTransaksi->price = $value['harga_produk'];
            $newDetailTransaksi->jumlah = $value['quantity'];
            $newDetailTransaksi->save();
        }

        session()->forget('confirm_product');
        session()->forget('cart');

        return redirect()->route('order.orderDetailView', ['id_transaksi' => $id_transaksi]);
    }

    public function uploadBuktiPembayaran(Request $request)
    {
        $id_transaksi = $request->id_transaksi;
        $bukti_pembayaran = $request->file('bukti_pembayaran');
        $file_name = 'PAYMENT_' . $id_transaksi . '_' . date('YmdHis') . '.' . $bukti_pembayaran->getClientOriginalExtension();
        $bukti_pembayaran->move('assets/payments/', $file_name);

        $transaksi = Transaksi::where('id_transaksi', $id_transaksi)->first();
        $status = $transaksi->status;
        $status['diproses'] = 1;
        $status['status'] = '25%';
        $transaksi->bukti_pembayaran = $file_name;
        $transaksi->status = $status;
        $transaksi->save();

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload');
    }
}
