<x-app-layout>
    <x-slot name="header">
            <div class="relative h-32">
                <div class="absolute inset-x-0 top-0 h-32">
                    <img class="w-full h-full object-cover" src="{{ asset('images/header-article.jpg') }}" alt="header for article pages">
                   <!-- <div class="backdrop-filter backdrop-blur-xs absolute inset-0 bg-gray-400 bg-opacity-50 mix-blend-multiply" aria-hidden="true"></div>-->
                </div>
                <div class="text-center relative max-w-7xl ml-2 lg:ml-40 xl:ml-72">
                    <h2 class="text-yellow-700 max-w-3xl text-center transform translate-y-10 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                        {{ __('Write an article') }}
                    </h2>
                </div>
            </div>
    </x-slot>
    <main class="bg-pink-200">
            <h3 class="font-extrabold text-center text-3xl text-last">Share what you like about {{ $user->city }}. <br>What is your favorite spot?</h3>
        <form method="POST" action="{{ route('add_article') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')   
                <div>
                    <label for="categories">Choose related categories</label> <!-- require -->
                    <select name="categories[]" id="categories" multiple class="py-1 text-xl lg:text-base text-gray-dark rounded-lg mt-3">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option> 
                    @endforeach
                    </select>
                    <span class="text-red-600">@error('categories') {{ $message }} @enderror</span>
                </div>       
                <div class="flex">
                    <div>
                        <label for="latitude">Latitude</label> 
                        <input type="text" name="latitude" id="latitude" class="lg:text-base text-gray-dark rounded-lg mt-3">
                        <span class="text-red-600">@error('latitude') {{ $message }} @enderror</span>
                    </div>
                    <div>
                        <label for="longitude">Longitude</label> 
                        <input type="text" name="longitude" id="longitude" class="lg:text-base text-gray-dark rounded-lg mt-3">
                        <span class="text-red-600">@error('longitude') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div>
                    <label for="title">Title</label> 
                    <input type="text" name="title" id="title" class="lg:text-base text-gray-dark rounded-lg mt-3">
                    <span class="text-red-600">@error('title') {{ $message }} @enderror</span>
                </div>
                <div>
                    <label for="subtitle">Subtitle</label> 
                    <input type="text" name="subtitle" id="subtitle" class="lg:text-base text-gray-dark rounded-lg mt-3">
                    <span class="text-red-600">@error('subtitle') {{ $message }} @enderror</span>
                </div>
                <div>
                    <label for="description">Description</label> 
                    <textarea name="description" id="description" cols="70" rows="10" class="lg:text-base text-gray-dark rounded-lg mt-3"></textarea>
                    <span class="text-red-600">@error('description') {{ $message }} @enderror</span>
                </div>
                <div>
                    <label for="pictures">Add pictures</label> 
                    <input type="file" name="pictures[]" id="pictures" multiple class="lg:text-base text-gray-dark rounded-lg mt-3">
                    <span class="text-red-600">@error('pictures') {{ $message }} @enderror</span>
                </div>
                <div>
                    <div>
                        <p class="text-last text-center font-bold">{{__('Additional informations')}}</p>
                    </div>
                    <div class="flex justify-around">
                        <div>
                            <label for="website">website</label> 
                            <input type="text" name="website" id="website" class="lg:text-base text-gray-dark rounded-lg mt-3">
                            <span class="text-red-600">@error('website') {{ $message }} @enderror</span>
                        </div>
                        <div>
                            <label for="phone">phone</label> 
                            <input type="text" name="phone" id="phone" class="lg:text-base text-gray-dark rounded-lg mt-3">
                            <span class="text-red-600">@error('phone') {{ $message }} @enderror</span>
                        </div>
                        <div>
                            <label for="address">Address</label> <!-- Si pas de map, sinon sera écrit sur la carte au niveau de l'indicateur-->
                            <input type="text" name="address" id="address" class="lg:text-base text-gray-dark rounded-lg mt-3">
                            <span class="text-red-600">@error('address') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="grid-cols-1 text-center py-6">
                    <button type="submit" value="submit" class="mt-6 px-7 py-2 text-xl md:mt-0 lg:text-base align-middle font-semibold tracking-wider border-2 text-white border-last bg-last rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                        Add the article
                    </button>
                    </div>
                </div>
        </form>

    </main>
</x-app-layout>