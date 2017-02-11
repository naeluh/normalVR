window["WIDGETKIT_URL"] = "http://www.reserverungolf.com/media/widgetkit";

function wk_ajax_render_url(widgetid) {
    return "/component/widgetkit/?format=raw&id=" + widgetid
}
(function (f, e) {
    var a = {}, d = f(window);
    e.$widgetkit = {
        version: "1.4.6",
        lazyloaders: {},
        load: function (b) {
            a[b] || (a[b] = f.ajax({
                dataType: "script",
                cache: !0,
                url: b + "?wkv=" + this.version
            }));
            return a[b]
        },
        lazyload: function (a) {
            a = a || document;
            f("[data-widgetkit]", a).each(function () {
                var a = f(this),
                    b = a.data("widgetkit"),
                    d = a.data("options") || {};
                !a.data("wk-loaded") && $widgetkit.lazyloaders[b] && ($widgetkit.lazyloaders[b](a, d), a.data("wk-loaded", !0))
            })
        }
    };
    f(function () {
        $widgetkit.lazyload()
    });
    d.on("load", function () {
        d.resize()
    });
    for (var b = document.createElement("div"), c = b.style, b = !1, g = ["-webkit-", "-moz-", "-o-", "-ms-", "-khtml-"], j = ["Webkit", "Moz", "O", "ms", "Khtml"], h = "", k = 0; k < j.length; k++) if ("" === c[j[k] + "Transition"]) {
        b = j[k] + "Transition";
        h = g[k];
        break
    }
    $widgetkit.prefix = h;
    c = $widgetkit;
    b = (g = b) && "WebKitCSSMatrix" in window && "m11" in new WebKitCSSMatrix && !navigator.userAgent.match(/Chrome/i);
    j = document.createElement("canvas");
    j = !(!j.getContext || !j.getContext("2d"));
    c.support = {
        transition: g,
        css3d: b,
        canvas: j
    };
    $widgetkit.css3 = function (a) {
        a = a || {};
        a.transition && (a[h + "transition"] = a.transition);
        a.transform && (a[h + "transform"] = a.transform);
        a["transform-origin"] && (a[h + "transform-origin"] = a["transform-origin"]);
        return a
    };
    if (!(b = f.browser)) c = navigator.userAgent, c = c.toLowerCase(), b = {}, c = /(chrome)[ \/]([\w.]+)/.exec(c) || /(webkit)[ \/]([\w.]+)/.exec(c) || /(opera)(?:.*version)?[ \/]([\w.]+)/.exec(c) || /(msie) ([\w.]+)/.exec(c) || 0 > c.indexOf("compatible") && /(mozilla)(?:.*? rv:([\w.]+))?/.exec(c) || [], b[c[1]] = !0, b.version = c[2] || "0";
    f.browser = b;
    b = null
})(jQuery, window);
(function (f) {
    var e;
    a: {
        try {
            e = parseInt(navigator.appVersion.match(/MSIE (\d\.\d)/)[1], 10);
            break a
        } catch (a) {}
        e = !1
    }
    e && 9 > e && (f(document).ready(function () {
        f("body").addClass("wk-ie wk-ie" + e)
    }), f.each("abbr article aside audio canvas details figcaption figure footer header hgroup mark meter nav output progress section summary time video".split(" "), function () {
        document.createElement(this)
    }))
})(jQuery);
(function (f, e) {
    e.$widgetkit.trans = {
        __data: {},
        addDic: function (a) {
            f.extend(this.__data, a)
        },
        add: function (a, d) {
            this.__data[a] = d
        },
        get: function (a) {
            if (!this.__data[a]) return a;
            var d = 1 == arguments.length ? [] : Array.prototype.slice.call(arguments, 1);
            return this.printf(String(this.__data[a]), d)
        },
        printf: function (a, d) {
            if (!d) return a;
            var b = "",
                c = a.split("%s");
            if (1 == c.length) return a;
            for (var g = 0; g < d.length; g++) c[g].lastIndexOf("%") == c[g].length - 1 && g != d.length - 1 && (c[g] += "s" + c.splice(g + 1, 1)[0]), b += c[g] + d[g];
            return b + c[c.length - 1]
        }
    }
})(jQuery, window);
(function (f) {
    f.easing.jswing = f.easing.swing;
    f.extend(f.easing, {
        def: "easeOutQuad",
        swing: function (e, a, d, b, c) {
            return f.easing[f.easing.def](e, a, d, b, c)
        },
        easeInQuad: function (e, a, d, b, c) {
            return b * (a /= c) * a + d
        },
        easeOutQuad: function (e, a, d, b, c) {
            return -b * (a /= c) * (a - 2) + d
        },
        easeInOutQuad: function (e, a, d, b, c) {
            return 1 > (a /= c / 2) ? b / 2 * a * a + d : -b / 2 * (--a * (a - 2) - 1) + d
        },
        easeInCubic: function (e, a, d, b, c) {
            return b * (a /= c) * a * a + d
        },
        easeOutCubic: function (e, a, d, b, c) {
            return b * ((a = a / c - 1) * a * a + 1) + d
        },
        easeInOutCubic: function (e, a, d, b, c) {
            return 1 > (a /= c / 2) ? b / 2 * a * a * a + d : b / 2 * ((a -= 2) * a * a + 2) + d
        },
        easeInQuart: function (e, a, d, b, c) {
            return b * (a /= c) * a * a * a + d
        },
        easeOutQuart: function (e, a, d, b, c) {
            return -b * ((a = a / c - 1) * a * a * a - 1) + d
        },
        easeInOutQuart: function (e, a, d, b, c) {
            return 1 > (a /= c / 2) ? b / 2 * a * a * a * a + d : -b / 2 * ((a -= 2) * a * a * a - 2) + d
        },
        easeInQuint: function (e, a, d, b, c) {
            return b * (a /= c) * a * a * a * a + d
        },
        easeOutQuint: function (e, a, d, b, c) {
            return b * ((a = a / c - 1) * a * a * a * a + 1) + d
        },
        easeInOutQuint: function (e, a, d, b, c) {
            return 1 > (a /= c / 2) ? b / 2 * a * a * a * a * a + d : b / 2 * ((a -= 2) * a * a * a * a + 2) + d
        },
        easeInSine: function (e, a, d, b, c) {
            return -b * Math.cos(a / c * (Math.PI / 2)) + b + d
        },
        easeOutSine: function (e, a, d, b, c) {
            return b * Math.sin(a / c * (Math.PI / 2)) + d
        },
        easeInOutSine: function (e, a, d, b, c) {
            return -b / 2 * (Math.cos(Math.PI * a / c) - 1) + d
        },
        easeInExpo: function (e, a, d, b, c) {
            return 0 == a ? d : b * Math.pow(2, 10 * (a / c - 1)) + d
        },
        easeOutExpo: function (e, a, d, b, c) {
            return a == c ? d + b : b * (-Math.pow(2, -10 * a / c) + 1) + d
        },
        easeInOutExpo: function (e, a, d, b, c) {
            return 0 == a ? d : a == c ? d + b : 1 > (a /= c / 2) ? b / 2 * Math.pow(2, 10 * (a - 1)) + d : b / 2 * (-Math.pow(2, -10 * --a) + 2) + d
        },
        easeInCirc: function (e, a, d, b, c) {
            return -b * (Math.sqrt(1 - (a /= c) * a) - 1) + d
        },
        easeOutCirc: function (e, a, d, b, c) {
            return b * Math.sqrt(1 - (a = a / c - 1) * a) + d
        },
        easeInOutCirc: function (e, a, d, b, c) {
            return 1 > (a /= c / 2) ? -b / 2 * (Math.sqrt(1 - a * a) - 1) + d : b / 2 * (Math.sqrt(1 - (a -= 2) * a) + 1) + d
        },
        easeInElastic: function (e, a, d, b, c) {
            e = 1.70158;
            var g = 0,
                f = b;
            if (0 == a) return d;
            if (1 == (a /= c)) return d + b;
            g || (g = 0.3 * c);
            f < Math.abs(b) ? (f = b, e = g / 4) : e = g / (2 * Math.PI) * Math.asin(b / f);
            return -(f * Math.pow(2, 10 * (a -= 1)) * Math.sin((a * c - e) * 2 * Math.PI / g)) + d
        },
        easeOutElastic: function (e, a, d, b, c) {
            e = 1.70158;
            var g = 0,
                f = b;
            if (0 == a) return d;
            if (1 == (a /= c)) return d + b;
            g || (g = 0.3 * c);
            f < Math.abs(b) ? (f = b, e = g / 4) : e = g / (2 * Math.PI) * Math.asin(b / f);
            return f * Math.pow(2, -10 * a) * Math.sin((a * c - e) * 2 * Math.PI / g) + b + d
        },
        easeInOutElastic: function (e, a, d, b, c) {
            e = 1.70158;
            var g = 0,
                f = b;
            if (0 == a) return d;
            if (2 == (a /= c / 2)) return d + b;
            g || (g = c * 0.3 * 1.5);
            f < Math.abs(b) ? (f = b, e = g / 4) : e = g / (2 * Math.PI) * Math.asin(b / f);
            return 1 > a ? -0.5 * f * Math.pow(2, 10 * (a -= 1)) * Math.sin((a * c - e) * 2 * Math.PI / g) + d : 0.5 * f * Math.pow(2, -10 * (a -= 1)) * Math.sin((a * c - e) * 2 * Math.PI / g) + b + d
        },
        easeInBack: function (e, a, d, b, c, g) {
            void 0 == g && (g = 1.70158);
            return b * (a /= c) * a * ((g + 1) * a - g) + d
        },
        easeOutBack: function (e, a, d, b, c, g) {
            void 0 == g && (g = 1.70158);
            return b * ((a = a / c - 1) * a * ((g + 1) * a + g) + 1) + d
        },
        easeInOutBack: function (e, a, d, b, c, g) {
            void 0 == g && (g = 1.70158);
            return 1 > (a /= c / 2) ? b / 2 * a * a * (((g *= 1.525) + 1) * a - g) + d : b / 2 * ((a -= 2) * a * (((g *= 1.525) + 1) * a + g) + 2) + d
        },
        easeInBounce: function (e, a, d, b, c) {
            return b - f.easing.easeOutBounce(e, c - a, 0, b, c) + d
        },
        easeOutBounce: function (e, a, d, b, c) {
            return (a /= c) < 1 / 2.75 ? b * 7.5625 * a * a + d : a < 2 / 2.75 ? b * (7.5625 * (a -= 1.5 / 2.75) * a + 0.75) + d : a < 2.5 / 2.75 ? b * (7.5625 * (a -= 2.25 / 2.75) * a + 0.9375) + d : b * (7.5625 * (a -= 2.625 / 2.75) * a + 0.984375) + d
        },
        easeInOutBounce: function (e, a, d, b, c) {
            return a < c / 2 ? 0.5 * f.easing.easeInBounce(e, 2 * a, 0, b, c) + d : 0.5 * f.easing.easeOutBounce(e, 2 * a - c, 0, b, c) + 0.5 * b + d
        }
    })
})(jQuery);
(function (f) {
    function e(a) {
        var b = a || window.event,
            c = [].slice.call(arguments, 1),
            g = 0,
            e = 0,
            h = 0;
        a = f.event.fix(b);
        a.type = "mousewheel";
        a.wheelDelta && (g = a.wheelDelta / 120);
        a.detail && (g = -a.detail / 3);
        h = g;
        void 0 !== b.axis && b.axis === b.HORIZONTAL_AXIS && (h = 0, e = -1 * g);
        void 0 !== b.wheelDeltaY && (h = b.wheelDeltaY / 120);
        void 0 !== b.wheelDeltaX && (e = -1 * b.wheelDeltaX / 120);
        c.unshift(a, g, e, h);
        return f.event.handle.apply(this, c)
    }
    var a = ["DOMMouseScroll", "mousewheel"];
    f.event.special.mousewheel = {
        setup: function () {
            if (this.addEventListener) for (var d = a.length; d;) this.addEventListener(a[--d], e, !1);
            else this.onmousewheel = e
        },
        teardown: function () {
            if (this.removeEventListener) for (var d = a.length; d;) this.removeEventListener(a[--d], e, !1);
            else this.onmousewheel = null
        }
    };
    f.fn.extend({
        mousewheel: function (a) {
            return a ? this.bind("mousewheel", a) : this.trigger("mousewheel")
        },
        unmousewheel: function (a) {
            return this.unbind("mousewheel", a)
        }
    })
})(jQuery);
(function (f) {
    var e = f.support;
    var a = document.createElement("INPUT");
    a.type = "file";
    if (a = "files" in a) a = new XMLHttpRequest, a = !(!a || !("upload" in a && "onprogress" in a.upload)) && !! window.FormData;
    e.ajaxupload = a;
    f.support.ajaxupload && f.event.props.push("dataTransfer");
    f.fn.uploadOnDrag = function (a) {
        return !f.support.ajaxupload ? this : this.each(function () {
            var b = f(this),
                c = f.extend({
                    action: "",
                    single: !1,
                    method: "POST",
                    params: {},
                    loadstart: function () {},
                    load: function () {},
                    loadend: function () {},
                    progress: function () {},
                    complete: function () {},
                    allcomplete: function () {},
                    readystatechange: function () {}
                }, a);
            b.on("drop", function (a) {
                function b(a, c) {
                    for (var d = new FormData, e = new XMLHttpRequest, g = 0, h; h = a[g]; g++) d.append("files[]", h);
                    for (var m in c.params) d.append(m, c.params[m]);
                    e.upload.addEventListener("progress", function (a) {
                        c.progress(100 * (a.loaded / a.total), a)
                    }, !1);
                    e.addEventListener("loadstart", function (a) {
                        c.loadstart(a)
                    }, !1);
                    e.addEventListener("load", function (a) {
                        c.load(a)
                    }, !1);
                    e.addEventListener("loadend", function (a) {
                        c.loadend(a)
                    }, !1);
                    e.addEventListener("error", function (a) {
                        c.error(a)
                    }, !1);
                    e.addEventListener("abort", function (a) {
                        c.abort(a)
                    }, !1);
                    e.open(c.method, c.action, !0);
                    e.onreadystatechange = function () {
                        c.readystatechange(e);
                        if (4 == e.readyState) {
                            var a = e.responseText;
                            if ("json" == c.type) try {
                                a = f.parseJSON(a)
                            } catch (b) {
                                a = !1
                            }
                            c.complete(a, e)
                        }
                    };
                    e.send(d)
                }
                a.stopPropagation();
                a.preventDefault();
                var d = a.dataTransfer.files;
                if (c.single) {
                    var e = a.dataTransfer.files.length,
                        g = 0,
                        j = c.complete;
                    c.complete = function (a, f) {
                        g += 1;
                        j(a, f);
                        g < e ? b([d[g]], c) : c.allcomplete()
                    };
                    b([d[0]], c)
                } else b(d, c)
            }).on("dragover", function (a) {
                a.stopPropagation();
                a.preventDefault()
            })
        })
    };
    f.fn.ajaxform = function (a) {
        return !f.support.ajaxupload ? this : this.each(function () {
            var b = f(this),
                c = f.extend({
                    action: b.attr("action"),
                    method: b.attr("method"),
                    loadstart: function () {},
                    load: function () {},
                    loadend: function () {},
                    progress: function () {},
                    complete: function () {},
                    readystatechange: function () {}
                }, a);
            b.on("submit", function (a) {
                a.preventDefault();
                a = new FormData(this);
                var b = new XMLHttpRequest;
                a.append("formdata", "1");
                b.upload.addEventListener("progress", function (a) {
                    c.progress(100 * (a.loaded / a.total), a)
                }, !1);
                b.addEventListener("loadstart", function (a) {
                    c.loadstart(a)
                }, !1);
                b.addEventListener("load", function (a) {
                    c.load(a)
                }, !1);
                b.addEventListener("loadend", function (a) {
                    c.loadend(a)
                }, !1);
                b.addEventListener("error", function (a) {
                    c.error(a)
                }, !1);
                b.addEventListener("abort", function (a) {
                    c.abort(a)
                }, !1);
                b.open(c.method, c.action, !0);
                b.onreadystatechange = function () {
                    c.readystatechange(b);
                    if (4 == b.readyState) {
                        var a = b.responseText;
                        if ("json" == c.type) try {
                            a = f.parseJSON(a)
                        } catch (d) {
                            a = !1
                        }
                        c.complete(a, b)
                    }
                };
                b.send(a)
            })
        })
    };
    if (!f.event.special.debouncedresize) {
        var d = f.event,
            b, c;
        b = d.special.debouncedresize = {
            setup: function () {
                f(this).on("resize", b.handler)
            },
            teardown: function () {
                f(this).off("resize", b.handler)
            },
            handler: function (a, e) {
                var f = this,
                    k = arguments,
                    l = function () {
                        a.type = "debouncedresize";
                        d.dispatch.apply(f, k)
                    };
                c && clearTimeout(c);
                e ? l() : c = setTimeout(l, b.threshold)
            },
            threshold: 150
        }
    }
})(jQuery);
(function (b, f, g) {
    function d(h) {
        e.innerHTML = '&shy;<style media="' + h + '"> #mq-test-1 { width: 42px; }</style>';
        a.insertBefore(j, m);
        l = 42 == e.offsetWidth;
        a.removeChild(j);
        return l
    }
    function k(h) {
        var a = d(h.media);
        if (h._listeners && h.matches != a) {
            h.matches = a;
            for (var a = 0, c = h._listeners.length; a < c; a++) h._listeners[a](h)
        }
    }
    function c(a, c, d) {
        var b;
        return function () {
            var f = this,
                g = arguments,
                e = d && !b;
            clearTimeout(b);
            b = setTimeout(function () {
                b = null;
                d || a.apply(f, g)
            }, c);
            e && a.apply(f, g)
        }
    }
    if (!f.matchMedia || b.userAgent.match(/(iPhone|iPod|iPad)/i)) {
        var l, a = g.documentElement,
            m = a.firstElementChild || a.firstChild,
            j = g.createElement("body"),
            e = g.createElement("div");
        e.id = "mq-test-1";
        e.style.cssText = "position:absolute;top:-100em";
        j.style.background = "none";
        j.appendChild(e);
        f.matchMedia = function (a) {
            var b, e = [];
            b = {
                matches: d(a),
                media: a,
                _listeners: e,
                addListener: function (a) {
                    "function" === typeof a && e.push(a)
                },
                removeListener: function (a) {
                    for (var b = 0, c = e.length; b < c; b++) e[b] === a && delete e[b]
                }
            };
            f.addEventListener && f.addEventListener("resize", c(function () {
                k(b)
            }, 150), !1);
            g.addEventListener && g.addEventListener("orientationchange", function () {
                k(b)
            }, !1);
            return b
        }
    }
})(navigator, window, document);
(function (b, f, g) {
    if (!b.onMediaQuery) {
        var d = {}, k = f.matchMedia && f.matchMedia("only all").matches;
        b(g).ready(function () {
            for (var c in d) b(d[c]).trigger("init"), d[c].matches && b(d[c]).trigger("valid")
        });
        b(f).bind("load", function () {
            for (var c in d) d[c].matches && b(d[c]).trigger("valid")
        });
        b.onMediaQuery = function (c, g) {
            var a = c && d[c];
            a || (a = d[c] = f.matchMedia(c), a.supported = k, a.addListener(function () {
                b(a).trigger(a.matches ? "valid" : "invalid")
            }));
            b(a).bind(g);
            return a
        }
    }
})(jQuery, window, document);
(function (e) {
    var a = function () {};
    a.prototype = e.extend(a.prototype, {
        name: "accordion",
        options: {
            index: 0,
            duration: 500,
            easing: "easeOutQuart",
            animated: "slide",
            event: "click",
            collapseall: !0,
            matchheight: !0,
            toggler: ".toggler",
            content: ".content"
        },
        initialize: function (a, b) {
            b = e.extend({}, this.options, b);
            var f = a.find(b.toggler),
                d = function () {
                    var g = 0;
                    b.matchheight && a.find(b.content).css("min-height", "").css("height", "").each(function () {
                        g = Math.max(g, e(this).height())
                    }).css("min-height", g);
                    f.each(function () {
                        var b = e(this),
                            a = b.next();
                        a.data("height", a.css("height", "").show().height());
                        b.hasClass("active") ? a.show() : a.hide().css("height", 0)
                    })
                };
            f.each(function (a) {
                var c = e(this).bind(b.event, function () {
                    var c = f.eq(a).hasClass("active") ? e([]) : f.eq(a),
                        d = f.eq(a).hasClass("active") ? f.eq(a) : e([]);
                    c.hasClass("active") && (d = c, c = e([]));
                    b.collapseall && (d = f.filter(".active"));
                    switch (b.animated) {
                        case "slide":
                            c.next().stop().show().animate({
                                height: c.next().data("height")
                            }, {
                                easing: b.easing,
                                duration: b.duration
                            });
                            d.next().stop().animate({
                                height: 0
                            }, {
                                easing: b.easing,
                                duration: b.duration,
                                complete: function () {
                                    d.next().hide()
                                }
                            });
                            break;
                        default:
                            c.next().show().css("height", c.next().data("height")), d.next().hide().css("height", 0)
                    }
                    c.addClass("active");
                    d.removeClass("active")
                }),
                    d = c.next().css("overflow", "hidden").addClass("content-wrapper");
                a == b.index || "all" == b.index ? (c.addClass("active"), d.show()) : d.hide().css("height", 0)
            });
            d();
            e(window).bind("debouncedresize", function () {
                d()
            })
        }
    });
    e.fn[a.prototype.name] = function () {
        var c = arguments,
            b = c[0] ? c[0] : null;
        return this.each(function () {
            var f = e(this);
            if (a.prototype[b] && f.data(a.prototype.name) && "initialize" != b) f.data(a.prototype.name)[b].apply(f.data(a.prototype.name), Array.prototype.slice.call(c, 1));
            else if (!b || e.isPlainObject(b)) {
                var d = new a;
                a.prototype.initialize && d.initialize.apply(d, e.merge([f], c));
                f.data(a.prototype.name, d)
            } else e.error("Method " + b + " does not exist on jQuery." + a.name)
        })
    };
    window.$widgetkit && ($widgetkit.lazyloaders.accordion = function (a, b) {
        e(a).accordion(b)
    })
})(jQuery);
(function () {
    $widgetkit.lazyloaders["gallery-slider"] = function (b, a) {
        var f = b.find(".slides:first"),
            d = f.children(),
            e = "auto" == a.total_width ? b.width() : a.total_width > b.width() ? b.width() : a.total_width,
            h = e / d.length - a.spacing,
            g = a.width,
            c = a.height;
        if ("auto" == a.total_width || a.total_width >= e) c = a.width / (e / 2), g = a.width / c, c = a.height / c, d.css("background-size", g + "px " + c + "px");
        d.css({
            width: h,
            "margin-right": a.spacing
        });
        f.width(2 * d.eq(0).width() * d.length);
        b.css({
            width: e,
            height: c
        });
        $widgetkit.load(WIDGETKIT_URL + "/widgets/gallery/js/slider.js").done(function () {
            b.galleryslider(a)
        })
    }
})(jQuery);
$widgetkit.load('http://www.reserverungolf.com/media/widgetkit/widgets/lightbox/js/lightbox.js').done(function () {
    jQuery(function ($) {
        setTimeout(function () {
            $('a[data-lightbox]').lightbox({
                "titlePosition": "float",
                "transitionIn": "fade",
                "transitionOut": "fade",
                "overlayShow": 1,
                "overlayColor": "#777",
                "overlayOpacity": 0.7
            });
        }, 500);
    });
});
(function () {
    $widgetkit.lazyloaders.googlemaps = function (a, b) {
        $widgetkit.load(WIDGETKIT_URL + "/widgets/map/js/map.js").done(function () {
            a.googlemaps(b)
        })
    }
})(jQuery);
$widgetkit.trans.addDic({
    "FROM_ADDRESS": "From address: ",
    "GET_DIRECTIONS": "Get directions",
    "FILL_IN_ADDRESS": "Please fill in your address.",
    "ADDRESS_NOT_FOUND": "Sorry, address not found!",
    "LOCATION_NOT_FOUND": ", not found!"
});
if (!window['mejs']) {
    $widgetkit.load('http://www.reserverungolf.com/media/widgetkit/widgetshttp://www.reserverungolf.com/mediaplayerhttp://www.reserverungolf.com/mediaelementhttp://www.reserverungolf.com/mediaelement-and-player.js').done(function () {
        jQuery(function ($) {
            mejs.MediaElementDefaults.pluginPath = 'http://www.reserverungolf.com/media/widgetkit/widgetshttp://www.reserverungolf.com/mediaplayerhttp://www.reserverungolf.com/mediaelement/';
            $('video,audio').each(function () {
                var ele = $(this);
                if (!ele.parent().hasClass('mejs-mediaelement')) {
                    ele.data('mediaelement', new mejs.MediaElementPlayer(this, {
                        "pluginPath": "\http://www.reserverungolf.com/media\/widgetkit\/widgets\http://www.reserverungolf.com/mediaplayer\http://www.reserverungolf.com/mediaelement\/"
                    }));
                    var w = ele.data('mediaelement').width,
                        h = ele.data('mediaelement').height;
                    $.onMediaQuery('(max-width: 767px)', {
                        valid: function () {
                            ele.data('mediaelement').setPlayerSize('100%', ele.is('video') ? '100%' : h);
                        },
                        invalid: function () {
                            var parent_width = ele.parent().width();
                            if (w > parent_width) {
                                ele.css({
                                    width: '',
                                    height: ''
                                }).data('mediaelement').setPlayerSize('100%', '100%');
                            } else {
                                ele.css({
                                    width: '',
                                    height: ''
                                }).data('mediaelement').setPlayerSize(w, h);
                            }
                        }
                    });
                    if ($(window).width() <= 767) {
                        ele.data('mediaelement').setPlayerSize('100%', ele.is('video') ? '100%' : h);
                    }
                }
            });
        });
    });
} else {
    jQuery(function ($) {
        mejs.MediaElementDefaults.pluginPath = 'http://www.reserverungolf.com/media/widgetkit/widgetshttp://www.reserverungolf.com/mediaplayerhttp://www.reserverungolf.com/mediaelement/';
        $('video,audio').each(function () {
            var ele = $(this);
            if (!ele.parent().hasClass('mejs-mediaelement')) {
                ele.data('mediaelement', new mejs.MediaElementPlayer(this, {
                    "pluginPath": "\http://www.reserverungolf.com/media\/widgetkit\/widgets\http://www.reserverungolf.com/mediaplayer\http://www.reserverungolf.com/mediaelement\/"
                }));
                var w = ele.data('mediaelement').width,
                    h = ele.data('mediaelement').height;
                $.onMediaQuery('(max-width: 767px)', {
                    valid: function () {
                        ele.data('mediaelement').setPlayerSize('100%', ele.is('video') ? '100%' : h);
                    },
                    invalid: function () {
                        var parent_width = ele.parent().width();
                        if (w > parent_width) {
                            ele.css({
                                width: '',
                                height: ''
                            }).data('mediaelement').setPlayerSize('100%', '100%');
                        } else {
                            ele.css({
                                width: '',
                                height: ''
                            }).data('mediaelement').setPlayerSize(w, h);
                        }
                    }
                });
                if ($(window).width() <= 767) {
                    ele.data('mediaelement').setPlayerSize('100%', ele.is('video') ? '100%' : h);
                }
            }
        });
    });;
}
(function (e) {
    $widgetkit.lazyloaders.slideset = function (a, f) {
        a.css("visibility", "hidden");
        var h = a.find(".sets:first"),
            c = h.css({
                width: ""
            }).width(),
            d = a.find("ul.set").show(),
            g = 0;
        "auto" == f.width && a.width();
        var j = "auto" == f.height ? d.eq(0).children().eq(0).outerHeight(!0) : f.height;
        d.each(function () {
            var a = e(this).show(),
                b = 0;
            e(this).children().each(function () {
                var a = e(this);
                a.css("left", b);
                b += a.width()
            });
            g = Math.max(g, b);
            a.css("width", b).data("width", b).hide()
        });
        d.eq(0).show();
        h.css({
            height: j
        });
        g > c && (c = g / c, d.css($widgetkit.css3({
            transform: "scale(" + 1 / c + ")"
        })), h.css("height", j / c));
        d.css({
            height: j
        });
        $widgetkit.load(WIDGETKIT_URL + "/widgets/slideset/js/slideset.js").done(function () {
            a.slideset(f).css("visibility", "visible");
            a.find("img[data-src]").each(function () {
                var a = e(this),
                    b = a.data("src");
                setTimeout(function () {
                    a.attr("src", b)
                }, 1)
            })
        })
    }
})(jQuery);
(function (f) {
    $widgetkit.lazyloaders.slideshow = function (a, c) {
        $widgetkit.support.canvas && a.find("img[data-src]").each(function () {
            var a = f(this),
                b = document.createElement("canvas"),
                c = b.getContext("2d");
            b.width = a.attr("width");
            b.height = a.attr("height");
            c.drawImage(this, 0, 0);
            a.attr("src", b.toDataURL("image/png"))
        });
        a.css("visibility", "hidden");
        var b = c.width,
            d = c.height,
            e = a.find("ul.slides:first"),
            g = e.children();
        g.css("width", "");
        g.css("height", "");
        e.css("height", "");
        a.css("width", "");
        "auto" != b && a.width() < b && (d = b = "auto");
        a.css({
            width: "auto" == b ? a.width() : b
        });
        e.width();
        b = d;
        "auto" == b && (b = g.eq(0).show().height());
        g.css({
            height: b
        });
        e.css("height", b);
        $widgetkit.load(WIDGETKIT_URL + "/widgets/slideshow/js/slideshow.js").done(function () {
            a.find("img[data-src]").each(function () {
                var a = f(this),
                    b = a.data("src");
                setTimeout(function () {
                    a.attr("src", b)
                }, 1)
            });
            a.slideshow(c).css("visibility", "visible")
        })
    };
    $widgetkit.lazyloaders.showcase = function (a, c) {
        var b = a.find(".wk-slideshow").css("visibility", "hidden"),
            d = a.find(".wk-slideset").css("visibility", "hidden"),
            e = d.find("ul.set > li");
        $widgetkit.lazyloaders.slideshow(b, c);
        $widgetkit.lazyloaders.slideset(d, f.extend({}, c, {
            width: "auto",
            height: "auto",
            autoplay: !1,
            duration: c.slideset_effect_duration,
            index: parseInt(c.index / c.items_per_set)
        }));
        f(window).bind("resize", function () {
            var b = function () {
                a.css("width", "");
                "auto" == c.width || c.width > a.width() ? a.width(a.width()) : a.width(c.width)
            };
            b();
            return b
        }());
        f.when($widgetkit.load(WIDGETKIT_URL + "/widgets/slideset/js/slideset.js"), $widgetkit.load(WIDGETKIT_URL + "/widgets/slideshow/js/slideshow.js")).done(function () {
            b.css("visibility", "visible");
            d.css("visibility", "visible");
            var a = b.data("slideshow"),
                c = d.data("slideset");
            e.eq(a.index).addClass("active");
            b.bind("slideshow-show", function (a, b, d) {
                if (!e.removeClass("active").eq(d).addClass("active").parent().is(":visible")) switch (d) {
                    case 0:
                        c.show(0);
                        break;
                    case e.length - 1:
                        c.show(c.sets.length - 1);
                        break;
                    default:
                        c[d > b ? "next" : "previous"]()
                }
            });
            e.each(function (b) {
                f(this).bind("click", function () {
                    a.stop();
                    a.show(b)
                })
            })
        })
    }
})(jQuery);
$widgetkit.load('http://www.reserverungolf.com/media/widgetkit/widgets/spotlight/js/spotlight.js').done(function () {
    jQuery(function ($) {
        $('[data-spotlight]').spotlight({
            "duration": 300
        });
    });
});
jQuery(function (b) {
    var f = function (b) {
        var a = new Date(Date.parse(b.replace(/(\d+)-(\d+)-(\d+)T(.+)([-\+]\d+):(\d+)/g, "$1/$2/$3 $4 UTC$5$6"))),
            a = parseInt(((1 < arguments.length ? arguments[1] : new Date).getTime() - a) / 1E3);
        return 60 > a ? $widgetkit.trans.get("LESS_THAN_A_MINUTE_AGO") : 120 > a ? $widgetkit.trans.get("ABOUT_A_MINUTE_AGO") : 2700 > a ? $widgetkit.trans.get("X_MINUTES_AGO", parseInt(a / 60).toString()) : 5400 > a ? $widgetkit.trans.get("ABOUT_AN_HOUR_AGO") : 86400 > a ? $widgetkit.trans.get("X_HOURS_AGO", parseInt(a / 3600).toString()) : 172800 > a ? $widgetkit.trans.get("ONE_DAY_AGO") : $widgetkit.trans.get("X_DAYS_AGO", parseInt(a / 86400).toString())
    };
    b(".wk-twitter time").each(function () {
        b(this).html(f(b(this).attr("datetime")))
    });
    var d = b(".wk-twitter-bubbles");
    if (d.length) {
        var e = function () {
            d.each(function () {
                var c = 0;
                b(this).find("p.content").each(function () {
                    var a = b(this).height();
                    a > c && (c = a)
                }).css("min-height", c)
            })
        };
        e();
        b(window).bind("load", e)
    }
});
$widgetkit.trans.addDic({
    "LESS_THAN_A_MINUTE_AGO": "less than a minute ago",
    "ABOUT_A_MINUTE_AGO": "about a minute ago",
    "X_MINUTES_AGO": "%s minutes ago",
    "ABOUT_AN_HOUR_AGO": "about an hour ago",
    "X_HOURS_AGO": "about %s hours ago",
    "ONE_DAY_AGO": "1 day ago",
    "X_DAYS_AGO": "%s days ago"
});