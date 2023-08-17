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
            'name' => 'ears',
            'category_type_id' => 1,
        ]);

        Category::create([
            'name' => 'Electronics',
            'category_type_id' => 2,
        ]);

        Category::create([
            'name' => 'Clothes',
            'category_type_id' => 2,
        ]);

        Category::create([
            'name' => 'Underware',
            'category_type_id' => 2,
        ]);
    }
}
