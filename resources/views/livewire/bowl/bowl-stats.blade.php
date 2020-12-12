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
    <div>
        <div class="h-96 overflow-y-scroll">
            // comment cards will go here
   
        </div>
        <div class="mt-2">
            <h3 class="font-sans font-bold text-xl">Comment</h3>
            <textarea class="mt-1 mb-4 border-2 block w-full px-4 py-4 sm:text-sm border-black rounded-2xl" name="" id="" cols="30" rows="10"></textarea>
            <div class="flex justify-end">
                <span class="inline-flex rounded-md shadow-sm">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                        Comment
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>

