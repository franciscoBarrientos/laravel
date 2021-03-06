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
    {!!Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css')!!}

    <!-- MetisMenu CSS -->
    {!!Html::style('bower_components/metisMenu/dist/metisMenu.min.css')!!}

    <!-- Custom CSS -->
    {!!Html::style('dist/css/sb-admin-2.css')!!}

    <!-- Custom Fonts -->
    {!!Html::style('bower_components/font-awesome/css/font-awesome.min.css')!!}

    <!-- Custom CSS -->
    {!!Html::style('css/container.css')!!}
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Navegador</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/home">Inicio</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right float-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                {{ucfirst(strtolower(Auth::user()->name))}} <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="/user/{!!Auth::user()->id!!}/edit"><i class="fa fa-user"></i> Perfil de Usuario</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="/logout"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="/home"><i class="fa fa-bell"></i> Alertas</a>
                </li>

                <li>
                    <a href="/client"><i class="fa fa-user-plus"></i> Cliente</a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{!! URL::to('/client/create') !!}"><i class="fa fa-plus"></i> Crear</a>
                        </li>
                        <li>
                            <a href="{!! URL::to('/client') !!}"><i class="fa fa-th-list"></i> Listar</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="/ticket"><i class="fa fa-shopping-bag"></i> Venta</a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{!! URL::to('/ticket/create') !!}"><i class="fa fa-plus"></i> Crear</a>
                        </li>
                        <li>
                            <a href="{!! URL::to('/ticket') !!}"><i class="fa fa-th-list"></i> Listar</a>
                        </li>
                        <li>
                            <a href="{!! URL::to('/ticket/canceled/list') !!}"><i class="fa fa-trash"></i> Listar Anuladas</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="/product"><i class="fa fa-cart-plus "></i> Productos</a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{!! URL::to('/product/create') !!}"><i class="fa fa-plus"></i> Crear</a>
                        </li>
                        <li>
                            <a href="{!! URL::to('/product') !!}"><i class="fa fa-th-list"></i> Listar</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="/provider"><i class="fa fa-truck"></i> Proveedor</a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{!! URL::to('/provider/create') !!}"><i class="fa fa-plus"></i> Crear</a>
                        </li>
                        <li>
                            <a href="{!! URL::to('/provider') !!}"><i class="fa fa-th-list"></i> Listar</a>
                        </li>
                    </ul>
                </li>

                @if(\Veterinaria\Administrator::administrator(Auth::user()->id))
                <li>
                    <a href=""><i class="fa fa-gear"></i> Administrar</a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/user"><i class="fa fa-users"></i> Usuarios</a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{!! URL::to('/user/create') !!}"><i class="fa fa-plus"></i> Crear</a>
                                </li>
                                <li>
                                    <a href="{!! URL::to('/user') !!}"><i class="fa fa-th-list"></i>Listar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/administrator"><i class="fa fa-wrench"></i> Administradores</a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{!! URL::to('/administrator/create') !!}"><i class="fa fa-plus"></i> Crear</a>
                                </li>
                                <li>
                                    <a href="{!! URL::to('/administrator') !!}"><i class="fa fa-th-list"></i> Listar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/species"><i class="fa fa-paw"></i> Especie</a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{!! URL::to('/species/create') !!}"><i class="fa fa-plus"></i> Crear</a>
                                </li>
                                <li>
                                    <a href="{!! URL::to('/species') !!}"><i class="fa fa-th-list"></i> Listar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/breed"><i class="fa fa-asterisk"></i> Razas</a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{!! URL::to('/breed/create') !!}"><i class="fa fa-plus"></i> Crear</a>
                                </li>
                                <li>
                                    <a href="{!! URL::to('/breed') !!}"><i class="fa fa-th-list"></i> Listar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/productType"><i class="fa fa-cart-arrow-down"></i> Tipos de Producto</a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{!! URL::to('/productType/create') !!}"><i class="fa fa-plus"></i> Crear</a>
                                </li>
                                <li>
                                    <a href="{!! URL::to('/productType') !!}"><i class="fa fa-th-list"></i> Listar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/atentionType"><i class="fa fa-book"></i> Tipos de Atención</a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{!! URL::to('/atentionType/create') !!}"><i class="fa fa-plus"></i> Crear</a>
                                </li>
                                <li>
                                    <a href="{!! URL::to('/atentionType') !!}"><i class="fa fa-th-list"></i> Listar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/alertType"><i class="fa fa-exclamation-circle"></i> Tipos de Alertas</a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{!! URL::to('/alertType/create') !!}"><i class="fa fa-plus"></i> Crear</a>
                                </li>
                                <li>
                                    <a href="{!! URL::to('/alertType') !!}"><i class="fa fa-th-list"></i> Listar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
<div id="wrapper">
    <div id="page-wrapper">
        @yield('content')
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- jQuery -->
{!!Html::script('bower_components/jquery/dist/jquery.min.js')!!}

<!-- Bootstrap Core JavaScript -->
{!!Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js')!!}

<!-- Metis Menu Plugin JavaScript -->
{!!Html::script('bower_components/metisMenu/dist/metisMenu.min.js')!!}

<!-- Custom Theme JavaScript -->
{!!Html::script('dist/js/sb-admin-2.js')!!}

@section('scripts')
@show
</body>
</html>