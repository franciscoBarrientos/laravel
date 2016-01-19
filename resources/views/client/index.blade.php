@extends('layouts.principal')
@section('content')
    @include('alerts.message')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Clientes</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div id="tableClient">
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Apellido</th>
                <th colspan="4">Acciones</th>
            </thead>
            @foreach($clients as $client)
            <tbody>
                <td>{{$client->name}}</td>
                <td>{{$client->lastname}}</td>
                <td>
                    <button class="btn btn-info" data-toggle="modal" data-target="#detail{{$client->id}}">
                        <i class="fa fa-info-circle"></i> Información
                    </button>
                    @include('client.forms.detail')
                </td>
                <td>
                    {!!link_to_route('pet.indexPetsByClient', $title = ' Mascotas', $parameters = $client->id, $attributes = ['class'=>'btn btn-success icon-pet'])!!}
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