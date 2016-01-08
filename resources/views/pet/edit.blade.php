@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        {!!Form::model($pet,['route'=>['pet.update',$pet->id], 'method'=>'PUT'])!!}
            @include('pet.forms.pet')
            </br></br></br>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-refresh"></i> Actualizar
            </button>
            <a href="{{ route('pet.indexPetsByClient', $client->id) }}" class="btn btn-info">
                <i class="fa fa-arrow-circle-left">  Volver</i>
            </a>
        {!!Form::close()!!}
    @endsection