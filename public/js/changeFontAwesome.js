function changeFontAwesome($id){
    var font = $("#"+$id);
    var fontAwesome = $("#font_awesome_id");
    var modal = $("#modal_close");
    var icon = $("#icon");
    var fontValue = font.attr('class');

    fontAwesome.val($id)

    icon.empty();
    icon.append('<i class="fa '+fontValue+'"></i>');

    modal.click();
}