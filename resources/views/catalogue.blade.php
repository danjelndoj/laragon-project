<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $categorie->nom }} - WoodyCraft</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 antialiased">
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-amber-700">WoodyCraft</a>
            <a href="/" class="text-sm font-semibold text-gray-700 hover:text-black">← retour à l'accueil</a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">catégorie : {{ $categorie->nom }}</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($produits as $produit)
                <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-200 flex flex-col justify-between">
                    <div>
                        <div class="h-44 bg-amber-50 rounded-md flex items-center justify-center text-amber-800 font-bold mb-4">
                            visuel puzzle 3d
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">{{ $produit->nom }}</h2>
                        <p class="text-sm text-gray-600 mt-2">{{ $produit->description }}</p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-xl font-bold text-amber-700">{{ number_format($produit->prix, 2, ',', ' ') }} €</span>
                        <a href="{{ route('produits.show', $produit->id) }}" class="px-3 py-1.5 bg-gray-900 text-white text-xs font-semibold rounded hover:bg-gray-700 transition">
                            voir la fiche
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">aucun puzzle disponible dans cette catégorie.</p>
            @endforelse
        </div>
    </main>
</body>
</html>