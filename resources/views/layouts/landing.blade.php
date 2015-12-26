<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Vida Animal</title>

        <!-- Bootstrap Core CSS -->
        {!!Html::style('css/bootstrap.min.css')!!}

        <!-- Custom CSS -->
        {!!Html::style('css/landing-page.css')!!}

        <!-- Custom Fonts -->
        {!!Html::style('font-awesome/css/font-awesome.min.css')!!}

        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery -->
        {!!Html::script('js/jquery.js')!!}

        <!-- Bootstrap Core JavaScript -->
        {!!Html::script('js/bootstrap.min.js')!!}
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
            <div class="container topnav">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Navegador</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="nav navbar-nav logo">{!!Html::image('img/logo2.png')!!}</div>
                    <a class="navbar-brand topnav" href="/">Inicio</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/#signin">Iniciar Sesión</a>
                        </li>
                        <li>
                            <a href="/#recovery">Recuperar Contraseña</a>
                        </li>
                        <li>
                            <a href="/#contact">Contacto</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        @yield('content')
    </body>
</html>
