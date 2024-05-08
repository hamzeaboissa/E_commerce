<?php

namespace App\Models;

use App\Models\ProductImage;
use App\Models\ProductColors;
use Illuminate\Auth\Events\Failed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'brand',
        'small_description',
        'description',
        'quantity',
        'traending',
        'Featured',
        'orginal_price',
        'salling_price',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description'

    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function ProductImage()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    public function ProductColors()
    {
        return $this->hasMany(ProductColors::class, 'product_id', 'id');
    }
}
