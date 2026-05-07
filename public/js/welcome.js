// Hero Slider
const AUTOPLAY_MS = 6000;
const mobileQuery = window.matchMedia('(max-width: 768px)');

const heroSection = document.querySelector('.hero');
const heroBg = document.querySelector('.hero-bg');
const heroTitleWhite = document.querySelector('.hero-title-white');
const heroTitleOrange = document.querySelector('.hero-title-orange');
const heroSubtitle = document.querySelector('.hero-subtitle');

const slides = window.HERO_SLIDES || [];

let currentSlide = 0;
let autoplayTimer;
let isHeroInView = true;
let parallaxTicking = false;
let slideToken = 0;

const fallbackBg = slides[0] ? slides[0].bg : '';
const brokenImages = new Set();

function preloadImage(url) {
    return new Promise((resolve, reject) => {
        const img = new Image();
        img.decoding = 'async';
        img.onload = () => resolve(url);
        img.onerror = reject;
        img.src = url;
    });
}

function preloadNonInitialSlides() {
    slides.slice(1).forEach((slide) => {
        preloadImage(slide.bg).catch(() => {
            brokenImages.add(slide.bg);
        });
    });
}

function getSlideBg(slide) {
    return brokenImages.has(slide.bg) ? fallbackBg : slide.bg;
}

function shouldAutoplay() {
    return !mobileQuery.matches && document.visibilityState === 'visible' && isHeroInView;
}

function scheduleAutoplay() {
    clearTimeout(autoplayTimer);
    if (!shouldAutoplay()) return;
    autoplayTimer = setTimeout(() => {
        nextSlide();
        scheduleAutoplay();
    }, AUTOPLAY_MS);
}

function updateIndicators() {
    document.querySelectorAll('.slide-item').forEach((item, index) => {
        item.classList.toggle('active', index === currentSlide);
    });
}

function updateSlide() {
    const slide = slides[currentSlide];
    const token = ++slideToken;
    const bgToUse = getSlideBg(slide);

    if (heroBg) heroBg.style.opacity = '0';

    setTimeout(() => {
        if (token !== slideToken) return;
        if (heroBg) {
            heroBg.style.backgroundImage = `url('${bgToUse}')`;
            heroBg.style.backgroundPosition = slide.position || 'center center';
            heroBg.style.opacity = mobileQuery.matches ? '0.28' : '0.9';
        }
    }, 220);

    if (heroTitleWhite) heroTitleWhite.style.animation = 'none';
    if (heroTitleOrange) heroTitleOrange.style.animation = 'none';
    if (heroSubtitle) heroSubtitle.style.animation = 'none';

    setTimeout(() => {
        if (token !== slideToken) return;
        if (heroTitleWhite) {
            heroTitleWhite.textContent = slide.titleWhite;
            heroTitleWhite.style.animation = 'fadeInUp 0.6s ease-out forwards';
        }
        if (heroTitleOrange) {
            heroTitleOrange.textContent = slide.titleOrange;
            heroTitleOrange.style.animation = 'fadeInUp 0.6s ease-out 0.1s forwards';
        }
        if (heroSubtitle) {
            heroSubtitle.textContent = slide.subtitle;
            heroSubtitle.style.animation = 'fadeInUp 0.6s ease-out 0.2s forwards';
        }
    }, 50);

    updateIndicators();
}

function changeSlide(index) {
    currentSlide = index;
    updateSlide();
    scheduleAutoplay();
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    updateSlide();
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    updateSlide();
    scheduleAutoplay();
}

function handleParallax() {
    if (!heroBg || !heroSection || mobileQuery.matches || !isHeroInView) return;
    if (parallaxTicking) return;
    parallaxTicking = true;
    requestAnimationFrame(() => {
        const heroTop = heroSection.offsetTop;
        const localScroll = Math.max(0, window.pageYOffset - heroTop);
        heroBg.style.transform = `translateY(calc(-50% + ${localScroll * 0.35}px))`;
        parallaxTicking = false;
    });
}

function resetHeroTransform() {
    if (!heroBg) return;
    heroBg.style.transform = mobileQuery.matches ? 'none' : 'translateY(-50%)';
}

