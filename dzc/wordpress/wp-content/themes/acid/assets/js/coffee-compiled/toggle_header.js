(function() {
  var $, Toggler, _Abstract_Toggler, _ref,
    __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; },
    __hasProp = {}.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

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
