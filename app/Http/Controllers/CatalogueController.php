<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function catalogueView()
    {
        $data['state'] = "Catalogue";
        return view('catalogue', $data);
    }
}
