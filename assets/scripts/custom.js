"use strict";
"use strict";
/*!
 * Essential javascript functions/variables
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0.0
 *
 */

/*==================================================================================
  General Variables & Presets
==================================================================================*/

/* Viewport Width
/––––––––––––––––––––––––*/

var $vpWidth = jQuery(window).width();
/* Touch Device
/––––––––––––––––––––––––*/

var $root = $('html');
var isTouch = ('ontouchstart' in document.documentElement);

if (isTouch) {
  $root.attr('data-touch', 'true');
} else {
  $root.attr('data-touch', 'false');
}
/* Debouncer
/––––––––––––––––––––––––*/
// prevents functions to execute to often/fast
// Usage:
// var myfunction = debounce(function() {
//   // function stuff
// }, 250);
// window.addEventListener('resize', myfunction);


function debounce(func, wait, immediate) {
  var timeout;
  return function () {
    var context = this,
        args = arguments;

    var later = function later() {
      timeout = null;

      if (!immediate) {
        func.apply(context, args);
      }
    };

    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);

    if (callNow) {
      func.apply(context, args);
    }
  };
}

"use strict";
/*!
 * All sorts javascript/jQuery functions
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0.0
 *
 */

/*==================================================================================
  Functions
==================================================================================*/


$(function () {
  /* Global Settings
  /––––––––––––––––––––––––*/
  // custom vars that need to be global
  // get current language
  var active_lang = $('html').attr('data-lang');
  /* Hamburger switch
   /––––––––––––––––––––––––*/

  $(function () {
    $(document).on('click', '#hamburger', function (event) {
      // show overlay
      $('#menu_main').toggleClass('hidden_mobile'); // switch icon

      $('#hamburger').toggleClass('is-active'); // prevent content scrolling

      $('html').toggleClass('noscroll');
    });
  });
  /* WOW
   /––––––––––––––––––––––––*/
  // http://mynameismatthieu.com/WOW/

  $(function () {
    new WOW().init();
  });
  /* Modernizr Fix: 'object-fit'
   /––––––––––––––––––––––––––––––––*/
  // displays images with the object-fit attribute as background-images for older browsers

  $(function () {
    if (!Modernizr.objectfit) {
      $('img.mdrnz-of').each(function () {
        // Check if image has attribute 'object-fit'
        var $img = $(this);
        imgUrl = $img.prop('src');
        classes = $img.attr('class');

        if (imgUrl) {
          // Replace img with a div containing the image as background-image and get background-image value from object-fit
          $img.replaceWith('<div class="' + classes + '" style="background-image:url(' + imgUrl + ')');
        }
      });
    }
  });
  /* Smooth Anchor Scrolling
   /––––––––––––––––––––––––*/
  // https://css-tricks.com/snippets/jquery/smooth-scrolling/
  // Select all links with hashes

  $('a[href*="#"]') // Remove links that don't actually link to anything
  .not('[href="#"]').not('[href="#0"]').click(function (event) {
    // define custom offset (examples: 50 or -200 or (".anchor").height();)
    var custom_offset = 0; // On-page links

    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']'); // Does a scroll target exist?

      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top + custom_offset
        }, 500, function () {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();

          if ($target.is(':focus')) {
            // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable

            $target.focus(); // Set focus again
          }
        });
      }
    }
  }); // Stats
  // Remove svg.radial-progress .complete inline styling

  $('svg.radial-progress').each(function (index, value) {
    $(this).find($('circle.complete')).removeAttr('style');
  }); // Activate progress animation on scroll

  $(window).scroll(function () {
    $('svg.radial-progress').each(function (index, value) {
      // If svg.radial-progress is approximately 25% vertically into the window when scrolling from the top or the bottom
      if ($(window).scrollTop() > $(this).offset().top - $(window).height() * 0.75 && $(window).scrollTop() < $(this).offset().top + $(this).height() - $(window).height() * 0.25) {
        // Get percentage of progress
        percent = $(value).data('percentage'); // Get radius of the svg's circle.complete

        radius = $(this).find($('circle.complete')).attr('r'); // Get circumference (2πr)

        circumference = 2 * Math.PI * radius; // Get stroke-dashoffset value based on the percentage of the circumference

        strokeDashOffset = circumference - percent * circumference / 100; // Transition progress for 1.25 seconds

        $(this).find($('circle.complete')).animate({
          'stroke-dashoffset': strokeDashOffset
        }, 1250);
      }
    });
  }).trigger('scroll');
});
"use strict";

function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function _typeof(obj) {
      return typeof obj;
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}
/*! modernizr 3.5.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-objectfit-setclasses !*/


