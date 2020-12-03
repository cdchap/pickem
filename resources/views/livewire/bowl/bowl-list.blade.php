<div wire:init="loadBowlList" class=" container mx-auto px-4 sm:px-6 lg:px-8 ">
    <div class="mb-8 py-4 border-b-4 border-red-600">
        <h2 class="font-black font-sans tracking-wide uppercase text-4xl">2020 Bowl Schedule</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($bowls as $bowl)
            <div class="shadow-black border-2 bg-white border-black px-4 py-4 rounded-md">
                <h3 class="text-lg font-sans font-semibold">{{ $bowl->name }}</h3>
                <div class="flex justify-start space-x-2">
                    <span class="font-sans text-xs">{{ $bowl->date }}</span> 
                    <span class=" font-sans text-xs text-orange-600">{{  $bowl->kickoff }} EST</span> 
                    @if ($bowl->semifinal_display)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-green-300 text-green-600">{{$bowl->semifinal_display}}</span>
                    @endif
                    @if ($bowl->championship_display)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-indigo-300 text-indigo-600">{{$bowl->championship_display}}</span>
                    @endif
                </div>
                
                <div class="flex flex-col justify-center mt-4">
                    <div class="font-sans">
                        <div class="flex justify-between gap-4 mb-1">
                            <div class="flex space-x-2 items-center w-1/2">
                                <img src="{{ $bowl->visitor->logo1 ?? '' }}" class="h-5 w-5">
                                <span>{{ $bowl->visitor->name }}</span>
                            </div>
                            <span class="font-bold text-xl"> {{ $bowl->visitor_score }}</span>    
                        </div>
                        <hr />
                        <div class="flex justify-between mt-2">
                            <div class="flex space-x-2 items-center">
                                <img src="{{ $bowl->home->logo1 ?? '' }}" class="h-5 w-5">
                                <span>{{ $bowl->home->name }}</span>
                            </div>
                            <span class="font-bold text-xl"> {{ $bowl->home_score }}</span>
                        </div>
                    </div>
                </div>
                <div class="text-xs">
                    @foreach ($picks as $pick)
                        @if ($pick->bowl_id == $bowl->id)
                        <div class="flex justify-between mt-2 font-sans">
                            <div class="text-sm" >
                            <span >&#64;{{$username}} &rarr; <span style="color: {{ $pick->team->color }}">{!! $pick->team->name !!}</span></span>
                            </div>
                            <div class="text-sm " >
                                <span >confidence &rarr; <span class="font-semibold">{{ $pick->confidence }}</span></span>
                            </div>
                        </div>
                        @else 
                            <span></span>
                        @endif
                    @endforeach
                </div>
            </div>
        @empty
            <div class="flex flex-col justify-start space-y-6 h-52 shadow-black border-2 bg-white border-black px-4 py-4 rounded-md">
                <span class="inline-block bg-gray-100 w-16 h-4"></span>
                <span class="inline-block bg-gray-100 w-40 h-6"></span>
                <hr>
                <span class="inline-block bg-gray-100 w-40 h-6"></span>
                <span class="inline-block bg-gray-100 w-16 h-4"></span>
            </div>
            <div class="flex flex-col justify-start space-y-6 h-52 shadow-black border-2 bg-white border-black px-4 py-4 rounded-md">
                <span class="inline-block bg-gray-100 w-16 h-4"></span>
                <span class="inline-block bg-gray-100 w-40 h-6"></span>
                <hr>
                <span class="inline-block bg-gray-100 w-40 h-6"></span>
                <span class="inline-block bg-gray-100 w-16 h-4"></span>
            </div>
            <div class="flex flex-col justify-start space-y-6 h-52 shadow-black border-2 bg-white border-black px-4 py-4 rounded-md">
                <span class="inline-block bg-gray-100 w-16 h-4"></span>
                <span class="inline-block bg-gray-100 w-40 h-6"></span>
                <hr>
                <span class="inline-block bg-gray-100 w-40 h-6"></span>
                <span class="inline-block bg-gray-100 w-16 h-4"></span>
            </div>
            <div class="flex flex-col justify-start space-y-6 h-52 shadow-black border-2 bg-white border-black px-4 py-4 rounded-md">
                <span class="inline-block bg-gray-100 w-16 h-4"></span>
                <span class="inline-block bg-gray-100 w-40 h-6"></span>
                <hr>
                <span class="inline-block bg-gray-100 w-40 h-6"></span>
                <span class="inline-block bg-gray-100 w-16 h-4"></span>
            </div>
            <div class="flex flex-col justify-start space-y-6 h-52 shadow-black border-2 bg-white border-black px-4 py-4 rounded-md">
                <span class="inline-block bg-gray-100 w-16 h-4"></span>
                <span class="inline-block bg-gray-100 w-40 h-6"></span>
                <hr>
                <span class="inline-block bg-gray-100 w-40 h-6"></span>
                <span class="inline-block bg-gray-100 w-16 h-4"></span>
            </div>
            <div class="flex flex-col justify-start space-y-6 h-52 shadow-black border-2 bg-white border-black px-4 py-4 rounded-md">
                <span class="inline-block bg-gray-100 w-16 h-4"></span>
                <span class="inline-block bg-gray-100 w-40 h-6"></span>
                <hr>
                <span class="inline-block bg-gray-100 w-40 h-6"></span>
                <span class="inline-block bg-gray-100 w-16 h-4"></span>
            </div>
            
        @endforelse

    </div>
</div>
