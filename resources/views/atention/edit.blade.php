@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="container-fluid">
            {!!Form::model($atention,['route'=>['atention.update',$atention->id], 'method'=>'PUT'])!!}
                {!! Form::hidden('id', $atention->id) !!}
                @include('atention.forms.atention')
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-refresh"></i> Actualizar
                </button>
            <a href="{{route('pet.indexPetsByClient', $client->id)}}" class="btn btn-info" title="Volver"><i class="fa fa-arrow-circle-left"></i> Volver</span></a>
            {!!Form::close()!!}
        </div>
    @endsection