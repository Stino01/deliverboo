<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        $product_list = ['Pizza Margherita', 'Hamburger', 'Piadina', 'Birra', 'Cappuccino'];
        $category_id_list = ['1', '2', '3', '4', '5'];
        $restaurant_id_list = ['1', '2', '3', '4', '5'];
        for ($i = 0; $i < 5; $i++) {
            $newProduct = new Product();

            $newProduct->name = $product_list[$i];
            $newProduct->slug = Str::of($newProduct->name)->slug('-');
            $newProduct->description = $faker->text();
            $newProduct->image = $faker->imageUrl(360, 360, 'food', true);
            $newProduct->price = $faker->randomFloat(2, 1, 999);
            $newProduct->visible = $faker->boolean();
            $newProduct->category_id = $category_id_list[$i];
            $newProduct->restaurant_id = $restaurant_id_list[$i];

            $newProduct->save();
        }
    }
}
