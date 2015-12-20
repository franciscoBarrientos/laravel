@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        {!!Form::open(['route'=>'product.store', 'method'=>'POST'])!!}
            @include('product.forms.product')
            {!!Form::submit('Registrar', ['class'=>"btn btn-primary"])!!}
        {!!Form::close()!!}
    @endsection