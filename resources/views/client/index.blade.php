@extends('layouts.principal')
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert"">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="hide">Close</span>
            </button>
            {{Session::get('message')}}
        </div>
    @endif
    {!!Form::open(['route'=>'cliente.index', 'method'=>'POST'])!!}
        <div id="tableClient">
            <table class="table">
                <thead>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Rut</th>
                    <th>Dirección</th>
                    <th>Celular</th>
                </thead>
                @foreach($clients as $client)
                <tbody>
                    <td>{{$client->client_name}}</td>
                    <td>{{$client->client_last_name_p}}</td>
                    <td>{{$client->client_last_name_m}}</td>
                    <td>{{$client->client_rut}}</td>
                    <td>{{$client->client_direction}}</td>
                    <td>{{$client->client_cellphone}}</td>
                    <td>
                        {!!link_to_route('cliente.edit', $title = 'Editar', $parameters = $client->id, $attributes = ['class'=>'btn btn-primary'])!!}
                    </td>
                </tbody>
                @endforeach
            </table>
            {!!$clients->render()!!}
        </div>
    {!!Form::close()!!}
@endsection