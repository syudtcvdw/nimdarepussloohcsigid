$(function(){

    $left = $(".left");
    $right = $(".right");

$(".showSidebar").click(function(){
    $left.toggleClass("toggle-this");
});

    
$left.hover(function(){
      $left.toggleClass("hover-left-width");
      $right.toggleClass("hover-right-width");
});



    $(".sidebar-row").click(function(){
         $(".sidebar-row").removeClass("active");
        $(this).toggleClass("active");

    })
});
