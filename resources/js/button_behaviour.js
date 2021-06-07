
$(function () {
    $('.form-control').on('change', function () {
        $('.filter-btn').removeAttr("disabled");
    });
});