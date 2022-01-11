<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeView()
    {
        // session()->flush();
        // dd(session('cart'));
        $data['state'] = "Home";
        $data['produk'] = Produk::all();
        return view('index', $data);
    }
}
