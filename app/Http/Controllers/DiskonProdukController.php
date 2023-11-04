<?php

namespace App\Http\Controllers;

use App\Models\DiskonProduk;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiskonProdukRequest;
use App\Http\Requests\UpdateDiskonProdukRequest;

class DiskonProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDiskonProdukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiskonProdukRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiskonProduk  $diskonProduk
     * @return \Illuminate\Http\Response
     */
    public function show(DiskonProduk $diskonProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DiskonProduk  $diskonProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(DiskonProduk $diskonProduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiskonProdukRequest  $request
     * @param  \App\Models\DiskonProduk  $diskonProduk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiskonProdukRequest $request, DiskonProduk $diskonProduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiskonProduk  $diskonProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiskonProduk $diskonProduk)
    {
        //
    }
}
