<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Individual',
        ]);

        DB::table('categories')->insert([
            'name' => 'Couple',
        ]);

        DB::table('categories')->insert([
            'name' => 'Family',
        ]);

        DB::table('categories')->insert([
            'name' => 'Group',
        ]);
    }
}
