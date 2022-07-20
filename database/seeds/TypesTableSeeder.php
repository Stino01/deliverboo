<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Type;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('Types')->count() == 0) {

            DB::table('Types')->insert([
                [
                    'name' => 'Pizza',
                    'slug' => 'pizza',
                    'image' => 'https://cdn.discordapp.com/attachments/993428504194584577/996431635790712892/unknown.png',
                    'background_color' => '#ADC965',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Sushi',
                    'slug' => 'sushi',
                    'image' => 'https://cdn.discordapp.com/attachments/993428504194584577/996431633597071400/unknown.png',
                    'background_color' => '#89D5C9',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Dessert',
                    'slug' => 'dessert',
                    'image' => 'https://cdn.discordapp.com/attachments/993428504194584577/996431634133946518/unknown.png',
                    'background_color' => '#FAC172',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Poke',
                    'slug' => 'poke',
                    'image' => 'https://cdn.discordapp.com/attachments/993428504194584577/996434061042130974/poke_icon.png',
                    'background_color' => '#FF8357',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Gelato',
                    'slug' => 'gelato',
                    'image' => 'https://cdn.discordapp.com/attachments/993428504194584577/996431634444333147/unknown.png',
                    'background_color' => '#E25B45',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Hamburger',
                    'slug' => 'hamburger',
                    'image' => 'https://cdn.discordapp.com/attachments/993428504194584577/996431635060887664/unknown.png',
                    'background_color' => '#FABE0E',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kebab',
                    'slug' => 'kekab',
                    'image' => 'https://cdn.discordapp.com/attachments/993428504194584577/996431635484508431/unknown.png',
                    'background_color' => '#f5c6b2',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Sandwich',
                    'slug' => 'sandwich',
                    'image' => 'https://cdn.discordapp.com/attachments/993428504194584577/996431636008800347/unknown.png',
                    'background_color' => '#aae6da',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Americano',
                    'slug' => 'americano',
                    'image' => 'https://cdn.discordapp.com/attachments/993428504194584577/996434061251854336/americana_icon.png',
                    'background_color' => '#e0966f',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Italiano',
                    'slug' => 'italiano',
                    'image' => 'https://cdn.discordapp.com/attachments/993428504194584577/996434781866827847/italiana_icon.png',
                    'background_color' => '#49888a',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Cinese',
                    'slug' => 'cinese',
                    'image' => 'https://cdn.discordapp.com/attachments/993428504194584577/996431633878110298/unknown.png',
                    'background_color' => '#b68141',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Giapponese',
                    'slug' => 'giapponese',
                    'image' => 'https://cdn.discordapp.com/attachments/993428504194584577/996434781489336401/giapponese_icon.png',
                    'background_color' => '#f8b2bc',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]);
        } else {
            echo "Table is not empty";
        }
    }
}
