<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __("Employee Management System") }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
         <link rel="icon" type="image/x-icon" href="storage/favicon.ico">

        <!-- Scripts and Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Basic inline styles for gradient background --}}
        <style>
            .gradient-bg {
                background-color: #282829; /* light gray fallback */
                background-image: linear-gradient(135deg, #4c4d4e 0%, #3d3e3f 100%); /* Light gray gradient */
            }
            .dark .dark\:gradient-bg-dark {
                background-color: #111827; /* dark gray fallback */
                background-image: linear-gradient(135deg, #1f2937 0%, #111827 100%); /* Darker gray gradient */
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        {{-- Apply gradient background here, REMOVE global text color --}}
        <div class="gradient-bg dark:gradient-bg-dark">
            {{-- Main Container --}}
            {{-- Removed text-black/80 dark:text-white/80 from this div --}}
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-red-500 selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-4xl bg-white rounded-md">

                    {{-- Header with Login/Register --}}
                    <header class="absolute top-0 left-0 right-0 pt-6 px-6 flex justify-end">
                        @if (Route::has('login'))
                            <nav class="flex flex-1 justify-end space-x-4">
                                @auth
                                    {{-- Text colors are handled by specific classes below --}}
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-gray-700 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-gray-300 dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    {{-- Text colors are handled by specific classes below --}}
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-gray-700 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-gray-300 dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        {{-- Text colors are handled by specific classes below --}}
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-gray-700 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-gray-300 dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    {{-- Main Content Area --}}
                    <main class="mt-6 text-center">
                        {{-- Logo --}}
                        <div class="flex justify-center mb-8">
                            {{-- Logo color is handled here --}}
                            <x-application-logo class="h-20 w-auto text-gray-700 dark:text-gray-300" />
                        </div>

                        {{-- Title --}}
                        {{-- Title color is handled here --}}
                        <h1 class="text-3xl font-semibold text-gray-800 dark:text-white sm:text-4xl">
                            Larave Base
                        </h1>

                        {{-- Subtitle/Description --}}
                        {{-- Subtitle color is handled here --}}
                        <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">
                            Streamline your HR processes and manage your workforce efficiently.
                        </p>

                        {{-- Call to Action Buttons (Visible if not logged in) --}}
                        @guest
                            <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                                {{-- Button text colors handled here --}}
                                <a href="{{ route('login') }}"
                                   class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:focus:ring-offset-gray-800">
                                    Get Started - Log In
                                </a>
                                @if (Route::has('register'))
                                {{-- Button text colors handled here --}}
                                <a href="{{ route('register') }}"
                                   class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md shadow-sm text-indigo-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:border-gray-600 dark:text-indigo-400 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-offset-gray-800">
                                    Register Account
                                </a>
                                @endif
                            </div>
                        @endguest

                        {{-- Link to Dashboard (Visible if logged in) --}}
                        @auth
                            <div class="mt-8">
                                {{-- Button text color handled here --}}
                                <a href="{{ url('/dashboard') }}"
                                   class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:focus:ring-offset-gray-800">
                                    Go to Dashboard
                                </a>
                            </div>
                        @endauth

                    </main>

                    {{-- Footer --}}
                    {{-- Footer text color handled here --}}
                    <footer class="py-10 text-center text-sm text-gray-500 dark:text-gray-400/60 mt-12">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                        <br>
                        &copy; {{ date('Y') }} K.P.Gayan Tharaka. All rights reserved.
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
