@extends('layouts.base')

@section('body')
    <div>
        <div class="min-h-screen bg-white flex">
            @yield('content')

            @isset($slot)
                {{ $slot }}
            @endisset

            <div class="hidden lg:block relative w-0 flex-1">
                <img class="absolute inset-0 h-full w-full object-cover"
                    src="{{ asset('images/alex-batchelor-q5IEr16VrTA-unsplash-2.jpg') }}"
                    alt="Gaylord Family Oklahoma Memorial Stadium">
            </div>
        </div>
    </div>
@endsection
