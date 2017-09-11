<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        foreach (range(1, 50) as $index) {
            \App\Sale::create([
                'company_id' => $faker->numberBetween(1,5),
                'cost' => $faker->randomFloat(2, 0, 100000),
                'price' => $faker->randomFloat(2, 0, 100000),
                'payed' => $faker->randomFloat(2, 0, 100000),
                'description' => $faker->sentence,
                'date' => $faker->dateTime,
                'ttn' => $faker->unique()->randomNumber()
            ]);
        }
    }
}
