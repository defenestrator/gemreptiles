<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- For IE 9 and below. ICO should be 32x32 pixels in size -->
        <!--[if IE]><link rel="shortcut icon" href="favicon.ico"><![endif]-->
        <!-- IE 10+ "Metro" Tiles - 144x144 pixels in size icon should be transparent -->
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="msapplication-TileImage" content="ms-favicon.png">
        <!-- Touch Icons - iOS and Android 2.1+ 152x152 pixels in size. -->
        <link rel="apple-touch-icon-precomposed" href="apple-touch-icon.png">

        <!-- Firefox, Chrome, Safari, IE 11+ and Opera. 96x96 pixels in size. -->
        <link rel="icon" href="favicon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fauna+One&family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>We're the wild-type :: {{ " " . config('app.name', 'Gem State Reptiles') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow font-serif">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="font-sans">
                @livewire('search-species')
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
