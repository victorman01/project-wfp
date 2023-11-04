<?php

namespace App\Models;

use App\Models\JenisPengiriman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kurir extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kurirs';

    public function jenisPengiriman(){
        return $this->hasMany(JenisPengiriman::class, 'kurir_id');
    }
}
