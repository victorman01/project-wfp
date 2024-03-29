<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\JenisProduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiskonProduk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'diskon_produks';

    public function jenisProduk(){
        return $this->belongsTo(JenisProduk::class);
    }
}
