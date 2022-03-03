<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
	public function produk()
	{
	    $produk = Produk::with('users','detail')->get();
	    $data = response()->json(
	    	[
	    		'message' => 'Data Sukses',
	    		'Produk' => $produk
	    	]);
	    print_r($data);
	}

	public function store(Request $request)
	{
	
	}
}
