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
            @if (auth()->user()->id === $user->id && $user->role === 'Guide')
                <h2 class="font-extrabold text-3xl text-gray-darker pt-10 pl-4 pb-7">My offers</h2>
                <table class="border-collapse w-full mb-7">
                    <thead>
                        <tr>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Visit with</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">City</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Received on</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($offersGuide as $offerGuide)
                            <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Visit with</span>
                                    <a href="{{ route('profile', $offerGuide->userId) }}" class="font-semibold text-gray-dark underline">
                                        {{ $offerGuide->firstname }}
                                    </a>
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">City</span>
                                    <p class="font-semibold text-gray-dark">{{ $offerGuide->city }}</p>
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Received on</span>
                                    <p class="font-semibold text-gray-dark"> {{ Carbon\Carbon::parse($offerGuide->booked_at)->format('d/m/Y') }}</p>
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                                    <div class="flex space-x-3 justify-center">
                                        <a href="{{ route('show_offer', $offerGuide->id) }}" class="rounded bg-last py-1 px-3 text-xs font-bold text-white">Show</a>
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
                                </td>
                            </tr>
                            @empty
                                <p class="pt-7 font-semibold text-lg text-first mx-10">No offers for now</p>
                            @endforelse
                    </tbody>
                </table>
                <div class="px-5 flex flex-wrap justify-center py-3">
                    {{ $offersGuide->withQueryString()->links()}}
                </div>
            @endif

            @if (auth()->user()->id === $user->id)
                <h2 class="font-extrabold text-3xl text-gray-darker pt-5 pl-4 pb-7">My bookings</h2>
                <table class="border-collapse w-full mb-7">
                    <thead>
                        <tr>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Visit with</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">City</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Send on</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($userBookings as $reservationUser)
                            <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Visit with</span>
                                    <a href="{{ route('profile', $reservationUser->guide->user->id) }}" class="font-semibold text-gray-dark underline">
                                        {{ $reservationUser->guide->user->firstname }}
                                    </a>
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">City</span>
                                    <p class="font-semibold text-gray-dark">{{ $reservationUser->guide->user->city }}</p> 
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Send on</span>
                                    <p class="font-semibold text-gray-dark"> {{ Carbon\Carbon::parse($reservationUser->booked_at)->format('d/m/Y') }}</p>
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                                    <div class="flex space-x-3 justify-center">
                                        <div>
                                            <a href="{{ route('show_booking', $reservationUser->id) }}" class="rounded bg-last py-1 px-3 text-xs font-bold text-white">Show</a>
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
                                </td>
                            </tr>
                            @empty
                                <p class="pt-7 font-semibold text-lg text-first mx-10">No bookings for now</p>
                            @endforelse
                    </tbody>
                </table>
                <div class="px-5 flex flex-wrap justify-center py-3">
                    {{ $userBookings->withQueryString()->links()}}
                </div>
            @endif
        @endauth
    </main>
    <!-- scripts -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
</x-app-layout>