<?php

namespace App\Http\Controllers;

use App\Models\AlamatPengiriman;
use App\Models\JenisPengiriman;
use App\Models\JenisProduk;
use App\Models\Kurir;
use App\Models\MetodePembayaran;
use App\Models\Nota;
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

    public function produkDetail(Request $request, $produkId)
    {
        $produkDetail = Produk::find($produkId);
        return view('produk.detail', [
            'produk' => $produkDetail
        ]);
    }

    public function checkoutIndex(Request $request)
    {
        $user = Auth::user();
        $alamatPengiriman = AlamatPengiriman::where('user_id', $user->id)
            ->where('alamat_utama', 1)
            ->get();

        if (!isset($alamatPengiriman[0])) {
            return back()->with('msg', 'Pilih alamat utama dari pengiriman terlebih dahulu');
        }

        $keranjang = [];
        $totalHarga = 0;
        if ($request->produk_pilihan != null) {
            foreach ($request->produk_pilihan as $p) {
                $k = $user->keranjang()->find($p);
                $keranjang[] = $k;
                $totalHarga += $k->harga * $k->pivot->jumlah;
            }
        } else {
            return back()->with('msg', 'Centang barang yang ingin dibeli terlebih dahulu!');
        }

        $metodePembayaran = MetodePembayaran::all();
        $kurir = Kurir::all();
        $jenisPengiriman = JenisPengiriman::all();

        return view('produk.checkout', [
            'alamPeng' => $alamatPengiriman[0],
            'keranjang' => $keranjang,
            'metPem' => $metodePembayaran,
            'kurir' => $kurir,
            'jenisPengiriman' => json_encode($jenisPengiriman),
            'produkPilihan' => $request->produk_pilihan,
            'totalHarga' => $totalHarga
        ]);
    }

    public function checkoutKeranjang(Request $request, AlamatPengiriman $alamPeng, $produkDibeli)
    {
        //CATATAN:
        //$request menyimpan id dari: metode_pembayaran, kurir, dan jenis_pengiriman
        //$alamPeng menyimpan object alamat pengiriman
        //$produkDibeli menyimpan array id jenis_produks yang akan dibeli oleh user, dimana masih berbentuk json

        $produkDibeli = json_decode($produkDibeli, true);

        $user = Auth::user();
        $totalPembayaran = 0;
        $totalDiskon = 0;
        $keranjang = []; //Variabel yang dipersiapkan untuk attach data detail_transaksi
        foreach ($produkDibeli as $p) {
            $k = $user->keranjang()->find($p);
            if (
                $k->diskon_produk()->where('jenis_produk_id', $k->id)
                    ->where('periode_mulai', '<=', now())
                    ->where('periode_berakhir', '>=', now())
            ) {
                $besarDisc = $k->harga * $k->pivot->jumlah * $k->diskon_produk[0]->diskon / 100;
                $keranjang[$p] = [
                    'jumlah' => $k->pivot->jumlah,
                    'sub_total' => $k->harga * $k->pivot->jumlah,
                    'diskon' => $k->diskon_produk[0]->diskon,
                    'besar_diskon' => $besarDisc,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            } else {
                $besarDisc = 0;
                $keranjang[$p] = [
                    'jumlah' => $k->pivot->jumlah,
                    'sub_total' => $k->harga * $k->pivot->jumlah,
                    'diskon' => 0,
                    'besar_diskon' => $besarDisc,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
            $totalPembayaran += $k->harga * $k->pivot->jumlah;
            $totalDiskon += $besarDisc;
        }

        //buat nota
        $createNota = Nota::create([
            'total_pembayaran' => $totalPembayaran,
            'total_diskon' => $totalDiskon,
            'total_pembayaran_diskon' => $totalPembayaran - $totalDiskon,
            'total_ppn' => ($totalPembayaran - $totalDiskon) * 0.11,
            'status_pengiriman' => 'Diproses',
            'user_id' => $user->id,
            'metode_pembayaran_id' => $request->metode_pembayaran,
            'alamat_pengiriman_id' => $alamPeng->id,
            'jenis_pengiriman_id' => $request->jenis_pengiriman,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Jika berhasil membuat nota, buat detail transaksinya
        if ($createNota) {
            $detailTransaksi = $createNota->detail_transaksi()->attach($keranjang);
            foreach ($produkDibeli as $p) {
                //Update stok dan detach m-n
                $k = $user->keranjang()->find($p);
                $k->stok -= $k->pivot->jumlah;
                $k->save();
                $user->keranjang()->detach($p);
            }
            return redirect()->route('home')->with('msg', 'Pembelian produk berhasil');
        } else {
            return back()->with('msg', 'Beli Produk Gagal! Pastikan semua data terisi dengan benar.');
        }
    }

    public function detailTransaksi(Request $request, $id)
    {
        $nota = Nota::find($id);
        $detailTrans = $nota->detail_transaksi;
        // dd($detailTransaksi);    
        return view('produk.detail-histori-transaksi', [
            'nota' => $nota,
            'detailTransaksi' => $detailTrans
        ]);
    }
}
