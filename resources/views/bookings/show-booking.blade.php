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
        @auth
            @if (auth()->user()->id === $user->id)
                <div class="min-w-screen min-h-screen bg-white flex items-center p-5 lg:p-10 overflow-hidden relative">
                    <div class="w-full max-w-6xl rounded bg-white border-2 border-yellow-300 shadow-xl p-8 lg:p-16 mx-auto text-gray-800 relative md:text-left">
                    <h1 class="text-center font-bold text-4xl pb-10">Details of your booking</h1>
                        <div class="md:flex items-center -mx-10">
                            <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                                <div class="relative">
                                    <img src="{{ asset('images/travel.jpg') }}" class="w-full relative z-10 rounded-lg" alt="luggage image for the details of a booking page">
                                    <div class="border-4 border-yellow-200 absolute top-10 bottom-10 left-10 right-10 z-0"></div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-10">
                                <div class="mb-10">
                                   <!-- <h1 class="font-bold uppercase text-2xl mb-5">Mens's Ragged <br>Waterproof Jacket</h1>
                                    <p class="text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Eos, voluptatum dolorum! Laborum blanditiis consequatur, voluptates, sint enim fugiat saepe, dolor fugit, magnam explicabo eaque quas id quo porro dolorum facilis...
                                         <a href="#" class="opacity-50 text-gray-900 hover:opacity-100 inline-block text-xs leading-none border-b border-gray-900">MORE <i class="mdi mdi-arrow-right"></i>
                                        </a>
                                    </p>-->
                                    <p><span class="font-semibold text-xl">Booking with the guide : </span><span class="text-xl">{{ $booking->guide->user->firstname }}</span></p>
                                    <p><span class="font-semibold text-xl">Send on : </span><span class="text-xl">{{ Carbon\Carbon::parse($booking->booked_at)->format('d/m/Y') }}</span></p>
                                    <p class="mt-10 font-semibold text-xl">Message</p>
                                    <p class="text-xl">{{ $message }}</p>
                                    <p class="text-xl font-semibold mt-10">Details</p>
                                    <ul>
                                        <li class="text-xl">Date of the visit : {{ Carbon\Carbon::parse($booking->visit_date)->format('d/m/Y') }}</li>
                                        <li class="text-xl">Number of hours : {{ $booking->nb_hours}} h</li>
                                        <li class="text-xl">Number of people : {{ $booking->nb_person}}</li>
                                        @if ($booking->status_demand === 'booked')
                                            <li class="text-xl">Total price : {{ $booking->total_price}} €</li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="flex space-x-4 justify-center">
                                    <div class="inline-block align-bottom">
                                        <div>
                                            @if ($booking->status_demand === 'paiement')
                                                <div>
                                                    <form action="{{ route('stripe_payment', $booking->id) }}" method="POST" class="inline-block">
                                                        @csrf
                                                        <script
                                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                            data-key="{{ env('STRIPE_KEY') }}"
                                                            data-amount="{{ $booking->total_price * 100}}"
                                                            data-name="Payment"
                                                            data-description="You want to book a visit with {{ $booking->guide->user->firstname }}"
                                                            data-image="{{ asset('images/logo.png') }}"
                                                            data-locale="auto"
                                                            data-currency="eur">
                                                        </script>
                                                    </form>
                                                </div>
                                            @else 
                                                <div>
                                                    <p>Status : <span class="text-blue-400 font-bold text-lg">{{ $booking->status_demand }}</span></p>
                                                </div>
                                            @endif
                                        </div> 
                                    </div>
                                    <div class="inline-block">
                                        <a href="{{ route('my_bookings') }}" class="bg-first hover:opacity-100 text-white hover:text-sun rounded-full px-7 py-2 font-semibold"> 
                                            Back
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endauth
    </main>
    <!-- scripts -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
</x-app-layout>