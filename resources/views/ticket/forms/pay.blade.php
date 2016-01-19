<!-- Modal -->
<div class="modal fade" id="pagar{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pagar boleta {{$ticket->number}}</h4>
            </div>
            <div class="modal-body text-justify">
                ¿Dar por pagada la boleta {{$ticket->number}}?
            </div>
            <div class="modal-footer">
                {!!Form::open(['route'=>['ticket.paid',$ticket->id], 'method'=>'POST'])!!}
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban"></i> Cancelar</button>
                <button type="submit" class="btn btn-success" ><i class="fa fa-dollar"></i> Pagar</button>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>