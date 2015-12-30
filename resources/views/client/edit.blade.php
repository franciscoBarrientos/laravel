@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        {!!Form::model($client,['route'=>['client.update',$client->id], 'method'=>'PUT'])!!}
            @include('client.forms.client')
            </br></br></br>
            {!!Form::submit('Actualizar', ['class'=>"btn btn-primary"])!!}
            <a href="{{ route('client.index') }}" class="btn btn-info" title="Volver">Volver</span></a>
        {!!Form::close()!!}
    @endsection