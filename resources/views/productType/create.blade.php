@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        {!!Form::open(['route'=>'productType.store', 'method'=>'POST'])!!}
            @include('productType.forms.productType')
            {!!Form::submit('Registrar', ['class'=>"btn btn-primary"])!!}
        {!!Form::close()!!}
    @endsection