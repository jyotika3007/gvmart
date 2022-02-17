! function (e) {
	function n() {
		var n = window.innerHeight,
			t = document.compatMode;
		return (t || !e.support.boxModel) && (n = "CSS1Compat" == t ? document.documentElement.clientHeight : document.body.clientHeight), n
	}
	e(window).scroll(function () {
		var t = n(),
			o = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop,
			i = [];
		e.each(e.cache, function () {
			this.events && this.events.inview && i.push(this.handle.elem)
		}), i.length && e(i).each(function () {
			var n = e(this),
				i = n.offset().top,
				c = n.height(),
				d = n.data("inview") || !1;
			o > i + c || i > o + t ? d && (n.data("inview", !1), n.trigger("inview", [!1])) : i + c > o && (d || (n.data("inview", !0), n.trigger("inview", [!0])))
		})
	}), e(function () {
		e(window).scroll()
	})
}(jQuery);

jQuery.easing.jswing = jQuery.easing.swing, jQuery.extend(jQuery.easing, {
	def: "easeOutQuad",
	swing: function (n, e, t, u, a) {
		return jQuery.easing[jQuery.easing.def](n, e, t, u, a)
	},
	easeInQuad: function (n, e, t, u, a) {
		return u * (e /= a) * e + t
	},
	easeOutQuad: function (n, e, t, u, a) {
		return -u * (e /= a) * (e - 2) + t
	},
	easeInOutQuad: function (n, e, t, u, a) {
		return (e /= a / 2) < 1 ? u / 2 * e * e + t : -u / 2 * (--e * (e - 2) - 1) + t
	},
	easeInCubic: function (n, e, t, u, a) {
		return u * (e /= a) * e * e + t
	},
	easeOutCubic: function (n, e, t, u, a) {
		return u * ((e = e / a - 1) * e * e + 1) + t
	},
	easeInOutCubic: function (n, e, t, u, a) {
		return (e /= a / 2) < 1 ? u / 2 * e * e * e + t : u / 2 * ((e -= 2) * e * e + 2) + t
	},
	easeInQuart: function (n, e, t, u, a) {
		return u * (e /= a) * e * e * e + t
	},
	easeOutQuart: function (n, e, t, u, a) {
		return -u * ((e = e / a - 1) * e * e * e - 1) + t
	},
	easeInOutQuart: function (n, e, t, u, a) {
		return (e /= a / 2) < 1 ? u / 2 * e * e * e * e + t : -u / 2 * ((e -= 2) * e * e * e - 2) + t
	},
	easeInQuint: function (n, e, t, u, a) {
		return u * (e /= a) * e * e * e * e + t
	},
	easeOutQuint: function (n, e, t, u, a) {
		return u * ((e = e / a - 1) * e * e * e * e + 1) + t
	},
	easeInOutQuint: function (n, e, t, u, a) {
		return (e /= a / 2) < 1 ? u / 2 * e * e * e * e * e + t : u / 2 * ((e -= 2) * e * e * e * e + 2) + t
	},
	easeInSine: function (n, e, t, u, a) {
		return -u * Math.cos(e / a * (Math.PI / 2)) + u + t
	},
	easeOutSine: function (n, e, t, u, a) {
		return u * Math.sin(e / a * (Math.PI / 2)) + t
	},
	easeInOutSine: function (n, e, t, u, a) {
		return -u / 2 * (Math.cos(Math.PI * e / a) - 1) + t
	},
	easeInExpo: function (n, e, t, u, a) {
		return 0 == e ? t : u * Math.pow(2, 10 * (e / a - 1)) + t
	},
	easeOutExpo: function (n, e, t, u, a) {
		return e == a ? t + u : u * (-Math.pow(2, -10 * e / a) + 1) + t
	},
	easeInOutExpo: function (n, e, t, u, a) {
		return 0 == e ? t : e == a ? t + u : (e /= a / 2) < 1 ? u / 2 * Math.pow(2, 10 * (e - 1)) + t : u / 2 * (-Math.pow(2, -10 * --e) + 2) + t
	},
	easeInCirc: function (n, e, t, u, a) {
		return -u * (Math.sqrt(1 - (e /= a) * e) - 1) + t
	},
	easeOutCirc: function (n, e, t, u, a) {
		return u * Math.sqrt(1 - (e = e / a - 1) * e) + t
	},
	easeInOutCirc: function (n, e, t, u, a) {
		return (e /= a / 2) < 1 ? -u / 2 * (Math.sqrt(1 - e * e) - 1) + t : u / 2 * (Math.sqrt(1 - (e -= 2) * e) + 1) + t
	},
	easeInElastic: function (n, e, t, u, a) {
		var r = 1.70158,
			i = 0,
			s = u;
		if (0 == e) return t;
		if (1 == (e /= a)) return t + u;
		if (i || (i = .3 * a), s < Math.abs(u)) {
			s = u;
			var r = i / 4
		} else var r = i / (2 * Math.PI) * Math.asin(u / s);
		return -(s * Math.pow(2, 10 * (e -= 1)) * Math.sin((e * a - r) * (2 * Math.PI) / i)) + t
	},
	easeOutElastic: function (n, e, t, u, a) {
		var r = 1.70158,
			i = 0,
			s = u;
		if (0 == e) return t;
		if (1 == (e /= a)) return t + u;
		if (i || (i = .3 * a), s < Math.abs(u)) {
			s = u;
			var r = i / 4
		} else var r = i / (2 * Math.PI) * Math.asin(u / s);
		return s * Math.pow(2, -10 * e) * Math.sin((e * a - r) * (2 * Math.PI) / i) + u + t
	},
	easeInOutElastic: function (n, e, t, u, a) {
		var r = 1.70158,
			i = 0,
			s = u;
		if (0 == e) return t;
		if (2 == (e /= a / 2)) return t + u;
		if (i || (i = a * (.3 * 1.5)), s < Math.abs(u)) {
			s = u;
			var r = i / 4
		} else var r = i / (2 * Math.PI) * Math.asin(u / s);
		return 1 > e ? -.5 * (s * Math.pow(2, 10 * (e -= 1)) * Math.sin((e * a - r) * (2 * Math.PI) / i)) + t : s * Math.pow(2, -10 * (e -= 1)) * Math.sin((e * a - r) * (2 * Math.PI) / i) * .5 + u + t
	},
	easeInBack: function (n, e, t, u, a, r) {
		return void 0 == r && (r = 1.70158), u * (e /= a) * e * ((r + 1) * e - r) + t
	},
	easeOutBack: function (n, e, t, u, a, r) {
		return void 0 == r && (r = 1.70158), u * ((e = e / a - 1) * e * ((r + 1) * e + r) + 1) + t
	},
	easeInOutBack: function (n, e, t, u, a, r) {
		return void 0 == r && (r = 1.70158), (e /= a / 2) < 1 ? u / 2 * (e * e * (((r *= 1.525) + 1) * e - r)) + t : u / 2 * ((e -= 2) * e * (((r *= 1.525) + 1) * e + r) + 2) + t
	},
	easeInBounce: function (n, e, t, u, a) {
		return u - jQuery.easing.easeOutBounce(n, a - e, 0, u, a) + t
	},
	easeOutBounce: function (n, e, t, u, a) {
		return (e /= a) < 1 / 2.75 ? u * (7.5625 * e * e) + t : 2 / 2.75 > e ? u * (7.5625 * (e -= 1.5 / 2.75) * e + .75) + t : 2.5 / 2.75 > e ? u * (7.5625 * (e -= 2.25 / 2.75) * e + .9375) + t : u * (7.5625 * (e -= 2.625 / 2.75) * e + .984375) + t
	},
	easeInOutBounce: function (n, e, t, u, a) {
		return a / 2 > e ? .5 * jQuery.easing.easeInBounce(n, 2 * e, 0, u, a) + t : .5 * jQuery.easing.easeOutBounce(n, 2 * e - a, 0, u, a) + .5 * u + t
	}
});


/**
 * Owl Carousel v2.2.1
 * Copyright 2013-2017 David Deutsch
 * Licensed under  ()
 */
