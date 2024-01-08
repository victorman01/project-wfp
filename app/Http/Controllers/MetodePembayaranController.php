<?php

namespace App\Http\Controllers;

use App\Models\MetodePembayaran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MetodePembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.metode_pembayaran.index',[
            'metode_pembayarans'=>MetodePembayaran::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.metode_pembayaran.add');
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
            'nama'=>'required|string'
        ]);
        MetodePembayaran::create($validatedData);
        return redirect('/admin/metode-pembayarans')->with('success','Data metode pembayaran baru telah tersimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MetodePembayaran  $metodePembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(MetodePembayaran $metodePembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MetodePembayaran  $metodePembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(MetodePembayaran $metodePembayaran)
    {
        return view('admin.metode_pembayaran.edit',[
            'metodePembayaran'=>$metodePembayaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MetodePembayaran  $metodePembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MetodePembayaran $metodePembayaran)
    {
        $validatedData = $request->validate([
            'nama'=>'required|string'
        ]);
        $metodePembayaran->update($validatedData);
        return redirect('/admin/metode-pembayarans')->with('success','Modifikasi data metode pembayaran telah tersimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MetodePembayaran  $metodePembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(MetodePembayaran $metodePembayaran)
    {
        if($metodePembayaran->kurir->count() > 0){
            return redirect('/admin/metode-pembayarans')->with('error','Data metode pembayaran gagal terhapus!');
        }
        $metodePembayaran->delete();
        return redirect('/admin/metode-pembayarans')->with('success','Data metode pembayaran telah terhapus!');
    }
}
