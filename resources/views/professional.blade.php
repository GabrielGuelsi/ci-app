@extends('layouts.app')

@section('title', 'CI Professional | Recruitment & Career Services in Ireland')
@section('no-fontawesome', true)

@section('head')
    @if (file_exists(public_path('build/manifest.json')))
        @vite('resources/css/professional.css')
    @else
        <link rel="stylesheet" href="/css/professional.css">
    @endif
@endsection

@section('styles')
@endsection

@section('footer-tagline')CI Professional &mdash; Recruitment &amp; Career Services in Ireland.@endsection
@section('footer-bottom-right')Connecting Qualified Professionals with Irish Employers.@endsection

@section('banner')
    <svg xmlns="http://www.w3.org/2000/svg" style="position:absolute;width:0;height:0;overflow:hidden" aria-hidden="true">
        <symbol id="icon-arrow-right" viewBox="0 0 24 24">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
        </symbol>
        <symbol id="icon-briefcase" viewBox="0 0 24 24">
            <rect x="2" y="8" width="20" height="13" rx="2"></rect>
            <path d="M16 8V6a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"></path>
        </symbol>
        <symbol id="icon-users" viewBox="0 0 24 24">
            <circle cx="8" cy="9" r="2.5"></circle>
            <circle cx="16" cy="9" r="2.5"></circle>
            <path d="M2.5 20c1-3 6-4 7.5-4"></path>
            <path d="M14 16c3 0 6 1 7.5 4"></path>
        </symbol>
        <symbol id="icon-check" viewBox="0 0 24 24">
            <polyline points="20 6 9 17 4 12"></polyline>
        </symbol>
        <symbol id="icon-target" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="9"></circle>
            <circle cx="12" cy="12" r="5"></circle>
            <circle cx="12" cy="12" r="1"></circle>
        </symbol>
        <symbol id="icon-handshake" viewBox="0 0 24 24">
            <path d="M4 12l4-4 5 5"></path>
            <path d="M20 12l-4-4-5 5"></path>
            <path d="M9 13l2 2a2 2 0 0 0 3 0l4-4"></path>
        </symbol>
        <symbol id="icon-award" viewBox="0 0 24 24">
            <circle cx="12" cy="9" r="6"></circle>
            <path d="M8.21 13.89L7 23l5-3 5 3-1.21-9.12"></path>
        </symbol>
        <symbol id="icon-user" viewBox="0 0 24 24">
            <circle cx="12" cy="8" r="3"></circle>
            <path d="M5 21c1.5-4 12.5-4 14 0"></path>
        </symbol>
        <symbol id="icon-globe" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="9"></circle>
            <path d="M3 12h18"></path>
            <path d="M12 3c3 3.5 3 14 0 18"></path>
            <path d="M12 3c-3 3.5-3 14 0 18"></path>
        </symbol>
        <symbol id="icon-file-text" viewBox="0 0 24 24">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
            <polyline points="14 2 14 8 20 8"></polyline>
            <line x1="16" y1="13" x2="8" y2="13"></line>
            <line x1="16" y1="17" x2="8" y2="17"></line>
        </symbol>
        <symbol id="icon-star" viewBox="0 0 24 24">
            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
        </symbol>
        <symbol id="icon-shield" viewBox="0 0 24 24">
            <path d="M12 2l8 4v6c0 5-4 9-8 10C8 21 4 17 4 12V6l8-4z"></path>
        </symbol>
        <symbol id="icon-building" viewBox="0 0 24 24">
            <path d="M4 20h16"></path>
            <path d="M6 20V8"></path>
            <path d="M10 20V8"></path>
            <path d="M14 20V8"></path>
            <path d="M18 20V8"></path>
            <path d="M4 8h16"></path>
            <path d="M12 4l8 4H4l8-4z"></path>
        </symbol>
        <symbol id="icon-linkedin" viewBox="0 0 24 24">
            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
            <rect x="2" y="9" width="4" height="12"></rect>
            <circle cx="4" cy="4" r="2"></circle>
        </symbol>
        <symbol id="icon-dollar" viewBox="0 0 24 24">
            <line x1="12" y1="1" x2="12" y2="23"></line>
            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
        </symbol>
        <symbol id="icon-tag" viewBox="0 0 24 24">
            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
            <line x1="7" y1="7" x2="7.01" y2="7"></line>
        </symbol>
        <symbol id="icon-trending-up" viewBox="0 0 24 24">
            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
            <polyline points="17 6 23 6 23 12"></polyline>
        </symbol>
        <symbol id="icon-mail" viewBox="0 0 24 24">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
            <polyline points="22,6 12,13 2,6"></polyline>
        </symbol>
    </svg>

    <div class="top-banner">
        CI Professional &mdash; Connecting Qualified Professionals with Irish Employers.
        <a href="#contact">Get in Touch <svg class="icon" aria-hidden="true"><use href="#icon-arrow-right"></use></svg></a>
    </div>
@endsection

@section('nav')
    <nav class="main-nav">
        <div class="container">
            <div class="nav-content">
                <a href="/" class="logo">
                    <img class="logo-image" src="{{ asset('images/logo-ci.png') }}" alt="CI Ireland">
                </a>
                <ul class="nav-links">
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/higher-education">Higher Education</a></li>
                    <li><a href="/erasmus">Erasmus+</a></li>
                    <li><a href="{{ route('teens') }}">Teens Programmes</a></li>
                    <li><a href="{{ route('corporate') }}">Corporate Learning</a></li>
                    <li><a href="{{ route('professional') }}" class="active">CI Professional</a></li>
                    <li><a href="#contact" class="nav-cta">Get in Touch</a></li>
                </ul>
                <div class="nav-actions">
                    <button class="hamburger-btn" id="hamburgerBtn" aria-label="Open menu" aria-expanded="false">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </nav>
@endsection

