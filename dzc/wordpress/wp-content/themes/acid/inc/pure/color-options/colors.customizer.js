(function($){
    $(document).ready(function(){
    
    wp.customize('acid_options[font_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('#cboxTitle, body, .container, #respond, .entry-title a').removeAttr('style');
          } 
          else {
            $('#cboxTitle, body, .container, #respond, .entry-title a').css('color', to);
          }
          });
      });
    
    wp.customize('acid_options[font_on_accent]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.site-header, .sf-menu .sub-menu, #ajax-popup, .entry-header .comments-link, #portable-header .comments-link, .entry-date, .page-links .pagination-item, .page-links .page-numbers a, .page-links .current, .page-links .dots, .site-sidebar .widget-title, .error404 .site-sidebar .widgettitle, .site-footer, .widget_calendar thead th').removeAttr('style');
          } 
          else {
            $('.site-header, .sf-menu .sub-menu, #ajax-popup, .entry-header .comments-link, #portable-header .comments-link, .entry-date, .page-links .pagination-item, .page-links .page-numbers a, .page-links .current, .page-links .dots, .site-sidebar .widget-title, .error404 .site-sidebar .widgettitle, .site-footer, .widget_calendar thead th').css('color', to);
          }
          });
      });
    
    wp.customize('acid_options[font_on_theme]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.tagcloud a, .tagcloud a[class*="tag"], .page-tags a, .page-tags a[class*="tag"]').removeAttr('style');
          } 
          else {
            $('.tagcloud a, .tagcloud a[class*="tag"], .page-tags a, .page-tags a[class*="tag"]').css('color', to);
          }
          });
      });
    
    wp.customize('acid_options[lightest_font]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.widget-title, .error404 .site-sidebar .widgettitle, .widget_calendar caption').removeAttr('style');
          } 
          else {
            $('.widget-title, .error404 .site-sidebar .widgettitle, .widget_calendar caption').css('color', to);
          }
          });
      });
    
    wp.customize('acid_options[link_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('a').removeAttr('style');
          } 
          else {
            $('a').css('color', to);
          }
          });
      });
    
    wp.customize('acid_options[link_hover]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('a, a').removeAttr('style');
          } 
          else {
            $('a, a').css('color', to);
          }
          });
      });
    
    wp.customize('acid_options[link_light]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.site-header a, .sf-menu .sub-menu a, #ajax-popup a, .entry-header .comments-link a, #portable-header .comments-link a, .entry-date a, .page-links .pagination-item a, .page-links .page-numbers a a, .page-links .current a, .page-links .dots a, .site-sidebar .widget-title a, .error404 .site-sidebar .widgettitle a, .site-footer a, .widget_calendar #today, .widget_calendar #today a').removeAttr('style');
          } 
          else {
            $('.site-header a, .sf-menu .sub-menu a, #ajax-popup a, .entry-header .comments-link a, #portable-header .comments-link a, .entry-date a, .page-links .pagination-item a, .page-links .page-numbers a a, .page-links .current a, .page-links .dots a, .site-sidebar .widget-title a, .error404 .site-sidebar .widgettitle a, .site-footer a, .widget_calendar #today, .widget_calendar #today a').css('color', to);
          }
          });
      });
    
    wp.customize('acid_options[link_light_hover]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.site-header a, .sf-menu .sub-menu a, #ajax-popup a, .entry-header .comments-link a, #portable-header .comments-link a, .entry-date a, .page-links .pagination-item a, .page-links .page-numbers a a, .page-links .current a, .page-links .dots a, .site-sidebar .widget-title a, .error404 .site-sidebar .widgettitle a, .site-footer a').removeAttr('style');
          } 
          else {
            $('.site-header a, .sf-menu .sub-menu a, #ajax-popup a, .entry-header .comments-link a, #portable-header .comments-link a, .entry-date a, .page-links .pagination-item a, .page-links .page-numbers a a, .page-links .current a, .page-links .dots a, .site-sidebar .widget-title a, .error404 .site-sidebar .widgettitle a, .site-footer a').css('color', to);
          }
          });
      });
    
    wp.customize('acid_options[theme_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.page-links .pagination-item, .page-links .page-numbers a, .page-links .current, .page-links .dots').removeAttr('style');
          } 
          else {
            $('.page-links .pagination-item, .page-links .page-numbers a, .page-links .current, .page-links .dots').css('background-color', to);
          }
          });
      });
    
    wp.customize('acid_options[font_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.field, .wpcf7-text').removeAttr('style');
          } 
          else {
            $('.field, .wpcf7-text').css('color', to);
          }
          });
      });
    
    wp.customize('acid_options[darker_theme_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('ul.icon-list li .batch').removeAttr('style');
          } 
          else {
            $('ul.icon-list li .batch').css('color', to);
          }
          });
      });
    
    wp.customize('acid_options[theme_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('blockquote, .theme-color, .site-title, .entry-content li, .entry-title a, .entry-meta a, .horizontal-scroll .vertical-title-container').removeAttr('style');
          } 
          else {
            $('blockquote, .theme-color, .site-title, .entry-content li, .entry-title a, .entry-meta a, .horizontal-scroll .vertical-title-container').css('color', to);
          }
          });
      });
    
    wp.customize('acid_options[lighter_theme_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.button, .pure-button, #submit, .submit, input[type=submit], .tagcloud a, .tagcloud a[class*="tag"], .page-tags a, .page-tags a[class*="tag"]').removeAttr('style');
          } 
          else {
            $('.button, .pure-button, #submit, .submit, input[type=submit], .tagcloud a, .tagcloud a[class*="tag"], .page-tags a, .page-tags a[class*="tag"]').css('background-color', to);
          }
          });
      });
    
    wp.customize('acid_options[theme_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.is-author, .button, .pure-button, #submit, .submit, input[type=submit], .theme-bg, .accent-bg, .widget_calendar caption, .widget_calendar #today, .tagcloud a, .tagcloud a[class*="tag"], .page-tags a, .page-tags a[class*="tag"], ul.icon-list li div, .horizontal-scroll #scrollbar .thumb').removeAttr('style');
          } 
          else {
            $('.is-author, .button, .pure-button, #submit, .submit, input[type=submit], .theme-bg, .accent-bg, .widget_calendar caption, .widget_calendar #today, .tagcloud a, .tagcloud a[class*="tag"], .page-tags a, .page-tags a[class*="tag"], ul.icon-list li div, .horizontal-scroll #scrollbar .thumb').css('background-color', to);
          }
          });
      });
    
    wp.customize('acid_options[accent_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.kilo a, h1 a, .alpha a, h2 a, .beta a, #reply-title a, h3 a, .gamma a, .comments-title a, h4 a, .delta a, .site-sidebar .widget-title a, .error404 .site-sidebar .widgettitle a, .widget_rss li a.rsswidget a, h5 a, .epsilon a, h6 a, .zeta a, .kilo a, h1 a, .alpha a, h2 a, .beta a, #reply-title a, h3 a, .gamma a, .comments-title a, h4 a, .delta a, .site-sidebar .widget-title a, .error404 .site-sidebar .widgettitle a, .widget_rss li a.rsswidget a, h5 a, .epsilon a, h6 a, .zeta a, .accent-color').removeAttr('style');
          } 
          else {
            $('.kilo a, h1 a, .alpha a, h2 a, .beta a, #reply-title a, h3 a, .gamma a, .comments-title a, h4 a, .delta a, .site-sidebar .widget-title a, .error404 .site-sidebar .widgettitle a, .widget_rss li a.rsswidget a, h5 a, .epsilon a, h6 a, .zeta a, .kilo a, h1 a, .alpha a, h2 a, .beta a, #reply-title a, h3 a, .gamma a, .comments-title a, h4 a, .delta a, .site-sidebar .widget-title a, .error404 .site-sidebar .widgettitle a, .widget_rss li a.rsswidget a, h5 a, .epsilon a, h6 a, .zeta a, .accent-color').css('color', to);
          }
          });
      });
    
    wp.customize('acid_options[accent_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.site-header, .sf-menu .sub-menu, #ajax-popup, .entry-header .comments-link, #portable-header .comments-link, .entry-date, .page-links .pagination-item, .page-links .page-numbers a, .page-links .current, .page-links .dots, .site-sidebar .widget-title, .error404 .site-sidebar .widgettitle, .site-footer, .widget_calendar thead th, .site-footer .widget_calendar td, .site-footer .widget_calendar tbody td.pad, .horizontal-scroll .vertical-title-container, .horizontal-scroll #scrollbar .track').removeAttr('style');
          } 
          else {
            $('.site-header, .sf-menu .sub-menu, #ajax-popup, .entry-header .comments-link, #portable-header .comments-link, .entry-date, .page-links .pagination-item, .page-links .page-numbers a, .page-links .current, .page-links .dots, .site-sidebar .widget-title, .error404 .site-sidebar .widgettitle, .site-footer, .widget_calendar thead th, .site-footer .widget_calendar td, .site-footer .widget_calendar tbody td.pad, .horizontal-scroll .vertical-title-container, .horizontal-scroll #scrollbar .track').css('background-color', to);
          }
          });
      });
    
    wp.customize('acid_options[lighter_accent_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.site-footer .widget_calendar thead th').removeAttr('style');
          } 
          else {
            $('.site-footer .widget_calendar thead th').css('background-color', to);
          }
          });
      });
    
    wp.customize('acid_options[theme_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('input[type=text], input[type=email], .searchfield, textarea, .sf-menu > .menu-item > .sub-menu, .sf-menu .sub-menu, #ajax-popup, #popup-arrow, .bypostauthor > .comment .avatar, .is-author img, #footer-arrow, #footer-content, .pure-spacer.theme, a.wpp-thumbnail, .site-footer a.wpp-thumbnail').removeAttr('style');
          } 
          else {
            $('input[type=text], input[type=email], .searchfield, textarea, .sf-menu > .menu-item > .sub-menu, .sf-menu .sub-menu, #ajax-popup, #popup-arrow, .bypostauthor > .comment .avatar, .is-author img, #footer-arrow, #footer-content, .pure-spacer.theme, a.wpp-thumbnail, .site-footer a.wpp-thumbnail').css('border-color', to);
          }
          });
      });
    
    wp.customize('acid_options[accent_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.entry-header .comments-link, #portable-header .comments-link, .site-sidebar .widget-title, .error404 .site-sidebar .widgettitle, .widget_calendar thead th, .site-footer .widget_calendar thead, .pure-spacer.accent').removeAttr('style');
          } 
          else {
            $('.entry-header .comments-link, #portable-header .comments-link, .site-sidebar .widget-title, .error404 .site-sidebar .widgettitle, .widget_calendar thead th, .site-footer .widget_calendar thead, .pure-spacer.accent').css('border-color', to);
          }
          });
      });
    
    wp.customize('acid_options[darker_theme_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.button, .pure-button, #submit, .submit, input[type=submit], .widget_calendar #today').removeAttr('style');
          } 
          else {
            $('.button, .pure-button, #submit, .submit, input[type=submit], .widget_calendar #today').css('border-color', to);
          }
          });
      });
    
    wp.customize('acid_options[accent_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.horizontal-scroll .vertical-title-container .arrow-bottom').removeAttr('style');
          } 
          else {
            $('.horizontal-scroll .vertical-title-container .arrow-bottom').css('border-top-color', to);
          }
          });
      });
    
    wp.customize('acid_options[lighter_accent_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.sf-menu .sub-menu .menu-item').removeAttr('style');
          } 
          else {
            $('.sf-menu .sub-menu .menu-item').css('border-color', to);
          }
          });
      });
    
    wp.customize('acid_options[accent_color]',function( value ) {
        value.bind(function(to) {
          if(!to) {
            $('.horizontal-scroll .vertical-title-container .arrow-right').removeAttr('style');
          } 
          else {
            $('.horizontal-scroll .vertical-title-container .arrow-right').css('border-left-color', to);
          }
          });
      });
     }); })(jQuery);