<x-app-layout>
    <x-slot name="header">
            <div class="relative h-32">
                <div class="absolute inset-x-0 top-0 h-32">
                    <img class="w-full h-full object-cover" src="{{ asset('images/header-article.jpg') }}" alt="header for article pages">
                   <!-- <div class="backdrop-filter backdrop-blur-xs absolute inset-0 bg-gray-400 bg-opacity-50 mix-blend-multiply" aria-hidden="true"></div>-->
                </div>
                <div class="text-center relative max-w-7xl ml-2 lg:ml-40 xl:ml-72">
                    <h2 class="text-yellow-700 max-w-3xl text-center transform translate-y-10 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                        {{ __('Article editing form') }}
                    </h2>
                </div>
            </div>
    </x-slot>
    <main>
        @auth
            @if(auth()->user()->id === $author->id)
                <h3 class="font-extrabold text-center text-3xl text-last pt-5">Share what you like about {{ $author->city }}. <br>What is your favorite spot?</h3>
                <div class="flex justify-center">
                    <div class="bg-gray-lighter rounded-md py-5 px-5 overflow-x-hidden md:my-5 md:mx-5">
                        <form method="POST" action="{{ route('save_article', $article->id) }}" enctype="multipart/form-data" class="grid grid-cols-1 justify-items-center">
                            @csrf
                            @method('PUT')   
                            <div class="grid place-self-center">
                                <label for="categories" class="block font-semibold text-gray-darker">Choose one or more related categories*</label>
                                <select name="categories[]" id="categories" multiple class="py-1 text-xl lg:text-base text-gray-dark rounded-lg mt-3">
                                @foreach ($categories as $category)   
                                        <option value="{{ $category->id }}" {{ in_array($category->id, $selectedCat) ? "selected" : "" }}>{{ $category->name }}</option> 
                                @endforeach
                                </select>
                                <span class="text-red-600">@error('categories') {{ $message }} @enderror</span>
                            </div>       
                            <div>
                                <label for="title" class="block pt-5 font-semibold text-gray-darker">Title*</label> 
                                <input type="text" name="title" id="title" value="{{ $article->title }}" class="lg:text-base text-gray-dark rounded-lg mt-3">
                                <span class="text-red-600">@error('title') {{ $message }} @enderror</span>
                            </div>
                            <div>
                                <label for="subtitle" class="block pt-5 font-semibold text-gray-darker">Subtitle*</label> 
                                <input type="text" name="subtitle" id="subtitle" value="{{ $article->subtitle }}" class="lg:text-base text-gray-dark rounded-lg mt-3">
                                <span class="text-red-600">@error('subtitle') {{ $message }} @enderror</span>
                            </div>
                            <div class="grid">
                                <label for="description" class="block pt-5 font-semibold text-gray-darker">Description*</label> 
                                <textarea name="description" id="description" cols="70" rows="10" class="lg:text-base text-gray-dark rounded-lg mt-3">
                                    {{ $article->description }}
                                </textarea>
                                <span class="text-red-600">@error('description') {{ $message }} @enderror</span>
                            </div>
                        <!--   <div>
                                <label for="pictures">Add pictures</label> 
                                <input type="file" name="pictures[]" id="pictures" multiple class="lg:text-base text-gray-dark rounded-lg mt-3">
                                <span class="text-red-600">@error('pictures') {{-- $message --}} @enderror</span>
                            </div> -->
                            <div>
                                <div class="pt-10 pb-4">
                                    <p class="text-last text-center font-bold text-xl">{{__('Additional informations')}}</p>
                                </div>
                                <div class="flex space-x-6 flex-wrap justify-center md:justify-around">
                                    <div>
                                        <label for="website" class="font-semibold text-gray-darker">Website</label> 
                                        <input type="text" name="website" id="website" value="{{ $article->website_place }}" class="lg:text-base text-gray-dark rounded-lg mt-3">
                                        <span class="text-red-600">@error('website') {{ $message }} @enderror</span>
                                    </div>
                                    <div>
                                        <label for="phone" class="font-semibold text-gray-darker">Phone</label> 
                                        <input type="text" name="phone" id="phone" value="{{ $article->phone_place }}" class="lg:text-base text-gray-dark rounded-lg mt-3">
                                        <span class="text-red-600">@error('phone') {{ $message }} @enderror</span>
                                    </div>
                                    <div>
                                        <label for="address" class="font-semibold text-gray-darker">Address*</label>
                                        <input type="text" name="address" id="address" value="{{ $article->address }}" class="lg:text-base text-gray-dark rounded-lg mt-3">
                                        <span class="text-red-600 block md:inline">@error('address') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="flex justify-evenly text-center py-6 mt-5">
                                    <button type="submit" value="submit" class="mt-6 px-7 py-2 text-xl md:mt-0 lg:text-base align-middle font-semibold tracking-wider border-2 text-white border-last bg-last rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                                        Edit the article
                                    </button>
                                    <div class="mt-8 md:mt-3 lg:mt-2">
                                        <a href="{{ route('show_article', $article->id) }}" class="px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider border-2 text-white border-first bg-first rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                                            Back
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        @endauth
    </main>
</x-app-layout>