<?php

namespace App\Http\Controllers;

use App\Models\AlamatPengiriman;
use App\Models\JenisPengiriman;
use App\Models\MetodePembayaran;
use App\Models\Nota;
use App\Models\DetailTransaksi;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

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

    public function laporan(Request $request){
        $sortBy = $request->input('sort_by', 'id');
        $sortOrder = $request->input('sort_order', 'asc'); // Default to ascending order
        // Fetch your data with the sorting order
        $notas = Nota::orderBy($sortBy, $sortOrder)->get();
        return view('admin.laporan.index', [
            'notas' => $notas,
            'detailTransaksis'=>DetailTransaksi::all()
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
            'status_pengiriman' => 'required',
            'status_pembayaran' => 'required',
        ]);
        if($validatedData['status_pembayaran'] ==='Lunas' && $validatedData['status_pengiriman']==='Menunggu Pembayaran'){
            $validatedData['status_pengiriman']='Persiapan Barang';
        };
        $nota->update($validatedData);
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
        if($nota->user && $nota->alamatPengiriman && $nota->metodePembayaran && $nota->jenisPengiriman && $nota->detailTransaksi->count()>0){
            return redirect('/admin/notas')->with('error', 'Nota gagal dihapus');
        }
        $nota->delete();
        return redirect('/admin/notas')->with('success', 'Nota has been deleted!');
    }

}
