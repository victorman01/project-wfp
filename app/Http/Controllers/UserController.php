<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function addOrDeleteFavorite(Request $request, $produkId){
        $user = Auth::user();

        $userFav = $user->favorit;

        $statusFavorit = false;

        foreach($userFav as $uf){
            if($uf->id == $produkId){
                $statusFavorit = true;
            }
        }

        if(!$statusFavorit){
            $user->favorit()->attach([$produkId]);
            $user->favorit()->sync([$produkId]);
            return back()->with('pesan', 'Tambah Favorit Berhasil');
        } else {
            $user->favorit()->detach([$produkId]);
            return back()->with('pesan', 'Favorit dihapus');
        }
    }
}
