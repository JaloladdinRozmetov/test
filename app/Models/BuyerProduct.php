<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerProduct extends Model
{
    use HasFactory;

    protected $table = 'buyer_products';

    protected $fillable = ["product_id", "buyer_id"];

    public function getProduct(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
