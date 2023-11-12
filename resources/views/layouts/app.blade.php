<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js' , 'resources/js/abrir_menu_navbar.js' ])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">

            {{-- @livewire('navigation-menu') --}}
            <x-navigation-menu-nuevo/>

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            {{-- cambair que cuadno sea lg que quede en ml-14 lg:ml-64 --}}
            <main  class=" h-full  ">
                <div class="fixed w-full h-14 border-b border-l  shadow-lg bg-white flex items-center justify-between  p-1.5">
                    <div class="flex flex-1 items-center justify-center    ">
                        {{-- buscardor o algo de informacion  --}}
                        {{-- <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}">

                                <img src="{{ asset('img/loguito.png') }}" alt="Descripción de la imagen" class="h-12 w-12 rounded-md ml-1">

                            </a>
                        </div> --}}
                        <h1>Libreria Desarrollo</h1>

                    </div>

                    {{-- // model de usuaaroi  --}}
                    <div class=" sm:flex sm:items-center sm:ml-6 ">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex  items-center px-3  border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 gray-300 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    @php
                                        $user = Auth::user();
                                    @endphp

                                    <div class="mr-2   ">
                                        {{-- @if ($user->foto)
                                            <img class="w-12 h-10 rounded-full object-cover"
                                                src="{{ route('cargar_imagen', $user->foto) }}" />
                                        @else --}}
                                        <img class="w-10 h-10 rounded-lg object-cover"
                                            src="https://d500.epimg.net/cincodias/imagenes/2016/07/04/lifestyle/1467646262_522853_1467646344_noticia_normal.jpg"
                                            alt="">
                                        {{-- @endif --}}
                                    </div>
                                    <div class="">
                                        <p class="whitespace-nowrap"> {{ $user->name }}</p>
                                        {{-- <p> {{ $user->roles[0]->name }}</p> --}}
                                    </div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                {{-- <x-dropdown-link :href="route('perfilEmpresa')">
                                    Banco Economico
                                </x-dropdown-link> --}}

                                <x-dropdown-link :href="route('profile.show')">
                                    Perfil de usuario
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>

                            </x-slot>
                        </x-dropdown>
                    </div>

                </div>

                {{-- {{ $slot }} --}}
                <div id="div_contenido" class="pt-14 ml-64">
                    @yield('content')
                </div>
            </main>
        </div>

        @stack('modals')

        {{-- leer javacritp  --}}


        @livewireScripts
    </body>
</html>
