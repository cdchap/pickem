<div x-show="isOpen" x-cloak class="md:hidden">
                <div class="fixed inset-0 flex z-40"
                        x-transition:enter="transition-opacity ease-linear duration-300"
                        x-transition:enter-start="opacity-0 transform"
                        x-transition:enter-end="opacity-100 transform"
                        x-transition:leave="transition-opacity ease-linear duration-300"
                        x-transition:leave-start="opacity-100 transform"
                        x-transition:leave-end="opacity-0 transform"
                >
                   
                    <!--
                        Off-canvas menu overlay, show/hide based on off-canvas menu state.

                        Entering: "transition-opacity ease-linear duration-300"
                        From: "opacity-0"
                        To: "opacity-100"
                        Leaving: "transition-opacity ease-linear duration-300"
                        From: "opacity-100"
                        To: "opacity-0"
                    -->
                    <div class="fixed inset-0">
                        <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
                    </div>
                    <!--
                        Off-canvas menu, show/hide based on off-canvas menu state.

                        Entering: "transition ease-in-out duration-300 transform"
                        From: "-translate-x-full"
                        To: "translate-x-0"
                        Leaving: "transition ease-in-out duration-300 transform"
                        From: "translate-x-0"
                        To: "-translate-x-full"
                    -->
                    <div class="relative flex-1 flex flex-col max-w-xs w-full bg-white"
                        x-transition:enter="transition ease-in-out duration-300 translate transform"
                        x-transition:enter-start="transform -translate-x-full"
                        x-transition:enter-end="transform translate-x-0"
                        x-transition:leave="transition ease-in-out duration-300 transform"
                        x-transition:leave-start="transform translate-x-0"
                        x-transition:leave-end="transform -translate-x-full"
                    >
                        <div class="absolute top-0 right-0 -mr-14 p-1">
                            <button
                                @click="isOpen = false"
                                class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-gray-600"
                                aria-label="Close sidebar">
                                <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                            <div class="flex-shrink-0 flex items-center px-4 w-1/2">
                                <a href="{{ route('home') }}">
                                    <x-wordmark />
                                </a>
                            </div>
                            <nav class="mt-5 px-2 space-y-1">
                                <a href="{{ route('admin.dashboard') }}"
                                    class="group flex items-center px-2 py-2 text-base leading-6 font-medium text-gray-900 rounded-md bg-gray-100 focus:outline-none focus:bg-gray-200 transition ease-in-out duration-150">
                                    <!-- Heroicon name: home -->
                                    <svg class="mr-4 h-6 w-6 text-gray-500 group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Dashboard
                                </a>

                                <a href="#"
                                    class="group flex items-center px-2 py-2 text-base leading-6 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-100 transition ease-in-out duration-150">
                                    <!-- Heroicon name: users -->
                                    <svg class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    Users
                                </a>

                                <a href="{{ route('admin.bowl-index') }}"
                                    class="group flex items-center px-2 py-2 text-base leading-6 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-100 transition ease-in-out duration-150">
                                    <!-- Heroicon name: folder -->
                                    <svg class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                    </svg>
                                    Bowls
                                </a>

                                <a href="#"
                                    class="group flex items-center px-2 py-2 text-base leading-6 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-100 transition ease-in-out duration-150">
                                    <!-- Heroicon name: calendar -->
                                    <svg class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Seasons
                                </a>

                                <a href="{{ route('admin.invitation-index')}}"
                                    class="group flex items-center px-2 py-2 text-base leading-6 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-100 transition ease-in-out duration-150">
                                    <!-- Heroicon name: inbox -->
                                    <svg class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                    Invitations
                                </a>

                                <a href="#"
                                    class="group flex items-center px-2 py-2 text-base leading-6 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-100 transition ease-in-out duration-150">
                                    <!-- Heroicon name: chart-bar -->
                                    <svg class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                    Roles/Permissions
                                </a>
                            </nav>
                        </div>
                        <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                            <a href="#" class="flex-shrink-0 group block focus:outline-none">
                                <div class="flex items-center">
                                    <div>
                                        <img class="inline-block h-10 w-10 rounded-full"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                    </div>
                                    <div class="ml-3">
                                        <p
                                            class="text-base leading-6 font-medium text-gray-700 group-hover:text-gray-900">
                                            Tom Cook
                                        </p>
                                        <p
                                            class="text-sm leading-5 font-medium text-gray-500 group-hover:text-gray-700 group-focus:underline transition ease-in-out duration-150">
                                            View profile
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="flex-shrink-0 w-14">
                        <!-- Force sidebar to shrink to fit close icon -->
                    </div>
                </div>
            </div>