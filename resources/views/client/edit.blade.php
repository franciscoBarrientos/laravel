@extends('layouts.principal')
@section('content')
@include('alerts.request')
    {!!Form::model($client,['route'=>['client.update',$client->id], 'method'=>'PUT'])!!}
        <div class="form-group">
            {!!Form::label('Nombre:')!!}
            {!!Form::text('name', $client->name,['class'=>'form-control', 'placeholder'=>'Nombre de cliente'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('Apellido:')!!}
            {!!Form::text('lastname', $client->lastname,['class'=>'form-control', 'placeholder'=>'Apellido paterno de cliente'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('Rut:')!!}
            {!!Form::text('rut', $client->rut,['class'=>'form-control', 'maxlength'=>'12', 'placeholder'=>'11.111.111-1'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('Dirección:')!!}
            {!!Form::text('address', $client->address,['class'=>'form-control', 'placeholder'=>'Dirección completa. Ej: Calle falsa #123, Depto. 706'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('Email:')!!}
            {!!Form::text('email', $client->email,['class'=>'form-control', 'placeholder'=>'prueba@prueba.com'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('Teléfono celular:')!!}
            {!!Form::text('cellphone', $client->cellphone,['class'=>'form-control', 'maxlength'=>'15', 'placeholder'=>'+56 9 8765 4321'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('Teléfono fijo:')!!}
            {!!Form::text('phone', $client->phone,['class'=>'form-control', 'maxlength'=>'12', 'placeholder'=>'02 2876 5432'])!!}
        </div>
        {!!Form::submit('Actualizar', ['class'=>"btn btn-primary"])!!}
    {!!Form::close()!!}
@endsection