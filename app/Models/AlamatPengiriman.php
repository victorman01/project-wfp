<?php

namespace App\Models;

use App\Models\Nota;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlamatPengiriman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'alamat_pengiriman';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function nota(){
        return $this->hasOne(Nota::class, 'alamat_pengiriman_id');
    }
}
