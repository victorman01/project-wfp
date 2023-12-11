<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'roles';

    public function user(){
        return $this->hasMany(User::class, 'role_id');
    }
}
