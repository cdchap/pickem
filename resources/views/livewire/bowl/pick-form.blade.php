<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-8">
    <div class="px-4 lg:px-0 mb-8">
        <h2 class="font-sans font-black text-3xl mb-4">Pick The Winners!</h2>
        <p class="font-sans">
            In the form below select the winner of each bowl game. Then select the confidence you have in each
            prediction with <span class="font-bole text-red-600">1</span> being the least confident. Once all
            of your predictions are made submit the form with the button below. Any picks
            left blank will result in a <span class="text-red-600 font-bold font-mono">0</span> point confidence value, so be sure to review
            your picks before submitting. Good luck &#64;{{ auth()->user()->username }}!
        </p>
        <div class="mt-10">
            <div>
                @if($bowlCount > 0)
                    <h3 class="text-base md:text-xl mt-4">You have <span class="font-bold text-green-500">{{ $bowlCount }}</span>
                        remaining bowls to pick!!</h3>
                @else
                    <h3 class="text-xl mt-4">You have <span class="font-bold text-red-500">{{ $bowlCount }}</span>
                        remaining bowls to pick!!</h3>
                @endif
            </div>
            <div class="mt-6">
                <span class="inline-flex rounded-md shadow-sm">
                    <button type="button"
                        disabled="{{ $bowlCount > 0 ? false : true }}"
                        class="inline-flex items-center px-2 flex-shrink-0 md:px-4 py-2 border border-transparent text-sm md:text-base leading-6 font-medium rounded-md text-white {{ $bowlCount > 0 ? 'bg-gray-300 cursor-not-allowed' : 'bg-indigo-600 hover:bg-indigo-500' }} focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                        Submit Picks
                    </button>
                </span>
            </div>
        </div>
       
    </div>
    
    @foreach($bowls as $i => $bowl)
        <div class="grid grid-cols-8 gap-4 px-4 md:px-0">

            <div class="col-span-full">
                <form>
                    <div class="flex flex-col justify-center px-6 shadow-black border-black border-2 my-2 ">
                        <fieldset class="my-8 grid grid-cols-3  gap-4">
                            <div class="">
                                <legend class="font-medium text-xl font-sans text-black">
                                    {{ $bowl->name }}
                                </legend>
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $bowl->channel_color }}-100 text-{{ $bowl->channel_color }}-800">{{ $bowl->channel }}</span>
                                <span class="font-mono text-xs">{{ $bowl->kickoff }}</span>
                                <span class="font-mono text-xs underline">{{ $bowl->date }}</span>
                            </div>

                            <div class="">
                                <div class="flex items-center mb-4">
                                    <input wire:model="picks.{{ $i }}.team_id" name="picks[]"
                                        type="radio"
                                        class="form-radio h-4 w-4 text-green-600 transition duration-150 ease-in-out"
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
                                        class="form-radio h-4 w-4 text-green-600 transition duration-150 ease-in-out"
                                        value="{{ $bowl->home->id }}">
                                    <label for="home" class="ml-3">
                                        <span
                                            class="block text-sm leading-5 font-medium text-gray-700">{!!$bowl->home->name!!}</span>
                                    </label>
                                </div>
                            </div>

                            <div x-data="{ locked: false, selected: true }" class="flex flex-col md:flex-row md:justify-around md:items-center  space-y-2">
                                <div class="flex flex-col justify-center items-center">
                                    <label for="confidence"
                                        class="block text-sm leading-5 font-medium text-gray-700">Confidence</label>
                                    <div x-show="locked" class="font-bold pt-2">
                                        @if ( $picks[$i]['confidence'] )
                                            <span>{{$picks[$i]['confidence']}}</span>
                                        @endif
                                    </div>
                                    <select x-show="!locked" @input="locked = true" wire:input="$emit('confidenceSelected', $event.target.value)" id="confidence" wire:model="picks.{{ $i }}.confidence"
                                        class="mt-1 form-select pl-3 pr-10 py-1 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                        <option selected></option>
                                        @foreach ($confidence as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex flex-col justify-center items-center">
                                    <span x-show="locked"class="inline-flex rounded-md shadow-sm">
                                        <button @click="locked = false, selected = true" wire:click="addConfidenceToArray({{ $picks[$i]['confidence'] }}, {{ $i }})" type="button"
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
