<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // pasword is zoranzoran
        $users = [
            ['name' =>'Zoran', 'email' => 'zoran@yahoo.com', 'password' => '$2y$10$pZsCgEOO7eDAwAnpkrofou5nzByW3M0qkXdCAD1oBUJzuM0L0IxRa'],
            ['name' =>'Vasko', 'email' => 'vasko@yahoo.com', 'password' => '$2y$10$pZsCgEOO7eDAwAnpkrofou5nzByW3M0qkXdCAD1oBUJzuM0L0IxRa'],
            ['name' =>'Marko', 'email' => 'marko@yahoo.com', 'password' => '$2y$10$pZsCgEOO7eDAwAnpkrofou5nzByW3M0qkXdCAD1oBUJzuM0L0IxRa'],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]);
        }
    }
}
