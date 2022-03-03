<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use App\Models\Payouts;

class HomeController extends Controller
{
    public function index()
    {
        $member = User::count();
        $barang = Produk::count();
        $transaksi = Payouts::count();
    	return view('administrator/home', compact('member','barang','transaksi'));
    }
    public function member()
    {
    	return view('member/home');
    }
}
