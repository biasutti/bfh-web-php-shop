var itemSelected;
$(function(){
  $(".products").click(function(){
    $itemSelected = $(this);
    var $prod = $(this).next();
    if ($prod.is(":hidden")) {
      $(".productDetail").slideUp(0);
      $(this).slideUp(0);
      $prod.slideDown(500);
    }
  });
  $(".closeImg").click(function(){
    $(".productDetail").slideUp(0);
    $itemSelected.slideDown(500);
  });
});
