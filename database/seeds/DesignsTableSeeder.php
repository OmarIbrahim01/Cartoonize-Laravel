<?php

use Illuminate\Database\Seeder;

class DesignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designs')->insert([
            'name' => 'design1',
            'description' => 'qweqweqwe',
            'design_face_price_id' => '1',
            'tag' => 'tag',
            'image_path' => '/designs/design1'
        ]);

        DB::table('designs')->insert([
            'name' => 'design2',
            'description' => 'qweqweqwe',
            'design_face_price_id' => '2',
            'tag' => 'tag',
            'image_path' => '/designs/design2'
        ]);

        DB::table('designs')->insert([
            'name' => 'design3',
            'description' => 'qweqweqwe',
            'design_face_price_id' => '1',
            'tag' => 'tag',
            'image_path' => '/designs/design3'
        ]);

        DB::table('designs')->insert([
            'name' => 'design4',
            'description' => 'qweqweqwe',
            'design_face_price_id' => '3',
            'tag' => 'tag',
            'image_path' => '/designs/design4'
        ]);

        DB::table('designs')->insert([
            'name' => 'design5',
            'description' => 'qweqweqwe',
            'design_face_price_id' => '2',
            'tag' => 'tag',
            'image_path' => '/designs/design5'
        ]);

        DB::table('designs')->insert([
            'name' => 'design6',
            'description' => 'qweqweqwe',
            'design_face_price_id' => '2',
            'tag' => 'tag',
            'image_path' => '/designs/design6'
        ]);

        DB::table('designs')->insert([
            'name' => 'design7',
            'description' => 'qweqweqwe',
            'design_face_price_id' => '1',
            'tag' => 'tag',
            'image_path' => '/designs/design7'
        ]);

        DB::table('designs')->insert([
            'name' => 'design8',
            'description' => 'qweqweqwe',
            'design_face_price_id' => '1',
            'tag' => 'tag',
            'image_path' => '/designs/design8'
        ]);
    }
}
