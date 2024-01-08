<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('roleadmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin.index', [
            'admins' => User::whereIn('role_id', [1, 2])->with('admin')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.add',[
            'roles'=>Role::whereIn('id',[1,2])->get(),
            'provinsis'=>Provinsi::all(),
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
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|string',
            'password' => 'required|string',
            'nomor_handphone' => 'required|string',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required|string',
            'role_id' => 'required|integer',
        ]);
        $provinsi = explode('-', $validatedData['provinsi']);
        $validatedData['provinsi'] = ucwords(strtolower($provinsi[0]));

        $kota = explode('-', $validatedData['kota']);
        $validatedData['kota'] = ucwords(strtolower($kota[0]));

        $kecamatan = explode('-', $validatedData['kecamatan']);
        $validatedData['kecamatan'] = ucwords(strtolower($kecamatan[0]));

        $kelurahan = explode('-', $validatedData['kelurahan']);
        $validatedData['kelurahan'] = ucwords(strtolower($kelurahan[0]));
        $validatedData['tanggal_lahir'] = $validatedData['tgl_lahir'];
        $validatedData['password'] = Hash::make($validatedData['password'] );
        $akun = User::create($validatedData);
        $validatedData2 = $request->validate([
            'alamat' => 'required|string',
        ]);
        Admin::create([
            'admin_id' => $akun->id,
            'alamat'=>$validatedData2['alamat'],
        ]);
        return redirect('/admin/admins')->with('success', 'Penambahan data admin berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        return view('admin.admin.edit', [
            'admin' => $admin,
            'roles'=>Role::whereIn('id',[1,2])->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|string',
            'nomor_handphone' => 'required|string',
            'provinsi' => 'string',
            'kota' => 'string',
            'kecamatan' => 'string',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required|string',
            'role_id' => 'required|integer',
        ]);
        $provinsi = explode('-', $validatedData['provinsi']);
        $validatedData['provinsi'] = ucwords(strtolower($provinsi[0]));

        $kota = explode('-', $validatedData['kota']);
        $validatedData['kota'] = ucwords(strtolower($kota[0]));

        $kecamatan = explode('-', $validatedData['kecamatan']);
        $validatedData['kecamatan'] = ucwords(strtolower($kecamatan[0]));

        $kelurahan = explode('-', $validatedData['kelurahan']);
        $validatedData['kelurahan'] = ucwords(strtolower($kelurahan[0]));
        $validatedData['tanggal_lahir'] = $validatedData['tgl_lahir'];
        if($request->password){
            $validatedData['password'] = $request->password;
        }
        $admin->update($validatedData);
        $admin->admin->update(['alamat' => $request->input('alamat')]);
        return redirect('/admin/admins')->with('success', 'Modifikasi data admin berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        if($admin->keranjang->count()>0 || $admin->favorit->count()>0 || $admin->alamatPengiriman->count() > 0 || $admin->nota ||$admin->pelanggan ||$admin->admin || $admin->role){
            return redirect('/admin/admins')->with('error', 'Penghapusan data admin gagal!');
        }
        $admin->delete();
        return redirect('/admin/admins')->with('success', 'Penghapusan data admin berhasil!');
    }
}
