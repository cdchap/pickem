<nav class="bg-black">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between py-4">
            <div class="text-white w-24">
                <x-wordmark />
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4 text-white">
                @if(Route::has('login'))
                    <div class="space-x-4">
                        @auth
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log out
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                                class="font-medium hover:text-gray-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log
                                in</a>

                            @if(Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="font-medium hover:text-gray-500 focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>

</nav>
