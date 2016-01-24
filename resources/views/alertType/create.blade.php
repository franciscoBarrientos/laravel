@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Crear Tipo de Alerta</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        {!!Form::open(['route'=>'alertType.store', 'method'=>'POST'])!!}
            @include('alertType.forms.alertType')
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-plus"></i> Crear
            </button>
            <a href="{{ route('alertType.index') }}" class="btn btn-info">
                <i class="fa fa-arrow-circle-left">  Volver</i>
            </a>
        {!!Form::close()!!}
    @endsection