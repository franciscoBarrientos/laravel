var $url;

function url(url){
    $url = url;
}

$(document).ready(function(){
    $('#confirmModal').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var name = $(e.relatedTarget).data('name');
        var type = $(e.relatedTarget).data('modal-type');
        var maintainer = $(e.relatedTarget).data('modal-maintainer');

        if(type == 'delete'){
            $("#confirmModal #modal-title").text("Eliminar "+maintainer);
            $("#confirmModal #modal-body").text("¿Estas seguro de eliminar el "+maintainer+" "+name+"?");
            $("#confirmModal #pId").attr('action', $url.replace('1',id));
        }else if(type == 'add'){
            var body = '<input type="number" name="quantity" />' +
                        '<input type="hidden" name="id" value="'+id+'" />';

            $("#addModal #modal-title").text("Agregar Stock a "+maintainer+" "+name);
            $("#addModal #modal-body").text(body);
            $("#addModal #pId").attr('action', $url.replace('1',id));
        }
    });
});