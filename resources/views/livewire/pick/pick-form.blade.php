<div class=" mx-auto pt-8 mb-10">
    @can('make picks')
    {{-- Modal --}}
    <div x-data="{ showModal: false }" class="max-w-6xl mx-auto pt-8 mb-10">
        <div x-show="showModal" class="fixed z-10 inset-0 overflow-y-auto"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform "
            x-transition:enter-end="opacity-100 transform "
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform "
            x-transition:leave-end="opacity-0 transform "
        >
            
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gradient-three opacity-75"></div>
                </div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
      
                <div @click.away="showModal = false" class="inline-block align-bottom bg-white px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 transform translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95"
                    >
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-orange-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicon name: exclamation -->
                            <svg class="h-6 w-6 text-orange-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                Submit Picks
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm leading-5 text-gray-500">
                                    Have you checked to see if you have chosen a winner for each bowl? Any bowl that 
                                    does not have a winner picked will result in zero points.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button type="submit"
                                wire:click="submit"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Pick&rsquo;em!
                            </button>
                        </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                            <button @click="showModal=false" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Go back
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 lg:px-0 mb-8">
            <h2 class="font-sans font-black text-3xl mb-4">Pick The Winners!</h2>
            <p class="font-sans">
                In the form below select the winner of each bowl game. Then select the confidence you have in each
                prediction with <span class="font-bole text-red-600">1</span> being the least confident. Once all
                of your predictions are made submit the form with the button below. Any picks
                left blank will result in a <span class="text-red-600 font-bold font-mono">0</span> point confidence value, so be sure to review
                your picks before submitting. Good luck &#64;{{ auth()->user()->username }}!
            </p>
            <div class="pb-5 border-b border-gray-200 mt-10">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    @if($bowlCount > 0)
                        <h3 class="text-base md:text-xl mt-4">You have <span class="font-bold text-green-500">{{ $bowlCount }}</span>
                            remaining bowls to pick!!</h3>
                    @else
                        <h3 class="text-xl mt-4">You have <span class="font-bold text-red-500">{{ $bowlCount }}</span>
                            remaining bowls to pick!!</h3>
                    @endif
                </h3>
            </div>
            <div class="mt-6">
                <span class="inline-flex rounded-md shadow-sm">
                    <button @click="showModal=true" type="button"
                        {{ $bowlCount > 0 ? 'disabled' : '' }}
                        class="inline-flex items-center px-2 flex-shrink-0 md:px-4 py-2 border border-transparent text-sm md:text-base leading-6 font-medium rounded-md text-white {{ $bowlCount > 0 ? 'bg-gray-300 cursor-not-allowed' : 'bg-indigo-600 hover:bg-indigo-500' }} focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                        Submit Picks
                    </button>
                </span>
            </div>
        </div>
    </div>
{{-- bowl pick cards --}}
    @foreach($bowls as $i => $bowl)
        <div class="grid grid-cols-8 gap-4 px-4 md:px-0">

            <div class="col-span-full">
                <div class="">
                    <form wire:submit.prevent>
                        <div class="flex flex-col justify-center px-6 shadow-black rounded-md bg-white border-black border-2 my-2 mx-4">
                            <fieldset class="my-8 grid grid-cols-3  gap-4">
                                <div class="">
                                    <legend class="font-medium text-l md:text-xl font-sans text-black">
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
    
                                <div x-data="{ locked: false, selected: true, showModal: false }" class="flex flex-col md:flex-row md:justify-around md:items-center  space-y-2">
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
            
        </div>
                
    @endforeach
   @else
        <div class="h-screen flex flex-col justify-center items-center w-screen bg-gradient-to-br from-purple-400 via-pink-500 to-red-500 -mt-8 -mb-10">
            <div class="w-1/3 border-2 border-black shadow-black px-4 py-6 bg-white">
                <h3 class="text-2xl">🛑 Hey! ✋</h3>
                <p class="text-cool-gray-900">You have already made your picks <a href="#"></a><span class="border-b-2 border-pink-500">&#64;{{ auth()->user()->username }}</span>! 
                    Head back to the <a href="{{ route('home') }}" class="text-pink-500 underline hover:text-purple-500">home page</a>
                </p>
            </div>
        </div>
        
    @endcan 
</div>
