<nav 
    x-data="{mobileOpen: false}"
        
    class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="-ml-2 mr-2 flex items-center md:hidden">
                    <!-- Mobile menu button -->
                    <button 
                        @click="mobileOpen = !mobileOpen"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-black focus:outline-none focus:bg-black focus:text-white transition duration-150 ease-in-out"
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
                    <x-logo class="w-8 text-black"/>
                </div>
                <div class="hidden md:ml-6 md:flex md:items-center space-x-4">
                    <a href="{{ route('home') }}"
                        class="px-3 py-2 rounded-md text-sm font-medium leading-5 {{ request()->url() === route('home') ? 'text-white bg-black focus:outline-none' : ''}}text-gray-500 hover:text-white hover:bg-gray-300 focus:text-white focus:bg-black transition duration-150 ease-in-out">Home</a>
                    <a href="{{ route('all.picks') }}"
                        class="px-3 py-2 rounded-md text-sm font-medium leading-5 {{ request()->url() === route('all.picks') ? 'text-white bg-black focus:outline-none' : ''}}text-gray-500 hover:text-white hover:bg-gray-300 focus:outline-none focus:text-white focus:bg-black transition duration-150 ease-in-out">Picks</a>
                    @can('create')
                        <a href="{{ route('admin.dashboard') }}"
                        class="px-3 py-2 rounded-md text-sm font-medium leading-5 {{ request()->url() === route('admin.dashboard') ? 'text-white bg-black focus:outline-none' : ''}}text-gray-500 hover:text-white hover:bg-gray-300 focus:outline-none focus:text-white focus:bg-black transition duration-150 ease-in-out">Adminland</a>
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
                                            class="bg-gradient-four inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 hover:text-gray-500 focus:outline-none focus:border-gray-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
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
        <div class="px-2 pt-2 pb-3 sm:px-3 space-x-1">
            <a href="{{route('home')}}"
                class="block px-3 py-2 rounded-md text-base font-medium {{ request()->url() === route('home') ? 'text-white bg-black' : ''}} focus:outline-none focus:text-white focus:bg-gray-700  hover:bg-black transition duration-150 ease-in-out">Home</a>
            <a href="{{route('all.picks')}}"
                class="block px-3 py-2 rounded-md text-base font-medium {{ request()->url() === route('all.picks') ? 'text-white bg-black' : ''}} text-gray-600 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Picks</a>
            @can('create')
              <a href="{{route('admin.dashboard')}}"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-white hover:bg-black focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Adminland</a>  
            @endcan
        </div>
        <div class="pt-4 pb-3 border-t border-gray-700">
            <div class="flex items-center px-5 sm:px-6">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                        src="{{auth()->user()->avatarUrl()}}"
                        alt="{{auth()->user()->name}}">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-6 text-gray-500">{{auth()->user()->name}}</div>
                    <div class="text-sm font-medium leading-5 text-gray-600">&#64;{{auth()->user()->username}}</div>
                </div>
            </div>
            <div class="mt-3 px-2 sm:px-3">
                <a href="#"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Your
                    Profile</a>
                    <div class="mt-2 px-3">
                        @if(Route::has('login'))
                            @auth
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="">
                                    @csrf
                                    <span class="inline-flex rounded-md shadow-sm">
                                        <button type="submit"
                                            class="bg-gradient-four inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 hover:text-gray-500 focus:outline-none focus:border-gray-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                                            Logout
                                        </button>
                                    </span>
                                </form>
                            @endauth
                        @endif
                    </div>
            </div>
        </div>
    </div>
</nav>
