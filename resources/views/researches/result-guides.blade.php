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
        <!-- Form search/filtre -->
        <div class="text-center">
            <form action="{{ route('filter_guides') }}" method="GET">
                @csrf
                <input name="searchGuides" type="text" class="rounded-md bg-gray-lighter" value="{{ ucfirst($city) }}" placeholder="Enter a city name...">
                <button name="btnSubmit" value="guides" type="submit" class="border-2 px-2 py-2">Search</button><br>
                <!-- Filtres -->
                <!-- Button toggle = filtre qui fait apparaitre ou disparaitre la div filtre -->
                <button class="border-first bg-first text-white font-semibold px-2 py-2">Filters</button>
                <div id="filter">
                    <div>
                        <p class="text-first font-semibold">Categories
                        <p>
                            @foreach ($categories as $category)
                            <label for="categories{{ $category->id }}">{{ $category->name }}</label>
                            <input type="checkbox" name="categories[]" id="categories{{ $category->id }}" value="{{ $category->id }}" class="py-1 text-xl lg:text-base text-gray-dark">
                            @endforeach
                    </div>
                    <div>
                        <p class="text-first font-semibold">Languages</p>
                        @foreach ($languages as $language)
                        <label for="lang{{ $language->id }}">{{ $language->language }}</label>
                        <input type="checkbox" name="languages[]" id="lang{{ $language->id }}" value="{{ $language->id }}" class="py-1 text-xl lg:text-base text-gray-dark">
                        @endforeach
                    </div>
                    <div>
                        <p class="text-first font-semibold">Gender</p>
                        <label for="genderF">female</label>
                        <input type="checkbox" name="gender[]" id="genderF" value="Female">
                        <label for="genderM">male</label>
                        <input type="checkbox" name="gender[]" id="genderM" value="Male">
                        <label for="genderO">other</label>
                        <input type="checkbox" name="gender[]" id="genderO" value="Other">
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
    <main class="bg-pink-200 my-5">
        <!-- RESULTATS DE LA RECHERCHE-->
        <div class="bg-gray-lighter py-6">

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
                <h1 class="text-gray-dark text-3xl font-extrabold text-center">Explore {{ ucfirst($city) }} with the guide of your choice</h1>
                <div class="md:h-full flex items-center">
                    <div class="container px-5 mx-auto">
                        <div class="flex flex-wrap justify-center">
                            <!-- Foreach of guides that match the query + mettre lien sur la photo du guide->show profil -->
                            @forelse ($guides as $guide)
                            <div class="max-w-sm py-16 mx-5">
                                <div class="bg-white relative shadow-lg hover:shadow-xl transition duration-500 rounded-lg">
                                    <a href="{{ route('profile', $guide->user_id) }}">
                                        <img class="object-cover min-w-full min-h-full rounded-t-lg w-60 h-60 pt-3" src="{{ asset($guide->picture) }}" alt="guide's profile picture" />
                                    </a>
                                    <div class="pb-4 pt-3 px-8 rounded-lg bg-white text-center">
                                        <!-- mettre lien pour redirection sho.guide-->
                                        <a href="{{ route('profile', $guide->user_id) }}" class="text-xl text-gray-darker font-semibold">
                                            {{ $guide->firstname }}
                                        </a>
                                    </div>
                                    <div class="absolute top-2 right-2 py-2 px-4 bg-white rounded-lg">
                                        <span class="text-md">stars review</span>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p>No results</p>
                            @endforelse
                        </div>
                    </div>
                    <div class="">
                        {{ $guides->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>