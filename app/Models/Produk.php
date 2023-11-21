<?php

namespace App\Models;

use App\Models\Nota;
use App\Models\User;
use App\Models\Brand;
use App\Models\Gambar;
use App\Models\Kategori;
use App\Models\DiskonProduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'produks';

    public function keranjang(){
        return $this->belongsToMany(User::class, 'keranjangs','produk_id','user_id')->withPivot('jumlah');
    }
    public function favorit(){
        return $this->belongsToMany(User::class, 'favorits','produk_id','user_id')->withTimestamps();;
    }
    public function kategori(){
        return $this->belongsToMany(Kategori::class, 'kategoris_produks', 'produk_id','kategori_id');
    }
    public function detailTransaksi(){
        return $this->belongsToMany(Nota::class, 'detail_transaksis', 'produk_id', 'nota_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function gambar(){
        return $this->hasMany(Gambar::class);
    }
    public function diskonProduk(){
        return $this->hasMany(DiskonProduk::class, 'diskon_produk_id');
    }
}
