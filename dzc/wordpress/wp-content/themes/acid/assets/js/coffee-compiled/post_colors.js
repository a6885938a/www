(function() {
  jQuery(function($) {
    var get_direction, get_width, gutter_width, setup_gutter_width, setup_meta_position;
    get_direction = function(selector) {
      if (selector === "prev-post") {
        return "right";
      } else {
        return "left";
      }
    };
    get_width = function(selector) {
      if ($(selector).textWidth() !== $(window).width()) {
        return $(selector).textWidth();
      } else {
        return 0;
      }
    };
    gutter_width = 0;
    setup_gutter_width = function() {
      var contentPosition;
      contentPosition = $("#main").offset();
      gutter_width = contentPosition.left;
      return gutter_width;
    };
    setup_meta_position = function() {
      $("#prev-post .meta").css({
        "right": gutter_width,
        "position": "absolute"
      });
      return $("#next-post .meta").css({
        "left": gutter_width,
        "position": "absolute"
      });
    };
    $(window).on("throttledresize", function() {
      setup_gutter_width();
      setup_meta_position();
      return $(".js--post-link").css({
        width: gutter_width
      });
    });
    return $(document).ready(function() {
      var hoverEnabled, longestWidth;
      setup_gutter_width();
      setup_meta_position();
      hoverEnabled = false;
      longestWidth = get_width("#prev-post") > get_width("#next-post") ? get_width("#prev-post") : get_width("#next-post");
      longestWidth = longestWidth + 90;
      setTimeout(function() {
        $("#next-post").stop().animate({
          width: gutter_width
        }, {
          duration: 800,
          queue: false,
          easing: "easeInOutQuint",
          always: function() {
            $(this).css({
              overflow: "visible"
            });
            hoverEnabled = true;
          }
        });
        return $("#prev-post").stop().animate({
          width: gutter_width
        }, {
          duration: 800,
          queue: false,
          easing: "easeInOutQuint",
          always: function() {
            $(this).css({
              overflow: "visible"
            });
            hoverEnabled = true;
          }
        });
      }, 250);
      $(".js--post-link").hoverIntent({
        over: function() {
          if (hoverEnabled === true) {
            $(this).css({
              backgroundColor: $(this).data("color")
            });
            return $(this).find(".meta").animate({
              width: longestWidth
            }, {
              duration: 400,
              easing: "easeOutBack"
            });
          }
        },
        out: function() {
          if (hoverEnabled === true) {
            $(this).css({
              backgroundColor: $("#content").data("color")
            });
            return $(this).find(".meta").animate({
              width: 0
            }, {
              duration: 175,
              easing: "easeInExpo"
            });
          }
        },
        timeout: 100,
        interval: 150
      });
      return $(".js--post-link").click(function() {
        var goTo;
        goTo = $(this).find(".adjacent-title a").attr("href");
        if (goTo != null) {
          window.location = goTo;
        }
      });
    });
  });

}).call(this);
