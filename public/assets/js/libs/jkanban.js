! function e(t, n, o) {
    function i(a, c) {
        if (!n[a]) {
            if (!t[a]) {
                var d = "function" == typeof require && require;
                if (!c && d) return d(a, !0);
                if (r) return r(a, !0);
                var s = new Error("Cannot find module '" + a + "'");
                throw s.code = "MODULE_NOT_FOUND", s
            }
            var l = n[a] = {
                exports: {}
            };
            t[a][0].call(l.exports, (function(e) {
                return i(t[a][1][e] || e)
            }), l, l.exports, e, t, n, o)
        }
        return n[a].exports
    }
    for (var r = "function" == typeof require && require, a = 0; a < o.length; a++) i(o[a]);
    return i
}({
    1: [function(e, t, n) {
        var o = e("dragula");
        ! function() {
            this.jKanban = function() {
                var e = this,
                    t = {
                        enabled: !1
                    };
                this._disallowedItemProperties = ["id", "title", "click", "drag", "dragend", "drop", "order"], this.element = "", this.container = "", this.boardContainer = [], this.handlers = [], this.dragula = o, this.drake = "", this.drakeBoard = "", this.addItemButton = !1;
                var n = {
                    element: "",
                    gutter: "15px",
                    widthBoard: "250px",
                    responsive: "700",
                    responsivePercentage: !(this.buttonContent = "+"),
                    boards: [],
                    dragBoards: !0,
                    dragItems: !0,
                    addItemButton: !1,
                    buttonContent: "+",
                    itemHandleOptions: this.itemHandleOptions = t,
                    dragEl: function(e, t) {},
                    dragendEl: function(e) {},
                    dropEl: function(e, t, n, o) {},
                    dragBoard: function(e, t) {},
                    dragendBoard: function(e) {},
                    dropBoard: function(e, t, n, o) {},
                    click: function(e) {},
                    buttonClick: function(e, t) {}
                };

                function i(t) {
                    t.addEventListener("click", (function(t) {
                        t.preventDefault(), e.options.click(this), "function" == typeof this.clickfn && this.clickfn(this)
                    }))
                }

                function r(t, n) {
                    t.addEventListener("click", (function(t) {
                        t.preventDefault(), e.options.buttonClick(this, n)
                    }))
                }

                function a(t) {
                    var n = [];
                    return e.options.boards.map((function(e) {
                        if (e.id === t) return n.push(e)
                    })), n[0]
                    alert(1);
                }

                function c(t, n) {
                    for (var o in n) - 1 < e._disallowedItemProperties.indexOf(o) || t.setAttribute("data-" + o, n[o])
                }

                function d(t) {
                    var n = t;
                    if (e.options.itemHandleOptions.enabled)
                        if (void 0 === (e.options.itemHandleOptions.customHandler || void 0)) {
                            var o = e.options.itemHandleOptions.customCssHandler,
                                i = e.options.itemHandleOptions.customCssIconHandler;
                            void 0 === (o || void 0) && (o = "drag_handler"), void 0 === (i || void 0) && (i = o + "_icon"), n = "<div class='item_handle " + o + "'><i class='item_handle " + i + "'></i></div><div>" + n + "</div>"
                        } else n = e.options.itemHandleOptions.customHandler.replace("%s", n);
                    return n
                }
                arguments[0] && "object" == typeof arguments[0] && (this.options = function(e, t) {
                    var n;
                    for (n in t) t.hasOwnProperty(n) && (e[n] = t[n]);
                    return e
                }(n, arguments[0])), this.__getCanMove = function(t) {
                    return e.options.itemHandleOptions.enabled ? e.options.itemHandleOptions.handleClass ? t.classList.contains(e.options.itemHandleOptions.handleClass) : t.classList.contains("item_handle") : !!e.options.dragItems
                }, this.init = function() {
                    ! function() {
                        e.element = document.querySelector(e.options.element);
                        var t = document.createElement("div");
                        t.classList.add("kanban-container"), e.container = t, e.addBoards(e.options.boards, !0), e.element.appendChild(e.container)
                    }(), window.innerWidth > e.options.responsive && (e.drakeBoard = e.dragula([e.container], {
                        moves: function(t, n, o, i) {
                            return !!e.options.dragBoards && (o.classList.contains("kanban-board-header") || o.classList.contains("kanban-title-board"))
                        },
                        accepts: function(e, t, n, o) {
                            return t.classList.contains("kanban-container")
                        },
                        revertOnSpill: !0,
                        direction: "horizontal"
                    }).on("drag", (function(t, n) {
                        t.classList.add("is-moving"), e.options.dragBoard(t, n), "function" == typeof t.dragfn && t.dragfn(t, n)
                    })).on("dragend", (function(t) {
                        ! function() {
                            for (var t = 1, n = 0; n < e.container.childNodes.length; n++) e.container.childNodes[n].dataset.order = t++
                        }(), t.classList.remove("is-moving"), e.options.dragendBoard(t), "function" == typeof t.dragendfn && t.dragendfn(t)
                    })).on("drop", (function(t, n, o, i) {
                        t.classList.remove("is-moving"), e.options.dropBoard(t, n, o, i), "function" == typeof t.dropfn && t.dropfn(t, n, o, i)
                    })), e.drake = e.dragula(e.boardContainer, {
                        moves: function(t, n, o, i) {
                            return e.__getCanMove(o)
                        },
                        revertOnSpill: !0
                    }).on("cancel", (function(t, n, o) {
                        e.enableAllBoards()
                    })).on("drag", (function(t, n) {
                        var o = t.getAttribute("class");
                        if ("" !== o && -1 < o.indexOf("not-draggable")) e.drake.cancel(!0);
                        else {
                            t.classList.add("is-moving");
                            var i = a(n.parentNode.dataset.id);
                            void 0 !== i.dragTo && e.options.boards.map((function(t) {
                                -1 === i.dragTo.indexOf(t.id) && t.id !== n.parentNode.dataset.id && e.findBoard(t.id).classList.add("disabled-board")
                            })), e.options.dragEl(t, n), null !== t && "function" == typeof t.dragfn && t.dragfn(t, n)
                        }
                    })).on("dragend", (function(t) {
                        e.options.dragendEl(t), null !== t && "function" == typeof t.dragendfn && t.dragendfn(t)
                    })).on("drop", (function(t, n, o, i) {
                        e.enableAllBoards();
                        var r = a(o.parentNode.dataset.id);
                        void 0 !== r.dragTo && -1 === r.dragTo.indexOf(n.parentNode.dataset.id) && n.parentNode.dataset.id !== o.parentNode.dataset.id && e.drake.cancel(!0), null !== t && (!1 === e.options.dropEl(t, n, o, i) && e.drake.cancel(!0), t.classList.remove("is-moving"), "function" == typeof t.dropfn && t.dropfn(t, n, o, i))
                    })))
                }, this.enableAllBoards = function() {
                    var e = document.querySelectorAll(".kanban-board");
                    if (0 < e.length && void 0 !== e)
                        for (var t = 0; t < e.length; t++) e[t].classList.remove("disabled-board")
                }, this.addElement = function(t, n) {
                    var o = e.element.querySelector('[data-id="' + t + '"] .kanban-drag'),
                        r = document.createElement("div");
                    return r.classList.add("kanban-item"), void 0 !== n.id && "" !== n.id && r.setAttribute("data-eid", n.id), n.class && Array.isArray(n.class) && n.class.forEach((function(e) {
                        r.classList.add(e)
                    })), r.innerHTML = d(n.title), r.clickfn = n.click, r.dragfn = n.drag, r.dragendfn = n.dragend, r.dropfn = n.drop, c(r, n), i(r), e.options.itemHandleOptions.enabled && (r.style.cursor = "default"), o.appendChild(r), e
                }, this.addForm = function(t, n) {
                    var o = e.element.querySelector('[data-id="' + t + '"] .kanban-drag'),
                        i = n.getAttribute("class");
                    return n.setAttribute("class", i + " not-draggable"), o.appendChild(n), e
                }, this.addBoards = function(t, n) {
                    if (e.options.responsivePercentage)
                        if (e.container.style.width = "100%", e.options.gutter = "1%", window.innerWidth > e.options.responsive) var o = (100 - 2 * t.length) / t.length;
                        else o = 100 - 2 * t.length;
                    else o = e.options.widthBoard;
                    var a = e.options.addItemButton,
                        s = e.options.buttonContent;
                    for (var l in t) {
                        var u = t[l];
                        n || e.options.boards.push(u), e.options.responsivePercentage || ("" === e.container.style.width ? e.container.style.width = parseInt(o) + 2 * parseInt(e.options.gutter) + "px" : e.container.style.width = parseInt(e.container.style.width) + parseInt(o) + 2 * parseInt(e.options.gutter) + "px");
                        var f = document.createElement("div");
                        f.dataset.id = u.id, f.dataset.order = e.container.childNodes.length + 1, f.classList.add("kanban-board"), e.options.responsivePercentage ? f.style.width = o + "%" : f.style.width = o, f.style.marginLeft = e.options.gutter, f.style.marginRight = e.options.gutter;
                        var p = document.createElement("header");
                        if ("" !== u.class && void 0 !== u.class) var v = u.class.split(",");
                        else v = [];
                        if (p.classList.add("kanban-board-header"), v.map((function(e) {
                                p.classList.add(e)
                            })), p.innerHTML = '<div class="kanban-title-board">' + u.title + "</div>", a) {
                            var m = document.createElement("BUTTON"),
                                h = document.createTextNode(s);
                            m.setAttribute("class", "kanban-title-button btn btn-default btn-xs"), m.appendChild(h), p.appendChild(m), r(m, u.id)
                        }
                        var g = document.createElement("main");
                        if (g.classList.add("kanban-drag"), "" !== u.bodyClass && void 0 !== u.bodyClass) var b = u.bodyClass.split(",");
                        else b = [];
                        for (var y in b.map((function(e) {
                                g.classList.add(e)
                            })), e.boardContainer.push(g), u.item) {
                            var w = u.item[y],
                                E = document.createElement("div");
                            E.classList.add("kanban-item"), w.id && (E.dataset.eid = w.id), w.class && Array.isArray(w.class) && w.class.forEach((function(e) {
                                E.classList.add(e)
                            })), E.innerHTML = d(w.title), E.clickfn = w.click, E.dragfn = w.drag, E.dragendfn = w.dragend, E.dropfn = w.drop, c(E, w), i(E), e.options.itemHandleOptions.enabled && (E.style.cursor = "default"), g.appendChild(E)
                        }
                        var T = document.createElement("footer");
                        f.appendChild(p), f.appendChild(g), f.appendChild(T), e.container.appendChild(f)
                    }
                    return e
                }, this.findBoard = function(t) {
                    return e.element.querySelector('[data-id="' + t + '"]')
                }, this.getParentBoardID = function(t) {
                    return "string" == typeof t && (t = e.element.querySelector('[data-eid="' + t + '"]')), null === t ? null : t.parentNode.parentNode.dataset.id
                }, this.moveElement = function(e, t, n) {
                    if (e !== this.getParentBoardID(t)) return this.removeElement(t), this.addElement(e, n)
                }, this.replaceElement = function(t, n) {
                    var o = t;
                    return "string" == typeof o && (o = e.element.querySelector('[data-eid="' + t + '"]')), o.innerHTML = n.title, o.clickfn = n.click, o.dragfn = n.drag, o.dragendfn = n.dragend, o.dropfn = n.drop, c(o, n), e
                }, this.findElement = function(t) {
                    return e.element.querySelector('[data-eid="' + t + '"]')
                }, this.getBoardElements = function(t) {
                    return e.element.querySelector('[data-id="' + t + '"] .kanban-drag').childNodes
                }, this.removeElement = function(t) {
                    return "string" == typeof t && (t = e.element.querySelector('[data-eid="' + t + '"]')), null !== t && ("function" == typeof t.remove ? t.remove() : t.parentNode.removeChild(t)), e
                }, this.removeBoard = function(t) {
                    var n = null;
                    "string" == typeof t && (n = e.element.querySelector('[data-id="' + t + '"]')), null !== n && ("function" == typeof n.remove ? n.remove() : n.parentNode.removeChild(n));
                    for (var o = 0; o < e.options.boards.length; o++)
                        if (e.options.boards[o].id === t) {
                            e.options.boards.splice(o, 1);
                            break
                        }
                    return e
                }, this.onButtonClick = function(e) {}, this.init()
            }
        }()
    }, {
        dragula: 9
    }],
    2: [function(e, t, n) {
        t.exports = function(e, t) {
            return Array.prototype.slice.call(e, t)
        }
    }, {}],
    3: [function(e, t, n) {
        "use strict";
        var o = e("ticky");
        t.exports = function(e, t, n) {
            e && o((function() {
                e.apply(n || null, t || [])
            }))
        }
    }, {
        ticky: 11
    }],
    4: [function(e, t, n) {
        "use strict";
        var o = e("atoa"),
            i = e("./debounce");
        t.exports = function(e, t) {
            var n = t || {},
                r = {};
            return void 0 === e && (e = {}), e.on = function(t, n) {
                return r[t] ? r[t].push(n) : r[t] = [n], e
            }, e.once = function(t, n) {
                return n._once = !0, e.on(t, n), e
            }, e.off = function(t, n) {
                var o = arguments.length;
                if (1 === o) delete r[t];
                else if (0 === o) r = {};
                else {
                    var i = r[t];
                    if (!i) return e;
                    i.splice(i.indexOf(n), 1)
                }
                return e
            }, e.emit = function() {
                var t = o(arguments);
                return e.emitterSnapshot(t.shift()).apply(this, t)
            }, e.emitterSnapshot = function(t) {
                var a = (r[t] || []).slice(0);
                return function() {
                    var r = o(arguments),
                        c = this || e;
                    if ("error" === t && !1 !== n.throws && !a.length) throw 1 === r.length ? r[0] : r;
                    return a.forEach((function(o) {
                        n.async ? i(o, r, c) : o.apply(c, r), o._once && e.off(t, o)
                    })), e
                }
            }, e
        }
    }, {
        "./debounce": 3,
        atoa: 2
    }],
    5: [function(e, t, n) {
        (function(n) {
            "use strict";
            var o = e("custom-event"),
                i = e("./eventmap"),
                r = n.document,
                a = function(e, t, n, o) {
                    return e.addEventListener(t, n, o)
                },
                c = function(e, t, n, o) {
                    return e.removeEventListener(t, n, o)
                },
                d = [];

            function s(e, t, n) {
                var o = function(e, t, n) {
                    var o, i;
                    for (o = 0; o < d.length; o++)
                        if ((i = d[o]).element === e && i.type === t && i.fn === n) return o
                }(e, t, n);
                if (o) {
                    var i = d[o].wrapper;
                    return d.splice(o, 1), i
                }
            }
            n.addEventListener || (a = function(e, t, o) {
                return e.attachEvent("on" + t, function(e, t, o) {
                    var i = s(e, t, o) || function(e, t, o) {
                        return function(t) {
                            var i = t || n.event;
                            i.target = i.target || i.srcElement, i.preventDefault = i.preventDefault || function() {
                                i.returnValue = !1
                            }, i.stopPropagation = i.stopPropagation || function() {
                                i.cancelBubble = !0
                            }, i.which = i.which || i.keyCode, o.call(e, i)
                        }
                    }(e, 0, o);
                    return d.push({
                        wrapper: i,
                        element: e,
                        type: t,
                        fn: o
                    }), i
                }(e, t, o))
            }, c = function(e, t, n) {
                var o = s(e, t, n);
                if (o) return e.detachEvent("on" + t, o)
            }), t.exports = {
                add: a,
                remove: c,
                fabricate: function(e, t, n) {
                    var a = -1 === i.indexOf(t) ? new o(t, {
                        detail: n
                    }) : function() {
                        var e;
                        return r.createEvent ? (e = r.createEvent("Event")).initEvent(t, !0, !0) : r.createEventObject && (e = r.createEventObject()), e
                    }();
                    e.dispatchEvent ? e.dispatchEvent(a) : e.fireEvent("on" + t, a)
                }
            }
        }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
    }, {
        "./eventmap": 6,
        "custom-event": 7
    }],
    6: [function(e, t, n) {
        (function(e) {
            "use strict";
            var n = [],
                o = "",
                i = /^on/;
            for (o in e) i.test(o) && n.push(o.slice(2));
            t.exports = n
        }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
    }, {}],
    7: [function(e, t, n) {
        (function(e) {
            var n = e.CustomEvent;
            t.exports = function() {
                try {
                    var e = new n("cat", {
                        detail: {
                            foo: "bar"
                        }
                    });
                    return "cat" === e.type && "bar" === e.detail.foo
                } catch (e) {}
                return !1
            }() ? n : "function" == typeof document.createEvent ? function(e, t) {
                var n = document.createEvent("CustomEvent");
                return t ? n.initCustomEvent(e, t.bubbles, t.cancelable, t.detail) : n.initCustomEvent(e, !1, !1, void 0), n
            } : function(e, t) {
                var n = document.createEventObject();
                return n.type = e, t ? (n.bubbles = Boolean(t.bubbles), n.cancelable = Boolean(t.cancelable), n.detail = t.detail) : (n.bubbles = !1, n.cancelable = !1, n.detail = void 0), n
            }
        }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
    }, {}],
    8: [function(e, t, n) {
        "use strict";
        var o = {};

        function i(e) {
            var t = o[e];
            return t ? t.lastIndex = 0 : o[e] = t = new RegExp("(?:^|\\s)" + e + "(?:\\s|$)", "g"), t
        }
        t.exports = {
            add: function(e, t) {
                var n = e.className;
                n.length ? i(t).test(n) || (e.className += " " + t) : e.className = t
            },
            rm: function(e, t) {
                e.className = e.className.replace(i(t), " ").trim()
            }
        }
    }, {}],
    9: [function(e, t, n) {
        (function(n) {
            "use strict";
            var o = e("contra/emitter"),
                i = e("crossvent"),
                r = e("./classes"),
                a = document,
                c = a.documentElement;

            function d(e, t, o, r) {
                n.navigator.pointerEnabled ? i[t](e, {
                    mouseup: "pointerup",
                    mousedown: "pointerdown",
                    mousemove: "pointermove"
                }[o], r) : n.navigator.msPointerEnabled ? i[t](e, {
                    mouseup: "MSPointerUp",
                    mousedown: "MSPointerDown",
                    mousemove: "MSPointerMove"
                }[o], r) : (i[t](e, {
                    mouseup: "touchend",
                    mousedown: "touchstart",
                    mousemove: "touchmove"
                }[o], r), i[t](e, o, r))
            }

            function s(e) {
                if (void 0 !== e.touches) return e.touches.length;
                if (void 0 !== e.which && 0 !== e.which) return e.which;
                if (void 0 !== e.buttons) return e.buttons;
                var t = e.button;
                return void 0 !== t ? 1 & t ? 1 : 2 & t ? 3 : 4 & t ? 2 : 0 : void 0
            }

            function l(e, t) {
                return void 0 !== n[t] ? n[t] : c.clientHeight ? c[e] : a.body[e]
            }

            function u(e, t, n) {
                var o, i = e || {},
                    r = i.className;
                return i.className += " gu-hide", o = a.elementFromPoint(t, n), i.className = r, o
            }

            function f() {
                return !1
            }

            function p() {
                return !0
            }

            function v(e) {
                return e.width || e.right - e.left
            }

            function m(e) {
                return e.height || e.bottom - e.top
            }

            function h(e) {
                return e.parentNode === a ? null : e.parentNode
            }

            function g(e) {
                return "INPUT" === e.tagName || "TEXTAREA" === e.tagName || "SELECT" === e.tagName || function e(t) {
                    return !!t && ("false" !== t.contentEditable && ("true" === t.contentEditable || e(h(t))))
                }(e)
            }

            function b(e) {
                return e.nextElementSibling || function() {
                    for (var t = e;
                        (t = t.nextSibling) && 1 !== t.nodeType;);
                    return t
                }()
            }

            function y(e, t) {
                var n = function(e) {
                        return e.targetTouches && e.targetTouches.length ? e.targetTouches[0] : e.changedTouches && e.changedTouches.length ? e.changedTouches[0] : e
                    }(t),
                    o = {
                        pageX: "clientX",
                        pageY: "clientY"
                    };
                return e in o && !(e in n) && o[e] in n && (e = o[e]), n[e]
            }
            t.exports = function(e, t) {
                var n, w, E, T, C, k, S, x, L, O, B;
                1 === arguments.length && !1 === Array.isArray(e) && (t = e, e = []);
                var I, N = null,
                    _ = t || {};
                void 0 === _.moves && (_.moves = p), void 0 === _.accepts && (_.accepts = p), void 0 === _.invalid && (_.invalid = function() {
                    return !1
                }), void 0 === _.containers && (_.containers = e || []), void 0 === _.isContainer && (_.isContainer = f), void 0 === _.copy && (_.copy = !1), void 0 === _.copySortSource && (_.copySortSource = !1), void 0 === _.revertOnSpill && (_.revertOnSpill = !1), void 0 === _.removeOnSpill && (_.removeOnSpill = !1), void 0 === _.direction && (_.direction = "vertical"), void 0 === _.ignoreInputTextSelection && (_.ignoreInputTextSelection = !0), void 0 === _.mirrorContainer && (_.mirrorContainer = a.body);
                var A = o({
                    containers: _.containers,
                    start: function(e) {
                        var t = j(e);
                        t && F(t)
                    },
                    end: R,
                    cancel: V,
                    remove: W,
                    destroy: function() {
                        P(!0), K({})
                    },
                    canMove: function(e) {
                        return !!j(e)
                    },
                    dragging: !1
                });
                return !0 === _.removeOnSpill && A.on("over", (function(e) {
                    r.rm(e, "gu-hide")
                })).on("out", (function(e) {
                    A.dragging && r.add(e, "gu-hide")
                })), P(), A;

                function H(e) {
                    return -1 !== A.containers.indexOf(e) || _.isContainer(e)
                }

                function P(e) {
                    var t = e ? "remove" : "add";
                    d(c, t, "mousedown", X), d(c, t, "mouseup", K)
                }

                function q(e) {
                    d(c, e ? "remove" : "add", "mousemove", Y)
                }

                function D(e) {
                    var t = e ? "remove" : "add";
                    i[t](c, "selectstart", M), i[t](c, "click", M)
                }

                function M(e) {
                    I && e.preventDefault()
                }

                function X(e) {
                    if (k = e.clientX, S = e.clientY, 1 === s(e) && !e.metaKey && !e.ctrlKey) {
                        var t = e.target,
                            n = j(t);
                        n && (I = n, q(), "mousedown" === e.type && (g(t) ? t.focus() : e.preventDefault()))
                    }
                }

                function Y(e) {
                    if (I)
                        if (0 !== s(e)) {
                            if (void 0 === e.clientX || e.clientX !== k || void 0 === e.clientY || e.clientY !== S) {
                                if (_.ignoreInputTextSelection) {
                                    var t = y("clientX", e),
                                        o = y("clientY", e);
                                    if (g(a.elementFromPoint(t, o))) return
                                }
                                var i = I;
                                q(!0), D(), R(), F(i);
                                var u = function(e) {
                                    var t = e.getBoundingClientRect();
                                    return {
                                        left: t.left + l("scrollLeft", "pageXOffset"),
                                        top: t.top + l("scrollTop", "pageYOffset")
                                    }
                                }(E);
                                T = y("pageX", e) - u.left, C = y("pageY", e) - u.top, r.add(O || E, "gu-transit"),
                                    function() {
                                        if (!n) {
                                            var e = E.getBoundingClientRect();
                                            (n = E.cloneNode(!0)).style.width = v(e) + "px", n.style.height = m(e) + "px", r.rm(n, "gu-transit"), r.add(n, "gu-mirror"), _.mirrorContainer.appendChild(n), d(c, "add", "mousemove", Q), r.add(_.mirrorContainer, "gu-unselectable"), A.emit("cloned", n, E, "mirror")
                                        }
                                    }(), Q(e)
                            }
                        } else K({})
                }

                function j(e) {
                    if (!(A.dragging && n || H(e))) {
                        for (var t = e; h(e) && !1 === H(h(e));) {
                            if (_.invalid(e, t)) return;
                            if (!(e = h(e))) return
                        }
                        var o = h(e);
                        if (o && !_.invalid(e, t) && _.moves(e, o, t, b(e))) return {
                            item: e,
                            source: o
                        }
                    }
                }

                function F(e) {
                    ! function(e, t) {
                        return "boolean" == typeof _.copy ? _.copy : _.copy(e, t)
                    }(e.item, e.source) || (O = e.item.cloneNode(!0), A.emit("cloned", O, e.item, "copy")), w = e.source, E = e.item, x = L = b(e.item), A.dragging = !0, A.emit("drag", E, w)
                }

                function R() {
                    if (A.dragging) {
                        var e = O || E;
                        z(e, h(e))
                    }
                }

                function U() {
                    q(!(I = !1)), D(!0)
                }

                function K(e) {
                    if (U(), A.dragging) {
                        var t = O || E,
                            o = y("clientX", e),
                            i = y("clientY", e),
                            r = J(u(n, o, i), o, i);
                        r && (O && _.copySortSource || !O || r !== w) ? z(t, r) : _.removeOnSpill ? W() : V()
                    }
                }

                function z(e, t) {
                    var n = h(e);
                    O && _.copySortSource && t === w && n.removeChild(E), G(t) ? A.emit("cancel", e, w, w) : A.emit("drop", e, t, w, L), $()
                }

                function W() {
                    if (A.dragging) {
                        var e = O || E,
                            t = h(e);
                        t && t.removeChild(e), A.emit(O ? "cancel" : "remove", e, t, w), $()
                    }
                }

                function V(e) {
                    if (A.dragging) {
                        var t = 0 < arguments.length ? e : _.revertOnSpill,
                            n = O || E,
                            o = h(n),
                            i = G(o);
                        !1 === i && t && (O ? o && o.removeChild(O) : w.insertBefore(n, x)), i || t ? A.emit("cancel", n, w, w) : A.emit("drop", n, o, w, L), $()
                    }
                }

                function $() {
                    var e = O || E;
                    U(), n && (r.rm(_.mirrorContainer, "gu-unselectable"), d(c, "remove", "mousemove", Q), h(n).removeChild(n), n = null), e && r.rm(e, "gu-transit"), B && clearTimeout(B), A.dragging = !1, N && A.emit("out", e, N, w), A.emit("dragend", e), w = E = O = x = L = B = N = null
                }

                function G(e, t) {
                    var o;
                    return o = void 0 !== t ? t : n ? L : b(O || E), e === w && o === x
                }

                function J(e, t, n) {
                    for (var o = e; o && !i();) o = h(o);
                    return o;

                    function i() {
                        if (!1 === H(o)) return !1;
                        var i = Z(o, e),
                            r = ee(o, i, t, n);
                        return !!G(o, r) || _.accepts(E, o, w, r)
                    }
                }

                function Q(e) {
                    if (n) {
                        e.preventDefault();
                        var t = y("clientX", e),
                            o = y("clientY", e),
                            i = t - T,
                            r = o - C;
                        n.style.left = i + "px", n.style.top = r + "px";
                        var a = O || E,
                            c = u(n, t, o),
                            d = J(c, t, o),
                            s = null !== d && d !== N;
                        !s && null !== d || (N && v("out"), N = d, s && v("over"));
                        var l = h(a);
                        if (d !== w || !O || _.copySortSource) {
                            var f, p = Z(d, c);
                            if (null !== p) f = ee(d, p, t, o);
                            else {
                                if (!0 !== _.revertOnSpill || O) return void(O && l && l.removeChild(a));
                                f = x, d = w
                            }(null === f && s || f !== a && f !== b(a)) && (L = f, d.insertBefore(a, f), A.emit("shadow", a, d, w))
                        } else l && l.removeChild(a)
                    }

                    function v(e) {
                        A.emit(e, a, N, w)
                    }
                }

                function Z(e, t) {
                    for (var n = t; n !== e && h(n) !== e;) n = h(n);
                    return n === c ? null : n
                }

                function ee(e, t, n, o) {
                    var i = "horizontal" === _.direction;
                    return t !== e ? function() {
                        var e = t.getBoundingClientRect();
                        return r(i ? n > e.left + v(e) / 2 : o > e.top + m(e) / 2)
                    }() : function() {
                        var t, r, a, c = e.children.length;
                        for (t = 0; t < c; t++) {
                            if (a = (r = e.children[t]).getBoundingClientRect(), i && a.left + a.width / 2 > n) return r;
                            if (!i && a.top + a.height / 2 > o) return r
                        }
                        return null
                    }();

                    function r(e) {
                        return e ? b(t) : t
                    }
                }
            }
        }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
    }, {
        "./classes": 8,
        "contra/emitter": 4,
        crossvent: 5
    }],
    10: [function(e, t, n) {
        var o, i, r = t.exports = {};

        function a() {
            throw new Error("setTimeout has not been defined")
        }

        function c() {
            throw new Error("clearTimeout has not been defined")
        }

        function d(e) {
            if (o === setTimeout) return setTimeout(e, 0);
            if ((o === a || !o) && setTimeout) return o = setTimeout, setTimeout(e, 0);
            try {
                return o(e, 0)
            } catch (t) {
                try {
                    return o.call(null, e, 0)
                } catch (t) {
                    return o.call(this, e, 0)
                }
            }
        }! function() {
            try {
                o = "function" == typeof setTimeout ? setTimeout : a
            } catch (e) {
                o = a
            }
            try {
                i = "function" == typeof clearTimeout ? clearTimeout : c
            } catch (e) {
                i = c
            }
        }();
        var s, l = [],
            u = !1,
            f = -1;

        function p() {
            u && s && (u = !1, s.length ? l = s.concat(l) : f = -1, l.length && v())
        }

        function v() {
            if (!u) {
                var e = d(p);
                u = !0;
                for (var t = l.length; t;) {
                    for (s = l, l = []; ++f < t;) s && s[f].run();
                    f = -1, t = l.length
                }
                s = null, u = !1,
                    function(e) {
                        if (i === clearTimeout) return clearTimeout(e);
                        if ((i === c || !i) && clearTimeout) return i = clearTimeout, clearTimeout(e);
                        try {
                            i(e)
                        } catch (t) {
                            try {
                                return i.call(null, e)
                            } catch (t) {
                                return i.call(this, e)
                            }
                        }
                    }(e)
            }
        }

        function m(e, t) {
            this.fun = e, this.array = t
        }

        function h() {}
        r.nextTick = function(e) {
            var t = new Array(arguments.length - 1);
            if (1 < arguments.length)
                for (var n = 1; n < arguments.length; n++) t[n - 1] = arguments[n];
            l.push(new m(e, t)), 1 !== l.length || u || d(v)
        }, m.prototype.run = function() {
            this.fun.apply(null, this.array)
        }, r.title = "browser", r.browser = !0, r.env = {}, r.argv = [], r.version = "", r.versions = {}, r.on = h, r.addListener = h, r.once = h, r.off = h, r.removeListener = h, r.removeAllListeners = h, r.emit = h, r.prependListener = h, r.prependOnceListener = h, r.listeners = function(e) {
            return []
        }, r.binding = function(e) {
            throw new Error("process.binding is not supported")
        }, r.cwd = function() {
            return "/"
        }, r.chdir = function(e) {
            throw new Error("process.chdir is not supported")
        }, r.umask = function() {
            return 0
        }
    }, {}],
    11: [function(e, t, n) {
        (function(e) {
            var n;
            n = "function" == typeof e ? function(t) {
                e(t)
            } : function(e) {
                setTimeout(e, 0)
            }, t.exports = n
        }).call(this, e("timers").setImmediate)
    }, {
        timers: 12
    }],
    12: [function(e, t, n) {
        (function(t, o) {
            var i = e("process/browser.js").nextTick,
                r = Function.prototype.apply,
                a = Array.prototype.slice,
                c = {},
                d = 0;

            function s(e, t) {
                this._id = e, this._clearFn = t
            }
            n.setTimeout = function() {
                return new s(r.call(setTimeout, window, arguments), clearTimeout)
            }, n.setInterval = function() {
                return new s(r.call(setInterval, window, arguments), clearInterval)
            }, n.clearTimeout = n.clearInterval = function(e) {
                e.close()
            }, s.prototype.unref = s.prototype.ref = function() {}, s.prototype.close = function() {
                this._clearFn.call(window, this._id)
            }, n.enroll = function(e, t) {
                clearTimeout(e._idleTimeoutId), e._idleTimeout = t
            }, n.unenroll = function(e) {
                clearTimeout(e._idleTimeoutId), e._idleTimeout = -1
            }, n._unrefActive = n.active = function(e) {
                clearTimeout(e._idleTimeoutId);
                var t = e._idleTimeout;
                0 <= t && (e._idleTimeoutId = setTimeout((function() {
                    e._onTimeout && e._onTimeout()
                }), t))
            }, n.setImmediate = "function" == typeof t ? t : function(e) {
                var t = d++,
                    o = !(arguments.length < 2) && a.call(arguments, 1);
                return c[t] = !0, i((function() {
                    c[t] && (o ? e.apply(null, o) : e.call(null), n.clearImmediate(t))
                })), t
            }, n.clearImmediate = "function" == typeof o ? o : function(e) {
                delete c[e]
            }
        }).call(this, e("timers").setImmediate, e("timers").clearImmediate)
    }, {
        "process/browser.js": 10,
        timers: 12
    }]
}, {}, [1]);