<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VidaAnimalApp</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
            <a class="navbar-brand topnav" href="/">Inicio</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/">Iniciar Sesión</a>
                </li>
 <!--           <li>
                    <a href="#signup">Registro</a>
                </li>
-->
                <li>
                    <a href="#contact">Contacto</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Header -->
<a name="signin"></a>
<div class="intro-header grayscale">
    <div class="container">
        @include('alerts.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="intro-message">
                    <h1>Vida Animal App</h1>
                    <h3>Sistema de gestión de pacientes y control de abastecimiento.</h3>
                    <hr class="intro-divider">
                    {!!Form::open(['route'=>'login.store', 'method'=>'POST'])!!}
                        <div class="form-group col-md-6 col-md-offset-3">
                            {!!Form::text('email', null,['class'=>'form-control', 'placeholder'=>'Email', 'required'=>'true'])!!}
                            <br/>
                            {!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Password', 'required'=>'true'])!!}
                            <br/>

    <!--                    <input type="email" id="email" class="form-control inputForm" placeholder="Email" required="" autofocus="" autocomplete="off"/>
                        <br/>
                        <input type="password" id="signInPassword" class="form-control inputForm" placeholder="Password" required="" autofocus="" autocomplete="off"/>
                        <br/>-->
                            <ul class="list-inline intro-form-buttons">
                                <li>
                                    <button class="btn btn-default btn-lg"><i class="fa fa-sign-in fa-fw"></i><span class="network-name">Iniciar Sesión</span></button>
                                </li>
                                <li>
                                    <button class="btn btn-default btn-lg"><i class="fa fa-user-plus fa-fw"></i><span class="network-name">Registrar</span></button>
                                </li>
                            </ul>
                        </div>
                        <hr class="intro-divider">
                    {!!Form::close()!!}

                    <ul class="list-inline intro-social-buttons">
                        <li>
                            <a href="http://www.vidaanimal.cl" class="btn btn-default btn-lg"><i class="fa fa-html5 fa-fw"></i> <span class="network-name">vidaanima.cl</span></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/Vida-Animal-veterinaria-208022955878287" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</div>
<!-- /.intro-header -->

<!-- Page Content -->
<!--
<a name="signup"></a>
<div class="content-section-a">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Registro</h2>
            </div>
        </div>
    </div>
-->
    <!-- /.container -->
<!--
    <div class="container">
        <div class="row">
            <input type="text" id="name" class="form-control" placeholder="Nombre" required="" autofocus="" autocomplete="off"/>
            <br/>
            <input type="text" id="lastname" class="form-control" placeholder="Apellido" required="" autofocus="" autocomplete="off"/>
            <br/>
            <input type="email" id="singUpEmail" class="form-control" placeholder="Email" required="" autofocus="" autocomplete="off"/>
            <br/>
            <input type="password" id="singUpPassword" class="form-control" placeholder="Contraseña" required="" autofocus="" autocomplete="off"/>
            <br/>
            <input type="password" id="reSingUpPassword" class="form-control" placeholder="Reingresa Contraseña" required="" autofocus="" autocomplete="off"/>
            <br/>
            <ul class="list-inline intro-form-buttons">
                <li>
                    <button class="btn btn-default btn-lg"><i class="fa fa-user-plus fa-fw"></i><span class="network-name">Registrar</span></button>
                </li>
            </ul>
        </div>
    </div>
-->
</div>

<a name="contact"></a>
<!-- /.content-section-a -->
<div class="content-section-a">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Veterinaria Vida Animal</h2>
                <p class="lead">Somos médicos veterinarios dedicados a la medicina preventiva de animales de compañía.</p>
                <p class="lead">Nuestros objetivos apuntan hacia el bienestar animal y la tenencia responsable de mascotas.</p>
                <p class="lead">A través de nuestra visión pretendemos trabajar en forma conjunta con los propietarios de nuestros pacientes.</p>
            </div>
            <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                <img class="img-responsive" src="img/phones.png" alt="">
            </div>
        </div>

    </div>
    <!-- /.container -->
</div>

<!-- /.content-section-a -->

<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>Conectar con Vida Animal:</h2>
            </div>
            <div class="col-lg-6">
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="http://www.vidaanimal.cl" class="btn btn-default btn-lg"><i class="fa fa-html5 fa-fw"></i> <span class="network-name">vidaanima.cl</span></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/Vida-Animal-veterinaria-208022955878287" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                    </li>
                    <li>
                        <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.banner -->

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-inline">
                    <li>
                        <a href="#">Inicio</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#signin">Iniciar Sesión</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
<!--                <li>
                        <a href="#signup">Registrar</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
-->
                    <li>
                        <a href="#contact">Contacto</a>
                    </li>
                </ul>
                <p class="copyright text-muted small">Copyright &copy; Universidad Central 2015. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
