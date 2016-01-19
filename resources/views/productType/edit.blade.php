@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Editar Tipo de Producto {{$productType->description}}</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        {!!Form::model($productType,['route'=>['productType.update',$productType->id], 'method'=>'PUT'])!!}
            @include('productType.forms.productType')
            {!!Form::submit('Actualizar', ['class'=>"btn btn-primary"])!!}
        {!!Form::close()!!}
    @endsection