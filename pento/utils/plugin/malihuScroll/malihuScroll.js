/* == jquery mousewheel plugin == Version: 3.1.12, License: MIT License (MIT) */
!function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : "object" == typeof exports ? module.exports = a : a(jQuery)
}(function(a) {
    function b(b) {
        var g = b || window.event
          , h = i.call(arguments, 1)
          , j = 0
          , l = 0
          , m = 0
          , n = 0
          , o = 0
          , p = 0;
        if (b = a.event.fix(g),
        b.type = "mousewheel",
        "detail"in g && (m = -1 * g.detail),
        "wheelDelta"in g && (m = g.wheelDelta),
        "wheelDeltaY"in g && (m = g.wheelDeltaY),
        "wheelDeltaX"in g && (l = -1 * g.wheelDeltaX),
        "axis"in g && g.axis === g.HORIZONTAL_AXIS && (l = -1 * m,
        m = 0),
        j = 0 === m ? l : m,
        "deltaY"in g && (m = -1 * g.deltaY,
        j = m),
        "deltaX"in g && (l = g.deltaX,
        0 === m && (j = -1 * l)),
        0 !== m || 0 !== l) {
            if (1 === g.deltaMode) {
                var q = a.data(this, "mousewheel-line-height");
                j *= q,
                m *= q,
                l *= q
            } else if (2 === g.deltaMode) {
                var r = a.data(this, "mousewheel-page-height");
                j *= r,
                m *= r,
                l *= r
            }
            if (n = Math.max(Math.abs(m), Math.abs(l)),
            (!f || f > n) && (f = n,
            d(g, n) && (f /= 40)),
            d(g, n) && (j /= 40,
            l /= 40,
            m /= 40),
            j = Math[j >= 1 ? "floor" : "ceil"](j / f),
            l = Math[l >= 1 ? "floor" : "ceil"](l / f),
            m = Math[m >= 1 ? "floor" : "ceil"](m / f),
            k.settings.normalizeOffset && this.getBoundingClientRect) {
                var s = this.getBoundingClientRect();
                o = b.clientX - s.left,
                p = b.clientY - s.top
            }
            return b.deltaX = l,
            b.deltaY = m,
            b.deltaFactor = f,
            b.offsetX = o,
            b.offsetY = p,
            b.deltaMode = 0,
            h.unshift(b, j, l, m),
            e && clearTimeout(e),
            e = setTimeout(c, 200),
            (a.event.dispatch || a.event.handle).apply(this, h)
        }
    }
    function c() {
        f = null
    }
    function d(a, b) {
        return k.settings.adjustOldDeltas && "mousewheel" === a.type && b % 120 === 0
    }
    var e, f, g = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"], h = "onwheel"in document || document.documentMode >= 9 ? ["wheel"] : ["mousewheel", "DomMouseScroll", "MozMousePixelScroll"], i = Array.prototype.slice;
    if (a.event.fixHooks)
        for (var j = g.length; j; )
            a.event.fixHooks[g[--j]] = a.event.mouseHooks;
    var k = a.event.special.mousewheel = {
        version: "3.1.12",
        setup: function() {
            if (this.addEventListener)
                for (var c = h.length; c; )
                    this.addEventListener(h[--c], b, !1);
            else
                this.onmousewheel = b;
            a.data(this, "mousewheel-line-height", k.getLineHeight(this)),
            a.data(this, "mousewheel-page-height", k.getPageHeight(this))
        },
        teardown: function() {
            if (this.removeEventListener)
                for (var c = h.length; c; )
                    this.removeEventListener(h[--c], b, !1);
            else
                this.onmousewheel = null;
            a.removeData(this, "mousewheel-line-height"),
            a.removeData(this, "mousewheel-page-height")
        },
        getLineHeight: function(b) {
            var c = a(b)
              , d = c["offsetParent"in a.fn ? "offsetParent" : "parent"]();
            return d.length || (d = a("body")),
            parseInt(d.css("fontSize"), 10) || parseInt(c.css("fontSize"), 10) || 16
        },
        getPageHeight: function(b) {
            return a(b).height()
        },
        settings: {
            adjustOldDeltas: !0,
            normalizeOffset: !0
        }
    };
    a.fn.extend({
        mousewheel: function(a) {
            return a ? this.bind("mousewheel", a) : this.trigger("mousewheel")
        },
        unmousewheel: function(a) {
            return this.unbind("mousewheel", a)
        }
    })
});
/* == malihu jquery custom scrollbar plugin == Version: 3.0.6, License: MIT License (MIT) */
!function(e, t, a) {
    !function(t) {
        var o = "function" == typeof define && define.amd
          , n = "https:" == a.location.protocol ? "https:" : "http:"
          , i = "cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.12/jquery.mousewheel.min.js";
        o || e.event.special.mousewheel || e("head").append(decodeURI("%3Cscript src=" + n + "//" + i + "%3E%3C/script%3E")),
        t()
    }(function() {
        var o = "mCustomScrollbar"
          , n = "mCS"
          , i = ".mCustomScrollbar"
          , r = {
            setTop: 0,
            setLeft: 0,
            axis: "y",
            scrollbarPosition: "inside",
            scrollInertia: 950,
            autoDraggerLength: !0,
            alwaysShowScrollbar: 0,
            snapOffset: 0,
            mouseWheel: {
                enable: !0,
                scrollAmount: "auto",
                axis: "y",
                deltaFactor: "auto",
                disableOver: ["select", "option", "keygen", "datalist", "textarea"]
            },
            scrollButtons: {
                scrollType: "stepless",
                scrollAmount: "auto"
            },
            keyboard: {
                enable: !0,
                scrollType: "stepless",
                scrollAmount: "auto"
            },
            contentTouchScroll: 25,
            advanced: {
                autoScrollOnFocus: "input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",
                updateOnContentResize: !0,
                updateOnImageLoad: !0
            },
            theme: "light",
            callbacks: {
                onTotalScrollOffset: 0,
                onTotalScrollBackOffset: 0,
                alwaysTriggerOffsets: !0
            }
        }
          , l = 0
          , s = {}
          , c = t.attachEvent && !t.addEventListener ? 1 : 0
          , d = !1
          , u = ["mCSB_dragger_onDrag", "mCSB_scrollTools_onDrag", "mCS_img_loaded", "mCS_disabled", "mCS_destroyed", "mCS_no_scrollbar", "mCS-autoHide", "mCS-dir-rtl", "mCS_no_scrollbar_y", "mCS_no_scrollbar_x", "mCS_y_hidden", "mCS_x_hidden", "mCSB_draggerContainer", "mCSB_buttonUp", "mCSB_buttonDown", "mCSB_buttonLeft", "mCSB_buttonRight"]
          , f = {
            init: function(t) {
                var t = e.extend(!0, {}, r, t)
                  , a = h.call(this);
                if (t.live) {
                    var o = t.liveSelector || this.selector || i
                      , c = e(o);
                    if ("off" === t.live)
                        return void p(o);
                    s[o] = setTimeout(function() {
                        c.mCustomScrollbar(t),
                        "once" === t.live && c.length && p(o)
                    }, 500)
                } else
                    p(o);
                return t.setWidth = t.set_width ? t.set_width : t.setWidth,
                t.setHeight = t.set_height ? t.set_height : t.setHeight,
                t.axis = t.horizontalScroll ? "x" : g(t.axis),
                t.scrollInertia = t.scrollInertia > 0 && t.scrollInertia < 17 ? 17 : t.scrollInertia,
                "object" != typeof t.mouseWheel && 1 == t.mouseWheel && (t.mouseWheel = {
                    enable: !0,
                    scrollAmount: "auto",
                    axis: "y",
                    preventDefault: !1,
                    deltaFactor: "auto",
                    normalizeDelta: !1,
                    invert: !1
                }),
                t.mouseWheel.scrollAmount = t.mouseWheelPixels ? t.mouseWheelPixels : t.mouseWheel.scrollAmount,
                t.mouseWheel.normalizeDelta = t.advanced.normalizeMouseWheelDelta ? t.advanced.normalizeMouseWheelDelta : t.mouseWheel.normalizeDelta,
                t.scrollButtons.scrollType = v(t.scrollButtons.scrollType),
                m(t),
                e(a).each(function() {
                    var a = e(this);
                    if (!a.data(n)) {
                        a.data(n, {
                            idx: ++l,
                            opt: t,
                            scrollRatio: {
                                y: null,
                                x: null
                            },
                            overflowed: null,
                            contentReset: {
                                y: null,
                                x: null
                            },
                            bindEvents: !1,
                            tweenRunning: !1,
                            sequential: {},
                            langDir: a.css("direction"),
                            cbOffsets: null,
                            trigger: null
                        });
                        var o = a.data(n)
                          , i = o.opt
                          , r = a.data("mcs-axis")
                          , s = a.data("mcs-scrollbar-position")
                          , c = a.data("mcs-theme");
                        r && (i.axis = r),
                        s && (i.scrollbarPosition = s),
                        c && (i.theme = c,
                        m(i)),
                        x.call(this),
                        e("#mCSB_" + o.idx + "_container img:not(." + u[2] + ")").addClass(u[2]),
                        f.update.call(null, a)
                    }
                })
            },
            update: function(t, a) {
                var o = t || h.call(this);
                return e(o).each(function() {
                    var t = e(this);
                    if (t.data(n)) {
                        var o = t.data(n)
                          , i = o.opt
                          , r = e("#mCSB_" + o.idx + "_container")
                          , l = [e("#mCSB_" + o.idx + "_dragger_vertical"), e("#mCSB_" + o.idx + "_dragger_horizontal")];
                        if (!r.length)
                            return;
                        o.tweenRunning && V(t),
                        t.hasClass(u[3]) && t.removeClass(u[3]),
                        t.hasClass(u[4]) && t.removeClass(u[4]),
                        b.call(this),
                        S.call(this),
                        "y" === i.axis || i.advanced.autoExpandHorizontalScroll || r.css("width", _(r.children())),
                        o.overflowed = T.call(this),
                        I.call(this),
                        i.autoDraggerLength && C.call(this),
                        y.call(this),
                        M.call(this);
                        var s = [Math.abs(r[0].offsetTop), Math.abs(r[0].offsetLeft)];
                        "x" !== i.axis && (o.overflowed[0] ? l[0].height() > l[0].parent().height() ? k.call(this) : (Q(t, s[0].toString(), {
                            dir: "y",
                            dur: 0,
                            overwrite: "none"
                        }),
                        o.contentReset.y = null) : (k.call(this),
                        "y" === i.axis ? O.call(this) : "yx" === i.axis && o.overflowed[1] && Q(t, s[1].toString(), {
                            dir: "x",
                            dur: 0,
                            overwrite: "none"
                        }))),
                        "y" !== i.axis && (o.overflowed[1] ? l[1].width() > l[1].parent().width() ? k.call(this) : (Q(t, s[1].toString(), {
                            dir: "x",
                            dur: 0,
                            overwrite: "none"
                        }),
                        o.contentReset.x = null) : (k.call(this),
                        "x" === i.axis ? O.call(this) : "yx" === i.axis && o.overflowed[0] && Q(t, s[0].toString(), {
                            dir: "y",
                            dur: 0,
                            overwrite: "none"
                        }))),
                        a && o && (2 === a && i.callbacks.onImageLoad && "function" == typeof i.callbacks.onImageLoad ? i.callbacks.onImageLoad.call(this) : 3 === a && i.callbacks.onSelectorChange && "function" == typeof i.callbacks.onSelectorChange ? i.callbacks.onSelectorChange.call(this) : i.callbacks.onUpdate && "function" == typeof i.callbacks.onUpdate && i.callbacks.onUpdate.call(this)),
                        X.call(this)
                    }
                })
            },
            scrollTo: function(t, a) {
                if ("undefined" != typeof t && null != t) {
                    var o = h.call(this);
                    return e(o).each(function() {
                        var o = e(this);
                        if (o.data(n)) {
                            var i = o.data(n)
                              , r = i.opt
                              , l = {
                                trigger: "external",
                                scrollInertia: r.scrollInertia,
                                scrollEasing: "mcsEaseInOut",
                                moveDragger: !1,
                                timeout: 60,
                                callbacks: !0,
                                onStart: !0,
                                onUpdate: !0,
                                onComplete: !0
                            }
                              , s = e.extend(!0, {}, l, a)
                              , c = j.call(this, t)
                              , d = s.scrollInertia > 0 && s.scrollInertia < 17 ? 17 : s.scrollInertia;
                            c[0] = Y.call(this, c[0], "y"),
                            c[1] = Y.call(this, c[1], "x"),
                            s.moveDragger && (c[0] *= i.scrollRatio.y,
                            c[1] *= i.scrollRatio.x),
                            s.dur = d,
                            setTimeout(function() {
                                null !== c[0] && "undefined" != typeof c[0] && "x" !== r.axis && i.overflowed[0] && (s.dir = "y",
                                s.overwrite = "all",
                                Q(o, c[0].toString(), s)),
                                null !== c[1] && "undefined" != typeof c[1] && "y" !== r.axis && i.overflowed[1] && (s.dir = "x",
                                s.overwrite = "none",
                                Q(o, c[1].toString(), s))
                            }, s.timeout)
                        }
                    })
                }
            },
            stop: function() {
                var t = h.call(this);
                return e(t).each(function() {
                    var t = e(this);
                    t.data(n) && V(t)
                })
            },
            disable: function(t) {
                var a = h.call(this);
                return e(a).each(function() {
                    var a = e(this);
                    if (a.data(n)) {
                        {
                            a.data(n)
                        }
                        X.call(this, "remove"),
                        O.call(this),
                        t && k.call(this),
                        I.call(this, !0),
                        a.addClass(u[3])
                    }
                })
            },
            destroy: function() {
                var t = h.call(this);
                return e(t).each(function() {
                    var a = e(this);
                    if (a.data(n)) {
                        var i = a.data(n)
                          , r = i.opt
                          , l = e("#mCSB_" + i.idx)
                          , s = e("#mCSB_" + i.idx + "_container")
                          , c = e(".mCSB_" + i.idx + "_scrollbar");
                        r.live && p(r.liveSelector || e(t).selector),
                        X.call(this, "remove"),
                        O.call(this),
                        k.call(this),
                        a.removeData(n),
                        Z(this, "mcs"),
                        c.remove(),
                        s.find("img." + u[2]).removeClass(u[2]),
                        l.replaceWith(s.contents()),
                        a.removeClass(o + " _" + n + "_" + i.idx + " " + u[6] + " " + u[7] + " " + u[5] + " " + u[3]).addClass(u[4])
                    }
                })
            }
        }
          , h = function() {
            return "object" != typeof e(this) || e(this).length < 1 ? i : this
        }
          , m = function(t) {
            var a = ["rounded", "rounded-dark", "rounded-dots", "rounded-dots-dark"]
              , o = ["rounded-dots", "rounded-dots-dark", "3d", "3d-dark", "3d-thick", "3d-thick-dark", "inset", "inset-dark", "inset-2", "inset-2-dark", "inset-3", "inset-3-dark"]
              , n = ["minimal", "minimal-dark"]
              , i = ["minimal", "minimal-dark"]
              , r = ["minimal", "minimal-dark"];
            t.autoDraggerLength = e.inArray(t.theme, a) > -1 ? !1 : t.autoDraggerLength,
            t.autoExpandScrollbar = e.inArray(t.theme, o) > -1 ? !1 : t.autoExpandScrollbar,
            t.scrollButtons.enable = e.inArray(t.theme, n) > -1 ? !1 : t.scrollButtons.enable,
            t.autoHideScrollbar = e.inArray(t.theme, i) > -1 ? !0 : t.autoHideScrollbar,
            t.scrollbarPosition = e.inArray(t.theme, r) > -1 ? "outside" : t.scrollbarPosition
        }
          , p = function(e) {
            s[e] && (clearTimeout(s[e]),
            Z(s, e))
        }
          , g = function(e) {
            return "yx" === e || "xy" === e || "auto" === e ? "yx" : "x" === e || "horizontal" === e ? "x" : "y"
        }
          , v = function(e) {
            return "stepped" === e || "pixels" === e || "step" === e || "click" === e ? "stepped" : "stepless"
        }
          , x = function() {
            var t = e(this)
              , a = t.data(n)
              , i = a.opt
              , r = i.autoExpandScrollbar ? " " + u[1] + "_expand" : ""
              , l = ["<div id='mCSB_" + a.idx + "_scrollbar_vertical' class='mCSB_scrollTools mCSB_" + a.idx + "_scrollbar mCS-" + i.theme + " mCSB_scrollTools_vertical" + r + "'><div class='" + u[12] + "'><div id='mCSB_" + a.idx + "_dragger_vertical' class='mCSB_dragger' style='position:absolute;' oncontextmenu='return false;'><div class='mCSB_dragger_bar' /></div><div class='mCSB_draggerRail' /></div></div>", "<div id='mCSB_" + a.idx + "_scrollbar_horizontal' class='mCSB_scrollTools mCSB_" + a.idx + "_scrollbar mCS-" + i.theme + " mCSB_scrollTools_horizontal" + r + "'><div class='" + u[12] + "'><div id='mCSB_" + a.idx + "_dragger_horizontal' class='mCSB_dragger' style='position:absolute;' oncontextmenu='return false;'><div class='mCSB_dragger_bar' /></div><div class='mCSB_draggerRail' /></div></div>"]
              , s = "yx" === i.axis ? "mCSB_vertical_horizontal" : "x" === i.axis ? "mCSB_horizontal" : "mCSB_vertical"
              , c = "yx" === i.axis ? l[0] + l[1] : "x" === i.axis ? l[1] : l[0]
              , d = "yx" === i.axis ? "<div id='mCSB_" + a.idx + "_container_wrapper' class='mCSB_container_wrapper' />" : ""
              , f = i.autoHideScrollbar ? " " + u[6] : ""
              , h = "x" !== i.axis && "rtl" === a.langDir ? " " + u[7] : "";
            i.setWidth && t.css("width", i.setWidth),
            i.setHeight && t.css("height", i.setHeight),
            i.setLeft = "y" !== i.axis && "rtl" === a.langDir ? "989999px" : i.setLeft,
            t.addClass(o + " _" + n + "_" + a.idx + f + h).wrapInner("<div id='mCSB_" + a.idx + "' class='mCustomScrollBox mCS-" + i.theme + " " + s + "'><div id='mCSB_" + a.idx + "_container' class='mCSB_container' style='position:relative; top:" + i.setTop + "; left:" + i.setLeft + ";' dir=" + a.langDir + " /></div>");
            var m = e("#mCSB_" + a.idx)
              , p = e("#mCSB_" + a.idx + "_container");
            "y" === i.axis || i.advanced.autoExpandHorizontalScroll || p.css("width", _(p.children())),
            "outside" === i.scrollbarPosition ? ("static" === t.css("position") && t.css("position", "relative"),
            t.css("overflow", "visible"),
            m.addClass("mCSB_outside").after(c)) : (m.addClass("mCSB_inside").append(c),
            p.wrap(d)),
            w.call(this);
            var g = [e("#mCSB_" + a.idx + "_dragger_vertical"), e("#mCSB_" + a.idx + "_dragger_horizontal")];
            g[0].css("min-height", g[0].height()),
            g[1].css("min-width", g[1].width())
        }
          , _ = function(t) {
            return Math.max.apply(Math, t.map(function() {
                return e(this).outerWidth(!0)
            }).get())
        }
          , S = function() {
            var t = e(this)
              , a = t.data(n)
              , o = a.opt
              , i = e("#mCSB_" + a.idx + "_container");
            o.advanced.autoExpandHorizontalScroll && "y" !== o.axis && i.css({
                position: "absolute",
                width: "auto"
            }).wrap("<div class='mCSB_h_wrapper' style='position:relative; left:0; width:999999px;' />").css({
                width: Math.ceil(i[0].getBoundingClientRect().right + .4) - Math.floor(i[0].getBoundingClientRect().left),
                position: "relative"
            }).unwrap()
        }
          , w = function() {
            var t = e(this)
              , a = t.data(n)
              , o = a.opt
              , i = e(".mCSB_" + a.idx + "_scrollbar:first")
              , r = tt(o.scrollButtons.tabindex) ? "tabindex='" + o.scrollButtons.tabindex + "'" : ""
              , l = ["<a href='#' class='" + u[13] + "' oncontextmenu='return false;' " + r + " />", "<a href='#' class='" + u[14] + "' oncontextmenu='return false;' " + r + " />", "<a href='#' class='" + u[15] + "' oncontextmenu='return false;' " + r + " />", "<a href='#' class='" + u[16] + "' oncontextmenu='return false;' " + r + " />"]
              , s = ["x" === o.axis ? l[2] : l[0], "x" === o.axis ? l[3] : l[1], l[2], l[3]];
            o.scrollButtons.enable && i.prepend(s[0]).append(s[1]).next(".mCSB_scrollTools").prepend(s[2]).append(s[3])
        }
          , b = function() {
            var t = e(this)
              , a = t.data(n)
              , o = e("#mCSB_" + a.idx)
              , i = t.css("max-height") || "none"
              , r = -1 !== i.indexOf("%")
              , l = t.css("box-sizing");
            if ("none" !== i) {
                var s = r ? t.parent().height() * parseInt(i) / 100 : parseInt(i);
                "border-box" === l && (s -= t.innerHeight() - t.height() + (t.outerHeight() - t.innerHeight())),
                o.css("max-height", Math.round(s))
            }
        }
          , C = function() {
            var t = e(this)
              , a = t.data(n)
              , o = e("#mCSB_" + a.idx)
              , i = e("#mCSB_" + a.idx + "_container")
              , r = [e("#mCSB_" + a.idx + "_dragger_vertical"), e("#mCSB_" + a.idx + "_dragger_horizontal")]
              , l = [o.height() / i.outerHeight(!1), o.width() / i.outerWidth(!1)]
              , s = [parseInt(r[0].css("min-height")), Math.round(l[0] * r[0].parent().height()), parseInt(r[1].css("min-width")), Math.round(l[1] * r[1].parent().width())]
              , d = c && s[1] < s[0] ? s[0] : s[1]
              , u = c && s[3] < s[2] ? s[2] : s[3];
            r[0].css({
                height: d,
                "max-height": r[0].parent().height() - 10
            }).find(".mCSB_dragger_bar").css({
                "line-height": s[0] + "px"
            }),
            r[1].css({
                width: u,
                "max-width": r[1].parent().width() - 10
            })
        }
          , y = function() {
            var t = e(this)
              , a = t.data(n)
              , o = e("#mCSB_" + a.idx)
              , i = e("#mCSB_" + a.idx + "_container")
              , r = [e("#mCSB_" + a.idx + "_dragger_vertical"), e("#mCSB_" + a.idx + "_dragger_horizontal")]
              , l = [i.outerHeight(!1) - o.height(), i.outerWidth(!1) - o.width()]
              , s = [l[0] / (r[0].parent().height() - r[0].height()), l[1] / (r[1].parent().width() - r[1].width())];
            a.scrollRatio = {
                y: s[0],
                x: s[1]
            }
        }
          , B = function(e, t, a) {
            var o = a ? u[0] + "_expanded" : ""
              , n = e.closest(".mCSB_scrollTools");
            "active" === t ? (e.toggleClass(u[0] + " " + o),
            n.toggleClass(u[1]),
            e[0]._draggable = e[0]._draggable ? 0 : 1) : e[0]._draggable || ("hide" === t ? (e.removeClass(u[0]),
            n.removeClass(u[1])) : (e.addClass(u[0]),
            n.addClass(u[1])))
        }
          , T = function() {
            var t = e(this)
              , a = t.data(n)
              , o = e("#mCSB_" + a.idx)
              , i = e("#mCSB_" + a.idx + "_container")
              , r = null == a.overflowed ? i.height() : i.outerHeight(!1)
              , l = null == a.overflowed ? i.width() : i.outerWidth(!1);
            return [r > o.height(), l > o.width()]
        }
          , k = function() {
            var t = e(this)
              , a = t.data(n)
              , o = a.opt
              , i = e("#mCSB_" + a.idx)
              , r = e("#mCSB_" + a.idx + "_container")
              , l = [e("#mCSB_" + a.idx + "_dragger_vertical"), e("#mCSB_" + a.idx + "_dragger_horizontal")];
            if (V(t),
            ("x" !== o.axis && !a.overflowed[0] || "y" === o.axis && a.overflowed[0]) && (l[0].add(r).css("top", 0),
            Q(t, "_resetY")),
            "y" !== o.axis && !a.overflowed[1] || "x" === o.axis && a.overflowed[1]) {
                var s = dx = 0;
                "rtl" === a.langDir && (s = i.width() - r.outerWidth(!1),
                dx = Math.abs(s / a.scrollRatio.x)),
                r.css("left", s),
                l[1].css("left", dx),
                Q(t, "_resetX")
            }
        }
          , M = function() {
            function t() {
                r = setTimeout(function() {
                    e.event.special.mousewheel ? (clearTimeout(r),
                    W.call(a[0])) : t()
                }, 100)
            }
            var a = e(this)
              , o = a.data(n)
              , i = o.opt;
            if (!o.bindEvents) {
                if (E.call(this),
                i.contentTouchScroll && D.call(this),
                L.call(this),
                i.mouseWheel.enable) {
                    var r;
                    t()
                }
                P.call(this),
                H.call(this),
                i.advanced.autoScrollOnFocus && z.call(this),
                i.scrollButtons.enable && U.call(this),
                i.keyboard.enable && F.call(this),
                o.bindEvents = !0
            }
        }
          , O = function() {
            var t = e(this)
              , o = t.data(n)
              , i = o.opt
              , r = n + "_" + o.idx
              , l = ".mCSB_" + o.idx + "_scrollbar"
              , s = e("#mCSB_" + o.idx + ",#mCSB_" + o.idx + "_container,#mCSB_" + o.idx + "_container_wrapper," + l + " ." + u[12] + ",#mCSB_" + o.idx + "_dragger_vertical,#mCSB_" + o.idx + "_dragger_horizontal," + l + ">a")
              , c = e("#mCSB_" + o.idx + "_container");
            i.advanced.releaseDraggableSelectors && s.add(e(i.advanced.releaseDraggableSelectors)),
            o.bindEvents && (e(a).unbind("." + r),
            s.each(function() {
                e(this).unbind("." + r)
            }),
            clearTimeout(t[0]._focusTimeout),
            Z(t[0], "_focusTimeout"),
            clearTimeout(o.sequential.step),
            Z(o.sequential, "step"),
            clearTimeout(c[0].onCompleteTimeout),
            Z(c[0], "onCompleteTimeout"),
            o.bindEvents = !1)
        }
          , I = function(t) {
            var a = e(this)
              , o = a.data(n)
              , i = o.opt
              , r = e("#mCSB_" + o.idx + "_container_wrapper")
              , l = r.length ? r : e("#mCSB_" + o.idx + "_container")
              , s = [e("#mCSB_" + o.idx + "_scrollbar_vertical"), e("#mCSB_" + o.idx + "_scrollbar_horizontal")]
              , c = [s[0].find(".mCSB_dragger"), s[1].find(".mCSB_dragger")];
            "x" !== i.axis && (o.overflowed[0] && !t ? (s[0].add(c[0]).add(s[0].children("a")).css("display", "block"),
            l.removeClass(u[8] + " " + u[10])) : (i.alwaysShowScrollbar ? (2 !== i.alwaysShowScrollbar && c[0].add(s[0].children("a")).css("display", "none"),
            l.removeClass(u[10])) : (s[0].css("display", "none"),
            l.addClass(u[10])),
            l.addClass(u[8]))),
            "y" !== i.axis && (o.overflowed[1] && !t ? (s[1].add(c[1]).add(s[1].children("a")).css("display", "block"),
            l.removeClass(u[9] + " " + u[11])) : (i.alwaysShowScrollbar ? (2 !== i.alwaysShowScrollbar && c[1].add(s[1].children("a")).css("display", "none"),
            l.removeClass(u[11])) : (s[1].css("display", "none"),
            l.addClass(u[11])),
            l.addClass(u[9]))),
            o.overflowed[0] || o.overflowed[1] ? a.removeClass(u[5]) : a.addClass(u[5])
        }
          , R = function(e) {
            var t = e.type;
            switch (t) {
            case "pointerdown":
            case "MSPointerDown":
            case "pointermove":
            case "MSPointerMove":
            case "pointerup":
            case "MSPointerUp":
                return [e.originalEvent.pageY, e.originalEvent.pageX, !1];
            case "touchstart":
            case "touchmove":
            case "touchend":
                var a = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0]
                  , o = e.originalEvent.touches.length || e.originalEvent.changedTouches.length;
                return [a.pageY, a.pageX, o > 1];
            default:
                return [e.pageY, e.pageX, !1]
            }
        }
          , E = function() {
            function t(e) {
                var t = p.find("iframe");
                if (t.length) {
                    var a = e ? "auto" : "none";
                    t.css("pointer-events", a)
                }
            }
            function o(e, t, a, o) {
                if (p[0].idleTimer = f.scrollInertia < 233 ? 250 : 0,
                i.attr("id") === m[1])
                    var n = "x"
                      , r = (i[0].offsetLeft - t + o) * u.scrollRatio.x;
                else
                    var n = "y"
                      , r = (i[0].offsetTop - e + a) * u.scrollRatio.y;
                Q(s, r.toString(), {
                    dir: n,
                    drag: !0
                })
            }
            var i, r, l, s = e(this), u = s.data(n), f = u.opt, h = n + "_" + u.idx, m = ["mCSB_" + u.idx + "_dragger_vertical", "mCSB_" + u.idx + "_dragger_horizontal"], p = e("#mCSB_" + u.idx + "_container"), g = e("#" + m[0] + ",#" + m[1]), v = f.advanced.releaseDraggableSelectors ? g.add(e(f.advanced.releaseDraggableSelectors)) : g;
            g.bind("mousedown." + h + " touchstart." + h + " pointerdown." + h + " MSPointerDown." + h, function(o) {
                if (o.stopImmediatePropagation(),
                o.preventDefault(),
                $(o)) {
                    d = !0,
                    c && (a.onselectstart = function() {
                        return !1
                    }
                    ),
                    t(!1),
                    V(s),
                    i = e(this);
                    var n = i.offset()
                      , u = R(o)[0] - n.top
                      , h = R(o)[1] - n.left
                      , m = i.height() + n.top
                      , p = i.width() + n.left;
                    m > u && u > 0 && p > h && h > 0 && (r = u,
                    l = h),
                    B(i, "active", f.autoExpandScrollbar)
                }
            }).bind("touchmove." + h, function(e) {
                e.stopImmediatePropagation(),
                e.preventDefault();
                var t = i.offset()
                  , a = R(e)[0] - t.top
                  , n = R(e)[1] - t.left;
                o(r, l, a, n)
            }),
            e(a).bind("mousemove." + h + " pointermove." + h + " MSPointerMove." + h, function(e) {
                if (i) {
                    var t = i.offset()
                      , a = R(e)[0] - t.top
                      , n = R(e)[1] - t.left;
                    if (r === a)
                        return;
                    o(r, l, a, n)
                }
            }).add(v).bind("mouseup." + h + " touchend." + h + " pointerup." + h + " MSPointerUp." + h, function() {
                i && (B(i, "active", f.autoExpandScrollbar),
                i = null),
                d = !1,
                c && (a.onselectstart = null),
                t(!0)
            })
        }
          , D = function() {
            function t(e, t) {
                var a = [1.5 * t, 2 * t, t / 1.5, t / 2];
                return e > 90 ? t > 4 ? a[0] : a[3] : e > 60 ? t > 3 ? a[3] : a[2] : e > 30 ? t > 8 ? a[1] : t > 6 ? a[0] : t > 4 ? t : a[2] : t > 8 ? t : a[3]
            }
            function a(e, t, a, o, n, i) {
                e && Q(g, e.toString(), {
                    dur: t,
                    scrollEasing: a,
                    dir: o,
                    overwrite: n,
                    drag: i
                })
            }
            var o, i, r, l, s, c, u, f, h, m, p, g = e(this), v = g.data(n), x = v.opt, _ = n + "_" + v.idx, S = e("#mCSB_" + v.idx), w = e("#mCSB_" + v.idx + "_container"), b = [e("#mCSB_" + v.idx + "_dragger_vertical"), e("#mCSB_" + v.idx + "_dragger_horizontal")], C = [], y = [], B = 0, T = "yx" === x.axis ? "none" : "all", k = [];
            w.bind("touchstart." + _ + " pointerdown." + _ + " MSPointerDown." + _, function(e) {
                if (et(e) && !d && !R(e)[2]) {
                    var t = w.offset();
                    o = R(e)[0] - t.top,
                    i = R(e)[1] - t.left,
                    k = [R(e)[0], R(e)[1]]
                }
            }).bind("touchmove." + _ + " pointermove." + _ + " MSPointerMove." + _, function(e) {
                if (et(e) && !d && !R(e)[2]) {
                    e.stopImmediatePropagation(),
                    c = J();
                    var t = S.offset()
                      , n = R(e)[0] - t.top
                      , r = R(e)[1] - t.left
                      , l = "mcsLinearOut";
                    if (C.push(n),
                    y.push(r),
                    k[2] = Math.abs(R(e)[0] - k[0]),
                    k[3] = Math.abs(R(e)[1] - k[1]),
                    v.overflowed[0])
                        var s = b[0].parent().height() - b[0].height()
                          , u = o - n > 0 && n - o > -(s * v.scrollRatio.y) && (2 * k[3] < k[2] || "yx" === x.axis);
                    if (v.overflowed[1])
                        var f = b[1].parent().width() - b[1].width()
                          , h = i - r > 0 && r - i > -(f * v.scrollRatio.x) && (2 * k[2] < k[3] || "yx" === x.axis);
                    (u || h) && e.preventDefault(),
                    m = "yx" === x.axis ? [o - n, i - r] : "x" === x.axis ? [null, i - r] : [o - n, null],
                    w[0].idleTimer = 250,
                    v.overflowed[0] && a(m[0], B, l, "y", "all", !0),
                    v.overflowed[1] && a(m[1], B, l, "x", T, !0)
                }
            }),
            S.bind("touchstart." + _ + " pointerdown." + _ + " MSPointerDown." + _, function(e) {
                if (et(e) && !d && !R(e)[2]) {
                    e.stopImmediatePropagation(),
                    V(g),
                    s = J();
                    var t = S.offset();
                    r = R(e)[0] - t.top,
                    l = R(e)[1] - t.left,
                    C = [],
                    y = []
                }
            }).bind("touchend." + _ + " pointerup." + _ + " MSPointerUp." + _, function(e) {
                if (et(e) && !d && !R(e)[2]) {
                    e.stopImmediatePropagation(),
                    u = J();
                    var o = S.offset()
                      , n = R(e)[0] - o.top
                      , i = R(e)[1] - o.left;
                    if (!(u - c > 30)) {
                        h = 1e3 / (u - s);
                        var g = "mcsEaseOut"
                          , _ = 2.5 > h
                          , b = _ ? [C[C.length - 2], y[y.length - 2]] : [0, 0];
                        f = _ ? [n - b[0], i - b[1]] : [n - r, i - l];
                        var B = [Math.abs(f[0]), Math.abs(f[1])];
                        h = _ ? [Math.abs(f[0] / 4), Math.abs(f[1] / 4)] : [h, h];
                        var k = [Math.abs(w[0].offsetTop) - f[0] * t(B[0] / h[0], h[0]), Math.abs(w[0].offsetLeft) - f[1] * t(B[1] / h[1], h[1])];
                        m = "yx" === x.axis ? [k[0], k[1]] : "x" === x.axis ? [null, k[1]] : [k[0], null],
                        p = [4 * B[0] + x.scrollInertia, 4 * B[1] + x.scrollInertia];
                        var M = parseInt(x.contentTouchScroll) || 0;
                        m[0] = B[0] > M ? m[0] : 0,
                        m[1] = B[1] > M ? m[1] : 0,
                        v.overflowed[0] && a(m[0], p[0], g, "y", T, !1),
                        v.overflowed[1] && a(m[1], p[1], g, "x", T, !1)
                    }
                }
            })
        }
          , L = function() {
            function o() {
                return t.getSelection ? t.getSelection().toString() : a.selection && "Control" != a.selection.type ? a.selection.createRange().text : 0
            }
            function i(e, t, a) {
                u.type = a && r ? "stepped" : "stepless",
                u.scrollAmount = 10,
                q(l, e, t, "mcsLinearOut", a ? 60 : null)
            }
            var r, l = e(this), s = l.data(n), c = s.opt, u = s.sequential, f = n + "_" + s.idx, h = e("#mCSB_" + s.idx + "_container"), m = h.parent();
            h.bind("mousedown." + f, function() {
                r || (r = 1,
                d = !0)
            }).add(a).bind("mousemove." + f, function(e) {
                if (r && o()) {
                    var t = h.offset()
                      , a = R(e)[0] - t.top + h[0].offsetTop
                      , n = R(e)[1] - t.left + h[0].offsetLeft;
                    a > 0 && a < m.height() && n > 0 && n < m.width() ? u.step && i("off", null, "stepped") : ("x" !== c.axis && s.overflowed[0] && (0 > a ? i("on", 38) : a > m.height() && i("on", 40)),
                    "y" !== c.axis && s.overflowed[1] && (0 > n ? i("on", 37) : n > m.width() && i("on", 39)))
                }
            }).bind("mouseup." + f, function() {
                r && (r = 0,
                i("off", null)),
                d = !1
            })
        }
          , W = function() {
            function t(e) {
                var t = null;
                try {
                    var a = e.contentDocument || e.contentWindow.document;
                    t = a.body.innerHTML
                } catch (o) {}
                return null !== t
            }
            var a = e(this)
              , o = a.data(n);
            if (o) {
                var i = o.opt
                  , r = n + "_" + o.idx
                  , l = e("#mCSB_" + o.idx)
                  , s = [e("#mCSB_" + o.idx + "_dragger_vertical"), e("#mCSB_" + o.idx + "_dragger_horizontal")]
                  , d = e("#mCSB_" + o.idx + "_container").find("iframe")
                  , u = l;
                d.length && d.each(function() {
                    var a = this;
                    t(a) && (u = u.add(e(a).contents().find("body")))
                }),
                u.bind("mousewheel." + r, function(t, n) {
                    if (V(a),
                    !A(a, t.target)) {
                        var r = "auto" !== i.mouseWheel.deltaFactor ? parseInt(i.mouseWheel.deltaFactor) : c && t.deltaFactor < 100 ? 100 : t.deltaFactor || 100;
                        if ("x" === i.axis || "x" === i.mouseWheel.axis)
                            var d = "x"
                              , u = [Math.round(r * o.scrollRatio.x), parseInt(i.mouseWheel.scrollAmount)]
                              , f = "auto" !== i.mouseWheel.scrollAmount ? u[1] : u[0] >= l.width() ? .9 * l.width() : u[0]
                              , h = Math.abs(e("#mCSB_" + o.idx + "_container")[0].offsetLeft)
                              , m = s[1][0].offsetLeft
                              , p = s[1].parent().width() - s[1].width()
                              , g = t.deltaX || t.deltaY || n;
                        else
                            var d = "y"
                              , u = [Math.round(r * o.scrollRatio.y), parseInt(i.mouseWheel.scrollAmount)]
                              , f = "auto" !== i.mouseWheel.scrollAmount ? u[1] : u[0] >= l.height() ? .9 * l.height() : u[0]
                              , h = Math.abs(e("#mCSB_" + o.idx + "_container")[0].offsetTop)
                              , m = s[0][0].offsetTop
                              , p = s[0].parent().height() - s[0].height()
                              , g = t.deltaY || n;
                        "y" === d && !o.overflowed[0] || "x" === d && !o.overflowed[1] || (i.mouseWheel.invert && (g = -g),
                        i.mouseWheel.normalizeDelta && (g = 0 > g ? -1 : 1),
                        (g > 0 && 0 !== m || 0 > g && m !== p || i.mouseWheel.preventDefault) && (t.stopImmediatePropagation(),
                        t.preventDefault()),
                        Q(a, (h - g * f).toString(), {
                            dir: d
                        }))
                    }
                })
            }
        }
          , A = function(t, a) {
            var o = a.nodeName.toLowerCase()
              , i = t.data(n).opt.mouseWheel.disableOver
              , r = ["select", "textarea"];
            return e.inArray(o, i) > -1 && !(e.inArray(o, r) > -1 && !e(a).is(":focus"))
        }
          , P = function() {
            var t = e(this)
              , a = t.data(n)
              , o = n + "_" + a.idx
              , i = e("#mCSB_" + a.idx + "_container")
              , r = i.parent()
              , l = e(".mCSB_" + a.idx + "_scrollbar ." + u[12]);
            l.bind("touchstart." + o + " pointerdown." + o + " MSPointerDown." + o, function() {
                d = !0
            }).bind("touchend." + o + " pointerup." + o + " MSPointerUp." + o, function() {
                d = !1
            }).bind("click." + o, function(o) {
                if (e(o.target).hasClass(u[12]) || e(o.target).hasClass("mCSB_draggerRail")) {
                    V(t);
                    var n = e(this)
                      , l = n.find(".mCSB_dragger");
                    if (n.parent(".mCSB_scrollTools_horizontal").length > 0) {
                        if (!a.overflowed[1])
                            return;
                        var s = "x"
                          , c = o.pageX > l.offset().left ? -1 : 1
                          , d = Math.abs(i[0].offsetLeft) - .9 * c * r.width()
                    } else {
                        if (!a.overflowed[0])
                            return;
                        var s = "y"
                          , c = o.pageY > l.offset().top ? -1 : 1
                          , d = Math.abs(i[0].offsetTop) - .9 * c * r.height()
                    }
                    Q(t, d.toString(), {
                        dir: s,
                        scrollEasing: "mcsEaseInOut"
                    })
                }
            })
        }
          , z = function() {
            var t = e(this)
              , o = t.data(n)
              , i = o.opt
              , r = n + "_" + o.idx
              , l = e("#mCSB_" + o.idx + "_container")
              , s = l.parent();
            l.bind("focusin." + r, function() {
                var o = e(a.activeElement)
                  , n = l.find(".mCustomScrollBox").length
                  , r = 0;
                o.is(i.advanced.autoScrollOnFocus) && (V(t),
                clearTimeout(t[0]._focusTimeout),
                t[0]._focusTimer = n ? (r + 17) * n : 0,
                t[0]._focusTimeout = setTimeout(function() {
                    var e = [at(o)[0], at(o)[1]]
                      , a = [l[0].offsetTop, l[0].offsetLeft]
                      , n = [a[0] + e[0] >= 0 && a[0] + e[0] < s.height() - o.outerHeight(!1), a[1] + e[1] >= 0 && a[0] + e[1] < s.width() - o.outerWidth(!1)]
                      , c = "yx" !== i.axis || n[0] || n[1] ? "all" : "none";
                    "x" === i.axis || n[0] || Q(t, e[0].toString(), {
                        dir: "y",
                        scrollEasing: "mcsEaseInOut",
                        overwrite: c,
                        dur: r
                    }),
                    "y" === i.axis || n[1] || Q(t, e[1].toString(), {
                        dir: "x",
                        scrollEasing: "mcsEaseInOut",
                        overwrite: c,
                        dur: r
                    })
                }, t[0]._focusTimer))
            })
        }
          , H = function() {
            var t = e(this)
              , a = t.data(n)
              , o = n + "_" + a.idx
              , i = e("#mCSB_" + a.idx + "_container").parent();
            i.bind("scroll." + o, function() {
                (0 !== i.scrollTop() || 0 !== i.scrollLeft()) && e(".mCSB_" + a.idx + "_scrollbar").css("visibility", "hidden")
            })
        }
          , U = function() {
            var t = e(this)
              , a = t.data(n)
              , o = a.opt
              , i = a.sequential
              , r = n + "_" + a.idx
              , l = ".mCSB_" + a.idx + "_scrollbar"
              , s = e(l + ">a");
            s.bind("mousedown." + r + " touchstart." + r + " pointerdown." + r + " MSPointerDown." + r + " mouseup." + r + " touchend." + r + " pointerup." + r + " MSPointerUp." + r + " mouseout." + r + " pointerout." + r + " MSPointerOut." + r + " click." + r, function(n) {
                function r(e, a) {
                    i.scrollAmount = o.snapAmount || o.scrollButtons.scrollAmount,
                    q(t, e, a)
                }
                if (n.preventDefault(),
                $(n)) {
                    var l = e(this).attr("class");
                    switch (i.type = o.scrollButtons.scrollType,
                    n.type) {
                    case "mousedown":
                    case "touchstart":
                    case "pointerdown":
                    case "MSPointerDown":
                        if ("stepped" === i.type)
                            return;
                        d = !0,
                        a.tweenRunning = !1,
                        r("on", l);
                        break;
                    case "mouseup":
                    case "touchend":
                    case "pointerup":
                    case "MSPointerUp":
                    case "mouseout":
                    case "pointerout":
                    case "MSPointerOut":
                        if ("stepped" === i.type)
                            return;
                        d = !1,
                        i.dir && r("off", l);
                        break;
                    case "click":
                        if ("stepped" !== i.type || a.tweenRunning)
                            return;
                        r("on", l)
                    }
                }
            })
        }
          , F = function() {
            var t = e(this)
              , o = t.data(n)
              , i = o.opt
              , r = o.sequential
              , l = n + "_" + o.idx
              , s = e("#mCSB_" + o.idx)
              , c = e("#mCSB_" + o.idx + "_container")
              , d = c.parent()
              , u = "input,textarea,select,datalist,keygen,[contenteditable='true']";
            s.attr("tabindex", "0").bind("blur." + l + " keydown." + l + " keyup." + l, function(n) {
                function l(e, a) {
                    r.type = i.keyboard.scrollType,
                    r.scrollAmount = i.snapAmount || i.keyboard.scrollAmount,
                    "stepped" === r.type && o.tweenRunning || q(t, e, a)
                }
                switch (n.type) {
                case "blur":
                    o.tweenRunning && r.dir && l("off", null);
                    break;
                case "keydown":
                case "keyup":
                    var s = n.keyCode ? n.keyCode : n.which
                      , f = "on";
                    if ("x" !== i.axis && (38 === s || 40 === s) || "y" !== i.axis && (37 === s || 39 === s)) {
                        if ((38 === s || 40 === s) && !o.overflowed[0] || (37 === s || 39 === s) && !o.overflowed[1])
                            return;
                        "keyup" === n.type && (f = "off"),
                        e(a.activeElement).is(u) || (n.preventDefault(),
                        n.stopImmediatePropagation(),
                        l(f, s))
                    } else if (33 === s || 34 === s) {
                        if ((o.overflowed[0] || o.overflowed[1]) && (n.preventDefault(),
                        n.stopImmediatePropagation()),
                        "keyup" === n.type) {
                            V(t);
                            var h = 34 === s ? -1 : 1;
                            if ("x" === i.axis || "yx" === i.axis && o.overflowed[1] && !o.overflowed[0])
                                var m = "x"
                                  , p = Math.abs(c[0].offsetLeft) - .9 * h * d.width();
                            else
                                var m = "y"
                                  , p = Math.abs(c[0].offsetTop) - .9 * h * d.height();
                            Q(t, p.toString(), {
                                dir: m,
                                scrollEasing: "mcsEaseInOut"
                            })
                        }
                    } else if ((35 === s || 36 === s) && !e(a.activeElement).is(u) && ((o.overflowed[0] || o.overflowed[1]) && (n.preventDefault(),
                    n.stopImmediatePropagation()),
                    "keyup" === n.type)) {
                        if ("x" === i.axis || "yx" === i.axis && o.overflowed[1] && !o.overflowed[0])
                            var m = "x"
                              , p = 35 === s ? Math.abs(d.width() - c.outerWidth(!1)) : 0;
                        else
                            var m = "y"
                              , p = 35 === s ? Math.abs(d.height() - c.outerHeight(!1)) : 0;
                        Q(t, p.toString(), {
                            dir: m,
                            scrollEasing: "mcsEaseInOut"
                        })
                    }
                }
            })
        }
          , q = function(t, a, o, i, r) {
            function l(e) {
                var a = "stepped" !== f.type
                  , o = r ? r : e ? a ? d.scrollInertia / 1.5 : d.scrollInertia : 1e3 / 60
                  , n = e ? a ? 7.5 : 40 : 2.5
                  , s = [Math.abs(h[0].offsetTop), Math.abs(h[0].offsetLeft)]
                  , u = [c.scrollRatio.y > 10 ? 10 : c.scrollRatio.y, c.scrollRatio.x > 10 ? 10 : c.scrollRatio.x]
                  , m = "x" === f.dir[0] ? s[1] + f.dir[1] * u[1] * n : s[0] + f.dir[1] * u[0] * n
                  , p = "x" === f.dir[0] ? s[1] + f.dir[1] * parseInt(f.scrollAmount) : s[0] + f.dir[1] * parseInt(f.scrollAmount)
                  , g = "auto" !== f.scrollAmount ? p : m
                  , v = i ? i : e ? a ? "mcsLinearOut" : "mcsEaseInOut" : "mcsLinear"
                  , x = e ? !0 : !1;
                return e && 17 > o && (g = "x" === f.dir[0] ? s[1] : s[0]),
                Q(t, g.toString(), {
                    dir: f.dir[0],
                    scrollEasing: v,
                    dur: o,
                    onComplete: x
                }),
                e ? void (f.dir = !1) : (clearTimeout(f.step),
                void (f.step = setTimeout(function() {
                    l()
                }, o)))
            }
            function s() {
                clearTimeout(f.step),
                Z(f, "step"),
                V(t)
            }
            var c = t.data(n)
              , d = c.opt
              , f = c.sequential
              , h = e("#mCSB_" + c.idx + "_container")
              , m = "stepped" === f.type ? !0 : !1;
            switch (a) {
            case "on":
                if (f.dir = [o === u[16] || o === u[15] || 39 === o || 37 === o ? "x" : "y", o === u[13] || o === u[15] || 38 === o || 37 === o ? -1 : 1],
                V(t),
                tt(o) && "stepped" === f.type)
                    return;
                l(m);
                break;
            case "off":
                s(),
                (m || c.tweenRunning && f.dir) && l(!0)
            }
        }
          , j = function(t) {
            var a = e(this).data(n).opt
              , o = [];
            return "function" == typeof t && (t = t()),
            t instanceof Array ? o = t.length > 1 ? [t[0], t[1]] : "x" === a.axis ? [null, t[0]] : [t[0], null] : (o[0] = t.y ? t.y : t.x || "x" === a.axis ? null : t,
            o[1] = t.x ? t.x : t.y || "y" === a.axis ? null : t),
            "function" == typeof o[0] && (o[0] = o[0]()),
            "function" == typeof o[1] && (o[1] = o[1]()),
            o
        }
          , Y = function(t, a) {
            if (null != t && "undefined" != typeof t) {
                var o = e(this)
                  , i = o.data(n)
                  , r = i.opt
                  , l = e("#mCSB_" + i.idx + "_container")
                  , s = l.parent()
                  , c = typeof t;
                a || (a = "x" === r.axis ? "x" : "y");
                var d = "x" === a ? l.outerWidth(!1) : l.outerHeight(!1)
                  , u = "x" === a ? l[0].offsetLeft : l[0].offsetTop
                  , h = "x" === a ? "left" : "top";
                switch (c) {
                case "function":
                    return t();
                case "object":
                    var m = t.jquery ? t : e(t);
                    if (!m.length)
                        return;
                    return "x" === a ? at(m)[1] : at(m)[0];
                case "string":
                case "number":
                    if (tt(t))
                        return Math.abs(t);
                    if (-1 !== t.indexOf("%"))
                        return Math.abs(d * parseInt(t) / 100);
                    if (-1 !== t.indexOf("-="))
                        return Math.abs(u - parseInt(t.split("-=")[1]));
                    if (-1 !== t.indexOf("+=")) {
                        var p = u + parseInt(t.split("+=")[1]);
                        return p >= 0 ? 0 : Math.abs(p)
                    }
                    if (-1 !== t.indexOf("px") && tt(t.split("px")[0]))
                        return Math.abs(t.split("px")[0]);
                    if ("top" === t || "left" === t)
                        return 0;
                    if ("bottom" === t)
                        return Math.abs(s.height() - l.outerHeight(!1));
                    if ("right" === t)
                        return Math.abs(s.width() - l.outerWidth(!1));
                    if ("first" === t || "last" === t) {
                        var m = l.find(":" + t);
                        return "x" === a ? at(m)[1] : at(m)[0]
                    }
                    return e(t).length ? "x" === a ? at(e(t))[1] : at(e(t))[0] : (l.css(h, t),
                    void f.update.call(null, o[0]))
                }
            }
        }
          , X = function(t) {
            function a() {
                clearTimeout(h[0].autoUpdate),
                h[0].autoUpdate = setTimeout(function() {
                    return d.advanced.updateOnSelectorChange && (m = r(),
                    m !== S) ? (l(3),
                    void (S = m)) : (d.advanced.updateOnContentResize && (p = [h.outerHeight(!1), h.outerWidth(!1), v.height(), v.width(), _()[0], _()[1]],
                    (p[0] !== w[0] || p[1] !== w[1] || p[2] !== w[2] || p[3] !== w[3] || p[4] !== w[4] || p[5] !== w[5]) && (l(p[0] !== w[0] || p[1] !== w[1]),
                    w = p)),
                    d.advanced.updateOnImageLoad && (g = o(),
                    g !== b && (h.find("img").each(function() {
                        i(this)
                    }),
                    b = g)),
                    void ((d.advanced.updateOnSelectorChange || d.advanced.updateOnContentResize || d.advanced.updateOnImageLoad) && a()))
                }, 60)
            }
            function o() {
                var e = 0;
                return d.advanced.updateOnImageLoad && (e = h.find("img").length),
                e
            }
            function i(t) {
                function a(e, t) {
                    return function() {
                        return t.apply(e, arguments)
                    }
                }
                function o() {
                    this.onload = null,
                    e(t).addClass(u[2]),
                    l(2)
                }
                if (e(t).hasClass(u[2]))
                    return void l();
                var n = new Image;
                n.onload = a(n, o),
                n.src = t.src
            }
            function r() {
                d.advanced.updateOnSelectorChange === !0 && (d.advanced.updateOnSelectorChange = "*");
                var t = 0
                  , a = h.find(d.advanced.updateOnSelectorChange);
                return d.advanced.updateOnSelectorChange && a.length > 0 && a.each(function() {
                    t += e(this).height() + e(this).width()
                }),
                t
            }
            function l(e) {
                clearTimeout(h[0].autoUpdate),
                f.update.call(null, s[0], e)
            }
            var s = e(this)
              , c = s.data(n)
              , d = c.opt
              , h = e("#mCSB_" + c.idx + "_container");
            if (t)
                return clearTimeout(h[0].autoUpdate),
                void Z(h[0], "autoUpdate");
            var m, p, g, v = h.parent(), x = [e("#mCSB_" + c.idx + "_scrollbar_vertical"), e("#mCSB_" + c.idx + "_scrollbar_horizontal")], _ = function() {
                return [x[0].is(":visible") ? x[0].outerHeight(!0) : 0, x[1].is(":visible") ? x[1].outerWidth(!0) : 0]
            }, S = r(), w = [h.outerHeight(!1), h.outerWidth(!1), v.height(), v.width(), _()[0], _()[1]], b = o();
            a()
        }
          , N = function(e, t, a) {
            return Math.round(e / t) * t - a
        }
          , V = function(t) {
            var a = t.data(n)
              , o = e("#mCSB_" + a.idx + "_container,#mCSB_" + a.idx + "_container_wrapper,#mCSB_" + a.idx + "_dragger_vertical,#mCSB_" + a.idx + "_dragger_horizontal");
            o.each(function() {
                K.call(this)
            })
        }
          , Q = function(t, a, o) {
            function i(e) {
                return s && c.callbacks[e] && "function" == typeof c.callbacks[e]
            }
            function r() {
                return [c.callbacks.alwaysTriggerOffsets || _ >= S[0] + b, c.callbacks.alwaysTriggerOffsets || -C >= _]
            }
            function l() {
                var e = [h[0].offsetTop, h[0].offsetLeft]
                  , a = [v[0].offsetTop, v[0].offsetLeft]
                  , n = [h.outerHeight(!1), h.outerWidth(!1)]
                  , i = [f.height(), f.width()];
                t[0].mcs = {
                    content: h,
                    top: e[0],
                    left: e[1],
                    draggerTop: a[0],
                    draggerLeft: a[1],
                    topPct: Math.round(100 * Math.abs(e[0]) / (Math.abs(n[0]) - i[0])),
                    leftPct: Math.round(100 * Math.abs(e[1]) / (Math.abs(n[1]) - i[1])),
                    direction: o.dir
                }
            }
            var s = t.data(n)
              , c = s.opt
              , d = {
                trigger: "internal",
                dir: "y",
                scrollEasing: "mcsEaseOut",
                drag: !1,
                dur: c.scrollInertia,
                overwrite: "all",
                callbacks: !0,
                onStart: !0,
                onUpdate: !0,
                onComplete: !0
            }
              , o = e.extend(d, o)
              , u = [o.dur, o.drag ? 0 : o.dur]
              , f = e("#mCSB_" + s.idx)
              , h = e("#mCSB_" + s.idx + "_container")
              , m = h.parent()
              , p = c.callbacks.onTotalScrollOffset ? j.call(t, c.callbacks.onTotalScrollOffset) : [0, 0]
              , g = c.callbacks.onTotalScrollBackOffset ? j.call(t, c.callbacks.onTotalScrollBackOffset) : [0, 0];
            if (s.trigger = o.trigger,
            (0 !== m.scrollTop() || 0 !== m.scrollLeft()) && (e(".mCSB_" + s.idx + "_scrollbar").css("visibility", "visible"),
            m.scrollTop(0).scrollLeft(0)),
            "_resetY" !== a || s.contentReset.y || (i("onOverflowYNone") && c.callbacks.onOverflowYNone.call(t[0]),
            s.contentReset.y = 1),
            "_resetX" !== a || s.contentReset.x || (i("onOverflowXNone") && c.callbacks.onOverflowXNone.call(t[0]),
            s.contentReset.x = 1),
            "_resetY" !== a && "_resetX" !== a) {
                switch (!s.contentReset.y && t[0].mcs || !s.overflowed[0] || (i("onOverflowY") && c.callbacks.onOverflowY.call(t[0]),
                s.contentReset.x = null),
                !s.contentReset.x && t[0].mcs || !s.overflowed[1] || (i("onOverflowX") && c.callbacks.onOverflowX.call(t[0]),
                s.contentReset.x = null),
                c.snapAmount && (a = N(a, c.snapAmount, c.snapOffset)),
                o.dir) {
                case "x":
                    var v = e("#mCSB_" + s.idx + "_dragger_horizontal")
                      , x = "left"
                      , _ = h[0].offsetLeft
                      , S = [f.width() - h.outerWidth(!1), v.parent().width() - v.width()]
                      , w = [a, 0 === a ? 0 : a / s.scrollRatio.x]
                      , b = p[1]
                      , C = g[1]
                      , y = b > 0 ? b / s.scrollRatio.x : 0
                      , T = C > 0 ? C / s.scrollRatio.x : 0;
                    break;
                case "y":
                    var v = e("#mCSB_" + s.idx + "_dragger_vertical")
                      , x = "top"
                      , _ = h[0].offsetTop
                      , S = [f.height() - h.outerHeight(!1), v.parent().height() - v.height()]
                      , w = [a, 0 === a ? 0 : a / s.scrollRatio.y]
                      , b = p[0]
                      , C = g[0]
                      , y = b > 0 ? b / s.scrollRatio.y : 0
                      , T = C > 0 ? C / s.scrollRatio.y : 0
                }
                w[1] < 0 || 0 === w[0] && 0 === w[1] ? w = [0, 0] : w[1] >= S[1] ? w = [S[0], S[1]] : w[0] = -w[0],
                t[0].mcs || (l(),
                i("onInit") && c.callbacks.onInit.call(t[0])),
                clearTimeout(h[0].onCompleteTimeout),
                (s.tweenRunning || !(0 === _ && w[0] >= 0 || _ === S[0] && w[0] <= S[0])) && (G(v[0], x, Math.round(w[1]), u[1], o.scrollEasing),
                G(h[0], x, Math.round(w[0]), u[0], o.scrollEasing, o.overwrite, {
                    onStart: function() {
                        o.callbacks && o.onStart && !s.tweenRunning && (i("onScrollStart") && (l(),
                        c.callbacks.onScrollStart.call(t[0])),
                        s.tweenRunning = !0,
                        B(v),
                        s.cbOffsets = r())
                    },
                    onUpdate: function() {
                        o.callbacks && o.onUpdate && i("whileScrolling") && (l(),
                        c.callbacks.whileScrolling.call(t[0]))
                    },
                    onComplete: function() {
                        if (o.callbacks && o.onComplete) {
                            "yx" === c.axis && clearTimeout(h[0].onCompleteTimeout);
                            var e = h[0].idleTimer || 0;
                            h[0].onCompleteTimeout = setTimeout(function() {
                                i("onScroll") && (l(),
                                c.callbacks.onScroll.call(t[0])),
                                i("onTotalScroll") && w[1] >= S[1] - y && s.cbOffsets[0] && (l(),
                                c.callbacks.onTotalScroll.call(t[0])),
                                i("onTotalScrollBack") && w[1] <= T && s.cbOffsets[1] && (l(),
                                c.callbacks.onTotalScrollBack.call(t[0])),
                                s.tweenRunning = !1,
                                h[0].idleTimer = 0,
                                B(v, "hide")
                            }, e)
                        }
                    }
                }))
            }
        }
          , G = function(e, a, o, n, i, r, l) {
            function s() {
                b.stop || (_ || p.call(),
                _ = J() - x,
                c(),
                _ >= b.time && (b.time = _ > b.time ? _ + h - (_ - b.time) : _ + h - 1,
                b.time < _ + 1 && (b.time = _ + 1)),
                b.time < n ? b.id = m(s) : v.call())
            }
            function c() {
                n > 0 ? (b.currVal = f(b.time, S, C, n, i),
                w[a] = Math.round(b.currVal) + "px") : w[a] = o + "px",
                g.call()
            }
            function d() {
                h = 1e3 / 60,
                b.time = _ + h,
                m = t.requestAnimationFrame ? t.requestAnimationFrame : function(e) {
                    return c(),
                    setTimeout(e, .01)
                }
                ,
                b.id = m(s)
            }
            function u() {
                null != b.id && (t.requestAnimationFrame ? t.cancelAnimationFrame(b.id) : clearTimeout(b.id),
                b.id = null)
            }
            function f(e, t, a, o, n) {
                switch (n) {
                case "linear":
                case "mcsLinear":
                    return a * e / o + t;
                case "mcsLinearOut":
                    return e /= o,
                    e--,
                    a * Math.sqrt(1 - e * e) + t;
                case "easeInOutSmooth":
                    return e /= o / 2,
                    1 > e ? a / 2 * e * e + t : (e--,
                    -a / 2 * (e * (e - 2) - 1) + t);
                case "easeInOutStrong":
                    return e /= o / 2,
                    1 > e ? a / 2 * Math.pow(2, 10 * (e - 1)) + t : (e--,
                    a / 2 * (-Math.pow(2, -10 * e) + 2) + t);
                case "easeInOut":
                case "mcsEaseInOut":
                    return e /= o / 2,
                    1 > e ? a / 2 * e * e * e + t : (e -= 2,
                    a / 2 * (e * e * e + 2) + t);
                case "easeOutSmooth":
                    return e /= o,
                    e--,
                    -a * (e * e * e * e - 1) + t;
                case "easeOutStrong":
                    return a * (-Math.pow(2, -10 * e / o) + 1) + t;
                case "easeOut":
                case "mcsEaseOut":
                default:
                    var i = (e /= o) * e
                      , r = i * e;
                    return t + a * (.499999999999997 * r * i + -2.5 * i * i + 5.5 * r + -6.5 * i + 4 * e)
                }
            }
            e._mTween || (e._mTween = {
                top: {},
                left: {}
            });
            var h, m, l = l || {}, p = l.onStart || function() {}
            , g = l.onUpdate || function() {}
            , v = l.onComplete || function() {}
            , x = J(), _ = 0, S = e.offsetTop, w = e.style, b = e._mTween[a];
            "left" === a && (S = e.offsetLeft);
            var C = o - S;
            b.stop = 0,
            "none" !== r && u(),
            d()
        }
          , J = function() {
            return t.performance && t.performance.now ? t.performance.now() : t.performance && t.performance.webkitNow ? t.performance.webkitNow() : Date.now ? Date.now() : (new Date).getTime()
        }
          , K = function() {
            var e = this;
            e._mTween || (e._mTween = {
                top: {},
                left: {}
            });
            for (var a = ["top", "left"], o = 0; o < a.length; o++) {
                var n = a[o];
                e._mTween[n].id && (t.requestAnimationFrame ? t.cancelAnimationFrame(e._mTween[n].id) : clearTimeout(e._mTween[n].id),
                e._mTween[n].id = null,
                e._mTween[n].stop = 1)
            }
        }
          , Z = function(e, t) {
            try {
                delete e[t]
            } catch (a) {
                e[t] = null
            }
        }
          , $ = function(e) {
            return !(e.which && 1 !== e.which)
        }
          , et = function(e) {
            var t = e.originalEvent.pointerType;
            return !(t && "touch" !== t && 2 !== t)
        }
          , tt = function(e) {
            return !isNaN(parseFloat(e)) && isFinite(e)
        }
          , at = function(e) {
            var t = e.parents(".mCSB_container");
            return [e.offset().top - t.offset().top, e.offset().left - t.offset().left]
        };
        e.fn[o] = function(t) {
            return f[t] ? f[t].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof t && t ? void e.error("Method " + t + " does not exist") : f.init.apply(this, arguments)
        }
        ,
        e[o] = function(t) {
            return f[t] ? f[t].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof t && t ? void e.error("Method " + t + " does not exist") : f.init.apply(this, arguments)
        }
        ,
        e[o].defaults = r,
        t[o] = !0,
        e(t).load(function() {
            e(i)[o](),
            e.extend(e.expr[":"], {
                mcsInView: e.expr[":"].mcsInView || function(t) {
                    var a, o, n = e(t), i = n.parents(".mCSB_container");
                    if (i.length)
                        return a = i.parent(),
                        o = [i[0].offsetTop, i[0].offsetLeft],
                        o[0] + at(n)[0] >= 0 && o[0] + at(n)[0] < a.height() - n.outerHeight(!1) && o[1] + at(n)[1] >= 0 && o[1] + at(n)[1] < a.width() - n.outerWidth(!1)
                }
                ,
                mcsOverflow: e.expr[":"].mcsOverflow || function(t) {
                    var a = e(t).data(n);
                    if (a)
                        return a.overflowed[0] || a.overflowed[1]
                }
            })
        })
    })
}(jQuery, window, document);