! function (a, b, c, d) {
	function e(b, c) {
		this.settings = null, this.options = a.extend({}, e.Defaults, c), this.$element = a(b), this._handlers = {}, this._plugins = {}, this._supress = {}, this._current = null, this._speed = null, this._coordinates = [], this._breakpoint = null, this._width = null, this._items = [], this._clones = [], this._mergers = [], this._widths = [], this._invalidated = {}, this._pipe = [], this._drag = {
			time: null,
			target: null,
			pointer: null,
			stage: {
				start: null,
				current: null
			},
			direction: null
		}, this._states = {
			current: {},
			tags: {
				initializing: ["busy"],
				animating: ["busy"],
				dragging: ["interacting"]
			}
		}, a.each(["onResize", "onThrottledResize"], a.proxy(function (b, c) {
			this._handlers[c] = a.proxy(this[c], this)
		}, this)), a.each(e.Plugins, a.proxy(function (a, b) {
			this._plugins[a.charAt(0).toLowerCase() + a.slice(1)] = new b(this)
		}, this)), a.each(e.Workers, a.proxy(function (b, c) {
			this._pipe.push({
				filter: c.filter,
				run: a.proxy(c.run, this)
			})
		}, this)), this.setup(), this.initialize()
	}
	e.Defaults = {
		items: 3,
		loop: !1,
		center: !1,
		rewind: !1,
		mouseDrag: !0,
		touchDrag: !0,
		pullDrag: !0,
		freeDrag: !1,
		margin: 0,
		stagePadding: 0,
		merge: !1,
		mergeFit: !0,
		autoWidth: !1,
		startPosition: 0,
		rtl: !1,
		smartSpeed: 250,
		fluidSpeed: !1,
		dragEndSpeed: !1,
		responsive: {},
		responsiveRefreshRate: 200,
		responsiveBaseElement: b,
		fallbackEasing: "swing",
		info: !1,
		nestedItemSelector: !1,
		itemElement: "div",
		stageElement: "div",
		refreshClass: "owl-refresh",
		loadedClass: "owl-loaded",
		loadingClass: "owl-loading",
		rtlClass: "owl-rtl",
		responsiveClass: "owl-responsive",
		dragClass: "owl-drag",
		itemClass: "owl-item",
		stageClass: "owl-stage",
		stageOuterClass: "owl-stage-outer",
		grabClass: "owl-grab"
	}, e.Width = {
		Default: "default",
		Inner: "inner",
		Outer: "outer"
	}, e.Type = {
		Event: "event",
		State: "state"
	}, e.Plugins = {}, e.Workers = [{
		filter: ["width", "settings"],
		run: function () {
			this._width = this.$element.width()
		}
	}, {
		filter: ["width", "items", "settings"],
		run: function (a) {
			a.current = this._items && this._items[this.relative(this._current)]
		}
	}, {
		filter: ["items", "settings"],
		run: function () {
			this.$stage.children(".cloned").remove()
		}
	}, {
		filter: ["width", "items", "settings"],
		run: function (a) {
			var b = this.settings.margin || "",
				c = !this.settings.autoWidth,
				d = this.settings.rtl,
				e = {
					width: "auto",
					"margin-left": d ? b : "",
					"margin-right": d ? "" : b
				};
			!c && this.$stage.children().css(e), a.css = e
		}
	}, {
		filter: ["width", "items", "settings"],
		run: function (a) {
			var b = (this.width() / this.settings.items).toFixed(3) - this.settings.margin,
				c = null,
				d = this._items.length,
				e = !this.settings.autoWidth,
				f = [];
			for (a.items = {
					merge: !1,
					width: b
				}; d--;) c = this._mergers[d], c = this.settings.mergeFit && Math.min(c, this.settings.items) || c, a.items.merge = c > 1 || a.items.merge, f[d] = e ? b * c : this._items[d].width();
			this._widths = f
		}
	}, {
		filter: ["items", "settings"],
		run: function () {
			var b = [],
				c = this._items,
				d = this.settings,
				e = Math.max(2 * d.items, 4),
				f = 2 * Math.ceil(c.length / 2),
				g = d.loop && c.length ? d.rewind ? e : Math.max(e, f) : 0,
				h = "",
				i = "";
			for (g /= 2; g--;) b.push(this.normalize(b.length / 2, !0)), h += c[b[b.length - 1]][0].outerHTML, b.push(this.normalize(c.length - 1 - (b.length - 1) / 2, !0)), i = c[b[b.length - 1]][0].outerHTML + i;
			this._clones = b, a(h).addClass("cloned").appendTo(this.$stage), a(i).addClass("cloned").prependTo(this.$stage)
		}
	}, {
		filter: ["width", "items", "settings"],
		run: function () {
			for (var a = this.settings.rtl ? 1 : -1, b = this._clones.length + this._items.length, c = -1, d = 0, e = 0, f = []; ++c < b;) d = f[c - 1] || 0, e = this._widths[this.relative(c)] + this.settings.margin, f.push(d + e * a);
			this._coordinates = f
		}
	}, {
		filter: ["width", "items", "settings"],
		run: function () {
			var a = this.settings.stagePadding,
				b = this._coordinates,
				c = {
					width: Math.ceil(Math.abs(b[b.length - 1])) + 2 * a,
					"padding-left": a || "",
					"padding-right": a || ""
				};
			this.$stage.css(c)
		}
	}, {
		filter: ["width", "items", "settings"],
		run: function (a) {
			var b = this._coordinates.length,
				c = !this.settings.autoWidth,
				d = this.$stage.children();
			if (c && a.items.merge)
				for (; b--;) a.css.width = this._widths[this.relative(b)], d.eq(b).css(a.css);
			else c && (a.css.width = a.items.width, d.css(a.css))
		}
	}, {
		filter: ["items"],
		run: function () {
			this._coordinates.length < 1 && this.$stage.removeAttr("style")
		}
	}, {
		filter: ["width", "items", "settings"],
		run: function (a) {
			a.current = a.current ? this.$stage.children().index(a.current) : 0, a.current = Math.max(this.minimum(), Math.min(this.maximum(), a.current)), this.reset(a.current)
		}
	}, {
		filter: ["position"],
		run: function () {
			this.animate(this.coordinates(this._current))
		}
	}, {
		filter: ["width", "position", "items", "settings"],
		run: function () {
			var a, b, c, d, e = this.settings.rtl ? 1 : -1,
				f = 2 * this.settings.stagePadding,
				g = this.coordinates(this.current()) + f,
				h = g + this.width() * e,
				i = [];
			for (c = 0, d = this._coordinates.length; c < d; c++) a = this._coordinates[c - 1] || 0, b = Math.abs(this._coordinates[c]) + f * e, (this.op(a, "<=", g) && this.op(a, ">", h) || this.op(b, "<", g) && this.op(b, ">", h)) && i.push(c);
			this.$stage.children(".active").removeClass("active"), this.$stage.children(":eq(" + i.join("), :eq(") + ")").addClass("active"), this.settings.center && (this.$stage.children(".center").removeClass("center"), this.$stage.children().eq(this.current()).addClass("center"))
		}
	}], e.prototype.initialize = function () {
		if (this.enter("initializing"), this.trigger("initialize"), this.$element.toggleClass(this.settings.rtlClass, this.settings.rtl), this.settings.autoWidth && !this.is("pre-loading")) {
			var b, c, e;
			b = this.$element.find("img"), c = this.settings.nestedItemSelector ? "." + this.settings.nestedItemSelector : d, e = this.$element.children(c).width(), b.length && e <= 0 && this.preloadAutoWidthImages(b)
		}
		this.$element.addClass(this.options.loadingClass), this.$stage = a("<" + this.settings.stageElement + ' class="' + this.settings.stageClass + '"/>').wrap('<div class="' + this.settings.stageOuterClass + '"/>'), this.$element.append(this.$stage.parent()), this.replace(this.$element.children().not(this.$stage.parent())), this.$element.is(":visible") ? this.refresh() : this.invalidate("width"), this.$element.removeClass(this.options.loadingClass).addClass(this.options.loadedClass), this.registerEventHandlers(), this.leave("initializing"), this.trigger("initialized")
	}, e.prototype.setup = function () {
		var b = this.viewport(),
			c = this.options.responsive,
			d = -1,
			e = null;
		c ? (a.each(c, function (a) {
			a <= b && a > d && (d = Number(a))
		}), e = a.extend({}, this.options, c[d]), "function" == typeof e.stagePadding && (e.stagePadding = e.stagePadding()), delete e.responsive, e.responsiveClass && this.$element.attr("class", this.$element.attr("class").replace(new RegExp("(" + this.options.responsiveClass + "-)\\S+\\s", "g"), "$1" + d))) : e = a.extend({}, this.options), this.trigger("change", {
			property: {
				name: "settings",
				value: e
			}
		}), this._breakpoint = d, this.settings = e, this.invalidate("settings"), this.trigger("changed", {
			property: {
				name: "settings",
				value: this.settings
			}
		})
	}, e.prototype.optionsLogic = function () {
		this.settings.autoWidth && (this.settings.stagePadding = !1, this.settings.merge = !1)
	}, e.prototype.prepare = function (b) {
		var c = this.trigger("prepare", {
			content: b
		});
		return c.data || (c.data = a("<" + this.settings.itemElement + "/>").addClass(this.options.itemClass).append(b)), this.trigger("prepared", {
			content: c.data
		}), c.data
	}, e.prototype.update = function () {
		for (var b = 0, c = this._pipe.length, d = a.proxy(function (a) {
				return this[a]
			}, this._invalidated), e = {}; b < c;)(this._invalidated.all || a.grep(this._pipe[b].filter, d).length > 0) && this._pipe[b].run(e), b++;
		this._invalidated = {}, !this.is("valid") && this.enter("valid")
	}, e.prototype.width = function (a) {
		switch (a = a || e.Width.Default) {
			case e.Width.Inner:
			case e.Width.Outer:
				return this._width;
			default:
				return this._width - 2 * this.settings.stagePadding + this.settings.margin
		}
	}, e.prototype.refresh = function () {
		this.enter("refreshing"), this.trigger("refresh"), this.setup(), this.optionsLogic(), this.$element.addClass(this.options.refreshClass), this.update(), this.$element.removeClass(this.options.refreshClass), this.leave("refreshing"), this.trigger("refreshed")
	}, e.prototype.onThrottledResize = function () {
		b.clearTimeout(this.resizeTimer), this.resizeTimer = b.setTimeout(this._handlers.onResize, this.settings.responsiveRefreshRate)
	}, e.prototype.onResize = function () {
		return !!this._items.length && (this._width !== this.$element.width() && (!!this.$element.is(":visible") && (this.enter("resizing"), this.trigger("resize").isDefaultPrevented() ? (this.leave("resizing"), !1) : (this.invalidate("width"), this.refresh(), this.leave("resizing"), void this.trigger("resized")))))
	}, e.prototype.registerEventHandlers = function () {
		a.support.transition && this.$stage.on(a.support.transition.end + ".owl.core", a.proxy(this.onTransitionEnd, this)), this.settings.responsive !== !1 && this.on(b, "resize", this._handlers.onThrottledResize), this.settings.mouseDrag && (this.$element.addClass(this.options.dragClass), this.$stage.on("mousedown.owl.core", a.proxy(this.onDragStart, this)), this.$stage.on("dragstart.owl.core selectstart.owl.core", function () {
			return !1
		})), this.settings.touchDrag && (this.$stage.on("touchstart.owl.core", a.proxy(this.onDragStart, this)), this.$stage.on("touchcancel.owl.core", a.proxy(this.onDragEnd, this)))
	}, e.prototype.onDragStart = function (b) {
		var d = null;
		3 !== b.which && (a.support.transform ? (d = this.$stage.css("transform").replace(/.*\(|\)| /g, "").split(","), d = {
			x: d[16 === d.length ? 12 : 4],
			y: d[16 === d.length ? 13 : 5]
		}) : (d = this.$stage.position(), d = {
			x: this.settings.rtl ? d.left + this.$stage.width() - this.width() + this.settings.margin : d.left,
			y: d.top
		}), this.is("animating") && (a.support.transform ? this.animate(d.x) : this.$stage.stop(), this.invalidate("position")), this.$element.toggleClass(this.options.grabClass, "mousedown" === b.type), this.speed(0), this._drag.time = (new Date).getTime(), this._drag.target = a(b.target), this._drag.stage.start = d, this._drag.stage.current = d, this._drag.pointer = this.pointer(b), a(c).on("mouseup.owl.core touchend.owl.core", a.proxy(this.onDragEnd, this)), a(c).one("mousemove.owl.core touchmove.owl.core", a.proxy(function (b) {
			var d = this.difference(this._drag.pointer, this.pointer(b));
			a(c).on("mousemove.owl.core touchmove.owl.core", a.proxy(this.onDragMove, this)), Math.abs(d.x) < Math.abs(d.y) && this.is("valid") || (b.preventDefault(), this.enter("dragging"), this.trigger("drag"))
		}, this)))
	}, e.prototype.onDragMove = function (a) {
		var b = null,
			c = null,
			d = null,
			e = this.difference(this._drag.pointer, this.pointer(a)),
			f = this.difference(this._drag.stage.start, e);
		this.is("dragging") && (a.preventDefault(), this.settings.loop ? (b = this.coordinates(this.minimum()), c = this.coordinates(this.maximum() + 1) - b, f.x = ((f.x - b) % c + c) % c + b) : (b = this.settings.rtl ? this.coordinates(this.maximum()) : this.coordinates(this.minimum()), c = this.settings.rtl ? this.coordinates(this.minimum()) : this.coordinates(this.maximum()), d = this.settings.pullDrag ? -1 * e.x / 5 : 0, f.x = Math.max(Math.min(f.x, b + d), c + d)), this._drag.stage.current = f, this.animate(f.x))
	}, e.prototype.onDragEnd = function (b) {
		var d = this.difference(this._drag.pointer, this.pointer(b)),
			e = this._drag.stage.current,
			f = d.x > 0 ^ this.settings.rtl ? "left" : "right";
		a(c).off(".owl.core"), this.$element.removeClass(this.options.grabClass), (0 !== d.x && this.is("dragging") || !this.is("valid")) && (this.speed(this.settings.dragEndSpeed || this.settings.smartSpeed), this.current(this.closest(e.x, 0 !== d.x ? f : this._drag.direction)), this.invalidate("position"), this.update(), this._drag.direction = f, (Math.abs(d.x) > 3 || (new Date).getTime() - this._drag.time > 300) && this._drag.target.one("click.owl.core", function () {
			return !1
		})), this.is("dragging") && (this.leave("dragging"), this.trigger("dragged"))
	}, e.prototype.closest = function (b, c) {
		var d = -1,
			e = 30,
			f = this.width(),
			g = this.coordinates();
		return this.settings.freeDrag || a.each(g, a.proxy(function (a, h) {
			return "left" === c && b > h - e && b < h + e ? d = a : "right" === c && b > h - f - e && b < h - f + e ? d = a + 1 : this.op(b, "<", h) && this.op(b, ">", g[a + 1] || h - f) && (d = "left" === c ? a + 1 : a), d === -1
		}, this)), this.settings.loop || (this.op(b, ">", g[this.minimum()]) ? d = b = this.minimum() : this.op(b, "<", g[this.maximum()]) && (d = b = this.maximum())), d
	}, e.prototype.animate = function (b) {
		var c = this.speed() > 0;
		this.is("animating") && this.onTransitionEnd(), c && (this.enter("animating"), this.trigger("translate")), a.support.transform3d && a.support.transition ? this.$stage.css({
			transform: "translate3d(" + b + "px,0px,0px)",
			transition: this.speed() / 1e3 + "s"
		}) : c ? this.$stage.animate({
			left: b + "px"
		}, this.speed(), this.settings.fallbackEasing, a.proxy(this.onTransitionEnd, this)) : this.$stage.css({
			left: b + "px"
		})
	}, e.prototype.is = function (a) {
		return this._states.current[a] && this._states.current[a] > 0
	}, e.prototype.current = function (a) {
		if (a === d) return this._current;
		if (0 === this._items.length) return d;
		if (a = this.normalize(a), this._current !== a) {
			var b = this.trigger("change", {
				property: {
					name: "position",
					value: a
				}
			});
			b.data !== d && (a = this.normalize(b.data)), this._current = a, this.invalidate("position"), this.trigger("changed", {
				property: {
					name: "position",
					value: this._current
				}
			})
		}
		return this._current
	}, e.prototype.invalidate = function (b) {
		return "string" === a.type(b) && (this._invalidated[b] = !0, this.is("valid") && this.leave("valid")), a.map(this._invalidated, function (a, b) {
			return b
		})
	}, e.prototype.reset = function (a) {
		a = this.normalize(a), a !== d && (this._speed = 0, this._current = a, this.suppress(["translate", "translated"]), this.animate(this.coordinates(a)), this.release(["translate", "translated"]))
	}, e.prototype.normalize = function (a, b) {
		var c = this._items.length,
			e = b ? 0 : this._clones.length;
		return !this.isNumeric(a) || c < 1 ? a = d : (a < 0 || a >= c + e) && (a = ((a - e / 2) % c + c) % c + e / 2), a
	}, e.prototype.relative = function (a) {
		return a -= this._clones.length / 2, this.normalize(a, !0)
	}, e.prototype.maximum = function (a) {
		var b, c, d, e = this.settings,
			f = this._coordinates.length;
		if (e.loop) f = this._clones.length / 2 + this._items.length - 1;
		else if (e.autoWidth || e.merge) {
			for (b = this._items.length, c = this._items[--b].width(), d = this.$element.width(); b-- && (c += this._items[b].width() + this.settings.margin, !(c > d)););
			f = b + 1
		} else f = e.center ? this._items.length - 1 : this._items.length - e.items;
		return a && (f -= this._clones.length / 2), Math.max(f, 0)
	}, e.prototype.minimum = function (a) {
		return a ? 0 : this._clones.length / 2
	}, e.prototype.items = function (a) {
		return a === d ? this._items.slice() : (a = this.normalize(a, !0), this._items[a])
	}, e.prototype.mergers = function (a) {
		return a === d ? this._mergers.slice() : (a = this.normalize(a, !0), this._mergers[a])
	}, e.prototype.clones = function (b) {
		var c = this._clones.length / 2,
			e = c + this._items.length,
			f = function (a) {
				return a % 2 === 0 ? e + a / 2 : c - (a + 1) / 2
			};
		return b === d ? a.map(this._clones, function (a, b) {
			return f(b)
		}) : a.map(this._clones, function (a, c) {
			return a === b ? f(c) : null
		})
	}, e.prototype.speed = function (a) {
		return a !== d && (this._speed = a), this._speed
	}, e.prototype.coordinates = function (b) {
		var c, e = 1,
			f = b - 1;
		return b === d ? a.map(this._coordinates, a.proxy(function (a, b) {
			return this.coordinates(b)
		}, this)) : (this.settings.center ? (this.settings.rtl && (e = -1, f = b + 1), c = this._coordinates[b], c += (this.width() - c + (this._coordinates[f] || 0)) / 2 * e) : c = this._coordinates[f] || 0, c = Math.ceil(c))
	}, e.prototype.duration = function (a, b, c) {
		return 0 === c ? 0 : Math.min(Math.max(Math.abs(b - a), 1), 6) * Math.abs(c || this.settings.smartSpeed)
	}, e.prototype.to = function (a, b) {
		var c = this.current(),
			d = null,
			e = a - this.relative(c),
			f = (e > 0) - (e < 0),
			g = this._items.length,
			h = this.minimum(),
			i = this.maximum();
		this.settings.loop ? (!this.settings.rewind && Math.abs(e) > g / 2 && (e += f * -1 * g), a = c + e, d = ((a - h) % g + g) % g + h, d !== a && d - e <= i && d - e > 0 && (c = d - e, a = d, this.reset(c))) : this.settings.rewind ? (i += 1, a = (a % i + i) % i) : a = Math.max(h, Math.min(i, a)), this.speed(this.duration(c, a, b)), this.current(a), this.$element.is(":visible") && this.update()
	}, e.prototype.next = function (a) {
		a = a || !1, this.to(this.relative(this.current()) + 1, a)
	}, e.prototype.prev = function (a) {
		a = a || !1, this.to(this.relative(this.current()) - 1, a)
	}, e.prototype.onTransitionEnd = function (a) {
		if (a !== d && (a.stopPropagation(), (a.target || a.srcElement || a.originalTarget) !== this.$stage.get(0))) return !1;
		this.leave("animating"), this.trigger("translated")
	}, e.prototype.viewport = function () {
		var d;
		return this.options.responsiveBaseElement !== b ? d = a(this.options.responsiveBaseElement).width() : b.innerWidth ? d = b.innerWidth : c.documentElement && c.documentElement.clientWidth ? d = c.documentElement.clientWidth : console.warn("Can not detect viewport width."), d
	}, e.prototype.replace = function (b) {
		this.$stage.empty(), this._items = [], b && (b = b instanceof jQuery ? b : a(b)), this.settings.nestedItemSelector && (b = b.find("." + this.settings.nestedItemSelector)), b.filter(function () {
			return 1 === this.nodeType
		}).each(a.proxy(function (a, b) {
			b = this.prepare(b), this.$stage.append(b), this._items.push(b), this._mergers.push(1 * b.find("[data-merge]").addBack("[data-merge]").attr("data-merge") || 1)
		}, this)), this.reset(this.isNumeric(this.settings.startPosition) ? this.settings.startPosition : 0), this.invalidate("items")
	}, e.prototype.add = function (b, c) {
		var e = this.relative(this._current);
		c = c === d ? this._items.length : this.normalize(c, !0), b = b instanceof jQuery ? b : a(b), this.trigger("add", {
			content: b,
			position: c
		}), b = this.prepare(b), 0 === this._items.length || c === this._items.length ? (0 === this._items.length && this.$stage.append(b), 0 !== this._items.length && this._items[c - 1].after(b), this._items.push(b), this._mergers.push(1 * b.find("[data-merge]").addBack("[data-merge]").attr("data-merge") || 1)) : (this._items[c].before(b), this._items.splice(c, 0, b), this._mergers.splice(c, 0, 1 * b.find("[data-merge]").addBack("[data-merge]").attr("data-merge") || 1)), this._items[e] && this.reset(this._items[e].index()), this.invalidate("items"), this.trigger("added", {
			content: b,
			position: c
		})
	}, e.prototype.remove = function (a) {
		a = this.normalize(a, !0), a !== d && (this.trigger("remove", {
			content: this._items[a],
			position: a
		}), this._items[a].remove(), this._items.splice(a, 1), this._mergers.splice(a, 1), this.invalidate("items"), this.trigger("removed", {
			content: null,
			position: a
		}))
	}, e.prototype.preloadAutoWidthImages = function (b) {
		b.each(a.proxy(function (b, c) {
			this.enter("pre-loading"), c = a(c), a(new Image).one("load", a.proxy(function (a) {
				c.attr("src", a.target.src), c.css("opacity", 1), this.leave("pre-loading"), !this.is("pre-loading") && !this.is("initializing") && this.refresh()
			}, this)).attr("src", c.attr("src") || c.attr("data-src") || c.attr("data-src-retina"))
		}, this))
	}, e.prototype.destroy = function () {
		this.$element.off(".owl.core"), this.$stage.off(".owl.core"), a(c).off(".owl.core"), this.settings.responsive !== !1 && (b.clearTimeout(this.resizeTimer), this.off(b, "resize", this._handlers.onThrottledResize));
		for (var d in this._plugins) this._plugins[d].destroy();
		this.$stage.children(".cloned").remove(), this.$stage.unwrap(), this.$stage.children().contents().unwrap(), this.$stage.children().unwrap(), this.$element.removeClass(this.options.refreshClass).removeClass(this.options.loadingClass).removeClass(this.options.loadedClass).removeClass(this.options.rtlClass).removeClass(this.options.dragClass).removeClass(this.options.grabClass).attr("class", this.$element.attr("class").replace(new RegExp(this.options.responsiveClass + "-\\S+\\s", "g"), "")).removeData("owl.carousel")
	}, e.prototype.op = function (a, b, c) {
		var d = this.settings.rtl;
		switch (b) {
			case "<":
				return d ? a > c : a < c;
			case ">":
				return d ? a < c : a > c;
			case ">=":
				return d ? a <= c : a >= c;
			case "<=":
				return d ? a >= c : a <= c
		}
	}, e.prototype.on = function (a, b, c, d) {
		a.addEventListener ? a.addEventListener(b, c, d) : a.attachEvent && a.attachEvent("on" + b, c)
	}, e.prototype.off = function (a, b, c, d) {
		a.removeEventListener ? a.removeEventListener(b, c, d) : a.detachEvent && a.detachEvent("on" + b, c)
	}, e.prototype.trigger = function (b, c, d, f, g) {
		var h = {
				item: {
					count: this._items.length,
					index: this.current()
				}
			},
			i = a.camelCase(a.grep(["on", b, d], function (a) {
				return a
			}).join("-").toLowerCase()),
			j = a.Event([b, "owl", d || "carousel"].join(".").toLowerCase(), a.extend({
				relatedTarget: this
			}, h, c));
		return this._supress[b] || (a.each(this._plugins, function (a, b) {
			b.onTrigger && b.onTrigger(j)
		}), this.register({
			type: e.Type.Event,
			name: b
		}), this.$element.trigger(j), this.settings && "function" == typeof this.settings[i] && this.settings[i].call(this, j)), j
	}, e.prototype.enter = function (b) {
		a.each([b].concat(this._states.tags[b] || []), a.proxy(function (a, b) {
			this._states.current[b] === d && (this._states.current[b] = 0), this._states.current[b]++
		}, this))
	}, e.prototype.leave = function (b) {
		a.each([b].concat(this._states.tags[b] || []), a.proxy(function (a, b) {
			this._states.current[b]--
		}, this))
	}, e.prototype.register = function (b) {
		if (b.type === e.Type.Event) {
			if (a.event.special[b.name] || (a.event.special[b.name] = {}), !a.event.special[b.name].owl) {
				var c = a.event.special[b.name]._default;
				a.event.special[b.name]._default = function (a) {
					return !c || !c.apply || a.namespace && a.namespace.indexOf("owl") !== -1 ? a.namespace && a.namespace.indexOf("owl") > -1 : c.apply(this, arguments)
				}, a.event.special[b.name].owl = !0
			}
		} else b.type === e.Type.State && (this._states.tags[b.name] ? this._states.tags[b.name] = this._states.tags[b.name].concat(b.tags) : this._states.tags[b.name] = b.tags, this._states.tags[b.name] = a.grep(this._states.tags[b.name], a.proxy(function (c, d) {
			return a.inArray(c, this._states.tags[b.name]) === d
		}, this)))
	}, e.prototype.suppress = function (b) {
		a.each(b, a.proxy(function (a, b) {
			this._supress[b] = !0
		}, this))
	}, e.prototype.release = function (b) {
		a.each(b, a.proxy(function (a, b) {
			delete this._supress[b]
		}, this))
	}, e.prototype.pointer = function (a) {
		var c = {
			x: null,
			y: null
		};
		return a = a.originalEvent || a || b.event, a = a.touches && a.touches.length ? a.touches[0] : a.changedTouches && a.changedTouches.length ? a.changedTouches[0] : a, a.pageX ? (c.x = a.pageX, c.y = a.pageY) : (c.x = a.clientX, c.y = a.clientY), c
	}, e.prototype.isNumeric = function (a) {
		return !isNaN(parseFloat(a))
	}, e.prototype.difference = function (a, b) {
		return {
			x: a.x - b.x,
			y: a.y - b.y
		}
	}, a.fn.owlCarousel = function (b) {
		var c = Array.prototype.slice.call(arguments, 1);
		return this.each(function () {
			var d = a(this),
				f = d.data("owl.carousel");
			f || (f = new e(this, "object" == typeof b && b), d.data("owl.carousel", f), a.each(["next", "prev", "to", "destroy", "refresh", "replace", "add", "remove"], function (b, c) {
				f.register({
					type: e.Type.Event,
					name: c
				}), f.$element.on(c + ".owl.carousel.core", a.proxy(function (a) {
					a.namespace && a.relatedTarget !== this && (this.suppress([c]), f[c].apply(this, [].slice.call(arguments, 1)), this.release([c]))
				}, f))
			})), "string" == typeof b && "_" !== b.charAt(0) && f[b].apply(f, c)
		})
	}, a.fn.owlCarousel.Constructor = e
}(window.Zepto || window.jQuery, window, document),
function (a, b, c, d) {
	var e = function (b) {
		this._core = b, this._interval = null, this._visible = null, this._handlers = {
			"initialized.owl.carousel": a.proxy(function (a) {
				a.namespace && this._core.settings.autoRefresh && this.watch()
			}, this)
		}, this._core.options = a.extend({}, e.Defaults, this._core.options), this._core.$element.on(this._handlers)
	};
	e.Defaults = {
		autoRefresh: !0,
		autoRefreshInterval: 500
	}, e.prototype.watch = function () {
		this._interval || (this._visible = this._core.$element.is(":visible"), this._interval = b.setInterval(a.proxy(this.refresh, this), this._core.settings.autoRefreshInterval))
	}, e.prototype.refresh = function () {
		this._core.$element.is(":visible") !== this._visible && (this._visible = !this._visible, this._core.$element.toggleClass("owl-hidden", !this._visible), this._visible && this._core.invalidate("width") && this._core.refresh())
	}, e.prototype.destroy = function () {
		var a, c;
		b.clearInterval(this._interval);
		for (a in this._handlers) this._core.$element.off(a, this._handlers[a]);
		for (c in Object.getOwnPropertyNames(this)) "function" != typeof this[c] && (this[c] = null)
	}, a.fn.owlCarousel.Constructor.Plugins.AutoRefresh = e
}(window.Zepto || window.jQuery, window, document),
function (a, b, c, d) {
	var e = function (b) {
		this._core = b, this._loaded = [], this._handlers = {
			"initialized.owl.carousel change.owl.carousel resized.owl.carousel": a.proxy(function (b) {
				if (b.namespace && this._core.settings && this._core.settings.lazyLoad && (b.property && "position" == b.property.name || "initialized" == b.type))
					for (var c = this._core.settings, e = c.center && Math.ceil(c.items / 2) || c.items, f = c.center && e * -1 || 0, g = (b.property && b.property.value !== d ? b.property.value : this._core.current()) + f, h = this._core.clones().length, i = a.proxy(function (a, b) {
							this.load(b)
						}, this); f++ < e;) this.load(h / 2 + this._core.relative(g)), h && a.each(this._core.clones(this._core.relative(g)), i), g++
			}, this)
		}, this._core.options = a.extend({}, e.Defaults, this._core.options), this._core.$element.on(this._handlers)
	};
	e.Defaults = {
		lazyLoad: !1
	}, e.prototype.load = function (c) {
		var d = this._core.$stage.children().eq(c),
			e = d && d.find(".owl-lazy");
		!e || a.inArray(d.get(0), this._loaded) > -1 || (e.each(a.proxy(function (c, d) {
			var e, f = a(d),
				g = b.devicePixelRatio > 1 && f.attr("data-src-retina") || f.attr("data-src");
			this._core.trigger("load", {
				element: f,
				url: g
			}, "lazy"), f.is("img") ? f.one("load.owl.lazy", a.proxy(function () {
				f.css("opacity", 1), this._core.trigger("loaded", {
					element: f,
					url: g
				}, "lazy")
			}, this)).attr("src", g) : (e = new Image, e.onload = a.proxy(function () {
				f.css({
					"background-image": 'url("' + g + '")',
					opacity: "1"
				}), this._core.trigger("loaded", {
					element: f,
					url: g
				}, "lazy")
			}, this), e.src = g)
		}, this)), this._loaded.push(d.get(0)))
	}, e.prototype.destroy = function () {
		var a, b;
		for (a in this.handlers) this._core.$element.off(a, this.handlers[a]);
		for (b in Object.getOwnPropertyNames(this)) "function" != typeof this[b] && (this[b] = null)
	}, a.fn.owlCarousel.Constructor.Plugins.Lazy = e
}(window.Zepto || window.jQuery, window, document),
function (a, b, c, d) {
	var e = function (b) {
		this._core = b, this._handlers = {
			"initialized.owl.carousel refreshed.owl.carousel": a.proxy(function (a) {
				a.namespace && this._core.settings.autoHeight && this.update()
			}, this),
			"changed.owl.carousel": a.proxy(function (a) {
				a.namespace && this._core.settings.autoHeight && "position" == a.property.name && this.update()
			}, this),
			"loaded.owl.lazy": a.proxy(function (a) {
				a.namespace && this._core.settings.autoHeight && a.element.closest("." + this._core.settings.itemClass).index() === this._core.current() && this.update()
			}, this)
		}, this._core.options = a.extend({}, e.Defaults, this._core.options), this._core.$element.on(this._handlers)
	};
	e.Defaults = {
		autoHeight: !1,
		autoHeightClass: "owl-height"
	}, e.prototype.update = function () {
		var b = this._core._current,
			c = b + this._core.settings.items,
			d = this._core.$stage.children().toArray().slice(b, c),
			e = [],
			f = 0;
		a.each(d, function (b, c) {
			e.push(a(c).height())
		}), f = Math.max.apply(null, e), this._core.$stage.parent().height(f).addClass(this._core.settings.autoHeightClass)
	}, e.prototype.destroy = function () {
		var a, b;
		for (a in this._handlers) this._core.$element.off(a, this._handlers[a]);
		for (b in Object.getOwnPropertyNames(this)) "function" != typeof this[b] && (this[b] = null)
	}, a.fn.owlCarousel.Constructor.Plugins.AutoHeight = e
}(window.Zepto || window.jQuery, window, document),
function (a, b, c, d) {
	var e = function (b) {
		this._core = b, this._videos = {}, this._playing = null, this._handlers = {
			"initialized.owl.carousel": a.proxy(function (a) {
				a.namespace && this._core.register({
					type: "state",
					name: "playing",
					tags: ["interacting"]
				})
			}, this),
			"resize.owl.carousel": a.proxy(function (a) {
				a.namespace && this._core.settings.video && this.isInFullScreen() && a.preventDefault()
			}, this),
			"refreshed.owl.carousel": a.proxy(function (a) {
				a.namespace && this._core.is("resizing") && this._core.$stage.find(".cloned .owl-video-frame").remove()
			}, this),
			"changed.owl.carousel": a.proxy(function (a) {
				a.namespace && "position" === a.property.name && this._playing && this.stop()
			}, this),
			"prepared.owl.carousel": a.proxy(function (b) {
				if (b.namespace) {
					var c = a(b.content).find(".owl-video");
					c.length && (c.css("display", "none"), this.fetch(c, a(b.content)))
				}
			}, this)
		}, this._core.options = a.extend({}, e.Defaults, this._core.options), this._core.$element.on(this._handlers), this._core.$element.on("click.owl.video", ".owl-video-play-icon", a.proxy(function (a) {
			this.play(a)
		}, this))
	};
	e.Defaults = {
		video: !1,
		videoHeight: !1,
		videoWidth: !1
	}, e.prototype.fetch = function (a, b) {
		var c = function () {
				return a.attr("data-vimeo-id") ? "vimeo" : a.attr("data-vzaar-id") ? "vzaar" : "youtube"
			}(),
			d = a.attr("data-vimeo-id") || a.attr("data-youtube-id") || a.attr("data-vzaar-id"),
			e = a.attr("data-width") || this._core.settings.videoWidth,
			f = a.attr("data-height") || this._core.settings.videoHeight,
			g = a.attr("href");
		if (!g) throw new Error("Missing video URL.");
		if (d = g.match(/(http:|https:|)\/\/(player.|www.|app.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com)|vzaar\.com)\/(video\/|videos\/|embed\/|channels\/.+\/|groups\/.+\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/), d[3].indexOf("youtu") > -1) c = "youtube";
		else if (d[3].indexOf("vimeo") > -1) c = "vimeo";
		else {
			if (!(d[3].indexOf("vzaar") > -1)) throw new Error("Video URL not supported.");
			c = "vzaar"
		}
		d = d[6], this._videos[g] = {
			type: c,
			id: d,
			width: e,
			height: f
		}, b.attr("data-video", g), this.thumbnail(a, this._videos[g])
	}, e.prototype.thumbnail = function (b, c) {
		var d, e, f, g = c.width && c.height ? 'style="width:' + c.width + "px;height:" + c.height + 'px;"' : "",
			h = b.find("img"),
			i = "src",
			j = "",
			k = this._core.settings,
			l = function (a) {
				e = '<div class="owl-video-play-icon"></div>', d = k.lazyLoad ? '<div class="owl-video-tn ' + j + '" ' + i + '="' + a + '"></div>' : '<div class="owl-video-tn" style="opacity:1;background-image:url(' + a + ')"></div>', b.after(d), b.after(e)
			};
		if (b.wrap('<div class="owl-video-wrapper"' + g + "></div>"), this._core.settings.lazyLoad && (i = "data-src", j = "owl-lazy"), h.length) return l(h.attr(i)), h.remove(), !1;
		"youtube" === c.type ? (f = "//img.youtube.com/vi/" + c.id + "/hqdefault.jpg", l(f)) : "vimeo" === c.type ? a.ajax({
			type: "GET",
			url: "//vimeo.com/api/v2/video/" + c.id + ".json",
			jsonp: "callback",
			dataType: "jsonp",
			success: function (a) {
				f = a[0].thumbnail_large, l(f)
			}
		}) : "vzaar" === c.type && a.ajax({
			type: "GET",
			url: "//vzaar.com/api/videos/" + c.id + ".json",
			jsonp: "callback",
			dataType: "jsonp",
			success: function (a) {
				f = a.framegrab_url, l(f)
			}
		})
	}, e.prototype.stop = function () {
		this._core.trigger("stop", null, "video"), this._playing.find(".owl-video-frame").remove(), this._playing.removeClass("owl-video-playing"), this._playing = null, this._core.leave("playing"), this._core.trigger("stopped", null, "video")
	}, e.prototype.play = function (b) {
		var c, d = a(b.target),
			e = d.closest("." + this._core.settings.itemClass),
			f = this._videos[e.attr("data-video")],
			g = f.width || "100%",
			h = f.height || this._core.$stage.height();
		this._playing || (this._core.enter("playing"), this._core.trigger("play", null, "video"), e = this._core.items(this._core.relative(e.index())), this._core.reset(e.index()), "youtube" === f.type ? c = '<iframe width="' + g + '" height="' + h + '" src="//www.youtube.com/embed/' + f.id + "?autoplay=1&rel=0&v=" + f.id + '" frameborder="0" allowfullscreen></iframe>' : "vimeo" === f.type ? c = '<iframe src="//player.vimeo.com/video/' + f.id + '?autoplay=1" width="' + g + '" height="' + h + '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>' : "vzaar" === f.type && (c = '<iframe frameborder="0"height="' + h + '"width="' + g + '" allowfullscreen mozallowfullscreen webkitAllowFullScreen src="//view.vzaar.com/' + f.id + '/player?autoplay=true"></iframe>'), a('<div class="owl-video-frame">' + c + "</div>").insertAfter(e.find(".owl-video")), this._playing = e.addClass("owl-video-playing"))
	}, e.prototype.isInFullScreen = function () {
		var b = c.fullscreenElement || c.mozFullScreenElement || c.webkitFullscreenElement;
		return b && a(b).parent().hasClass("owl-video-frame")
	}, e.prototype.destroy = function () {
		var a, b;
		this._core.$element.off("click.owl.video");
		for (a in this._handlers) this._core.$element.off(a, this._handlers[a]);
		for (b in Object.getOwnPropertyNames(this)) "function" != typeof this[b] && (this[b] = null)
	}, a.fn.owlCarousel.Constructor.Plugins.Video = e
}(window.Zepto || window.jQuery, window, document),
function (a, b, c, d) {
	var e = function (b) {
		this.core = b, this.core.options = a.extend({}, e.Defaults, this.core.options), this.swapping = !0, this.previous = d, this.next = d, this.handlers = {
			"change.owl.carousel": a.proxy(function (a) {
				a.namespace && "position" == a.property.name && (this.previous = this.core.current(), this.next = a.property.value)
			}, this),
			"drag.owl.carousel dragged.owl.carousel translated.owl.carousel": a.proxy(function (a) {
				a.namespace && (this.swapping = "translated" == a.type)
			}, this),
			"translate.owl.carousel": a.proxy(function (a) {
				a.namespace && this.swapping && (this.core.options.animateOut || this.core.options.animateIn) && this.swap()
			}, this)
		}, this.core.$element.on(this.handlers)
	};
	e.Defaults = {
			animateOut: !1,
			animateIn: !1
		}, e.prototype.swap = function () {
			if (1 === this.core.settings.items && a.support.animation && a.support.transition) {
				this.core.speed(0);
				var b, c = a.proxy(this.clear, this),
					d = this.core.$stage.children().eq(this.previous),
					e = this.core.$stage.children().eq(this.next),
					f = this.core.settings.animateIn,
					g = this.core.settings.animateOut;
				this.core.current() !== this.previous && (g && (b = this.core.coordinates(this.previous) - this.core.coordinates(this.next), d.one(a.support.animation.end, c).css({
					left: b + "px"
				}).addClass("animated owl-animated-out").addClass(g)), f && e.one(a.support.animation.end, c).addClass("animated owl-animated-in").addClass(f))
			}
		}, e.prototype.clear = function (b) {
			a(b.target).css({
				left: ""
			}).removeClass("animated owl-animated-out owl-animated-in").removeClass(this.core.settings.animateIn).removeClass(this.core.settings.animateOut), this.core.onTransitionEnd()
		}, e.prototype.destroy = function () {
			var a, b;
			for (a in this.handlers) this.core.$element.off(a, this.handlers[a]);
			for (b in Object.getOwnPropertyNames(this)) "function" != typeof this[b] && (this[b] = null)
		},
		a.fn.owlCarousel.Constructor.Plugins.Animate = e
}(window.Zepto || window.jQuery, window, document),
function (a, b, c, d) {
	var e = function (b) {
		this._core = b, this._timeout = null, this._paused = !1, this._handlers = {
			"changed.owl.carousel": a.proxy(function (a) {
				a.namespace && "settings" === a.property.name ? this._core.settings.autoplay ? this.play() : this.stop() : a.namespace && "position" === a.property.name && this._core.settings.autoplay && this._setAutoPlayInterval()
			}, this),
			"initialized.owl.carousel": a.proxy(function (a) {
				a.namespace && this._core.settings.autoplay && this.play()
			}, this),
			"play.owl.autoplay": a.proxy(function (a, b, c) {
				a.namespace && this.play(b, c)
			}, this),
			"stop.owl.autoplay": a.proxy(function (a) {
				a.namespace && this.stop()
			}, this),
			"mouseover.owl.autoplay": a.proxy(function () {
				this._core.settings.autoplayHoverPause && this._core.is("rotating") && this.pause()
			}, this),
			"mouseleave.owl.autoplay": a.proxy(function () {
				this._core.settings.autoplayHoverPause && this._core.is("rotating") && this.play()
			}, this),
			"touchstart.owl.core": a.proxy(function () {
				this._core.settings.autoplayHoverPause && this._core.is("rotating") && this.pause()
			}, this),
			"touchend.owl.core": a.proxy(function () {
				this._core.settings.autoplayHoverPause && this.play()
			}, this)
		}, this._core.$element.on(this._handlers), this._core.options = a.extend({}, e.Defaults, this._core.options)
	};
	e.Defaults = {
		autoplay: !1,
		autoplayTimeout: 5e3,
		autoplayHoverPause: !1,
		autoplaySpeed: !1
	}, e.prototype.play = function (a, b) {
		this._paused = !1, this._core.is("rotating") || (this._core.enter("rotating"), this._setAutoPlayInterval())
	}, e.prototype._getNextTimeout = function (d, e) {
		return this._timeout && b.clearTimeout(this._timeout), b.setTimeout(a.proxy(function () {
			this._paused || this._core.is("busy") || this._core.is("interacting") || c.hidden || this._core.next(e || this._core.settings.autoplaySpeed)
		}, this), d || this._core.settings.autoplayTimeout)
	}, e.prototype._setAutoPlayInterval = function () {
		this._timeout = this._getNextTimeout()
	}, e.prototype.stop = function () {
		this._core.is("rotating") && (b.clearTimeout(this._timeout), this._core.leave("rotating"))
	}, e.prototype.pause = function () {
		this._core.is("rotating") && (this._paused = !0)
	}, e.prototype.destroy = function () {
		var a, b;
		this.stop();
		for (a in this._handlers) this._core.$element.off(a, this._handlers[a]);
		for (b in Object.getOwnPropertyNames(this)) "function" != typeof this[b] && (this[b] = null)
	}, a.fn.owlCarousel.Constructor.Plugins.autoplay = e
}(window.Zepto || window.jQuery, window, document),
function (a, b, c, d) {
	"use strict";
	var e = function (b) {
		this._core = b, this._initialized = !1, this._pages = [], this._controls = {}, this._templates = [], this.$element = this._core.$element, this._overrides = {
			next: this._core.next,
			prev: this._core.prev,
			to: this._core.to
		}, this._handlers = {
			"prepared.owl.carousel": a.proxy(function (b) {
				b.namespace && this._core.settings.dotsData && this._templates.push('<div class="' + this._core.settings.dotClass + '">' + a(b.content).find("[data-dot]").addBack("[data-dot]").attr("data-dot") + "</div>")
			}, this),
			"added.owl.carousel": a.proxy(function (a) {
				a.namespace && this._core.settings.dotsData && this._templates.splice(a.position, 0, this._templates.pop())
			}, this),
			"remove.owl.carousel": a.proxy(function (a) {
				a.namespace && this._core.settings.dotsData && this._templates.splice(a.position, 1)
			}, this),
			"changed.owl.carousel": a.proxy(function (a) {
				a.namespace && "position" == a.property.name && this.draw()
			}, this),
			"initialized.owl.carousel": a.proxy(function (a) {
				a.namespace && !this._initialized && (this._core.trigger("initialize", null, "navigation"), this.initialize(), this.update(), this.draw(), this._initialized = !0, this._core.trigger("initialized", null, "navigation"))
			}, this),
			"refreshed.owl.carousel": a.proxy(function (a) {
				a.namespace && this._initialized && (this._core.trigger("refresh", null, "navigation"), this.update(), this.draw(), this._core.trigger("refreshed", null, "navigation"))
			}, this)
		}, this._core.options = a.extend({}, e.Defaults, this._core.options), this.$element.on(this._handlers)
	};
	e.Defaults = {
		nav: !1,
		navText: ["<i class='fa fa-arrow-left'>", "<i class='fa fa-arrow-left'>"],
		navSpeed: !1,
		navElement: "div",
		navContainer: !1,
		navContainerClass: "owl-nav",
		navClass: ["owl-prev", "owl-next"],
		slideBy: 1,
		dotClass: "owl-dot",
		dotsClass: "owl-dots",
		dots: !0,
		dotsEach: !1,
		dotsData: !1,
		dotsSpeed: !1,
		dotsContainer: !1
	}, e.prototype.initialize = function () {
		var b, c = this._core.settings;
		this._controls.$relative = (c.navContainer ? a(c.navContainer) : a("<div>").addClass(c.navContainerClass).appendTo(this.$element)).addClass("disabled"), this._controls.$previous = a("<" + c.navElement + ">").addClass(c.navClass[0]).html(c.navText[0]).prependTo(this._controls.$relative).on("click", a.proxy(function (a) {
			this.prev(c.navSpeed)
		}, this)), this._controls.$next = a("<" + c.navElement + ">").addClass(c.navClass[1]).html(c.navText[1]).appendTo(this._controls.$relative).on("click", a.proxy(function (a) {
			this.next(c.navSpeed)
		}, this)), c.dotsData || (this._templates = [a("<div>").addClass(c.dotClass).append(a("<span>")).prop("outerHTML")]), this._controls.$absolute = (c.dotsContainer ? a(c.dotsContainer) : a("<div>").addClass(c.dotsClass).appendTo(this.$element)).addClass("disabled"), this._controls.$absolute.on("click", "div", a.proxy(function (b) {
			var d = a(b.target).parent().is(this._controls.$absolute) ? a(b.target).index() : a(b.target).parent().index();
			b.preventDefault(), this.to(d, c.dotsSpeed)
		}, this));
		for (b in this._overrides) this._core[b] = a.proxy(this[b], this)
	}, e.prototype.destroy = function () {
		var a, b, c, d;
		for (a in this._handlers) this.$element.off(a, this._handlers[a]);
		for (b in this._controls) this._controls[b].remove();
		for (d in this.overides) this._core[d] = this._overrides[d];
		for (c in Object.getOwnPropertyNames(this)) "function" != typeof this[c] && (this[c] = null)
	}, e.prototype.update = function () {
		var a, b, c, d = this._core.clones().length / 2,
			e = d + this._core.items().length,
			f = this._core.maximum(!0),
			g = this._core.settings,
			h = g.center || g.autoWidth || g.dotsData ? 1 : g.dotsEach || g.items;
		if ("page" !== g.slideBy && (g.slideBy = Math.min(g.slideBy, g.items)), g.dots || "page" == g.slideBy)
			for (this._pages = [], a = d, b = 0, c = 0; a < e; a++) {
				if (b >= h || 0 === b) {
					if (this._pages.push({
							start: Math.min(f, a - d),
							end: a - d + h - 1
						}), Math.min(f, a - d) === f) break;
					b = 0, ++c
				}
				b += this._core.mergers(this._core.relative(a))
			}
	}, e.prototype.draw = function () {
		var b, c = this._core.settings,
			d = this._core.items().length <= c.items,
			e = this._core.relative(this._core.current()),
			f = c.loop || c.rewind;
		this._controls.$relative.toggleClass("disabled", !c.nav || d), c.nav && (this._controls.$previous.toggleClass("disabled", !f && e <= this._core.minimum(!0)), this._controls.$next.toggleClass("disabled", !f && e >= this._core.maximum(!0))), this._controls.$absolute.toggleClass("disabled", !c.dots || d), c.dots && (b = this._pages.length - this._controls.$absolute.children().length, c.dotsData && 0 !== b ? this._controls.$absolute.html(this._templates.join("")) : b > 0 ? this._controls.$absolute.append(new Array(b + 1).join(this._templates[0])) : b < 0 && this._controls.$absolute.children().slice(b).remove(), this._controls.$absolute.find(".active").removeClass("active"), this._controls.$absolute.children().eq(a.inArray(this.current(), this._pages)).addClass("active"))
	}, e.prototype.onTrigger = function (b) {
		var c = this._core.settings;
		b.page = {
			index: a.inArray(this.current(), this._pages),
			count: this._pages.length,
			size: c && (c.center || c.autoWidth || c.dotsData ? 1 : c.dotsEach || c.items)
		}
	}, e.prototype.current = function () {
		var b = this._core.relative(this._core.current());
		return a.grep(this._pages, a.proxy(function (a, c) {
			return a.start <= b && a.end >= b
		}, this)).pop()
	}, e.prototype.getPosition = function (b) {
		var c, d, e = this._core.settings;
		return "page" == e.slideBy ? (c = a.inArray(this.current(), this._pages), d = this._pages.length, b ? ++c : --c, c = this._pages[(c % d + d) % d].start) : (c = this._core.relative(this._core.current()), d = this._core.items().length, b ? c += e.slideBy : c -= e.slideBy), c
	}, e.prototype.next = function (b) {
		a.proxy(this._overrides.to, this._core)(this.getPosition(!0), b)
	}, e.prototype.prev = function (b) {
		a.proxy(this._overrides.to, this._core)(this.getPosition(!1), b)
	}, e.prototype.to = function (b, c, d) {
		var e;
		!d && this._pages.length ? (e = this._pages.length, a.proxy(this._overrides.to, this._core)(this._pages[(b % e + e) % e].start, c)) : a.proxy(this._overrides.to, this._core)(b, c)
	}, a.fn.owlCarousel.Constructor.Plugins.Navigation = e
}(window.Zepto || window.jQuery, window, document),
function (a, b, c, d) {
	"use strict";
	var e = function (c) {
		this._core = c, this._hashes = {}, this.$element = this._core.$element, this._handlers = {
			"initialized.owl.carousel": a.proxy(function (c) {
				c.namespace && "URLHash" === this._core.settings.startPosition && a(b).trigger("hashchange.owl.navigation")
			}, this),
			"prepared.owl.carousel": a.proxy(function (b) {
				if (b.namespace) {
					var c = a(b.content).find("[data-hash]").addBack("[data-hash]").attr("data-hash");
					if (!c) return;
					this._hashes[c] = b.content
				}
			}, this),
			"changed.owl.carousel": a.proxy(function (c) {
				if (c.namespace && "position" === c.property.name) {
					var d = this._core.items(this._core.relative(this._core.current())),
						e = a.map(this._hashes, function (a, b) {
							return a === d ? b : null
						}).join();
					if (!e || b.location.hash.slice(1) === e) return;
					b.location.hash = e
				}
			}, this)
		}, this._core.options = a.extend({}, e.Defaults, this._core.options), this.$element.on(this._handlers), a(b).on("hashchange.owl.navigation", a.proxy(function (a) {
			var c = b.location.hash.substring(1),
				e = this._core.$stage.children(),
				f = this._hashes[c] && e.index(this._hashes[c]);
			f !== d && f !== this._core.current() && this._core.to(this._core.relative(f), !1, !0)
		}, this))
	};
	e.Defaults = {
		URLhashListener: !1
	}, e.prototype.destroy = function () {
		var c, d;
		a(b).off("hashchange.owl.navigation");
		for (c in this._handlers) this._core.$element.off(c, this._handlers[c]);
		for (d in Object.getOwnPropertyNames(this)) "function" != typeof this[d] && (this[d] = null)
	}, a.fn.owlCarousel.Constructor.Plugins.Hash = e
}(window.Zepto || window.jQuery, window, document),
function (a, b, c, d) {
	function e(b, c) {
		var e = !1,
			f = b.charAt(0).toUpperCase() + b.slice(1);
		return a.each((b + " " + h.join(f + " ") + f).split(" "), function (a, b) {
			if (g[b] !== d) return e = !c || b, !1
		}), e
	}

	function f(a) {
		return e(a, !0)
	}
	var g = a("<support>").get(0).style,
		h = "Webkit Moz O ms".split(" "),
		i = {
			transition: {
				end: {
					WebkitTransition: "webkitTransitionEnd",
					MozTransition: "transitionend",
					OTransition: "oTransitionEnd",
					transition: "transitionend"
				}
			},
			animation: {
				end: {
					WebkitAnimation: "webkitAnimationEnd",
					MozAnimation: "animationend",
					OAnimation: "oAnimationEnd",
					animation: "animationend"
				}
			}
		},
		j = {
			csstransforms: function () {
				return !!e("transform")
			},
			csstransforms3d: function () {
				return !!e("perspective")
			},
			csstransitions: function () {
				return !!e("transition")
			},
			cssanimations: function () {
				return !!e("animation")
			}
		};
	j.csstransitions() && (a.support.transition = new String(f("transition")), a.support.transition.end = i.transition.end[a.support.transition]), j.cssanimations() && (a.support.animation = new String(f("animation")), a.support.animation.end = i.animation.end[a.support.animation]), j.csstransforms() && (a.support.transform = new String(f("transform")), a.support.transform3d = j.csstransforms3d())
}(window.Zepto || window.jQuery, window, document);


