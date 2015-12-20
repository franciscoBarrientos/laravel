@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        {!!Form::model($product,['route'=>['product.update',$product->id], 'method'=>'PUT'])!!}
            @include('product.forms.product')
            {!!Form::submit('Actualizar', ['class'=>"btn btn-primary"])!!}
        {!!Form::close()!!}
    @endsection