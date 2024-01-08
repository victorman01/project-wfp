<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\JenisProduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JenisProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jenis_produk.index',[
            'jps'=>JenisProduk::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenis_produk.add',[
            'produks'=>Produk::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'=>'required|string',
            'harga'=>'required',
            'stok'=>'required|integer',
            'produk_id'=>'required|integer',
            'spesifikasi'=>'required|string',
        ]);
        JenisProduk::create($validatedData);
        return redirect('/admin/jenis-produks')->with('success','Data jenis produk telah disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisProduk  $jenisProduk
     * @return \Illuminate\Http\Response
     */
    public function show(JenisProduk $jenisProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisProduk  $jenisProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisProduk $jenisProduk)
    {
        return view('admin.jenis_produk.edit',[
            'produks'=>Produk::all(),
            'jp'=>$jenisProduk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jenisProduk  $jenisProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisProduk $jenisProduk)
    {
        $validatedData = $request->validate([
            'nama'=>'required|string',
            'harga'=>'required',
            'stok'=>'required|integer',
            'produk_id'=>'required|integer',
            'spesifikasi'=>'required|string',
        ]);
        $jenisProduk->update($validatedData);
        return redirect('/admin/jenis-produks')->with('success','Edit data jenis produk telah disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisProduk  $jenisProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisProduk $jenisProduk)
    {
        if($jenisProduk->keranjang->count()>0 || $jenisProduk->detailTransaksi->count()>0||$jenisProduk->diskonProduk->count()>0||$jenisProduk->produk){
            return redirect('/admin/jenis-produks')->with('error','Data jenis produk gagal dihapus!');
        }
        $jenisProduk->delete();
        return redirect('/admin/jenis-produks')->with('success','Data jenis produk telah dihapus!');
    }
}
