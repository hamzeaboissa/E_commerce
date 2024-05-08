<?php

namespace App\Models;

use App\Models\product;
use App\Models\ProductColors;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';


    protected $fillable = [
        //'user_id',
        'order_id',
        'product_id',
        'product_color_id',
        'quantity',
        'price'
    ];
    /**
     * Get the product that owns the OrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }

    /**
     * Get the product that owns the OrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productColor(): BelongsTo
    {
        return $this->belongsTo(ProductColors::class, 'product_color_id', 'id');
    }
}
