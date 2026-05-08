@extends('layouts.app')

@php $pageActive = 'already-in-ireland'; @endphp

@section('title', 'CI Ireland — ' . __('Already in Ireland'))

@section('head')
    <link rel="preload" as="image" href="{{ asset('images/hero-erasmus.webp') }}">
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/new-shared.css', 'resources/css/already-in-ireland.css'])
    @else
        <link rel="stylesheet" href="/css/new-shared.css">
        <link rel="stylesheet" href="/css/already-in-ireland.css">
    @endif
@endsection

@include('partials.page-shell')

@section('content')
    {{-- Cinematic hero: situation chips entry --}}
    @php
        $aiHeroChips = [
            ['target' => 'english-to-he', 'label' => __('Studying English')],
            ['target' => 'what-we-help',  'label' => __('Any visa or EU passport')],
            ['target' => 'routes',        'label' => __('Course ending soon')],
            ['target' => 'for-you',       'label' => __('Just arrived')],
        ];
    @endphp
    <section class="ai-hero">
        <div class="ai-hero-bg" style="background-image: url('{{ asset('images/hero-erasmus.webp') }}');" aria-hidden="true"></div>
        <div class="ai-hero-overlay" aria-hidden="true"></div>
        <div class="container">
            <div class="ai-hero-content">
                <span class="ai-hero-kicker">
                    <i class="fas fa-location-dot"></i>
                    {{ __('Already in Ireland') }} · {{ __('CI Ireland') }}
                </span>
                <h1 class="ai-hero-title">
                    {{ __("You're already in Ireland.") }}<br>
                    <span class="ai-hero-title-accent">{{ __("Let's plan what's next.") }}</span>
                </h1>
                <p class="ai-hero-subtitle">
                    {{ __('Visa, English progression, course endings or a career move — our Dublin team can help.') }}
                </p>

                <div class="ai-hero-chips" role="group" aria-label="{{ __('Jump to your situation') }}">
                    <span class="ai-hero-chips-label">{{ __("I'm currently") }}</span>
                    @foreach ($aiHeroChips as $chip)
                        <a class="ai-hero-chip" href="#{{ $chip['target'] }}">{{ $chip['label'] }}</a>
                    @endforeach
                </div>

                <div class="ai-hero-actions">
                    <button type="button" class="btn btn-primary btn-lg" data-open-assessment-modal>
                        {{ __('Plan My Next Step') }} <i class="fas fa-arrow-right"></i>
                    </button>
                    <a class="ai-hero-link" href="https://wa.me/353868179430" target="_blank" rel="noopener">
                        <i class="fas fa-headset" aria-hidden="true"></i>
                        <span>{{ __('Talk with an advisor') }}</span>
                        <span class="ai-hero-link-arrow" aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: You are not alone (side-by-side card) --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="ai-arc">
                {{-- Tier 1: intro on the left, team photo on the right --}}
                <div class="ai-arc-header">
                    <div class="ai-arc-intro">
                        <span class="section-kicker">{{ __('You are not alone') }}</span>
                        <h2 class="section-title">{{ __('The next step in Ireland can feel confusing') }}</h2>
                        <p class="section-lead">{{ __('International students, EU passport holders and work-permit residents in Ireland often share the same questions: what comes next, how to move into Higher Education, and how to take a real career step here.') }}</p>
                    </div>
                    <figure class="ai-arc-photo">
                        <img src="{{ asset('images/about/about-4.webp') }}"
                             alt="{{ __('CI Ireland team in Dublin') }}"
                             loading="lazy">
                    </figure>
                </div>

                {{-- Tier 2: 8 paired Q/A rows with symmetric "You alone / You with us" labels on row 1 --}}
                <div class="ai-arc-pairs">
                    <span class="section-kicker ai-arc-pair-eyebrow ai-arc-pair-eyebrow--left">{{ __('You alone') }}</span>
                    <span class="section-kicker ai-arc-pair-eyebrow ai-arc-pair-eyebrow--right">{{ __('You with us') }}</span>

                    <div class="ai-question">{{ __('What should I do after my English course?') }}</div>
                    <div class="ai-with-us-item"><i class="fas fa-check"></i><span>{{ __('We map your route after English') }}</span></div>

                    <div class="ai-question">{{ __('Can I move to college?') }}</div>
                    <div class="ai-with-us-item"><i class="fas fa-check"></i><span>{{ __('We assess fit with Higher Education') }}</span></div>

                    <div class="ai-question">{{ __('Is my English good enough?') }}</div>
                    <div class="ai-with-us-item"><i class="fas fa-check"></i><span>{{ __('We check your English level') }}</span></div>

                    <div class="ai-question">{{ __('Which course makes sense for my future?') }}</div>
                    <div class="ai-with-us-item"><i class="fas fa-check"></i><span>{{ __('We match courses to your career direction') }}</span></div>

                    <div class="ai-question">{{ __('How much will it cost?') }}</div>
                    <div class="ai-with-us-item"><i class="fas fa-check"></i><span>{{ __('We model your real budget') }}</span></div>

                    <div class="ai-question">{{ __('What documents do I need?') }}</div>
                    <div class="ai-with-us-item"><i class="fas fa-check"></i><span>{{ __('We organise your documents and deadlines') }}</span></div>

                    <div class="ai-question">{{ __('How does this affect my visa?') }}</div>
                    <div class="ai-with-us-item"><i class="fas fa-check"></i><span>{{ __('We review your visa timing') }}</span></div>

                    <div class="ai-question">{{ __('Can my studies help me build a career in Ireland?') }}</div>
                    <div class="ai-with-us-item"><i class="fas fa-check"></i><span>{{ __('We connect your studies to career planning') }}</span></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: This page is for you --}}
    <section id="for-you" class="content-section content-section--alt">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">{{ __('This page is for you if you are:') }}</h2>
            </div>
            <div class="ai-foryou">
                <figure class="ai-foryou-photo">
                    <img src="{{ asset('images/student-arriving-griffith.jpg') }}"
                         alt=""
                         loading="lazy">
                </figure>
                <div class="ai-foryou-list">
                    @foreach ([
                        'Studying English in Ireland',
                        'Close to finishing your English course',
                        'On any Irish visa (Stamp 1, 1G, 2 or 4) or holding an EU/EEA passport',
                        'An EU/EEA citizen or work-permit holder considering Higher Education in Ireland',
                        'Already working in Ireland and looking to grow your career through further study',
                        'Unsure if your English is ready for college',
                        'Thinking about moving into Higher Education',
                        'Considering a Pathway, Undergraduate, Postgraduate or Masters programme',
                        'Worried about documents, deadlines or visa timing',
                        'Trying to connect your studies with career opportunities',
                        'Looking for a more strategic way to stay and progress in Ireland',
                    ] as $item)
                        <div class="ai-checklist-item"><i class="fas fa-check-circle"></i> {{ __($item) }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Section: What we help you understand --}}
    <section id="what-we-help" class="content-section">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Profile review') }}</span>
                <h2 class="section-title">{{ __('What we help you understand') }}</h2>
            </div>
            <div class="ai-review-bento">
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-language"></i></div>
                    <h3 class="feature-card-title">{{ __('Your English level') }}</h3>
                    <p class="feature-card-text">{{ __('We help you understand whether your current English level may be enough for your next academic step, or whether you may need further preparation through Academic English or another suitable route.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-graduation-cap"></i></div>
                    <h3 class="feature-card-title">{{ __('Your academic options') }}</h3>
                    <p class="feature-card-text">{{ __('We help you explore possible study routes in Ireland, including Academic English, Pathway Programmes, Undergraduate Degrees, Postgraduate Programmes and Masters.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-passport"></i></div>
                    <h3 class="feature-card-title">{{ __('Your visa timing') }}</h3>
                    <p class="feature-card-text">{{ __('Your visa situation and course timeline matter. We help you understand how timing, documentation and course start dates may affect your next steps.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-file-alt"></i></div>
                    <h3 class="feature-card-title">{{ __('Your documents') }}</h3>
                    <p class="feature-card-text">{{ __('Many students only realise too late that they need specific documents for college applications. We help you understand what may be required and what should be prepared in advance.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-coins"></i></div>
                    <h3 class="feature-card-title">{{ __('Your budget') }}</h3>
                    <p class="feature-card-text">{{ __('Studying in Ireland requires planning. We help you understand the financial side of your options so you can make a more realistic decision.') }}</p>
                </div>
                <div class="feature-card feature-card--anchor">
                    <div class="feature-card-icon"><i class="fas fa-compass"></i></div>
                    <h3 class="feature-card-title">{{ __('Your career direction') }}</h3>
                    <p class="feature-card-text">{{ __('Your next course should not be chosen in isolation. We help you think about how your academic route may connect with your professional goals in Ireland.') }}</p>
                    <a class="feature-card-cta" href="{{ $lr('career-bridge') }}">
                        {{ __('Explore Career Bridge') }} <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: From English to HE --}}
    <section id="english-to-he" class="content-section content-section--alt eth">
        <div class="container">
            <div class="eth-grid">
                <figure class="eth-figure">
                    <img src="{{ asset('images/hero-higher-education1.webp') }}"
                         alt="{{ __('Higher education students on a Dublin campus') }}"
                         loading="lazy">
                    <span class="eth-figure-label">
                        <i class="fas fa-graduation-cap"></i>
                        {{ __('Your next academic chapter') }}
                    </span>
                </figure>
                <div class="eth-content">
                    <span class="section-kicker eth-kicker">{{ __('English → Higher Education') }}</span>
                    <h2 class="section-title">{{ __('From English School to Higher Education') }}</h2>
                    <p class="eth-prose">{{ __('For many students, English school is only the beginning of their journey in Ireland. The real challenge is understanding how to move from English into a stronger academic route, without making decisions based only on price, pressure or last-minute deadlines.') }}</p>
                    <p class="eth-prose">{{ __('CI Ireland helps students plan this transition with more clarity. We look at your English level, academic background, visa situation, budget, documentation and career goals before helping you understand which route may be suitable for your profile.') }}</p>

                    <ol class="eth-ladder" aria-label="{{ __('From English School to Higher Education') }}">
                        <li class="eth-stop">
                            <span class="eth-stop-icon"><i class="fas fa-language"></i></span>
                            <span class="eth-stop-label">{{ __('English School') }}</span>
                        </li>
                        <li class="eth-bridge" aria-hidden="true"><i class="fas fa-arrow-right"></i></li>
                        <li class="eth-stop">
                            <span class="eth-stop-icon"><i class="fas fa-book-open"></i></span>
                            <span class="eth-stop-label">{{ __('Pathway') }}</span>
                        </li>
                        <li class="eth-bridge" aria-hidden="true"><i class="fas fa-arrow-right"></i></li>
                        <li class="eth-stop is-finale">
                            <span class="eth-stop-icon"><i class="fas fa-building-columns"></i></span>
                            <span class="eth-stop-label">{{ __('Higher Education') }}</span>
                        </li>
                    </ol>

                    <button type="button" class="btn btn-primary" data-open-assessment-modal>
                        {{ __('Plan My Transition to Higher Education') }} <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: Possible routes (rich card stack — shared element from /study-in-ireland) --}}
    @php
        $aiRoutes = [
            [
                'tone' => 'english', 'icon' => 'fa-language',
                'sub' => __('Academic fluency'),
                'title' => __('Academic English'),
                'desc' => __('For students who still need to improve their English before starting college, with a focus on academic writing, presentations, exams, interviews and professional communication.'),
                'detail' => [
                    ['k' => __('Best for'), 'v' => __('English not yet at academic level'), 's' => __('Currently in English school')],
                    ['k' => __('Focus'),    'v' => __('Writing & exams'),                    's' => __('Plus interviews and presentations')],
                    ['k' => __('Outcome'),  'v' => __('Academic readiness'),                 's' => __('Confidence for college and work')],
                ],
                'cta' => ['href' => $lr('start-your-plan'), 'label' => __('Learn About Academic English')],
            ],
            [
                'tone' => 'pathway', 'icon' => 'fa-route',
                'sub' => __('Preparatory route'),
                'title' => __('Pathway Programmes'),
                'desc' => __('For students who need a preparatory route before progressing to undergraduate, postgraduate or masters programmes.'),
                'detail' => [
                    ['k' => __('Best for'), 'v' => __('Not yet at requirements'), 's' => __('Academic or English level')],
                    ['k' => __('Leads to'), 'v' => __('UG, PG or Masters'),       's' => __('Smoother transition to higher education')],
                    ['k' => __('Focus'),    'v' => __('Academic adaptation'),     's' => __('Adjust to the Irish system')],
                ],
                'cta' => ['href' => $lr('start-your-plan'), 'label' => __('Understand Pathways')],
            ],
            [
                'tone' => 'ug', 'icon' => 'fa-graduation-cap',
                'sub' => __("Bachelor's level"),
                'title' => __('Undergraduate Degrees'),
                'desc' => __("For students who want to start a bachelor's degree in Ireland and build an academic foundation for the future."),
                'detail' => [
                    ['k' => __('Best for'), 'v' => __('Ready for a full degree'), 's' => __('Have the prerequisites')],
                    ['k' => __('Outcome'),  'v' => __("Bachelor's degree"),       's' => __('Recognised in Ireland')],
                    ['k' => __('Career'),   'v' => __('Long-term foundation'),    's' => __('Employability and direction')],
                ],
                'cta' => ['href' => $lr('start-your-plan'), 'label' => __('Explore Undergraduate Options')],
            ],
            [
                'tone' => 'pg', 'icon' => 'fa-user-graduate',
                'sub' => __('Specialise & advance'),
                'title' => __('Postgraduate Programmes'),
                'desc' => __('For students who already have a degree and want to specialise, change direction or strengthen their profile in Ireland.'),
                'detail' => [
                    ['k' => __('Best for'), 'v' => __('Graduates with a degree'),    's' => __('Looking to specialise or pivot')],
                    ['k' => __('Format'),   'v' => __('Shorter than a new degree'), 's' => __('Focused academic route')],
                    ['k' => __('Career'),   'v' => __('Connect prior experience'),  's' => __('To new professional opportunities')],
                ],
                'cta' => ['href' => $lr('start-your-plan'), 'label' => __('Explore Postgraduate Options')],
            ],
            [
                'tone' => 'masters', 'icon' => 'fa-medal',
                'sub' => __('Advanced qualification'),
                'title' => __('Masters'),
                'desc' => __('For graduates and professionals who want an advanced qualification connected to career progression.'),
                'detail' => [
                    ['k' => __('Best for'), 'v' => __('Graduates seeking depth'), 's' => __('Strong academic profile')],
                    ['k' => __('Outcome'),  'v' => __("Master's degree"),         's' => __('Internationally recognised')],
                    ['k' => __('Career'),   'v' => __('Advanced positioning'),    's' => __('For your target sector')],
                ],
                'cta' => ['href' => $lr('start-your-plan'), 'label' => __('Explore Masters')],
            ],
            [
                'tone' => 'career', 'icon' => 'fa-briefcase',
                'sub' => __('Job-market preparation'),
                'title' => __('Career Bridge'),
                'desc' => __('For students, graduates and professionals who want to prepare for the Irish job market through CV, LinkedIn, interview preparation, market guidance and employer connection when suitable opportunities are available.'),
                'detail' => [
                    ['k' => __('Best for'), 'v' => __('Ready for the job market'), 's' => __('CV, interviews, networking')],
                    ['k' => __('Includes'), 'v' => __('CV, LinkedIn, interviews'), 's' => __('Practical preparation')],
                    ['k' => __('Outcome'),  'v' => __('Stronger market readiness'),'s' => __('Connected to opportunities')],
                ],
                'cta' => ['href' => $lr('career-bridge'), 'label' => __('Explore Career Bridge')],
            ],
        ];
    @endphp
    <section id="routes" class="content-section">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Possible routes') }}</span>
                <h2 class="section-title">{{ __('Possible routes after English school') }}</h2>
                <p class="section-lead">{{ __('Six paths CI Ireland helps you plan and choose between, depending on where you are right now and where you want to go.') }}</p>
            </div>

            <div class="si-rs">
                <div class="si-rs-list" role="list">
                    @foreach ($aiRoutes as $r)
                        <article class="si-rs-card" role="listitem" data-tone="{{ $r['tone'] }}">
                            <div class="si-rs-rail" aria-hidden="true">
                                <span class="si-rs-icon"><i class="fas {{ $r['icon'] }}"></i></span>
                            </div>
                            <div class="si-rs-body">
                                <div class="si-rs-meta">
                                    <span class="si-rs-stage">{{ $r['sub'] }}</span>
                                </div>
                                <h3 class="si-rs-title">{{ $r['title'] }}</h3>
                                <p class="si-rs-desc">{{ $r['desc'] }}</p>
                                <dl class="si-rs-detail">
                                    @foreach ($r['detail'] as $d)
                                        <div class="si-rs-detail-cell">
                                            <dt class="si-rs-detail-key">{{ $d['k'] }}</dt>
                                            <dd class="si-rs-detail-val">{{ $d['v'] }}<small>{{ $d['s'] }}</small></dd>
                                        </div>
                                    @endforeach
                                </dl>
                                <div class="si-rs-cta-row">
                                    <button type="button" class="si-rs-cta" data-open-assessment-modal>
                                        <span>{{ $r['cta']['label'] }}</span>
                                        <span class="si-rs-cta-arrow" aria-hidden="true">→</span>
                                    </button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="si-rs-helper si-rs-helper--standalone">
                    <span class="si-rs-helper-icon" aria-hidden="true"><i class="fas fa-headset"></i></span>
                    <span class="si-rs-helper-text">{{ __('Not sure which route fits where you are now?') }}</span>
                    <a class="si-rs-helper-link" href="https://wa.me/353868179430" target="_blank" rel="noopener">
                        <span>{{ __('Talk with an advisor') }}</span>
                        <span class="si-rs-helper-arrow" aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: Study × Career — pathway editorial --}}
    @php
        $aiCcJourney = [
            ['icon' => 'fa-book-open',      'label' => __('Your study')],
            ['icon' => 'fa-graduation-cap', 'label' => __('Graduate')],
            ['icon' => 'fa-people-arrows',  'label' => __('Career Bridge')],
            ['icon' => 'fa-briefcase',      'label' => __('Your career')],
        ];
        $aiCcSituation = [__('Academic background'), __('English level'), __('Visa timing'), __('Work experience'), __('Career goals')];
        $aiCcOutcomes  = [__('A clear study route'), __('Stronger employability'), __('Career network'), __('Long-term opportunities')];
    @endphp
    <section class="content-section content-section--alt cc">
        <div class="container">
            <div class="cc-head">
                <span class="section-kicker">{{ __('Study × Career') }}</span>
                <h2 class="section-title">{{ __('Your next course should support your future career') }}</h2>
                <p class="cc-lead">{{ __('At CI Ireland we help students already in Ireland think beyond the next enrolment — connecting your study choice with employability, network and long-term opportunities in the Irish market.') }}</p>
            </div>

            <ol class="cc-journey" aria-label="{{ __('From study to career') }}">
                @foreach ($aiCcJourney as $i => $stop)
                    <li class="cc-stop @if ($i === 2) is-anchor @endif" data-step="{{ $i }}">
                        <span class="cc-stop-dot" aria-hidden="true"><i class="fas {{ $stop['icon'] }}"></i></span>
                        <span class="cc-stop-label">{{ $stop['label'] }}</span>
                    </li>
                @endforeach
            </ol>

            <div class="cc-halves">
                <div class="cc-half cc-half--study">
                    <span class="cc-half-kicker">{{ __('Your situation today') }}</span>
                    <ul class="cc-half-list">
                        @foreach ($aiCcSituation as $attr)
                            <li>{{ $attr }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="cc-bridge" aria-hidden="true">
                    <span class="cc-bridge-icon"><i class="fas fa-arrows-left-right"></i></span>
                </div>
                <div class="cc-half cc-half--career">
                    <span class="cc-half-kicker">{{ __('Where it leads') }}</span>
                    <ul class="cc-half-list">
                        @foreach ($aiCcOutcomes as $attr)
                            <li>{{ $attr }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <blockquote class="cc-manifesto">
                <p>{{ __('We do not promise a job. We help you make study decisions with a clearer view of where they could lead.') }}</p>
            </blockquote>

            <div class="cc-cta-row">
                <a class="btn btn-primary" href="{{ $lr('start-your-plan') }}">
                    {{ __('Plan My Study and Career Route') }} <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- Section: Why early --}}
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Plan early') }}</span>
                <h2 class="section-title">{{ __('Why planning early matters') }}</h2>
                <p class="section-lead">{{ __('Waiting until your course is almost finished can limit your options.') }}</p>
            </div>
            <div class="ai-pillars">
                <div class="ai-pillar"><i class="fas fa-calendar"></i><p>{{ __('Some courses have specific intake dates.') }}</p></div>
                <div class="ai-pillar"><i class="fas fa-file"></i><p>{{ __('Some institutions require documents that take time to prepare.') }}</p></div>
                <div class="ai-pillar"><i class="fas fa-language"></i><p>{{ __('Some programmes require a minimum English level.') }}</p></div>
                <div class="ai-pillar"><i class="fas fa-piggy-bank"></i><p>{{ __('Some students need more time to organise their budget.') }}</p></div>
                <div class="ai-pillar"><i class="fas fa-passport"></i><p>{{ __('Some visa-related decisions require careful timing.') }}</p></div>
            </div>
            <p class="quote-block">{{ __('The earlier you understand your options, the more prepared you can be. At CI Ireland, we help you avoid rushed decisions and build a route that makes sense before deadlines become urgent.') }}</p>
        </div>
    </section>

    @include('partials.process-scroll-stack', [
        'kicker' => __('Step by step'),
        'title' => __('How CI Ireland can support your next step'),
        'lead' => __('Our process is designed to turn confusion into clear next steps in Ireland.'),
        'steps' => [
            ['icon' => 'fa-user-check',       'title' => __('Profile Review'),                  'body' => __('We start by understanding where you are now: your English level, current course, visa situation, academic background, budget and goals.')],
            ['icon' => 'fa-route',            'title' => __('Route Analysis'),                  'body' => __('We identify which academic and professional routes may be compatible with your profile.')],
            ['icon' => 'fa-building-columns', 'title' => __('Course and Institution Guidance'), 'body' => __('We help you explore suitable institutions, programmes and intakes based on your situation.')],
            ['icon' => 'fa-file-lines',       'title' => __('Document Preparation'),            'body' => __('We guide you on the documents that may be required for your application and help you understand what should be prepared in advance.')],
            ['icon' => 'fa-paper-plane',      'title' => __('Application Support'),             'body' => __('We support you through the application process, offer stage, enrolment steps and important deadlines.')],
            ['icon' => 'fa-bridge',           'title' => __('Career Preparation'),              'body' => __('When relevant, we connect your academic journey with career preparation through Career Bridge.')],
        ],
    ])

    {{-- Section: Career first (rich callout reused from /study-in-ireland) --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="callout-card ai-career-callout">
                <div class="ai-career-callout-text">
                    <h3 class="callout-card-title">{{ __('Do not wait until graduation to think about career') }}</h3>
                    <p>{{ __('Career planning should not start only when your course is ending. The earlier you understand your strengths, gaps, English level, target sector and market expectations, the better prepared you can be.') }}</p>
                    <p>{{ __('Career Bridge can support students who want to start building their professional profile while they are still studying, helping them prepare their CV, LinkedIn, interview skills and career direction for the Irish job market.') }}</p>
                    <a class="btn btn-primary" href="{{ $lr('career-bridge') }}">{{ __('Explore Career Bridge') }} <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="ai-career-callout-visual">
                    <img src="{{ asset('images/career-mind.webp') }}"
                         alt="{{ __('Plan your course with your future career in mind') }}"
                         loading="lazy">
                    <div class="ai-career-callout-badge">
                        <i class="fas fa-bullseye"></i>
                        <div>
                            <strong>{{ __('Course') }} → {{ __('Career') }}</strong>
                            <span>{{ __('Aligned by design') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: Common situations --}}
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('We hear this every day') }}</span>
                <h2 class="section-title">{{ __('Common situations we see every day') }}</h2>
            </div>
            <div class="ai-situations">
                @foreach ([
                    ['"My English course is ending and I do not know what to do."', 'We can help you understand whether Higher Education, Academic English, Pathway or another route may make sense for your profile.'],
                    ['"I want to go to college, but I am not sure if my English is enough."', 'We can help you understand what level may be required and whether you need further academic preparation.'],
                    ['"I want to stay in Ireland, but I do not know which course to choose."', 'We help you analyse your options based on your academic background, budget, visa timing and career goals.'],
                    ['"I am afraid of choosing the wrong course."', 'That concern is valid. A wrong choice can affect your finances, studies and future plans. Our role is to help you make a more informed decision.'],
                    ['"I want to study something that can help my career."', 'We help you connect your study options with your professional profile and market direction.'],
                    ['"I have an EU passport and I want to move into Higher Education or change careers in Ireland."', 'We can help you understand which programmes match your background and how to transition into a new area, without visa constraints limiting your options.'],
                    ['"I am on Stamp 1 or Stamp 1G and want to take a real step in my career."', 'We can help you align a course or career plan with your sector, English level, schedule and goals.'],
                ] as $situation)
                    <div class="ai-situation">
                        <div class="ai-situation-quote">{{ __($situation[0]) }}</div>
                        <div class="ai-situation-answer">{{ __($situation[1]) }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Section: Why CI when you are here --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="callout-card ai-why-callout">
                <i class="ai-why-glyph fas fa-quote-left" aria-hidden="true"></i>
                <h3 class="callout-card-title">{{ __('Why choose CI Ireland when you are already here?') }}</h3>
                <p>{{ __('CI Ireland is based in Dublin, close to the reality of international students living in Ireland. Our team understands the realities of building a future in Ireland — whether that means English progression, applying for Higher Education, navigating visa or EU residency, budgeting, or taking a real career step.') }}</p>
                <p><strong>{{ __('We are here to help you make decisions with more structure, not pressure.') }}</strong></p>
                <div class="ai-why-chips">
                    <span class="ai-why-chip"><i class="fas fa-location-dot"></i> {{ __('Dublin-based') }}</span>
                    <span class="ai-why-chip"><i class="fas fa-globe"></i> {{ __('EN/PT support') }}</span>
                    <span class="ai-why-chip"><i class="fas fa-bullseye"></i> {{ __('Profile-first') }}</span>
                </div>
                <a class="btn btn-primary" href="{{ $lr('why-ci-ireland') }}">{{ __('Learn more about CI Ireland') }} <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    @include('partials.faq-accordion', [
        'title' => __('Common questions'),
        'items' => [
            ['q' => __('Can I move from English school to college in Ireland?'), 'a' => __('In many cases, yes. However, it depends on your English level, academic background, documents, visa situation, budget and timeline. A profile assessment can help you understand your options.')],
            ['q' => __('Do I need to finish my English course before planning college?'), 'a' => __('No. In fact, planning earlier can give you more time to prepare documents, improve your English, review intakes and understand your budget.')],
            ['q' => __('What happens if my English is not enough for college yet?'), 'a' => __('You may need further preparation through Academic English, an English test preparation route or a suitable pathway, depending on your profile and the institution requirements.')],
            ['q' => __('Can CI Ireland help me choose a course?'), 'a' => __('Yes. CI Ireland helps you understand study options that may be compatible with your profile, goals, English level, budget and future plans.')],
            ['q' => __('Can CI Ireland help with my application?'), 'a' => __('Yes. CI Ireland supports students with institution guidance, application steps, documents, offers, enrolment and important deadlines.')],
            ['q' => __('Does CI Ireland guarantee that I can stay in Ireland?'), 'a' => __('No. Immigration decisions depend on official rules, individual circumstances and documentation. CI Ireland helps you understand your study options and plan your next steps with more clarity, but we do not guarantee visa outcomes or long-term stay.')],
            ['q' => __('Does CI Ireland guarantee a job after my course?'), 'a' => __('No. We do not promise guaranteed employment. Through Career Bridge, we support career preparation, market guidance and connection with compatible opportunities when available.')],
        ],
    ])

    @include('partials.final-cta', [
        'title' => __('Your next step in Ireland deserves a clear plan.'),
        'text' => __('Do not wait until your course is almost finished to understand your options. Whether you want to move into Higher Education, improve your academic English, prepare for your career or understand your next route in Ireland, CI Ireland can help you plan with more confidence.'),
        'primaryCta' => ['label' => __('Plan My Next Step'), 'modal' => true],
        'secondaryCta' => ['label' => __('Talk to an Advisor'), 'href' => 'https://wa.me/353868179430', 'newTab' => true],
    ])

    @include('partials.profile-assessment-modal', [
        'modalKicker' => __('Free Profile Assessment'),
        'modalTitle' => __('Plan Your Next Step in Ireland'),
        'modalSubtitle' => __("Tell us a bit about your situation and we'll get in touch with personalized guidance."),
        'secondQuestion' => 'visa',
        'leadSource' => 'already-in-ireland',
        'modalCtaLabel' => __('Request Free Assessment'),
    ])
@endsection

@push('scripts')
    <script src="{{ asset('js/assessment-modal.js') }}" defer></script>
    <script src="{{ asset('js/process-scroll-stack.js') }}" defer></script>
@endpush
