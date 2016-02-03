@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="container-fluid">
            {!!Form::model($alertType,['route'=>['alertType.update',$alertType->id], 'method'=>'PUT'])!!}
            {!! Form::hidden('id', $alertType->id) !!}
            @include('alertType.forms.alertType')
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-refresh"></i> Actualizar
            </button>
            <a href="{{route('alertType.index')}}" class="btn btn-info" title="Volver"><i class="fa fa-arrow-circle-left"></i> Volver</span></a>
            {!!Form::close()!!}
        </div>
        <br><br>
    @endsection