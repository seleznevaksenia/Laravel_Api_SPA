<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class SaleItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        foreach (range(1, 300) as $index) {
            \App\SaleItem::create([
                'sale_id' => $faker->numberBetween(1,50),
                'product_id' => $faker->numberBetween(1,20),
                'cost' => $faker->randomFloat(2, 0, 100000),
                'price' => $faker->randomFloat(2, 0, 100000),
                'qtu' => $faker->numberBetween(1,500)
            ]);
        }
    }
}
