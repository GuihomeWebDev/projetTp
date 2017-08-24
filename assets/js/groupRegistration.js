$(function () {
    $('#groupName').change(function () {
        var input = $('#createGroup').closest('.form-group');
        if ($('#groupName').val() != 0) {
            $(input).hide();
        } else {
            $(input).show();
        }
    });
});