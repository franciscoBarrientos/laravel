@extends('layouts.principal')
@section('content')
@include('alerts.request')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Crear Administrador</h2>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="container-fluid">
    {!!Form::open(['route'=>'administrator.store', 'method'=>'POST'])!!}
        <div class="form-group">
            {!! Form::label('Seleccione un usuario:') !!}
            <select name="user_id" class="form-control">
                @foreach($userList as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Crear
        </button>
    {!!Form::close()!!}
</div>
@endsection