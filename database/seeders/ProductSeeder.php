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
            'quantity' => 5,
        ]);

        Product::create([
            'name' => 'ဒယ်နီ',
            'category_id' => 2,
            'price' => 40000,
            'quantity' => 2,
        ]);

        Product::create([
            'name' => 'ဗီရို',
            'category_id' => 5,
            'price' => 260000,
            'quantity' => 2,
        ]);
    }
}
