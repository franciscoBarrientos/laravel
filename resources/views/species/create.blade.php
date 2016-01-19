@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Crear Especie</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="container-fluid">
            {!!Form::open(['route'=>'species.store', 'method'=>'POST'])!!}
                @include('species.forms.species')
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Guardar
                </button>
                <a href="{{ route('species.index') }}" class="btn btn-info">
                    <i class="fa fa-arrow-circle-left"></i>  Volver
                </a>
            {!!Form::close()!!}
        </div>
    @endsection