<html dir="ltr" lang="id"
      prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <script>if (navigator.userAgent.match(/MSIE|Internet Explorer/i) || navigator.userAgent.match(/Trident\/7\..*?rv:11/i)) {
            var href = document.location.href;
            if (!href.match(/[?&]nowprocket/)) {
                if (href.indexOf("?") == -1) {
                    if (href.indexOf("#") == -1) {
                        document.location.href = href + "?nowprocket=1"
                    } else {
                        document.location.href = href.replace("#", "?nowprocket=1#")
                    }
                } else {
                    if (href.indexOf("#") == -1) {
                        document.location.href = href + "&nowprocket=1"
                    } else {
                        document.location.href = href.replace("#", "&nowprocket=1#")
                    }
                }
            }
        }</script>
    <script>class RocketLazyLoadScripts {
            constructor() {
                this.triggerEvents = ["keydown", "mousedown", "mousemove", "touchmove", "touchstart", "touchend", "wheel"], this.userEventHandler = this._triggerListener.bind(this), this.touchStartHandler = this._onTouchStart.bind(this), this.touchMoveHandler = this._onTouchMove.bind(this), this.touchEndHandler = this._onTouchEnd.bind(this), this.clickHandler = this._onClick.bind(this), this.interceptedClicks = [], window.addEventListener("pageshow", (e => {
                    this.persisted = e.persisted
                })), window.addEventListener("DOMContentLoaded", (() => {
                    this._preconnect3rdParties()
                })), this.delayedScripts = {normal: [], async: [], defer: []}, this.allJQueries = []
            }

            _addUserInteractionListener(e) {
                document.hidden ? e._triggerListener() : (this.triggerEvents.forEach((t => window.addEventListener(t, e.userEventHandler, {passive: !0}))), window.addEventListener("touchstart", e.touchStartHandler, {passive: !0}), window.addEventListener("mousedown", e.touchStartHandler), document.addEventListener("visibilitychange", e.userEventHandler))
            }

            _removeUserInteractionListener() {
                this.triggerEvents.forEach((e => window.removeEventListener(e, this.userEventHandler, {passive: !0}))), document.removeEventListener("visibilitychange", this.userEventHandler)
            }

            _onTouchStart(e) {
                "HTML" !== e.target.tagName && (window.addEventListener("touchend", this.touchEndHandler), window.addEventListener("mouseup", this.touchEndHandler), window.addEventListener("touchmove", this.touchMoveHandler, {passive: !0}), window.addEventListener("mousemove", this.touchMoveHandler), e.target.addEventListener("click", this.clickHandler), this._renameDOMAttribute(e.target, "onclick", "rocket-onclick"))
            }

            _onTouchMove(e) {
                window.removeEventListener("touchend", this.touchEndHandler), window.removeEventListener("mouseup", this.touchEndHandler), window.removeEventListener("touchmove", this.touchMoveHandler, {passive: !0}), window.removeEventListener("mousemove", this.touchMoveHandler), e.target.removeEventListener("click", this.clickHandler), this._renameDOMAttribute(e.target, "rocket-onclick", "onclick")
            }

            _onTouchEnd(e) {
                window.removeEventListener("touchend", this.touchEndHandler), window.removeEventListener("mouseup", this.touchEndHandler), window.removeEventListener("touchmove", this.touchMoveHandler, {passive: !0}), window.removeEventListener("mousemove", this.touchMoveHandler)
            }

            _onClick(e) {
                e.target.removeEventListener("click", this.clickHandler), this._renameDOMAttribute(e.target, "rocket-onclick", "onclick"), this.interceptedClicks.push(e), e.preventDefault(), e.stopPropagation(), e.stopImmediatePropagation()
            }

            _replayClicks() {
                window.removeEventListener("touchstart", this.touchStartHandler, {passive: !0}), window.removeEventListener("mousedown", this.touchStartHandler), this.interceptedClicks.forEach((e => {
                    e.target.dispatchEvent(new MouseEvent("click", {view: e.view, bubbles: !0, cancelable: !0}))
                }))
            }

            _renameDOMAttribute(e, t, n) {
                e.hasAttribute && e.hasAttribute(t) && (event.target.setAttribute(n, event.target.getAttribute(t)), event.target.removeAttribute(t))
            }

            _triggerListener() {
                this._removeUserInteractionListener(this), "loading" === document.readyState ? document.addEventListener("DOMContentLoaded", this._loadEverythingNow.bind(this)) : this._loadEverythingNow()
            }

            _preconnect3rdParties() {
                let e = [];
                document.querySelectorAll("script[type=rocketlazyloadscript]").forEach((t => {
                    if (t.hasAttribute("src")) {
                        const n = new URL(t.src).origin;
                        n !== location.origin && e.push({
                            src: n,
                            crossOrigin: t.crossOrigin || "module" === t.getAttribute("data-rocket-type")
                        })
                    }
                })), e = [...new Map(e.map((e => [JSON.stringify(e), e]))).values()], this._batchInjectResourceHints(e, "preconnect")
            }

            async _loadEverythingNow() {
                this.lastBreath = Date.now(), this._delayEventListeners(), this._delayJQueryReady(this), this._handleDocumentWrite(), this._registerAllDelayedScripts(), this._preloadAllScripts(), await this._loadScriptsFromList(this.delayedScripts.normal), await this._loadScriptsFromList(this.delayedScripts.defer), await this._loadScriptsFromList(this.delayedScripts.async);
                try {
                    await this._triggerDOMContentLoaded(), await this._triggerWindowLoad()
                } catch (e) {
                }
                window.dispatchEvent(new Event("rocket-allScriptsLoaded")), this._replayClicks()
            }

            _registerAllDelayedScripts() {
                document.querySelectorAll("script[type=rocketlazyloadscript]").forEach((e => {
                    e.hasAttribute("src") ? e.hasAttribute("async") && !1 !== e.async ? this.delayedScripts.async.push(e) : e.hasAttribute("defer") && !1 !== e.defer || "module" === e.getAttribute("data-rocket-type") ? this.delayedScripts.defer.push(e) : this.delayedScripts.normal.push(e) : this.delayedScripts.normal.push(e)
                }))
            }

            async _transformScript(e) {
                return await this._littleBreath(), new Promise((t => {
                    const n = document.createElement("script");
                    [...e.attributes].forEach((e => {
                        let t = e.nodeName;
                        "type" !== t && ("data-rocket-type" === t && (t = "type"), n.setAttribute(t, e.nodeValue))
                    })), e.hasAttribute("src") ? (n.addEventListener("load", t), n.addEventListener("error", t)) : (n.text = e.text, t());
                    try {
                        e.parentNode.replaceChild(n, e)
                    } catch (e) {
                        t()
                    }
                }))
            }

            async _loadScriptsFromList(e) {
                const t = e.shift();
                return t ? (await this._transformScript(t), this._loadScriptsFromList(e)) : Promise.resolve()
            }

            _preloadAllScripts() {
                this._batchInjectResourceHints([...this.delayedScripts.normal, ...this.delayedScripts.defer, ...this.delayedScripts.async], "preload")
            }

            _batchInjectResourceHints(e, t) {
                var n = document.createDocumentFragment();
                e.forEach((e => {
                    if (e.src) {
                        const i = document.createElement("link");
                        i.href = e.src, i.rel = t, "preconnect" !== t && (i.as = "script"), e.getAttribute && "module" === e.getAttribute("data-rocket-type") && (i.crossOrigin = !0), e.crossOrigin && (i.crossOrigin = e.crossOrigin), n.appendChild(i)
                    }
                })), document.head.appendChild(n)
            }

            _delayEventListeners() {
                let e = {};

                function t(t, n) {
                    !function (t) {
                        function n(n) {
                            return e[t].eventsToRewrite.indexOf(n) >= 0 ? "rocket-" + n : n
                        }

                        e[t] || (e[t] = {
                            originalFunctions: {add: t.addEventListener, remove: t.removeEventListener},
                            eventsToRewrite: []
                        }, t.addEventListener = function () {
                            arguments[0] = n(arguments[0]), e[t].originalFunctions.add.apply(t, arguments)
                        }, t.removeEventListener = function () {
                            arguments[0] = n(arguments[0]), e[t].originalFunctions.remove.apply(t, arguments)
                        })
                    }(t), e[t].eventsToRewrite.push(n)
                }

                function n(e, t) {
                    let n = e[t];
                    Object.defineProperty(e, t, {
                        get: () => n || function () {
                        }, set(i) {
                            e["rocket" + t] = n = i
                        }
                    })
                }

                t(document, "DOMContentLoaded"), t(window, "DOMContentLoaded"), t(window, "load"), t(window, "pageshow"), t(document, "readystatechange"), n(document, "onreadystatechange"), n(window, "onload"), n(window, "onpageshow")
            }

            _delayJQueryReady(e) {
                let t = window.jQuery;
                Object.defineProperty(window, "jQuery", {
                    get: () => t, set(n) {
                        if (n && n.fn && !e.allJQueries.includes(n)) {
                            n.fn.ready = n.fn.init.prototype.ready = function (t) {
                                e.domReadyFired ? t.bind(document)(n) : document.addEventListener("rocket-DOMContentLoaded", (() => t.bind(document)(n)))
                            };
                            const t = n.fn.on;
                            n.fn.on = n.fn.init.prototype.on = function () {
                                if (this[0] === window) {
                                    function e(e) {
                                        return e.split(" ").map((e => "load" === e || 0 === e.indexOf("load.") ? "rocket-jquery-load" : e)).join(" ")
                                    }

                                    "string" == typeof arguments[0] || arguments[0] instanceof String ? arguments[0] = e(arguments[0]) : "object" == typeof arguments[0] && Object.keys(arguments[0]).forEach((t => {
                                        delete Object.assign(arguments[0], {[e(t)]: arguments[0][t]})[t]
                                    }))
                                }
                                return t.apply(this, arguments), this
                            }, e.allJQueries.push(n)
                        }
                        t = n
                    }
                })
            }

            async _triggerDOMContentLoaded() {
                this.domReadyFired = !0, await this._littleBreath(), document.dispatchEvent(new Event("rocket-DOMContentLoaded")), await this._littleBreath(), window.dispatchEvent(new Event("rocket-DOMContentLoaded")), await this._littleBreath(), document.dispatchEvent(new Event("rocket-readystatechange")), await this._littleBreath(), document.rocketonreadystatechange && document.rocketonreadystatechange()
            }

            async _triggerWindowLoad() {
                await this._littleBreath(), window.dispatchEvent(new Event("rocket-load")), await this._littleBreath(), window.rocketonload && window.rocketonload(), await this._littleBreath(), this.allJQueries.forEach((e => e(window).trigger("rocket-jquery-load"))), await this._littleBreath();
                const e = new Event("rocket-pageshow");
                e.persisted = this.persisted, window.dispatchEvent(e), await this._littleBreath(), window.rocketonpageshow && window.rocketonpageshow({persisted: this.persisted})
            }

            _handleDocumentWrite() {
                const e = new Map;
                document.write = document.writeln = function (t) {
                    const n = document.currentScript, i = document.createRange(), r = n.parentElement;
                    let o = e.get(n);
                    void 0 === o && (o = n.nextSibling, e.set(n, o));
                    const s = document.createDocumentFragment();
                    i.setStart(s, 0), s.appendChild(i.createContextualFragment(t)), r.insertBefore(s, o)
                }
            }

            async _littleBreath() {
                Date.now() - this.lastBreath > 45 && (await this._requestAnimFrame(), this.lastBreath = Date.now())
            }

            async _requestAnimFrame() {
                return document.hidden ? new Promise((e => setTimeout(e))) : new Promise((e => requestAnimationFrame(e)))
            }

            static run() {
                const e = new RocketLazyLoadScripts;
                e._addUserInteractionListener(e)
            }
        }

        RocketLazyLoadScripts.run();</script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bali Abisha Hotel</title>
    <link rel="shortcut icon" href="{{asset('image/abisha_logo.png')}}"/>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500&display=swap" rel="stylesheet">


    <link href="{{asset('css/bootstrap.custom.min.css')}}" rel="stylesheet">
    <link data-minify="1" href="{{asset('css/style.css')}}" rel="stylesheet">
    <link data-minify="1" href="{{asset('css/style2.css')}}" rel="stylesheet">
    <link data-minify="1" href="{{asset('css/blog.css')}}" rel="stylesheet">
    <link data-minify="1" href="{{asset('css/listing.css')}}" rel="stylesheet">
    <link data-minify="1" href="{{asset('css/home.css')}}" rel="stylesheet">
    <link data-minify="1" href="{{asset('css/custom.css')}}" rel="stylesheet">

    <link rel='dns-prefetch' href='//cdnjs.cloudflare.com'/>
    <link rel='dns-prefetch' href='//use.fontawesome.com'/>
    <script type="rocketlazyloadscript" data-rocket-type="text/javascript">

    </script>
    <style id='wp-emoji-styles-inline-css' type='text/css'>

        img.wp-smiley, img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel='stylesheet' id='wp-block-library-css' href='{{asset('css/style.min.css')}}' type='text/css' media='all'/>
    <style id='classic-theme-styles-inline-css' type='text/css'>
        /*! This file is auto-generated */
        .wp-block-button__link {
            color: #fff;
            background-color: #32373c;
            border-radius: 9999px;
            box-shadow: none;
            text-decoration: none;
            padding: calc(.667em + 2px) calc(1.333em + 2px);
            font-size: 1.125em
        }

        .wp-block-file__button {
            background: #32373c;
            color: #fff;
            text-decoration: none
        }
    </style>
    <style id='global-styles-inline-css' type='text/css'>
        body {
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
            --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
            --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
            --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        :where(.is-layout-grid) {
            gap: 0.5em;
        }

        body .is-layout-flex {
            display: flex;
        }

        body .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        body .is-layout-flex > * {
            margin: 0;
        }

        body .is-layout-grid {
            display: grid;
        }

        body .is-layout-grid > * {
            margin: 0;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        .wp-block-navigation a:where(:not(.wp-element-button)) {
            color: inherit;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        .wp-block-pullquote {
            font-size: 1.5em;
            line-height: 1.6;
        }
    </style>
    <link data-minify="1" rel='stylesheet' id='contact-form-7-css' href='{{asset('css/styles.css')}}' type='text/css'
          media='all'/>
    <link data-minify="1" rel='stylesheet' id='sf_styles-css' href='{{asset('css/superfly-menu.css')}}' type='text/css'
          media='all'/>
    <link data-minify="1" rel='stylesheet' id='wpvrfontawesome-css' href='{{asset('css/all.css')}}' type='text/css'
          media='all'/>
    <link data-minify="1" rel='stylesheet' id='panellium-css-css' href='{{asset('css/pannellum.css')}}' type='text/css'
          media='all'/>
    <link data-minify="1" rel='stylesheet' id='videojs-css-css' href='{{asset('css/video-js.css')}}' type='text/css'
          media='all'/>
    <link data-minify="1" rel='stylesheet' id='videojs-vr-css-css' href='{{asset('css/videojs-vr.css')}}'
          type='text/css' media='all'/>
    <link data-minify="1" rel='stylesheet' id='owl-css-css' href='{{asset('css/owl.carousel.css')}}' type='text/css'
          media='all'/>
    <link data-minify="1" rel='stylesheet' id='wpvr-css' href='{{asset('css/wpvr-public.css')}}' type='text/css'
          media='all'/>
    <style id='rocket-lazyload-inline-css' type='text/css'>
        .rll-youtube-player {
            position: relative;
            padding-bottom: 56.23%;
            height: 0;
            overflow: hidden;
            max-width: 100%;
        }

        .rll-youtube-player:focus-within {
            outline: 2px solid currentColor;
            outline-offset: 5px;
        }

        .rll-youtube-player iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            background: 0 0
        }

        .rll-youtube-player img {
            bottom: 0;
            display: block;
            left: 0;
            margin: auto;
            max-width: 100%;
            width: 100%;
            position: absolute;
            right: 0;
            top: 0;
            border: none;
            height: auto;
            -webkit-transition: .4s all;
            -moz-transition: .4s all;
            transition: .4s all
        }

        .rll-youtube-player img:hover {
            -webkit-filter: brightness(75%)
        }

        .rll-youtube-player .play {
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            position: absolute;
            background: url({{asset('image/youtube.png')}}) no-repeat center;
            background-color: transparent !important;
            cursor: pointer;
            border: none;
        }
    </style>
    <script type="rocketlazyloadscript" data-rocket-type="text/javascript" src="{{asset('js/jquery.min.js')}}"
            id="jquery-core-js" defer></script>
    <script type="rocketlazyloadscript" data-rocket-type="text/javascript" src="{{asset('js/jquery-migrate.min.js')}}"
            id="jquery-migrate-js" defer></script>
    <script type="text/javascript" id="sf_main-js-extra">
        /* <![CDATA[ */
        var SF_Opts = {
            "social": [],
            "search": "hidden",
            "blur": "none",
            "fade": "no",
            "test_mode": "",
            "hide_def": "",
            "mob_nav": "yes",
            "sidebar_style": "slide",
            "sub_animation_type": "nopush",
            "alt_menu": "",
            "sidebar_pos": "right",
            "width_panel_1": "275",
            "width_panel_2": "250",
            "width_panel_3": "250",
            "width_panel_4": "200",
            "base_color": "#00002e",
            "opening_type": "click",
            "sub_type": "",
            "sub_opening_type": "hover",
            "label": "metro",
            "label_top": "0px",
            "label_size": "1x",
            "label_vis": "visible",
            "item_padding": "15",
            "bg": "none",
            "path": "https:\/\/balihillstonevillas.com\/wp-content\/plugins\/superfly-menu\/img\/",
            "menu": "2",
            "togglers": "",
            "subMenuSupport": "yes",
            "subMenuSelector": "sub-menu, children",
            "activeClassSelector": "current-menu-item",
            "allowedTags": "DIV, NAV, UL, OL, LI, A, P, H1, H2, H3, H4, SPAN",
            "menuData": [],
            "siteBase": "https:\/\/balihillstonevillas.com",
            "plugin_ver": "2.1.5"
        };
        /* ]]> */
    </script>
    <script type="rocketlazyloadscript" data-rocket-type="text/javascript" src="{{asset('js/superfly-menu.min.js')}}"
            id="sf_main-js" defer></script>
    <script type="rocketlazyloadscript" data-rocket-type="text/javascript" src="{{asset('js/pannellum.js')}}"
            id="panellium-js-js" defer></script>
    <script type="rocketlazyloadscript" data-rocket-type="text/javascript" src="{{asset('js/libpannellum.js')}}"
            id="panelliumlib-js-js" defer></script>
    <script type="rocketlazyloadscript" data-rocket-type="text/javascript" src="{{asset('js/video.js')}}"
            id="videojs-js-js" defer></script>
    <script type="rocketlazyloadscript" data-rocket-type="text/javascript" src="{{asset('js/videojs-vr.js')}}"
            id="videojsvr-js-js" defer></script>
    <script type="rocketlazyloadscript" data-rocket-type="text/javascript"
            src="{{asset('js/videojs-pannellum-plugin.js')}}" id="panelliumvid-js-js" defer></script>
    <script type="rocketlazyloadscript" data-rocket-type="text/javascript" src="{{asset('js/owl.carousel.js')}}"
            id="owl-js-js" defer></script>
    <script type="rocketlazyloadscript" data-rocket-type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js?ver=1"
            id="jquery_cookie-js" defer></script>
    <meta name="generator" content="WordPress 6.5.5"/>
    <style id="superfly-dynamic-styles">

        #sf-sidebar.sf-vertical-nav .sf-has-child-menu .sf-sm-indicator i:after {
            content: '\e610';
            -webkit-transition: all 0.3s cubic-bezier(0.215, 0.061, 0.355, 1);
            -moz-transition: all 0.3s cubic-bezier(0.215, 0.061, 0.355, 1);
            -o-transition: all 0.3s cubic-bezier(0.215, 0.061, 0.355, 1);
            transition: all 0.3s cubic-bezier(0.215, 0.061, 0.355, 1);
            -webkit-backface-visibility: hidden;
            display: inline-block;
        }

        .sf-vertical-nav .sf-submenu-visible > a .sf-sm-indicator i:after {
            -webkit-transform: rotate(180deg);
            -moz-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            -o-transform: rotate(180deg);
            transform: rotate(180deg);
        }

        #sf-mob-navbar .sf-navicon-button:after {
            /*width: 30px;*/
        }

        .sf-pos-right .sf-vertical-nav .sf-has-child-menu > a:before {
            display: none;
        }

        #sf-sidebar.sf-vertical-nav .sf-menu .sf-sm-indicator {
            background: rgba(255, 255, 255, 0.085);
        }

        .sf-pos-right #sf-sidebar.sf-vertical-nav .sf-menu li a {
            padding-left: 10px !important;
        }

        .sf-pos-right #sf-sidebar.sf-vertical-nav .sf-sm-indicator {
            left: auto;
            right: 0;
        }

        #sf-sidebar.sf-compact .sf-va-middle {
            display: block;
            height: auto;
            margin-top: 0px;
        }

        #sf-sidebar.sf-compact .sf-nav,
        .sf-mobile #sf-sidebar .sf-nav,
        #sf-sidebar.sf-compact .sf-logo,
        .sf-mobile #sf-sidebar .sf-logo,
        #sf-sidebar.sf-compact-footer .sf-social,
        .sf-mobile #sf-sidebar .sf-social {
            position: static;
            display: block;
        }

        #sf-sidebar.sf-compact .sf-logo {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .sf-mobile #sf-sidebar.sf-compact-header .sf-logo img {
            max-height: 75px;
        }

        #sf-sidebar.sf-compact .sf-nav {
            min-height: 0px;
            height: auto;
            max-height: none;
            margin-top: 0px;
        }

        #sf-sidebar.sf-compact-footer .sf-social {
            margin-top: 30px;
            margin-bottom: 30px;
            position: relative;
        }

        #sf-sidebar.sf-compact .sf-sidebar-bg {
            min-height: 150%;
        }

        #sf-sidebar.sf-compact input[type=search] {
            font-size: 16px;
        }

        /*}*/

        #sf-sidebar .sf-sidebar-bg, #sf-sidebar .sf-social {
            background-color: #00002e !important;
        }


        #sf-sidebar, .sf-sidebar-bg, #sf-sidebar .sf-nav, #sf-sidebar .sf-logo, #sf-sidebar .sf-social {
            width: 275px;
        }


        #sf-sidebar .sf-menu li a, #sf-sidebar .widget-area,
        .sf-search-form input {
            padding-left: 28px !important;
        }

        #sf-sidebar.sf-compact .sf-social li {
            text-align: left;
        }

        #sf-sidebar.sf-compact .sf-social:before {
            right: auto;
            left: auto;
            left: 10%;
        }


        #sf-sidebar:after {
            display: none !important;
        }

        #sf-sidebar .search-form {
            display: none !important;
        }


        #sf-sidebar,
        .sf-sidebar-slide.sf-pos-right.sf-body-pushed #sf-mob-navbar {
            -webkit-transform: translate(-275px, 0);
            -moz-transform: translate(-275px, 0);
            -ms-transform: translate(-275px, 0);
            -o-transform: translate(-275px, 0);
            transform: translate(-275px, 0);
            -webkit-transform: translate3d(-275px, 0, 0);
            -moz-transform: translate3d(-275px, 0, 0);
            -ms-transform: translate3d(-275px, 0, 0);
            -o-transform: translate3d(-275px, 0, 0);
            transform: translate3d(-275px, 0, 0);
        }

        .sf-pos-right #sf-sidebar, .sf-sidebar-slide.sf-body-pushed #sf-mob-navbar {
            -webkit-transform: translate(275px, 0);
            -moz-transform: translate(275px, 0);
            -ms-transform: translate(275px, 0);
            -o-transform: translate(275px, 0);
            transform: translate(275px, 0);
            -webkit-transform: translate3d(275px, 0, 0);
            -moz-transform: translate3d(275px, 0, 0);
            -ms-transform: translate3d(275px, 0, 0);
            -o-transform: translate3d(275px, 0, 0);
            transform: translate3d(275px, 0, 0);
        }

        .sf-pos-left #sf-sidebar .sf-view-level-1 {
            left: 275px;
            width: 250px;
            -webkit-transform: translate(-250px, 0);
            -moz-transform: translate(-250px, 0);
            -ms-transform: translate(-250px, 0);
            -o-transform: translate(-250px, 0);
            transform: translate(-250px, 0);
            -webkit-transform: translate3d(-250px, 0, 0);
            -moz-transform: translate3d(-250px, 0, 0);
            -ms-transform: translate3d(-250px, 0, 0);
            -o-transform: translate3d(-250px, 0, 0);
            transform: translate3d(-250px, 0, 0);
        }

        .sf-pos-right #sf-sidebar .sf-view-level-1 {
            left: auto;
            right: 275px;
            width: 250px;
            -webkit-transform: translate(250px, 0);
            -moz-transform: translate(250px, 0);
            -ms-transform: translate(250px, 0);
            -o-transform: translate(250px, 0);
            transform: translate(250px, 0);
            -webkit-transform: translate3d(250px, 0, 0);
            -moz-transform: translate3d(250px, 0, 0);
            -ms-transform: translate3d(250px, 0, 0);
            -o-transform: translate3d(250px, 0, 0);
            transform: translate3d(250px, 0, 0);
        }

        .sf-pos-left #sf-sidebar .sf-view-level-2 {
            left: 525px;
            width: 250px;
            -webkit-transform: translate(-775px, 0);
            -moz-transform: translate(-775px, 0);
            -ms-transform: translate(-775px, 0);
            -o-transform: translate(-775px, 0);
            transform: translate(-775px, 0);
            -webkit-transform: translate3d(-775px, 0, 0);
            -moz-transform: translate3d(-775px, 0, 0);
            -ms-transform: translate3d(-775px, 0, 0);
            -o-transform: translate3d(-775px, 0, 0);
            transform: translate3d(-775px, 0, 0);
        }

        .sf-pos-right #sf-sidebar .sf-view-level-2 {
            left: auto;
            right: 525px;
            width: 250px;
            -webkit-transform: translate(775px, 0);
            -moz-transform: translate(775px, 0);
            -ms-transform: translate(775px, 0);
            -o-transform: translate(775px, 0);
            transform: translate(775px, 0);
            -webkit-transform: translate3d(775px, 0, 0);
            -moz-transform: translate3d(775px, 0, 0);
            -ms-transform: translate3d(775px, 0, 0);
            -o-transform: translate3d(775px, 0, 0);
            transform: translate3d(775px, 0, 0);
        }

        .sf-pos-left #sf-sidebar .sf-view-level-3 {
            left: 775px;
            width: 200px;
            -webkit-transform: translate(-775px, 0);
            -moz-transform: translate(-775px, 0);
            -ms-transform: translate(-775px, 0);
            -o-transform: translate(-775px, 0);
            transform: translate(-775px, 0);
            -webkit-transform: translate3d(-775px, 0, 0);
            -moz-transform: translate3d(-775px, 0, 0);
            -ms-transform: translate3d(-775px, 0, 0);
            -o-transform: translate3d(-775px, 0, 0);
            transform: translate3d(-775px, 0, 0);
        }

        .sf-pos-right #sf-sidebar .sf-view-level-3 {
            left: auto;
            right: 775px;
            width: 200px;
            -webkit-transform: translate(775px, 0);
            -moz-transform: translate(775px, 0);
            -ms-transform: translate(775px, 0);
            -o-transform: translate(775px, 0);
            transform: translate(775px, 0);
            -webkit-transform: translate3d(775px, 0, 0);
            -moz-transform: translate3d(775px, 0, 0);
            -ms-transform: translate3d(775px, 0, 0);
            -o-transform: translate3d(775px, 0, 0);
            transform: translate3d(775px, 0, 0);
        }

        .sf-view-pushed-1 #sf-sidebar .sf-view-level-2 {
            -webkit-transform: translate(-250px, 0);
            -moz-transform: translate(-250px, 0);
            -ms-transform: translate(-250px, 0);
            -o-transform: translate(-250px, 0);
            transform: translate(-250px, 0);
            -webkit-transform: translate3d(-250px, 0, 0);
            -moz-transform: translate3d(-250px, 0, 0);
            -ms-transform: translate3d(-250px, 0, 0);
            -o-transform: translate3d(-250px, 0, 0);
            transform: translate3d(-250px, 0, 0);
        }

        .sf-pos-right.sf-view-pushed-1 #sf-sidebar .sf-view-level-2 {
            -webkit-transform: translate(250px, 0);
            -moz-transform: translate(250px, 0);
            -ms-transform: translate(250px, 0);
            -o-transform: translate(250px, 0);
            transform: translate(250px, 0);
            -webkit-transform: translate3d(250px, 0, 0);
            -moz-transform: translate3d(250px, 0, 0);
            -ms-transform: translate3d(250px, 0, 0);
            -o-transform: translate3d(250px, 0, 0);
            transform: translate3d(250px, 0, 0);
        }

        .sf-view-pushed-2 #sf-sidebar .sf-view-level-3 {
            -webkit-transform: translate(-200px, 0);
            -moz-transform: translate(-200px, 0);
            -ms-transform: translate(-200px, 0);
            -o-transform: translate(-200px, 0);
            transform: translate(-200px, 0);
            -webkit-transform: translate3d(-200px, 0, 0);
            -moz-transform: translate3d(-200px, 0, 0);
            -ms-transform: translate3d(-200px, 0, 0);
            -o-transform: translate3d(-200px, 0, 0);
            transform: translate3d(-200px, 0, 0);
        }

        .sf-pos-right.sf-view-pushed-2 #sf-sidebar .sf-view-level-3 {
            -webkit-transform: translate(200px, 0);
            -moz-transform: translate(200px, 0);
            -ms-transform: translate(200px, 0);
            -o-transform: translate(200px, 0);
            transform: translate(200px, 0);
            -webkit-transform: translate3d(200px, 0, 0);
            -moz-transform: translate3d(200px, 0, 0);
            -ms-transform: translate3d(200px, 0, 0);
            -o-transform: translate3d(200px, 0, 0);
            transform: translate3d(200px, 0, 0);
        }

        #sf-sidebar .sf-view-level-1, #sf-sidebar ul.sf-menu-level-1 {
            background: #00002e;
        }


        #sf-sidebar .sf-view-level-2, #sf-sidebar ul.sf-menu-level-2 {
            background: #36939e;
        }

        #sf-sidebar .sf-view-level-3, #sf-sidebar ul.sf-menu-level-3 {
            background: #9e466b;
        }

        #sf-sidebar .sf-menu-level-0 li, #sf-sidebar .sf-menu-level-0 li a, .sf-title h3 {
            color: #aaaaaa;
        }

        #sf-sidebar .sf-menu li a, #sf-sidebar .sf-search-form {
            padding: 15px 0;
            text-transform: uppercase;
        }

        #sf-sidebar .sf-search-form span {
            top: 16.5px;
        }

        #sf-sidebar {
            font-family: inherit;
        }

        #sf-sidebar .sf-sm-indicator {
            line-height: 15px;
        }

        #sf-sidebar .sf-search-form input {
            font-size: 15px;
        }

        #sf-sidebar .sf-menu li a {
            font-family: inherit;
            font-weight: normal;
            font-size: 15px;
            text-align: left;
            /*-webkit-text-stroke: 1px rgba(0,0,0,0.1);*/
            /*-moz-text-stroke: 1px rgba(238, 238, 238, 0.9);*/
            /*-ms-text-stroke: 1px rgba(0,0,0,0.1);*/
            /*text-stroke: 1px rgba(0,0,0,0.1);*/
            -moz-font-smoothing: antialiased;
            -webkit-font-smoothing: antialiased;
            font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        #sf-sidebar .sf-rollback a {
            font-family: inherit;
        }

        #sf-sidebar .sf-menu-level-0 li > a i, .sf-title h2 {
            color: #aaaaaa;
        }

        #sf-sidebar .sf-menu-level-1 li > a i {
            color: #aaaaaa;
        }

        #sf-sidebar .sf-menu-level-2 li > a i {
            color: #aaaaaa;
        }

        #sf-sidebar .sf-menu-level-3 li > a i {
            color: #aaaaaa;
        }

        #sf-sidebar .sf-view-level-1 li a,
        #sf-sidebar .sf-menu-level-1 li a {
            color: #ffffff;
            border-color: #ffffff;
        }

        #sf-sidebar:after {
            background-color: #00002e;
        }

        #sf-sidebar .sf-view-level-2 li a,
        #sf-sidebar .sf-menu-level-2 li a {
            color: #ffffff;
            border-color: #ffffff;
        }

        #sf-sidebar .sf-view-level-3 li a,
        #sf-sidebar .sf-menu-level-3 li a {
            color: #ffffff;
            border-color: #ffffff;
        }

        #sf-sidebar .sf-navicon-button {
            top: 0px;
        }

        .sf-mobile #sf-sidebar .sf-navicon-button {
            top: 0px;
        }

        .sf-body-pushed #sf-overlay, body[class*="sf-view-pushed"] #sf-overlay {
            opacity: 0.2;
        }

        .sf-body-pushed #sf-overlay:hover, body[class*="sf-view-pushed"] #sf-overlay:hover {
            cursor: url("https://balihillstonevillas.com/wp-content/plugins/superfly-menu/img/close.png") 16 16, pointer;
        }


        #sf-sidebar .sf-menu li:after {
            content: '';
            display: block;
            width: 100%;
            box-sizing: border-box;
            position: absolute;
            bottom: 0px;
            left: 0;
            right: 0;
            height: 1px;
            background: rgba(255, 255, 255, 0.08);
            margin: 0 auto;
        }

        #sf-sidebar .sf-menu li:last-child:after {
            display: none;
        }


        #sf-sidebar .sf-navicon,
        #sf-sidebar .sf-navicon:after,
        #sf-sidebar .sf-navicon:before,
        #sf-sidebar .sf-label-metro .sf-navicon-button,
        #sf-mob-navbar {
            background-color: #000027;
        }

        #sf-sidebar .sf-label-square .sf-navicon-button,
        #sf-sidebar .sf-label-rsquare .sf-navicon-button,
        #sf-sidebar .sf-label-circle .sf-navicon-button {
            color: #000027;
        }


        #sf-sidebar [class*="sf-icon-"] {
            color: #aaaaaa;
        }

        #sf-sidebar .sf-social li {
            border-color: #aaaaaa;
        }

        body #sf-sidebar .sf-social li:hover {
            background-color: #aaaaaa;
            color: #00002e;
        }

        #sf-sidebar .sf-search-form {
            background-color: rgba(255, 255, 255, 0.05);
        }

        @font-face {
            font-family: 'sf-icomoon';
            src: url('https://balihillstonevillas.com/wp-content/plugins/superfly-menu/img/fonts/icomoon.eot?wehgh4');
            src: url('https://balihillstonevillas.com/wp-content/plugins/superfly-menu/img/fonts/icomoon.svg?wehgh4#icomoon') format('svg'),
            url('https://balihillstonevillas.com/wp-content/plugins/superfly-menu/img/fonts/icomoon.eot?#iefixwehgh4') format('embedded-opentype'),
            url('https://balihillstonevillas.com/wp-content/plugins/superfly-menu/img/fonts/icomoon.woff?wehgh4') format('woff'),
            url('https://balihillstonevillas.com/wp-content/plugins/superfly-menu/img/fonts/icomoon.ttf?wehgh4') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'FontAwesome';
            src: url('https://balihillstonevillas.com/wp-content/plugins/superfly-menu/img/fonts/fontawesome-webfont.eot?wehgh4');
            src: url('https://balihillstonevillas.com/wp-content/plugins/superfly-menu/img/fonts/fontawesome-webfont.svg?wehgh4#icomoon') format('svg'),
            url('https://balihillstonevillas.com/wp-content/plugins/superfly-menu/img/fonts/fontawesome-webfont.eot?#iefixwehgh4') format('embedded-opentype'),
            url('https://balihillstonevillas.com/wp-content/plugins/superfly-menu/img/fonts/fontawesome-webfont.woff?wehgh4') format('woff'),
            url('https://balihillstonevillas.com/wp-content/plugins/superfly-menu/img/fonts/fontawesome-webfont.ttf?wehgh4') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        #sf-sidebar span[class*='fa-']:before {
            font-family: 'FontAwesome';
            line-height: normal;
            position: absolute;
            top: 0 !important;
            bottom: 0;
            left: -23px;
        }

        #sf-sidebar span[class*='fa-'] {
            display: inline-block;
            position: relative;
            margin-left: 23px;
        }

        .fa-glass:before {
            content: "\f000"
        }

        .fa-music:before {
            content: "\f001"
        }

        .fa-search:before {
            content: "\f002"
        }

        .fa-envelope-o:before {
            content: "\f003"
        }

        .fa-heart:before {
            content: "\f004"
        }

        .fa-star:before {
            content: "\f005"
        }

        .fa-star-o:before {
            content: "\f006"
        }

        .fa-user:before {
            content: "\f007"
        }

        .fa-film:before {
            content: "\f008"
        }

        .fa-th-large:before {
            content: "\f009"
        }

        .fa-th:before {
            content: "\f00a"
        }

        .fa-th-list:before {
            content: "\f00b"
        }

        .fa-check:before {
            content: "\f00c"
        }

        .fa-remove:before, .fa-close:before, .fa-times:before {
            content: "\f00d"
        }

        .fa-search-plus:before {
            content: "\f00e"
        }

        .fa-search-minus:before {
            content: "\f010"
        }

        .fa-power-off:before {
            content: "\f011"
        }

        .fa-signal:before {
            content: "\f012"
        }

        .fa-gear:before, .fa-cog:before {
            content: "\f013"
        }

        .fa-trash-o:before {
            content: "\f014"
        }

        .fa-home:before {
            content: "\f015"
        }

        .fa-file-o:before {
            content: "\f016"
        }

        .fa-clock-o:before {
            content: "\f017"
        }

        .fa-road:before {
            content: "\f018"
        }

        .fa-download:before {
            content: "\f019"
        }

        .fa-arrow-circle-o-down:before {
            content: "\f01a"
        }

        .fa-arrow-circle-o-up:before {
            content: "\f01b"
        }

        .fa-inbox:before {
            content: "\f01c"
        }

        .fa-play-circle-o:before {
            content: "\f01d"
        }

        .fa-rotate-right:before, .fa-repeat:before {
            content: "\f01e"
        }

        .fa-refresh:before {
            content: "\f021"
        }

        .fa-list-alt:before {
            content: "\f022"
        }

        .fa-lock:before {
            content: "\f023"
        }

        .fa-flag:before {
            content: "\f024"
        }

        .fa-headphones:before {
            content: "\f025"
        }

        .fa-volume-off:before {
            content: "\f026"
        }

        .fa-volume-down:before {
            content: "\f027"
        }

        .fa-volume-up:before {
            content: "\f028"
        }

        .fa-qrcode:before {
            content: "\f029"
        }

        .fa-barcode:before {
            content: "\f02a"
        }

        .fa-tag:before {
            content: "\f02b"
        }

        .fa-tags:before {
            content: "\f02c"
        }

        .fa-book:before {
            content: "\f02d"
        }

        .fa-bookmark:before {
            content: "\f02e"
        }

        .fa-print:before {
            content: "\f02f"
        }

        .fa-camera:before {
            content: "\f030"
        }

        .fa-font:before {
            content: "\f031"
        }

        .fa-bold:before {
            content: "\f032"
        }

        .fa-italic:before {
            content: "\f033"
        }

        .fa-text-height:before {
            content: "\f034"
        }

        .fa-text-width:before {
            content: "\f035"
        }

        .fa-align-left:before {
            content: "\f036"
        }

        .fa-align-center:before {
            content: "\f037"
        }

        .fa-align-right:before {
            content: "\f038"
        }

        .fa-align-justify:before {
            content: "\f039"
        }

        .fa-list:before {
            content: "\f03a"
        }

        .fa-dedent:before, .fa-outdent:before {
            content: "\f03b"
        }

        .fa-indent:before {
            content: "\f03c"
        }

        .fa-video-camera:before {
            content: "\f03d"
        }

        .fa-photo:before, .fa-image:before, .fa-picture-o:before {
            content: "\f03e"
        }

        .fa-pencil:before {
            content: "\f040"
        }

        .fa-map-marker:before {
            content: "\f041"
        }

        .fa-adjust:before {
            content: "\f042"
        }

        .fa-tint:before {
            content: "\f043"
        }

        .fa-edit:before, .fa-pencil-square-o:before {
            content: "\f044"
        }

        .fa-share-square-o:before {
            content: "\f045"
        }

        .fa-check-square-o:before {
            content: "\f046"
        }

        .fa-arrows:before {
            content: "\f047"
        }

        .fa-step-backward:before {
            content: "\f048"
        }

        .fa-fast-backward:before {
            content: "\f049"
        }

        .fa-backward:before {
            content: "\f04a"
        }

        .fa-play:before {
            content: "\f04b"
        }

        .fa-pause:before {
            content: "\f04c"
        }

        .fa-stop:before {
            content: "\f04d"
        }

        .fa-forward:before {
            content: "\f04e"
        }

        .fa-fast-forward:before {
            content: "\f050"
        }

        .fa-step-forward:before {
            content: "\f051"
        }

        .fa-eject:before {
            content: "\f052"
        }

        .fa-chevron-left:before {
            content: "\f053"
        }

        .fa-chevron-right:before {
            content: "\f054"
        }

        .fa-plus-circle:before {
            content: "\f055"
        }

        .fa-minus-circle:before {
            content: "\f056"
        }

        .fa-times-circle:before {
            content: "\f057"
        }

        .fa-check-circle:before {
            content: "\f058"
        }

        .fa-question-circle:before {
            content: "\f059"
        }

        .fa-info-circle:before {
            content: "\f05a"
        }

        .fa-crosshairs:before {
            content: "\f05b"
        }

        .fa-times-circle-o:before {
            content: "\f05c"
        }

        .fa-check-circle-o:before {
            content: "\f05d"
        }

        .fa-ban:before {
            content: "\f05e"
        }

        .fa-arrow-left:before {
            content: "\f060"
        }

        .fa-arrow-right:before {
            content: "\f061"
        }

        .fa-arrow-up:before {
            content: "\f062"
        }

        .fa-arrow-down:before {
            content: "\f063"
        }

        .fa-mail-forward:before, .fa-share:before {
            content: "\f064"
        }

        .fa-expand:before {
            content: "\f065"
        }

        .fa-compress:before {
            content: "\f066"
        }

        .fa-plus:before {
            content: "\f067"
        }

        .fa-minus:before {
            content: "\f068"
        }

        .fa-asterisk:before {
            content: "\f069"
        }

        .fa-exclamation-circle:before {
            content: "\f06a"
        }

        .fa-gift:before {
            content: "\f06b"
        }

        .fa-leaf:before {
            content: "\f06c"
        }

        .fa-fire:before {
            content: "\f06d"
        }

        .fa-eye:before {
            content: "\f06e"
        }

        .fa-eye-slash:before {
            content: "\f070"
        }

        .fa-warning:before, .fa-exclamation-triangle:before {
            content: "\f071"
        }

        .fa-plane:before {
            content: "\f072"
        }

        .fa-calendar:before {
            content: "\f073"
        }

        .fa-random:before {
            content: "\f074"
        }

        .fa-comment:before {
            content: "\f075"
        }

        .fa-magnet:before {
            content: "\f076"
        }

        .fa-chevron-up:before {
            content: "\f077"
        }

        .fa-chevron-down:before {
            content: "\f078"
        }

        .fa-retweet:before {
            content: "\f079"
        }

        .fa-shopping-cart:before {
            content: "\f07a"
        }

        .fa-folder:before {
            content: "\f07b"
        }

        .fa-folder-open:before {
            content: "\f07c"
        }

        .fa-arrows-v:before {
            content: "\f07d"
        }

        .fa-arrows-h:before {
            content: "\f07e"
        }

        .fa-bar-chart-o:before, .fa-bar-chart:before {
            content: "\f080"
        }

        .fa-twitter-square:before {
            content: "\f081"
        }

        .fa-facebook-square:before {
            content: "\f082"
        }

        .fa-camera-retro:before {
            content: "\f083"
        }

        .fa-key:before {
            content: "\f084"
        }

        .fa-gears:before, .fa-cogs:before {
            content: "\f085"
        }

        .fa-comments:before {
            content: "\f086"
        }

        .fa-thumbs-o-up:before {
            content: "\f087"
        }

        .fa-thumbs-o-down:before {
            content: "\f088"
        }

        .fa-star-half:before {
            content: "\f089"
        }

        .fa-heart-o:before {
            content: "\f08a"
        }

        .fa-sign-out:before {
            content: "\f08b"
        }

        .fa-linkedin-square:before {
            content: "\f08c"
        }

        .fa-thumb-tack:before {
            content: "\f08d"
        }

        .fa-external-link:before {
            content: "\f08e"
        }

        .fa-sign-in:before {
            content: "\f090"
        }

        .fa-trophy:before {
            content: "\f091"
        }

        .fa-github-square:before {
            content: "\f092"
        }

        .fa-upload:before {
            content: "\f093"
        }

        .fa-lemon-o:before {
            content: "\f094"
        }

        .fa-phone:before {
            content: "\f095"
        }

        .fa-square-o:before {
            content: "\f096"
        }

        .fa-bookmark-o:before {
            content: "\f097"
        }

        .fa-phone-square:before {
            content: "\f098"
        }

        .fa-twitter:before {
            content: "\f099"
        }

        .fa-facebook-f:before, .fa-facebook:before {
            content: "\f09a"
        }

        .fa-github:before {
            content: "\f09b"
        }

        .fa-unlock:before {
            content: "\f09c"
        }

        .fa-credit-card:before {
            content: "\f09d"
        }

        .fa-rss:before {
            content: "\f09e"
        }

        .fa-hdd-o:before {
            content: "\f0a0"
        }

        .fa-bullhorn:before {
            content: "\f0a1"
        }

        .fa-bell:before {
            content: "\f0f3"
        }

        .fa-certificate:before {
            content: "\f0a3"
        }

        .fa-hand-o-right:before {
            content: "\f0a4"
        }

        .fa-hand-o-left:before {
            content: "\f0a5"
        }

        .fa-hand-o-up:before {
            content: "\f0a6"
        }

        .fa-hand-o-down:before {
            content: "\f0a7"
        }

        .fa-arrow-circle-left:before {
            content: "\f0a8"
        }

        .fa-arrow-circle-right:before {
            content: "\f0a9"
        }

        .fa-arrow-circle-up:before {
            content: "\f0aa"
        }

        .fa-arrow-circle-down:before {
            content: "\f0ab"
        }

        .fa-globe:before {
            content: "\f0ac"
        }

        .fa-wrench:before {
            content: "\f0ad"
        }

        .fa-tasks:before {
            content: "\f0ae"
        }

        .fa-filter:before {
            content: "\f0b0"
        }

        .fa-briefcase:before {
            content: "\f0b1"
        }

        .fa-arrows-alt:before {
            content: "\f0b2"
        }

        .fa-group:before, .fa-users:before {
            content: "\f0c0"
        }

        .fa-chain:before, .fa-link:before {
            content: "\f0c1"
        }

        .fa-cloud:before {
            content: "\f0c2"
        }

        .fa-flask:before {
            content: "\f0c3"
        }

        .fa-cut:before, .fa-scissors:before {
            content: "\f0c4"
        }

        .fa-copy:before, .fa-files-o:before {
            content: "\f0c5"
        }

        .fa-paperclip:before {
            content: "\f0c6"
        }

        .fa-save:before, .fa-floppy-o:before {
            content: "\f0c7"
        }

        .fa-square:before {
            content: "\f0c8"
        }

        .fa-navicon:before, .fa-reorder:before, .fa-bars:before {
            content: "\f0c9"
        }

        .fa-list-ul:before {
            content: "\f0ca"
        }

        .fa-list-ol:before {
            content: "\f0cb"
        }

        .fa-strikethrough:before {
            content: "\f0cc"
        }

        .fa-underline:before {
            content: "\f0cd"
        }

        .fa-table:before {
            content: "\f0ce"
        }

        .fa-magic:before {
            content: "\f0d0"
        }

        .fa-truck:before {
            content: "\f0d1"
        }

        .fa-pinterest:before {
            content: "\f0d2"
        }

        .fa-pinterest-square:before {
            content: "\f0d3"
        }

        .fa-google-plus-square:before {
            content: "\f0d4"
        }

        .fa-google-plus:before {
            content: "\f0d5"
        }

        .fa-money:before {
            content: "\f0d6"
        }

        .fa-caret-down:before {
            content: "\f0d7"
        }

        .fa-caret-up:before {
            content: "\f0d8"
        }

        .fa-caret-left:before {
            content: "\f0d9"
        }

        .fa-caret-right:before {
            content: "\f0da"
        }

        .fa-columns:before {
            content: "\f0db"
        }

        .fa-unsorted:before, .fa-sort:before {
            content: "\f0dc"
        }

        .fa-sort-down:before, .fa-sort-desc:before {
            content: "\f0dd"
        }

        .fa-sort-up:before, .fa-sort-asc:before {
            content: "\f0de"
        }

        .fa-envelope:before {
            content: "\f0e0"
        }

        .fa-linkedin:before {
            content: "\f0e1"
        }

        .fa-rotate-left:before, .fa-undo:before {
            content: "\f0e2"
        }

        .fa-legal:before, .fa-gavel:before {
            content: "\f0e3"
        }

        .fa-dashboard:before, .fa-tachometer:before {
            content: "\f0e4"
        }

        .fa-comment-o:before {
            content: "\f0e5"
        }

        .fa-comments-o:before {
            content: "\f0e6"
        }

        .fa-flash:before, .fa-bolt:before {
            content: "\f0e7"
        }

        .fa-sitemap:before {
            content: "\f0e8"
        }

        .fa-umbrella:before {
            content: "\f0e9"
        }

        .fa-paste:before, .fa-clipboard:before {
            content: "\f0ea"
        }

        .fa-lightbulb-o:before {
            content: "\f0eb"
        }

        .fa-exchange:before {
            content: "\f0ec"
        }

        .fa-cloud-download:before {
            content: "\f0ed"
        }

        .fa-cloud-upload:before {
            content: "\f0ee"
        }

        .fa-user-md:before {
            content: "\f0f0"
        }

        .fa-stethoscope:before {
            content: "\f0f1"
        }

        .fa-suitcase:before {
            content: "\f0f2"
        }

        .fa-bell-o:before {
            content: "\f0a2"
        }

        .fa-coffee:before {
            content: "\f0f4"
        }

        .fa-cutlery:before {
            content: "\f0f5"
        }

        .fa-file-text-o:before {
            content: "\f0f6"
        }

        .fa-building-o:before {
            content: "\f0f7"
        }

        .fa-hospital-o:before {
            content: "\f0f8"
        }

        .fa-ambulance:before {
            content: "\f0f9"
        }

        .fa-medkit:before {
            content: "\f0fa"
        }

        .fa-fighter-jet:before {
            content: "\f0fb"
        }

        .fa-beer:before {
            content: "\f0fc"
        }

        .fa-h-square:before {
            content: "\f0fd"
        }

        .fa-plus-square:before {
            content: "\f0fe"
        }

        .fa-angle-double-left:before {
            content: "\f100"
        }

        .fa-angle-double-right:before {
            content: "\f101"
        }

        .fa-angle-double-up:before {
            content: "\f102"
        }

        .fa-angle-double-down:before {
            content: "\f103"
        }

        .fa-angle-left:before {
            content: "\f104"
        }

        .fa-angle-right:before {
            content: "\f105"
        }

        .fa-angle-up:before {
            content: "\f106"
        }

        .fa-angle-down:before {
            content: "\f107"
        }

        .fa-desktop:before {
            content: "\f108"
        }

        .fa-laptop:before {
            content: "\f109"
        }

        .fa-tablet:before {
            content: "\f10a"
        }

        .fa-mobile-phone:before, .fa-mobile:before {
            content: "\f10b"
        }

        .fa-circle-o:before {
            content: "\f10c"
        }

        .fa-quote-left:before {
            content: "\f10d"
        }

        .fa-quote-right:before {
            content: "\f10e"
        }

        .fa-spinner:before {
            content: "\f110"
        }

        .fa-circle:before {
            content: "\f111"
        }

        .fa-mail-reply:before, .fa-reply:before {
            content: "\f112"
        }

        .fa-github-alt:before {
            content: "\f113"
        }

        .fa-folder-o:before {
            content: "\f114"
        }

        .fa-folder-open-o:before {
            content: "\f115"
        }

        .fa-smile-o:before {
            content: "\f118"
        }

        .fa-frown-o:before {
            content: "\f119"
        }

        .fa-meh-o:before {
            content: "\f11a"
        }

        .fa-gamepad:before {
            content: "\f11b"
        }

        .fa-keyboard-o:before {
            content: "\f11c"
        }

        .fa-flag-o:before {
            content: "\f11d"
        }

        .fa-flag-checkered:before {
            content: "\f11e"
        }

        .fa-terminal:before {
            content: "\f120"
        }

        .fa-code:before {
            content: "\f121"
        }

        .fa-mail-reply-all:before, .fa-reply-all:before {
            content: "\f122"
        }

        .fa-star-half-empty:before, .fa-star-half-full:before, .fa-star-half-o:before {
            content: "\f123"
        }

        .fa-location-arrow:before {
            content: "\f124"
        }

        .fa-crop:before {
            content: "\f125"
        }

        .fa-code-fork:before {
            content: "\f126"
        }

        .fa-unlink:before, .fa-chain-broken:before {
            content: "\f127"
        }

        .fa-question:before {
            content: "\f128"
        }

        .fa-info:before {
            content: "\f129"
        }

        .fa-exclamation:before {
            content: "\f12a"
        }

        .fa-superscript:before {
            content: "\f12b"
        }

        .fa-subscript:before {
            content: "\f12c"
        }

        .fa-eraser:before {
            content: "\f12d"
        }

        .fa-puzzle-piece:before {
            content: "\f12e"
        }

        .fa-microphone:before {
            content: "\f130"
        }

        .fa-microphone-slash:before {
            content: "\f131"
        }

        .fa-shield:before {
            content: "\f132"
        }

        .fa-calendar-o:before {
            content: "\f133"
        }

        .fa-fire-extinguisher:before {
            content: "\f134"
        }

        .fa-rocket:before {
            content: "\f135"
        }

        .fa-maxcdn:before {
            content: "\f136"
        }

        .fa-chevron-circle-left:before {
            content: "\f137"
        }

        .fa-chevron-circle-right:before {
            content: "\f138"
        }

        .fa-chevron-circle-up:before {
            content: "\f139"
        }

        .fa-chevron-circle-down:before {
            content: "\f13a"
        }

        .fa-html5:before {
            content: "\f13b"
        }

        .fa-css3:before {
            content: "\f13c"
        }

        .fa-anchor:before {
            content: "\f13d"
        }

        .fa-unlock-alt:before {
            content: "\f13e"
        }

        .fa-bullseye:before {
            content: "\f140"
        }

        .fa-ellipsis-h:before {
            content: "\f141"
        }

        .fa-ellipsis-v:before {
            content: "\f142"
        }

        .fa-rss-square:before {
            content: "\f143"
        }

        .fa-play-circle:before {
            content: "\f144"
        }

        .fa-ticket:before {
            content: "\f145"
        }

        .fa-minus-square:before {
            content: "\f146"
        }

        .fa-minus-square-o:before {
            content: "\f147"
        }

        .fa-level-up:before {
            content: "\f148"
        }

        .fa-level-down:before {
            content: "\f149"
        }

        .fa-check-square:before {
            content: "\f14a"
        }

        .fa-pencil-square:before {
            content: "\f14b"
        }

        .fa-external-link-square:before {
            content: "\f14c"
        }

        .fa-share-square:before {
            content: "\f14d"
        }

        .fa-compass:before {
            content: "\f14e"
        }

        .fa-toggle-down:before, .fa-caret-square-o-down:before {
            content: "\f150"
        }

        .fa-toggle-up:before, .fa-caret-square-o-up:before {
            content: "\f151"
        }

        .fa-toggle-right:before, .fa-caret-square-o-right:before {
            content: "\f152"
        }

        .fa-euro:before, .fa-eur:before {
            content: "\f153"
        }

        .fa-gbp:before {
            content: "\f154"
        }

        .fa-dollar:before, .fa-usd:before {
            content: "\f155"
        }

        .fa-rupee:before, .fa-inr:before {
            content: "\f156"
        }

        .fa-cny:before, .fa-rmb:before, .fa-yen:before, .fa-jpy:before {
            content: "\f157"
        }

        .fa-ruble:before, .fa-rouble:before, .fa-rub:before {
            content: "\f158"
        }

        .fa-won:before, .fa-krw:before {
            content: "\f159"
        }

        .fa-bitcoin:before, .fa-btc:before {
            content: "\f15a"
        }

        .fa-file:before {
            content: "\f15b"
        }

        .fa-file-text:before {
            content: "\f15c"
        }

        .fa-sort-alpha-asc:before {
            content: "\f15d"
        }

        .fa-sort-alpha-desc:before {
            content: "\f15e"
        }

        .fa-sort-amount-asc:before {
            content: "\f160"
        }

        .fa-sort-amount-desc:before {
            content: "\f161"
        }

        .fa-sort-numeric-asc:before {
            content: "\f162"
        }

        .fa-sort-numeric-desc:before {
            content: "\f163"
        }

        .fa-thumbs-up:before {
            content: "\f164"
        }

        .fa-thumbs-down:before {
            content: "\f165"
        }

        .fa-youtube-square:before {
            content: "\f166"
        }

        .fa-youtube:before {
            content: "\f167"
        }

        .fa-xing:before {
            content: "\f168"
        }

        .fa-xing-square:before {
            content: "\f169"
        }

        .fa-youtube-play:before {
            content: "\f16a"
        }

        .fa-dropbox:before {
            content: "\f16b"
        }

        .fa-stack-overflow:before {
            content: "\f16c"
        }

        .fa-instagram:before {
            content: "\f16d"
        }

        .fa-flickr:before {
            content: "\f16e"
        }

        .fa-adn:before {
            content: "\f170"
        }

        .fa-bitbucket:before {
            content: "\f171"
        }

        .fa-bitbucket-square:before {
            content: "\f172"
        }

        .fa-tumblr:before {
            content: "\f173"
        }

        .fa-tumblr-square:before {
            content: "\f174"
        }

        .fa-long-arrow-down:before {
            content: "\f175"
        }

        .fa-long-arrow-up:before {
            content: "\f176"
        }

        .fa-long-arrow-left:before {
            content: "\f177"
        }

        .fa-long-arrow-right:before {
            content: "\f178"
        }

        .fa-apple:before {
            content: "\f179"
        }

        .fa-windows:before {
            content: "\f17a"
        }

        .fa-android:before {
            content: "\f17b"
        }

        .fa-linux:before {
            content: "\f17c"
        }

        .fa-dribbble:before {
            content: "\f17d"
        }

        .fa-skype:before {
            content: "\f17e"
        }

        .fa-foursquare:before {
            content: "\f180"
        }

        .fa-trello:before {
            content: "\f181"
        }

        .fa-female:before {
            content: "\f182"
        }

        .fa-male:before {
            content: "\f183"
        }

        .fa-gittip:before, .fa-gratipay:before {
            content: "\f184"
        }

        .fa-sun-o:before {
            content: "\f185"
        }

        .fa-moon-o:before {
            content: "\f186"
        }

        .fa-archive:before {
            content: "\f187"
        }

        .fa-bug:before {
            content: "\f188"
        }

        .fa-vk:before {
            content: "\f189"
        }

        .fa-weibo:before {
            content: "\f18a"
        }

        .fa-renren:before {
            content: "\f18b"
        }

        .fa-pagelines:before {
            content: "\f18c"
        }

        .fa-stack-exchange:before {
            content: "\f18d"
        }

        .fa-arrow-circle-o-right:before {
            content: "\f18e"
        }

        .fa-arrow-circle-o-left:before {
            content: "\f190"
        }

        .fa-toggle-left:before, .fa-caret-square-o-left:before {
            content: "\f191"
        }

        .fa-dot-circle-o:before {
            content: "\f192"
        }

        .fa-wheelchair:before {
            content: "\f193"
        }

        .fa-vimeo-square:before {
            content: "\f194"
        }

        .fa-turkish-lira:before, .fa-try:before {
            content: "\f195"
        }

        .fa-plus-square-o:before {
            content: "\f196"
        }

        .fa-space-shuttle:before {
            content: "\f197"
        }

        .fa-slack:before {
            content: "\f198"
        }

        .fa-envelope-square:before {
            content: "\f199"
        }

        .fa-wordpress:before {
            content: "\f19a"
        }

        .fa-openid:before {
            content: "\f19b"
        }

        .fa-institution:before, .fa-bank:before, .fa-university:before {
            content: "\f19c"
        }

        .fa-mortar-board:before, .fa-graduation-cap:before {
            content: "\f19d"
        }

        .fa-yahoo:before {
            content: "\f19e"
        }

        .fa-google:before {
            content: "\f1a0"
        }

        .fa-reddit:before {
            content: "\f1a1"
        }

        .fa-reddit-square:before {
            content: "\f1a2"
        }

        .fa-stumbleupon-circle:before {
            content: "\f1a3"
        }

        .fa-stumbleupon:before {
            content: "\f1a4"
        }

        .fa-delicious:before {
            content: "\f1a5"
        }

        .fa-digg:before {
            content: "\f1a6"
        }

        .fa-pied-piper:before {
            content: "\f1a7"
        }

        .fa-pied-piper-alt:before {
            content: "\f1a8"
        }

        .fa-drupal:before {
            content: "\f1a9"
        }

        .fa-joomla:before {
            content: "\f1aa"
        }

        .fa-language:before {
            content: "\f1ab"
        }

        .fa-fax:before {
            content: "\f1ac"
        }

        .fa-building:before {
            content: "\f1ad"
        }

        .fa-child:before {
            content: "\f1ae"
        }

        .fa-paw:before {
            content: "\f1b0"
        }

        .fa-spoon:before {
            content: "\f1b1"
        }

        .fa-cube:before {
            content: "\f1b2"
        }

        .fa-cubes:before {
            content: "\f1b3"
        }

        .fa-behance:before {
            content: "\f1b4"
        }

        .fa-behance-square:before {
            content: "\f1b5"
        }

        .fa-steam:before {
            content: "\f1b6"
        }

        .fa-steam-square:before {
            content: "\f1b7"
        }

        .fa-recycle:before {
            content: "\f1b8"
        }

        .fa-automobile:before, .fa-car:before {
            content: "\f1b9"
        }

        .fa-cab:before, .fa-taxi:before {
            content: "\f1ba"
        }

        .fa-tree:before {
            content: "\f1bb"
        }

        .fa-spotify:before {
            content: "\f1bc"
        }

        .fa-deviantart:before {
            content: "\f1bd"
        }

        .fa-soundcloud:before {
            content: "\f1be"
        }

        .fa-database:before {
            content: "\f1c0"
        }

        .fa-file-pdf-o:before {
            content: "\f1c1"
        }

        .fa-file-word-o:before {
            content: "\f1c2"
        }

        .fa-file-excel-o:before {
            content: "\f1c3"
        }

        .fa-file-powerpoint-o:before {
            content: "\f1c4"
        }

        .fa-file-photo-o:before, .fa-file-picture-o:before, .fa-file-image-o:before {
            content: "\f1c5"
        }

        .fa-file-zip-o:before, .fa-file-archive-o:before {
            content: "\f1c6"
        }

        .fa-file-sound-o:before, .fa-file-audio-o:before {
            content: "\f1c7"
        }

        .fa-file-movie-o:before, .fa-file-video-o:before {
            content: "\f1c8"
        }

        .fa-file-code-o:before {
            content: "\f1c9"
        }

        .fa-vine:before {
            content: "\f1ca"
        }

        .fa-codepen:before {
            content: "\f1cb"
        }

        .fa-jsfiddle:before {
            content: "\f1cc"
        }

        .fa-life-bouy:before, .fa-life-buoy:before, .fa-life-saver:before, .fa-support:before, .fa-life-ring:before {
            content: "\f1cd"
        }

        .fa-circle-o-notch:before {
            content: "\f1ce"
        }

        .fa-ra:before, .fa-rebel:before {
            content: "\f1d0"
        }

        .fa-ge:before, .fa-empire:before {
            content: "\f1d1"
        }

        .fa-git-square:before {
            content: "\f1d2"
        }

        .fa-git:before {
            content: "\f1d3"
        }

        .fa-hacker-news:before {
            content: "\f1d4"
        }

        .fa-tencent-weibo:before {
            content: "\f1d5"
        }

        .fa-qq:before {
            content: "\f1d6"
        }

        .fa-wechat:before, .fa-weixin:before {
            content: "\f1d7"
        }

        .fa-send:before, .fa-paper-plane:before {
            content: "\f1d8"
        }

        .fa-send-o:before, .fa-paper-plane-o:before {
            content: "\f1d9"
        }

        .fa-history:before {
            content: "\f1da"
        }

        .fa-genderless:before, .fa-circle-thin:before {
            content: "\f1db"
        }

        .fa-header:before {
            content: "\f1dc"
        }

        .fa-paragraph:before {
            content: "\f1dd"
        }

        .fa-sliders:before {
            content: "\f1de"
        }

        .fa-share-alt:before {
            content: "\f1e0"
        }

        .fa-share-alt-square:before {
            content: "\f1e1"
        }

        .fa-bomb:before {
            content: "\f1e2"
        }

        .fa-soccer-ball-o:before, .fa-futbol-o:before {
            content: "\f1e3"
        }

        .fa-tty:before {
            content: "\f1e4"
        }

        .fa-binoculars:before {
            content: "\f1e5"
        }

        .fa-plug:before {
            content: "\f1e6"
        }

        .fa-slideshare:before {
            content: "\f1e7"
        }

        .fa-twitch:before {
            content: "\f1e8"
        }

        .fa-yelp:before {
            content: "\f1e9"
        }

        .fa-newspaper-o:before {
            content: "\f1ea"
        }

        .fa-wifi:before {
            content: "\f1eb"
        }

        .fa-calculator:before {
            content: "\f1ec"
        }

        .fa-paypal:before {
            content: "\f1ed"
        }

        .fa-google-wallet:before {
            content: "\f1ee"
        }

        .fa-cc-visa:before {
            content: "\f1f0"
        }

        .fa-cc-mastercard:before {
            content: "\f1f1"
        }

        .fa-cc-discover:before {
            content: "\f1f2"
        }

        .fa-cc-amex:before {
            content: "\f1f3"
        }

        .fa-cc-paypal:before {
            content: "\f1f4"
        }

        .fa-cc-stripe:before {
            content: "\f1f5"
        }

        .fa-bell-slash:before {
            content: "\f1f6"
        }

        .fa-bell-slash-o:before {
            content: "\f1f7"
        }

        .fa-trash:before {
            content: "\f1f8"
        }

        .fa-copyright:before {
            content: "\f1f9"
        }

        .fa-at:before {
            content: "\f1fa"
        }

        .fa-eyedropper:before {
            content: "\f1fb"
        }

        .fa-paint-brush:before {
            content: "\f1fc"
        }

        .fa-birthday-cake:before {
            content: "\f1fd"
        }

        .fa-area-chart:before {
            content: "\f1fe"
        }

        .fa-pie-chart:before {
            content: "\f200"
        }

        .fa-line-chart:before {
            content: "\f201"
        }

        .fa-lastfm:before {
            content: "\f202"
        }

        .fa-lastfm-square:before {
            content: "\f203"
        }

        .fa-toggle-off:before {
            content: "\f204"
        }

        .fa-toggle-on:before {
            content: "\f205"
        }

        .fa-bicycle:before {
            content: "\f206"
        }

        .fa-bus:before {
            content: "\f207"
        }

        .fa-ioxhost:before {
            content: "\f208"
        }

        .fa-angellist:before {
            content: "\f209"
        }

        .fa-cc:before {
            content: "\f20a"
        }

        .fa-shekel:before, .fa-sheqel:before, .fa-ils:before {
            content: "\f20b"
        }

        .fa-meanpath:before {
            content: "\f20c"
        }

        .fa-buysellads:before {
            content: "\f20d"
        }

        .fa-connectdevelop:before {
            content: "\f20e"
        }

        .fa-dashcube:before {
            content: "\f210"
        }

        .fa-forumbee:before {
            content: "\f211"
        }

        .fa-leanpub:before {
            content: "\f212"
        }

        .fa-sellsy:before {
            content: "\f213"
        }

        .fa-shirtsinbulk:before {
            content: "\f214"
        }

        .fa-simplybuilt:before {
            content: "\f215"
        }

        .fa-skyatlas:before {
            content: "\f216"
        }

        .fa-cart-plus:before {
            content: "\f217"
        }

        .fa-cart-arrow-down:before {
            content: "\f218"
        }

        .fa-diamond:before {
            content: "\f219"
        }

        .fa-ship:before {
            content: "\f21a"
        }

        .fa-user-secret:before {
            content: "\f21b"
        }

        .fa-motorcycle:before {
            content: "\f21c"
        }

        .fa-street-view:before {
            content: "\f21d"
        }

        .fa-heartbeat:before {
            content: "\f21e"
        }

        .fa-venus:before {
            content: "\f221"
        }

        .fa-mars:before {
            content: "\f222"
        }

        .fa-mercury:before {
            content: "\f223"
        }

        .fa-transgender:before {
            content: "\f224"
        }

        .fa-transgender-alt:before {
            content: "\f225"
        }

        .fa-venus-double:before {
            content: "\f226"
        }

        .fa-mars-double:before {
            content: "\f227"
        }

        .fa-venus-mars:before {
            content: "\f228"
        }

        .fa-mars-stroke:before {
            content: "\f229"
        }

        .fa-mars-stroke-v:before {
            content: "\f22a"
        }

        .fa-mars-stroke-h:before {
            content: "\f22b"
        }

        .fa-neuter:before {
            content: "\f22c"
        }

        .fa-facebook-official:before {
            content: "\f230"
        }

        .fa-pinterest-p:before {
            content: "\f231"
        }

        .fa-whatsapp:before {
            content: "\f232"
        }

        .fa-server:before {
            content: "\f233"
        }

        .fa-user-plus:before {
            content: "\f234"
        }

        .fa-user-times:before {
            content: "\f235"
        }

        .fa-hotel:before, .fa-bed:before {
            content: "\f236"
        }

        .fa-viacoin:before {
            content: "\f237"
        }

        .fa-train:before {
            content: "\f238"
        }

        .fa-subway:before {
            content: "\f239"
        }

        .fa-medium:before {
            content: "\f23a"
        }

        #sf-sidebar li:hover span[class*='fa-'] {
            opacity: 1 !important;
        }

        @media screen and (max-width: 782px) {
            #sf-mob-navbar {
                display: none;
                height: 62px;
                width: 100%;
                -webkit-backface-visibility: hidden;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 100000000;
                text-align: center;
                -webkit-transition: all 0.4s cubic-bezier(0.215, 0.061, 0.355, 1);
                -moz-transition: all 0.4s cubic-bezier(0.215, 0.061, 0.355, 1);
                -ms-transition: all 0.4s cubic-bezier(0.215, 0.061, 0.355, 1);
                -o-transition: all 0.4s cubic-bezier(0.215, 0.061, 0.355, 1);
                transition: all 0.4s cubic-bezier(0.215, 0.061, 0.355, 1);
                -webkit-transition-delay: .05s;
                transition-delay: .05s;
            }

            #sf-sidebar .sf-rollback {
                display: none !important;
            }

            .superfly-on #sf-mob-navbar {
                display: block;
            }

            .sf-mob-nav .sf-rollback {
                display: none !important;
            }

            .sf-mob-nav {
                margin-top: 62px !important;
            }

            #sf-mob-navbar a {
                display: inline-block;
                min-width: 100px;
            }

            #sf-mob-navbar img {
                height: 50px;
                display: inline-block;
                margin-top: 6px;
            }

            #sf-mob-navbar .sf-navicon-button {
                position: absolute;
                left: 0;
                top: 0;
                padding: 30px 24px;
            }

            .sf-pos-right #sf-mob-navbar .sf-navicon-button {
                right: 0;
                left: auto;
            }

            .sf-navicon-button:after {
                font-size: 18px !important;
            }
        }
    </style>


    <noscript>
        <style id="rocket-lazyload-nojs-css">.rll-youtube-player, [data-lazy-src] {
                display: none !important;
            }</style>
    </noscript>
