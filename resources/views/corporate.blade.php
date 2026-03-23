@extends('layouts.app')

@section('title', 'Corporate | CI Executive Experiences')
@section('no-fontawesome', true)

@section('head')
    @if (file_exists(public_path('build/manifest.json')))
        @vite('resources/css/corporate.css')
    @else
        <link rel="stylesheet" href="/css/corporate.css">
    @endif
@endsection

@section('styles')
@endsection

@section('footer-tagline')CI Ireland &mdash; European Executive Experiences for Professionals and Institutions.@endsection
@section('footer-bottom-right')Connecting Professionals to the European Business Ecosystem.@endsection

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
        <symbol id="icon-users" viewBox="0 0 24 24">
            <circle cx="8" cy="9" r="2.5"></circle>
            <circle cx="16" cy="9" r="2.5"></circle>
            <path d="M2.5 20c1-3 6-4 7.5-4"></path>
            <path d="M14 16c3 0 6 1 7.5 4"></path>
        </symbol>
        <symbol id="icon-briefcase" viewBox="0 0 24 24">
            <rect x="2" y="8" width="20" height="13" rx="2"></rect>
            <path d="M16 8V6a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"></path>
            <line x1="12" y1="13" x2="12" y2="13.01"></line>
        </symbol>
        <symbol id="icon-award" viewBox="0 0 24 24">
            <circle cx="12" cy="9" r="6"></circle>
            <path d="M8.21 13.89L7 23l5-3 5 3-1.21-9.12"></path>
        </symbol>
        <symbol id="icon-check" viewBox="0 0 24 24">
            <polyline points="20 6 9 17 4 12"></polyline>
        </symbol>
        <symbol id="icon-star" viewBox="0 0 24 24">
            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
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
        <symbol id="icon-network" viewBox="0 0 24 24">
            <circle cx="6" cy="6" r="2"></circle>
            <circle cx="18" cy="6" r="2"></circle>
            <circle cx="12" cy="18" r="2"></circle>
            <path d="M8 7l3 8"></path>
            <path d="M16 7l-3 8"></path>
        </symbol>
        <symbol id="icon-target" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="9"></circle>
            <circle cx="12" cy="12" r="5"></circle>
            <circle cx="12" cy="12" r="1"></circle>
        </symbol>
        <symbol id="icon-plane" viewBox="0 0 24 24">
            <path d="M2 12l20-7-6 8 6 8-20-7z"></path>
        </symbol>
        <symbol id="icon-user" viewBox="0 0 24 24">
            <circle cx="12" cy="8" r="3"></circle>
            <path d="M5 21c1.5-4 12.5-4 14 0"></path>
        </symbol>
        <symbol id="icon-handshake" viewBox="0 0 24 24">
            <path d="M4 12l4-4 5 5"></path>
            <path d="M20 12l-4-4-5 5"></path>
            <path d="M9 13l2 2a2 2 0 0 0 3 0l4-4"></path>
        </symbol>
        <symbol id="icon-lightbulb" viewBox="0 0 24 24">
            <path d="M9 18h6"></path>
            <path d="M10 22h4"></path>
            <path d="M12 2a7 7 0 0 1 7 7c0 2.38-1.19 4.47-3 5.74V17H8v-2.26C6.19 13.47 5 11.38 5 9a7 7 0 0 1 7-7z"></path>
        </symbol>
        <symbol id="icon-clock" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="9"></circle>
            <polyline points="12 7 12 12 15 15"></polyline>
        </symbol>
    </svg>

    <div class="top-banner">
        European Executive Experience &mdash; Ireland, Paris &amp; Berlin.
        <a href="#apply">Apply Now <svg class="icon" aria-hidden="true"><use href="#icon-arrow-right"></use></svg></a>
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
                    <li><a href="{{ route('corporate') }}" class="active">Corporate Learning</a></li>
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
        <li><a href="{{ route('corporate') }}" class="active">Corporate Learning <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="#contact">Get in Touch <i class="fas fa-chevron-right"></i></a></li>
    </ul>
@endsection

@section('mobile-nav-footer')
    <div class="mobile-drawer-footer">
        <button class="mobile-cta-btn" onclick="window.location='#apply'">Apply Now</button>
    </div>
@endsection

