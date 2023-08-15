<?php

namespace Database\Seeders;

use App\Models\CategoryType;
use Illuminate\Database\Seeder;

class CategoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryType::create([
            'name' => 'Gold',
        ]);

        CategoryType::create([
            'name' => 'Electronics',
        ]);

        CategoryType::create([
            'name' => 'Clothes',
        ]);

        CategoryType::create([
            'name' => 'Underware',
        ]);
    }
}
