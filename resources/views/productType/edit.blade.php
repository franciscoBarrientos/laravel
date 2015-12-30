@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        {!!Form::model($productType,['route'=>['productType.update',$productType->id], 'method'=>'PUT'])!!}
            @include('productType.forms.productType')
            {!!Form::submit('Actualizar', ['class'=>"btn btn-primary"])!!}
        {!!Form::close()!!}
    @endsection