! function (n) {
	n.fn.UItoTop = function (o) {
		var e = {
				text: "Top",
				min: 200,
				inDelay: 600,
				outDelay: 400,
				containerID: "toTop",
				containerHoverID: "toTopHover",
				scrollSpeed: 1200,
				easingType: "linear"
			},
			i = n.extend(e, o),
			t = "#" + i.containerID,
			a = "#" + i.containerHoverID;
		n("body").append('<a href="#" id="' + i.containerID + '"><i class="fas fa-long-arrow-alt-up"></i></a>'), n(t).hide().on("click.UItoTop", function () {
			return n("html, body").animate({
				scrollTop: 0
			}, i.scrollSpeed, i.easingType), n("#" + i.containerHoverID, this).stop().animate({
				opacity: 0
			}, i.inDelay, i.easingType), !1
		}).prepend('<span id="' + i.containerHoverID + '"></span>').hover(function () {
			n(a, this).stop().animate({
				opacity: 1
			}, 600, "linear")
		}, function () {
			n(a, this).stop().animate({
				opacity: 0
			}, 700, "linear")
		}), n(window).scroll(function () {
			var o = n(window).scrollTop();
			"undefined" == typeof document.body.style.maxHeight && n(t).css({
				position: "absolute",
				top: o + n(window).height() - 50
			}), o > i.min ? n(t).fadeIn(i.inDelay) : n(t).fadeOut(i.Outdelay)
		})
	}
}(jQuery);

! function (t) {
	function n(n, e, r) {
		var a, c = this,
			o = n.add(this),
			s = n.find(r.tabs),
			f = e.jquery ? e : n.children(e);
		s.length || (s = n.children()), f.length || (f = n.parent().find(e)), f.length || (f = t(e)), t.extend(this, {
			click: function (n, e) {
				var f = s.eq(n);
				if ("string" == typeof n && n.replace("#", "") && (f = s.filter("[href*=" + n.replace("#", "") + "]"), n = Math.max(s.index(f), 0)), r.rotate) {
					var l = s.length - 1;
					if (0 > n) return c.click(l, e);
					if (n > l) return c.click(0, e)
				}
				if (!f.length) {
					if (a >= 0) return c;
					n = r.initialIndex, f = s.eq(n)
				}
				return n === a ? c : (e = e || t.Event(), e.type = "onBeforeClick", o.trigger(e, [n]), e.isDefaultPrevented() ? void 0 : (i[r.effect].call(c, n, function () {
					e.type = "onClick", o.trigger(e, [n])
				}), a = n, s.removeClass(r.current), f.addClass(r.current), c))
			},
			getConf: function () {
				return r
			},
			getTabs: function () {
				return s
			},
			getPanes: function () {
				return f
			},
			getCurrentPane: function () {
				return f.eq(a)
			},
			getCurrentTab: function () {
				return s.eq(a)
			},
			getIndex: function () {
				return a
			},
			next: function () {
				return c.click(a + 1)
			},
			prev: function () {
				return c.click(a - 1)
			},
			destroy: function () {
				return s.unbind(r.event).removeClass(r.current), f.find("a[href^=#]").unbind("click.T"), c
			}
		}), t.each("onBeforeClick,onClick".split(","), function (n, e) {
			t.isFunction(r[e]) && t(c).bind(e, r[e]), c[e] = function (n) {
				return n && t(c).bind(e, n), c
			}
		}), r.history && t.fn.history && (t.tools.history.init(s), r.event = "history"), s.each(function (n) {
			t(this).bind(r.event, function (t) {
				return c.click(n, t), t.preventDefault()
			})
		}), f.find("a[href^=#]").bind("click.T", function (n) {
			c.click(t(this).attr("href"), n)
		}), location.hash && "a" == r.tabs && n.find("[href=" + location.hash + "]").length ? c.click(location.hash) : (0 === r.initialIndex || r.initialIndex > 0) && c.click(r.initialIndex)
	}
	t.tools = t.tools || {
		version: "1.2.5"
	}, t.tools.tabs = {
		conf: {
			tabs: "a",
			current: "current",
			onBeforeClick: null,
			onClick: null,
			effect: "default",
			initialIndex: 0,
			event: "click",
			rotate: !1,
			history: !1
		},
		addEffect: function (t, n) {
			i[t] = n
		}
	};
	var e, i = {
		"default": function (t, n) {
			this.getPanes().hide().eq(t).show(), n.call()
		},
		fade: function (t, n) {
			var e = this.getConf(),
				i = e.fadeOutSpeed,
				r = this.getPanes();
			i ? r.fadeOut(i) : r.hide(), r.eq(t).fadeIn(e.fadeInSpeed, n)
		},
		slide: function (t, n) {
			this.getPanes().slideUp(200), this.getPanes().eq(t).slideDown(400, n)
		},
		ajax: function (t, n) {
			this.getPanes().eq(0).load(this.getTabs().eq(t).attr("href"), n)
		}
	};
	t.tools.tabs.addEffect("horizontal", function (n, i) {
		e || (e = this.getPanes().eq(0).width()), this.getCurrentPane().animate({
			width: 0
		}, function () {
			t(this).hide()
		}), this.getPanes().eq(n).animate({
			width: e
		}, function () {
			t(this).show(), i.call()
		})
	}), t.fn.tabs = function (e, i) {
		var r = this.data("tabs");
		return r && (r.destroy(), this.removeData("tabs")), t.isFunction(i) && (i = {
			onBeforeClick: i
		}), i = t.extend({}, t.tools.tabs.conf, i), this.each(function () {
			r = new n(t(this), e, i), t(this).data("tabs", r)
		}), i.api ? r : this
	}
}(jQuery);

