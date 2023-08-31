<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::create([
            'name' => 'black',
            'code' => '#000000'
        ]);
        Color::create([
            'name' => 'white',
            'code' => '#ffffff'
        ]);
        Color::create([
            'name' => 'primary',
            'code' => '#cb7c7c'
        ]);
        Color::create([
            'name' => 'red',
            'code' => '#FF0000'
        ]);
    }
}
