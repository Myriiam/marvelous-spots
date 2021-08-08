<footer class="bg-gradient-to-t from-first via-middle to-last text-white pt-0">
    <div class="max-w-full mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
        <div class="-mx-5 -my-2 flex flex-wrap justify-around" aria-label="Footer">
            <div class="px-5 py-2 text-center mb-10 lg:mb-0">
                <p class="text-2xl lg:text-lg font-semibold text-gray-darker pb-3">Who are we ?</p>
                <!--<p class="w-72 text-base text-white hover:text-sun">
                    Marvelous Spots is a platform that wants to make every trip an extraordinary adventure, 
                    off the beaten track. Because traveling is also about meeting other people... 
                    With us, you will see the world in a different way, who knows, maybe through the eyes of your guide!
                </p>-->
                <a href="#" class="w-72 text-xl lg:text-base text-white hover:text-sun grid grid-cols-1">
                    Marvelous Spots is a platform that wants to make every trip an extraordinary adventure, 
                    off the beaten track. Because traveling is also about meeting other people... 
                    With us, you will see the world in a different way, who knows, maybe through the eyes of your guide!
                </a>
            </div>
            <div class="px-5 py-2 grid grid-cols-1 gap-3.5 md:gap-0 lg:gap-0 text-center mb-10 lg:mb-0">
                <p class="text-2xl lg:text-lg font-semibold text-gray-darker">Informations</p>
                <a href="{{ route('register') }}" class="text-xl lg:text-base text-white hover:text-sun">Join the community</a>
                <a href="#" class="text-xl lg:text-base text-white hover:text-sun">FAQ</a>
                <a href="#" class="text-xl lg:text-base text-white hover:text-sun">Partners</a>
                <a href="#" class="text-xl lg:text-base text-white hover:text-sun">General terms and conditions</a>
                <a href="#" class="text-xl lg:text-base text-white hover:text-sun">Contact us</a>
            </div>
            <div class="px-5 py-4 text-center mb-10 lg:mb-0">
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    <button type="sumbit" class="px-7 py-1 text-xl lg:text-base align-middle font-semibold tracking-wider border-2 text-white border-gray-darker rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                        Log out
                    </button>
                    @csrf
                </form>
                @else 
                    <a href="{{ route('login') }}" class="px-7 py-1 text-xl lg:text-base align-middle font-semibold tracking-wider border-2 text-white border-gray-darker rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                        Log in
                    </a>
                @endauth
                <!--<p class="text-lg font-semibold text-gray-darker pb-3 pt-10">Languages/Currency</p>-->
                <form action="#" class="pt-10">
                    <label for="languages" class="text-2xl lg:text-lg font-semibold text-gray-darker">Language/Currency</label></br>
                    <select id="languages" class="py-1 text-xl lg:text-base text-gray-dark rounded-lg mt-3">
                        <option value="english" selected>English/£</option>
                        <option value="french">French/€</option>
                        <option value="spanish">Spanish/€</option>
                    </select>
                    @csrf
                </form> 
            </div>
            <div class="px-5 py-2 text-center">
                <!--<p class="text-lg font-semibold text-gray-darker pb-3">Newsletter</p>-->
                <form action="#">
                    <label for="newsletter" class="text-2xl lg:text-lg font-semibold text-gray-darker">Newsletter</label></br>
                    <input id="newsletter" class="text-xl lg:text-base text-gray-darker px-16 py-2 rounded-xl mt-3.5" name="newsletter"/></br>
                    <button type="sumbit" class="mt-1.5 px-7 py-1 text-xl lg:text-base align-middle font-semibold tracking-wider border text-white bg-gray-darker border-gray-darker rounded-full focus:ring-2 focus:ring-sun hover:shadow-lg hover:text-sun">
                        Subscribe
                    </button>
                    @csrf
                </form>
                <div class="flex flex-row justify-center pt-12">
                    <a href="https://www.instagram.com/likealocalguide" class="transform hover:scale-110 motion-reduce:transform-none">
                       <img class="h-16 w-16" src="{{ asset('images/instagram.png') }}" alt="instagram icon">
                    </a>
                    <a href="https://www.facebook.com/likealocalguide" class="transform hover:scale-110 motion-reduce:transform-none">
                        <img class="h-16 w-16" src="{{ asset('images/facebook.png') }}" alt="facebook icon">
                    </a>
                    <a href="https://www.pinterest.com/likealocalguide" class="transform hover:scale-110 motion-reduce:transform-none">
                        <img class="h-16 w-16" src="{{ asset('images/pinterest.png') }}" alt="pinterest icon">
                    </a>
                    <a href="https://twitter.com/likealocal" class="transform hover:scale-110 motion-reduce:transform-none">
                        <img class="h-16 w-16" src="{{ asset('images/twitter.png') }}" alt="twitter icon">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center text-gray-darker font-bold">&copy; Copyright 2021 | Marvelous Spots</div>
</footer>