<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Sale;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sale::create([
            'user_id' => 1,
            'total' => 240000,
            'start_date' => Carbon::today(),
        ]);

        Sale::create([
            'user_id' => 2,
            'total' => 260000,
            'start_date' => Carbon::today(),
        ]);

        Sale::create([
            'user_id' => 3,
            'total' => 300000,
            'start_date' => Carbon::today(),
        ]);
    }
}
