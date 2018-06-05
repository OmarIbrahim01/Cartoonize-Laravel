<?php

use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([
            'category_id' => '1',
            'name' => 'Baseball',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '1',
            'name' => 'Basketball',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '1',
            'name' => 'Birthday',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '1',
            'name' => 'Boss',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '1',
            'name' => 'Christmas & New Year',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '1',
            'name' => 'Coach',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '1',
            'name' => 'Football',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '1',
            'name' => 'For Her',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '1',
            'name' => 'For Him',
        ]);

        //////////////////////////////////////


        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => 'Anniversary',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => 'Colleagues',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => 'Family Relatives',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => 'Friends',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => 'Movie Characters',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => 'Romantic & Love',
        ]);


        DB::table('sub_categories')->insert([
            'category_id' => '2',
            'name' => 'Friends',
        ]);


        //////////////////////////////////////

        DB::table('sub_categories')->insert([
            'category_id' => '3',
            'name' => 'Family 1',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => '3',
            'name' => 'Family 2',
        ]);

         DB::table('sub_categories')->insert([
            'category_id' => '3',
            'name' => 'Family 3',
        ]);

        ///////////////////////////////////////

    }
}
