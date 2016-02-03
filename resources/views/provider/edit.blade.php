@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        @include('alerts.errors')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Editar Proveedor {{$provider->fancy_name}}</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        {!!Form::model($provider,['route'=>['provider.update',$provider->id], 'method'=>'PUT'])!!}
            {!! Form::hidden('id', $provider->id) !!}
            @include('provider.forms.provider')
            {!!Form::submit('Actualizar', ['class'=>"btn btn-primary"])!!}
        {!!Form::close()!!}
    @endsection