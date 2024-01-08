<?php

namespace App\Http\Controllers;

use App\Models\AlamatPengiriman;
use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Models\User;
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
        return view('user-insert-alamat',[
            'provinsis' => Provinsi::all(),
            'kotas' => [],
            'kecamatans' => [],
            'kelurahans' => [],
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
        $validation = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'nama_penerima' => 'required|string',
            'nomor_handphone' => 'required|numeric',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'alamat_utama' => 'required'
        ]);

        $provinsi = explode('-', $validation['provinsi']);
        $validation['provinsi'] = ucwords(strtolower($provinsi[0]));

        $kota = explode('-', $validation['kota']);
        $validation['kota'] = ucwords(strtolower($kota[0]));

        $kecamatan = explode('-',$validation['kecamatan']);
        $validation['kecamatan'] = ucwords(strtolower($kecamatan[0]));

        $kelurahan = explode('-', $validation['kelurahan']);
        $validation['kelurahan'] = ucwords(strtolower($kelurahan[0]));

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
        return view('user-update-alamat', 
        [            
            'alamatPengiriman' => $alamatPengiriman,
            'provinsis' => Provinsi::all(),
            'kotas' => [],
            'kecamatans' => [],
            'kelurahans' => [],]
        
        );
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
            'kelurahan' => 'required|string',
            'alamat_utama' => 'required'
        ]);
        $provinsi = explode('-', $validation['provinsi']);
        $validation['provinsi'] = ucwords(strtolower($provinsi[0]));

        $kota = explode('-', $validation['kota']);
        $validation['kota'] = ucwords(strtolower($kota[0]));

        $kecamatan = explode('-', $validation['kecamatan']);
        $validation['kecamatan'] = ucwords(strtolower($kecamatan[0]));

        $kelurahan = explode('-', $validation['kelurahan']);
        $validation['kelurahan'] = ucwords(strtolower($kelurahan[0]));

        if($request->alamat_utama == 1){
            $validation['alamat_utama'] = 1;
        } else{
            $validation['alamat_utama'] = 0;
        }

        //Set semua alamat pengiriman menjadi bukan alamat utama
        $alamatUtama = Auth::user()->alamatPengiriman()->where('alamat_utama', 1)->first();
        if(isset($alamatUtama)){
            $alamatUtama->update(['alamat_utama' => 0]);
        }

        //Update alamat utama yang baru
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
        $user = Auth::user();
        // dd($user->alamatPengiriman);
        if(count($user->alamatPengiriman) > 1){
            if($alamatPengiriman->alamat_utama == 1){
                $alamatPengiriman->delete();
                $user->alamatPengiriman()->first()->update(['alamat_utama' => 1]);
                return redirect()->route('alamatPengiriman.index')->with('msg_success','Sukses Hapus Data');
            }
        }
        return redirect()->route('alamatPengiriman.index')->with('msg_failed','Alamat Pengiriman Hanya 1 dan Tidak Dapat Dihapus!');
    }
}