@section('content')

    <!-- ===== HERO ===== -->
    <section class="co-hero">
        <div class="container">
            <div class="co-hero-split">

                <div class="co-hero-content">
                    <div class="co-hero-kicker">
                        <svg class="icon" aria-hidden="true"><use href="#icon-briefcase"></use></svg>
                        Corporate &middot; CI Executive Experiences
                    </div>
                    <h1 class="co-hero-title">
                        European<br><span>Executive</span><br>Experience
                    </h1>
                    <p class="co-hero-sub">
                        Immersive, high-impact programs that combine executive learning, real market exposure and international networking &mdash; delivered across Europe's most dynamic business hubs.
                    </p>
                    <div class="co-hero-ctas">
                        <a href="#apply" class="co-cta-primary">
                            Apply Now <svg class="icon" aria-hidden="true"><use href="#icon-arrow-right"></use></svg>
                        </a>
                        <a href="#contact" class="co-cta-ghost">
                            Contact Our Team <svg class="icon" aria-hidden="true"><use href="#icon-arrow-right"></use></svg>
                        </a>
                    </div>
                    <div class="co-hero-stats">
                        <div class="co-hero-stat">
                            <span class="co-hero-stat-num">2&ndash;4</span>
                            <span class="co-hero-stat-label">Weeks</span>
                        </div>
                        <div class="co-hero-stat-divider"></div>
                        <div class="co-hero-stat">
                            <span class="co-hero-stat-num">3</span>
                            <span class="co-hero-stat-label">Cities</span>
                        </div>
                        <div class="co-hero-stat-divider"></div>
                        <div class="co-hero-stat">
                            <span class="co-hero-stat-num">Cohort</span>
                            <span class="co-hero-stat-label">Format</span>
                        </div>
                        <div class="co-hero-stat-divider"></div>
                        <div class="co-hero-stat">
                            <span class="co-hero-stat-num">IEC</span>
                            <span class="co-hero-stat-label">Certificate</span>
                        </div>
                    </div>
                </div>

                <!-- Right: animated SVG map -->
                <div class="co-hero-map" aria-hidden="true">
                    <svg viewBox="0 0 520 420" xmlns="http://www.w3.org/2000/svg" style="overflow:visible;">
                        <defs>
                            <pattern id="cogrid" width="28" height="28" patternUnits="userSpaceOnUse">
                                <circle cx="14" cy="14" r="1.2" fill="rgba(255,255,255,0.08)"/>
                            </pattern>
                        </defs>
                        <rect width="520" height="420" fill="url(#cogrid)" rx="20"/>
                        <rect width="520" height="420" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1" rx="20"/>

                        <!-- Radar rings from Dublin -->
                        <circle class="co-radar-ring" cx="100" cy="230" r="0"/>
                        <circle class="co-radar-ring" cx="100" cy="230" r="0"/>
                        <circle class="co-radar-ring" cx="100" cy="230" r="0"/>

                        <!-- Flight paths -->
                        <path class="co-flight-path" pathLength="1" d="M 100 230 Q 190 190 270 270" style="animation-delay:0.4s"/>
                        <path class="co-flight-path" pathLength="1" d="M 100 230 Q 240 110 390 150" style="animation-delay:0.9s"/>
                        <path class="co-flight-path" pathLength="1" d="M 270 270 Q 330 180 390 150" style="animation-delay:1.5s"/>

                        <!-- Dublin pulse + hub -->
                        <circle class="co-dublin-pulse" cx="100" cy="230" r="26"/>
                        <circle cx="100" cy="230" r="12" fill="#F26522"/>
                        <circle cx="100" cy="230" r="6" fill="#fff" opacity="0.95"/>
                        <text x="118" y="225" fill="#F26522" font-size="13" font-family="Montserrat,sans-serif" font-weight="700">Dublin</text>
                        <text x="118" y="241" fill="rgba(255,255,255,0.45)" font-size="10" font-family="Montserrat,sans-serif" font-weight="600">Ireland</text>

                        <!-- Paris -->
                        <g class="co-city-dot" style="animation-delay:1.8s">
                            <circle cx="270" cy="270" r="8" fill="rgba(255,255,255,0.1)" stroke="rgba(255,255,255,0.35)" stroke-width="1.5"/>
                            <circle cx="270" cy="270" r="4" fill="#F26522"/>
                            <text x="284" y="268" fill="rgba(255,255,255,0.8)" font-size="13" font-family="Montserrat,sans-serif" font-weight="700">Paris</text>
                            <text x="284" y="284" fill="rgba(255,255,255,0.45)" font-size="10" font-family="Montserrat,sans-serif" font-weight="600">France</text>
                        </g>

                        <!-- Berlin -->
                        <g class="co-city-dot" style="animation-delay:2.2s">
                            <circle cx="390" cy="150" r="8" fill="rgba(255,255,255,0.1)" stroke="rgba(255,255,255,0.35)" stroke-width="1.5"/>
                            <circle cx="390" cy="150" r="4" fill="#F26522"/>
                            <text x="404" y="148" fill="rgba(255,255,255,0.8)" font-size="13" font-family="Montserrat,sans-serif" font-weight="700">Berlin</text>
                            <text x="404" y="164" fill="rgba(255,255,255,0.45)" font-size="10" font-family="Montserrat,sans-serif" font-weight="600">Germany</text>
                        </g>

                        <!-- Decorative arc -->
                        <path d="M 60 100 Q 300 30 480 180" fill="none" stroke="rgba(255,255,255,0.03)" stroke-width="1" stroke-dasharray="4 6"/>

                        <!-- Info panels -->
                        <rect x="30" y="320" width="200" height="68" rx="12" fill="rgba(255,255,255,0.05)" stroke="rgba(255,255,255,0.1)" stroke-width="1"/>
                        <text x="46" y="344" fill="rgba(255,255,255,0.4)" font-size="9" font-family="Montserrat,sans-serif" font-weight="700" letter-spacing="2">PROGRAM FORMAT</text>
                        <text x="46" y="362" fill="#fff" font-size="13" font-family="Montserrat,sans-serif" font-weight="700">Cohort-Based</text>
                        <text x="46" y="378" fill="rgba(255,255,255,0.5)" font-size="11" font-family="Montserrat,sans-serif" font-weight="600">Limited seats per intake</text>

                        <rect x="300" y="300" width="188" height="68" rx="12" fill="rgba(242,101,34,0.1)" stroke="rgba(242,101,34,0.3)" stroke-width="1"/>
                        <text x="316" y="324" fill="rgba(255,255,255,0.4)" font-size="9" font-family="Montserrat,sans-serif" font-weight="700" letter-spacing="2">CERTIFICATION</text>
                        <text x="316" y="344" fill="#F26522" font-size="12" font-family="Montserrat,sans-serif" font-weight="800">Int'l Executive</text>
                        <text x="316" y="360" fill="#F26522" font-size="12" font-family="Montserrat,sans-serif" font-weight="800">Certificate</text>
                    </svg>
                </div>

                <!-- City chips — mobile only -->
                <div class="co-hero-cities">
                    <span class="co-hero-city"><svg class="icon" aria-hidden="true"><use href="#icon-map-marker"></use></svg> Dublin</span>
                    <span class="co-hero-city"><svg class="icon" aria-hidden="true"><use href="#icon-map-marker"></use></svg> Paris</span>
                    <span class="co-hero-city"><svg class="icon" aria-hidden="true"><use href="#icon-map-marker"></use></svg> Berlin</span>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== ABOUT THE PROGRAM ===== -->
    <section class="co-about">
        <div class="container">
            <div class="co-about-split">
                <div class="co-about-left">
                    <div class="co-about-prose">
                        <div class="co-section-kicker">About the Program</div>
                        <h2 class="co-section-title">More Than an International Education</h2>
                        <p>The European Executive Experience was designed for individuals and institutions seeking more than traditional international education.</p>
                        <p class="co-about-bold">This is not a study trip.</p>
                        <p>It is a structured, cohort-based experience that provides direct exposure to how business, innovation and global markets operate in Europe.</p>
                        <p>Participants engage with international faculty, industry professionals and real business environments &mdash; gaining practical insights that directly impact their career positioning.</p>
                    </div>
                    <div class="co-overview-box">
                    <div class="co-overview-title">Program Overview</div>
                    <ul class="co-overview-list">
                        <li>
                            <span class="co-overview-icon"><svg class="icon" aria-hidden="true"><use href="#icon-clock"></use></svg></span>
                            <div>
                                <span class="co-overview-label">Duration</span>
                                <span class="co-overview-value">2 to 4 weeks</span>
                            </div>
                        </li>
                        <li>
                            <span class="co-overview-icon"><svg class="icon" aria-hidden="true"><use href="#icon-map-marker"></use></svg></span>
                            <div>
                                <span class="co-overview-label">Locations</span>
                                <span class="co-overview-value">Ireland, Paris and Berlin</span>
                            </div>
                        </li>
                        <li>
                            <span class="co-overview-icon"><svg class="icon" aria-hidden="true"><use href="#icon-users"></use></svg></span>
                            <div>
                                <span class="co-overview-label">Format</span>
                                <span class="co-overview-value">Cohort-based (limited seats)</span>
                            </div>
                        </li>
                        <li>
                            <span class="co-overview-icon"><svg class="icon" aria-hidden="true"><use href="#icon-globe"></use></svg></span>
                            <div>
                                <span class="co-overview-label">Language</span>
                                <span class="co-overview-value">English</span>
                            </div>
                        </li>
                        <li>
                            <span class="co-overview-icon"><svg class="icon" aria-hidden="true"><use href="#icon-award"></use></svg></span>
                            <div>
                                <span class="co-overview-label">Certification</span>
                                <span class="co-overview-value">International Executive Certificate</span>
                            </div>
                        </li>
                    </ul>
                </div>
                </div>{{-- end .co-about-left --}}
                <div class="co-about-image">
                    <img src="{{ asset('images/corporate/co-experience.webp') }}"
                         alt="CI Executive Experience cohort session in a European business setting"
                         loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- ===== WHAT MAKES IT DIFFERENT ===== -->
    <section class="co-diff">
        <div class="container">
            <div class="co-diff-header">
                <div class="co-section-kicker co-section-kicker--light">What Makes This Program Different</div>
                <h2 class="co-section-title co-section-title--light">Built Around Real Business Exposure</h2>
            </div>
            <div class="co-diff-grid">
                <div class="co-diff-card">
                    <div class="co-diff-icon"><svg class="icon" aria-hidden="true"><use href="#icon-target"></use></svg></div>
                    <p>Designed around real business exposure, not only academic content</p>
                </div>
                <div class="co-diff-card">
                    <div class="co-diff-icon"><svg class="icon" aria-hidden="true"><use href="#icon-network"></use></svg></div>
                    <p>Direct connection to European business ecosystems</p>
                </div>
                <div class="co-diff-card">
                    <div class="co-diff-icon"><svg class="icon" aria-hidden="true"><use href="#icon-building"></use></svg></div>
                    <p>Curated access to companies, professionals and industry insights</p>
                </div>
                <div class="co-diff-card">
                    <div class="co-diff-icon"><svg class="icon" aria-hidden="true"><use href="#icon-users"></use></svg></div>
                    <p>International cohort with high-level participants</p>
                </div>
                <div class="co-diff-card">
                    <div class="co-diff-icon"><svg class="icon" aria-hidden="true"><use href="#icon-star"></use></svg></div>
                    <p>Strong focus on career positioning and global mindset</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== WHAT YOU WILL EXPERIENCE ===== -->
    <section class="co-experience">
        <div class="container">
            <div class="co-experience-header">
                <div class="co-section-kicker">What You Will Experience</div>
                <h2 class="co-section-title">A Full Immersion in the European Business World</h2>
            </div>
            <div class="co-experience-grid">
                <div class="co-exp-item">
                    <div class="co-exp-icon"><svg class="icon" aria-hidden="true"><use href="#icon-briefcase"></use></svg></div>
                    <div class="co-exp-text">
                        <h4>Executive-Level Classes</h4>
                        <p>Sessions with international faculty across business, strategy, leadership and innovation.</p>
                    </div>
                </div>
                <div class="co-exp-item">
                    <div class="co-exp-icon"><svg class="icon" aria-hidden="true"><use href="#icon-building"></use></svg></div>
                    <div class="co-exp-text">
                        <h4>Company Visits &amp; Guest Speakers</h4>
                        <p>Direct exposure to leading European companies and professionals operating in real business environments.</p>
                    </div>
                </div>
                <div class="co-exp-item">
                    <div class="co-exp-icon"><svg class="icon" aria-hidden="true"><use href="#icon-target"></use></svg></div>
                    <div class="co-exp-text">
                        <h4>Real Business Case Discussions</h4>
                        <p>Work through real scenarios and challenges from the European market with your cohort.</p>
                    </div>
                </div>
                <div class="co-exp-item">
                    <div class="co-exp-icon"><svg class="icon" aria-hidden="true"><use href="#icon-network"></use></svg></div>
                    <div class="co-exp-text">
                        <h4>Networking Events</h4>
                        <p>Connect with professionals, peers and industry figures across multiple European cities.</p>
                    </div>
                </div>
                <div class="co-exp-item">
                    <div class="co-exp-icon"><svg class="icon" aria-hidden="true"><use href="#icon-globe"></use></svg></div>
                    <div class="co-exp-text">
                        <h4>Cultural Immersion</h4>
                        <p>Experience the distinct business cultures of Dublin, Paris and Berlin first-hand.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== LOCATIONS ===== -->
    <section class="co-locations">
        <div class="container">
            <div class="co-locations-header">
                <div class="co-section-kicker co-section-kicker--light">Locations</div>
                <h2 class="co-section-title co-section-title--light">Three of Europe's Most Dynamic Hubs</h2>
            </div>
            <div class="co-locations-grid">
                <div class="co-location-card">
                    <div class="co-location-bg" style="background-image: url('{{ asset('images/corporate/co-dublin.webp') }}');" aria-hidden="true"></div>
                    <div class="co-location-overlay"></div>
                    <div class="co-location-content">
                        <div class="co-location-label">Ireland</div>
                        <h3 class="co-location-city">Dublin</h3>
                        <p class="co-location-tagline">Europe's Innovation Hub</p>
                        <p class="co-location-desc">Experience one of Europe's most dynamic business environments, home to global tech leaders and fast-growing companies.</p>
                    </div>
                </div>
                <div class="co-location-card co-location-card--accent">
                    <div class="co-location-bg" style="background-image: url('{{ asset('images/corporate/co-paris.webp') }}');" aria-hidden="true"></div>
                    <div class="co-location-overlay"></div>
                    <div class="co-location-content">
                        <div class="co-location-label">France</div>
                        <h3 class="co-location-city">Paris</h3>
                        <p class="co-location-tagline">Strategy &amp; Creativity</p>
                        <p class="co-location-desc">One of Europe's most influential cities in business, innovation and culture &mdash; combining strategic thinking with creative environments.</p>
                    </div>
                </div>
                <div class="co-location-card">
                    <div class="co-location-bg" style="background-image: url('{{ asset('images/corporate/co-berlin.webp') }}');" aria-hidden="true"></div>
                    <div class="co-location-overlay"></div>
                    <div class="co-location-content">
                        <div class="co-location-label">Germany</div>
                        <h3 class="co-location-city">Berlin</h3>
                        <p class="co-location-tagline">Global Thinking</p>
                        <p class="co-location-desc">A powerhouse of entrepreneurship and innovation, Berlin offers a unique blend of global outlook and creative business culture.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== AREAS OF FOCUS ===== -->
    <section class="co-focus">
        <div class="container">
            <div class="co-focus-header">
                <div class="co-section-kicker">Areas of Focus</div>
                <h2 class="co-section-title">Five Strategic Business Domains</h2>
            </div>
            <div class="co-focus-grid">
                <div class="co-focus-card">
                    <div class="co-focus-icon"><svg class="icon" aria-hidden="true"><use href="#icon-briefcase"></use></svg></div>
                    <h4>Business &amp; Leadership</h4>
                </div>
                <div class="co-focus-card">
                    <div class="co-focus-icon"><svg class="icon" aria-hidden="true"><use href="#icon-network"></use></svg></div>
                    <h4>Marketing &amp; Communication</h4>
                </div>
                <div class="co-focus-card">
                    <div class="co-focus-icon"><svg class="icon" aria-hidden="true"><use href="#icon-lightbulb"></use></svg></div>
                    <h4>Technology &amp; Innovation</h4>
                </div>
                <div class="co-focus-card">
                    <div class="co-focus-icon"><svg class="icon" aria-hidden="true"><use href="#icon-target"></use></svg></div>
                    <h4>Finance &amp; Strategy</h4>
                </div>
                <div class="co-focus-card">
                    <div class="co-focus-icon"><svg class="icon" aria-hidden="true"><use href="#icon-users"></use></svg></div>
                    <h4>Behavioral Sciences</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== PROGRAM STRUCTURE ===== -->
    <section class="co-tiers">
        <div class="container">
            <div class="co-tiers-header">
                <div class="co-section-kicker co-section-kicker--light">Program Structure</div>
                <h2 class="co-section-title co-section-title--light">Three Levels of Experience</h2>
                <p class="co-section-sub co-section-sub--light">Each tier is designed for a different level of engagement and professional ambition.</p>
            </div>
            <div class="co-tiers-grid">

                <div class="co-tier-card co-tier-card--core">
                    <div class="co-tier-badge">Core</div>
                    <h3 class="co-tier-title">European Executive Experience &mdash; Core</h3>
                    <p class="co-tier-sub">A structured and immersive introduction to the European business environment.</p>
                    <div class="co-tier-includes">Includes</div>
                    <ul class="co-tier-list">
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Academic sessions</li>
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Company visits (group format)</li>
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Networking events</li>
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Certificate of completion</li>
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Full program support</li>
                    </ul>
                    <a href="#contact" class="co-tier-cta co-tier-cta--outline">Apply for Core</a>
                </div>

                <div class="co-tier-card co-tier-card--select">
                    <div class="co-tier-badge co-tier-badge--select">Select</div>
                    <h3 class="co-tier-title">European Executive Experience &mdash; Select</h3>
                    <p class="co-tier-sub">An enhanced experience with deeper professional exposure.</p>
                    <div class="co-tier-includes">Everything in Core, plus</div>
                    <ul class="co-tier-list">
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Exclusive sessions with industry professionals</li>
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Career-focused workshops</li>
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Access to premium networking events</li>
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Smaller group interactions</li>
                    </ul>
                    <a href="#contact" class="co-tier-cta co-tier-cta--primary">Apply for Select</a>
                </div>

                <div class="co-tier-card co-tier-card--elite">
                    <div class="co-tier-badge co-tier-badge--elite">Elite</div>
                    <h3 class="co-tier-title">European Executive Experience &mdash; Elite</h3>
                    <p class="co-tier-sub">A highly curated experience designed for participants seeking strategic access and personalised exposure.</p>
                    <div class="co-tier-includes">Everything in Select, plus</div>
                    <ul class="co-tier-list">
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Private or small-group mentoring sessions</li>
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Access to high-level closed-door discussions</li>
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Premium experiences and tailored activities</li>
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Strategic career positioning support</li>
                    </ul>
                    <a href="#contact" class="co-tier-cta co-tier-cta--elite">Apply for Elite</a>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== WHO THIS IS FOR ===== -->
    <section class="co-audience">
        <div class="container">
            <div class="co-audience-header">
                <div class="co-section-kicker">Who This Program Is For</div>
                <h2 class="co-section-title">Built for Ambitious Professionals</h2>
            </div>
            <div class="co-audience-grid">
                <div class="co-audience-card">
                    <div class="co-audience-icon"><svg class="icon" aria-hidden="true"><use href="#icon-user"></use></svg></div>
                    <h4>Young Professionals</h4>
                    <p>Looking to accelerate their international careers and gain real European market exposure.</p>
                </div>
                <div class="co-audience-card">
                    <div class="co-audience-icon"><svg class="icon" aria-hidden="true"><use href="#icon-award"></use></svg></div>
                    <h4>University Students</h4>
                    <p>With strong academic performance and global ambitions seeking a competitive edge.</p>
                </div>
                <div class="co-audience-card">
                    <div class="co-audience-icon"><svg class="icon" aria-hidden="true"><use href="#icon-lightbulb"></use></svg></div>
                    <h4>Entrepreneurs</h4>
                    <p>And business-minded individuals looking to understand and enter the European ecosystem.</p>
                </div>
                <div class="co-audience-card">
                    <div class="co-audience-icon"><svg class="icon" aria-hidden="true"><use href="#icon-building"></use></svg></div>
                    <h4>Institutions</h4>
                    <p>Seeking high-quality international programs for their students and professionals.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FOR INSTITUTIONS ===== -->
    <section class="co-institutions">
        <div class="container">
            <div class="co-institutions-split">
                <div class="co-institutions-prose">
                    <div class="co-section-kicker co-section-kicker--light">For Institutions and Organisations</div>
                    <h2 class="co-section-title co-section-title--light">Partner With Us</h2>
                    <p>We partner with universities, business schools and companies to deliver international executive programs aligned with their strategic goals.</p>
                    <p>Selected institutions may request customised versions of the European Executive Experience, designed to meet specific academic or corporate objectives.</p>
                </div>
                <div class="co-institutions-box">
                    <div class="co-institutions-box-title">What We Offer Institutions</div>
                    <ul class="co-institutions-list">
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Customised program design</li>
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Strategic alignment with academic objectives</li>
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Dedicated program support team</li>
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Flexible format and duration</li>
                        <li><svg class="icon" aria-hidden="true"><use href="#icon-check"></use></svg> Access to European business network</li>
                    </ul>
                    <a href="#contact" class="co-cta-primary co-cta-primary--sm">
                        Explore Partnerships <svg class="icon" aria-hidden="true"><use href="#icon-arrow-right"></use></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== APPLICATION + CTA ===== -->
    <section class="co-apply" id="apply">
        <div class="container">
            <div class="co-apply-inner">
                <div class="co-apply-prose">
                    <div class="co-section-kicker co-section-kicker--light">Application Process</div>
                    <h2 class="co-section-title co-section-title--light">Participation Is by Selection</h2>
                    <p>Applicants are evaluated based on their profile, objectives and alignment with the program. Participation is limited and subject to selection.</p>
                    <div class="co-intake-badge">
                        <svg class="icon" aria-hidden="true"><use href="#icon-clock"></use></svg>
                        Next Intake &mdash; Limited seats available for the upcoming cohort
                    </div>
                </div>
                <div class="co-apply-ctas">
                    <a href="#contact" class="co-cta-primary">
                        Apply for the Next Intake <svg class="icon" aria-hidden="true"><use href="#icon-arrow-right"></use></svg>
                    </a>
                    <a href="#contact" class="co-cta-ghost">
                        Explore Partnerships <svg class="icon" aria-hidden="true"><use href="#icon-arrow-right"></use></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CONTACT ===== -->
    <section class="co-contact" id="contact">
        <div class="container">
            <div class="co-contact-split">
                <div class="co-contact-prose">
                    <div class="co-section-kicker co-section-kicker--light">Get in Touch</div>
                    <h2 class="co-section-title co-section-title--light">Start Your European Journey</h2>
                    <p class="co-contact-sub">Whether you are applying as an individual or exploring a partnership for your institution, our team is here to guide you through the next steps.</p>
                    <ul class="co-contact-bullets">
                        <li>
                            <svg class="icon" aria-hidden="true"><use href="#icon-plane"></use></svg>
                            Apply for the next intake
                        </li>
                        <li>
                            <svg class="icon" aria-hidden="true"><use href="#icon-handshake"></use></svg>
                            Explore institutional partnerships
                        </li>
                        <li>
                            <svg class="icon" aria-hidden="true"><use href="#icon-globe"></use></svg>
                            Learn more about the program structure
                        </li>
                    </ul>
                </div>

                <div class="co-form-card">
                    <div class="co-form-title">Contact Our Team</div>
                    <div class="co-form-sub">Tell us about your goals and we'll get back to you.</div>
                    <form class="co-form" onsubmit="return false;">
                        <div class="co-form-row">
                            <div class="co-form-group">
                                <label for="co-name">Full Name <span style="color:var(--ci-orange)">*</span></label>
                                <input id="co-name" type="text" placeholder="Your full name" required autocomplete="name">
                            </div>
                            <div class="co-form-group">
                                <label for="co-org">Organisation</label>
                                <input id="co-org" type="text" placeholder="Company, university or institution" autocomplete="organization">
                            </div>
                        </div>
                        <div class="co-form-row">
                            <div class="co-form-group">
                                <label for="co-country">Country</label>
                                <input id="co-country" type="text" placeholder="Your country" autocomplete="country-name">
                            </div>
                            <div class="co-form-group">
                                <label for="co-email">Email <span style="color:var(--ci-orange)">*</span></label>
                                <input id="co-email" type="email" placeholder="your@email.com" required autocomplete="email">
                            </div>
                        </div>
                        <div class="co-form-group">
                            <label for="co-interest">I am interested in</label>
                            <select id="co-interest">
                                <option value="" disabled selected>Select your interest</option>
                                <option>Applying as an individual</option>
                                <option>Institutional partnership</option>
                                <option>Custom program for my organisation</option>
                                <option>General information</option>
                            </select>
                        </div>
                        <div class="co-form-group">
                            <label for="co-message">Message</label>
                            <textarea id="co-message" rows="4" placeholder="Tell us about your goals and what you're looking for..."></textarea>
                        </div>
                        <button type="submit" class="co-form-submit">
                            Send Message <svg class="icon" aria-hidden="true"><use href="#icon-arrow-right"></use></svg>
                        </button>
                        <div id="co-form-status" aria-live="polite" style="height:0;overflow:hidden;font-size:14px;margin-top:8px;"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="/js/corporate.js" defer></script>
@endpush
