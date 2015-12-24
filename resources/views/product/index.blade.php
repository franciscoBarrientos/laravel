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
            <th colspan="2">Acciones</th>
        </thead>
        @foreach($products as $product)
        <tbody>
            <td>{{$product->name}}</td>
            <td>{{\Veterinaria\ProductType::find($product->product_type_id)->description}}</td>
            <td>{{\Veterinaria\Provider::find($product->provider_id)->fancy_name}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->price}}</td>
            <td>
                {!!link_to_route('product.edit', $title = ' Editar', $parameters = $product->id, $attributes = ['class'=>'btn btn-primary icono-edit'])!!}
            </td>
            <td>
                {!!Form::open(['route'=>['product.destroy',$product->id], 'method'=>'DELETE'])!!}
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$product->id}}">
                        <i class="fa fa-user-times"></i> Eliminar
                    </button>
                    @include('product.forms.confirm')
                {!!Form::close()!!}
            </td>
        </tbody>
        @endforeach
    </table>
    {!!$products->render()!!}
</div>
@endsection