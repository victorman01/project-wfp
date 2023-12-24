<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProduk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'jenis_produks';

    public function keranjang(){
        return $this->belongsToMany(User::class, 'keranjangs','jenis_produk_id','user_id')->withPivot('jumlah');
    }

    public function detailTransaksi(){
        return $this->belongsToMany(Nota::class, 'detail_transaksis', 'jenis_produk_id', 'nota_id');
    }

    public function diskonProduk(){
        return $this->hasMany(DiskonProduk::class, 'diskon_produk_id');
    }
}
