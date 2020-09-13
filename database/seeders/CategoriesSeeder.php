<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Pizza', 'Drinks', 'Desert'];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'parent_id' => 0,
                'name' => $category,
                'description' => 'Description for ' . $category,
                'status' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]);
        }

    }
}
