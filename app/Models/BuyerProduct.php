<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property Product $products
 * @property Buyer $buyers
 */
class BuyerProduct extends Model
{
    use HasFactory;

    protected $table = 'buyer_products';

    protected $fillable = ["product_id", "buyer_id"];

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function buyers(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
