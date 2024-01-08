<?php

namespace App\Http\Controllers;

use App\Models\Kurir;
use Illuminate\Http\Request;
use App\Models\JenisPengiriman;
use App\Http\Controllers\Controller;

class JenisPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jenis_pengiriman.index',[
            'jenisPengirimans'=>JenisPengiriman::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenis_pengiriman.add',[
            'kurirs'=>Kurir::all()
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
            'nama'=>'required|string',
            'kurir_id'=>'required'
        ]);
        JenisPengiriman::create($validatedData);
        return redirect('/admin/jenis-pengirimans')->with('success','Data jenis pengiriman telah disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisPengiriman  $jenisPengiriman
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPengiriman $jenisPengiriman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPengiriman  $jenisPengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisPengiriman $jenisPengiriman)
    {
        return view('admin.jenis_pengiriman.edit',[
            'jenis_pengiriman'=>$jenisPengiriman,
            'kurirs'=>Kurir::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisPengiriman  $jenisPengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisPengiriman $jenisPengiriman)
    {
        $validatedData = $request->validate([
            'nama'=>'required|string',
            'kurir_id'=>'required'
        ]);
        $jenisPengiriman->update($validatedData);
        return redirect('/admin/jenis-pengirimans')->with('success','Modifikasi data jenis pengiriman telah disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPengiriman  $jenisPengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisPengiriman $jenisPengiriman)
    {
        if($jenisPengiriman->kurir||$jenisPengiriman->nota->count()>0){
            return redirect('/admin/jenis-pengirimans')->with('error','Data jenis pengiriman gagal terhapus!');
        }
        $jenisPengiriman->delete();
        return redirect('/admin/jenis-pengirimans')->with('success','Data jenis pengiriman telah terhapus!');
    }
}
