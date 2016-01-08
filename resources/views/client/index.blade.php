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
                <th colspan="3">Acciones</th>
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
                    {!!link_to_route('pet.indexPetsByClient', $title = ' Mascotas', $parameters = $client->id, $attributes = ['class'=>'btn btn-primary icon-pet'])!!}
                </td>
                <td>
                    {!!link_to_route('client.edit', $title = ' Editar', $parameters = $client->id, $attributes = ['class'=>'btn btn-primary icon-edit'])!!}
                </td>
                <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$client->id}}">
                        <i class="fa fa-user-times"></i> Eliminar
                    </button>
                    @include('client.forms.confirm')
                </td>
            </tbody>
            @endforeach
        </table>
        {!!$clients->render()!!}
    </div>
@endsection