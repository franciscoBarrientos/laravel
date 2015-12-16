@extends('layouts.principal')
@section('content')
<div class="container-fluid">
    {!!Form::model($user,['route'=>['usuario.update',$user->id], 'method'=>'PUT'])!!}
        @include('user.forms.user')
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-refresh"></i> Actualizar
        </button>
    {!!Form::close()!!}
</div>
@endsection