/**
 * Created by Francisco on 06-01-16.
 */
$(function() {
   $('#rut').Rut({
        on_error: function(){ alert('Rut incorrecto'); }
    });
});