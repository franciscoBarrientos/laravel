@extends('layouts.principal')
@section('content')
        {!!Form::open(['route'=>'cliente.store', 'method'=>'POST'])!!}
            <div class="form-group">
                {!!Form::label('Nombre:')!!}
                {!!Form::text('client_name', null,['class'=>'form-control', 'placeholder'=>'Nombre de cliente', 'required'=>'true'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('Apellido paterno:')!!}
                {!!Form::text('client_last_name_p', null,['class'=>'form-control', 'placeholder'=>'Apellido paterno de cliente', 'required'=>'true'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('Apellido materno:')!!}
                {!!Form::text('client_last_name_m', null,['class'=>'form-control', 'placeholder'=>'Apellido materno de cliente', 'required'=>'true'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('Rut:')!!}
                {!!Form::text('client_rut', null,['class'=>'form-control', 'maxlength'=>'12', 'placeholder'=>'11.111.111-1', 'required'=>'true'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('Dirección:')!!}
                {!!Form::text('client_direction', null,['class'=>'form-control', 'placeholder'=>'Dirección completa. Ej: Calle falsa #123, Depto. 706', 'required'=>'true'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('Teléfono celular:')!!}
                {!!Form::text('client_cellphone', null,['class'=>'form-control', 'maxlength'=>'8', 'placeholder'=>'8123XXXX', 'required'=>'true'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('Teléfono fijo:')!!}
                {!!Form::text('client_phone', null,['class'=>'form-control', 'placeholder'=>'02-22233114'])!!}
            </div>
            {!!Form::submit('Registrar', ['class'=>"btn btn-primary"])!!}
        {!!Form::close()!!}
<!--    Lo de arriba equivale a esto
        <form action="">
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Apellido Paterno</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Apellido Materno</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Rut</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Dirección</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Teléfono celular</label>
                <input type="text" class="form-control" maxlength="8">
            </div>
            <div class="form-group">
                <label for="">Teléfono fijo</label>
                <input type="text" class="form-control">
            </div>
            <button class="btn btn-primary">Registrar</button>
        </form>
-->
@endsection