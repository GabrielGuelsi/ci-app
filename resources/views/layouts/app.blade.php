<!DOCTYPE html>
<html lang="{{ app()->getLocale() === 'pt' ? 'pt-BR' : 'en' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CI Ireland')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-ci.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-ci.png') }}">

    {{-- Google Fonts preconnect --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    {{-- Font Awesome CDN (async — non-blocking) --}}
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    @if (!View::hasSection('no-fontawesome'))
        <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></noscript>
    @endif

    {{-- Page-specific head items (preload hints, etc.) --}}
    @yield('head')

    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/css/base.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="/css/base.css">
    @endif
    <style>
        @yield('styles')
    </style>
</head>
<body>

    {{-- Skip to main content (keyboard/screen reader accessibility) --}}
    <a href="#main-content" class="skip-link">{{ __('Skip to main content') }}</a>

    {{-- Top Banner --}}
    @yield('banner')

    {{-- Secondary Bar (welcome page only) --}}
    @yield('secondary-bar')

    {{-- Main Navigation --}}
    @yield('nav')

    {{-- Mobile Nav Overlay --}}
    <div class="mobile-nav-overlay" id="mobileNavOverlay"></div>

    {{-- Mobile Nav Drawer --}}
    <div class="mobile-nav-drawer" id="mobileNavDrawer" aria-hidden="true">
        <div class="mobile-drawer-header">
            <a href="/" class="logo">
                <img class="logo-image" src="{{ asset('images/logo-ci.png') }}" alt="CI Exchange" style="height:44px;">
            </a>
            <button class="mobile-drawer-close" id="mobileDrawerClose" aria-label="{{ __('Close menu') }}">
                <i class="fas fa-times"></i>
            </button>
        </div>
        @yield('mobile-nav-links')
        @yield('mobile-nav-footer')
    </div>

    {{-- Page Content --}}
    <main id="main-content">
    @yield('content')
    </main>

    {{-- WhatsApp Float --}}
    <a class="whatsapp-float" href="https://wa.me/353868179430" target="_blank" rel="noopener" aria-label="WhatsApp CI Ireland">
        <i class="fab fa-whatsapp"></i>
    </a>

    {{-- Coming Soon Toast --}}
    <div class="coming-soon-toast" id="comingSoonToast" role="status" aria-live="polite"></div>

    {{-- Shared Footer --}}
    <footer class="ci-footer" id="contact">
        <div class="container">
            <div class="footer-stack">
                <div class="footer-panel footer-top">
                    <div class="footer-brand">
                        <img class="footer-logo" src="{{ asset('images/logo-ci.png') }}" alt="CI Exchange">
                        <p class="footer-tagline">@yield('footer-tagline', __('Study in Ireland with confidence. Our Dublin team helps you choose, apply, and arrive.'))</p>
                        <div class="footer-contact-pill">
                            <i class="fas fa-phone"></i>
                            {{ __('Admissions Team') }} +353 83 083 7734 / +353 86 014 2313
                        </div>
                    </div>
                    <div class="footer-contact">
                        <div class="contact-card">
                            <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <div class="contact-label">{{ __('Visit us') }}</div>
                                <div class="contact-value">CI Intercambio - Irlanda</div>
                                <div class="contact-meta">{{ __('Dublin office') }}</div>
                            </div>
                        </div>
                        <div class="contact-card">
                            <div class="contact-icon"><i class="fab fa-instagram"></i></div>
                            <div>
                                <div class="contact-label">Instagram</div>
                                <div class="contact-value">@ciirlanda</div>
                                <div class="contact-meta">{{ __('Send us a DM for quick questions') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-panel footer-map-panel">
                    <div class="footer-map-header">
                        <div class="footer-map-title">{{ __('Find us on the map') }}</div>
                        <a class="footer-map-link" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2381.85573145558!2d-6.273963188021604!3d53.34583867464635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670c28196db075%3A0xe343f6fe09993741!2sCI%20Interc%C3%A2mbio%20-%20Irlanda!5e0!3m2!1spt-BR!2sbr!4v1772016557899!5m2!1spt-BR!2sbr" target="_blank" rel="noopener">{{ __('Open in Google Maps') }}</a>
                    </div>
                    <div class="footer-map-wrap">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2381.85573145558!2d-6.273963188021604!3d53.34583867464635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670c28196db075%3A0xe343f6fe09993741!2sCI%20Interc%C3%A2mbio%20-%20Irlanda!5e0!3m2!1spt-BR!2sbr!4v1772016557899!5m2!1spt-BR!2sbr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="CI Intercambio - Irlanda map"></iframe>
                    </div>
                </div>

                <div class="footer-panel footer-social-panel">
                    <div class="footer-social-header">
                        <h3>{{ __('Follow CI Ireland') }}</h3>
                        <p>{{ __('Instagram, Facebook, and LinkedIn updates from our Dublin team.') }}</p>
                    </div>
                    <div class="footer-socials">
                        <a class="footer-social-link instagram" href="https://www.instagram.com/ciirlanda/" target="_blank" rel="noopener">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                        <a class="footer-social-link" href="https://www.facebook.com/CI.Intercambio.Irlanda" target="_blank" rel="noopener">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a class="footer-social-link" href="https://www.linkedin.com/company/ci-irlanda/?originalSubdomain=ie" target="_blank" rel="noopener">
                            <i class="fab fa-linkedin-in"></i> LinkedIn
                        </a>
                    </div>
                    <div class="footer-note">@yield('footer-note', __('Share your Facebook and LinkedIn URLs to activate these links.'))</div>
                </div>

                <div class="footer-bottom">
                    <span>{{ __('CI Exchange Ireland. All rights reserved.') }}</span>
                    <span>@yield('footer-bottom-right', __('Designed for future students worldwide.'))</span>
                </div>
            </div>
        </div>
    </footer>

    {{-- Shared Mobile Nav JS --}}
    <script>
        (function () {
            var hamburgerBtn    = document.getElementById('hamburgerBtn');
            var mobileNavDrawer = document.getElementById('mobileNavDrawer');
            var mobileNavOverlay = document.getElementById('mobileNavOverlay');
            var mobileDrawerClose = document.getElementById('mobileDrawerClose');

            if (!hamburgerBtn) return;

            function openMobileNav() {
                hamburgerBtn.classList.add('open');
                hamburgerBtn.setAttribute('aria-expanded', 'true');
                mobileNavDrawer.classList.add('open');
                mobileNavDrawer.setAttribute('aria-hidden', 'false');
                mobileNavOverlay.classList.add('open');
                document.body.style.overflow = 'hidden';
            }

            function closeMobileNav() {
                hamburgerBtn.classList.remove('open');
                hamburgerBtn.setAttribute('aria-expanded', 'false');
                mobileNavDrawer.classList.remove('open');
                mobileNavDrawer.setAttribute('aria-hidden', 'true');
                mobileNavOverlay.classList.remove('open');
                document.body.style.overflow = '';
            }

            hamburgerBtn.addEventListener('click', function () {
                mobileNavDrawer.classList.contains('open') ? closeMobileNav() : openMobileNav();
            });

            if (mobileDrawerClose) mobileDrawerClose.addEventListener('click', closeMobileNav);
            if (mobileNavOverlay) mobileNavOverlay.addEventListener('click', closeMobileNav);

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && mobileNavDrawer.classList.contains('open')) closeMobileNav();
            });
        })();

        // Coming Soon Toast
        (function () {
            var comingSoonToast = document.getElementById('comingSoonToast');
            var toastTimeout;

            function showComingSoonToast(message) {
                if (!comingSoonToast) return;
                comingSoonToast.textContent = message;
                comingSoonToast.classList.add('show');
                clearTimeout(toastTimeout);
                toastTimeout = setTimeout(function () {
                    comingSoonToast.classList.remove('show');
                }, 2600);
            }

            document.addEventListener('click', function (event) {
                var comingSoonLink = event.target.closest('[data-coming-soon="true"]');
                if (!comingSoonLink) return;
                event.preventDefault();
                event.stopPropagation();
                showComingSoonToast(@json(__('This section is being upgraded and will be available soon.')));
            });
        })();
    </script>

    @stack('scripts')

</body>
</html>

