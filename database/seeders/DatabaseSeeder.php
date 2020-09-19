<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::factory(10)->create();
        $this->call(CategoriesSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(OrdersSeeder::class);
        $this->call(OrderProductsSeeder::class);
    }
}
