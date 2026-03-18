@extends('layouts.app')

@section('title', 'Erasmus+ Professional Mobility - CI Ireland')
@section('no-fontawesome', true)

@section('head')
    <link rel="stylesheet" href="/css/erasmus.css">
@endsection

@section('styles')
@endsection

@section('footer-tagline')CI Ireland &mdash; Your European Education Mobility Hub in Dublin.@endsection
@section('footer-bottom-right')Connecting European Educators Through Ireland.@endsection

@section('banner')
    <svg xmlns="http://www.w3.org/2000/svg" style="position:absolute;width:0;height:0;overflow:hidden" aria-hidden="true">
        <symbol id="icon-arrow-right" viewBox="0 0 24 24">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
        </symbol>
        <symbol id="icon-chevron-right" viewBox="0 0 24 24">
            <polyline points="9 6 15 12 9 18"></polyline>
        </symbol>
        <symbol id="icon-globe" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="9"></circle>
            <path d="M3 12h18"></path>
            <path d="M12 3c3 3.5 3 14 0 18"></path>
            <path d="M12 3c-3 3.5-3 14 0 18"></path>
            <path d="M4.5 8h15"></path>
            <path d="M4.5 16h15"></path>
        </symbol>
        <symbol id="icon-map-marker" viewBox="0 0 24 24">
            <path d="M12 21s-7-4.35-7-10a7 7 0 0 1 14 0c0 5.65-7 10-7 10z"></path>
            <circle cx="12" cy="11" r="2.5"></circle>
        </symbol>
        <symbol id="icon-user" viewBox="0 0 24 24">
            <circle cx="12" cy="8" r="3"></circle>
            <path d="M5 21c1.5-4 12.5-4 14 0"></path>
        </symbol>
        <symbol id="icon-users" viewBox="0 0 24 24">
            <circle cx="8" cy="9" r="2.5"></circle>
            <circle cx="16" cy="9" r="2.5"></circle>
            <path d="M2.5 20c1-3 6-4 7.5-4"></path>
            <path d="M14 16c3 0 6 1 7.5 4"></path>
        </symbol>
        <symbol id="icon-network" viewBox="0 0 24 24">
            <circle cx="6" cy="6" r="2"></circle>
            <circle cx="18" cy="6" r="2"></circle>
            <circle cx="12" cy="18" r="2"></circle>
            <path d="M8 7l3 8"></path>
            <path d="M16 7l-3 8"></path>
        </symbol>
        <symbol id="icon-cap" viewBox="0 0 24 24">
            <path d="M3 9l9-4 9 4-9 4-9-4z"></path>
            <path d="M5 11v4c0 2 4 4 7 4s7-2 7-4v-4"></path>
        </symbol>
        <symbol id="icon-universal-access" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="9"></circle>
            <circle cx="12" cy="7" r="1.5"></circle>
            <path d="M8 10h8"></path>
            <path d="M12 10v7"></path>
            <path d="M9 19l3-2 3 2"></path>
        </symbol>
        <symbol id="icon-laptop" viewBox="0 0 24 24">
            <rect x="4" y="6" width="16" height="9" rx="1"></rect>
            <path d="M2 18h20"></path>
        </symbol>
        <symbol id="icon-flask" viewBox="0 0 24 24">
            <path d="M9 2h6"></path>
            <path d="M10 2v5l-4 7a5 5 0 0 0 4 8h4a5 5 0 0 0 4-8l-4-7v-5"></path>
        </symbol>
        <symbol id="icon-school" viewBox="0 0 24 24">
            <path d="M3 10l9-5 9 5"></path>
            <path d="M5 10v10h14V10"></path>
            <path d="M9 20v-6h6v6"></path>
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
        <symbol id="icon-handshake" viewBox="0 0 24 24">
            <path d="M4 12l4-4 5 5"></path>
            <path d="M20 12l-4-4-5 5"></path>
            <path d="M9 13l2 2a2 2 0 0 0 3 0l4-4"></path>
        </symbol>
        <symbol id="icon-plane" viewBox="0 0 24 24">
            <path d="M2 12l20-7-6 8 6 8-20-7z"></path>
        </symbol>
        <symbol id="icon-file" viewBox="0 0 24 24">
            <path d="M6 2h9l5 5v15H6z"></path>
            <path d="M15 2v5h5"></path>
            <path d="M8 13h6"></path>
            <path d="M8 17h4"></path>
            <path d="M13 17l3 3"></path>
        </symbol>
    </svg>
    <!-- TOP BANNER -->
    <div class="top-banner">
        Erasmus+ Professional Mobility Programmes &mdash; Dublin, Ireland.
        <a href="#contact">Get in Touch <svg class="icon" aria-hidden="true"><use href="#icon-arrow-right"></use></svg></a>
    </div>
