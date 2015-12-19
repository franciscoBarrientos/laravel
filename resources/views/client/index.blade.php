@extends('layouts.principal')
@section('content')
    @include('alerts.message')
    <div id="tableClient">
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Rut</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Celular</th>
                <th>Teléfono</th>
                <th colspan="2">Acciones</th>
            </thead>
            @foreach($clients as $client)
            <tbody>
                <td>{{$client->name}}</td>
                <td>{{$client->lastname}}</td>
                <td>{{$client->rut}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->address}}</td>
                <td>{{$client->cellphone}}</td>
                <td>{{$client->phone}}</td>
                <td>
                    {!!link_to_route('client.edit', $title = ' Editar', $parameters = $client->id, $attributes = ['class'=>'btn btn-primary icono-edit'])!!}
                </td>
                <td>
                    {!!Form::open(['route'=>['client.destroy',$client->id], 'method'=>'DELETE'])!!}
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-user-times"></i> Eliminar
                    </button>
                    {!!Form::close()!!}
                </td>
            </tbody>
            @endforeach
        </table>
        {!!$clients->render()!!}
    </div>
@endsection