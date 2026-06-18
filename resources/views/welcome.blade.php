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
    @include('partials.main-nav', ['active' => null])
@endsection

@section('mobile-nav-links')
    @include('partials.mobile-nav', ['active' => null])
@endsection

@section('mobile-nav-footer')
    <div class="mobile-drawer-footer">
        @include('partials.lang-toggle')
        <a class="mobile-cta-btn" href="{{ $lr('start-your-plan') }}" data-open-assessment-modal>{{ __('Start Your Plan') }}</a>
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
                    <div class="impact-card-number">38</div>
                    <h3>{{ __('38 Years in the Market') }}</h3>
                    <p>{{ __('Proven experience helping international students plan their study journey in Ireland.') }}</p>
                </article>

                <article class="impact-card impact-card-md">
                    <div class="impact-card-number">7,000</div>
                    <h3>{{ __('7,000 Students') }}</h3>
                    <p>{{ __('A strong track record of successful applications across partner institutions.') }}</p>
                </article>

                <article class="impact-card impact-card-md">
                    <div class="impact-card-number">1200+</div>
                    <h3>{{ __('Over 1,200 Courses in Our Portfolio') }}</h3>
                    <p>{{ __('Program options for different profiles, academic goals, and English levels.') }}</p>
                </article>

                <article class="impact-card impact-card-wide">
                    <h3>{{ __('From First Contact to Visa Support') }}</h3>
                    <p>{{ __('From the first consultation through visa support to your career in Ireland. One team handling every step.') }}</p>
                </article>

                <article class="impact-card impact-card-wide">
                    <h3>{!! __('Higher Education & International Career Options') !!}</h3>
                    <p>{{ __('Dedicated tracks for students applying to Irish universities and qualified professionals seeking placement across 15+ sectors.') }}</p>
                </article>

                <article class="impact-card impact-card-wide">
                    <h3>{{ __('Life in Ireland') }}</h3>
                    <p>{{ __('English courses, university and career mentoring, focused on long-term residency support. An investment in your life and career abroad.') }}</p>
                </article>
            </div>
        </div>
    </section>

    <!-- Trusted By &mdash; Logo Loop -->
    <section class="trusted-by" aria-label="{{ __('Connecting') }}">
        <div class="container">
            <div class="trusted-by-header">
                <div class="trusted-by-label">{{ __('Connecting') }}</div>
                <h2 class="trusted-by-title">{!! __('Colleges & <span>Corporate Partners</span>') !!}</h2>
            </div>
        </div>

        <div class="marquee-wrapper">
            <div class="marquee-track" id="marqueeTrack">

                @php
                    $partnerColleges = [
                        ['name' => 'National College of Ireland',  'logo' => 'nci.png'],
                        ['name' => 'City Colleges',                'logo' => 'citycolleges.png'],
                        ['name' => 'Dublin Business School',       'logo' => 'DBS.png'],
                        ['name' => 'Dorset College',               'logo' => 'dorset.png'],
                        ['name' => 'Griffith College',             'logo' => 'Griffith.png'],
                        ['name' => 'Holmes Institute Dublin',      'logo' => 'holmes.png'],
                        ['name' => 'IBAT College',                 'logo' => 'ibat.png'],
                        ['name' => 'TU Dublin',                    'logo' => 'Tudublin.png'],
                        ['name' => 'Dublin City University',       'logo' => 'DCU.png'],
                        ['name' => 'Independent College Dublin',   'logo' => 'independent.png'],
                        ['name' => 'ICD Business School',          'logo' => 'ICD.png'],
                        ['name' => 'Galway Business School',       'logo' => 'galwaybss.png'],
                    ];
                @endphp

                <!-- List A -->
                <ul class="marquee-list" aria-label="Partner colleges">
                    @foreach ($partnerColleges as $college)
                        <li class="marquee-item">
                            <img class="marquee-logo"
                                 src="{{ asset('images/partners/' . $college['logo']) }}"
                                 alt="{{ $college['name'] }}"
                                 loading="lazy">
                        </li>
                    @endforeach
                </ul>

                <!-- List B &mdash; duplicate for seamless loop -->
                <ul class="marquee-list" aria-hidden="true">
                    @foreach ($partnerColleges as $college)
                        <li class="marquee-item">
                            <img class="marquee-logo"
                                 src="{{ asset('images/partners/' . $college['logo']) }}"
                                 alt=""
                                 loading="lazy">
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
                'desc'  => __('Intensive English with Academic Purpose — calibrated for the classroom and the workplace.'),
                'cta'   => 'study-in-ireland',
                'detail' => [
                    ['k' => __('Duration'), 'v' => __('6–25 weeks'),  's' => __('Flexible start dates')],
                    ['k' => __('Goal'),     'v' => __('B2+ / C1'),        's' => __('IELTS 6.5+ equivalent')],
                    ['k' => __('Format'),   'v' => __('In-person'),   's' => __('Dublin · Galway · Cork · Limerick')],
                ],
            ],
            [
                'num'   => '02',
                'title' => __('University'),
                'sub'   => __("Bachelor or Master's"),
                'desc'  => __("Applications to top universities, pathways, undergraduate, postgraduate and master's programmes."),
                'cta'   => 'study-in-ireland',
                'detail' => [
                    ['k' => __('Partners'),   'v' => __('12+ colleges'),     's' => __('Dublin · Galway · Cork · Limerick')],
                    ['k' => __('Programmes'), 'v' => __('Level 6 to 9'),     's' => __('Across 15 sectors')],
                    ['k' => __('Support'),    'v' => __('Support team'),     's' => __('End-to-end follow-up')],
                ],
            ],
            [
                'num'   => '03',
                'title' => __('Career'),
                'sub'   => __('Employability layer'),
                'desc'  => __('CV, LinkedIn, interview coaching and matched introductions to employers in our partner network.'),
                'cta'   => 'career-bridge',
                'detail' => [
                    ['k' => __('Development'), 'v' => __('International career'),        's' => __('Irish CV • LinkedIn • Interviews')],
                    ['k' => __('Networking'),  'v' => __('Connections that open doors'), 's' => __('Events • Mentorships • Recruiters')],
                    ['k' => __('Growth'),      'v' => __('International growth'),        's' => __('Global market • Soft skills')],
                ],
            ],
            [
                'num'   => '04',
                'title' => __('Work'),
                'sub'   => __('Long-term residency'),
                'desc'  => __('Work permits, Stamp transitions and long-stay strategy — so what began as a study becomes a life-changing move.'),
                'cta'   => 'career-bridge',
                'detail' => [
                    ['k' => __('Permits'),   'v' => __('Critical Skills'),     's' => __('Legal handling included')],
                    ['k' => __('Pathway'),   'v' => __('Stamp 2 → 1G → 4'),    's' => __('Guided transitions')],
                    ['k' => __('Retention'), 'v' => __('62–66%'),              's' => __('Employed graduates working in Ireland (HEA)')],
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
                <p class="pathway-lead">{{ __('Far more than a university application. Together, we build a path that spans language, higher education, professional experience and permanent residency — with specialists and processes that prepare you so each stage powers the next.') }}</p>
            </div>

            <div class="pathway-stage" data-stages='@json($pathwayStages)'>
                <div class="pathway-track" role="tablist" aria-label="{{ __('Pathway stages') }}">
                    <div class="pathway-line" aria-hidden="true"></div>
                    <div class="pathway-progress" aria-hidden="true"></div>
                    @foreach ($pathwayStages as $i => $s)
                        <button class="p-step{{ $i === 0 ? ' active' : '' }}" type="button" role="tab" data-stage="{{ $i }}" aria-selected="{{ $i === 0 ? 'true' : 'false' }}">
                            <span class="p-dot" aria-hidden="true"></span>
                            <span class="p-num">{{ __('Stage') }} {{ $s['num'] }}</span>
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
                        <span data-cta-label>{{ __('Explore Study Routes') }}</span>
                        <span class="arrow" aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @php
        $quizData = [
            'lead' => __('We map exactly where you stand. The assessment takes two minutes and shows you a personalised path.'),
            'cta'  => __('Begin Assessment'),
            'teaser' => [
                'meta' => __('Question 01 of 04'),
                'time' => __('~2 min'),
                'q'    => __('What best describes where you are today?'),
                'opts' => [
                    __('I need to improve my English before my next academic step'),
                    __('I have English but need support to apply to a university'),
                    __('I feel ready and already know which field or course to choose'),
                    __('I am looking for a job opportunity in my field'),
                ],
            ],
            'questions' => [
                [
                    'q'    => __('What best describes where you are today?'),
                    'opts' => [
                        ['t' => __('I need to improve my English before my next academic step'),    'lean' => 'he',  'w' => 1],
                        ['t' => __('I have English but need support to apply to a university'),      'lean' => 'he',  'w' => 1],
                        ['t' => __('I feel ready and already know which field or course to choose'), 'lean' => 'he',  'w' => 1],
                        ['t' => __('I am looking for a job opportunity in my field'),                'lean' => 'pro', 'w' => 2],
                    ],
                ],
                [
                    'q'    => __("What's your primary goal for Ireland?"),
                    'opts' => [
                        ['t' => __('An overseas experience and return home'),  'lean' => 'he',  'w' => 1],
                        ['t' => __('A degree and an international career'),    'lean' => 'he',  'w' => 1],
                        ['t' => __('Work in my field and earn a work permit'), 'lean' => 'pro', 'w' => 2],
                        ['t' => __('Not yet decided'),                         'lean' => null,  'w' => 0],
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
                    'route' => 'study-in-ireland',
                    'label' => __('Explore Study Routes'),
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
                    'route' => 'career-bridge',
                    'label' => __('Explore Career Bridge'),
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

    <!-- Social Proof / Success Stories Slideshow -->
    <section class="testimonials" id="testimonials">
        <div class="container">

            <div class="testimonials-header">
                <div class="testimonials-label">{{ __('Success Stories') }}</div>
                <h2 class="testimonials-title">{{ __('Real Students, Real Results') }}</h2>
                <p class="testimonials-subtitle">{{ __('See how our advisors helped hundreds of students achieve their dream of studying in Ireland.') }}</p>
            </div>

            @php
                $stories = [
                    [
                        'student_photo'  => 'students/alinystudent.webp',
                        'photo_position' => 'center 60%',
                        'student_name'   => 'Yago & Tiago Gontijo',
                        'course'         => __('BA in Business — Independent College'),
                        'quote'          => __('So much gratitude for clearing up all our doubts and for all the support throughout our entire process! Highly recommended!'),
                        'consultant'     => ['name' => 'Aliny', 'photo' => 'consultant/aliny.webp'],
                    ],
                    [
                        'student_photo'  => 'students/albertstudent.webp',
                        'photo_position' => 'center center',
                        'student_name'   => 'Juan Fernando',
                        'course'         => __('Higher Diploma in Science in Data Analytics - City colleges'),
                        'quote'          => __('Incredible support and dedication throughout every step of my application process. Moving to Ireland was a dream — Albert made it real!'),
                        'consultant'     => ['name' => 'Albert', 'photo' => 'consultant/albert.webp'],
                    ],
                    [
                        'student_photo'  => 'students/gabrielstudent.webp',
                        'photo_position' => 'center center',
                        'student_name'   => 'Bruno Silva',
                        'course'         => __('Cybersecurity — City Colleges'),
                        'quote'          => __("Professional, caring and always available. My dream of studying in Ireland became a reality thanks to Gabriel's guidance!"),
                        'consultant'     => ['name' => 'Gabriel', 'photo' => 'consultant/gabriel.webp'],
                    ],
                    [
                        'student_photo'  => 'students/romariostudent.webp',
                        'photo_position' => 'center center',
                        'student_name'   => 'Elis',
                        'course'         => __('Higher Certificate in Sound Engineering and Music Production — DBS'),
                        'quote'          => __('Every detail of my application was handled with precision and warmth. Outstanding service — I could not have done it without Romario!'),
                        'consultant'     => ['name' => 'Romario', 'photo' => 'consultant/romario.webp'],
                    ],
                    [
                        'student_photo'  => 'students/talitastudent.webp',
                        'photo_position' => 'center center',
                        'student_name'   => 'Yari Yolibet',
                        'course'         => __('BA in Business — Holmes Institute'),
                        'quote'          => __('From my very first question to my arrival in Dublin, I felt fully supported every step of the way. Talita is simply the best!'),
                        'consultant'     => ['name' => 'Talita', 'photo' => 'consultant/talita.webp'],
                    ],
                    [
                        'student_photo'  => 'students/wagnerstudent.webp',
                        'photo_position' => 'center center',
                        'student_name'   => 'Pedro Costa',
                        'course'         => __('BSc in Computing — TU Dublin'),
                        'quote'          => __("Wagner's knowledge of Irish education is truly unmatched. He made the whole process smooth and stress-free. Best decision I ever made!"),
                        'consultant'     => ['name' => 'Wagner', 'photo' => 'consultant/wagner.webp'],
                    ],
                ];
                $whatsappHref = 'https://wa.me/353868179430';
            @endphp

            <div class="stories-slider" data-stories-slider>
                <div class="stories-viewport">
                    <div class="stories-track" data-stories-track>
                        @foreach ($stories as $i => $story)
                            <article class="story-slide" role="group" aria-roledescription="slide" aria-label="{{ ($i + 1) . ' / ' . count($stories) }}">
                                <figure class="story-photo">
                                    <img src="{{ asset($story['student_photo']) }}" alt="{{ $story['student_name'] }}" style="object-position: {{ $story['photo_position'] }};" loading="lazy">
                                    <figcaption class="story-student">
                                        <span class="story-student-name">{{ $story['student_name'] }}</span>
                                        <span class="story-student-course">{{ $story['course'] }}</span>
                                    </figcaption>
                                </figure>
                                <div class="story-body">
                                    <div class="story-stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                                    <blockquote class="story-quote">{{ $story['quote'] }}</blockquote>
                                    <div class="story-consultant">
                                        <img src="{{ asset($story['consultant']['photo']) }}" alt="{{ $story['consultant']['name'] }}" class="story-consultant-photo" loading="lazy">
                                        <div class="story-consultant-info">
                                            <div class="story-consultant-name">{{ $story['consultant']['name'] }}</div>
                                            <div class="story-consultant-badge">
                                                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                                {{ __('Verified Advisor') }}
                                            </div>
                                        </div>
                                    </div>
                                    <a class="story-cta" href="{{ $whatsappHref }}" target="_blank" rel="noopener">
                                        <svg viewBox="0 0 32 32" fill="currentColor" aria-hidden="true"><path d="M16.001 3C9.373 3 4 8.373 4 15c0 2.643.85 5.087 2.297 7.073L4 29l7.094-2.265A11.957 11.957 0 0016 27c6.627 0 12-5.373 12-12S22.628 3 16.001 3zm0 21.6c-1.86 0-3.6-.515-5.085-1.41l-.365-.215-4.21 1.345 1.345-4.12-.235-.38A9.553 9.553 0 016.4 15c0-5.296 4.305-9.6 9.6-9.6 5.295 0 9.6 4.305 9.6 9.6 0 5.296-4.305 9.6-9.6 9.6zm5.27-7.18c-.29-.146-1.71-.844-1.975-.94-.265-.097-.458-.146-.65.146-.193.29-.748.94-.917 1.133-.17.193-.34.218-.63.072-.29-.145-1.22-.45-2.325-1.434-.86-.766-1.44-1.713-1.61-2.003-.17-.29-.018-.448.128-.593.132-.13.29-.34.435-.51.146-.17.193-.29.29-.484.097-.193.048-.363-.024-.51-.072-.145-.65-1.567-.892-2.144-.234-.563-.473-.486-.65-.495l-.555-.01c-.193 0-.508.072-.775.363-.265.29-1.012.99-1.012 2.412 0 1.423 1.036 2.798 1.18 2.991.145.193 2.038 3.11 4.937 4.36.69.297 1.228.474 1.648.607.692.22 1.322.19 1.82.115.555-.083 1.71-.7 1.953-1.374.242-.674.242-1.252.17-1.374-.072-.122-.265-.193-.555-.34z"/></svg>
                                        {{ __('Talk to :name on WhatsApp', ['name' => $story['consultant']['name']]) }}
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>

                <div class="stories-nav">
                    <button type="button" class="stories-arrow stories-prev" aria-label="{{ __('Previous story') }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
                    </button>
                    <div class="stories-dots">
                        @foreach ($stories as $i => $story)
                            <button type="button" class="stories-dot @if ($i === 0) is-active @endif" data-stories-index="{{ $i }}" aria-label="{{ ($i + 1) . ' / ' . count($stories) }}"></button>
                        @endforeach
                    </div>
                    <button type="button" class="stories-arrow stories-next" aria-label="{{ __('Next story') }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
                    </button>
                </div>
            </div>
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
    window.ROUTES.studyInIreland = @json(route(app()->getLocale() === 'pt' ? 'pt.higher-education' : 'higher-education'));
    window.ROUTES.careerBridge = @json(route(app()->getLocale() === 'pt' ? 'pt.career-bridge' : 'career-bridge'));
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