@endsection

@section('nav')
    <!-- NAV -->
    <nav class="main-nav">
        <div class="container">
            <div class="nav-content">
                <a href="/" class="logo">
                    <img class="logo-image" src="{{ asset('images/logo-ci.png') }}" alt="CI Ireland">
                </a>
                <ul class="nav-links">
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/higher-education">Higher Education</a></li>
                    <li><a href="/erasmus" class="active">Erasmus+</a></li>
                    <li><a href="#" data-coming-soon="true">Teens Programmes</a></li>
                    <li><a href="#" data-coming-soon="true">Corporate Learning</a></li>
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
        <li><a href="/erasmus" class="active">Erasmus+ <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="#" data-coming-soon="true">Teens Programmes <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="#" data-coming-soon="true">Corporate Learning <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="#contact">Get in Touch <i class="fas fa-chevron-right"></i></a></li>
    </ul>
@endsection

@section('mobile-nav-footer')
    <div class="mobile-drawer-footer">
        <button class="mobile-cta-btn" onclick="window.location='#contact'">Get in Touch</button>
    </div>
@endsection

@section('content')

    <!-- â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ HERO â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ -->
    <section class="er-hero">
        <div class="container">
            <div class="er-hero-split">

                <!-- Left: text content -->
                <div class="er-hero-content">
                    <div class="er-hero-kicker">
                        <svg class="icon" aria-hidden="true"><use href="#icon-globe"></use></svg>
                        Erasmus+ &middot; Professional Mobility
                    </div>
                    <h1 class="er-hero-title">
                        Connecting European<br><span>Educators</span><br>and <span>Institutions</span>
                    </h1>
                    <p class="er-hero-sub">
                        International professional mobility programmes for teachers, school leaders, and education professionals  interested in developing new skills, exploring innovative teaching methodologies and strengthening international networks of collaboration.
                    </p>
                    <div class="er-hero-ctas">
                        <a href="#programmes" class="er-cta-primary">
                            Explore Programmes <svg class="icon" aria-hidden="true"><use href="#icon-arrow-right"></use></svg>
                        </a>
                        <a href="#contact" class="er-cta-ghost">
                            Talk to Our Team <svg class="icon" aria-hidden="true"><use href="#icon-arrow-right"></use></svg>
                        </a>
                    </div>
                </div>

                <!-- Right: animated SVG connection map -->
                <div class="er-hero-map" aria-hidden="true">
                    <svg viewBox="0 0 580 460" xmlns="http://www.w3.org/2000/svg" style="overflow:visible;">
                        <defs>
                            <pattern id="mapgrid" width="28" height="28" patternUnits="userSpaceOnUse">
                                <circle cx="14" cy="14" r="1.2" fill="rgba(255,255,255,0.08)"/>
                            </pattern>
                        </defs>

                        <!-- Dot grid background -->
                        <rect width="580" height="460" fill="url(#mapgrid)" rx="20"/>

                        <!-- Faint border -->
                        <rect width="580" height="460" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1" rx="20"/>

                        <!-- Radar rings emanating from Dublin (120, 205) -->
                        <circle class="radar-ring" cx="120" cy="205" r="0"/>
                        <circle class="radar-ring" cx="120" cy="205" r="0"/>
                        <circle class="radar-ring" cx="120" cy="205" r="0"/>
                        <circle class="radar-ring" cx="120" cy="205" r="0"/>

                        <!-- â”€â”€ Flight paths (bezier curves &rarr; Dublin) â”€â”€ -->
                        <!-- Amsterdam &rarr; Dublin -->
                        <path class="flight-path" pathLength="1"
                              d="M 275 148 Q 198 118 120 205"
                              style="animation-delay:0.3s"/>
                        <!-- Berlin &rarr; Dublin -->
                        <path class="flight-path" pathLength="1"
                              d="M 390 140 Q 256 100 120 205"
                              style="animation-delay:0.7s"/>
                        <!-- Paris &rarr; Dublin -->
                        <path class="flight-path" pathLength="1"
                              d="M 255 248 Q 188 182 120 205"
                              style="animation-delay:1.1s"/>
                        <!-- Lisbon &rarr; Dublin -->
                        <path class="flight-path" pathLength="1"
                              d="M 135 360 Q 72 282 120 205"
                              style="animation-delay:1.5s"/>
                        <!-- Madrid &rarr; Dublin -->
                        <path class="flight-path" pathLength="1"
                              d="M 200 338 Q 120 268 120 205"
                              style="animation-delay:1.9s"/>
                        <!-- Rome &rarr; Dublin -->
                        <path class="flight-path" pathLength="1"
                              d="M 388 318 Q 248 228 120 205"
                              style="animation-delay:2.3s"/>

                        <!-- Dublin pulse glow ring -->
                        <circle class="dublin-pulse" cx="120" cy="205" r="26"/>

                        <!-- Dublin hub dot -->
                        <circle cx="120" cy="205" r="12" fill="#F26522"/>
                        <circle cx="120" cy="205" r="6"  fill="#fff" opacity="0.95"/>

                        <!-- Dublin label -->
                        <text x="136" y="201" fill="#F26522" font-size="13" font-family="Montserrat,sans-serif" font-weight="700">Dublin</text>
                        <text x="136" y="217" fill="rgba(255,255,255,0.45)" font-size="10" font-family="Montserrat,sans-serif" font-weight="600">Ireland</text>

                        <!-- â”€â”€ City dots + labels â”€â”€ -->
                        <!-- Amsterdam -->
                        <g class="city-dot" style="animation-delay:2.0s">
                            <circle cx="275" cy="148" r="6" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
                            <circle cx="275" cy="148" r="3" fill="#F26522"/>
                            <text x="285" y="152" class="city-label" fill="rgba(255,255,255,0.75)" font-size="12" font-family="Montserrat,sans-serif" font-weight="600">Netherlands</text>
                        </g>
                        <!-- Berlin -->
                        <g class="city-dot" style="animation-delay:2.4s">
                            <circle cx="390" cy="140" r="6" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
                            <circle cx="390" cy="140" r="3" fill="#F26522"/>
                            <text x="400" y="144" class="city-label" fill="rgba(255,255,255,0.75)" font-size="12" font-family="Montserrat,sans-serif" font-weight="600">Germany</text>
                        </g>
                        <!-- Paris -->
                        <g class="city-dot" style="animation-delay:2.8s">
                            <circle cx="255" cy="248" r="6" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
                            <circle cx="255" cy="248" r="3" fill="#F26522"/>
                            <text x="265" y="252" class="city-label" fill="rgba(255,255,255,0.75)" font-size="12" font-family="Montserrat,sans-serif" font-weight="600">France</text>
                        </g>
                        <!-- Lisbon -->
                        <g class="city-dot" style="animation-delay:3.2s">
                            <circle cx="135" cy="360" r="6" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
                            <circle cx="135" cy="360" r="3" fill="#F26522"/>
                            <text x="145" y="364" class="city-label" fill="rgba(255,255,255,0.75)" font-size="12" font-family="Montserrat,sans-serif" font-weight="600">Portugal</text>
                        </g>
                        <!-- Madrid -->
                        <g class="city-dot" style="animation-delay:3.6s">
                            <circle cx="200" cy="338" r="6" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
                            <circle cx="200" cy="338" r="3" fill="#F26522"/>
                            <text x="210" y="342" class="city-label" fill="rgba(255,255,255,0.75)" font-size="12" font-family="Montserrat,sans-serif" font-weight="600">Spain</text>
                        </g>
                        <!-- Rome -->
                        <g class="city-dot" style="animation-delay:4.0s">
                            <circle cx="388" cy="318" r="6" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
                            <circle cx="388" cy="318" r="3" fill="#F26522"/>
                            <text x="398" y="322" class="city-label" fill="rgba(255,255,255,0.75)" font-size="12" font-family="Montserrat,sans-serif" font-weight="600">Italy</text>
                        </g>

                        <!-- Connecting arc decoration &mdash; subtle EU semicircle -->
                        <path d="M 80 130 Q 350 60 510 200" fill="none" stroke="rgba(255,255,255,0.04)" stroke-width="1" stroke-dasharray="4 6"/>
                    </svg>
                </div>

                <!-- Country chips &mdash; mobile only, appears below SVG map -->
                <div class="er-hero-countries">
                    <span class="er-hero-country"><svg class="icon" aria-hidden="true"><use href="#icon-map-marker"></use></svg> Netherlands</span>
                    <span class="er-hero-country"><svg class="icon" aria-hidden="true"><use href="#icon-map-marker"></use></svg> Germany</span>
                    <span class="er-hero-country"><svg class="icon" aria-hidden="true"><use href="#icon-map-marker"></use></svg> France</span>
                    <span class="er-hero-country"><svg class="icon" aria-hidden="true"><use href="#icon-map-marker"></use></svg> Portugal</span>
                    <span class="er-hero-country"><svg class="icon" aria-hidden="true"><use href="#icon-map-marker"></use></svg> Spain</span>
                    <span class="er-hero-country"><svg class="icon" aria-hidden="true"><use href="#icon-map-marker"></use></svg> Italy</span>
                    <span class="er-hero-country er-hero-country--more">& more</span>
                </div>

            </div>
        </div>
    </section>

    <!-- Pause SVG map animations when hero is scrolled off-screen -->
    

    <!-- â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ ERASMUS+ PROFESSIONAL MOBILITY â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ -->
    <section class="er-programme er-programme--dark" id="programmes">
        <div class="container">
                <div class="er-programme-header">
                    <div class="er-section-kicker">Erasmus+ Professional Mobility</div>
                    <h2 class="er-section-title">Professional Development<br>for Educators</h2>
                    <p class="er-section-sub">International professional mobility programmes for educators and education leaders who want to develop new skills, explore innovative teaching methodologies, and strengthen international collaboration networks.</p>
                </div>

            <div class="er-programme-body">
                <!-- LEFT: Who it's for -->
                <div class="er-programme-prose">
                    <span class="er-sub-label">Who it's for</span>
                    <div class="er-who-chips">
                        <div class="er-who-chip">
                            <svg class="icon" aria-hidden="true"><use href="#icon-user"></use></svg>
                            Primary &amp; Secondary Teachers
                        </div>
                        <div class="er-who-chip">
                            <svg class="icon" aria-hidden="true"><use href="#icon-user"></use></svg>
                            School Principals &amp; School Leaders
                        </div>
                        <div class="er-who-chip">
                            <svg class="icon" aria-hidden="true"><use href="#icon-network"></use></svg>
                            Academic Coordinators
                        </div>
                        <div class="er-who-chip">
                            <svg class="icon" aria-hidden="true"><use href="#icon-cap"></use></svg>
                            Education &amp; Training Professionals
                        </div>
                        <div class="er-who-chip">
                            <svg class="icon" aria-hidden="true"><use href="#icon-users"></use></svg>
                            Youth Workers &amp; Social Educators
                        </div>
                        <div class="er-who-chip">
                            <svg class="icon" aria-hidden="true"><use href="#icon-network"></use></svg>
                            Educational Project Coordinators
                        </div>
                    </div>
                    <p class="er-erasmus-note">
                        Many participants join these programmes through Erasmus+ funded projects, which support professional mobilities for educators across Europe.
                    </p>
                </div>

                <!-- RIGHT: How it works -->
                <div class="er-programme-box">
                    <span class="er-sub-label">How it works</span>
                    <div class="er-stepper" data-stepper data-initial="1">
                        <div class="er-stepper-indicators">
                            <button class="er-stepper-indicator" type="button" data-step="1" aria-label="Step 1">
                                <span class="er-stepper-indicator-inner">
                                    <span class="er-stepper-number">1</span>
                                    <span class="er-stepper-dot"></span>
                                    <span class="er-stepper-check" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                            <div class="er-stepper-connector" data-connector="1">
                                <div class="er-stepper-connector-inner"></div>
                            </div>
                            <button class="er-stepper-indicator" type="button" data-step="2" aria-label="Step 2">
                                <span class="er-stepper-indicator-inner">
                                    <span class="er-stepper-number">2</span>
                                    <span class="er-stepper-dot"></span>
                                    <span class="er-stepper-check" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                            <div class="er-stepper-connector" data-connector="2">
                                <div class="er-stepper-connector-inner"></div>
                            </div>
                            <button class="er-stepper-indicator" type="button" data-step="3" aria-label="Step 3">
                                <span class="er-stepper-indicator-inner">
                                    <span class="er-stepper-number">3</span>
                                    <span class="er-stepper-dot"></span>
                                    <span class="er-stepper-check" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                            <div class="er-stepper-connector" data-connector="3">
                                <div class="er-stepper-connector-inner"></div>
                            </div>
                            <button class="er-stepper-indicator" type="button" data-step="4" aria-label="Step 4">
                                <span class="er-stepper-indicator-inner">
                                    <span class="er-stepper-number">4</span>
                                    <span class="er-stepper-dot"></span>
                                    <span class="er-stepper-check" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                            <div class="er-stepper-connector" data-connector="4">
                                <div class="er-stepper-connector-inner"></div>
                            </div>
                            <button class="er-stepper-indicator" type="button" data-step="5" aria-label="Step 5">
                                <span class="er-stepper-indicator-inner">
                                    <span class="er-stepper-number">5</span>
                                    <span class="er-stepper-dot"></span>
                                    <span class="er-stepper-check" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                        </div>

                        <div class="er-stepper-content">
                            <div class="er-stepper-panel" data-step-panel="1">
                                <h4>Pedagogical Workshops &amp; Training Sessions</h4>
                                <p>Structured sessions focused on innovative methodologies and best practices in education.</p>
                            </div>
                            <div class="er-stepper-panel" data-step-panel="2">
                                <h4>Project-Based Learning</h4>
                                <p>Hands-on collaborative projects that bridge theory and real classroom application.</p>
                            </div>
                            <div class="er-stepper-panel" data-step-panel="3">
                                <h4>Cross-Country Educator Collaboration</h4>
                                <p>Exchange experiences with educators from different European education systems.</p>
                            </div>
                            <div class="er-stepper-panel" data-step-panel="4">
                                <h4>Educational &amp; Institutional Visits</h4>
                                <p>Immersive visits that connect learning to real institutional contexts in Ireland.</p>
                            </div>
                            <div class="er-stepper-panel" data-step-panel="5">
                                <h4>Reflection &amp; Experience Exchange Sessions</h4>
                                <p>Structured reflection and peer exchange to consolidate learning and practical insights.</p>
                            </div>
                        </div>

                        <div class="er-stepper-footer">
                            <div class="er-stepper-nav er-stepper-nav--end" data-stepper-nav>
                                <button class="er-stepper-back" type="button" data-stepper-back>Back</button>
                                <button class="er-stepper-next" type="button" data-stepper-next>Continue</button>
                            </div>
                        </div>
                        <p class="er-erasmus-note">
                            The experience is designed so participants return to their institutions with concrete ideas and practical tools to implement new educational approaches.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ SCHOOL PARTNERSHIPS â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ -->
    <section class="er-programme er-programme--light">
        <div class="container">
            <div class="er-programme-header">
                <div class="er-section-kicker">School Partnerships &amp; Erasmus Collaboration</div>
                <h2 class="er-section-title">Strategic Partnerships for<br>Schools &amp; Institutions</h2>
                <p class="er-section-sub">CI Ireland acts as a strategic partner for schools and educational institutions interested in developing international projects.</p>
            </div>

            <div class="er-programme-body reversed">
                <div class="er-programme-prose">
                    <p>We support schools that are starting their first international initiatives and those deepening established Erasmus+ collaborations.</p>
                    <p>This model allows schools to develop consistent international projects and build lasting educational partnerships.</p>
                </div>

                <div class="er-programme-box">
                    <div class="er-box-section">
                        <h4>Who it's for</h4>
                        <div class="er-box-chips">
                            <span class="er-box-chip">Erasmus+ Schools</span>
                            <span class="er-box-chip">Institutions starting international projects</span>
                            <span class="er-box-chip">Erasmus Coordinators in European schools</span>
                            <span class="er-box-chip">Educational organisations focused on cooperation</span>
                        </div>
                    </div>
                    <div class="er-box-section">
                        <h4>How we support institutions</h4>
                        <ul class="er-box-bullets">
                            <li>Development of international educational programmes</li>
                            <li>Organisation of professional mobilities for educators</li>
                            <li>Design of educational experiences in Ireland</li>
                            <li>Support in implementing educational activities</li>
                            <li>Facilitation of collaboration between institutions from different countries</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ INTERNATIONAL EDUCATION PROGRAMMES â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ -->
    <section class="er-programme er-programme--white">
        <div class="container">
            <div class="er-programme-header">
                <div class="er-section-kicker">International Education Programmes in Ireland</div>
                <h2 class="er-section-title">Pedagogical Innovation &amp;<br>Institutional Development</h2>
                <p class="er-section-sub">Beyond Erasmus+ mobilities, CI Ireland develops international programmes focused on pedagogical innovation and institutional development.</p>
            </div>

            <div class="er-programme-body">
                <div class="er-programme-box" style="border-left-color: var(--ci-purple);">
                    <div class="er-box-section">
                        <h4>Who it's for</h4>
                        <div class="er-box-chips">
                            <span class="er-box-chip">Teachers seeking pedagogical innovation</span>
                            <span class="er-box-chip">Educational leaders &amp; school managers</span>
                            <span class="er-box-chip">Academic teams seeking new approaches</span>
                            <span class="er-box-chip">Institutions developing international projects</span>
                        </div>
                    </div>
                    <div class="er-box-section">
                        <h4>How they work</h4>
                        <ul class="er-box-bullets">
                            <li>Structured academic training</li>
                            <li>Collaboration between international educators</li>
                            <li>Development of educational projects</li>
                            <li>Educational experiences in the Irish context</li>
                        </ul>
                    </div>
                </div>

                <div class="er-programme-prose">
                    <p>These programmes are designed to strengthen the capacity for pedagogical innovation within participating institutions.</p>
                    <p>Participants work alongside educators from different countries and develop projects rooted in real school contexts in Ireland.</p>
                    <p>The goal is to build practical, transferable approaches that can be implemented directly in their institutions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ FOCUS AREAS (SCROLL STACK) â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ -->
    <section class="er-focus" id="focus-areas">
        <div class="er-focus-header">
            <div class="er-section-kicker">Programme Focus Areas</div>
            <h2 class="er-section-title">Four Strategic Pillars</h2>
            <p class="er-section-sub">Our programmes are organised around four key areas of contemporary education, each designed to deliver practical, school-ready insights.</p>
        </div>

        <div class="scroll-stack-outer">
            <div class="scroll-stack-sticky">
                <div class="stack-inner-header" style="display:none;"></div>
                <div class="stack-cards-wrap">

                    <!-- Card 1: Inclusive Education & SEN -->
                    <div class="step-card" data-step="1">
                        <div class="step-left">
                            <div class="step-number">01</div>
                            <div class="step-badge">Inclusive Ed</div>
                            <div class="step-icon-wrap"><svg class="icon" aria-hidden="true"><use href="#icon-universal-access"></use></svg></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">Inclusive Education &amp; Special Educational Needs</h3>
                            <p class="step-desc">Programmes focused on inclusive practice, with special attention to Special Educational Needs (SEN) in diverse school contexts.</p>
                            <p class="step-desc"><strong>For schools working on inclusion broadly</strong></p>
                            <ul class="step-bullets">
                                <li>Teaching strategies for heterogeneous classrooms</li>
                                <li>Pedagogical adaptation and classroom differentiation</li>
                                <li>Universal Design for Learning (UDL)</li>
                                <li>Social and emotional wellbeing</li>
                            </ul>
                            <p class="step-desc"><strong>For schools focused on SEN</strong></p>
                            <ul class="step-bullets">
                                <li>Support strategies for SEN in mainstream settings</li>
                                <li>Collaboration between teachers, specialists, and support teams</li>
                                <li>Adapting practice to diverse learning profiles</li>
                                <li>Safe, inclusive environments for specific needs</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Card 2: Digital Transformation -->
                    <div class="step-card" data-step="2">
                        <div class="step-left">
                            <div class="step-number">02</div>
                            <div class="step-badge">Digital</div>
                            <div class="step-icon-wrap"><svg class="icon" aria-hidden="true"><use href="#icon-laptop"></use></svg></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">Digital Transformation in Education</h3>
                            <p class="step-desc">Explore how digital technologies can transform teaching and learning in a pedagogically meaningful way.</p>
                            <ul class="step-bullets">
                                <li>Digital tools for education</li>
                                <li>Hybrid learning and virtual environments</li>
                                <li>Digital collaboration between students</li>
                                <li>Development of digital competences for educators</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Card 3: STEM -->
                    <div class="step-card" data-step="3">
                        <div class="step-left">
                            <div class="step-number">03</div>
                            <div class="step-badge">STEM</div>
                            <div class="step-icon-wrap"><svg class="icon" aria-hidden="true"><use href="#icon-flask"></use></svg></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">STEM Education</h3>
                            <p class="step-desc">Innovative methodologies for teaching science, technology, engineering, and mathematics &mdash; making STEM more relevant and engaging for students.</p>
                            <ul class="step-bullets">
                                <li>Project-based learning</li>
                                <li>Real-world problem solving</li>
                                <li>Interdisciplinary integration across scientific areas</li>
                                <li>Critical thinking and creativity</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Card 4: Leadership -->
                    <div class="step-card" data-step="4">
                        <div class="step-left">
                            <div class="step-number">04</div>
                            <div class="step-badge">Leadership</div>
                            <div class="step-icon-wrap"><svg class="icon" aria-hidden="true"><use href="#icon-users"></use></svg></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">Leadership in Schools</h3>
                            <p class="step-desc">For principals and educational leaders seeking to strengthen leadership and management competencies.</p>
                            <ul class="step-bullets">
                                <li>Educational leadership</li>
                                <li>Change management in educational institutions</li>
                                <li>Building cultures of innovation in schools</li>
                                <li>Internationalisation of education</li>
                            </ul>
                        </div>
                    </div>

                </div>

                <!-- Progress dots -->
                <div class="stack-progress">
                    <div class="stack-dot active"></div>
                    <div class="stack-dot"></div>
                    <div class="stack-dot"></div>
                    <div class="stack-dot"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ PROGRAMME MODELS â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ -->
    <section class="er-models">
        <div class="container">
            <div class="er-models-header">
                <div class="er-section-kicker">Programme Formats</div>
                <h2 class="er-section-title">Two Ways to Join</h2>
                <p class="er-section-sub">CI Ireland offers different formats of mobility and professional development.</p>
            </div>

            <div class="er-models-grid">
                <!-- Open International -->
                <div class="er-model-card er-model-card--light">
                    <div class="er-model-badge"><svg class="icon" aria-hidden="true"><use href="#icon-globe"></use></svg> Open Enrolment</div>
                    <div class="er-model-icon"><svg class="icon" aria-hidden="true"><use href="#icon-users"></use></svg></div>
                    <h3 class="er-model-title">Open International Programmes</h3>
                    <p class="er-model-desc">Educators from different countries participate together in multicultural programmes.</p>
                    <div class="er-model-sub">Ideal for</div>
                    <div class="er-model-chips">
                        <span class="er-model-chip">Teachers in individual Erasmus+ mobilities</span>
                        <span class="er-model-chip">Educators interested in international networks</span>
                        <span class="er-model-chip">Institutions offering international experiences</span>
                    </div>
                    <div class="er-model-sub">What you get</div>
                    <ul class="er-model-bullets">
                        <li>Collaborative activities with international educators</li>
                        <li>Exchange across different education systems</li>
                        <li>Expanded professional networks</li>
                    </ul>
                </div>

                <!-- Institutional Group -->
                <div class="er-model-card er-model-card--dark">
                    <div class="er-model-badge"><svg class="icon" aria-hidden="true"><use href="#icon-school"></use></svg> For Schools</div>
                    <div class="er-model-icon"><svg class="icon" aria-hidden="true"><use href="#icon-building"></use></svg></div>
                    <h3 class="er-model-title">Institutional Group Programmes</h3>
                    <p class="er-model-desc">Programmes designed specifically for a school or institution, aligned to its educational strategy.</p>
                    <div class="er-model-sub">Ideal for</div>
                    <div class="er-model-chips">
                        <span class="er-model-chip">Schools in Erasmus+ group projects</span>
                        <span class="er-model-chip">Educational teams developing institutional projects</span>
                        <span class="er-model-chip">Institutions seeking strategic alignment</span>
                    </div>
                    <div class="er-model-sub">What you get</div>
                    <ul class="er-model-bullets">
                        <li>Tailored programme aligned to institutional priorities</li>
                        <li>Direct impact on institutional development</li>
                        <li>Cohesive experience for the full team</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ WHY CI IRELAND â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ -->
    <section class="er-why">
        <div class="container">
            <div class="er-why-header">
                <div class="er-section-kicker">Why CI Ireland</div>
                <h2 class="er-section-title">Why Schools Choose CI Ireland</h2>
                <p class="er-section-sub">Schools and educational institutions choose CI Ireland for a combination of experience, structure, and international reach.</p>
            </div>

            <div class="er-why-grid">
                <div class="er-why-card">
                    <div class="er-why-icon"><svg class="icon" aria-hidden="true"><use href="#icon-globe"></use></svg></div>
                    <h4>International Programme Experience</h4>
                    <p>Proven experience in designing and delivering international educational programmes for schools and institutions.</p>
                </div>
                <div class="er-why-card">
                    <div class="er-why-icon"><svg class="icon" aria-hidden="true"><use href="#icon-handshake"></use></svg></div>
                    <h4>Structured Pedagogy &amp; Partners</h4>
                    <p>Structured pedagogical approach supported by certified trainers, universities, and educational partners.</p>
                </div>
                <div class="er-why-card">
                    <div class="er-why-icon"><svg class="icon" aria-hidden="true"><use href="#icon-map-marker"></use></svg></div>
                    <h4>Dublin &amp; International Network</h4>
                    <p>Strategic location in Dublin combined with an international partner network that strengthens collaboration opportunities.</p>
                </div>
            </div>

            <div class="er-bridge">
                <div class="er-bridge-content">
                    <h3 class="er-bridge-title">Connecting Europe and Latin America</h3>
                    <p class="er-bridge-text">CI Ireland acts as a bridge between European and Latin American educational institutions. Through CI's international network, educators from different regions can share experiences, explore diverse pedagogical practices, and develop international educational projects.</p>
                </div>
                <div class="er-bridge-visual" aria-hidden="true">
                    <svg viewBox="0 0 360 200" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="bridgeLine" x1="0" x2="1" y1="0" y2="0">
                                <stop offset="0" stop-color="#F26522" stop-opacity="0.2" />
                                <stop offset="0.5" stop-color="#F26522" stop-opacity="1" />
                                <stop offset="1" stop-color="#F26522" stop-opacity="0.25" />
                            </linearGradient>
                            <radialGradient id="glow" cx="50%" cy="50%" r="50%">
                                <stop offset="0" stop-color="#F26522" stop-opacity="0.55" />
                                <stop offset="1" stop-color="#F26522" stop-opacity="0" />
                            </radialGradient>
                        </defs>
                        <rect x="0" y="0" width="360" height="200" rx="20" fill="rgba(255,255,255,0.02)"/>
                        <path d="M40 140 C120 40, 240 40, 320 120" stroke="url(#bridgeLine)" stroke-width="4" fill="none"/>
                        <circle cx="60" cy="140" r="22" fill="url(#glow)"/>
                        <circle cx="60" cy="140" r="8" fill="#F26522"/>
                        <circle cx="300" cy="120" r="22" fill="url(#glow)"/>
                        <circle cx="300" cy="120" r="8" fill="#F26522"/>
                        <text x="36" y="170" fill="rgba(255,255,255,0.65)" font-size="10" font-family="Montserrat, sans-serif" font-weight="600">Latin America</text>
                        <text x="278" y="146" fill="rgba(255,255,255,0.65)" font-size="10" font-family="Montserrat, sans-serif" font-weight="600">Europe</text>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ WORK WITH US â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ -->
    <section class="er-contact" id="contact">
        <div class="container">
            <div class="er-contact-split">
                <div class="er-contact-prose">
                    <div class="er-section-kicker">Work With Us</div>
                    <h2 class="er-section-title">Let's Build Something Together</h2>
                    <p class="er-section-sub">CI Ireland collaborates with schools, educational institutions, and organisations interested in developing international mobility and educational cooperation programmes. If your institution wants to organise a professional mobility, develop an Erasmus+ project, or explore international collaboration, our team will be happy to discuss possible initiatives.</p>
                    <ul class="er-contact-bullets">
                        <li>
                            <svg class="icon" aria-hidden="true"><use href="#icon-plane"></use></svg>
                            Organise a professional mobility for your school or team
                        </li>
                        <li>
                            <svg class="icon" aria-hidden="true"><use href="#icon-file"></use></svg>
                            Develop or deepen an Erasmus+ project
                        </li>
                        <li>
                            <svg class="icon" aria-hidden="true"><use href="#icon-network"></use></svg>
                            Explore international collaboration opportunities
                        </li>
                    </ul>
                </div>

                <div class="er-form-card">
                    <div class="er-form-title">Get in Touch</div>
                    <div class="er-form-sub">Tell us about your school or institution and we'll get back to you.</div>
                    <form class="er-form" onsubmit="return false;">
                        <div class="er-form-row">
                            <div class="er-form-group">
                                <label>Full Name</label>
                                <input type="text" placeholder="Your full name">
                            </div>
                            <div class="er-form-group">
                                <label>Institution</label>
                                <input type="text" placeholder="Your school or organisation">
                            </div>
                        </div>
                        <div class="er-form-row">
                            <div class="er-form-group">
                                <label>Country</label>
                                <input type="text" placeholder="Your country">
                            </div>
                            <div class="er-form-group">
                                <label>Email</label>
                                <input type="email" placeholder="your@email.com">
                            </div>
                        </div>
                        <div class="er-form-group">
                            <label>Message</label>
                            <textarea rows="4" placeholder="Tell us about your interest in Erasmus+ mobility or school partnerships..."></textarea>
                        </div>
                        <button type="submit" class="er-form-submit">
                            Send Message <svg class="icon" aria-hidden="true"><use href="#icon-arrow-right"></use></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="/js/erasmus.js" defer></script>
@endpush




