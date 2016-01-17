var detailNumber = 0;

$(document).ready(function(){
    $('#search-btn').click(function(){
        var name = $("#name").val();
        var route = "/product/searchName";
        var token = $token;

        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN': token},
            data: {name: name},
            type: 'POST',
            dataType: 'json',
            success: function(res){
                if(res.length > 0){
                    var data = $("#data");
                    var head = $("#head");

                    head.empty();
                    data.empty();
                    head.append('<tr>' +
                                    '<th class="width-25">Nombre</th>' +
                                    '<th class="width-25">Stock</th>' +
                                    '<th class="width-25">Precio</th>' +
                                    '<th colspan="2" class="add-product-ticket">Agregar</th>' +
                                '</tr>');

                    $(res).each(function(key,value){
                        data.append('<tr>' +
                                        '<td>'+value.name+'</td>' +
                                        '<td>'+value.quantity+'</td>' +
                                        '<td>'+value.price+'</td>' +
                                        '<td><input id="quantity'+value.id+'" type="number" class="form-control" placeholder="Cantidad"/></td>' +
                                        '<td><button class="btn btn-success icon-add" value="Agregar" id="add" onclick="addProduct('+value.id+')"/></td>' +
                                    '</tr>');
                    });
                }else{
                    var ajaxRequest = document.getElementById('ajaxRequest');
                    var ajaxRequestResponse = $("#ajaxRequestResponse");

                    ajaxRequestResponse.empty();
                    ajaxRequestResponse.append("No se encontraron productos con el nombre: "+name);
                    ajaxRequest.style.display = "inline";
                }
            },error:function(){
                console.log('error');
            }
        });
    });
    $('#close').click(function(){
        var ajaxRequest = document.getElementById('ajaxRequest');
        ajaxRequest.style.display = "none";
    });
    $('#createTicket').click(function(){
        var token = $token;

        var form = document.createElement("form");

        addHidden(form, "_token", token);
        addHidden(form, "detailNumber", detailNumber);

        productList.forEach(function(product) {
            addHidden(form, "id"+product.detailNumber, product.id);
            addHidden(form, "quantity"+product.detailNumber, product.quantity);
        });

        form.method = "POST";
        form.action = $url;
        document.body.appendChild(form);

        form.submit();
    });
});

function addProduct(id){
    var ajaxRequest = document.getElementById('ajaxRequest');
    var ajaxRequestResponse = $("#ajaxRequestResponse");
    var quantity = $("#quantity"+id).val();

    if(quantity > 0){
        if (isNormalInteger(quantity)) {
            var data = $("#dataDetail");
            var route = "/product/searchId";
            var token = $token;
            var detail = document.getElementById('detail');
            $.ajax({
                url: route,
                headers: {'X-CSRF-TOKEN': token},
                data: {id: id},
                type: 'POST',
                dataType: 'json',
                success: function(res){
                    if(res.length > 0){
                        $(res).each(function(key,value){
                            var price = 0;
                            var cumulativeAmount = 0;

                            for(var i = 0; i<detailNumber; i++){
                                var productRow = $("#detailNumber"+i);
                                var row = $(productRow).closest("tr"); // Find the row

                                if(row.length > 0){
                                    var rowId = row.find("#rowId").text();
                                    if(rowId == value.id){
                                        cumulativeAmount += parseFloat(row.find("#rowQuantity").text()); // Find the text
                                    }
                                }
                            }

                            if(parseFloat(value.quantity) >= (parseFloat(quantity)+parseFloat(cumulativeAmount))){
                                data.append('<tr id="detailNumber'+detailNumber+'">' +
                                                '<td id="rowId" class="display-none">'+
                                                    '<input type="hidden" name="id'+detailNumber+'" id="id" value="'+value.id+'"/>'+
                                                    value.id+
                                                '</td>' +
                                                '<td>'+
                                                    value.name+
                                                '</td>'+
                                                '<td id="rowQuantity">' +
                                                    '<input type="hidden" name="quantity'+detailNumber+'" value="'+quantity+'"/>'+
                                                    quantity+
                                                '</td>' +
                                                '<td>'+
                                                    +value.price+
                                                '</td>' +
                                                '<td id="rowPrice">'+
                                                    +value.price*quantity+
                                                '</td>' +
                                                '<td>'+
                                                    '<button name="subtotal" id="remove-product" class="btn btn-danger icon-remove" onclick="deleteProduct('+detailNumber+')" />'+
                                                '</td>' +
                                            '</tr>');

                                var inputDetailNumber = document.getElementById('detailNumber');
                                inputDetailNumber.value = detailNumber;
                                var total = document.getElementById('total');
                                total.value = parseFloat(total.value)+parseFloat(value.price * quantity);
                                var totalPrice = document.getElementById('totalPrice');
                                totalPrice.innerHTML = total.value;

                                detail.style.display = 'inline';

                                addProductInList(value.id,quantity, detailNumber);

                                detailNumber++;
                            }else{
                                ajaxRequestResponse.empty();
                                ajaxRequestResponse.append("No hay stock suficiente para la venta");
                                ajaxRequest.style.display = "inline";
                            }
                        });
                    }else{
                        ajaxRequestResponse.empty();
                        ajaxRequestResponse.append("No se encontro el producto agregado");
                        ajaxRequest.style.display = "inline";
                    }
                },error:function(){
                    console.log('error');
                }
            });
        }else{
            ajaxRequestResponse.empty();
            ajaxRequestResponse.append("La cantidad ingresada debe ser un número entero");
            ajaxRequest.style.display = "inline";
        }
    }else{
        ajaxRequestResponse.empty();
        ajaxRequestResponse.append("La cantidad mínima para agregar es 1");
        ajaxRequest.style.display = "inline";
    }
}

function deleteProduct(id){
    var data = document.getElementById('dataDetail');
    var rows = data.rows.length;

    var product = $("#detailNumber"+id);
    var row = $(product).closest("tr"); // Find the row
    var price = row.find("#rowPrice").text(); // Find the text

    var total = document.getElementById('total');
    total.value = parseFloat(total.value) - parseFloat(price);
    var totalPrice = document.getElementById('totalPrice');
    totalPrice.innerHTML = total.value;

    product.remove();
    removeProductOfList(id);

    if(rows == 1){
        var container = document.getElementById('detail');
        container.style.display = "none";
    }
}