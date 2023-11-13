<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GambarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gambar.index',[
            'gambars'=>Gambar::all()
        ]);
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
     * @param  \App\Models\Gambar  $gambar
     * @return \Illuminate\Http\Response
     */
    public function show(Gambar $gambar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gambar  $gambar
     * @return \Illuminate\Http\Response
     */
    public function edit(Gambar $gambar)
    {
        return view('admin.gambar.edit',[
            'gambar_produk'=>$gambar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gambar  $gambar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gambar $gambar)
    {
        $validatedData = $request->validate([
            'nama'=>'required|string',
            'produk_id'=>'required|exists:produks,id'
        ]);

        if($request->hasFile('path')){
            $validatedData['path'] = $request->file('path')->store('post-images');
        }
        $gambar->update($validatedData);
        return redirect('/admin/gambars')->with('success', 'Data gambar updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gambar  $gambar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gambar $gambar)
    {
        if(!$gambar->produk){
            $gambar->delete();
            return redirect('/admin/gambars')->with('success', 'Data gambar deleted succesfully');
        }
        else{
            return redirect('/admin/gambars')->with('error', 'Data gambar deleted unsuccessful');
        }
    }
}
