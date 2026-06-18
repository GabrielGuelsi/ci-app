/* =============================================================
   Success Stories Slider — standalone (shared across pages)
   ============================================================= */
(function initStoriesSlider() {
    'use strict';

    var root = document.querySelector('[data-stories-slider]');
    if (!root) return;

    var track = root.querySelector('[data-stories-track]');
    var slides = root.querySelectorAll('.story-slide');
    var dots = root.querySelectorAll('.stories-dot');
    var prev = root.querySelector('.stories-prev');
    var next = root.querySelector('.stories-next');
    if (!track || !slides.length) return;

    var AUTOPLAY_MS = 7000;
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    var index = 0;
    var timer = null;
    var inView = true;

    function go(i) {
        index = (i + slides.length) % slides.length;
        track.style.transform = 'translateX(-' + index * 100 + '%)';
        dots.forEach(function (d, n) { d.classList.toggle('is-active', n === index); });
    }

    function step(delta) {
        go(index + delta);
    }

    function stopAuto() {
        if (timer) {
            clearInterval(timer);
            timer = null;
        }
    }

    function startAuto() {
        stopAuto();
        if (!inView || reduceMotion.matches) return;
        timer = setInterval(function () { step(1); }, AUTOPLAY_MS);
    }

    dots.forEach(function (d, n) { d.addEventListener('click', function () { go(n); startAuto(); }); });
    if (prev) prev.addEventListener('click', function () { step(-1); startAuto(); });
    if (next) next.addEventListener('click', function () { step(1); startAuto(); });

    root.addEventListener('mouseenter', stopAuto);
    root.addEventListener('mouseleave', startAuto);
    root.addEventListener('focusin', stopAuto);
    root.addEventListener('focusout', startAuto);

    if (typeof IntersectionObserver !== 'undefined') {
        new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                inView = entry.isIntersecting;
                if (inView) {
                    startAuto();
                } else {
                    stopAuto();
                }
            });
        }, { threshold: 0.2 }).observe(root);
    }

    var touchStartX = 0;
    root.addEventListener('touchstart', function (e) {
        touchStartX = e.changedTouches[0].screenX;
        stopAuto();
    }, { passive: true });
    root.addEventListener('touchend', function (e) {
        var dx = e.changedTouches[0].screenX - touchStartX;
        if (Math.abs(dx) > 50) step(dx < 0 ? 1 : -1);
        startAuto();
    }, { passive: true });

    go(0);
    startAuto();
})();
