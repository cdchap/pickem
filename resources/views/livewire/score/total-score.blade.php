<div class=" container mx-auto max-w-6xl py-20 px-2 md:px-0">
    <div class="pb-5 border-b-4  border-red-600">
        <h3 class="leading-6 font-black text-gray-900 ont-black font-sans tracking-wide uppercase text-4xl">
            {{ $season }} Picks
        </h3>
    </div>
    <div class="flex justify-start mb-6 mt-6 space-x-2 items-center">
        <div>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <!-- Heroicon name: search -->
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input id="search" wire:model="search" class="form-input block w-full pl-10 sm:text-sm sm:leading-5"
                    placeholder="Search">
            </div>
        </div>
        <div class="text-gray-400">
            <p>e.g. name or username</p>
        </div>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
        @forelse ($users as $user)
            <div class="border-2 border-black rounded-2xl shadow-black h-96 px-6 py-8 bg-white">
                <div class="flex justify-between items-center">
                    <div class="flex space-x-2 items-center">
                        <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="{{$user->avatarUrl()}}" alt="{{$user->name}}">
                        <h3 class="text-gray-500">&#64;{{ $user->username }}</h3>
                    </div>
                    <p class="text-green-500">{{$user->getConfidencePoints($picks)}} pts</p>
                </div>
                <div class="border-2 border-black rounded-2xl h-64 mt-4">
                    <div class="overflow-hidden overflow-y-scroll">
                        <livewire:accordian-picks-table :user="$user"/>
                    </div>
                </div>
            </div>
        @empty
            <div>
                
            </div>
        @endforelse
    </div>
    <div class="w-1/2 mt-10">
        {{ $users->links() }}
    </div>
</div>

{{-- <div class="bg-white shadow-black overflow-hidden rounded-2xl w-full border-2 border-black max-w-2xl">
    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap">
            <div class="ml-4 mt-2">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    {{ $season }}
                </h3>
            </div>
        </div>
    </div>
    <ul>
        @foreach ( $users as $key => $user)
            <li class="border-t border-gray-200">
                <div x-data="{ open: false }"
                    @click="open = !open"
                    class="flex flex-col justify-center items-center hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                    <div class="flex w-full items-center px-4 py-4 sm:px-6">
                        <div class="min-w-0 flex-1 flex items-center">
                            <div class="flex-shrink-0">
                                
                            </div>
                            <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                <div class="flex justify-start items-center">
                                    <div class="text-sm leading-5 font-medium text-indigo-600 truncate">
                                        &#64;{{ $user->username }}
                                    </div>
                                </div>
                                <div class="block">
                                    <div>
                                        <div class="text-sm leading-5 text-gray-900">
                                            Total
                                        </div>
                                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                            <!-- Heroicon name: check-circle -->
                                            @if($key <= 2 && $user->getConfidencePoints($picks) > 0)
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                            {{ $user->getConfidencePoints($picks) }} pts
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <!-- Heroicon name: chevron-right -->
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div x-show="open"
                        @click.away="open = false"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform origin-top scale-20"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform origin-top scale-20"
                         class="px-4 py-6" >
                            <livewire:accordian-picks-table :userId="$user->id"/>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div> --}}

