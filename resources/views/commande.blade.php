<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            adresse de livraison
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm sm:rounded-lg max-w-xl">
            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">adresse complète</label>
                    <input type="text" name="adresse" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">code postal</label>
                        <input type="text" name="code_postal" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">ville</label>
                        <input type="text" name="ville" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                </div>

                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    confirmer la livraison
                </button>
            </form>
        </div>
    </div>
</x-app-layout>