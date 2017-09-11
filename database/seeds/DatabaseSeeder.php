<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call([CompanySeeder::class,
             OrderSeeder::class,
             OrderItemSeeder::class,
             PaymentSeeder::class,
             ProductSeeder::class,
             ProductHistorySeeder::class,
             SaleItemSeeder::class,
             SaleSeeder::class,
             VendorSeeder::class,
             WithdrawSeeder::class
         ]);
    }
}
