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
        <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
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
            <div class="overflow-x-hidden">
                <div class="relative"><img src="{{ asset('images/header-home.jpg') }}" class="w-100"></div>
                <div class="text-center">
                    <form action="{{ route('all_in_city') }}" method="GET" class="transform -translate-y-10 z-20">
                        @csrf
                        <div class="grid grid-cols-1 justify-items-center">
                        <input name="searchInput" type="text" class="rounded-full bg-gray-lighter flex w-3/4 md:w-2/4 h-16 px-5" placeholder="Enter a city name...">
                        </div>
                        <div class="mt-3 space-x-2">
                            <button type="submit" value="guides" name="btnSearch" class="px-7 py-2 text-xl lg:text-base align-middle font-bold tracking-wider bg-last border-2 text-white border-last rounded-lg focus:ring-1">
                                guides
                            </button>
                            <button type="submit" value="articles" name="btnSearch" class="px-7 py-2 text-xl lg:text-base align-middle font-bold tracking-wider bg-first b border-2 text-white border-first rounded-lg focus:ring-1">
                                articles
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </header>
        <!-- Page Content -->
        <main class="overflow-x-hidden">
            @include('partials.flash-message')
            
            <!-- articles -->
            <div>
                <h1 class="text-gray-dark font-extrabold text-6xl text-center mt-8 mb-10">Latest Posts</h1>
            </div>
            <div class="swiper-container slider1">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper" id="slider">
                    <!-- Slides -->
                    <!--<div class="swiper-slide">Slide 1</div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>-->
                    
                </div>
            </div>
            <!-- Info concept -->
            <div>
                <h1 class="text-gray-dark font-extrabold text-6xl text-center mt-16 mb-10">The Concept</h1>
            </div>
            <!-- list of users -->
            <div class="text-center grid grid-cols-1">
                <div class="bg-gray-300 flex justify-center py-5">
                    <div class="bg-cover">
                        <img src="{{ asset('images/tips.jpg') }}" alt="icone-tips" class="w-28 h-28 rounded-full mr-28">
                    </div>
                    <p class="text-gray-dark text-2xl font-bold pt-10">Share Your Tips With Others About Your City/Favotites Spots</p>
                </div>
                <div class="bg-pink-300 flex justify-center py-5">
                    <p class="text-gray-dark text-2xl font-bold pt-10 mr-32">Discover A City Through The Eyes Of A Passionate Guide</p>
                    <img src="{{ asset('images/jumelles.png') }}" alt="icone-binoculars" class="w-28 h-28 rounded-full">
                </div>
                <div class="bg-green-300 flex justify-center py-5">
                    <img src="{{ asset('images/money.png') }}" alt="icone-money" class="w-28 h-28 rounded-full mr-40">
                    <p class="text-gray-dark text-2xl font-bold pt-10">Propose Local Tours/Visits And Earn Some Money</p>
                </div>
                <div class="bg-gray-400 flex justify-center py-5">
                    <p class="text-gray-dark text-2xl font-bold pt-10 ml-10 mr-52 md:mr-52 md:ml-96">Save Time</p>
                    <img src="{{ asset('images/time.jpg') }}" alt="icone-time" class="w-28 h-28 rounded-full">       
                </div>
                <div class="bg-red-200 flex justify-center py-5">
                    <div><img src="{{ asset('images/monde.png') }}" alt="icone-world" class="w-28 h-28 rounded-full mr-28"></div>       
                    <p class="text-gray-dark text-2xl font-bold pt-10">Connect To An International Community And Meet Greet People</p>
                </div>
            </div>
            <!-- guides -->
            <div>
                <h1 class="text-gray-dark font-extrabold text-6xl text-center mt-16 mb-10">Latest Visits</h1>
            </div>
            <div class="swiper-container slider2 mb-10 px-10">
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

