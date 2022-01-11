<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        dd(session()->getId());
        $product = Produk::find($request->product_id);
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $request->product_id => [
                    "name" => $product->name,
                    "quantity" => $request->quantity,
                    "price" => $product->price,
                    "photo" => $product->photo,
                ]
            ];
            session()->put('cart', $cart);
            return response()->json([
                'status' => 'success',
                'success' => 'Product added to cart successfully!'
            ]);
        }
        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] += $request->quantity;
            return response()->json([
                'status' => 'success',
                'success' => 'Product added to cart successfully!'
            ]);
        }
        $cart[$request->product_id] = [
            "name" => $product->name,
            "quantity" => $request->quantity,
            "price" => $product->price,
            "photo" => $product->photo,
        ];
        session()->put('cart', $cart);
        return response()->json([
            'status' => 'success',
            'success' => 'Product added to cart successfully!'
        ]);
    }
}
