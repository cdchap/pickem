<div x-data="{ createOpen: false }">
    @section('pageTitle', 'Permissions')
    <div class="flex flex-col space-y-4">
        <div class="flex flex-col md:flex-row md:justify-between items-baseline space-y-2">
            <div>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <!-- Heroicon name: search -->
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input id="search" wire:model="search" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 py-2 sm:text-sm border-gray-300 rounded-md"
                        placeholder="Search permissions">
                </div>
            </div>
            
            <div class="flex flex-col md:flex-row justify-between space-y-2 md:space-x-4">
                <div class="flex flex-col md:flex-row md:space-x-2 justify-start md:items-center">
                    <button @click="createOpen = true" type="button"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        New Permission +
                    </button>
                </div>
            </div>
        </div>
        
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                 <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Guard
                                </th>
                                <th class="px-6 py-3 bg-gray-50"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($permissions as $key => $permission)
                                <tr wire:loading.class="opacity-75">
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900 {{ $key % 2 == 1 ? 'bg-gray-50' : ''}}">
                                        {{ $permission->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900 {{ $key % 2 == 1 ? 'bg-gray-50' : ''}}">
                                        {{ $permission->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500 {{ $key % 2 == 1 ? 'bg-gray-50' : ''}}">
                                       {{ $permission->guard_name }} 
                                    </td>
                                                                       
                                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium {{ $key % 2 == 1 ? 'bg-gray-50' : ''}}">
                                        <div>
                                            <span class="inline-flex rounded-md shadow-sm mr-2">
                                            <a href="{{ route('admin.bowl-edit', $permission) }}"
                                                    class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-50 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150">
                                                    edit
                                                </a>
                                            </span>
                                        </div>
                                        
                                    </td>
                                </tr>
                            @empty
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    No data available
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"></td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"></td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"></td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="">
            {{ $permissions->links() }}
        </div>
    </div>

    {{-- This is the create permission form --}}
    <livewire:permission.permission-create />
</div>
