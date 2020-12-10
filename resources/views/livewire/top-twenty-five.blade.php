<div wire:init="loadTopTwentyFive" class="container mx-auto px-2 sm:px-6 lg:px-8">
    
    <div class="mb-8 py-4 border-b-4 border-red-600">
        <h2 class="font-black font-sans tracking-wide uppercase text-4xl">Top 25 Rankings</h2>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <section>
            <h3 class='text-cool-gray-700 font-sans font-bold pl-4 sm:pl-0 mb-2'>CFP Top 25</h3>
            <div class="flex flex-col font-sans rounded-2xl shadow-black">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="border-2 border-black overflow-hidden  rounded-2xl">
                            <table  class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            RK
                                        </th>
                                        <th
                                            class="px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Team
                                        </th>
                                        <th class="px-6 py-3 bg-cool-gray-50"></th>
                                        <th
                                            class="px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Record
                                        </th>
                                        <th
                                            class="hidden lg:block px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Trend
                                        </th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @forelse($cfpTopTwentyFive as $i => $team)
                                        <tr
                                            class="{{ $i % 2 == 0 ? 'bg-white' : 'bg-cool-gray-50' }}">
                                            <td class="px-6 py-2 whitespace-no-wrap text-sm  font-medium text-gray-500">
                                                {{ $team['current'] }}
                                            </td>
                                            <td class="px-6 py-2 whitespace-no-wrap text-sm  text-gray-500">
                                                <img class="h-6 w-6"
                                                    src="{{ $team['team']['logo'] }}"
                                                    alt="">
                                            </td class="px-6 py-2 whitespace-no-wrap text-sm  text-gray-900">
                                            <td class="px-6 py-2 whitespace-no-wrap text-sm  text-gray-900">
                                                {{ $team['team']['name'] }}
                                            </td>
                                            <td class="px-6 py-2 whitespace-no-wrap text-sm  text-gray-900">
                                                {{ $team['recordSummary'] }}
                                            </td>
                                            <td class="hidden lg:block px-6 py-2 whitespace-no-wrap text-sm  text-gray-900">
                                                {{ $team['trend'] }} 
                                            </td>
                                        </tr>
                                    @empty
                                        <div class=" w-skeleton-table h-skeleton-table bg-cool-gray-50 rounded-2xl">
                                            
                                        </div>
                                    @endforelse 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <section>
            <div>
                <h3 class='text-cool-gray-700 font-sans font-bold pl-4 sm:pl-0 mb-2'>AP Top 25</h3>
            </div>
            <div class="flex flex-col font-sans rounded-2xl shadow-black">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="border-2 border-black overflow-hidden rounded-2xl">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            RK
                                        </th>
                                        <th
                                            class="px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Team
                                        </th>
                                        <th class="px-6 py-3 bg-cool-gray-50"></th>
                                        <th
                                            class="px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Record
                                        </th>
                                        <th
                                            class="hidden lg:block px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Trend
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($apTopTwentyFive as $i => $team)
                                        <tr
                                            class="{{ $i % 2 == 0 ? 'bg-white' : 'bg-cool-gray-50' }}">
                                            <td class="px-6 py-2 whitespace-no-wrap text-sm  font-medium text-gray-500">
                                                {{ $team['current'] }}
                                            </td>
                                            <td class="px-6 py-2 whitespace-no-wrap text-sm  text-gray-500">
                                                <img class="h-6 w-6"
                                                    src="{{ $team['team']['logo'] }}"
                                                    alt="">
                                            </td class="px-6 py-2 whitespace-no-wrap text-sm  text-gray-900">
                                            <td class="px-6 py-2 whitespace-no-wrap text-sm  text-gray-900">
                                                {{ $team['team']['name'] }}
                                            </td>
                                            <td class="px-6 py-2 whitespace-no-wrap text-sm  text-gray-900">
                                                {{ $team['recordSummary'] }}
                                            </td>
                                            <td class="hidden lg:block px-6 py-2 whitespace-no-wrap text-sm  text-gray-900">
                                               {{ $team['trend'] }} 
                                            </td>
                                        </tr>
                                    @empty
                                        <div class=" w-skeleton-table h-skeleton-table rounded-md bg-cool-gray-50">
                                            
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
