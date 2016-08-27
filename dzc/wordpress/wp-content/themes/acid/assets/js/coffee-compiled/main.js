(function() {
  $(document).ready(function($) {
    var $footer_arrow, $footer_arrow_span, $footer_content, control, menu_item_length, singleSide, slider;
    selectnav('menu-main-menu', {
      label: 'Menu',
      nested: true,
      indent: '-',
      activeclass: 'current-menu-item'
    });
    $(".selectnav").wrapAll('<div class="selectnav-wrap">');
    if (Acid_Options.is_enabled("footer_toggle", true)) {
      $footer_content = $("#footer-content");
      $footer_arrow = $("#footer-arrow");
      $footer_arrow_span = $footer_arrow.find("span");
      $footer_arrow.click(function() {
        if ($footer_arrow_span.text() === "+") {
          $footer_arrow_span.text("–");
        } else {
          $footer_arrow_span.text("+");
        }
        return $footer_content.slideToggle({
          duration: 400,
          easing: "easeOutQuad"
        });
      });
    }
    $("#content").fitVids();
    if ($("#wpadminbar").length > 0) {
      $(".sf-container").addClass("offset");
    }
    /*
    		Move the Logo to the center of the UL
    */

    menu_item_length = $(".sf-menu > .menu-item").length;
    if (menu_item_length > 0) {
      singleSide = Math.ceil(menu_item_length / 2);
      $("#logo").hide().clone().attr("id", "js-logo").show().insertAfter(".sf-menu > .menu-item:nth-child(" + singleSide + ")").wrap('<li id="logo-container" class="menu-item"/>');
    } else {
      $("#logo").addClass("center-block");
    }
    $('.sf-menu').superfish({
      hoverClass: 'sfHover',
      pathLevels: 1,
      delay: 500,
      animation: {
        height: 'toggle'
      },
      speed: 175,
      autoArrows: true,
      disableHI: false,
      onShow: function() {
        $(this).css("overflow", "visible");
      }
    });
    $('.colorbox').colorbox({
      rel: "portfolio",
      maxHeight: "100%",
      maxWidth: "100%"
    });
    control = $(".purejs__slider--control");
    slider = $(".purejs__slider");
    if (slider.length != null) {
      if (slider.find("li").length > 1) {
        if (control.length != null) {
          control.flexslider({
            animation: "slide",
            controlNav: true,
            animationLoop: false,
            slideshow: false,
            itemWidth: 125,
            itemMargin: 5,
            asNavFor: slider,
            smoothHeight: false
          });
        }
        slider.flexslider({
          animation: "swing",
          controlNav: false,
          animationLoop: false,
          slideshow: false,
          sync: control,
          smoothHeight: true,
          video: true,
          itemWidth: "100%"
        });
      }
      $(".purejs__slider .popup-image").colorbox({
        top: 10,
        rel: "portfolio",
        maxWidth: "100%",
        maxHeight: "100%"
      });
    }
  });

}).call(this);
