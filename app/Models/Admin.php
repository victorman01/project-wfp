<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Model
{
    use HasFactory;
    protected $guarded = ['admin_id'];
    protected $hidden = ['password'];
    protected $table = 'admins';

    public function user(){
        return $this->belongsTo(User::class, 'admin_id');
    }
}
