<?php

namespace App\Models;

use App\Models\Kota;
use App\Models\Kelurahan;
use App\Models\AlamatPengiriman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatans';
    public function alamatPengiriman(){
        return $this->belongsTo(AlamatPengiriman::class, 'provinsi_id');
    }
    public function kota(){
        return $this->belongsTo(Kota::class, 'kota_id');
    }
    public function kelurahan(){
        return $this->hasMany(Kelurahan::class, 'id');
    }
}
