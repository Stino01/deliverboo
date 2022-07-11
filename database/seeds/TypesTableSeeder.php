<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeslist = ['pizza', 'sushi', 'dessert', 'poke', 'gelato', 'hamburger', 'kebab', 'sandwich', 'americano', 'italiano', 'cinese', 'giapponese'];
        foreach ($typeslist as $type) {
            $newType = new Type();

            $newType->name = $type;
            $newType->slug = Str::of($newType->name)->slug('-');

            $newType->save();
        }
    }
}
