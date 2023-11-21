<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $keranjang = $user->keranjang;

        return view('user-index-keranjang', [
            'keranjang' => $keranjang
        ]);
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
        $user = Auth::user();

        $check = DB::table('keranjangs')
                ->where('produk_id', $request->produkID)
                ->where('user_id', $user->id)
                ->get();

        if(!isset($check[0]->produk_id)){
            $result = DB::table('keranjangs')->insert([
                'produk_id' => $request->produkID,
                'user_id' => $user->id,
                'jumlah' => $request->quantity,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return back()->with('pesanKeranjang', 'Tambah Keranjang Berhasil');
        } else {
            $update = DB::table('keranjangs')
            ->where('produk_id', $request->produkID)
            ->where('user_id', $user->id)
            ->update([
                'jumlah' => ($check[0]->jumlah + $request->quantity)
            ]);

            return back()->with('pesanKeranjang', 'Update Keranjang Berhasil');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($keranjang)
    {
        $user = Auth::user();

        DB::table('keranjangs')
            ->where('produk_id', $keranjang)
            ->where('user_id', $user->id)
            ->delete();
        return back()->with('pesan', 'Delete Keranjang Berhasil');
    }
}
