@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Crear Producto</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        {!!Form::open(['route'=>'product.store', 'method'=>'POST'])!!}
            @include('product.forms.product')
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Registrar
            </button>
        {!!Form::close()!!}
    @endsection