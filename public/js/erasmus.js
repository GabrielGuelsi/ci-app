(function() {
        var map = document.querySelector('.er-hero-map');
        if (!map || !('IntersectionObserver' in window)) return;
        var els = map.querySelectorAll('.radar-ring,.flight-path,.city-dot,.dublin-pulse');
        new IntersectionObserver(function(entries) {
            var state = entries[0].isIntersecting ? '' : 'paused';
            els.forEach(function(el) { el.style.animationPlayState = state; });
        }, { threshold: 0.1 }).observe(map);
    })();

// â”€â”€â”€ Scroll Stack â”€â”€â”€
    function initScrollStack() {
        const outer = document.querySelector('.scroll-stack-outer');
        if (!outer) return;
        const cards = Array.from(document.querySelectorAll('.step-card'));
        const dots  = Array.from(document.querySelectorAll('.stack-dot'));
        const wrap  = outer.querySelector('.stack-cards-wrap');
        const n     = cards.length;
        const PEEK  = 38;

        // Mobile: carousel via dots/swipe, no scroll-driven animation
        if (window.innerWidth <= 768) {
            let current = 0;
            function showCard(idx) {
                current = idx;
                cards.forEach((card, i) => {
                    if (i === idx) {
                        card.style.transform = 'translateY(0) scale(1)';
                        card.style.opacity = '1';
                        card.style.zIndex = '20';
                    } else {
                        card.style.transform = 'translateY(0) scale(1)';
                        card.style.opacity = '0';
                        card.style.zIndex = '5';
                    }
                });
                dots.forEach((d, i) => d.classList.toggle('active', i === idx));
            }
            dots.forEach((d, i) => d.addEventListener('click', () => showCard(i)));
            let tx = 0;
            const touchTarget = wrap || outer;
            touchTarget.addEventListener('touchstart', e => { tx = e.changedTouches[0].clientX; }, { passive: true });
            touchTarget.addEventListener('touchend', e => {
                const dx = e.changedTouches[0].clientX - tx;
                if (Math.abs(dx) > 40) showCard(dx < 0 ? Math.min(current + 1, n - 1) : Math.max(current - 1, 0));
            }, { passive: true });
            showCard(0);
            return;
        }

        let rafId   = null;
        let inView  = false;
        let cardH   = 350;
        let wrapH   = 0;
        let headerH = 0;

        function setOuterHeight() {
            const scrollableH = Math.round(0.75 * window.innerHeight);
            outer.style.height = `${window.innerHeight + scrollableH}px`;
        }

        function measure() {
            cardH = cards[0] ? cards[0].offsetHeight : 350;
            headerH = outer.querySelector('.stack-inner-header')?.offsetHeight ?? 0;
            if (headerH) {
                outer.style.setProperty('--stack-header-h', `${headerH + 32}px`);
            }
            wrapH = wrap ? wrap.offsetHeight : 0;
            setOuterHeight();
        }

        function update() {
            if (!inView) return;
            const rect        = outer.getBoundingClientRect();
            const scrollableH = outer.offsetHeight - window.innerHeight;
            const scrolled    = Math.max(0, -rect.top);
            const total       = Math.min(1, scrolled / scrollableH);
            const scaled      = total * (n - 1);
            const idx         = Math.min(n - 1, Math.floor(scaled));
            const prog        = scaled - Math.floor(scaled);
            const base        = Math.round(Math.max(0, (wrapH - cardH) / 2));
            const exitD       = base + cardH + 30;
            const enterD      = wrapH - base - PEEK;

            cards.forEach((card, i) => {
                let ty, scale, opacity, z;
                if (i === idx) {
                    ty      = base - prog * exitD;
                    scale   = 1 - prog * 0.02;
                    opacity = prog > 0.6 ? 1 - (prog - 0.6) / 0.4 : 1;
                    z       = 20;
                } else if (i === idx + 1) {
                    ty      = base + (1 - prog) * enterD;
                    scale   = 0.97 + prog * 0.03;
                    opacity = 0.55 + prog * 0.45;
                    z       = 10;
                } else if (i > idx + 1) {
                    ty = wrapH; scale = 0.95; opacity = 0; z = 5;
                } else {
                    ty = -exitD; scale = 0.98; opacity = 0; z = 0;
                }
                card.style.transform = `translateY(${ty}px) scale(${scale})`;
                card.style.opacity   = String(opacity);
                card.style.zIndex    = String(z);
            });

            dots.forEach((d, i) => d.classList.toggle('active', i === idx));
        }

        function onScroll() {
            if (!rafId) {
                rafId = requestAnimationFrame(() => {
                    update();
                    rafId = null;
                });
            }
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

        window.addEventListener('resize', () => {
            measure();
            if (inView) update();
        });

        if ('IntersectionObserver' in window) {
            new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    start();
                } else {
                    stop();
                }
            }, { threshold: 0.1 }).observe(outer);
        } else {
            start();
        }
    }

    // â”€â”€â”€ Erasmus Stepper â”€â”€â”€
    function initErasmusStepper() {
        const steppers = document.querySelectorAll('[data-stepper]');
        if (!steppers.length) return;

        steppers.forEach((root) => {
            const indicators = Array.from(root.querySelectorAll('[data-step]'));
            const connectors = Array.from(root.querySelectorAll('[data-connector]'));
            const panels = Array.from(root.querySelectorAll('[data-step-panel]'));
            const content = root.querySelector('.er-stepper-content');
            const nav = root.querySelector('[data-stepper-nav]');
            const backBtn = root.querySelector('[data-stepper-back]');
            const nextBtn = root.querySelector('[data-stepper-next]');
            const total = panels.length;
            if (!total) return;

            let current = parseInt(root.getAttribute('data-initial') || '1', 10);
            if (Number.isNaN(current)) current = 1;
            current = Math.min(Math.max(1, current), total);

            const updateHeight = () => {
                if (!content) return;
                const active = panels[current - 1];
                if (active) content.style.height = `${active.offsetHeight}px`;
            };

            const setStep = (step) => {
                if (step < 1 || step > total) return;
                current = step;

                indicators.forEach((btn) => {
                    const s = parseInt(btn.getAttribute('data-step') || '0', 10);
                    const isActive = s === current;
                    const isComplete = s < current;
                    btn.classList.toggle('is-active', isActive);
                    btn.classList.toggle('is-complete', isComplete);
                    btn.classList.toggle('is-inactive', s > current);
                    btn.setAttribute('aria-current', isActive ? 'step' : 'false');
                });

                connectors.forEach((conn) => {
                    const s = parseInt(conn.getAttribute('data-connector') || '0', 10);
                    conn.classList.toggle('is-complete', s < current);
                });

                panels.forEach((panel) => {
                    const s = parseInt(panel.getAttribute('data-step-panel') || '0', 10);
                    const isActive = s === current;
                    panel.classList.toggle('is-active', isActive);
                    panel.setAttribute('aria-hidden', isActive ? 'false' : 'true');
                });

                if (nav) {
                    nav.classList.toggle('er-stepper-nav--end', current === 1);
                    nav.classList.toggle('er-stepper-nav--spread', current !== 1);
                }
                if (backBtn) backBtn.disabled = current === 1;
                if (nextBtn) nextBtn.textContent = current === total ? 'Complete' : 'Continue';

                updateHeight();
            };

            indicators.forEach((btn) => {
                btn.addEventListener('click', () => {
                    const target = parseInt(btn.getAttribute('data-step') || '0', 10);
                    if (!Number.isNaN(target)) setStep(target);
                });
            });

            if (backBtn) backBtn.addEventListener('click', () => setStep(current - 1));
            if (nextBtn) nextBtn.addEventListener('click', () => {
                if (current < total) setStep(current + 1);
            });

            window.addEventListener('resize', updateHeight);
            setStep(current);
        });
    }

    // â”€â”€â”€ Smooth scroll for anchor links â”€â”€â”€
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const target = document.querySelector(a.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        initScrollStack();
        initErasmusStepper();
    });
