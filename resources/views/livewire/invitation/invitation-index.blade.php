<div>
    @section('pageTitle', 'Invitations')

    <div class="flex flex-col space-y-4">
        <div class="flex justify-between items-baseline">
            <div>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <!-- Heroicon name: search -->
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input id="search" wire:model="search" class="form-input block w-full pl-10 sm:text-sm sm:leading-5"
                        placeholder="Search">
                </div>
            </div>
            {{-- <div class="">
                <span class="inline-flex rounded-md shadow-sm">
                    <button type="button"
                        @click="showCreate=true"
                        class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:shadow-outline-green focus:border-green-700 active:bg-green-700">
                        Create new bowl
                    </button>
                </span>
            </div> --}}
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created At
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    URL
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($invitations as $invitation)
                                <tr x-data="{ copied: false }">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{$invitation->email}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$invitation->created_at->diffForHumans()}}
                                    </td>
                                    <td id="copy_{{ $invitation->id }}"
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div>
                                            <div class="flex rounded-sm shadow-sm">
                                                <div class="relative flex items-stretch flex-grow focus-within:z-10">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <!-- Heroicon name: users -->
                                                        <svg class="h-4 w-4 text-gray-400"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                fill="currentColor">
                                                                <path fill-rule="evenodd"
                                                                    d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </svg>
                                                    </div>
                                                    <input type="text" id="{{$invitation->id}}"
                                                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-none rounded-l-sm pl-10 sm:text-xs border-gray-300"
                                                        value="{{ $invitation->getLink() }}">
                                                </div>
                                                <button
                                                    onclick="copyToClipBoard('{{$invitation->id}}')"
                                                    {{-- @click="copied=true" --}}
                                                    class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 text-sm font-medium rounded-r-sm text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                    <!-- Heroicon name: sort-ascending -->
                                                    <svg class="h-5 w-5 text-gray-400"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z" />
                                                        <path
                                                            d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div>
            {{$invitations->links()}}
        </div>
    </div>
    @push('scripts')
        <script>
            function copyToClipBoard(id) {
                var copied = document.getElementById(id).select()
                document.execCommand('copy')
            }
        </script>
    @endpush
</div>
