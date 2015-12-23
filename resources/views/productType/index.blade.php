@extends('layouts.principal')
@section('content')
    @include('alerts.message')
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
                    {!!link_to_route('productType.edit', $title = ' Editar', $parameters = $productType->id, $attributes = ['class'=>'btn btn-primary icono-edit'])!!}
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