@extends('layouts.principal')
    @section('content')
        @include('alerts.request')
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Crear Proveedor</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        {!!Form::open(['route'=>'provider.store', 'method'=>'POST'])!!}
            @include('provider.forms.provider')
            {!!Form::submit('Registrar', ['class'=>"btn btn-primary"])!!}
        {!!Form::close()!!}
    @endsection