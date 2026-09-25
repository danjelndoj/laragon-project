<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puzzle;

class PuzzleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puzzles = Puzzle::all();  // "$puzzles"-> creation de la variable $puzzles |  "Puzzle::all()" -> appel de la méthode all() du modèle Puzzle qui hérite du modèle Model
        return view('puzzles.index', compact('puzzles'));  // "compact('puzzles'))" Envoi de la variable $puzzles à la vue index 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('puzzles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|max:100',
        'category' => 'required',
        'description' => 'required|max:500',
        'image' => 'required|image|max:2048',
        'price' => 'required|numeric|between:0,99.99',
    ]);

    $image = $request->file('image')->store('puzzles', 'public');

    $puzzle = new Puzzle();
    $puzzle->name = $data['name'];
    $puzzle->category = $data['category'];
    $puzzle->description = $data['description'];
    $puzzle->image = $image;
    $puzzle->price = $data['price'];
    $puzzle->save();

    return back()->with('message', 'Le puzzle a bien été créé !');
}




    /**
     * Display the specified resource.
     */
    public function show(Puzzle $puzzle)
    {
        return view('puzzles.show', compact('puzzle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puzzle $puzzle)
    {
        return view('puzzles.edit', compact('puzzle'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, Puzzle $puzzle)
{
    $data = $request->validate([
        'name' => 'required|max:100',
        'category' => 'required|max:100',
        'description' => 'required|max:500',
        'price' => 'required|numeric|between:0,99.99',
    ]);

    $puzzle->name = $request->name;
    $puzzle->category = $request->category;
    $puzzle->description = $request->description;
    $puzzle->price = $request->price;

    $puzzle->save();

    return back()->with('message', 'Le puzzle a bien été modifié !');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puzzle $puzzle)
    {
        $puzzle->delete();

    return redirect()
        ->route('puzzles.index')
        ->with('message', 'Le puzzle a bien été supprimé !');
}
    }
