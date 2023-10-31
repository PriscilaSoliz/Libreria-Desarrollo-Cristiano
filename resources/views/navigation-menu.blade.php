<nav x-data="{ open: false }" class="bg-blue-700  border-b border-gray-100">
    <!-- Primary Navigation Menu -->

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="flex justify-between h-16" >
            <div class="flex">
                <!-- Logo -->
                {{-- <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">

                        <img src="{{ asset('img/loguito.png') }}" alt="Descripción de la imagen" class="h-12 w-12 rounded-md ml-1">

                    </a>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="hover:text-white text-white font-bold">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @can('VistaEmpleado.index')

                        <x-nav-link
                            href="{{ route('empleado.index') }}"
                            :active="request()->routeIs('empleado.index')"
                            class="flex items-center text-white font-bold"
                            {{ __('Empleados') }}
                        </x-nav-link>
                    @endcan
                    @can('admin.users.index')

                    <x-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('users.index')" class="hover:text-white text-white font-bold">
                        {{ __('Usuarios') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('admin.roles.index') }}" :active="request()->routeIs('roles.index')" class="hover:text-white text-white font-bold">
                        {{ __('Roles') }}
                    </x-nav-link>
                    @endcan
                    <x-nav-link href="{{ route('provedor.index') }}" :active="request()->routeIs('provedor.index')" class="hover:text-white text-white font-bold">
                        {{ __('Proveedor') }}
                    </x-nav-link>
                    @can('VistaProducto.index')
                    <x-nav-link href="{{ route('producto.index') }}" :active="request()->routeIs('producto.index')" class="hover:text-white text-white font-bold">
                        {{ __('Productos') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('producto.index') }}" :active="request()->routeIs('producto.index')" class="hover:text-white text-white font-bold">
                        {{ __('Ventas') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('producto.index') }}" :active="request()->routeIs('producto.index')" class="hover:text-white text-white font-bold">
                        {{ __('Compras') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('cliente.index') }}" :active="request()->routeIs('cliente.index')" class="hover:text-white text-white font-bold">
                        {{ __('Cliente') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('producto.index') }}" :active="request()->routeIs('producto.index')" class="hover:text-white text-white font-bold">
                        {{ __('Reportes') }}
                    </x-nav-link>

                    @endcan

                </div> --}}

                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">

                        <img src="{{ asset('img/Loguito.png') }}" alt="Descripción de la imagen" class="h-12 w-12 rounded-md ml-1">

                    </a>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @can('admin.home')
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="hover:text-white text-white font-bold">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @endcan


                    @can('VistaEmpleado.index')
                    <div class="relative inline-block group">
                        <x-nav-link

                            class="flex items-center text-white font-bold"
                             style="margin-top: 20px;" {{--!-- Ajusta el valor según sea necesario --> --}}
                        >
                            {{ __('Gestionar Usuarios') }}
                        </x-nav-link>
                        <div class="absolute mt-6 w-40 bg-white border border-gray-300 rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">

                            @can('admin.users.index')
                            <a href="#" class="block px-4 py-2 text-gray-700 hover-bg-indigo-100 hover-text-indigo-900"><x-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('users.index')"  class="block px-4 py-2 text-gray-700 hover-bg-indigo-100 hover-text-indigo-900">
                                {{ __('Usuarios') }}
                            </x-nav-link></a>
                            @endcan
                            @can('admin.roles.index')
                            <a href="#" class="block px-4 py-2 text-gray-700 hover-bg-indigo-100 hover-text-indigo-900"><x-nav-link href="{{ route('admin.roles.index') }}" :active="request()->routeIs('users.index')"  class="block px-4 py-2 text-gray-700 hover-bg-indigo-100 hover-text-indigo-900">
                                {{ __('Roles') }}
                            </x-nav-link></a>
                            @endcan
                        </div>
                    </div>
                    @endcan
                    @can('VistaEmpleado.index')
                    <x-nav-link href="{{ route('empleado.index') }}" :active="request()->routeIs('empleado.index')" class="hover:text-white text-white font-bold">
                        {{ __('Empleados') }}
                    </x-nav-link>
                    @endcan
                    @can('VistaProvedor.index')
                    <x-nav-link href="{{ route('provedor.index') }}" :active="request()->routeIs('provedor.index')" class="hover:text-white text-white font-bold">
                        {{ __('Proveedor') }}
                    </x-nav-link>
                    @endcan
                    @can('VistaProducto.index')
                    <x-nav-link href="{{ route('producto.index') }}" :active="request()->routeIs('producto.index')" class="hover:text-white text-white font-bold">
                        {{ __('Productos') }}
                    </x-nav-link>
                    @endcan
                    
                    <x-nav-link href="{{ route('bitacora.index') }}" :active="request()->routeIs('bitacora.index')" class="hover:text-white text-white font-bold">
                        {{ __('Bitacora') }}
                    </x-nav-link>
                    
                    {{-- <x-nav-link href="{{ route('producto.index') }}" :active="request()->routeIs('producto.index')" class="hover:text-white text-white font-bold">
                        {{ __('Ventas') }}
                    </x-nav-link> --}}
{{--
                    <x-nav-link href="{{ route('producto.index') }}" :active="request()->routeIs('producto.index')" class="hover:text-white text-white font-bold">
                        {{ __('Compras') }}
                    </x-nav-link> --}}
                    {{-- <x-nav-link href="{{ route('cliente.index') }}" :active="request()->routeIs('cliente.index')" class="hover:text-white text-white font-bold">
                        {{ __('Cliente') }}
                    </x-nav-link> --}}
                    {{-- <x-nav-link href="{{ route('producto.index') }}" :active="request()->routeIs('producto.index')" class="hover:text-white text-white font-bold">
                        {{ __('Reportes') }}
                    </x-nav-link> --}}

                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Cuenta') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Cerrar Sesion') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('empleado.index') }}" :active="request()->routeIs('empleado.index')" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out">
                {{ __('Empleados') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('producto.index') }}" :active="request()->routeIs('producto.index')" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out">
                {{ __('Productos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('provedor.index') }}" :active="request()->routeIs('provedor.index')" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out">
                {{ __('Proveedor') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('users.index')" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out">
                {{ __('Usuarios') }}
            </x-responsive-nav-link>

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-semibold text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="text-white">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')" class="text-white">
                    {{ __('API Tokens') }}
                </x-responsive-nav-link>

                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="text-white">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>

                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200"></div>
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>
