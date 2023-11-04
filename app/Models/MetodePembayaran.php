<?php

namespace App\Models;

use App\Models\Nota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MetodePembayaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'metode_pembayarans';

    public function kurir(){
        return $this->hasMany(Nota::class, 'metode_pembayaran_id');
    }
}
