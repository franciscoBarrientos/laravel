<a name="recovery"></a>
<!-- /.content-section-a -->
<div class="content-section-a">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Recuperar Contraseña</h2>
                {!! Form::open(['url' => '/password/email']) !!}
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>{!!Form::text('email', null,['class'=>'form-control', 'placeholder'=>'Ingrese su email'])!!}</td>
                                <td>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-envelope-o"></i> Enviar
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                {!!Html::image('img/ipad.png','alt',array( 'class' => 'img-responsive'))!!}
            </div>
        </div>
    </div>
    <!-- /.container -->
</div>

<!-- /.content-section-a -->