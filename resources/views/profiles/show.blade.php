<x-app-layout>
    <x-slot name="header">
            <div class="relative">
                <div class="absolute inset-0">
                    <img class="w-full h-full object-cover" src="{{ asset('images/header-profile.jpg') }}" alt="header for profile pages">
                    <div class="backdrop-filter backdrop-blur-xs absolute inset-0 bg-gray-400 bg-opacity-50 mix-blend-multiply" aria-hidden="true"></div>
                </div>
                <div class="text-center relative max-w-7xl ml-2 lg:ml-40 xl:ml-72">
                    <h2 class="text-yellow-700 max-w-3xl transform translate-y-5 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">{{ $user->firstname }}</h2>
                    <p class="mt-2.5 text-xl text-gray-dark font-bold max-w-3xl">{{ $user->city }}, {{ $user->country }}</p>
                    <p class="mt-0 md:mt-2 text-xl text-first font-bold max-w-3xl">{{ $user->role }}</p>
                </div>
            </div>
    </x-slot>
    <main class="bg-pink-200">
        <div class="grid grid-cols-1 md:grid-cols-12">
            <div class="bg-red-400 col-span-4 sm:col-span-3 md:col-span-4 lg:col-span-3">
                <div class="mt-4 md:mt-0 mx-auto bg-white border-4 border-gray-dark rounded-full w-2/5 flex-shrink items-center z-10 transform -translate-y-0 md:-translate-y-24 md:w-4/5 lg:w-9/12">
                    <img class="object-cover" src="{{ asset($user->picture) }}" title="header for profile pages">
                </div>
                @if ($user->role === 'Guide' && ($user->guide->pause === 1))
                    <div class="transform -translate-y-0 md:-translate-y-24">
                        <p class="text-xl text-center font-bold border-4 rounded text-red-600 border-red-600 font-extrabold text-lg">PAUSE</p>
                    </div>
                @endif
                <div class="rounded-lg sm:mb-5 transform translate-y-0 md:-translate-y-24 text-center border-2 border-gray-darker mx-24 sm:mx-32 md:mx-3 lg:mx-5 xl:mx-8 2xl:mx-11">
                    <div class="mb-5 mt-6">
                        <div class="flex justify-center">
                            <img class="w-7 h-7 " src="{{ asset('images/check.png') }}" alt="verified email icon">
                            <p class="ml-3">{{ $user->email }}</p>
                        </div>
                        <p>Gender: {{ $user->gender }}</p>
                        <p>Social-media:</p>
                        <p>Member since {{ $user->created_at }}</p>
                        @if ($user->role === 'Guide')
                            <p>Guide since- date chmt rôle</p>
                        @endif
                    </div>
                        <div class="mb-6 grid grid-cols-1">
                        @auth
                            @if (auth()->user()->id === $user->id)
                                <a href="#" class="hover:text-sun">My favorites</a>
                                <a href="#" class="hover:text-sun">My bookings</a>
                                @if ($user->role === 'Guide')
                                    <a href="#" class="hover:text-sun">My offers</a>
                                @endif
                            @endif
                        @endauth
                        @if ($user->role === 'Guide')
                            <!-- langues parlées par le guide -->
                            <p>I speak :</p>
                            <ul>
                                @foreach ($user->guide->languages as $languages)               
                                    <li>{{ $languages->language }}</li>                  
                                @endforeach
                            </ul>
                            @if (isset($user->guide->price))
                                <p class=" mt-4 text-3xl text-first font-extrabold">Price: {{ $user->guide->price }} €/h</p>
                            @endif
                        @endif
                        </div>       
                </div>
                <div class="grid grid-cols-1 text-center auto-cols-auto transform translate-y-0 md:-translate-y-28">
                    @auth
                        @if ($user->role === 'Guide')
                            @if ($user->guide->pause === 1)
                                <a href="#" class="mx-28 mt-6 mb-3 md:mx-8 px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider bg-last bg-opacity-50 border-2 text-white text-opacity-75 border-last border-opacity-25 rounded-lg focus:ring-1 cursor-not-allowed">
                                    Contact me
                                </a>
                                <a href="#" class="mx-28 md:mx-8 my-2 px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider border-2 text-white text-opacity-75 bg-first bg-opacity-50 border-first border-opacity-25 rounded-lg focus:ring-1 cursor-not-allowed">
                                    Book a visit
                                </a>
                            @else 
                                <a href="#" class="mx-28 mt-6 mb-3 md:mx-8 px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider bg-last border-2 text-white border-last rounded-lg focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                                    Contact me
                                </a>
                                <a href="#" class="mx-28 md:mx-8 my-2 px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider border-2 text-white bg-first border-first rounded-lg focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                                    Book a visit
                                </a>
                            @endif
                        @endif
                    @endauth
                    <a href="#" class="mx-28 md:mx-8 mb-6 mt-3 w-42 px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider border-2 text-white bg-yellow-500 border-yellow-500 rounded-lg focus:ring-2 focus:ring-last cursor-pointer hover:shadow-lg hover:text-last">
                        My articles
                    </a>
                </div>
            </div>
            <div class="bg-green-400 col-span-8 sm:col-span-9 md:col-span-8 lg:col-span-9">
                <div class="text-justify text-base flex-grow mx-16 my-16 lg:mr-28 lg:ml-24">
                    @auth
                        @if (auth()->user()->id === $user->id)
                            <p class="text-xl text-gray-dark font-bold ml-6 mb-2">Personal Data<span class="text-red-600">*</span></p>
                            <p class="text-lg">Lastname: {{ $user->lastname }}</p>
                            @if ($birthdate != null)
                            <p class="text-lg">Birthdate: {{ $birthdate }}</p>
                            @else 
                            <p>Erreur</p>
                            @endif
                            <p class="text-red-600 mt-3"><span class="font-bold">*</span>will not be displayed</p>
                        @endif
                    @endauth
                    <p class="text-xl text-gray-dark font-bold ml-6 mt-6 mb-2">About me</p>
                    <p class="text-lg mb-2">{{ $user->about_me }}</p>
                    @if ($user->role === 'Guide')
                        <!-- if ($user->guide->category->subcategory existe/non null alors les afficher)
                        <p class="text-xl text-gray-dark font-bold ml-6 mt-6 mb-2">My interest</p>
                        <p class="text-lg mb-2">Afficher les catégories (sous-catégories</p>-->
                        <p class="text-xl text-gray-dark font-bold ml-6 mt-6 mb-2">My definition of travel</p>
                        <p class="text-lg mb-2">{{ $user->guide->travel_definition }}</p>
                        <p class="text-xl text-gray-dark font-bold ml-6 mt-6 mb-2">What I can propose you ?</p>
                        <p class="text-lg mb-2">{{ $user->guide->offering }}</p>
                        <p class="text-xl text-gray-dark font-bold ml-6 mt-6 mb-2">Comments</p>
                        <!-- if ($user->guide->category->subcategory existe/non null alors les afficher)
                        <p class="text-lg mb-2">Afficher les commentaires addressés au guide (review)</p>
                        sinon écrire No comments for this guide ! (ça veut dire qu'il n'a pas encore été sollicité par des voyageurs 
                        car comment obligatoire après la visite-->
                    @endif
                </div>
                <div class="mb-6 md:flex text-center md:justify-evenly">
                @auth
                    @if (auth()->user()->id === $user->id)
                        @if ($user->role !== 'Guide')
                            <a href="#" class="px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider border-2 text-gray-darker border-gray-darker rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                                Becoming a guide
                            </a>
                        @endif
                            <!-- et y faire un champs pour changer le mot de passe -->
                            <a href="{{ route('edit_my_profile') }}" class="px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider border-2 text-gray-darker border-gray-darker rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                                Edit my profile
                            </a>
                            <form method="POST" action="#">
                                <button type="submit" class="mt-6 px-7 py-2 text-xl md:mt-0 lg:text-base align-middle font-semibold tracking-wider border-2 text-gray-darker border-gray-darker rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                                    Delete my account
                                </button>
                                @csrf
                            </form>
                    @endif
                @endauth
                </div>
            </div>
        </div>
    </main>
</x-app-layout>