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
                    <div class="nav navbar-nav logo"><img src="img/logo2.png" /></div>
                    <a class="navbar-brand topnav" href="/">Inicio</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/">Iniciar Sesión</a>
                        </li>
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
            <div class="login-error">
                @include('alerts.errors')
                @include('alerts.request')
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="intro-message">
                            <h1>Vida Animal</h1>
                            <h3>Sistema de gestión de pacientes y control de abastecimiento.</h3>
                            <hr class="intro-divider">
                            {!!Form::open(['route'=>'login.store', 'method'=>'POST'])!!}
                                <div class="form-group col-md-6 col-md-offset-3">
                                    {!!Form::text('email', null,['class'=>'form-control', 'placeholder'=>'Email', 'required'=>'true'])!!}
                                    <br/>
                                    {!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Password', 'required'=>'true'])!!}
                                    <br/>
                                    <ul class="list-inline intro-form-buttons">
                                        <li>
                                            <button class="btn btn-default btn-lg" onclick="submit()">
                                                <i class="fa fa-sign-in"></i><span class="network-name">Iniciar Sesión</span>
                                            </button>
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
        {!!Html::script('js/jquery.js')!!}

        <!-- Bootstrap Core JavaScript -->
        {!!Html::script('js/bootstrap.min.js')!!}

    </body>

</html>
