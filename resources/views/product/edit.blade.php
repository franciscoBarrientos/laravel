@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        {!!Form::model($product,['route'=>['product.update',$product->id], 'method'=>'PUT'])!!}
            @include('product.forms.product')
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-refresh"></i> Actualizar
            </button>
        {!!Form::close()!!}
    @endsection