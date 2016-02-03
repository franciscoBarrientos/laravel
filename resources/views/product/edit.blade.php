@extends('layouts.principal')
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Editar Producto {{$product->name}}</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        @include('alerts.request')
        {!!Form::model($product,['route'=>['product.update',$product->id], 'method'=>'PUT'])!!}
            @include('product.forms.product')
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-refresh"></i> Actualizar
            </button>
        {!!Form::close()!!}
    @endsection