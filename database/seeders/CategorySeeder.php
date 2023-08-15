<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Gold',
        ]);

        Category::create([
            'name' => 'Electronics',
        ]);

        Category::create([
            'name' => 'Clothes',
        ]);

        Category::create([
            'name' => 'Underware',
        ]);
    }
}
