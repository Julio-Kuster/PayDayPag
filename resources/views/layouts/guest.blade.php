<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="flex flex-col items-center">
                <a href="/" class="flex items-center gap-3">
                    <svg viewBox="0 0 512 320" xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 fill-current text-gray-500">
                        <rect x="16" y="16" width="480" height="288" rx="12" fill="none" stroke="currentColor" stroke-width="16"/>
                        <rect x="16" y="16" width="480" height="72" rx="12" fill="currentColor" opacity="0.2"/>
                        <rect x="48" y="120" width="64" height="48" rx="4" fill="currentColor" opacity="0.4"/>
                        <rect x="56" y="128" width="48" height="32" rx="2" fill="currentColor" opacity="0.7"/>
                        <rect x="160" y="130" width="96" height="6" rx="3" fill="currentColor" opacity="0.7"/>
                        <rect x="160" y="150" width="64" height="6" rx="3" fill="currentColor" opacity="0.7"/>
                        <circle cx="400" cy="144" r="32" fill="none" stroke="currentColor" stroke-width="8" opacity="0.6"/>
                        <path d="M385 144 L395 154 L415 130" stroke="currentColor" stroke-width="8" stroke-linecap="round" stroke-linejoin="round" fill="none" opacity="0.8"/>
                        <path d="M400 220 Q420 200 440 220 T480 220" stroke="currentColor" stroke-width="8" fill="none" stroke-linecap="round" opacity="0.5"/>
                    </svg>
                    <span class="font-bold text-2xl text-gray-600">PayDayPag</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