function setupHeroIntersectionObserver() {
    if (!heroSection || typeof IntersectionObserver === 'undefined') return;
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            isHeroInView = entry.isIntersecting;
            if (!isHeroInView) resetHeroTransform();
            scheduleAutoplay();
        });
    }, { threshold: 0.15 });
    observer.observe(heroSection);
}

function bootHeroSlider() {
    updateSlide();
    resetHeroTransform();
    scheduleAutoplay();
    setupHeroIntersectionObserver();
    if ('requestIdleCallback' in window) {
        requestIdleCallback(preloadNonInitialSlides, { timeout: 1200 });
    } else {
        setTimeout(preloadNonInitialSlides, 700);
    }
}

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) target.scrollIntoView({ behavior: 'smooth' });
    });
});

// Runtime events
window.addEventListener('scroll', handleParallax, { passive: true });
window.addEventListener('resize', () => {
    resetHeroTransform();
    scheduleAutoplay();
}, { passive: true });
document.addEventListener('visibilitychange', scheduleAutoplay);

if (typeof mobileQuery.addEventListener === 'function') {
    mobileQuery.addEventListener('change', () => {
        resetHeroTransform();
        scheduleAutoplay();
    });
} else if (typeof mobileQuery.addListener === 'function') {
    mobileQuery.addListener(() => {
        resetHeroTransform();
        scheduleAutoplay();
    });
}

bootHeroSlider();

// Pathway — interactive 4-stage journey
(function initPathway() {
    const root = document.querySelector('.pathway-stage');
    if (!root) return;

    let stages;
    try {
        stages = JSON.parse(root.dataset.stages);
    } catch (err) {
        return;
    }
    if (!Array.isArray(stages) || !stages.length) return;

    const stepsEls = root.querySelectorAll('.p-step');
    const detailEl = root.querySelector('.p-step-detail');
    const progressEl = root.querySelector('.pathway-progress');
    const ctaEl = root.querySelector('[data-cta]');
    const ctaLabel = root.querySelector('[data-cta-label]');

    const routes = (window.ROUTES) || {};
    const ctaCopy = {
        'study-in-ireland': 'Explore Study Routes',
        'career-bridge': 'Explore Career Bridge',
    };
    const ctaHref = {
        'study-in-ireland': routes.studyInIreland || '#',
        'career-bridge': routes.careerBridge || '#',
    };

    let active = 0;
    let timer = null;
    let userInteracted = false;
    const last = stages.length - 1;

    function render(i) {
        active = i;
        stepsEls.forEach((el, idx) => {
            el.classList.toggle('active', idx === i);
            el.classList.toggle('done', idx < i);
            el.setAttribute('aria-selected', idx === i ? 'true' : 'false');
        });
        if (progressEl) {
            progressEl.style.width = `${(i / last) * 80}%`;
        }
        if (detailEl) {
            const cells = stages[i].detail.map(d => `
                <div>
                    <div class="p-detail-key">${d.k}</div>
                    <div class="p-detail-val">${d.v}<small>${d.s}</small></div>
                </div>
            `).join('');
            detailEl.innerHTML = cells;
        }
        const target = stages[i].cta;
        if (ctaLabel) ctaLabel.textContent = ctaCopy[target] || ctaLabel.textContent;
        if (ctaEl && ctaHref[target]) ctaEl.setAttribute('href', ctaHref[target]);
    }

    function startAuto() {
        stopAuto();
        timer = setInterval(() => render((active + 1) % stages.length), 5500);
    }
    function stopAuto() {
        if (timer) {
            clearInterval(timer);
            timer = null;
        }
    }

    stepsEls.forEach((el, idx) => {
        el.addEventListener('click', () => {
            userInteracted = true;
            stopAuto();
            render(idx);
        });
    });
    root.addEventListener('mouseenter', stopAuto);
    root.addEventListener('mouseleave', () => {
        if (!userInteracted) startAuto();
    });

    render(0);
    if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) startAuto();
})();

