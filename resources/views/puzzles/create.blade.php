<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a puzzle') }}
        </h2>
    </x-slot>

    <x-puzzles-card>

        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('puzzles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    :value="old('name')"
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

                <x-text-input
                    id="category"
                    class="block mt-1 w-full"
                    type="text"
                    name="category"
                    :value="old('category')"
                    required
                />

                <x-input-error
                    :messages="$errors->get('category')"
                    class="mt-2"
                />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />

                <x-text-input
                    id="description"
                    class="block mt-1 w-full"
                    type="text"
                    name="description"
                    :value="old('description')"
                    required
                />

                <x-input-error
                    :messages="$errors->get('description')"
                    class="mt-2"
                />
            </div>

            <!-- Image -->
            <div class="mt-4">
                <x-input-label for="image" :value="__('Image')" />

                <x-text-input
                    id="image"
                    class="block mt-1 w-full"
                    type="file"
                    name="image"
                    :value="old('image')"
                    required
                />

                <x-input-error
                    :messages="$errors->get('image')"
                    class="mt-2"
                />
            </div>

            <!-- Price -->
            <div class="mt-4">
                <x-input-label for="price" :value="__('Price')" />

                <x-text-input
                    id="price"
                    class="block mt-1 w-full"
                    type="text"
                    name="price"
                    :value="old('price')"
                    required
                />

                <x-input-error
                    :messages="$errors->get('price')"
                    class="mt-2"
                />
            </div>

            <!-- Bouton -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Create') }}
                </x-primary-button>
            </div>

        </form>

    </x-puzzles-card>

</x-app-layout>