</head>

<body data-rsssl=1 class="home blog class-name">
<div id="page">
    <header class="version_2">
        <div class="layer"></div><!-- Mobile menu overlay mask -->
        <div class="main_header Sticky" style="background-color: #361601">

            <div class="container">
                <div class="row small-gutters">

                    <div class="col-12 col-sm-4 col-md-4 d-lg-flex align-items-center">
                        <div class="slogan"></div>
                    </div>

                    <div class="col-3 col-sm-4 col-md-4 d-lg-flex align-items-center hd">
                        <div id="logo">
                            <a class="main-logo" href='https://baliabishahotels.com'>
                                <img
                                    src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                                    alt="Bali Abisha Hotel" data-lazy-src="{{asset('image/abisha_head_banner.png')}}"/>
                                <noscript><img
                                        src="https://balihillstonevillas.com/wp-content/themes/hilstone/img/hillstone.jpg"
                                        alt="Bali Hillstone Villas"/></noscript>
                            </a>
                        </div>


                    </div>
                    <div class="col-12 col-sm-4 col-md-4 d-lg-flex align-items-center justify-content-end text-right">
                        <div class="phone_header">
                            <span class="layanan"> </span> <span class="icons">  <div class="follow_us">
    <ul>
    <li>
        <a target="_blank" href="https://api.whatsapp.com/send?phone=6281353254589"><img src=""
                                                                                     data-src="{{asset('image/wa.png')}}"
                                                                                     class="lazy"></a>
    </li>


        <li><a target="_blank" href="http://www.instagram.com/abishahoteljimbaran"><img
                    data-src="{{asset('image/instagram.png')}}" alt="" class="lazy"></a></li>

    </ul>
