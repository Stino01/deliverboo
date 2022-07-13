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
        $name_list = ['Pizzeria Napoli', 'Sushi Chon', 'Burger King', 'Osteria da Clelia', 'Kebab da Donato', 'Ist. Luce', 'Salah Salad'];
        $vat_list = ['IT12345678901', 'IT12345678902', 'IT12345678903', 'IT12345678904', 'IT12345678905', 'IT12345678906', 'IT12345678907',];
        $user_id_list = ['1', '1', '2', '3', '4', '4',];

        for ($i = 0; $i < 6; $i++) {
            $newRestaurant = new Restaurant();

            $newRestaurant->name = $name_list[$i];
            $newRestaurant->slug = Str::of($newRestaurant->name)->slug('-');
            $newRestaurant->address = $faker->streetAddress();
            $newRestaurant->vat_number = $vat_list[$i];
            $newRestaurant->user_id = $user_id_list[$i];

            $newRestaurant->save();
        }
    }
}