"object" != typeof JSON && (JSON = {}),
	function () {
		"use strict";

		function f(e) {
			return 10 > e ? "0" + e : e
		}

		function quote(e) {
			return escapable.lastIndex = 0, escapable.test(e) ? '"' + e.replace(escapable, function (e) {
				var t = meta[e];
				return "string" == typeof t ? t : "\\u" + ("0000" + e.charCodeAt(0).toString(16)).slice(-4)
			}) + '"' : '"' + e + '"'
		}

		function str(e, t) {
			var a, r, n, o, s, i = gap,
				u = t[e];
			switch (u && "object" == typeof u && "function" == typeof u.toJSON && (u = u.toJSON(e)), "function" == typeof rep && (u = rep.call(t, e, u)), typeof u) {
				case "string":
					return quote(u);
				case "number":
					return isFinite(u) ? String(u) : "null";
				case "boolean":
				case "null":
					return String(u);
				case "object":
					if (!u) return "null";
					if (gap += indent, s = [], "[object Array]" === Object.prototype.toString.apply(u)) {
						for (o = u.length, a = 0; o > a; a += 1) s[a] = str(a, u) || "null";
						return n = 0 === s.length ? "[]" : gap ? "[\n" + gap + s.join(",\n" + gap) + "\n" + i + "]" : "[" + s.join(",") + "]", gap = i, n
					}
					if (rep && "object" == typeof rep)
						for (o = rep.length, a = 0; o > a; a += 1) "string" == typeof rep[a] && (r = rep[a], n = str(r, u), n && s.push(quote(r) + (gap ? ": " : ":") + n));
					else
						for (r in u) Object.prototype.hasOwnProperty.call(u, r) && (n = str(r, u), n && s.push(quote(r) + (gap ? ": " : ":") + n));
					return n = 0 === s.length ? "{}" : gap ? "{\n" + gap + s.join(",\n" + gap) + "\n" + i + "}" : "{" + s.join(",") + "}", gap = i, n
			}
		}
		"function" != typeof Date.prototype.toJSON && (Date.prototype.toJSON = function (e) {
			return isFinite(this.valueOf()) ? this.getUTCFullYear() + "-" + f(this.getUTCMonth() + 1) + "-" + f(this.getUTCDate()) + "T" + f(this.getUTCHours()) + ":" + f(this.getUTCMinutes()) + ":" + f(this.getUTCSeconds()) + "Z" : null
		}, String.prototype.toJSON = Number.prototype.toJSON = Boolean.prototype.toJSON = function (e) {
			return this.valueOf()
		});
		var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
			escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
			gap, indent, meta = {
				"\b": "\\b",
				"	": "\\t",
				"\n": "\\n",
				"\f": "\\f",
				"\r": "\\r",
				'"': '\\"',
				"\\": "\\\\"
			},
			rep;
		"function" != typeof JSON.stringify && (JSON.stringify = function (e, t, a) {
			var r;
			if (gap = "", indent = "", "number" == typeof a)
				for (r = 0; a > r; r += 1) indent += " ";
			else "string" == typeof a && (indent = a);
			if (rep = t, !t || "function" == typeof t || "object" == typeof t && "number" == typeof t.length) return str("", {
				"": e
			});
			throw new Error("JSON.stringify")
		}), "function" != typeof JSON.parse && (JSON.parse = function (text, reviver) {
			function walk(e, t) {
				var a, r, n = e[t];
				if (n && "object" == typeof n)
					for (a in n) Object.prototype.hasOwnProperty.call(n, a) && (r = walk(n, a), void 0 !== r ? n[a] = r : delete n[a]);
				return reviver.call(e, t, n)
			}
			var j;
			if (text = String(text), cx.lastIndex = 0, cx.test(text) && (text = text.replace(cx, function (e) {
					return "\\u" + ("0000" + e.charCodeAt(0).toString(16)).slice(-4)
				})), /^[\],:{}\s]*$/.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, "@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, "]").replace(/(?:^|:|,)(?:\s*\[)+/g, ""))) return j = eval("(" + text + ")"), "function" == typeof reviver ? walk({
				"": j
			}, "") : j;
			throw new SyntaxError("JSON.parse")
		})
	}(),
	function (e, t) {
		"use strict";
		var a = e.History = e.History || {},
			r = e.jQuery;
		if ("undefined" != typeof a.Adapter) throw new Error("History.js Adapter has already been loaded...");
		a.Adapter = {
			bind: function (e, t, a) {
				r(e).bind(t, a)
			},
			trigger: function (e, t, a) {
				r(e).trigger(t, a)
			},
			extractEventData: function (e, a, r) {
				var n = a && a.originalEvent && a.originalEvent[e] || r && r[e] || t;
				return n
			},
			onDomLoad: function (e) {
				r(e)
			}
		}, "undefined" != typeof a.init && a.init()
	}(window),
	function (e, t) {
		"use strict";
		var a = e.document,
			r = e.setTimeout || r,
			n = e.clearTimeout || n,
			o = e.setInterval || o,
			s = e.History = e.History || {};
		if ("undefined" != typeof s.initHtml4) throw new Error("History.js HTML4 Support has already been loaded...");
		s.initHtml4 = function () {
			return "undefined" != typeof s.initHtml4.initialized ? !1 : (s.initHtml4.initialized = !0, s.enabled = !0, s.savedHashes = [], s.isLastHash = function (e) {
				var t, a = s.getHashByIndex();
				return t = e === a
			}, s.isHashEqual = function (e, t) {
				return e = encodeURIComponent(e).replace(/%25/g, "%"), t = encodeURIComponent(t).replace(/%25/g, "%"), e === t
			}, s.saveHash = function (e) {
				return s.isLastHash(e) ? !1 : (s.savedHashes.push(e), !0)
			}, s.getHashByIndex = function (e) {
				var t = null;
				return t = "undefined" == typeof e ? s.savedHashes[s.savedHashes.length - 1] : 0 > e ? s.savedHashes[s.savedHashes.length + e] : s.savedHashes[e]
			}, s.discardedHashes = {}, s.discardedStates = {}, s.discardState = function (e, t, a) {
				var r, n = s.getHashByState(e);
				return r = {
					discardedState: e,
					backState: a,
					forwardState: t
				}, s.discardedStates[n] = r, !0
			}, s.discardHash = function (e, t, a) {
				var r = {
					discardedHash: e,
					backState: a,
					forwardState: t
				};
				return s.discardedHashes[e] = r, !0
			}, s.discardedState = function (e) {
				var t, a = s.getHashByState(e);
				return t = s.discardedStates[a] || !1
			}, s.discardedHash = function (e) {
				var t = s.discardedHashes[e] || !1;
				return t
			}, s.recycleState = function (e) {
				var t = s.getHashByState(e);
				return s.discardedState(e) && delete s.discardedStates[t], !0
			}, s.emulated.hashChange && (s.hashChangeInit = function () {
				s.checkerFunction = null;
				var t, r, n, i, u = "",
					l = Boolean(s.getHash());
				return s.isInternetExplorer() ? (t = "historyjs-iframe", r = a.createElement("iframe"), r.setAttribute("id", t), r.setAttribute("src", "#"), r.style.display = "none", a.body.appendChild(r), r.contentWindow.document.open(), r.contentWindow.document.close(), n = "", i = !1, s.checkerFunction = function () {
					if (i) return !1;
					i = !0;
					var t = s.getHash(),
						a = s.getHash(r.contentWindow.document);
					return t !== u ? (u = t, a !== t && (n = a = t, r.contentWindow.document.open(), r.contentWindow.document.close(), r.contentWindow.document.location.hash = s.escapeHash(t)), s.Adapter.trigger(e, "hashchange")) : a !== n && (n = a, l && "" === a ? s.back() : s.setHash(a, !1)), i = !1, !0
				}) : s.checkerFunction = function () {
					var t = s.getHash() || "";
					return t !== u && (u = t, s.Adapter.trigger(e, "hashchange")), !0
				}, s.intervalList.push(o(s.checkerFunction, s.options.hashChangeInterval)), !0
			}, s.Adapter.onDomLoad(s.hashChangeInit)), s.emulated.pushState && (s.onHashChange = function (t) {
				var a, r = t && t.newURL || s.getLocationHref(),
					n = s.getHashByUrl(r),
					o = null,
					i = null;
				return s.isLastHash(n) ? (s.busy(!1), !1) : (s.doubleCheckComplete(), s.saveHash(n), n && s.isTraditionalAnchor(n) ? (s.Adapter.trigger(e, "anchorchange"), s.busy(!1), !1) : (o = s.extractState(s.getFullUrl(n || s.getLocationHref()), !0), s.isLastSavedState(o) ? (s.busy(!1), !1) : (i = s.getHashByState(o), a = s.discardedState(o), a ? (s.getHashByIndex(-2) === s.getHashByState(a.forwardState) ? s.back(!1) : s.forward(!1), !1) : (s.pushState(o.data, o.title, encodeURI(o.url), !1), !0))))
			}, s.Adapter.bind(e, "hashchange", s.onHashChange), s.pushState = function (t, a, r, n) {
				if (r = encodeURI(r).replace(/%25/g, "%"), s.getHashByUrl(r)) throw new Error("History.js does not support states with fragment-identifiers (hashes/anchors).");
				if (n !== !1 && s.busy()) return s.pushQueue({
					scope: s,
					callback: s.pushState,
					args: arguments,
					queue: n
				}), !1;
				s.busy(!0);
				var o = s.createStateObject(t, a, r),
					i = s.getHashByState(o),
					u = s.getState(!1),
					l = s.getHashByState(u),
					c = s.getHash(),
					d = s.expectedStateId == o.id;
				return s.storeState(o), s.expectedStateId = o.id, s.recycleState(o), s.setTitle(o), i === l ? (s.busy(!1), !1) : (s.saveState(o), d || s.Adapter.trigger(e, "statechange"), !s.isHashEqual(i, c) && !s.isHashEqual(i, s.getShortUrl(s.getLocationHref())) && s.setHash(i, !1), s.busy(!1), !0)
			}, s.replaceState = function (t, a, r, n) {
				if (r = encodeURI(r).replace(/%25/g, "%"), s.getHashByUrl(r)) throw new Error("History.js does not support states with fragment-identifiers (hashes/anchors).");
				if (n !== !1 && s.busy()) return s.pushQueue({
					scope: s,
					callback: s.replaceState,
					args: arguments,
					queue: n
				}), !1;
				s.busy(!0);
				var o = s.createStateObject(t, a, r),
					i = s.getHashByState(o),
					u = s.getState(!1),
					l = s.getHashByState(u),
					c = s.getStateByIndex(-2);
				return s.discardState(u, o, c), i === l ? (s.storeState(o), s.expectedStateId = o.id, s.recycleState(o), s.setTitle(o), s.saveState(o), s.Adapter.trigger(e, "statechange"), s.busy(!1)) : s.pushState(o.data, o.title, o.url, !1), !0
			}), s.emulated.pushState && s.getHash() && !s.emulated.hashChange && s.Adapter.onDomLoad(function () {
				s.Adapter.trigger(e, "hashchange")
			}), void 0)
		}, "undefined" != typeof s.init && s.init()
	}(window),
	function (e, t) {
		"use strict";
		var a = e.console || t,
			r = e.document,
			n = e.navigator,
			o = !1,
			s = e.setTimeout,
			i = e.clearTimeout,
			u = e.setInterval,
			l = e.clearInterval,
			c = e.JSON,
			d = e.alert,
			p = e.History = e.History || {},
			f = e.history;
		try {
			o = e.sessionStorage, o.setItem("TEST", "1"), o.removeItem("TEST")
		} catch (h) {
			o = !1
		}
		if (c.stringify = c.stringify || c.encode, c.parse = c.parse || c.decode, "undefined" != typeof p.init) throw new Error("History.js Core has already been loaded...");
		p.init = function (e) {
			return "undefined" == typeof p.Adapter ? !1 : ("undefined" != typeof p.initCore && p.initCore(), "undefined" != typeof p.initHtml4 && p.initHtml4(), !0)
		}, p.initCore = function (h) {
			if ("undefined" != typeof p.initCore.initialized) return !1;
			if (p.initCore.initialized = !0, p.options = p.options || {}, p.options.hashChangeInterval = p.options.hashChangeInterval || 100, p.options.safariPollInterval = p.options.safariPollInterval || 500, p.options.doubleCheckInterval = p.options.doubleCheckInterval || 500, p.options.disableSuid = p.options.disableSuid || !1, p.options.storeInterval = p.options.storeInterval || 1e3, p.options.busyDelay = p.options.busyDelay || 250, p.options.debug = p.options.debug || !1, p.options.initialTitle = p.options.initialTitle || r.title, p.options.html4Mode = p.options.html4Mode || !1, p.options.delayInit = p.options.delayInit || !1, p.intervalList = [], p.clearAllIntervals = function () {
					var e, t = p.intervalList;
					if ("undefined" != typeof t && null !== t) {
						for (e = 0; e < t.length; e++) l(t[e]);
						p.intervalList = null
					}
				}, p.debug = function () {
					(p.options.debug || !1) && p.log.apply(p, arguments)
				}, p.log = function () {
					var e, t, n, o, s, i = "undefined" != typeof a && "undefined" != typeof a.log && "undefined" != typeof a.log.apply,
						u = r.getElementById("log");
					for (i ? (o = Array.prototype.slice.call(arguments), e = o.shift(), "undefined" != typeof a.debug ? a.debug.apply(a, [e, o]) : a.log.apply(a, [e, o])) : e = "\n" + arguments[0] + "\n", t = 1, n = arguments.length; n > t; ++t) {
						if (s = arguments[t], "object" == typeof s && "undefined" != typeof c) try {
							s = c.stringify(s)
						} catch (l) {}
						e += "\n" + s + "\n"
					}
					return u ? (u.value += e + "\n-----\n", u.scrollTop = u.scrollHeight - u.clientHeight) : i || d(e), !0
				}, p.getInternetExplorerMajorVersion = function () {
					var e = p.getInternetExplorerMajorVersion.cached = "undefined" != typeof p.getInternetExplorerMajorVersion.cached ? p.getInternetExplorerMajorVersion.cached : function () {
						for (var e = 3, t = r.createElement("div"), a = t.getElementsByTagName("i");
							(t.innerHTML = "<!--[if gt IE " + ++e + "]><i></i><![endif]-->") && a[0];);
						return e > 4 ? e : !1
					}();
					return e
				}, p.isInternetExplorer = function () {
					var e = p.isInternetExplorer.cached = "undefined" != typeof p.isInternetExplorer.cached ? p.isInternetExplorer.cached : Boolean(p.getInternetExplorerMajorVersion());
					return e
				}, p.options.html4Mode ? p.emulated = {
					pushState: !0,
					hashChange: !0
				} : p.emulated = {
					pushState: !Boolean(e.history && e.history.pushState && e.history.replaceState && !/ Mobile\/([1-7][a-z]|(8([abcde]|f(1[0-8]))))/i.test(n.userAgent) && !/AppleWebKit\/5([0-2]|3[0-2])/i.test(n.userAgent)),
					hashChange: Boolean(!("onhashchange" in e || "onhashchange" in r) || p.isInternetExplorer() && p.getInternetExplorerMajorVersion() < 8)
				}, p.enabled = !p.emulated.pushState, p.bugs = {
					setHash: Boolean(!p.emulated.pushState && "Apple Computer, Inc." === n.vendor && /AppleWebKit\/5([0-2]|3[0-3])/.test(n.userAgent)),
					safariPoll: Boolean(!p.emulated.pushState && "Apple Computer, Inc." === n.vendor && /AppleWebKit\/5([0-2]|3[0-3])/.test(n.userAgent)),
					ieDoubleCheck: Boolean(p.isInternetExplorer() && p.getInternetExplorerMajorVersion() < 8),
					hashEscape: Boolean(p.isInternetExplorer() && p.getInternetExplorerMajorVersion() < 7)
				}, p.isEmptyObject = function (e) {
					for (var t in e)
						if (e.hasOwnProperty(t)) return !1;
					return !0
				}, p.cloneObject = function (e) {
					var t, a;
					return e ? (t = c.stringify(e), a = c.parse(t)) : a = {}, a
				}, p.getRootUrl = function () {
					var e = r.location.protocol + "//" + (r.location.hostname || r.location.host);
					return r.location.port && (e += ":" + r.location.port), e += "/"
				}, p.getBaseHref = function () {
					var e = r.getElementsByTagName("base"),
						t = null,
						a = "";
					return 1 === e.length && (t = e[0], a = t.href.replace(/[^\/]+$/, "")), a = a.replace(/\/+$/, ""), a && (a += "/"), a
				}, p.getBaseUrl = function () {
					var e = p.getBaseHref() || p.getBasePageUrl() || p.getRootUrl();
					return e
				}, p.getPageUrl = function () {
					var e, t = p.getState(!1, !1),
						a = (t || {}).url || p.getLocationHref();
					return e = a.replace(/\/+$/, "").replace(/[^\/]+$/, function (e, t, a) {
						return /\./.test(e) ? e : e + "/"
					})
				}, p.getBasePageUrl = function () {
					var e = p.getLocationHref().replace(/[#\?].*/, "").replace(/[^\/]+$/, function (e, t, a) {
						return /[^\/]$/.test(e) ? "" : e
					}).replace(/\/+$/, "") + "/";
					return e
				}, p.getFullUrl = function (e, t) {
					var a = e,
						r = e.substring(0, 1);
					return t = "undefined" == typeof t ? !0 : t, /[a-z]+\:\/\//.test(e) || (a = "/" === r ? p.getRootUrl() + e.replace(/^\/+/, "") : "#" === r ? p.getPageUrl().replace(/#.*/, "") + e : "?" === r ? p.getPageUrl().replace(/[\?#].*/, "") + e : t ? p.getBaseUrl() + e.replace(/^(\.\/)+/, "") : p.getBasePageUrl() + e.replace(/^(\.\/)+/, "")), a.replace(/\#$/, "")
				}, p.getShortUrl = function (e) {
					var t = e,
						a = p.getBaseUrl(),
						r = p.getRootUrl();
					return p.emulated.pushState && (t = t.replace(a, "")), t = t.replace(r, "/"), p.isTraditionalAnchor(t) && (t = "./" + t), t = t.replace(/^(\.\/)+/g, "./").replace(/\#$/, "")
				}, p.getLocationHref = function (e) {
					return e = e || r, e.URL === e.location.href ? e.location.href : e.location.href === decodeURIComponent(e.URL) ? e.URL : e.location.hash && decodeURIComponent(e.location.href.replace(/^[^#]+/, "")) === e.location.hash ? e.location.href : -1 == e.URL.indexOf("#") && -1 != e.location.href.indexOf("#") ? e.location.href : e.URL || e.location.href
				}, p.store = {}, p.idToState = p.idToState || {}, p.stateToId = p.stateToId || {}, p.urlToId = p.urlToId || {}, p.storedStates = p.storedStates || [], p.savedStates = p.savedStates || [], p.normalizeStore = function () {
					p.store.idToState = p.store.idToState || {}, p.store.urlToId = p.store.urlToId || {}, p.store.stateToId = p.store.stateToId || {}
				}, p.getState = function (e, t) {
					"undefined" == typeof e && (e = !0), "undefined" == typeof t && (t = !0);
					var a = p.getLastSavedState();
					return !a && t && (a = p.createStateObject()), e && (a = p.cloneObject(a), a.url = a.cleanUrl || a.url), a
				}, p.getIdByState = function (e) {
					var t, a = p.extractId(e.url);
					if (!a)
						if (t = p.getStateString(e), "undefined" != typeof p.stateToId[t]) a = p.stateToId[t];
						else if ("undefined" != typeof p.store.stateToId[t]) a = p.store.stateToId[t];
					else {
						for (; a = (new Date).getTime() + String(Math.random()).replace(/\D/g, ""), "undefined" != typeof p.idToState[a] || "undefined" != typeof p.store.idToState[a];);
						p.stateToId[t] = a, p.idToState[a] = e
					}
					return a
				}, p.normalizeState = function (e) {
					var t, a;
					return e && "object" == typeof e || (e = {}), "undefined" != typeof e.normalized ? e : (e.data && "object" == typeof e.data || (e.data = {}), t = {}, t.normalized = !0, t.title = e.title || "", t.url = p.getFullUrl(e.url ? e.url : p.getLocationHref()), t.hash = p.getShortUrl(t.url), t.data = p.cloneObject(e.data), t.id = p.getIdByState(t), t.cleanUrl = t.url.replace(/\??\&_suid.*/, ""), t.url = t.cleanUrl, a = !p.isEmptyObject(t.data), (t.title || a) && p.options.disableSuid !== !0 && (t.hash = p.getShortUrl(t.url).replace(/\??\&_suid.*/, ""), /\?/.test(t.hash) || (t.hash += "?"), t.hash += "&_suid=" + t.id), t.hashedUrl = p.getFullUrl(t.hash), (p.emulated.pushState || p.bugs.safariPoll) && p.hasUrlDuplicate(t) && (t.url = t.hashedUrl), t)
				}, p.createStateObject = function (e, t, a) {
					var r = {
						data: e,
						title: t,
						url: a
					};
					return r = p.normalizeState(r)
				}, p.getStateById = function (e) {
					e = String(e);
					var a = p.idToState[e] || p.store.idToState[e] || t;
					return a
				}, p.getStateString = function (e) {
					var t, a, r;
					return t = p.normalizeState(e), a = {
						data: t.data,
						title: e.title,
						url: e.url
					}, r = c.stringify(a)
				}, p.getStateId = function (e) {
					var t, a;
					return t = p.normalizeState(e), a = t.id
				}, p.getHashByState = function (e) {
					var t, a;
					return t = p.normalizeState(e), a = t.hash
				}, p.extractId = function (e) {
					var t, a, r, n;
					return n = -1 != e.indexOf("#") ? e.split("#")[0] : e, a = /(.*)\&_suid=([0-9]+)$/.exec(n), r = a ? a[1] || e : e, t = a ? String(a[2] || "") : "", t || !1
				}, p.isTraditionalAnchor = function (e) {
					var t = !/[\/\?\.]/.test(e);
					return t
				}, p.extractState = function (e, t) {
					var a, r, n = null;
					return t = t || !1, a = p.extractId(e), a && (n = p.getStateById(a)), n || (r = p.getFullUrl(e), a = p.getIdByUrl(r) || !1, a && (n = p.getStateById(a)), !n && t && !p.isTraditionalAnchor(e) && (n = p.createStateObject(null, null, r))), n
				}, p.getIdByUrl = function (e) {
					var a = p.urlToId[e] || p.store.urlToId[e] || t;
					return a
				}, p.getLastSavedState = function () {
					return p.savedStates[p.savedStates.length - 1] || t
				}, p.getLastStoredState = function () {
					return p.storedStates[p.storedStates.length - 1] || t
				}, p.hasUrlDuplicate = function (e) {
					var t, a = !1;
					return t = p.extractState(e.url), a = t && t.id !== e.id
				}, p.storeState = function (e) {
					return p.urlToId[e.url] = e.id, p.storedStates.push(p.cloneObject(e)), e
				}, p.isLastSavedState = function (e) {
					var t, a, r, n = !1;
					return p.savedStates.length && (t = e.id, a = p.getLastSavedState(), r = a.id, n = t === r), n
				}, p.saveState = function (e) {
					return p.isLastSavedState(e) ? !1 : (p.savedStates.push(p.cloneObject(e)), !0)
				}, p.getStateByIndex = function (e) {
					var t = null;
					return t = "undefined" == typeof e ? p.savedStates[p.savedStates.length - 1] : 0 > e ? p.savedStates[p.savedStates.length + e] : p.savedStates[e]
				}, p.getCurrentIndex = function () {
					var e = null;
					return e = p.savedStates.length < 1 ? 0 : p.savedStates.length - 1
				}, p.getHash = function (e) {
					var t, a = p.getLocationHref(e);
					return t = p.getHashByUrl(a)
				}, p.unescapeHash = function (e) {
					var t = p.normalizeHash(e);
					return t = decodeURIComponent(t)
				}, p.normalizeHash = function (e) {
					var t = e.replace(/[^#]*#/, "").replace(/#.*/, "");
					return t
				}, p.setHash = function (e, t) {
					var a, n;
					return t !== !1 && p.busy() ? (p.pushQueue({
						scope: p,
						callback: p.setHash,
						args: arguments,
						queue: t
					}), !1) : (p.busy(!0), a = p.extractState(e, !0), a && !p.emulated.pushState ? p.pushState(a.data, a.title, a.url, !1) : p.getHash() !== e && (p.bugs.setHash ? (n = p.getPageUrl(), p.pushState(null, null, n + "#" + e, !1)) : r.location.hash = e), p)
				}, p.escapeHash = function (t) {
					var a = p.normalizeHash(t);
					return a = e.encodeURIComponent(a), p.bugs.hashEscape || (a = a.replace(/\%21/g, "!").replace(/\%26/g, "&").replace(/\%3D/g, "=").replace(/\%3F/g, "?")), a
				}, p.getHashByUrl = function (e) {
					var t = String(e).replace(/([^#]*)#?([^#]*)#?(.*)/, "$2");
					return t = p.unescapeHash(t)
				}, p.setTitle = function (e) {
					var t, a = e.title;
					a || (t = p.getStateByIndex(0), t && t.url === e.url && (a = t.title || p.options.initialTitle));
					try {
						r.getElementsByTagName("title")[0].innerHTML = a.replace("<", "&lt;").replace(">", "&gt;").replace(" & ", " &amp; ")
					} catch (n) {}
					return r.title = a, p
				}, p.queues = [], p.busy = function (e) {
					if ("undefined" != typeof e ? p.busy.flag = e : "undefined" == typeof p.busy.flag && (p.busy.flag = !1), !p.busy.flag) {
						i(p.busy.timeout);
						var t = function () {
							var e, a, r;
							if (!p.busy.flag)
								for (e = p.queues.length - 1; e >= 0; --e) a = p.queues[e], 0 !== a.length && (r = a.shift(), p.fireQueueItem(r), p.busy.timeout = s(t, p.options.busyDelay))
						};
						p.busy.timeout = s(t, p.options.busyDelay)
					}
					return p.busy.flag
				}, p.busy.flag = !1, p.fireQueueItem = function (e) {
					return e.callback.apply(e.scope || p, e.args || [])
				}, p.pushQueue = function (e) {
					return p.queues[e.queue || 0] = p.queues[e.queue || 0] || [], p.queues[e.queue || 0].push(e), p
				}, p.queue = function (e, t) {
					return "function" == typeof e && (e = {
						callback: e
					}), "undefined" != typeof t && (e.queue = t), p.busy() ? p.pushQueue(e) : p.fireQueueItem(e), p
				}, p.clearQueue = function () {
					return p.busy.flag = !1, p.queues = [], p
				}, p.stateChanged = !1, p.doubleChecker = !1, p.doubleCheckComplete = function () {
					return p.stateChanged = !0, p.doubleCheckClear(), p
				}, p.doubleCheckClear = function () {
					return p.doubleChecker && (i(p.doubleChecker), p.doubleChecker = !1), p
				}, p.doubleCheck = function (e) {
					return p.stateChanged = !1, p.doubleCheckClear(), p.bugs.ieDoubleCheck && (p.doubleChecker = s(function () {
						return p.doubleCheckClear(), p.stateChanged || e(), !0
					}, p.options.doubleCheckInterval)), p
				}, p.safariStatePoll = function () {
					var t, a = p.extractState(p.getLocationHref());
					return p.isLastSavedState(a) ? void 0 : (t = a, t || (t = p.createStateObject()), p.Adapter.trigger(e, "popstate"), p)
				}, p.back = function (e) {
					return e !== !1 && p.busy() ? (p.pushQueue({
						scope: p,
						callback: p.back,
						args: arguments,
						queue: e
					}), !1) : (p.busy(!0), p.doubleCheck(function () {
						p.back(!1)
					}), f.go(-1), !0)
				}, p.forward = function (e) {
					return e !== !1 && p.busy() ? (p.pushQueue({
						scope: p,
						callback: p.forward,
						args: arguments,
						queue: e
					}), !1) : (p.busy(!0), p.doubleCheck(function () {
						p.forward(!1)
					}), f.go(1), !0)
				}, p.go = function (e, t) {
					var a;
					if (e > 0)
						for (a = 1; e >= a; ++a) p.forward(t);
					else {
						if (!(0 > e)) throw new Error("History.go: History.go requires a positive or negative integer passed.");
						for (a = -1; a >= e; --a) p.back(t)
					}
					return p
				}, p.emulated.pushState) {
				var g = function () {};
				p.pushState = p.pushState || g, p.replaceState = p.replaceState || g
			} else p.onPopState = function (t, a) {
				var r, n, o = !1,
					s = !1;
				return p.doubleCheckComplete(), r = p.getHash(), r ? (n = p.extractState(r || p.getLocationHref(), !0), n ? p.replaceState(n.data, n.title, n.url, !1) : (p.Adapter.trigger(e, "anchorchange"), p.busy(!1)), p.expectedStateId = !1, !1) : (o = p.Adapter.extractEventData("state", t, a) || !1, s = o ? p.getStateById(o) : p.expectedStateId ? p.getStateById(p.expectedStateId) : p.extractState(p.getLocationHref()), s || (s = p.createStateObject(null, null, p.getLocationHref())), p.expectedStateId = !1, p.isLastSavedState(s) ? (p.busy(!1), !1) : (p.storeState(s), p.saveState(s), p.setTitle(s), p.Adapter.trigger(e, "statechange"), p.busy(!1), !0))
			}, p.Adapter.bind(e, "popstate", p.onPopState), p.pushState = function (t, a, r, n) {
				if (p.getHashByUrl(r) && p.emulated.pushState) throw new Error("History.js does not support states with fragement-identifiers (hashes/anchors).");
				if (n !== !1 && p.busy()) return p.pushQueue({
					scope: p,
					callback: p.pushState,
					args: arguments,
					queue: n
				}), !1;
				p.busy(!0);
				var o = p.createStateObject(t, a, r);
				return p.isLastSavedState(o) ? p.busy(!1) : (p.storeState(o), p.expectedStateId = o.id, f.pushState(o.id, o.title, o.url), p.Adapter.trigger(e, "popstate")), !0
			}, p.replaceState = function (t, a, r, n) {
				if (p.getHashByUrl(r) && p.emulated.pushState) throw new Error("History.js does not support states with fragement-identifiers (hashes/anchors).");
				if (n !== !1 && p.busy()) return p.pushQueue({
					scope: p,
					callback: p.replaceState,
					args: arguments,
					queue: n
				}), !1;
				p.busy(!0);
				var o = p.createStateObject(t, a, r);
				return p.isLastSavedState(o) ? p.busy(!1) : (p.storeState(o), p.expectedStateId = o.id, f.replaceState(o.id, o.title, o.url), p.Adapter.trigger(e, "popstate")), !0
			};
			if (o) {
				try {
					p.store = c.parse(o.getItem("History.store")) || {}
				} catch (S) {
					p.store = {}
				}
				p.normalizeStore()
			} else p.store = {}, p.normalizeStore();
			p.Adapter.bind(e, "unload", p.clearAllIntervals), p.saveState(p.storeState(p.extractState(p.getLocationHref(), !0))), o && (p.onUnload = function () {
				var e, t, a;
				try {
					e = c.parse(o.getItem("History.store")) || {}
				} catch (r) {
					e = {}
				}
				e.idToState = e.idToState || {}, e.urlToId = e.urlToId || {}, e.stateToId = e.stateToId || {};
				for (t in p.idToState) p.idToState.hasOwnProperty(t) && (e.idToState[t] = p.idToState[t]);
				for (t in p.urlToId) p.urlToId.hasOwnProperty(t) && (e.urlToId[t] = p.urlToId[t]);
				for (t in p.stateToId) p.stateToId.hasOwnProperty(t) && (e.stateToId[t] = p.stateToId[t]);
				p.store = e, p.normalizeStore(), a = c.stringify(e);
				try {
					o.setItem("History.store", a)
				} catch (n) {
					if (n.code !== DOMException.QUOTA_EXCEEDED_ERR) throw n;
					o.length && (o.removeItem("History.store"), o.setItem("History.store", a))
				}
			}, p.intervalList.push(u(p.onUnload, p.options.storeInterval)), p.Adapter.bind(e, "beforeunload", p.onUnload), p.Adapter.bind(e, "unload", p.onUnload)), p.emulated.pushState || (p.bugs.safariPoll && p.intervalList.push(u(p.safariStatePoll, p.options.safariPollInterval)), ("Apple Computer, Inc." === n.vendor || "Mozilla" === (n.appCodeName || "")) && (p.Adapter.bind(e, "hashchange", function () {
				p.Adapter.trigger(e, "popstate")
			}), p.getHash() && p.Adapter.onDomLoad(function () {
				p.Adapter.trigger(e, "hashchange")
			})))
		}, (!p.options || !p.options.delayInit) && p.init()
	}(window);


! function () {
	$.fn.lofCountDown = function (t) {
		return this.each(function () {
			new $.lofCountDown(this, t)
		})
	}, $.lofCountDown = function (t, e) {
		if (this.options = $.extend({
				autoStart: !0,
				LeadingZero: !0,
				DisplayFormat: "<div>%%D%% Days</div><div>%%H%% Hours</div><div>%%M%% Minutes</div><div>%%S%% Seconds</div>",
				FinishMessage: "Expired",
				CountActive: !0,
				TargetDate: null
			}, e || {}), null != this.options.TargetDate && "" != this.options.TargetDate) {
			this.timer = null, this.element = t, this.CountStepper = -1, this.CountStepper = Math.ceil(this.CountStepper), this.SetTimeOutPeriod = 1e3 * (Math.abs(this.CountStepper) - 1) + 990;
			var n = new Date(this.options.TargetDate),
				i = new Date;
			this.CountStepper > 0 ? ddiff = new Date(i - n) : ddiff = new Date(n - i), gsecs = Math.floor(ddiff.valueOf() / 1e3), this.CountBack(gsecs, this)
		}
	}, $.lofCountDown.fn = $.lofCountDown.prototype, $.lofCountDown.fn.extend = $.lofCountDown.extend = $.extend, $.lofCountDown.fn.extend({
		calculateDate: function (t, e, n) {
			var i = (Math.floor(t / e) % n).toString();
			return this.options.LeadingZero && i.length < 2 && (i = "0" + i), "<b>" + i + "</b>"
		},
		CountBack: function (t, e) {
			return 0 > t ? void(e.element.innerHTML = '<div class="lof-labelexpired"> ' + e.options.FinishMessage + "</div>") : (clearInterval(e.timer), DisplayStr = e.options.DisplayFormat.replace(/%%D%%/g, e.calculateDate(t, 86400, 1e5)), DisplayStr = DisplayStr.replace(/%%H%%/g, e.calculateDate(t, 3600, 24)), DisplayStr = DisplayStr.replace(/%%M%%/g, e.calculateDate(t, 60, 60)), DisplayStr = DisplayStr.replace(/%%S%%/g, e.calculateDate(t, 1, 60)), e.element.innerHTML = DisplayStr, void(e.options.CountActive && (e.timer = null, e.timer = setTimeout(function () {
				e.CountBack(t + e.CountStepper, e)
			}, e.SetTimeOutPeriod))))
		}
	})
}(jQuery);

"function" != typeof Object.create && (Object.create = function (o) {
		function e() {}
		return e.prototype = o, new e
	}),
	function (o, e, i, t) {
		var n = {
			init: function (e, i) {
				var t = this;
				t.elem = i, t.$elem = o(i), t.imageSrc = t.$elem.data("zoom-image") ? t.$elem.data("zoom-image") : t.$elem.attr("src"), t.options = o.extend({}, o.fn.elevateZoom.options, e), t.options.tint && (t.options.lensColour = "none", t.options.lensOpacity = "1"), "inner" == t.options.zoomType && (t.options.showLens = !1), t.$elem.parent().removeAttr("title").removeAttr("alt"), t.zoomImage = t.imageSrc, t.refresh(1), o("#" + t.options.gallery + " a").click(function (e) {
					return t.options.galleryActiveClass && (o("#" + t.options.gallery + " a").removeClass(t.options.galleryActiveClass), o(this).addClass(t.options.galleryActiveClass)), e.preventDefault(), o(this).data("zoom-image") ? t.zoomImagePre = o(this).data("zoom-image") : t.zoomImagePre = o(this).data("image"), t.swaptheimage(o(this).data("image"), t.zoomImagePre), !1
				})
			},
			refresh: function (o) {
				var e = this;
				setTimeout(function () {
					e.fetch(e.imageSrc)
				}, o || e.options.refresh)
			},
			fetch: function (o) {
				var e = this,
					i = new Image;
				i.onload = function () {
					e.largeWidth = i.width, e.largeHeight = i.height, e.startZoom(), e.currentImage = e.imageSrc, e.options.onZoomedImageLoaded(e.$elem)
				}, i.src = o
			},
			startZoom: function () {
				var e = this;
				if (e.nzWidth = e.$elem.width(), e.nzHeight = e.$elem.height(), e.isWindowActive = !1, e.isLensActive = !1, e.isTintActive = !1, e.overWindow = !1, e.options.imageCrossfade && (e.zoomWrap = e.$elem.wrap('<div style="height:' + e.nzHeight + "px;width:" + e.nzWidth + 'px;" class="zoomWrapper" />'), e.$elem.css("position", "absolute")), e.zoomLock = 1, e.scrollingLock = !1, e.changeBgSize = !1, e.currentZoomLevel = e.options.zoomLevel, e.nzOffset = e.$elem.offset(), e.widthRatio = e.largeWidth / e.currentZoomLevel / e.nzWidth, e.heightRatio = e.largeHeight / e.currentZoomLevel / e.nzHeight, "window" == e.options.zoomType && (e.zoomWindowStyle = "overflow: hidden;background-position: 0px 0px;text-align:center;background-color: " + String(e.options.zoomWindowBgColour) + ";width: " + String(e.options.zoomWindowWidth) + "px;height: " + String(e.options.zoomWindowHeight) + "px;float: left;background-size: " + e.largeWidth / e.currentZoomLevel + "px " + e.largeHeight / e.currentZoomLevel + "px;display: none;z-index:100;border: " + String(e.options.borderSize) + "px solid " + e.options.borderColour + ";background-repeat: no-repeat;position: absolute;"), "inner" == e.options.zoomType) {
					var i = e.$elem.css("border-left-width");
					e.zoomWindowStyle = "overflow: hidden;margin-left: " + String(i) + ";margin-top: " + String(i) + ";background-position: 0px 0px;width: " + String(e.nzWidth) + "px;height: " + String(e.nzHeight) + "px;float: left;display: none;cursor:" + e.options.cursor + ";px solid " + e.options.borderColour + ";background-repeat: no-repeat;position: absolute;"
				}
				"window" == e.options.zoomType && (e.nzHeight < e.options.zoomWindowWidth / e.widthRatio ? lensHeight = e.nzHeight : lensHeight = String(e.options.zoomWindowHeight / e.heightRatio), e.largeWidth < e.options.zoomWindowWidth ? lensWidth = e.nzWidth : lensWidth = e.options.zoomWindowWidth / e.widthRatio, e.lensStyle = "background-position: 0px 0px;width: " + String(e.options.zoomWindowWidth / e.widthRatio) + "px;height: " + String(e.options.zoomWindowHeight / e.heightRatio) + "px;float: right;display: none;overflow: hidden;z-index: 999;-webkit-transform: translateZ(0);opacity:" + e.options.lensOpacity + ";filter: alpha(opacity = " + 100 * e.options.lensOpacity + "); zoom:1;width:" + lensWidth + "px;height:" + lensHeight + "px;background-color:" + e.options.lensColour + ";cursor:" + e.options.cursor + ";border: " + e.options.lensBorderSize + "px solid " + e.options.lensBorderColour + ";background-repeat: no-repeat;position: absolute;"), e.tintStyle = "display: block;position: absolute;background-color: " + e.options.tintColour + ";filter:alpha(opacity=0);opacity: 0;width: " + e.nzWidth + "px;height: " + e.nzHeight + "px;", e.lensRound = "", "lens" == e.options.zoomType && (e.lensStyle = "background-position: 0px 0px;float: left;display: none;border: " + String(e.options.borderSize) + "px solid " + e.options.borderColour + ";width:" + String(e.options.lensSize) + "px;height:" + String(e.options.lensSize) + "px;background-repeat: no-repeat;position: absolute;"), "round" == e.options.lensShape && (e.lensRound = "border-top-left-radius: " + String(e.options.lensSize / 2 + e.options.borderSize) + "px;border-top-right-radius: " + String(e.options.lensSize / 2 + e.options.borderSize) + "px;border-bottom-left-radius: " + String(e.options.lensSize / 2 + e.options.borderSize) + "px;border-bottom-right-radius: " + String(e.options.lensSize / 2 + e.options.borderSize) + "px;"), e.zoomContainer = o('<div class="zoomContainer" style="-webkit-transform: translateZ(0);position:absolute;left:' + e.nzOffset.left + "px;top:" + e.nzOffset.top + "px;height:" + e.nzHeight + "px;width:" + e.nzWidth + 'px;"></div>'), o("body").append(e.zoomContainer), e.options.containLensZoom && "lens" == e.options.zoomType && e.zoomContainer.css("overflow", "hidden"), "inner" != e.options.zoomType && (e.zoomLens = o("<div class='zoomLens' style='" + e.lensStyle + e.lensRound + "'>&nbsp;</div>").appendTo(e.zoomContainer).click(function () {
					e.$elem.trigger("click")
				}), e.options.tint && (e.tintContainer = o("<div/>").addClass("tintContainer"), e.zoomTint = o("<div class='zoomTint' style='" + e.tintStyle + "'></div>"), e.zoomLens.wrap(e.tintContainer), e.zoomTintcss = e.zoomLens.after(e.zoomTint), e.zoomTintImage = o('<img style="position: absolute; left: 0px; top: 0px; max-width: none; width: ' + e.nzWidth + "px; height: " + e.nzHeight + 'px;" src="' + e.imageSrc + '">').appendTo(e.zoomLens).click(function () {
					e.$elem.trigger("click")
				}))), isNaN(e.options.zoomWindowPosition) ? e.zoomWindow = o("<div style='z-index:999;left:" + e.windowOffsetLeft + "px;top:" + e.windowOffsetTop + "px;" + e.zoomWindowStyle + "' class='zoomWindow'>&nbsp;</div>").appendTo("body").click(function () {
					e.$elem.trigger("click")
				}) : e.zoomWindow = o("<div style='z-index:999;left:" + e.windowOffsetLeft + "px;top:" + e.windowOffsetTop + "px;" + e.zoomWindowStyle + "' class='zoomWindow'>&nbsp;</div>").appendTo(e.zoomContainer).click(function () {
					e.$elem.trigger("click")
				}), e.zoomWindowContainer = o("<div/>").addClass("zoomWindowContainer").css("width", e.options.zoomWindowWidth), e.zoomWindow.wrap(e.zoomWindowContainer), "lens" == e.options.zoomType && e.zoomLens.css({
					backgroundImage: "url('" + e.imageSrc + "')"
				}), "window" == e.options.zoomType && e.zoomWindow.css({
					backgroundImage: "url('" + e.imageSrc + "')"
				}), "inner" == e.options.zoomType && e.zoomWindow.css({
					backgroundImage: "url('" + e.imageSrc + "')"
				}), e.$elem.bind("touchmove", function (o) {
					o.preventDefault();
					var i = o.originalEvent.touches[0] || o.originalEvent.changedTouches[0];
					e.setPosition(i)
				}), e.zoomContainer.bind("touchmove", function (o) {
					"inner" == e.options.zoomType && e.showHideWindow("show"), o.preventDefault();
					var i = o.originalEvent.touches[0] || o.originalEvent.changedTouches[0];
					e.setPosition(i)
				}), e.zoomContainer.bind("touchend", function (o) {
					e.showHideWindow("hide"), e.options.showLens && e.showHideLens("hide"), e.options.tint && "inner" != e.options.zoomType && e.showHideTint("hide")
				}), e.$elem.bind("touchend", function (o) {
					e.showHideWindow("hide"), e.options.showLens && e.showHideLens("hide"), e.options.tint && "inner" != e.options.zoomType && e.showHideTint("hide")
				}), e.options.showLens && (e.zoomLens.bind("touchmove", function (o) {
					o.preventDefault();
					var i = o.originalEvent.touches[0] || o.originalEvent.changedTouches[0];
					e.setPosition(i)
				}), e.zoomLens.bind("touchend", function (o) {
					e.showHideWindow("hide"), e.options.showLens && e.showHideLens("hide"), e.options.tint && "inner" != e.options.zoomType && e.showHideTint("hide")
				})), e.$elem.bind("mousemove", function (o) {
					0 == e.overWindow && e.setElements("show"), (e.lastX !== o.clientX || e.lastY !== o.clientY) && (e.setPosition(o), e.currentLoc = o), e.lastX = o.clientX, e.lastY = o.clientY
				}), e.zoomContainer.bind("mousemove", function (o) {
					0 == e.overWindow && e.setElements("show"), (e.lastX !== o.clientX || e.lastY !== o.clientY) && (e.setPosition(o), e.currentLoc = o), e.lastX = o.clientX, e.lastY = o.clientY
				}), "inner" != e.options.zoomType && e.zoomLens.bind("mousemove", function (o) {
					(e.lastX !== o.clientX || e.lastY !== o.clientY) && (e.setPosition(o), e.currentLoc = o), e.lastX = o.clientX, e.lastY = o.clientY
				}), e.options.tint && "inner" != e.options.zoomType && e.zoomTint.bind("mousemove", function (o) {
					(e.lastX !== o.clientX || e.lastY !== o.clientY) && (e.setPosition(o), e.currentLoc = o), e.lastX = o.clientX, e.lastY = o.clientY
				}), "inner" == e.options.zoomType && e.zoomWindow.bind("mousemove", function (o) {
					(e.lastX !== o.clientX || e.lastY !== o.clientY) && (e.setPosition(o), e.currentLoc = o), e.lastX = o.clientX, e.lastY = o.clientY
				}), e.zoomContainer.add(e.$elem).mouseenter(function () {
					0 == e.overWindow && e.setElements("show")
				}).mouseleave(function () {
					e.scrollLock || e.setElements("hide")
				}), "inner" != e.options.zoomType && e.zoomWindow.mouseenter(function () {
					e.overWindow = !0, e.setElements("hide")
				}).mouseleave(function () {
					e.overWindow = !1
				}), 1 != e.options.zoomLevel, e.options.minZoomLevel ? e.minZoomLevel = e.options.minZoomLevel : e.minZoomLevel = 2 * e.options.scrollZoomIncrement, e.options.scrollZoom && e.zoomContainer.add(e.$elem).bind("mousewheel DOMMouseScroll MozMousePixelScroll", function (i) {
					e.scrollLock = !0, clearTimeout(o.data(this, "timer")), o.data(this, "timer", setTimeout(function () {
						e.scrollLock = !1
					}, 250));
					var t = i.originalEvent.wheelDelta || -1 * i.originalEvent.detail;
					return i.stopImmediatePropagation(), i.stopPropagation(), i.preventDefault(), t / 120 > 0 ? e.currentZoomLevel >= e.minZoomLevel && e.changeZoomLevel(e.currentZoomLevel - e.options.scrollZoomIncrement) : e.options.maxZoomLevel ? e.currentZoomLevel <= e.options.maxZoomLevel && e.changeZoomLevel(parseFloat(e.currentZoomLevel) + e.options.scrollZoomIncrement) : e.changeZoomLevel(parseFloat(e.currentZoomLevel) + e.options.scrollZoomIncrement), !1
				})
			},
			setElements: function (o) {
				var e = this;
				return e.options.zoomEnabled ? ("show" == o && e.isWindowSet && ("inner" == e.options.zoomType && e.showHideWindow("show"), "window" == e.options.zoomType && e.showHideWindow("show"), e.options.showLens && e.showHideLens("show"), e.options.tint && "inner" != e.options.zoomType && e.showHideTint("show")), void("hide" == o && ("window" == e.options.zoomType && e.showHideWindow("hide"), e.options.tint || e.showHideWindow("hide"), e.options.showLens && e.showHideLens("hide"), e.options.tint && e.showHideTint("hide")))) : !1
			},
			setPosition: function (o) {
				var e = this;
				return e.options.zoomEnabled ? (e.nzHeight = e.$elem.height(), e.nzWidth = e.$elem.width(), e.nzOffset = e.$elem.offset(), e.options.tint && "inner" != e.options.zoomType && (e.zoomTint.css({
					top: 0
				}), e.zoomTint.css({
					left: 0
				})), e.options.responsive && !e.options.scrollZoom && e.options.showLens && (e.nzHeight < e.options.zoomWindowWidth / e.widthRatio ? lensHeight = e.nzHeight : lensHeight = String(e.options.zoomWindowHeight / e.heightRatio), e.largeWidth < e.options.zoomWindowWidth ? lensWidth = e.nzWidth : lensWidth = e.options.zoomWindowWidth / e.widthRatio, e.widthRatio = e.largeWidth / e.nzWidth, e.heightRatio = e.largeHeight / e.nzHeight, "lens" != e.options.zoomType && (e.nzHeight < e.options.zoomWindowWidth / e.widthRatio ? lensHeight = e.nzHeight : lensHeight = String(e.options.zoomWindowHeight / e.heightRatio), e.options.zoomWindowWidth < e.options.zoomWindowWidth ? lensWidth = e.nzWidth : lensWidth = e.options.zoomWindowWidth / e.widthRatio, e.zoomLens.css("width", lensWidth), e.zoomLens.css("height", lensHeight), e.options.tint && (e.zoomTintImage.css("width", e.nzWidth), e.zoomTintImage.css("height", e.nzHeight))), "lens" == e.options.zoomType && e.zoomLens.css({
					width: String(e.options.lensSize) + "px",
					height: String(e.options.lensSize) + "px"
				})), e.zoomContainer.css({
					top: e.nzOffset.top
				}), e.zoomContainer.css({
					left: e.nzOffset.left
				}), e.mouseLeft = parseInt(o.pageX - e.nzOffset.left), e.mouseTop = parseInt(o.pageY - e.nzOffset.top), "window" == e.options.zoomType && (e.Etoppos = e.mouseTop < e.zoomLens.height() / 2, e.Eboppos = e.mouseTop > e.nzHeight - e.zoomLens.height() / 2 - 2 * e.options.lensBorderSize, e.Eloppos = e.mouseLeft < 0 + e.zoomLens.width() / 2, e.Eroppos = e.mouseLeft > e.nzWidth - e.zoomLens.width() / 2 - 2 * e.options.lensBorderSize), "inner" == e.options.zoomType && (e.Etoppos = e.mouseTop < e.nzHeight / 2 / e.heightRatio, e.Eboppos = e.mouseTop > e.nzHeight - e.nzHeight / 2 / e.heightRatio, e.Eloppos = e.mouseLeft < 0 + e.nzWidth / 2 / e.widthRatio, e.Eroppos = e.mouseLeft > e.nzWidth - e.nzWidth / 2 / e.widthRatio - 2 * e.options.lensBorderSize), e.mouseLeft <= 0 || e.mouseTop < 0 || e.mouseLeft > e.nzWidth || e.mouseTop > e.nzHeight ? void e.setElements("hide") : (e.options.showLens && (e.lensLeftPos = String(e.mouseLeft - e.zoomLens.width() / 2), e.lensTopPos = String(e.mouseTop - e.zoomLens.height() / 2)), e.Etoppos && (e.lensTopPos = 0), e.Eloppos && (e.windowLeftPos = 0, e.lensLeftPos = 0, e.tintpos = 0), "window" == e.options.zoomType && (e.Eboppos && (e.lensTopPos = Math.max(e.nzHeight - e.zoomLens.height() - 2 * e.options.lensBorderSize, 0)), e.Eroppos && (e.lensLeftPos = e.nzWidth - e.zoomLens.width() - 2 * e.options.lensBorderSize)), "inner" == e.options.zoomType && (e.Eboppos && (e.lensTopPos = Math.max(e.nzHeight - 2 * e.options.lensBorderSize, 0)), e.Eroppos && (e.lensLeftPos = e.nzWidth - e.nzWidth - 2 * e.options.lensBorderSize)), "lens" == e.options.zoomType && (e.windowLeftPos = String(-1 * ((o.pageX - e.nzOffset.left) * e.widthRatio - e.zoomLens.width() / 2)), e.windowTopPos = String(-1 * ((o.pageY - e.nzOffset.top) * e.heightRatio - e.zoomLens.height() / 2)), e.zoomLens.css({
					backgroundPosition: e.windowLeftPos + "px " + e.windowTopPos + "px"
				}), e.changeBgSize && (e.nzHeight > e.nzWidth ? ("lens" == e.options.zoomType && e.zoomLens.css({
					"background-size": e.largeWidth / e.newvalueheight + "px " + e.largeHeight / e.newvalueheight + "px"
				}), e.zoomWindow.css({
					"background-size": e.largeWidth / e.newvalueheight + "px " + e.largeHeight / e.newvalueheight + "px"
				})) : ("lens" == e.options.zoomType && e.zoomLens.css({
					"background-size": e.largeWidth / e.newvaluewidth + "px " + e.largeHeight / e.newvaluewidth + "px"
				}), e.zoomWindow.css({
					"background-size": e.largeWidth / e.newvaluewidth + "px " + e.largeHeight / e.newvaluewidth + "px"
				})), e.changeBgSize = !1), e.setWindowPostition(o)), e.options.tint && "inner" != e.options.zoomType && e.setTintPosition(o), "window" == e.options.zoomType && e.setWindowPostition(o), "inner" == e.options.zoomType && e.setWindowPostition(o), e.options.showLens && (e.fullwidth && "lens" != e.options.zoomType && (e.lensLeftPos = 0), e.zoomLens.css({
					left: e.lensLeftPos + "px",
					top: e.lensTopPos + "px"
				})), void 0)) : !1
			},
			showHideWindow: function (o) {
				var e = this;
				"show" == o && (e.isWindowActive || (e.options.zoomWindowFadeIn ? e.zoomWindow.stop(!0, !0, !1).fadeIn(e.options.zoomWindowFadeIn) : e.zoomWindow.show(), e.isWindowActive = !0)), "hide" == o && e.isWindowActive && (e.options.zoomWindowFadeOut ? e.zoomWindow.stop(!0, !0).fadeOut(e.options.zoomWindowFadeOut) : e.zoomWindow.hide(), e.isWindowActive = !1)
			},
			showHideLens: function (o) {
				var e = this;
				"show" == o && (e.isLensActive || (e.options.lensFadeIn ? e.zoomLens.stop(!0, !0, !1).fadeIn(e.options.lensFadeIn) : e.zoomLens.show(), e.isLensActive = !0)), "hide" == o && e.isLensActive && (e.options.lensFadeOut ? e.zoomLens.stop(!0, !0).fadeOut(e.options.lensFadeOut) : e.zoomLens.hide(), e.isLensActive = !1)
			},
			showHideTint: function (o) {
				var e = this;
				"show" == o && (e.isTintActive || (e.options.zoomTintFadeIn ? e.zoomTint.css({
					opacity: e.options.tintOpacity
				}).animate().stop(!0, !0).fadeIn("slow") : (e.zoomTint.css({
					opacity: e.options.tintOpacity
				}).animate(), e.zoomTint.show()), e.isTintActive = !0)), "hide" == o && e.isTintActive && (e.options.zoomTintFadeOut ? e.zoomTint.stop(!0, !0).fadeOut(e.options.zoomTintFadeOut) : e.zoomTint.hide(), e.isTintActive = !1)
			},
			setLensPostition: function (o) {},
			setWindowPostition: function (e) {
				var i = this;
				if (isNaN(i.options.zoomWindowPosition)) i.externalContainer = o("#" + i.options.zoomWindowPosition), i.externalContainerWidth = i.externalContainer.width(), i.externalContainerHeight = i.externalContainer.height(), i.externalContainerOffset = i.externalContainer.offset(), i.windowOffsetTop = i.externalContainerOffset.top, i.windowOffsetLeft = i.externalContainerOffset.left;
				else switch (i.options.zoomWindowPosition) {
					case 1:
						i.windowOffsetTop = i.options.zoomWindowOffety, i.windowOffsetLeft = +i.nzWidth;
						break;
					case 2:
						i.options.zoomWindowHeight > i.nzHeight && (i.windowOffsetTop = -1 * (i.options.zoomWindowHeight / 2 - i.nzHeight / 2), i.windowOffsetLeft = i.nzWidth);
						break;
					case 3:
						i.windowOffsetTop = i.nzHeight - i.zoomWindow.height() - 2 * i.options.borderSize, i.windowOffsetLeft = i.nzWidth;
						break;
					case 4:
						i.windowOffsetTop = i.nzHeight, i.windowOffsetLeft = i.nzWidth;
						break;
					case 5:
						i.windowOffsetTop = i.nzHeight, i.windowOffsetLeft = i.nzWidth - i.zoomWindow.width() - 2 * i.options.borderSize;
						break;
					case 6:
						i.options.zoomWindowHeight > i.nzHeight && (i.windowOffsetTop = i.nzHeight, i.windowOffsetLeft = -1 * (i.options.zoomWindowWidth / 2 - i.nzWidth / 2 + 2 * i.options.borderSize));
						break;
					case 7:
						i.windowOffsetTop = i.nzHeight, i.windowOffsetLeft = 0;
						break;
					case 8:
						i.windowOffsetTop = i.nzHeight, i.windowOffsetLeft = -1 * (i.zoomWindow.width() + 2 * i.options.borderSize);
						break;
					case 9:
						i.windowOffsetTop = i.nzHeight - i.zoomWindow.height() - 2 * i.options.borderSize, i.windowOffsetLeft = -1 * (i.zoomWindow.width() + 2 * i.options.borderSize);
						break;
					case 10:
						i.options.zoomWindowHeight > i.nzHeight && (i.windowOffsetTop = -1 * (i.options.zoomWindowHeight / 2 - i.nzHeight / 2), i.windowOffsetLeft = -1 * (i.zoomWindow.width() + 2 * i.options.borderSize));
						break;
					case 11:
						i.windowOffsetTop = i.options.zoomWindowOffety, i.windowOffsetLeft = -1 * (i.zoomWindow.width() + 2 * i.options.borderSize);
						break;
					case 12:
						i.windowOffsetTop = -1 * (i.zoomWindow.height() + 2 * i.options.borderSize), i.windowOffsetLeft = -1 * (i.zoomWindow.width() + 2 * i.options.borderSize);
						break;
					case 13:
						i.windowOffsetTop = -1 * (i.zoomWindow.height() + 2 * i.options.borderSize), i.windowOffsetLeft = 0;
						break;
					case 14:
						i.options.zoomWindowHeight > i.nzHeight && (i.windowOffsetTop = -1 * (i.zoomWindow.height() + 2 * i.options.borderSize), i.windowOffsetLeft = -1 * (i.options.zoomWindowWidth / 2 - i.nzWidth / 2 + 2 * i.options.borderSize));
						break;
					case 15:
						i.windowOffsetTop = -1 * (i.zoomWindow.height() + 2 * i.options.borderSize), i.windowOffsetLeft = i.nzWidth - i.zoomWindow.width() - 2 * i.options.borderSize;
						break;
					case 16:
						i.windowOffsetTop = -1 * (i.zoomWindow.height() + 2 * i.options.borderSize), i.windowOffsetLeft = i.nzWidth;
						break;
					default:
						i.windowOffsetTop = i.options.zoomWindowOffety, i.windowOffsetLeft = i.nzWidth
				}
				i.isWindowSet = !0, i.windowOffsetTop = i.windowOffsetTop + i.options.zoomWindowOffety, i.windowOffsetLeft = i.windowOffsetLeft + i.options.zoomWindowOffetx, i.zoomWindow.css({
					top: i.windowOffsetTop
				}), i.zoomWindow.css({
					left: i.windowOffsetLeft
				}), "inner" == i.options.zoomType && (i.zoomWindow.css({
					top: 0
				}), i.zoomWindow.css({
					left: 0
				})), i.windowLeftPos = String(-1 * ((e.pageX - i.nzOffset.left) * i.widthRatio - i.zoomWindow.width() / 2)), i.windowTopPos = String(-1 * ((e.pageY - i.nzOffset.top) * i.heightRatio - i.zoomWindow.height() / 2)), i.Etoppos && (i.windowTopPos = 0), i.Eloppos && (i.windowLeftPos = 0), i.Eboppos && (i.windowTopPos = -1 * (i.largeHeight / i.currentZoomLevel - i.zoomWindow.height())), i.Eroppos && (i.windowLeftPos = -1 * (i.largeWidth / i.currentZoomLevel - i.zoomWindow.width())), i.fullheight && (i.windowTopPos = 0), i.fullwidth && (i.windowLeftPos = 0), ("window" == i.options.zoomType || "inner" == i.options.zoomType) && (1 == i.zoomLock && (i.widthRatio <= 1 && (i.windowLeftPos = 0), i.heightRatio <= 1 && (i.windowTopPos = 0)), i.largeHeight < i.options.zoomWindowHeight && (i.windowTopPos = 0), i.largeWidth < i.options.zoomWindowWidth && (i.windowLeftPos = 0), i.options.easing ? (i.xp || (i.xp = 0), i.yp || (i.yp = 0), i.loop || (i.loop = setInterval(function () {
					i.xp += (i.windowLeftPos - i.xp) / i.options.easingAmount, i.yp += (i.windowTopPos - i.yp) / i.options.easingAmount, i.scrollingLock ? (clearInterval(i.loop), i.xp = i.windowLeftPos, i.yp = i.windowTopPos, i.xp = -1 * ((e.pageX - i.nzOffset.left) * i.widthRatio - i.zoomWindow.width() / 2), i.yp = -1 * ((e.pageY - i.nzOffset.top) * i.heightRatio - i.zoomWindow.height() / 2), i.changeBgSize && (i.nzHeight > i.nzWidth ? ("lens" == i.options.zoomType && i.zoomLens.css({
						"background-size": i.largeWidth / i.newvalueheight + "px " + i.largeHeight / i.newvalueheight + "px"
					}), i.zoomWindow.css({
						"background-size": i.largeWidth / i.newvalueheight + "px " + i.largeHeight / i.newvalueheight + "px"
					})) : ("lens" != i.options.zoomType && i.zoomLens.css({
						"background-size": i.largeWidth / i.newvaluewidth + "px " + i.largeHeight / i.newvalueheight + "px"
					}), i.zoomWindow.css({
						"background-size": i.largeWidth / i.newvaluewidth + "px " + i.largeHeight / i.newvaluewidth + "px"
					})), i.changeBgSize = !1), i.zoomWindow.css({
						backgroundPosition: i.windowLeftPos + "px " + i.windowTopPos + "px"
					}), i.scrollingLock = !1, i.loop = !1) : (i.changeBgSize && (i.nzHeight > i.nzWidth ? ("lens" == i.options.zoomType && i.zoomLens.css({
						"background-size": i.largeWidth / i.newvalueheight + "px " + i.largeHeight / i.newvalueheight + "px"
					}), i.zoomWindow.css({
						"background-size": i.largeWidth / i.newvalueheight + "px " + i.largeHeight / i.newvalueheight + "px"
					})) : ("lens" != i.options.zoomType && i.zoomLens.css({
						"background-size": i.largeWidth / i.newvaluewidth + "px " + i.largeHeight / i.newvaluewidth + "px"
					}), i.zoomWindow.css({
						"background-size": i.largeWidth / i.newvaluewidth + "px " + i.largeHeight / i.newvaluewidth + "px"
					})), i.changeBgSize = !1), i.zoomWindow.css({
						backgroundPosition: i.xp + "px " + i.yp + "px"
					}))
				}, 16))) : (i.changeBgSize && (i.nzHeight > i.nzWidth ? ("lens" == i.options.zoomType && i.zoomLens.css({
					"background-size": i.largeWidth / i.newvalueheight + "px " + i.largeHeight / i.newvalueheight + "px"
				}), i.zoomWindow.css({
					"background-size": i.largeWidth / i.newvalueheight + "px " + i.largeHeight / i.newvalueheight + "px"
				})) : ("lens" == i.options.zoomType && i.zoomLens.css({
					"background-size": i.largeWidth / i.newvaluewidth + "px " + i.largeHeight / i.newvaluewidth + "px"
				}), i.largeHeight / i.newvaluewidth < i.options.zoomWindowHeight ? i.zoomWindow.css({
					"background-size": i.largeWidth / i.newvaluewidth + "px " + i.largeHeight / i.newvaluewidth + "px"
				}) : i.zoomWindow.css({
					"background-size": i.largeWidth / i.newvalueheight + "px " + i.largeHeight / i.newvalueheight + "px"
				})), i.changeBgSize = !1), i.zoomWindow.css({
					backgroundPosition: i.windowLeftPos + "px " + i.windowTopPos + "px"
				})))
			},
			setTintPosition: function (o) {
				var e = this;
				e.nzOffset = e.$elem.offset(), e.tintpos = String(-1 * (o.pageX - e.nzOffset.left - e.zoomLens.width() / 2)), e.tintposy = String(-1 * (o.pageY - e.nzOffset.top - e.zoomLens.height() / 2)), e.Etoppos && (e.tintposy = 0), e.Eloppos && (e.tintpos = 0), e.Eboppos && (e.tintposy = -1 * (e.nzHeight - e.zoomLens.height() - 2 * e.options.lensBorderSize)), e.Eroppos && (e.tintpos = -1 * (e.nzWidth - e.zoomLens.width() - 2 * e.options.lensBorderSize)), e.options.tint && (e.fullheight && (e.tintposy = 0), e.fullwidth && (e.tintpos = 0), e.zoomTintImage.css({
					left: e.tintpos + "px"
				}), e.zoomTintImage.css({
					top: e.tintposy + "px"
				}))
			},
			swaptheimage: function (e, i) {
				var t = this,
					n = new Image;
				t.options.loadingIcon && (t.spinner = o("<div style=\"background: url('" + t.options.loadingIcon + "') no-repeat center;height:" + t.nzHeight + "px;width:" + t.nzWidth + 'px;z-index: 2000;position: absolute; background-position: center center;"></div>'), t.$elem.after(t.spinner)), t.options.onImageSwap(t.$elem), n.onload = function () {
					t.largeWidth = n.width, t.largeHeight = n.height, t.zoomImage = i, t.zoomWindow.css({
						"background-size": t.largeWidth + "px " + t.largeHeight + "px"
					}), t.zoomWindow.css({
						"background-size": t.largeWidth + "px " + t.largeHeight + "px"
					}), t.swapAction(e, i)
				}, n.src = i
			},
			swapAction: function (e, i) {
				var t = this,
					n = new Image;
				if (n.onload = function () {
						t.nzHeight = n.height, t.nzWidth = n.width, t.options.onImageSwapComplete(t.$elem), t.doneCallback()
					}, n.src = e, t.currentZoomLevel = t.options.zoomLevel, t.options.maxZoomLevel = !1, "lens" == t.options.zoomType && t.zoomLens.css({
						backgroundImage: "url('" + i + "')"
					}), "window" == t.options.zoomType && t.zoomWindow.css({
						backgroundImage: "url('" + i + "')"
					}), "inner" == t.options.zoomType && t.zoomWindow.css({
						backgroundImage: "url('" + i + "')"
					}), t.currentImage = i, t.options.imageCrossfade) {
					var s = t.$elem,
						h = s.clone();
					if (t.$elem.attr("src", e), t.$elem.after(h), h.stop(!0).fadeOut(t.options.imageCrossfade, function () {
							o(this).remove()
						}), t.$elem.width("auto").removeAttr("width"), t.$elem.height("auto").removeAttr("height"), s.fadeIn(t.options.imageCrossfade), t.options.tint && "inner" != t.options.zoomType) {
						var a = t.zoomTintImage,
							d = a.clone();
						t.zoomTintImage.attr("src", i), t.zoomTintImage.after(d), d.stop(!0).fadeOut(t.options.imageCrossfade, function () {
							o(this).remove()
						}), a.fadeIn(t.options.imageCrossfade), t.zoomTint.css({
							height: t.$elem.height()
						}), t.zoomTint.css({
							width: t.$elem.width()
						})
					}
					t.zoomContainer.css("height", t.$elem.height()), t.zoomContainer.css("width", t.$elem.width()), "inner" == t.options.zoomType && (t.options.constrainType || (t.zoomWrap.parent().css("height", t.$elem.height()), t.zoomWrap.parent().css("width", t.$elem.width()), t.zoomWindow.css("height", t.$elem.height()), t.zoomWindow.css("width", t.$elem.width()))), t.options.imageCrossfade && (t.zoomWrap.css("height", t.$elem.height()), t.zoomWrap.css("width", t.$elem.width()))
				} else t.$elem.attr("src", e), t.options.tint && (t.zoomTintImage.attr("src", i), t.zoomTintImage.attr("height", t.$elem.height()), t.zoomTintImage.css({
					height: t.$elem.height()
				}), t.zoomTint.css({
					height: t.$elem.height()
				})), t.zoomContainer.css("height", t.$elem.height()), t.zoomContainer.css("width", t.$elem.width()), t.options.imageCrossfade && (t.zoomWrap.css("height", t.$elem.height()), t.zoomWrap.css("width", t.$elem.width()));
				t.options.constrainType && ("height" == t.options.constrainType && (t.zoomContainer.css("height", t.options.constrainSize), t.zoomContainer.css("width", "auto"), t.options.imageCrossfade ? (t.zoomWrap.css("height", t.options.constrainSize), t.zoomWrap.css("width", "auto"), t.constwidth = t.zoomWrap.width()) : (t.$elem.css("height", t.options.constrainSize), t.$elem.css("width", "auto"), t.constwidth = t.$elem.width()), "inner" == t.options.zoomType && (t.zoomWrap.parent().css("height", t.options.constrainSize), t.zoomWrap.parent().css("width", t.constwidth), t.zoomWindow.css("height", t.options.constrainSize), t.zoomWindow.css("width", t.constwidth)), t.options.tint && (t.tintContainer.css("height", t.options.constrainSize), t.tintContainer.css("width", t.constwidth), t.zoomTint.css("height", t.options.constrainSize), t.zoomTint.css("width", t.constwidth), t.zoomTintImage.css("height", t.options.constrainSize), t.zoomTintImage.css("width", t.constwidth))), "width" == t.options.constrainType && (t.zoomContainer.css("height", "auto"), t.zoomContainer.css("width", t.options.constrainSize), t.options.imageCrossfade ? (t.zoomWrap.css("height", "auto"), t.zoomWrap.css("width", t.options.constrainSize), t.constheight = t.zoomWrap.height()) : (t.$elem.css("height", "auto"), t.$elem.css("width", t.options.constrainSize), t.constheight = t.$elem.height()), "inner" == t.options.zoomType && (t.zoomWrap.parent().css("height", t.constheight), t.zoomWrap.parent().css("width", t.options.constrainSize), t.zoomWindow.css("height", t.constheight), t.zoomWindow.css("width", t.options.constrainSize)), t.options.tint && (t.tintContainer.css("height", t.constheight), t.tintContainer.css("width", t.options.constrainSize), t.zoomTint.css("height", t.constheight), t.zoomTint.css("width", t.options.constrainSize), t.zoomTintImage.css("height", t.constheight), t.zoomTintImage.css("width", t.options.constrainSize))))
			},
			doneCallback: function () {
				var o = this;
				o.options.loadingIcon && o.spinner.hide(), o.nzOffset = o.$elem.offset(), o.nzWidth = o.$elem.width(), o.nzHeight = o.$elem.height(), o.currentZoomLevel = o.options.zoomLevel, o.widthRatio = o.largeWidth / o.nzWidth, o.heightRatio = o.largeHeight / o.nzHeight, "window" == o.options.zoomType && (o.nzHeight < o.options.zoomWindowWidth / o.widthRatio ? lensHeight = o.nzHeight : lensHeight = String(o.options.zoomWindowHeight / o.heightRatio), o.options.zoomWindowWidth < o.options.zoomWindowWidth ? lensWidth = o.nzWidth : lensWidth = o.options.zoomWindowWidth / o.widthRatio, o.zoomLens && (o.zoomLens.css("width", lensWidth), o.zoomLens.css("height", lensHeight)))
			},
			getCurrentImage: function () {
				var o = this;
				return o.zoomImage
			},
			getGalleryList: function () {
				var e = this;
				return e.gallerylist = [], e.options.gallery ? o("#" + e.options.gallery + " a").each(function () {
					var i = "";
					o(this).data("zoom-image") ? i = o(this).data("zoom-image") : o(this).data("image") && (i = o(this).data("image")), i == e.zoomImage ? e.gallerylist.unshift({
						href: "" + i,
						title: o(this).find("img").attr("title")
					}) : e.gallerylist.push({
						href: "" + i,
						title: o(this).find("img").attr("title")
					})
				}) : e.gallerylist.push({
					href: "" + e.zoomImage,
					title: o(this).find("img").attr("title")
				}), e.gallerylist
			},
			changeZoomLevel: function (o) {
				var e = this;
				e.scrollingLock = !0, e.newvalue = parseFloat(o).toFixed(2), newvalue = parseFloat(o).toFixed(2), maxheightnewvalue = e.largeHeight / (e.options.zoomWindowHeight / e.nzHeight * e.nzHeight), maxwidthtnewvalue = e.largeWidth / (e.options.zoomWindowWidth / e.nzWidth * e.nzWidth), "inner" != e.options.zoomType && (maxheightnewvalue <= newvalue ? (e.heightRatio = e.largeHeight / maxheightnewvalue / e.nzHeight, e.newvalueheight = maxheightnewvalue, e.fullheight = !0) : (e.heightRatio = e.largeHeight / newvalue / e.nzHeight, e.newvalueheight = newvalue, e.fullheight = !1), maxwidthtnewvalue <= newvalue ? (e.widthRatio = e.largeWidth / maxwidthtnewvalue / e.nzWidth, e.newvaluewidth = maxwidthtnewvalue, e.fullwidth = !0) : (e.widthRatio = e.largeWidth / newvalue / e.nzWidth, e.newvaluewidth = newvalue, e.fullwidth = !1), "lens" == e.options.zoomType && (maxheightnewvalue <= newvalue ? (e.fullwidth = !0, e.newvaluewidth = maxheightnewvalue) : (e.widthRatio = e.largeWidth / newvalue / e.nzWidth, e.newvaluewidth = newvalue, e.fullwidth = !1))), "inner" == e.options.zoomType && (maxheightnewvalue = parseFloat(e.largeHeight / e.nzHeight).toFixed(2), maxwidthtnewvalue = parseFloat(e.largeWidth / e.nzWidth).toFixed(2), newvalue > maxheightnewvalue && (newvalue = maxheightnewvalue), newvalue > maxwidthtnewvalue && (newvalue = maxwidthtnewvalue), maxheightnewvalue <= newvalue ? (e.heightRatio = e.largeHeight / newvalue / e.nzHeight, newvalue > maxheightnewvalue ? e.newvalueheight = maxheightnewvalue : e.newvalueheight = newvalue, e.fullheight = !0) : (e.heightRatio = e.largeHeight / newvalue / e.nzHeight, newvalue > maxheightnewvalue ? e.newvalueheight = maxheightnewvalue : e.newvalueheight = newvalue, e.fullheight = !1), maxwidthtnewvalue <= newvalue ? (e.widthRatio = e.largeWidth / newvalue / e.nzWidth, newvalue > maxwidthtnewvalue ? e.newvaluewidth = maxwidthtnewvalue : e.newvaluewidth = newvalue, e.fullwidth = !0) : (e.widthRatio = e.largeWidth / newvalue / e.nzWidth, e.newvaluewidth = newvalue, e.fullwidth = !1)), scrcontinue = !1, "inner" == e.options.zoomType && (e.nzWidth >= e.nzHeight && (e.newvaluewidth <= maxwidthtnewvalue ? scrcontinue = !0 : (scrcontinue = !1, e.fullheight = !0, e.fullwidth = !0)), e.nzHeight > e.nzWidth && (e.newvaluewidth <= maxwidthtnewvalue ? scrcontinue = !0 : (scrcontinue = !1, e.fullheight = !0, e.fullwidth = !0))), "inner" != e.options.zoomType && (scrcontinue = !0), scrcontinue && (e.zoomLock = 0, e.changeZoom = !0, e.options.zoomWindowHeight / e.heightRatio <= e.nzHeight && (e.currentZoomLevel = e.newvalueheight, "lens" != e.options.zoomType && "inner" != e.options.zoomType && (e.changeBgSize = !0, e.zoomLens.css({
					height: String(e.options.zoomWindowHeight / e.heightRatio) + "px"
				})), ("lens" == e.options.zoomType || "inner" == e.options.zoomType) && (e.changeBgSize = !0)), e.options.zoomWindowWidth / e.widthRatio <= e.nzWidth && ("inner" != e.options.zoomType && e.newvaluewidth > e.newvalueheight && (e.currentZoomLevel = e.newvaluewidth), "lens" != e.options.zoomType && "inner" != e.options.zoomType && (e.changeBgSize = !0, e.zoomLens.css({
					width: String(e.options.zoomWindowWidth / e.widthRatio) + "px"
				})), ("lens" == e.options.zoomType || "inner" == e.options.zoomType) && (e.changeBgSize = !0)), "inner" == e.options.zoomType && (e.changeBgSize = !0, e.nzWidth > e.nzHeight && (e.currentZoomLevel = e.newvaluewidth), e.nzHeight > e.nzWidth && (e.currentZoomLevel = e.newvaluewidth))), e.setPosition(e.currentLoc)
			},
			closeAll: function () {
				self.zoomWindow && self.zoomWindow.hide(), self.zoomLens && self.zoomLens.hide(), self.zoomTint && self.zoomTint.hide()
			},
			changeState: function (o) {
				var e = this;
				"enable" == o && (e.options.zoomEnabled = !0), "disable" == o && (e.options.zoomEnabled = !1)
			}
		};
		o.fn.elevateZoom = function (e) {
			return this.each(function () {
				var i = Object.create(n);
				i.init(e, this), o.data(this, "elevateZoom", i)
			})
		}, o.fn.elevateZoom.options = {
			zoomActivation: "hover",
			zoomEnabled: !0,
			preloading: 1,
			zoomLevel: 1,
			scrollZoom: !1,
			scrollZoomIncrement: .1,
			minZoomLevel: !1,
			maxZoomLevel: !1,
			easing: !1,
			easingAmount: 12,
			lensSize: 200,
			zoomWindowWidth: 400,
			zoomWindowHeight: 400,
			zoomWindowOffetx: 0,
			zoomWindowOffety: 0,
			zoomWindowPosition: 1,
			zoomWindowBgColour: "#fff",
			lensFadeIn: !1,
			lensFadeOut: !1,
			debug: !1,
			zoomWindowFadeIn: !1,
			zoomWindowFadeOut: !1,
			zoomWindowAlwaysShow: !1,
			zoomTintFadeIn: !1,
			zoomTintFadeOut: !1,
			borderSize: 4,
			showLens: !0,
			borderColour: "#888",
			lensBorderSize: 1,
			lensBorderColour: "#000",
			lensShape: "square",
			zoomType: "window",
			containLensZoom: !1,
			lensColour: "white",
			lensOpacity: .4,
			lenszoom: !1,
			tint: !1,
			tintColour: "#333",
			tintOpacity: .4,
			gallery: !1,
			galleryActiveClass: "zoomGalleryActive",
			imageCrossfade: !1,
			constrainType: !1,
			constrainSize: !1,
			loadingIcon: !1,
			cursor: "default",
			responsive: !0,
			onComplete: o.noop,
			onZoomedImageLoaded: function () {},
			onImageSwap: o.noop,
			onImageSwapComplete: o.noop
		}
	}(jQuery, window, document);


/* jQuery Storage API Plugin 1.7.5 https://github.com/julien-maurel/jQuery-Storage-API */
! function (e) {
	"function" == typeof define && define.amd ? define(["jquery"], e) : e("object" == typeof exports ? require("jquery") : jQuery)
}(function (e) {
	function t(t) {
		var r, i, n, o = arguments.length,
			s = window[t],
			a = arguments,
			u = a[1];
		if (2 > o) throw Error("Minimum 2 arguments must be given");
		if (e.isArray(u)) {
			i = {};
			for (var f in u) {
				r = u[f];
				try {
					i[r] = JSON.parse(s.getItem(r))
				} catch (c) {
					i[r] = s.getItem(r)
				}
			}
			return i
		}
		if (2 != o) {
			try {
				i = JSON.parse(s.getItem(u))
			} catch (c) {
				throw new ReferenceError(u + " is not defined in this storage")
			}
			for (var f = 2; o - 1 > f; f++)
				if (i = i[a[f]], void 0 === i) throw new ReferenceError([].slice.call(a, 1, f + 1).join(".") + " is not defined in this storage");
			if (e.isArray(a[f])) {
				n = i, i = {};
				for (var m in a[f]) i[a[f][m]] = n[a[f][m]];
				return i
			}
			return i[a[f]]
		}
		try {
			return JSON.parse(s.getItem(u))
		} catch (c) {
			return s.getItem(u)
		}
	}

	function r(t) {
		var r, i, n = arguments.length,
			o = window[t],
			s = arguments,
			a = s[1],
			u = s[2],
			f = {};
		if (2 > n || !e.isPlainObject(a) && 3 > n) throw Error("Minimum 3 arguments must be given or second parameter must be an object");
		if (e.isPlainObject(a)) {
			for (var c in a) r = a[c], e.isPlainObject(r) ? o.setItem(c, JSON.stringify(r)) : o.setItem(c, r);
			return a
		}
		if (3 == n) return "object" == typeof u ? o.setItem(a, JSON.stringify(u)) : o.setItem(a, u), u;
		try {
			i = o.getItem(a), null != i && (f = JSON.parse(i))
		} catch (m) {}
		i = f;
		for (var c = 2; n - 2 > c; c++) r = s[c], i[r] && e.isPlainObject(i[r]) || (i[r] = {}), i = i[r];
		return i[s[c]] = s[c + 1], o.setItem(a, JSON.stringify(f)), f
	}

	function i(t) {
		var r, i, n = arguments.length,
			o = window[t],
			s = arguments,
			a = s[1];
		if (2 > n) throw Error("Minimum 2 arguments must be given");
		if (e.isArray(a)) {
			for (var u in a) o.removeItem(a[u]);
			return !0
		}
		if (2 == n) return o.removeItem(a), !0;
		try {
			r = i = JSON.parse(o.getItem(a))
		} catch (f) {
			throw new ReferenceError(a + " is not defined in this storage")
		}
		for (var u = 2; n - 1 > u; u++)
			if (i = i[s[u]], void 0 === i) throw new ReferenceError([].slice.call(s, 1, u).join(".") + " is not defined in this storage");
		if (e.isArray(s[u]))
			for (var c in s[u]) delete i[s[u][c]];
		else delete i[s[u]];
		return o.setItem(a, JSON.stringify(r)), !0
	}

	function n(t, r) {
		var n = a(t);
		for (var o in n) i(t, n[o]);
		if (r)
			for (var o in e.namespaceStorages) u(o)
	}

	function o(r) {
		var i = arguments.length,
			n = arguments,
			s = (window[r], n[1]);
		if (1 == i) return 0 == a(r).length;
		if (e.isArray(s)) {
			for (var u = 0; u < s.length; u++)
				if (!o(r, s[u])) return !1;
			return !0
		}
		try {
			var f = t.apply(this, arguments);
			e.isArray(n[i - 1]) || (f = {
				totest: f
			});
			for (var u in f)
				if (!(e.isPlainObject(f[u]) && e.isEmptyObject(f[u]) || e.isArray(f[u]) && !f[u].length) && f[u]) return !1;
			return !0
		} catch (c) {
			return !0
		}
	}

	function s(r) {
		var i = arguments.length,
			n = arguments,
			o = (window[r], n[1]);
		if (2 > i) throw Error("Minimum 2 arguments must be given");
		if (e.isArray(o)) {
			for (var a = 0; a < o.length; a++)
				if (!s(r, o[a])) return !1;
			return !0
		}
		try {
			var u = t.apply(this, arguments);
			e.isArray(n[i - 1]) || (u = {
				totest: u
			});
			for (var a in u)
				if (void 0 === u[a] || null === u[a]) return !1;
			return !0
		} catch (f) {
			return !1
		}
	}

	function a(r) {
		var i = arguments.length,
			n = window[r],
			o = arguments,
			s = (o[1], []),
			a = {};
		if (a = i > 1 ? t.apply(this, o) : n, a._cookie)
			for (var u in e.cookie()) "" != u && s.push(u.replace(a._prefix, ""));
		else
			for (var f in a) s.push(f);
		return s
	}

	function u(t) {
		if (!t || "string" != typeof t) throw Error("First parameter must be a string");
		g ? (window.localStorage.getItem(t) || window.localStorage.setItem(t, "{}"), window.sessionStorage.getItem(t) || window.sessionStorage.setItem(t, "{}")) : (window.localCookieStorage.getItem(t) || window.localCookieStorage.setItem(t, "{}"), window.sessionCookieStorage.getItem(t) || window.sessionCookieStorage.setItem(t, "{}"));
		var r = {
			localStorage: e.extend({}, e.localStorage, {
				_ns: t
			}),
			sessionStorage: e.extend({}, e.sessionStorage, {
				_ns: t
			})
		};
		return e.cookie && (window.cookieStorage.getItem(t) || window.cookieStorage.setItem(t, "{}"), r.cookieStorage = e.extend({}, e.cookieStorage, {
			_ns: t
		})), e.namespaceStorages[t] = r, r
	}

	function f(e) {
		var t = "jsapi";
		try {
			return window[e] ? (window[e].setItem(t, t), window[e].removeItem(t), !0) : !1
		} catch (r) {
			return !1
		}
	}
	var c = "ls_",
		m = "ss_",
		g = f("localStorage"),
		l = {
			_type: "",
			_ns: "",
			_callMethod: function (e, t) {
				var r = [this._type],
					t = Array.prototype.slice.call(t),
					i = t[0];
				return this._ns && r.push(this._ns), "string" == typeof i && -1 !== i.indexOf(".") && (t.shift(), [].unshift.apply(t, i.split("."))), [].push.apply(r, t), e.apply(this, r)
			},
			get: function () {
				return this._callMethod(t, arguments)
			},
			set: function () {
				var t = arguments.length,
					i = arguments,
					n = i[0];
				if (1 > t || !e.isPlainObject(n) && 2 > t) throw Error("Minimum 2 arguments must be given or first parameter must be an object");
				if (e.isPlainObject(n) && this._ns) {
					for (var o in n) r(this._type, this._ns, o, n[o]);
					return n
				}
				var s = this._callMethod(r, i);
				return this._ns ? s[n.split(".")[0]] : s
			},
			remove: function () {
				if (arguments.length < 1) throw Error("Minimum 1 argument must be given");
				return this._callMethod(i, arguments)
			},
			removeAll: function (e) {
				return this._ns ? (r(this._type, this._ns, {}), !0) : n(this._type, e)
			},
			isEmpty: function () {
				return this._callMethod(o, arguments)
			},
			isSet: function () {
				if (arguments.length < 1) throw Error("Minimum 1 argument must be given");
				return this._callMethod(s, arguments)
			},
			keys: function () {
				return this._callMethod(a, arguments)
			}
		};
	if (e.cookie) {
		window.name || (window.name = Math.floor(1e8 * Math.random()));
		var h = {
			_cookie: !0,
			_prefix: "",
			_expires: null,
			_path: null,
			_domain: null,
			setItem: function (t, r) {
				e.cookie(this._prefix + t, r, {
					expires: this._expires,
					path: this._path,
					domain: this._domain
				})
			},
			getItem: function (t) {
				return e.cookie(this._prefix + t)
			},
			removeItem: function (t) {
				return e.removeCookie(this._prefix + t)
			},
			clear: function () {
				for (var t in e.cookie()) "" != t && (!this._prefix && -1 === t.indexOf(c) && -1 === t.indexOf(m) || this._prefix && 0 === t.indexOf(this._prefix)) && e.removeCookie(t)
			},
			setExpires: function (e) {
				return this._expires = e, this
			},
			setPath: function (e) {
				return this._path = e, this
			},
			setDomain: function (e) {
				return this._domain = e, this
			},
			setConf: function (e) {
				return e.path && (this._path = e.path), e.domain && (this._domain = e.domain), e.expires && (this._expires = e.expires), this
			},
			setDefaultConf: function () {
				this._path = this._domain = this._expires = null
			}
		};
		g || (window.localCookieStorage = e.extend({}, h, {
			_prefix: c,
			_expires: 3650
		}), window.sessionCookieStorage = e.extend({}, h, {
			_prefix: m + window.name + "_"
		})), window.cookieStorage = e.extend({}, h), e.cookieStorage = e.extend({}, l, {
			_type: "cookieStorage",
			setExpires: function (e) {
				return window.cookieStorage.setExpires(e), this
			},
			setPath: function (e) {
				return window.cookieStorage.setPath(e), this
			},
			setDomain: function (e) {
				return window.cookieStorage.setDomain(e), this
			},
			setConf: function (e) {
				return window.cookieStorage.setConf(e), this
			},
			setDefaultConf: function () {
				return window.cookieStorage.setDefaultConf(), this
			}
		})
	}
	e.initNamespaceStorage = function (e) {
		return u(e)
	}, g ? (e.localStorage = e.extend({}, l, {
		_type: "localStorage"
	}), e.sessionStorage = e.extend({}, l, {
		_type: "sessionStorage"
	})) : (e.localStorage = e.extend({}, l, {
		_type: "localCookieStorage"
	}), e.sessionStorage = e.extend({}, l, {
		_type: "sessionCookieStorage"
	})), e.namespaceStorages = {}, e.removeAllStorages = function (t) {
		e.localStorage.removeAll(t), e.sessionStorage.removeAll(t), e.cookieStorage && e.cookieStorage.removeAll(t), t || (e.namespaceStorages = {})
	}
});


/*
     _ _      _       _
 ___| (_) ___| | __  (_)___
/ __| | |/ __| |/ /  | / __|
\__ \ | | (__|   < _ | \__ \
|___/_|_|\___|_|\_(_)/ |___/
                   |__/

 Version: 1.6.0
  Author: Ken Wheeler
 Website: http://kenwheeler.github.io
    Docs: http://kenwheeler.github.io/slick
    Repo: http://github.com/kenwheeler/slick
  Issues: http://github.com/kenwheeler/slick/issues

 */
! function (a) {
	"use strict";
	"function" == typeof define && define.amd ? define(["jquery"], a) : "undefined" != typeof exports ? module.exports = a(require("jquery")) : a(jQuery)
}(function (a) {
	"use strict";
	var b = window.Slick || {};
	b = function () {
		function c(c, d) {
			var f, e = this;
			e.defaults = {
				accessibility: !0,
				adaptiveHeight: !1,
				appendArrows: a(c),
				appendDots: a(c),
				arrows: !0,
				asNavFor: null,
				prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"></button>',
				nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"></button>',
				autoplay: !1,
				autoplaySpeed: 3e3,
				centerMode: !1,
				centerPadding: "50px",
				cssEase: "ease",
				customPaging: function (b, c) {
					return a('<button type="button" data-role="none" role="button" tabindex="0" />').text(c + 1)
				},
				dots: !1,
				dotsClass: "slick-dots",
				draggable: !0,
				easing: "linear",
				edgeFriction: .35,
				fade: !1,
				focusOnSelect: !1,
				infinite: !0,
				initialSlide: 0,
				lazyLoad: "ondemand",
				mobileFirst: !1,
				pauseOnHover: !0,
				pauseOnFocus: !0,
				pauseOnDotsHover: !1,
				respondTo: "window",
				responsive: null,
				rows: 1,
				rtl: !1,
				slide: "",
				slidesPerRow: 1,
				slidesToShow: 1,
				slidesToScroll: 1,
				speed: 500,
				swipe: !0,
				swipeToSlide: !1,
				touchMove: !0,
				touchThreshold: 5,
				useCSS: !0,
				useTransform: !0,
				variableWidth: !1,
				vertical: !1,
				verticalSwiping: !1,
				waitForAnimate: !0,
				zIndex: 1e3
			}, e.initials = {
				animating: !1,
				dragging: !1,
				autoPlayTimer: null,
				currentDirection: 0,
				currentLeft: null,
				currentSlide: 0,
				direction: 1,
				$dots: null,
				listWidth: null,
				listHeight: null,
				loadIndex: 0,
				$nextArrow: null,
				$prevArrow: null,
				slideCount: null,
				slideWidth: null,
				$slideTrack: null,
				$slides: null,
				sliding: !1,
				slideOffset: 0,
				swipeLeft: null,
				$list: null,
				touchObject: {},
				transformsEnabled: !1,
				unslicked: !1
			}, a.extend(e, e.initials), e.activeBreakpoint = null, e.animType = null, e.animProp = null, e.breakpoints = [], e.breakpointSettings = [], e.cssTransitions = !1, e.focussed = !1, e.interrupted = !1, e.hidden = "hidden", e.paused = !0, e.positionProp = null, e.respondTo = null, e.rowCount = 1, e.shouldClick = !0, e.$slider = a(c), e.$slidesCache = null, e.transformType = null, e.transitionType = null, e.visibilityChange = "visibilitychange", e.windowWidth = 0, e.windowTimer = null, f = a(c).data("slick") || {}, e.options = a.extend({}, e.defaults, d, f), e.currentSlide = e.options.initialSlide, e.originalSettings = e.options, "undefined" != typeof document.mozHidden ? (e.hidden = "mozHidden", e.visibilityChange = "mozvisibilitychange") : "undefined" != typeof document.webkitHidden && (e.hidden = "webkitHidden", e.visibilityChange = "webkitvisibilitychange"), e.autoPlay = a.proxy(e.autoPlay, e), e.autoPlayClear = a.proxy(e.autoPlayClear, e), e.autoPlayIterator = a.proxy(e.autoPlayIterator, e), e.changeSlide = a.proxy(e.changeSlide, e), e.clickHandler = a.proxy(e.clickHandler, e), e.selectHandler = a.proxy(e.selectHandler, e), e.setPosition = a.proxy(e.setPosition, e), e.swipeHandler = a.proxy(e.swipeHandler, e), e.dragHandler = a.proxy(e.dragHandler, e), e.keyHandler = a.proxy(e.keyHandler, e), e.instanceUid = b++, e.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/, e.registerBreakpoints(), e.init(!0)
		}
		var b = 0;
		return c
	}(), b.prototype.activateADA = function () {
		var a = this;
		a.$slideTrack.find(".slick-active").attr({
			"aria-hidden": "false"
		}).find("a, input, button, select").attr({
			tabindex: "0"
		})
	}, b.prototype.addSlide = b.prototype.slickAdd = function (b, c, d) {
		var e = this;
		if ("boolean" == typeof c) d = c, c = null;
		else if (0 > c || c >= e.slideCount) return !1;
		e.unload(), "number" == typeof c ? 0 === c && 0 === e.$slides.length ? a(b).appendTo(e.$slideTrack) : d ? a(b).insertBefore(e.$slides.eq(c)) : a(b).insertAfter(e.$slides.eq(c)) : d === !0 ? a(b).prependTo(e.$slideTrack) : a(b).appendTo(e.$slideTrack), e.$slides = e.$slideTrack.children(this.options.slide), e.$slideTrack.children(this.options.slide).detach(), e.$slideTrack.append(e.$slides), e.$slides.each(function (b, c) {
			a(c).attr("data-slick-index", b)
		}), e.$slidesCache = e.$slides, e.reinit()
	}, b.prototype.animateHeight = function () {
		var a = this;
		if (1 === a.options.slidesToShow && a.options.adaptiveHeight === !0 && a.options.vertical === !1) {
			var b = a.$slides.eq(a.currentSlide).outerHeight(!0);
			a.$list.animate({
				height: b
			}, a.options.speed)
		}
	}, b.prototype.animateSlide = function (b, c) {
		var d = {},
			e = this;
		e.animateHeight(), e.options.rtl === !0 && e.options.vertical === !1 && (b = -b), e.transformsEnabled === !1 ? e.options.vertical === !1 ? e.$slideTrack.animate({
			left: b
		}, e.options.speed, e.options.easing, c) : e.$slideTrack.animate({
			top: b
		}, e.options.speed, e.options.easing, c) : e.cssTransitions === !1 ? (e.options.rtl === !0 && (e.currentLeft = -e.currentLeft), a({
			animStart: e.currentLeft
		}).animate({
			animStart: b
		}, {
			duration: e.options.speed,
			easing: e.options.easing,
			step: function (a) {
				a = Math.ceil(a), e.options.vertical === !1 ? (d[e.animType] = "translate(" + a + "px, 0px)", e.$slideTrack.css(d)) : (d[e.animType] = "translate(0px," + a + "px)", e.$slideTrack.css(d))
			},
			complete: function () {
				c && c.call()
			}
		})) : (e.applyTransition(), b = Math.ceil(b), e.options.vertical === !1 ? d[e.animType] = "translate3d(" + b + "px, 0px, 0px)" : d[e.animType] = "translate3d(0px," + b + "px, 0px)", e.$slideTrack.css(d), c && setTimeout(function () {
			e.disableTransition(), c.call()
		}, e.options.speed))
	}, b.prototype.getNavTarget = function () {
		var b = this,
			c = b.options.asNavFor;
		return c && null !== c && (c = a(c).not(b.$slider)), c
	}, b.prototype.asNavFor = function (b) {
		var c = this,
			d = c.getNavTarget();
		null !== d && "object" == typeof d && d.each(function () {
			var c = a(this).slick("getSlick");
			c.unslicked || c.slideHandler(b, !0)
		})
	}, b.prototype.applyTransition = function (a) {
		var b = this,
			c = {};
		b.options.fade === !1 ? c[b.transitionType] = b.transformType + " " + b.options.speed + "ms " + b.options.cssEase : c[b.transitionType] = "opacity " + b.options.speed + "ms " + b.options.cssEase, b.options.fade === !1 ? b.$slideTrack.css(c) : b.$slides.eq(a).css(c)
	}, b.prototype.autoPlay = function () {
		var a = this;
		a.autoPlayClear(), a.slideCount > a.options.slidesToShow && (a.autoPlayTimer = setInterval(a.autoPlayIterator, a.options.autoplaySpeed))
	}, b.prototype.autoPlayClear = function () {
		var a = this;
		a.autoPlayTimer && clearInterval(a.autoPlayTimer)
	}, b.prototype.autoPlayIterator = function () {
		var a = this,
			b = a.currentSlide + a.options.slidesToScroll;
		a.paused || a.interrupted || a.focussed || (a.options.infinite === !1 && (1 === a.direction && a.currentSlide + 1 === a.slideCount - 1 ? a.direction = 0 : 0 === a.direction && (b = a.currentSlide - a.options.slidesToScroll, a.currentSlide - 1 === 0 && (a.direction = 1))), a.slideHandler(b))
	}, b.prototype.buildArrows = function () {
		var b = this;
		b.options.arrows === !0 && (b.$prevArrow = a(b.options.prevArrow).addClass("slick-arrow"), b.$nextArrow = a(b.options.nextArrow).addClass("slick-arrow"), b.slideCount > b.options.slidesToShow ? (b.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), b.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), b.htmlExpr.test(b.options.prevArrow) && b.$prevArrow.prependTo(b.options.appendArrows), b.htmlExpr.test(b.options.nextArrow) && b.$nextArrow.appendTo(b.options.appendArrows), b.options.infinite !== !0 && b.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true")) : b.$prevArrow.add(b.$nextArrow).addClass("slick-hidden").attr({
			"aria-disabled": "true",
			tabindex: "-1"
		}))
	}, b.prototype.buildDots = function () {
		var c, d, b = this;
		if (b.options.dots === !0 && b.slideCount > b.options.slidesToShow) {
			for (b.$slider.addClass("slick-dotted"), d = a("<ul />").addClass(b.options.dotsClass), c = 0; c <= b.getDotCount(); c += 1) d.append(a("<li />").append(b.options.customPaging.call(this, b, c)));
			b.$dots = d.appendTo(b.options.appendDots), b.$dots.find("li").first().addClass("slick-active").attr("aria-hidden", "false")
		}
	}, b.prototype.buildOut = function () {
		var b = this;
		b.$slides = b.$slider.children(b.options.slide + ":not(.slick-cloned)").addClass("slick-slide"), b.slideCount = b.$slides.length, b.$slides.each(function (b, c) {
			a(c).attr("data-slick-index", b).data("originalStyling", a(c).attr("style") || "")
		}), b.$slider.addClass("slick-slider"), b.$slideTrack = 0 === b.slideCount ? a('<div class="slick-track"/>').appendTo(b.$slider) : b.$slides.wrapAll('<div class="slick-track"/>').parent(), b.$list = b.$slideTrack.wrap('<div aria-live="polite" class="slick-list"/>').parent(), b.$slideTrack.css("opacity", 0), (b.options.centerMode === !0 || b.options.swipeToSlide === !0) && (b.options.slidesToScroll = 1), a("img[data-lazy]", b.$slider).not("[src]").addClass("slick-loading"), b.setupInfinite(), b.buildArrows(), b.buildDots(), b.updateDots(), b.setSlideClasses("number" == typeof b.currentSlide ? b.currentSlide : 0), b.options.draggable === !0 && b.$list.addClass("draggable")
	}, b.prototype.buildRows = function () {
		var b, c, d, e, f, g, h, a = this;
		if (e = document.createDocumentFragment(), g = a.$slider.children(), a.options.rows > 1) {
			for (h = a.options.slidesPerRow * a.options.rows, f = Math.ceil(g.length / h), b = 0; f > b; b++) {
				var i = document.createElement("div");
				for (c = 0; c < a.options.rows; c++) {
					var j = document.createElement("div");
					for (d = 0; d < a.options.slidesPerRow; d++) {
						var k = b * h + (c * a.options.slidesPerRow + d);
						g.get(k) && j.appendChild(g.get(k))
					}
					i.appendChild(j)
				}
				e.appendChild(i)
			}
			a.$slider.empty().append(e), a.$slider.children().children().children().css({
				width: 100 / a.options.slidesPerRow + "%",
				display: "inline-block"
			})
		}
	}, b.prototype.checkResponsive = function (b, c) {
		var e, f, g, d = this,
			h = !1,
			i = d.$slider.width(),
			j = window.innerWidth || a(window).width();
		if ("window" === d.respondTo ? g = j : "slider" === d.respondTo ? g = i : "min" === d.respondTo && (g = Math.min(j, i)), d.options.responsive && d.options.responsive.length && null !== d.options.responsive) {
			f = null;
			for (e in d.breakpoints) d.breakpoints.hasOwnProperty(e) && (d.originalSettings.mobileFirst === !1 ? g < d.breakpoints[e] && (f = d.breakpoints[e]) : g > d.breakpoints[e] && (f = d.breakpoints[e]));
			null !== f ? null !== d.activeBreakpoint ? (f !== d.activeBreakpoint || c) && (d.activeBreakpoint = f, "unslick" === d.breakpointSettings[f] ? d.unslick(f) : (d.options = a.extend({}, d.originalSettings, d.breakpointSettings[f]), b === !0 && (d.currentSlide = d.options.initialSlide), d.refresh(b)), h = f) : (d.activeBreakpoint = f, "unslick" === d.breakpointSettings[f] ? d.unslick(f) : (d.options = a.extend({}, d.originalSettings, d.breakpointSettings[f]), b === !0 && (d.currentSlide = d.options.initialSlide), d.refresh(b)), h = f) : null !== d.activeBreakpoint && (d.activeBreakpoint = null, d.options = d.originalSettings, b === !0 && (d.currentSlide = d.options.initialSlide), d.refresh(b), h = f), b || h === !1 || d.$slider.trigger("breakpoint", [d, h])
		}
	}, b.prototype.changeSlide = function (b, c) {
		var f, g, h, d = this,
			e = a(b.currentTarget);
		switch (e.is("a") && b.preventDefault(), e.is("li") || (e = e.closest("li")), h = d.slideCount % d.options.slidesToScroll !== 0, f = h ? 0 : (d.slideCount - d.currentSlide) % d.options.slidesToScroll, b.data.message) {
			case "previous":
				g = 0 === f ? d.options.slidesToScroll : d.options.slidesToShow - f, d.slideCount > d.options.slidesToShow && d.slideHandler(d.currentSlide - g, !1, c);
				break;
			case "next":
				g = 0 === f ? d.options.slidesToScroll : f, d.slideCount > d.options.slidesToShow && d.slideHandler(d.currentSlide + g, !1, c);
				break;
			case "index":
				var i = 0 === b.data.index ? 0 : b.data.index || e.index() * d.options.slidesToScroll;
				d.slideHandler(d.checkNavigable(i), !1, c), e.children().trigger("focus");
				break;
			default:
				return
		}
	}, b.prototype.checkNavigable = function (a) {
		var c, d, b = this;
		if (c = b.getNavigableIndexes(), d = 0, a > c[c.length - 1]) a = c[c.length - 1];
		else
			for (var e in c) {
				if (a < c[e]) {
					a = d;
					break
				}
				d = c[e]
			}
		return a
	}, b.prototype.cleanUpEvents = function () {
		var b = this;
		b.options.dots && null !== b.$dots && a("li", b.$dots).off("click.slick", b.changeSlide).off("mouseenter.slick", a.proxy(b.interrupt, b, !0)).off("mouseleave.slick", a.proxy(b.interrupt, b, !1)), b.$slider.off("focus.slick blur.slick"), b.options.arrows === !0 && b.slideCount > b.options.slidesToShow && (b.$prevArrow && b.$prevArrow.off("click.slick", b.changeSlide), b.$nextArrow && b.$nextArrow.off("click.slick", b.changeSlide)), b.$list.off("touchstart.slick mousedown.slick", b.swipeHandler), b.$list.off("touchmove.slick mousemove.slick", b.swipeHandler), b.$list.off("touchend.slick mouseup.slick", b.swipeHandler), b.$list.off("touchcancel.slick mouseleave.slick", b.swipeHandler), b.$list.off("click.slick", b.clickHandler), a(document).off(b.visibilityChange, b.visibility), b.cleanUpSlideEvents(), b.options.accessibility === !0 && b.$list.off("keydown.slick", b.keyHandler), b.options.focusOnSelect === !0 && a(b.$slideTrack).children().off("click.slick", b.selectHandler), a(window).off("orientationchange.slick.slick-" + b.instanceUid, b.orientationChange), a(window).off("resize.slick.slick-" + b.instanceUid, b.resize), a("[draggable!=true]", b.$slideTrack).off("dragstart", b.preventDefault), a(window).off("load.slick.slick-" + b.instanceUid, b.setPosition), a(document).off("ready.slick.slick-" + b.instanceUid, b.setPosition)
	}, b.prototype.cleanUpSlideEvents = function () {
		var b = this;
		b.$list.off("mouseenter.slick", a.proxy(b.interrupt, b, !0)), b.$list.off("mouseleave.slick", a.proxy(b.interrupt, b, !1))
	}, b.prototype.cleanUpRows = function () {
		var b, a = this;
		a.options.rows > 1 && (b = a.$slides.children().children(), b.removeAttr("style"), a.$slider.empty().append(b))
	}, b.prototype.clickHandler = function (a) {
		var b = this;
		b.shouldClick === !1 && (a.stopImmediatePropagation(), a.stopPropagation(), a.preventDefault())
	}, b.prototype.destroy = function (b) {
		var c = this;
		c.autoPlayClear(), c.touchObject = {}, c.cleanUpEvents(), a(".slick-cloned", c.$slider).detach(), c.$dots && c.$dots.remove(), c.$prevArrow && c.$prevArrow.length && (c.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), c.htmlExpr.test(c.options.prevArrow) && c.$prevArrow.remove()), c.$nextArrow && c.$nextArrow.length && (c.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), c.htmlExpr.test(c.options.nextArrow) && c.$nextArrow.remove()), c.$slides && (c.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function () {
			a(this).attr("style", a(this).data("originalStyling"))
		}), c.$slideTrack.children(this.options.slide).detach(), c.$slideTrack.detach(), c.$list.detach(), c.$slider.append(c.$slides)), c.cleanUpRows(), c.$slider.removeClass("slick-slider"), c.$slider.removeClass("slick-initialized"), c.$slider.removeClass("slick-dotted"), c.unslicked = !0, b || c.$slider.trigger("destroy", [c])
	}, b.prototype.disableTransition = function (a) {
		var b = this,
			c = {};
		c[b.transitionType] = "", b.options.fade === !1 ? b.$slideTrack.css(c) : b.$slides.eq(a).css(c)
	}, b.prototype.fadeSlide = function (a, b) {
		var c = this;
		c.cssTransitions === !1 ? (c.$slides.eq(a).css({
			zIndex: c.options.zIndex
		}), c.$slides.eq(a).animate({
			opacity: 1
		}, c.options.speed, c.options.easing, b)) : (c.applyTransition(a), c.$slides.eq(a).css({
			opacity: 1,
			zIndex: c.options.zIndex
		}), b && setTimeout(function () {
			c.disableTransition(a), b.call()
		}, c.options.speed))
	}, b.prototype.fadeSlideOut = function (a) {
		var b = this;
		b.cssTransitions === !1 ? b.$slides.eq(a).animate({
			opacity: 0,
			zIndex: b.options.zIndex - 2
		}, b.options.speed, b.options.easing) : (b.applyTransition(a), b.$slides.eq(a).css({
			opacity: 0,
			zIndex: b.options.zIndex - 2
		}))
	}, b.prototype.filterSlides = b.prototype.slickFilter = function (a) {
		var b = this;
		null !== a && (b.$slidesCache = b.$slides, b.unload(), b.$slideTrack.children(this.options.slide).detach(), b.$slidesCache.filter(a).appendTo(b.$slideTrack), b.reinit())
	}, b.prototype.focusHandler = function () {
		var b = this;
		b.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick", "*:not(.slick-arrow)", function (c) {
			c.stopImmediatePropagation();
			var d = a(this);
			setTimeout(function () {
				b.options.pauseOnFocus && (b.focussed = d.is(":focus"), b.autoPlay())
			}, 0)
		})
	}, b.prototype.getCurrent = b.prototype.slickCurrentSlide = function () {
		var a = this;
		return a.currentSlide
	}, b.prototype.getDotCount = function () {
		var a = this,
			b = 0,
			c = 0,
			d = 0;
		if (a.options.infinite === !0)
			for (; b < a.slideCount;) ++d, b = c + a.options.slidesToScroll, c += a.options.slidesToScroll <= a.options.slidesToShow ? a.options.slidesToScroll : a.options.slidesToShow;
		else if (a.options.centerMode === !0) d = a.slideCount;
		else if (a.options.asNavFor)
			for (; b < a.slideCount;) ++d, b = c + a.options.slidesToScroll, c += a.options.slidesToScroll <= a.options.slidesToShow ? a.options.slidesToScroll : a.options.slidesToShow;
		else d = 1 + Math.ceil((a.slideCount - a.options.slidesToShow) / a.options.slidesToScroll);
		return d - 1
	}, b.prototype.getLeft = function (a) {
		var c, d, f, b = this,
			e = 0;
		return b.slideOffset = 0, d = b.$slides.first().outerHeight(!0), b.options.infinite === !0 ? (b.slideCount > b.options.slidesToShow && (b.slideOffset = b.slideWidth * b.options.slidesToShow * -1, e = d * b.options.slidesToShow * -1), b.slideCount % b.options.slidesToScroll !== 0 && a + b.options.slidesToScroll > b.slideCount && b.slideCount > b.options.slidesToShow && (a > b.slideCount ? (b.slideOffset = (b.options.slidesToShow - (a - b.slideCount)) * b.slideWidth * -1, e = (b.options.slidesToShow - (a - b.slideCount)) * d * -1) : (b.slideOffset = b.slideCount % b.options.slidesToScroll * b.slideWidth * -1, e = b.slideCount % b.options.slidesToScroll * d * -1))) : a + b.options.slidesToShow > b.slideCount && (b.slideOffset = (a + b.options.slidesToShow - b.slideCount) * b.slideWidth, e = (a + b.options.slidesToShow - b.slideCount) * d), b.slideCount <= b.options.slidesToShow && (b.slideOffset = 0, e = 0), b.options.centerMode === !0 && b.options.infinite === !0 ? b.slideOffset += b.slideWidth * Math.floor(b.options.slidesToShow / 2) - b.slideWidth : b.options.centerMode === !0 && (b.slideOffset = 0, b.slideOffset += b.slideWidth * Math.floor(b.options.slidesToShow / 2)), c = b.options.vertical === !1 ? a * b.slideWidth * -1 + b.slideOffset : a * d * -1 + e, b.options.variableWidth === !0 && (f = b.slideCount <= b.options.slidesToShow || b.options.infinite === !1 ? b.$slideTrack.children(".slick-slide").eq(a) : b.$slideTrack.children(".slick-slide").eq(a + b.options.slidesToShow), c = b.options.rtl === !0 ? f[0] ? -1 * (b.$slideTrack.width() - f[0].offsetLeft - f.width()) : 0 : f[0] ? -1 * f[0].offsetLeft : 0, b.options.centerMode === !0 && (f = b.slideCount <= b.options.slidesToShow || b.options.infinite === !1 ? b.$slideTrack.children(".slick-slide").eq(a) : b.$slideTrack.children(".slick-slide").eq(a + b.options.slidesToShow + 1), c = b.options.rtl === !0 ? f[0] ? -1 * (b.$slideTrack.width() - f[0].offsetLeft - f.width()) : 0 : f[0] ? -1 * f[0].offsetLeft : 0, c += (b.$list.width() - f.outerWidth()) / 2)), c
	}, b.prototype.getOption = b.prototype.slickGetOption = function (a) {
		var b = this;
		return b.options[a]
	}, b.prototype.getNavigableIndexes = function () {
		var e, a = this,
			b = 0,
			c = 0,
			d = [];
		for (a.options.infinite === !1 ? e = a.slideCount : (b = -1 * a.options.slidesToScroll, c = -1 * a.options.slidesToScroll, e = 2 * a.slideCount); e > b;) d.push(b), b = c + a.options.slidesToScroll, c += a.options.slidesToScroll <= a.options.slidesToShow ? a.options.slidesToScroll : a.options.slidesToShow;
		return d
	}, b.prototype.getSlick = function () {
		return this
	}, b.prototype.getSlideCount = function () {
		var c, d, e, b = this;
		return e = b.options.centerMode === !0 ? b.slideWidth * Math.floor(b.options.slidesToShow / 2) : 0, b.options.swipeToSlide === !0 ? (b.$slideTrack.find(".slick-slide").each(function (c, f) {
			return f.offsetLeft - e + a(f).outerWidth() / 2 > -1 * b.swipeLeft ? (d = f, !1) : void 0
		}), c = Math.abs(a(d).attr("data-slick-index") - b.currentSlide) || 1) : b.options.slidesToScroll
	}, b.prototype.goTo = b.prototype.slickGoTo = function (a, b) {
		var c = this;
		c.changeSlide({
			data: {
				message: "index",
				index: parseInt(a)
			}
		}, b)
	}, b.prototype.init = function (b) {
		var c = this;
		a(c.$slider).hasClass("slick-initialized") || (a(c.$slider).addClass("slick-initialized"), c.buildRows(), c.buildOut(), c.setProps(), c.startLoad(), c.loadSlider(), c.initializeEvents(), c.updateArrows(), c.updateDots(), c.checkResponsive(!0), c.focusHandler()), b && c.$slider.trigger("init", [c]), c.options.accessibility === !0 && c.initADA(), c.options.autoplay && (c.paused = !1, c.autoPlay())
	}, b.prototype.initADA = function () {
		var b = this;
		b.$slides.add(b.$slideTrack.find(".slick-cloned")).attr({
			"aria-hidden": "true",
			tabindex: "-1"
		}).find("a, input, button, select").attr({
			tabindex: "-1"
		}), b.$slideTrack.attr("role", "listbox"), b.$slides.not(b.$slideTrack.find(".slick-cloned")).each(function (c) {
			a(this).attr({
				role: "option",
				"aria-describedby": "slick-slide" + b.instanceUid + c
			})
		}), null !== b.$dots && b.$dots.attr("role", "tablist").find("li").each(function (c) {
			a(this).attr({
				role: "presentation",
				"aria-selected": "false",
				"aria-controls": "navigation" + b.instanceUid + c,
				id: "slick-slide" + b.instanceUid + c
			})
		}).first().attr("aria-selected", "true").end().find("button").attr("role", "button").end().closest("div").attr("role", "toolbar"), b.activateADA()
	}, b.prototype.initArrowEvents = function () {
		var a = this;
		a.options.arrows === !0 && a.slideCount > a.options.slidesToShow && (a.$prevArrow.off("click.slick").on("click.slick", {
			message: "previous"
		}, a.changeSlide), a.$nextArrow.off("click.slick").on("click.slick", {
			message: "next"
		}, a.changeSlide))
	}, b.prototype.initDotEvents = function () {
		var b = this;
		b.options.dots === !0 && b.slideCount > b.options.slidesToShow && a("li", b.$dots).on("click.slick", {
			message: "index"
		}, b.changeSlide), b.options.dots === !0 && b.options.pauseOnDotsHover === !0 && a("li", b.$dots).on("mouseenter.slick", a.proxy(b.interrupt, b, !0)).on("mouseleave.slick", a.proxy(b.interrupt, b, !1))
	}, b.prototype.initSlideEvents = function () {
		var b = this;
		b.options.pauseOnHover && (b.$list.on("mouseenter.slick", a.proxy(b.interrupt, b, !0)), b.$list.on("mouseleave.slick", a.proxy(b.interrupt, b, !1)))
	}, b.prototype.initializeEvents = function () {
		var b = this;
		b.initArrowEvents(), b.initDotEvents(), b.initSlideEvents(), b.$list.on("touchstart.slick mousedown.slick", {
			action: "start"
		}, b.swipeHandler), b.$list.on("touchmove.slick mousemove.slick", {
			action: "move"
		}, b.swipeHandler), b.$list.on("touchend.slick mouseup.slick", {
			action: "end"
		}, b.swipeHandler), b.$list.on("touchcancel.slick mouseleave.slick", {
			action: "end"
		}, b.swipeHandler), b.$list.on("click.slick", b.clickHandler), a(document).on(b.visibilityChange, a.proxy(b.visibility, b)), b.options.accessibility === !0 && b.$list.on("keydown.slick", b.keyHandler), b.options.focusOnSelect === !0 && a(b.$slideTrack).children().on("click.slick", b.selectHandler), a(window).on("orientationchange.slick.slick-" + b.instanceUid, a.proxy(b.orientationChange, b)), a(window).on("resize.slick.slick-" + b.instanceUid, a.proxy(b.resize, b)), a("[draggable!=true]", b.$slideTrack).on("dragstart", b.preventDefault), a(window).on("load.slick.slick-" + b.instanceUid, b.setPosition), a(document).on("ready.slick.slick-" + b.instanceUid, b.setPosition)
	}, b.prototype.initUI = function () {
		var a = this;
		a.options.arrows === !0 && a.slideCount > a.options.slidesToShow && (a.$prevArrow.show(), a.$nextArrow.show()), a.options.dots === !0 && a.slideCount > a.options.slidesToShow && a.$dots.show()
	}, b.prototype.keyHandler = function (a) {
		var b = this;
		a.target.tagName.match("TEXTAREA|INPUT|SELECT") || (37 === a.keyCode && b.options.accessibility === !0 ? b.changeSlide({
			data: {
				message: b.options.rtl === !0 ? "next" : "previous"
			}
		}) : 39 === a.keyCode && b.options.accessibility === !0 && b.changeSlide({
			data: {
				message: b.options.rtl === !0 ? "previous" : "next"
			}
		}))
	}, b.prototype.lazyLoad = function () {
		function g(c) {
			a("img[data-lazy]", c).each(function () {
				var c = a(this),
					d = a(this).attr("data-lazy"),
					e = document.createElement("img");
				e.onload = function () {
					c.animate({
						opacity: 0
					}, 100, function () {
						c.attr("src", d).animate({
							opacity: 1
						}, 200, function () {
							c.removeAttr("data-lazy").removeClass("slick-loading")
						}), b.$slider.trigger("lazyLoaded", [b, c, d])
					})
				}, e.onerror = function () {
					c.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), b.$slider.trigger("lazyLoadError", [b, c, d])
				}, e.src = d
			})
		}
		var c, d, e, f, b = this;
		b.options.centerMode === !0 ? b.options.infinite === !0 ? (e = b.currentSlide + (b.options.slidesToShow / 2 + 1), f = e + b.options.slidesToShow + 2) : (e = Math.max(0, b.currentSlide - (b.options.slidesToShow / 2 + 1)), f = 2 + (b.options.slidesToShow / 2 + 1) + b.currentSlide) : (e = b.options.infinite ? b.options.slidesToShow + b.currentSlide : b.currentSlide, f = Math.ceil(e + b.options.slidesToShow), b.options.fade === !0 && (e > 0 && e--, f <= b.slideCount && f++)), c = b.$slider.find(".slick-slide").slice(e, f), g(c), b.slideCount <= b.options.slidesToShow ? (d = b.$slider.find(".slick-slide"), g(d)) : b.currentSlide >= b.slideCount - b.options.slidesToShow ? (d = b.$slider.find(".slick-cloned").slice(0, b.options.slidesToShow), g(d)) : 0 === b.currentSlide && (d = b.$slider.find(".slick-cloned").slice(-1 * b.options.slidesToShow), g(d))
	}, b.prototype.loadSlider = function () {
		var a = this;
		a.setPosition(), a.$slideTrack.css({
			opacity: 1
		}), a.$slider.removeClass("slick-loading"), a.initUI(), "progressive" === a.options.lazyLoad && a.progressiveLazyLoad()
	}, b.prototype.next = b.prototype.slickNext = function () {
		var a = this;
		a.changeSlide({
			data: {
				message: "next"
			}
		})
	}, b.prototype.orientationChange = function () {
		var a = this;
		a.checkResponsive(), a.setPosition()
	}, b.prototype.pause = b.prototype.slickPause = function () {
		var a = this;
		a.autoPlayClear(), a.paused = !0
	}, b.prototype.play = b.prototype.slickPlay = function () {
		var a = this;
		a.autoPlay(), a.options.autoplay = !0, a.paused = !1, a.focussed = !1, a.interrupted = !1
	}, b.prototype.postSlide = function (a) {
		var b = this;
		b.unslicked || (b.$slider.trigger("afterChange", [b, a]), b.animating = !1, b.setPosition(), b.swipeLeft = null, b.options.autoplay && b.autoPlay(), b.options.accessibility === !0 && b.initADA())
	}, b.prototype.prev = b.prototype.slickPrev = function () {
		var a = this;
		a.changeSlide({
			data: {
				message: "previous"
			}
		})
	}, b.prototype.preventDefault = function (a) {
		a.preventDefault()
	}, b.prototype.progressiveLazyLoad = function (b) {
		b = b || 1;
		var e, f, g, c = this,
			d = a("img[data-lazy]", c.$slider);
		d.length ? (e = d.first(), f = e.attr("data-lazy"), g = document.createElement("img"), g.onload = function () {
			e.attr("src", f).removeAttr("data-lazy").removeClass("slick-loading"), c.options.adaptiveHeight === !0 && c.setPosition(), c.$slider.trigger("lazyLoaded", [c, e, f]), c.progressiveLazyLoad()
		}, g.onerror = function () {
			3 > b ? setTimeout(function () {
				c.progressiveLazyLoad(b + 1)
			}, 500) : (e.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), c.$slider.trigger("lazyLoadError", [c, e, f]), c.progressiveLazyLoad())
		}, g.src = f) : c.$slider.trigger("allImagesLoaded", [c])
	}, b.prototype.refresh = function (b) {
		var d, e, c = this;
		e = c.slideCount - c.options.slidesToShow, !c.options.infinite && c.currentSlide > e && (c.currentSlide = e), c.slideCount <= c.options.slidesToShow && (c.currentSlide = 0), d = c.currentSlide, c.destroy(!0), a.extend(c, c.initials, {
			currentSlide: d
		}), c.init(), b || c.changeSlide({
			data: {
				message: "index",
				index: d
			}
		}, !1)
	}, b.prototype.registerBreakpoints = function () {
		var c, d, e, b = this,
			f = b.options.responsive || null;
		if ("array" === a.type(f) && f.length) {
			b.respondTo = b.options.respondTo || "window";
			for (c in f)
				if (e = b.breakpoints.length - 1, d = f[c].breakpoint, f.hasOwnProperty(c)) {
					for (; e >= 0;) b.breakpoints[e] && b.breakpoints[e] === d && b.breakpoints.splice(e, 1), e--;
					b.breakpoints.push(d), b.breakpointSettings[d] = f[c].settings
				}
			b.breakpoints.sort(function (a, c) {
				return b.options.mobileFirst ? a - c : c - a
			})
		}
	}, b.prototype.reinit = function () {
		var b = this;
		b.$slides = b.$slideTrack.children(b.options.slide).addClass("slick-slide"), b.slideCount = b.$slides.length, b.currentSlide >= b.slideCount && 0 !== b.currentSlide && (b.currentSlide = b.currentSlide - b.options.slidesToScroll), b.slideCount <= b.options.slidesToShow && (b.currentSlide = 0), b.registerBreakpoints(), b.setProps(), b.setupInfinite(), b.buildArrows(), b.updateArrows(), b.initArrowEvents(), b.buildDots(), b.updateDots(), b.initDotEvents(), b.cleanUpSlideEvents(), b.initSlideEvents(), b.checkResponsive(!1, !0), b.options.focusOnSelect === !0 && a(b.$slideTrack).children().on("click.slick", b.selectHandler), b.setSlideClasses("number" == typeof b.currentSlide ? b.currentSlide : 0), b.setPosition(), b.focusHandler(), b.paused = !b.options.autoplay, b.autoPlay(), b.$slider.trigger("reInit", [b])
	}, b.prototype.resize = function () {
		var b = this;
		a(window).width() !== b.windowWidth && (clearTimeout(b.windowDelay), b.windowDelay = window.setTimeout(function () {
			b.windowWidth = a(window).width(), b.checkResponsive(), b.unslicked || b.setPosition()
		}, 50))
	}, b.prototype.removeSlide = b.prototype.slickRemove = function (a, b, c) {
		var d = this;
		return "boolean" == typeof a ? (b = a, a = b === !0 ? 0 : d.slideCount - 1) : a = b === !0 ? --a : a, d.slideCount < 1 || 0 > a || a > d.slideCount - 1 ? !1 : (d.unload(), c === !0 ? d.$slideTrack.children().remove() : d.$slideTrack.children(this.options.slide).eq(a).remove(), d.$slides = d.$slideTrack.children(this.options.slide), d.$slideTrack.children(this.options.slide).detach(), d.$slideTrack.append(d.$slides), d.$slidesCache = d.$slides, void d.reinit())
	}, b.prototype.setCSS = function (a) {
		var d, e, b = this,
			c = {};
		b.options.rtl === !0 && (a = -a), d = "left" == b.positionProp ? Math.ceil(a) + "px" : "0px", e = "top" == b.positionProp ? Math.ceil(a) + "px" : "0px", c[b.positionProp] = a, b.transformsEnabled === !1 ? b.$slideTrack.css(c) : (c = {}, b.cssTransitions === !1 ? (c[b.animType] = "translate(" + d + ", " + e + ")", b.$slideTrack.css(c)) : (c[b.animType] = "translate3d(" + d + ", " + e + ", 0px)", b.$slideTrack.css(c)))
	}, b.prototype.setDimensions = function () {
		var a = this;
		a.options.vertical === !1 ? a.options.centerMode === !0 && a.$list.css({
			padding: "0px " + a.options.centerPadding
		}) : (a.$list.height(a.$slides.first().outerHeight(!0) * a.options.slidesToShow), a.options.centerMode === !0 && a.$list.css({
			padding: a.options.centerPadding + " 0px"
		})), a.listWidth = a.$list.width(), a.listHeight = a.$list.height(), a.options.vertical === !1 && a.options.variableWidth === !1 ? (a.slideWidth = Math.ceil(a.listWidth / a.options.slidesToShow), a.$slideTrack.width(Math.ceil(a.slideWidth * a.$slideTrack.children(".slick-slide").length))) : a.options.variableWidth === !0 ? a.$slideTrack.width(5e3 * a.slideCount) : (a.slideWidth = Math.ceil(a.listWidth), a.$slideTrack.height(Math.ceil(a.$slides.first().outerHeight(!0) * a.$slideTrack.children(".slick-slide").length)));
		var b = a.$slides.first().outerWidth(!0) - a.$slides.first().width();
		a.options.variableWidth === !1 && a.$slideTrack.children(".slick-slide").width(a.slideWidth - b)
	}, b.prototype.setFade = function () {
		var c, b = this;
		b.$slides.each(function (d, e) {
			c = b.slideWidth * d * -1, b.options.rtl === !0 ? a(e).css({
				position: "relative",
				right: c,
				top: 0,
				zIndex: b.options.zIndex - 2,
				opacity: 0
			}) : a(e).css({
				position: "relative",
				left: c,
				top: 0,
				zIndex: b.options.zIndex - 2,
				opacity: 0
			})
		}), b.$slides.eq(b.currentSlide).css({
			zIndex: b.options.zIndex - 1,
			opacity: 1
		})
	}, b.prototype.setHeight = function () {
		var a = this;
		if (1 === a.options.slidesToShow && a.options.adaptiveHeight === !0 && a.options.vertical === !1) {
			var b = a.$slides.eq(a.currentSlide).outerHeight(!0);
			a.$list.css("height", b)
		}
	}, b.prototype.setOption = b.prototype.slickSetOption = function () {
		var c, d, e, f, h, b = this,
			g = !1;
		if ("object" === a.type(arguments[0]) ? (e = arguments[0], g = arguments[1], h = "multiple") : "string" === a.type(arguments[0]) && (e = arguments[0], f = arguments[1], g = arguments[2], "responsive" === arguments[0] && "array" === a.type(arguments[1]) ? h = "responsive" : "undefined" != typeof arguments[1] && (h = "single")), "single" === h) b.options[e] = f;
		else if ("multiple" === h) a.each(e, function (a, c) {
			b.options[a] = c
		});
		else if ("responsive" === h)
			for (d in f)
				if ("array" !== a.type(b.options.responsive)) b.options.responsive = [f[d]];
				else {
					for (c = b.options.responsive.length - 1; c >= 0;) b.options.responsive[c].breakpoint === f[d].breakpoint && b.options.responsive.splice(c, 1), c--;
					b.options.responsive.push(f[d])
				}
		g && (b.unload(), b.reinit())
	}, b.prototype.setPosition = function () {
		var a = this;
		a.setDimensions(), a.setHeight(), a.options.fade === !1 ? a.setCSS(a.getLeft(a.currentSlide)) : a.setFade(), a.$slider.trigger("setPosition", [a])
	}, b.prototype.setProps = function () {
		var a = this,
			b = document.body.style;
		a.positionProp = a.options.vertical === !0 ? "top" : "left", "top" === a.positionProp ? a.$slider.addClass("slick-vertical") : a.$slider.removeClass("slick-vertical"), (void 0 !== b.WebkitTransition || void 0 !== b.MozTransition || void 0 !== b.msTransition) && a.options.useCSS === !0 && (a.cssTransitions = !0), a.options.fade && ("number" == typeof a.options.zIndex ? a.options.zIndex < 3 && (a.options.zIndex = 3) : a.options.zIndex = a.defaults.zIndex), void 0 !== b.OTransform && (a.animType = "OTransform", a.transformType = "-o-transform", a.transitionType = "OTransition", void 0 === b.perspectiveProperty && void 0 === b.webkitPerspective && (a.animType = !1)), void 0 !== b.MozTransform && (a.animType = "MozTransform", a.transformType = "-moz-transform", a.transitionType = "MozTransition", void 0 === b.perspectiveProperty && void 0 === b.MozPerspective && (a.animType = !1)), void 0 !== b.webkitTransform && (a.animType = "webkitTransform", a.transformType = "-webkit-transform", a.transitionType = "webkitTransition", void 0 === b.perspectiveProperty && void 0 === b.webkitPerspective && (a.animType = !1)), void 0 !== b.msTransform && (a.animType = "msTransform", a.transformType = "-ms-transform", a.transitionType = "msTransition", void 0 === b.msTransform && (a.animType = !1)), void 0 !== b.transform && a.animType !== !1 && (a.animType = "transform", a.transformType = "transform", a.transitionType = "transition"), a.transformsEnabled = a.options.useTransform && null !== a.animType && a.animType !== !1
	}, b.prototype.setSlideClasses = function (a) {
		var c, d, e, f, b = this;
		d = b.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true"), b.$slides.eq(a).addClass("slick-current"), b.options.centerMode === !0 ? (c = Math.floor(b.options.slidesToShow / 2), b.options.infinite === !0 && (a >= c && a <= b.slideCount - 1 - c ? b.$slides.slice(a - c, a + c + 1).addClass("slick-active").attr("aria-hidden", "false") : (e = b.options.slidesToShow + a,
			d.slice(e - c + 1, e + c + 2).addClass("slick-active").attr("aria-hidden", "false")), 0 === a ? d.eq(d.length - 1 - b.options.slidesToShow).addClass("slick-center") : a === b.slideCount - 1 && d.eq(b.options.slidesToShow).addClass("slick-center")), b.$slides.eq(a).addClass("slick-center")) : a >= 0 && a <= b.slideCount - b.options.slidesToShow ? b.$slides.slice(a, a + b.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false") : d.length <= b.options.slidesToShow ? d.addClass("slick-active").attr("aria-hidden", "false") : (f = b.slideCount % b.options.slidesToShow, e = b.options.infinite === !0 ? b.options.slidesToShow + a : a, b.options.slidesToShow == b.options.slidesToScroll && b.slideCount - a < b.options.slidesToShow ? d.slice(e - (b.options.slidesToShow - f), e + f).addClass("slick-active").attr("aria-hidden", "false") : d.slice(e, e + b.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false")), "ondemand" === b.options.lazyLoad && b.lazyLoad()
	}, b.prototype.setupInfinite = function () {
		var c, d, e, b = this;
		if (b.options.fade === !0 && (b.options.centerMode = !1), b.options.infinite === !0 && b.options.fade === !1 && (d = null, b.slideCount > b.options.slidesToShow)) {
			for (e = b.options.centerMode === !0 ? b.options.slidesToShow + 1 : b.options.slidesToShow, c = b.slideCount; c > b.slideCount - e; c -= 1) d = c - 1, a(b.$slides[d]).clone(!0).attr("id", "").attr("data-slick-index", d - b.slideCount).prependTo(b.$slideTrack).addClass("slick-cloned");
			for (c = 0; e > c; c += 1) d = c, a(b.$slides[d]).clone(!0).attr("id", "").attr("data-slick-index", d + b.slideCount).appendTo(b.$slideTrack).addClass("slick-cloned");
			b.$slideTrack.find(".slick-cloned").find("[id]").each(function () {
				a(this).attr("id", "")
			})
		}
	}, b.prototype.interrupt = function (a) {
		var b = this;
		a || b.autoPlay(), b.interrupted = a
	}, b.prototype.selectHandler = function (b) {
		var c = this,
			d = a(b.target).is(".slick-slide") ? a(b.target) : a(b.target).parents(".slick-slide"),
			e = parseInt(d.attr("data-slick-index"));
		return e || (e = 0), c.slideCount <= c.options.slidesToShow ? (c.setSlideClasses(e), void c.asNavFor(e)) : void c.slideHandler(e)
	}, b.prototype.slideHandler = function (a, b, c) {
		var d, e, f, g, j, h = null,
			i = this;
		return b = b || !1, i.animating === !0 && i.options.waitForAnimate === !0 || i.options.fade === !0 && i.currentSlide === a || i.slideCount <= i.options.slidesToShow ? void 0 : (b === !1 && i.asNavFor(a), d = a, h = i.getLeft(d), g = i.getLeft(i.currentSlide), i.currentLeft = null === i.swipeLeft ? g : i.swipeLeft, i.options.infinite === !1 && i.options.centerMode === !1 && (0 > a || a > i.getDotCount() * i.options.slidesToScroll) ? void(i.options.fade === !1 && (d = i.currentSlide, c !== !0 ? i.animateSlide(g, function () {
			i.postSlide(d)
		}) : i.postSlide(d))) : i.options.infinite === !1 && i.options.centerMode === !0 && (0 > a || a > i.slideCount - i.options.slidesToScroll) ? void(i.options.fade === !1 && (d = i.currentSlide, c !== !0 ? i.animateSlide(g, function () {
			i.postSlide(d)
		}) : i.postSlide(d))) : (i.options.autoplay && clearInterval(i.autoPlayTimer), e = 0 > d ? i.slideCount % i.options.slidesToScroll !== 0 ? i.slideCount - i.slideCount % i.options.slidesToScroll : i.slideCount + d : d >= i.slideCount ? i.slideCount % i.options.slidesToScroll !== 0 ? 0 : d - i.slideCount : d, i.animating = !0, i.$slider.trigger("beforeChange", [i, i.currentSlide, e]), f = i.currentSlide, i.currentSlide = e, i.setSlideClasses(i.currentSlide), i.options.asNavFor && (j = i.getNavTarget(), j = j.slick("getSlick"), j.slideCount <= j.options.slidesToShow && j.setSlideClasses(i.currentSlide)), i.updateDots(), i.updateArrows(), i.options.fade === !0 ? (c !== !0 ? (i.fadeSlideOut(f), i.fadeSlide(e, function () {
			i.postSlide(e)
		})) : i.postSlide(e), void i.animateHeight()) : void(c !== !0 ? i.animateSlide(h, function () {
			i.postSlide(e)
		}) : i.postSlide(e))))
	}, b.prototype.startLoad = function () {
		var a = this;
		a.options.arrows === !0 && a.slideCount > a.options.slidesToShow && (a.$prevArrow.hide(), a.$nextArrow.hide()), a.options.dots === !0 && a.slideCount > a.options.slidesToShow && a.$dots.hide(), a.$slider.addClass("slick-loading")
	}, b.prototype.swipeDirection = function () {
		var a, b, c, d, e = this;
		return a = e.touchObject.startX - e.touchObject.curX, b = e.touchObject.startY - e.touchObject.curY, c = Math.atan2(b, a), d = Math.round(180 * c / Math.PI), 0 > d && (d = 360 - Math.abs(d)), 45 >= d && d >= 0 ? e.options.rtl === !1 ? "left" : "right" : 360 >= d && d >= 315 ? e.options.rtl === !1 ? "left" : "right" : d >= 135 && 225 >= d ? e.options.rtl === !1 ? "right" : "left" : e.options.verticalSwiping === !0 ? d >= 35 && 135 >= d ? "down" : "up" : "vertical"
	}, b.prototype.swipeEnd = function (a) {
		var c, d, b = this;
		if (b.dragging = !1, b.interrupted = !1, b.shouldClick = b.touchObject.swipeLength > 10 ? !1 : !0, void 0 === b.touchObject.curX) return !1;
		if (b.touchObject.edgeHit === !0 && b.$slider.trigger("edge", [b, b.swipeDirection()]), b.touchObject.swipeLength >= b.touchObject.minSwipe) {
			switch (d = b.swipeDirection()) {
				case "left":
				case "down":
					c = b.options.swipeToSlide ? b.checkNavigable(b.currentSlide + b.getSlideCount()) : b.currentSlide + b.getSlideCount(), b.currentDirection = 0;
					break;
				case "right":
				case "up":
					c = b.options.swipeToSlide ? b.checkNavigable(b.currentSlide - b.getSlideCount()) : b.currentSlide - b.getSlideCount(), b.currentDirection = 1
			}
			"vertical" != d && (b.slideHandler(c), b.touchObject = {}, b.$slider.trigger("swipe", [b, d]))
		} else b.touchObject.startX !== b.touchObject.curX && (b.slideHandler(b.currentSlide), b.touchObject = {})
	}, b.prototype.swipeHandler = function (a) {
		var b = this;
		if (!(b.options.swipe === !1 || "ontouchend" in document && b.options.swipe === !1 || b.options.draggable === !1 && -1 !== a.type.indexOf("mouse"))) switch (b.touchObject.fingerCount = a.originalEvent && void 0 !== a.originalEvent.touches ? a.originalEvent.touches.length : 1, b.touchObject.minSwipe = b.listWidth / b.options.touchThreshold, b.options.verticalSwiping === !0 && (b.touchObject.minSwipe = b.listHeight / b.options.touchThreshold), a.data.action) {
			case "start":
				b.swipeStart(a);
				break;
			case "move":
				b.swipeMove(a);
				break;
			case "end":
				b.swipeEnd(a)
		}
	}, b.prototype.swipeMove = function (a) {
		var d, e, f, g, h, b = this;
		return h = void 0 !== a.originalEvent ? a.originalEvent.touches : null, !b.dragging || h && 1 !== h.length ? !1 : (d = b.getLeft(b.currentSlide), b.touchObject.curX = void 0 !== h ? h[0].pageX : a.clientX, b.touchObject.curY = void 0 !== h ? h[0].pageY : a.clientY, b.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(b.touchObject.curX - b.touchObject.startX, 2))), b.options.verticalSwiping === !0 && (b.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(b.touchObject.curY - b.touchObject.startY, 2)))), e = b.swipeDirection(), "vertical" !== e ? (void 0 !== a.originalEvent && b.touchObject.swipeLength > 4 && a.preventDefault(), g = (b.options.rtl === !1 ? 1 : -1) * (b.touchObject.curX > b.touchObject.startX ? 1 : -1), b.options.verticalSwiping === !0 && (g = b.touchObject.curY > b.touchObject.startY ? 1 : -1), f = b.touchObject.swipeLength, b.touchObject.edgeHit = !1, b.options.infinite === !1 && (0 === b.currentSlide && "right" === e || b.currentSlide >= b.getDotCount() && "left" === e) && (f = b.touchObject.swipeLength * b.options.edgeFriction, b.touchObject.edgeHit = !0), b.options.vertical === !1 ? b.swipeLeft = d + f * g : b.swipeLeft = d + f * (b.$list.height() / b.listWidth) * g, b.options.verticalSwiping === !0 && (b.swipeLeft = d + f * g), b.options.fade === !0 || b.options.touchMove === !1 ? !1 : b.animating === !0 ? (b.swipeLeft = null, !1) : void b.setCSS(b.swipeLeft)) : void 0)
	}, b.prototype.swipeStart = function (a) {
		var c, b = this;
		return b.interrupted = !0, 1 !== b.touchObject.fingerCount || b.slideCount <= b.options.slidesToShow ? (b.touchObject = {}, !1) : (void 0 !== a.originalEvent && void 0 !== a.originalEvent.touches && (c = a.originalEvent.touches[0]), b.touchObject.startX = b.touchObject.curX = void 0 !== c ? c.pageX : a.clientX, b.touchObject.startY = b.touchObject.curY = void 0 !== c ? c.pageY : a.clientY, void(b.dragging = !0))
	}, b.prototype.unfilterSlides = b.prototype.slickUnfilter = function () {
		var a = this;
		null !== a.$slidesCache && (a.unload(), a.$slideTrack.children(this.options.slide).detach(), a.$slidesCache.appendTo(a.$slideTrack), a.reinit())
	}, b.prototype.unload = function () {
		var b = this;
		a(".slick-cloned", b.$slider).remove(), b.$dots && b.$dots.remove(), b.$prevArrow && b.htmlExpr.test(b.options.prevArrow) && b.$prevArrow.remove(), b.$nextArrow && b.htmlExpr.test(b.options.nextArrow) && b.$nextArrow.remove(), b.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "")
	}, b.prototype.unslick = function (a) {
		var b = this;
		b.$slider.trigger("unslick", [b, a]), b.destroy()
	}, b.prototype.updateArrows = function () {
		var b, a = this;
		b = Math.floor(a.options.slidesToShow / 2), a.options.arrows === !0 && a.slideCount > a.options.slidesToShow && !a.options.infinite && (a.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), a.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), 0 === a.currentSlide ? (a.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"), a.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : a.currentSlide >= a.slideCount - a.options.slidesToShow && a.options.centerMode === !1 ? (a.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), a.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : a.currentSlide >= a.slideCount - 1 && a.options.centerMode === !0 && (a.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), a.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")))
	}, b.prototype.updateDots = function () {
		var a = this;
		null !== a.$dots && (a.$dots.find("li").removeClass("slick-active").attr("aria-hidden", "true"), a.$dots.find("li").eq(Math.floor(a.currentSlide / a.options.slidesToScroll)).addClass("slick-active").attr("aria-hidden", "false"))
	}, b.prototype.visibility = function () {
		var a = this;
		a.options.autoplay && (document[a.hidden] ? a.interrupted = !0 : a.interrupted = !1)
	}, a.fn.slick = function () {
		var f, g, a = this,
			c = arguments[0],
			d = Array.prototype.slice.call(arguments, 1),
			e = a.length;
		for (f = 0; e > f; f++)
			if ("object" == typeof c || "undefined" == typeof c ? a[f].slick = new b(a[f], c) : g = a[f].slick[c].apply(a[f].slick, d), "undefined" != typeof g) return g;
		return a
	}
});


