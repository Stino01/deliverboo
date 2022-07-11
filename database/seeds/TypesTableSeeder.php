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
        $types= ['pizza', 'sushi', 'dessert', 'poke', 'gelato', 'hamburger', 'kebab', 'sandwich', 'americano', 'italiano', 'cinese', 'giapponese'];
        for($i = 0; $i < count($types); $i++){
            $newType = new Type();
            $newType->name = $types[$i];
            $newType->slug = Str::of($newType->name)->slug('-');
            $newType->save();
        }
    }
}
