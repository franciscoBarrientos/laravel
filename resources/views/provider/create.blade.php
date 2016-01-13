@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        {!!Form::open(['route'=>'provider.store', 'method'=>'POST'])!!}
            @include('provider.forms.provider')
            {!!Form::submit('Registrar', ['class'=>"btn btn-primary"])!!}
        {!!Form::close()!!}
    @endsection