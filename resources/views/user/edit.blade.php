@extends('layouts.principal')
@section('content')
    {!!Form::model($user,['route'=>['usuario.update',$user->id], 'method'=>'PUT'])!!}
        @include('user.forms.user')
        {!!Form::submit('Actualizar', ['class'=>"btn btn-primary"])!!}
    {!!Form::close()!!}
@endsection