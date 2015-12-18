@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="container-fluid">
            {!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
                @include('user.forms.user')
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Guardar
                </button>
            {!!Form::close()!!}
        </div>
    @endsection