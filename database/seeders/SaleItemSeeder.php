<?php

namespace Database\Seeders;

use App\Models\SaleItem;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SaleItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SaleItem::create([
            'sale_id' => 1,
            'product_id' => 1,
            'quantity' => 1,
            'price' => 200000,
            'payment_start_period' => Carbon::today(),
            'payment_end_period' => Carbon::today()->addMonth(),
        ]);

        SaleItem::create([
            'sale_id' => 1,
            'product_id' => 2,
            'quantity' => 1,
            'price' => 40000,
            'payment_start_period' => Carbon::today(),
            'payment_end_period' => Carbon::today()->addMonth(),
        ]);

        SaleItem::create([
            'sale_id' => 2,
            'product_id' => 2,
            'quantity' => 1,
            'price' => 260000,
            'payment_start_period' => Carbon::today(),
            'payment_end_period' => Carbon::today()->addMonth(),
        ]);

        SaleItem::create([
            'sale_id' => 3,
            'product_id' => 2,
            'quantity' => 1,
            'price' => 40000,
            'payment_start_period' => Carbon::today(),
            'payment_end_period' => Carbon::today()->addMonth(),
        ]);

        SaleItem::create([
            'sale_id' => 3,
            'product_id' => 3,
            'quantity' => 1,
            'price' => 260000,
            'payment_start_period' => Carbon::today(),
            'payment_end_period' => Carbon::today()->addMonth(),
        ]);
    }
}
