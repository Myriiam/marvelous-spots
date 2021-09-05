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
                <h2 class="font-extrabold text-3xl text-gray-darker pt-5 pl-4">My offers</h2>
                <ul>
                    @forelse ($offersGuide as $offerGuide)
                        <!--if ($sentMessage->id === auth()->user()->id)-->
                            <li>
                                <div class="flex space-x-80 mx-10 py-5 justify-center">
                                    <div>
                                        <p>Visit with <a href="{{ route('profile', $offerGuide->userId) }}" class="pr-20 font-semibold text-gray-dark underline">{{ $offerGuide->firstname }}</a> City : <span class="pr-20 font-semibold text-gray-dark">{{ $offerGuide->city }}</span> 
                                            Received on :<span class="font-semibold text-gray-dark"> {{ Carbon\Carbon::parse($offerGuide->booked_at)->format('d/m/Y') }}</span>
                                        </p>
                                    </div>
                                    <div class="flex space-x-1">
                                        <div>
                                            <a href="" class="inline-block font-bold text-white text-xl lg:text-base px-4 py-1 leading-none border rounded bg-last hover:text-sun hover:bg-opacity-75 mt-4 lg:mt-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div>
                                            @if ($offerGuide->status_demand === 'pending')
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
                                            @elseif ($offerGuide->status_offer === 'waiting for paiement')
                                                <p>Status : <span class="text-blue-400 font-bold text-lg">{{ $offerGuide->status_offer }}</span></p>
                                            @elseif ($offerGuide->status_offer === 'booked')
                                                <p>Status : <span class="text-blue-400 font-bold text-lg">{{ $offerGuide->status_offer }}</span></p>
                                            @elseif ($offerGuide->status_offer === 'refused')
                                                <p>Status : <span class="text-blue-400 font-bold text-lg">{{ $offerGuide->status_offer }}</span></p>
                                            
                                            @endif
                                        </div>   
                                    </div>
                                </div> 
                            </li>
                    @empty
                        <p class="pt-7 font-semibold text-lg text-first mx-10">No offers for now</p>
                    @endforelse
                </ul>
                <div class="px-5 flex flex-wrap justify-center py-3">
                    {{ $offersGuide->withQueryString()->links()}}
                </div>
                <hr class="border border-gray-dark">
            @endif
            @if (auth()->user()->id === $user->id)
                <h2 class="font-extrabold text-3xl text-gray-darker pt-5 pl-4">My bookings</h2>
                <ul> 
                    @forelse ($userBookings as $reservationUser)
                        <li>
                            <div class="pb-5 flex space-x-80 mx-14 py-5">
                                <div>
                                    <p>Visit with <a href="{{ route('profile', $reservationUser->guide->user->id) }}" class="pr-20 font-semibold text-gray-dark underline">{{ $reservationUser->guide->user->firstname }}</a> City : <span class="pr-20 font-semibold text-gray-dark">{{ $reservationUser->guide->user->city }}</span> 
                                        Received on :<span class="font-semibold text-gray-dark"> {{ Carbon\Carbon::parse($reservationUser->booked_at)->format('d/m/Y') }}</span>
                                    </p>
                                    
                                <!--    <a data-id="#" href="#" id="open-message" class="hover:bg-first hover:opacity-25 cursor-pointer pr-20 font-semibold text-gray-dark">
                                        Visit with : {{ $reservationUser->guide->user->firstname }}
                                    </a> -->
                                </div>
                                <div class="flex space-x-4">
                                    <div>
                                        <a data-id="#" href="#" id="open-message" class="inline-block font-bold text-white text-xl lg:text-base px-4 py-1 leading-none border rounded bg-last hover:text-sun hover:bg-opacity-75 mt-4 lg:mt-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    </div>
                               
                                    @if ($reservationUser->status_demand === 'paiement')
                                        <div>
                                            <form action="{{ route('stripe_payment', $reservationUser->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                <!--<button type="submit" class="inline-block font-bold text-white text-xl lg:text-base px-4 py-1 leading-none border rounded bg-blue-700 hover:text-sun hover:bg-opacity-75 mt-4 lg:mt-0">
                                                    Paiement{{ $reservationUser->status_demand }}
                                                </button>-->
                                                <script
                                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                    data-key="{{ env('STRIPE_KEY') }}"
                                                    data-amount="{{ $reservationUser->total_price * 100}}"
                                                    data-name="Payment"
                                                    data-description="You want to book a visit with {{ $reservationUser->guide->user->firstname }}"
                                                    data-image="{{ asset('images/logo.png') }}"
                                                    data-locale="auto"
                                                    data-currency="eur">
                                                </script>
                                            </form>
                                        </div>
                                    @else 
                                        <div>
                                            <p>Status : <span class="text-blue-400 font-bold text-lg">{{ $reservationUser->status_demand }}</span></p>
                                        </div>
                                    @endif
                                </div>
                             <!--   <div data-class="#" class="hidden justify-center">
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
                                </div>-->
                            </div>
                        </li> 
                    @empty
                        <p class="pt-5 font-semibold text-lg text-first mx-10 py-5">No bookings for now</p>
                    @endforelse
                </ul>
                <div class="px-5 flex flex-wrap justify-center">
                    {{ $userBookings->withQueryString()->links()}}
                </div>
            @endif
        @endauth
    </main>
    <!-- scripts -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
</x-app-layout>