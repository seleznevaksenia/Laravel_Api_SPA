<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        foreach (range(1, 20) as $index) {
            \App\Product::create([
                'name' => $faker->word,
                'vendor_id' => $faker->numberBetween(1,4),
                'image' => $faker->url,
                'cost' => $faker->randomFloat(2, 0, 100000),
                'price' => $faker->randomFloat(2, 0, 100000),
                'description' => $faker->sentence
            ]);
        }
    }
}
