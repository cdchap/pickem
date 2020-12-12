<div  
    class="flex flex-col mt-10 px-2 md:px-0">
    <div class="flex space-x-4">
        <div class="bg-white rounded-2xl shadow-black border-2 border-black px-4 md:px-6 py-6">
            <div class="border-b-2 border-red-600 ">
                <h3 class="font-bold text-xl text-center">Pick %</h3>
            </div>
            <div class="mt-1">
                <div>
                    <span>{{ $bowl->visitor->abbreviation}}</span>
                    <span>{{  $visitorPickPercentage }}%</span>
                </div>
                <div>
                    <span>{{ $bowl->home->abbreviation}}</span>
                    <span>{{ $homePickPercentage }}%</span>
                </div>
            </div>
        </div>
    </div>
</div>
