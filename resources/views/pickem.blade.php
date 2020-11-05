@extends('layouts.app')

@section('content')

@can('make picks')
   <livewire:bowl.pick-form />
@else
    <a href="{{ route('home') }}">go home</a>
@endcan

    
@endsection