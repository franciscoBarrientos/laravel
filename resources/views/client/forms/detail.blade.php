<!-- Modal -->
<div class="modal fade" id="detail{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Datos Cliente {{$client->name}} {{$client->lastname}}</h4>
            </div>
            <div class="modal-body text-justify">
                <div>{!!Form::label('Nombre:')!!}&nbsp;{{$client->name}}</div>
                <div>{!!Form::label('Apellido:')!!}&nbsp;{{$client->lastname}}</div>
                <div>{!!Form::label('Rut:')!!}&nbsp;{{$client->rut}}</div>
                <div>{!!Form::label('Email:')!!}&nbsp;{{$client->email}}</div>
                <div>{!!Form::label('Dirección:')!!}&nbsp;{{$client->address}}</div>
                <div>{!!Form::label('Celular:')!!}&nbsp;{{$client->cellphone}}</div>
                <div>{!!Form::label('Teléfono:')!!}&nbsp;{{$client->phone}}</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>