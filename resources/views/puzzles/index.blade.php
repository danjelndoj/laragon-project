<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Puzzle list') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">

        <table class="w-full text-center border-collapse">

            <thead>
                <tr class="border-b">
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Image</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($puzzles as $puzzle)  //variable prise en entree -> $puzzles|  "@foreach" -> parcourir mon tableau $puzzles ligne par ligne 
                                                /*Création du tableau ligne par ligne */ 
                    <tr class="border-b">

                        <td class="px-6 py-4">
                            {{ $puzzle->id }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $puzzle->name }}
                        </td>

                        <td class="px-6 py-4">
                            <img
                                src="{{ asset('storage/' . $puzzle->image) }}"
                                alt="{{ $puzzle->name }}"
                                class="w-16 h-16 object-cover rounded mx-auto"
                            >
                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center items-center gap-6">

                                <a href="{{ route('puzzles.show', $puzzle->id) }}">
                                    Show
                                </a>

                                <a href="{{ route('puzzles.edit', $puzzle->id) }}">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('puzzles.destroy', $puzzle->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit">
                                        Delete
                                    </button>
                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</x-app-layout>
