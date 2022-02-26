<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerProduct extends Model
{
    use HasFactory;

    protected $table = 'buyer_products';

    public function getProduct(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
