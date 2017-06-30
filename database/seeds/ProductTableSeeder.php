<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new App\Product([
			'imagePath' => 'https://www.buckeyehvacparts.com/wp-content/themes/cheap-hvac-parts/images/image_coming_soon.png',
			'title' => 'Product',
			'description' => 'koop nu!!',
			'price' => 50,
            'category_id' => '1'
        ]);
        $product->save();

        $product = new App\Product([
			'imagePath' => 'https://www.buckeyehvacparts.com/wp-content/themes/cheap-hvac-parts/images/image_coming_soon.png',
			'title' => 'Product',
			'description' => 'koop nu!!',
			'price' => 50,
            'category_id' => '1'
        ]);
        $product->save();

        $product = new App\Product([
			'imagePath' => 'https://www.buckeyehvacparts.com/wp-content/themes/cheap-hvac-parts/images/image_coming_soon.png',
			'title' => 'Product',
			'description' => 'koop nu!!',
			'price' => 50,
            'category_id' => '1'
        ]);
        $product->save();

        $product = new App\Product([
			'imagePath' => 'https://www.buckeyehvacparts.com/wp-content/themes/cheap-hvac-parts/images/image_coming_soon.png',
			'title' => 'Product',
			'description' => 'koop nu!!',
			'price' => 50,
            'category_id' => '1'
        ]);
        $product->save();

        $product = new App\Product([
			'imagePath' => 'https://www.buckeyehvacparts.com/wp-content/themes/cheap-hvac-parts/images/image_coming_soon.png',
			'title' => 'Product',
			'description' => 'koop nu!!',
			'price' => 50,
            'category_id' => '1'
        ]);
        $product->save();
    }
}
