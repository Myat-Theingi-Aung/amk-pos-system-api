<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'phone' => '09-987654321',
            'address' => 'Pyay',
            'NRC' => '7/PAMANA(N)123456',
            'type' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'color' => 'blue',
            'boyfriend' => 'yes'
        ]);

        User::factory()->create([
            'name' => 'Ma Ma',
            'phone' => '09-981234567',
            'address' => 'Pyay',
            'NRC' => '7/PAMANA(N)9876543',
            'type' => 'admin',
            'email' => 'mama@admin.com',
            'password' => bcrypt('password'),
            'color' => 'blue',
            'boyfriend' => 'yes'
        ]);

        User::factory()->create([
            'name' => 'Thae Thae',
            'phone' => '09-987876543',
            'address' => 'Pyay',
            'NRC' => '7/PAMANA(N)345678',
            'type' => 'admin',
            'email' => 'thaethae@admin.com',
            'password' => bcrypt('password'),
            'color' => 'blue',
            'boyfriend' => 'yes'
        ]);
    }
}
