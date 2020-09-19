<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table("users")->get();

        foreach($users as $user) {
            for($i = 0; $i < 15; $i++) {
                DB::table('orders')->insert([
                    'user_id' => $user->id,
                    'user_email' => $user->email,
                    'name' => $user->name,
                    'address' => $user->name . ' address',
                    'city' => $user->name . ' city',
                    'mobile' => '1234567',
                    'order_total' => 15,
                    'order_status' => 1,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]);
            }
        }
    }
}
