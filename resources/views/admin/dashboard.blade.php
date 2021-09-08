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

    </head>
    <body>
       @include('partials.admin-sidebar')
       <div>
           <h1 class="text-center text-3xl text-last pt-24">Welcome on the Admin Dashboard <span class="font-bold">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</span></h1>
       </div>
    </body>

   

