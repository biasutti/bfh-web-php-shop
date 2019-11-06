var itemSelected;
$(function () {

    $(document).ready(function() {
        SetCookie('eucookie','eucookie',365*10);
    });

    $(".buy").click(function () {
        alert($(this).attr("name"));
    });

    $(".filterMenu").click(function () {
        $(this).next().slideDown(500);
    });

    $("#burger").click(function () {
        $("nav ul").css("display", $("nav ul").css("display") == "none" ? "flex" : "none");
        $(".side-navigation").toggle();
    });

    $(".products").click(function () {
        //if there is any previous selected show it again
        if (typeof ($itemSelected) != "undefined" && $itemSelected !== null) {
            $itemSelected.show();
        }
        //put the selected item into a variable
        $itemSelected = $(this);
        var $prod = $(this).next();
        if ($prod.is(":hidden")) {
            $(this).parent().removeClass("flex-container");
            $(".productDetail").hide();
            $(this).hide();
            $prod.slideDown(500);
        }
    });
    $(".closeImg").click(function () {
        $itemSelected.parent().addClass("flex-container");
        $(".productDetail").hide();
        $itemSelected.slideDown(500);
    });

});

function SetCookie(c_name, value, expiredays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate()+expiredays);
    document.cookie=c_name+ "=" +escape(value)+";path=/"+((expiredays==null) ? "" : ";expires="+exdate.toUTCString());
}