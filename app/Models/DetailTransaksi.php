<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jenisProduk(){
        return $this->belongsTo(JenisProduk::class,'jenis_produk_id');
    }
    public function nota(){
        return $this->belongsTo(Nota::class,'nota_id');
    }
}
