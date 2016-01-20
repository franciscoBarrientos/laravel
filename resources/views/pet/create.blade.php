@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Crear Mascota</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="container-fluid">
            {!!Form::open(['route'=>'pet.store', 'method'=>'POST'])!!}
                {!!Form::hidden('client_id', $client->id)!!}
                @include('pet.forms.pet')
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Guardar
                </button>
                <a href="{{ route('pet.indexPetsByClient', $client->id) }}" class="btn btn-info">
                    <i class="fa fa-arrow-circle-left"></i>  Volver
                </a>
            {!!Form::close()!!}
        </div>
    @endsection