<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	OrdersTableSeeder::class,
        	DesignsTableSeeder::class,
        	ProductsTableSeeder::class,
        	DeliveryTypesTableSeeder::class,
        	OrderItemsTableSeeder::class,
        	OrderDeliveryAreasTableSeeder::class,
        	OrderProgressesTableSeeder::class,
        	OrderUserImagesTableSeeder::class,
        	OrderItemsTableSeeder::class,
        	UrgentsTableSeeder::class,
        	ProductsTableSeeder::class,
        	StoresTableSeeder::class,
        ]);
    }
}
