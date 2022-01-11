<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function catalogueView()
    {
        $data['products'] = Produk::all();
        $data['state'] = "Catalogue";
        return view('catalogue', $data);
    }
}
