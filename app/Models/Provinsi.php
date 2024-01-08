<?php

namespace App\Models;

use App\Models\Kota;
use App\Models\AlamatPengiriman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provinsi extends Model
{
    use HasFactory;
    protected $table ='provinsis';
    public function kota(){
        return $this->hasMany(Kota::class, 'id');
    }
}