@section('mobile-nav-links')
    <ul class="mobile-nav-links">
        <li><a href="/about">About Us <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="/higher-education">Higher Education <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="/erasmus">Erasmus+ <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="{{ route('teens') }}">Teens Programmes <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="{{ route('corporate') }}">Corporate Learning <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="{{ route('professional') }}" class="active">CI Professional <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="#contact">Get in Touch <i class="fas fa-chevron-right"></i></a></li>
    </ul>
@endsection

@section('mobile-nav-footer')
    <div class="mobile-drawer-footer">
        <button class="mobile-cta-btn" onclick="window.location='#contact'">Get in Touch</button>
    </div>
@endsection

@section('content')

    <!-- ===== HERO ===== -->
    <section class="pr-hero">
        <div class="container">
            <div class="pr-hero-split">

                <div class="pr-hero-content">
                    <div class="pr-hero-kicker">
                        <svg class="icon" aria-hidden="true"><use href="#icon-briefcase"></use></svg>
                        Recruitment &amp; Career Services &middot; Ireland
                    </div>
                    <h1 class="pr-hero-title">
                        CI
                        <span>Professional</span>
                    </h1>
                    <p class="pr-hero-sub">
                        Streamlining company hiring needs, CI Professional connects qualified professionals with their dream careers &mdash; bridging the gap between outstanding talent and the best opportunities in Ireland.
                    </p>
                    <div class="pr-hero-ctas">
                        <a href="#contact" class="pr-cta-primary">
                            Join Us <svg class="icon" aria-hidden="true"><use href="#icon-arrow-right"></use></svg>
                        </a>
                        <a href="#services" class="pr-cta-ghost">
                            Our Services <svg class="icon" aria-hidden="true"><use href="#icon-arrow-right"></use></svg>
                        </a>
                    </div>
                </div>

                <div class="pr-hero-visual" aria-hidden="true">
                    <svg class="pr-network-svg" viewBox="0 0 500 420" xmlns="http://www.w3.org/2000/svg" style="overflow:visible">
                        <defs>
                            <pattern id="prgrid" width="30" height="30" patternUnits="userSpaceOnUse">
                                <circle cx="15" cy="15" r="1" fill="rgba(255,255,255,0.05)"/>
                            </pattern>
                            <linearGradient id="pr-line-gradient" x1="0" y1="0" x2="1" y2="1">
                                <stop offset="0%" stop-color="rgba(242,101,34,0.65)"/>
                                <stop offset="50%" stop-color="rgba(255,255,255,0.25)"/>
                                <stop offset="100%" stop-color="rgba(125,86,157,0.55)"/>
                            </linearGradient>
                            <filter id="pr-node-glow" x="-50%" y="-50%" width="200%" height="200%">
                                <feGaussianBlur in="SourceGraphic" stdDeviation="2.5" result="blur"/>
                                <feColorMatrix in="blur" type="matrix"
                                    values="1 0 0 0 0
                                            0 1 0 0 0
                                            0 0 1 0 0
                                            0 0 0 0.6 0"/>
                                <feMerge>
                                    <feMergeNode in="blur"/>
                                    <feMergeNode in="SourceGraphic"/>
                                </feMerge>
                            </filter>
                        </defs>

                        <!-- Background -->
                        <rect width="500" height="420" fill="url(#prgrid)"/>

                        <!-- Zone separators -->
                        <line class="pr-net-divider" x1="165" y1="10" x2="165" y2="405" stroke="rgba(255,255,255,0.08)" stroke-width="1" stroke-dasharray="5 6"/>
                        <line class="pr-net-divider" x1="335" y1="10" x2="335" y2="405" stroke="rgba(255,255,255,0.08)" stroke-width="1" stroke-dasharray="5 6"/>

                        <!-- Zone labels -->
                        <text x="82" y="18" text-anchor="middle" fill="rgba(255,255,255,0.22)" font-size="8" font-family="Montserrat,sans-serif" font-weight="700" letter-spacing="2">PROFESSIONALS</text>
                        <text x="418" y="18" text-anchor="middle" fill="rgba(255,255,255,0.22)" font-size="8" font-family="Montserrat,sans-serif" font-weight="700" letter-spacing="2">EMPLOYERS</text>

                        <!-- Connection paths -->
                        <path id="pr-l1" class="pr-net-line" pathLength="1" d="M 107 80 Q 170 80 198 200" style="animation-delay:0.3s" stroke="url(#pr-line-gradient)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        <path id="pr-l2" class="pr-net-line" pathLength="1" d="M 107 200 L 198 200"        style="animation-delay:0.6s" stroke="url(#pr-line-gradient)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        <path id="pr-l3" class="pr-net-line" pathLength="1" d="M 107 320 Q 170 320 198 200" style="animation-delay:0.9s" stroke="url(#pr-line-gradient)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        <path id="pr-l4" class="pr-net-line" pathLength="1" d="M 302 200 Q 330 80 393 80"  style="animation-delay:1.2s" stroke="url(#pr-line-gradient)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        <path id="pr-l5" class="pr-net-line" pathLength="1" d="M 302 200 L 393 200"        style="animation-delay:1.5s" stroke="url(#pr-line-gradient)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        <path id="pr-l6" class="pr-net-line" pathLength="1" d="M 302 200 Q 330 320 393 320" style="animation-delay:1.8s" stroke="url(#pr-line-gradient)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>

                        <!-- Traveling dots -->
                        <circle class="pr-net-dot" r="3.5" fill="#F26522" opacity="0.9"><animateMotion dur="2s" repeatCount="indefinite" begin="1.2s"><mpath href="#pr-l1"/></animateMotion></circle>
                        <circle class="pr-net-dot" r="3.5" fill="#F26522" opacity="0.9"><animateMotion dur="2s" repeatCount="indefinite" begin="1.8s"><mpath href="#pr-l2"/></animateMotion></circle>
                        <circle class="pr-net-dot" r="3.5" fill="#F26522" opacity="0.9"><animateMotion dur="2s" repeatCount="indefinite" begin="2.4s"><mpath href="#pr-l3"/></animateMotion></circle>
                        <circle class="pr-net-dot" r="3.5" fill="#F26522" opacity="0.9"><animateMotion dur="2s" repeatCount="indefinite" begin="2.1s"><mpath href="#pr-l4"/></animateMotion></circle>
                        <circle class="pr-net-dot" r="3.5" fill="#F26522" opacity="0.9"><animateMotion dur="2s" repeatCount="indefinite" begin="2.7s"><mpath href="#pr-l5"/></animateMotion></circle>
                        <circle class="pr-net-dot" r="3.5" fill="#F26522" opacity="0.9"><animateMotion dur="2s" repeatCount="indefinite" begin="3.3s"><mpath href="#pr-l6"/></animateMotion></circle>

                        <!-- Hub radar rings -->
                        <circle class="pr-hub-ring" cx="250" cy="200" r="48"/>
                        <circle class="pr-hub-ring" cx="250" cy="200" r="48" style="animation-delay:1.4s"/>
                        <circle class="pr-hub-ring" cx="250" cy="200" r="48" style="animation-delay:2.8s"/>

                        <!-- Hub -->
                        <circle cx="250" cy="200" r="52" fill="rgba(242,101,34,0.07)" stroke="rgba(242,101,34,0.18)" stroke-width="1"/>
                        <circle cx="250" cy="200" r="38" fill="rgba(242,101,34,0.14)" stroke="rgba(242,101,34,0.32)" stroke-width="1.5"/>
                        <circle cx="250" cy="200" r="28" fill="#F26522"/>
                        <text x="250" y="196" text-anchor="middle" fill="#fff" font-size="12" font-family="Montserrat,sans-serif" font-weight="900" letter-spacing="1">CI</text>
                        <text x="250" y="210" text-anchor="middle" fill="rgba(255,255,255,0.88)" font-size="7" font-family="Montserrat,sans-serif" font-weight="700" letter-spacing="1.5">MATCH</text>

                        <!-- Professional nodes (left — circles) -->
                        <g class="pr-net-node" style="animation-delay:0.1s">
                            <circle cx="75" cy="80" r="32" fill="rgba(255,255,255,0.06)" stroke="rgba(255,255,255,0.2)" stroke-width="1.5"/>
                            <circle cx="75" cy="73" r="8.5" fill="none" stroke="rgba(255,255,255,0.7)" stroke-width="1.5"/>
                            <path d="M 57 97 Q 59 88 75 88 Q 91 88 93 97" fill="none" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-linecap="round"/>
                            <text x="75" y="126" text-anchor="middle" fill="rgba(255,255,255,0.38)" font-size="8.5" font-family="Montserrat,sans-serif" font-weight="700" letter-spacing="1">IT</text>
                        </g>
                        <g class="pr-net-node" style="animation-delay:0.3s">
                            <circle cx="75" cy="200" r="32" fill="rgba(255,255,255,0.06)" stroke="rgba(255,255,255,0.2)" stroke-width="1.5"/>
                            <circle cx="75" cy="193" r="8.5" fill="none" stroke="rgba(255,255,255,0.7)" stroke-width="1.5"/>
                            <path d="M 57 217 Q 59 208 75 208 Q 91 208 93 217" fill="none" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-linecap="round"/>
                            <text x="75" y="246" text-anchor="middle" fill="rgba(255,255,255,0.38)" font-size="8.5" font-family="Montserrat,sans-serif" font-weight="700" letter-spacing="1">HEALTH</text>
                        </g>
                        <g class="pr-net-node" style="animation-delay:0.5s">
                            <circle cx="75" cy="320" r="32" fill="rgba(255,255,255,0.06)" stroke="rgba(255,255,255,0.2)" stroke-width="1.5"/>
                            <circle cx="75" cy="313" r="8.5" fill="none" stroke="rgba(255,255,255,0.7)" stroke-width="1.5"/>
                            <path d="M 57 337 Q 59 328 75 328 Q 91 328 93 337" fill="none" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-linecap="round"/>
                            <text x="75" y="366" text-anchor="middle" fill="rgba(255,255,255,0.38)" font-size="8.5" font-family="Montserrat,sans-serif" font-weight="700" letter-spacing="1">FINANCE</text>
                        </g>

                        <!-- Employer nodes (right — rounded rects) -->
                        <g class="pr-net-node" style="animation-delay:1.4s">
                            <rect x="393" y="48" width="64" height="64" rx="16" fill="rgba(255,255,255,0.06)" stroke="rgba(242,101,34,0.38)" stroke-width="1.5"/>
                            <rect x="407" y="58" width="36" height="44" rx="3" fill="none" stroke="rgba(255,255,255,0.55)" stroke-width="1.5"/>
                            <rect x="413" y="65" width="7" height="7" rx="1" fill="rgba(255,255,255,0.32)"/>
                            <rect x="425" y="65" width="7" height="7" rx="1" fill="rgba(255,255,255,0.32)"/>
                            <rect x="413" y="77" width="7" height="7" rx="1" fill="rgba(255,255,255,0.32)"/>
                            <rect x="425" y="77" width="7" height="7" rx="1" fill="rgba(255,255,255,0.32)"/>
                            <rect x="419" y="89" width="12" height="13" rx="1" fill="rgba(255,255,255,0.28)"/>
                            <text x="425" y="126" text-anchor="middle" fill="rgba(255,255,255,0.38)" font-size="8.5" font-family="Montserrat,sans-serif" font-weight="700" letter-spacing="1">TECH</text>
                        </g>
                        <g class="pr-net-node" style="animation-delay:1.7s">
                            <rect x="393" y="168" width="64" height="64" rx="16" fill="rgba(255,255,255,0.06)" stroke="rgba(242,101,34,0.38)" stroke-width="1.5"/>
                            <rect x="405" y="183" width="40" height="27" rx="4" fill="none" stroke="rgba(255,255,255,0.55)" stroke-width="1.5"/>
                            <path d="M 416 183 L 416 179 Q 416 176 419 176 L 431 176 Q 434 176 434 179 L 434 183" fill="none" stroke="rgba(255,255,255,0.55)" stroke-width="1.5"/>
                            <line x1="405" y1="194" x2="445" y2="194" stroke="rgba(255,255,255,0.28)" stroke-width="1"/>
                            <text x="425" y="246" text-anchor="middle" fill="rgba(255,255,255,0.38)" font-size="8.5" font-family="Montserrat,sans-serif" font-weight="700" letter-spacing="1">RETAIL</text>
                        </g>
                        <g class="pr-net-node" style="animation-delay:2.0s">
                            <rect x="393" y="288" width="64" height="64" rx="16" fill="rgba(255,255,255,0.06)" stroke="rgba(242,101,34,0.38)" stroke-width="1.5"/>
                            <rect x="417" y="298" width="16" height="44" rx="3" fill="none" stroke="rgba(255,255,255,0.55)" stroke-width="1.5"/>
                            <rect x="408" y="311" width="34" height="16" rx="3" fill="none" stroke="rgba(255,255,255,0.55)" stroke-width="1.5"/>
                            <text x="425" y="366" text-anchor="middle" fill="rgba(255,255,255,0.38)" font-size="8.5" font-family="Montserrat,sans-serif" font-weight="700" letter-spacing="1">HEALTHCARE</text>
                        </g>

                        <!-- Floating stats panel -->
                        <g class="pr-net-stats">
                            <rect x="178" y="258" width="144" height="46" rx="12" fill="rgba(255,255,255,0.05)" stroke="rgba(255,255,255,0.1)" stroke-width="1"/>
                            <text x="250" y="276" text-anchor="middle" fill="rgba(255,255,255,0.32)" font-size="7" font-family="Montserrat,sans-serif" font-weight="700" letter-spacing="2">TOTAL MATCHES</text>
                            <text x="250" y="295" text-anchor="middle" fill="#F26522" font-size="16" font-family="Montserrat,sans-serif" font-weight="900" letter-spacing="-0.5">500,000+</text>
                        </g>
                    </svg>
                </div>

                <div class="pr-hero-visual pr-hero-visual--mobile" aria-hidden="true">
                    <svg class="pr-network-svg pr-network-svg--mobile" viewBox="0 0 360 260" xmlns="http://www.w3.org/2000/svg" style="overflow:visible">
                        <defs>
                            <pattern id="prgrid-m" width="26" height="26" patternUnits="userSpaceOnUse">
                                <circle cx="13" cy="13" r="1" fill="rgba(255,255,255,0.05)"/>
                            </pattern>
                            <linearGradient id="pr-line-gradient-m" x1="0" y1="0" x2="1" y2="1">
                                <stop offset="0%" stop-color="rgba(242,101,34,0.65)"/>
                                <stop offset="50%" stop-color="rgba(255,255,255,0.22)"/>
                                <stop offset="100%" stop-color="rgba(125,86,157,0.55)"/>
                            </linearGradient>
                            <filter id="pr-node-glow-m" x="-50%" y="-50%" width="200%" height="200%">
                                <feGaussianBlur in="SourceGraphic" stdDeviation="2.2" result="blur"/>
                                <feColorMatrix in="blur" type="matrix"
                                    values="1 0 0 0 0
                                            0 1 0 0 0
                                            0 0 1 0 0
                                            0 0 0 0.55 0"/>
                                <feMerge>
                                    <feMergeNode in="blur"/>
                                    <feMergeNode in="SourceGraphic"/>
                                </feMerge>
                            </filter>
                        </defs>

                        <rect width="360" height="260" fill="url(#prgrid-m)"/>

                        <path id="pr-ml1" class="pr-net-line" pathLength="1" d="M 86 70 Q 130 70 140 130" style="animation-delay:0.2s" stroke="url(#pr-line-gradient-m)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        <path id="pr-ml2" class="pr-net-line" pathLength="1" d="M 86 190 Q 130 190 140 130" style="animation-delay:0.5s" stroke="url(#pr-line-gradient-m)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        <path id="pr-mr1" class="pr-net-line" pathLength="1" d="M 220 130 Q 230 70 260 70" style="animation-delay:0.8s" stroke="url(#pr-line-gradient-m)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        <path id="pr-mr2" class="pr-net-line" pathLength="1" d="M 220 130 Q 230 190 260 190" style="animation-delay:1.1s" stroke="url(#pr-line-gradient-m)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>

                        <circle class="pr-net-dot" r="3.2" fill="#F26522" opacity="0.85"><animateMotion dur="2.6s" repeatCount="indefinite" begin="1s"><mpath href="#pr-ml1"/></animateMotion></circle>
                        <circle class="pr-net-dot" r="3.2" fill="#F26522" opacity="0.85"><animateMotion dur="2.6s" repeatCount="indefinite" begin="1.6s"><mpath href="#pr-mr1"/></animateMotion></circle>

                        <circle class="pr-hub-ring" cx="180" cy="130" r="42"/>
                        <circle class="pr-hub-ring" cx="180" cy="130" r="42" style="animation-delay:1.4s"/>
                        <circle class="pr-hub-ring" cx="180" cy="130" r="42" style="animation-delay:2.8s"/>

                        <circle cx="180" cy="130" r="40" fill="rgba(242,101,34,0.07)" stroke="rgba(242,101,34,0.2)" stroke-width="1"/>
                        <circle cx="180" cy="130" r="28" fill="rgba(242,101,34,0.15)" stroke="rgba(242,101,34,0.32)" stroke-width="1.2"/>
                        <circle cx="180" cy="130" r="20" fill="#F26522"/>
                        <text x="180" y="126" text-anchor="middle" fill="#fff" font-size="11" font-family="Montserrat,sans-serif" font-weight="900" letter-spacing="1">CI</text>
                        <text x="180" y="138" text-anchor="middle" fill="rgba(255,255,255,0.88)" font-size="6.5" font-family="Montserrat,sans-serif" font-weight="700" letter-spacing="1.2">MATCH</text>

                        <g class="pr-net-node" style="animation-delay:0.1s" filter="url(#pr-node-glow-m)">
                            <circle cx="60" cy="70" r="26" fill="rgba(255,255,255,0.06)" stroke="rgba(255,255,255,0.2)" stroke-width="1.3"/>
                            <circle cx="60" cy="64" r="7.5" fill="none" stroke="rgba(255,255,255,0.65)" stroke-width="1.3"/>
                            <path d="M 46 86 Q 48 78 60 78 Q 72 78 74 86" fill="none" stroke="rgba(255,255,255,0.65)" stroke-width="1.3" stroke-linecap="round"/>
                        </g>
                        <g class="pr-net-node" style="animation-delay:0.3s" filter="url(#pr-node-glow-m)">
                            <circle cx="60" cy="190" r="26" fill="rgba(255,255,255,0.06)" stroke="rgba(255,255,255,0.2)" stroke-width="1.3"/>
                            <circle cx="60" cy="184" r="7.5" fill="none" stroke="rgba(255,255,255,0.65)" stroke-width="1.3"/>
                            <path d="M 46 206 Q 48 198 60 198 Q 72 198 74 206" fill="none" stroke="rgba(255,255,255,0.65)" stroke-width="1.3" stroke-linecap="round"/>
                        </g>

                        <g class="pr-net-node" style="animation-delay:0.8s" filter="url(#pr-node-glow-m)">
                            <rect x="260" y="44" width="56" height="56" rx="14" fill="rgba(255,255,255,0.06)" stroke="rgba(242,101,34,0.35)" stroke-width="1.3"/>
                            <rect x="274" y="54" width="28" height="36" rx="3" fill="none" stroke="rgba(255,255,255,0.55)" stroke-width="1.3"/>
                            <rect x="280" y="60" width="6" height="6" rx="1" fill="rgba(255,255,255,0.28)"/>
                            <rect x="291" y="60" width="6" height="6" rx="1" fill="rgba(255,255,255,0.28)"/>
                            <rect x="285" y="72" width="10" height="10" rx="2" fill="rgba(255,255,255,0.25)"/>
                        </g>
                        <g class="pr-net-node" style="animation-delay:1.1s" filter="url(#pr-node-glow-m)">
                            <rect x="260" y="164" width="56" height="56" rx="14" fill="rgba(255,255,255,0.06)" stroke="rgba(242,101,34,0.35)" stroke-width="1.3"/>
                            <rect x="272" y="176" width="32" height="18" rx="4" fill="none" stroke="rgba(255,255,255,0.55)" stroke-width="1.3"/>
                            <path d="M 282 176 L 282 172 Q 282 170 285 170 L 291 170 Q 294 170 294 172 L 294 176" fill="none" stroke="rgba(255,255,255,0.55)" stroke-width="1.3"/>
                            <line x1="272" y1="186" x2="304" y2="186" stroke="rgba(255,255,255,0.25)" stroke-width="1"/>
                        </g>

                        <g class="pr-net-stats">
                            <rect x="124" y="176" width="112" height="40" rx="10" fill="rgba(255,255,255,0.05)" stroke="rgba(255,255,255,0.1)" stroke-width="1"/>
                            <text x="180" y="192" text-anchor="middle" fill="rgba(255,255,255,0.32)" font-size="6.5" font-family="Montserrat,sans-serif" font-weight="700" letter-spacing="1.6">TOTAL MATCHES</text>
                            <text x="180" y="208" text-anchor="middle" fill="#F26522" font-size="14" font-family="Montserrat,sans-serif" font-weight="900" letter-spacing="-0.4">500,000+</text>
                        </g>
                    </svg>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== STATS ===== -->
    <section class="pr-stats">
        <div class="container">
            <div class="pr-stats-grid">
                <div class="pr-stat-item">
                    <span class="pr-stat-num">700+</span>
                    <span class="pr-stat-label">Employees</span>
                </div>
                <div class="pr-stat-item">
                    <span class="pr-stat-num">29+</span>
                    <span class="pr-stat-label">Awards</span>
                </div>
                <div class="pr-stat-item">
                    <span class="pr-stat-num">500k+</span>
                    <span class="pr-stat-label">Customers</span>
                </div>
                <div class="pr-stat-item">
                    <span class="pr-stat-num">500+</span>
                    <span class="pr-stat-label">Partners</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== OPPORTUNITY (B2B / B2C INTRO) ===== -->
    <section class="pr-opportunity">
        <div class="container">
            <div class="pr-opportunity-inner">

                <div class="pr-opportunity-text">
                    <div class="pr-section-kicker pr-section-kicker--light">Our Model</div>
                    <h2 class="pr-section-title pr-section-title--light">A Mapped Need is Turned Into an Opportunity</h2>
                    <p>CI Professional is a product developed based on a requirement: matching specific professionals with available job positions in the market. We aim to be the bridge between outstanding professionals and job opportunities, streamlining the intermediary process for both parties.</p>
                </div>

                <div class="pr-opportunity-cards">
                    <div class="pr-opportunity-card">
                        <div class="pr-opportunity-card-icon">
                            <svg class="icon" aria-hidden="true"><use href="#icon-building"></use></svg>
                        </div>
                        <div class="pr-opportunity-card-body">
                            <strong>B2B &mdash; Business to Business</strong>
                            <p>We have received your needs and job description, and we will find the perfect match for them. We have a vast database of resumes from professionals based in Ireland and overseas.</p>
                        </div>
                    </div>
                    <div class="pr-opportunity-card">
                        <div class="pr-opportunity-card-icon">
                            <svg class="icon" aria-hidden="true"><use href="#icon-user"></use></svg>
                        </div>
                        <div class="pr-opportunity-card-body">
                            <strong>B2C &mdash; Business to Customers</strong>
                            <p>We have a vast database of resumes from professionals based in Ireland and overseas, connecting individuals with roles that align with their skills and career goals.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== AREAS OF EXPERTISE ===== -->
    <section class="pr-expertise" id="expertise">
        <div class="container">
            <div class="pr-expertise-header">
                <div class="pr-section-kicker">What We Cover</div>
                <h2 class="pr-section-title">Areas of Expertise</h2>
                <p class="pr-section-sub" style="margin: 0 auto;">We place qualified professionals across 15 key sectors, ensuring the right match for every role.</p>
            </div>
            <div class="pr-expertise-grid">
                <span class="pr-expertise-tag">
                    <svg class="icon" aria-hidden="true"><use href="#icon-trending-up"></use></svg>
                    IT
                </span>
                <span class="pr-expertise-tag">
                    <svg class="icon" aria-hidden="true"><use href="#icon-building"></use></svg>
                    Engineering
                </span>
                <span class="pr-expertise-tag">
                    <svg class="icon" aria-hidden="true"><use href="#icon-star"></use></svg>
                    Hospitality &amp; Tourism
                </span>
                <span class="pr-expertise-tag">
                    <svg class="icon" aria-hidden="true"><use href="#icon-tag"></use></svg>
                    Retail
                </span>
                <span class="pr-expertise-tag">
                    <svg class="icon" aria-hidden="true"><use href="#icon-shield"></use></svg>
                    Health &amp; Medical Care
                </span>
                <span class="pr-expertise-tag">
                    <svg class="icon" aria-hidden="true"><use href="#icon-award"></use></svg>
                    Education
                </span>
                <span class="pr-expertise-tag">
                    <svg class="icon" aria-hidden="true"><use href="#icon-briefcase"></use></svg>
                    Administrative &amp; Office Services
                </span>
                <span class="pr-expertise-tag">
                    <svg class="icon" aria-hidden="true"><use href="#icon-trending-up"></use></svg>
                    Digital Marketing
                </span>
                <span class="pr-expertise-tag">
                    <svg class="icon" aria-hidden="true"><use href="#icon-handshake"></use></svg>
                    Sales
                </span>
                <span class="pr-expertise-tag">
                    <svg class="icon" aria-hidden="true"><use href="#icon-globe"></use></svg>
                    Transportation &amp; Logistics
                </span>
                <span class="pr-expertise-tag">
                    <svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg>
                    Cleaning &amp; Maintenance
                </span>
                <span class="pr-expertise-tag">
                    <svg class="icon" aria-hidden="true"><use href="#icon-star"></use></svg>
                    Food Industry
                </span>
                <span class="pr-expertise-tag">
                    <svg class="icon" aria-hidden="true"><use href="#icon-users"></use></svg>
                    Childhood Education &amp; Care
                </span>
                <span class="pr-expertise-tag">
                    <svg class="icon" aria-hidden="true"><use href="#icon-building"></use></svg>
                    Construction
                </span>
                <span class="pr-expertise-tag">
                    <svg class="icon" aria-hidden="true"><use href="#icon-dollar"></use></svg>
                    Accounting &amp; Finance
                </span>
            </div>
        </div>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="pr-services" id="services">
        <div class="container">
            <div class="pr-services-header">
                <div class="pr-section-kicker">What We Offer</div>
                <h2 class="pr-section-title">Our Services</h2>
            </div>

            <div class="pr-services-toggle" role="tablist" aria-label="Service audience">
                <button
                    class="pr-services-btn active"
                    id="btn-b2b"
                    role="tab"
                    aria-selected="true"
                    aria-controls="panel-b2b"
                    onclick="switchServicePanel('b2b')"
                >
                    <svg class="icon" aria-hidden="true"><use href="#icon-building"></use></svg>
                    For Companies (B2B)
                </button>
                <button
                    class="pr-services-btn"
                    id="btn-b2c"
                    role="tab"
                    aria-selected="false"
                    aria-controls="panel-b2c"
                    onclick="switchServicePanel('b2c')"
                >
                    <svg class="icon" aria-hidden="true"><use href="#icon-user"></use></svg>
                    For Professionals (B2C)
                </button>
            </div>

            <!-- B2B Panel -->
            <div class="pr-services-panel active" id="panel-b2b" role="tabpanel" aria-labelledby="btn-b2b">
                <div class="pr-services-cards">
                    <div class="pr-service-card">
                        <div class="pr-service-card-icon">
                            <svg class="icon" aria-hidden="true"><use href="#icon-users"></use></svg>
                        </div>
                        <h3>Permanent Recruitment</h3>
                        <p>Our company finds candidates for permanent positions. We handle the entire recruitment process, from job posting to conducting interviews and final candidate selection.</p>
                    </div>
                    <div class="pr-service-card">
                        <div class="pr-service-card-icon">
                            <svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg>
                        </div>
                        <h3>Behavioural Testing Application</h3>
                        <p>We provide candidate assessment services through behaviour validated tests to ensure the most accurate hiring of professionals in line with our clients' demands.</p>
                    </div>
                    <div class="pr-service-card">
                        <div class="pr-service-card-icon">
                            <svg class="icon" aria-hidden="true"><use href="#icon-globe"></use></svg>
                        </div>
                        <h3>Foreign Placement</h3>
                        <p>Assisting individuals in finding employment opportunities in a foreign country, matching skills and qualifications of candidates with job openings where they may be needed.</p>
                    </div>
                    <div class="pr-service-card">
                        <div class="pr-service-card-icon">
                            <svg class="icon" aria-hidden="true"><use href="#icon-award"></use></svg>
                        </div>
                        <h3>Internship Programmes</h3>
                        <p>Our company can assist you in selecting and managing internship programmes, connecting your organisation with talented emerging professionals.</p>
                    </div>
                    <div class="pr-service-card">
                        <div class="pr-service-card-icon">
                            <svg class="icon" aria-hidden="true"><use href="#icon-shield"></use></svg>
                        </div>
                        <h3>Work Permit Application</h3>
                        <p>We offer the service of applying for work permits for companies seeking to hire non-European professionals. This includes Critical Skills or General Employment Permit.</p>
                    </div>
                </div>
            </div>

            <!-- B2C Panel -->
            <div class="pr-services-panel" id="panel-b2c" role="tabpanel" aria-labelledby="btn-b2c" aria-hidden="true">
                <div class="pr-services-cards">
                    <div class="pr-service-card">
                        <div class="pr-service-card-icon">
                            <svg class="icon" aria-hidden="true"><use href="#icon-trending-up"></use></svg>
                        </div>
                        <h3>Career Consultancy</h3>
                        <p>For professionals seeking guidance in the field that best suits their skills. We offer CV development, interview preparation, and guidance on optimising your LinkedIn profile.</p>
                    </div>
                    <div class="pr-service-card">
                        <div class="pr-service-card-icon">
                            <svg class="icon" aria-hidden="true"><use href="#icon-shield"></use></svg>
                        </div>
                        <h3>Work Permit Application</h3>
                        <p>We offer the service of applying for work permits for professionals. This includes Critical Skills or General Employment Permit to support your career journey in Ireland.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ===== WHY WORK WITH US ===== -->
    <section class="pr-why">
        <div class="container">
            <div class="pr-why-split">

                <div>
                    <div class="pr-section-kicker">Our Advantage</div>
                    <h2 class="pr-section-title">Why Work With Us?</h2>
                    <ul class="pr-why-list">
                        <li class="pr-why-item">
                            <div class="pr-why-dot">
                                <svg class="icon" style="font-size:0.75em" aria-hidden="true"><use href="#icon-check"></use></svg>
                            </div>
                            <span class="pr-why-item-text">We can create exclusive packages that encompass learning and work programmes for sectors in need of specific professionals with labour shortages.</span>
                        </li>
                        <li class="pr-why-item">
                            <div class="pr-why-dot">
                                <svg class="icon" style="font-size:0.75em" aria-hidden="true"><use href="#icon-check"></use></svg>
                            </div>
                            <span class="pr-why-item-text">CI possesses a distinctive advantage in facilitating the seamless connection between professionals entering, or currently residing in, Ireland and prospective employers that align with their specific skill sets and aspirations.</span>
                        </li>
                        <li class="pr-why-item">
                            <div class="pr-why-dot">
                                <svg class="icon" style="font-size:0.75em" aria-hidden="true"><use href="#icon-check"></use></svg>
                            </div>
                            <span class="pr-why-item-text">Over 14,000 students enrolled in universities, colleges, and English schools in Ireland — and over half a million worldwide, giving us unparalleled access to motivated, qualified talent.</span>
                        </li>
                        <li class="pr-why-item">
                            <div class="pr-why-dot">
                                <svg class="icon" style="font-size:0.75em" aria-hidden="true"><use href="#icon-check"></use></svg>
                            </div>
                            <span class="pr-why-item-text">Success-based fees ensure our interests are always aligned with yours — we only charge when you successfully hire through our services.</span>
                        </li>
                    </ul>
                </div>

                <div class="pr-why-visual">
                    <div class="pr-why-visual-overlay"></div>
                    <div class="pr-why-visual-icon">🤝</div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== VISAS ===== -->
    <section class="pr-visas">
        <div class="container">
            <div class="pr-visas-split">

                <div class="pr-visas-visual">
                    <div class="pr-visas-visual-overlay"></div>
                    <div class="pr-visas-visual-icon">📋</div>
                </div>

                <div>
                    <div class="pr-section-kicker">Immigration Support</div>
                    <h2 class="pr-section-title">Visas &amp; Work Permits</h2>
                    <ul class="pr-visas-list">
                        <li class="pr-why-item">
                            <div class="pr-why-dot">
                                <svg class="icon" style="font-size:0.75em" aria-hidden="true"><use href="#icon-check"></use></svg>
                            </div>
                            <span class="pr-visas-item-text">In our database, we hold a substantial number of professionals with European passports, ready to start working immediately with no permit requirements.</span>
                        </li>
                        <li class="pr-why-item">
                            <div class="pr-why-dot">
                                <svg class="icon" style="font-size:0.75em" aria-hidden="true"><use href="#icon-check"></use></svg>
                            </div>
                            <span class="pr-visas-item-text">A significant volume of professionals in our network possess part-time work permissions, providing flexible hiring options for your business.</span>
                        </li>
                        <li class="pr-why-item">
                            <div class="pr-why-dot">
                                <svg class="icon" style="font-size:0.75em" aria-hidden="true"><use href="#icon-check"></use></svg>
                            </div>
                            <span class="pr-visas-item-text">Should your company be interested, our immigration lawyer can handle the entire visa application process, including Critical Skills or General Employment Permits.</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== PAYMENT PLANS ===== -->
    <section class="pr-payment">
        <div class="container">
            <div class="pr-payment-header">
                <div class="pr-section-kicker pr-section-kicker--light">Transparent Pricing</div>
                <h2 class="pr-section-title pr-section-title--light">Payment Plans</h2>
                <p>Our payment plans are designed to offer flexibility and value for our partner companies. Our aim is to align our interests with yours, ensuring excellent value while finding the perfect candidates for your needs.</p>
            </div>
            <div class="pr-payment-grid">
                <div class="pr-payment-card">
                    <div class="pr-payment-card-img">
                        <svg class="icon" aria-hidden="true"><use href="#icon-handshake"></use></svg>
                    </div>
                    <h3>Success-Based Fee</h3>
                    <p>We only charge a fee when the company successfully hires a candidate through our services. This fee is based on a percentage of the candidate's agreed-upon salary and is lower compared to market rates.</p>
                </div>
                <div class="pr-payment-card">
                    <div class="pr-payment-card-img">
                        <svg class="icon" aria-hidden="true"><use href="#icon-dollar"></use></svg>
                    </div>
                    <h3>Fixed Fee</h3>
                    <p>For some areas, such as the hospitality sector, a fixed fee will be charged. This provides cost certainty and simplicity for high-volume hiring needs in specific industries.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CONTACT CTA ===== -->
    <section class="pr-contact" id="contact">
        <div class="container">
            <div class="pr-contact-box">
                <div class="pr-section-kicker">Get in Touch</div>
                <h2 class="pr-section-title">Ready to Find the Perfect Match?</h2>
                <p class="pr-section-sub">Whether you're a company looking to hire or a professional seeking your next opportunity in Ireland, we're here to help. Reach out today and let's build something great together.</p>
                <button onclick="openProfessionalModal()" class="pr-cta-primary">
                    <svg class="icon" aria-hidden="true"><use href="#icon-mail"></use></svg>
                    Contact Our Team
                </button>
                <p class="pr-contact-name">Marilu Rosado &mdash; Director, CI Professional</p>
            </div>
        </div>
    </section>

    <!-- ===== CONTACT MODAL ===== -->
    <div class="pr-modal-overlay" id="professionalModal" role="dialog" aria-modal="true" aria-labelledby="pr-modal-title">
        <div class="pr-modal-box">
            <button class="pr-modal-close" onclick="closeProfessionalModal()" aria-label="Close">
                <svg class="icon" aria-hidden="true">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            <div class="pr-modal-header">
                <div class="pr-modal-kicker">CI Professional</div>
                <h2 class="pr-modal-title" id="pr-modal-title">Let's Find the Perfect Match</h2>
                <p class="pr-modal-sub">Fill in your details and our team will get back to you within one business day.</p>
            </div>
            <form class="pr-modal-form" id="pr-contact-form" onsubmit="handleProfessionalFormSubmit(event)">
                <div class="pr-form-row">
                    <div class="pr-form-group">
                        <label for="pr-name">Full Name <span class="req">*</span></label>
                        <input id="pr-name" type="text" placeholder="Your full name" required autocomplete="name">
                    </div>
                    <div class="pr-form-group">
                        <label for="pr-email">Email <span class="req">*</span></label>
                        <input id="pr-email" type="email" placeholder="your@email.com" required autocomplete="email">
                    </div>
                </div>
                <div class="pr-form-row">
                    <div class="pr-form-group">
                        <label for="pr-phone">Phone / WhatsApp <span class="req">*</span></label>
                        <input id="pr-phone" type="tel" placeholder="+353 83 123 4567" required autocomplete="tel">
                    </div>
                    <div class="pr-form-group">
                        <label for="pr-type">I am a <span class="req">*</span></label>
                        <select id="pr-type" required>
                            <option value="" disabled selected>Select one</option>
                            <option value="company">Company looking to hire</option>
                            <option value="professional">Professional seeking work</option>
                        </select>
                    </div>
                </div>
                <div class="pr-form-group">
                    <label for="pr-message">Message</label>
                    <textarea id="pr-message" rows="3" placeholder="Tell us about your hiring needs or career goals…"></textarea>
                </div>
                <button type="submit" class="pr-modal-submit">
                    Send Message
                    <svg class="icon" aria-hidden="true"><use href="#icon-arrow-right"></use></svg>
                </button>
                <div id="pr-form-status" aria-live="polite" style="height:0;overflow:hidden;font-size:14px;text-align:center;margin-top:8px;color:var(--ci-orange);font-weight:600;"></div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
<script>
(function () {
    /* ── Service panel toggle ── */
    function switchServicePanel(panel) {
        document.querySelectorAll('.pr-services-panel').forEach(function (p) {
            p.classList.remove('active');
            p.setAttribute('aria-hidden', 'true');
        });
        document.querySelectorAll('.pr-services-btn').forEach(function (b) {
            b.classList.remove('active');
            b.setAttribute('aria-selected', 'false');
        });

        var activePanel = document.getElementById('panel-' + panel);
        var activeBtn   = document.getElementById('btn-' + panel);

        if (activePanel) { activePanel.classList.add('active'); activePanel.removeAttribute('aria-hidden'); }
        if (activeBtn)   { activeBtn.classList.add('active');   activeBtn.setAttribute('aria-selected', 'true'); }
    }

    /* ── Contact modal ── */
    function openProfessionalModal() {
        var modal = document.getElementById('professionalModal');
        if (!modal) { return; }
        modal.classList.add('open');
        document.body.style.overflow = 'hidden';
        modal.querySelector('input, select, textarea, button:not(.pr-modal-close)').focus();
    }

    function closeProfessionalModal() {
        var modal = document.getElementById('professionalModal');
        if (!modal) { return; }
        modal.classList.remove('open');
        document.body.style.overflow = '';
    }

    function handleProfessionalFormSubmit(event) {
        event.preventDefault();
        var status = document.getElementById('pr-form-status');
        var btn = event.target.querySelector('.pr-modal-submit');
        btn.disabled = true;
        btn.textContent = 'Sending…';
        /* Simulate submission — replace with real fetch/action as needed */
        setTimeout(function () {
            status.style.height = 'auto';
            status.textContent = 'Thank you! We\'ll be in touch within one business day.';
            event.target.reset();
            btn.disabled = false;
            btn.textContent = 'Send Message';
            setTimeout(function () { closeProfessionalModal(); status.style.height = '0'; status.textContent = ''; }, 3000);
        }, 900);
    }

    /* Close on overlay click & Escape key */
    var modal = document.getElementById('professionalModal');
    if (modal) {
        modal.addEventListener('click', function (e) { if (e.target === modal) { closeProfessionalModal(); } });
    }
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') { closeProfessionalModal(); } });

    window.switchServicePanel        = switchServicePanel;
    window.openProfessionalModal     = openProfessionalModal;
    window.closeProfessionalModal    = closeProfessionalModal;
    window.handleProfessionalFormSubmit = handleProfessionalFormSubmit;
}());
</script>
@endpush
