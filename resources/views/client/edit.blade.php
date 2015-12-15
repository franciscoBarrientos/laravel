@extends('layouts.principal')
@section('content')
    {!!Form::model($client,['route'=>['cliente.update',$client->id], 'method'=>'PUT'])!!}
        <!--@include('client.forms.cliente')-->
        <div class="form-group">
            {!!Form::label('Nombre:')!!}
            {!!Form::text('client_name', null,['class'=>'form-control', 'placeholder'=>'Nombre de cliente'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('Apellido paterno:')!!}
            {!!Form::text('client_last_name_p', null,['class'=>'form-control', 'placeholder'=>'Apellido paterno de cliente'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('Apellido materno:')!!}
            {!!Form::text('client_last_name_m', null,['class'=>'form-control', 'placeholder'=>'Apellido materno de cliente'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('Rut:')!!}
            {!!Form::text('client_rut', null,['class'=>'form-control', 'maxlength'=>'12', 'placeholder'=>'11.111.111-1'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('Dirección:')!!}
            {!!Form::text('client_direction', null,['class'=>'form-control', 'placeholder'=>'Dirección completa. Ej: Calle falsa #123, Depto. 706'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('Teléfono celular:')!!}
            {!!Form::text('client_cellphone', null,['class'=>'form-control', 'maxlength'=>'8', 'placeholder'=>'8123XXXX'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('Teléfono fijo:')!!}
            {!!Form::text('client_phone', null,['class'=>'form-control', 'placeholder'=>'02-22233114'])!!}
        </div>
        {!!Form::submit('Actualizar', ['class'=>"btn btn-primary"])!!}
    {!!Form::close()!!}
@endsection