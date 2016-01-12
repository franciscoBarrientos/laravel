@extends('layouts.landing')
    @section('content')
        <!-- Header -->
        <a name="signin"></a>
        <div class="intro-header grayscale">
            <div class="login-error">
                @include('alerts.errors')
                @include('alerts.request')
                @include('alerts.message')
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
                                    {!!Form::text('email', null,['class'=>'form-control', 'placeholder'=>'Email'])!!}
                                    <br/>
                                    {!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Password'])!!}
                                    <br/>
                                    <ul class="list-inline intro-form-buttons">
                                        <li>
                                            <button class="btn btn-default btn-lg" onclick="submit()">
                                                <i class="fa fa-sign-in"></i><span class="network-name"> Iniciar Sesión</span>
                                            </button>
                                        </li>
                                        <li>
                                            <a href="#recovery" class="btn btn-default btn-lg">
                                                <i class="fa fa-lock"></i><span class="network-name"> ¿Olvidaste tu Contraseña?</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                {!!Form::close()!!}
                                <hr class="intro-divider">


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

        @include('auth.password')

        <a name="contact"></a>

        <div class="content-section-b">

            <div class="container">

                <div class="row">
                    <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                        <hr class="section-heading-spacer">
                        <div class="clearfix"></div>
                        <h2 class="section-heading">Veterinaria Vida Animal</h2>
                        <p class="lead">Somos médicos veterinarios dedicados a la medicina preventiva de animales de compañía.</p>
                        <p class="lead">Nuestros objetivos apuntan hacia el bienestar animal y la tenencia responsable de mascotas.</p>
                        <p class="lead">A través de nuestra visión pretendemos trabajar en forma conjunta con los propietarios de nuestros pacientes.</p>
                    </div>
                    <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                        {!!Html::image('img/phones.png','alt',array( 'class' => 'img-responsive'))!!}
                    </div>
                </div>

            </div>
            <!-- /.container -->

        </div>
        <!-- /.content-section-b -->

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
                                <a href="#signin">Inicio</a>
                            </li>
                            <li class="footer-menu-divider">&sdot;</li>
                            <li>
                                <a href="#signin">Iniciar Sesión</a>
                            </li>
                            <li class="footer-menu-divider">&sdot;</li>
                            <li>
                                <a href="#recovery">Recuperar Contraseña</a>
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
    @endsection