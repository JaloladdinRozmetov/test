<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Product
 * @package App\Models
 * @property int $id
 * @property string $product_name
 * @property float $price
 * @property string $sku_code
 * @property string $image
 */
class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'products';

    protected $fillable = ["product_name","price","sku_code","image"];


}
