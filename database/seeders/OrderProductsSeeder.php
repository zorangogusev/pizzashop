<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = DB::table('orders')->get();

        foreach($orders as $order) {
            for($i = 1; $i < 4; $i++) {
                DB::table('order_products')->insert([
                    'order_id' => $order->id,
                    'product_id' => $i,
                    'product_name' => 'DB seeded',
                    'product_size' => 'small',
                    'product_price' => 5,
                    'product_quantity' => 1,
                    'product_total' => 5,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]);
            }
        }
    }
}
