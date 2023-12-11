<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $guarded = ['pelanggan_id'];
    protected $hidden = ['password'];
    protected $table = 'pelanggans';

    public function user(){
        return $this->belongsTo(User::class, 'admin_id');
    }
}
