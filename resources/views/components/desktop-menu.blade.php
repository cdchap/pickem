      <div class="hidden md:flex md:flex-shrink-0">
          <div class="flex flex-col w-64">
              <!-- Sidebar component, swap this element with another sidebar if you like -->
              <div class="flex flex-col h-0 flex-1 border-r border-gray-200 bg-white">
                  <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                      <div class="flex items-center flex-shrink-0 px-4 w-1/2">       
                        <a href="{{ route('home') }}">
                            <x-wordmark />
                        </a>
                      </div>
                      <nav class="mt-5 flex-1 px-2 bg-white space-y-1">
                        <a href="{{ route('admin.dashboard') }}"
                        class="{{ request()->url() == route('admin.dashboard') ? 'bg-gray-100' : '' }} group flex items-center px-2 py-2 text-sm leading-5 font-medium text-gray-900 rounded-md hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 transition ease-in-out duration-150">
                              <!-- Heroicon name: home -->
                              <svg class="mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150"
                                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                  stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                              </svg>
                              Dashboard
                          </a>

                          <a href="{{ route('admin.user-index') }}"
                            class="{{ request()->url() == route('admin.user-index') ? 'bg-gray-100' : '' }} group flex items-center px-2 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                              <!-- Heroicon name: users -->
                              <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                  stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                              </svg>
                              Users
                          </a>

                          <a href="{{ route('admin.bowl-index') }}"
                            class="{{ request()->url() == route('admin.bowl-index') ? 'bg-gray-100' : '' }} group flex items-center px-2 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                              <!-- Heroicon name: folder -->
                              <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                  stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                              </svg>
                              Bowls
                          </a>

                          <a href="#"
                              class="group flex items-center px-2 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                              <!-- Heroicon name: calendar -->
                              <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                  stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                              </svg>
                              Seasons
                          </a>

                          <a href="{{route('admin.invitation-index')}}"
                              class="{{ request()->url() == route('admin.invitation-index') ? 'bg-gray-100' : '' }} group flex items-center px-2 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                              <!-- Heroicon name: inbox -->
                              <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                  stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                              </svg>
                              Invitations
                          </a>

                          <a href="{{ route('admin.permission-index') }}"
                              class="{{ request()->url() == route('admin.permission-index') ? 'bg-gray-100' : '' }} group flex items-center px-2 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                              <!-- Heroicon name: chart-bar -->
                              <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                              </svg>
                              Roles/Permissions
                          </a>
                      </nav>
                  </div>
                  <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                      <a href="#" class="flex-shrink-0 w-full group block">
                          <div class="flex items-center">
                              <div>
                                  <img class="inline-block h-9 w-9 rounded-full"
                                      src="{{ auth()->user()->avatarUrl() }}"
                                      alt="{{ auth()->user()->name }}">
                              </div>
                              <div class="ml-3">
                                  <p class="text-sm leading-5 font-medium text-gray-700 group-hover:text-gray-900">
                                      {{ auth()->user()->username }}
                                  </p>
                                  <p
                                      class="text-xs leading-4 font-medium text-gray-500 group-hover:text-gray-700 transition ease-in-out duration-150">
                                      View profile
                                  </p>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
      </div>