
$(function () {
    $('#eraseEvent').change(function () {
        var link = '/?page=memberArea&event=' + $('#eraseEvent').val();
         $('#eraseBtn').removeAttr('href');
        $('#eraseBtn').attr('href', link);
       
    });
});