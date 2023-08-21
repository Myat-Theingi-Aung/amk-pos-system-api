<?php

namespace Database\Seeders;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::create([
            'user_id' => 1,
            'category_type_id' => 1,
            'amount' => 2000,
            'date' => Carbon::today()
        ]);

        Payment::create([
            'user_id' => 2,
            'category_type_id' => 1,
            'amount' => 3000,
            'date' => Carbon::today()
        ]);

        Payment::create([
            'user_id' => 3,
            'category_type_id' => 2,
            'amount' => 2000,
            'date' => Carbon::today()
        ]);
    }
}
