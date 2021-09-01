<x-app-layout>
    <x-slot name="header">
            <div class="relative">
                <div class="absolute inset-0">
                    <img class="w-full h-full object-cover" src="{{ asset('images/header-profile.jpg') }}" alt="header for profile pages">
                    <div class="backdrop-filter backdrop-blur-xs absolute inset-0 bg-gray-400 bg-opacity-50 mix-blend-multiply" aria-hidden="true"></div>
                </div>
                <div class="text-center relative max-w-7xl ml-2 lg:ml-40 xl:ml-72">
                    <h2 class="text-yellow-700 max-w-3xl transform translate-y-5 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">Editing Form Profile</h2>
                </div>
            </div>
    </x-slot>
    <main class="bg-pink-200">
        <form method="POST" action="{{ route('update_my_profile') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')   
            <div>
                <label for="pictureProfile">Picture</label> <!-- UPLOAD --> <!-- require - pas de champs vide -->
                <input type="file" name="picture" id="pictureProfile" class="lg:text-base text-gray-dark rounded-lg mt-3">
                <span class="text-red-600">@error('picture') {{ $message }} @enderror</span>
            </div>        
            <div>
                <label for="firstname">Firstname</label> <!-- require - pas de champs vide -->
                <input type="text" id="firstname" name="firstname" class="lg:text-base text-gray-dark rounded-lg mt-3" value="{{ $user->firstname }}" disabled>
            </div>        
            <div>
                <label for="lastname">Lastname</label> <!-- require - pas de champs vide -->
                <input type="text" id="lastname" name="lastname" class="lg:text-base text-gray-dark rounded-lg mt-3" value="{{ $user->lastname }}" disabled>
            </div>        
            <div>
                <label for="email">Email</label> <!-- require - pas de champs vide -->
                <input type="email" id="email" name="email" class="lg:text-base text-gray-dark rounded-lg mt-3" value="{{ $user->email }}" disabled>
            </div>        
            <div>
                <label for="birthdate">Birthdate</label> <!-- require - pas de champs vide -->
                <input type="text" id="birthdate" name="birthdate" class="lg:text-base text-gray-dark rounded-lg mt-3" value="{{ $birthdate }}" disabled>
            </div>       
            <!--MODIFIER SON MOT DE PASSE : fonctionnalité à ajouter ici en plus du form login-->
            <div>
                <label for="country">Country where you live</label> <!-- SELECT --> <!-- require - pas de champs vide -->
                <select name="country" id="country" class="py-1 text-xl lg:text-base text-gray-dark rounded-lg mt-3">
                    <option value="{{ $user->country }}" selected></option>
                </select>
            </div>        
            <div>
                <label for="city">City where you live</label> <!-- SELECT --> <!-- require - pas de champs vide -->
                <select name="city" id="city" class="py-1 text-xl lg:text-base text-gray-dark rounded-lg mt-3">
                    <option value="{{ $user->city }}" selected></option>
                </select>
            </div> 
            @if ($user->role === 'Guide')
                <div>
                    <label for="languages">The languages you speak</label> <!-- SELECT MULTI--> <!-- require - pas de champs vide -->
                    <select id="languages" name="languages[]" class="py-1 text-xl lg:text-base text-gray-dark rounded-lg mt-3" multiple>
                    @foreach ($languages as $language)   
                            <option value="{{ $language->id }}" {{ in_array($language->id, $selectedLang) ? "selected" : "" }}>{{ $language->language }}</option> 
                    @endforeach
                    </select>
                    <span class="text-red-600">@error('languages') {{ $message }} @enderror</span> <!-- je met l'erreur ou sinon pas de option select language(s) mais alors la langue par défaut EN et la personne ajoute ou non 1 autre langue mais min 1 langue à choisir dans le select, l'anglais y sera selectionné par défaut !-->
                </div>   
            @endif
            <div>
                <label for="about">About you</label> <!-- require si guide - pas de champs vide  ?-->
                <textarea id="about" name="about" cols="100" rows="10" class="lg:text-base text-gray-dark rounded-lg mt-3">{{ $user->about_me }}</textarea>
                <span class="text-red-600">@error('about') {{ $message }} @enderror</span>
            </div>    
            @if ($user->role === 'Guide')
                <div>
                    <label for="categories">What's your interests ?</label> <!-- multiple -->
                    <select name="categories[]" id="categories" multiple class="py-1 text-xl lg:text-base text-gray-dark rounded-lg mt-3">
                    @foreach ($categories as $category)   
                            <option value="{{ $category->id }}" {{ in_array($category->id, $selectedCat) ? "selected" : "" }}>{{ $category->name }}</option> 
                    @endforeach
                    </select>
                    <span class="text-red-600">@error('categories') {{ $message }} @enderror</span>
                </div>  
                <div>
                    <label for="definition">Your definition of travel</label> <!-- require si guide - pas de champs vide ? -->
                    <textarea name="definition" cols="100" rows="10" class="lg:text-base text-gray-dark rounded-lg mt-3">{{ $user->guide->travel_definition }}</textarea> 
                    <span class="text-red-600">@error('definition') {{ $message }} @enderror</span>
                </div>        
                <div>
                    <label for="offering">What can you propose (your offers) ?</label> <!-- require si guide - pas de champs vide ? -->
                    <textarea name="offering" cols="100" rows="10" class="lg:text-base text-gray-dark rounded-lg mt-3">{{ $user->guide->offering }}</textarea>
                    <span class="text-red-600">@error('offering') {{ $message }} @enderror</span>
                </div>        
                <div>
                    <label for="price">Price (for ex: 12.5 or 11)</label> <!-- require si guide - pas de champs vide ? -->
                    <input name="price" class="lg:text-base text-gray-dark rounded-lg mt-3" value="{{ $user->guide->price }}">
                    <span class="text-red-600">@error('price') {{ $message }} @enderror</span>
                </div>        
            @endif
           <!--  <div>
               <p>Social Media</p>  NOT REQUIRE 
                <div>
                    <label for="">Instagram</label>
                    <input type="text" name="instagram" value="#">
                </div>
                <div>
                    <label for="">Facebook</label>
                    <input type="text" name="facebook" value="#">
                </div>
                <div>
                    <label for="">Pinterest</label>
                    <input type="text" name="pinterest" value="#">
                </div>
                <div>
                    <label for="">Twitter</label>
                    <input type="text" name="twitter" value="#">
                </div>
            </div>    -->  
            @if ($user->role === 'Guide') 
                <div>
                    <p>Pause mode</p>
                    <label for="no">No</label> <!-- RADIO --> <!-- FALSE by default -->
                    <input name="pauseChoice" id="no" type="radio" value=0 checked>
                    <label for="yes">Yes</label>
                    <input name="pauseChoice" id="yes" type="radio" value=1>
                    <span class="text-red-600">@error('pauseChoice') {{ $message }} @enderror</span> <!--indiquer slmt oui ou non car on pourrait modifier dans le html meme si dans la table c'est un boolean -->
                    <p>It means that you want to suspend your services (for as long as you want). 
                        This way you inform the users that you are not available.</p>
                </div> 
            @endif
            <button type="submit" value="submit" class="mt-6 px-7 py-2 text-xl md:mt-0 lg:text-base align-middle font-semibold tracking-wider border-2 text-gray-darker border-gray-darker rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">Save</button>
        </form>
        <a href="{{ route('profile', $user->id) }}" class="px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider border-2 text-white border-first bg-first rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
            Back
        </a>
    </main>
    <script src="{{ asset('js/country-city.js') }}" defer></script>
</x-app-layout>