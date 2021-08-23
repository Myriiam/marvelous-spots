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
        <!-- Modal Contact -->
        @if ($errors->has('subject') || $errors->has('message'))
            <div id="modal-contact" class="bg-black bg-opacity-50 absolute inset-0 z-50 flex justify-center items-center">
        @else 
            <div id="modal-contact" class="bg-black bg-opacity-50 absolute inset-0 z-50 hidden justify-center items-center">
        @endif
            <div class="bg-white rounded-lg py-3 px-4">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold text-last mx-5">Contact {{ $user->firstname }}</h3>
                    <svg id="close-modal" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" 
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" 
                        clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <form action="{{ route('contact', $user->id) }}" method="POST" class="grid grid-cols-1">
                        @csrf
                        <input type="text" name="subject" id="subject" placeholder="Subject" class="bg-yellow-200 border-1 border-yellow-200 text-gray-dark mx-5 mt-5 rounded-md">
                        <span class="text-red-600">@error('subject') {{ $message }} @enderror</span>
                        <textarea name="message" id="message" cols="70" rows="10" placeholder="Message" class="bg-yellow-200 border-1 border-yellow-200 mx-5 my-5 text-gray-dark rounded-md"></textarea>
                        <span class="text-red-600">@error('message') {{ $message }} @enderror</span>
                        <div class="flex justify-center">
                            <button type="submit" class="mx-8 mt-6 px-7 py-2 text-xl md:mt-0 lg:text-base align-middle font-semibold border-2 text-gray-darker border-gray-darker rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Booking -->
        @if ($errors->has('visit_date') || $errors->has('nb_hours') || $errors->has('nb_person') || $errors->has('message_booking'))
            <div id="modal-booking" class="bg-black bg-opacity-50 absolute inset-0 z-50 flex justify-center items-center">
        @else 
            <div id="modal-booking" class="bg-black bg-opacity-50 absolute inset-0 z-50 hidden justify-center items-center">
        @endif
            <div class="bg-white rounded-lg py-3 px-4">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold text-first mx-5">Book a visit with {{ $user->firstname }}</h3>
                    <svg id="close-modal-booking" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" 
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" 
                        clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <form action="{{ route('book_visit', $user->id) }}" method="POST" class="grid grid-cols-1">
                        @csrf
                        <label for="visit_date">The date of the visit</label>
                        <input type="date" name="visit_date" id="day" class="bg-yellow-200 border-1 border-yellow-200 text-gray-dark mx-5 mt-5 rounded-md">
                        <span class="text-red-600">@error('visit_date') {{ $message }} @enderror</span>
                        <label for="nb_hours">Duration of the visit (hours)</label>
                        <input type="number" name="nb_hours" id="hours" min="1" max="12" class="bg-yellow-200 border-1 border-yellow-200 mx-5 my-5 text-gray-dark rounded-md">
                        <span class="text-red-600">@error('nb_hours') {{ $message }} @enderror</span>
                        <label for="nb_person">Number of person</label>
                        <input type="number" name="nb_person" id="person" min="1" max="10" class="bg-yellow-200 border-1 border-yellow-200 mx-5 my-5 text-gray-dark rounded-md">
                        <span class="text-red-600">@error('nb_person') {{ $message }} @enderror</span>
                        <textarea name="message_booking" id="message_booking" cols="70" rows="10" placeholder="Message" class="bg-yellow-200 border-1 border-yellow-200 mx-5 my-5 text-gray-dark rounded-md"></textarea>
                        <span class="text-red-600">@error('message_booking') {{ $message }} @enderror</span>
                        <div class="flex justify-center">
                            <button type="submit" class="mx-8 mt-6 px-7 py-2 text-xl md:mt-0 lg:text-base align-middle font-semibold border-2 text-gray-darker border-gray-darker rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-12">
            <div class="bg-red-400 col-span-4 sm:col-span-3 md:col-span-4 lg:col-span-3">
                <div class="mt-4 md:mt-0 mx-auto bg-white border-4 border-gray-dark rounded-full w-2/5 flex-shrink items-center z-10 transform -translate-y-0 md:-translate-y-24 md:w-4/5 lg:w-9/12">
                    <img class="object-cover" src="{{ asset($user->picture) }}" alt="picture of the user">
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
                                <a href="{{ route('my_bookings') }}" class="hover:text-sun">My bookings</a>
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
                        @if (auth()->user()->id !== $user->id && $user->role === 'Guide')
                            @if ($user->guide->pause === 1)
                                <a href="#" class="mx-28 mt-6 mb-3 md:mx-8 px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider bg-last bg-opacity-50 border-2 text-white text-opacity-75 border-last border-opacity-25 rounded-lg focus:ring-1 cursor-not-allowed">
                                    Contact me
                                </a>
                                <a href="#" class="mx-28 md:mx-8 my-2 px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider border-2 text-white text-opacity-75 bg-first bg-opacity-50 border-first border-opacity-25 rounded-lg focus:ring-1 cursor-not-allowed">
                                    Book a visit
                                </a>
                            @else 
                                <a href="#modal-contact" id="btn-contact" class="mx-28 mt-6 mb-3 md:mx-8 px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider bg-last border-2 text-white border-last rounded-lg focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                                    Contact me
                                <a href="#modal-booking" id="btn-booking" class="mx-28 md:mx-8 my-2 px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider border-2 text-white bg-first border-first rounded-lg focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                                    Book a visit
                                </a>
                            @endif
                            @if(is_null($likedGuide))
                                <form action="{{ route('like_guide', $user->id) }}" method="POST">
                                @csrf
                                @method('POST')  
                                    <button type="submit">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('dislike_guide', $likedGuide->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                    <button type="submit">
                                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        @endif
                    @endauth
                    <a href="{{ route('my_articles', $user->id) }}" class="mx-28 md:mx-8 mb-6 mt-3 w-42 px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider border-2 text-white bg-yellow-500 border-yellow-500 rounded-lg focus:ring-2 focus:ring-last cursor-pointer hover:shadow-lg hover:text-last">
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