<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
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

        $keranjang = isset($user->keranjang[0]) ? $user->keranjang : null;

        // Calculate total price from keranjang table for a specific user
        $totalPrice = 0;
        $totalItem = 0;
        if($keranjang != null){
            foreach($keranjang as $k){
                $totalPrice += $k->pivot->jumlah * $k->harga;
                $totalItem += $k->pivot->jumlah;
            }
        }
        // dd($keranjang);
        return view('produk.keranjang', [
            'keranjang' => $keranjang,
            'total_price' => $totalPrice,
            'total_item' => $totalItem,
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
                ->where('jenis_produk_id', $request->jenisProdukID)
                ->where('user_id', $user->id)
                ->get();

        if(!isset($check[0]->jenis_produk_id)){
            // $result = DB::table('keranjangs')->insert([
            //     'jenis_produk_id' => $request->jenisProdukID,
            //     'user_id' => $user->id,
            //     'jumlah' => $request->quantity,
            //     'created_at' => now(),
            //     'updated_at' => now()
            // ]);
            
            $jenisProduk = JenisProduk::find($request->jenisProdukID);
            $user->keranjang()->attach($jenisProduk, [
                'jumlah' => $request->quantity,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return back()->with('pesanKeranjang', 'Tambah Keranjang Berhasil');
        } else {
            // $update = DB::table('keranjangs')
            // ->where('jenis_produk_id', $request->jenisProdukID)
            // ->where('user_id', $user->id)
            // ->update([
            //     'jumlah' => ($check[0]->jumlah + $request->quantity)
            // ]);

            $jenisProduk = JenisProduk::find($request->jenisProdukID);
            $user->keranjang()->updateExistingPivot($jenisProduk, [
                'jumlah' => $check[0]->jumlah + $request->quantity,
                'updated_at' => now()
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
        $user = Auth::user();

        $check = DB::table('keranjangs')
        ->where('produk_id', $request->produkID)
        ->where('user_id', $user->id)
        ->get();

        $update = DB::table('keranjangs')
            ->where('produk_id', $request->produkID)
            ->where('user_id', $user->id)
            ->update([
                'jumlah' => ($check[0]->jumlah + $request->quantity)
            ]);
        
        return back()->with('pesan', 'Update Keranjang Berhasil');
    }

    public function updateKeranjang(Request $request){
        $user = Auth::user();

        $update = DB::table('keranjangs')
            ->where('jenis_produk_id', $request->idJenisProduk)
            ->where('user_id', $user->id)
            ->update([
                'jumlah' => ($request->jumlah),
                'updated_at' => now()
            ]);
        // dd($update);
        if($update == 0){
            return response()->json(
                array(
                    'pesan' => 'Gagal'
                ),
                200
            );
        } else {
            return response()->json(
                array(
                    'pesan' => 'Berhasil'
                ),
                200
            );
        }
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
            ->where('jenis_produk_id', $keranjang)
            ->where('user_id', $user->id)
            ->delete();
        return back()->with('pesan', 'Delete Keranjang Berhasil');
    }

    public function hapusKeranjang(Request $request){
        $user = Auth::user();
        $jenisProduk = JenisProduk::find($request->idJenisProduk);
        $jumlahHapus = $user->keranjang()->detach($jenisProduk->id);

        if($jumlahHapus == 0){
            return response()->json(
                array(
                    'pesan' => 'Gagal'
                ),
                200
            );
        } else {
            return response()->json(
                array(
                    'pesan' => 'Berhasil'
                ),
                200
            );
        }
    }
}
