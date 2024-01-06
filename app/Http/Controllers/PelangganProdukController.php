<?php

namespace App\Http\Controllers;

use App\Models\AlamatPengiriman;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }

    public function produkDetail(Request $request, $produkId){
        $produkDetail = Produk::find($produkId);
        return view('produk.detail', [
            'produk' => $produkDetail
        ]);
    }

    public function checkoutIndex(){
        $user = Auth::user();

        $alamatPengiriman = AlamatPengiriman::where('user_id', $user->id)
                        ->where('alamat_utama', 1)
                        ->get();
        // dd($alamatPengiriman);
        $keranjang = isset($user->keranjang[0]) ? $user->keranjang : null;

        // Calculate total price from keranjang table for a specific user
        $totalPrice = 0;
        if($keranjang != null){
            foreach($keranjang as $k){
                $totalPrice += $k->pivot->jumlah * $k->harga;
            }
        }
        return view('produk.checkout', [
            'alamPeng' => $alamatPengiriman[0],
            'keranjang' => $keranjang,
        ]);
    }
}
