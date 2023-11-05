<?php

namespace App\Models;

use App\Models\Nota;
use App\Models\Produk;
use App\Models\AlamatPengiriman;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded = ['id'];
    protected $hidden = ['password'];
    protected $table = 'users';

    public function keranjang(){
        return $this->belongsToMany(Produk::class, 'keranjangs','user_id','produk_id');
    }
    public function favorit(){
        return $this->belongsToMany(Produk::class, 'favorits','user_id','produk_id');
    }
    public function alamatPengiriman(){
        return $this->hasMany(AlamatPengiriman::class,'user_id');
    }
    public function nota(){
        return $this->hasMany(Nota::class, 'user_id');
    }
}
