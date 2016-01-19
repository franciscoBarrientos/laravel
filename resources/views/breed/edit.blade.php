@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Editar Raza {{$breed->name}}</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        {!!Form::model($breed,['route'=>['breed.update',$breed->id], 'method'=>'PUT'])!!}
            @include('breed.forms.breed')
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-refresh"></i> Actualizar
            </button>
        {!!Form::close()!!}
        <a href="{{ route('breed.index') }}" class="btn btn-info">
            <i class="fa fa-arrow-circle-left">  Volver</i>
        </a>
    @endsection