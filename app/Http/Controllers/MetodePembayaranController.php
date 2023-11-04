<?php

namespace App\Http\Controllers;

use App\Models\MetodePembayaran;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMetodePembayaranRequest;
use App\Http\Requests\UpdateMetodePembayaranRequest;

class MetodePembayaranController extends Controller
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
     * @param  \App\Http\Requests\StoreMetodePembayaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMetodePembayaranRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMetodePembayaranRequest  $request
     * @param  \App\Models\MetodePembayaran  $metodePembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMetodePembayaranRequest $request, MetodePembayaran $metodePembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MetodePembayaran  $metodePembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(MetodePembayaran $metodePembayaran)
    {
        //
    }
}
