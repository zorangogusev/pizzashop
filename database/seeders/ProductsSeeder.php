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
        $pizza_products = [
            'Vegetarian' => 'vegetable, cheese, tomato',
            'Alpine' => 'ham, cheese',
            'Macedonian' => 'cheese, tomato',
            'Margarita' => 'vegetable, cheese, ham',
            'Mexicana' => 'cheese, olives, ham',
            'Kapricoza' => 'cheese, ham, mushrooms',
            'Mona' => 'cheese, egs',
            'Special' => 'cheese, ham, vegetables',
            'Vektors' => 'cheese, pork'
        ];
        $pizza_size = ['small' => 5, 'medium' => 10, 'large' => 15];

        foreach ($pizza_products as $pizza_key => $pizza_value) {
            DB::table('products')->insert([
                'category_id' => 1,
                'code' => 'cod-' . $pizza_key,
                'name' => $pizza_key,
                'description' => $pizza_value,
                'image' => 'pizza-' . $pizza_key . '.jpeg',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]);

            foreach($pizza_size as $key => $value) {
                $product_id = DB::table('products')->where('code', 'cod-' . $pizza_key)->first()->id;
                DB::table('product_attributes')->insert([
                    'product_id' => $product_id,
                    'size' => $key,
                    'price' => $value,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]);
            }
        }

        $drinks = ['Coke' => 'Soft drink', 'Fanta' => 'Soft drink', 'Pepsi' => 'Soft drink'];

        foreach ($drinks as $drink_key => $drink_value) {
            DB::table('products')->insert([
                'category_id' => 2,
                'code' => 'cod-' . $drink_key,
                'name' => $drink_key,
                'description' => $drink_value,
                'image' => 'drinks-' . $drink_key . '.jpeg',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]);

                $product_id = DB::table('products')->where('code', 'cod-' . $drink_key)->first()->id;
                DB::table('product_attributes')->insert([
                    'product_id' => $product_id,
                    'size' => 'small',
                    'price' => 5,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]);
        }

        $desert = ['Milka' => 'Chocolate with milk', 'Toblerone' => 'Dark chocolate'];
        foreach ($desert as $desert_key => $desert_value) {
            DB::table('products')->insert([
                'category_id' => 3,
                'code' => 'cod-' . $desert_key,
                'name' => $desert_key,
                'description' => $desert_value,
                'image' => 'desert-' . $desert_key . '.jpeg',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]);

            $product_id = DB::table('products')->where('code', 'cod-' . $desert_key)->first()->id;
            DB::table('product_attributes')->insert([
                'product_id' => $product_id,
                'size' => 'small',
                'price' => 8,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]);
        }
    }
}
