<div class=" container mx-auto px-4 sm:px-6 lg:px-8 ">
    <div class="bg-white px-4 shadow-black border-b-4 border-red-600 mb-8 py-4">
        <h2 class="font-black font-sans tracking-wide uppercase text-4xl underline">2020 Bowl Schedule</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($bowls as $bowl)
            <div class="shadow-black border-2 bg-white border-black px-4 py-4 ">
                <h3 class="text-lg font-sans font-semibold">{{ $bowl->name }}</h3>
                <div class="flex justify-start space-x-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $bowl->channel_color }}-100 text-{{ $bowl->channel_color }}-800">{{ $bowl->channel }}</span>
                    <span class=" text-xs">{{ $bowl->kickoff }}</span> 
                    <span class=" text-xs underline">{{  $bowl->date }}</span> 
                </div>
                <div class="flex flex-col justify-center mt-4">
                    <div class="font-sans">
                        <div class="flex justify-between mb-1">
                        <span class="">{!! $bowl->visitor->name !!}</span>
                            @if ($bowl->home_score > 0)
                                <span class="font-bold text-xl"> {{ $bowl->visitor_score }}</span>
                            @else
                                <span class="font-bold text-cool-gray-300 text-xl">{{ $bowl->visitor_score }}</span>
                            @endif
                        </div>
                        <hr />
                        <div class="flex justify-between mt-1">
                            <span class="">{!! $bowl->home->name !!}</span>
                            @if ($bowl->visitor_score > 0)
                                <span class="font-bold text-xl"> {{ $bowl->home_score }}</span>
                            @else
                                <span class="font-bold text-cool-gray-300 text-xl">{{ $bowl->home_score }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="">
                    @foreach ($picks as $pick)
                        @if ($pick->bowl_id == $bowl->id)
                            <span class="{{ $pick->team_id == $bowl->winner_id ?  'text-green-500' : 'text-red-500'}} text-xs" >&#64;{{$username}}:<span class="underline">{!! $pick->team->name !!}</span></span>
                        @else 
                            <span></span>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
