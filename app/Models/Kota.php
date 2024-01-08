<?php

namespace App\Models;

use App\Models\Provinsi;
use App\Models\Kecamatan;
use App\Models\AlamatPengiriman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kota extends Model
{
    use HasFactory;
    protected $table ='kotas';
    public function alamatPengiriman(){
        return $this->belongsTo(AlamatPengiriman::class, 'provinsi_id');
    }
    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }
    public function kecamatan(){
        return $this->hasMany(Kecamatan::class, 'id');
    }
}
