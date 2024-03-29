<div class="flex flex-col px-4 md:px-0 mx-auto max-w-3xl pt-10">
    <div class="pb-5 border-b-4  border-red-600 my-10">
        <h3 class="leading-6 font-black text-gray-900 ont-black font-sans tracking-wide uppercase text-4xl">
            &#64;{{ $userName }}&rsquo;s Picks
        </h3>
    </div>
    <div class="rounded-2xl shadow-black">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block sm:px-6 lg:px-8">
                <div class="overflow-hidden border-2 border-black rounded-2xl">
                    <table class="divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Matchup
                                </th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Bowl Winner
                                </th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    &#64;{{ $userName }} Pick
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
                                        class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                        <div class="flex flex-col items-start lg:flex-row lg:space-x-2">
                                            @if(isset($pick->bowl->visitor))
                                            <span class="inline-flex space-x-1 items-center"
                                                style="color: {{ $pick->bowl->visitor->color }}">
                                                <img src="{{ $pick->bowl->visitor->logo1 }}" class="h-4 w-4"
                                                    alt="" srcset="">
                                                <span>{{ $pick->bowl->visitor->abbreviation }}</span>
                                            </span>
                                            @else
                                               <span class="inline-flex space-x-1 items-center">
                                                <span>TBD</span>
                                                </span> 
                                            @endif
                                            <span class="text-xs">vs</span>

                                            @if(isset($pick->bowl->home))
                                            <span class="inline-flex space-x-1 items-center"
                                                style="color: {{ $pick->bowl->home->color }}">
                                                <img src="{{ $pick->bowl->home->logo1 }}" class="h-4 w-4" alt=""
                                                    srcset="">
                                                <span>{{ $pick->bowl->home->abbreviation }}</span>
                                            </span>
                                            @else
                                                <span class="inline-flex space-x-1 items-center">
                                                    <span>TBD</span>
                                                </span> 
                                            @endif
                                        </div>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-400">
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
    </div>
</div>
