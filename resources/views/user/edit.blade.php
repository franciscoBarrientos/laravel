@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="container-fluid">
            {!!Form::model($user,['route'=>['usuario.update',$user->id], 'method'=>'PUT'])!!}
                {!! Form::hidden('id', $user->id) !!}
                @include('user.forms.user')
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-refresh"></i> Actualizar
                </button>
            {!!Form::close()!!}
        </div>
    @endsection