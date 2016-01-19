@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Editar Tipo de Atención {{$atentionType->description}}</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        {!!Form::model($atentionType,['route'=>['atentionType.update',$atentionType->id], 'method'=>'PUT'])!!}
            @include('atentionType.forms.atentionType')
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-refresh"></i> Actualizar
            </button>
            <a href="{{ route('atentionType.index') }}" class="btn btn-info">
                <i class="fa fa-arrow-circle-left">  Volver</i>
            </a>
        {!!Form::close()!!}
    @endsection