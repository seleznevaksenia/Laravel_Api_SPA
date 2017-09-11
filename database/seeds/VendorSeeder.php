<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        foreach (range(1, 4) as $index) {
            \App\Vendor::create([
                'name' => $faker->company,
                'user_id' => 1,
                'owner' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'site' => $faker->url,
                'address' => $faker->address,
                'current_account' => $faker->bankAccountNumber,
                'bank' => $faker->name,
                'town' => $faker->city,
                'mfo' => $faker->randomNumber(),
                'itn' => $faker->randomNumber()
            ]);
        }
    }
}
