<?php

namespace App\Models;

use App\Models\Nota;
use App\Models\Role;
use App\Models\Produk;
use App\Models\Pelanggan;
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
        return $this->belongsToMany(JenisProduk::class, 'keranjangs','user_id','jenis_produk_id')->withPivot('jumlah');
    }
    public function favorit(){
        return $this->belongsToMany(Produk::class, 'favorits','user_id','produk_id')->withTimestamps();;
    }
    public function alamatPengiriman(){
        return $this->hasMany(AlamatPengiriman::class,'user_id');
    }
    public function nota(){
        return $this->hasMany(Nota::class, 'user_id');
    }

    public function pelanggan(){
        return $this->hasMany(Pelanggan::class, 'pelanggan_id');
    }

    public function admin(){
        return $this->hasMany(Admin::class, 'admin_id');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }
}