// Diagnostic — quiz modal
(function initQuiz() {
    const data = window.QUIZ_DATA;
    const routes = window.ROUTES || {};
    const backdrop = document.querySelector('[data-quiz-modal]');
    if (!data || !backdrop) return;

    const subEl = backdrop.querySelector('[data-quiz-step-label]');
    const headEl = backdrop.querySelector('[data-quiz-headline]');
    const bodyEl = backdrop.querySelector('[data-quiz-body]');
    const footEl = backdrop.querySelector('[data-quiz-foot]');
    const closeBtn = backdrop.querySelector('[data-quiz-close]');
    const dialogEl = backdrop.querySelector('.quiz-modal');

    const total = data.questions.length;
    let step = 0;
    let answers = [];
    let recommendation = null;

    function escapeHtml(s) {
        return String(s ?? '').replace(/[&<>"']/g, c => ({
            '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
        })[c]);
    }

    function focusFirst() {
        const target = bodyEl.querySelector('button, a, input, [tabindex]') || dialogEl;
        if (target && typeof target.focus === 'function') {
            target.focus({ preventScroll: true });
        }
    }

    function open() {
        backdrop.hidden = false;
        backdrop.setAttribute('aria-hidden', 'false');
        requestAnimationFrame(() => backdrop.classList.add('open'));
        document.body.style.overflow = 'hidden';
        renderStep();
    }

    function close() {
        backdrop.classList.remove('open');
        backdrop.setAttribute('aria-hidden', 'true');
        setTimeout(() => {
            backdrop.hidden = true;
            document.body.style.overflow = '';
        }, 300);
        reset();
    }

    function reset() {
        step = 0;
        answers = [];
        recommendation = null;
    }

    function renderStep() {
        if (step < total) {
            renderQuestion();
        } else {
            computeRecommendation();
            renderResult();
        }
        focusFirst();
    }

    function renderQuestion() {
        const q = data.questions[step];
        const i18n = window.I18N || {};
        subEl.textContent = `${i18n.question_label || 'Question'} ${String(step + 1).padStart(2, '0')} / 0${total}`;
        headEl.textContent = q.q;
        bodyEl.innerHTML = `<div class="q-modal-opts">${q.opts.map((o, j) => `
            <button type="button" class="q-modal-opt" data-opt="${j}">
                <span>${escapeHtml(o.t)}</span>
                <span class="k">${String.fromCharCode(65 + j)}</span>
            </button>
        `).join('')}</div>`;
        bodyEl.querySelectorAll('[data-opt]').forEach(btn => btn.addEventListener('click', () => {
            answers[step] = parseInt(btn.dataset.opt, 10);
            step++;
            renderStep();
        }));
        const dots = data.questions.map((_, k) => `<span class="${k <= step - 1 ? 'done' : ''}"></span>`).join('');
        const backLabel = (window.I18N && window.I18N.back) || '← Back';
        footEl.innerHTML = `
            <div class="q-modal-progress" aria-hidden="true">${dots}</div>
            ${step > 0 ? `<button type="button" class="q-modal-back">${backLabel}</button>` : ''}
        `;
        const back = footEl.querySelector('.q-modal-back');
        if (back) back.addEventListener('click', () => { step = Math.max(0, step - 1); renderStep(); });
    }

    function computeRecommendation() {
        let proScore = 0;
        let heScore = 0;
        data.questions.forEach((q, i) => {
            const a = answers[i];
            if (a == null) return;
            const opt = q.opts[a];
            if (!opt) return;
            if (opt.lean === 'pro') proScore += opt.w;
            else if (opt.lean === 'he') heScore += opt.w;
        });
        recommendation = proScore > heScore ? data.recommendations.pro : data.recommendations.he;
    }

    function renderResult() {
        const r = recommendation;
        const i18n = window.I18N || {};
        subEl.textContent = i18n.your_pathway || 'Your pathway';
        headEl.textContent = r.title;
        const targetRoute = r.route === 'study-in-ireland' ? routes.studyInIreland : routes.careerBridge;
        bodyEl.innerHTML = `
            <div class="q-result">
                <div class="badge">${escapeHtml(r.badge)}</div>
                <p class="q-result-lead">${escapeHtml(r.lead)}</p>
                <ul>${r.bullets.map(b => `<li>${escapeHtml(b)}</li>`).join('')}</ul>
                <div class="q-result-ctas">
                    <a class="q-result-cta-primary" href="${targetRoute || '#'}">${escapeHtml(r.label)} <span aria-hidden="true">→</span></a>
                    <button type="button" class="q-result-cta-secondary" data-quiz-contact>${escapeHtml(i18n.send_my_answers || 'Send my answers to an advisor')}</button>
                </div>
            </div>`;
        footEl.innerHTML = '';
        bodyEl.querySelector('[data-quiz-contact]').addEventListener('click', renderContact);
    }

    function renderContact() {
        const i18n = window.I18N || {};
        subEl.textContent = i18n.send_to_advisor || 'Send to advisor';
        headEl.textContent = i18n.reach_out || 'A senior advisor will reach out within 1 business day.';
        bodyEl.innerHTML = `
            <form class="q-form" novalidate>
                <div class="field">
                    <label>${escapeHtml(i18n.full_name || 'Full name')}</label>
                    <input name="name" required autocomplete="name">
                </div>
                <div class="q-form-row">
                    <div class="field">
                        <label>${escapeHtml(i18n.email_label || 'Email')}</label>
                        <input name="email" type="email" required autocomplete="email">
                    </div>
                    <div class="field">
                        <label>${escapeHtml(i18n.phone_label || 'Phone (optional)')}</label>
                        <input name="phone" type="tel" autocomplete="tel">
                    </div>
                </div>
                <div class="q-form-error" data-error hidden></div>
                <div class="q-result-ctas">
                    <button type="submit" class="q-result-cta-primary">${escapeHtml(i18n.send_to_advisor || 'Send to advisor')} <span aria-hidden="true">→</span></button>
                    <button type="button" class="q-result-cta-secondary" data-quiz-back-result>${escapeHtml(i18n.back || '← Back')}</button>
                </div>
            </form>`;
        footEl.innerHTML = '';
        const form = bodyEl.querySelector('form');
        form.addEventListener('submit', handleContactSubmit);
        bodyEl.querySelector('[data-quiz-back-result]').addEventListener('click', renderResult);
    }

    async function handleContactSubmit(e) {
        e.preventDefault();
        const form = e.currentTarget;
        const errorEl = form.querySelector('[data-error]');
        errorEl.hidden = true;
        errorEl.textContent = '';

        const fd = new FormData(form);
        const name = (fd.get('name') || '').toString().trim();
        const email = (fd.get('email') || '').toString().trim();
        const phone = (fd.get('phone') || '').toString().trim();

        const i18n = window.I18N || {};
        if (!name) {
            errorEl.textContent = i18n.name_required || 'Please enter your name.';
            errorEl.hidden = false;
            return;
        }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            errorEl.textContent = i18n.email_invalid || 'Please enter a valid email.';
            errorEl.hidden = false;
            return;
        }

        const submitBtn = form.querySelector('button[type=submit]');
        submitBtn.disabled = true;
        submitBtn.textContent = i18n.sending || 'Sending…';

        const payload = {
            name,
            email,
            phone,
            recommendation: recommendation && recommendation.route,
            answers: answers.map((idx, i) => ({
                q: data.questions[i].q,
                a: data.questions[i].opts[idx] ? data.questions[i].opts[idx].t : null,
            })),
        };

        // TODO(backend): replace with axios.post('/diagnostic-inquiry', payload) once
        // the route, FormRequest, Mailable, and DiagnosticInquiry model are in place.
        // The Mailable should send to the configured advisor inbox AND a confirmation
        // copy to the user (per the user's stated preference).
        console.info('[diagnostic stub] payload', payload);
        await new Promise(r => setTimeout(r, 700));

        renderThanks();
    }

    function renderThanks() {
        const i18n = window.I18N || {};
        subEl.textContent = i18n.sent || 'Sent';
        headEl.textContent = '';
        bodyEl.innerHTML = `
            <div class="q-thanks">
                <div class="icon" aria-hidden="true">✓</div>
                <h3>${escapeHtml(i18n.thanks_title || "Thanks — we've got your answers.")}</h3>
                <p>${escapeHtml(i18n.thanks_body || 'A senior advisor will review your pathway and follow up within 1 business day.')}</p>
            </div>`;
        const allDone = data.questions.map(() => '<span class="done"></span>').join('');
        footEl.innerHTML = `<div class="q-modal-progress" aria-hidden="true">${allDone}</div>`;
    }

    document.querySelectorAll('[data-quiz-open]').forEach(el => el.addEventListener('click', open));
    closeBtn.addEventListener('click', close);
    backdrop.addEventListener('click', e => { if (e.target === backdrop) close(); });
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && backdrop.classList.contains('open')) close();
    });
})();
