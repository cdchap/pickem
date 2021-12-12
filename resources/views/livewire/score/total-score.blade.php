<div class=" container mx-auto max-w-6xl py-20 px-2 md:px-0">
    <div class="pb-5 border-b-4  border-red-600">
        <h3 class="leading-6 font-black text-gray-900 ont-black font-sans tracking-wide uppercase text-4xl">
            {{ $season }} Picks
        </h3>
    </div>
    <div class="flex justify-between mb-6 mt-6">
        <div class="flex justify-start space-x-2 items-center">
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <!-- Heroicon name: search -->
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input id="search" wire:model="search" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md py-2"
                    placeholder="Search">
            </div>
            <div class="text-gray-400">
                <p>e.g. name or username</p>
            </div>
        </div>
        <div class="relative rounded-md shadow-sm">
            <select id="season" wire:model="season"
                class="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 rounded-md">
                <option value="" selected disabled>Select a season</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>
        </div>
        </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse ($users as $user)
            <div class="border-2 border-black rounded-2xl shadow-black h-96 px-6 py-8 bg-white">
                <div class="flex justify-between items-center">
                    <div class="flex space-x-2 items-center">
                        <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="{{$user->avatarUrl()}}" alt="{{$user->name}}">
                        <h3 class="text-gray-500">&#64;{{ $user->username }}</h3>
                    </div>
                    <p class="text-green-500">{{$user->getConfidencePoints($picks)}} pts</p>
                </div>
                <div class="border-2 border-black rounded-2xl h-64 mt-4 overflow-y-scroll">
                    <div class="">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Matchup
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Winner
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pick
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Conf.
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Odd row -->
                                @forelse ($picks as $i => $pick)
                                    @if ($pick->user_id == $user->id)
                                        <tr class="{{ $pick->team_id == $pick->bowl->winner_id ? 'bg-green-100' : ($i % 2 == 0 ? 'bg-white' : 'bg-gray-50') }}">
                                            <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <div class="flex flex-col space-y-1">
                                                    <div class="flex items-center space-x-2">
                                                        @if (isset($pick->bowl->visitor))
                                                            <img class="w-5 h-5" src="{{$pick->bowl->visitor->logo1}}" alt="{{$pick->bowl->visitor->name}}">
                                                            <h4 class="" style="color: {{ $pick->bowl->visitor->color }}">{{$pick->bowl->visitor->abbreviation}}</h4>
                                                        @endif
                                                    </div>
                                                    <div class="flex items-center space-x-2">
                                                        @if(isset($pick->bowl->home))
                                                            <img class="w-5 h-5" src="{{$pick->bowl->home->logo1}}" alt="{{$pick->bowl->home->name}}">
                                                            <h4 class="" style="color: {{ $pick->bowl->home->color }}">{{$pick->bowl->home->abbreviation}}</h4>
                                                        @endif
                                                    </div
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                                {{$pick->bowl->winner_id == $pick->team_id ? $pick->bowl->winner->abbreviation : 'N/A'}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{$pick->team->abbreviation}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{$pick->confidence}}
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                       <tr class="bg-white">
                                            <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                                &#64;{{$user->username}} has not picked yet
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                                
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                
                                            </td>
                                        </tr> 
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @empty
            <div>
                
            </div>
        @endforelse
    </div>
    <div class="mt-10">
        {{ $users->links() }}
    </div>
</div>

