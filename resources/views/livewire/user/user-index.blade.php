<div class="space-y-6">
@section('pageTitle', 'Users')
    {{-- search input --}}
    <div class="flex  items-baseline">
        <div>
            <div class="mt-1 flex rounded-md shadow-sm">
                <div class="relative flex items-stretch flex-grow focus-within:z-10">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <!-- Heroicon name: search -->
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input id="search" wire:model="search"
                        class="form-input block w-full rounded-none rounded-l-md pl-10 transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                        placeholder="Search">
                </div>
                <button
                    wire:click="toggleShowFilters"
                    class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-r-md text-gray-700 bg-gray-50 hover:text-gray-500 hover:bg-white focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    <span class="ml-2">Filter</span>
                </button>
            </div>
        </div>
    </div>
    {{-- filters --}}
    <div>
        @if ($showFilters)
            <div class="bg-gradient-four py-8 px-4 rounded-lg shadow-inner">
                <div class="grid grid-cols-2 gap-6">
                    <div class="">
                        <label for="location" class="block text-sm leading-5 font-medium text-gray-700">Made Picks</label>
                        <select id="location" class="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                            <option selected disabled></option>
                            <option>Has made picks</option>
                            <option>Needs to pick</option>
                        </select>
                    </div>
                    <div class="col-span-1">
                        <label for="location" class="block text-sm leading-5 font-medium text-gray-700">some other filter</label>
                        <select id="location" class="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                            <option selected disabled></option>
                            <option>Has made picks</option>
                            <option>Needs to pick</option>
                        </select>
                    </div>
                </div>
            </div>
        @endif
    </div>
    {{--users list  --}}
    <div>
        <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($users as $user)
                <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
                    <div class="w-full flex items-center justify-between p-6 space-x-6">
                        <div class="flex-1 truncate">
                            <div class="flex items-center space-x-3">
                                <h3 class="text-gray-900 text-sm font-medium truncate">{{ $user->name }}</h3>
                                @if($user->can('create'))
                                    <span
                                    class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-green-100 rounded-full">Admin</span>
                                @endif
                            </div>
                            <div class="mt-1">
                                @if ($user->can('pick2020'))
                                       
                                    <span class="inline-flex items-center space-x-1 text-red-500 text-sm">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                        <span class="text-gray-500">Needs to pick 2020 bowls</span> 
                                    </span>
                                @else
                                    <span class="inline-flex items-center space-x-1 text-green-500 text-sm">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-gray-500">Has picked 2020 bowls</span> 
                                    </span>
                                @endif
                            </div>
                        </div>
                        <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0"
                            src="{{ $user->avatarUrl() }}"
                            alt="">
                    </div>
                    <div>
                        <div class="-mt-px flex divide-x divide-gray-200">
                            <div class="w-0 flex-1 flex">
                                <a href="#"
                                    class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                    <!-- Heroicon name: mail -->
                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                    <span class="ml-3">Email</span>
                                </a>
                            </div>
                            <div class="-ml-px w-0 flex-1 flex">
                                <a href="#"
                                    class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                    <!-- Heroicon name: phone -->
                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                    <span class="ml-3">Call</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        {{ $users->links() }}
    </div>
</div>


