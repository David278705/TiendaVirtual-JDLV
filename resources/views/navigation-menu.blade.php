<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    
    
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img style="width: 25px" src="https://cdn.pixabay.com/photo/2017/09/24/09/59/feather-2781343_1280.png" alt="logo">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Productos') }}
                    </x-jet-nav-link>
                    @auth
                    <x-jet-nav-link href="{{ route('Carrito') }}" :active="request()->routeIs('Carrito')">
                        {{ __('Carrito') }}
                    </x-jet-nav-link>
                    @endauth
                    
                    @guest
                    <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                        {{ __('Iniciar sesion') }}
                    </x-jet-nav-link>
                    @endguest
                </div>
            </div>
            @auth
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            
                            @auth
                            @role('ceo')
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Ceo') }}
                            </div>
                                <x-jet-dropdown-link href="{{ route('role') }}" :active="request()->routeIs('role')">
                                    {{ __('Editar Roles') }}
                                </x-jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>
                            @endrole
                        @endauth
                       
                        @auth
                            @role('editor')
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Editor') }}
                            </div>
                                <x-jet-dropdown-link href="{{ route('e.product') }}" :active="request()->routeIs('e.product')">
                                    {{ __('Productos') }}
                                </x-jet-dropdown-link>
                            @endrole
                        @endauth
                        
                        @auth
                            @role('editor')
                                <x-jet-dropdown-link href="{{ route('category') }}" :active="request()->routeIs('category')">
                                    {{ __('Categorias') }}
                                </x-jet-dropdown-link>
                                <div class="border-t border-gray-100"></div>
                            @endrole
                        @endauth
                       

                      

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Cuenta') }}
                        </div>
                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                    

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Cerrar Sesión') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>
            @endauth
            @auth
            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            @endauth
        </div>
    </div>
    @auth
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Productos') }}
            </x-jet-responsive-nav-link>
            @auth
            @role('ceo')
                <x-jet-responsive-nav-link href="{{ route('role') }}" :active="request()->routeIs('/dashboard/role')">
                    {{ __('Editar Roles') }}
                </x-jet-responsive-nav-link>
            @endrole
        @endauth
        @auth
                        @role('editor')
                            <x-jet-responsive-nav-link href="{{ route('e.product') }}" :active="request()->routeIs('e.product')">
                                {{ __('Añadir productos') }}
                            </x-jet-responsive-nav-link>
                        @endrole
                    @endauth
                    @auth
                        @role('editor')
                            <x-jet-responsive-nav-link href="{{ route('category') }}" :active="request()->routeIs('category')">
                                {{ __('Añadir Categorias') }}
                            </x-jet-responsive-nav-link>
                        @endrole
                    @endauth
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
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    @endauth
   
</nav>
