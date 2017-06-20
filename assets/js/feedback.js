$(function () {

    $(".viewAction").click(function () {
        $(".cover-screen-with-this").toggleClass("hide");
        $(".modal-overlay").toggleClass("hide");

        $(this).closest(".feedback-row").addClass("viewed");

    })

    $(".moreAction").click(function () {

        $(".cover-screen-with-this").toggleClass("hide");
        $(".treated-query-overlay").toggleClass("hide");


    })

    $(".closeModal").click(function () {
        $(".cover-screen-with-this").addClass("hide");
        $(".modal-overlay").addClass("hide");
        $(".treated-query-overlay").addClass("hide");
    })

});
