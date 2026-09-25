@props(['disabled' => false])

<textarea
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
    ]) !!}
>{{ $slot }}</textarea>


<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
    {{ $slot }}
</div>