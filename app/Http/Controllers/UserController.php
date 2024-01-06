<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\AlamatPengiriman;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function addOrDeleteFavorite(Request $request){
        $user = Auth::user();

        $userFav = isset($user->favorit) ? $user->favorit : null;

        $statusFavorit = false;

        //Check if the user already favorite the item or not
        if($userFav != null){
            foreach($userFav as $uf){
                if($uf->id == $request->produkId){
                    $statusFavorit = true;
                }
            }
        }

        //Add or Delete Favorit for user
        if(!$statusFavorit){
            $user->favorit()->attach([$request->produkId]);
            // return back()->with('pesan', 'Tambah Favorit Berhasil');
            return response()->json(
                array(
                    'pesan' => 'Tambah Favorit Berhasil'
                ),
                200
            );
        } else {
            $user->favorit()->detach([$request->produkId]);
            // return back()->with('pesan', 'Favorit dihapus');
            return response()->json(
                array(
                    'pesan' => 'Favorit dihapus'
                ),
                200
            );
        }
    }

    //Show List Alamat
    public function listAlamat(Request $request){
        // $user = Auth::user();

        // $alamatPengiriman = isset($user->alamatPengiriman) ? $user->alamatPengiriman : null;

        // return view('user-list-alamat', [
        //     'alamat' => $alamatPengiriman
        // ]);
    }

    public function editAlamat(Request $request, $alamatId){

    }

    //Show Favorite product
    public function showFavoriteProducts(){
        $user = Auth::user();

        $favProducts = $user->favorit()->get();

        return view('produk.favorit', [
            'favProducts' => $favProducts
        ]);
    }
    public function index(){
        return view('admin.user.index',[
            'users'=>User::where('role_id',3)->get()
        ]);
    }
    public function create(){
        return view('admin.user.add');
    }
    public function store(Request $request){
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
            'point' => 'required|integer',
        ]);
        $validatedData['tanggal_lahir'] = $validatedData['tgl_lahir'];
        $validatedData['password'] = Hash::make($validatedData['password'] );
        $validatedData['role_id'] = 3;
        $user = User::create($validatedData);
        $validatedData2 = $request->validate([
            'point' => 'required|integer',
        ]);
        Pelanggan::create([
            'pelanggan_id' => $user->id,
            'point'=>$validatedData2['point'],
        ]);
        return redirect('/admin/users')->with('success', 'Penambahan data pelanggan berhasil!');
    }
    public function edit(User $user){
        $user->tgl_lahir = Carbon::parse($user->tgl_lahir);
        return view('admin.user.edit',[
            'user' => $user,
        ]);
    }
    public function update(Request $request, User $user){
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|string',
            'nomor_handphone' => 'required|string',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required|string',
            'point' => 'required|integer',
        ]);
        $validatedData['tanggal_lahir'] = $validatedData['tgl_lahir'];
        if($request->input('password')){
            $validatedData['password'] = Hash::make($validatedData['password'] );
        }
        $validatedData['role_id'] = 3;
        $user->update($validatedData);
        $validatedData2 = $request->validate([
            'point' => 'required|integer',
        ]);
        $user->pelanggan->update([
            'pelanggan_id' => $user->id,
            'point'=>$validatedData2['point'],
        ]);
        return redirect('/admin/users')->with('success', 'Modifikasi data pelanggan berhasil!');
    }
    public function destroy(User $user){
        $user->delete();
        return redirect('/admin/users')->with('success', 'Hapus data pelanggan berhasil!');
    }
}
