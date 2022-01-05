<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeView()
    {
        $data['state'] = "Home";
        return view('index', $data);
    }
}
