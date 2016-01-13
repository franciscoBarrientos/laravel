@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        {!!Form::model($client,['route'=>['client.update',$client->id], 'method'=>'PUT'])!!}
            @include('client.forms.client')
            </br></br></br>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-refresh"></i> Actualizar
            </button>
            <a href="{{ route('client.index') }}" class="btn btn-info">
                <i class="fa fa-arrow-circle-left"></i>  Volver
            </a>
        {!!Form::close()!!}
    @endsection