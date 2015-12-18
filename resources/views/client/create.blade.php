@extends('layouts.principal')
@section('content')
        @include('alerts.request')
        {!!Form::open(['route'=>'client.store', 'method'=>'POST'])!!}
            @include('client.forms.client')
            {!!Form::submit('Registrar', ['class'=>"btn btn-primary"])!!}
        {!!Form::close()!!}
@endsection