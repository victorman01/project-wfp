<?php

namespace App\Http\Controllers;

use App\Models\AlamatPengiriman;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlamatPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $alamatPengiriman = isset($user->alamatPengiriman) ? $user->alamatPengiriman : null;

        return view('user-list-alamat', [
            'alamat' => $alamatPengiriman
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-insert-alamat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'nama_penerima' => 'required|string',
            'nomor_handphone' => 'required|numeric',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan_kode_pos' => 'required|string',
            'alamat_utama' => 'required'
        ]);

        if($request->alamat_utama == 1){
            $validation['alamat_utama'] = 1;
        } else{
            $validation['alamat_utama'] = 0;
        }

        $status = Auth::user()->alamatPengiriman()->create($validation);
        if($status){
            return redirect()->route('alamatPengiriman.index');
        } else {
            return back()->with('msg', 'Gagal Insert Alamat');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlamatPengiriman  $alamatPengiriman
     * @return \Illuminate\Http\Response
     */
    public function show(AlamatPengiriman $alamatPengiriman)
    {
        dd($alamatPengiriman);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlamatPengiriman  $alamatPengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit(AlamatPengiriman $alamatPengiriman)
    {
        return view('user-update-alamat', [
            'alamatPengiriman' => $alamatPengiriman
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request   $request
     * @param  \App\Models\AlamatPengiriman  $alamatPengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlamatPengiriman $alamatPengiriman)
    {
        $validation = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'nama_penerima' => 'required|string',
            'nomor_handphone' => 'required|numeric',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan_kode_pos' => 'required|string',
            'alamat_utama' => 'required'
        ]);

        if($request->alamat_utama == 1){
            $validation['alamat_utama'] = 1;
        } else{
            $validation['alamat_utama'] = 0;
        }

        $alamatPengiriman->update($validation);

        return redirect()->route('alamatPengiriman.index')->with('msg','Sukses Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlamatPengiriman  $alamatPengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlamatPengiriman $alamatPengiriman)
    {
        $alamatPengiriman->delete();

        return redirect()->route('alamatPengiriman.index')->with('msg','Sukses Hapus Data'); 
    }
}
