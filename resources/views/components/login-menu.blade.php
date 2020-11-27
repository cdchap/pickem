<nav class="bg-black">
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
                                {{-- <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Log out
                                </a> --}}
    
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

</nav>