!function (e, n, t) {
  function r(e, n) {
    return _typeof(e) === n;
  }

  function o() {
    var e, n, t, o, i, s, a;

    for (var l in h) {
      if (h.hasOwnProperty(l)) {
        if (e = [], n = h[l], n.name && (e.push(n.name.toLowerCase()), n.options && n.options.aliases && n.options.aliases.length)) for (t = 0; t < n.options.aliases.length; t++) {
          e.push(n.options.aliases[t].toLowerCase());
        }

        for (o = r(n.fn, "function") ? n.fn() : n.fn, i = 0; i < e.length; i++) {
          s = e[i], a = s.split("."), 1 === a.length ? Modernizr[a[0]] = o : (!Modernizr[a[0]] || Modernizr[a[0]] instanceof Boolean || (Modernizr[a[0]] = new Boolean(Modernizr[a[0]])), Modernizr[a[0]][a[1]] = o), S.push((o ? "" : "no-") + a.join("-"));
        }
      }
    }
  }

  function i(e) {
    var n = _.className,
        t = Modernizr._config.classPrefix || "";

    if (w && (n = n.baseVal), Modernizr._config.enableJSClass) {
      var r = new RegExp("(^|\\s)" + t + "no-js(\\s|$)");
      n = n.replace(r, "$1" + t + "js$2");
    }

    Modernizr._config.enableClasses && (n += " " + t + e.join(" " + t), w ? _.className.baseVal = n : _.className = n);
  }

  function s(e, n) {
    return !!~("" + e).indexOf(n);
  }

  function a() {
    return "function" != typeof n.createElement ? n.createElement(arguments[0]) : w ? n.createElementNS.call(n, "http://www.w3.org/2000/svg", arguments[0]) : n.createElement.apply(n, arguments);
  }

  function l() {
    var e = n.body;
    return e || (e = a(w ? "svg" : "body"), e.fake = !0), e;
  }

  function f(e, t, r, o) {
    var i,
        s,
        f,
        u,
        p = "modernizr",
        c = a("div"),
        d = l();
    if (parseInt(r, 10)) for (; r--;) {
      f = a("div"), f.id = o ? o[r] : p + (r + 1), c.appendChild(f);
    }
    return i = a("style"), i.type = "text/css", i.id = "s" + p, (d.fake ? d : c).appendChild(i), d.appendChild(c), i.styleSheet ? i.styleSheet.cssText = e : i.appendChild(n.createTextNode(e)), c.id = p, d.fake && (d.style.background = "", d.style.overflow = "hidden", u = _.style.overflow, _.style.overflow = "hidden", _.appendChild(d)), s = t(c, e), d.fake ? (d.parentNode.removeChild(d), _.style.overflow = u, _.offsetHeight) : c.parentNode.removeChild(c), !!s;
  }

  function u(e) {
    return e.replace(/([A-Z])/g, function (e, n) {
      return "-" + n.toLowerCase();
    }).replace(/^ms-/, "-ms-");
  }

  function p(n, t, r) {
    var o;

    if ("getComputedStyle" in e) {
      o = getComputedStyle.call(e, n, t);
      var i = e.console;
      if (null !== o) r && (o = o.getPropertyValue(r));else if (i) {
        var s = i.error ? "error" : "log";
        i[s].call(i, "getComputedStyle returning null, its possible modernizr test results are inaccurate");
      }
    } else o = !t && n.currentStyle && n.currentStyle[r];

    return o;
  }

  function c(n, r) {
    var o = n.length;

    if ("CSS" in e && "supports" in e.CSS) {
      for (; o--;) {
        if (e.CSS.supports(u(n[o]), r)) return !0;
      }

      return !1;
    }

    if ("CSSSupportsRule" in e) {
      for (var i = []; o--;) {
        i.push("(" + u(n[o]) + ":" + r + ")");
      }

      return i = i.join(" or "), f("@supports (" + i + ") { #modernizr { position: absolute; } }", function (e) {
        return "absolute" == p(e, null, "position");
      });
    }

    return t;
  }

  function d(e) {
    return e.replace(/([a-z])-([a-z])/g, function (e, n, t) {
      return n + t.toUpperCase();
    }).replace(/^-/, "");
  }

  function m(e, n, o, i) {
    function l() {
      u && (delete j.style, delete j.modElem);
    }

    if (i = r(i, "undefined") ? !1 : i, !r(o, "undefined")) {
      var f = c(e, o);
      if (!r(f, "undefined")) return f;
    }

    for (var u, p, m, v, y, g = ["modernizr", "tspan", "samp"]; !j.style && g.length;) {
      u = !0, j.modElem = a(g.shift()), j.style = j.modElem.style;
    }

    for (m = e.length, p = 0; m > p; p++) {
      if (v = e[p], y = j.style[v], s(v, "-") && (v = d(v)), j.style[v] !== t) {
        if (i || r(o, "undefined")) return l(), "pfx" == n ? v : !0;

        try {
          j.style[v] = o;
        } catch (h) {}

        if (j.style[v] != y) return l(), "pfx" == n ? v : !0;
      }
    }

    return l(), !1;
  }

  function v(e, n) {
    return function () {
      return e.apply(n, arguments);
    };
  }

  function y(e, n, t) {
    var o;

    for (var i in e) {
      if (e[i] in n) return t === !1 ? e[i] : (o = n[e[i]], r(o, "function") ? v(o, t || n) : o);
    }

    return !1;
  }

  function g(e, n, t, o, i) {
    var s = e.charAt(0).toUpperCase() + e.slice(1),
        a = (e + " " + b.join(s + " ") + s).split(" ");
    return r(n, "string") || r(n, "undefined") ? m(a, n, o, i) : (a = (e + " " + z.join(s + " ") + s).split(" "), y(a, n, t));
  }

  var h = [],
      C = {
    _version: "3.5.0",
    _config: {
      classPrefix: "",
      enableClasses: !0,
      enableJSClass: !0,
      usePrefixes: !0
    },
    _q: [],
    on: function on(e, n) {
      var t = this;
      setTimeout(function () {
        n(t[e]);
      }, 0);
    },
    addTest: function addTest(e, n, t) {
      h.push({
        name: e,
        fn: n,
        options: t
      });
    },
    addAsyncTest: function addAsyncTest(e) {
      h.push({
        name: null,
        fn: e
      });
    }
  },
      Modernizr = function Modernizr() {};

  Modernizr.prototype = C, Modernizr = new Modernizr();

  var S = [],
      _ = n.documentElement,
      w = "svg" === _.nodeName.toLowerCase(),
      x = "Moz O ms Webkit",
      b = C._config.usePrefixes ? x.split(" ") : [];

  C._cssomPrefixes = b;
  var E = {
    elem: a("modernizr")
  };

  Modernizr._q.push(function () {
    delete E.elem;
  });

  var j = {
    style: E.elem.style
  };

  Modernizr._q.unshift(function () {
    delete j.style;
  });

  var z = C._config.usePrefixes ? x.toLowerCase().split(" ") : [];
  C._domPrefixes = z, C.testAllProps = g;

  var P = function P(n) {
    var r,
        o = prefixes.length,
        i = e.CSSRule;
    if ("undefined" == typeof i) return t;
    if (!n) return !1;
    if (n = n.replace(/^@/, ""), r = n.replace(/-/g, "_").toUpperCase() + "_RULE", r in i) return "@" + n;

    for (var s = 0; o > s; s++) {
      var a = prefixes[s],
          l = a.toUpperCase() + "_" + r;
      if (l in i) return "@-" + a.toLowerCase() + "-" + n;
    }

    return !1;
  };

  C.atRule = P;

  var N = C.prefixed = function (e, n, t) {
    return 0 === e.indexOf("@") ? P(e) : (-1 != e.indexOf("-") && (e = d(e)), n ? g(e, n, t) : g(e, "pfx"));
  };

  Modernizr.addTest("objectfit", !!N("objectFit"), {
    aliases: ["object-fit"]
  }), o(), i(S), delete C.addTest, delete C.addAsyncTest;

  for (var T = 0; T < Modernizr._q.length; T++) {
    Modernizr._q[T]();
  }

  e.Modernizr = Modernizr;
}(window, document);
"use strict";

