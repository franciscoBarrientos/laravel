@extends('layouts.principal')
@section('content')
        {!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
            @include('user.forms.user')
            {!!Form::submit('Guardar', ['class'=>"btn btn-primary"])!!}
        {!!Form::close()!!}
@endsection