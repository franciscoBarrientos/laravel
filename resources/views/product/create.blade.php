@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        {!!Form::open(['route'=>'product.store', 'method'=>'POST'])!!}
            @include('product.forms.product')
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Registrar
            </button>
        {!!Form::close()!!}
    @endsection