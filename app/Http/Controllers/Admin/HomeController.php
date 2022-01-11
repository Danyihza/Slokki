<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeView()
    {
        $data['produk'] = Produk::all();
        $data['state'] = 'Home';
        return view('admin.home', $data);
    }
}
