<x-app-layout>
    <x-slot name="header">
            <div class="relative h-32">
                <div class="absolute inset-x-0 top-0 h-32">
                    <img class="w-full h-full object-cover" src="{{ asset('images/header-article.jpg') }}" alt="header for article pages">
                   <!-- <div class="backdrop-filter backdrop-blur-xs absolute inset-0 bg-gray-400 bg-opacity-50 mix-blend-multiply" aria-hidden="true"></div>-->
                </div>
                <div class="text-center relative max-w-7xl ml-2 lg:ml-40 xl:ml-72">
                    <h2 class="text-yellow-700 max-w-3xl text-center transform translate-y-10 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                        {{ __('Article') }}
                    </h2>
                </div>
            </div>
    </x-slot>
    <main class="bg-pink-200">
        <div class="flex">
            <div class="bg-red-400">
                <div class="mt-4 md:mt-0 mx-auto bg-white border-4 border-gray-dark rounded-full w-1/5">
                    <img class="object-cover" src="{{ asset($author->picture) }}" alt="picture of the user"/>
                </div>
                <div class="text-center">
                    <p class="text-2xl text-gray-darker font-extrabold">{{ $author->firstname }}</p>
                    <p class="text-lg text-first font-bold">{{ $author->role }}</p>
                    <button class="mx-28 mt-6 mb-3 md:mx-8 px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider bg-last border-2 text-white border-last rounded-lg focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                        Edit article
                    </button>
                </div>
            </div>
            <div class="bg-green-400 pb-11">
                <div class="mt-6 w-2/5 mx-16 text-center text-gray-darker font-extrabold">
                    <p class="text-3xl">{{ $article->title }}</p>
                    <p class="text-2xl">{{ $article->subtitle }}</p>
                </div>
                <div class="mt-6 w-2/5 mx-16">
                    <p class="text-gray-darker font-extrabold">{{ __('Why do the locals love this place? What do you like about it?') }}</p>
                    <p class="text-gray-dark font-semibold">{{ $article->description }}</p>
                </div>
                <div class="flex flex-row justify-evenly pt-10">
                    @foreach ($pictures as $picture)
                       <img class="w-44 h-44" src="{{ asset($picture->path) }}" alt="pictures of the article"/>
                    @endforeach
                </div>
            </div>
            <div class="bg-yellow-400">
                <div>
                    <p class="text-gray-darker text-center font-extrabold">Location</p>
                    <div class="mx-12 box-border h-48 w-48 border-2 border-gray-darker"></div>
                </div>
                <div class="mx-20">
                    <div>
                    <img class="w-6 h-6" src="{{ asset('images/location.png') }}" alt="address icon"/><p>{{ $article->address }}</p>
                    <!-- if phone and website not null -->
                    <img class="w-6 h-6" src="{{ asset('images/call.png') }}" alt="phone icon"/><p>{{ $article->phone }}</p>
                    <img class="w-6 h-6" src="{{ asset('images/website.png') }}" alt="website icon"/><p>{{ $article->website }}</p>
                    </div>
                    <div>
                        <ul>
                            @foreach ($categories as $categorie)
                            <li class="text-first font-bold">{{ $categorie->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>