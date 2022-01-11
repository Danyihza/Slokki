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
        // dd($data['transaksi']->detailTransaksi[0]->id_detail_transaksi);
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

    public function uploadBuktiTransaksi(Request $request)
    {
        
    }
}
