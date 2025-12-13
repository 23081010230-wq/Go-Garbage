<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Go Garbage</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r px-6 py-6">
        <div class="mb-8">
            <h1 class="text-xl font-bold text-green-600">Go Garbage</h1>
            <p class="text-sm text-gray-500">Recycle & Earn</p>
        </div>

        <nav class="space-y-2">
            <a href="#" class="block px-3 py-2 rounded bg-green-50 text-green-700 font-medium">Dashboard</a>
            <a href="#" class="block px-3 py-2 text-gray-600 hover:bg-gray-100 rounded">Verify Drop-off</a>
            <a href="#" class="block px-3 py-2 text-gray-600 hover:bg-gray-100 rounded">Rewards</a>
            <a href="#" class="block px-3 py-2 text-gray-600 hover:bg-gray-100 rounded">Leaderboard</a>
            <a href="#" class="block px-3 py-2 text-gray-600 hover:bg-gray-100 rounded">Collection Centers</a>
        </nav>

        <div class="mt-10 p-4 bg-green-50 rounded">
            <p class="text-sm text-gray-600">Your Impact</p>
            <p class="text-2xl font-bold text-green-600">1,250</p>
            <p class="text-xs text-gray-500">Total Points</p>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>

</div>

</body>
</html>