/* eslint-disable no-undef */

/* eslint-disable no-unused-vars */

/*!
 * Essential javascript functions/variables
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0.0
 *
 */

/*==================================================================================
  General Variables & Presets
==================================================================================*/

/* Viewport Width
/––––––––––––––––––––––––*/
var $vpWidth = jQuery(window).width();
/* Touch Device
/––––––––––––––––––––––––*/

var $root = $('html');
var isTouch = ('ontouchstart' in document.documentElement);

if (isTouch) {
  $root.attr('data-touch', 'true');
} else {
  $root.attr('data-touch', 'false');
}
/* Debouncer
/––––––––––––––––––––––––*/
// prevents functions to execute to often/fast
// Usage:
// var myfunction = debounce(function() {
//   // function stuff
// }, 250);
// window.addEventListener('resize', myfunction);


function debouncer(func, wait, immediate) {
  var timeout;
  return function () {
    var context = this,
        args = arguments;

    var later = function later() {
      timeout = null;

      if (!immediate) {
        func.apply(context, args);
      }
    };

    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);

    if (callNow) {
      func.apply(context, args);
    }
  };
}
"use strict";

/* eslint-disable no-undef */

/* eslint-disable vars-on-top */

/*!
 * All sorts javascript/jQuery functions
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0.0
 *
 */

