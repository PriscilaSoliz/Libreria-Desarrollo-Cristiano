<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">


        </x-slot>
        <div class="w-64 h-64 bg-white flex justify-center items-center sm:items-start sm:justify-start sm:ml-0 md:mr-20 lg:ml-10">
            <img src="{{ asset('img/newlogo.png') }}" alt="Descripción de la imagen" class="max-w-full max-h-full rounded-md">
        </div>


        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Correo') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('Email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordar') }}</span>
                </label>
            </div>

            <<div class="flex items-center justify-end mt-4">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrar</a>
                @endif
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('') }}
                    </a>
                @endif
                <x-button class="ml-4">
                    {{ __('Iniciar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
