<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'brands';

    public function produk(){
        return $this->hasMany(Produk::class, 'brand_id');
    }
}