/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

! function (t) {
	"use strict";

	function e(t) {
		return new RegExp("(^|\\s+)" + t + "(\\s+|$)")
	}
	var n, i, a;

	function o(t, e) {
		(n(t, e) ? a : i)(t, e)
	}
	"classList" in document.documentElement ? (n = function (t, e) {
		return t.classList.contains(e)
	}, i = function (t, e) {
		t.classList.add(e)
	}, a = function (t, e) {
		t.classList.remove(e)
	}) : (n = function (t, n) {
		return e(n).test(t.className)
	}, i = function (t, e) {
		n(t, e) || (t.className = t.className + " " + e)
	}, a = function (t, n) {
		t.className = t.className.replace(e(n), " ")
	});
	var s = {
		hasClass: n,
		addClass: i,
		removeClass: a,
		toggleClass: o,
		has: n,
		add: i,
		remove: a,
		toggle: o
	};
	"function" == typeof define && define.amd ? define(s) : t.classie = s
}(window),
function (t) {
	"use strict";

	function e(t, e) {
		this.el = t, this.inputEl = t.querySelector("form > input.sb-search-input"), this._initEvents()
	}!t.addEventListener && t.Element && function () {
		function t(t, e) {
			Window.prototype[t] = HTMLDocument.prototype[t] = Element.prototype[t] = e
		}
		var e = [];
		t("addEventListener", function (t, n) {
			var i = this;
			e.unshift({
				__listener: function (t) {
					t.currentTarget = i, t.pageX = t.clientX + document.documentElement.scrollLeft, t.pageY = t.clientY + document.documentElement.scrollTop, t.preventDefault = function () {
						t.returnValue = !1
					}, t.relatedTarget = t.fromElement || null, t.stopPropagation = function () {
						t.cancelBubble = !0
					}, t.relatedTarget = t.fromElement || null, t.target = t.srcElement || i, t.timeStamp = +new Date, n.call(i, t)
				},
				listener: n,
				target: i,
				type: t
			}), this.attachEvent("on" + t, e[0].__listener)
		}), t("removeEventListener", function (t, n) {
			for (var i = 0, a = e.length; i < a; ++i)
				if (e[i].target == this && e[i].type == t && e[i].listener == n) return this.detachEvent("on" + t, e.splice(i, 1)[0].__listener)
		}), t("dispatchEvent", function (t) {
			try {
				return this.fireEvent("on" + t.type, t)
			} catch (a) {
				for (var n = 0, i = e.length; n < i; ++n) e[n].target == this && e[n].type == t.type && e[n].call(this, t)
			}
		})
	}(), !String.prototype.trim && (String.prototype.trim = function () {
		return this.replace(/^\s+|\s+$/g, "")
	}), e.prototype = {
		_initEvents: function () {
			var t = this,
				e = function (e) {
					e.stopPropagation(), t.inputEl.value = t.inputEl.value.trim(), classie.has(t.el, "sb-search-open") ? classie.has(t.el, "sb-search-open") && /^\s*$/.test(t.inputEl.value) && (e.preventDefault(), t.close()) : (e.preventDefault(), t.open())
				};
			this.el.addEventListener("click", e), this.el.addEventListener("touchstart", e), this.inputEl.addEventListener("click", function (t) {
				t.stopPropagation()
			}), this.inputEl.addEventListener("touchstart", function (t) {
				t.stopPropagation()
			})
		},
		open: function () {
			var e, n, i = this;
			classie.add(this.el, "sb-search-open"), n = !1, e = navigator.userAgent || navigator.vendor || t.opera, (/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(e) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(e.substr(0, 4))) && (n = !0), n || this.inputEl.focus();
			var a = function (t) {
				i.close(), this.removeEventListener("click", a), this.removeEventListener("touchstart", a)
			};
			document.addEventListener("click", a), document.addEventListener("touchstart", a)
		},
		close: function () {
			this.inputEl.blur(), classie.remove(this.el, "sb-search-open")
		}
	}, t.UISearch = e
}(window);


