<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        
    	foreach (range(1,15) as $index) {

	        DB::table('products')->insert([
	            'name' => $faker->name,
	            'description' => $faker->paragraph,
	            'price' => $faker->randomDigit,
	            'sale' => $faker->randomDigit,
	            'category' => $faker->name,
	            
	        ]);
            
		}
    }
}
