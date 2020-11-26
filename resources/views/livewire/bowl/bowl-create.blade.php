<div class="inset-0 overflow-hidden">
    <div class="inset-0 overflow-hidden">
        <section class="absolute inset-y-0 right-0 pl-10 max-w-full flex sm:pl-16"
            x-show="showCreate"
            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:enter-start="translate-x-full "
            x-transition:enter-end="translate-x-0 "
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:leave-start="translate-x-0 "
            x-transition:leave-end="translate-x-full ">
        
            <div class="w-screen max-w-2xl">
                <div class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll">
                    <div class="flex-1">
                        <!-- Header -->
                        <header class="px-4 py-6 bg-gray-50 sm:px-6">
                            <div class="flex items-start justify-between space-x-3">
                                <div class="space-y-1">
                                    <h2 class="text-lg leading-7 font-medium text-gray-900">
                                        New Bowl
                                    </h2>
                                    <p class="text-sm text-gray-500 leading-5">
                                        Get started by filling in the information below to create a new bowl.
                                    </p>
                                </div>
                                <div class="h-7 flex items-center">
                                    <button aria-label="Close panel"
                                        @click="showCreate=false"
                                        class="text-gray-400 hover:text-gray-500 transition ease-in-out duration-150">
                                        <!-- Heroicon name: x -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </header>

                        <!-- Divider container -->
                        <div class="py-6 space-y-6 sm:py-0 sm:space-y-0 sm:divide-y sm:divide-gray-200">
                            <!-- Project name -->
                            <div class="space-y-1 px-4 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                                <div>
                                    <label for="project_name"
                                        class="block text-sm font-medium leading-5 text-gray-900 sm:mt-px sm:pt-2">
                                        Bowl name
                                    </label>
                                </div>
                                <div class="sm:col-span-2">
                                    <div class="rounded-md shadow-sm">
                                        <input wire:model="name" id="bowlName" class="form-input block w-full sm:text-sm sm:leading-5"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>

                            <!-- Project description -->
                            <div class="space-y-1 px-4 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                                <div>
                                    <label for="project_description"
                                        class="block text-sm font-medium leading-5 text-gray-900 sm:mt-px sm:pt-2">
                                        Description
                                    </label>
                                </div>
                                <div class="sm:col-span-2">
                                    <div class="flex rounded-md shadow-sm">
                                        <textarea id="project_description" rows="3"
                                            class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Home Team -->
                            <div class="space-y-1 px-4 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                                <div>
                                    <label for="project_description"
                                        class="block text-sm font-medium leading-5 text-gray-900 sm:mt-px sm:pt-2">
                                        Home Team
                                    </label>
                                </div>
                                <div class="sm:col-span-2">
                                    <div wire:init="loadTeams" class="">
                                        <select wire:model="homeId" id="homeTeam"
                                            class="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                            <option selected>select team</option>
                                            @forelse ($teams as $team)
                                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                                            @empty
                                                working...
                                            @endforelse
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Home Team -->
                            <div class="space-y-1 px-4 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                                <div>
                                    <label for="project_description"
                                        class="block text-sm font-medium leading-5 text-gray-900 sm:mt-px sm:pt-2">
                                        Home Team
                                    </label>
                                </div>
                                <div class="sm:col-span-2">
                                    <div wire:init="loadTeams" class="">
                                        <select wire:model="visitorId" id="visitorTeam"
                                            class="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                            <option selected>select team</option>
                                            @forelse ($teams as $team)
                                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                                            @empty
                                                working...
                                            @endforelse
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Privacy -->
                            <fieldset>
                                <div
                                    class="space-y-2 px-4 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:px-6 sm:py-5">
                                    <div>
                                        <legend class="text-sm leading-5 font-medium text-gray-900">
                                            Privacy
                                        </legend>
                                    </div>
                                    <div class="space-y-5 sm:col-span-2">
                                        <div class="space-y-5 sm:mt-0">
                                            <div class="relative flex items-start">
                                                <div class="absolute flex items-center h-5">
                                                    <input id="public_access"
                                                        aria-describedby="public_access_description" type="radio"
                                                        name="privacy"
                                                        class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                                                        checked>
                                                </div>
                                                <div class="pl-7 text-sm leading-5">
                                                    <label for="public_access" class="font-medium text-gray-900">
                                                        Public access
                                                    </label>
                                                    <p id="public_access_description" class="text-gray-500">
                                                        Everyone with the link will see this project
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="relative flex items-start">
                                                <div class="absolute flex items-center h-5">
                                                    <input id="restricted_access"
                                                        aria-describedby="restricted_access_description" type="radio"
                                                        name="privacy"
                                                        class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                </div>
                                                <div class="pl-7 text-sm leading-5">
                                                    <label for="restricted_access" class="font-medium text-gray-900">
                                                        Private to Project Members
                                                    </label>
                                                    <p id="restricted_access_description" class="text-gray-500">
                                                        Only members of this project would be able to access
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="relative flex items-start">
                                                <div class="absolute flex items-center h-5">
                                                    <input id="private_access"
                                                        aria-describedby="private_access_description" type="radio"
                                                        name="privacy"
                                                        class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                </div>
                                                <div class="pl-7 text-sm leading-5">
                                                    <label for="private_access" class="font-medium text-gray-900">
                                                        Private to you
                                                    </label>
                                                    <p id="private_access_description" class="text-gray-500">
                                                        You are the only one able to access this project
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="border-gray-200">
                                        <div
                                            class="flex flex-col space-between space-y-4 sm:flex-row sm:items-center sm:space-between sm:space-y-0">
                                            <div class="flex-1">
                                                <a href="#"
                                                    class="group flex items-center text-sm leading-5 text-indigo-600 hover:text-indigo-900 focus:text-indigo-900 font-medium space-x-2.5">
                                                    <!-- Heroicon name: link -->
                                                    <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-900 group-focus:text-indigo-900"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <span>
                                                        Copy link
                                                    </span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#"
                                                    class="group flex items-center text-sm leading-5 text-gray-500 hover:text-gray-900 focus:text-gray-900 space-x-2.5">
                                                    <!-- Heroicon name: question-mark-circle -->
                                                    <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <span>
                                                        Learn more about sharing
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <!-- Action buttons -->
                    <div class="flex-shrink-0 px-4 border-t border-gray-200 py-5 sm:px-6">
                        <div class="space-x-3 flex justify-end">
                            <span class="inline-flex rounded-md shadow-sm">
                                <button type="button"
                                    class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                    Cancel
                                </button>
                            </span>
                            <span class="inline-flex rounded-md shadow-sm">
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                    Create
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
