<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buyer extends Model
{
    use HasFactory;

    protected $table = 'buyers';

    public function getBuyerProducts(): HasMany
    {
        return $this->hasMany(BuyerProduct::class, 'buyer_id');
    }
}
