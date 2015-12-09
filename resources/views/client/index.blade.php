<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    <title>Veterinaria</title>
</head>
<body>
<!--
<?php $message=Session::get('message')?>
@if($message = 'store')
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Usuario creado exitosamente
</div>
@endif
@if($message = 'update')
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Usuario modificado exitosamente
</div>
@endif
-->
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
                    <td>{{$client->client_last_name_a}}</td>
                    <td>{{$client->client_rut}}</td>
                    <td>{{$client->client_direction}}</td>
                    <td>{{$client->client_cellphone}}</td>
                    <td>
                        {!!link_to_route('cliente.edit', $title = 'editar', $parameters = $client->id, $attributes = ['class'=>'btn btn-primary'])!!}
                    </td>
                </tbody>
                @endforeach
            </table>
    </div>
{!!Form::close()!!}
</html>