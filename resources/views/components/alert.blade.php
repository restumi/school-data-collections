@props([
    'type' => 'info',
    'message' => ''
])

@php
    $baseClasses = "px-4 py-3 rounded mb-4 border";

    $types = [
        'success' => 'bg-green-100 border-green-400 text-green-700',
        'error' => 'bg-red-100 border-red-400 text-red-700',
        'warning' => 'bg-yellow-100 border-yellow-400 text-yellow-700',
        'info' => 'bg-blue-100 border-blue-400 text-blue-700'
    ];
@endphp

@if ($message)
    <div class="{{ $baseClasses }} {{ $types[$type] ?? $types['info'] }}">
        {{ $message }}
    </div>
@endif
