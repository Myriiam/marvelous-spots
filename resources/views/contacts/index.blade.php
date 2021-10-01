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
    <main class="px-7">
         
        <h2 class="font-extrabold text-3xl text-gray-darker py-5 underline">Sent Messages</h2>
        <ul>
        @auth
            @forelse ($sentMessages as $sentMessage)
                <!--if ($sentMessage->id === auth()->user()->id)-->
                    <li>
                      
                        <div>
                            <div class="flex justify-between">
                                <a data-sent="{{ $sentMessage->id }}" href="#" id="open-message" class="font-semibold text-2xl text-gray-darker hover:bg-first hover:opacity-50 cursor-pointer">
                                    To : {{ $sentMessage->firstname }} 
                                </a>
                                <a data-sent="{{ $sentMessage->id }}" href="#" id="open-message" class="font-semibold text-lg text-gray-dark hover:bg-first hover:opacity-50 cursor-pointer">
                                    {{ Carbon\Carbon::parse($sentMessage->date)->format('d/m/Y')}}
                                </a>
                            </div>
                            <div>
                                <a data-sent="{{ $sentMessage->id }}" href="#" id="open-message" class="font-semibold text-lg text-gray-darker hover:bg-first hover:opacity-50 cursor-pointer">
                                    {{  ucfirst(Str::limit($sentMessage->subject,30)) }}
                                </a>
                            </div>
                        </div>
                        <div>
                            <a data-sent="{{ $sentMessage->id }}" href="#" id="open-message" class="text-gray-dark hover:bg-first hover:opacity-50 cursor-pointer">
                                {{ Str::limit($sentMessage->message,35) }}
                            </a>
                        </div>
                        @if (auth()->user()->id === $user->id)
                            <form action="{{ route('delete_message', $sentMessage->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="inline-block font-bold text-white text-xl lg:text-base px-4 py-1 leading-none border rounded bg-red-600 hover:text-sun hover:bg-opacity-75 mt-4 lg:mt-0">Delete</button>
                            </form>
                        @endif
                        <div data-sent="{{ $sentMessage->id }}" class="hidden">
                            <div class="flex-row py-5">
                                <p>{{ $sentMessage->message }}</p> 
                            </div>
                        </div>
                    </li>
                    <hr class="border border-gray-light my-3">
                @empty
                    <p class="pb-5">You haven't sent any message !</p>
                @endforelse
        @endauth
        </ul>
        <hr class="border-2 border-gray-dark">
        <h2 class="font-extrabold text-3xl text-gray-darker py-5 underline">Received Messages</h2>
        <ul>
            @auth   
                @forelse ($receivedMessages as $receivedMessage)
                    <!--if($receivedMessage->id === auth()->user()->id)  if le user a des messages reçu, sinon on écrit : aucun message -->
                        <li>
                            <div class="pb-7 flex-row">
                                <div>
                                    <div class="flex justify-between">
                                        <a data-id="{{ $receivedMessage->id }}" href="#" id="open-message" class="font-semibold text-2xl text-gray-darker hover:bg-first hover:opacity-50 cursor-pointer">
                                            {{ $receivedMessage->firstname }} 
                                        </a>
                                        <a data-id="{{ $receivedMessage->id }}" href="#" id="open-message" class="font-semibold text-lg text-gray-dark hover:bg-first hover:opacity-50 cursor-pointer">
                                            {{ Carbon\Carbon::parse($receivedMessage->date)->format('d/m/Y')}}
                                        </a>
                                    </div>
                                    <div>
                                        <a data-id="{{ $receivedMessage->id }}" href="#" id="open-message" class="font-semibold text-lg text-gray-darker hover:bg-first hover:opacity-50 cursor-pointer">
                                            {{  ucfirst(Str::limit($receivedMessage->subject,30)) }}
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <a data-id="{{ $receivedMessage->id }}" href="#" id="open-message" class="text-gray-dark hover:bg-first hover:opacity-50 cursor-pointer">
                                        {{ Str::limit($receivedMessage->message,35) }}
                                    </a>
                                </div>
                                <div class="flex-row pt-3">
                                @if (auth()->user()->id === $user->id)
                                    @if ($receivedMessage->status === 'unread')
                                        <form action="{{ route('status_updated', $receivedMessage->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PUT')   
                                            <button type="submit" class="mr-5 inline-block font-bold text-white text-xl lg:text-base px-4 py-1 leading-none border rounded bg-first hover:text-sun hover:bg-opacity-75 mt-4 lg:mt-0">Mark as read</button>
                                        </form>
                                    @else 
                                        <form action="{{ route('status_updated', $receivedMessage->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="inline-block font-bold text-white text-xl lg:text-base px-4 py-1 leading-none border rounded bg-first hover:text-sun hover:bg-opacity-75 mt-4 lg:mt-0">Mark as unread</button>
                                        </form>
                                    @endif
                                    <form action="{{ route('delete_message', $receivedMessage->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="inline-block font-bold text-white text-xl lg:text-base px-4 py-1 leading-none border rounded bg-red-600 hover:text-sun hover:bg-opacity-75 mt-4 lg:mt-0">Delete</button>
                                    </form>
                                @endif
                                </div>
                                <div data-id="{{ $receivedMessage->id }}" class="hidden">
                                    <div class="flex-row py-5">
                                        <div>
                                            <p>{{ $receivedMessage->message }}</p>
                                        </div>
                                        <div class="flex justify-center mt-5">
                                            <a href="#modal-contact" id="btnContact" data-btn="{{ $receivedMessage->id }}" class="text-xl lg:text-base px-6 py-1 leading-none border rounded bg-last text-white border-last hover:bg-opacity-75 hover:text-sun mt-4 lg:mt-0">
                                                Answer
                                            </a>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <hr class="border border-gray-light my-3">
                        </li> 
                         <!-- Modal answer -->
                        @if ($errors->has('subject') || $errors->has('message'))
                            <div id="modal-contact" data-modal="{{ $receivedMessage->id }}" class="bg-black bg-opacity-50 absolute inset-0 z-50 flex justify-center items-center">
                        @else 
                            <div id="modal-contact" data-modal="{{ $receivedMessage->id }}" class="bg-black bg-opacity-50 absolute inset-0 z-50 hidden justify-center items-center">
                        @endif
                            <div class="bg-white rounded-lg py-3 px-4">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-xl font-bold text-last mx-5">Answer to {{ $receivedMessage->firstname }}</h3>
                                    <svg id="close-modal" data-close="{{ $receivedMessage->id }}" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" 
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" 
                                        clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <form action="{{ route('answer', $receivedMessage->sender_id) }}" method="POST" class="grid grid-cols-1">
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
                @empty
                    <p class="pb-5">No message received for the moment !</p>
                @endforelse
            @endauth
        </ul>
    </main>
    <script src="{{ asset('js/answer-message.js') }}" defer></script>
</x-app-layout>