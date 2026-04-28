@extends('layouts.app')

@section('title', 'CI Ireland - Home Page')

@section('head')
    <link rel="preload" as="image" href="{{ asset('images/hero-higher-education.webp') }}">
    @if (file_exists(public_path('build/manifest.json')))
        @vite('resources/css/welcome.css')
    @else
        <link rel="stylesheet" href="/css/welcome.css">
    @endif
@endsection

@section('styles')
@endsection

@section('banner')
    <div class="top-banner">
        {{ __('International student ? Get free advice from our experts to find the perfect course and university in Ireland.') }}
        <a href="#">{{ __('Learn more') }} <i class="fas fa-arrow-right"></i></a>
    </div>
@endsection

@section('secondary-bar')
    <div class="secondary-bar">
        <div class="container">
            <div class="secondary-content">
                <div class="secondary-left">
                    <a href="#"><i class="fas fa-globe"></i> {{ __('Locations') }}</a>
                </div>
                <div class="secondary-right">
                    <i class="fas fa-headset"></i>
                    <span>{{ __('Admissions Team') }} +353 83 083 7734 / +353 86 014 2313</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('nav')
    <nav class="main-nav">
        <div class="container">
            <div class="nav-content">
                <a href="{{ $lr('home') }}" class="logo">
                    <img class="logo-image" src="{{ asset('images/logo-ci.png') }}" alt="CI Exchange">
                </a>

                <ul class="nav-links">
                    <li><a href="{{ $lr('about') }}">{{ __('About Us') }}</a></li>
                    <li><a href="{{ $lr('higher-education') }}">{{ __('Higher Education') }}</a></li>
                    <li><a href="{{ $lr('professional') }}">{{ __('CI Professional') }}</a></li>
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
        <li><a href="{{ $lr('higher-education') }}">{{ __('Higher Education') }} <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="{{ $lr('professional') }}">{{ __('CI Professional') }} <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="#contact">{{ __('Get in Touch') }} <i class="fas fa-chevron-right"></i></a></li>
    </ul>
@endsection