/*
 
 jQuery Tools 1.2.5 Tabs- The basics of UI design.

 NO COPYRIGHTS OR LICENSES. DO WHAT YOU LIKE.

 http://flowplayer.org/tools/tabs/

 Since: November 2008
 Date:    Wed Sep 22 06:02:10 2010 +0000 
*/
(function (c) {
	function p(d, b, a) {
		var e = this,
			l = d.add(this),
			h = d.find(a.tabs),
			i = b.jquery ? b : d.children(b),
			j;
		h.length || (h = d.children());
		i.length || (i = d.parent().find(b));
		i.length || (i = c(b));
		c.extend(this, {
			click: function (f, g) {
				var k = h.eq(f);
				if (typeof f == "string" && f.replace("#", "")) {
					k = h.filter("[href*=" + f.replace("#", "") + "]");
					f = Math.max(h.index(k), 0)
				}
				if (a.rotate) {
					var n = h.length - 1;
					if (f < 0) return e.click(n, g);
					if (f > n) return e.click(0, g)
				}
				if (!k.length) {
					if (j >= 0) return e;
					f = a.initialIndex;
					k = h.eq(f)
				}
				if (f === j) return e;
				g = g || c.Event();
				g.type = "onBeforeClick";
				l.trigger(g, [f]);
				if (!g.isDefaultPrevented()) {
					o[a.effect].call(e, f, function () {
						g.type = "onClick";
						l.trigger(g, [f])
					});
					j = f;
					h.removeClass(a.current);
					k.addClass(a.current);
					return e
				}
			},
			getConf: function () {
				return a
			},
			getTabs: function () {
				return h
			},
			getPanes: function () {
				return i
			},
			getCurrentPane: function () {
				return i.eq(j)
			},
			getCurrentTab: function () {
				return h.eq(j)
			},
			getIndex: function () {
				return j
			},
			next: function () {
				return e.click(j + 1)
			},
			prev: function () {
				return e.click(j - 1)
			},
			destroy: function () {
				h.unbind(a.event).removeClass(a.current);
				i.find("a[href^=#]").unbind("click.T");
				return e
			}
		});
		c.each("onBeforeClick,onClick".split(","), function (f, g) {
			c.isFunction(a[g]) && c(e).bind(g, a[g]);
			e[g] = function (k) {
				k && c(e).bind(g, k);
				return e
			}
		});
		if (a.history && c.fn.history) {
			c.tools.history.init(h);
			a.event = "history"
		}
		h.each(function (f) {
			c(this).bind(a.event, function (g) {
				e.click(f, g);
				return g.preventDefault()
			})
		});
		i.find("a[href^=#]").bind("click.T", function (f) {
			e.click(c(this).attr("href"), f)
		});
		if (location.hash && a.tabs == "a" && d.find("[href=" + location.hash + "]").length) e.click(location.hash);
		else if (a.initialIndex === 0 || a.initialIndex > 0) e.click(a.initialIndex)
	}
	c.tools = c.tools || {
		version: "1.2.5"
	};
	c.tools.tabs = {
		conf: {
			tabs: "a",
			current: "current",
			onBeforeClick: null,
			onClick: null,
			effect: "default",
			initialIndex: 0,
			event: "click",
			rotate: false,
			history: false
		},
		addEffect: function (d, b) {
			o[d] = b
		}
	};
	var o = {
			"default": function (d, b) {
				this.getPanes().hide().eq(d).show();
				b.call()
			},
			fade: function (d, b) {
				var a = this.getConf(),
					e = a.fadeOutSpeed,
					l = this.getPanes();
				e ? l.fadeOut(e) : l.hide();
				l.eq(d).fadeIn(a.fadeInSpeed, b)
			},
			slide: function (d,
				b) {
				this.getPanes().slideUp(200);
				this.getPanes().eq(d).slideDown(400, b)
			},
			ajax: function (d, b) {
				this.getPanes().eq(0).load(this.getTabs().eq(d).attr("href"), b)
			}
		},
		m;
	c.tools.tabs.addEffect("horizontal", function (d, b) {
		m || (m = this.getPanes().eq(0).width());
		this.getCurrentPane().animate({
			width: 0
		}, function () {
			c(this).hide()
		});
		this.getPanes().eq(d).animate({
			width: m
		}, function () {
			c(this).show();
			b.call()
		})
	});
	c.fn.tabs = function (d, b) {
		var a = this.data("tabs");
		if (a) {
			a.destroy();
			this.removeData("tabs")
		}
		if (c.isFunction(b)) b = {
			onBeforeClick: b
		};
		b = c.extend({}, c.tools.tabs.conf, b);
		this.each(function () {
			a = new p(c(this), d, b);
			c(this).data("tabs", a)
		});
		return b.api ? a : this
	}
})(jQuery);


