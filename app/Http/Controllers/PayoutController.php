<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Payouts;
use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;


class PayoutController extends Controller
{
    public $produk_id = [];
    public $qty = [];

    public function index()
    {
    	$data = Produk::all();
        $payouts = Payouts::all();
    	// $json = response()->json($payouts);
    	// dd($json);
    	return view('administrator/payouts/payouts', compact('data','payouts'));
    }

    public function create()
    {
        $tests = Produk::select('nama_produk','id')->get();
        return response()->json($tests);
    }

    public function store(Request $request)
    {
        $data = new Payouts;
        $data->no_transaksi = $request->no_transaksi;
        $data->nama_produk1 = $request->nama_produk1;
        $data->nama_produk2 = $request->nama_produk2;
        $data->nama_produk3 = $request->nama_produk3;
        $data->nama_produk4 = $request->nama_produk4;
        $data->qty1 = $request->qty1;
        $data->qty2 = $request->qty2;
        $data->qty3 = $request->qty3;
        $data->qty4 = $request->qty4;
        $data->save();

        return redirect()->route('payouts.index');

        // dd($data);


        // // $tests = Produk::select('nama_produk')->get();
        // // foreach($tests as $produk){
            // $qty = $request->qty;
            // foreach($request->nama_produk as $i => $cek){
            //         $data[] = Payouts::create(array(
            //             'nama_produk' => $cek,
            //             'qty' => $qty[$i],
            //             'no_transaksi' =>$request->no_transaksi,
            //         ));
            //     }
        //     // }
        //     // $result = DB::table('payouts')->insert($data);
            // return redirect()->route('payouts.index');

        //     // dd($transaksi->payout_id = Auth::user()->id);

    }
}
