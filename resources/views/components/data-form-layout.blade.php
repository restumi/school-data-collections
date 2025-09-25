@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ $title }}</h2>

        <x-alert :errors="$errors" />

        <form method="POST" action="{{ $action }}" class="space-y-6">
            @csrf
            @if(isset($method))
                @method($method)
            @endif

            {{ $slot }}

            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ $backRoute }}">
                    <x-button color="red" type="button">
                        Cancel
                    </x-button>
                </a>
                <x-button type="submit" class="w-auto">
                    {{ $submitText }}
                </x-button>
            </div>
        </form>
    </div>
@endsection
