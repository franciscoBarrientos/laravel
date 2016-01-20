<!-- Modal -->
<div class="modal fade" id="info{{$atention->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Detalles de Atención {{$atention->created_at->format('Y/m/d')}}</h4>
            </div>
            <div class="modal-body text-justify">
                <div class="table-responsive">
                    <table class="table container-width">
                        <tr>
                            <td class="width-middle">
                                <label>Nombre:</label> {{$pet->name}}
                            </td>
                            <td class="width-middle">
                                <label>Fecha:</label> {{date('Y/m/d')}}
                            </td>
                        </tr>
                        <tr>
                            <td class="width-middle">
                                <label>Especie:</label> {{$specie->species}}
                            </td>
                            <td class="width-middle">
                                <label>Raza:</label> {{$breed->name}}
                            </td>
                        </tr>
                        <tr>
                            <td class="width-middle">
                                <label>Edad:</label> {{$date}}
                            </td>
                            <td class="width-middle">
                                <label>Tipo de atención:</label> {{\Veterinaria\AtentionType::find($atention->atentions_type_id)->description}}
                            </td>
                        </tr>
                        <tr>
                            <td class="container-width" colspan="2">
                                <label>Procedimiento:</label>
                                {!! Form::textarea('procedure', $atention->procedure,['class'=>'col-xs-12','style'=>'height:200px;','readonly'=>'true']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td class="container-width" colspan="2">
                                <label>Tratamiento:</label>
                                {!! Form::textarea('treatment', $atention->treatment,['class'=>'col-xs-12','style'=>'height:200px;','readonly'=>'true']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td class="container-width" colspan="2">
                                <label>Diagnóstico:</label>
                                {!! Form::textarea('diagnosis', $atention->diagnosis,['class'=>'col-xs-12','style'=>'height:200px;','readonly'=>'true']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td class="container-width" colspan="2">
                                <label>Prescripción:</label>
                                {!! Form::textarea('diagnosis', $atention->prescription,['class'=>'col-xs-12','style'=>'height:200px;','readonly'=>'true']) !!}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>