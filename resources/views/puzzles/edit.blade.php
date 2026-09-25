<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Éditer un puzzle') }}
        </h2>
    </x-slot>

    <x-puzzles-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('puzzles.update', $puzzle->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    :value="old('name', $puzzle->name)"
                    required
                    autofocus
                />

                <x-input-error
                    :messages="$errors->get('name')"
                    class="mt-2"
                />
            </div>

            <!-- Category -->
            <div class="mt-4">
                <x-input-label for="category" :value="__('Category')" />

                <textarea
                    id="category"
                    name="category"
                    class="block mt-1 w-full"
                    rows="3"
                >{{ old('category', $puzzle->category) }}</textarea>

                <x-input-error
                    :messages="$errors->get('category')"
                    class="mt-2"
                />
            </div>

        <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />

                <textarea
                    id="description"
                    name="description"
                    class="block mt-1 w-full"
                    rows="3"
                >{{ old('description', $puzzle->description) }}</textarea>

                <x-input-error
                    :messages="$errors->get('description')"
                    class="mt-2"
                />
            </div>

<!-- Image -->
            <div class="mt-4">
                <x-input-label for="image" :value="__('Image')" />

                <textarea
                    id="image"
                    name="image"
                    class="block mt-1 w-full"
                    rows="3"
                >{{ old('image', $puzzle->image) }}</textarea>

                <x-input-error
                    :messages="$errors->get('image')"
                    class="mt-2"
                />
            </div>

<!-- Price -->
            <div class="mt-4">
                <x-input-label for="price" :value="__('Price')" />

                <textarea
                    id="price"
                    name="price"
                    class="block mt-1 w-full"
                    rows="3"
                >{{ old('price', $puzzle->price) }}</textarea>

                <x-input-error
                    :messages="$errors->get('price')"
                    class="mt-2"
                />
            </div>


            <!-- Bouton -->
            <div class="mt-4">
                <x-primary-button>
                    {{ __('Enregistrer') }}
                </x-primary-button>
            </div>
        </form>
    </x-puzzles-card>
</x-app-layout> 
