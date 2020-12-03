<div class="">
    <div class="bg-white overflow-hidden rounded-2xl w-full max-w-2xl shadow-black border-2 border-black">
    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap">
            <div class="ml-4 mt-2">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Top Ten
                </h3>
            </div>
            <div class="ml-4 mt-2 flex-shrink-0">
                <span class="inline-flex rounded-md shadow-sm">
                <a  href="{{ route('all.picks') }}"
                        class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:shadow-outline-indigo focus:border-green-700 active:bg-green-700">
                        View all
                    </a>
                </span>
            </div>
        </div>
    </div>
    <ul>
        @foreach ( $userScores as $key => $score)
            <li class="border-t border-gray-200">
                <a href="{{ route('user.picks', $score['username']) }}"
                    class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                    <div class="flex items-center px-4 py-4 sm:px-6">
                        <div class="min-w-0 flex-1 flex items-center">
                            <div class="flex-shrink-0">
                                <span>{{ $key + 1 }}.</span>
                            </div>
                            <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                <div class="flex justify-start items-center">
                                    <div class="text-sm leading-5 font-medium text-indigo-600 truncate">
                                        &#64;{{ $score['username'] }}
                                    </div>
                                </div>
                                <div class="block">
                                    <div>
                                        <div class="text-sm leading-5 text-gray-900">
                                            Picked on
                                            <time datetime="2020-01-07">{{ $score['pick_date']->toFormattedDateString() }}</time>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                            <!-- Heroicon name: check-circle -->
                                            @if($key <= 2 && $score['score'] > 0)
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                            {{ $score['score'] }} pts
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <!-- Heroicon name: chevron-right -->
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
</div>

