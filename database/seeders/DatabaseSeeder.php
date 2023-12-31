<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\SaleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ColorSeeder;
use Database\Seeders\PaymentSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\SaleItemSeeder;
use Database\Seeders\DeleteImageSeeder;
use Database\Seeders\CategoryTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CategoryTypeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(SaleItemSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(DeleteImageSeeder::class);
        $this->call(ColorSeeder::class);
    }
}
