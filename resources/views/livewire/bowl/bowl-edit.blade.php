<div class="bg-white px-4 py-10 rounded-2xl shadow-md">
    @section('pageTitle', 'Edit Bowl')
  
    <form wire:submit.prevent>
        <div>
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Bowl
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                        Bowl information 
                    </p>
                </div>
                <div class="mt-6 sm:mt-5 space-y-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="username"
                            class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                            Bowl Name
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg flex rounded-md shadow-sm">
                                <span
                                    class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                    {{$bowl->name}}
                                </span>
                                <input type="text" id="bowl.name" wire:model="bowl.name"
                                    class="flex-1 form-input block w-full min-w-0 rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                    </div>

                    <div
                        class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="home" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                            <span class="inline-flex space-x-2"><img src="{{  $bowl->home->logo1 }}" alt="{{ $bowl->home->name }}" class="h-5 w-5"><span>{{ $bowl->home->name }}</span></span>
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg rounded-md shadow-sm sm:max-w-xs">
                                <input type="text" id="home_score" wire:model="bowl.home_score"
                                    class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                    </div>

                    <div
                        class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="visitor" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                            <span class="inline-flex space-x-2"><img src="{{  $bowl->visitor->logo1 }}" alt="{{ $bowl->visitor->name }}" class="h-5 w-5"><span>{{ $bowl->visitor->name }}</span></span>
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg rounded-md shadow-sm sm:max-w-xs">
                                <input type="text" id="home_score" wire:model="bowl.visitor_score"
                                    class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                    </div>

                    <div
                        class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="country" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                            Winner
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg rounded-md shadow-sm sm:max-w-xs">
                                <select id="winner_id" wire:model="bowl.winner_id"
                                    class="block form-select w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    <option value="null" selected></option>
                                    <option value="{{  $bowl->home->api_id }}">{{$bowl->home->name}}</option>
                                    <option value="{{  $bowl->visitor->api_id }}">{{$bowl->visitor->name}}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div x-data="{ semiFinal: @entangle('semiFinal') }"
                        class="mt-6 sm:mt-5 sm:border-t sm:border-gray-200 sm:pt-5">
                        <div role="group" aria-labelledby="label-notifications">
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                <div>
                                    <div class="text-base leading-6 font-medium text-gray-900 sm:text-sm sm:leading-5 sm:text-gray-700"
                                        id="label-notifications">
                                        Semifinal
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <div class="max-w-lg">
                                        <p class="text-sm leading-5 text-gray-500 mb-2">Is this bowl a semifinal?</p>
                                        <!-- On: "bg-indigo-600", Off: "bg-gray-200" -->
                                        <span
                                            :class="semiFinal ? 'bg-indigo-600' : 'bg-gray-200'"
                                            :aria-checked="semiFinal"
                                            @click="semiFinal = !semiFinal"
                                            role="checkbox" tabindex="0" 
                                            class="mt-2 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline">
                                            <!-- On: "translate-x-5", Off: "translate-x-0" -->
                                            <span aria-hidden="true"
                                                :class="semiFinal ? 'translate-x-5' : 'translate-x-0'"
                                                class="inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200"></span>
                                        </span>

                                        {{-- <div class="mt-4">
                                            <div class="flex items-center">
                                                <input id="smeifinal" name="semi_final" type="radio" wire:model="bowl.semi_final" value="1"
                                                    {{ $bowl->semi_final ? 'checked' : '' }}
                                                    class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                <label for="push_everything" class="ml-3">
                                                    <span
                                                        class="block text-sm leading-5 font-medium text-gray-700">Semi-final</span>
                                                </label>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-data="{ championship: @entangle('championship') }"
                        class="mt-6 sm:mt-5 sm:border-t sm:border-gray-200 sm:pt-5">
                        <div role="group" aria-labelledby="label-notifications">
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                <div>
                                    <div class="text-base leading-6 font-medium text-gray-900 sm:text-sm sm:leading-5 sm:text-gray-700"
                                        id="label-notifications">
                                        National Championship
                                    </div>
                                </div>
                                <!-- On: "bg-indigo-600", Off: "bg-gray-200" -->
                                <div class="sm:col-span-2">
                                    <div class="max-w-lg">
                                        <p class="text-sm leading-5 text-gray-500">Is this bowl the National Championship?</p>
                                        <span
                                            :class="championship ? 'bg-indigo-600' : 'bg-gray-200'"
                                            :aria-checked="championship"
                                            @click="championship = !championship"
                                            role="checkbox" tabindex="0" 
                                            class="mt-2 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline">
                                            <!-- On: "translate-x-5", Off: "translate-x-0" -->
                                            <span aria-hidden="true"
                                                :class="championship ? 'translate-x-5' : 'translate-x-0'"
                                                class="inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200"></span>
                                        </span>
                                        <span>{{$championship}}</span>
                                        {{-- <div class="mt-4">
                                            <div class="flex items-center">
                                                <input id="championship" name="championship" type="radio" wire:model="bowl.championship" value="1"
                                                    {{ $bowl->championship ? 'checked' : '' }}
                                                    class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                <label for="push_everything" class="ml-3">
                                                    <span
                                                        class="block text-sm leading-5 font-medium text-gray-700">championship</span>
                                                </label>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-200 pt-5">
            <div class="flex justify-end">
                <span class="inline-flex rounded-md shadow-sm">
                    <a href="{{ route('admin.bowl-index') }}"
                        class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                        Back to Bowls
                </a>
                </span>
                <span class="ml-3 inline-flex rounded-md shadow-sm">
                    <button type="submit" wire:click="save"
                        class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Save
                    </button>
                </span>
            </div>
        </div>
    </form>
</div>