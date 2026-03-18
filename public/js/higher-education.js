function openModal() {
    const modal = document.getElementById('consultModal');
    if (!modal) return;
    modal.classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    const modal = document.getElementById('consultModal');
    if (!modal) return;
    modal.classList.remove('open');
    document.body.style.overflow = '';
}

function initModal() {
    const modal = document.getElementById('consultModal');
    if (!modal) return;

    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeModal();
        }
    });
}

// Scroll Stack
function initScrollStack() {
    const outer  = document.querySelector('.scroll-stack-outer');
    if (!outer) return;
    const cards  = Array.from(document.querySelectorAll('.step-card'));
    const dots   = Array.from(document.querySelectorAll('.stack-dot'));
    const wrap   = outer.querySelector('.stack-cards-wrap');
    const n    = cards.length;
    const PEEK = 38;

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

    let rafId = null;
    let inView = false;
    let cardH = 350;
    let wrapH = 0;
    let headerH = 0;

    function setOuterHeight() {
        const steps = Math.max(1, n - 1);
        const baseH = wrapH > 0 ? wrapH : window.innerHeight;
        const perCard = Math.round(cardH * 0.45);
        const target = Math.round(baseH + perCard * steps);
        outer.style.height = `${Math.max(baseH + 1, target)}px`;
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
        const scaled      = total * n;
        const idx         = Math.min(n - 1, Math.floor(scaled));
        const prog        = idx === n - 1 ? 0 : scaled - Math.floor(scaled);

        // Center cards inside the wrap (works at any screen height)
        const base   = Math.round(Math.max(0, (wrapH - cardH) / 2));
        const exitD  = base + cardH + 30;          // distance to clear top
        const enterD = wrapH - base - PEEK;         // distance to peek from bottom

        cards.forEach((card, i) => {
            let ty, scale, opacity, z;

            if (i === idx) {
                // Active: centered (base), then flies up as next arrives
                ty      = base - prog * exitD;
                scale   = 1 - prog * 0.02;
                opacity = prog > 0.6 ? 1 - (prog - 0.6) / 0.4 : 1;
                z       = 20;
            } else if (i === idx + 1) {
                // Next: peeks from bottom (base + enterD), rises to center (base)
                ty      = base + (1 - prog) * enterD;
                scale   = 0.97 + prog * 0.03;
                opacity = 0.55 + prog * 0.45;
                z       = 10;
            } else if (i > idx + 1) {
                // Future: hidden below
                ty = wrapH; scale = 0.95; opacity = 0; z = 5;
            } else {
                // Past: gone above
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

document.addEventListener('DOMContentLoaded', () => {
    initModal();
    initScrollStack();
});
