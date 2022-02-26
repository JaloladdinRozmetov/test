<?php

namespace Database\Factories;

use App\Models\Buyer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class BuyerProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'buyer_id' => Buyer::factory(),
            'product_id' => Product::factory(),
        ];
    }
}