</div>
                </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
    <div id="about" class="text-center pt-5">
        <div class="tectbox1 ">
            <h1 style="font-size: 60px"><b>Bali Abisha Hotel</b></h1>
            <h1>Your Getaway Bizcation in Bali</h1>
        </div>
    </div>
<main>
    <div id="carousel-home" class="row">
        <div class="owl-carousel owl-theme col-6">
            <div data-bg="{{asset('image/photos/DSC09769.jpg')}}"
                 class="owl-slide cover rocket-lazyload" style="">
                <div class="opacity-mask bgmask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                    <div class="container">
                        <div class="row justify-content-md-center text-center">
                            <div class="col-lg-12 topjudul" style="font-size: 50px"><b>SANUR</b></div>
                            <div class="col-lg-8 static">
                                <div class="slide-text  white">

                                    <p class="owl-slide-animated owl-slide-subtitle">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-bg="{{asset('image/photos/kamar.jpg')}}"
                 class="owl-slide cover rocket-lazyload" style="">
                <div class="opacity-mask bgmask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                    <div class="container">
                        <div class="row justify-content-md-center text-center">
                            <div class="col-lg-12 topjudul" style="font-size: 50px"><b>SANUR</b></div>
                            <div class="col-lg-8 static">
                                <div class="slide-text  white">

                                    <p class="owl-slide-animated owl-slide-subtitle">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme col-6">
            <div data-bg="{{asset('image/photos/DSC09729EE.jpg')}}"
                 class="owl-slide cover rocket-lazyload" style="">
                <div class="opacity-mask bgmask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                    <div class="container">
                        <div class="row justify-content-md-center text-center">
                            <div class="col-lg-12 topjudul" style="font-size: 50px"><b>JIMBARAN</b></div>
                            <div class="col-lg-8 static">
                                <div class="slide-text  white">

                                    <p class="owl-slide-animated owl-slide-subtitle">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-bg="{{asset('image/photos/aula.jpg')}}"
                 class="owl-slide cover rocket-lazyload" style="">
                <div class="opacity-mask bgmask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                    <div class="container">
                        <div class="row justify-content-md-center text-center">
                            <div class="col-lg-12 topjudul" style="font-size: 50px"><b>JIMBARAN</b></div>
                            <div class="col-lg-8 static">
                                <div class="slide-text  white">

                                    <p class="owl-slide-animated owl-slide-subtitle">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="icon_drag_mobile"></div>
</main>

</div>

<div id="villa-type" class="top_banner">
    <div class="opacity-mask d-flex align-items-center">
        <div class="container">
            <h1>Our Villas Collection</h1>
        </div>
    </div>
</div>
<div id="Bliss" class="main_title">
    <h2>Bliss</h2>
    <h4> 3 Bedroom Private Pool Villa</h4>
</div>
<div data-bg="https://balihillstonevillas.com/wp-content/uploads/2022/07/chateau-de-bali_3bed-poolvilla-36-copy.jpg"
     class="imgbg1 rocket-lazyload" style=""></div>

<div>
    <div id="jig1" class="justified-image-grid jig-58d11a5019626c891ccd65d381be89d2 jig-preset-global">
        <div class="jig-clearfix"></div>
        <noscript id="jig1-html" class="justified-image-grid-html" data-lazy-src="skiplazyload"
                  data-src="skipunveillazyload">
            <ul>
                <li>
                    <a href="https://balihillstonevillas.com/wp-content/uploads/2022/07/chateau-de-bali_3bed-poolvilla-24-copy.jpg"><img
                            src="https://balihillstonevillas.com/wp-content/plugins/justified-image-grid/timthumb.php?src=https%3A%2F%2Fbalihillstonevillas.com%2Fwp-content%2Fuploads%2F2022%2F07%2Fchateau-de-bali_3bed-poolvilla-24-copy.jpg&amp;h=260&amp;w=347&amp;q=90&amp;f=.jpg"
                            alt="chateau-de-bali_3bed-poolvilla-(24)-copy" width="347" height="260"/></a>
                    <p class="jig-HTMLdescription">chateau-de-bali_3bed-poolvilla-(24)-copy<br/></p></li>
                <li>
                    <a href="https://balihillstonevillas.com/wp-content/uploads/2022/07/chateau-de-bali_3bed-poolvilla-1024x641.jpg"><img
                            src="https://balihillstonevillas.com/wp-content/plugins/justified-image-grid/timthumb.php?src=https%3A%2F%2Fbalihillstonevillas.com%2Fwp-content%2Fuploads%2F2022%2F07%2Fchateau-de-bali_3bed-poolvilla-1024x641.jpg&amp;h=260&amp;w=347&amp;q=90&amp;f=.jpg"
                            alt="chateau de bali_3bed poolvilla" width="347" height="260"/></a>
                    <p class="jig-HTMLdescription">chateau de bali_3bed poolvilla<br/></p></li>
                <li><a href="https://balihillstonevillas.com/wp-content/uploads/2022/07/Villa-Bathroom-1.jpg"><img
                            src="https://balihillstonevillas.com/wp-content/plugins/justified-image-grid/timthumb.php?src=https%3A%2F%2Fbalihillstonevillas.com%2Fwp-content%2Fuploads%2F2022%2F07%2FVilla-Bathroom-1.jpg&amp;h=260&amp;w=347&amp;q=90&amp;f=.jpg"
                            alt="Villa-Bathroom" width="347" height="260"/></a>
                    <p class="jig-HTMLdescription">Villa-Bathroom<br/></p></li>
                <li>
                    <a href="https://balihillstonevillas.com/wp-content/uploads/2022/07/chateau-de-bali_3bed-poolvilla-33-copy.jpg"><img
                            src="https://balihillstonevillas.com/wp-content/plugins/justified-image-grid/timthumb.php?src=https%3A%2F%2Fbalihillstonevillas.com%2Fwp-content%2Fuploads%2F2022%2F07%2Fchateau-de-bali_3bed-poolvilla-33-copy.jpg&amp;h=260&amp;w=347&amp;q=90&amp;f=.jpg"
                            alt="chateau-de-bali_3bed-poolvilla-(33)-copy" width="347" height="260"/></a>
                    <p class="jig-HTMLdescription">chateau-de-bali_3bed-poolvilla-(33)-copy<br/></p></li>
            </ul>
        </noscript>
    </div>
</div>


