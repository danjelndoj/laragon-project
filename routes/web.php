<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// page d'accueil publique
Route::get('/', function () {
    return view('welcome');
});

// tableau de bord par défaut (breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// gestion du profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 1. forcer la connexion avant commande (auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/commande', function () {
        return 'page de commande';
    })->name('commande.index');
});

// 2. restreindre l'accès à l'administration (auth + admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'tableau de bord administrateur';
    })->name('admin.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/commande', function () {
        return view('commande');
    })->name('commande.index');
});

Route::get('/', function () {
    $categories = DB::table('categories')->get();
    $topVentes = DB::table('produits')->take(4)->get();

    return view('welcome', compact('categories', 'topVentes'));
});

require __DIR__.'/auth.php';