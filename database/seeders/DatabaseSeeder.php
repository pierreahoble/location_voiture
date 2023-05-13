<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(BienSeeder::class);
        $this->call(CaracteristiqueSeeder::class);
        $this->call(CommentaireSeeder::class);
        $this->call(MarqueSeeder::class);
        $this->call(MediaSeeder::class);
        $this->call(ModeleSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(UserSeeder::class);
    }
}
