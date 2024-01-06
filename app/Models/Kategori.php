<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kategoris';

    public function kategori_produk(){
        return $this->belongsToMany(Produk::class, 'kategoris_produks', 'kategori_id','produk_id')->withTimestamps();
    }
}
