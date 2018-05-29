<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            'name' => 'Citystars',
            'address' => 'ttttttttttttttt',
        ]);

        DB::table('stores')->insert([
            'name' => 'Rehab Mall 2',
            'address' => 'ttttttttttttttt',
        ]);
    }

}
