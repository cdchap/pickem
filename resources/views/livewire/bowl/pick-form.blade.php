<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-8">
    <div class="px-4 lg:px-0 mb-8">
        <h2 class="font-sans font-black text-3xl mb-4">Pick The Winners!</h2>
        <p>
            In the form below select the winner of each bowl game. After all the winners are selected you then drag the bowl cards 
            up or down and place them in the order of confidence you have in your pick. The top <span class="uppercase underline">most</span> bowl will be your most confident
            and the bottom will be your <span class="uppercase underline">least</span> confident pick. After you have put the bowls
            in the order that you want, submit your picks witht he button at the bottom (<span class="hover:text-green-500 underline"><a href="#submit">go to submit button</a></span>).
        </p>
    </div>
    
    @foreach($bowls as $i => $bowl)
        <div class="grid grid-cols-8 gap-4 px-4 md:px-0">
            <div class="col-span-7">
                <form >
                    <div class="flex flex-col justify-between px-6 shadow-black border-black border-2 my-2 ">
                        <div>
                            {{-- @foreach ($picks as $index => $pick)
                                picks: {{ $pick }}
                            @endforeach --}}
                            
                            seasonId: {{ $seasonId }}
                            userId: {{ $userId }}
                        </div>
                        <fieldset class="my-8 grid grid-cols-2">
                            <div>
                                <legend class="font-medium text-xl font-sans text-black">
                                    {{ $bowl->name }}
                                </legend>
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $bowl->channel_color }}-100 text-{{ $bowl->channel_color }}-800">{{ $bowl->channel }}</span>
                                <span class="font-mono text-xs">{{ $bowl->kickoff }}</span>
                                <span class="font-mono text-xs underline">{{ $bowl->date }}</span>
                                <input type="hidden" name="picks[]" wire.model="picks.{{ $i }}.bowl_id" value="{{ $bowl->id }}">
                            </div>

                            <div class="">
                                <div class="flex items-center mb-4">
                                    <input wire:model="picks.{{ $i }}.team_id" name="picks[]"
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
</div>