/*==================================================================================
  Functions
==================================================================================*/
$(function () {
  /* Global Settings
  /––––––––––––––––––––––––*/
  // custom vars that need to be global
  // get current language
  // eslint-disable-next-line no-unused-vars
  var activeLang = $('html').attr('data-lang');
  /* Hamburger switch
   /––––––––––––––––––––––––*/

  $(function () {
    $(document).on('click', '#hamburger', function () {
      // show overlay
      $('#menu_main').toggleClass('hidden_mobile'); // switch icon

      $('#hamburger').toggleClass('is-active'); // prevent content scrolling

      $('html').toggleClass('noscroll');
    });
  });
  /* WOW
   /––––––––––––––––––––––––*/
  // http://mynameismatthieu.com/WOW/

  $(function () {
    new WOW().init();
  });
  /* Modernizr Fix: 'object-fit'
   /––––––––––––––––––––––––––––––––*/
  // displays images with the object-fit attribute as background-images for older browsers

  $(function () {
    if (!Modernizr.objectfit) {
      $('img.mdrnz-of').each(function () {
        // Check if image has attribute 'object-fit'
        var $img = $(this);
        imgUrl = $img.prop('src');
        classes = $img.attr('class');

        if (imgUrl) {
          // Replace img with a div containing the image as background-image and get background-image value from object-fit
          $img.replaceWith('<div class="' + classes + '" style="background-image:url(' + imgUrl + ')');
        }
      });
    }
  });
  /* Smooth Anchor Scrolling
   /––––––––––––––––––––––––*/
  // https://css-tricks.com/snippets/jquery/smooth-scrolling/
  // Select all links with hashes

  $('a[href*="#"]') // Remove links that don't actually link to anything
  .not('[href="#"]').not('[href="#0"]').click(function (event) {
    // define custom offset (examples: 50 or -200 or (".anchor").height();)
    var customOffset = 0; // On-page links

    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']'); // Does a scroll target exist?

      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top + customOffset
        }, 500, function () {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();

          if ($target.is(':focus')) {
            // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable

            $target.focus(); // Set focus again
          }
        });
      }
    }
  }); // Stats
  // Remove svg.radial-progress .complete inline styling

  $('svg.radial-progress').each(function () {
    $(this).find($('circle.complete')).removeAttr('style');
  }); // Activate progress animation on scroll

  $(window).scroll(function () {
    $('svg.radial-progress').each(function (index, value) {
      // If svg.radial-progress is approximately 25% vertically into the window when scrolling from the top or the bottom
      if ($(window).scrollTop() > $(this).offset().top - $(window).height() * 0.75 && $(window).scrollTop() < $(this).offset().top + $(this).height() - $(window).height() * 0.25) {
        // Get percentage of progress
        percent = $(value).data('percentage'); // Get radius of the svg's circle.complete

        radius = $(this).find($('circle.complete')).attr('r'); // Get circumference (2πr)

        circumference = 2 * Math.PI * radius; // Get stroke-dashoffset value based on the percentage of the circumference

        strokeDashOffset = circumference - percent * circumference / 100; // Transition progress for 1.25 seconds

        $(this).find($('circle.complete')).animate({
          'stroke-dashoffset': strokeDashOffset
        }, 1250);
      }
    });
  }).trigger('scroll');
});
"use strict";

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/* eslint-disable no-undef */

/* eslint-disable no-empty */

/* eslint-disable no-prototype-builtins */

/* eslint-disable vars-on-top */

