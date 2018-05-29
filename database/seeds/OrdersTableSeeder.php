<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id' => 1,
            'delivery_type_id' => 1,
            'delivery_address' => 'qqqqqqqqqqqqqqqqk',
            'delivery_area_id' => 1,
            'urgent_id' => 1,
            'order_progress_id' => 1,
            'active' => 1
        ]);

        DB::table('orders')->insert([
            'user_id' => 1,
            'delivery_type_id' => 2,
            'store_id' => 1,
            'urgent_id' => 1,
            'order_progress_id' => 1,
            'active' => 1
        ]);

        DB::table('orders')->insert([
            'user_id' => 1,
            'delivery_type_id' => 1,
            'delivery_address' => 'wwwwwwwwwwwwwwwwww',
            'delivery_area_id' => 1,
            'urgent_id' => 2,
            'order_progress_id' => 2,
            'active' => 1
        ]);

        DB::table('orders')->insert([
            'user_id' => 3,
            'delivery_type_id' => 1,
            'delivery_address' => 'eeeeeeeeeeeeeeeeee',
            'delivery_area_id' => 1,
            'urgent_id' => 3,
            'order_progress_id' => 4,
            'active' => 1
        ]);

        DB::table('orders')->insert([
            'user_id' => 1,
            'delivery_type_id' => 1,
            'delivery_address' => 'rrrrrrrrrrrrrrrrr',
            'delivery_area_id' => 1,
            'store_id' => 1,
            'urgent_id' => 1,
            'order_progress_id' => 1,
            'active' => 1
        ]);
    }
}
