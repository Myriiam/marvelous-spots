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
    <main class="overflow-x-hidden overflow-y-hidden">
        <h2 class="font-extrabold text-3xl text-gray-darker pl-10 underline">My published articles</h2>
        <div>
            <div class="md:h-full flex items-center">
                <div class="container px-5 mx-auto">
                <div class="flex flex-wrap justify-center">
                @foreach($articles as $article)
                    <div class="md:max-w-sm py-10 mx-5">
                        <div class="bg-white relative shadow-lg hover:shadow-xl transition duration-500 rounded-lg">
                            <div class="w-96">
                                <a href="{{ route('show_article', $article->id) }}">
                                    <img class="object-cover min-w-full min-h-full rounded-t-lg h-72" src="{{ asset($article->path) }}" alt="cover picture of the article" />
                                </a>
                            </div>
                            <div class="pb-6 pt-4 px-8 rounded-lg bg-white">
                                @foreach($article->categories as $category)
                                    <p class="text-my-orange-light font-bold">{{ $category->name }}</p>
                                @endforeach
                                <a href="{{ route('show_article', $article->id) }}" class="text-black font-bold tracking-wide pl-7 pt-2">{{ $article->title }}</a><br>
                                <a href="{{ route('show_article', $article->id) }}" class="text-gray-darker font-bold tracking-wide pl-7">{{ ucfirst(Str::limit($article->subtitle,30))}}</a>
                                <hr class="border border-gray-lighter">
                                <div class="flex pt-3">
                                    <div>
                                    <a href="{{ route('profile', $article->user_id) }}">
                                        <img class="bg-cover bg-center bg-gray-700 w-10 h-10 rounded-full mr-3" src="{{ asset($article->picture) }}" alt="picture of the article's author">
                                    </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('profile', $article->user_id) }}" class="text-gray-light font-bold pt-3 pl-3">{{ $article->firstname }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <div class="px-5 flex flex-wrap justify-center py-3">
            {{ $articles->withQueryString()->links() }}
        </div>
        @auth
            @if(auth()->user()->id === $user->id)
                <h2 class="font-extrabold text-3xl text-gray-darker pl-10 underline">My articles under review</h2>
                <div>
            <div class="md:h-full flex items-center">
                <div class="container px-5 mx-auto">
                <div class="flex flex-wrap justify-center">
                @foreach($articlesReview as $articleReview)
                    <div class="md:max-w-sm py-10 mx-5">
                        <div class="bg-white relative shadow-lg hover:shadow-xl transition duration-500 rounded-lg">
                            <div class="w-96">
                                <a href="{{ route('show_article', $articleReview->id) }}">
                                    <img class="object-cover min-w-full min-h-full rounded-t-lg h-72" src="{{ asset($articleReview->path) }}" alt="cover picture of the article" />
                                </a>
                            </div>
                            <div class="pb-6 pt-4 px-8 rounded-lg bg-white">
                                @foreach($articleReview->categories as $category)
                                    <p class="text-my-orange-light font-bold">{{ $category->name }}</p>
                                @endforeach
                                <a href="{{ route('show_article', $articleReview->id) }}" class="text-black font-bold tracking-wide pl-7 pt-2">{{ $articleReview->title }}</a><br>
                                <a href="{{ route('show_article', $articleReview->id) }}" class="text-gray-darker font-bold tracking-wide pl-7">{{ ucfirst(Str::limit($articleReview->subtitle,30))}}</a>
                                <hr class="border border-gray-lighter">
                                <div class="flex pt-3">
                                    <div>
                                    <a href="{{ route('profile', $articleReview->user_id) }}">
                                        <img class="bg-cover bg-center bg-gray-700 w-10 h-10 rounded-full mr-3" src="{{ asset($articleReview->picture) }}" alt="picture of the article's author">
                                    </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('profile', $articleReview->user_id) }}" class="text-gray-light font-bold pt-3 pl-3">{{ $articleReview->firstname }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
            @endif
        @endauth
        <div class="px-5 flex flex-wrap justify-center py-3">
            {{ $articlesReview->withQueryString()->links() }}
        </div>
    </main>
</x-app-layout>