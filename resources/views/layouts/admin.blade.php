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
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js'])
        <script src="https://kit.fontawesome.com/9f05e44f8a.js" crossorigin="anonymous"></script>
        
        <script src="{{ asset('js/script.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="h-screen flex flex-col justify-between">
            
            <x-admin.header />

            <!-- Page Content -->
            <main class="flex-grow flex">
                <x-admin.aside />
                <div class="flex-grow m-4">
                    {{ $slot }}
                </div>
            </main>
        </div>
        {{-- <script type="text/javascript" src="{{ URL::asset ('js/admin.js') }}"></script> --}}
    </body>
</html>
