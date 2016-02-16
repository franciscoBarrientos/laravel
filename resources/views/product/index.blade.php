@extends('layouts.principal')
    @section('content')
        @include('alerts.message')
            <div class="row">
                <div class="col-sm-9">
                    <h2 class="page-header">Productos</h2>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-sm-3 page-header">
                    <!-- Buscador -->
                    {!! Form::open (['route' => 'product.index', 'method' => 'GET', 'class' => 'navbar-form-pull-right'])!!}
                    <div class="input-group">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Buscar producto', 'aria-describedby'=>'search']) !!}
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
                        <th>Nombre</th>
                        <th>Tipo de producto</th>
                        <th>Proveedor</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th colspan="3">Acciones</th>
                    </thead>
                    @foreach($products as $product)
                    <tbody>
                        <td>{{$product->name}}</td>
                        <td>{{\Veterinaria\ProductType::find($product->product_type_id)->description}}</td>
                        <td>{{\Veterinaria\Provider::find($product->provider_id)->fancy_name}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <button type="button" class="btn btn-success" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-modal-maintainer="Producto" data-modal-type="add" data-toggle="modal" data-target="#confirmModal">
                                <i class="fa fa-plus"></i> Agregar Stock
                            </button>
                        </td>
                        <td>
                            {!!link_to_route('product.edit', $title = ' Editar', $parameters = $product->id, $attributes = ['class'=>'btn btn-primary icon-edit'])!!}
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-modal-maintainer="Producto" data-modal-type="delete" data-toggle="modal" data-target="#confirmModal">
                                <i class="fa fa-user-times"></i> Eliminar
                            </button>
                        </td>
                        @include('product.forms.confirm')
                    </tbody>
                    @endforeach
                </table>
                {!!$products->render()!!}
                @section('scripts')
                    <!-- AJAX -->
                    {!!Html::script('js/utils.js')!!}
                    {!!Html::script('js/modal.js')!!}
                    <script>
                        token('{{csrf_token()}}');
                        url("{{route('product.index')}}");
                    </script>
                @endsection
            </div>
        @endsection