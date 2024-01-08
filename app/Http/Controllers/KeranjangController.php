<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $totalDiskon = 0;
        if ($keranjang != null) {
            foreach ($keranjang as $k) {
                $totalPrice += $k->pivot->jumlah * $k->harga;
                $totalItem += $k->pivot->jumlah;

                $checkDiskon = $k
                    ->diskonProduk()
                    ->where('jenis_produk_id', $k->id)
                    ->where('periode_mulai', '<=', now())
                    ->where('periode_berakhir', '>=', now())
                    ->first();
                if (isset($checkDiskon)) {
                    $totalDiskon += $k->pivot->jumlah * $k->harga * $checkDiskon->diskon / 100;
                }
            }
        }

        // dd($keranjang);
        return view('produk.keranjang', [
            'keranjang' => $keranjang,
            'total_price' => $totalPrice,
            'total_item' => $totalItem,
            'total_diskon' => $totalDiskon
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

        if (!isset($check[0]->jenis_produk_id)) {
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

    public function updateKeranjang(Request $request)
    {
        $user = Auth::user();
        $update = $user->keranjang()->updateExistingPivot($request->idJenisProduk, ['jumlah' => $request->jumlah]);

        $produkPilihan = $request->produkPilihan;

        //{ OLD }
        // $keranjang = User::where('id', $user->id)
        //     ->whereHas('keranjang', function ($query) use ($jenisProdukId) {
        //         $query->where('jenis_produk_id', $jenisProdukId);
        //     })
        //     ->with([
        //         'keranjang' => function ($query) use ($jenisProdukId) {
        //             $query->where('jenis_produk_id', $jenisProdukId);
        //         }
        //     ])->first();

        //{ NEW }
        //Hitung Jumlah Barang pada keranjang
        $jumlahBarang = $user->keranjang->sum('pivot.jumlah');

        //Hitung total harga keseluruhan
        $totalHarga = $user->keranjang->sum(function ($item) {
            // Mengalikan jumlah pada pivot dengan harga barang pada JenisProduk
            return $item->pivot->jumlah * $item->harga;
        });

        $totalDiskon = 0;
        $userID = $user->id;
        foreach ($produkPilihan as $jenisProdukId) {
            $jp = JenisProduk::find($jenisProdukId);
            $checkDiskon = $jp
                ->diskonProduk()
                ->where('jenis_produk_id', $jp->id)
                ->where('periode_mulai', '<=', now())
                ->where('periode_berakhir', '>=', now())
                ->first();
            if (isset($checkDiskon)) {
                $keranjang =$jp->keranjang()->select("*")->where('user_id', $user->id)->first();
                $totalDiskon += $keranjang->jumlah * $jp->harga * $checkDiskon->diskon / 100;
            }
        }

        if ($update == 0) {
            return response()->json(
                array(
                    'pesan' => 'Gagal'
                ),
                200
            );
        } else {
            return response()->json(
                array(
                    'pesan' => 'Berhasil',
                    'jumlahBarang' => $jumlahBarang,
                    'totalHarga' => $totalHarga,
                    'totalDiskon' => $totalDiskon
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

    public function hapusKeranjang(Request $request)
    {
        $user = Auth::user();
        $jenisProduk = JenisProduk::find($request->idJenisProduk);
        $jumlahHapus = $user->keranjang()->detach($jenisProduk->id);

        //Hitung Jumlah Barang pada keranjang
        $jumlahBarang = $user->keranjang->sum('pivot.jumlah');

        //Hitung total harga keseluruhan
        $totalHarga = $user->keranjang->sum(function ($item) {
            // Mengalikan jumlah pada pivot dengan harga barang pada JenisProduk
            return $item->pivot->jumlah * $item->harga;
        });

        if ($jumlahHapus == 0) {
            return response()->json(
                array(
                    'pesan' => 'Gagal'
                ),
                200
            );
        } else {
            return response()->json(
                array(
                    'pesan' => 'Berhasil',
                    'jumlahBarang' => $jumlahBarang,
                    'totalHarga' => $totalHarga
                ),
                200
            );
        }
    }
}
