<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'A4 Maqautte',
            'description' => 'ttttttttttttttt',
            'dimensions' => '30x40',
            'price' => '400',
        ]);

        DB::table('products')->insert([
            'name' => 'A3 Maqautte',
            'description' => 'qqqqqqqqqq',
            'dimensions' => '40x40',
            'price' => '600',
        ]);

        DB::table('products')->insert([
            'name' => 'A2 Maqautte',
            'description' => 'ttttttttttttttt',
            'dimensions' => '30x40',
            'price' => '800',
        ]);

        DB::table('products')->insert([
            'name' => 'A0 Maqautte',
            'description' => 'ttttttttttttttt',
            'dimensions' => '30x40',
            'price' => '1000',
        ]);
    }
}
