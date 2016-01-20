@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Editar Mascota {{$pet->name}}</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="container-fluid">
            {!!Form::model($pet,['route'=>['pet.update',$pet->id], 'method'=>'PUT'])!!}
                @include('pet.forms.pet')
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-refresh"></i> Actualizar
                </button>
                <a href="{{route('pet.indexPetsByClient', $clientId)}}" class="btn btn-info">
                    <i class="fa fa-arrow-circle-left">  Volver</i>
                </a>
            {!!Form::close()!!}
        </div>
    @endsection