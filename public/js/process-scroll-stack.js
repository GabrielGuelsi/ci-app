/* =============================================================
   Process Scroll Stack — sticky cards driven by scroll
   (desktop) / dot + swipe carousel (mobile)
   Shared across pages (Study in Ireland, Already in Ireland, ...)
   ============================================================= */
(function () {
    'use strict';

    var outer = document.querySelector('.proc-stack .scroll-stack-outer');
    if (!outer) return;

    var wrap = outer.querySelector('.stack-cards-wrap');
    var cards = Array.prototype.slice.call(outer.querySelectorAll('.step-card'));
    var dots = Array.prototype.slice.call(outer.querySelectorAll('.stack-dot'));
    var headerEl = outer.querySelector('.stack-inner-header');
    var n = cards.length;
    if (!n) return;

    var PEEK = 38;
    var MOBILE_BREAKPOINT = 768;

    function isMobile() {
        return window.innerWidth <= MOBILE_BREAKPOINT;
    }

    /* ---------- Mobile: dot + swipe carousel ---------- */
    var current = 0;

    function showCardMobile(idx) {
        current = Math.max(0, Math.min(n - 1, idx));
        cards.forEach(function (card, i) {
            card.style.transform = 'translateY(0) scale(1)';
            card.style.opacity = i === current ? '1' : '0';
            card.style.zIndex = i === current ? '20' : '5';
        });
        dots.forEach(function (d, i) { d.classList.toggle('active', i === current); });
    }

    function bindMobile() {
        dots.forEach(function (d, i) {
            d.addEventListener('click', function () { showCardMobile(i); });
        });
        var tx = 0;
        var touchTarget = wrap || outer;
        touchTarget.addEventListener('touchstart', function (e) {
            tx = e.changedTouches[0].clientX;
        }, { passive: true });
        touchTarget.addEventListener('touchend', function (e) {
            var dx = e.changedTouches[0].clientX - tx;
            if (Math.abs(dx) > 40) {
                showCardMobile(dx < 0 ? current + 1 : current - 1);
            }
        }, { passive: true });
        showCardMobile(0);
    }

    /* ---------- Desktop: scroll-driven stacking ---------- */
    var rafId = null;
    var inView = false;
    var cardH = 350;
    var wrapH = 0;
    var headerH = 0;

    function setOuterHeight() {
        var scrollableH = Math.round(0.85 * window.innerHeight) * (n - 1);
        outer.style.height = (window.innerHeight + scrollableH) + 'px';
    }

    function measure() {
        cardH = cards[0] ? cards[0].offsetHeight : 350;
        headerH = headerEl ? headerEl.offsetHeight : 0;
        if (headerH) {
            outer.style.setProperty('--stack-header-h', (headerH + 32) + 'px');
        }
        wrapH = wrap ? wrap.offsetHeight : 0;
        setOuterHeight();
    }

    function update() {
        if (!inView) return;
        var rect = outer.getBoundingClientRect();
        var scrollableH = outer.offsetHeight - window.innerHeight;
        var scrolled = Math.max(0, -rect.top);
        var total = scrollableH > 0 ? Math.min(1, scrolled / scrollableH) : 0;
        var scaled = total * (n - 1);
        var idx = Math.min(n - 1, Math.floor(scaled));
        var prog = scaled - Math.floor(scaled);

        var base = Math.round(Math.max(0, (wrapH - cardH) / 2));
        var exitD = base + cardH + 30;
        var enterD = wrapH - base - PEEK;

        cards.forEach(function (card, i) {
            var ty, scale, opacity, z;
            if (i === idx) {
                ty = base - prog * exitD;
                scale = 1 - prog * 0.02;
                opacity = prog > 0.6 ? 1 - (prog - 0.6) / 0.4 : 1;
                z = 20;
            } else if (i === idx + 1) {
                ty = base + (1 - prog) * enterD;
                scale = 0.97 + prog * 0.03;
                opacity = 0.55 + prog * 0.45;
                z = 10;
            } else if (i > idx + 1) {
                ty = wrapH; scale = 0.95; opacity = 0; z = 5;
            } else {
                ty = -exitD; scale = 0.98; opacity = 0; z = 0;
            }
            card.style.transform = 'translateY(' + ty + 'px) scale(' + scale + ')';
            card.style.opacity = String(opacity);
            card.style.zIndex = String(z);
        });

        dots.forEach(function (d, i) { d.classList.toggle('active', i === idx); });
    }

    function onScroll() {
        if (rafId) return;
        rafId = window.requestAnimationFrame(function () {
            update();
            rafId = null;
        });
    }

    function start() {
        if (inView) return;
        inView = true;
        measure();
        window.addEventListener('scroll', onScroll, { passive: true });
        update();
    }

    function stop() {
        if (!inView) return;
        inView = false;
        window.removeEventListener('scroll', onScroll);
    }

    if (isMobile()) {
        bindMobile();
    } else {
        if ('IntersectionObserver' in window) {
            new IntersectionObserver(function (entries) {
                if (entries[0].isIntersecting) {
                    start();
                } else {
                    stop();
                }
            }, { threshold: 0.05 }).observe(outer);
        } else {
            start();
        }

        window.addEventListener('resize', function () {
            measure();
            if (inView) update();
        });
    }
})();
