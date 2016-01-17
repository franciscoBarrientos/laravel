@extends('layouts.principal')
@section('content')
@include('alerts.message')
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
                <button type="button" class="btn btn-success" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-modal-maintainer="Producto" data-modal-type="add" data-toggle="modal" data-target="#addModal">
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
        {!!Html::script('js/modal.js')!!}
        <script>url('{{route('product.destroy',1)}}');</script>
    @endsection
</div>
@endsection