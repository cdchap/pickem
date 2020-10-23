<div class=" container mx-auto px-4 sm:px-6 lg:px-8 ">
    <h2 class="my-8 font-black font-sans tracking-wide uppercase text-4xl border-b-4 border-red-600">2020 Bowl Schedule</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($bowls as $bowl)
            <div class="shadow-black border-2 border-red-600 px-4 py-4 ">
                <h3 class="text-lg font-sans font-semibold">{{ $bowl->name }}</h3>
                <div class="flex justify-start space-x-2">
                    <span class=" text-xs">{{ $bowl->channel }}</span>
                    <span class=" text-xs">{{ $bowl->kickoff }}</span> 
                    <span class=" text-xs underline">{{  $bowl->date }}</span> 
                </div>
                <div class="flex flex-col justify-center mt-4 mb-4">
                    <div class="font-sans">
                        <div class="flex justify-between mb-1">
                        <span class="">{{ $bowl->visitor->name }}</span>
                            @if ($bowl->home_score > 0)
                                <span class="font-bold text-xl"> {{ $bowl->home_score }}</span>
                            @else
                                <span class="font-bold text-cool-gray-300 text-xl">{{ $bowl->home_score }}</span>
                            @endif
                        </div>
                        <hr />
                        <div class="flex justify-between mt-1">
                            <span class="">{{ $bowl->home->name }}</span>
                            @if ($bowl->visitor_score > 0)
                                <span class="font-bold text-xl"> {{ $bowl->home_score }}</span>
                            @else
                                <span class="font-bold text-cool-gray-300 text-xl">{{ $bowl->home_score }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
