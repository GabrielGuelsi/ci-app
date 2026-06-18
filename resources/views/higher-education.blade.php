@extends('layouts.app')

@php
    $pageActive = 'higher-education';

    $heColleges = [
        [
            'name' => 'TU Dublin',
            'location' => __('Dublin, Ireland'),
            'gradient' => '#3a1060, #5a2090',
            'campus' => 'images/campus/tud.webp',
            'logo' => 'images/partners/Tudublin.jpg',
            'desc' => "Ireland's first Technological University, offering a wide range of undergraduate and postgraduate programmes across multiple campuses in Dublin.",
            'tags' => [__('Engineering'), __('Computing'), __('Business')],
        ],
        [
            'name' => 'Dublin City University',
            'location' => __('Dublin, Ireland'),
            'gradient' => '#0a2a6a, #1a4a9a',
            'campus' => 'images/campus/dcu.webp',
            'logo' => 'images/partners/DCU.webp',
            'desc' => "A young, dynamic university known for innovation, enterprise and research, consistently ranked among Ireland's top universities.",
            'tags' => [__('Business'), __('Computing'), __('Communications')],
        ],
        [
            'name' => 'National College of Ireland',
            'location' => __('Dublin, Ireland'),
            'gradient' => '#0a4a3a, #1a6a54',
            'campus' => 'images/campus/nci.webp',
            'logo' => 'images/partners/nci.webp',
            'desc' => "Specialising in business and technology programmes, NCI offers a personalised learning environment in the heart of Dublin's IFSC.",
            'tags' => [__('Business'), __('Computing'), __('Data')],
        ],
        [
            'name' => 'Griffith College',
            'location' => __('Dublin, Ireland'),
            'gradient' => '#6a1a0a, #9a2a10',
            'campus' => 'images/campus/griffith.webp',
            'logo' => 'images/partners/Griffith.jpg',
            'desc' => "One of Ireland's largest independent third-level colleges, offering a broad range of degrees, postgraduate and professional programmes.",
            'tags' => [__('Business'), __('Law'), __('Computing')],
        ],
        [
            'name' => 'Dublin Business School',
            'location' => __('Dublin, Ireland'),
            'gradient' => '#0a1a5a, #1a2a8a',
            'campus' => 'images/campus/dbs.webp',
            'logo' => 'images/partners/DBS.png',
            'desc' => 'Dublin Business School is an independent third-level college, offering market focused programmes across diverse areas.',
            'tags' => [__('Business'), __('Finance'), __('Marketing')],
        ],
        [
            'name' => 'City Colleges',
            'location' => __('Dublin, Ireland'),
            'gradient' => '#3a0a5a, #5a1a7a',
            'campus' => 'images/campus/citycolleges.webp',
            'logo' => 'images/partners/citycolleges.png',
            'desc' => 'A Dublin college offering career-focused programmes in business, law, technology and the creative industries.',
            'tags' => [__('Business'), __('Law'), __('Computing')],
        ],
        [
            'name' => 'Dorset College',
            'location' => __('Dublin, Ireland'),
            'gradient' => '#0a3a4a, #1a5a6a',
            'campus' => 'images/campus/dorset.webp',
            'logo' => 'images/partners/dorset.png',
            'desc' => 'A modern college in the heart of Dublin offering programmes in business, computing and hospitality in a vibrant, multicultural setting.',
            'tags' => [__('Business'), __('Computing'), __('Hospitality')],
        ],
        [
            'name' => 'ICD',
            'location' => __('Dublin, Ireland'),
            'gradient' => '#4a2a0a, #6a4010',
            'campus' => 'images/campus/icd.webp',
            'logo' => 'images/partners/ICD.png',
            'desc' => 'A Dublin business college offering practical, industry-aligned programmes in business, marketing and finance.',
            'tags' => [__('Business'), __('Marketing'), __('Finance')],
        ],
        [
            'name' => 'Independent College',
            'location' => __('Dublin, Ireland'),
            'gradient' => '#1a3a0a, #2a5a15',
            'campus' => 'images/campus/independent.webp',
            'logo' => 'images/partners/independent.png',
            'desc' => 'Offering a range of accounting, marketing and business programmes in a supportive and student-centred learning environment.',
            'tags' => [__('Accounting'), __('Marketing'), __('Business')],
        ],
        [
            'name' => 'Holmes Institute Dublin',
            'location' => __('Dublin, Ireland'),
            'gradient' => '#3a0a1a, #5a1a30',
            'campus' => 'images/campus/holmes.webp',
            'logo' => 'images/partners/holmes.png',
            'desc' => 'An international college offering higher education programmes in business and computing in a diverse learning community.',
            'tags' => [__('Business'), __('Computing')],
        ],
        [
            'name' => 'Galway Business School',
            'location' => __('Galway, Ireland'),
            'gradient' => '#0a1a4a, #1a2a6a',
            'campus' => 'images/campus/galway.webp',
            'logo' => 'images/partners/galwaybss.jpg',
            'desc' => "Offering business and management programmes in the vibrant city of Galway on Ireland's stunning west coast.",
            'tags' => [__('Business'), __('Management')],
        ],
        [
            'name' => 'IBAT College Dublin',
            'location' => __('Dublin, Ireland'),
            'gradient' => '#2a0a4a, #420a6a',
            'campus' => 'images/campus/ibat.webp',
            'logo' => 'images/partners/ibat.png',
            'desc' => 'A Dublin-based college focused on business, accounting and technology programmes for domestic and international students.',
            'tags' => [__('Business'), __('Accounting'), __('Technology')],
        ],
    ];
