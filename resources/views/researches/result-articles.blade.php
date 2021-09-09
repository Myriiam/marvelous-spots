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
        <div class="text-center">
            <form action="{{ route('filter_articles') }}" method="GET">
                @csrf
                <input name="searchArticles" type="text" class="rounded-md bg-gray-lighter" value="{{ ucfirst($city) }}" placeholder="Enter a city name...">
                <button type="submit" name="btnSubmit" value="articles" class="border-2 px-2 py-2">Search</button><br>
                <!-- Filtres -->
               <!-- <button class="border-first bg-first text-white font-semibold px-2 py-2">Filters</button>-->
                <div id="filter">
                    <div>
                        <!-- foreach de toutes les categories -->
                        <p class="text-first font-semibold">Categories</p>
                            @foreach ($categories as $category)
                                <label for="categories">{{ $category->name }}</label>
                                <input type="checkbox" name="categories[]" id="categories" value="{{ $category->id }}" class="py-1 text-xl lg:text-base text-gray-dark">
                            @endforeach
                    </div>
                    <div>
                        <!-- sort by date of publication new/old-->
                        <label for="sort"></label>
                        <input type="text">
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
    <main>
        <!-- DISPLAY CARDS ARTICLES -->
        <div>
            <h1 class="text-gray-dark text-3xl font-extrabold text-center">Enjoy the best tips in {{ ucfirst($city) }}</h1>
            <div class="flex mx-7">
                <!-- Foreach of articles that match the query + mettre lien sur la photo de l'article->show article/auteur de l'auteur->show profil -->
                @forelse($articles as $article)
                <div class="max-w-sm py-16 mx-5">
                  
                    <div class="bg-white relative shadow-lg hover:shadow-xl transition duration-500 rounded-lg">
                    <a href="{{ route('show_article', $article->id) }}">
                        <img class="rounded-t-lg h-72" src="{{ asset($article->path) }}" alt="cover picture of the article" />
                    </a>
                        <div class="pb-6 pt-4 px-8 rounded-lg bg-white">
                            @foreach($article->categories as $category)
                                <p class="text-gray-light font-bold">{{ $category->name }}</p>
                            @endforeach
                            <a href="{{ route('show_article', $article->id) }}" class="text-black font-bold tracking-wide pl-7 pt-2">{{ $article->title }}</a><br>
                            <a href="{{ route('show_article', $article->id) }}" class="text-gray-darker font-bold tracking-wide pl-7">{{ $article->subtitle }}</a>
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
                @empty
                    <p>No results</p>
                @endforelse
            </div>
            <div>
            {{ $articles->withQueryString()->links()}}
            </div>
        </div>
    </main>
</x-app-layout>