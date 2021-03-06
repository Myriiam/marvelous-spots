<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        <!-- Scripts -->
        <script src="{{ asset('js/app.min.js') }}" defer></script>
        <script src="{{ asset('js/navbar.min.js') }}" defer></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>
        <script src="{{ asset('js/read-message.min.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            <!-- Navigation -->
            @include('partials.navbar')
            @include('partials.flash-message')
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="w-full">
                    {{ $header }}
                </div>
            </header>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <!-- Footer -->
            @include('partials.footer')
        </div>
    </body>
</html>
