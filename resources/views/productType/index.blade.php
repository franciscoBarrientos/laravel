@extends('layouts.principal')
@section('content')
    @include('alerts.message')
    <div class="row">
        <div class="col-sm-9">
            <h2 class="page-header">Tipos de Producto</h2>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-sm-3 page-header">
            <!-- Buscador -->
            {!! Form::open (['route' => 'productType.index', 'method' => 'GET', 'class' => 'navbar-form-pull-right'])!!}
            <div class="input-group">
                {!! Form::text('description', null, ['class' => 'form-control', 'placeholder'=>'Buscar tipo de producto', 'aria-describedby'=>'search']) !!}
                        <span class="input-group-addon" id="search">
                            <span class="glyphicon glyphicon-search" aria-hidden="true">
                            </span>
                        </span>
            </div>
            {!! Form::close() !!}
            <!-- Fin buscador -->
        </div>
    </div>
    <div>
        <table class="table">
            <thead>
                <th>Tipo de Producto</th>
                <th colspan="2">Acciones</th>
            </thead>
            @foreach($productTypes as $productType)
            <tbody>
                <td>{{$productType->description}}</td>
                <td>
                    {!!link_to_route('productType.edit', $title = ' Editar', $parameters = $productType->id, $attributes = ['class'=>'btn btn-primary icon-edit'])!!}
                </td>
                <td>
                    {!!Form::open(['route'=>['productType.destroy',$productType->id], 'method'=>'DELETE'])!!}
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$productType->id}}">
                            <i class="fa fa-user-times"></i> Eliminar
                        </button>
                        @include('productType.forms.confirm')
                    {!!Form::close()!!}
                </td>
            </tbody>
            @endforeach
        </table>
        {!!$productTypes->render()!!}
    </div>
@endsection