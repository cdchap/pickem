
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 min-w-max-content">
        <div class="py-2 align-middle inline-block sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="hidden md:inline-block px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Matchup
                            </th>
                            <th
                                class="hidden md:inline-block px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Bowl Winner
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                &#64;{{ $user->username }} Pick
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Confidence
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($picks as $pick)
                            <tr class="{{ $pick->team_id == ($pick->bowl->winner ? $pick->bowl->winner->api_id : null) ? 'bg-green-100' : ''}}">
                                <td
                                    class="hidden md:inline-block px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                    <div class="flex flex-col items-start">
                                        <span class="inline-flex space-x-1 items-center" style="color: {{ $pick->bowl->visitor->color }}">
                                            <img src="{{ $pick->bowl->visitor->logo1 }}" class="h-4 w-4" alt="" srcset="">
                                            <span>{{ $pick->bowl->visitor->abbreviation }}</span>
                                        </span> 
                                        
                                        <span class="inline-flex space-x-1 items-center" style="color: {{ $pick->bowl->home->color }}">
                                            <img src="{{ $pick->bowl->home->logo1 }}" class="h-4 w-4" alt="" srcset="">
                                            <span>{{ $pick->bowl->home->abbreviation }}</span>
                                        </span>
                                    </div>
                                </td>
                                <td
                                    class="hidden md:inline-block px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-400">
                                    {{ $pick->bowl->winner->name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500 {{ $pick->team_id == ($pick->bowl->winner ? $pick->bowl->winner->id : null) ? 'text-green-500' : '' }}">
                                    {{ $pick->team->name }} 
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500 text-center {{ $pick->team_id == ($pick->bowl->winner ? $pick->bowl->winner->id : null) ? 'text-green-500' : '' }}">
                                    {{ $pick->confidence }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="border-t border-gray-200 px-4 py-4 sm:px-6 bg-white">
                <!-- Content goes here -->
                    <span class="font-bold text-gray-500">Total: {{ $pointTotal }}</span>
                </div>
                
            </div>
            
        </div>
    </div>


