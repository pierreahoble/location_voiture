<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Caracteristique;

class CaracteristiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Caracteristique::factory()
            ->count(5)
            ->create();
    }
}
