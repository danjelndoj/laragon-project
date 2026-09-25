<x-puzzles-card>

    <h3 class="font-semibold text-xl text-gray-800">
        {{ __('Name') }}
    </h3>
    <p>{{ $puzzle->name }}</p>

    <h3 class="font-semibold text-xl text-gray-800 pt-2">
        {{ __('Category') }}
    </h3>
    <p>{{ $puzzle->category }}</p>

    <h3 class="font-semibold text-xl text-gray-800 pt-2">
        {{ __('Description') }}
    </h3>
    <p>{{ $puzzle->description }}</p>

    <h3 class="font-semibold text-xl text-gray-800 pt-2">
        {{ __('Price') }}
    </h3>
    <p>{{ $puzzle->price }} €</p>

    <h3 class="font-semibold text-xl text-gray-800 pt-2">
        {{ __('Image') }}
    </h3>

    <img
        src="{{ asset('storage/' . $puzzle->image) }}"
        alt="{{ $puzzle->name }}"
        class="w-64 h-64 object-cover rounded"
    >

    <h3 class="font-semibold text-xl text-gray-800 pt-2">
        {{ __('Date creation') }}
    </h3>
    <p>{{ $puzzle->created_at->format('d/m/Y') }}</p>

    @if ($puzzle->created_at != $puzzle->updated_at)
        <h3 class="font-semibold text-xl text-gray-800 pt-2">
            {{ __('Last update') }}
        </h3>
        <p>{{ $puzzle->updated_at->format('d/m/Y') }}</p>
    @endif

</x-puzzles-card>
