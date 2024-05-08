<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'Website_name',
        'Website_url',
        'page_title',
        'meta_keywords',
        'meta_Description',
        //info
        'Address',
        'Phone1',
        'Email_ID',
        //Social Media
        'Facebook',
        'Instagram',
        'Twitter',
        'YouTube'
    ];
}
