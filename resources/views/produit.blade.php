<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $produit->nom }} - WoodyCraft</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 antialiased">
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-amber-700">WoodyCraft</a>
            <a href="{{ route('categories.show', $categorie->id) }}" class="text-sm font-semibold text-gray-700 hover:text-black">← retour à la catégorie</a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-10">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden grid grid-cols-1 md:grid-cols-2 gap-8 p-8">
            
            <!-- galerie photos -->
            <div class="space-y-4">
                <div class="h-80 bg-amber-100 rounded-lg flex items-center justify-center text-amber-900 font-bold text-lg border border-amber-200">
                    photo principale du puzzle 3d
                </div>
                <div class="grid grid-cols-3 gap-3">
                    <div class="h-24 bg-amber-50 rounded border flex items-center justify-center text-xs text-amber-800 font-medium">angle 1</div>
                    <div class="h-24 bg-amber-50 rounded border flex items-center justify-center text-xs text-amber-800 font-medium">angle 2</div>
                    <div class="h-24 bg-amber-50 rounded border flex items-center justify-center text-xs text-amber-800 font-medium">détails pièces</div>
                </div>
            </div>

            <!-- descriptif et bouton d'action -->
            <div class="flex flex-col justify-between">
                <div>
                    <span class="text-xs uppercase font-bold tracking-wider text-amber-700 bg-amber-100 px-2 py-1 rounded">
                        {{ $categorie->nom }}
                    </span>
                    <h1 class="text-3xl font-extrabold text-gray-900 mt-3">{{ $produit->nom }}</h1>
                    <p class="text-3xl font-bold text-amber-700 mt-4">{{ number_format($produit->prix, 2, ',', ' ') }} €</p>

                    <div class="mt-6 border-t pt-4">
                        <h2 class="text-sm font-semibold text-gray-900 uppercase tracking-wide">description du produit</h2>
                        <p class="mt-2 text-gray-600 leading-relaxed">{{ $produit->description }}</p>
                    </div>

                    <div class="mt-4 text-xs text-gray-500 space-y-1">
                        <p>✔ bois certifié éco-responsable découpé au laser</p>
                        <p>✔ temps d'assemblage estimé : 2 à 4 heures</p>
                        <p>✔ notice de montage détaillée incluse</p>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('commande.index') }}" class="w-full inline-block text-center px-6 py-3 bg-amber-700 hover:bg-amber-800 text-white font-bold rounded-md shadow transition">
                        ajouter au panier & commander
                    </a>
                </div>
            </div>

        </div>
    </main>
</body>
</html>