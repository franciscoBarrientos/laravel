$(document).ready(function(){
    $('#confirmModal').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var name = $(e.relatedTarget).data('name');
        var type = $(e.relatedTarget).data('modal-type');
        var maintainer = $(e.relatedTarget).data('modal-maintainer');
        var body;
        var footer;
        if(type == 'delete'){
            body = '¿Estas seguro de eliminar el '+maintainer+' '+name+'?';

            footer = '<button type="button" class="btn btn-default" data-dismiss="modal">' +
                        '<i class="fa fa-ban"></i> Cancelar' +
                     '</button>' +
                     '<button type="button" class="btn btn-danger" id="delete" onclick="confirmDelete('+id+')" >' +
                        '<i class="fa fa-minus-circle"></i> Eliminar' +
                     '</button>';

            $("#confirmModal #modal-title").text("Eliminar "+maintainer);
            $("#confirmModal #modal-body").text(body);
            $("#confirmModal #modal-footer").html(footer);
        }else if(type == 'add'){
            body = '<div class="form-group">' +
                       '<label>Cantidad</label>' +
                       '<input type="number" name="quantity" id="quantity" class="form-control"/>' +
                       '<label>Número de Factura</label>' +
                       '<input type="number" name="invoice_number" id="invoice_number" class="form-control" />' +
                   '</div>';

            footer = '<button type="button" class="btn btn-default" data-dismiss="modal">' +
                        '<i class="fa fa-ban"></i> Cancelar' +
                     '</button>' +
                     '<button type="button" class="btn btn-danger" id="delete" onclick="confirmAdd('+id+')" >' +
                        '<i class="fa fa-plus-circle"></i> Agregar' +
                     '</button>'

            $("#confirmModal #modal-title").text("Agregar Stock a "+maintainer+": "+name);
            $("#confirmModal #modal-body").html(body);
            $("#confirmModal #modal-footer").html(footer);
        }
    });
});

function confirmDelete(id){
    var form = document.createElement("form");
    addHidden(form, "_token", $token);
    addHidden(form, "_method", 'DELETE');
    form.method = "POST";
    form.action = $url+'/'+id;
    document.body.appendChild(form);

    form.submit();
}

function confirmAdd(id){
    var quantity = $("#confirmModal #quantity").val();
    var invoice_number = $("#confirmModal #invoice_number").val();

    var form = document.createElement("form");
    form.method = "POST";
    form.action = $url+'/'+id+'/add';
    addHidden(form, "_token", $token);
    addHidden(form, "quantity", quantity);
    addHidden(form, "invoice_number", invoice_number);
    addHidden(form, "id", id);
    document.body.appendChild(form);
    form.submit();
}