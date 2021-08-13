<nav class="flex items-center justify-between flex-wrap p-2 bg-gradient-to-b from-first via-middle to-last sticky top-0 z-50">
  <!--<div class="flex w-20 flex-shrink-0">
  </div>-->
  <div class="block lg:hidden">
    <button id='boton' class="flex items-center px-3 py-2 border-2 rounded text-white hover:border-sun transform hover:scale-110 motion-reduce:transform-none">
        <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Hamburger</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
    </button>
  </div>
  <div id='menu' class="w-full h-screen flex-grow lg:flex lg:items-center sm:h-auto lg:w-auto hidden lg:block">
    @auth
    <div class="text-xl lg:text-base text-white text-center pl-7 lg:flex-grow ">
    @else
    <div class="text-xl lg:text-base text-white text-center pl-7 lg:flex-grow lg:pl-20">
    @endauth
        <a href="{{ route('welcome') }}" class="block mt-4 transform hover:scale-110 motion-reduce:transform-none transform -translate-y-5 lg:inline-block lg:mt-0 hover:text-sun mr-8">
            Home
        </a>
        <a href="#responsive-header" class="block mt-4 transform hover:scale-110 motion-reduce:transform-none transform -translate-y-5 lg:inline-block lg:mt-0 hover:text-sun mr-8">
            About us
        </a>
        <a href="#responsive-header" class="block mt-4 transform hover:scale-110 motion-reduce:transform-none transform -translate-y-5 lg:inline-block lg:mt-0 hover:text-sun mr-8">
            Blog
        </a>
        <!-- Logo -->
        <a href="{{ route('welcome') }}" class="lg:inline-block lg:mt-0 hidden lg:block mr-8">
            <img class="w-20" src="{{ asset('images/logo.png') }}" alt="logo de Marvelous Spots">    
        </a>
        <!-- -->
        <a href="#responsive-header" class="block mt-4 transform hover:scale-110 motion-reduce:transform-none transform -translate-y-5 lg:inline-block lg:mt-0 hover:text-sun mr-8">
            Resources
        </a>
        <a href="#responsive-header" class="block mt-4 transform hover:scale-110 motion-reduce:transform-none transform -translate-y-5 lg:inline-block lg:mt-0 hover:text-sun mr-8">
            Contact
        </a>
        @auth
            <a href="{{ route('profile', auth()->user()->id) }}" class="block mt-4 transform hover:scale-110 motion-reduce:transform-none transform -translate-y-5 lg:inline-block lg:mt-0 hover:text-sun mr-8">
                My profile
            </a>
            <a href="#responsive-header" class="py-4 lg:py-0 lg:mb-2.5 inline-block mr-8 mr-16 lg:mr-8 transform hover:scale-110 motion-reduce:transform-none">
                <img src="{{ asset('images/article.png') }}" class="lg:h-8 lg:w-9 h-10 w-11">
            </a>
            <a href="{{ route('my_inbox') }}" class="py-4 lg:py-0 lg:mb-2.5 inline-block mr-5 lg:mr-0 transform hover:scale-110 motion-reduce:transform-none">
                <img src="{{ asset('images/message.png') }}" class="lg:h-8 lg:w-9 h-10 w-11">
            </a>
        @endauth
    </div>
    <!-- Login/Logout/Registration part -->
    <div class="text-center">
    @if (Route::has('login'))
        <div class="top-0 px-6 py-4 sm:inline-block">
            @auth
                <!--<a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>-->
                <form method="POST" action="{{ route('logout') }}">
                    <button type="sumbit" class="inline-block leading-none lg:mt-0 px-7 py-2 lg:px-4 text-xl lg:text-base align-middle font-semibold tracking-wider border-2 text-white border-gray-darker rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                        Log out
                    </button>
                    @csrf
                </form>
            @else
                <!--<a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>-->
                <a href="{{ route('login') }}" class="inline-block mr-2 text-xl lg:text-base px-4 py-2 leading-none border rounded text-white border-white hover:border-sun hover:text-sun mt-4 lg:mt-0">
                    Log in
                </a>
                @if (Route::has('register'))
                    <!--<a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>-->
                    <a href="{{ route('register') }}" class="inline-block ml-2 text-xl lg:text-base px-4 py-2 leading-none border rounded text-white border-white hover:border-sun hover:text-sun mt-4 lg:mt-0">
                        Register
                    </a>
                @endif
            @endauth
        </div>
    @endif
     <!--<a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Download</a>
     <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Download</a>-->
    </div>
  </div>
  
</nav>