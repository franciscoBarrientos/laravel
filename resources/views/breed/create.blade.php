@extends('layouts.principal')
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Crear Raza</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        @include('alerts.request')
        {!!Form::open(['route'=>'breed.store', 'method'=>'POST'])!!}
            @include('breed.forms.breed')
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Guardar
                </button>
                <a href="{{ route('breed.index') }}" class="btn btn-info">
                    <i class="fa fa-arrow-circle-left"></i>  Volver
                </a>
            </div>
        {!!Form::close()!!}
    @endsection