@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center min-h-screen font-mono">

        <x-login-menu />

        <div class="flex flex-col items-center justify-center py-40">
            <h1 class="text-2xl md:text-6xl font text-black border-b-4 border-red-600">College Football</h1>
            <h2 class="mt-4 text-xl md:text-3xl text-gray-500">Bowl 🏈 Confidence 🏈 Pool</h2>
            <h2 class="mt-4 text-xl md:text-2xl text-gray-500">🎉 🎉 🎉</h2>
            <div class="mt-8 bg-xo">
                @auth
                    <h3>Welcome <span>@<a class="" href="#">{{ auth()->user()->username }}</a></span>!!</h3>
                @else
                    <span class="inline-flex rounded-md shadow-sm">
                        <button type="button"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition ease-in-out duration-150">
                            Request Invitation
                        </button>
                    </span>
                @endauth
            </div>
            
        </div>
        <div class="h-screen bg-card-image bg-center bg-cover bg-opacity-25 flex flex-col items-center justify-center text-white">
            <p class="prose-2xl">// put in a livewire component that has just the top ten leaders</p>
        </div>
        <div>
             <livewire:bowl.bowl-list /> 
        </div>
        <div class="mt-16 bg-mich-stadium bg-contain bg-center h-screen text-white prose-2xl flex flex-col justify-center items-center">
            // Something here that is intereseting
        </div>
    </div>
@endsection
