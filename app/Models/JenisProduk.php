<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function produk(){
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
