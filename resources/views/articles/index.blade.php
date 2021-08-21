<x-app-layout>
    <x-slot name="header">
            <div class="relative h-32">
                <div class="absolute inset-x-0 top-0 h-32">
                    <img class="w-full h-full object-cover" src="{{ asset('images/header-article.jpg') }}" alt="header for article pages">
                   <!-- <div class="backdrop-filter backdrop-blur-xs absolute inset-0 bg-gray-400 bg-opacity-50 mix-blend-multiply" aria-hidden="true"></div>-->
                </div>
                <div class="text-center relative max-w-7xl ml-2 lg:ml-40 xl:ml-72">
                    <h2 class="text-yellow-700 max-w-3xl text-center transform translate-y-10 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                        {{ __('My articles') }}
                    </h2>
                </div>
            </div>
    </x-slot>
    <main class="bg-pink-200">
        <ul>
            <h2 class="font-extrabold text-3xl text-gray-darker">My published articles</h2>
            @foreach ($articles as $article)
                @if ($article->status === 'published')
                    <li><a href="{{ route('show_article', $article->id) }}">{{ $article->title }} - {{ $article->created_at }}</a></li>   
                @endif
            @endforeach
        </ul>
        @auth
            @if(auth()->user()->id === $user->id)
                <h2 class="font-extrabold text-3xl text-gray-darker">My articles under review</h2>
                <ul>
                    @foreach ($articles as $article)
                        @if ($article->status === 'under_review')
                            <li><a href="{{ route('show_article', $article->id) }}">{{ $article->title }} - {{ $article->created_at }}</a></li>   
                        @endif 
                    @endforeach
                </ul>
            @endif
        @endauth
    </main>
</x-app-layout>