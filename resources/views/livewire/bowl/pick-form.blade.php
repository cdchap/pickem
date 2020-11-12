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
            
            <div class="col-span-full">
                <form>
                    <div class="flex flex-col justify-center px-6 shadow-black border-black border-2 my-2 ">
                        <fieldset class="my-8 grid grid-cols-3 bg-green-100 gap-4">
                            <div class="bg-red-200">
                                <legend class="font-medium text-xl font-sans text-black">
                                    {{ $bowl->name }}
                                </legend>
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $bowl->channel_color }}-100 text-{{ $bowl->channel_color }}-800">{{ $bowl->channel }}</span>
                                <span class="font-mono text-xs">{{ $bowl->kickoff }}</span>
                                <span class="font-mono text-xs underline">{{ $bowl->date }}</span>
                            </div>

                            <div class=" bg-yellow-100">
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
                                    <input wire:model="picks.{{ $i }}.team_id" name="picks[]"
                                        type="radio"
                                        class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                                        value="{{ $bowl->home->id }}">
                                    <label for="home" class="ml-3">
                                        <span
                                            class="block text-sm leading-5 font-medium text-gray-700">{!!$bowl->home->name!!}</span>
                                    </label>
                                </div>
                            </div>

                            <div x-data="{ locked: false }" class="flex flex-col md:flex-row md:justify-between md:items-center bg-blue-300 space-y-2">
                                <div class="">
                                    <label for="confidence"
                                        class="block text-sm leading-5 font-medium text-gray-700">Confidence</label>
                                    <div x-show="locked" class="font-bold text-center pt-2">
                                        @if ( $picks[$i]['confidence'] )
                                            <span>{{$picks[$i]['confidence']}}</span>
                                        @endif
                                    </div>
                                    <select x-show="!locked" x-bind:disabled="locked" id="confidence" wire:model="picks.{{ $i }}.confidence"
                                        class="mt-1 form-select pl-3 pr-10 py-1 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                        <option seleceted></option>
                                        @foreach ($confidence as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class>
                                    <span x-show="!locked"class="inline-flex rounded-md shadow-sm">
                                        <button @click="locked = true" wire:click="removeConfidenceFromArray({{$picks[$i]['confidence']}})" type="button"
                                            class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition ease-in-out duration-150">
                                            Lock in pick
                                        </button>
                                    </span>
                                    <span x-show="locked"class="inline-flex rounded-md shadow-sm">
                                        <button @click="locked = false" type="button"
                                            class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition ease-in-out duration-150">
                                            Unlock pick
                                        </button>
                                    </span>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                </form>
            </div>
            
        </div>
                
    @endforeach
</div>
