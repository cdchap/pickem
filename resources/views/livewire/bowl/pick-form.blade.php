<div x-show="hasPicked" class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

 
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
        
        <div class="inline-block align-bottom space-y-6 bg-white px-4 pt-5 pb-4 text-left overflow-hidden shadow border-2 border-black transform transition-all sm:my-8 sm:align-middle lg:max-w-4xl md:max-w-3xl sm:max-w-xl sm:w-full sm:p-6"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <h2 class="font-bold text-4xl"><span class="">&#64;{{ auth()->user()->username }}&#39;s</span> 2020 Picks</h2>
            <ol class="list-decimal ml-6">
                <li>Select the teams you think will win</li>
                <li>Drag bowls in your order of confidence from <span class="font-bold uppercase">most</span> confident to <span class="font-bold uppercase">least</span> confident</li>
            </ol>
            
            @foreach($bowls as $i => $bowl)
            <div class="grid grid-cols-8 gap-4">
                <div class="flex flex-col justify-center items-center">
                    <span class="font-mono text-gray-600 md:text-base">Conf.</span>
                    <span class="text-black lg:text-3xl">30</span>
                </div>
                <div class="col-span-7">
                    <form>
                        <div class="flex flex-col justify-between px-6 shadow-black border-black border-2 my-2 ">
                            <fieldset class="my-8 grid grid-cols-2">
                                <div>
                                    <legend class="font-medium text-xl  text-black">
                                        {{ $bowl->name }}
                                    </legend>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $bowl->channel_color }}-100 text-{{ $bowl->channel_color }}-800">{{ $bowl->channel }}</span>
                                    <span class="font-mono text-xs">{{ $bowl->kickoff }}</span>
                                    <span class="font-mono text-xs underline">{{ $bowl->date }}</span>
                                </div>

                                <div class="">
                                    <div class="flex items-center mb-4">
                                        <input wire:model="picks.{{ $i }}.team_id" name="picks[$i][team_id]"
                                            type="radio"
                                            class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                                            value="{{ $bowl->visitor->id }}">
                                        <label for="visitor" class="ml-3">
                                            <span
                                                class="block text-sm leading-5 font-medium text-gray-700">{{ $bowl->visitor->name }}</span>
                                        </label>
                                    </div>
                                    <hr>
                                    <div class="mt-4 flex items-center">
                                        <input wire:model="picks.{{ $i }}.team_id" name="picks[$i][team_id]"
                                            type="radio"
                                            class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                                            value="{{ $bowl->home->id }}">
                                        <label for="home" class="ml-3">
                                            <span
                                                class="block text-sm leading-5 font-medium text-gray-700">{!!$bowl->home->name!!}</span>
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
                
            </div>
                
            @endforeach

            <div class="flex flex-col justify-center w-full">
                <span class="inline-flex rounded-md shadow-sm">
                    <button wire:click="submitPicks" type="button"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition ease-in-out duration-150">
                        Make my picks
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>
