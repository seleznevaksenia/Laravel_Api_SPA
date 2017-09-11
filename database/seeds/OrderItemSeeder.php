<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        foreach (range(1, 300) as $index) {
            \App\OrderItem::create([
                'order_id' => $faker->numberBetween(1,50),
                'product_id' => $faker->numberBetween(1,20),
                'description' => $faker->sentence,
                'qtu' => $faker->numberBetween(1,500)
            ]);
        }
    }
}
