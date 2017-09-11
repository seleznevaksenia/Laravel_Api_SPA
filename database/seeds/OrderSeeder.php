<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        foreach (range(1, 50) as $index) {
            \App\Order::create([
                'company_id' => $faker->numberBetween(1,5),
                'description' => $faker->sentence,
                'date' => $faker->dateTime
            ]);
        }
    }
}
