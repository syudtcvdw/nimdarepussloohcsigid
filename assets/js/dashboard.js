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

    // school status togglers
    $('.toggle-school-status').click((e) => {
        if (!confirm("Are you sure you want to toggle school status? This action is reversible")) e.preventDefault();
    });

    //Generate password for superAdmin
    $('#pwdgen').click(function(){
        var _pwdgen = this;
        $(this).attr('disabled', 'disabled');

        $.get(API + 'admin/pwd', null, (data) => {
            $('[name="userpass"]').val(data.data);
            $(_pwdgen).removeAttr('disabled');
        }).error((e) => {
            $(_pwdgen).removeAttr('disabled');
        })
    })
    
    // handle view-schools table row click
    $('tr[data-clickable]').click(function(e) {
        if (e.target.hasAttribute('href')) return;
        else window.location.assign($(this).data().href);
    });
});
