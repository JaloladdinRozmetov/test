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
    public function definition(): array
    {
        $buyers = Buyer::query()->get();
        $products = Product::query()->get();
        return [
            'buyer_id' => $buyers->random(),
            'product_id' => $products->random(),
        ];
    }
}
