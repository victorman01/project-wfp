<?php

namespace App\Models;

use App\Models\Nota;
use App\Models\User;
use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlamatPengiriman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'alamat_pengirimans';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function nota(){
        return $this->hasOne(Nota::class, 'alamat_pengiriman_id');
    }
    public function provinsi(){
        return $this->hasOne(Provinsi::class, 'provinsi_id');
    }
    public function kota(){
        return $this->hasMany(Kota::class, 'kota_id');
    }
    public function kecamatan(){
        return $this->hasMany(Kecamatan::class, 'kecamatan_id');
    }
    public function kelurahan(){
        return $this->hasMany(Kelurahan::class, 'kelurahan_id');
    }
}
