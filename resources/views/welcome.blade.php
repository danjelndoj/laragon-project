<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WoodyCraft - Puzzles 3D en bois</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 antialiased">

    <!-- barre de navigation -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-amber-700">WoodyCraft</a>
            <div class="space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-sm font-semibold text-gray-700 hover:text-black">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-700 hover:text-black">Connexion</a>
                    <a href="{{ route('register') }}" class="text-sm font-semibold text-amber-700 hover:text-amber-800">Inscription</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12">
        <!-- grille des catégories -->
        <section>
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Nos catégories</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @forelse($categories as $categorie)
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 text-center hover:border-amber-600 transition">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $categorie->nom }}</h3>
                    </div>
                @empty
                    <p class="text-sm text-gray-500">Aucune catégorie disponible.</p>
                @endforelse
            </div>
        </section>

        <!-- section top ventes (7 derniers jours) -->
        <section>
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Top ventes (7 derniers jours)</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($topVentes as $produit)
                    <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-200 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-lg text-gray-900">{{ $produit->nom }}</h3>
                            <p class="text-sm text-gray-500 mt-2">{{ $produit->description }}</p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between">
                            <span class="text-xl font-bold text-amber-700">{{ number_format($produit->prix, 2, ',', ' ') }} €</span>
                            <a href="{{ route('commande.index') }}" class="px-3 py-1.5 bg-amber-700 text-white text-xs font-semibold rounded hover:bg-amber-800 transition">
                                Commander
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-500">Aucun produit mis en avant.</p>
                @endforelse
            </div>
        </section>
    </main>

</body>
</html>