<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // session()->forget('cart');
        $product_id = $request->product_id;
        $qty = (int) $request->qty;
        $product = Produk::find($product_id);
        // dd($product->nama_produk);
        $cart = session()->get('cart');
        // dd($cart);

        if (!$cart) {
            $cart = [
                $product_id => [
                    "nama_produk" => $product->nama_produk,
                    "quantity" => $qty,
                    "netto" => $product->kuantitas,
                    "harga_produk" => $product->harga_jual,
                    "gambar_produk" => $product->gambar,
                    "last_updated" => date("Y-m-d H:i:s")
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('updated_cart', 'Product added to cart successfully!');
        }

        if (isset($cart[$product_id])) {

            $cart[$product_id]['quantity'] += $qty;
            session()->put('cart', $cart);
            return redirect()->back()->with('updated_cart', 'Product added to cart successfully!');
        }

        $cart[$product_id] = [
            "nama_produk" => $product->nama_produk,
            "quantity" => $qty,
            "netto" => $product->kuantitas,
            "harga_produk" => $product->harga_jual,
            "gambar_produk" => $product->gambar,
            "last_updated" => date("Y-m-d H:i:s")
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('updated_cart', 'Product added to cart successfully!');
    }

    public function increaseQuantity(Request $request)
    {
        $product_id = $request->product_id;
        $cart = session()->get('cart');
        $cart[$product_id]['quantity']++;
        session()->put('cart', $cart);
        return redirect()->back()->with([
            'showCart' => true
        ]);
    }

    public function decreaseQuantity(Request $request)
    {
        $product_id = $request->product_id;
        $cart = session()->get('cart');
        $cart[$product_id]['quantity']--;
        if ($cart[$product_id]['quantity'] == 0) {
            unset($cart[$product_id]);
        }
        session()->put('cart', $cart);
        return redirect()->back()->with([
            'showCart' => true
        ]);
    }
    
    public function showCart()
    {
        $cart = session('cart');
        dd($cart);
    }

    public function flushCart()
    {
        session()->forget('cart');
        return 'Cart has been flushed!';
    }
}
