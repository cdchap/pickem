<div>
    <div>
        <div class="flex flex-col items-center justify-center py-48 px-4 bg-card-image bg-center bg-cover">
            <div class="text-center px-16 py-12 border-2 border-black shadow-black bg-white rounded-md">
                <h1 class="text-4xl md:text-6xl font-sans font-black text-black border-b-4 border-cool-gray-300">College
                    Football</h1>
                <h2 class="mt-4 text-lg md:text-2xl text-gray-500">Bowl 🏈 Confidence 🏈 Pool</h2>
                <h2 class="mt-4 text-xl md:text-2xl text-gray-500">🎉 🎉 🎉</h2>
                <div class="mt-8 flex flex-col justify-center items-center">
                    @guest
                        <span class="inline-flex rounded-md shadow-sm">
                            <a href="{{ route('register.request') }}"
                                class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-purple-600 hover:text-purple-300 bg-gradient-two focus:outline-none focus:border-purple-500 focus:shadow-outline-purple active:bg-purple-500 transition ease-in-out duration-150">
                                Request Invitation
                            </a>
                        </span>
                    @endguest

                    @auth
                        @can('make picks')
                            <div class="max-w-sm">
                                <h3 class="font-sans text-xl text-gray-900">Welcome <a
                                        class="font-mono text-blue-600 underline hover:text-blue-400"
                                        href="{{ route('user.picks', auth()->user()->username) }}">&#64;{{ auth()->user()->username }}</a>!! First thing's first&hellip;click the button below to make your selections
                                </h3>
                            </div>
                            
                            <a href="{{ route('pick-form') }}">
                                <span class="inline-flex rounded-md shadow-sm mt-4">
                                    <button type="button"
                                        class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition ease-in-out duration-150">
                                        Pick Your Winners
                                    </button>
                                </span>
                            </a>
                        @else
                            <h3 class="font-sans text-xl text-gray-900">Welcome 
                                <a
                                    class="font-mono text-blue-600 underline hover:text-blue-400"
                                    href="{{ route('user.picks', auth()->user()->username) }}">&#64;{{ auth()->user()->username }}
                                </a>!!
                            </h3>
                        @endcan
                    @endauth
                </div>
            </div>
            
            
        </div>
        <div class="py-15">
            <div class="md:flex md:flex-col md:justify-center md:items-center">
                <livewire:score.top-ten />
            </div>  
        </div>
        <div class="py-12 mb-36">
             <livewire:bowl.bowl-list /> 
        </div>
        <div class=" pb-20">
            <div class="">
                <livewire:top-twenty-five />
            </div>
        </div>
    </div>
</div>
