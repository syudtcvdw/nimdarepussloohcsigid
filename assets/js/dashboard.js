$(function () {

    $left = $(".left");
    $right = $(".right");

    $(".showSidebar").click(function () {
        $left.toggleClass("toggle-this");
    });


    $left.hover(function () {
        $left.toggleClass("hover-left-width");
    });


    $(".sidebar-row").click(function () {
        $(".sidebar-row").removeClass("active");
        $(this).toggleClass("active");

    });

    // add admin form submit intercept
    $('.add-admin-form').submit(() => {
        if (confirm("Please, Copy your password before Submitting!")) return true;
        return false;
    });

    // password change modal togglers
    $('[data-target="#myModal"]').click(function() {
        $('.change-pswd-form').attr('action', $(this).data('path') + $(this).data('id'));
        $('#pwd-admin-target').text($(this).data('name'));
    });

    // password reveal buttons
    $('#spwd a').click(function (e) {
        e.preventDefault();

        $box = $($(this).closest('#spwd'));
        $box.toggleClass('shown');
        if ($box.hasClass('shown')) $('[type=password]', $box).attr('type', 'text');
        else $('input', $box).attr('type', 'password');
    });
});
