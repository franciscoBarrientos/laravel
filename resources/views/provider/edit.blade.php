@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        {!!Form::model($provider,['route'=>['provider.update',$provider->id], 'method'=>'PUT'])!!}
            {!! Form::hidden('id', $provider->id) !!}
            @include('provider.forms.provider')
            {!!Form::submit('Actualizar', ['class'=>"btn btn-primary"])!!}
        {!!Form::close()!!}
    @endsection