"use strict";

/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
(function ($) {
  // Site title and description.
  wp.customize('blogname', function (value) {
    value.bind(function (to) {
      $('.site-title a').text(to);
    });
  });
  wp.customize('blogdescription', function (value) {
    value.bind(function (to) {
      $('.site-description').text(to);
    });
  }); // Header text color.

  wp.customize('header_textcolor', function (value) {
    value.bind(function (to) {
      if ('blank' === to) {
        $('.site-title a, .site-description').css({
          'clip': 'rect(1px, 1px, 1px, 1px)',
          'position': 'absolute'
        });
      } else {
        $('.site-title a, .site-description').css({
          'clip': 'auto',
          'position': 'relative'
        });
        $('.site-title a, .site-description').css({
          'color': to
        });
      }
    });
  });
})(jQuery);
"use strict";

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/**
* @preserve HTML5 Shiv 3.7.3 | @afarkas @jdalton @jon_neal @rem | MIT/GPL2 Licensed
*/
!function (a, b) {
  function c(a, b) {
    var c = a.createElement("p"),
        d = a.getElementsByTagName("head")[0] || a.documentElement;
    return c.innerHTML = "x<style>" + b + "</style>", d.insertBefore(c.lastChild, d.firstChild);
  }

  function d() {
    var a = t.elements;
    return "string" == typeof a ? a.split(" ") : a;
  }

  function e(a, b) {
    var c = t.elements;
    "string" != typeof c && (c = c.join(" ")), "string" != typeof a && (a = a.join(" ")), t.elements = c + " " + a, j(b);
  }

  function f(a) {
    var b = s[a[q]];
    return b || (b = {}, r++, a[q] = r, s[r] = b), b;
  }

  function g(a, c, d) {
    if (c || (c = b), l) return c.createElement(a);
    d || (d = f(c));
    var e;
    return e = d.cache[a] ? d.cache[a].cloneNode() : p.test(a) ? (d.cache[a] = d.createElem(a)).cloneNode() : d.createElem(a), !e.canHaveChildren || o.test(a) || e.tagUrn ? e : d.frag.appendChild(e);
  }

  function h(a, c) {
    if (a || (a = b), l) return a.createDocumentFragment();
    c = c || f(a);

    for (var e = c.frag.cloneNode(), g = 0, h = d(), i = h.length; i > g; g++) {
      e.createElement(h[g]);
    }

    return e;
  }

  function i(a, b) {
    b.cache || (b.cache = {}, b.createElem = a.createElement, b.createFrag = a.createDocumentFragment, b.frag = b.createFrag()), a.createElement = function (c) {
      return t.shivMethods ? g(c, a, b) : b.createElem(c);
    }, a.createDocumentFragment = Function("h,f", "return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&(" + d().join().replace(/[\w\-:]+/g, function (a) {
      return b.createElem(a), b.frag.createElement(a), 'c("' + a + '")';
    }) + ");return n}")(t, b.frag);
  }

  function j(a) {
    a || (a = b);
    var d = f(a);
    return !t.shivCSS || k || d.hasCSS || (d.hasCSS = !!c(a, "article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")), l || i(a, d), a;
  }

  var k,
      l,
      m = "3.7.3",
      n = a.html5 || {},
      o = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,
      p = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,
      q = "_html5shiv",
      r = 0,
      s = {};
  !function () {
    try {
      var a = b.createElement("a");
      a.innerHTML = "<xyz></xyz>", k = "hidden" in a, l = 1 == a.childNodes.length || function () {
        b.createElement("a");
        var a = b.createDocumentFragment();
        return "undefined" == typeof a.cloneNode || "undefined" == typeof a.createDocumentFragment || "undefined" == typeof a.createElement;
      }();
    } catch (c) {
      k = !0, l = !0;
    }
  }();
  var t = {
    elements: n.elements || "abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video",
    version: m,
    shivCSS: n.shivCSS !== !1,
    supportsUnknownElements: l,
    shivMethods: n.shivMethods !== !1,
    type: "default",
    shivDocument: j,
    createElement: g,
    createDocumentFragment: h,
    addElements: e
  };
  a.html5 = t, j(b), "object" == (typeof module === "undefined" ? "undefined" : _typeof(module)) && module.exports && (module.exports = t);
}("undefined" != typeof window ? window : void 0, document);
"use strict";

/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
(function () {
  var isIe = /(trident|msie)/i.test(navigator.userAgent);

  if (isIe && document.getElementById && window.addEventListener) {
    window.addEventListener('hashchange', function () {
      var id = location.hash.substring(1),
          element;

      if (!/^[A-z0-9_-]+$/.test(id)) {
        return;
      }

      element = document.getElementById(id);

      if (element) {
        if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
          element.tabIndex = -1;
        }

        element.focus();
      }
    }, false);
  }
})();
"use strict";

/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function () {
  var t,
      e = location.hash.substring(1);
  /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus());
}, !1);
"use strict";