/*! modernizr 3.5.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-objectfit-setclasses !*/
!function (e, n, t) {
  function r(e, n) {
    return _typeof(e) === n;
  }

  function o() {
    var e, n, t, o, i, s, a;

    for (var l in h) {
      if (h.hasOwnProperty(l)) {
        if (e = [], n = h[l], n.name && (e.push(n.name.toLowerCase()), n.options && n.options.aliases && n.options.aliases.length)) {
          for (t = 0; t < n.options.aliases.length; t++) {
            e.push(n.options.aliases[t].toLowerCase());
          }
        }

        for (o = r(n.fn, 'function') ? n.fn() : n.fn, i = 0; i < e.length; i++) {
          s = e[i], a = s.split('.'), 1 === a.length ? Modernizr[a[0]] = o : (!Modernizr[a[0]] || Modernizr[a[0]] instanceof Boolean || (Modernizr[a[0]] = new Boolean(Modernizr[a[0]])), Modernizr[a[0]][a[1]] = o), S.push((o ? '' : 'no-') + a.join('-'));
        }
      }
    }
  }

  function i(e) {
    var n = _.className,
        t = Modernizr._config.classPrefix || '';

    if (w && (n = n.baseVal), Modernizr._config.enableJSClass) {
      var r = new RegExp('(^|\\s)' + t + 'no-js(\\s|$)');
      n = n.replace(r, '$1' + t + 'js$2');
    }

    Modernizr._config.enableClasses && (n += ' ' + t + e.join(' ' + t), w ? _.className.baseVal = n : _.className = n);
  }

  function s(e, n) {
    return !!~('' + e).indexOf(n);
  }

  function a() {
    return 'function' != typeof n.createElement ? n.createElement(arguments[0]) : w ? n.createElementNS.call(n, 'http://www.w3.org/2000/svg', arguments[0]) : n.createElement.apply(n, arguments);
  }

  function l() {
    var e = n.body;
    return e || (e = a(w ? 'svg' : 'body'), e.fake = !0), e;
  }

  function f(e, t, r, o) {
    var i,
        s,
        f,
        u,
        p = 'modernizr',
        c = a('div'),
        d = l();

    if (parseInt(r, 10)) {
      for (; r--;) {
        f = a('div'), f.id = o ? o[r] : p + (r + 1), c.appendChild(f);
      }
    }

    return i = a('style'), i.type = 'text/css', i.id = 's' + p, (d.fake ? d : c).appendChild(i), d.appendChild(c), i.styleSheet ? i.styleSheet.cssText = e : i.appendChild(n.createTextNode(e)), c.id = p, d.fake && (d.style.background = '', d.style.overflow = 'hidden', u = _.style.overflow, _.style.overflow = 'hidden', _.appendChild(d)), s = t(c, e), d.fake ? (d.parentNode.removeChild(d), _.style.overflow = u, _.offsetHeight) : c.parentNode.removeChild(c), !!s;
  }

  function u(e) {
    return e.replace(/([A-Z])/g, function (e, n) {
      return '-' + n.toLowerCase();
    }).replace(/^ms-/, '-ms-');
  }

  function p(n, t, r) {
    var o;

    if ('getComputedStyle' in e) {
      o = getComputedStyle.call(e, n, t);
      var i = e.console;

      if (null !== o) {
        r && (o = o.getPropertyValue(r));
      } else if (i) {
        var s = i.error ? 'error' : 'log';
        i[s].call(i, 'getComputedStyle returning null, its possible modernizr test results are inaccurate');
      }
    } else {
      o = !t && n.currentStyle && n.currentStyle[r];
    }

    return o;
  }

  function c(n, r) {
    var o = n.length;

    if ('CSS' in e && 'supports' in e.CSS) {
      for (; o--;) {
        if (e.CSS.supports(u(n[o]), r)) {
          return !0;
        }
      }

      return !1;
    }

    if ('CSSSupportsRule' in e) {
      for (var i = []; o--;) {
        i.push('(' + u(n[o]) + ':' + r + ')');
      }

      return i = i.join(' or '), f('@supports (' + i + ') { #modernizr { position: absolute; } }', function (e) {
        return 'absolute' == p(e, null, 'position');
      });
    }

    return t;
  }

  function d(e) {
    return e.replace(/([a-z])-([a-z])/g, function (e, n, t) {
      return n + t.toUpperCase();
    }).replace(/^-/, '');
  }

  function m(e, n, o, i) {
    function l() {
      u && (delete j.style, delete j.modElem);
    }

    if (i = r(i, 'undefined') ? !1 : i, !r(o, 'undefined')) {
      var f = c(e, o);

      if (!r(f, 'undefined')) {
        return f;
      }
    }

    for (var u, p, m, v, y, g = ['modernizr', 'tspan', 'samp']; !j.style && g.length;) {
      u = !0, j.modElem = a(g.shift()), j.style = j.modElem.style;
    }

    for (m = e.length, p = 0; m > p; p++) {
      if (v = e[p], y = j.style[v], s(v, '-') && (v = d(v)), j.style[v] !== t) {
        if (i || r(o, 'undefined')) {
          return l(), 'pfx' == n ? v : !0;
        }

        try {
          j.style[v] = o;
        } catch (h) {}

        if (j.style[v] != y) {
          return l(), 'pfx' == n ? v : !0;
        }
      }
    }

    return l(), !1;
  }

  function v(e, n) {
    return function () {
      return e.apply(n, arguments);
    };
  }

  function y(e, n, t) {
    var o;

    for (var i in e) {
      if (e[i] in n) {
        return t === !1 ? e[i] : (o = n[e[i]], r(o, 'function') ? v(o, t || n) : o);
      }
    }

    return !1;
  }

  function g(e, n, t, o, i) {
    var s = e.charAt(0).toUpperCase() + e.slice(1),
        a = (e + ' ' + b.join(s + ' ') + s).split(' ');
    return r(n, 'string') || r(n, 'undefined') ? m(a, n, o, i) : (a = (e + ' ' + z.join(s + ' ') + s).split(' '), y(a, n, t));
  }

  var h = [],
      C = {
    _version: '3.5.0',
    _config: {
      classPrefix: '',
      enableClasses: !0,
      enableJSClass: !0,
      usePrefixes: !0
    },
    _q: [],
    on: function on(e, n) {
      var t = this;
      setTimeout(function () {
        n(t[e]);
      }, 0);
    },
    addTest: function addTest(e, n, t) {
      h.push({
        name: e,
        fn: n,
        options: t
      });
    },
    addAsyncTest: function addAsyncTest(e) {
      h.push({
        name: null,
        fn: e
      });
    }
  },
      Modernizr = function Modernizr() {};

  Modernizr.prototype = C, Modernizr = new Modernizr();

  var S = [],
      _ = n.documentElement,
      w = 'svg' === _.nodeName.toLowerCase(),
      x = 'Moz O ms Webkit',
      b = C._config.usePrefixes ? x.split(' ') : [];

  C._cssomPrefixes = b;
  var E = {
    elem: a('modernizr')
  };

  Modernizr._q.push(function () {
    delete E.elem;
  });

  var j = {
    style: E.elem.style
  };

  Modernizr._q.unshift(function () {
    delete j.style;
  });

  var z = C._config.usePrefixes ? x.toLowerCase().split(' ') : [];
  C._domPrefixes = z, C.testAllProps = g;

  var P = function P(n) {
    var r,
        o = prefixes.length,
        i = e.CSSRule;

    if ('undefined' == typeof i) {
      return t;
    }

    if (!n) {
      return !1;
    }

    if (n = n.replace(/^@/, ''), r = n.replace(/-/g, '_').toUpperCase() + '_RULE', r in i) {
      return '@' + n;
    }

    for (var s = 0; o > s; s++) {
      var a = prefixes[s],
          l = a.toUpperCase() + '_' + r;

      if (l in i) {
        return '@-' + a.toLowerCase() + '-' + n;
      }
    }

    return !1;
  };

  C.atRule = P;

  var N = C.prefixed = function (e, n, t) {
    return 0 === e.indexOf('@') ? P(e) : (-1 != e.indexOf('-') && (e = d(e)), n ? g(e, n, t) : g(e, 'pfx'));
  };

  Modernizr.addTest('objectfit', !!N('objectFit'), {
    aliases: ['object-fit']
  }), o(), i(S), delete C.addTest, delete C.addAsyncTest;

  for (var T = 0; T < Modernizr._q.length; T++) {
    Modernizr._q[T]();
  }

  e.Modernizr = Modernizr;
}(window, document);
"use strict";

