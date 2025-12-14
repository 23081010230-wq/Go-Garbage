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
    <aside class="w-64 bg-white border-r px-6 py-6 flex flex-col">
        <div class="mb-8">
            <h1 class="text-xl font-bold text-green-600">Go Garbage</h1>
            <p class="text-sm text-gray-500">Recycle & Earn</p>
        </div>

        <nav class="space-y-2">

            {{-- Dashboard --}}
            <a href="/"
               class="block px-3 py-2 rounded font-medium
               {{ request()->is('/') 
                    ? 'bg-green-50 text-green-700' 
                    : 'text-gray-600 hover:bg-gray-100' }}">
                Dashboard
            </a>

            {{-- Verify Drop-off --}}
            <a href="{{ route('dropoffs.index') }}"
               class="block px-3 py-2 rounded font-medium
               {{ request()->is('verify-dropoff') 
                    ? 'bg-green-50 text-green-700' 
                    : 'text-gray-600 hover:bg-gray-100' }}">
                Verify Drop-off
            </a>

            {{-- Rewards --}}
            <a href="{{ route('rewards.index') }}"
                class="block px-3 py-2 rounded
                {{ request()->is('rewards') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                Rewards
            </a>

            <a href="#"
               class="block px-3 py-2 text-gray-600 hover:bg-gray-100 rounded">
                Leaderboard
            </a>

            <a href="#"
               class="block px-3 py-2 text-gray-600 hover:bg-gray-100 rounded">
                Collection Centers
            </a>
        </nav>

        <div class="mt-10 p-4 bg-green-50 rounded">
            <p class="text-sm text-gray-600">Your Impact</p>
            <p class="text-2xl font-bold text-green-600">1,250</p>
            <p class="text-xs text-gray-500">Total Points</p>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">

        <!-- Top Bar (Breeze User Menu) -->
        <header class="bg-white border-b px-6 py-4 flex justify-end">
            @auth
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-600 hover:text-gray-800">
                                {{ Auth::user()->name }}
                                <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endauth
        </header>

        <!-- Page Content -->
        <main class="flex-1">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>