@section('mobile-nav-footer')
    <div class="mobile-drawer-footer">
        @include('partials.lang-toggle')
        <button class="mobile-cta-btn" onclick="window.location='#contact'">{{ __('Get in Touch') }}</button>
    </div>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-bg" style="background-image: url('{{ asset('images/hero-higher-education.webp') }}');" aria-hidden="true" role="presentation"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <div class="hero-label animate-in">{{ __('Study in Ireland') }}</div>
            <h1 class="hero-title animate-in" style="animation-delay: 0.1s">
                <span class="hero-title-white">{{ __('Higher') }}</span>
                <span class="hero-title-orange">{{ __('Education') }}</span>
            </h1>
            <h2 class="hero-subtitle animate-in" style="animation-delay: 0.2s">{{ __('In Ireland') }}</h2>
        </div>

        <div class="slider-controls">
            <div class="slide-indicators">
                <div class="slide-item active" onclick="changeSlide(0)">
                    <div class="slide-number">01</div>
                    <div class="slide-name">{{ __('Higher Education') }}</div>
                </div>
                <div class="slide-item" onclick="changeSlide(1)">
                    <div class="slide-number">02</div>
                    <div class="slide-name">{{ __('CI Professional') }}</div>
                </div>
            </div>

            <div class="slider-arrows">
                <button class="arrow-btn" onclick="prevSlide()">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="arrow-btn" onclick="nextSlide()">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- CI Ireland Numbers + Benefits -->
    <section class="ci-impact">
        <div class="container">
            <div class="impact-header">
                <span class="impact-label">{{ __('Why CI Ireland') }}</span>
                <h2 class="impact-title">{{ __('Numbers and Benefits of Choosing CI') }}</h2>
            </div>

            <div class="impact-grid">
                <article class="impact-card impact-card-xl impact-highlight">
                    <div class="impact-card-number">37</div>
                    <h3>{{ __('37 Years in the Market') }}</h3>
                    <p>{{ __('Proven experience helping international students plan their study journey in Ireland.') }}</p>
                </article>

                <article class="impact-card impact-card-md">
                    <div class="impact-card-number">11000+</div>
                    <h3>{{ __('Over 5,000 Students Placed') }}</h3>
                    <p>{{ __('A strong track record of successful applications across partner institutions.') }}</p>
                </article>

                <article class="impact-card impact-card-md">
                    <div class="impact-card-number">1200+</div>
                    <h3>{{ __('Over 1,200 Courses in Our Portfolio') }}</h3>
                    <p>{{ __('Program options for different profiles, academic goals, and English levels.') }}</p>
                </article>

                <article class="impact-card impact-card-wide">
                    <h3>{{ __('End to End Support') }}</h3>
                    <p>{{ __('From the first consultation through visa support to your career in Ireland. One team handling every step.') }}</p>
                </article>

                <article class="impact-card impact-card-wide">
                    <h3>{!! __('Higher Education & Professional Pathways') !!}</h3>
                    <p>{{ __('Dedicated tracks for students applying to Irish universities and qualified professionals seeking placement across 15+ sectors.') }}</p>
                </article>

                <article class="impact-card impact-card-wide">
                    <h3>{{ __('Built for Life in Ireland') }}</h3>
                    <p>{{ __('Language preparation, career coaching and longer term residency support. Designed for outcomes that last.') }}</p>
                </article>
            </div>
        </div>
    </section>

    <!-- Trusted By &mdash; Logo Loop -->
    <section class="trusted-by" aria-label="{{ __('Trusted By') }}">
        <div class="container">
            <div class="trusted-by-header">
                <div class="trusted-by-label">{{ __('Trusted By') }}</div>
                <h2 class="trusted-by-title">{!! __('Colleges & <span>Corporate Partners</span>') !!}</h2>
            </div>
        </div>

        <div class="marquee-wrapper">
            <div class="marquee-track" id="marqueeTrack">

                @php
                    $partnerColleges = [
                        'National College of Ireland',
                        'City Colleges',
                        'Dublin Business School',
                        'Dorset College',
                        'Griffith College',
                        'Holmes Institute Dublin',
                        'IBAT College',
                        'TU Dublin',
                        'Dublin City University',
                        'Independent College Dublin',
                        'ICD Business School',
                        'Galway Business School',
                    ];
                @endphp

                <!-- List A -->
                <ul class="marquee-list" aria-label="Partner colleges">
                    @foreach ($partnerColleges as $college)
                        <li class="marquee-item">
                            <span class="marquee-name">{{ $college }}</span>
                            <span class="marquee-sep" aria-hidden="true"></span>
                        </li>
                    @endforeach
                </ul>

                <!-- List B &mdash; duplicate for seamless loop -->
                <ul class="marquee-list" aria-hidden="true">
                    @foreach ($partnerColleges as $college)
                        <li class="marquee-item">
                            <span class="marquee-name">{{ $college }}</span>
                            <span class="marquee-sep" aria-hidden="true"></span>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </section>

    @php
        $pathwayStages = [
            [
                'num'   => '01',
                'title' => __('English'),
                'sub'   => __('Academic fluency'),
                'desc'  => __('Intensive English with Academic Purpose — calibrated for the classroom, the interview, and the workplace.'),
                'cta'   => 'higher-education',
                'detail' => [
                    ['k' => __('Duration'), 'v' => __('6–25 weeks'),  's' => __('Flexible start dates')],
                    ['k' => __('Outcome'),  'v' => __('B2 / C1'),     's' => __('IELTS 6.5+ equivalent')],
                    ['k' => __('Format'),   'v' => __('In-person'),   's' => __('Dublin · Galway')],
                ],
            ],
            [
                'num'   => '02',
                'title' => __('University'),
                'sub'   => __("Bachelor or Master's"),
                'desc'  => __("Placement across Ireland's top universities and colleges — undergraduate, postgraduate, and foundation pathways."),
                'cta'   => 'higher-education',
                'detail' => [
                    ['k' => __('Partners'),   'v' => __('12+ colleges'),     's' => __('Nationwide coverage')],
                    ['k' => __('Programmes'), 'v' => __('BA · MSc · MBA'),   's' => __('Across 15 sectors')],
                    ['k' => __('Support'),    'v' => __('Concierge'),        's' => __('End-to-end application')],
                ],
            ],
            [
                'num'   => '03',
                'title' => __('Career'),
                'sub'   => __('Employability layer'),
                'desc'  => __('CV, LinkedIn, interview coaching and matched introductions to employers in our 500+ partner network.'),
                'cta'   => 'professional',
                'detail' => [
                    ['k' => __('Coaching'), 'v' => __('1-to-1'),     's' => __('Sector specialists')],
                    ['k' => __('Network'),  'v' => __('500+ firms'), 's' => __('B2B partnerships')],
                    ['k' => __('Fit rate'), 'v' => __('4 in 5'),     's' => __('Matched within 90 days')],
                ],
            ],
            [
                'num'   => '04',
                'title' => __('Work'),
                'sub'   => __('Long-term residency'),
                'desc'  => __('Work permits, Stamp transitions and long-stay strategy — so studying here becomes building a life here.'),
                'cta'   => 'professional',
                'detail' => [
                    ['k' => __('Permits'),   'v' => __('Critical Skills'),     's' => __('Legal handling included')],
                    ['k' => __('Pathway'),   'v' => __('Stamp 2 → 1G → 4'),    's' => __('Guided transitions')],
                    ['k' => __('Retention'), 'v' => __('78%'),                 's' => __('Remain in Ireland post-study')],
                ],
            ],
        ];
    @endphp

    <!-- The Pathway -->
    <section class="pathway-section" id="programs">
        <div class="container">
            <div class="pathway-head">
                <div class="pathway-title-wrap">
                    <span class="pathway-eyebrow">{{ __('The Pathway') }}</span>
                    <h2 class="pathway-title">{!! __('A four-stage journey to <em>life</em> in Ireland.') !!}</h2>
                </div>
                <p class="pathway-lead">{{ __("We don't place you in a course. We engineer a trajectory — sequencing language, study, experience and residency so each step compounds into the next.") }}</p>
            </div>

            <div class="pathway-stage" data-stages='@json($pathwayStages)'>
                <div class="pathway-track" role="tablist" aria-label="{{ __('Pathway stages') }}">
                    <div class="pathway-line" aria-hidden="true"></div>
                    <div class="pathway-progress" aria-hidden="true"></div>
                    @foreach ($pathwayStages as $i => $s)
                        <button class="p-step{{ $i === 0 ? ' active' : '' }}" type="button" role="tab" data-stage="{{ $i }}" aria-selected="{{ $i === 0 ? 'true' : 'false' }}">
                            <span class="p-dot" aria-hidden="true"></span>
                            <span class="p-num">{{ __('Stage') }} {{ $s['num'] }} · {{ $s['sub'] }}</span>
                            <span class="p-ttl">{{ $s['title'] }}</span>
                            <span class="p-desc">{{ $s['desc'] }}</span>
                        </button>
                    @endforeach
                </div>

                <div class="p-step-detail" role="tabpanel" aria-live="polite">
                    @foreach ($pathwayStages[0]['detail'] as $d)
                        <div>
                            <div class="p-detail-key">{{ $d['k'] }}</div>
                            <div class="p-detail-val">{{ $d['v'] }}<small>{{ $d['s'] }}</small></div>
                        </div>
                    @endforeach
                </div>

                <div class="pathway-cta-row">
                    <a href="{{ $lr('higher-education') }}" class="pathway-cta" data-cta>
                        <span data-cta-label>{{ __('Explore Higher Education') }}</span>
                        <span class="arrow" aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @php
        $quizData = [
            'lead' => __('Before we talk about programmes, we map where you actually stand. The assessment takes two minutes and returns a personalised recommendation.'),
            'cta'  => __('Begin Assessment'),
            'teaser' => [
                'meta' => __('Question 01 of 04'),
                'time' => __('~2 min'),
                'q'    => __('What best describes where you are today?'),
                'opts' => [
                    __('I need to improve my English before anything academic'),
                    __('I have English but need an academic route to a university'),
                    __("I'm ready for a Bachelor's or Master's programme"),
                    __("I'm a qualified professional looking for work in Ireland"),
                ],
            ],
            'questions' => [
                [
                    'q'    => __('What best describes where you are today?'),
                    'opts' => [
                        ['t' => __('I need to improve my English first'),                        'lean' => 'he',  'w' => 1],
                        ['t' => __('I have English but need an academic route to a university'), 'lean' => 'he',  'w' => 1],
                        ['t' => __("I'm ready for a Bachelor's or Master's programme"),          'lean' => 'he',  'w' => 1],
                        ['t' => __("I'm a qualified professional looking for work in Ireland"),  'lean' => 'pro', 'w' => 2],
                    ],
                ],
                [
                    'q'    => __("What's your primary goal for Ireland?"),
                    'opts' => [
                        ['t' => __('A degree, then return home'),            'lean' => 'he',  'w' => 1],
                        ['t' => __('A degree and career here'),              'lean' => 'he',  'w' => 1],
                        ['t' => __('Work immediately, long-term residency'), 'lean' => 'pro', 'w' => 2],
                        ['t' => __('Not yet decided'),                       'lean' => null,  'w' => 0],
                    ],
                ],
                [
                    'q'    => __('What sector feels right for you?'),
                    'opts' => [
                        ['t' => __('Technology & Engineering'),     'lean' => null, 'w' => 0],
                        ['t' => __('Business & Finance'),           'lean' => null, 'w' => 0],
                        ['t' => __('Healthcare'),                   'lean' => null, 'w' => 0],
                        ['t' => __('Creative / Marketing / Other'), 'lean' => null, 'w' => 0],
                    ],
                ],
                [
                    'q'    => __('When would you realistically start?'),
                    'opts' => [
                        ['t' => __('In the next 3 months'), 'lean' => null, 'w' => 0],
                        ['t' => __('In 3–6 months'),        'lean' => null, 'w' => 0],
                        ['t' => __('In 6–12 months'),       'lean' => null, 'w' => 0],
                        ['t' => __('12+ months away'),      'lean' => null, 'w' => 0],
                    ],
                ],
            ],
            'recommendations' => [
                'he' => [
                    'badge'   => __('Recommended pathway'),
                    'title'   => __('Higher Education'),
                    'lead'    => __('We recommend starting with our Higher Education pathway — degree placement across 12+ partner institutions, with English and visa support handled end-to-end.'),
                    'bullets' => [
                        __("Pathway, Bachelor's or Master's programmes"),
                        __('Concierge handling of the full application'),
                        __('Career layer activated from your second year'),
                    ],
                    'route' => 'higher-education',
                    'label' => __('Explore Higher Education'),
                ],
                'pro' => [
                    'badge'   => __('Recommended pathway'),
                    'title'   => __('CI Professional'),
                    'lead'    => __('We recommend our Professional pathway — sector-matched placement across 15+ sectors with permit and Stamp transitions handled by in-house counsel.'),
                    'bullets' => [
                        __('Credential mapping to the Irish market'),
                        __('Direct intros across 500+ partner employers'),
                        __('End-to-end work permit and Stamp handling'),
                    ],
                    'route' => 'professional',
                    'label' => __('Explore Professional'),
                ],
            ],
        ];
    @endphp

    <!-- Diagnostic / Assessment -->
    <section class="assessment-section" id="diagnostic">
        <div class="container">
            <div class="assessment-grid">
                <div class="assessment-copy">
                    <span class="assessment-eyebrow">{{ __('Diagnostic') }}</span>
                    <h2 class="assessment-title">{!! __('Quick questions. <em>One clear pathway.</em>') !!}</h2>
                    <p class="assessment-lead">{{ $quizData['lead'] }}</p>
                    <div class="assessment-cta-row">
                        <button type="button" class="btn-assessment-primary" data-quiz-open>
                            {{ $quizData['cta'] }} <span class="arrow" aria-hidden="true">→</span>
                        </button>
                    </div>
                </div>

                <button type="button" class="quiz-teaser" data-quiz-open aria-label="{{ __('Open diagnostic') }}">
                    <div class="quiz-teaser-head">
                        <span>{{ $quizData['teaser']['meta'] }}</span>
                        <span>{{ $quizData['teaser']['time'] }}</span>
                    </div>
                    <div class="quiz-q">{{ $quizData['teaser']['q'] }}</div>
                    <div class="quiz-opts" aria-hidden="true">
                        @foreach ($quizData['teaser']['opts'] as $i => $o)
                            <span class="quiz-opt">
                                <span>{{ $o }}</span>
                                <span class="qkey">{{ chr(65 + $i) }}</span>
                            </span>
                        @endforeach
                    </div>
                    <div class="quiz-progress" aria-hidden="true">
                        <span class="done"></span><span></span><span></span><span></span>
                    </div>
                </button>
            </div>
        </div>
    </section>

    <!-- Social Proof / Testimonials -->
    <section class="testimonials" id="testimonials">
        <div class="container">

            <div class="testimonials-header">
                <div class="testimonials-label">{{ __('Success Stories') }}</div>
                <h2 class="testimonials-title">{{ __('Real Students, Real Results') }}</h2>
                <p class="testimonials-subtitle">{{ __('See how our advisors helped hundreds of students achieve their dream of studying in Ireland.') }}</p>
            </div>

            <div class="testimonials-grid">

                <!-- Card 1 - Aliny -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        <img src="{{ asset('students/alinystudent.webp') }}" alt="Yago & Tiago Gontijo with Aliny" style="object-position: center 60%;" loading="lazy">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p class="testimonial-quote">{{ __('So much gratitude for clearing up all our doubts and for all the support throughout our entire process! Highly recommended!') }}</p>
                        <div class="testimonial-student">
                            <div class="student-name">Yago &amp; Tiago Gontijo</div>
                            <div class="student-course">{{ __('BA in Business — Independent College') }}</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/aliny.webp') }}" alt="Aliny" class="consultant-photo" loading="lazy">
                            <div class="consultant-info">
                                <div class="consultant-name">Aliny</div>
                                <div class="consultant-badge">
                                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                    {{ __('Verified Advisor') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 - Albert -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        <img src="{{ asset('students/albertstudent.webp') }}" alt="Albert's student" style="object-position: center center;" loading="lazy">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p class="testimonial-quote">{{ __('Incredible support and dedication throughout every step of my application process. Moving to Ireland was a dream — Albert made it real!') }}</p>
                        <div class="testimonial-student">
                            <div class="student-name">Juan Fernando</div>
                            <div class="student-course">{{ __('Higher Diploma in Science in Data Analytics - City colleges') }}</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/albert.webp') }}" alt="Albert" class="consultant-photo" loading="lazy">
                            <div class="consultant-info">
                                <div class="consultant-name">Albert</div>
                                <div class="consultant-badge">
                                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                    {{ __('Verified Advisor') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 - Gabriel -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        <img src="{{ asset('students/gabrielstudent.webp') }}" alt="Gabriel's student" style="object-position: center center;" loading="lazy">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p class="testimonial-quote">{{ __("Professional, caring and always available. My dream of studying in Ireland became a reality thanks to Gabriel's guidance!") }}</p>
                        <div class="testimonial-student">
                            <div class="student-name">Bruno Silva</div>
                            <div class="student-course">{{ __('Cybersecurity — City Colleges') }}</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/gabriel.webp') }}" alt="Gabriel" class="consultant-photo" loading="lazy">
                            <div class="consultant-info">
                                <div class="consultant-name">Gabriel</div>
                                <div class="consultant-badge">
                                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                    {{ __('Verified Advisor') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 4 - Romario -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        <img src="{{ asset('students/romariostudent.webp') }}" alt="Romario's student" style="object-position: center center;" loading="lazy">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p class="testimonial-quote">Every detail of my application was handled with precision and warmth. Outstanding service &mdash; I could not have done it without Romario!</p>
                        <div class="testimonial-student">
                            <div class="student-name">Elis</div>
                            <div class="student-course">Higher Certificate in Sound Engineering and Music Prodution - DBS</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/romario.webp') }}" alt="Romario" class="consultant-photo" loading="lazy">
                            <div class="consultant-info">
                                <div class="consultant-name">Romario</div>
                                <div class="consultant-badge">
                                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                    {{ __('Verified Advisor') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 5 - Talita -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        <img src="{{ asset('students/talitastudent.webp') }}" alt="Talita's student" style="object-position: center center;" loading="lazy">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p class="testimonial-quote">From my very first question to my arrival in Dublin, I felt fully supported every step of the way. Talita is simply the best!</p>
                        <div class="testimonial-student">
                            <div class="student-name">Yari Yolibet</div>
                            <div class="student-course">BA in Business - Holmes Institute</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/talita.webp') }}" alt="Talita" class="consultant-photo" loading="lazy">
                            <div class="consultant-info">
                                <div class="consultant-name">Talita</div>
                                <div class="consultant-badge">
                                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                    {{ __('Verified Advisor') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 6 - Wagner -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        <img src="{{ asset('students/wagnerstudent.webp') }}" alt="Wagner's student" style="object-position: center center;" loading="lazy">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p class="testimonial-quote">Wagner's knowledge of Irish education is truly unmatched. He made the whole process smooth and stress-free. Best decision I ever made!</p>
                        <div class="testimonial-student">
                            <div class="student-name">Pedro Costa</div>
                            <div class="student-course">BSc in Computing &mdash; TU Dublin</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/wagner.webp') }}" alt="Wagner" class="consultant-photo" loading="lazy">
                            <div class="consultant-info">
                                <div class="consultant-name">Wagner</div>
                                <div class="consultant-badge">
                                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                    {{ __('Verified Advisor') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /testimonials-grid -->
        </div>
    </section>

    <!-- Diagnostic / Quiz Modal -->
    <div class="quiz-modal-backdrop" data-quiz-modal aria-hidden="true" hidden>
        <div class="quiz-modal" role="dialog" aria-modal="true" aria-labelledby="quiz-modal-title" tabindex="-1">
            <div class="quiz-modal-head">
                <div>
                    <div class="quiz-modal-sub" data-quiz-step-label></div>
                    <h3 id="quiz-modal-title" data-quiz-headline></h3>
                </div>
                <button type="button" class="quiz-modal-close" data-quiz-close aria-label="Close">✕</button>
            </div>
            <div class="quiz-modal-body" data-quiz-body></div>
            <div class="quiz-modal-foot" data-quiz-foot></div>
        </div>
    </div>

    <script>
        window.QUIZ_DATA = @json($quizData);
    </script>
@endsection

@push('scripts')
<script>
    window.HERO_SLIDES = [
        {
            number: '01',
            name: 'Higher Education',
            titleWhite: 'Higher',
            titleOrange: 'Education',
            subtitle: 'In Ireland',
            bg: "{{ asset('images/hero-higher-education.webp') }}",
            position: '72% 35%'
        },
        {
            number: '02',
            name: 'CI Professional',
            titleWhite: 'CI',
            titleOrange: 'Professional',
            subtitle: 'Recruitment & Career Services in Ireland',
            bg: "{{ asset('images/hero-corporate-programs.webp') }}",
            position: 'center center'
        }
    ];
    window.ROUTES = window.ROUTES || {};
    window.ROUTES.higherEducation = @json(route('higher-education'));
    window.ROUTES.professional = @json(route('professional'));
    window.LOCALE = @json(app()->getLocale());
    @php
        $i18nMap = [
            'sending'         => __('Sending…'),
            'send_to_advisor' => __('Send to advisor'),
            'back'            => __('← Back'),
            'name_required'   => __('Please enter your name.'),
            'email_invalid'   => __('Please enter a valid email.'),
            'thanks_title'    => __("Thanks — we've got your answers."),
            'thanks_body'     => __('A senior advisor will review your pathway and follow up within 1 business day.'),
            'your_pathway'    => __('Your pathway'),
            'sent'            => __('Sent'),
            'send_my_answers' => __('Send my answers to an advisor'),
            'question_label'  => __('Question'),
            'reach_out'       => __('A senior advisor will reach out within 1 business day.'),
            'full_name'       => __('Full name'),
            'email_label'     => __('Email'),
            'phone_label'     => __('Phone (optional)'),
        ];
    @endphp
    window.I18N = @json($i18nMap);
</script>
<script src="/js/welcome.js" defer></script>
@endpush

