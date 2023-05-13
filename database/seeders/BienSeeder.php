<?php

namespace Database\Seeders;

use App\Models\Bien;
use Illuminate\Database\Seeder;

class BienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bien::factory()
            ->count(5)
            ->create();
    }
}
