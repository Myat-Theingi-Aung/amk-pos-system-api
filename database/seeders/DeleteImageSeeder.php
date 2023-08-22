<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DeleteImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $directory = 'public/images';

        $files = Storage::files($directory);

        foreach ($files as $file) {
            Storage::delete($file);
            $this->command->info("Deleted: $file");
        }
    }
}
