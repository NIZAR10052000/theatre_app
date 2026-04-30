<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    //On crée TON compte Administrateur pour le théâtre
    \App\Models\User::factory()->create([
        'name' => 'Admin Théâtre',
        'email' => 'admin@theatre.fr',
        'password' => bcrypt('password'), // Le mot de passe sera "password"
        'role' => 'admin',
        'is_verified' => true,
    ]);

    //On crée 10 faux utilisateurs (spectateurs)
    \App\Models\User::factory(10)->create([
        'role' => 'client',
    ]);

    //On crée 10 fausses pièces de théâtre
    \App\Models\Event::factory(10)->create();
}
}
