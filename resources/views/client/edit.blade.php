<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    <title>Veterinaria</title>
</head>
<body>
    {!!Form::model($client,['route'=>['cliente.update',$client->id], 'method'=>'PUT'])!!}
        @include('client.forms.cliente')
        {!!Form::submit('Guardar', ['class'=>"btn btn-primary"])!!}
    {!!Form::close()!!}
</html>