/*
 
 jQuery Tools 1.2.5 Slideshow - Extend it.

 NO COPYRIGHTS OR LICENSES. DO WHAT YOU LIKE.

 http://flowplayer.org/tools/tabs/slideshow.html

 Since: September 2009
 Date:    Wed Sep 22 06:02:10 2010 +0000 
*/
(function (c) {
	var a;
	a = c.tools.tabs.slideshow = {
		conf: {
			next: ".forward",
			prev: ".backward",
			disabledClass: "disabled",
			autoplay: false,
			autopause: true,
			interval: 3000,
			clickable: true,
			api: false
		}
	};

	function b(k, i) {
		var o = this,
			f = k.add(this),
			j = k.data("tabs"),
			e, d = true;

		function h(q) {
			var p = c(q);
			return p.length < 2 ? p : k.parent().find(q)
		}
		var n = h(i.next).click(function () {
			j.next()
		});
		var l = h(i.prev).click(function () {
			j.prev()
		});
		c.extend(o, {
			getTabs: function () {
				return j
			},
			getConf: function () {
				return i
			},
			play: function () {
				if (e) {
					return o
				}
				var p = c.Event("onBeforePlay");
				f.trigger(p);
				if (p.isDefaultPrevented()) {
					return o
				}
				m();
				d = false;
				f.trigger("onPlay");
				return o
			},
			pause: function () {
				if (!e) {
					return o
				}
				var p = c.Event("onBeforePause");
				f.trigger(p);
				if (p.isDefaultPrevented()) {
					return o
				}
				e = clearTimeout(e);
				f.trigger("onPause");
				return o
			},
			stop: function () {
				o.pause();
				d = true
			}
		});

		function m() {
			e = setTimeout(j.next, i.interval);
			j.onClick(function (p) {
				if (p.originalEvent == null) {
					e = clearTimeout(e);
					e = setTimeout(j.next, i.interval)
				}
			})
		}
		c.each("onBeforePlay,onPlay,onBeforePause,onPause".split(","), function (q, p) {
			if (c.isFunction(i[p])) {
				c(o).bind(p, i[p])
			}
			o[p] = function (r) {
				return c(o).bind(p, r)
			}
		});
		if (i.autopause) {
			j.getTabs().add(n).add(l).add(j.getPanes()).hover(o.pause, function () {
				if (!d) {
					o.play()
				}
			})
		}
		if (i.autoplay) {
			o.play()
		}
		if (i.clickable) {
			j.getPanes().click(function () {
				j.next()
			})
		}
		if (!j.getConf().rotate) {
			var g = i.disabledClass;
			if (!j.getIndex()) {
				l.addClass(g)
			}
			j.onBeforeClick(function (q, p) {
				l.toggleClass(g, !p);
				n.toggleClass(g, p == j.getTabs().length - 1)
			})
		}
	}
	c.fn.slideshow = function (d) {
		var e = this.data("slideshow");
		if (e) {
			return e
		}
		d = c.extend({}, a.conf, d);
		this.each(function () {
			e = new b(c(this), d);
			c(this).data("slideshow", e)
		});
		return d.api ? e : this
	}
})(jQuery);


