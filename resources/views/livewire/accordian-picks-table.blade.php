<div class="flex justify-center items-center">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Bowl
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
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
                            <tr class="{{ $pick->team_id == ($pick->bowl->winner ? $pick->bowl->winner->id : null) ? 'bg-green-50' : ''}}">
                                <td
                                    class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                    {{ $pick->bowl->name }}
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
