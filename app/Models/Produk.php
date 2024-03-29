<?php

namespace App\Models;

use App\Models\Nota;
use App\Models\User;
use App\Models\Brand;
use App\Models\Gambar;
use App\Models\Kategori;
use App\Models\JenisProduk;
use App\Models\DiskonProduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'produks';

    public function favorit(){
        return $this->belongsToMany(User::class, 'favorits','produk_id','user_id')->withTimestamps();
    }
    public function kategoriProduk(){
        return $this->belongsToMany(Kategori::class, 'kategoris_produks', 'produk_id','kategori_id')->withTimestamps();
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function gambar(){
        return $this->hasMany(Gambar::class);
    }

    public function jenisProduk(){
        return $this->hasMany(JenisProduk::class);
    }
}
