<x-app-layout>
<x-slot name="header">
            <div class="relative h-32">
                <div class="absolute inset-0 top-0 h-32">
                    <img class="w-full h-full object-cover" src="{{ asset('images/air-balloon.jpg') }}" alt="header for profile pages">
                    <div class="backdrop-filter backdrop-blur-xs absolute inset-0 bg-gray-400 bg-opacity-50 mix-blend-multiply" aria-hidden="true"></div>
                </div>
                <div class="text-center relative max-w-7xl ml-2 lg:ml-40 xl:ml-72">
                    <h2 class="text-yellow-700 max-w-3xl transform translate-y-5 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">City of the query request</h2>
                </div>
            </div>
            <!-- Form search/filtre -->
            <div class="text-center">
                <form action="{{ route('all_in_city') }}" method="GET">
                    @csrf
                    <input name="search-home" type="text" class="rounded-md bg-gray-lighter" placeholder="Enter a city name...">
                    <button type="submit" class="border-2 px-2 py-2">Search</button><br>
                    <!-- Filtres -->
                    <!-- Button toggle = filtre qui fait apparaitre ou disparaitre la div filtre -->
                    <button class="border-first bg-first text-white font-semibold px-2 py-2">Filters</button>
                    <div id="filter">
                        <div>
                            <!-- foreach de toutes les categories -->
                            
                        </div>
                        <div>
                            <p class="text-first font-semibold">Filtrer par articles</p>
                            <input type="checkbox"> <!-- yes si coché, no si pas coché -->
                        </div>
                        <div>
                            <label for="guide" class="text-first font-semibold">Filter by guides</label><br>
                            <input type="checkbox" name="guide">
                            <div>
                                <p class="text-last">Languages</p>
                                <label for="english" >English</label>
                                <input type="checkbox" name="english" value="English"/>
                                <label for="french" >French</label>
                                <input type="checkbox" value="French" nem="french"/>
                                <label for="arabic">Arabic</label>
                                <input type="checkbox" value="Arabic" name="arabic"/>
                                <label for="italian">Italian</label>
                                <input type="checkbox" value="Italian" name="italian"/>
                                <label for="spanish">Spanish</label>
                                <input type="checkbox" value="Spanish" name="spanish"/>
                       
                                <p class="text-last">sexe</p>
                                <label for="F">women</label>
                                <input type="checkbox" name="F" value="F"> 
                                <label for="M">man</label>
                                <input type="checkbox" name="M" value="M"> 
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </x-slot>
<main>
    <!-- DISPLAY CARDS ARTICLES --> 
<div>
    <h1 class="text-gray-dark text-3xl font-extrabold text-center">Enjoy the best tips in Cityofquery</h1>
    <div class="flex mx-7">
        <!-- Foreach of articles that match the query + mettre lien sur la photo de l'article->show article/auteur de l'auteur->show profil -->
        
        @foreach($users as $user)
        @foreach($user->articles as $article)      
            <div class="max-w-sm py-16">
                <div class="bg-white relative shadow-lg hover:shadow-xl transition duration-500 rounded-lg">
                    <img class="rounded-t-lg" src="https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1049&q=80" alt="" />
                    <div class="pb-6 pt-4 px-8 rounded-lg bg-white">
                        @for($i = 0; $i < (sizeOf($article->categories)-1); $i++)
                            <p class="text-gray-light font-bold">{{ $article->categories[$i]->name }}</p>
                        @endfor
                        <p class="text-black font-bold tracking-wide pl-7 pt-2">{{ $article->title }}</p>
                        <p class="text-gray-darker font-bold tracking-wide pl-7">{{ $article->subtitle }}</p>
                        <hr class="border border-gray-lighter">
                        <div class="flex pt-3">
                            <div>
                                <img class="bg-cover bg-center bg-gray-700 w-10 h-10 rounded-full mr-3" src="#" alt="picture of the article's author">
                            </div>
                            <div>
                                <p class="text-gray-light font-bold pt-3 pl-3">{{ $article->author }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach
    </div>
</div>
</main>
</x-app-layout>