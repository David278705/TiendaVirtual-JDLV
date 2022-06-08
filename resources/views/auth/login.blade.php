<x-guest-layout>
    
    <x-jet-authentication-card>
        
        <x-slot name="logo">
            <img style="width: 35px" src="https://cdn.pixabay.com/photo/2017/09/24/09/59/feather-2781343_1280.png" alt="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
    
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Rercuerdame') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('No te has registrado?') }}
                </a>
                <x-jet-button class="ml-4">
                    {{ __('Iniciar Sesion') }}
                </x-jet-button>
                
           
        </form>
    </div>

    </x-jet-authentication-card>
</x-guest-layout>
