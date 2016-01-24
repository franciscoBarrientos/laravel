@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="container-fluid">
            {!!Form::model($alert,['route'=>['alert.update',$alert->id], 'method'=>'PUT'])!!}
                {!! Form::hidden('id', $alert->id) !!}
                @include('alert.forms.alert')
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-refresh"></i> Actualizar
                </button>
                <a href="{{route('alert.alertIndex', $pet->id)}}" class="btn btn-info" title="Volver"><i class="fa fa-arrow-circle-left"></i> Volver</span></a>
            {!!Form::close()!!}
        </div>
        <br><br>
    @endsection