@props(['color' => 'blue'])

@php
    $Colors = [
        'blue' => 'bg-blue-600 hover:bg-blue-700 active:bg-blue-900 ring-blue-300',
        'red' => 'bg-red-600 hover:bg-red-700 active:bg-red-900 ring-red-300',
        'green' => 'bg-green-600 hover:bg-green-700 active:bg-green-900 ring-green-300',
        'yellow' => 'bg-yellow-600 hover:bg-yellow-700 active:bg-yellow-900 ring-yellow-300'
    ];
@endphp

<button {{ $attributes->merge(['class' => 'inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md font-semibold text-white tracking-widest disabled:opacity-25 transition ease-in-out focus:outline-none duration-150 focus:ring ' . ($Colors[$color] ?? $Colors['blue'])]) }}>
    {{ $slot }}
</button>
