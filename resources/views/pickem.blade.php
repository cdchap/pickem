@extends('layouts.app')

@section('content')

    @can('make picks')
        <livewire:bowl.pick-form />
    @else
        <div class="h-screen flex flex-col justify-center items-center bg-gradient-to-br from-purple-400 via-pink-500 to-red-500">
            <div class="w-1/3 border-2 border-black shadow-black px-4 py-6 bg-white">
                <h3 class="text-2xl">🛑 Hey! ✋</h3>
                <p class="text-cool-gray-900">You have already made your picks <a href="#"></a><span class="border-b-2 border-pink-500">&#64;{{ auth()->user()->username }}</span>! 
                    Head back to the <a href="{{ route('home') }}" class="text-pink-500 underline hover:text-purple-500">home page</a>
                </p>
            </div>
        </div>
        
    @endcan

@endsection