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
        <h2 class="font-extrabold">Messages envoyés</h2>
        <ul>
            @foreach ($sentMessages as $sentMessage)
                <li>{{ $sentMessage->subject }} -  {{ $sentMessage->message}}</li>
            @endforeach
        </ul>
        <hr>
        <h2 class="font-extrabold">Messages recus</h2>
        <ul>
            @foreach ($receivedMessages as $receivedMessage)
                <li>{{ $receivedMessage->subject }} -  {{ $receivedMessage->message}} 
                    <a href="#" class="inline-block mr-2 text-xl lg:text-base px-4 py-2 leading-none border rounded bg-last text-white border-last hover:text-sun mt-4 lg:mt-0">
                        Answer
                    </a>
                </li>
            @endforeach
        </ul>
    </main>
</x-app-layout>