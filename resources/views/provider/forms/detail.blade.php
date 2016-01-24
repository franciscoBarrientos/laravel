<!-- Modal -->
<div class="modal fade" id="info{{$provider->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Información Proveedor {{$provider->fancy_name}}</h4>
            </div>
            <div class="modal-body text-justify">
                <div>{!!Form::label('Nombre de fantasía:')!!}&nbsp;{{$provider->fancy_name}}</div>
                <div>{!!Form::label('Razón social:')!!}&nbsp;{{$provider->business_name}}</div>
                <div>{!!Form::label('Giro:')!!}&nbsp;{{$provider->activity}}</div>
                <div>{!!Form::label('RUT:')!!}&nbsp;{{$provider->rut}} - {{$provider->verifying_digit}}</div>
                <div>{!!Form::label('Nombre Contacto:')!!}&nbsp;{{$provider->name}}</div>
                <div>{!!Form::label('Email Contacto:')!!}&nbsp;{{$provider->email}}</div>
                <div>{!!Form::label('Teléfono Contacto:')!!}&nbsp;{{$provider->phone}}</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>