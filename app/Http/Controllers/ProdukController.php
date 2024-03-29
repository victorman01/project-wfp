<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Gambar;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.produk.index',[
            'produks'=>Produk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produk.add',[
            'brands'=>Brand::all()
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
            'nama'=>'required',
            'informasi'=>'required',
            'brand_id'=>'required'
        ]);
        $produk = Produk::create($validatedData);
        if($request->file('image')){
            $idProduk = $produk->id;
            $image_path=$request->file('image')->store('post-images');
            Gambar::create([
                'nama'=>$request->nama,
                'path'=>$image_path,
                'produk_id'=>$idProduk,
            ]);
        };
        return redirect('/admin/produks')->with('success', 'New produk has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        // 
        // $product = Produk::get();
        // $kategori = Kategori::get();
        // return view('home', [
        //     'produk' => $product,
        //     'kategori' => $kategori
        // ]);
    }

    public function showByCategory($kategoriId)
    {
        $produk = Produk::whereHas('kategoriProduk', function ($query) use ($kategoriId) {
            $query->where('kategori_id', $kategoriId);
        })->get();;
        $kategori = Kategori::find($kategoriId);

        return view('produk.daftar-produk-by-kategori', [
            'produk' => $produk,
            'kategori' => $kategori
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('admin.produk.edit',[
            'brands'=>Brand::all(),
            'produk'=>$produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $validatedData = $request->validate([
            'nama'=>'required',
            'informasi'=>'required',
            'brand_id'=>'required'
        ]);
        $produk->update($validatedData);
        if($request->file('image')){
            $idProduk = $produk->id;
            $image_path=$request->file('image')->store('post-images');
            Gambar::create([
                'nama'=>$request->nama,
                'path'=>$image_path,
                'produk_id'=>$idProduk,
            ]);
        };
        return redirect('/admin/produks')->with('success', 'New produk has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        if($produk->favorit->count()>0||$produk->kategoriProduk->count()>0||$produk->gambar->count()>0||$produk->jenisProduk->count()>0){
            return redirect('/admin/produks')->with('error', 'Product gagal dihapus');
        }
        foreach ($produk->gambar as $gambar) {
            Storage::delete($gambar->path);
            $gambar->delete();
        }
        $produk->delete();
        return redirect('/admin/produks')->with('success', 'Product has been deleted!');
    }

    public function searchProduk(Request $request)
    {
        $keyword = $request->input('keyword');

        $produkList = Produk::where('nama', 'like', '%' . $keyword . '%')->get();

        return view('produk.daftar-produk', ['produk' => $produkList]);
    }
}
