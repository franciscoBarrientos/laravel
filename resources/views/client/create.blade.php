<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/registration.css">
        <title>Veterinaria</title>
    </head>
    <body>
        {!!Form::open(['route'=>'cliente.store', 'method'=>'POST'])!!}
            @include('client.forms.cliente')
            {!!Form::submit('Registrar', ['class'=>"btn btn-primary"])!!}
        {!!Form::close()!!}
<!--    Lo de arriba equivale a esto
        <form action="">
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Apellido Paterno</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Apellido Materno</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Rut</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Dirección</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Teléfono celular</label>
                <input type="text" class="form-control" maxlength="8">
            </div>
            <div class="form-group">
                <label for="">Teléfono fijo</label>
                <input type="text" class="form-control">
            </div>
            <button class="btn btn-primary">Registrar</button>
        </form>
    </body>
-->
</html>
