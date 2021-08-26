<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Marvelous Spots</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- CDN -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/navbar.js') }}" defer></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>
        <script src="{{ asset('js/swiper.js') }}" defer></script>
        <script src="{{ asset('js/swiper.js') }}" defer></script>
        <script src="{{ asset('js/latest-articles.js') }}" defer></script>
        <script src="{{ asset('js/latest-bookings-guides.js') }}" defer></script>

    </head>
    <body class="antialiased">
        <!-- Navigation -->
        @include('partials.navbar')
        <!-- Page Heading -->
        <header>
            <div>
                <div class="relative"><img src="{{ asset('images/header-home.jpg') }}" class="w-100"></div>
                <div class="text-center">
                    <form action="{{ route('all_in_city') }}" method="GET">
                        @csrf
                        <input name="search-input" type="text" class="rounded-md bg-gray-lighter" placeholder="Enter a city name...">
                        <button type="submit" value="guides" name="btnSearch" class="border-2">guides</button>
                        <button type="submit" value="articles" name="btnSearch" class="border-2">articles</button>
                    </form>
                </div>
            </div>
        </header>
        <!-- Page Content -->
        <main class="overflow-x-hidden">
            @include('partials.flash-message')
            
            <!-- articles -->
            <div>
                <h1 class="text-gray-dark font-extrabold text-6xl text-center mt-16 mb-10">Latest Posts</h1>
            </div>
            <div class="swiper-container slider1 w-50">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper" id="slider">
                    <!-- Slides -->
                    <!--<div class="swiper-slide">Slide 1</div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>-->
                    
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>
            <!-- Info concept -->
            <div>
                <h1 class="text-gray-dark font-extrabold text-6xl text-center mt-16 mb-10">The Concept</h1>
            </div>
            <!-- list of users -->
            <div>
                <ul>
                    @foreach ($users as $user)
                        <li><a href="{{ route('profile', $user->id) }}">{{ $user->firstname }}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- guides -->
            <div>
                <h1 class="text-gray-dark font-extrabold text-6xl text-center mt-16 mb-10">Latest Visits</h1>
            </div>
            <div class="swiper-container slider2 w-50 mb-10">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper" id="slider-booking">
                    <!-- Slides -->
                    <!--<div class="swiper-slide">Slide 1</div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>-->
                    
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>
        </main>
        <!-- Footer -->
        @include('partials.footer')
    </body>
</html>
