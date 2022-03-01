<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Buyer
 * @package App\Models
 * @property Collection|BuyerProduct[] buyerProducts
 * @property string image
 */
class Buyer extends Model
{
    use HasFactory;

    protected $table = 'buyers';

    protected $fillable = ["first_name", "last_name", "phone_number","email","image","code","admin_created_id","admin_updated_id"];

    public function buyerProducts(): HasMany
    {
        return $this->hasMany(BuyerProduct::class, 'buyer_id', 'id');
    }
}
