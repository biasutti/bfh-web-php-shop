var itemSelected;
var buyClicked;
$(function () {

    SetCookie('eucookie','eucookie',365*10);

    $(".buy").click(function (e) {
      buyClicked = true;
      var prodId = $(this).attr("name");
      $.ajax({
          url: "cartPreview.php",
          type : "POST",
          data : {prodId : prodId},
          success: function(response) {
							//alert("Hello World " + response);
              $(".cartPreview").fadeIn(500).empty().append(response);
              //$(".cartPreview").css("position","fixed");
          },
          error : function() {
							console.log("wrong data transmited, could not send data over ajax");
					}
      });
    });

    $(".filterMenu").click(function () {
        $(this).next().slideDown(500);
    });

    $("#burger").click(function () {
        //$("nav ul").css("display", $("nav ul").css("display") == "none" ? "flex" : "none");
        //$("nav ul").slideToggle(500);
        $("nav ul").toggleClass('toggled');
    });


    $(".products").click(function () {
        if(!buyClicked){
          //if there is any previous selected show it again
          if (typeof ($itemSelected) != "undefined" && $itemSelected !== null) {
              $itemSelected.show();
          }
          //put the selected item into a variable
          $itemSelected = $(this);
          var $prod = $(this).next();
          if ($prod.is(":hidden")) {
              $prod.addClass("activatedProduct");

              $(this).parent().removeClass("flex-container");
              $(".productDetail").hide();
              $(this).hide();
              $prod.slideDown(500);
              //scroll animation
              $("html, body").animate({scrollTop: $prod.offset().top},750);
          }
        }else{
          buyClicked = false;
        }
    });
    $(".closeImg").click(function () {
        $itemSelected.parent().addClass("flex-container");
        $(".productDetail").hide();
        $itemSelected.slideDown(500);
        //scroll animation
        $("html, body").animate({scrollTop: $itemSelected.offset().top},1000);
    });

    $("#dropDownArrow").click(function(){
      //make a rotation to the arrow image
      var $image = $(this).children(":first");
      AnimateRotate(90,$image,500);
      $(".side-navigation").toggle(500);
    });

    $(".my-cookie-container button").click(function () {
        $(".my-cookie-container").hide();
    });

    $(".error-message span").click(function () {
        $(".error-message").hide();
    })

    $(".success-message span").click(function () {
        $(".success-message").hide();
    })

    //Backend show divs or not
    $(".onClickBackend").click(function (e) {
      e.preventDefault();
      var divAfter = $(this).next();
      divAfter.toggle();
    });



});

//copied from https://stackoverflow.com/questions/15191058/css-rotation-cross-browser-with-jquery-animate
function AnimateRotate(angle,element,duration) {
    // caching the object for performance reasons
    var $elem = $(element);
    var $angelPos = 0;
    if ($(element).val()=="down"){
      $(element).val("up");
      angle = 0;
      $angelPos = 90;
    }else{
      $(element).val("down");
    }
    // we use a pseudo object for the animation
    // (starts from `0` to `angle`), you can name it as you want
    $({deg: $angelPos}).animate({deg: angle}, {
        duration: duration,
        step: function(now) {
            // in the step-callback (that is fired each step of the animation),
            // you can use the `now` paramter which contains the current
            // animation-position (`0` up to `angle`)
            $elem.css({
                transform: 'rotate(' + now + 'deg)'
            });
        }
    });
};



function SetCookie(c_name, value, expiredays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate()+expiredays);
    document.cookie=c_name+ "=" +escape(value)+";path=/"+((expiredays==null) ? "" : ";expires="+exdate.toUTCString());
}
