<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AlamatPengiriman;
use App\Http\Controllers\Controller;

class AdminAlamatPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.alamat_pengiriman.index',[
            'alamatPengirimans'=>AlamatPengiriman::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('owner');
        return view('admin.alamat_pengiriman.add',[
            'users'=>User::all()
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
        $this->authorize('owner');
        $validatedData = $request->validate([
            'nama'=>'required|string',
            'alamat'=>'required|string',
            'nama_penerima'=>'required|string',
            'nomor_handphone'=>'required|string',
            'provinsi'=>'required|string',
            'kota'=>'required|string',
            'kecamatan'=>'required|string',
            'kelurahan_kode_pos'=>'required|string',
            'alamat_utama'=>'required|integer',
            'user_id'=>'required|integer',
        ]);
        AlamatPengiriman::create($validatedData);
        return redirect('admin/alamat-pengirimans')->with('success', 'Alamat Pengiriman berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlamatPengiriman  $alamatPengiriman
     * @return \Illuminate\Http\Response
     */
    public function show(AlamatPengiriman $alamatPengiriman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlamatPengiriman  $alamatPengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit(AlamatPengiriman $alamatPengiriman)
    {
        $this->authorize('owner');
        return view('admin.alamat_pengiriman.edit',[
            'users'=>User::all(),
            'alamat_pengiriman'=>$alamatPengiriman
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlamatPengiriman  $alamatPengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlamatPengiriman $alamatPengiriman)
    {
        $this->authorize('owner');
        $validatedData = $request->validate([
            'nama'=>'required|string',
            'alamat'=>'required|string',
            'nama_penerima'=>'required|string',
            'nomor_handphone'=>'required|string',
            'provinsi'=>'required|string',
            'kota'=>'required|string',
            'kecamatan'=>'required|string',
            'kelurahan_kode_pos'=>'required|string',
            'alamat_utama'=>'required|integer',
            'user_id'=>'required|integer',
        ]);
        $alamatPengiriman->update($validatedData);
        return redirect('admin/alamat-pengirimans')->with('success', 'Alamat Pengiriman berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlamatPengiriman  $alamatPengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlamatPengiriman $alamatPengiriman)
    {
        $this->authorize('owner');  
        $alamatPengiriman->delete();
        return redirect('admin/alamat-pengirimans')->with('success', 'Alamat Pengiriman berhasil dihapus');
    }
}
