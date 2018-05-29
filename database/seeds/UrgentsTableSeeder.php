<?php

use Illuminate\Database\Seeder;

class UrgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('urgents')->insert([
            'name' => '4-5 Days',
            'description' => 'This will take up to 5 bussness days',
            'days' => '5',
            'price' => '0',
            'active' => '1',
        ]);

        DB::table('urgents')->insert([
            'name' => '2-3 Days',
            'description' => 'This will take up to 5 bussness days',
            'days' => '3',
            'price' => '50',
            'active' => '1',
        ]);

        DB::table('urgents')->insert([
            'name' => '1-2 Days',
            'description' => 'This will take up to 5 bussness days',
            'days' => '2',
            'price' => '100',
            'active' => '1',
        ]);
    }
}
