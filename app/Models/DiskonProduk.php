<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiskonProduk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'diskon_produks';

    public function jenis_produk(){
        return $this->belongsTo(Produk::class, 'jenis_produk_id');
    }
}
