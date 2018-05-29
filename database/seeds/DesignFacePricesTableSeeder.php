<?php

use Illuminate\Database\Seeder;

class DesignFacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('design_face_prices')->insert([
            'price' => '50',
            'active' => '1',
        ]);

    }
}