function _typeof2(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof2 = function _typeof2(obj) { return typeof obj; }; } else { _typeof2 = function _typeof2(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof2(obj); }

var $vpWidth = jQuery(window).width(),
    $root = $("html"),
    isTouch = ("ontouchstart" in document.documentElement);

function debounce(r, o, i) {
  var s;
  return function () {
    var e = this,
        t = arguments,
        n = i && !s;
    clearTimeout(s), s = setTimeout(function () {
      s = null, i || r.apply(e, t);
    }, o), n && r.apply(e, t);
  };
}

function _typeof(e) {
  return (_typeof = "function" == typeof Symbol && "symbol" == _typeof2(Symbol.iterator) ? function (e) {
    return _typeof2(e);
  } : function (e) {
    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : _typeof2(e);
  })(e);
}

isTouch ? $root.attr("data-touch", "true") : $root.attr("data-touch", "false"), $(function () {
  $("html").attr("data-lang");
  $(function () {
    $(document).on("click", "#hamburger", function (e) {
      $("#menu_main").toggleClass("hidden_mobile"), $("#hamburger").toggleClass("is-active"), $("html").toggleClass("noscroll");
    });
  }), $(function () {
    new WOW().init();
  }), $(function () {
    Modernizr.objectfit || $("img.mdrnz-of").each(function () {
      var e = $(this);
      imgUrl = e.prop("src"), classes = e.attr("class"), imgUrl && e.replaceWith('<div class="' + classes + '" style="background-image:url(' + imgUrl + ")");
    });
  }), $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function (e) {
    if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
      var t = $(this.hash);
      (t = t.length ? t : $("[name=" + this.hash.slice(1) + "]")).length && (e.preventDefault(), $("html, body").animate({
        scrollTop: t.offset().top + 0
      }, 500, function () {
        var e = $(t);
        if (e.focus(), e.is(":focus")) return !1;
        e.attr("tabindex", "-1"), e.focus();
      }));
    }
  }), $("svg.radial-progress").each(function (e, t) {
    $(this).find($("circle.complete")).removeAttr("style");
  }), $(window).scroll(function () {
    $("svg.radial-progress").each(function (e, t) {
      $(window).scrollTop() > $(this).offset().top - .75 * $(window).height() && $(window).scrollTop() < $(this).offset().top + $(this).height() - .25 * $(window).height() && (percent = $(t).data("percentage"), radius = $(this).find($("circle.complete")).attr("r"), circumference = 2 * Math.PI * radius, strokeDashOffset = circumference - percent * circumference / 100, $(this).find($("circle.complete")).animate({
        "stroke-dashoffset": strokeDashOffset
      }, 1250));
    });
  }).trigger("scroll");
}), function (s, p, d) {
  function h(e, t) {
    return _typeof(e) === t;
  }

  function m() {
    return "function" != typeof p.createElement ? p.createElement(arguments[0]) : $ ? p.createElementNS.call(p, "http://www.w3.org/2000/svg", arguments[0]) : p.createElement.apply(p, arguments);
  }

  function o(e, t, n, r) {
    var o,
        i,
        s,
        a,
        l,
        f = "modernizr",
        c = m("div"),
        u = ((l = p.body) || ((l = m($ ? "svg" : "body")).fake = !0), l);
    if (parseInt(n, 10)) for (; n--;) {
      (s = m("div")).id = r ? r[n] : f + (n + 1), c.appendChild(s);
    }
    return (o = m("style")).type = "text/css", o.id = "s" + f, (u.fake ? u : c).appendChild(o), u.appendChild(c), o.styleSheet ? o.styleSheet.cssText = e : o.appendChild(p.createTextNode(e)), c.id = f, u.fake && (u.style.background = "", u.style.overflow = "hidden", a = v.style.overflow, v.style.overflow = "hidden", v.appendChild(u)), i = t(c, e), u.fake ? (u.parentNode.removeChild(u), v.style.overflow = a, v.offsetHeight) : c.parentNode.removeChild(c), !!i;
  }

  function i(e) {
    return e.replace(/([A-Z])/g, function (e, t) {
      return "-" + t.toLowerCase();
    }).replace(/^ms-/, "-ms-");
  }

  function g(e, t) {
    var n = e.length;

    if ("CSS" in s && "supports" in s.CSS) {
      for (; n--;) {
        if (s.CSS.supports(i(e[n]), t)) return !0;
      }

      return !1;
    }

    if ("CSSSupportsRule" in s) {
      for (var r = []; n--;) {
        r.push("(" + i(e[n]) + ":" + t + ")");
      }

      return o("@supports (" + (r = r.join(" or ")) + ") { #modernizr { position: absolute; } }", function (e) {
        return "absolute" == function (e, t, n) {
          var r;

          if ("getComputedStyle" in s) {
            r = getComputedStyle.call(s, e, t);
            var o = s.console;
            null !== r ? n && (r = r.getPropertyValue(n)) : o && o[o.error ? "error" : "log"].call(o, "getComputedStyle returning null, its possible modernizr test results are inaccurate");
          } else r = !t && e.currentStyle && e.currentStyle[n];

          return r;
        }(e, null, "position");
      });
    }

    return d;
  }

  function y(e) {
    return e.replace(/([a-z])-([a-z])/g, function (e, t, n) {
      return t + n.toUpperCase();
    }).replace(/^-/, "");
  }

  function a(e, t) {
    return function () {
      return e.apply(t, arguments);
    };
  }

  function r(e, t, n, r, o) {
    var i = e.charAt(0).toUpperCase() + e.slice(1),
        s = (e + " " + u.join(i + " ") + i).split(" ");
    return h(t, "string") || h(t, "undefined") ? function (e, t, n, r) {
      function o() {
        s && (delete w.style, delete w.modElem);
      }

      if (r = !h(r, "undefined") && r, !h(n, "undefined")) {
        var i = g(e, n);
        if (!h(i, "undefined")) return i;
      }

      for (var s, a, l, f, c, u = ["modernizr", "tspan", "samp"]; !w.style && u.length;) {
        s = !0, w.modElem = m(u.shift()), w.style = w.modElem.style;
      }

      for (l = e.length, a = 0; a < l; a++) {
        if (f = e[a], c = w.style[f], !!~("" + f).indexOf("-") && (f = y(f)), w.style[f] !== d) {
          if (r || h(n, "undefined")) return o(), "pfx" != t || f;

          try {
            w.style[f] = n;
          } catch (e) {}

          if (w.style[f] != c) return o(), "pfx" != t || f;
        }
      }

      return o(), !1;
    }(s, t, r, o) : function (e, t, n) {
      var r;

      for (var o in e) {
        if (e[o] in t) return !1 === n ? e[o] : h(r = t[e[o]], "function") ? a(r, n || t) : r;
      }

      return !1;
    }(s = (e + " " + C.join(i + " ") + i).split(" "), t, n);
  }

  var l = [],
      e = {
    _version: "3.5.0",
    _config: {
      classPrefix: "",
      enableClasses: !0,
      enableJSClass: !0,
      usePrefixes: !0
    },
    _q: [],
    on: function on(e, t) {
      var n = this;
      setTimeout(function () {
        t(n[e]);
      }, 0);
    },
    addTest: function addTest(e, t, n) {
      l.push({
        name: e,
        fn: t,
        options: n
      });
    },
    addAsyncTest: function addAsyncTest(e) {
      l.push({
        name: null,
        fn: e
      });
    }
  },
      f = function f() {};

  f.prototype = e, f = new f();
  var c = [],
      v = p.documentElement,
      $ = "svg" === v.nodeName.toLowerCase(),
      t = "Moz O ms Webkit",
      u = e._config.usePrefixes ? t.split(" ") : [];
  e._cssomPrefixes = u;
  var n = {
    elem: m("modernizr")
  };

  f._q.push(function () {
    delete n.elem;
  });

  var w = {
    style: n.elem.style
  };

  f._q.unshift(function () {
    delete w.style;
  });

  var C = e._config.usePrefixes ? t.toLowerCase().split(" ") : [];
  e._domPrefixes = C, e.testAllProps = r;

  var b = function b(e) {
    var t,
        n = prefixes.length,
        r = s.CSSRule;
    if (void 0 === r) return d;
    if (!e) return !1;
    if ((t = (e = e.replace(/^@/, "")).replace(/-/g, "_").toUpperCase() + "_RULE") in r) return "@" + e;

    for (var o = 0; o < n; o++) {
      var i = prefixes[o];
      if (i.toUpperCase() + "_" + t in r) return "@-" + i.toLowerCase() + "-" + e;
    }

    return !1;
  };

  e.atRule = b;

  var S = e.prefixed = function (e, t, n) {
    return 0 === e.indexOf("@") ? b(e) : (-1 != e.indexOf("-") && (e = y(e)), t ? r(e, t, n) : r(e, "pfx"));
  };

  f.addTest("objectfit", !!S("objectFit"), {
    aliases: ["object-fit"]
  }), function () {
    var e, t, n, r, o, i;

    for (var s in l) {
      if (l.hasOwnProperty(s)) {
        if (e = [], (t = l[s]).name && (e.push(t.name.toLowerCase()), t.options && t.options.aliases && t.options.aliases.length)) for (n = 0; n < t.options.aliases.length; n++) {
          e.push(t.options.aliases[n].toLowerCase());
        }

        for (r = h(t.fn, "function") ? t.fn() : t.fn, o = 0; o < e.length; o++) {
          1 === (i = e[o].split(".")).length ? f[i[0]] = r : (!f[i[0]] || f[i[0]] instanceof Boolean || (f[i[0]] = new Boolean(f[i[0]])), f[i[0]][i[1]] = r), c.push((r ? "" : "no-") + i.join("-"));
        }
      }
    }
  }(), function (e) {
    var t = v.className,
        n = f._config.classPrefix || "";

    if ($ && (t = t.baseVal), f._config.enableJSClass) {
      var r = new RegExp("(^|\\s)" + n + "no-js(\\s|$)");
      t = t.replace(r, "$1" + n + "js$2");
    }

    f._config.enableClasses && (t += " " + n + e.join(" " + n), $ ? v.className.baseVal = t : v.className = t);
  }(c), delete e.addTest, delete e.addAsyncTest;

  for (var _ = 0; _ < f._q.length; _++) {
    f._q[_]();
  }

  s.Modernizr = f;
}(window, document);