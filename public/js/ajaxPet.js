$(document).ready(function(){
    var $specie = $("#specie");

    ajaxPet($specie.val());
    var $breed = $("#breed");
    /* $breed[1].selected = true;
    console.log($breed.val());*/

    $breed.change(function(event){
        console.log($breed.val());
    });

    $specie.change(function(event){
        ajaxPet(event.target.value);
    });

    function ajaxPet(id){
        $.get("/breeds/"+id,function(response, state){
            if(state == 'success') {
                changeBreed(response);
            }
        });
    }

    function changeBreed(response){
        var select = $("#breed");
        select.empty();
        select.append('<option value="-1">SELECCIONA UN RAZA</option>');
        response.forEach(function(breed) {
            select.append('<option value="'+breed.id+'">'+breed.name+'</option>');
        });
    }
});