<!-- Modal -->
<div class="modal fade" id="myModal{{$productType->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Eliminar tipo de producto {{$productType->description}}</h4>
            </div>
            <div class="modal-body text-justify">
                Si eliminas el tipo de producto {{$productType->description}}, se eliminaran todos los productos asociados a éste. ¿Estas seguro de querer eliminarlo?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger" >Eliminar</button>
            </div>
        </div>
    </div>
</div>