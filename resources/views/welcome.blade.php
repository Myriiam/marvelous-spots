<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Marvelous Spots</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/navbar.js') }}" defer></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>
        <script src="{{ asset('js/swiper.js') }}" defer></script>

    </head>
    <body class="antialiased">
        <!-- Navigation -->
        @include('partials.navbar')
        <!-- Page Heading -->
        <header>
        </header>
        <!-- Page Content -->
        <main>
            <div class="swiper-container w-50">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">Slide 1</div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>
                    ...
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>
            <div>
                <ul>
                    @foreach ($users as $user)
                        <li><a href="{{ route('profile', $user->id) }}">{{ $user->firstname }}</a></li>
                    @endforeach
                </ul>
            </div>
        </main>
        <!-- Footer -->
        @include('partials.footer')
    </body>
</html>
