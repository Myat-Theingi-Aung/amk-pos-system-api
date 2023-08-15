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
            'name' => 'နားကပ်',
            'category_type_id' => 1
        ]);

        Category::create([
            'name' => 'နားကွင်း',
            'category_type_id' => 1
        ]);

        Category::create([
            'name' => '‌‌‌ဗောက်သီး‌',
            'category_type_id' => 1
        ]);

        Category::create([
            'name' => '‌‌‌လက်စွပ်',
            'category_type_id' => 1
        ]);

        Category::create([
            'name' => 'ဒယ်နီ',
            'category_type_id' => 2
        ]);

        Category::create([
            'name' => 'ပေါင်းအိုး',
            'category_type_id' => 2
        ]);

        Category::create([
            'name' => 'မီးပူ',
            'category_type_id' => 2
        ]);

        Category::create([
            'name' => 'ပန်ကာ',
            'category_type_id' => 2
        ]);

        Category::create([
            'name' => 'အင်္ကျီ',
            'category_type_id' => 3
        ]);

        Category::create([
            'name' => 'ထဘီ',
            'category_type_id' => 3
        ]);

        Category::create([
            'name' => 'စပန့်ဝမ်းဆက်',
            'category_type_id' => 3
        ]);

        Category::create([
            'name' => 'bra',
            'category_type_id' => 4
        ]);

        Category::create([
            'name' => 'အောက်ခံဘောင်းဘီ',
            'category_type_id' => 4
        ]);
    }
}
