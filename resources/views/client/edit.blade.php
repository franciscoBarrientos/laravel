@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        {!!Form::model($client,['route'=>['client.update',$client->id], 'method'=>'PUT'])!!}
            @include('client.forms.client')
            {!!Form::submit('Actualizar', ['class'=>"btn btn-primary"])!!}
        {!!Form::close()!!}
    @endsection