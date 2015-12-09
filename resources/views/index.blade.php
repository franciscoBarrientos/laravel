<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    <title>El mejor lugar para tu mascota</title>
</head>
<body>
<div class="col-md-3 center-block quitar-float text-center margin-superior">
    <img src="img/principal_image_veterinaria.png">
    <h1 class="pacifico fonts-high green-color">Vida Animal</h1>
    <h2>Cariño y profesionalismo</h2>
    <nav>
        {!!link_to_route('cliente.index', $title = 'Acceso');!!}
        <!--
        <a href="contact.html" class="margin-right">Contacto</a>
        <a href="">Nosotros</a>
        -->
    </nav>
</div>
</body>
</html>
