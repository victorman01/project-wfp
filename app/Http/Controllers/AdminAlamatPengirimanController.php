<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use App\Models\AlamatPengiriman;
use Illuminate\Support\Facades\DB;
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
            'users'=>User::all(),
            'provinsis' => Provinsi::all(),
            'kotas' => [],
            'kecamatans' => [],
            'kelurahans' => [],
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
            'kelurahan'=>'required|string',
            'alamat_utama'=>'required|integer',
            'user_id'=>'required|integer',
        ]);

        $provinsi = explode('-', $validatedData['provinsi']);
        $validatedData['provinsi'] = ucwords(strtolower($provinsi[0]));

        $kota = explode('-', $validatedData['kota']);
        $validatedData['kota'] = ucwords(strtolower($kota[0]));

        $kecamatan = explode('-', $validatedData['kecamatan']);
        $validatedData['kecamatan'] = ucwords(strtolower($kecamatan[0]));

        $kelurahan = explode('-', $validatedData['kelurahan']);
        $validatedData['kelurahan'] = ucwords(strtolower($kelurahan[0]));

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
            'alamat_pengiriman'=>$alamatPengiriman,
            'provinsis' => Provinsi::all(),
            'kotas' => [],
            'kecamatans' => [],
            'kelurahans' => [],
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
        $provinsi = explode('-', $validatedData['provinsi']);
        $validatedData['provinsi'] = ucwords(strtolower($provinsi[0]));

        $kota = explode('-', $validatedData['kota']);
        $validatedData['kota'] = ucwords(strtolower($kota[0]));

        $kecamatan = explode('-', $validatedData['kecamatan']);
        $validatedData['kecamatan'] = ucwords(strtolower($kecamatan[0]));

        $kelurahan = explode('-', $validatedData['kelurahan']);
        $validatedData['kelurahan'] = ucwords(strtolower($kelurahan[0]));

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
    public function getKotas(Request $request)
    {
        $kotas = Kota::where('provinsi_id', $request->provinsi)->get();
        if($kotas){
            return response()->json(
                array(
                    'pesan'=>'Berhasil',
                    'kotas'=>json_encode($kotas)
                ),200
            );
        }
        return response()->json(
            array(
                'pesan'=>'Gagal',
            ),200
        );
    }

    public function getKecamatans(Request $request)
    {
        $kecamatans = Kecamatan::where('kota_id',$request->kota)->get();
        if($kecamatans){
            return response()->json(
                array(
                    'pesan'=>'Berhasil',
                    'kecamatans'=>json_encode($kecamatans)
                ),200
            );
        }
        return response()->json(
            array(
                'pesan'=>'Gagal',
            ),200
        );
    }

    public function getKelurahans(Request $request)
    {
        $kelurahans = Kelurahan::where('kecamatan_id',$request->kecamatan)->get();
        if($kelurahans){
            return response()->json(
                array(
                    'pesan'=>'Berhasil',
                    'kelurahans'=>json_encode($kelurahans)
                ),200
            );
        }
        return response()->json(
            array(
                'pesan'=>'Gagal',
            ),200
        );
    }

}
