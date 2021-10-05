<x-app-layout>
    <x-slot name="header">
            <div class="relative h-32">
                <div class="absolute inset-x-0 top-0 h-32">
                    <img class="w-full h-full object-cover" src="{{ asset('images/header-profile.jpg') }}" alt="header for profile pages">
                    <div class="backdrop-filter backdrop-blur-xs absolute inset-0 bg-gray-400 bg-opacity-50 mix-blend-multiply" aria-hidden="true"></div>
                </div>
                <div class="text-center relative max-w-7xl ml-2 lg:ml-40 xl:ml-72">
                    <h2 class="text-yellow-700 max-w-3xl transform translate-y-5 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">Editing Form Profile</h2>
                </div>
            </div>
    </x-slot>
    <main>
        <div class="flex justify-center">
            <div class="bg-gray-lighter rounded-md py-5 px-5 overflow-x-hidden md:my-5 md:mx-5">
                <form method="POST" action="{{ route('update_my_profile') }}" enctype="multipart/form-data" class="grid grid-cols-1 justify-items-center">
                    @csrf
                    @method('PUT') 
                    <div class="grid md:grid-cols-2 sm:grid-cols-1"> 
                        <div class="pb-5">
                            <label for="pictureProfile" class="mr-3 font-semibold text-gray-darker sm:block md:inline">Picture*</label>
                            <input type="file" name="picture" id="pictureProfile" class="lg:text-base text-gray-dark rounded-lg mt-3">
                            <span class="text-red-600">@error('picture') {{ $message }} @enderror</span>
                        </div>     
                        <div class="grid gap-y-5 md:gap-y-0">   
                            <div>
                                <label for="firstname" class="mr-3 mt-10 font-semibold text-gray-darker">Firstname*</label> 
                                <input type="text" id="firstname" name="firstname" class="w-full md:w-auto lg:text-base text-gray-dark rounded-lg mt-3" value="{{ $user->firstname }}" disabled>
                            </div>        
                            <div>
                                <label for="lastname" class="mr-3 font-semibold text-gray-darker">Lastname*</label> 
                                <input type="text" id="lastname" name="lastname" class="w-full md:w-auto lg:text-base text-gray-dark rounded-lg mt-3" value="{{ $user->lastname }}" disabled>
                            </div>        
                            <div class="sm:mt-2 md:mt-0">
                                <label for="email" class="mr-10 font-semibold text-gray-darker">Email*</label> 
                                <input type="email" id="email" name="email" class="w-full md:w-auto lg:text-base text-gray-dark rounded-lg mt-3" value="{{ $user->email }}" disabled>
                            </div>        
                            <div class="sm:mt-10 md:mt-0">
                                <label for="birthdate" class="mr-3 font-semibold text-gray-darker">Birthdate*</label>
                                <input type="text" id="birthdate" name="birthdate" class="w-full md:w-auto lg:text-base text-gray-dark rounded-lg mt-3" value="{{ $birthdate }}" disabled>
                            </div> 
                        </div>      
                    </div> 
                    <div class="md:flex md:flex-row md:space-x-10 sm:grid sm:grid-cols-1 mt-5 md:mt-10">
                        <div class="">
                            <label for="country" class="mr-3 pt-5 font-semibold text-gray-darker">Country where you live*</label>
                            <select name="country" id="country" class="py-1 text-xl lg:text-base text-gray-dark rounded-lg mt-3">
                                <option value="{{ $user->country }}" selected></option>
                            </select>
                        </div>        
                        <div class="mt-3 md:mt-0">
                            <label for="city" class="mr-3 pt-5 font-semibold text-gray-darker">City where you live*</label> 
                            <select name="city" id="city" class="py-1 text-xl lg:text-base text-gray-dark rounded-lg mt-3">
                                <option value="{{ $user->city }}" selected></option>
                            </select>
                        </div> 
                    </div>
                    @if ($user->role === 'Guide')
                        <div class="md:flex md:flex-row md:space-x-20 sm:grid sm:grid-cols-1 md:mt-5 md:mt-10">
                            <div class="grid grid-cols-1 justify-items-center">
                                <label for="languages" class="block pt-5 font-semibold text-gray-darker">The languages you speak*</label> 
                                <select id="languages" name="languages[]" class="py-1 text-xl lg:text-base text-gray-dark rounded-lg mt-3" multiple>
                                @foreach ($languages as $language)   
                                        <option value="{{ $language->id }}" {{ in_array($language->id, $selectedLang) ? "selected" : "" }}>{{ $language->language }}</option> 
                                @endforeach
                                </select>
                                <span class="text-red-600">@error('languages') {{ $message }} @enderror</span> <!-- je met l'erreur ou sinon pas de option select language(s) mais alors la langue par défaut EN et la personne ajoute ou non 1 autre langue mais min 1 langue à choisir dans le select, l'anglais y sera selectionné par défaut !-->
                            </div>   
                            <div class="grid grid-cols-1 justify-items-center">
                                <label for="categories" class="block pt-5 font-semibold text-gray-darker">What's your interests ?*</label> <!-- multiple -->
                                <select name="categories[]" id="categories" multiple class="py-1 text-xl lg:text-base text-gray-dark rounded-lg mt-3">
                                @foreach ($categories as $category)   
                                        <option value="{{ $category->id }}" {{ in_array($category->id, $selectedCat) ? "selected" : "" }}>{{ $category->name }}</option> 
                                @endforeach
                                </select>
                                <span class="text-red-600">@error('categories') {{ $message }} @enderror</span>
                            </div>  
                        </div>
                    @endif
                    <div class="grid">
                        <label for="about" class="block pt-5 font-semibold text-gray-darker">About you*</label> 
                        <textarea id="about" name="about" cols="100" rows="10" class="lg:text-base text-gray-dark rounded-lg mt-3">{{ $user->about_me }}</textarea>
                        <span class="text-red-600">@error('about') {{ $message }} @enderror</span>
                    </div>    
                    @if ($user->role === 'Guide')
                        <div class="grid">
                            <label for="definition" class="block pt-5 font-semibold text-gray-darker">Your definition of travel</label> 
                            <textarea name="definition" cols="100" rows="10" class="lg:text-base text-gray-dark rounded-lg mt-3">{{ $user->guide->travel_definition }}</textarea> 
                            <span class="text-red-600">@error('definition') {{ $message }} @enderror</span>
                        </div>        
                        <div class="grid">
                            <label for="offering" class="block pt-5 font-semibold text-gray-darker">What can you propose (your offers) ?*</label>
                            <textarea name="offering" cols="100" rows="10" class="lg:text-base text-gray-dark rounded-lg mt-3">{{ $user->guide->offering }}</textarea>
                            <span class="text-red-600">@error('offering') {{ $message }} @enderror</span>
                        </div>  
                        <div class="grid grid-cols-1 md:grid-cols-2 pt-5">   
                            <div>
                                <label for="price" class="pt-5 font-semibold text-gray-darker">Price (for ex: 12.5 or 11)</label>
                                <input name="price" class="lg:text-base text-gray-dark rounded-lg mt-3" value="{{ $user->guide->price }}">
                                <span class="text-red-600">@error('price') {{ $message }} @enderror</span>
                            </div>        
                            <div>
                                <p class="pt-5 font-semibold text-gray-darker">Pause mode</p>
                                <label for="no">No</label> <!-- RADIO --> <!-- FALSE by default -->
                                <input name="pauseChoice" id="no" type="radio" value=0 checked>
                                <label for="yes">Yes</label>
                                <input name="pauseChoice" id="yes" type="radio" value=1>
                                <span class="text-red-600">@error('pauseChoice') {{ $message }} @enderror</span> <!--indiquer slmt oui ou non car on pourrait modifier dans le html meme si dans la table c'est un boolean -->
                                <p class="text-sm italic">It means that you want to suspend your services (for as long as you want).<br> 
                                    This way you inform the users that you are not available.</p>
                            </div> 
                        </div>   
                    @endif
                    <button type="submit" value="submit" class="mt-12 px-7 py-2 text-xl md:mt-10 lg:text-base align-middle font-semibold tracking-wider border-2 text-gray-darker border-gray-darker rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">Save</button>
                </form>
                <div class="grid grid-cols-1 justify-items-center mt-5">
                    <a href="{{ route('profile', $user->id) }}" class="px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider border-2 text-white border-first bg-first rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/country-city.js') }}" defer></script>
</x-app-layout>