@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Crear Alerta para {{$pet->name}}</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        {!!Form::open(['route'=>'alert.store', 'method'=>'POST'])!!}
            @include('alert.forms.alert')
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-plus"></i> Crear
            </button>
            <a href="{{ route('alert.alertIndex',$pet->id) }}" class="btn btn-info">
                <i class="fa fa-arrow-circle-left">  Volver</i>
            </a>
        {!!Form::close()!!}
    @endsection