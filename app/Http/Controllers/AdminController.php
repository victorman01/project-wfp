<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin.index',[
            'admins'=>Admin::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.add');
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
            'email'=>'required|email|string',
            'password'=>'required|string',
            'tgl_lahir'=>'required',
            'jenis_kelamin'=>'required|string',
            'alamat'=>'required|string',
        ]);
        $validatedData['tanggal_lahir']=$validatedData['tgl_lahir'];
        Admin::create($validatedData);
        return redirect('/admin/admins')->with('success','Penambahan data admin berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.admin.edit',[
            'admin'=>$admin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $validatedData = $request->validate([
            'nama'=>'required|string',
            'email'=>'required|email|string',
            'tgl_lahir'=>'required',
            'jenis_kelamin'=>'required|string',
            'alamat'=>'required|string',
        ]);
        $validatedData['tanggal_lahir']=$validatedData['tgl_lahir'];
        $admin->update($validatedData);
        return redirect('/admin/admins')->with('success','Modifikasi data admin berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect('/admin/admins')->with('success','Penghapusan data admin berhasil!');
    }
}
