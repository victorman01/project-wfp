<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\DiskonProduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiskonProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.diskon_produk.index',[
            'diskonProduks'=>DiskonProduk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.diskon_produk.add',[
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
        $validateData = $request->validate([
            'diskon' => 'required|integer',
            'periode_mulai' => 'required',
            'periode_berakhir' => 'required',
            'produk_id' => 'required|exists:produks,id'
        ]);
        DiskonProduk::create($validateData);
        return redirect('/admin/diskon-produks')->with('success', 'Diskon Produk data is added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiskonProduk  $diskonProduk
     * @return \Illuminate\Http\Response
     */
    public function show(DiskonProduk $diskonProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DiskonProduk  $diskonProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(DiskonProduk $diskonProduk)
    {
        return view('admin.diskon_produk.edit',[
            'diskon_produk'=>$diskonProduk,
            'produks'=>Produk::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DiskonProduk  $diskonProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiskonProduk $diskonProduk)
    {
        $validateData = $request->validate([
            'diskon' => 'required|integer',
            'periode_mulai' => 'required',
            'periode_berakhir' => 'required',
            'produk_id' => 'required|exists:produks,id'
        ]);
        $diskonProduk->update($validateData);
        return redirect('/admin/diskon-produks')->with('success', 'Diskon Produk data is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiskonProduk  $diskonProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiskonProduk $diskonProduk)
    {
        if($diskonProduk->jenisProduk){
            return redirect('/admin/diskon-produks')->with('error','Diskon Produk data gagal dihapus');
        }
        $diskonProduk->delete();
        return redirect('/admin/diskon-produks')->with('success','Diskon Produk data is deleted successful');
    }
}
