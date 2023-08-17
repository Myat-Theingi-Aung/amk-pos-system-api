<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'နားကွင်း',
            'category_id' => 1,
            'price' => 200000,
            'quantity' => 2,
        ]);
    }
}
