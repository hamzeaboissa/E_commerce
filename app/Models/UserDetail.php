<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $table = 'users_profile';
    protected $fillable = [
        'user_id',
        'Phone',
        'Pin_Code',
        'address'
    ];
}
