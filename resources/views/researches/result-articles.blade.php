<x-app-layout>
    <x-slot name="header">
        <div class="relative h-32">
            <div class="absolute inset-0 top-0 h-32">
                <img class="w-full h-full object-cover" src="{{ asset('images/air-balloon.jpg') }}" alt="header for profile pages">
                <div class="backdrop-filter backdrop-blur-xs absolute inset-0 bg-gray-400 bg-opacity-50 mix-blend-multiply" aria-hidden="true"></div>
            </div>
            <div class="text-center relative max-w-7xl ml-2 lg:ml-40 xl:ml-72">
                <h2 class="text-yellow-700 max-w-3xl transform translate-y-5 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">{{ ucfirst($city) }}</h2>
            </div>
        </div>
        <!-- FORM SEARCH/FILTRES -->
        <div class="text-center mt-3">
            <form action="{{ route('filter_articles') }}" method="GET">
                @csrf
                <input name="searchArticles" type="text" class="rounded-md bg-gray-lighter w-2/4 lg:w-1/4" value="{{ ucfirst($city) }}" placeholder="Enter a city name...">
                <button type="submit" name="btnSubmit" value="articles" class="px-5 py-2 text-xl lg:text-base align-middle font-bold tracking-wider bg-first b border-2 text-white border-first rounded-lg focus:ring-1">
                    Search
                </button><br>
                <!-- Filtres -->
               <!-- <button class="border-first bg-first text-white font-semibold px-2 py-2">Filters</button>-->
                <div id="filter">
                    <div class="mx-5 lg:mx-0">
                        <!-- foreach de toutes les categories -->
                        <p class="text-first font-bold text-lg mt-3">Categories</p>
                            @foreach ($categories as $category)
                                <label for="categories">{{ $category->name }}</label>
                                <input type="checkbox" name="categories[]" id="categories" value="{{ $category->id }}" class="py-1 text-xl lg:text-base text-gray-dark">
                            @endforeach
                    </div>
                    <div>
                        <!-- sort by date of publication new/old-->
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
    <main class="overflow-x-hidden">
        <!-- DISPLAY CARDS ARTICLES -->
        <div>
            <h1 class="text-gray-dark text-4xl font-extrabold text-center mt-10">Enjoy the best tips in {{ ucfirst($city) }}</h1>
            <div class="md:h-full flex items-center">
                <!-- Foreach of articles that match the query -->
                <div class="container px-5 mx-auto">
                    <div class="flex flex-wrap justify-center">
                        @forelse($articles as $article)
                            <div class="md:max-w-sm py-10 mx-5">
                                <div class="bg-white relative shadow-lg hover:shadow-xl transition duration-500 rounded-lg">
                                    <div class="w-96">
                                        <a href="{{ route('show_article', $article->id) }}">
                                            <img class="object-cover min-w-full min-h-full rounded-t-lg h-72" src="{{ asset($article->pictures[0]->path) }}" alt="cover picture of the article" />
                                        </a>
                                    </div>
                                    <div class="pb-6 pt-4 px-8 rounded-lg bg-white">
                                        @foreach($article->categories as $category)
                                            <p class="text-gray-light font-bold text-my-orange-light">{{ $category->name }}</p>
                                        @endforeach
                                        <a href="{{ route('show_article', $article->id) }}" class="text-black font-bold tracking-wide pl-7 pt-2">{{ $article->title }}</a><br>
                                        <a href="{{ route('show_article', $article->id) }}" class="text-gray-darker font-bold tracking-wide pl-7">{{ ucfirst(Str::limit($article->subtitle,30))}}</a>
                                        <hr class="border border-gray-lighter">
                                        <div class="flex pt-3">
                                            <div>
                                            <a href="{{ route('profile', $article->user_id) }}">
                                                <img class="bg-cover bg-center bg-gray-700 w-10 h-10 rounded-full mr-3" src="{{ asset($article->user->picture) }}" alt="picture of the article's author">
                                            </a>
                                            </div>
                                            <div>
                                                <a href="{{ route('profile', $article->user_id) }}" class="text-gray-light font-bold pt-3 pl-3">{{ $article->user->firstname }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No results</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>