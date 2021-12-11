
<div x-cloak x-show="createOpen" 

        x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
        x-transition:enter-start="otranslate-x-full"
        x-transition:enter-end="otranslate-x-0"
        x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
    class="fixed inset-0 overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
  <div class="absolute inset-0 overflow-hidden">
    <!-- Background overlay, show/hide based on slide-over state. -->
    <div class="absolute inset-0" aria-hidden="true">
      <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
        <!--
          Slide-over panel, show/hide based on slide-over state.

          Entering: "transform transition ease-in-out duration-500 sm:duration-700"
            From: "translate-x-full"
            To: "translate-x-0"
          Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
            From: "translate-x-0"
            To: "translate-x-full"
        -->
        <div class="w-screen max-w-md">
          <div class="h-full flex flex-col py-6 bg-white shadow-xl overflow-y-scroll">
            <div class="px-4 sm:px-6">
              <div class="flex items-start justify-between">
                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                  Create a Permission
                </h2>
                <div class="ml-3 h-7 flex items-center">
                  <button @click="createOpen = false" type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="sr-only">Close panel</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            <div class="mt-6 relative flex-1 px-4 sm:px-6">
              <!-- Replace with your content -->
              <div class="absolute inset-0 px-4 sm:px-6">
                <div class="h-full border-2 border-dashed border-gray-200" aria-hidden="true"></div>
              </div>
              <!-- /End replace -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
