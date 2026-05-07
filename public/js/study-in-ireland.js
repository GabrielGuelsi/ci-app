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

