<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <!-- Profile Picture -->
            <div>
                <x-label for="pictureProfile" :value="__('Picture')" />  
                <x-input type="file" name="picture" id="pictureProfile" class="lg:text-base text-gray-dark rounded-lg mt-3" :value="old('picture')" required/>
            </div>
            <!-- Firstname -->
            <div class="mt-4">
                <x-label for="firstname" :value="__('Firstname')" />

                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus />
            </div>

             <!-- Lastname -->
             <div class="mt-4">
                <x-label for="lastname" :value="__('Lastname')" />

                <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

             <!-- Birthdate ------------------------------------------------------------------------------------- -->
             <div class="mt-4">
                <x-label for="birthdate" :value="__('Birthdate')" />

                <x-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required />
            </div>
         
             <!-- Gender ------------------------------------------------------------------------------------- -->
             <div class="mt-4">
                <x-label for="gender" :value="__('Gender')" />
                <select id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender')" required>
                    <option value=""></option> 
                    <option value="Female">Female</option> 
                    <option value="Male">Male</option> 
                    <option value="Male">Other</option> 
                </select>
                </div>
             <!-- Country ------------------------------------------------------------------------------------- -->
             <div class="mt-4">
                <x-label for="country" :value="__('Country')" />
                <select id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required>
                </select>
            </div>
             <!-- City ------------------------------------------------------------------------------------- -->
             <div class="mt-4">
                <x-label for="city" :value="__('City')" />
                <select id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required>
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
    <script src="{{ asset('js/country-city.js') }}" defer></script>
</x-guest-layout>
