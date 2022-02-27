<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Buyer extends Model
{
    use HasFactory;

    protected $table = 'buyers';

    protected $fillable = ["first_name", "last_name", "phone_number","email","image","code"];

    public function products():belongsToMany
    {
        return $this->belongsToMany(Product::class, 'buyer_products','buyer_id','product_id');
    }
}
