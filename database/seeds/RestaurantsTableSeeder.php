<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Restaurant;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $name_list = ['Pizzeria Napoli', 'Sushi Chon', 'Burger King', 'Osteria da Clelia', 'Kebab da Donato', 'Ist. Luce', 'Simon Salad'];
        for($i = 0; $i < 10; $i++) {
            $newRestaurant = new Restaurant();

            $newRestaurant->name = $name_list[rand(0, 6)];
            $newRestaurant->slug = Str::of($newRestaurant->name)->slug('-');
            $newRestaurant->email = $faker->companyEmail();
            $newRestaurant->password = Hash::make('boolean123');
            $newRestaurant->address = $faker->streetAddress();
            $newRestaurant->vat_number = 'IT12345678901';

	        $newRestaurant->save();
        }
    }
}
