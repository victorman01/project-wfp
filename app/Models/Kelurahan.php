<?php

namespace App\Models;

use App\Models\AlamatPengiriman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table='kelurahans';
    public function alamatPengiriman(){
        return $this->belongsTo(AlamatPengiriman::class, 'provinsi_id');
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
}
