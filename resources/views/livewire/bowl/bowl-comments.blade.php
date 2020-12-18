<div class="flex flex-col h-full bg-pink-200 rounded-2xl border-2 border-black px-8 py-10">
    <div class="h-full flex-grow-0 overflow-y-scroll flex flex-col space-y-2">
        @foreach ($comments as $comment)
            <div class="flex space-x-4 bg-pink-200 h-10">
                <div>
                    {{$comment->user->username}}
                </div>
                <div>
                    {{$comment->body}}
                </div>
            </div>
        @endforeach

    </div>
    <div class="mt-2">
        <form wire:submit.prevent="save" >
            <h3 class="font-sans font-bold text-xl">Comment</h3>
            <textarea 
                wire:model="comment"
                class="mt-1 mb-4 border-2 block w-full px-4 py-4 sm:text-sm border-black rounded-2xl" name="comment" id="comment"
                cols="30" rows="10"></textarea>
            <div class="flex justify-end">
                <span class="inline-flex rounded-md shadow-sm">
                    <button 
                        
                        type="submit"    
                        type="button"
                        class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                        Comment
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
