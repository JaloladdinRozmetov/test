<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{  /**
 * The name of the factory's corresponding model.
 *
 * @var string
 */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
           'product_name' => $this->faker->realText(12),
            'sku_code' => $this->faker->regexify('[a-z0-9]{6}'),
            'price' => $this->faker->randomFloat(5, 10000, 90000),
            'image' =>$this->faker->image($dir = null, $width = 640, $height = 480, $category = null, $fullPath = true, $randomize = true, $word = null),
        ];
    }
}
