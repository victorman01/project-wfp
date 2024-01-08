<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\JenisProduk;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Http\Controllers\Controller;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.detail_transaksi.index',[
            'detailTransaksis'=>DetailTransaksi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.detail_transaksi.add',[
            'notas'=>Nota::all(),
            'produks'=>JenisProduk::all()
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
            'jumlah'=> 'required|integer',
            'sub_total'=>'required|integer',
            'produk_id'=>'required|integer',
            'nota_id'=>'required|integer'
        ]);
        $validatedData['jenis_produk_id']=$validatedData['produk_id'];
        
        DetailTransaksi::create($validatedData);
        return redirect('admin.detail_transaksi.index')->with('success','Data Detail Transaksi berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function show(DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailTransaksi $detailTransaksi)
    {
        return view('admin.detail_transaksi.add',[
            'detail_transaksi'=>$detailTransaksi,
            'notas'=>Nota::all(),
            'produks'=>JenisProduk::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailTransaksi $detailTransaksi)
    {
        $validatedData = $request->validate([
            'jumlah'=> 'required|integer',
            'sub_total'=>'required|integer',
            'produk_id'=>'required|integer',
            'nota_id'=>'required|integer'
        ]);
        $validatedData['jenis_produk_id']=$validatedData['produk_id'];
        
        $detailTransaksi->update($validatedData);
        return redirect('admin.detail_transaksi.index')->with('success','Data Detail Transaksi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailTransaksi $detailTransaksi)
    {
        $detailTransaksi->delete();
        return redirect('admin.detail_transaksi.index')->with('success','Data Detail Transaksi berhasil dihapus!');
    }
}
