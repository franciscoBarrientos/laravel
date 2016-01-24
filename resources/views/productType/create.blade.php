@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Crear Tipo de Producto</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        {!!Form::open(['route'=>'productType.store', 'method'=>'POST'])!!}
            @include('productType.forms.productType')
            {!!Form::submit('Registrar', ['class'=>"btn btn-primary"])!!}
        {!!Form::close()!!}
    @endsection