@endphp

@section('title', 'CI Ireland — ' . __('Higher Education'))

@section('head')
    <link rel="preload" as="image" href="{{ asset('images/hero-higher-education.webp') }}">
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/new-shared.css', 'resources/css/study-in-ireland.css', 'resources/css/higher-education.css', 'resources/css/testimonials.css'])
    @else
        <link rel="stylesheet" href="/css/new-shared.css">
        <link rel="stylesheet" href="/css/study-in-ireland.css">
        <link rel="stylesheet" href="/css/higher-education.css">
        <link rel="stylesheet" href="/css/testimonials.css">
    @endif
@endsection

@include('partials.page-shell')

@section('content')
    {{-- 1. Cinematic Hero --}}
    <section class="si-hero">
        <div class="si-hero-bg" style="background-image: url('{{ asset('images/hero-higher-education.webp') }}');" aria-hidden="true"></div>
        <div class="si-hero-overlay" aria-hidden="true"></div>
        <div class="si-hero-glow" aria-hidden="true"></div>
        <div class="container">
            <div class="si-hero-content">
                <span class="si-hero-kicker animate-in" style="animation-delay:.05s">
                    <i class="fas fa-graduation-cap"></i> {{ __('Higher Education in Ireland') }}
                </span>
                <h1 class="si-hero-title animate-in" style="animation-delay:.15s">
                    {{ __('Your Higher Education Journey,') }}<br>
                    <span class="si-hero-title-accent">{{ __('Guided Every Step of the Way') }}</span>
                </h1>
                <p class="si-hero-subtitle animate-in" style="animation-delay:.3s">
                    {{ __('Free consultancy for international students seeking a higher education course in Ireland — our team of specialists guides you through every stage.') }}
                </p>
                <div class="si-hero-actions animate-in" style="animation-delay:.45s">
                    <button type="button" class="btn btn-primary btn-lg" data-open-assessment-modal>
                        {{ __('Book Your Free 1-to-1 Consultation') }} <i class="fas fa-arrow-right"></i>
                    </button>
                    <a class="btn btn-outline-light" href="#partners">
                        {{ __('Explore Colleges') }}
                    </a>
                </div>
                <div class="si-hero-meta animate-in" style="animation-delay:.6s">
                    <div class="si-hero-stat"><strong>12+</strong><span>{{ __('Partner Colleges') }}</span></div>
                    <div class="si-hero-stat"><strong>5K+</strong><span>{{ __('Students Placed') }}</span></div>
                    <div class="si-hero-stat"><strong>{{ __('Free') }}</strong><span>{{ __('1-to-1 Consultation') }}</span></div>
                </div>
            </div>
        </div>
        <div class="si-hero-scroll" aria-hidden="true">
            <span></span>
        </div>
    </section>

    {{-- 2. Find Your Starting Point (old page content) --}}
    <section class="he-pathways" id="pathways">
        <div class="container">
            <div class="he-section-header">
                <div class="he-section-kicker" style="color: var(--ci-orange);">{{ __('Academic Programmes') }}</div>
                <h2 class="he-section-title" style="color: var(--ci-purple);">{!! __('Find Your <span style="color: var(--ci-orange);">Starting Point</span>') !!}</h2>
                <p class="he-section-sub" style="color: var(--text-light);">{{ __('Your starting point depends on your current qualifications. Our team assesses your profile and points you to the right path by selecting the course that makes the most sense for your life and career.') }}</p>
            </div>

            <div class="pathway-flow">
                <div class="pathway-item">
                    <div class="pathway-timeline">
                        <div class="pathway-num">01</div>
                        <div class="pathway-connector"></div>
                    </div>
                    <div class="pathway-card">
                        <div class="pathway-entry-tag"><i class="fas fa-layer-group"></i> {{ __('Level 6 · Intermediate English B1+') }}</div>
                        <h3 class="pathway-name">{{ __('Pathway') }}</h3>
                        <p class="pathway-desc">{{ __('An intermediate programme that works as a preparatory course, helping students develop the academic skills needed before starting a degree at an Irish university or college.') }}</p>
                    </div>
                </div>

                <div class="pathway-item">
                    <div class="pathway-timeline">
                        <div class="pathway-num">02</div>
                        <div class="pathway-connector"></div>
                    </div>
                    <div class="pathway-card">
                        <div class="pathway-entry-tag"><i class="fas fa-layer-group"></i> {{ __('Level 7 & 8 · English B2+') }}</div>
                        <h3 class="pathway-name">{{ __('Undergraduate') }}</h3>
                        <p class="pathway-desc">{{ __('One to three-year degree programmes offered by internationally recognised universities and colleges across Ireland — bachelor degrees with and without honours, across more than 100 available fields.') }}</p>
                    </div>
                </div>

                <div class="pathway-item pathway-item--last">
                    <div class="pathway-timeline">
                        <div class="pathway-num">03</div>
                    </div>
                    <div class="pathway-card">
                        <div class="pathway-entry-tag"><i class="fas fa-layer-group"></i> {{ __('Level 9 · Advanced English') }}</div>
                        <h3 class="pathway-name">{{ __('Postgraduate & Masters') }}</h3>
                        <p class="pathway-desc">{{ __('Specialisation programmes (Postgraduate Diplomas and Masters) offered by internationally recognised higher education institutions — the natural next step for graduates who want to advance their careers.') }}</p>
                    </div>
                </div>
            </div>

            <div class="pathway-cta-card">
                <div class="pathway-cta-icon"><i class="fas fa-compass"></i></div>
                <div class="pathway-cta-text">
                    <h4>{{ __('Not sure where you fit?') }}</h4>
                    <p>{{ __('Our advisors will assess your profile and guide you to the right starting point — at no cost.') }}</p>
                </div>
                <button type="button" class="he-cta-primary" style="border:none;cursor:pointer;white-space:nowrap;" data-open-assessment-modal>
                    {{ __('Talk to an Advisor') }} <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </section>

    {{-- 3. Already in Ireland --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="si-already">
                <div class="si-already-visual">
                    <div class="si-already-glow" aria-hidden="true"></div>
                    <img class="si-already-image"
                         src="{{ asset('images/student-arriving-griffith.jpg') }}"
                         alt=""
                         loading="lazy">
                    <div class="si-already-stamp" aria-hidden="true">
                        <i class="fas fa-compass"></i>
                        <span>{{ __('Stamp 2') }}</span>
                    </div>
                </div>
                <div class="si-already-text">
                    <span class="si-already-kicker">{{ __('Already in Ireland') }}</span>
                    <h3 class="si-already-title">{{ __('Already in Ireland and not sure what comes next?') }}</h3>
                    <p class="si-already-lead">{{ __('If you are studying English, holding a Stamp 2 or approaching the end of your course, you may be wondering what to do next.') }}</p>
                    <div class="si-already-questions">
                        <p>{{ __('Should you move to college? Apply for a pathway? Improve your English first? Start a postgraduate programme? Think about your career? Review your visa and budget?') }}</p>
                    </div>
                    <p class="si-already-closing">{{ __('CI Ireland can help you understand your options and plan your next step with more clarity.') }}</p>
                    <button type="button" class="btn btn-primary" data-open-assessment-modal>{{ __('Plan My Next Step') }} <i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </section>

    {{-- 4. Journey to an Irish College (scroll stack) --}}
    <section class="he-process" id="process">
        <div class="scroll-stack-outer">
            <div class="scroll-stack-sticky">
                <div class="stack-inner-header">
                    <div class="he-section-kicker">{{ __('How It Works') }}</div>
                    <h2 class="he-section-title">{!! __('Your Journey to an <span>Irish College</span>') !!}</h2>
                    <p class="he-section-sub">{{ __('A simplified, guided process — we handle the complexity so you can focus on what truly matters: your future.') }}</p>
                </div>

                <div class="stack-cards-wrap">
                    <div class="step-card" data-step="1">
                        <div class="step-left">
                            <div class="step-number">01</div>
                            <div class="step-badge">{{ __('Step 01') }}</div>
                            <div class="step-icon-wrap"><i class="fas fa-comments"></i></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">{{ __('Get in Touch') }}</h3>
                            <p class="step-desc">{{ __('Fill in our form and a specialist advisor will get in touch to schedule your free 1-to-1 consultation.') }}</p>
                            <ul class="step-bullets"></ul>
                        </div>
                    </div>

                    <div class="step-card" data-step="2">
                        <div class="step-left">
                            <div class="step-number">02</div>
                            <div class="step-badge">{{ __('Step 02') }}</div>
                            <div class="step-icon-wrap"><i class="fas fa-search"></i></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">{{ __('Understanding Your Profile') }}</h3>
                            <p class="step-desc">{{ __('Our team asks the right questions to understand your background and goals — so we can place you in the ideal programme.') }}</p>
                            <ul class="step-bullets">
                                <li>{{ __('Academic background review') }}</li>
                                <li>{{ __('Goals, budget and visa requirements') }}</li>
                            </ul>
                            <p class="step-note">{{ __('Our personalised service saves you time and money.') }}</p>
                        </div>
                    </div>

                    <div class="step-card" data-step="3">
                        <div class="step-left">
                            <div class="step-number">03</div>
                            <div class="step-badge">{{ __('Step 03') }}</div>
                            <div class="step-icon-wrap"><i class="fas fa-file-alt"></i></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">{{ __('We Handle Everything') }}</h3>
                            <p class="step-desc">{{ __('Once your contract is signed and your first payment is made, we gather your documents, validate them, translate them and submit your application.') }}</p>
                            <ul class="step-bullets">
                                <li>{{ __('After submission, we keep you updated at every stage — no stress, no confusion.') }}</li>
                                <li>{{ __('Our advisors and customer experience team are by your side at all times.') }}</li>
                            </ul>
                        </div>
                    </div>

                    <div class="step-card" data-step="4">
                        <div class="step-left">
                            <div class="step-number">04</div>
                            <div class="step-badge">{{ __('Step 04') }}</div>
                            <div class="step-icon-wrap"><i class="fas fa-trophy"></i></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">{{ __('College Acceptance!') }}</h3>
                            <p class="step-desc">{{ __('Your university journey begins, and our team stays by your side with visa guidance, academic follow-up and ongoing support whenever you need it.') }}</p>
                            <ul class="step-bullets">
                                <li>{{ __('Course enrolment completed') }}</li>
                                <li>{{ __('Dedicated support whenever you need it') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="stack-progress">
                    <div class="stack-dot active" data-dot="0"></div>
                    <div class="stack-dot" data-dot="1"></div>
                    <div class="stack-dot" data-dot="2"></div>
                    <div class="stack-dot" data-dot="3"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- 5. Partner Institutions (with areas & courses) --}}
    <section class="he-partners" id="partners">
        <div class="container">
            <div class="he-section-header">
                <div class="he-section-kicker">{{ __('Our Network') }}</div>
                <h2 class="he-section-title" style="color: var(--ci-purple);">{!! __('Partner <span>Institutions</span>') !!}</h2>
                <p class="he-section-sub" style="color: var(--text-light);">{{ __("We work with Ireland's leading universities and colleges to find the perfect fit for every student profile.") }}</p>
            </div>

            <div class="partners-grid">
                @foreach ($heColleges as $college)
                    <div class="college-card">
                        <div class="college-card-image" style="background: linear-gradient(135deg, {{ $college['gradient'] }});">
                            <img class="campus-photo" src="{{ asset($college['campus']) }}" alt="" loading="lazy">
                            <div class="college-partner-badge"><span class="partner-dot"></span> {{ __('Partner') }}</div>
                            <div class="college-logo-wrap">
                                <img src="{{ asset($college['logo']) }}" alt="{{ $college['name'] }}" loading="lazy">
                            </div>
                        </div>
                        <div class="college-card-body">
                            <h4 class="college-name">{{ $college['name'] }}</h4>
                            <p class="college-location"><i class="fas fa-map-pin"></i> {{ $college['location'] }}</p>
                            <p class="college-desc">{{ $college['desc'] }}</p>
                            <div class="college-tags">
                                @foreach ($college['tags'] as $tag)
                                    <span class="college-tag">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 6. Career Bridge — Study × Career editorial --}}
    @php
        $ccJourney = [
            ['icon' => 'fa-book-open',      'label' => __('Your study')],
            ['icon' => 'fa-graduation-cap', 'label' => __('Graduate')],
            ['icon' => 'fa-people-arrows',  'label' => __('Level Up')],
            ['icon' => 'fa-briefcase',      'label' => __('Your career')],
        ];
        $ccStudyAttrs = [__('Course'), __('English level'), __('Visa & budget'), __('Intake')];
        $ccCareerAttrs = [__('Employability'), __('Network'), __('Confidence'), __('Opportunities')];
    @endphp
    <section class="content-section content-section--alt cc">
        <div class="container">
            <div class="cc-head">
                <span class="section-kicker">{{ __('Study × Career') }}</span>
                <h2 class="section-title">{{ __('Your study plan should also speak to your career plan') }}</h2>
                <p class="cc-lead">{{ __('Your course choice shapes employability, network, confidence and long-term opportunities. We plan both sides as one.') }}</p>
            </div>

            <ol class="cc-journey" aria-label="{{ __('From study to career') }}">
                @foreach ($ccJourney as $i => $stop)
                    <li class="cc-stop @if ($i === 2) is-anchor @endif" data-step="{{ $i }}">
                        <span class="cc-stop-dot" aria-hidden="true"><i class="fas {{ $stop['icon'] }}"></i></span>
                        <span class="cc-stop-label">{{ $stop['label'] }}</span>
                    </li>
                @endforeach
            </ol>

            <div class="cc-halves">
                <div class="cc-half cc-half--study">
                    <span class="cc-half-kicker">{{ __('Your study') }}</span>
                    <ul class="cc-half-list">
                        @foreach ($ccStudyAttrs as $attr)
                            <li>{{ $attr }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="cc-bridge" aria-hidden="true">
                    <span class="cc-bridge-icon"><i class="fas fa-arrows-left-right"></i></span>
                </div>
                <div class="cc-half cc-half--career">
                    <span class="cc-half-kicker">{{ __('Your career') }}</span>
                    <ul class="cc-half-list">
                        @foreach ($ccCareerAttrs as $attr)
                            <li>{{ $attr }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="cc-manifesto">
                <p>{{ __('We created a continuity product designed around the biggest need of international students: a place in the job market. We help you make study decisions with a clearer view of where they can lead, and prepare you for the next steps through Level Up Careers.') }}</p>
            </div>

            <div class="cc-cta-row">
                <a class="btn btn-primary" href="{{ $lr('career-bridge') }}">
                    {{ __('Discover Level Up') }} <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- 7. FAQ --}}
    @include('partials.faq-accordion', [
        'title' => __('Common questions about Higher Education in Ireland'),
        'items' => [
            ['q' => __('What qualifications do I need to start a degree in Ireland?'), 'a' => __('It depends on your academic background, English level and the institution. CI Ireland reviews your profile and tells you whether you can apply directly or should start with Academic English or a pathway programme first.')],
            ['q' => __('Can I move from an English course to a college or university?'), 'a' => __('In many cases, yes. The right route depends on your English level, documents, academic history, visa situation, budget and timeline — which is exactly what we assess together before applying.')],
            ['q' => __('Does CI Ireland charge for this support?'), 'a' => __('Our guidance and one-to-one consultation are free. We support you with course selection, institution choice, documents, application and enrolment at no cost to you.')],
            ['q' => __('How much does it cost to study at an Irish higher education institution?'), 'a' => __('Tuition varies by institution, level and programme. During your assessment we give you a realistic view of fees and budget so you can plan with confidence.')],
            ['q' => __('When should I apply?'), 'a' => __('Irish institutions have specific intakes and deadlines throughout the year. The earlier you start, the more options you have — we help you map the timeline to your goals and visa situation.')],
            ['q' => __('Will my course choice affect my career in Ireland?'), 'a' => __('Yes. Your study area, academic level, institution and English level can all influence your future career strategy — which is why we connect your study plan with Career Bridge.')],
        ],
    ])

    {{-- 7b. Testimonials (reused from home) --}}
    @include('partials.testimonials')

    {{-- 8. Final CTA --}}
    @include('partials.final-cta', [
        'title' => __('Quero ser um #universitárioCI'),
        'text' => __('The right course choice can impact your academic life, visa planning, budget and future opportunities. Shall we talk about your future in a 360° way, thinking about life and career?'),
        'primaryCta' => ['label' => __('Start My Profile Assessment'), 'modal' => true],
        'secondaryCta' => ['label' => __('Talk to an Advisor'), 'href' => 'https://wa.me/353868179430', 'newTab' => true],
    ])
@endsection

@push('scripts')
    <script src="{{ asset('js/study-in-ireland.js') }}" defer></script>
    <script src="{{ asset('js/higher-education.js') }}" defer></script>
    <script src="{{ asset('js/testimonials-slider.js') }}" defer></script>
@endpush
