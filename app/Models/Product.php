<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'products';

    protected $fillable = ["product_name","price","sku_code","image"];

    public function buyers():belongsToMany
    {
        return $this->belongsToMany(Buyer::class,'buyer_products','product_id','buyer_id');
    }

}
