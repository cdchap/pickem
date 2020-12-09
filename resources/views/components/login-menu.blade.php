<nav 
    x-data="{mobileOpen: false}"
        
    class="bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="-ml-2 mr-2 flex items-center md:hidden">
                    <!-- Mobile menu button -->
                    <button 
                        @click="mobileOpen = !mobileOpen"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out"
                        aria-label="Main menu" aria-expanded="false">
    
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                       
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex-shrink-0 flex items-center">
                    <x-logo class="w-8 text-gray-500"/>
                </div>
                <div class="hidden md:ml-6 md:flex md:items-center space-x-4">
                    <a href="{{ route('home') }}"
                        class="px-3 py-2 rounded-md text-sm font-medium leading-5 {{ request()->url() === route('home') ? 'text-white bg-gray-700 focus:outline-none' : ''}}text-gray-300 hover:text-white hover:bg-gray-700 focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Home</a>
                    <a href="{{ route('all.picks') }}"
                        class="px-3 py-2 rounded-md text-sm font-medium leading-5 {{ request()->url() === route('all.picks') ? 'text-white bg-gray-700 focus:outline-none' : ''}}text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Picks</a>
                    @can('create')
                        <a href="{{ route('admin.dashboard') }}"
                        class="px-3 py-2 rounded-md text-sm font-medium leading-5 {{ request()->url() === route('admin.dashboard') ? 'text-white bg-gray-700 focus:outline-none' : ''}}text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Adminland</a>
                    @endcan
                </div>
            </div>
            <div class="flex items-center space-x-6">
                <div class="flex-shrink-0">
                    <span class="rounded-md shadow-sm">
                        @if(Route::has('login'))
                            @auth
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="">
                                    @csrf
                                    <span class="inline-flex rounded-md shadow-sm">
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-gradient-two hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                                            Logout
                                        </button>
                                    </span>
                                </form>
                            @endauth
                        @endif
                        
                    </span>
                </div>
                @auth
                    <img class="h-8 w-8 rounded-full" src="{{auth()->user()->avatarUrl()}}" alt="">
                @endauth
                
            </div>
        </div>
    </div>

    <!--
    Mobile menu, toggle classes based on menu state.

    Menu open: "block", Menu closed: "hidden"
  -->
    <div 
        x-show="mobileOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-50"
        x-transition:leave-start="transform scale-100"
        x-transition:leave-end="transform scale-90"
        class="md:hidden">
        <div class="px-2 pt-2 pb-3 sm:px-3">
            <a href="#"
                class="block px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Dashboard</a>
            <a href="#"
                class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Team</a>
            <a href="#"
                class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Projects</a>
            <a href="#"
                class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Calendar</a>
        </div>
        {{-- <div class="pt-4 pb-3 border-t border-gray-700">
            <div class="flex items-center px-5 sm:px-6">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-6 text-white">Tom Cook</div>
                    <div class="text-sm font-medium leading-5 text-gray-400">tom@example.com</div>
                </div>
            </div>
            <div class="mt-3 px-2 sm:px-3">
                <a href="#"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Your
                    Profile</a>
                <a href="#"
                    class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Settings</a>
                <a href="#"
                    class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Sign
                    pout</a>
            </div>
        </div> --}}
    </div>
</nav>

{{-- <nav class="bg-black">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between py-4">
            <div class="text-white w-24">
                <a href="{{ route('home') }}">
                    <x-wordmark />
                </a>
            </div>
            <div class="flex justify-between mt-4 md:mt-0 md:ml-4 text-white space-x-6 items-center">
                @can('create')
                    <a href="{{ route('admin.dashboard') }}" class="">
                        <span class="text-sm text-white hover:text-cool-gray-100 hover:underline">Adminland</span>    
                    </a>
                @endcan
                <div class="">
                    @if(Route::has('login'))
                        <div class="space-x-4">
                            @auth
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="">
                                    @csrf
                                    <span class="inline-flex rounded-md shadow-sm">
                                        <button type="submit" class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-gradient-two hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                                            Logout
                                        </button>
                                    </span>
                                </form>
                            @else
                                <a href="{{ route('login') }}"
                                    class="font-medium hover:text-gray-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log
                                    in</a>
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</nav> --}}
