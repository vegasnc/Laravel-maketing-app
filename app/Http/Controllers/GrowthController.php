<?php

namespace App\Http\Controllers;

use App\Models\Payouts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Renaldy\PhpFPGrowth\FPGrowth;

class GrowthController extends Controller
{
    public function index()
    {
        $data = Payouts::select('nama_produk1','nama_produk2','nama_produk3','nama_produk4')->orderBy('id', 'asc')->get();
        $transactions = $data->toArray();
        // dd($cek);
      
        // $data = Payouts::select('nama_produk')->groupBy('no_transaksi')->get();
        // $data = Payouts::select('nama_produk')->get()->GroupBy(function($barang){
        //     $datas = $barang->no_transaksi;
        // });
        // $transactions = [
        //     ['sp trochess'],
        //     ['woods antitusif'],
        //     ['sp trochess'],
        //     ['sp trochess'],
        //     ['woods antitusif'],
        //     ['vipro g'],
        //     ['sp trochess'],
        //     ['woods antitusif'],
        //     ['sp trochess'],
        //     ['woods antitusif'],
        // ];
         
        // foreach ($cek as $key => $value) {
        //     $transaksi = $value;
        //     // dd($value);
        // }

        $support = 0.2;
        $confidence = 0.75;
        
        $fpgrowth = new FPGrowth($transactions, $support, $confidence);
        $fpgrowth->run();
        
        $transaksi = $transactions;
        // dd($transactions);
        
        // print_r("=========> Frequent Itemset:\n");
        $get = $fpgrowth->getFrequentItemSet();
        // dd($get);
        // $dd = response()->json([
        //     'content' => $get
        // ]);
        // print_r("=========> Ordered Item:\n");
        $getss = $fpgrowth->getOrderedItemSet();

        // dd($getss);
        
        
        // print_r("=========> FP Tree:\n");
        $getTree = $fpgrowth->getTree();
        // dd($getTree);
        
        // print_r("=========> Frequency Pattern:\n");
        // $getPattern = $fpgrowth->getPatterns();

        $getPatterns = $fpgrowth->getPatterns();
        // dd($getPatterns);
        
        // print_r("=========> Association Rules:\n");
        $getRuless = $fpgrowth->getRules();

        // dd($getRuless);

        return view('administrator/growth/growth', compact('transaksi','get','getss','getTree','getRuless','getPatterns'));
    }
}
