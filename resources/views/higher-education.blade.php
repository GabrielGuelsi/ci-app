@extends('layouts.app')

@section('title', __('Higher Education in Ireland') . ' - CI Ireland')

@section('head')
    <link rel="preload" as="image" href="{{ asset('images/herodcu.webp') }}">
    @if (file_exists(public_path('build/manifest.json')))
        @vite('resources/css/higher-education.css')
    @else
        <link rel="stylesheet" href="/css/higher-education.css">
    @endif
@endsection

@section('styles')
@endsection

@section('banner')
    <!-- TOP BANNER -->
    <div class="top-banner">
        {{ __('Free one-to-one consultation for international students — find your perfect Irish university.') }}
        <button type="button" class="top-banner-cta" onclick="openModal()">{{ __('Book Now') }} <i class="fas fa-arrow-right"></i></button>
    </div>
@endsection

@section('nav')
    <!-- NAV -->
    <nav class="main-nav">
        <div class="container">
            <div class="nav-content">
                <a href="{{ $lr('home') }}" class="logo">
                    <img class="logo-image" src="{{ asset('images/logo-ci.png') }}" alt="CI Ireland">
                </a>
                <ul class="nav-links">
                    <li><a href="{{ $lr('about') }}">{{ __('About Us') }}</a></li>
                    <li><a href="{{ $lr('higher-education') }}" class="active">{{ __('Higher Education') }}</a></li>
                    <li><a href="{{ $lr('professional') }}">{{ __('CI Professional') }}</a></li>
                    <li><button onclick="openModal()" class="nav-cta" style="border:none;cursor:pointer;font-family:'Montserrat',sans-serif;">{{ __('Free Consultation') }}</button></li>
                </ul>

                <div class="nav-actions">
                    @include('partials.lang-toggle')
                    <button class="hamburger-btn" id="hamburgerBtn" aria-label="{{ __('Open menu') }}" aria-expanded="false">
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
        <li><a href="{{ $lr('about') }}">{{ __('About Us') }} <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="{{ $lr('higher-education') }}" class="active">{{ __('Higher Education') }} <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="{{ $lr('professional') }}">{{ __('CI Professional') }} <i class="fas fa-chevron-right"></i></a></li>
    </ul>
@endsection

@section('mobile-nav-footer')
    <div class="mobile-drawer-footer">
        @include('partials.lang-toggle')
        <button class="mobile-cta-btn" onclick="openModal()">{{ __('Free Consultation') }}</button>
    </div>
@endsection