/************************************************************************
 * @Name		:	TabPager - jQuery Plugin
 * @Version		:	2.0.0
 * @Author 		:	Tsuyoshi.
 * @AuthorURI 	:	http://webcake.no003.info/
 * @License		: 	Open Source - MIT License : http://www.opensource.org/licenses/mit-license.php
 *************************************************************************/
(function (e) {
	e.fn.tabpager = function (t) {
		function s() {
			var t = n.start - 1;
			$tab.eq(t).addClass("current");
			e("." + n.contents).hide().eq(t).show().addClass("current");
			o(1)
		}

		function o(s) {
			var o = e("." + n.contents + ".current").children().length;
			var u = Math.ceil(o / n.items);
			var a = '<ul id="jquery-tab-pager-navi">' + '	<li><a href="#" class="previos">' + n.previous + "</a></li>";
			for (i = 0; i < u; i++) {
				a += '	<li><a href="#">' + (i + 1) + "</a></li>"
			}
			a += '	<li><a href="#" class="next">' + n.next + "</a></li>" + "</ul>";
			var f = s;
			if (s == 0) {
				f = parseInt(e("#jquery-tab-pager-navi li a.current").html());
				if (f - 1 != 0) {
					f--
				}
			} else if (s == u + 1) {
				f = parseInt(e("#jquery-tab-pager-navi li a.current").html());
				if (f + 1 != u + 1) {
					f++
				}
			}
			s = f;
			if (o == 0) a = "";
			e("#jquery-tab-pager-navi").remove();
			if (n.position == "top") {
				e("." + n.contents + ".current").before(a)
			} else {
				e("." + n.contents + ".current").after(a)
			}
			e("#jquery-tab-pager-navi li a").removeClass("current");
			e("#jquery-tab-pager-navi li a").eq(s).addClass("current");
			e("#jquery-tab-pager-navi li a").removeClass("disable");
			f = parseInt(e("#jquery-tab-pager-navi li a.current").html());
			if (f - 1 == 0) {
				e("#jquery-tab-pager-navi li a.previos").addClass("disable")
			}
			if (f == u) {
				e("#jquery-tab-pager-navi li a.next").addClass("disable")
			}
			var l = t.items * (s - 1);
			var c = t.items * s;
			if (s == u) {
				c = o
			}
			e("." + n.contents + ".current").children().hide();
			e("." + n.contents + ".current").children().slice(l, c).fadeIn(t.time);
			if (n.scroll == true) {
				e("html,body").animate({
					scrollTop: r
				}, 0)
			}
		}
		var n = {
			items: 5,
			contents: "contents",
			previous: "Previous&raquo;",
			next: "&laquo;Next",
			time: 800,
			start: 1,
			position: "bottom",
			scroll: true
		};
		var n = e.extend(n, t);
		e(this).addClass("jquery-tab-pager-tabbar");
		$tab = e(this).find("li");
		var r = 0;
		s();
		$tab.click(function () {
			var t = $tab.index(this);
			$tab.removeClass("current");
			e(this).addClass("current");
			e("." + n.contents).removeClass("current").hide().eq(t).addClass("current").fadeIn(n.time);
			o(1)
		});
		e(document).on("click", "#jquery-tab-pager-navi li a", function () {
			if (e(this).hasClass("disable")) {
				return false
			}
			var t = e("#jquery-tab-pager-navi li a").index(this);
			o(t);
			return false
		});
		e(window).on("load scroll", function () {
			r = e(window).scrollTop()
		})
	}
})(jQuery)