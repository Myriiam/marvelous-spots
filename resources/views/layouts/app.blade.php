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
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/navbar.js') }}" defer></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>
        <script src="{{ asset('js/modal-contact.js') }}" defer></script>
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Navigation -->
            @include('partials.navbar')
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
