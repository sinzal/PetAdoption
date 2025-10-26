<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pet Adoption</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['public/css/app.css', 'public/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="w-full mx-auto p-6 lg:p-8">
                <!-- Hero Section -->
                <div class="text-center py-16 px-4">
                    <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 dark:text-white">Find Your New Best Friend</h1>
                    <p class="mt-4 max-w-2xl mx-auto text-lg md:text-xl text-gray-500 dark:text-gray-400">Browse our available pets and find the perfect companion.</p>
                    <a href="{{ route('pets.index') }}" class="mt-8 inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg text-lg transition-transform transform hover:scale-105">
                        Browse Pets
                    </a>
                </div>

                <!-- Animal Categories -->
                <div class="mt-12 container mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                        <!-- Dogs -->
                        <div>
                            <a href="{{ route('pets.index', ['animal' => 'dog']) }}">
                                <img src="https://placehold.co/300x300?text=Dogs" class="w-48 h-48 md:w-64 md:h-64 mx-auto rounded-full shadow-lg transform hover:scale-105 transition-transform duration-300" alt="Dogs">
                            </a>
                        </div>
                        <!-- Cats -->
                        <div>
                            <a href="{{ route('pets.index', ['animal' => 'cat']) }}">
                                <img src="https://placehold.co/300x300?text=Cats" class="w-48 h-48 md:w-64 md:h-64 mx-auto rounded-full shadow-lg transform hover:scale-105 transition-transform duration-300" alt="Cats">
                            </a>
                        </div>
                        <!-- Rabbits -->
                        <div>
                            <a href="{{ route('pets.index', ['animal' => 'rabbit']) }}">
                                <img src="https://placehold.co/300x300?text=Rabbits" class="w-48 h-48 md:w-64 md:h-64 mx-auto rounded-full shadow-lg transform hover:scale-105 transition-transform duration-300" alt="Rabbits">
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                        <div class="flex items-center gap-4">
                             &copy; 2023 Pet Adoption. All Rights Reserved.
                        </div>
                    </div>
                    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
