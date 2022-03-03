<nav class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-laravel.application-logo class="block h-10 w-auto fill-current text-gray-600"/>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-laravel.nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-laravel.nav-link>
                    <x-laravel.nav-link :href="route('clients.index')" :active="request()->routeIs('clients.*')">
                        Clients
                    </x-laravel.nav-link>
                    <x-laravel.nav-link :href="route('campaigns.index')" :active="request()->routeIs('campaigns.*')">Campaigns
                    </x-laravel.nav-link>
                    <x-laravel.nav-link :href="route('projects.index')" :active="request()->routeIs('projects.*')">Projects
                    </x-laravel.nav-link>
                    <x-laravel.nav-link :href="route('images.index')" :active="request()->routeIs('images.*')">Images
                    </x-laravel.nav-link>
                    <x-laravel.nav-link :href="route('deliverables.index')" :active="request()->routeIs('deliverables.*')">
                        Deliverables
                    </x-laravel.nav-link>
                    <x-laravel.nav-link :href="route('api.clients.index')">
                        API Clients
                    </x-laravel.nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                {{ auth()->user()->name }}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{route('logout')}}"
                       class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                       onclick="event.preventDefault();this.closest('form').submit();">Log Out</a>
                </form>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-laravel.responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-laravel.responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-laravel.responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-laravel.responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
