<div class="container mx-auto max-w-5xl py-20 flex flex-col">
    <section>
        <div class="overflow-hidden grid gird-cols-3 md:grid-cols-5 gap-4 shadow-black border-2 border-black bg-white rounded-2xl py-10 px-6 font-sans">
            <div class="hidden md:block -my-10 -mx-6 overflow-hidden">
                <img class="object-cover w-full h-48" src="{{ $bowl->visitor->logo1 }}" alt="">
            </div>
            <div class="flex justify-end">
                <div class="flex flex-col justify-start items-end space-y-4">
                    <div class="flex space-x-2 items-center">
                        <div class="flex flex-col justify-end items-end">
                            <span class="font-bold text-2xl text-gray-900 truncate">{{ $bowl->visitor->name}}</span>
                            <span class="font-thin text-xs text-gray-400 -mt-1 flex justify-end">
                                {{ $visitorRecord['0']['total']['wins'] }} - {{ $visitorRecord['0']['total']['losses'] }}, 
                                {{ $visitorRecord['0']['conferenceGames']['wins'] }} - {{ $visitorRecord['0']['conferenceGames']['losses'] }} 
                            </span>
                        </div>
                        <span class="md:hidden">
                            <img class="h-10 w-10" src="{{$bowl->visitor->logo1}}" alt="{{$bowl->visitor->name}}">
                        </span>
                    </div>
                    <div>
                        <span class="font-bold text-xl">{{ $bowl->visitor_score }}</span>
                    </div>
                </div>
            </div> 
            
            <div class="grid grid-cols-6 grid-rows-3 text-xs font-thin px-6">
                <div class="col-span-6 grid grid-cols-6 border-b border-black ">
                    <div class="col-start-2 col-end-3 flex flex-col justify-center items-center">
                        1
                    </div>
                    <div class="col-start-3 col-end-4 flex flex-col justify-center items-center">
                        2
                    </div>
                    <div class="col-start-4 col-end-5 flex flex-col justify-center items-center">
                        3
                    </div>
                    <div class="col-start-5 col-end-6 flex flex-col justify-center items-center">
                        4
                    </div>
                    <div class="col-start-6 col-end-7 flex flex-col justify-center items-center">
                        <span class="font-normal">T</span>
                    </div>
                </div>
                <div class="col-span-6 grid grid-cols-6">
                    <div class="col-start-1 col-end-2 flex flex-col justify-end">
                        {{$bowl->visitor->abbreviation}}
                    </div>
                     <div class="col-start-2 col-end-3 flex flex-col justify-end items-center">
                        {{ $bowl->visitor_quarter_one_score}}
                    </div>
                    <div class="col-start-3 col-end-4 flex flex-col justify-end items-center">
                        {{ $bowl->visitor_quarter_two_score}}
                    </div>
                    <div class="col-start-4 col-end-5 flex flex-col justify-end items-center">
                        {{ $bowl->visitor_quarter_three_score}}
                    </div>
                    <div class="col-start-5 col-end-6 flex flex-col justify-end items-center">
                        {{ $bowl->visitor_quarter_four_score}}
                    </div>
                    <div class="col-start-6 col-end-7 flex flex-col justify-end items-center">
                        <span class="font-normal">{{ $bowl->visitor_score}}</span>
                    </div>
                </div>
                <div class="col-span-6 grid grid-cols-6">
                    <div class="col-start-1 col-end-2 flex flex-col justify-start items-center">
                        {{$bowl->home->abbreviation}}
                    </div>
                     <div class="col-start-2 col-end-3 flex flex-col justify-start items-center">
                        {{ $bowl->home_quarter_one_score}}
                    </div>
                    <div class="col-start-3 col-end-4 flex flex-col justify-start items-center">
                        {{ $bowl->home_quarter_two_score}}
                    </div>
                    <div class="col-start-4 col-end-5 flex flex-col justify-start items-center">
                        {{ $bowl->home_quarter_three_score}}
                    </div>
                    <div class="col-start-5 col-end-6 flex flex-col justify-start items-center">
                        {{ $bowl->home_quarter_four_score}}
                    </div>
                    <div class="col-start-6 col-end-7 flex flex-col justify-start items-center">
                        <span class="font-normal">{{ $bowl->home_score}}</span>
                    </div>
                </div>
            </div>

            <div class="flex justify-start">
                <div class="flex flex-col justify-start space-y-4">
                    <div class="flex flex-col space-x-2">
                        <span class="md:hidden">
                            <img class="h-10 w-10" src="{{$bowl->home->logo1}}" alt="{{$bowl->home->name}}">
                        </span>
                        <div class="flex flex-col justify-start items-start">
                            <span class="font-bold text-2xl text-gray-900 truncate">{{ $bowl->home->name}}</span>
                            <span class="font-thin text-xs text-gray-400 -mt-1">
                                {{ $homeRecord['0']['total']['wins'] }} - {{ $homeRecord['0']['total']['losses'] }}, 
                                {{ $homeRecord['0']['conferenceGames']['wins'] }} - {{ $homeRecord['0']['conferenceGames']['losses'] }} 
                            </span>
                        </div>
                    </div>
                    <div>
                        <span class="font-bold text-xl"">{{ $bowl->home_score }}</span>
                    </div>
                </div>
            </div>  

            <div class="hidden md:block h-auto -my-10 -mr-6 overflow-hidden">
                <img class="object-cover w-full h-48" src="{{ $bowl->home->logo1 }}" alt="">
            </div>      
        </div>
    </section>
    <div>
        {{$bowl->api_id}}
    </div>
</div>
