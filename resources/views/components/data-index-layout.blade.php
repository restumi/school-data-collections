@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">{{ $title }}</h2>
            <a href="{{ $createRoute }}">
                <x-button color="blue">
                    <i class="fas fa-plus mr-1"></i> Add {{ $singular }}
                </x-button>
            </a>
        </div>

        @if(session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif

        @if(session('error'))
            <x-alert type="error" :message="session('error')" />
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-gray-50">
                    <tr>
                        {{ $thead ?? '' }}
                    </tr>
                </thead>
                <tbody>
                    {{ $slot }}
                </tbody>
            </table>
        </div>

        @if(isset($pagination))
            <div class="mt-4">
                {{ $pagination }}
            </div>
        @endif
    </div>
@endsection
