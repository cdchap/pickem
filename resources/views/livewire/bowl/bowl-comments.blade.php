<div class="flex flex-col h-full bg-pink-200 rounded-2xl border-2 border-black px-8 py-10">
    <div class="h-full flex-grow-0 overflow-y-scroll flex flex-col space-y-2">
        <div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus ultricies tristique nulla aliquet enim tortor at auctor. Congue nisi vitae suscipit tellus. Semper viverra nam libero justo laoreet sit amet. Amet cursus sit amet dictum sit. Fames ac turpis egestas sed. Tempus urna et pharetra pharetra massa massa ultricies mi. Ornare lectus sit amet est placerat in egestas. Curabitur vitae nunc sed velit dignissim sodales ut. Arcu odio ut sem nulla pharetra diam. Arcu odio ut sem nulla pharetra diam sit amet nisl. Mollis aliquam ut porttitor leo a diam sollicitudin tempor id.

Faucibus interdum posuere lorem ipsum dolor sit. Eu lobortis elementum nibh tellus molestie nunc non blandit. Dictum non consectetur a erat. Iaculis urna id volutpat lacus laoreet non curabitur. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque. Viverra suspendisse potenti nullam ac. Sapien faucibus et molestie ac feugiat sed lectus vestibulum. Est placerat in egestas erat imperdiet sed euismod nisi porta. Placerat orci nulla pellentesque dignissim enim sit amet venenatis. Vitae congue eu consequat ac felis donec et. Nunc sed augue lacus viverra vitae congue eu consequat. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit lectus.

Enim nec dui nunc mattis enim ut tellus elementum sagittis. Sed viverra ipsum nunc aliquet. Quis risus sed vulputate odio ut enim blandit. Diam sollicitudin tempor id eu nisl nunc mi. Ante in nibh mauris cursus mattis molestie a iaculis. Velit egestas dui id ornare arcu odio ut. Nullam non nisi est sit amet facilisis magna. Sit amet cursus sit amet dictum sit. Turpis egestas integer eget aliquet. Venenatis tellus in metus vulputate eu. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Odio euismod lacinia at quis risus sed vulputate odio. Sed felis eget velit aliquet sagittis id consectetur purus. Vitae aliquet nec ullamcorper sit amet risus. Volutpat sed cras ornare arcu dui vivamus arcu felis bibendum.

Pellentesque sit amet porttitor eget dolor morbi non arcu. Quam id leo in vitae turpis massa sed. Commodo nulla facilisi nullam vehicula ipsum a. Rhoncus dolor purus non enim praesent. Sem viverra aliquet eget sit amet tellus cras. Purus ut faucibus pulvinar elementum integer. Pellentesque sit amet porttitor eget dolor morbi non. Fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Condimentum mattis pellentesque id nibh tortor. Mi eget mauris pharetra et ultrices neque ornare aenean euismod. Tortor at auctor urna nunc id. Quis eleifend quam adipiscing vitae. Lobortis feugiat vivamus at augue eget arcu dictum. Eget felis eget nunc lobortis mattis aliquam faucibus purus in. Bibendum ut tristique et egestas. Aliquet nibh praesent tristique magna sit amet purus gravida.

Mauris cursus mattis molestie a iaculis at erat pellentesque. In vitae turpis massa sed elementum tempus. Condimentum id venenatis a condimentum vitae sapien pellentesque habitant morbi. Elementum eu facilisis sed odio. Est lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque. Quis varius quam quisque id diam vel quam. At volutpat diam ut venenatis. Et tortor at risus viverra. Pulvinar pellentesque habitant morbi tristique. Duis ut diam quam nulla porttitor. Enim ut sem viverra aliquet eget sit amet tellus. Est ultricies integer quis auctor. Suspendisse interdum consectetur libero id faucibus nisl tincidunt eget. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Eu sem integer vitae justo eget magna fermentum iaculis. Dictum at tempor commodo ullamcorper. Etiam erat velit scelerisque in dictum non consectetur a. Tincidunt lobortis feugiat vivamus at augue.
        </div>
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
        <form wire:prevent.default >
            <h3 class="font-sans font-bold text-xl">Comment</h3>
            <textarea 
                wire:model="comment"
                class="mt-1 mb-4 border-2 block w-full px-4 py-4 sm:text-sm border-black rounded-2xl" name="comment" id="comment"
                cols="30" rows="10"></textarea>
            <div class="flex justify-end">
                <span class="inline-flex rounded-md shadow-sm">
                    <button 
                        wire:click="save"
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
