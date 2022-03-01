<?php

namespace Database\Seeders;

use App\Models\BuyerProduct;
use Illuminate\Database\Seeder;

class BuyerProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BuyerProduct::factory(1000)
            ->create();
    }
}
