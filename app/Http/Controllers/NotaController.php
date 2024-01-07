<?php

namespace App\Http\Controllers;

use App\Models\AlamatPengiriman;
use App\Models\JenisPengiriman;
use App\Models\MetodePembayaran;
use App\Models\Nota;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.nota.index',[
            'notas'=>Nota::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nota.add',[
            'users' =>User::all(),
            'metode_pembayarans'=>MetodePembayaran::all(),
            'alamat_pengirimans'=>AlamatPengiriman::all(),
            'jenis_pengirimans'=>JenisPengiriman::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'total_pembayaran'=>'required|numeric',
            'total_diskon'=>'required|numeric',
            'total_pembayaran_diskon'=>'required|numeric',
            'total_keseluruhan'=>'required|numeric',
            'status_pengiriman' => 'required|in:Menunggu Pembayaran,Persiapan Barang,Siap Diantar,Pengiriman,Pesanan Diterima,Pesanan Selesai',
            'status_pembayaran' => 'required|in:Lunas,Belum Dibayar',
            'user_id'=>'required',
            'metode_pembayaran_id'=>'required',
            'alamat_pengiriman_id'=>'required',
            'jenis_pengiriman_id'=>'required'
        ]);
        $nota = Nota::create($validatedData);
        return redirect('/admin/notas')->with('success', 'New nota has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        return view('admin.nota.edit',[
            'users' =>User::all(),
            'metode_pembayarans'=>MetodePembayaran::all(),
            'alamat_pengirimans'=>AlamatPengiriman::all(),
            'jenis_pengirimans'=>JenisPengiriman::all(),
            'nota' =>$nota
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        $validatedData = $request->validate([
            'status_pengiriman' => 'required|in:Menunggu Pembayaran,Persiapan Barang,Siap Diantar,Pengiriman,Pesanan Diterima,Pesanan Selesai',
            'status_pembayaran' => 'required|in:Lunas,Belum Dibayar',
        ]);
        $nota = Nota::create($validatedData);
        return redirect('/admin/notas')->with('success', 'Nota has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        $nota->delete();
        return redirect('/admin/notas')->with('success', 'Nota has been deleted!');
    }
}
