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
                    <button type="submit" class="border-2">Search</button>
                    <!-- Filtres -->
                    <button>Button toggle = filtre qui fait apparaitre ou disparaitre la div filtre</button>
                    <div id="filter">
                        <div>
                            <p>Filtrer par categories</p>
                            <input type="checkbox">
                            <!-- foreach de toutes les categories -->
                        </div>
                        <div>
                            <p>Filtrer par articles</p>
                            <input type="checkbox"> <!-- yes si coché, no si pas coché -->
                        </div>
                        <div>
                            <p>Filtrer par guide</p>
                            <input type="checkbox"> <!-- yes si coché, no si pas coché -->
                            <input type="checkbox"> <!-- si yes coché LANGUE-->
                            <input type="checkbox"> <!-- si yes coché SEXE-->
                        </div>
                    </div>
                </form>
            </div>
    </x-slot>
    <main class="bg-pink-200 my-5">
        <!-- RESULTATS DE LA RECHERCHE-->
        <div class="bg-gray-lighter py-6">
            <!-- DISPLAY CARDS ARTICLES -->
            <div>
                <h1 class="text-gray-dark text-3xl font-extrabold text-center">Enjoy the best tips in Copenhagen</h1>
                <div class="flex mx-7">
                   <!-- Foreach of articles that match the query + mettre lien sur la photo de l'article->show article/auteur de l'auteur->show profil -->
                    <div class="max-w-sm py-16">
                        <div class="bg-white relative shadow-lg hover:shadow-xl transition duration-500 rounded-lg">
                            <img class="rounded-t-lg" src="https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1049&q=80" alt="" />
                            <div class="pb-6 pt-4 px-8 rounded-lg bg-white">
                                <p class="text-gray-light font-bold">les catégories ICI</p>
                                <p class="text-black font-bold tracking-wide pl-7 pt-2">Titre</p>
                                <p class="text-gray-darker font-bold tracking-wide pl-7">Sous-titre</p>
                                <hr class="border border-gray-lighter">
                                <div class="flex pt-3">
                                    <div>
                                        <img class="bg-cover bg-center bg-gray-700 w-10 h-10 rounded-full mr-3" src="#" alt="picture of the article's author">
                                    </div>
                                    <div>
                                        <p class="text-gray-light font-bold pt-3 pl-3">Nom de l'auteur de l'article</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- EXPLAINATION -->
            <div class="bg-yellow-200 text-center py-7">
                <h1 class="text-gray-darker text-3xl font-extrabold mb-10">How to hire a guide service ?</h1>
                <div class="flex justify-center">
                    <img src="{{ asset('images/1.png') }}" alt="icone-nb1" class="w-14 h-14">
                    <p class="text-gray-dark text-xl font-bold mb-7">Log in and choose the guide and/or tips that best match your criteria.<br> Use the FILTER button.</p>
                </div>
                <div class="flex justify-center">
                    <p class="text-gray-dark text-xl font-bold mb-12">Get in touch with the chosen guide.<br> Book one or more visits according to the availability of each one...</p>
                    <img src="{{ asset('images/2.png') }}" alt="icone-nb2" class="w-14 h-14">
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/3.png') }}" alt="icone-nb3" class="w-14 h-14">
                    <p class="text-gray-dark text-xl font-bold mb-12">Pay online via our platform upon receipt of the confirmation of your visit by email.</p>
                </div>
                <div class="flex justify-center">
                    <p class="text-gray-dark text-xl font-bold">Enjoy your visit and the precious advice that your guide will give you.</p>
                    <img src="{{ asset('images/4.png') }}" alt="icone-nb4" class="w-14 h-14">
                </div>
            </div>
            <!-- DISPLAY CARDS GUIDE -->
            <div class="mt-7">
                <h1 class="text-gray-dark text-3xl font-extrabold text-center">Explore Copenhagen with the guide of your choice</h1>
                <div class="flex mx-7">
                   <!-- Foreach of guides that match the query + mettre lien sur la photo du guide->show profil -->
                    <div class="max-w-sm py-16">
                        <div class="bg-white relative shadow-lg hover:shadow-xl transition duration-500 rounded-lg">
                            <img class="rounded-t-lg" src="https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1049&q=80" alt="" />
                            <div class="pb-6 pt-4 px-8 rounded-lg bg-white">
                                <p class="text-xl text-gray-darker font-semibold text-center">Nom du guide</p>
                            </div>
                            <div class="absolute top-2 right-2 py-2 px-4 bg-white rounded-lg">
                                <span class="text-md">stars review</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>