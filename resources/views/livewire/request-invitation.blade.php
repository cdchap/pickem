<div>
    here will be a form that has a field for an email and a button to request an invitation
    <p>
        the form will connect to this livewire component. it will create new invitaion and store to the database
    </p>
    <div class="min-h-screen bg-white flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <div class="flex justify-center items-center w-full">
                        <div class="w-1/4">
                            <x-logo />
                        </div>
                    </div>
                    
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                       Request an invitation 
                    </h2>
                </div>

                <div class="mt-8">

                    <div class="mt-6">
                        <form wire:submit.prevent="createInvitation" class="space-y-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">
                                    Email address
                                </label>
                                <div class="mt-1 font-mono">
                                    <input wire:model="email" id="email" type="email" required
                                        class="appearance-none block w-full px-3 py-2 border rounded-md border-gray-300 shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="font-mono">
                                <button type="submit"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Request invitation
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover"
                src="{{asset('images/alex-batchelor-q5IEr16VrTA-unsplash-2.jpg')}}"
               
                alt="">
        </div>
    </div>
</div>
