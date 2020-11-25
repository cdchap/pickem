<div wire:init="loadTopTwentyFive" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <section>
        <div>
            <h3 class='text-white pl-4 sm:pl-0'>{{ $topTwentyFive['0']['shortHeadline'] }}</h3>
        </div>
        <div class="flex flex-col font-sans">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        RK
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Team
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50"></th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Record
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Trend
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($topTwentyFive['0']['ranks'] as $i => $team)>
                                    <tr
                                        class="{{ $i % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
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
                                        <td class="px-6 py-2 whitespace-no-wrap text-sm  text-gray-900">
                                            {{ $team['trend'] }} 
                                        </td>
                                    </tr>
                                @empty
                                <div>
                                    loading...
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
            <h3 class='text-white pl-4 sm:pl-0'>{{ $topTwentyFive['1']['shortHeadline'] }}</h3>
        </div>
        <div class="flex flex-col font-sans">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        RK
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Team
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50"></th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Record
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Trend
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($topTwentyFive['1']['ranks'] as $i => $team)>
                                    <tr
                                        class="{{ $i % 2 == 0 ? 'bg-gray-50' : 'bg-white' }}">
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
                                        <td class="px-6 py-2 whitespace-no-wrap text-sm  text-gray-900">
                                           {{ $team['trend'] }} 
                                        </td>
                                    </tr>
                                @empty
                                    loading...
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
