@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Crear Usuario</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="container-fluid">
            {!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
                @include('user.forms.user')
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Guardar
                </button>
                <a href="{{ route('usuario.index') }}" class="btn btn-info" title="Volver">Volver</span></a>
            {!!Form::close()!!}
        </div>
    @endsection