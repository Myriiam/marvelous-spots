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
         <!-- Answer Modal !!! TODO !!! -->
         <div id="modal-answer" class="bg-black bg-opacity-50 absolute inset-0 z-50 hidden justify-center items-center">
            <div class="bg-white rounded-lg py-3 px-4">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold text-last mx-5">Answer to ...</h3>
                    <svg id="close-modal-answer" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" 
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" 
                        clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <form action="#" method="POST" class="grid grid-cols-1">
                        @csrf
                        <input type="text" name="subject" id="subject" placeholder="Subject" class="bg-yellow-200 border-1 border-yellow-200 text-gray-dark mx-5 mt-5 rounded-md">
                        <textarea name="message" id="message" cols="70" rows="10" placeholder="Message" class="bg-yellow-200 border-1 border-yellow-200 mx-5 my-5 text-gray-dark rounded-md"></textarea>
                        <div class="flex justify-center">
                            <button type="submit" class="mx-8 mt-6 px-7 py-2 text-xl md:mt-0 lg:text-base align-middle font-semibold border-2 text-gray-darker border-gray-darker rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @auth
            @if (auth()->user()->id === $user->id && $user->role === 'Guide')
                <h2 class="font-extrabold text-3xl text-gray-darker">My offers</h2>
                <ul>
                    @foreach ($offersGuide as $offerGuide)
                        <!--if ($sentMessage->id === auth()->user()->id)-->
                            <li>{{ $offerGuide->message }} -  FROM: {{ $offerGuide->firstname }} 
                                <form action="{{ route('accept_offer', $offerGuide->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="inline-block font-bold text-white text-xl lg:text-base px-4 py-1 leading-none border rounded bg-green-600 hover:text-sun hover:bg-opacity-75 mt-4 lg:mt-0">
                                        Accept
                                    </button>
                                </form>
                                <form action="{{ route('refuse_offer', $offerGuide->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="inline-block font-bold text-white text-xl lg:text-base px-4 py-1 leading-none border rounded bg-red-600 hover:text-sun hover:bg-opacity-75 mt-4 lg:mt-0">
                                        Refuse
                                    </button>
                                </form>
                            </li>
                        <!--else
                            <p>No message</p>
                        endif-->
                    @endforeach
                </ul>
                <hr class="border-2 border-gray-dark">
            @endif
            <h2 class="font-extrabold text-3xl text-gray-darker">My bookings</h2>
            <ul> 
                @foreach ($reservationsUser as $reservationUser)
                    <li>
                        <div class="pb-20">
                            <a data-id="#" href="#" id="open-message" class="hover:bg-first hover:opacity-50 cursor-pointer">Booking TO: {{ $reservationUser->firstname }}</a>
                            @if (auth()->user()->id === $user->id)
                                <p>Status : <span class="text-blue-400 font-bold text-lg">{{ $reservationUser->status_demand }}</span></p>
                                <form action="#" method="#" class="inline-block">
                                    @csrf
                                    <button type="submit" class="inline-block font-bold text-white text-xl lg:text-base px-4 py-1 leading-none border rounded bg-red-600 hover:text-sun hover:bg-opacity-75 mt-4 lg:mt-0">Delete</button>
                                </form>
                            @endif
                            <div data-class="#" class="hidden justify-center">
                                <div class="grid grid-cols-1 px-5 py-5">
                                    <div class="flex justify-between mb-10">
                                        <p>A booking from ... send 25/06/2021(date)</p>
                                        <div class="flex">
                                            <svg data-href="close-content" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" 
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" 
                                                clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex justify-between mb-4">
                                        <p>{{ $reservationUser->message }}</p>
                                        <div>
                                            <a href="#" class="ml-4 text-xl lg:text-base px-4 py-1 leading-none border rounded bg-last text-white border-last hover:bg-opacity-75 hover:text-sun mt-4 lg:mt-0">
                                                Answer
                                            </a>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> 
                @endforeach
            </ul>
        @endauth
    </main>
</x-app-layout>