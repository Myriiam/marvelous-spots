<x-app-layout>
    <x-slot name="header">
            <div class="relative h-32">
                <div class="absolute inset-x-0 top-0 h-32">
                    <img class="w-full h-full object-cover" src="{{ asset('images/header-article.jpg') }}" alt="header for article pages">
                </div>
                <div class="text-center relative max-w-7xl ml-2 lg:ml-40 xl:ml-72">
                    <h2 class="text-yellow-700 max-w-3xl text-center transform translate-y-10 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                        {{ __('My Favorites') }}
                    </h2>
                </div>
            </div>
    </x-slot>
    <main class="overflow-x-hidden">
        @auth
            @if(auth()->user()->id === $user->id)
                <h2 class="font-extrabold text-3xl text-gray-darker ml-10 underline">My favorites guides</h2>
                <div class="mt-7">
                    <div class="md:h-full flex items-center">
                        <div class="container px-5 mx-auto">
                            <div class="flex flex-wrap justify-center">
                                @forelse ($favoritesGuidesOfAuthUser as $favoriteGuide)
                                <div class="max-w-sm py-16 mx-5">
                                    <div>
                                        Added on {{ Carbon\Carbon::parse($favoriteGuide->created_at)->format('d/m/Y') }}
                                    </div>
                                    <div class="bg-white relative shadow-lg hover:shadow-xl transition duration-500 rounded-lg">
                                        <a href="{{ route('profile', $favoriteGuide->guide->user->id) }}">
                                            <img class="object-cover min-w-full min-h-full rounded-t-lg w-60 h-60 pt-3" src="{{ asset($favoriteGuide->guide->user->picture) }}" alt="guide's profile picture" />
                                        </a>
                                        <div class="pb-4 pt-3 px-8 rounded-lg bg-white text-center">
                                            <a href="{{ route('profile', $favoriteGuide->guide->user->id) }}" class="text-xl text-gray-darker font-semibold">
                                                {{ $favoriteGuide->guide->user->firstname }}
                                            </a>
                                        </div>
                                        <div class="absolute top-2 right-2 py-2 px-4 bg-white rounded-lg">
                                            <span class="text-md">stars review</span>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <p>You haven't yet added any guides as favorites</p>
                                @endforelse
                            </div>
                        </div>
                        <div class="">
                        <!-- pagination -->
                        </div>
                    </div>
                </div>
                <h2 class="font-extrabold text-3xl text-gray-darker ml-10 underline">My favorites articles</h2>
                <div>
                    <div class="md:h-full flex items-center">
                        <div class="container px-5 mx-auto">
                            <div class="flex flex-wrap justify-center">
                                @forelse($favoritesArticlesOfAuthUser as $favoriteArticle)
                                    <div class="md:max-w-sm py-10 mx-5">
                                        <div>
                                            Added on {{ Carbon\Carbon::parse($favoriteArticle->created_at)->format('d/m/Y') }}
                                        </div>
                                        <div class="bg-white relative shadow-lg hover:shadow-xl transition duration-500 rounded-lg">
                                            <div class="w-96">
                                                <a href="{{ route('show_article', $favoriteArticle->article_id) }}">
                                                    <img class="object-cover min-w-full min-h-full rounded-t-lg h-72" src="{{ asset($favoriteArticle->article->pictures[0]->path) }}" alt="cover picture of the article" />
                                                </a>
                                            </div>
                                            <div class="pb-6 pt-4 px-8 rounded-lg bg-white">
                                                @foreach($favoriteArticle->article->categories as $category)
                                                    <p class="text-gray-light font-bold text-my-orange-light">{{ $category->name }}</p>
                                                @endforeach
                                                <a href="{{ route('show_article', $favoriteArticle->article_id) }}" class="text-black font-bold tracking-wide pl-7 pt-2">{{ $favoriteArticle->article->title }}</a><br>
                                                <a href="{{ route('show_article', $favoriteArticle->article_id) }}" class="text-gray-darker font-bold tracking-wide pl-7">{{ ucfirst(Str::limit($favoriteArticle->article->subtitle,30))}}</a>
                                                <hr class="border border-gray-lighter">
                                                <div class="flex pt-3">
                                                    <div>
                                                    <a href="{{ route('profile', $favoriteArticle->article->user_id) }}">
                                                        <img class="bg-cover bg-center bg-gray-700 w-10 h-10 rounded-full mr-3" src="{{ asset($favoriteArticle->article->user->picture) }}" alt="picture of the article's author">
                                                    </a>
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('profile', $favoriteArticle->article->user_id) }}" class="text-gray-light font-bold pt-3 pl-3">{{ $favoriteArticle->article->user->firstname }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>You haven't yet added any articles as favorites</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endauth
    </main>
</x-app-layout>