
    @if (Route::has('login'))
        <div class="top-0 right-0 px-6 py-4 inline-block">
            @auth
                <!--<a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>-->
                <form method="POST" action="{{ route('logout') }}">
                    <button type="sumbit" class=" inline-block leading-none lg:mt-0 px-6 py-1 text-base align-middle font-semibold tracking-wider border-2 text-white border-gray-darker rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                        Log out
                    </button>
                    @csrf
                </form>
            @else
                <!--<a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>-->
                <a href="{{ route('login') }}" class="inline-block leading-none lg:mt-0 px-6 py-1 text-base align-middle font-semibold tracking-wider border-2 text-white border-gray-darker rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                    Log in
                </a>

                @if (Route::has('register'))
                    <!--<a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>-->
                    <a href="{{ route('register') }}" class="inline-block leading-none lg:mt-0 ml-4 px-7 py-1 text-base align-middle font-semibold tracking-wider border-2 text-white border-gray-darker rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                        Register
                    </a>
                @endif
            @endauth
        </div>
    @endif
