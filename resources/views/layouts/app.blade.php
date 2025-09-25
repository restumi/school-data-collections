<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'School Data Collection')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">

        <!-- Header -->
        <header class="bg-blue-600 text-white p-4 shadow-md">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-xl font-bold">
                    <a href="{{ route('dashboard') }}">
                        @if (Request::is('dashboard'))
                            School Data Collection
                        @else
                            Dashboard
                        @endif
                    </a>
                </h1>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <x-button type="submit" color="red" class="!bg-red-500 hover:!bg-red-600">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </x-button>
                </form>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow container mx-auto p-6">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t py-4">
            <div class="container mx-auto text-center text-gray-500 text-sm">
                &copy; 2025 School Data Collection. All rights reserved.
            </div>
        </footer>

    </div>
</body>
</html>
