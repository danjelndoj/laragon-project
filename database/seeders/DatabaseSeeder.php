<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Rôles (avec 'nom')
        DB::table('roles')->updateOrInsert(['id' => 1], ['nom' => 'admin']);
        DB::table('roles')->updateOrInsert(['id' => 2], ['nom' => 'client']);

        // 2. Compte administrateur
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@woodycraft.fr'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role_id' => 1,
            ]
        );

        // 3. Catégories
        DB::table('categories')->updateOrInsert(['id' => 1], ['nom' => 'Véhicules']);
        DB::table('categories')->updateOrInsert(['id' => 2], ['nom' => 'Animaux']);
        DB::table('categories')->updateOrInsert(['id' => 3], ['nom' => 'Monuments']);

        // 4. Produits
        DB::table('produits')->delete();
        DB::table('produits')->insert([
            ['categorie_id' => 1, 'nom' => 'Locomotive à vapeur', 'description' => 'Puzzle mécanique.', 'prix' => 39.90],
            ['categorie_id' => 1, 'nom' => 'Voiture rétro', 'description' => 'Maquette en bois.', 'prix' => 24.50],
            ['categorie_id' => 2, 'nom' => 'Loup', 'description' => 'Sculpture 3D.', 'prix' => 19.99],
            ['categorie_id' => 3, 'nom' => 'Tour Eiffel', 'description' => 'Reproduction en bois.', 'prix' => 29.00],
        ]);
    }
}