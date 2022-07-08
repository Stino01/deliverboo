<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
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
            $newUser = new User();

            $newUser->name = $name_list[rand(0, 6)];
            $newUser->slug = Str::of($newUser->name)->slug('-');
            $newUser->address = $faker->streetAddress();
            $newUser->email = $faker->companyEmail();
            $newUser->password = Hash::make('boolean123');
            $newUser->vat_number = 'IT12345678901';

	        $newUser->save();
        }
    }
}
