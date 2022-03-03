<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ProdukDetail;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Produk::all();
        // return response()->json($barang);
        return view('administrator/barang/barang',compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $imageName = time().'.'.$request->foto->extension();
        // $foto = $request->foto->move(public_path('image'), $imageName);

        $produk = new Produk;
        $produk->users_id = $request->users_id;
        $produk->nama_produk = $request->nama_produk;
        $produk->qty = $request->qty;
        $produk->jenis = $request->jenis;
        $produk->bv = $request->bv;
        $produk->save();

        $detail = new ProdukDetail;
        $detail->harga = $request->harga;
        $produk->detail()->save($detail);

        // Produk::create(
        // [
        //     'users_id' => $request->users_id,
        //     'nama_produk' => $request->nama_produk,
        //     'qty' => $request->qty,
        //     'jenis' => $request->jenis,
        //     'bv' => $request->bv,
        //     'harga' => $request->harga,
        //     'foto' => $request->foto->move(public_path('image'), $imageName)
        // ]);
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = ProdukDetail::find($id); 
        $produk = Produk::find($id);
        return response()->json([
            'detail' => $detail,
            'produk' => $produk
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $produk = Produk::query()->where('id', $request->id)->update([
            'users_id' => $request->users_id,
            'nama_produk' => $request->nama_produk,
            'qty' => $request->qty,
            'jenis' => $request->jenis,
            'bv' => $request->bv,
        ]);

        $detail = ProdukDetail::query()->where('id', $request->id)->update([
            'produk_id' => $request->produk_id,
            'harga' => $request->harga,
        ]);

        // $update->update($request->all());
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = ProdukDetail::find($id); 
        $produk = Produk::find($id);
        $detail->delete();
        $produk->delete();
        return redirect()->route('barang.index');
    }
}
