@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center min-h-screen font-mono">

        <x-login-menu/>

        <div class="flex flex-col items-center justify-center py-56">
            <h1 class="text-2xl md:text-6xl font-bold text-gray-900">🎉College Football🏈</h1>
            <h2 class="text-xl md:text-3xl font-medium text-gray-500">Bowl confidence pool</h2>
            <h2 class="text-xl md:text-3xl font-medium text-gray-500">🥣📈🏊‍♂</h2>
            <div class="mt-8">
                @auth
                    <h3>Welcome {{ auth()->user()->username }}!!</h3>
                @else
                    <span class="inline-flex rounded-md shadow-sm">
                        <button type="button"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition ease-in-out duration-150">
                            Request Invite
                        </button>
                    </span>
                @endauth
            </div>
            
        </div>
        <div class="h-screen bg-card-image bg-center bg-cover  flex flex-col items-center justify-center">
            // put in a livewire component that lists out to the bowls
            {{-- <img class="h-auto w-full object-center object-cover shadow-lg" src="{{ asset('images/alex-batchelor-q5IEr16VrTA-unsplash-2.jpg')}}" alt=""> --}}
        </div>
    </div>
@endsection
