@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        {!!Form::model($pet,['route'=>['pet.update',$pet->id], 'method'=>'PUT'])!!}
        @include('pet.forms.pet')
        </br></br></br>
        {!!Form::submit('Actualizar', ['class'=>"btn btn-primary"])!!}
        <a href="{{ route('pet.indexPetsByClient', $client->id) }}" class="btn btn-info" title="Volver">Volver</span></a>
        {!!Form::close()!!}
    @endsection