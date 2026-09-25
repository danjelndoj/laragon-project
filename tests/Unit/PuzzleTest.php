<?php

namespace Tests\Unit;

use App\Models\Puzzle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class PuzzleTest extends TestCase
{
    use RefreshDatabase;

    public function test_puzzle_can_be_created()
    {
        $puzzle = Puzzle::factory()->create([
            'nom' => 'Test Puzzle',
            'categorie' => 'Test Categorie',
            'description' => 'Ceci est un puzzle de test.',
            'prix' => 9.99,
            'image' => 'test_image.png', // Ajouter le champ image
        ]);

        $this->assertDatabaseHas('puzzles', [
            'nom' => 'Test Puzzle',
        ]);
    }

    public function test_puzzle_creation_fails_with_missing_data()
    {
        $this->expectException(ValidationException::class);

        $puzzleData = [
            'nom' => '',
            'categorie' => '',
            'description' => '',
            'prix' => '',
            'image' => '', // Ajouter le champ image
        ];

        // Valider les donnees manuellement
        $validator = Validator::make($puzzleData, [
            'nom' => 'required',
            'categorie' => 'required',
            'description' => 'required',
            'prix' => 'required|numeric',
            'image' => 'required',
        ]);

        $validator->validate();

        Puzzle::create($puzzleData);
    }

    public function test_puzzle_creation_fails_with_invalid_data()
    {
        $this->expectException(ValidationException::class);

        $puzzleData = [
            'nom' => str_repeat('A', 256), // Nom trop long
            'categorie' => 'Test Categorie',
            'description' => 'Ceci est un puzzle de test.',
            'prix' => -5.99, // Prix negatif
            'image' => 'test_image.png', // Ajouter le champ image
        ];

        // Valider les donnees manuellement
        $validator = Validator::make($puzzleData, [
            'nom' => 'required|max:255',
            'categorie' => 'required',
            'description' => 'required',
            'prix' => 'required|numeric|min:0',
            'image' => 'required',
        ]);

        $validator->validate();

        Puzzle::create($puzzleData);
    }

    public function test_puzzle_creation_fails_with_duplicate_data()
    {
        $puzzleData = [
            'nom' => 'Unique Puzzle',
            'categorie' => 'Test Categorie',
            'description' => 'Ceci est un puzzle de test.',
            'prix' => 9.99,
            'image' => 'test_image.png', // Ajouter le champ image
        ];

        Puzzle::create($puzzleData);

        $this->expectException(ValidationException::class);

        // Valider les donnees manuellement avec la regle d’unicite
        $validator = Validator::make($puzzleData, [
            'name' => 'required|unique:puzzles,nom',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'required',
        ]);

        $validator->validate();

        Puzzle::create($puzzleData); // Creation avec le meme nom unique
    }
    public function test_puzzle_can_be_read()
    {
        $puzzle = Puzzle::factory()->create([
            'nom' => 'Test Puzzle',
            'categorie' => 'Test Categorie',
            'description' => 'Ceci est un puzzle de test.',
            'prix' => 9.99, 
            
        ]);

        $foundPuzzle = Puzzle::find($puzzle->id);

        $this->assertNotNull($foundPuzzle);
        $this->assertEquals('Test Puzzle', $foundPuzzle->nom);
    }
    public function test_puzzle_can_be_updated()
    {
        $puzzle = Puzzle::factory()->create([
            'nom' => 'Test Puzzle',
            'categorie' => 'Test Categorie',
            'description' => 'Ceci est un puzzle de test.',
            'prix' => 9.99,
            'image' => 'test_image.png', // Ajouter le champ image
        ]);

        $puzzle->update([
            'nom' => 'Updated Puzzle',
            'categorie' => 'Updated Categorie',
            'description' => 'Ceci est un puzzle mis à jour.',
            'prix' => 19.99,
            'image' => 'updated_image.png', // Mettre à jour le champ image
        ]);

        $this->assertDatabaseHas('puzzles', [
            'id' => $puzzle->id,
            'nom' => 'Updated Puzzle',
        ]);
    }
    
    public function test_puzzle_can_be_deleted()
    {
        $puzzle = Puzzle::factory()->create();
        $puzzleId = $puzzle->id;
        $puzzle->delete();

        $this->assertDatabaseMissing('puzzles', ['id' => $puzzleId]);
    }
}