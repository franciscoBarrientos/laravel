@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Editar Usuario {{$user->name}}</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="container-fluid">
            {!!Form::model($user,['route'=>['usuario.update',$user->id], 'method'=>'PUT'])!!}
                {!! Form::hidden('id', $user->id) !!}
                @include('user.forms.user')
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-refresh"></i> Actualizar
                </button>
                <a href="{{ route('usuario.index') }}" class="btn btn-info" title="Volver">Volver</span></a>
            {!!Form::close()!!}
        </div>
    @endsection