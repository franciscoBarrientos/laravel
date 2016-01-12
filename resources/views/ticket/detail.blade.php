@extends('layouts.principal')
    @section('content')
        @include('alerts.message')
        @foreach($tickets as $ticket)
            {{$ticket}}
        @endforeach
    @endsection