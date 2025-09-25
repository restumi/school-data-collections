<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-blue-600 text-white p-4 shadow-md">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-xl font-bold">School Data Collection</h1>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <x-button type="submit" color="red">LogOut</x-button>
                </form>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow container mx-auto p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('kelas.index') }}" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold text-gray-800">Manage Kelas</h2>
                    <p class="text-gray-600">CRUD Kelas</p>
                </a>
                <a href="{{ route('students.index') }}" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold text-gray-800">Manage Strudents</h2>
                    <p class="text-gray-600">CRUD Students</p>
                </a>
                <a href="{{ route('teachers.index') }}" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold text-gray-800">Manage Teachers</h2>
                    <p class="text-gray-600">CRUD Teacher</p>
                </a>
            </div>
        </main>
    </div>
</body>
</html>