jQuery(function ($) {
  'use strict'; // here for each comment reply link of wordpress

  $('.comment-reply-link').addClass('btn btn-primary'); // here for the submit button of the comment reply form

  $('#commentsubmit').addClass('btn btn-primary'); // The WordPress Default Widgets
  // Now we'll add some classes for the wordpress default widgets - let's go
  // the search widget

  $('.widget_search input.search-field').addClass('form-control');
  $('.widget_search input.search-submit').addClass('btn btn-default');
  $('.variations_form .variations .value > select').addClass('form-control');
  $('.widget_rss ul').addClass('media-list');
  $('.widget_meta ul, .widget_recent_entries ul, .widget_archive ul, .widget_categories ul, .widget_nav_menu ul, .widget_pages ul, .widget_product_categories ul').addClass('nav flex-column');
  $('.widget_meta ul li, .widget_recent_entries ul li, .widget_archive ul li, .widget_categories ul li, .widget_nav_menu ul li, .widget_pages ul li, .widget_product_categories ul li').addClass('nav-item');
  $('.widget_meta ul li a, .widget_recent_entries ul li a, .widget_archive ul li a, .widget_categories ul li a, .widget_nav_menu ul li a, .widget_pages ul li a, .widget_product_categories ul li a').addClass('nav-link');
  $('.widget_recent_comments ul#recentcomments').css('list-style', 'none').css('padding-left', '0');
  $('.widget_recent_comments ul#recentcomments li').css('padding', '5px 15px');
  $('table#wp-calendar').addClass('table table-striped'); // Adding Class to contact form 7 form

  $('.wpcf7-form-control').not(".wpcf7-submit, .wpcf7-acceptance, .wpcf7-file, .wpcf7-radio").addClass('form-control');
  $('.wpcf7-submit').addClass('btn btn-primary'); // Adding Class to Woocommerce form

  $('.woocommerce-Input--text, .woocommerce-Input--email, .woocommerce-Input--password').addClass('form-control');
  $('.woocommerce-Button.button').addClass('btn btn-primary').removeClass('button');
  $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function (event) {
    event.preventDefault();
    event.stopPropagation();
    $(this).parent().siblings().removeClass('open');
    $(this).parent().toggleClass('open');
  }); // Fix woocommerce checkout layout

  $('#customer_details .col-1').addClass('col-12').removeClass('col-1');
  $('#customer_details .col-2').addClass('col-12').removeClass('col-2');
  $('.woocommerce-MyAccount-content .col-1').addClass('col-12').removeClass('col-1');
  $('.woocommerce-MyAccount-content .col-2').addClass('col-12').removeClass('col-2'); // Add Option to add Fullwidth Section

  function fullWidthSection() {
    var screenWidth = $(window).width();

    if ($('.entry-content').length) {
      var leftoffset = $('.entry-content').offset().left;
    } else {
      var leftoffset = 0;
    }

    $('.full-bleed-section').css({
      'position': 'relative',
      'left': '-' + leftoffset + 'px',
      'box-sizing': 'border-box',
      'width': screenWidth
    });
  }

  fullWidthSection();
  $(window).resize(function () {
    fullWidthSection();
  }); // Allow smooth scroll

  $('.page-scroller').on('click', function (e) {
    e.preventDefault();
    var target = this.hash;
    var $target = $(target);
    $('html, body').animate({
      'scrollTop': $target.offset().top
    }, 1000, 'swing');
  });
});
"use strict";

jQuery(function (e) {
  "use strict";

  function t() {
    var t = e(window).width();
    if (e(".entry-content").length) var l = e(".entry-content").offset().left;else l = 0;
    e(".full-bleed-section").css({
      position: "relative",
      left: "-" + l + "px",
      "box-sizing": "border-box",
      width: t
    });
  }

  e(".comment-reply-link").addClass("btn btn-primary"), e("#commentsubmit").addClass("btn btn-primary"), e(".widget_search input.search-field").addClass("form-control"), e(".widget_search input.search-submit").addClass("btn btn-default"), e(".variations_form .variations .value > select").addClass("form-control"), e(".widget_rss ul").addClass("media-list"), e(".widget_meta ul, .widget_recent_entries ul, .widget_archive ul, .widget_categories ul, .widget_nav_menu ul, .widget_pages ul, .widget_product_categories ul").addClass("nav flex-column"), e(".widget_meta ul li, .widget_recent_entries ul li, .widget_archive ul li, .widget_categories ul li, .widget_nav_menu ul li, .widget_pages ul li, .widget_product_categories ul li").addClass("nav-item"), e(".widget_meta ul li a, .widget_recent_entries ul li a, .widget_archive ul li a, .widget_categories ul li a, .widget_nav_menu ul li a, .widget_pages ul li a, .widget_product_categories ul li a").addClass("nav-link"), e(".widget_recent_comments ul#recentcomments").css("list-style", "none").css("padding-left", "0"), e(".widget_recent_comments ul#recentcomments li").css("padding", "5px 15px"), e("table#wp-calendar").addClass("table table-striped"), e(".wpcf7-form-control").not(".wpcf7-submit, .wpcf7-acceptance, .wpcf7-file, .wpcf7-radio").addClass("form-control"), e(".wpcf7-submit").addClass("btn btn-primary"), e(".woocommerce-Input--text, .woocommerce-Input--email, .woocommerce-Input--password").addClass("form-control"), e(".woocommerce-Button.button").addClass("btn btn-primary mt-2").removeClass("button"), e("ul.dropdown-menu [data-toggle=dropdown]").on("click", function (t) {
    t.preventDefault(), t.stopPropagation(), e(this).parent().siblings().removeClass("open"), e(this).parent().toggleClass("open");
  }), e("#customer_details .col-1").addClass("col-12").removeClass("col-1"), e("#customer_details .col-2").addClass("col-12").removeClass("col-2"), e(".woocommerce-MyAccount-content .col-1").addClass("col-12").removeClass("col-1"), e(".woocommerce-MyAccount-content .col-2").addClass("col-12").removeClass("col-2"), t(), e(window).resize(function () {
    t();
  }), e(".page-scroller").on("click", function (t) {
    t.preventDefault();
    var l = this.hash,
        o = e(l);
    e("html, body").animate({
      scrollTop: o.offset().top
    }, 1e3, "swing");
  });
});