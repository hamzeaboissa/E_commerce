<?php

namespace App\Models;

use App\Models\product;
use App\Models\ProductColors;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carts extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'product_id',
        'product_color_id',
        'quantity'
    ];
    /**
     * Get the user that owns the Carts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
    public function productColor(): BelongsTo
    {
        return $this->belongsTo(ProductColors::class, 'product_color_id', 'id');
    }
}
