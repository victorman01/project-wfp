<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AlamatPengiriman;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
}