<div class="tectbox margin_30">
    <div class="row">

        <div class="col-md-6">
            <div class="ss">
                <h2>Bliss - View 360</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut aliquet tortor. Vestibulum nec
                    odio quis nunc sodales mattis. Morbi maximus dolor velit, hendrerit egestas arcu cursus tempor.</p>
            </div>
        </div>


        <div class="col-md-6 box ">
            <div>
                <style>#pano134 div.pnlm-hotspot-base.fas,
                    #pano134 div.pnlm-hotspot-base.fab,
                    #pano134 div.pnlm-hotspot-base.fa,
                    #pano134 div.pnlm-hotspot-base.far {
                        display: block !important;
                        background-color: #00b4ff;
                        color: #fff;
                        border-radius: 100%;
                        width: 30px;
                        height: 30px;
                        animation: icon-pulsepano134 1.5s infinite cubic-bezier(.25, 0, 0, 1);
                    }

                    @-webkit-keyframes icon-pulsepano134 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    @keyframes icon-pulsepano134 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    #pano134 div.pnlm-orientation-button {
                        display: none;
                    }</style>
                <div id="pano134" class="pano-wrap"
                     style=" text-align:center; max-width:100%; width: 600px; height: 400px; margin: 0 auto; direction:ltr;">
                    <div class="explainer" id="explainer134" style="display: none"><span
                            class="close-explainer-video"><i class="fa fa-times"></i></span></div>
                    <div class="wpvr-hotspot-tweak-contents-wrapper" style="display: none"><i class="fa fa-times cross"
                                                                                              data-id="134"></i>
                        <div class="wpvr-hotspot-tweak-contents-flex">
                            <div class="wpvr-hotspot-tweak-contents"></div>
                        </div>
                    </div>
                    <div class="custom-ifram-wrapper" style="display: none;"><i class="fa fa-times cross"
                                                                                data-id="134"></i>
                        <div class="custom-ifram-flex">
                            <div class="custom-ifram"></div>
                        </div>
                    </div>
                </div>
                <script type="rocketlazyloadscript">window.addEventListener('DOMContentLoaded', function() {jQuery(document).ready(function() {var response = [{"panoid":"pano134"},{"autoLoad":false,"showControls":true,"orientationSupport":"false","compass":false,"orientationOnByDefault":false,"mouseZoom":true,"draggable":true,"disableKeyboardCtrl":false,"keyboardZoom":true,"preview":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/IMG_20220617_211321_973-scaled.jpg","autoRotate":"-5","default":{"firstScene":"1","sceneFadeDuration":""},"scenes":{"1":{"type":"equirectangular","panorama":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/IMG_20220617_211321_973-scaled.jpg","pitch":null,"yaw":null,"hfov":100,"maxHfov":120,"minHfov":50,"vaov":180,"haov":360,"hotSpots":[]}}}];var scenes = response[1];if(scenes) {var scenedata = scenes.scenes;for(var i in scenedata) {var scenehotspot = scenedata[i].hotSpots;for(var i = 0; i < scenehotspot.length; i++) {if(scenehotspot[i]["clickHandlerArgs"] != "") {scenehotspot[i]["clickHandlerFunc"] = wpvrhotspot;}if(scenehotspot[i]["createTooltipArgs"] != "") {scenehotspot[i]["createTooltipFunc"] = wpvrtooltip;}}}}var panoshow134 = pannellum.viewer(response[0]["panoid"], scenes);panoshow134.on("load", function (){
            setTimeout(() => {
                window.dispatchEvent(new Event("resize"));
            }, 200);
						if (jQuery("#pano134").children().children(".pnlm-panorama-info:visible").length > 0) {
	               jQuery("#controls134").css("bottom", "55px");
	           }
	           else {
	             jQuery("#controls134").css("bottom", "5px");
	           }
					});panoshow134.on("render", function (){
              window.dispatchEvent(new Event("resize"));
            });
					if (scenes.autoRotate) {
						panoshow134.on("load", function (){
						 setTimeout(function(){ panoshow134.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
						panoshow134.on("scenechange", function (){
						 setTimeout(function(){ panoshow134.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
					}
					var touchtime = 0;
            jQuery(document).on("click","#explainer_button_134",function() {
                jQuery("#explainer134").slideToggle();
            });

            jQuery(document).on("click",".close-explainer-video",function() {
                jQuery(this).parent(".explainer").hide();
                var el_src = jQuery(".vr-iframe").attr("src");
                jQuery(".vr-iframe").attr("src", el_src);
              });


		          jQuery(document).ready(function($){
		              jQuery("#sccontrols134").hide();
                      jQuery(".wpvr_slider_nav").hide();
		              jQuery(".vrgctrl134").html('<i class="fa fa-angle-up"></i>');
		          });

		          var slide134 = "down";
		          jQuery(document).on("click","#vrgcontrols134",function() {

		            if (slide134 == "up") {
		              jQuery(".vrgctrl134").empty();
		              jQuery(".vrgctrl134").html('<i class="fa fa-angle-up"></i>');
		              slide134 = "down";
		            }
		            else {
		              jQuery(".vrgctrl134").empty();
		              jQuery(".vrgctrl134").html('<i class="fa fa-angle-down"></i>');
		              slide134 = "up";
		            }
                    jQuery(".wpvr_slider_nav").slideToggle();
		            jQuery("#sccontrols134").slideToggle();
		          });

                jQuery(document).ready(function(){
                    jQuery("#controls134").hide();
                    jQuery("#zoom-in-out-controls134").hide();
                    jQuery("#adcontrol134").hide();
                    jQuery("#pano134").find(".pnlm-panorama-info").hide();
                });

            panoshow134.on("load", function (){
                    jQuery("#controls134").show();
                    jQuery("#zoom-in-out-controls134").show();
                    jQuery("#adcontrol134").show();
                    jQuery("#pano134").find(".pnlm-panorama-info").show();
            });
            jQuery(".elementor-tab-title").click(function(){
                      var element_id;
                      var pano_id;
                      var element_id = this.id;
                      element_id = element_id.split("-");
                      element_id = element_id[3];
                      jQuery("#elementor-tab-content-"+element_id).children("div").addClass("awwww");
                      var pano_id = jQuery(".awwww").attr("id");
                      jQuery("#elementor-tab-content-"+element_id).children("div").removeClass("awwww");
                      if (pano_id != undefined) {
                        pano_id = pano_id.split("o");
                        pano_id = pano_id[1];
                        if (pano_id == "134") {
                          jQuery("#pano134").children(".pnlm-render-container").remove();
                          jQuery("#pano134").children(".pnlm-ui").remove();
                          panoshow134 = pannellum.viewer(response[0]["panoid"], scenes);
                          jQuery("#pano134").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
                          setTimeout(function() {
                                //   panoshow134.loadScene("1");
                                  window.dispatchEvent(new Event("resize"));
                                  if (jQuery("#pano134").children().children(".pnlm-panorama-info:visible").length > 0) {
                                       jQuery("#controls134").css("bottom", "55px");
                                   }
                                   else {
                                     jQuery("#controls134").css("bottom", "5px");
                                   }

                          }, 200);
                        }
                      }
            });

            jQuery(".geodir-tab-head dd, #vr-tour-tab").click(function(){
              jQuery("#pano134").children(".pnlm-render-container").remove();
              jQuery("#pano134").children(".pnlm-ui").remove();
              panoshow134 = pannellum.viewer(response[0]["panoid"], scenes);
              setTimeout(function() {
                      panoshow134.loadScene("1");
                      window.dispatchEvent(new Event("resize"));
                      if (jQuery("#pano134").children().children(".pnlm-panorama-info:visible").length > 0) {
                           jQuery("#controls134").css("bottom", "55px");
                       }
                       else {
                         jQuery("#controls134").css("bottom", "5px");
                       }
              }, 200);
            });

            jQuery("#pano134").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
            });});
                </script>
            </div>
            <div class="title">Pool & Garden</div>
        </div>
        <div class="col-md-6 box ">
            <div>
                <style>#pano135 div.pnlm-hotspot-base.fas,
                    #pano135 div.pnlm-hotspot-base.fab,
                    #pano135 div.pnlm-hotspot-base.fa,
                    #pano135 div.pnlm-hotspot-base.far {
                        display: block !important;
                        background-color: #00b4ff;
                        color: #fff;
                        border-radius: 100%;
                        width: 30px;
                        height: 30px;
                        animation: icon-pulsepano135 1.5s infinite cubic-bezier(.25, 0, 0, 1);
                    }

                    @-webkit-keyframes icon-pulsepano135 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    @keyframes icon-pulsepano135 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    #pano135 div.pnlm-orientation-button {
                        display: none;
                    }</style>
                <div id="pano135" class="pano-wrap"
                     style=" text-align:center; max-width:100%; width: 600px; height: 400px; margin: 0 auto; direction:ltr;">
                    <div class="explainer" id="explainer135" style="display: none"><span
                            class="close-explainer-video"><i class="fa fa-times"></i></span></div>
                    <div class="wpvr-hotspot-tweak-contents-wrapper" style="display: none"><i class="fa fa-times cross"
                                                                                              data-id="135"></i>
                        <div class="wpvr-hotspot-tweak-contents-flex">
                            <div class="wpvr-hotspot-tweak-contents"></div>
                        </div>
                    </div>
                    <div class="custom-ifram-wrapper" style="display: none;"><i class="fa fa-times cross"
                                                                                data-id="135"></i>
                        <div class="custom-ifram-flex">
                            <div class="custom-ifram"></div>
                        </div>
                    </div>
                </div>
                <script type="rocketlazyloadscript">window.addEventListener('DOMContentLoaded', function() {jQuery(document).ready(function() {var response = [{"panoid":"pano135"},{"autoLoad":false,"showControls":true,"orientationSupport":"false","compass":false,"orientationOnByDefault":false,"mouseZoom":true,"draggable":true,"disableKeyboardCtrl":false,"keyboardZoom":true,"preview":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Dining-Room-Kitchen.jpg","autoRotate":"-5","default":{"firstScene":"1","sceneFadeDuration":""},"scenes":{"1":{"type":"equirectangular","panorama":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Dining-Room-Kitchen.jpg","pitch":null,"yaw":null,"hfov":100,"maxHfov":120,"minHfov":50,"vaov":180,"haov":360,"hotSpots":[]}}}];var scenes = response[1];if(scenes) {var scenedata = scenes.scenes;for(var i in scenedata) {var scenehotspot = scenedata[i].hotSpots;for(var i = 0; i < scenehotspot.length; i++) {if(scenehotspot[i]["clickHandlerArgs"] != "") {scenehotspot[i]["clickHandlerFunc"] = wpvrhotspot;}if(scenehotspot[i]["createTooltipArgs"] != "") {scenehotspot[i]["createTooltipFunc"] = wpvrtooltip;}}}}var panoshow135 = pannellum.viewer(response[0]["panoid"], scenes);panoshow135.on("load", function (){
            setTimeout(() => {
                window.dispatchEvent(new Event("resize"));
            }, 200);
						if (jQuery("#pano135").children().children(".pnlm-panorama-info:visible").length > 0) {
	               jQuery("#controls135").css("bottom", "55px");
	           }
	           else {
	             jQuery("#controls135").css("bottom", "5px");
	           }
					});panoshow135.on("render", function (){
              window.dispatchEvent(new Event("resize"));
            });
					if (scenes.autoRotate) {
						panoshow135.on("load", function (){
						 setTimeout(function(){ panoshow135.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
						panoshow135.on("scenechange", function (){
						 setTimeout(function(){ panoshow135.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
					}
					var touchtime = 0;
            jQuery(document).on("click","#explainer_button_135",function() {
                jQuery("#explainer135").slideToggle();
            });

            jQuery(document).on("click",".close-explainer-video",function() {
                jQuery(this).parent(".explainer").hide();
                var el_src = jQuery(".vr-iframe").attr("src");
                jQuery(".vr-iframe").attr("src", el_src);
              });


		          jQuery(document).ready(function($){
		              jQuery("#sccontrols135").hide();
                      jQuery(".wpvr_slider_nav").hide();
		              jQuery(".vrgctrl135").html('<i class="fa fa-angle-up"></i>');
		          });

		          var slide135 = "down";
		          jQuery(document).on("click","#vrgcontrols135",function() {

		            if (slide135 == "up") {
		              jQuery(".vrgctrl135").empty();
		              jQuery(".vrgctrl135").html('<i class="fa fa-angle-up"></i>');
		              slide135 = "down";
		            }
		            else {
		              jQuery(".vrgctrl135").empty();
		              jQuery(".vrgctrl135").html('<i class="fa fa-angle-down"></i>');
		              slide135 = "up";
		            }
                    jQuery(".wpvr_slider_nav").slideToggle();
		            jQuery("#sccontrols135").slideToggle();
		          });

                jQuery(document).ready(function(){
                    jQuery("#controls135").hide();
                    jQuery("#zoom-in-out-controls135").hide();
                    jQuery("#adcontrol135").hide();
                    jQuery("#pano135").find(".pnlm-panorama-info").hide();
                });

            panoshow135.on("load", function (){
                    jQuery("#controls135").show();
                    jQuery("#zoom-in-out-controls135").show();
                    jQuery("#adcontrol135").show();
                    jQuery("#pano135").find(".pnlm-panorama-info").show();
            });
            jQuery(".elementor-tab-title").click(function(){
                      var element_id;
                      var pano_id;
                      var element_id = this.id;
                      element_id = element_id.split("-");
                      element_id = element_id[3];
                      jQuery("#elementor-tab-content-"+element_id).children("div").addClass("awwww");
                      var pano_id = jQuery(".awwww").attr("id");
                      jQuery("#elementor-tab-content-"+element_id).children("div").removeClass("awwww");
                      if (pano_id != undefined) {
                        pano_id = pano_id.split("o");
                        pano_id = pano_id[1];
                        if (pano_id == "135") {
                          jQuery("#pano135").children(".pnlm-render-container").remove();
                          jQuery("#pano135").children(".pnlm-ui").remove();
                          panoshow135 = pannellum.viewer(response[0]["panoid"], scenes);
                          jQuery("#pano135").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
                          setTimeout(function() {
                                //   panoshow135.loadScene("1");
                                  window.dispatchEvent(new Event("resize"));
                                  if (jQuery("#pano135").children().children(".pnlm-panorama-info:visible").length > 0) {
                                       jQuery("#controls135").css("bottom", "55px");
                                   }
                                   else {
                                     jQuery("#controls135").css("bottom", "5px");
                                   }

                          }, 200);
                        }
                      }
            });

            jQuery(".geodir-tab-head dd, #vr-tour-tab").click(function(){
              jQuery("#pano135").children(".pnlm-render-container").remove();
              jQuery("#pano135").children(".pnlm-ui").remove();
              panoshow135 = pannellum.viewer(response[0]["panoid"], scenes);
              setTimeout(function() {
                      panoshow135.loadScene("1");
                      window.dispatchEvent(new Event("resize"));
                      if (jQuery("#pano135").children().children(".pnlm-panorama-info:visible").length > 0) {
                           jQuery("#controls135").css("bottom", "55px");
                       }
                       else {
                         jQuery("#controls135").css("bottom", "5px");
                       }
              }, 200);
            });

            jQuery("#pano135").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
            });});
                </script>
            </div>
            <div class="title">Living Room</div>
        </div>
        <div class="col-md-6 box ">
            <div>
                <style>#pano136 div.pnlm-hotspot-base.fas,
                    #pano136 div.pnlm-hotspot-base.fab,
                    #pano136 div.pnlm-hotspot-base.fa,
                    #pano136 div.pnlm-hotspot-base.far {
                        display: block !important;
                        background-color: #00b4ff;
                        color: #fff;
                        border-radius: 100%;
                        width: 30px;
                        height: 30px;
                        animation: icon-pulsepano136 1.5s infinite cubic-bezier(.25, 0, 0, 1);
                    }

                    @-webkit-keyframes icon-pulsepano136 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    @keyframes icon-pulsepano136 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    #pano136 div.pnlm-orientation-button {
                        display: none;
                    }</style>
                <div id="pano136" class="pano-wrap"
                     style=" text-align:center; max-width:100%; width: 600px; height: 400px; margin: 0 auto; direction:ltr;">
                    <div class="explainer" id="explainer136" style="display: none"><span
                            class="close-explainer-video"><i class="fa fa-times"></i></span></div>
                    <div class="wpvr-hotspot-tweak-contents-wrapper" style="display: none"><i class="fa fa-times cross"
                                                                                              data-id="136"></i>
                        <div class="wpvr-hotspot-tweak-contents-flex">
                            <div class="wpvr-hotspot-tweak-contents"></div>
                        </div>
                    </div>
                    <div class="custom-ifram-wrapper" style="display: none;"><i class="fa fa-times cross"
                                                                                data-id="136"></i>
                        <div class="custom-ifram-flex">
                            <div class="custom-ifram"></div>
                        </div>
                    </div>
                </div>
                <script type="rocketlazyloadscript">window.addEventListener('DOMContentLoaded', function() {jQuery(document).ready(function() {var response = [{"panoid":"pano136"},{"autoLoad":false,"showControls":true,"orientationSupport":"false","compass":false,"orientationOnByDefault":false,"mouseZoom":true,"draggable":true,"disableKeyboardCtrl":false,"keyboardZoom":true,"preview":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/1.jpg","autoRotate":"-5","default":{"firstScene":"1","sceneFadeDuration":""},"scenes":{"1":{"type":"equirectangular","panorama":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/1.jpg","pitch":null,"yaw":null,"hfov":100,"maxHfov":120,"minHfov":50,"vaov":180,"haov":360,"hotSpots":[]}}}];var scenes = response[1];if(scenes) {var scenedata = scenes.scenes;for(var i in scenedata) {var scenehotspot = scenedata[i].hotSpots;for(var i = 0; i < scenehotspot.length; i++) {if(scenehotspot[i]["clickHandlerArgs"] != "") {scenehotspot[i]["clickHandlerFunc"] = wpvrhotspot;}if(scenehotspot[i]["createTooltipArgs"] != "") {scenehotspot[i]["createTooltipFunc"] = wpvrtooltip;}}}}var panoshow136 = pannellum.viewer(response[0]["panoid"], scenes);panoshow136.on("load", function (){
            setTimeout(() => {
                window.dispatchEvent(new Event("resize"));
            }, 200);
						if (jQuery("#pano136").children().children(".pnlm-panorama-info:visible").length > 0) {
	               jQuery("#controls136").css("bottom", "55px");
	           }
	           else {
	             jQuery("#controls136").css("bottom", "5px");
	           }
					});panoshow136.on("render", function (){
              window.dispatchEvent(new Event("resize"));
            });
					if (scenes.autoRotate) {
						panoshow136.on("load", function (){
						 setTimeout(function(){ panoshow136.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
						panoshow136.on("scenechange", function (){
						 setTimeout(function(){ panoshow136.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
					}
					var touchtime = 0;
            jQuery(document).on("click","#explainer_button_136",function() {
                jQuery("#explainer136").slideToggle();
            });

            jQuery(document).on("click",".close-explainer-video",function() {
                jQuery(this).parent(".explainer").hide();
                var el_src = jQuery(".vr-iframe").attr("src");
                jQuery(".vr-iframe").attr("src", el_src);
              });


		          jQuery(document).ready(function($){
		              jQuery("#sccontrols136").hide();
                      jQuery(".wpvr_slider_nav").hide();
		              jQuery(".vrgctrl136").html('<i class="fa fa-angle-up"></i>');
		          });

		          var slide136 = "down";
		          jQuery(document).on("click","#vrgcontrols136",function() {

		            if (slide136 == "up") {
		              jQuery(".vrgctrl136").empty();
		              jQuery(".vrgctrl136").html('<i class="fa fa-angle-up"></i>');
		              slide136 = "down";
		            }
		            else {
		              jQuery(".vrgctrl136").empty();
		              jQuery(".vrgctrl136").html('<i class="fa fa-angle-down"></i>');
		              slide136 = "up";
		            }
                    jQuery(".wpvr_slider_nav").slideToggle();
		            jQuery("#sccontrols136").slideToggle();
		          });

                jQuery(document).ready(function(){
                    jQuery("#controls136").hide();
                    jQuery("#zoom-in-out-controls136").hide();
                    jQuery("#adcontrol136").hide();
                    jQuery("#pano136").find(".pnlm-panorama-info").hide();
                });

            panoshow136.on("load", function (){
                    jQuery("#controls136").show();
                    jQuery("#zoom-in-out-controls136").show();
                    jQuery("#adcontrol136").show();
                    jQuery("#pano136").find(".pnlm-panorama-info").show();
            });
            jQuery(".elementor-tab-title").click(function(){
                      var element_id;
                      var pano_id;
                      var element_id = this.id;
                      element_id = element_id.split("-");
                      element_id = element_id[3];
                      jQuery("#elementor-tab-content-"+element_id).children("div").addClass("awwww");
                      var pano_id = jQuery(".awwww").attr("id");
                      jQuery("#elementor-tab-content-"+element_id).children("div").removeClass("awwww");
                      if (pano_id != undefined) {
                        pano_id = pano_id.split("o");
                        pano_id = pano_id[1];
                        if (pano_id == "136") {
                          jQuery("#pano136").children(".pnlm-render-container").remove();
                          jQuery("#pano136").children(".pnlm-ui").remove();
                          panoshow136 = pannellum.viewer(response[0]["panoid"], scenes);
                          jQuery("#pano136").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
                          setTimeout(function() {
                                //   panoshow136.loadScene("1");
                                  window.dispatchEvent(new Event("resize"));
                                  if (jQuery("#pano136").children().children(".pnlm-panorama-info:visible").length > 0) {
                                       jQuery("#controls136").css("bottom", "55px");
                                   }
                                   else {
                                     jQuery("#controls136").css("bottom", "5px");
                                   }

                          }, 200);
                        }
                      }
            });

            jQuery(".geodir-tab-head dd, #vr-tour-tab").click(function(){
              jQuery("#pano136").children(".pnlm-render-container").remove();
              jQuery("#pano136").children(".pnlm-ui").remove();
              panoshow136 = pannellum.viewer(response[0]["panoid"], scenes);
              setTimeout(function() {
                      panoshow136.loadScene("1");
                      window.dispatchEvent(new Event("resize"));
                      if (jQuery("#pano136").children().children(".pnlm-panorama-info:visible").length > 0) {
                           jQuery("#controls136").css("bottom", "55px");
                       }
                       else {
                         jQuery("#controls136").css("bottom", "5px");
                       }
              }, 200);
            });

            jQuery("#pano136").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
            });});
                </script>
            </div>
            <div class="title">Dining Room & Kitchen</div>
        </div>
        <div class="col-md-6 box ">
            <div>
                <style>#pano137 div.pnlm-hotspot-base.fas,
                    #pano137 div.pnlm-hotspot-base.fab,
                    #pano137 div.pnlm-hotspot-base.fa,
                    #pano137 div.pnlm-hotspot-base.far {
                        display: block !important;
                        background-color: #00b4ff;
                        color: #fff;
                        border-radius: 100%;
                        width: 30px;
                        height: 30px;
                        animation: icon-pulsepano137 1.5s infinite cubic-bezier(.25, 0, 0, 1);
                    }

                    @-webkit-keyframes icon-pulsepano137 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    @keyframes icon-pulsepano137 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    #pano137 div.pnlm-orientation-button {
                        display: none;
                    }</style>
                <div id="pano137" class="pano-wrap"
                     style=" text-align:center; max-width:100%; width: 600px; height: 400px; margin: 0 auto; direction:ltr;">
                    <div class="explainer" id="explainer137" style="display: none"><span
                            class="close-explainer-video"><i class="fa fa-times"></i></span></div>
                    <div class="wpvr-hotspot-tweak-contents-wrapper" style="display: none"><i class="fa fa-times cross"
                                                                                              data-id="137"></i>
                        <div class="wpvr-hotspot-tweak-contents-flex">
                            <div class="wpvr-hotspot-tweak-contents"></div>
                        </div>
                    </div>
                    <div class="custom-ifram-wrapper" style="display: none;"><i class="fa fa-times cross"
                                                                                data-id="137"></i>
                        <div class="custom-ifram-flex">
                            <div class="custom-ifram"></div>
                        </div>
                    </div>
                </div>
                <script type="rocketlazyloadscript">window.addEventListener('DOMContentLoaded', function() {jQuery(document).ready(function() {var response = [{"panoid":"pano137"},{"autoLoad":false,"showControls":true,"orientationSupport":"false","compass":false,"orientationOnByDefault":false,"mouseZoom":true,"draggable":true,"disableKeyboardCtrl":false,"keyboardZoom":true,"preview":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/room2-8-scaled.jpg","autoRotate":"-5","default":{"firstScene":"1","sceneFadeDuration":""},"scenes":{"1":{"type":"equirectangular","panorama":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/room2-8-scaled.jpg","pitch":null,"yaw":null,"hfov":100,"maxHfov":120,"minHfov":50,"vaov":180,"haov":360,"hotSpots":[]}}}];var scenes = response[1];if(scenes) {var scenedata = scenes.scenes;for(var i in scenedata) {var scenehotspot = scenedata[i].hotSpots;for(var i = 0; i < scenehotspot.length; i++) {if(scenehotspot[i]["clickHandlerArgs"] != "") {scenehotspot[i]["clickHandlerFunc"] = wpvrhotspot;}if(scenehotspot[i]["createTooltipArgs"] != "") {scenehotspot[i]["createTooltipFunc"] = wpvrtooltip;}}}}var panoshow137 = pannellum.viewer(response[0]["panoid"], scenes);panoshow137.on("load", function (){
            setTimeout(() => {
                window.dispatchEvent(new Event("resize"));
            }, 200);
						if (jQuery("#pano137").children().children(".pnlm-panorama-info:visible").length > 0) {
	               jQuery("#controls137").css("bottom", "55px");
	           }
	           else {
	             jQuery("#controls137").css("bottom", "5px");
	           }
					});panoshow137.on("render", function (){
              window.dispatchEvent(new Event("resize"));
            });
					if (scenes.autoRotate) {
						panoshow137.on("load", function (){
						 setTimeout(function(){ panoshow137.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
						panoshow137.on("scenechange", function (){
						 setTimeout(function(){ panoshow137.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
					}
					var touchtime = 0;
            jQuery(document).on("click","#explainer_button_137",function() {
                jQuery("#explainer137").slideToggle();
            });

            jQuery(document).on("click",".close-explainer-video",function() {
                jQuery(this).parent(".explainer").hide();
                var el_src = jQuery(".vr-iframe").attr("src");
                jQuery(".vr-iframe").attr("src", el_src);
              });


		          jQuery(document).ready(function($){
		              jQuery("#sccontrols137").hide();
                      jQuery(".wpvr_slider_nav").hide();
		              jQuery(".vrgctrl137").html('<i class="fa fa-angle-up"></i>');
		          });

		          var slide137 = "down";
		          jQuery(document).on("click","#vrgcontrols137",function() {

		            if (slide137 == "up") {
		              jQuery(".vrgctrl137").empty();
		              jQuery(".vrgctrl137").html('<i class="fa fa-angle-up"></i>');
		              slide137 = "down";
		            }
		            else {
		              jQuery(".vrgctrl137").empty();
		              jQuery(".vrgctrl137").html('<i class="fa fa-angle-down"></i>');
		              slide137 = "up";
		            }
                    jQuery(".wpvr_slider_nav").slideToggle();
		            jQuery("#sccontrols137").slideToggle();
		          });

                jQuery(document).ready(function(){
                    jQuery("#controls137").hide();
                    jQuery("#zoom-in-out-controls137").hide();
                    jQuery("#adcontrol137").hide();
                    jQuery("#pano137").find(".pnlm-panorama-info").hide();
                });

            panoshow137.on("load", function (){
                    jQuery("#controls137").show();
                    jQuery("#zoom-in-out-controls137").show();
                    jQuery("#adcontrol137").show();
                    jQuery("#pano137").find(".pnlm-panorama-info").show();
            });
            jQuery(".elementor-tab-title").click(function(){
                      var element_id;
                      var pano_id;
                      var element_id = this.id;
                      element_id = element_id.split("-");
                      element_id = element_id[3];
                      jQuery("#elementor-tab-content-"+element_id).children("div").addClass("awwww");
                      var pano_id = jQuery(".awwww").attr("id");
                      jQuery("#elementor-tab-content-"+element_id).children("div").removeClass("awwww");
                      if (pano_id != undefined) {
                        pano_id = pano_id.split("o");
                        pano_id = pano_id[1];
                        if (pano_id == "137") {
                          jQuery("#pano137").children(".pnlm-render-container").remove();
                          jQuery("#pano137").children(".pnlm-ui").remove();
                          panoshow137 = pannellum.viewer(response[0]["panoid"], scenes);
                          jQuery("#pano137").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
                          setTimeout(function() {
                                //   panoshow137.loadScene("1");
                                  window.dispatchEvent(new Event("resize"));
                                  if (jQuery("#pano137").children().children(".pnlm-panorama-info:visible").length > 0) {
                                       jQuery("#controls137").css("bottom", "55px");
                                   }
                                   else {
                                     jQuery("#controls137").css("bottom", "5px");
                                   }

                          }, 200);
                        }
                      }
            });

            jQuery(".geodir-tab-head dd, #vr-tour-tab").click(function(){
              jQuery("#pano137").children(".pnlm-render-container").remove();
              jQuery("#pano137").children(".pnlm-ui").remove();
              panoshow137 = pannellum.viewer(response[0]["panoid"], scenes);
              setTimeout(function() {
                      panoshow137.loadScene("1");
                      window.dispatchEvent(new Event("resize"));
                      if (jQuery("#pano137").children().children(".pnlm-panorama-info:visible").length > 0) {
                           jQuery("#controls137").css("bottom", "55px");
                       }
                       else {
                         jQuery("#controls137").css("bottom", "5px");
                       }
              }, 200);
            });

            jQuery("#pano137").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
            });});
                </script>
            </div>
            <div class="title">3 Bedroom</div>
        </div>
        <div class="col-md-6 box ">
            <div>
                <style>#pano138 div.pnlm-hotspot-base.fas,
                    #pano138 div.pnlm-hotspot-base.fab,
                    #pano138 div.pnlm-hotspot-base.fa,
                    #pano138 div.pnlm-hotspot-base.far {
                        display: block !important;
                        background-color: #00b4ff;
                        color: #fff;
                        border-radius: 100%;
                        width: 30px;
                        height: 30px;
                        animation: icon-pulsepano138 1.5s infinite cubic-bezier(.25, 0, 0, 1);
                    }

                    @-webkit-keyframes icon-pulsepano138 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    @keyframes icon-pulsepano138 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    #pano138 div.pnlm-orientation-button {
                        display: none;
                    }</style>
                <div id="pano138" class="pano-wrap"
                     style=" text-align:center; max-width:100%; width: 600px; height: 400px; margin: 0 auto; direction:ltr;">
                    <div class="explainer" id="explainer138" style="display: none"><span
                            class="close-explainer-video"><i class="fa fa-times"></i></span></div>
                    <div class="wpvr-hotspot-tweak-contents-wrapper" style="display: none"><i class="fa fa-times cross"
                                                                                              data-id="138"></i>
                        <div class="wpvr-hotspot-tweak-contents-flex">
                            <div class="wpvr-hotspot-tweak-contents"></div>
                        </div>
                    </div>
                    <div class="custom-ifram-wrapper" style="display: none;"><i class="fa fa-times cross"
                                                                                data-id="138"></i>
                        <div class="custom-ifram-flex">
                            <div class="custom-ifram"></div>
                        </div>
                    </div>
                </div>
                <script type="rocketlazyloadscript">window.addEventListener('DOMContentLoaded', function() {jQuery(document).ready(function() {var response = [{"panoid":"pano138"},{"autoLoad":false,"showControls":true,"orientationSupport":"false","compass":false,"orientationOnByDefault":false,"mouseZoom":true,"draggable":true,"disableKeyboardCtrl":false,"keyboardZoom":true,"preview":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Bathroom1-1.jpg","autoRotate":"-5","default":{"firstScene":"1","sceneFadeDuration":""},"scenes":{"1":{"type":"equirectangular","panorama":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Bathroom1-1.jpg","pitch":null,"yaw":null,"hfov":100,"maxHfov":120,"minHfov":50,"vaov":180,"haov":360,"hotSpots":[]}}}];var scenes = response[1];if(scenes) {var scenedata = scenes.scenes;for(var i in scenedata) {var scenehotspot = scenedata[i].hotSpots;for(var i = 0; i < scenehotspot.length; i++) {if(scenehotspot[i]["clickHandlerArgs"] != "") {scenehotspot[i]["clickHandlerFunc"] = wpvrhotspot;}if(scenehotspot[i]["createTooltipArgs"] != "") {scenehotspot[i]["createTooltipFunc"] = wpvrtooltip;}}}}var panoshow138 = pannellum.viewer(response[0]["panoid"], scenes);panoshow138.on("load", function (){
            setTimeout(() => {
                window.dispatchEvent(new Event("resize"));
            }, 200);
						if (jQuery("#pano138").children().children(".pnlm-panorama-info:visible").length > 0) {
	               jQuery("#controls138").css("bottom", "55px");
	           }
	           else {
	             jQuery("#controls138").css("bottom", "5px");
	           }
					});panoshow138.on("render", function (){
              window.dispatchEvent(new Event("resize"));
            });
					if (scenes.autoRotate) {
						panoshow138.on("load", function (){
						 setTimeout(function(){ panoshow138.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
						panoshow138.on("scenechange", function (){
						 setTimeout(function(){ panoshow138.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
					}
					var touchtime = 0;
            jQuery(document).on("click","#explainer_button_138",function() {
                jQuery("#explainer138").slideToggle();
            });

            jQuery(document).on("click",".close-explainer-video",function() {
                jQuery(this).parent(".explainer").hide();
                var el_src = jQuery(".vr-iframe").attr("src");
                jQuery(".vr-iframe").attr("src", el_src);
              });


		          jQuery(document).ready(function($){
		              jQuery("#sccontrols138").hide();
                      jQuery(".wpvr_slider_nav").hide();
		              jQuery(".vrgctrl138").html('<i class="fa fa-angle-up"></i>');
		          });

		          var slide138 = "down";
		          jQuery(document).on("click","#vrgcontrols138",function() {

		            if (slide138 == "up") {
		              jQuery(".vrgctrl138").empty();
		              jQuery(".vrgctrl138").html('<i class="fa fa-angle-up"></i>');
		              slide138 = "down";
		            }
		            else {
		              jQuery(".vrgctrl138").empty();
		              jQuery(".vrgctrl138").html('<i class="fa fa-angle-down"></i>');
		              slide138 = "up";
		            }
                    jQuery(".wpvr_slider_nav").slideToggle();
		            jQuery("#sccontrols138").slideToggle();
		          });

                jQuery(document).ready(function(){
                    jQuery("#controls138").hide();
                    jQuery("#zoom-in-out-controls138").hide();
                    jQuery("#adcontrol138").hide();
                    jQuery("#pano138").find(".pnlm-panorama-info").hide();
                });

            panoshow138.on("load", function (){
                    jQuery("#controls138").show();
                    jQuery("#zoom-in-out-controls138").show();
                    jQuery("#adcontrol138").show();
                    jQuery("#pano138").find(".pnlm-panorama-info").show();
            });
            jQuery(".elementor-tab-title").click(function(){
                      var element_id;
                      var pano_id;
                      var element_id = this.id;
                      element_id = element_id.split("-");
                      element_id = element_id[3];
                      jQuery("#elementor-tab-content-"+element_id).children("div").addClass("awwww");
                      var pano_id = jQuery(".awwww").attr("id");
                      jQuery("#elementor-tab-content-"+element_id).children("div").removeClass("awwww");
                      if (pano_id != undefined) {
                        pano_id = pano_id.split("o");
                        pano_id = pano_id[1];
                        if (pano_id == "138") {
                          jQuery("#pano138").children(".pnlm-render-container").remove();
                          jQuery("#pano138").children(".pnlm-ui").remove();
                          panoshow138 = pannellum.viewer(response[0]["panoid"], scenes);
                          jQuery("#pano138").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
                          setTimeout(function() {
                                //   panoshow138.loadScene("1");
                                  window.dispatchEvent(new Event("resize"));
                                  if (jQuery("#pano138").children().children(".pnlm-panorama-info:visible").length > 0) {
                                       jQuery("#controls138").css("bottom", "55px");
                                   }
                                   else {
                                     jQuery("#controls138").css("bottom", "5px");
                                   }

                          }, 200);
                        }
                      }
            });

            jQuery(".geodir-tab-head dd, #vr-tour-tab").click(function(){
              jQuery("#pano138").children(".pnlm-render-container").remove();
              jQuery("#pano138").children(".pnlm-ui").remove();
              panoshow138 = pannellum.viewer(response[0]["panoid"], scenes);
              setTimeout(function() {
                      panoshow138.loadScene("1");
                      window.dispatchEvent(new Event("resize"));
                      if (jQuery("#pano138").children().children(".pnlm-panorama-info:visible").length > 0) {
                           jQuery("#controls138").css("bottom", "55px");
                       }
                       else {
                         jQuery("#controls138").css("bottom", "5px");
                       }
              }, 200);
            });

            jQuery("#pano138").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
            });});
                </script>
            </div>
            <div class="title">Bathroom</div>
        </div>

    </div>
</div>


<div id="Joy" class="main_title">
    <h2>Joy</h2>
    <h4> 2 Bedroom Private Pool Villa</h4>
</div>
<div data-bg="https://balihillstonevillas.com/wp-content/uploads/2022/07/Villa-Mainroom2.jpg"
     class="imgbg1 rocket-lazyload" style=""></div>

<div>
    <div id="jig2" class="justified-image-grid jig-959d4931b86fa8a8e10837c157e8dd97 jig-preset-global">
        <div class="jig-clearfix"></div>
        <noscript id="jig2-html" class="justified-image-grid-html" data-lazy-src="skiplazyload"
                  data-src="skipunveillazyload">
            <ul>
                <li><a href="https://balihillstonevillas.com/wp-content/uploads/2022/07/Villa-Sunset-II.jpg"><img
                            src="https://balihillstonevillas.com/wp-content/plugins/justified-image-grid/timthumb.php?src=https%3A%2F%2Fbalihillstonevillas.com%2Fwp-content%2Fuploads%2F2022%2F07%2FVilla-Sunset-II.jpg&amp;h=260&amp;w=347&amp;q=90&amp;f=.jpg"
                            alt="Villa-Sunset-II" width="347" height="260"/></a>
                    <p class="jig-HTMLdescription">Villa-Sunset-II<br/></p></li>
                <li><a href="https://balihillstonevillas.com/wp-content/uploads/2022/07/Villa-Bathroom-1.jpg"><img
                            src="https://balihillstonevillas.com/wp-content/plugins/justified-image-grid/timthumb.php?src=https%3A%2F%2Fbalihillstonevillas.com%2Fwp-content%2Fuploads%2F2022%2F07%2FVilla-Bathroom-1.jpg&amp;h=260&amp;w=347&amp;q=90&amp;f=.jpg"
                            alt="Villa-Bathroom" width="347" height="260"/></a>
                    <p class="jig-HTMLdescription">Villa-Bathroom<br/></p></li>
                <li>
                    <a href="https://balihillstonevillas.com/wp-content/uploads/2022/07/chateau-de-bali_3bed-poolvilla-20-copy.jpg"><img
                            src="https://balihillstonevillas.com/wp-content/plugins/justified-image-grid/timthumb.php?src=https%3A%2F%2Fbalihillstonevillas.com%2Fwp-content%2Fuploads%2F2022%2F07%2Fchateau-de-bali_3bed-poolvilla-20-copy.jpg&amp;h=260&amp;w=347&amp;q=90&amp;f=.jpg"
                            alt="chateau-de-bali_3bed-poolvilla-(20)-copy" width="347" height="260"/></a>
                    <p class="jig-HTMLdescription">chateau-de-bali_3bed-poolvilla-(20)-copy<br/></p></li>
                <li>
                    <a href="https://balihillstonevillas.com/wp-content/uploads/2022/07/chateau-de-bali_3bed-poolvilla-33-copy.jpg"><img
                            src="https://balihillstonevillas.com/wp-content/plugins/justified-image-grid/timthumb.php?src=https%3A%2F%2Fbalihillstonevillas.com%2Fwp-content%2Fuploads%2F2022%2F07%2Fchateau-de-bali_3bed-poolvilla-33-copy.jpg&amp;h=260&amp;w=347&amp;q=90&amp;f=.jpg"
                            alt="chateau-de-bali_3bed-poolvilla-(33)-copy" width="347" height="260"/></a>
                    <p class="jig-HTMLdescription">chateau-de-bali_3bed-poolvilla-(33)-copy<br/></p></li>
            </ul>
        </noscript>
    </div>
</div>


<div class="tectbox margin_30">
    <div class="row">

        <div class="col-md-6">
            <div class="ss">
                <h2>Joy - View 360</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut aliquet tortor. Vestibulum nec
                    odio quis nunc sodales mattis. Morbi maximus dolor velit, hendrerit egestas arcu cursus tempor.</p>
            </div>
        </div>


        <div class="col-md-6 box ">
            <div>
                <style>#pano126 div.pnlm-hotspot-base.fas,
                    #pano126 div.pnlm-hotspot-base.fab,
                    #pano126 div.pnlm-hotspot-base.fa,
                    #pano126 div.pnlm-hotspot-base.far {
                        display: block !important;
                        background-color: #00b4ff;
                        color: #fff;
                        border-radius: 100%;
                        width: 30px;
                        height: 30px;
                        animation: icon-pulsepano126 1.5s infinite cubic-bezier(.25, 0, 0, 1);
                    }

                    @-webkit-keyframes icon-pulsepano126 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    @keyframes icon-pulsepano126 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    #pano126 div.pnlm-orientation-button {
                        display: none;
                    }</style>
                <div id="pano126" class="pano-wrap"
                     style=" text-align:center; max-width:100%; width: 600px; height: 400px; margin: 0 auto; direction:ltr;">
                    <div class="explainer" id="explainer126" style="display: none"><span
                            class="close-explainer-video"><i class="fa fa-times"></i></span></div>
                    <div class="wpvr-hotspot-tweak-contents-wrapper" style="display: none"><i class="fa fa-times cross"
                                                                                              data-id="126"></i>
                        <div class="wpvr-hotspot-tweak-contents-flex">
                            <div class="wpvr-hotspot-tweak-contents"></div>
                        </div>
                    </div>
                    <div class="custom-ifram-wrapper" style="display: none;"><i class="fa fa-times cross"
                                                                                data-id="126"></i>
                        <div class="custom-ifram-flex">
                            <div class="custom-ifram"></div>
                        </div>
                    </div>
                </div>
                <script type="rocketlazyloadscript">window.addEventListener('DOMContentLoaded', function() {jQuery(document).ready(function() {var response = [{"panoid":"pano126"},{"autoLoad":false,"showControls":true,"orientationSupport":"false","compass":false,"orientationOnByDefault":false,"mouseZoom":true,"draggable":true,"disableKeyboardCtrl":false,"keyboardZoom":true,"preview":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Untitled_Panorama11.png","autoRotate":"-5","default":{"firstScene":"1","sceneFadeDuration":""},"scenes":{"1":{"type":"equirectangular","panorama":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Untitled_Panorama11.png","pitch":null,"yaw":null,"hfov":100,"maxHfov":120,"minHfov":50,"vaov":180,"haov":360,"hotSpots":[]}}}];var scenes = response[1];if(scenes) {var scenedata = scenes.scenes;for(var i in scenedata) {var scenehotspot = scenedata[i].hotSpots;for(var i = 0; i < scenehotspot.length; i++) {if(scenehotspot[i]["clickHandlerArgs"] != "") {scenehotspot[i]["clickHandlerFunc"] = wpvrhotspot;}if(scenehotspot[i]["createTooltipArgs"] != "") {scenehotspot[i]["createTooltipFunc"] = wpvrtooltip;}}}}var panoshow126 = pannellum.viewer(response[0]["panoid"], scenes);panoshow126.on("load", function (){
            setTimeout(() => {
                window.dispatchEvent(new Event("resize"));
            }, 200);
						if (jQuery("#pano126").children().children(".pnlm-panorama-info:visible").length > 0) {
	               jQuery("#controls126").css("bottom", "55px");
	           }
	           else {
	             jQuery("#controls126").css("bottom", "5px");
	           }
					});panoshow126.on("render", function (){
              window.dispatchEvent(new Event("resize"));
            });
					if (scenes.autoRotate) {
						panoshow126.on("load", function (){
						 setTimeout(function(){ panoshow126.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
						panoshow126.on("scenechange", function (){
						 setTimeout(function(){ panoshow126.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
					}
					var touchtime = 0;
            jQuery(document).on("click","#explainer_button_126",function() {
                jQuery("#explainer126").slideToggle();
            });

            jQuery(document).on("click",".close-explainer-video",function() {
                jQuery(this).parent(".explainer").hide();
                var el_src = jQuery(".vr-iframe").attr("src");
                jQuery(".vr-iframe").attr("src", el_src);
              });


		          jQuery(document).ready(function($){
		              jQuery("#sccontrols126").hide();
                      jQuery(".wpvr_slider_nav").hide();
		              jQuery(".vrgctrl126").html('<i class="fa fa-angle-up"></i>');
		          });

		          var slide126 = "down";
		          jQuery(document).on("click","#vrgcontrols126",function() {

		            if (slide126 == "up") {
		              jQuery(".vrgctrl126").empty();
		              jQuery(".vrgctrl126").html('<i class="fa fa-angle-up"></i>');
		              slide126 = "down";
		            }
		            else {
		              jQuery(".vrgctrl126").empty();
		              jQuery(".vrgctrl126").html('<i class="fa fa-angle-down"></i>');
		              slide126 = "up";
		            }
                    jQuery(".wpvr_slider_nav").slideToggle();
		            jQuery("#sccontrols126").slideToggle();
		          });

                jQuery(document).ready(function(){
                    jQuery("#controls126").hide();
                    jQuery("#zoom-in-out-controls126").hide();
                    jQuery("#adcontrol126").hide();
                    jQuery("#pano126").find(".pnlm-panorama-info").hide();
                });

            panoshow126.on("load", function (){
                    jQuery("#controls126").show();
                    jQuery("#zoom-in-out-controls126").show();
                    jQuery("#adcontrol126").show();
                    jQuery("#pano126").find(".pnlm-panorama-info").show();
            });
            jQuery(".elementor-tab-title").click(function(){
                      var element_id;
                      var pano_id;
                      var element_id = this.id;
                      element_id = element_id.split("-");
                      element_id = element_id[3];
                      jQuery("#elementor-tab-content-"+element_id).children("div").addClass("awwww");
                      var pano_id = jQuery(".awwww").attr("id");
                      jQuery("#elementor-tab-content-"+element_id).children("div").removeClass("awwww");
                      if (pano_id != undefined) {
                        pano_id = pano_id.split("o");
                        pano_id = pano_id[1];
                        if (pano_id == "126") {
                          jQuery("#pano126").children(".pnlm-render-container").remove();
                          jQuery("#pano126").children(".pnlm-ui").remove();
                          panoshow126 = pannellum.viewer(response[0]["panoid"], scenes);
                          jQuery("#pano126").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
                          setTimeout(function() {
                                //   panoshow126.loadScene("1");
                                  window.dispatchEvent(new Event("resize"));
                                  if (jQuery("#pano126").children().children(".pnlm-panorama-info:visible").length > 0) {
                                       jQuery("#controls126").css("bottom", "55px");
                                   }
                                   else {
                                     jQuery("#controls126").css("bottom", "5px");
                                   }

                          }, 200);
                        }
                      }
            });

            jQuery(".geodir-tab-head dd, #vr-tour-tab").click(function(){
              jQuery("#pano126").children(".pnlm-render-container").remove();
              jQuery("#pano126").children(".pnlm-ui").remove();
              panoshow126 = pannellum.viewer(response[0]["panoid"], scenes);
              setTimeout(function() {
                      panoshow126.loadScene("1");
                      window.dispatchEvent(new Event("resize"));
                      if (jQuery("#pano126").children().children(".pnlm-panorama-info:visible").length > 0) {
                           jQuery("#controls126").css("bottom", "55px");
                       }
                       else {
                         jQuery("#controls126").css("bottom", "5px");
                       }
              }, 200);
            });

            jQuery("#pano126").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
            });});
                </script>
            </div>
            <div class="title">Pool & Garden</div>
        </div>
        <div class="col-md-6 box ">
            <div>
                <style>#pano127 div.pnlm-hotspot-base.fas,
                    #pano127 div.pnlm-hotspot-base.fab,
                    #pano127 div.pnlm-hotspot-base.fa,
                    #pano127 div.pnlm-hotspot-base.far {
                        display: block !important;
                        background-color: #00b4ff;
                        color: #fff;
                        border-radius: 100%;
                        width: 30px;
                        height: 30px;
                        animation: icon-pulsepano127 1.5s infinite cubic-bezier(.25, 0, 0, 1);
                    }

                    @-webkit-keyframes icon-pulsepano127 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    @keyframes icon-pulsepano127 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    #pano127 div.pnlm-orientation-button {
                        display: none;
                    }</style>
                <div id="pano127" class="pano-wrap"
                     style=" text-align:center; max-width:100%; width: 600px; height: 400px; margin: 0 auto; direction:ltr;">
                    <div class="explainer" id="explainer127" style="display: none"><span
                            class="close-explainer-video"><i class="fa fa-times"></i></span></div>
                    <div class="wpvr-hotspot-tweak-contents-wrapper" style="display: none"><i class="fa fa-times cross"
                                                                                              data-id="127"></i>
                        <div class="wpvr-hotspot-tweak-contents-flex">
                            <div class="wpvr-hotspot-tweak-contents"></div>
                        </div>
                    </div>
                    <div class="custom-ifram-wrapper" style="display: none;"><i class="fa fa-times cross"
                                                                                data-id="127"></i>
                        <div class="custom-ifram-flex">
                            <div class="custom-ifram"></div>
                        </div>
                    </div>
                </div>
                <script type="rocketlazyloadscript">window.addEventListener('DOMContentLoaded', function() {jQuery(document).ready(function() {var response = [{"panoid":"pano127"},{"autoLoad":false,"showControls":true,"orientationSupport":"false","compass":false,"orientationOnByDefault":false,"mouseZoom":true,"draggable":true,"disableKeyboardCtrl":false,"keyboardZoom":true,"preview":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Dining-Room-Kitchen.jpg","autoRotate":"-5","default":{"firstScene":"1","sceneFadeDuration":""},"scenes":{"1":{"type":"equirectangular","panorama":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Dining-Room-Kitchen.jpg","pitch":null,"yaw":null,"hfov":100,"maxHfov":120,"minHfov":50,"vaov":180,"haov":360,"hotSpots":[]}}}];var scenes = response[1];if(scenes) {var scenedata = scenes.scenes;for(var i in scenedata) {var scenehotspot = scenedata[i].hotSpots;for(var i = 0; i < scenehotspot.length; i++) {if(scenehotspot[i]["clickHandlerArgs"] != "") {scenehotspot[i]["clickHandlerFunc"] = wpvrhotspot;}if(scenehotspot[i]["createTooltipArgs"] != "") {scenehotspot[i]["createTooltipFunc"] = wpvrtooltip;}}}}var panoshow127 = pannellum.viewer(response[0]["panoid"], scenes);panoshow127.on("load", function (){
            setTimeout(() => {
                window.dispatchEvent(new Event("resize"));
            }, 200);
						if (jQuery("#pano127").children().children(".pnlm-panorama-info:visible").length > 0) {
	               jQuery("#controls127").css("bottom", "55px");
	           }
	           else {
	             jQuery("#controls127").css("bottom", "5px");
	           }
					});panoshow127.on("render", function (){
              window.dispatchEvent(new Event("resize"));
            });
					if (scenes.autoRotate) {
						panoshow127.on("load", function (){
						 setTimeout(function(){ panoshow127.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
						panoshow127.on("scenechange", function (){
						 setTimeout(function(){ panoshow127.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
					}
					var touchtime = 0;
            jQuery(document).on("click","#explainer_button_127",function() {
                jQuery("#explainer127").slideToggle();
            });

            jQuery(document).on("click",".close-explainer-video",function() {
                jQuery(this).parent(".explainer").hide();
                var el_src = jQuery(".vr-iframe").attr("src");
                jQuery(".vr-iframe").attr("src", el_src);
              });


		          jQuery(document).ready(function($){
		              jQuery("#sccontrols127").hide();
                      jQuery(".wpvr_slider_nav").hide();
		              jQuery(".vrgctrl127").html('<i class="fa fa-angle-up"></i>');
		          });

		          var slide127 = "down";
		          jQuery(document).on("click","#vrgcontrols127",function() {

		            if (slide127 == "up") {
		              jQuery(".vrgctrl127").empty();
		              jQuery(".vrgctrl127").html('<i class="fa fa-angle-up"></i>');
		              slide127 = "down";
		            }
		            else {
		              jQuery(".vrgctrl127").empty();
		              jQuery(".vrgctrl127").html('<i class="fa fa-angle-down"></i>');
		              slide127 = "up";
		            }
                    jQuery(".wpvr_slider_nav").slideToggle();
		            jQuery("#sccontrols127").slideToggle();
		          });

                jQuery(document).ready(function(){
                    jQuery("#controls127").hide();
                    jQuery("#zoom-in-out-controls127").hide();
                    jQuery("#adcontrol127").hide();
                    jQuery("#pano127").find(".pnlm-panorama-info").hide();
                });

            panoshow127.on("load", function (){
                    jQuery("#controls127").show();
                    jQuery("#zoom-in-out-controls127").show();
                    jQuery("#adcontrol127").show();
                    jQuery("#pano127").find(".pnlm-panorama-info").show();
            });
            jQuery(".elementor-tab-title").click(function(){
                      var element_id;
                      var pano_id;
                      var element_id = this.id;
                      element_id = element_id.split("-");
                      element_id = element_id[3];
                      jQuery("#elementor-tab-content-"+element_id).children("div").addClass("awwww");
                      var pano_id = jQuery(".awwww").attr("id");
                      jQuery("#elementor-tab-content-"+element_id).children("div").removeClass("awwww");
                      if (pano_id != undefined) {
                        pano_id = pano_id.split("o");
                        pano_id = pano_id[1];
                        if (pano_id == "127") {
                          jQuery("#pano127").children(".pnlm-render-container").remove();
                          jQuery("#pano127").children(".pnlm-ui").remove();
                          panoshow127 = pannellum.viewer(response[0]["panoid"], scenes);
                          jQuery("#pano127").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
                          setTimeout(function() {
                                //   panoshow127.loadScene("1");
                                  window.dispatchEvent(new Event("resize"));
                                  if (jQuery("#pano127").children().children(".pnlm-panorama-info:visible").length > 0) {
                                       jQuery("#controls127").css("bottom", "55px");
                                   }
                                   else {
                                     jQuery("#controls127").css("bottom", "5px");
                                   }

                          }, 200);
                        }
                      }
            });

            jQuery(".geodir-tab-head dd, #vr-tour-tab").click(function(){
              jQuery("#pano127").children(".pnlm-render-container").remove();
              jQuery("#pano127").children(".pnlm-ui").remove();
              panoshow127 = pannellum.viewer(response[0]["panoid"], scenes);
              setTimeout(function() {
                      panoshow127.loadScene("1");
                      window.dispatchEvent(new Event("resize"));
                      if (jQuery("#pano127").children().children(".pnlm-panorama-info:visible").length > 0) {
                           jQuery("#controls127").css("bottom", "55px");
                       }
                       else {
                         jQuery("#controls127").css("bottom", "5px");
                       }
              }, 200);
            });

            jQuery("#pano127").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
            });});
                </script>
            </div>
            <div class="title">Living Room</div>
        </div>
        <div class="col-md-6 box ">
            <div>
                <style>#pano128 div.pnlm-hotspot-base.fas,
                    #pano128 div.pnlm-hotspot-base.fab,
                    #pano128 div.pnlm-hotspot-base.fa,
                    #pano128 div.pnlm-hotspot-base.far {
                        display: block !important;
                        background-color: #00b4ff;
                        color: #fff;
                        border-radius: 100%;
                        width: 30px;
                        height: 30px;
                        animation: icon-pulsepano128 1.5s infinite cubic-bezier(.25, 0, 0, 1);
                    }

                    @-webkit-keyframes icon-pulsepano128 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    @keyframes icon-pulsepano128 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    #pano128 div.pnlm-orientation-button {
                        display: none;
                    }</style>
                <div id="pano128" class="pano-wrap"
                     style=" text-align:center; max-width:100%; width: 600px; height: 400px; margin: 0 auto; direction:ltr;">
                    <div class="explainer" id="explainer128" style="display: none"><span
                            class="close-explainer-video"><i class="fa fa-times"></i></span></div>
                    <div class="wpvr-hotspot-tweak-contents-wrapper" style="display: none"><i class="fa fa-times cross"
                                                                                              data-id="128"></i>
                        <div class="wpvr-hotspot-tweak-contents-flex">
                            <div class="wpvr-hotspot-tweak-contents"></div>
                        </div>
                    </div>
                    <div class="custom-ifram-wrapper" style="display: none;"><i class="fa fa-times cross"
                                                                                data-id="128"></i>
                        <div class="custom-ifram-flex">
                            <div class="custom-ifram"></div>
                        </div>
                    </div>
                </div>
                <script type="rocketlazyloadscript">window.addEventListener('DOMContentLoaded', function() {jQuery(document).ready(function() {var response = [{"panoid":"pano128"},{"autoLoad":false,"showControls":true,"orientationSupport":"false","compass":false,"orientationOnByDefault":false,"mouseZoom":true,"draggable":true,"disableKeyboardCtrl":false,"keyboardZoom":true,"preview":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/1.jpg","autoRotate":"-5","default":{"firstScene":"1","sceneFadeDuration":""},"scenes":{"1":{"type":"equirectangular","panorama":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/1.jpg","pitch":null,"yaw":null,"hfov":100,"maxHfov":120,"minHfov":50,"vaov":180,"haov":360,"hotSpots":[]}}}];var scenes = response[1];if(scenes) {var scenedata = scenes.scenes;for(var i in scenedata) {var scenehotspot = scenedata[i].hotSpots;for(var i = 0; i < scenehotspot.length; i++) {if(scenehotspot[i]["clickHandlerArgs"] != "") {scenehotspot[i]["clickHandlerFunc"] = wpvrhotspot;}if(scenehotspot[i]["createTooltipArgs"] != "") {scenehotspot[i]["createTooltipFunc"] = wpvrtooltip;}}}}var panoshow128 = pannellum.viewer(response[0]["panoid"], scenes);panoshow128.on("load", function (){
            setTimeout(() => {
                window.dispatchEvent(new Event("resize"));
            }, 200);
						if (jQuery("#pano128").children().children(".pnlm-panorama-info:visible").length > 0) {
	               jQuery("#controls128").css("bottom", "55px");
	           }
	           else {
	             jQuery("#controls128").css("bottom", "5px");
	           }
					});panoshow128.on("render", function (){
              window.dispatchEvent(new Event("resize"));
            });
					if (scenes.autoRotate) {
						panoshow128.on("load", function (){
						 setTimeout(function(){ panoshow128.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
						panoshow128.on("scenechange", function (){
						 setTimeout(function(){ panoshow128.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
					}
					var touchtime = 0;
            jQuery(document).on("click","#explainer_button_128",function() {
                jQuery("#explainer128").slideToggle();
            });

            jQuery(document).on("click",".close-explainer-video",function() {
                jQuery(this).parent(".explainer").hide();
                var el_src = jQuery(".vr-iframe").attr("src");
                jQuery(".vr-iframe").attr("src", el_src);
              });


		          jQuery(document).ready(function($){
		              jQuery("#sccontrols128").hide();
                      jQuery(".wpvr_slider_nav").hide();
		              jQuery(".vrgctrl128").html('<i class="fa fa-angle-up"></i>');
		          });

		          var slide128 = "down";
		          jQuery(document).on("click","#vrgcontrols128",function() {

		            if (slide128 == "up") {
		              jQuery(".vrgctrl128").empty();
		              jQuery(".vrgctrl128").html('<i class="fa fa-angle-up"></i>');
		              slide128 = "down";
		            }
		            else {
		              jQuery(".vrgctrl128").empty();
		              jQuery(".vrgctrl128").html('<i class="fa fa-angle-down"></i>');
		              slide128 = "up";
		            }
                    jQuery(".wpvr_slider_nav").slideToggle();
		            jQuery("#sccontrols128").slideToggle();
		          });

                jQuery(document).ready(function(){
                    jQuery("#controls128").hide();
                    jQuery("#zoom-in-out-controls128").hide();
                    jQuery("#adcontrol128").hide();
                    jQuery("#pano128").find(".pnlm-panorama-info").hide();
                });

            panoshow128.on("load", function (){
                    jQuery("#controls128").show();
                    jQuery("#zoom-in-out-controls128").show();
                    jQuery("#adcontrol128").show();
                    jQuery("#pano128").find(".pnlm-panorama-info").show();
            });
            jQuery(".elementor-tab-title").click(function(){
                      var element_id;
                      var pano_id;
                      var element_id = this.id;
                      element_id = element_id.split("-");
                      element_id = element_id[3];
                      jQuery("#elementor-tab-content-"+element_id).children("div").addClass("awwww");
                      var pano_id = jQuery(".awwww").attr("id");
                      jQuery("#elementor-tab-content-"+element_id).children("div").removeClass("awwww");
                      if (pano_id != undefined) {
                        pano_id = pano_id.split("o");
                        pano_id = pano_id[1];
                        if (pano_id == "128") {
                          jQuery("#pano128").children(".pnlm-render-container").remove();
                          jQuery("#pano128").children(".pnlm-ui").remove();
                          panoshow128 = pannellum.viewer(response[0]["panoid"], scenes);
                          jQuery("#pano128").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
                          setTimeout(function() {
                                //   panoshow128.loadScene("1");
                                  window.dispatchEvent(new Event("resize"));
                                  if (jQuery("#pano128").children().children(".pnlm-panorama-info:visible").length > 0) {
                                       jQuery("#controls128").css("bottom", "55px");
                                   }
                                   else {
                                     jQuery("#controls128").css("bottom", "5px");
                                   }

                          }, 200);
                        }
                      }
            });

            jQuery(".geodir-tab-head dd, #vr-tour-tab").click(function(){
              jQuery("#pano128").children(".pnlm-render-container").remove();
              jQuery("#pano128").children(".pnlm-ui").remove();
              panoshow128 = pannellum.viewer(response[0]["panoid"], scenes);
              setTimeout(function() {
                      panoshow128.loadScene("1");
                      window.dispatchEvent(new Event("resize"));
                      if (jQuery("#pano128").children().children(".pnlm-panorama-info:visible").length > 0) {
                           jQuery("#controls128").css("bottom", "55px");
                       }
                       else {
                         jQuery("#controls128").css("bottom", "5px");
                       }
              }, 200);
            });

            jQuery("#pano128").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
            });});
                </script>
            </div>
            <div class="title">Dining Room & Kitchen</div>
        </div>
        <div class="col-md-6 box ">
            <div>
                <style>#pano129 div.pnlm-hotspot-base.fas,
                    #pano129 div.pnlm-hotspot-base.fab,
                    #pano129 div.pnlm-hotspot-base.fa,
                    #pano129 div.pnlm-hotspot-base.far {
                        display: block !important;
                        background-color: #00b4ff;
                        color: #fff;
                        border-radius: 100%;
                        width: 30px;
                        height: 30px;
                        animation: icon-pulsepano129 1.5s infinite cubic-bezier(.25, 0, 0, 1);
                    }

                    @-webkit-keyframes icon-pulsepano129 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    @keyframes icon-pulsepano129 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    #pano129 div.pnlm-orientation-button {
                        display: none;
                    }</style>
                <div id="pano129" class="pano-wrap"
                     style=" text-align:center; max-width:100%; width: 600px; height: 400px; margin: 0 auto; direction:ltr;">
                    <div class="explainer" id="explainer129" style="display: none"><span
                            class="close-explainer-video"><i class="fa fa-times"></i></span></div>
                    <div class="wpvr-hotspot-tweak-contents-wrapper" style="display: none"><i class="fa fa-times cross"
                                                                                              data-id="129"></i>
                        <div class="wpvr-hotspot-tweak-contents-flex">
                            <div class="wpvr-hotspot-tweak-contents"></div>
                        </div>
                    </div>
                    <div class="custom-ifram-wrapper" style="display: none;"><i class="fa fa-times cross"
                                                                                data-id="129"></i>
                        <div class="custom-ifram-flex">
                            <div class="custom-ifram"></div>
                        </div>
                    </div>
                </div>
                <script type="rocketlazyloadscript">window.addEventListener('DOMContentLoaded', function() {jQuery(document).ready(function() {var response = [{"panoid":"pano129"},{"autoLoad":false,"showControls":true,"orientationSupport":"false","compass":false,"orientationOnByDefault":false,"mouseZoom":true,"draggable":true,"disableKeyboardCtrl":false,"keyboardZoom":true,"preview":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/room2-8-scaled.jpg","autoRotate":"-5","default":{"firstScene":"1","sceneFadeDuration":""},"scenes":{"1":{"type":"equirectangular","panorama":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/room2-8-scaled.jpg","pitch":null,"yaw":null,"hfov":100,"maxHfov":120,"minHfov":50,"vaov":180,"haov":360,"hotSpots":[]}}}];var scenes = response[1];if(scenes) {var scenedata = scenes.scenes;for(var i in scenedata) {var scenehotspot = scenedata[i].hotSpots;for(var i = 0; i < scenehotspot.length; i++) {if(scenehotspot[i]["clickHandlerArgs"] != "") {scenehotspot[i]["clickHandlerFunc"] = wpvrhotspot;}if(scenehotspot[i]["createTooltipArgs"] != "") {scenehotspot[i]["createTooltipFunc"] = wpvrtooltip;}}}}var panoshow129 = pannellum.viewer(response[0]["panoid"], scenes);panoshow129.on("load", function (){
            setTimeout(() => {
                window.dispatchEvent(new Event("resize"));
            }, 200);
						if (jQuery("#pano129").children().children(".pnlm-panorama-info:visible").length > 0) {
	               jQuery("#controls129").css("bottom", "55px");
	           }
	           else {
	             jQuery("#controls129").css("bottom", "5px");
	           }
					});panoshow129.on("render", function (){
              window.dispatchEvent(new Event("resize"));
            });
					if (scenes.autoRotate) {
						panoshow129.on("load", function (){
						 setTimeout(function(){ panoshow129.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
						panoshow129.on("scenechange", function (){
						 setTimeout(function(){ panoshow129.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
					}
					var touchtime = 0;
            jQuery(document).on("click","#explainer_button_129",function() {
                jQuery("#explainer129").slideToggle();
            });

            jQuery(document).on("click",".close-explainer-video",function() {
                jQuery(this).parent(".explainer").hide();
                var el_src = jQuery(".vr-iframe").attr("src");
                jQuery(".vr-iframe").attr("src", el_src);
              });


		          jQuery(document).ready(function($){
		              jQuery("#sccontrols129").hide();
                      jQuery(".wpvr_slider_nav").hide();
		              jQuery(".vrgctrl129").html('<i class="fa fa-angle-up"></i>');
		          });

		          var slide129 = "down";
		          jQuery(document).on("click","#vrgcontrols129",function() {

		            if (slide129 == "up") {
		              jQuery(".vrgctrl129").empty();
		              jQuery(".vrgctrl129").html('<i class="fa fa-angle-up"></i>');
		              slide129 = "down";
		            }
		            else {
		              jQuery(".vrgctrl129").empty();
		              jQuery(".vrgctrl129").html('<i class="fa fa-angle-down"></i>');
		              slide129 = "up";
		            }
                    jQuery(".wpvr_slider_nav").slideToggle();
		            jQuery("#sccontrols129").slideToggle();
		          });

                jQuery(document).ready(function(){
                    jQuery("#controls129").hide();
                    jQuery("#zoom-in-out-controls129").hide();
                    jQuery("#adcontrol129").hide();
                    jQuery("#pano129").find(".pnlm-panorama-info").hide();
                });

            panoshow129.on("load", function (){
                    jQuery("#controls129").show();
                    jQuery("#zoom-in-out-controls129").show();
                    jQuery("#adcontrol129").show();
                    jQuery("#pano129").find(".pnlm-panorama-info").show();
            });
            jQuery(".elementor-tab-title").click(function(){
                      var element_id;
                      var pano_id;
                      var element_id = this.id;
                      element_id = element_id.split("-");
                      element_id = element_id[3];
                      jQuery("#elementor-tab-content-"+element_id).children("div").addClass("awwww");
                      var pano_id = jQuery(".awwww").attr("id");
                      jQuery("#elementor-tab-content-"+element_id).children("div").removeClass("awwww");
                      if (pano_id != undefined) {
                        pano_id = pano_id.split("o");
                        pano_id = pano_id[1];
                        if (pano_id == "129") {
                          jQuery("#pano129").children(".pnlm-render-container").remove();
                          jQuery("#pano129").children(".pnlm-ui").remove();
                          panoshow129 = pannellum.viewer(response[0]["panoid"], scenes);
                          jQuery("#pano129").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
                          setTimeout(function() {
                                //   panoshow129.loadScene("1");
                                  window.dispatchEvent(new Event("resize"));
                                  if (jQuery("#pano129").children().children(".pnlm-panorama-info:visible").length > 0) {
                                       jQuery("#controls129").css("bottom", "55px");
                                   }
                                   else {
                                     jQuery("#controls129").css("bottom", "5px");
                                   }

                          }, 200);
                        }
                      }
            });

            jQuery(".geodir-tab-head dd, #vr-tour-tab").click(function(){
              jQuery("#pano129").children(".pnlm-render-container").remove();
              jQuery("#pano129").children(".pnlm-ui").remove();
              panoshow129 = pannellum.viewer(response[0]["panoid"], scenes);
              setTimeout(function() {
                      panoshow129.loadScene("1");
                      window.dispatchEvent(new Event("resize"));
                      if (jQuery("#pano129").children().children(".pnlm-panorama-info:visible").length > 0) {
                           jQuery("#controls129").css("bottom", "55px");
                       }
                       else {
                         jQuery("#controls129").css("bottom", "5px");
                       }
              }, 200);
            });

            jQuery("#pano129").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
            });});
                </script>
            </div>
            <div class="title">2 Bedroom</div>
        </div>
        <div class="col-md-6 box ">
            <div>
                <style>#pano131 div.pnlm-hotspot-base.fas,
                    #pano131 div.pnlm-hotspot-base.fab,
                    #pano131 div.pnlm-hotspot-base.fa,
                    #pano131 div.pnlm-hotspot-base.far {
                        display: block !important;
                        background-color: #00b4ff;
                        color: #fff;
                        border-radius: 100%;
                        width: 30px;
                        height: 30px;
                        animation: icon-pulsepano131 1.5s infinite cubic-bezier(.25, 0, 0, 1);
                    }

                    @-webkit-keyframes icon-pulsepano131 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    @keyframes icon-pulsepano131 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    #pano131 div.pnlm-orientation-button {
                        display: none;
                    }</style>
                <div id="pano131" class="pano-wrap"
                     style=" text-align:center; max-width:100%; width: 600px; height: 400px; margin: 0 auto; direction:ltr;">
                    <div class="explainer" id="explainer131" style="display: none"><span
                            class="close-explainer-video"><i class="fa fa-times"></i></span></div>
                    <div class="wpvr-hotspot-tweak-contents-wrapper" style="display: none"><i class="fa fa-times cross"
                                                                                              data-id="131"></i>
                        <div class="wpvr-hotspot-tweak-contents-flex">
                            <div class="wpvr-hotspot-tweak-contents"></div>
                        </div>
                    </div>
                    <div class="custom-ifram-wrapper" style="display: none;"><i class="fa fa-times cross"
                                                                                data-id="131"></i>
                        <div class="custom-ifram-flex">
                            <div class="custom-ifram"></div>
                        </div>
                    </div>
                </div>
                <script type="rocketlazyloadscript">window.addEventListener('DOMContentLoaded', function() {jQuery(document).ready(function() {var response = [{"panoid":"pano131"},{"autoLoad":false,"showControls":true,"orientationSupport":"false","compass":false,"orientationOnByDefault":false,"mouseZoom":true,"draggable":true,"disableKeyboardCtrl":false,"keyboardZoom":true,"preview":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Bathroom.jpg","autoRotate":"-5","default":{"firstScene":"1","sceneFadeDuration":""},"scenes":{"1":{"type":"equirectangular","panorama":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Bathroom.jpg","pitch":null,"yaw":null,"hfov":100,"maxHfov":120,"minHfov":50,"vaov":180,"haov":360,"hotSpots":[]}}}];var scenes = response[1];if(scenes) {var scenedata = scenes.scenes;for(var i in scenedata) {var scenehotspot = scenedata[i].hotSpots;for(var i = 0; i < scenehotspot.length; i++) {if(scenehotspot[i]["clickHandlerArgs"] != "") {scenehotspot[i]["clickHandlerFunc"] = wpvrhotspot;}if(scenehotspot[i]["createTooltipArgs"] != "") {scenehotspot[i]["createTooltipFunc"] = wpvrtooltip;}}}}var panoshow131 = pannellum.viewer(response[0]["panoid"], scenes);panoshow131.on("load", function (){
            setTimeout(() => {
                window.dispatchEvent(new Event("resize"));
            }, 200);
						if (jQuery("#pano131").children().children(".pnlm-panorama-info:visible").length > 0) {
	               jQuery("#controls131").css("bottom", "55px");
	           }
	           else {
	             jQuery("#controls131").css("bottom", "5px");
	           }
					});panoshow131.on("render", function (){
              window.dispatchEvent(new Event("resize"));
            });
					if (scenes.autoRotate) {
						panoshow131.on("load", function (){
						 setTimeout(function(){ panoshow131.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
						panoshow131.on("scenechange", function (){
						 setTimeout(function(){ panoshow131.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
					}
					var touchtime = 0;
            jQuery(document).on("click","#explainer_button_131",function() {
                jQuery("#explainer131").slideToggle();
            });

            jQuery(document).on("click",".close-explainer-video",function() {
                jQuery(this).parent(".explainer").hide();
                var el_src = jQuery(".vr-iframe").attr("src");
                jQuery(".vr-iframe").attr("src", el_src);
              });


		          jQuery(document).ready(function($){
		              jQuery("#sccontrols131").hide();
                      jQuery(".wpvr_slider_nav").hide();
		              jQuery(".vrgctrl131").html('<i class="fa fa-angle-up"></i>');
		          });

		          var slide131 = "down";
		          jQuery(document).on("click","#vrgcontrols131",function() {

		            if (slide131 == "up") {
		              jQuery(".vrgctrl131").empty();
		              jQuery(".vrgctrl131").html('<i class="fa fa-angle-up"></i>');
		              slide131 = "down";
		            }
		            else {
		              jQuery(".vrgctrl131").empty();
		              jQuery(".vrgctrl131").html('<i class="fa fa-angle-down"></i>');
		              slide131 = "up";
		            }
                    jQuery(".wpvr_slider_nav").slideToggle();
		            jQuery("#sccontrols131").slideToggle();
		          });

                jQuery(document).ready(function(){
                    jQuery("#controls131").hide();
                    jQuery("#zoom-in-out-controls131").hide();
                    jQuery("#adcontrol131").hide();
                    jQuery("#pano131").find(".pnlm-panorama-info").hide();
                });

            panoshow131.on("load", function (){
                    jQuery("#controls131").show();
                    jQuery("#zoom-in-out-controls131").show();
                    jQuery("#adcontrol131").show();
                    jQuery("#pano131").find(".pnlm-panorama-info").show();
            });
            jQuery(".elementor-tab-title").click(function(){
                      var element_id;
                      var pano_id;
                      var element_id = this.id;
                      element_id = element_id.split("-");
                      element_id = element_id[3];
                      jQuery("#elementor-tab-content-"+element_id).children("div").addClass("awwww");
                      var pano_id = jQuery(".awwww").attr("id");
                      jQuery("#elementor-tab-content-"+element_id).children("div").removeClass("awwww");
                      if (pano_id != undefined) {
                        pano_id = pano_id.split("o");
                        pano_id = pano_id[1];
                        if (pano_id == "131") {
                          jQuery("#pano131").children(".pnlm-render-container").remove();
                          jQuery("#pano131").children(".pnlm-ui").remove();
                          panoshow131 = pannellum.viewer(response[0]["panoid"], scenes);
                          jQuery("#pano131").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
                          setTimeout(function() {
                                //   panoshow131.loadScene("1");
                                  window.dispatchEvent(new Event("resize"));
                                  if (jQuery("#pano131").children().children(".pnlm-panorama-info:visible").length > 0) {
                                       jQuery("#controls131").css("bottom", "55px");
                                   }
                                   else {
                                     jQuery("#controls131").css("bottom", "5px");
                                   }

                          }, 200);
                        }
                      }
            });

            jQuery(".geodir-tab-head dd, #vr-tour-tab").click(function(){
              jQuery("#pano131").children(".pnlm-render-container").remove();
              jQuery("#pano131").children(".pnlm-ui").remove();
              panoshow131 = pannellum.viewer(response[0]["panoid"], scenes);
              setTimeout(function() {
                      panoshow131.loadScene("1");
                      window.dispatchEvent(new Event("resize"));
                      if (jQuery("#pano131").children().children(".pnlm-panorama-info:visible").length > 0) {
                           jQuery("#controls131").css("bottom", "55px");
                       }
                       else {
                         jQuery("#controls131").css("bottom", "5px");
                       }
              }, 200);
            });

            jQuery("#pano131").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
            });});
                </script>
            </div>
            <div class="title">Bathroom</div>
        </div>

    </div>
</div>


<div id="Idyll" class="main_title">
    <h2>Idyll</h2>
    <h4> 1 Bedroom Private Pool Villa</h4>
</div>
<div data-bg="https://balihillstonevillas.com/wp-content/uploads/2022/07/chateau-de-bali_3bed-poolvilla.jpg"
     class="imgbg1 rocket-lazyload" style=""></div>


<div class="tectbox margin_30">
    <div class="row">

        <div class="col-md-6">
            <div class="ss">
                <h2>Idyll - View 360</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut aliquet tortor. Vestibulum nec
                    odio quis nunc sodales mattis. Morbi maximus dolor velit, hendrerit egestas arcu cursus tempor.</p>
            </div>
        </div>


        <div class="col-md-6 box ">
            <div>
                <style>#pano92 div.pnlm-hotspot-base.fas,
                    #pano92 div.pnlm-hotspot-base.fab,
                    #pano92 div.pnlm-hotspot-base.fa,
                    #pano92 div.pnlm-hotspot-base.far {
                        display: block !important;
                        background-color: #00b4ff;
                        color: #fff;
                        border-radius: 100%;
                        width: 30px;
                        height: 30px;
                        animation: icon-pulsepano92 1.5s infinite cubic-bezier(.25, 0, 0, 1);
                    }

                    @-webkit-keyframes icon-pulsepano92 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    @keyframes icon-pulsepano92 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    #pano92 div.pnlm-orientation-button {
                        display: none;
                    }</style>
                <div id="pano92" class="pano-wrap"
                     style=" text-align:center; max-width:100%; width: 600px; height: 400px; margin: 0 auto; direction:ltr;">
                    <div class="explainer" id="explainer92" style="display: none"><span class="close-explainer-video"><i
                                class="fa fa-times"></i></span></div>
                    <div class="wpvr-hotspot-tweak-contents-wrapper" style="display: none"><i class="fa fa-times cross"
                                                                                              data-id="92"></i>
                        <div class="wpvr-hotspot-tweak-contents-flex">
                            <div class="wpvr-hotspot-tweak-contents"></div>
                        </div>
                    </div>
                    <div class="custom-ifram-wrapper" style="display: none;"><i class="fa fa-times cross"
                                                                                data-id="92"></i>
                        <div class="custom-ifram-flex">
                            <div class="custom-ifram"></div>
                        </div>
                    </div>
                </div>
                <script type="rocketlazyloadscript">window.addEventListener('DOMContentLoaded', function() {jQuery(document).ready(function() {var response = [{"panoid":"pano92"},{"autoLoad":false,"showControls":true,"orientationSupport":"false","compass":false,"orientationOnByDefault":false,"mouseZoom":true,"draggable":true,"disableKeyboardCtrl":false,"keyboardZoom":true,"preview":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Pool-Garden1.jpg","autoRotate":"-5","default":{"firstScene":"1","sceneFadeDuration":""},"scenes":{"1":{"type":"equirectangular","panorama":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Pool-Garden1.jpg","pitch":null,"yaw":null,"hfov":100,"maxHfov":120,"minHfov":50,"vaov":180,"haov":360,"hotSpots":[]}}}];var scenes = response[1];if(scenes) {var scenedata = scenes.scenes;for(var i in scenedata) {var scenehotspot = scenedata[i].hotSpots;for(var i = 0; i < scenehotspot.length; i++) {if(scenehotspot[i]["clickHandlerArgs"] != "") {scenehotspot[i]["clickHandlerFunc"] = wpvrhotspot;}if(scenehotspot[i]["createTooltipArgs"] != "") {scenehotspot[i]["createTooltipFunc"] = wpvrtooltip;}}}}var panoshow92 = pannellum.viewer(response[0]["panoid"], scenes);panoshow92.on("load", function (){
            setTimeout(() => {
                window.dispatchEvent(new Event("resize"));
            }, 200);
						if (jQuery("#pano92").children().children(".pnlm-panorama-info:visible").length > 0) {
	               jQuery("#controls92").css("bottom", "55px");
	           }
	           else {
	             jQuery("#controls92").css("bottom", "5px");
	           }
					});panoshow92.on("render", function (){
              window.dispatchEvent(new Event("resize"));
            });
					if (scenes.autoRotate) {
						panoshow92.on("load", function (){
						 setTimeout(function(){ panoshow92.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
						panoshow92.on("scenechange", function (){
						 setTimeout(function(){ panoshow92.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
					}
					var touchtime = 0;
            jQuery(document).on("click","#explainer_button_92",function() {
                jQuery("#explainer92").slideToggle();
            });

            jQuery(document).on("click",".close-explainer-video",function() {
                jQuery(this).parent(".explainer").hide();
                var el_src = jQuery(".vr-iframe").attr("src");
                jQuery(".vr-iframe").attr("src", el_src);
              });


		          jQuery(document).ready(function($){
		              jQuery("#sccontrols92").hide();
                      jQuery(".wpvr_slider_nav").hide();
		              jQuery(".vrgctrl92").html('<i class="fa fa-angle-up"></i>');
		          });

		          var slide92 = "down";
		          jQuery(document).on("click","#vrgcontrols92",function() {

		            if (slide92 == "up") {
		              jQuery(".vrgctrl92").empty();
		              jQuery(".vrgctrl92").html('<i class="fa fa-angle-up"></i>');
		              slide92 = "down";
		            }
		            else {
		              jQuery(".vrgctrl92").empty();
		              jQuery(".vrgctrl92").html('<i class="fa fa-angle-down"></i>');
		              slide92 = "up";
		            }
                    jQuery(".wpvr_slider_nav").slideToggle();
		            jQuery("#sccontrols92").slideToggle();
		          });

                jQuery(document).ready(function(){
                    jQuery("#controls92").hide();
                    jQuery("#zoom-in-out-controls92").hide();
                    jQuery("#adcontrol92").hide();
                    jQuery("#pano92").find(".pnlm-panorama-info").hide();
                });

            panoshow92.on("load", function (){
                    jQuery("#controls92").show();
                    jQuery("#zoom-in-out-controls92").show();
                    jQuery("#adcontrol92").show();
                    jQuery("#pano92").find(".pnlm-panorama-info").show();
            });
            jQuery(".elementor-tab-title").click(function(){
                      var element_id;
                      var pano_id;
                      var element_id = this.id;
                      element_id = element_id.split("-");
                      element_id = element_id[3];
                      jQuery("#elementor-tab-content-"+element_id).children("div").addClass("awwww");
                      var pano_id = jQuery(".awwww").attr("id");
                      jQuery("#elementor-tab-content-"+element_id).children("div").removeClass("awwww");
                      if (pano_id != undefined) {
                        pano_id = pano_id.split("o");
                        pano_id = pano_id[1];
                        if (pano_id == "92") {
                          jQuery("#pano92").children(".pnlm-render-container").remove();
                          jQuery("#pano92").children(".pnlm-ui").remove();
                          panoshow92 = pannellum.viewer(response[0]["panoid"], scenes);
                          jQuery("#pano92").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
                          setTimeout(function() {
                                //   panoshow92.loadScene("1");
                                  window.dispatchEvent(new Event("resize"));
                                  if (jQuery("#pano92").children().children(".pnlm-panorama-info:visible").length > 0) {
                                       jQuery("#controls92").css("bottom", "55px");
                                   }
                                   else {
                                     jQuery("#controls92").css("bottom", "5px");
                                   }

                          }, 200);
                        }
                      }
            });

            jQuery(".geodir-tab-head dd, #vr-tour-tab").click(function(){
              jQuery("#pano92").children(".pnlm-render-container").remove();
              jQuery("#pano92").children(".pnlm-ui").remove();
              panoshow92 = pannellum.viewer(response[0]["panoid"], scenes);
              setTimeout(function() {
                      panoshow92.loadScene("1");
                      window.dispatchEvent(new Event("resize"));
                      if (jQuery("#pano92").children().children(".pnlm-panorama-info:visible").length > 0) {
                           jQuery("#controls92").css("bottom", "55px");
                       }
                       else {
                         jQuery("#controls92").css("bottom", "5px");
                       }
              }, 200);
            });

            jQuery("#pano92").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
            });});
                </script>
            </div>
            <div class="title">Pool & Garden</div>
        </div>
        <div class="col-md-6 box ">
            <div>
                <style>#pano96 div.pnlm-hotspot-base.fas,
                    #pano96 div.pnlm-hotspot-base.fab,
                    #pano96 div.pnlm-hotspot-base.fa,
                    #pano96 div.pnlm-hotspot-base.far {
                        display: block !important;
                        background-color: #00b4ff;
                        color: #fff;
                        border-radius: 100%;
                        width: 30px;
                        height: 30px;
                        animation: icon-pulsepano96 1.5s infinite cubic-bezier(.25, 0, 0, 1);
                    }

                    @-webkit-keyframes icon-pulsepano96 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    @keyframes icon-pulsepano96 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    #pano96 div.pnlm-orientation-button {
                        display: none;
                    }</style>
                <div id="pano96" class="pano-wrap"
                     style=" text-align:center; max-width:100%; width: 600px; height: 400px; margin: 0 auto; direction:ltr;">
                    <div class="explainer" id="explainer96" style="display: none"><span class="close-explainer-video"><i
                                class="fa fa-times"></i></span></div>
                    <div class="wpvr-hotspot-tweak-contents-wrapper" style="display: none"><i class="fa fa-times cross"
                                                                                              data-id="96"></i>
                        <div class="wpvr-hotspot-tweak-contents-flex">
                            <div class="wpvr-hotspot-tweak-contents"></div>
                        </div>
                    </div>
                    <div class="custom-ifram-wrapper" style="display: none;"><i class="fa fa-times cross"
                                                                                data-id="96"></i>
                        <div class="custom-ifram-flex">
                            <div class="custom-ifram"></div>
                        </div>
                    </div>
                </div>
                <script type="rocketlazyloadscript">window.addEventListener('DOMContentLoaded', function() {jQuery(document).ready(function() {var response = [{"panoid":"pano96"},{"autoLoad":false,"showControls":true,"orientationSupport":"false","compass":false,"orientationOnByDefault":false,"mouseZoom":true,"draggable":true,"disableKeyboardCtrl":false,"keyboardZoom":true,"preview":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Dining-Room-Kitchen.jpg","autoRotate":"-5","default":{"firstScene":"1","sceneFadeDuration":""},"scenes":{"1":{"type":"equirectangular","panorama":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Dining-Room-Kitchen.jpg","pitch":null,"yaw":null,"hfov":100,"maxHfov":120,"minHfov":50,"vaov":180,"haov":360,"hotSpots":[]}}}];var scenes = response[1];if(scenes) {var scenedata = scenes.scenes;for(var i in scenedata) {var scenehotspot = scenedata[i].hotSpots;for(var i = 0; i < scenehotspot.length; i++) {if(scenehotspot[i]["clickHandlerArgs"] != "") {scenehotspot[i]["clickHandlerFunc"] = wpvrhotspot;}if(scenehotspot[i]["createTooltipArgs"] != "") {scenehotspot[i]["createTooltipFunc"] = wpvrtooltip;}}}}var panoshow96 = pannellum.viewer(response[0]["panoid"], scenes);panoshow96.on("load", function (){
            setTimeout(() => {
                window.dispatchEvent(new Event("resize"));
            }, 200);
						if (jQuery("#pano96").children().children(".pnlm-panorama-info:visible").length > 0) {
	               jQuery("#controls96").css("bottom", "55px");
	           }
	           else {
	             jQuery("#controls96").css("bottom", "5px");
	           }
					});panoshow96.on("render", function (){
              window.dispatchEvent(new Event("resize"));
            });
					if (scenes.autoRotate) {
						panoshow96.on("load", function (){
						 setTimeout(function(){ panoshow96.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
						panoshow96.on("scenechange", function (){
						 setTimeout(function(){ panoshow96.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
					}
					var touchtime = 0;
            jQuery(document).on("click","#explainer_button_96",function() {
                jQuery("#explainer96").slideToggle();
            });

            jQuery(document).on("click",".close-explainer-video",function() {
                jQuery(this).parent(".explainer").hide();
                var el_src = jQuery(".vr-iframe").attr("src");
                jQuery(".vr-iframe").attr("src", el_src);
              });


		          jQuery(document).ready(function($){
		              jQuery("#sccontrols96").hide();
                      jQuery(".wpvr_slider_nav").hide();
		              jQuery(".vrgctrl96").html('<i class="fa fa-angle-up"></i>');
		          });

		          var slide96 = "down";
		          jQuery(document).on("click","#vrgcontrols96",function() {

		            if (slide96 == "up") {
		              jQuery(".vrgctrl96").empty();
		              jQuery(".vrgctrl96").html('<i class="fa fa-angle-up"></i>');
		              slide96 = "down";
		            }
		            else {
		              jQuery(".vrgctrl96").empty();
		              jQuery(".vrgctrl96").html('<i class="fa fa-angle-down"></i>');
		              slide96 = "up";
		            }
                    jQuery(".wpvr_slider_nav").slideToggle();
		            jQuery("#sccontrols96").slideToggle();
		          });

                jQuery(document).ready(function(){
                    jQuery("#controls96").hide();
                    jQuery("#zoom-in-out-controls96").hide();
                    jQuery("#adcontrol96").hide();
                    jQuery("#pano96").find(".pnlm-panorama-info").hide();
                });

            panoshow96.on("load", function (){
                    jQuery("#controls96").show();
                    jQuery("#zoom-in-out-controls96").show();
                    jQuery("#adcontrol96").show();
                    jQuery("#pano96").find(".pnlm-panorama-info").show();
            });
            jQuery(".elementor-tab-title").click(function(){
                      var element_id;
                      var pano_id;
                      var element_id = this.id;
                      element_id = element_id.split("-");
                      element_id = element_id[3];
                      jQuery("#elementor-tab-content-"+element_id).children("div").addClass("awwww");
                      var pano_id = jQuery(".awwww").attr("id");
                      jQuery("#elementor-tab-content-"+element_id).children("div").removeClass("awwww");
                      if (pano_id != undefined) {
                        pano_id = pano_id.split("o");
                        pano_id = pano_id[1];
                        if (pano_id == "96") {
                          jQuery("#pano96").children(".pnlm-render-container").remove();
                          jQuery("#pano96").children(".pnlm-ui").remove();
                          panoshow96 = pannellum.viewer(response[0]["panoid"], scenes);
                          jQuery("#pano96").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
                          setTimeout(function() {
                                //   panoshow96.loadScene("1");
                                  window.dispatchEvent(new Event("resize"));
                                  if (jQuery("#pano96").children().children(".pnlm-panorama-info:visible").length > 0) {
                                       jQuery("#controls96").css("bottom", "55px");
                                   }
                                   else {
                                     jQuery("#controls96").css("bottom", "5px");
                                   }

                          }, 200);
                        }
                      }
            });

            jQuery(".geodir-tab-head dd, #vr-tour-tab").click(function(){
              jQuery("#pano96").children(".pnlm-render-container").remove();
              jQuery("#pano96").children(".pnlm-ui").remove();
              panoshow96 = pannellum.viewer(response[0]["panoid"], scenes);
              setTimeout(function() {
                      panoshow96.loadScene("1");
                      window.dispatchEvent(new Event("resize"));
                      if (jQuery("#pano96").children().children(".pnlm-panorama-info:visible").length > 0) {
                           jQuery("#controls96").css("bottom", "55px");
                       }
                       else {
                         jQuery("#controls96").css("bottom", "5px");
                       }
              }, 200);
            });

            jQuery("#pano96").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
            });});
                </script>
            </div>
            <div class="title">Living Room</div>
        </div>
        <div class="col-md-6 box ">
            <div>
                <style>#pano88 div.pnlm-hotspot-base.fas,
                    #pano88 div.pnlm-hotspot-base.fab,
                    #pano88 div.pnlm-hotspot-base.fa,
                    #pano88 div.pnlm-hotspot-base.far {
                        display: block !important;
                        background-color: #00b4ff;
                        color: #fff;
                        border-radius: 100%;
                        width: 30px;
                        height: 30px;
                        animation: icon-pulsepano88 1.5s infinite cubic-bezier(.25, 0, 0, 1);
                    }

                    @-webkit-keyframes icon-pulsepano88 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    @keyframes icon-pulsepano88 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    #pano88 div.pnlm-orientation-button {
                        display: none;
                    }</style>
                <div id="pano88" class="pano-wrap"
                     style=" text-align:center; max-width:100%; width: 600px; height: 400px; margin: 0 auto; direction:ltr;">
                    <div class="explainer" id="explainer88" style="display: none"><span class="close-explainer-video"><i
                                class="fa fa-times"></i></span></div>
                    <div class="wpvr-hotspot-tweak-contents-wrapper" style="display: none"><i class="fa fa-times cross"
                                                                                              data-id="88"></i>
                        <div class="wpvr-hotspot-tweak-contents-flex">
                            <div class="wpvr-hotspot-tweak-contents"></div>
                        </div>
                    </div>
                    <div class="custom-ifram-wrapper" style="display: none;"><i class="fa fa-times cross"
                                                                                data-id="88"></i>
                        <div class="custom-ifram-flex">
                            <div class="custom-ifram"></div>
                        </div>
                    </div>
                </div>
                <script type="rocketlazyloadscript">window.addEventListener('DOMContentLoaded', function() {jQuery(document).ready(function() {var response = [{"panoid":"pano88"},{"autoLoad":false,"showControls":true,"orientationSupport":"false","compass":false,"orientationOnByDefault":false,"mouseZoom":true,"draggable":true,"disableKeyboardCtrl":false,"keyboardZoom":true,"preview":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/1.jpg","autoRotate":"-5","default":{"firstScene":"1","sceneFadeDuration":""},"scenes":{"1":{"type":"equirectangular","panorama":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/1.jpg","pitch":null,"yaw":null,"hfov":100,"maxHfov":120,"minHfov":50,"vaov":180,"haov":360,"hotSpots":[]}}}];var scenes = response[1];if(scenes) {var scenedata = scenes.scenes;for(var i in scenedata) {var scenehotspot = scenedata[i].hotSpots;for(var i = 0; i < scenehotspot.length; i++) {if(scenehotspot[i]["clickHandlerArgs"] != "") {scenehotspot[i]["clickHandlerFunc"] = wpvrhotspot;}if(scenehotspot[i]["createTooltipArgs"] != "") {scenehotspot[i]["createTooltipFunc"] = wpvrtooltip;}}}}var panoshow88 = pannellum.viewer(response[0]["panoid"], scenes);panoshow88.on("load", function (){
            setTimeout(() => {
                window.dispatchEvent(new Event("resize"));
            }, 200);
						if (jQuery("#pano88").children().children(".pnlm-panorama-info:visible").length > 0) {
	               jQuery("#controls88").css("bottom", "55px");
	           }
	           else {
	             jQuery("#controls88").css("bottom", "5px");
	           }
					});panoshow88.on("render", function (){
              window.dispatchEvent(new Event("resize"));
            });
					if (scenes.autoRotate) {
						panoshow88.on("load", function (){
						 setTimeout(function(){ panoshow88.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
						panoshow88.on("scenechange", function (){
						 setTimeout(function(){ panoshow88.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
					}
					var touchtime = 0;
            jQuery(document).on("click","#explainer_button_88",function() {
                jQuery("#explainer88").slideToggle();
            });

            jQuery(document).on("click",".close-explainer-video",function() {
                jQuery(this).parent(".explainer").hide();
                var el_src = jQuery(".vr-iframe").attr("src");
                jQuery(".vr-iframe").attr("src", el_src);
              });


		          jQuery(document).ready(function($){
		              jQuery("#sccontrols88").hide();
                      jQuery(".wpvr_slider_nav").hide();
		              jQuery(".vrgctrl88").html('<i class="fa fa-angle-up"></i>');
		          });

		          var slide88 = "down";
		          jQuery(document).on("click","#vrgcontrols88",function() {

		            if (slide88 == "up") {
		              jQuery(".vrgctrl88").empty();
		              jQuery(".vrgctrl88").html('<i class="fa fa-angle-up"></i>');
		              slide88 = "down";
		            }
		            else {
		              jQuery(".vrgctrl88").empty();
		              jQuery(".vrgctrl88").html('<i class="fa fa-angle-down"></i>');
		              slide88 = "up";
		            }
                    jQuery(".wpvr_slider_nav").slideToggle();
		            jQuery("#sccontrols88").slideToggle();
		          });

                jQuery(document).ready(function(){
                    jQuery("#controls88").hide();
                    jQuery("#zoom-in-out-controls88").hide();
                    jQuery("#adcontrol88").hide();
                    jQuery("#pano88").find(".pnlm-panorama-info").hide();
                });

            panoshow88.on("load", function (){
                    jQuery("#controls88").show();
                    jQuery("#zoom-in-out-controls88").show();
                    jQuery("#adcontrol88").show();
                    jQuery("#pano88").find(".pnlm-panorama-info").show();
            });
            jQuery(".elementor-tab-title").click(function(){
                      var element_id;
                      var pano_id;
                      var element_id = this.id;
                      element_id = element_id.split("-");
                      element_id = element_id[3];
                      jQuery("#elementor-tab-content-"+element_id).children("div").addClass("awwww");
                      var pano_id = jQuery(".awwww").attr("id");
                      jQuery("#elementor-tab-content-"+element_id).children("div").removeClass("awwww");
                      if (pano_id != undefined) {
                        pano_id = pano_id.split("o");
                        pano_id = pano_id[1];
                        if (pano_id == "88") {
                          jQuery("#pano88").children(".pnlm-render-container").remove();
                          jQuery("#pano88").children(".pnlm-ui").remove();
                          panoshow88 = pannellum.viewer(response[0]["panoid"], scenes);
                          jQuery("#pano88").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
                          setTimeout(function() {
                                //   panoshow88.loadScene("1");
                                  window.dispatchEvent(new Event("resize"));
                                  if (jQuery("#pano88").children().children(".pnlm-panorama-info:visible").length > 0) {
                                       jQuery("#controls88").css("bottom", "55px");
                                   }
                                   else {
                                     jQuery("#controls88").css("bottom", "5px");
                                   }

                          }, 200);
                        }
                      }
            });

            jQuery(".geodir-tab-head dd, #vr-tour-tab").click(function(){
              jQuery("#pano88").children(".pnlm-render-container").remove();
              jQuery("#pano88").children(".pnlm-ui").remove();
              panoshow88 = pannellum.viewer(response[0]["panoid"], scenes);
              setTimeout(function() {
                      panoshow88.loadScene("1");
                      window.dispatchEvent(new Event("resize"));
                      if (jQuery("#pano88").children().children(".pnlm-panorama-info:visible").length > 0) {
                           jQuery("#controls88").css("bottom", "55px");
                       }
                       else {
                         jQuery("#controls88").css("bottom", "5px");
                       }
              }, 200);
            });

            jQuery("#pano88").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
            });});
                </script>
            </div>
            <div class="title">Dning Room & Kitchen</div>
        </div>
        <div class="col-md-6 box ">
            <div>
                <style>#pano84 div.pnlm-hotspot-base.fas,
                    #pano84 div.pnlm-hotspot-base.fab,
                    #pano84 div.pnlm-hotspot-base.fa,
                    #pano84 div.pnlm-hotspot-base.far {
                        display: block !important;
                        background-color: #00b4ff;
                        color: #fff;
                        border-radius: 100%;
                        width: 30px;
                        height: 30px;
                        animation: icon-pulsepano84 1.5s infinite cubic-bezier(.25, 0, 0, 1);
                    }

                    @-webkit-keyframes icon-pulsepano84 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    @keyframes icon-pulsepano84 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    #pano84 div.pnlm-orientation-button {
                        display: none;
                    }</style>
                <div id="pano84" class="pano-wrap"
                     style=" text-align:center; max-width:100%; width: 600px; height: 400px; margin: 0 auto; direction:ltr;">
                    <div class="explainer" id="explainer84" style="display: none"><span class="close-explainer-video"><i
                                class="fa fa-times"></i></span></div>
                    <div class="wpvr-hotspot-tweak-contents-wrapper" style="display: none"><i class="fa fa-times cross"
                                                                                              data-id="84"></i>
                        <div class="wpvr-hotspot-tweak-contents-flex">
                            <div class="wpvr-hotspot-tweak-contents"></div>
                        </div>
                    </div>
                    <div class="custom-ifram-wrapper" style="display: none;"><i class="fa fa-times cross"
                                                                                data-id="84"></i>
                        <div class="custom-ifram-flex">
                            <div class="custom-ifram"></div>
                        </div>
                    </div>
                </div>
                <script type="rocketlazyloadscript">window.addEventListener('DOMContentLoaded', function() {jQuery(document).ready(function() {var response = [{"panoid":"pano84"},{"autoLoad":false,"showControls":true,"orientationSupport":"false","compass":false,"orientationOnByDefault":false,"mouseZoom":true,"draggable":true,"disableKeyboardCtrl":false,"keyboardZoom":true,"preview":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Living-Room.jpg","autoRotate":"-5","default":{"firstScene":"1","sceneFadeDuration":""},"scenes":{"1":{"type":"equirectangular","panorama":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Living-Room.jpg","pitch":null,"yaw":null,"hfov":100,"maxHfov":120,"minHfov":50,"vaov":180,"haov":360,"hotSpots":[]}}}];var scenes = response[1];if(scenes) {var scenedata = scenes.scenes;for(var i in scenedata) {var scenehotspot = scenedata[i].hotSpots;for(var i = 0; i < scenehotspot.length; i++) {if(scenehotspot[i]["clickHandlerArgs"] != "") {scenehotspot[i]["clickHandlerFunc"] = wpvrhotspot;}if(scenehotspot[i]["createTooltipArgs"] != "") {scenehotspot[i]["createTooltipFunc"] = wpvrtooltip;}}}}var panoshow84 = pannellum.viewer(response[0]["panoid"], scenes);panoshow84.on("load", function (){
            setTimeout(() => {
                window.dispatchEvent(new Event("resize"));
            }, 200);
						if (jQuery("#pano84").children().children(".pnlm-panorama-info:visible").length > 0) {
	               jQuery("#controls84").css("bottom", "55px");
	           }
	           else {
	             jQuery("#controls84").css("bottom", "5px");
	           }
					});panoshow84.on("render", function (){
              window.dispatchEvent(new Event("resize"));
            });
					if (scenes.autoRotate) {
						panoshow84.on("load", function (){
						 setTimeout(function(){ panoshow84.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
						panoshow84.on("scenechange", function (){
						 setTimeout(function(){ panoshow84.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
					}
					var touchtime = 0;
            jQuery(document).on("click","#explainer_button_84",function() {
                jQuery("#explainer84").slideToggle();
            });

            jQuery(document).on("click",".close-explainer-video",function() {
                jQuery(this).parent(".explainer").hide();
                var el_src = jQuery(".vr-iframe").attr("src");
                jQuery(".vr-iframe").attr("src", el_src);
              });


		          jQuery(document).ready(function($){
		              jQuery("#sccontrols84").hide();
                      jQuery(".wpvr_slider_nav").hide();
		              jQuery(".vrgctrl84").html('<i class="fa fa-angle-up"></i>');
		          });

		          var slide84 = "down";
		          jQuery(document).on("click","#vrgcontrols84",function() {

		            if (slide84 == "up") {
		              jQuery(".vrgctrl84").empty();
		              jQuery(".vrgctrl84").html('<i class="fa fa-angle-up"></i>');
		              slide84 = "down";
		            }
		            else {
		              jQuery(".vrgctrl84").empty();
		              jQuery(".vrgctrl84").html('<i class="fa fa-angle-down"></i>');
		              slide84 = "up";
		            }
                    jQuery(".wpvr_slider_nav").slideToggle();
		            jQuery("#sccontrols84").slideToggle();
		          });

                jQuery(document).ready(function(){
                    jQuery("#controls84").hide();
                    jQuery("#zoom-in-out-controls84").hide();
                    jQuery("#adcontrol84").hide();
                    jQuery("#pano84").find(".pnlm-panorama-info").hide();
                });

            panoshow84.on("load", function (){
                    jQuery("#controls84").show();
                    jQuery("#zoom-in-out-controls84").show();
                    jQuery("#adcontrol84").show();
                    jQuery("#pano84").find(".pnlm-panorama-info").show();
            });
            jQuery(".elementor-tab-title").click(function(){
                      var element_id;
                      var pano_id;
                      var element_id = this.id;
                      element_id = element_id.split("-");
                      element_id = element_id[3];
                      jQuery("#elementor-tab-content-"+element_id).children("div").addClass("awwww");
                      var pano_id = jQuery(".awwww").attr("id");
                      jQuery("#elementor-tab-content-"+element_id).children("div").removeClass("awwww");
                      if (pano_id != undefined) {
                        pano_id = pano_id.split("o");
                        pano_id = pano_id[1];
                        if (pano_id == "84") {
                          jQuery("#pano84").children(".pnlm-render-container").remove();
                          jQuery("#pano84").children(".pnlm-ui").remove();
                          panoshow84 = pannellum.viewer(response[0]["panoid"], scenes);
                          jQuery("#pano84").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
                          setTimeout(function() {
                                //   panoshow84.loadScene("1");
                                  window.dispatchEvent(new Event("resize"));
                                  if (jQuery("#pano84").children().children(".pnlm-panorama-info:visible").length > 0) {
                                       jQuery("#controls84").css("bottom", "55px");
                                   }
                                   else {
                                     jQuery("#controls84").css("bottom", "5px");
                                   }

                          }, 200);
                        }
                      }
            });

            jQuery(".geodir-tab-head dd, #vr-tour-tab").click(function(){
              jQuery("#pano84").children(".pnlm-render-container").remove();
              jQuery("#pano84").children(".pnlm-ui").remove();
              panoshow84 = pannellum.viewer(response[0]["panoid"], scenes);
              setTimeout(function() {
                      panoshow84.loadScene("1");
                      window.dispatchEvent(new Event("resize"));
                      if (jQuery("#pano84").children().children(".pnlm-panorama-info:visible").length > 0) {
                           jQuery("#controls84").css("bottom", "55px");
                       }
                       else {
                         jQuery("#controls84").css("bottom", "5px");
                       }
              }, 200);
            });

            jQuery("#pano84").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
            });});
                </script>
            </div>
            <div class="title">1 Bedroom</div>
        </div>
        <div class="col-md-6 box ">
            <div>
                <style>#pano99 div.pnlm-hotspot-base.fas,
                    #pano99 div.pnlm-hotspot-base.fab,
                    #pano99 div.pnlm-hotspot-base.fa,
                    #pano99 div.pnlm-hotspot-base.far {
                        display: block !important;
                        background-color: #00b4ff;
                        color: #fff;
                        border-radius: 100%;
                        width: 30px;
                        height: 30px;
                        animation: icon-pulsepano99 1.5s infinite cubic-bezier(.25, 0, 0, 1);
                    }

                    @-webkit-keyframes icon-pulsepano99 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    @keyframes icon-pulsepano99 {
                        0% {
                            box-shadow: 0 0 0 0px rgba(0, 180, 255, 1);
                        }
                        100% {
                            box-shadow: 0 0 0 10px rgba(0, 180, 255, 0);
                        }
                    }

                    #pano99 div.pnlm-orientation-button {
                        display: none;
                    }</style>
                <div id="pano99" class="pano-wrap"
                     style=" text-align:center; max-width:100%; width: 600px; height: 400px; margin: 0 auto; direction:ltr;">
                    <div class="explainer" id="explainer99" style="display: none"><span class="close-explainer-video"><i
                                class="fa fa-times"></i></span></div>
                    <div class="wpvr-hotspot-tweak-contents-wrapper" style="display: none"><i class="fa fa-times cross"
                                                                                              data-id="99"></i>
                        <div class="wpvr-hotspot-tweak-contents-flex">
                            <div class="wpvr-hotspot-tweak-contents"></div>
                        </div>
                    </div>
                    <div class="custom-ifram-wrapper" style="display: none;"><i class="fa fa-times cross"
                                                                                data-id="99"></i>
                        <div class="custom-ifram-flex">
                            <div class="custom-ifram"></div>
                        </div>
                    </div>
                </div>
                <script type="rocketlazyloadscript">window.addEventListener('DOMContentLoaded', function() {jQuery(document).ready(function() {var response = [{"panoid":"pano99"},{"autoLoad":false,"showControls":true,"orientationSupport":"false","compass":false,"orientationOnByDefault":false,"mouseZoom":true,"draggable":true,"disableKeyboardCtrl":false,"keyboardZoom":true,"preview":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Bathroom.jpg","autoRotate":"-5","default":{"firstScene":"1","sceneFadeDuration":""},"scenes":{"1":{"type":"equirectangular","panorama":"https:\/\/balihillstonevillas.com\/wp-content\/uploads\/2022\/07\/Bathroom.jpg","pitch":null,"yaw":null,"hfov":100,"maxHfov":120,"minHfov":50,"vaov":180,"haov":360,"hotSpots":[]}}}];var scenes = response[1];if(scenes) {var scenedata = scenes.scenes;for(var i in scenedata) {var scenehotspot = scenedata[i].hotSpots;for(var i = 0; i < scenehotspot.length; i++) {if(scenehotspot[i]["clickHandlerArgs"] != "") {scenehotspot[i]["clickHandlerFunc"] = wpvrhotspot;}if(scenehotspot[i]["createTooltipArgs"] != "") {scenehotspot[i]["createTooltipFunc"] = wpvrtooltip;}}}}var panoshow99 = pannellum.viewer(response[0]["panoid"], scenes);panoshow99.on("load", function (){
            setTimeout(() => {
                window.dispatchEvent(new Event("resize"));
            }, 200);
						if (jQuery("#pano99").children().children(".pnlm-panorama-info:visible").length > 0) {
	               jQuery("#controls99").css("bottom", "55px");
	           }
	           else {
	             jQuery("#controls99").css("bottom", "5px");
	           }
					});panoshow99.on("render", function (){
              window.dispatchEvent(new Event("resize"));
            });
					if (scenes.autoRotate) {
						panoshow99.on("load", function (){
						 setTimeout(function(){ panoshow99.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
						panoshow99.on("scenechange", function (){
						 setTimeout(function(){ panoshow99.startAutoRotate(scenes.autoRotate, 0); }, 3000);
						});
					}
					var touchtime = 0;
            jQuery(document).on("click","#explainer_button_99",function() {
                jQuery("#explainer99").slideToggle();
            });

            jQuery(document).on("click",".close-explainer-video",function() {
                jQuery(this).parent(".explainer").hide();
                var el_src = jQuery(".vr-iframe").attr("src");
                jQuery(".vr-iframe").attr("src", el_src);
              });


		          jQuery(document).ready(function($){
		              jQuery("#sccontrols99").hide();
                      jQuery(".wpvr_slider_nav").hide();
		              jQuery(".vrgctrl99").html('<i class="fa fa-angle-up"></i>');
		          });

		          var slide99 = "down";
		          jQuery(document).on("click","#vrgcontrols99",function() {

		            if (slide99 == "up") {
		              jQuery(".vrgctrl99").empty();
		              jQuery(".vrgctrl99").html('<i class="fa fa-angle-up"></i>');
		              slide99 = "down";
		            }
		            else {
		              jQuery(".vrgctrl99").empty();
		              jQuery(".vrgctrl99").html('<i class="fa fa-angle-down"></i>');
		              slide99 = "up";
		            }
                    jQuery(".wpvr_slider_nav").slideToggle();
		            jQuery("#sccontrols99").slideToggle();
		          });

                jQuery(document).ready(function(){
                    jQuery("#controls99").hide();
                    jQuery("#zoom-in-out-controls99").hide();
                    jQuery("#adcontrol99").hide();
                    jQuery("#pano99").find(".pnlm-panorama-info").hide();
                });

            panoshow99.on("load", function (){
                    jQuery("#controls99").show();
                    jQuery("#zoom-in-out-controls99").show();
                    jQuery("#adcontrol99").show();
                    jQuery("#pano99").find(".pnlm-panorama-info").show();
            });
            jQuery(".elementor-tab-title").click(function(){
                      var element_id;
                      var pano_id;
                      var element_id = this.id;
                      element_id = element_id.split("-");
                      element_id = element_id[3];
                      jQuery("#elementor-tab-content-"+element_id).children("div").addClass("awwww");
                      var pano_id = jQuery(".awwww").attr("id");
                      jQuery("#elementor-tab-content-"+element_id).children("div").removeClass("awwww");
                      if (pano_id != undefined) {
                        pano_id = pano_id.split("o");
                        pano_id = pano_id[1];
                        if (pano_id == "99") {
                          jQuery("#pano99").children(".pnlm-render-container").remove();
                          jQuery("#pano99").children(".pnlm-ui").remove();
                          panoshow99 = pannellum.viewer(response[0]["panoid"], scenes);
                          jQuery("#pano99").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
                          setTimeout(function() {
                                //   panoshow99.loadScene("1");
                                  window.dispatchEvent(new Event("resize"));
                                  if (jQuery("#pano99").children().children(".pnlm-panorama-info:visible").length > 0) {
                                       jQuery("#controls99").css("bottom", "55px");
                                   }
                                   else {
                                     jQuery("#controls99").css("bottom", "5px");
                                   }

                          }, 200);
                        }
                      }
            });

            jQuery(".geodir-tab-head dd, #vr-tour-tab").click(function(){
              jQuery("#pano99").children(".pnlm-render-container").remove();
              jQuery("#pano99").children(".pnlm-ui").remove();
              panoshow99 = pannellum.viewer(response[0]["panoid"], scenes);
              setTimeout(function() {
                      panoshow99.loadScene("1");
                      window.dispatchEvent(new Event("resize"));
                      if (jQuery("#pano99").children().children(".pnlm-panorama-info:visible").length > 0) {
                           jQuery("#controls99").css("bottom", "55px");
                       }
                       else {
                         jQuery("#controls99").css("bottom", "5px");
                       }
              }, 200);
            });

            jQuery("#pano99").children(".pnlm-ui").find(".pnlm-load-button p").text("Click To Load")
            });});
                </script>
            </div>
            <div class="title">Bathroom</div>
        </div>

    </div>
</div>


<!--New Lifestyle Experience-->

<div id="lifestyle" class="top_banner ">
    <div class="opacity-mask d-flex align-items-center">
        <div class="container">
            <h1>New Lifestyle Experience</h1>

        </div>
    </div>
</div>

<div id="archive" class="tectbox margin_60 ">
    <div class="container ">
        <div class="row">


            <div class="col-md-6">
                <article class="blog lifestyle">

                    <div class="post_info text-center">
                        <span class="before adeli">Before</span>
                        <h2>DINING</h2>
                        on the dining table
                    </div>

                    <figure>

                        <img class="fadeover"
                             src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                             data-lazy-src="https://balihillstonevillas.com/wp-content/uploads/2022/07/WhatsApp-Image-2022-07-20-at-12.13.28-620x450.jpeg"/>
                        <noscript><img class="fadeover"
                                       src="https://balihillstonevillas.com/wp-content/uploads/2022/07/WhatsApp-Image-2022-07-20-at-12.13.28-620x450.jpeg"/>
                        </noscript>


                        <figcaption>New Lifestyle</figcaption>
                    </figure>


                </article>
                <!-- /article -->
            </div>

            <div class="col-md-6">
                <article class="blog lifestyle">

                    <div class="post_info text-center">
                        <span class="before adeli">Before</span>
                        <h2>WORK</h2>
                        in the closed room
                    </div>

                    <figure>

                        <img class="fadeover"
                             src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                             data-lazy-src="https://balihillstonevillas.com/wp-content/uploads/2022/07/work-in-the-closed-room-620x450.jpeg"/>
                        <noscript><img class="fadeover"
                                       src="https://balihillstonevillas.com/wp-content/uploads/2022/07/work-in-the-closed-room-620x450.jpeg"/>
                        </noscript>


                        <figcaption>New Lifestyle</figcaption>
                    </figure>


                </article>
                <!-- /article -->
            </div>

            <div class="col-md-6">
                <article class="blog lifestyle">

                    <div class="post_info text-center">
                        <span class="before adeli">Before</span>
                        <h2>AFTERWORK</h2>
                        driving stuck in the traffic situation
                    </div>

                    <figure>

                        <img class="fadeover"
                             src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                             data-lazy-src="https://balihillstonevillas.com/wp-content/uploads/2022/07/afterwork-620x450.jpg"/>
                        <noscript><img class="fadeover"
                                       src="https://balihillstonevillas.com/wp-content/uploads/2022/07/afterwork-620x450.jpg"/>
                        </noscript>


                        <figcaption>New Lifestyle</figcaption>
                    </figure>


                </article>
                <!-- /article -->
            </div>

            <div class="col-md-6">
                <article class="blog lifestyle">

                    <div class="post_info text-center">
                        <span class="before adeli">Before</span>
                        <h2>WEEKEND</h2>
                        by watching TV at home
                    </div>

                    <figure>

                        <img class="fadeover"
                             src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                             data-lazy-src="https://balihillstonevillas.com/wp-content/uploads/2022/07/weekend-1-620x450.jpg"/>
                        <noscript><img class="fadeover"
                                       src="https://balihillstonevillas.com/wp-content/uploads/2022/07/weekend-1-620x450.jpg"/>
                        </noscript>


                        <figcaption>New Lifestyle</figcaption>
                    </figure>


                </article>
                <!-- /article -->
            </div>
        </div>
    </div>
</div>


<!--CONTACT-->


<div id="contact" class="top_banner">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
        <div class="container">
            <h1>Contact Us</h1>
        </div>
    </div>
</div>

<div class="container-fluid contact">
    <div class="row">
        <div class="container">
            <div class="main_title">
                <p>Book Your Dream Workation Villa Now!</p>
            </div>
        </div>
        <div class="col-lg-6 reservation">
            <div class=" map">
                <iframe src="about:blank" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" data-rocket-lazyload="fitvidscompatible"
                        data-lazy-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15770.188241762415!2d115.13540216065455!3d-8.828550098559962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd25bbe9e2f7313%3A0xc2507e9253ad9f95!2sHillstone%20Villas%20Resort%20Bali!5e0!3m2!1sid!2sid!4v1658290130180!5m2!1sid!2sid"></iframe>
                <noscript>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15770.188241762415!2d115.13540216065455!3d-8.828550098559962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd25bbe9e2f7313%3A0xc2507e9253ad9f95!2sHillstone%20Villas%20Resort%20Bali!5e0!3m2!1sid!2sid!4v1658290130180!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </noscript>
            </div>
        </div>
        <div class="col-lg-6 space-form" style=" background:#FFFFFF">
            <div role="form" class="wpcf7" id="wpcf7-f33-o1" lang="en-US" dir="ltr">
                <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p>
                    <ul></ul>
                </div>
                <form action="/#wpcf7-f33-o1" method="post" class="wpcf7-form init" novalidate="novalidate"
                      data-status="init">
                    <div style="display: none;">
                        <input type="hidden" name="_wpcf7" value="33"/>
                        <input type="hidden" name="_wpcf7_version" value="5.6.1"/>
                        <input type="hidden" name="_wpcf7_locale" value="en_US"/>
                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f33-o1"/>
                        <input type="hidden" name="_wpcf7_container_post" value="0"/>
                        <input type="hidden" name="_wpcf7_posted_data_hash" value=""/>
                    </div>
                    <p><label> Your Nama*<span class="wpcf7-form-control-wrap" data-name="your-name"><input type="text"
                                                                                                            name="your-name"
                                                                                                            value=""
                                                                                                            size="100"
                                                                                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                                                            aria-required="true"
                                                                                                            aria-invalid="false"/></span></label><br/>
                        <label> Email Address* <span class="wpcf7-form-control-wrap" data-name="your-email"><input
                                    type="email" name="your-email" value="" size="100"
                                    class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                    aria-required="true" aria-invalid="false"/></span></label><br/>
                        <label> WhatApp No* <span class="wpcf7-form-control-wrap" data-name="wa"><input type="text"
                                                                                                        name="wa"
                                                                                                        value=""
                                                                                                        size="100"
                                                                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                                                        aria-required="true"
                                                                                                        aria-invalid="false"/></span></label><br/>
                        <label> Villa Type* <span class="wpcf7-form-control-wrap" data-name="villatype"><select
                                    name="villatype" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required"
                                    aria-required="true" aria-invalid="false"><option value="Idyll">Idyll</option><option
                                        value="Joy">Joy</option><option
                                        value="Bliss">Bliss</option></select></span></label><br/>
                        <label> Period of Stay<span class="wpcf7-form-control-wrap" data-name="period"><input
                                    type="text" name="period" value="" size="100" class="wpcf7-form-control wpcf7-text"
                                    aria-invalid="false"/></span></label><br/>
                        <label> Your message (optional)<span class="wpcf7-form-control-wrap"
                                                             data-name="your-message"><textarea name="your-message"
                                                                                                cols="40" rows="10"
                                                                                                class="wpcf7-form-control wpcf7-textarea"
                                                                                                aria-invalid="false"></textarea></span>
                        </label><br/>
                        <input type="submit" value="Submit" class="wpcf7-form-control has-spinner wpcf7-submit"/></p>
                    <div class="wpcf7-response-output" aria-hidden="true"></div>
                </form>
            </div>
        </div>

    </div>
</div>


<!--NWES-->


<div id="news" class="top_banner">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
        <div class="container">
            <h1>News</h1>
        </div>
    </div>
</div>
<div id="news1" class="tectbox1 gray-c">
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="main_title">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis lacus purus, malesuada</p>

                </div>
            </div>

            <div class="col-md-4">
                <article class="blog">
                    <figure>
                        <a href="https://balihillstonevillas.com/lorem-ipsum-dolor-2/">
                            <img
                                src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                                alt=""
                                data-lazy-src="https://balihillstonevillas.com/wp-content/themes/hilstone/img/thumb.jpg">
                            <noscript><img
                                    src="https://balihillstonevillas.com/wp-content/themes/hilstone/img/thumb.jpg"
                                    alt=""></noscript>
                        </a>

                    </figure>

                    <div class="post_info">
                        <div class="post-head">
                            <span class="info-date">15 Jul 2022</span><br/>
                        </div>
                        <h2><a href='https://balihillstonevillas.com/lorem-ipsum-dolor-2/' title='Lorem ipsum dolor'>Lorem
                                ipsum dolor</a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis lacus purus, malesuada id
                            aliquam sit amet, dictum luctus elit. Praesent id sollicitudin massa. Aliquam posuere</p>
                        <a class="btn_1" href="https://balihillstonevillas.com/lorem-ipsum-dolor-2/" role="button">Read
                            More</a>
                    </div>
                </article>
                <!-- /article -->
            </div>

            <div class="col-md-4">
                <article class="blog">
                    <figure>
                        <a href='https://balihillstonevillas.com/lorem-ipsum-dolor/' title='Lorem ipsum dolor'>
                            <img class="fadeover"
                                 src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                                 data-lazy-src="https://balihillstonevillas.com/wp-content/uploads/2022/07/chateau-de-bali_3bed-poolvilla-25-copy-620x450.jpg"/>
                            <noscript><img class="fadeover"
                                           src="https://balihillstonevillas.com/wp-content/uploads/2022/07/chateau-de-bali_3bed-poolvilla-25-copy-620x450.jpg"/>
                            </noscript>
                        </a>

                    </figure>

                    <div class="post_info">
                        <div class="post-head">
                            <span class="info-date">15 Jul 2022</span><br/>
                        </div>
                        <h2><a href='https://balihillstonevillas.com/lorem-ipsum-dolor/' title='Lorem ipsum dolor'>Lorem
                                ipsum dolor</a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis lacus purus, malesuada id
                            aliquam sit amet, dictum luctus elit. Praesent id sollicitudin massa. Aliquam posuere</p>
                        <a class="btn_1" href="https://balihillstonevillas.com/lorem-ipsum-dolor/" role="button">Read
                            More</a>
                    </div>
                </article>
                <!-- /article -->
            </div>

            <div class="col-md-4">
                <article class="blog">
                    <figure>
                        <a href="https://balihillstonevillas.com/halo-dunia/">
                            <img
                                src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                                alt=""
                                data-lazy-src="https://balihillstonevillas.com/wp-content/themes/hilstone/img/thumb.jpg">
                            <noscript><img
                                    src="https://balihillstonevillas.com/wp-content/themes/hilstone/img/thumb.jpg"
                                    alt=""></noscript>
                        </a>

                    </figure>

                    <div class="post_info">
                        <div class="post-head">
                            <span class="info-date">15 Jul 2022</span><br/>
                        </div>
                        <h2><a href='https://balihillstonevillas.com/halo-dunia/' title='Halo dunia!'>Halo dunia!</a>
                        </h2>
                        <p>Selamt datang di WordPress. Ini adalah pos pertama Anda. Sunting atau hapus, kemudian mulai
                            menulis!</p>
                        <a class="btn_1" href="https://balihillstonevillas.com/halo-dunia/" role="button">Read More</a>
                    </div>
                </article>
                <!-- /article -->
            </div>
        </div>
    </div>
</div>


</main>

<footer class="revealed text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div id="logo_footer">
                    <a class="main-logo" href='https://balihillstonevillas.com'>
                        <img
                            src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                            alt="Bali Hillstone Villas"
                            data-lazy-src="https://balihillstonevillas.com/wp-content/themes/hilstone/img/hillstone.jpg"/>
                        <noscript><img
                                src="https://balihillstonevillas.com/wp-content/themes/hilstone/img/hillstone.jpg"
                                alt="Bali Hillstone Villas"/></noscript>
                    </a>
                    <div class="col-lg-12 col-md-2 alamat">
                        <div class="address"><h3 class="hide">Address</h3>
                            <div class="textwidget"><p>Jl. Pura Masuka, Br. Kertha Lestari &#8211; Ungasan,<br/>
                                    Uluwatu, Bali, Indonesia, 80364</p>
                            </div>
                        </div>
                    </div>

                    <div class="follow_us">
                        <ul>
                            <li>
                                <a target="_blank" href="https://api.whatsapp.com/send?phone=6285776433157">
                                    <img src=""
                                         data-src="https://balihillstonevillas.com/wp-content/themes/hilstone/img/icons/wa-f.png"
                                         class="lazy">
                                </a>
                            </li>


                            <li><a target="_blank" href="http://www.instagram.com/baliworkationvillas"><img
                                        data-src="https://balihillstonevillas.com/wp-content/themes/hilstone/img/icons/instagram-f.png"
                                        class="lazy"></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="copyright">
    <div class="col-lg-12">
        <div class="container">
            <span>Copyright &copy; 2022 Bali Hillstone Villas</span>
        </div>
    </div>
</div>

</div>


<div id="toTop">
    <img src="" data-src="{{asset('image/up.svg')}}" class="lazy" style="width: 45px; height: auto; color: white">
</div>
<div id="toTope" type="button" class="btn btn-primary" data-toggle="modal" style="background-color: darkgreen;">
    <a target="_blank" href="https://api.whatsapp.com/send?phone=6281353254589"><img src="" data-src="{{asset('image/wa.png')}}" class="lazy" style="width: 45px; height: auto"></a>
</div>
<div class="modal fade" id="contacticon" tabindex="-1" role="dialog" aria-labelledby="contacticon" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered iconcontact" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">Contact</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div role="form" class="wpcf7" id="wpcf7-f33-o2" lang="en-US" dir="ltr">
                    <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p>
                        <ul></ul>
                    </div>
                    <form action="/#wpcf7-f33-o2" method="post" class="wpcf7-form init" novalidate="novalidate"
                          data-status="init">
                        <div style="display: none;">
                            <input type="hidden" name="_wpcf7" value="33"/>
                            <input type="hidden" name="_wpcf7_version" value="5.6.1"/>
                            <input type="hidden" name="_wpcf7_locale" value="en_US"/>
                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f33-o2"/>
                            <input type="hidden" name="_wpcf7_container_post" value="0"/>
                            <input type="hidden" name="_wpcf7_posted_data_hash" value=""/>
                        </div>
                        <p><label> Your Nama*<span class="wpcf7-form-control-wrap" data-name="your-name"><input
                                        type="text" name="your-name" value="" size="100"
                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                        aria-required="true" aria-invalid="false"/></span></label><br/>
                            <label> Email Address* <span class="wpcf7-form-control-wrap" data-name="your-email"><input
                                        type="email" name="your-email" value="" size="100"
                                        class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                        aria-required="true" aria-invalid="false"/></span></label><br/>
                            <label> WhatApp No* <span class="wpcf7-form-control-wrap" data-name="wa"><input type="text"
                                                                                                            name="wa"
                                                                                                            value=""
                                                                                                            size="100"
                                                                                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                                                            aria-required="true"
                                                                                                            aria-invalid="false"/></span></label><br/>
                            <label> Villa Type* <span class="wpcf7-form-control-wrap" data-name="villatype"><select
                                        name="villatype"
                                        class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required"
                                        aria-required="true" aria-invalid="false"><option value="Idyll">Idyll</option><option
                                            value="Joy">Joy</option><option value="Bliss">Bliss</option></select></span></label><br/>
                            <label> Period of Stay<span class="wpcf7-form-control-wrap" data-name="period"><input
                                        type="text" name="period" value="" size="100"
                                        class="wpcf7-form-control wpcf7-text" aria-invalid="false"/></span></label><br/>
                            <label> Your message (optional)<span class="wpcf7-form-control-wrap"
                                                                 data-name="your-message"><textarea name="your-message"
                                                                                                    cols="40" rows="10"
                                                                                                    class="wpcf7-form-control wpcf7-textarea"
                                                                                                    aria-invalid="false"></textarea></span>
                            </label><br/>
                            <input type="submit" value="Submit" class="wpcf7-form-control has-spinner wpcf7-submit"/>
                        </p>
                        <div class="wpcf7-response-output" aria-hidden="true"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="rocketlazyloadscript"
        src="https://balihillstonevillas.com/wp-content/themes/hilstone/js/common_scripts.js" defer></script>
<script type="rocketlazyloadscript" src="https://balihillstonevillas.com/wp-content/themes/hilstone/js/main.js"
        defer></script>
<script type="rocketlazyloadscript" src="https://balihillstonevillas.com/wp-content/themes/hilstone/js/carousel-home.js"
        defer></script>
<div id="sf-sidebar" style="opacity:0" class="sf-hl-semi sf-indicators">
    <div class="sf-scroll-wrapper">
        <div class="sf-scroll">
            <div class="sf-logo">
                <a href="https://balihillstonevillas.com"><img
                        src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                        alt=""
                        data-lazy-src="https://balihillstonevillas.com/wp-content/uploads/2022/07/hillstone-2.jpg">
                    <noscript><img src="https://balihillstonevillas.com/wp-content/uploads/2022/07/hillstone-2.jpg"
                                   alt=""></noscript>
                </a>
                <div class="sf-title">
                </div>
            </div>
            <nav class="sf-nav">
                <div class="sf-va-middle">
                    <ul id="sf-nav" class="menu">
                        <li id="menu-item-8"
                            class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-8">
                            <a href="https://balihillstonevillas.com/" aria-current="page">Home</a></li>
                        <li id="menu-item-5"
                            class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home current-menu-ancestor current-menu-parent menu-item-has-children menu-item-5">
                            <a href="https://balihillstonevillas.com/#villa-type" aria-current="page">Our Villas
                                Collection</a>
                            <ul class="sub-menu">
                                <li id="menu-item-150"
                                    class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-150">
                                    <a href="https://balihillstonevillas.com/#Bliss" aria-current="page">Bliss</a></li>
                                <li id="menu-item-149"
                                    class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-149">
                                    <a href="https://balihillstonevillas.com/#Joy" aria-current="page">Joy</a></li>
                                <li id="menu-item-148"
                                    class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-148">
                                    <a href="https://balihillstonevillas.com/#Idyll" aria-current="page">Idyll</a></li>
                            </ul>
                        </li>
                        <li id="menu-item-144"
                            class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-144">
                            <a href="https://balihillstonevillas.com/#lifestyle" aria-current="page">New Lifestyle
                                Experience</a></li>
                        <li id="menu-item-6"
                            class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-6">
                            <a href="https://balihillstonevillas.com/#contact" aria-current="page">Contact Us</a></li>
                        <li id="menu-item-7"
                            class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-7">
                            <a href="https://balihillstonevillas.com/#news" aria-current="page">News</a></li>
                    </ul>
                    <div class="widget-area"></div>
                </div>
                <!-- INSERT HERE -->
            </nav>

            <!-- CUSTOM CONTENT HERE -->
            <ul class="sf-social"></ul>

        </div>
    </div>
    <div class="sf-sidebar-bg"></div>
    {{--    <div class="sf-rollback sf-color1 sf-label-visible sf-label-metro" style>--}}
    {{--        <div class="sf-navicon-button x">--}}
    {{--            <div class="sf-navicon"></div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="sf-view sf-view-level-custom">
        <span class="sf-close"></span>
    </div>
</div>

<div id="sf-mob-navbar">
    <div class="sf-navicon-button x">
        <div class="sf-navicon"></div>
    </div>
    <a href="/"><img
            src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
            alt="" data-lazy-src="https://balihillstonevillas.com/wp-content/uploads/2022/07/hillstone-2.jpg">
        <noscript><img src="https://balihillstonevillas.com/wp-content/uploads/2022/07/hillstone-2.jpg" alt="">
        </noscript>
    </a></div>
<div id="sf-overlay-wrapper">
    <div id="sf-overlay"></div>
</div>


<link data-minify="1" rel='stylesheet' id='colorbox-style-css'
      href='https://balihillstonevillas.com/wp-content/cache/min/1/wp-content/plugins/justified-image-grid/css/colorbox1.css?ver=1659432846'
      type='text/css' media='all'/>
<script type="rocketlazyloadscript" data-rocket-type="text/javascript"
        src="https://balihillstonevillas.com/wp-includes/js/dist/vendor/wp-polyfill-inert.min.js?ver=3.1.2"
        id="wp-polyfill-inert-js" defer></script>
<script type="rocketlazyloadscript" data-rocket-type="text/javascript"
        src="https://balihillstonevillas.com/wp-includes/js/dist/vendor/regenerator-runtime.min.js?ver=0.14.0"
        id="regenerator-runtime-js" defer></script>
<script type="rocketlazyloadscript" data-rocket-type="text/javascript"
        src="https://balihillstonevillas.com/wp-includes/js/dist/vendor/wp-polyfill.min.js?ver=3.15.0"
        id="wp-polyfill-js"></script>
<script type="text/javascript" id="contact-form-7-js-extra">
    /* <![CDATA[ */
    var wpcf7 = {
        "api": {"root": "https:\/\/balihillstonevillas.com\/wp-json\/", "namespace": "contact-form-7\/v1"},
        "cached": "1"
    };
    /* ]]> */
</script>
<script type="rocketlazyloadscript" data-rocket-type="text/javascript"
        src="https://balihillstonevillas.com/wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.6.1"
        id="contact-form-7-js" defer></script>
<script type="text/javascript" id="wpvr-js-extra">
    /* <![CDATA[ */
    var wpvr_public = {"notice_active": "", "notice": ""};
    /* ]]> */
</script>
<script type="rocketlazyloadscript" data-rocket-type="text/javascript"
        src="https://balihillstonevillas.com/wp-content/plugins/wpvr/public/js/wpvr-public.js?ver=8.0.2" id="wpvr-js"
        defer></script>
<script type="rocketlazyloadscript" data-rocket-type="text/javascript"
        src="https://balihillstonevillas.com/wp-content/plugins/justified-image-grid/js/jquery.colorbox.min.js?ver=1.6.3"
        id="colorbox-js" defer></script>
<script type="rocketlazyloadscript" data-rocket-type="text/javascript"
        src="https://balihillstonevillas.com/wp-content/plugins/justified-image-grid/js/justified-image-grid.min.js?ver=3.4.1"
        id="justified-image-grid-js" defer></script>
<style type='text/css'>
    .justified-image-grid {
        max-width: none !important;
        padding: 0;
        clear: both;
        line-height: normal;
        display: block !important;
    }

    .jig-hiddenGallery {
        display: none !important;
    }

    .justified-image-grid .jig-imageContainer img, .justified-image-grid .jig-pixastic {
        position: absolute;
        bottom: 0;
        left: 0;
        margin: 0;
        padding: 0;
        border-style: none !important;
        vertical-align: baseline;
        max-width: none !important;
        max-height: none !important;
        min-height: 0 !important;
        min-width: 0 !important;
        box-shadow: none !important;
        z-index: auto !important;
        visibility: visible !important;
        margin-bottom: 0 !important;
    }

    .justified-image-grid .jig-imageContainer a {
        margin: 0 !important;
        padding: 0 !important;
        position: static !important;
        display: inline;
    }

    .jig-overflow {
        opacity: 0;
        transition: opacity 0.3s;
    }

    .justified-image-grid div {
        position: static;
    }

    .justified-image-grid a:link, .justified-image-grid a:hover, .justified-image-grid a:visited {
        text-decoration: none;
    }

    .justified-image-grid .jig-removeThis {
        visibility: hidden;
    }

    .justified-image-grid .jig-hiddenLink, .justified-image-grid .jig-hiddenImg {
        display: none !important;
    }

    .jig-last:after {
        clear: both;
    }

    .justified-image-grid .tiled-gallery-caption {
        display: none !important;
    }

    .jig-developerLink {
        line-height: 10px;
        margin-bottom: 5px;
    }

    .jig-developerLink a {
        font-size: 9px;
    }

    .jig-fontCheck {
        display: block !important;
        position: absolute !important;
        left: -99999px !important;
        top: -99999px !important;
        visibility: hidden !important;
        font-size: 100px !important;
        white-space: nowrap !important;
        max-width: none !important;
        width: auto !important;
    }

    .justified-image-grid-html li {
        float: left;
        position: relative;
        list-style: none;
        overflow: hidden;
    }

    .justified-image-grid-html .jig-HTMLdescription {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        margin: 0;
        padding: 5px;
    }

    .justified-image-grid > p, .justified-image-grid > li {
        display: none;
    }

    noscript.justified-image-grid-html p {
        display: block;
    }

    noscript.justified-image-grid-html li {
        display: list-item;
    }

    .justified-image-grid-html li.jig-clearfix:before, .jig-clearfix:after, .justified-image-grid-html:before, .justified-image-grid-html:after {
        content: "";
        display: table;
    }

    .jig-clearfix:after, .justified-image-grid-html:after {
        clear: both;
    }

    .jig-clearfix, .justified-image-grid-html {
        -webkit-backface-visibility: visible;
        transform: none;
        zoom: 1; /* For IE 6/7 (trigger hasLayout) */
    }

    #jig1 {
        margin: 0;
        min-height: 0px;
    }

    #jig1 .jig-imageContainer {
        margin-bottom: 2px;
        margin-right: 2px;
        float: left;
        padding: 0;
        width: auto;
    }

    #jig1 .jig-imageContainer img {
        max-width: none !important;
        background-color: white !important;
    }

    #jig1 .jig-imageContainer .jig-caption-wrapper img {
        position: static;
        background: transparent !important;
    }

    #jig1 .jig-overflow {
        position: relative;
        overflow: hidden;
        vertical-align: baseline;
    }

    #jig1 .jig-caption-wrapper {
        max-height: 100%;
        bottom: 0;
        right: 0;
        left: 0;
        position: absolute;
        margin: 0 auto;
        padding: 0;
        z-index: 100;
        overflow: hidden;
        opacity: 0.6;
        -moz-opacity: 0.6;
        filter: alpha(opacity=60);
    }

    #jig1 .jig-cw-role-effect {
        z-index: 0;
    }

    #jig1 .jig-caption {
        display: none;
        text-align: center !important;
        background: #000;
        padding: 0 7px;
        margin: 0;
    }

    #jig1 .jig-caption-title {
        overflow: hidden;
        line-height: normal;
        box-sizing: border-box !important;
        color: #FFF !important;
        font-size: 15px;
        font-weight: normal;
        text-align: left;
        text-align: center !important;
        padding: 5px 0 5px;
    }

    #jig1 .jig-caption-description {
        overflow: hidden;
        line-height: normal;
        color: #FFF !important;
        font-size: 12px;
        font-weight: normal;
        text-align: left;
        text-align: center !important;
        padding-bottom: 5px;
    }

    #jig1 .jig-alone {
        padding-top: 5px !important;
        margin-top: 0 !important;
    }

    #jig1 .jig-overlay {
        background: #000;
        opacity: 0.2;
        -moz-opacity: 0.2;
        filter: alpha(opacity=20);
        height: 100%;
    }

    #jig1 .jig-overlay-wrapper {
        display: none;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        top: 0;
    }

    #jig1 .jig-clearfix:after {
        clear: both;
    }

    .jig-last {
        margin-right: 0 !important;
    }

    .jig-ua-old-ie.justified-image-grid .jig-overlay, .jig-ua-old-ie.justified-image-grid .jig-overlay-icon-wrapper, .jig-ua-old-ie.justified-image-grid .jig-overlay-icon {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .jig-ua-old-ie.justified-image-grid .jig-overflow, .jig-ua-old-ie.justified-image-grid .jig-overflow div {
        cursor: pointer;
    }

    .jig-ua-old-ie.jig-caption-wrapper {
        margin: 0 !important;
    }

    .jig-ua-ie .jig-caption-wrapper-clone {
        filter: alpha(opacity=0) !important;
    }

    #jig2 {
        margin: 0;
        min-height: 0px;
    }

    #jig2 .jig-imageContainer {
        margin-bottom: 2px;
        margin-right: 2px;
        float: left;
        padding: 0;
        width: auto;
    }

    #jig2 .jig-imageContainer img {
        max-width: none !important;
        background-color: white !important;
    }

    #jig2 .jig-imageContainer .jig-caption-wrapper img {
        position: static;
        background: transparent !important;
    }

    #jig2 .jig-overflow {
        position: relative;
        overflow: hidden;
        vertical-align: baseline;
    }

    #jig2 .jig-caption-wrapper {
        max-height: 100%;
        bottom: 0;
        right: 0;
        left: 0;
        position: absolute;
        margin: 0 auto;
        padding: 0;
        z-index: 100;
        overflow: hidden;
        opacity: 0.6;
        -moz-opacity: 0.6;
        filter: alpha(opacity=60);
    }

    #jig2 .jig-cw-role-effect {
        z-index: 0;
    }

    #jig2 .jig-caption {
        display: none;
        text-align: center !important;
        background: #000;
        padding: 0 7px;
        margin: 0;
    }

    #jig2 .jig-caption-title {
        overflow: hidden;
        line-height: normal;
        box-sizing: border-box !important;
        color: #FFF !important;
        font-size: 15px;
        font-weight: normal;
        text-align: left;
        text-align: center !important;
        padding: 5px 0 5px;
    }

    #jig2 .jig-caption-description {
        overflow: hidden;
        line-height: normal;
        color: #FFF !important;
        font-size: 12px;
        font-weight: normal;
        text-align: left;
        text-align: center !important;
        padding-bottom: 5px;
    }

    #jig2 .jig-alone {
        padding-top: 5px !important;
        margin-top: 0 !important;
    }

    #jig2 .jig-overlay {
        background: #000;
        opacity: 0.2;
        -moz-opacity: 0.2;
        filter: alpha(opacity=20);
        height: 100%;
    }

    #jig2 .jig-overlay-wrapper {
        display: none;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        top: 0;
    }

    #jig2 .jig-clearfix:after {
        clear: both;
    }

    .jig-last {
        margin-right: 0 !important;
    }

    .jig-ua-old-ie.justified-image-grid .jig-overlay, .jig-ua-old-ie.justified-image-grid .jig-overlay-icon-wrapper, .jig-ua-old-ie.justified-image-grid .jig-overlay-icon {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .jig-ua-old-ie.justified-image-grid .jig-overflow, .jig-ua-old-ie.justified-image-grid .jig-overflow div {
        cursor: pointer;
    }

    .jig-ua-old-ie.jig-caption-wrapper {
        margin: 0 !important;
    }

    .jig-ua-ie .jig-caption-wrapper-clone {
        filter: alpha(opacity=0) !important;
    }
</style>
<script type="rocketlazyloadscript" data-rocket-type="text/javascript">window.addEventListener('DOMContentLoaded', function() {
(function initJIG ($,ready) {if(typeof $.justifiedImageGrid !== "undefined"){if(typeof $.JIGminVersion !== 'undefined' && $.JIGminVersion('1.7') == false){$.JIGminVersion('1.7',true);return;}else{window['jigAddLightbox1'] = function(){$('#jig1 a.jig-link').colorbox({slideshow: false,slideshowSpeed: 3500,slideshowAuto: false,opacity: 0.75,speed: 300,maxWidth: '100%',maxHeight: '100%',current: '{current} / {total}'});};$('#jig1').justifiedImageGrid({"timthumb":"https:\/\/balihillstonevillas.com\/wp-content\/plugins\/justified-image-grid\/timthumb.php","items":[{"url":"https%3A%2F%2Fbalihillstonevillas.com%2Fwp-content%2Fuploads%2F2022%2F07%2Fchateau-de-bali_3bed-poolvilla-24-copy.jpg","width":347,"title":"chateau-de-bali_3bed-poolvilla-(24)-copy","extra_class":"jig-contentID-ML-117"},{"url":"https%3A%2F%2Fbalihillstonevillas.com%2Fwp-content%2Fuploads%2F2022%2F07%2Fchateau-de-bali_3bed-poolvilla-1024x641.jpg","width":347,"title":"chateau de bali_3bed poolvilla","extra_class":"jig-contentID-ML-104"},{"url":"https%3A%2F%2Fbalihillstonevillas.com%2Fwp-content%2Fuploads%2F2022%2F07%2FVilla-Bathroom-1.jpg","width":347,"title":"Villa-Bathroom","extra_class":"jig-contentID-ML-112"},{"url":"https%3A%2F%2Fbalihillstonevillas.com%2Fwp-content%2Fuploads%2F2022%2F07%2Fchateau-de-bali_3bed-poolvilla-33-copy.jpg","width":347,"title":"chateau-de-bali_3bed-poolvilla-(33)-copy","extra_class":"jig-contentID-ML-111"}],"targetHeight":200,"heightDeviation":60,"aspectRatio":1.3333,"margins":2,"lightbox":"colorbox","innerBorderWidth":0});window['jigAddLightbox2'] = function(){$('#jig2 a.jig-link').colorbox({slideshow: false,slideshowSpeed: 3500,slideshowAuto: false,opacity: 0.75,speed: 300,maxWidth: '100%',maxHeight: '100%',current: '{current} / {total}'});};$('#jig2').justifiedImageGrid({"timthumb":"https:\/\/balihillstonevillas.com\/wp-content\/plugins\/justified-image-grid\/timthumb.php","items":[{"url":"https%3A%2F%2Fbalihillstonevillas.com%2Fwp-content%2Fuploads%2F2022%2F07%2FVilla-Sunset-II.jpg","width":347,"title":"Villa-Sunset-II","extra_class":"jig-contentID-ML-114"},{"url":"https%3A%2F%2Fbalihillstonevillas.com%2Fwp-content%2Fuploads%2F2022%2F07%2FVilla-Bathroom-1.jpg","width":347,"title":"Villa-Bathroom","extra_class":"jig-contentID-ML-112"},{"url":"https%3A%2F%2Fbalihillstonevillas.com%2Fwp-content%2Fuploads%2F2022%2F07%2Fchateau-de-bali_3bed-poolvilla-20-copy.jpg","width":347,"title":"chateau-de-bali_3bed-poolvilla-(20)-copy","extra_class":"jig-contentID-ML-110"},{"url":"https%3A%2F%2Fbalihillstonevillas.com%2Fwp-content%2Fuploads%2F2022%2F07%2Fchateau-de-bali_3bed-poolvilla-33-copy.jpg","width":347,"title":"chateau-de-bali_3bed-poolvilla-(33)-copy","extra_class":"jig-contentID-ML-111"}],"targetHeight":200,"heightDeviation":60,"aspectRatio":1.3333,"margins":2,"lightbox":"colorbox","instance":2,"lightboxInit":"jigAddLightbox2","innerBorderWidth":0});}}else if(typeof $.justifiedImageGrid === "undefined" && ready == true){if(typeof loadJustifiedImageGrid !== "undefined"){loadJustifiedImageGrid($);initJIG($,true);return;}
$(".justified-image-grid").html('<span style="color:red;font-weight:bold">The Justified Image Grid JS is not loaded. Try disabling Conditional script loading in the General settings.</span>');}else{$(document).ready(function(){initJIG($,true);});}})(jQuery,false);
});
</script>
<script>window.lazyLoadOptions = {
        elements_selector: "img[data-lazy-src],.rocket-lazyload,iframe[data-lazy-src]",
        data_src: "lazy-src",
        data_srcset: "lazy-srcset",
        data_sizes: "lazy-sizes",
        class_loading: "lazyloading",
        class_loaded: "lazyloaded",
        threshold: 300,
        callback_loaded: function (element) {
            if (element.tagName === "IFRAME" && element.dataset.rocketLazyload == "fitvidscompatible") {
                if (element.classList.contains("lazyloaded")) {
                    if (typeof window.jQuery != "undefined") {
                        if (jQuery.fn.fitVids) {
                            jQuery(element).parent().fitVids()
                        }
                    }
                }
            }
        }
    };
    window.addEventListener('LazyLoad::Initialized', function (e) {
        var lazyLoadInstance = e.detail.instance;
        if (window.MutationObserver) {
            var observer = new MutationObserver(function (mutations) {
                var image_count = 0;
                var iframe_count = 0;
                var rocketlazy_count = 0;
                mutations.forEach(function (mutation) {
                    for (var i = 0; i < mutation.addedNodes.length; i++) {
                        if (typeof mutation.addedNodes[i].getElementsByTagName !== 'function') {
                            continue
                        }
                        if (typeof mutation.addedNodes[i].getElementsByClassName !== 'function') {
                            continue
                        }
                        images = mutation.addedNodes[i].getElementsByTagName('img');
                        is_image = mutation.addedNodes[i].tagName == "IMG";
                        iframes = mutation.addedNodes[i].getElementsByTagName('iframe');
                        is_iframe = mutation.addedNodes[i].tagName == "IFRAME";
                        rocket_lazy = mutation.addedNodes[i].getElementsByClassName('rocket-lazyload');
                        image_count += images.length;
                        iframe_count += iframes.length;
                        rocketlazy_count += rocket_lazy.length;
                        if (is_image) {
                            image_count += 1
                        }
                        if (is_iframe) {
                            iframe_count += 1
                        }
                    }
                });
                if (image_count > 0 || iframe_count > 0 || rocketlazy_count > 0) {
                    lazyLoadInstance.update()
                }
            });
            var b = document.getElementsByTagName("body")[0];
            var config = {childList: !0, subtree: !0};
            observer.observe(b, config)
        }
    }, !1)</script>
<script data-no-minify="1" async
        src="https://balihillstonevillas.com/wp-content/plugins/wp-rocket/assets/js/lazyload/17.5/lazyload.min.js"></script>
<script>function lazyLoadThumb(e) {
        var t = '<img data-lazy-src="https://i.ytimg.com/vi/ID/hqdefault.jpg" alt="" width="480" height="360"><noscript><img src="https://i.ytimg.com/vi/ID/hqdefault.jpg" alt="" width="480" height="360"></noscript>',
            a = '<button class="play" aria-label="play Youtube video"></button>';
        return t.replace("ID", e) + a
    }

    function lazyLoadYoutubeIframe() {
        var e = document.createElement("iframe"), t = "ID?autoplay=1";
        t += 0 === this.parentNode.dataset.query.length ? '' : '&' + this.parentNode.dataset.query;
        e.setAttribute("src", t.replace("ID", this.parentNode.dataset.src)), e.setAttribute("frameborder", "0"), e.setAttribute("allowfullscreen", "1"), e.setAttribute("allow", "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"), this.parentNode.parentNode.replaceChild(e, this.parentNode)
    }

    document.addEventListener("DOMContentLoaded", function () {
        var e, t, p, a = document.getElementsByClassName("rll-youtube-player");
        for (t = 0; t < a.length; t++) e = document.createElement("div"), e.setAttribute("data-id", a[t].dataset.id), e.setAttribute("data-query", a[t].dataset.query), e.setAttribute("data-src", a[t].dataset.src), e.innerHTML = lazyLoadThumb(a[t].dataset.id), a[t].appendChild(e), p = e.querySelector('.play'), p.onclick = lazyLoadYoutubeIframe
    });</script>
</body>
</html>
<!-- This website is like a Rocket, isn't it? Performance optimized by WP Rocket. Learn more: https://wp-rocket.me - Debug: cached@1719624557 -->
