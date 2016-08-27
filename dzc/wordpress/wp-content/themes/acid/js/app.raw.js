(function() {
  var $, $body, $content, $scrollbar, Acid_Options, Horizontal_Layout, Layout, Toggler, WP_Theme_Options, _Abstract_Toggler, _ref,
    __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; },
    __hasProp = {}.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

  $ = jQuery;

  WP_Theme_Options = (function() {
    function WP_Theme_Options(options) {
      this.options = options;
    }

    WP_Theme_Options.prototype.get_option = function(what) {
      return this.options[what];
    };

    WP_Theme_Options.prototype.is_falsy = function(option) {
      return this.is_bool(this.parse_falsy(option));
    };

    WP_Theme_Options.prototype.is_bool = function(obj) {
      return obj === true || obj === false || toString.call(obj) === '[object Boolean]';
    };

    WP_Theme_Options.prototype.parse_falsy = function(option) {
      var val;
      val = this.get_option(option);
      if (val === "false") {
        return false;
      }
      if (val === "true") {
        return true;
      }
      return val;
    };

    WP_Theme_Options.prototype.is_enabled = function(option, default_option) {
      if (default_option == null) {
        default_option = false;
      }
      if (this.is_falsy(option)) {
        return this.parse_falsy(option);
      } else {
        return default_option;
      }
    };

    return WP_Theme_Options;

  })();

  Acid_Options = new WP_Theme_Options(ACID_OPTIONS_CONFIG);

  jQuery.fn.textWidth = function(text, font) {
    var $el;
    $el = jQuery(this);
    if (!jQuery.fn.textWidth.fakeEl) {
      jQuery.fn.textWidth.fakeEl = jQuery("<span>").hide().appendTo(document.body);
    }
    jQuery.fn.textWidth.fakeEl.html(text || $el.text()).css("font", font || $el.css("font") || 32);
    return jQuery.fn.textWidth.fakeEl.width();
  };

  jQuery(function($) {
    return setTimeout((function() {
      return $(".horizontal-scroll").addClass("init");
    }), 50);
  });

  jQuery(function($) {
    var $tooltip, box_event_actions, tooltip_height, tooltip_text, tooltip_width;
    $(document.body).append('<div id="follower"><span class="text"></span><div id="follower-arrow"></div</div>');
    $tooltip = $("#follower").hide();
    tooltip_text = $tooltip.find(".text");
    tooltip_height = 0;
    tooltip_width = 0;
    $('.box [title]').attr("title", "");
    $('.box').append('<div class="dim">');
    $("#scrollbar").on("tscroll", function() {
      $tooltip.hide();
    });
    box_event_actions = {
      mouseenter: function() {
        var followerColor;
        followerColor = $(this).data("followerColor");
        $(tooltip_text).html($(this).find(".entry-title").text());
        $tooltip.show().css({
          "width": $(tooltip_text).textWidth() + 30,
          "background-color": followerColor
        });
        $("#follower-arrow").css({
          "border-color": "" + followerColor + " transparent transparent transparent"
        });
        tooltip_height = $tooltip.outerHeight() + 25;
        tooltip_width = $tooltip.width();
      },
      mouseleave: function() {
        $tooltip.hide();
      },
      mousemove: function(e) {
        $tooltip.css({
          top: e.pageY - tooltip_height,
          left: e.pageX
        });
      },
      click: function(e) {
        var $link;
        if (e.isTrigger != null) {
          return;
        }
        $link = $(this).find(".js--link").first();
        if (!$link.hasClass("colorbox")) {
          window.location = $link.attr("href");
        } else {
          $link.trigger("click");
        }
        return e.preventDefault();
      }
    };
    $(document.body).on(box_event_actions, ".box");
  });

  $ = jQuery;

  Horizontal_Layout = (function() {
    function Horizontal_Layout() {
      this.refresh = __bind(this.refresh, this);
      this.setup = __bind(this.setup, this);
      this.$scrollbar = $("#scrollbar");
      this.$content = $("#content");
      this.is = {
        enabled: this.maybe_enable_horizontal_scroll(),
        setup: false
      };
      this.properties = {
        scrollbar: {
          height: $('#scrollbar').find("> .scrollbar").height()
        },
        canvas: false,
        width: $(window).width()
      };
      $(document).on("ready", this.setup);
      $(window).on("load debouncedresize", this.refresh);
    }

    Horizontal_Layout.prototype.setup = function() {
      if (this.is.setup || !this.is.enabled) {
        return false;
      }
      this.is.setup = true;
      $("body").data("ready", "fired");
      $("html").css("overflow-y", "hidden");
      return this.$scrollbar.tinyscrollbar({
        axis: "x",
        invertscroll: true
      });
    };

    Horizontal_Layout.prototype.refresh = function() {
      var $head, $style, boxH, boxW, canvas_height, ratio, rows, style, window_height, window_width;
      this.is.enabled = this.maybe_enable_horizontal_scroll();
      if (!this.is.enabled) {
        return false;
      }
      if (this.is.setup === false) {
        this.setup();
      }
      window_height = $(window).height();
      window_width = $(window).width();
      canvas_height = this.$content.height() - this.properties.scrollbar.height;
      this.update_cover_images();
      this.$content.find(".vertical-title").css('width', Math.round(canvas_height));
      if ((canvas_height === this.properties.canvas) && (window_width === this.properties.width)) {
        return;
      }
      this.properties.canvas = canvas_height;
      this.properties.width = window_width;
      ratio = 1;
      rows = 2;
      boxH = Math.round(canvas_height / rows);
      boxW = Math.round(boxH * ratio);
      style = ".hscol { \n	width: " + boxW + "px; \n}\n.hscol .box {\n	width: " + boxW + "px; \n	height: " + boxW + "px; \n}\n.hscol.large, .hscol.large .box { \n	width: " + canvas_height + "px; \n	height: " + canvas_height + "px; \n}";
      $head = $(document.head);
      $style = $head.find('#js__style');
      if ($style.length === 1) {
        $style.html(style);
      } else {
        $head.append("<style id=\"js__style\" type=\"text/css\">" + style + "</style>");
      }
      return this.update_scrollbar('relative');
    };

    Horizontal_Layout.prototype.get_total_width = function($elements) {
      var el, key, w, _i, _len;
      w = 0;
      for (key = _i = 0, _len = $elements.length; _i < _len; key = ++_i) {
        el = $elements[key];
        w += $(el).outerWidth();
      }
      return w;
    };

    Horizontal_Layout.prototype.resize_columns = function(columns, ratio) {
      var $columns, aspectRatio, imageHeight, imageWidth, newHeight, newWidth;
      if (ratio == null) {
        ratio = 0.5;
      }
      $columns = $(columns);
      newHeight = Math.floor(this.$content.height() * ratio);
      imageHeight = parseInt($columns.find(".wp-post-image").first().attr("height"), 10);
      imageWidth = parseInt($columns.find(".wp-post-image").first().attr("width"), 10);
      if (!(isNaN(imageHeight) || isNaN(imageWidth) || imageWidth === 0 || imageHeight === 0)) {
        aspectRatio = imageHeight / imageWidth;
        newWidth = Math.round(newHeight / aspectRatio);
        return $columns.find(".box").css({
          height: newHeight,
          width: newWidth
        });
      }
    };

    Horizontal_Layout.prototype.update_cover_images = function() {
      var $cover_images;
      $cover_images = this.$content.find(".cover-image");
      if ($cover_images.length >= 1) {
        return $cover_images.each(function(key, cover) {
          var $cover, $thumb, image_width;
          $cover = $(cover);
          $thumb = $cover.find(".wp-post-image");
          if ($thumb.length !== 1) {
            return;
          }
          $cover.css("position", "static");
          image_width = $thumb.outerWidth(true);
          return $cover.css({
            "width": image_width,
            "position": "relative"
          });
        });
      }
    };

    Horizontal_Layout.prototype.update_scrollbar = function(params) {
      if (!this.is.setup) {
        return false;
      }
      this.$content.width(this.get_total_width($('.hscol')));
      return this.$scrollbar.tinyscrollbar_update(params);
    };

    Horizontal_Layout.prototype.maybe_enable_horizontal_scroll = function() {
      if ($("#primary").data("horizontal-scroll") !== "on") {
        return false;
      }
      if ($("body").hasClass("horizontal-scroll")) {
        if ($(window).width() < 768) {
          $("body").removeClass("horizontal-scroll").addClass("js-no-tinyscroll");
          $("html").css("overflow-y", "visible");
          return false;
        } else {
          return true;
        }
      } else {
        if ($(window).width() >= 768) {
          $("body").addClass("horizontal-scroll").removeClass("js-no-tinyscroll");
          return true;
        } else {
          return false;
        }
      }
    };

    return Horizontal_Layout;

  })();

  Layout = new Horizontal_Layout();

  $scrollbar = Layout.$scrollbar;

  $content = $("#content");

  $body = $("body");

  $(document).keydown(function(e) {
    if (!(e.keyCode === 37 || e.keyCode === 38 || e.keyCode === 39 || e.keyCode === 40)) {
      return;
    }
    e.preventDefault();
    if (e.keyCode === 37 || e.keyCode === 38) {
      $scrollbar.tinyscrollbar_updatescroll(60);
    }
    if (e.keyCode === 39 || e.keyCode === 40) {
      return $scrollbar.tinyscrollbar_updatescroll(-60);
    }
  });

  $scrollbar.one("tscroll", function() {
    var scroll_happened;
    scroll_happened = true;
    return $(".blinking-arrow").remove();
  });

  $('#main').imagesLoaded(function() {
    var $page_thumbnail, $page_thumbnail_image, maybeLoadAjax, nextAjaxLoad;
    if (!Layout.maybe_enable_horizontal_scroll()) {
      return false;
    }
    Layout.refresh();
    /*
    		Parallaxy Page Thumbnail
    */

    $page_thumbnail = $("#page-thumbnail");
    if ($page_thumbnail.length > 0) {
      $page_thumbnail_image = $page_thumbnail.find(".wp-post-image");
      $scrollbar.on("tscroll", function(e, scroll) {
        $page_thumbnail_image.css("left", scroll * 0.75);
      });
    }
    if (Acid_Options.is_enabled("blinking_arrow", true)) {
      $(".vertical-title-container").first().append('<div class="blinking-arrow"></div>');
    }
    if ($("ul.page-numbers").length > 0) {
      nextAjaxLoad = $content.width() * 0.65 - $(window).width();
      $(".page-links, .page-numbers").hide();
      /*
      			Infinite Scroll
      
      			Only Attempt if there is a pagination
      */

      $content.infinitescroll({
        navSelector: "ul.page-numbers",
        nextSelector: "ul.page-numbers .next",
        finishedMsg: true,
        msgText: true,
        itemSelector: "#content .hscol",
        errorCallback: function() {
          $scrollbar.off("tscroll", maybeLoadAjax);
          $("#infscr-loading").remove();
          return Layout.update_scrollbar('relative');
        }
      }, function(items) {
        $(items).find(".box").append('<div class="dim">');
        $('.colorbox').colorbox({
          rel: "portfolio",
          maxHeight: "100%",
          maxWidth: "100%"
        });
        Layout.refresh();
        nextAjaxLoad = $content.width() * 0.8 - $(window).width();
      });
      $(window).unbind('.infscr');
      maybeLoadAjax = function(e, scroll) {
        if (nextAjaxLoad === false) {
          return;
        }
        if (scroll >= nextAjaxLoad) {
          nextAjaxLoad = false;
          $content.infinitescroll('retrieve');
        }
      };
      $scrollbar.on("tscroll", maybeLoadAjax);
      return maybeLoadAjax(null, 0);
      /*
      			Explaining: $("#content").width() * 0.65 - $(window).width()
      			CW = $("#content").width() * 0.65
      			WW = $(window).width()
      			---
      			Assume: CW = 100px, WW = 200px
      
      			CW * 0.65 - WW = 65px - 200px = -135px
      			(TRUE) === -135px < 0
      
      			Maybe Load AJAX ? Yes.
      			---
      			
      			---
      			Assume CW = 200px, WW = 200px
      			
      			CW * 0.65 - WW = 130px - 200px = -70px
      			(TRUE) === -70px < 0
      
      			Maybe Load AJAX ? Yes.
      			---
      
      			---
      			Assume CW = 400px, WW = 200px
      			
      			CW * 0.65 - WW = 260px - 200px = 60px
      			(FALSE) === 60px < 0
      
      			Maybe Load AJAX ? NO, wait for scroll.
      			---
      
      			Passing null, because maybeLoadAjax is expecting an event as the first argument
      */

    }
  });

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

  $ = jQuery;

  _Abstract_Toggler = (function() {
    function _Abstract_Toggler(options) {
      this.toggle = __bind(this.toggle, this);
      this.load = __bind(this.load, this);
      this.selectors = options;
      this._URL = false;
      this._loaded_URL = false;
      this.iface = {
        window: $(window),
        body: $("html,body"),
        preview: this.selectors.preview
      };
    }

    _Abstract_Toggler.prototype.load = function(URL) {
      var load,
        _this = this;
      load = $.get(URL);
      load.done(function(data) {
        var $data, content;
        $data = $(data);
        content = $data.find(_this.selectors.content);
        _this.cache_data(content);
        return _this.on_load_complete(content);
      });
      return load;
    };

    _Abstract_Toggler.prototype.on_load_complete = function(data) {
      this.cache_url(this._URL);
      this.open(data);
    };

    _Abstract_Toggler.prototype.open = function() {
      this.is_open = true;
      return this.iface.preview.container.show();
    };

    _Abstract_Toggler.prototype.close = function() {
      this.is_open = false;
      return this.iface.preview.container.hide();
    };

    _Abstract_Toggler.prototype.toggle = function(URL) {
      this._URL = URL;
      if (this.is_open !== true || this.is_new_url(this._URL)) {
        return this.reopen(URL);
      } else {
        return this.close();
      }
    };

    _Abstract_Toggler.prototype.reopen = function(URL) {
      if (this.is_open === true) {
        this.close();
      }
      if (this.is_new_url(this._URL)) {
        return this.load(URL);
      } else {
        return this.open();
      }
    };

    _Abstract_Toggler.prototype.is_new_url = function(URL) {
      if (URL !== this._loaded_URL) {
        return true;
      } else {
        return false;
      }
    };

    _Abstract_Toggler.prototype.cache_url = function(URL) {
      this._loaded_URL = URL;
      this._URL = false;
    };

    _Abstract_Toggler.prototype.cache_data = function(data) {
      this._cached = data.clone().hide();
    };

    _Abstract_Toggler.prototype.get_cached_data = function() {
      return this._cached.clone().show();
    };

    return _Abstract_Toggler;

  })();

  Toggler = (function(_super) {
    __extends(Toggler, _super);

    function Toggler() {
      _ref = Toggler.__super__.constructor.apply(this, arguments);
      return _ref;
    }

    Toggler.prototype.open = function(data) {
      var $data, height,
        _this = this;
      $data = $(data);
      this.iface.preview.content.html(data);
      this.iface.preview.container.css({
        top: ""
      });
      this.iface.preview.overlay.css({
        visibility: "none",
        display: "block"
      });
      height = this.iface.preview.content.outerHeight();
      this.iface.preview.overlay.css({
        visibility: "",
        display: ""
      }).fadeIn();
      this.iface.preview.content.css({
        height: height
      });
      this.iface.preview.content.hide();
      return this.iface.preview.content.slideDown({
        easing: "easeOutBack",
        complete: function() {
          _this.is_open = true;
        }
      });
    };

    Toggler.prototype.close = function() {
      var _this = this;
      this.iface.preview.container.animate({
        top: 0
      }, {
        easing: "easeInSine",
        duration: 400,
        queue: false
      });
      return this.iface.preview.content.slideUp({
        easing: "easeOutQuint",
        complete: function() {
          _this.iface.preview.overlay.fadeOut();
          _this.is_open = false;
        }
      });
    };

    return Toggler;

  })(_Abstract_Toggler);

  $(window).load(function() {
    var $ajax_links, $arrow, toggler, toggler_settings;
    toggler_settings = {
      preview: {
        overlay: $("#overlay"),
        content: $("#ajax-popup-content"),
        container: $("#ajax-popup")
      },
      content: '#content .entry-content'
    };
    toggler = new Toggler(toggler_settings);
    $ajax_links = $(".sf-menu .with-ajax > a, .acid-ajax-link > a, a.acid-ajax-link");
    $arrow = $("#popup-arrow");
    $ajax_links.click(function(e) {
      var $target, URL;
      e.preventDefault();
      $target = $(e.srcElement || e.target);
      $arrow.css({
        left: $target.offset().left
      });
      URL = $target.attr("href");
      return toggler.toggle(URL);
    });
    $("#overlay").click(function(e) {
      var $target;
      $target = $(e.srcElement || e.target);
      if ($target.attr('id') === 'overlay') {
        return toggler.close();
      }
    });
    return $(document).on("keyup", function(e) {
      if (e.keyCode === 27) {
        if (toggler.is_open) {
          return toggler.close();
        }
      }
    });
  });

}).call(this);
