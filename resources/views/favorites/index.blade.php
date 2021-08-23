<x-app-layout>
    <x-slot name="header">
            <div class="relative h-32">
                <div class="absolute inset-x-0 top-0 h-32">
                    <img class="w-full h-full object-cover" src="{{ asset('images/header-article.jpg') }}" alt="header for article pages">
                   <!-- <div class="backdrop-filter backdrop-blur-xs absolute inset-0 bg-gray-400 bg-opacity-50 mix-blend-multiply" aria-hidden="true"></div>-->
                </div>
                <div class="text-center relative max-w-7xl ml-2 lg:ml-40 xl:ml-72">
                    <h2 class="text-yellow-700 max-w-3xl text-center transform translate-y-10 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                        {{ __('My Favorites') }}
                    </h2>
                </div>
            </div>
    </x-slot>
    <main class="bg-pink-200">
        @auth
            @if(auth()->user()->id === $user->id)
                <h2 class="font-extrabold text-3xl text-gray-darker">My favorites guides</h2>
                <ul>
                    @foreach ($favoritesGuidesOfAuthUser as $favoriteGuide)
                            <li><a href="#">{{ $favoriteGuide->guide_id }} - {{ $favoriteGuide->created_at }}</a></li>   
                    @endforeach
                </ul>
                <h2 class="font-extrabold text-3xl text-gray-darker">My favorites articles</h2>
                <ul>
                    @foreach ($favoritesArticlesOfAuthUser as $favoriteArticle)
                            <li><a href="#">{{ $favoriteArticle->article_id }} - {{ $favoriteArticle->created_at }}</a></li>   
                    @endforeach
                </ul>
            @endif
        @endauth
    </main>
</x-app-layout>