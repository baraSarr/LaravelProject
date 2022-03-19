@extends('/layouts.base')

@section("title")
    Inscription
@endsection

        
        @section("content")
<x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Prenom -->
            <div>
                <x-label for="nom" :value="__('Prenom')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
            </div>

            <!-- Nom -->
            <div>
                <x-label for="nom" :value="__('Nom')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="nom" :value="old('name')" required autofocus />
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

            <!-- ESMT -->
            <div class="block mt-4">
                <label for="esmt" class="inline-flex items-center">
                    <span class="ml-2 text-sm text-gray-600">{{ __('êtes-vous de l\'esmt?') }}</span>
                    </label>
                    <input id="esmt" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="esmt" value="1">
                    
                
            </div>

            <!-- Newsletter -->
            <div class="block mt-4">
                <label for="newsletter" class="inline-flex items-center">
                    <span class="ml-2 text-sm text-gray-600">{{ __('s\'abonner a la newsletter?') }}</span></label>
                    <input id="newsletter" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="newsletter" value="1">
                    
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
        
        @endsection
        

