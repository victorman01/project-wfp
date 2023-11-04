<?php

namespace App\Models;

use App\Models\Nota;
use App\Models\Kurir;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisPengiriman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'jenis_pengiriman';

    public function kurir(){
        return $this->belongsTo(Kurir::class, 'kurir_id');
    }
    public function nota(){
        return $this->hasMany(Nota::class, 'jenis_pengiriman_id');
    }
}
