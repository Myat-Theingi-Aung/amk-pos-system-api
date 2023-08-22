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
            'role' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'color' => 'blue',
            'food' => 'bubble tea'
        ]);

        User::factory()->create([
            'name' => 'Ma Ma',
            'phone' => '09-981234567',
            'address' => 'Pyay',
            'NRC' => '7/PAMANA(N)9876543',
            'role' => 'admin',
            'email' => 'mama@admin.com',
            'password' => bcrypt('password'),
            'color' => 'blue',
            'food' => 'colar'
        ]);

        User::factory()->create([
            'name' => 'Thae Thae',
            'phone' => '09-987876543',
            'address' => 'Pyay',
            'NRC' => '7/PAMANA(N)345678',
            'role' => 'admin',
            'email' => 'thaethae@admin.com',
            'password' => bcrypt('password'),
            'color' => 'blue',
            'food' => 'pizza'
        ]);
    }
}
