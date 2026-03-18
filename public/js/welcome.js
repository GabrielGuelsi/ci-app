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

// Persona tab switcher
const personaTabs = document.querySelectorAll('.persona-tab');
const programPanels = document.querySelectorAll('.program-panel');

personaTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        const target = tab.dataset.panel;
        personaTabs.forEach(t => {
            t.classList.remove('active');
            t.setAttribute('aria-selected', 'false');
        });
        tab.classList.add('active');
        tab.setAttribute('aria-selected', 'true');
        programPanels.forEach(panel => panel.classList.remove('active'));
        document.getElementById('panel-' + target).classList.add('active');
    });
});
