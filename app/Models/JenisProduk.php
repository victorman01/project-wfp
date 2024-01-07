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

    public function detail_transaksi(){
        return $this->belongsToMany(Nota::class, 'detail_transaksis', 'jenis_produk_id', 'nota_id')->withPivot(['jumlah', 'sub_total', 'diskon', 'besar_diskon']);
    }

    public function diskon_produk(){
        return $this->hasMany(DiskonProduk::class);
    }

    public function produk(){
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
