<x-app-layout>
    <x-slot name="header"></x-slot>
    <main class="bg-pink-200">
        <div class="relative min-h-screen flex ">
            <div class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
                <div class="sm:w-1/2 xl:w-3/5 h-full hidden md:flex flex-auto pt-14 justify-center p-5 overflow-hidden bg-sun text-white bg-no-repeat bg-cover relative" style="background-image: url(https://images.unsplash.com/photo-1579451861283-a2239070aaa9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80);">
                    <div class="absolute bg-gradient-to-b from-indigo-600 to-blue-500 opacity-75 inset-0 z-0"></div>
                    <div class="w-full  max-w-md z-10">
                        <div class="sm:text-3xl xl:text-4xl font-bold leading-tight mb-10 text-center">
                            So You Would Like To Become A Guide ...
                        </div>
                        <div class="sm:text-sm xl:text-md text-gray-200 text-center pt-10">
                            <p class="text-gray-darker font-bold text-xl mb-5">1. Check that your profile is complete.</p>
                            <p class="text-gray-darker font-bold text-xl mb-5">2. Fill in the form.</p>
                            <p class="text-gray-darker font-bold text-xl mb-5">3. Your application will then be reviewed.</p>
                            <p class="text-gray-darker font-bold text-xl mb-3">4. If your application is accepted :</p>
                            <p class="text-gray-dark font-semibold mb-5 text-lg">- You will receive a confirmation email</p>
                            <p class="text-gray-dark font-semibold mb-5 text-lg">- New features will be added to your account</p>
                            <p class="text-gray-darker font-bold text-xl mb-3">5. If your application is not accepted :</p>
                            <p class="text-gray-dark font-semibold mb-5 text-lg">- You will receive a rejection message</p>
                            <p class="text-gray-dark font-semibold mb-5 text-lg">- You have the possibility to try again later</p>
                        </div>
                    </div>
                </div>
                <!-- Form part -->
                <div class="md:flex w-full sm:w-3/5 md:h-full w-3/5 xl:w-11/12 p-8 md:p-5 lg:p-5 lg:pt-10 lg:justify-center sm:rounded-lg md:rounded-none bg-white">
                    <div class="max-w-lg w-full space-y-8">
                        <form method="POST" action="{{ route('become_guide') }}" enctype="multipart/form-data" class="px-6 pt-6 pb-8 mb-4 bg-gray-lighter rounded">
                        @csrf
                            <div class="mb-4 md:flex md:justify-around">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label for="languages" class="block mb-2 text-sm font-bold text-gray-700">
                                        Languages
                                    </label>
                                    <select id="languages" name="languages[]" form-multiselect multiple class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                        @foreach ($languages as $language)   
                                            <option value="{{ $language->id }}">{{ $language->language }}</option> 
                                        @endforeach
                                    </select>
                                    <span class="text-red-600">@error('languages') {{ $message }} @enderror</span>
                                </div>
                                <div class="md:ml-2">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="categories">
                                        Your interests
                                    </label>
                                    <select id="categories" name="categories[]" form-multiselect multiple class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                        @foreach ($categories as $category)   
                                            <option value="{{ $category->id }}">{{ $category->name }}</option> 
                                        @endforeach
                                    </select>
                                    <span class="text-red-600">@error('categories') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="offers">
                                    What can you propose (your offers) ?
                                </label>
                                <textarea id="offers" name="offers" class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" cols="100" rows="10" placeholder="Your offers">
                                </textarea>
                                <span class="text-red-600">@error('offers') {{ $message }} @enderror</span>
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="motiv">
                                    Your motivation(s)
                                </label>
                                <textarea id="motiv" name="motivation" class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" cols="100" rows="10" placeholder="Your motivation(s)">
                                </textarea>
                                <span class="text-red-600">@error('motivation') {{ $message }} @enderror</span>
                            </div>
                            <!-- SUITE : definition + motivation-->
                            <!--<div class="text-center">
                                <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="./index.html">
                                    Already have an account? Login!
                                </a>
                            </div>-->
                            <div class="mb-6 text-center">
                                <button  type="submit" class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
</x-app-layout>