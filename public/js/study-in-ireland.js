(function () {
    'use strict';

    // Scroll-triggered reveal for sections, cards, and stack images.
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var targets = document.querySelectorAll(
        '.content-section, .si-rs-card, .si-life-tile, .si-bento-cell, .feature-card, .struggle-item, .ai-pillar, .audience-card, .cb-track, .wci-approach, .process-step, .faq-item, .final-cta-card'
    );

    if (!('IntersectionObserver' in window) || reduceMotion) {
        targets.forEach(function (el) { el.classList.add('is-in-view'); });
        return;
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-in-view');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });

    targets.forEach(function (el) { observer.observe(el); });

    // Mobile orbit chips: tap to expand label, tap again or elsewhere to collapse.
    var orbitItems = document.querySelectorAll('.si-orbit-item');
    if (orbitItems.length) {
        orbitItems.forEach(function (item) {
            item.addEventListener('click', function (event) {
                event.stopPropagation();
                var wasExpanded = item.classList.contains('is-expanded');
                orbitItems.forEach(function (other) { other.classList.remove('is-expanded'); });
                if (!wasExpanded) item.classList.add('is-expanded');
            });
        });
        // Tap anywhere outside an orbit item collapses any open chip.
        document.addEventListener('click', function () {
            orbitItems.forEach(function (item) { item.classList.remove('is-expanded'); });
        });
    }

    // Sticky-tabs interaction for the "What students struggle with" section.
    var tabButtons = document.querySelectorAll('.si-tab');
    if (tabButtons.length) {
        function activateTab(button) {
            var targetId = button.getAttribute('data-target');
            var panel = document.getElementById(targetId);
            if (!panel) return;
            tabButtons.forEach(function (btn) {
                btn.classList.remove('is-active');
                btn.setAttribute('aria-selected', 'false');
            });
            document.querySelectorAll('.si-tab-panel').forEach(function (p) {
                p.classList.remove('is-active');
                p.setAttribute('hidden', '');
            });
            button.classList.add('is-active');
            button.setAttribute('aria-selected', 'true');
            panel.removeAttribute('hidden');
            // Force reflow so the keyframe animation re-runs.
            panel.classList.remove('is-active');
            void panel.offsetWidth;
            panel.classList.add('is-active');
        }
        tabButtons.forEach(function (btn) {
            btn.addEventListener('click', function () { activateTab(btn); });
            btn.addEventListener('keydown', function (e) {
                if (e.key !== 'ArrowDown' && e.key !== 'ArrowUp' && e.key !== 'ArrowRight' && e.key !== 'ArrowLeft') return;
                e.preventDefault();
                var index = Array.prototype.indexOf.call(tabButtons, btn);
                var nextIndex;
                if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
                    nextIndex = (index + 1) % tabButtons.length;
                } else {
                    nextIndex = (index - 1 + tabButtons.length) % tabButtons.length;
                }
                tabButtons[nextIndex].focus();
                activateTab(tabButtons[nextIndex]);
            });
        });
    }

    // Possible routes — profile-led card stack. Chips filter/highlight, no
    // hidden tabs.
    var routeStack = document.querySelector('.si-rs');
    if (routeStack) {
        var routeChips = routeStack.querySelectorAll('.si-rs-chip');
        var routeList = routeStack.querySelector('.si-rs-list');
        var routeCards = routeList ? routeList.querySelectorAll('.si-rs-card') : [];
        var routeRecommendedDivider = routeList ? routeList.querySelector('.si-rs-divider[data-role="recommended"]') : null;
        var routeOtherDivider = routeList ? routeList.querySelector('.si-rs-divider[data-role="other"]') : null;

        function applyProfile(profile) {
            if (routeList) routeList.dataset.activeProfile = profile;

            routeChips.forEach(function (chip) {
                var match = chip.dataset.profile === profile;
                chip.classList.toggle('is-active', match);
                chip.setAttribute('aria-pressed', match ? 'true' : 'false');
            });

            var recommendedCount = 0;
            var otherCount = 0;
            routeCards.forEach(function (card) {
                var defaultOrder = parseInt(card.dataset.defaultOrder, 10) || 0;
                if (profile === 'all') {
                    card.classList.remove('is-recommended');
                    card.classList.remove('is-other');
                    card.style.order = String(defaultOrder + 10);
                    return;
                }
                var profiles = (card.dataset.profiles || '').split(/\s+/);
                if (profiles.indexOf(profile) !== -1) {
                    card.classList.add('is-recommended');
                    card.classList.remove('is-other');
                    card.style.order = String(1 + recommendedCount);
                    recommendedCount += 1;
                } else {
                    card.classList.add('is-other');
                    card.classList.remove('is-recommended');
                    card.style.order = String(101 + otherCount);
                    otherCount += 1;
                }
            });

            if (routeRecommendedDivider) {
                if (profile !== 'all' && recommendedCount > 0) {
                    routeRecommendedDivider.removeAttribute('hidden');
                } else {
                    routeRecommendedDivider.setAttribute('hidden', '');
                }
            }
            if (routeOtherDivider) {
                if (profile !== 'all' && otherCount > 0 && recommendedCount > 0) {
                    routeOtherDivider.removeAttribute('hidden');
                } else {
                    routeOtherDivider.setAttribute('hidden', '');
                }
            }
        }

        routeChips.forEach(function (chip) {
            chip.addEventListener('click', function () {
                var profile = chip.dataset.profile || 'all';
                if (typeof document.startViewTransition === 'function' && !reduceMotion) {
                    document.startViewTransition(function () { applyProfile(profile); });
                } else {
                    applyProfile(profile);
                }
            });
        });
    }

    // Subtle parallax on hero background. Disabled on mobile (≤720px) where
    // the image is constrained to a banner — translating it would bleed into
    // the dark content panel below.
    var heroBg = document.querySelector('.si-hero-bg');
    if (heroBg && !reduceMotion) {
        var rafId = null;
        window.addEventListener('scroll', function () {
            if (rafId) return;
            rafId = window.requestAnimationFrame(function () {
                var y = window.scrollY;
                if (window.innerWidth > 720 && y < 800) {
                    heroBg.style.transform = 'translate3d(0,' + (y * 0.18).toFixed(2) + 'px, 0) scale(1.05)';
                } else if (window.innerWidth <= 720) {
                    heroBg.style.transform = '';
                }
                rafId = null;
            });
        }, { passive: true });
    }
})();

/* =============================================================
   Process Scroll Stack — sticky cards driven by scroll
   (desktop) / dot + swipe carousel (mobile)
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
