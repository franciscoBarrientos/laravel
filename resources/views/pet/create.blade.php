@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="container-fluid">
            {!!Form::open(['route'=>'pet.store', 'method'=>'POST'])!!}
                @include('pet.forms.pet')
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Guardar
                </button>
            <a href="{{ route('pet.indexPetsByClient', $client->id) }}" class="btn btn-info" title="Volver">Volver</span></a>
            {!!Form::close()!!}
        </div>
    @endsection