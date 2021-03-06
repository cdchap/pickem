<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ url(mix('js/app.js')) }}" defer></script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.2/dist/alpine.min.js" defer></script>
    </head>
    <body class="bg-gradient-four">
        <x-login-menu />
        <div class="flex flex-col min-h-screen font-mono">
            @yield('content')
            {{ $slot }}
        </div>
        <div class=" h-48 mt-20">
            <footer>
                <div class="py-10 px-8 text-cool-gray-700">
                    <div class="w-48">
                        <x-wordmark />
                    </div>
                    
                </div>
            </footer>
        </div>
        @livewireScripts
    </body>
</html>