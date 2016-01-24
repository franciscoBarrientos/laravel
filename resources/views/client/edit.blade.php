@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Editar Cliente {{$client->name}} {{$client->lastname}}</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        {!!Form::model($client,['route'=>['client.update',$client->id], 'method'=>'PUT'])!!}
            @include('client.forms.client')
            </br></br></br>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-refresh"></i> Actualizar
            </button>
            <a href="{{ route('client.index') }}" class="btn btn-info">
                <i class="fa fa-arrow-circle-left"></i>  Volver
            </a>
        {!!Form::close()!!}
    @endsection