@section('content')

    <!-- ===== HERO ===== -->
    <section class="he-hero">
        <div class="he-hero-left">
            <div class="he-kicker">
                <i class="fas fa-graduation-cap"></i> {{ __('Higher Education in Ireland') }}
            </div>

            <h1 class="he-hero-title">
                {!! __('Your Higher Education<br>Journey, <span>Guided Every</span><br>Step of the Way') !!}
            </h1>

            <p class="he-hero-sub">
                {{ __('Complete support for international students looking to study at universities and colleges in Ireland — with free, one-to-one consultancy at every stage.') }}
            </p>

            <!-- Academic ladder -->
            <div class="he-level-ladder">
                <span class="level-pill">{{ __('English') }}</span>

                <span class="level-pill">{{ __('Pathway') }}</span>

                <span class="level-pill">{{ __('Undergraduate') }}</span>

                <span class="level-pill">{{ __('Postgraduate & Masters') }}</span>
            </div>

            <div class="he-hero-ctas">
                <button onclick="openModal()" class="he-cta-primary" style="border:none;cursor:pointer;">
                    {{ __('Book Your Free 1-to-1 Consultation') }} <i class="fas fa-arrow-right"></i>
                </button>
                <a href="#partners" class="he-cta-secondary">
                    {{ __('Explore Colleges') }} <i class="fas fa-chevron-down"></i>
                </a>
            </div>

            <div class="he-trust-row">
                <span><i class="fas fa-check"></i> {{ __('Free of charge') }}</span>
                <span><i class="fas fa-check"></i> {{ __('One-to-one session') }}</span>
            </div>
        </div>

        <div class="he-hero-right">
            <img src="{{ asset('images/herodcu.webp') }}"
                 srcset="{{ asset('images/herodcu.webp') }} 1x, {{ asset('images/herodcu.webp') }} 2x"
                 alt="{{ __('DCU Campus, Dublin') }}"
                 fetchpriority="high"
                 loading="eager">
            <div class="he-hero-right-overlay"></div>

            <div class="he-stat-strip">
                <div class="he-stat-badge">
                    <span class="num">12+</span>
                    <span class="lbl">{{ __('Partner Colleges') }}</span>
                </div>
                <div class="he-stat-badge">
                    <span class="num">5K+</span>
                    <span class="lbl">{{ __('Students Placed') }}</span>
                </div>
            </div>

            <div class="he-consult-card">
                <div class="he-consult-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div>
                    <div class="he-consult-label">{{ __('Free 1-to-1 Consultation') }}</div>
                    <div class="he-consult-sub">{{ __('With a specialist advisor') }}</div>
                </div>
            </div>

            <div class="he-photo-caption">
                <i class="fas fa-map-pin"></i> {{ __('DCU Campus, Dublin') }}
            </div>
        </div>
    </section>

    <!-- ===== FIND YOUR STARTING POINT ===== -->
    <section class="he-pathways" id="pathways">
        <div class="container">
            <div class="he-section-header">
                <div class="he-section-kicker" style="color: var(--ci-orange);">{{ __('Academic Programmes') }}</div>
                <h2 class="he-section-title" style="color: var(--ci-purple);">{!! __('Find Your <span style="color: var(--ci-orange);">Starting Point</span>') !!}</h2>
                <p class="he-section-sub" style="color: var(--text-light);">{{ __('Your entry point depends on your existing qualifications. CI Ireland assesses your profile and places you in the right programme from day one.') }}</p>
            </div>

            <div class="pathway-flow">

                <!-- 01 English -->
                <div class="pathway-item">
                    <div class="pathway-timeline">
                        <div class="pathway-num">01</div>
                        <div class="pathway-connector"></div>
                    </div>
                    <div class="pathway-card">
                        <div class="pathway-entry-tag"><i class="fas fa-user-circle"></i> {{ __('Entry point if you need to develop your English') }}</div>
                        <h3 class="pathway-name">{{ __('English with Academic Purpose') }}</h3>
                        <p class="pathway-desc">{{ __('An intensive English course for students looking to enter universities in Ireland. The programme develops the linguistic skills required for international academic environments and prepares students for proficiency exams.') }}</p>
                    </div>
                </div>

                <!-- 02 Pathway -->
                <div class="pathway-item">
                    <div class="pathway-timeline">
                        <div class="pathway-num">02</div>
                        <div class="pathway-connector"></div>
                    </div>
                    <div class="pathway-card">
                        <div class="pathway-entry-tag"><i class="fas fa-user-circle"></i> {{ __('Entry point if you need to build your academic foundation') }}</div>
                        <h3 class="pathway-name">{{ __('Pathway Programs') }}</h3>
                        <p class="pathway-desc">{{ __('Preparatory programmes that help students develop the academic skills and knowledge needed before entering an undergraduate degree at an Irish university or college.') }}</p>
                    </div>
                </div>

                <!-- 03 Undergraduate -->
                <div class="pathway-item">
                    <div class="pathway-timeline">
                        <div class="pathway-num">03</div>
                        <div class="pathway-connector"></div>
                    </div>
                    <div class="pathway-card">
                        <div class="pathway-entry-tag"><i class="fas fa-user-circle"></i> {{ __('Entry point if you are ready for university-level study') }}</div>
                        <h3 class="pathway-name">{{ __('Undergraduate Programs') }}</h3>
                        <p class="pathway-desc">{{ __('Full degree programmes offered by internationally recognised universities and colleges across Ireland — from 3 to 4-year bachelor degrees across a wide range of disciplines.') }}</p>
                    </div>
                </div>

                <!-- 04 Postgraduate & Masters -->
                <div class="pathway-item pathway-item--last">
                    <div class="pathway-timeline">
                        <div class="pathway-num">04</div>
                    </div>
                    <div class="pathway-card">
                        <div class="pathway-entry-tag"><i class="fas fa-user-circle"></i> {{ __('Entry point if you already hold an undergraduate degree') }}</div>
                        <h3 class="pathway-name">{{ __('Postgraduate & Masters') }}</h3>
                        <p class="pathway-desc">{{ __('Specialisation programmes (Postgraduate Diploma) and Masters degrees offered by internationally recognised higher education institutions — the natural next step for graduates looking to advance their careers.') }}</p>
                    </div>
                </div>

            </div>

            <!-- Bottom CTA -->
            <div class="pathway-cta-card">
                <div class="pathway-cta-icon"><i class="fas fa-compass"></i></div>
                <div class="pathway-cta-text">
                    <h4>{{ __('Not sure where you fit?') }}</h4>
                    <p>{{ __('Our advisors will assess your profile and guide you to the right starting point — at no cost.') }}</p>
                </div>
                <button onclick="openModal()" class="he-cta-primary" style="border:none;cursor:pointer;white-space:nowrap;">
                    {{ __('Talk to an Advisor') }} <i class="fas fa-arrow-right"></i>
                </button>
            </div>

        </div>
    </section>

    <!-- ===== HOW IT WORKS (SCROLL STACK) ===== -->
    <section class="he-process" id="process">
        <div class="scroll-stack-outer">
            <div class="scroll-stack-sticky">

                <!-- Header stays visible while scrolling through cards -->
                <div class="stack-inner-header">
                    <div class="he-section-kicker">{{ __('How It Works') }}</div>
                    <h2 class="he-section-title">{!! __('Your Journey to an <span>Irish College</span>') !!}</h2>
                    <p class="he-section-sub">{{ __('A simple, guided process — we handle the complexity so you can focus on your future.') }}</p>
                </div>

                <div class="stack-cards-wrap">

                    <!-- Step 1 -->
                    <div class="step-card" data-step="1">
                        <div class="step-left">
                            <div class="step-number">01</div>
                            <div class="step-badge">{{ __('Step 01') }}</div>
                            <div class="step-icon-wrap"><i class="fas fa-comments"></i></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">{{ __('Get in Touch') }}</h3>
                            <p class="step-desc">{{ __('Complete our simple form and a specialist advisor will reach out to schedule your free one-to-one consultation.') }}</p>
                            <ul class="step-bullets">


                            </ul>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step-card" data-step="2">
                        <div class="step-left">
                            <div class="step-number">02</div>
                            <div class="step-badge">{{ __('Step 02') }}</div>
                            <div class="step-icon-wrap"><i class="fas fa-search"></i></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">{{ __('Understanding Your Profile') }}</h3>
                            <p class="step-desc">{{ __('Our team asks the right questions to understand your background and goals — so we can place you in the perfect programme.') }}</p>
                            <ul class="step-bullets">
                                <li>{{ __('Academic background review') }}</li>
                                <li>{{ __('Goals, budget and visa requirements') }}</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="step-card" data-step="3">
                        <div class="step-left">
                            <div class="step-number">03</div>
                            <div class="step-badge">{{ __('Step 03') }}</div>
                            <div class="step-icon-wrap"><i class="fas fa-file-alt"></i></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">{{ __('We Handle Everything') }}</h3>
                            <p class="step-desc">{{ __('We submit the full application on your behalf and keep you updated at every stage — no stress, no confusion.') }}</p>
                            <ul class="step-bullets">
                                <li>{{ __('Full application submitted by our team') }}</li>
                                <li>{{ __('Real-time updates throughout') }}</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="step-card" data-step="4">
                        <div class="step-left">
                            <div class="step-number">04</div>
                            <div class="step-badge">{{ __('Step 04') }}</div>
                            <div class="step-icon-wrap"><i class="fas fa-trophy"></i></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">{{ __('College Acceptance!') }}</h3>
                            <p class="step-desc">{{ __('Your Irish journey begins, and our team remains by your side with visa guidance, academic follow-ups, and ongoing support whenever you need it.') }}</p>
                            <ul class="step-bullets">
                                <li>{{ __('Course enrolment completed') }}</li>
                                <li>{{ __('Dedicated support whenever you need it') }}</li>
                            </ul>
                        </div>
                    </div>

                </div>

                <!-- Progress dots -->
                <div class="stack-progress">
                    <div class="stack-dot active" data-dot="0"></div>
                    <div class="stack-dot" data-dot="1"></div>
                    <div class="stack-dot" data-dot="2"></div>
                    <div class="stack-dot" data-dot="3"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== PARTNER INSTITUTIONS ===== -->
    <section class="he-partners" id="partners">
        <div class="container">
            <div class="he-section-header">
                <div class="he-section-kicker">{{ __('Our Network') }}</div>
                <h2 class="he-section-title" style="color: var(--ci-purple);">{!! __('Partner <span>Institutions</span>') !!}</h2>
                <p class="he-section-sub" style="color: var(--text-light);">{{ __("We work with Ireland's leading universities and colleges to find the perfect fit for every student profile.") }}</p>
            </div>

            <div class="partners-grid">

                <!-- TU Dublin -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #3a1060, #5a2090);">
                        <img class="campus-photo" src="{{ asset('images/campus/tud.webp') }}" alt="" loading="lazy">
                        <div class="college-partner-badge"><span class="partner-dot"></span> {{ __('Partner') }}</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/Tudublin.jpg') }}" alt="TU Dublin" loading="lazy">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">TU Dublin</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> {{ __('Dublin, Ireland') }}</p>
                        <p class="college-desc">Ireland's first Technological University, offering a wide range of undergraduate and postgraduate programmes across multiple campuses in Dublin.</p>
                    </div>
                </div>

                <!-- DCU -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #0a2a6a, #1a4a9a);">
                        <img class="campus-photo" src="{{ asset('images/campus/dcu.webp') }}" alt="" loading="lazy">
                        <div class="college-partner-badge"><span class="partner-dot"></span> {{ __('Partner') }}</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/DCU.webp') }}" alt="Dublin City University" loading="lazy">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">Dublin City University</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> {{ __('Dublin, Ireland') }}</p>
                        <p class="college-desc">A young, dynamic university known for innovation, enterprise and research, consistently ranked among Ireland's top universities.</p>
                    </div>
                </div>

                <!-- NCI -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #0a4a3a, #1a6a54);">
                        <img class="campus-photo" src="{{ asset('images/campus/nci.webp') }}" alt="" loading="lazy">
                        <div class="college-partner-badge"><span class="partner-dot"></span> {{ __('Partner') }}</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/nci.webp') }}" alt="National College of Ireland" loading="lazy">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">National College of Ireland</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> {{ __('Dublin, Ireland') }}</p>
                        <p class="college-desc">Specialising in business and technology programmes, NCI offers a personalised learning environment in the heart of Dublin's IFSC.</p>
                    </div>
                </div>

                <!-- Griffith -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #6a1a0a, #9a2a10);">
                        <img class="campus-photo" src="{{ asset('images/campus/griffith.webp') }}" alt="" loading="lazy">
                        <div class="college-partner-badge"><span class="partner-dot"></span> {{ __('Partner') }}</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/Griffith.jpg') }}" alt="Griffith College" loading="lazy">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">Griffith College</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> {{ __('Dublin, Ireland') }}</p>
                        <p class="college-desc">One of Ireland's largest independent third-level colleges, offering a broad range of degrees, postgraduate and professional programmes.</p>
                    </div>
                </div>

                <!-- DBS -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #0a1a5a, #1a2a8a);">
                        <img class="campus-photo" src="{{ asset('images/campus/dbs.webp') }}" alt="" loading="lazy">
                        <div class="college-partner-badge"><span class="partner-dot"></span> {{ __('Partner') }}</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/DBS.png') }}" alt="Dublin Business School" loading="lazy">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">Dublin Business School</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> {{ __('Dublin, Ireland') }}</p>
                        <p class="college-desc">Dublin Business School is an independent third-level college, offering market focused programmes across diverse areas.</p>
                    </div>
                </div>

                <!-- City Colleges -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #3a0a5a, #5a1a7a);">
                        <img class="campus-photo" src="{{ asset('images/campus/citycolleges.webp') }}" alt="" loading="lazy">
                        <div class="college-partner-badge"><span class="partner-dot"></span> {{ __('Partner') }}</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/citycolleges.png') }}" alt="City Colleges" loading="lazy">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">City Colleges</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> {{ __('Dublin, Ireland') }}</p>
                        <p class="college-desc">Text here about city college.</p>
                    </div>
                </div>

                <!-- Dorset -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #0a3a4a, #1a5a6a);">
                        <img class="campus-photo" src="{{ asset('images/campus/dorset.webp') }}" alt="" loading="lazy">
                        <div class="college-partner-badge"><span class="partner-dot"></span> {{ __('Partner') }}</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/dorset.png') }}" alt="Dorset College" loading="lazy">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">Dorset College</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> {{ __('Dublin, Ireland') }}</p>
                        <p class="college-desc">A modern college in the heart of Dublin offering programmes in business, computing and hospitality in a vibrant, multicultural setting.</p>
                    </div>
                </div>

                <!-- ICD -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #4a2a0a, #6a4010);">
                        <img class="campus-photo" src="{{ asset('images/campus/icd.webp') }}" alt="" loading="lazy">
                        <div class="college-partner-badge"><span class="partner-dot"></span> {{ __('Partner') }}</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/ICD.png') }}" alt="ICD" loading="lazy">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">ICD</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> {{ __('Dublin, Ireland') }}</p>
                        <p class="college-desc">Texto sobre a ICD</p>
                    </div>
                </div>

                <!-- Independent College -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #1a3a0a, #2a5a15);">
                        <img class="campus-photo" src="{{ asset('images/campus/independent.webp') }}" alt="" loading="lazy">
                        <div class="college-partner-badge"><span class="partner-dot"></span> {{ __('Partner') }}</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/independent.png') }}" alt="Independent College" loading="lazy">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">Independent College</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> {{ __('Dublin, Ireland') }}</p>
                        <p class="college-desc">Offering a range of accounting, marketing and bussiness programmes in a supportive and student-centred learning environment.</p>
                    </div>
                </div>

                <!-- Holmes -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #3a0a1a, #5a1a30);">
                         <img class="campus-photo" src="{{ asset('images/campus/holmes.webp') }}" alt="" loading="lazy">
                        <div class="college-partner-badge"><span class="partner-dot"></span> {{ __('Partner') }}</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/holmes.png') }}" alt="Holmes College" loading="lazy">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">Holmes Institute Dublin</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> {{ __('Dublin, Ireland') }}</p>
                        <p class="college-desc">An international college offering higher education programmes in business and computing in a diverse learning community.</p>
                    </div>
                </div>

                <!-- Galway Business School -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #0a1a4a, #1a2a6a);">
                         <img class="campus-photo" src="{{ asset('images/campus/galway.webp') }}" alt="" loading="lazy">
                        <div class="college-partner-badge"><span class="partner-dot"></span> {{ __('Partner') }}</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/galwaybss.jpg') }}" alt="Galway Business School" loading="lazy">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">Galway Business School</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> {{ __('Galway, Ireland') }}</p>
                        <p class="college-desc">Offering business and management programmes in the vibrant city of Galway on Ireland's stunning west coast.</p>
                    </div>
                </div>

                <!-- IBAT -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #2a0a4a, #420a6a);">
                         <img class="campus-photo" src="{{ asset('images/campus/ibat.webp') }}" alt="" loading="lazy">
                        <div class="college-partner-badge"><span class="partner-dot"></span> {{ __('Partner') }}</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/ibat.png') }}" alt="IBAT College Dublin" loading="lazy">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">IBAT College Dublin</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> {{ __('Dublin, Ireland') }}</p>
                        <p class="college-desc">A Dublin-based college focused on business, accounting and technology programmes for domestic and international students.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== BOTTOM CTA ===== -->
    <section class="he-bottom-cta" id="consultation">
        <div class="container">
            <div class="he-bottom-cta-inner">
                <h2>{!! __('Ready to Start Your <span>Irish Adventure?</span>') !!}</h2>
                <p>{{ __('Book your one-to-one consultation with one of our specialist advisors. Honest guidance.') }}</p>
                <button onclick="openModal()" class="he-cta-primary" style="border:none;cursor:pointer;">
                    {{ __('Book Your Consultation') }} <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- ===== Consultation Modal ===== -->
    <div class="modal-overlay" id="consultModal">
        <div class="modal-box">
            <button class="modal-close" onclick="closeModal()" aria-label="{{ __('Close') }}"><i class="fas fa-times"></i></button>
            <div class="modal-header">
                <div class="modal-kicker">{{ __('Free Consultation') }}</div>
                <h2 class="modal-title">{{ __('Start Your Academic Planning') }}</h2>
                <p class="modal-sub">{{ __('Fill in your details and one of our advisors will get in touch.') }}</p>
            </div>
            <form class="modal-form" onsubmit="return false;">
                <div class="form-row">
                    <div class="form-group">
                        <label for="he-name">{{ __('Full Name') }} <span class="req">*</span></label>
                        <input id="he-name" type="text" placeholder="{{ __('Your full name') }}" required autocomplete="name">
                    </div>
                    <div class="form-group">
                        <label for="he-email">{{ __('Email') }} <span class="req">*</span></label>
                        <input id="he-email" type="email" placeholder="your@email.com" required autocomplete="email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="he-phone">{{ __('Phone / WhatsApp') }} <span class="req">*</span></label>
                        <input id="he-phone" type="tel" placeholder="+353 83 123 4567" required autocomplete="tel">
                    </div>
                    <div class="form-group">
                        <label for="he-visa">{{ __('Visa Type') }} <span class="req">*</span></label>
                        <select id="he-visa" required>
                            <option value="" disabled selected>{{ __('Select visa type') }}</option>
                            <option>{{ __('EU Passport') }}</option>
                            <option>Stamp 2</option>
                            <option>Stamp 4</option>
                            <option>Stamp 1/1G</option>
                            <option>{{ __('Other/Not sure') }}</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="modal-submit">
                    {{ __('Request Free Consultation') }} <i class="fas fa-arrow-right"></i>
                </button>
                <div id="he-form-status" aria-live="polite" style="height:0;overflow:hidden;font-size:14px;margin-top:8px;"></div>
            </form>
            <div class="modal-trust">
                <span><i class="fas fa-check"></i> {{ __('Free') }}</span>
                <span><i class="fas fa-check"></i> {{ __('One-to-one') }}</span>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script src="/js/higher-education.js" defer></script>
@endpush
