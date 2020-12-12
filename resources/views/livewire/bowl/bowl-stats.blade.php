<div 
    class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-10 bg-white rounded-2xl shadow-black border-2 border-black px-4 md:px-6 py-6 ">
    <div class="col-span-1 md:col-span-2 flex flex-col justify-center items-center my-2">
        <div class="border-b-2 border-red-600 ">
            <h3 class="font-bold font-sans text-xl text-center">Pick %</h3>
        </div>
        <div class="mt-1">
            <span>{{ $bowl->visitor->abbreviation }}</span>
            <span>{{ $visitorPickPercentage }}%</span>
        </div>
        <div>
            <span>{{ $bowl->home->abbreviation }}</span>
            <span>{{ $homePickPercentage }}%</span>
        </div>
    </div>
    <div class="">
        <div
            class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 ">
                    <div class="shadow overflow-hidden rounded-2xl border-2 border-black">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Matchup
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <img class="h-5 w-5" src="{{$bowl->visitor->logo1}}" alt="">
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <img class="h-5 w-5" src="{{$bowl->home->logo1}}" alt="">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($bowlStats))
                                    @foreach ($bowlStats['0']['teams']['0']['stats'] as $i => $stats)   
                                        <tr class="{{$i % 2 == 1 ? 'bg-gray-50' : 'bg-white'}}">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{$stats['category']}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{$bowlStats['0']['teams']['1']['stats'][$i]['stat']}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{$bowlStats['0']['teams']['0']['stats'][$i]['stat']}}
                                            </td>
                                        </tr>
                                    @endforeach 
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:bowl.bowl-comments :bowl="$bowl"/>
</div>

