<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        foreach (range(1, 50) as $index) {
            \App\Payment::create([
                'company_id' => $faker->numberBetween(1,5),
                'description' => $faker->word,
                'date' => $faker->dateTime,
                'value' => $faker->randomFloat(2, 100, 100000)
            ]);
        }
    }
}
