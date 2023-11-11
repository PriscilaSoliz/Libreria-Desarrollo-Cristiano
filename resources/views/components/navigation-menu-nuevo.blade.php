{{-- barra lateral de la izquierda  w-14 lg:w-64 --}}
<div id="div_despliegue"
    class="z-50 fixed shadow-2xl  w-nav-grande space-y-2 px-2 h-full
                        bg-gray-50 transition-transform duration-300 ease-in-out">

    {{-- logo y botno para abriir las ventanas  --}}
    <div class="flex items-center mt-2 ">
        <button id="bt_abrir_menu" class=" p-2 border-2 bg-white rounded-md border-gray-200 shadow-lg text-gray-500">
            {{-- focus:bg-teal-500 focus:outline-none focus:text-white  --}}
            <svg class="w-5 h-5 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>

        {{-- <div class="text-center flex flex-row-reverse justify-between  w-full ">
            {{-- <img src="" alt=""> object-cover w-full h-full rounded-full --}}

        {{-- <img class="text-center bg-red-900 " src="{{ asset('img/Logo.png') }}" alt="" loading="lazy"
                width="40" />

        </div>  --}}
    </div>

    <div id="div_navegador" class=" flex flex-col space-y-2  ">


        <a href="{{ route('producto.index') }}"
            class="flex text-sm font-medium py-2 px-2 hover:bg-indigo-200  hover:text-base rounded-md transition duration-150 ease-in-out
            {{ request()->routeIs('producto.*') ? 'bg-indigo-600 text-white' : 'text-gray-900' }}">
            <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
            </svg>
            <span class="navbar_nombre  pl-1   ">Productos</span>
        </a>

        <a href="{{ route('categoria.index') }}"
            class="flex text-sm font-medium py-2 px-2 hover:bg-indigo-200  hover:text-base rounded-md transition duration-150 ease-in-out
            {{ request()->routeIs('categoria.*') ? 'bg-indigo-600  text-white' : 'text-gray-900' }}">
            <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
            </svg>
            <span class="navbar_nombre  pl-1  text-black ">Categorias</span>
        </a>

        <a href="{{ route('detallecategoria.index') }}"
            class="flex text-sm font-medium py-2 px-2 hover:bg-indigo-200  hover:text-base rounded-md transition duration-150 ease-in-out
        {{ request()->routeIs('detallecategoria.*') ? 'bg-indigo-600  text-white' : 'text-gray-900' }}">
            <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
            </svg>
            <span class="navbar_nombre  pl-1  text-black ">Detalles de Categorias</span>
        </a>
        <a href="{{ route('admin.users.index') }}"
            class="flex text-sm font-medium py-2 px-2 hover:bg-indigo-200  hover:text-base rounded-md transition duration-150 ease-in-out
        {{ request()->routeIs('admin.users.*') ? 'bg-indigo-600 text-white' : 'text-gray-900' }}">
            <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
            </svg>
            <span class="navbar_nombre  pl-1  text-black ">Usuarios</span>
        </a>
        <a href="{{ route('admin.roles.index') }}"
            class="flex text-sm font-medium py-2 px-2 hover:bg-indigo-200  hover:text-base rounded-md transition duration-150 ease-in-out
    {{ request()->routeIs('admin.roles.*') ? 'bg-indigo-600 text-white' : 'text-gray-900' }}">
            <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
            </svg>
            <span class="navbar_nombre  pl-1  text-black ">Roles</span>
        </a>

        <a href="{{ route('empleado.index') }}"
            class="flex text-sm font-medium py-2 px-2 hover:bg-indigo-200  hover:text-base rounded-md transition duration-150 ease-in-out
{{ request()->routeIs('empleado.*') ? 'bg-indigo-600 text-white' : 'text-gray-900' }}">
            <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
            </svg>
            <span class="navbar_nombre  pl-1  text-black ">Empleado</span>
        </a>

        <a href="{{ route('provedor.index') }}"
            class="flex text-sm font-medium py-2 px-2 hover:bg-indigo-200  hover:text-base rounded-md transition duration-150 ease-in-out
{{ request()->routeIs('provedor.*') ? 'bg-indigo-600 text-white' : 'text-gray-900' }}">
            <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
            </svg>
            <span class="navbar_nombre  pl-1  text-black ">Provedores</span>
        </a>

        <a href="{{ route('bitacora.index') }}"
            class="flex text-sm font-medium py-2 px-2 hover:bg-indigo-200  hover:text-base rounded-md transition duration-150 ease-in-out
{{ request()->routeIs('bitacora.*') ? 'bg-indigo-600 text-white' : 'text-gray-900' }}">
            <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
            </svg>
            <span class="navbar_nombre  pl-1  text-black ">Bitacora</span>
        </a>

        <a href="{{ route('notadeentrada.index') }}"
            class="flex text-sm font-medium py-2 px-2 hover:bg-indigo-200  hover:text-base rounded-md transition duration-150 ease-in-out
{{ request()->routeIs('notadeentrada.*') ? 'bg-indigo-600 text-white' : 'text-gray-900' }}">
            <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
            </svg>
            <span class="navbar_nombre  pl-1  text-black ">Nota Entrada</span>
        </a>

        <a href="{{ route('venta.index') }}"
            class="flex text-sm font-medium py-2 px-2 hover:bg-indigo-200  hover:text-base rounded-md transition duration-150 ease-in-out
{{ request()->routeIs('venta.*') ? 'bg-indigo-600 text-white' : 'text-gray-900' }}">
            <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
            </svg>
            <span class="navbar_nombre  pl-1  text-black ">Ventas</span>
        </a>

    </div> <!-- termina la barra lateral inzquierda-->

</div>
