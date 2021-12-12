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
                    src="{{ asset('images/51710934036_4a5612c2fd_k.jpg') }}"
                    alt="Michigan Stadium">
            </div>
        </div>
    </div>
@endsection
