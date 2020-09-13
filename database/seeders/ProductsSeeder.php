<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizza_products = ['20', 'apline', 'bomg', 'margarita', 'mexicana', 'mod', 'mona', 'special', 'vektors'];
        $pizza_size = ['small' => 5, 'medium' => 10, 'large' => 15];

        foreach ($pizza_products as $pizza) {
            DB::table('products')->insert([
                'category_id' => 1,
                'code' => 'cod-' . $pizza,
                'name' => $pizza,
                'description' => 'Description for pizza-' . $pizza,
                'image' => 'pizza-' . $pizza . '.jpeg',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]);

            foreach($pizza_size as $key => $value) {
                $product_id = DB::table('products')->where('code', 'cod-' . $pizza)->first()->id;
                DB::table('product_attributes')->insert([
                    'product_id' => $product_id,
                    'size' => $key,
                    'price' => $value,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]);
            }
        }
    }
}
