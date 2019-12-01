@extends('welcome')

@section('title', 'Contacts')

@section('content')
    <div class="p-16 w-1/2 mx-auto">
        <img class="w-50 h-50 object-cover rounded-full mr-4" src="{{$avatar}}">
        {{$note}}
    </div>

    @endsection
