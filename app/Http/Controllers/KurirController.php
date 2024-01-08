<?php

namespace App\Http\Controllers;

use App\Models\Kurir;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kurir.index',[
            'kurirs'=>Kurir::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kurir.add');
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
            'nama' => 'required|string',
        ]);
        Kurir::create($validatedData);
        return redirect('/admin/kurirs')->with('success','Data kurir telah tersimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function show(Kurir $kurir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function edit(Kurir $kurir)
    {
        return view('admin.kurir.edit',[
            'kurir'=>$kurir
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kurir $kurir)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
        ]);
        $kurir->update($validatedData);
        return redirect('/admin/kurirs')->with('success','Modifikasi data kurir berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kurir $kurir)
    {
        if($kurir->jenisPengiriman->count()>0){
            return redirect('/admin/kurirs')->with('error','Data kurir gagal terhapus!');
        }
        $kurir->delete();
        return redirect('/admin/kurirs')->with('success','Data kurir telah terhapus!');
    }
}
