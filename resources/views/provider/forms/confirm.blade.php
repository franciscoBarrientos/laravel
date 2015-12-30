<!-- Modal -->
<div class="modal fade" id="myModal{{$provider->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Eliminar proveedor {{$provider->fancy_name}}</h4>
            </div>
            <div class="modal-body text-justify">
                Si eliminas al proveedor {{$provider->fancy_name}}, se eliminaran todos los productos asociados a éste. ¿Estas seguro de querer eliminarlo?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger" >Eliminar</button>
            </div>
        </div>
    </div>
</div>