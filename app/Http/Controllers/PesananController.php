<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index(){
        // $pesannan = Order::with('user')->get();
        return view('pesanan.pesanan');
    }
}
