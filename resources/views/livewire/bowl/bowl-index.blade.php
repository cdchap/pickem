<div x-data="">
    @section('pageTitle', 'Bowls')
    <div class="flex flex-col space-y-4">
        <div class="flex justify-between items-baseline">
            <div>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <!-- Heroicon name: search -->
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input id="search" wire:model="search" class="form-input block w-full pl-10 sm:text-sm sm:leading-5"
                        placeholder="Search">
                </div>
            </div>
            
            <div class="flex justify-between space-x-4">
                <div class="flex space-x-2 items-center">
                    <label for="season" class="block text-sm leading-5 font-medium text-gray-700">Season</label>
                    <select id="season" wire:model="season"
                        class="form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                        <option value="2019" selected>2019</option>
                        <option value="2020">2020</option>
                    </select>
                </div>
                <span class="inline-flex rounded-md shadow-sm">
                    <button type="button"
                        wire:click="updateBowls" 
                        class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:shadow-outline-green focus:border-green-700 active:bg-green-700">
                        Update {{ $season }} Scores
                    </button>
                </span>
            </div>
        </div>
        
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Season
                                </th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Playoff
                                </th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Date/Kickoff
                                </th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Home
                                </th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Visitor
                                </th>
                                <th class="px-6 py-3 bg-gray-50"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($bowls as $key => $bowl)
                                <tr wire:loading.class="opacity-75">
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900 {{ $key % 2 == 1 ? 'bg-gray-50' : ''}}">
                                        {{ $bowl->season }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500 {{ $key % 2 == 1 ? 'bg-gray-50' : ''}}">
                                        @if ($bowl->semi_final)
                                            <span class="text-2xl">🥈</span>
                                        @elseif ($bowl->championship)
                                            <span class="text-2xl">🏆</span>
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500 {{ $key % 2 == 1 ? 'bg-gray-50' : ''}}">
                                       {{ $bowl->date }} {{ $bowl->kickoff }} 
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500 {{ $key % 2 == 1 ? 'bg-gray-50' : ''}}">
                                        <div class="flex">
                                            @if ($bowl->home->api_id == $bowl->winner_id)
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                            <span>{!! $bowl->home->name !!}</span>
                                        </div>
                                        
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500 {{ $key % 2 == 1 ? 'bg-gray-50' : ''}}">
                                        <div class="flex">
                                            @if ($bowl->visitor->api_id == $bowl->winner_id)
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                            <span>{!! $bowl->visitor->name !!}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium {{ $key % 2 == 1 ? 'bg-gray-50' : ''}}">
                                        <div>
                                            <span class="inline-flex rounded-md shadow-sm mr-2">
                                            <a href="{{ route('admin.bowl-edit', $bowl) }}"
                                                    class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-50 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150">
                                                    edit
                                                </a>
                                            </span>
                                            
                                            <span class="inline-flex rounded-md shadow-sm">
                                                <a href="#">
                                                    <button type="button"
                                                        class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition ease-in-out duration-150">
                                                        delete
                                                    </button>
                                                </a>
                                                
                                            </span>
                                        </div>
                                        
                                    </td>
                                </tr>
                            @empty
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    No data available
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"></td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"></td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"></td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"></td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"></td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="">
            {{ $bowls->links() }}
        </div>
    </div>
    
</div>
