@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        {!!Form::model($breed,['route'=>['breed.update',$breed->id], 'method'=>'PUT'])!!}
            @include('breed.forms.breed')
            </br></br></br>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-refresh"></i> Actualizar
            </button>
            <a href="{{ route('breed.index') }}" class="btn btn-info">
                <i class="fa fa-arrow-circle-left">  Volver</i>
            </a>
        {!!Form::close()!!}
    @endsection