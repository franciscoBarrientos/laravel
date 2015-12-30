@extends('layouts.landing')
    @section('content')
        <!-- Header -->
        <div class="intro-header grayscale">
            <div class="login-error">
                @include('alerts.errors')
                @include('alerts.request')
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="intro-message">
                            <h3 class="network-name restart-password-title">Recuperar Contraseña</h3>
                            <hr class="intro-divider">
                            {!! Form::open(['url' => '/password/reset', 'method'=>'POST']) !!}
                                <div class="form-group col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        {!!Form::hidden('token',$reset->token, null)!!}
                                        {!!Form::text('email', $reset->email, ['value' => '{{old(email)}}', 'readonly' => 'true', 'class' => 'form-control'])!!}
                                    </div>
                                    <div class="form-group">
                                        {!!Form::password('password', ['class' => 'form-control'])!!}
                                    </div>
                                    <div class="form-group">
                                        {!!Form::password('password_confirmation', ['class' => 'form-control'])!!}
                                    </div>
                                    <ul class="list-inline intro-form-buttons">
                                        <li>
                                            <button type="submit" class="btn btn-default">
                                                <i class="fa fa-floppy-o"></i><span class="network-name"> Restablecer Contraseña</span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </div>
    @endsection