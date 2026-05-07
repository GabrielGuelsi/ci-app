@extends('layouts.app')

@php $pageActive = 'study-in-ireland'; @endphp

@section('title', 'CI Ireland — ' . __('Study in Ireland'))

@section('head')
    <link rel="preload" as="image" href="{{ asset('images/hero-ireland-cliff.webp') }}">
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/new-shared.css', 'resources/css/study-in-ireland.css'])
    @else
        <link rel="stylesheet" href="/css/new-shared.css">
        <link rel="stylesheet" href="/css/study-in-ireland.css">
    @endif
@endsection

@include('partials.page-shell')

@section('content')
    {{-- Cinematic Hero --}}
    <section class="si-hero">
        <div class="si-hero-bg" style="background-image: url('{{ asset('images/hero-ireland-cliff.webp') }}');" aria-hidden="true"></div>
        <div class="si-hero-overlay" aria-hidden="true"></div>
        <div class="si-hero-glow" aria-hidden="true"></div>
        <div class="container">
            <div class="si-hero-content">
                <span class="si-hero-kicker animate-in" style="animation-delay:.05s">
                    <i class="fas fa-graduation-cap"></i> {{ __('Study in Ireland') }}
                </span>
                <h1 class="si-hero-title animate-in" style="animation-delay:.15s">
                    {{ __('Study in Ireland with a plan that goes') }}<br>
                    <span class="si-hero-title-accent">{{ __('beyond choosing a course') }}</span>
                </h1>
                <p class="si-hero-subtitle animate-in" style="animation-delay:.3s">
                    {{ __('CI Ireland helps international students find the right academic route based on your English level, visa situation, budget, academic background, career goals and long-term plans in Ireland.') }}
                </p>
                <div class="si-hero-actions animate-in" style="animation-delay:.45s">
                    <button type="button" class="btn btn-primary btn-lg" data-open-assessment-modal>
                        {{ __('Start My Profile Assessment') }} <i class="fas fa-arrow-right"></i>
                    </button>
                    <a class="btn btn-outline-light" href="#routes">
                        {{ __('Explore Study Routes') }}
                    </a>
                </div>
                <div class="si-hero-meta animate-in" style="animation-delay:.6s">
                    <div class="si-hero-stat"><strong>15+</strong><span>{{ __('Study areas') }}</span></div>
                    <div class="si-hero-stat"><strong>12+</strong><span>{{ __('Partner institutions') }}</span></div>
                    <div class="si-hero-stat"><strong>{{ __('Ireland') }}</strong><span>{{ __('Local team') }}</span></div>
                </div>
            </div>
        </div>
        <div class="si-hero-scroll" aria-hidden="true">
            <span></span>
        </div>
    </section>

    {{-- Section: Why a wrong route can be costly --}}
    <section class="content-section content-section--alt si-why">
        <div class="container">
            <div class="si-why-split">
                <div class="si-why-split-left">
                    <span class="si-why-kicker">{{ __('Why this matters') }}</span>
                    <h2 class="si-why-title">{{ __('Studying in Ireland is a big decision. Choosing the wrong route can be costly.') }}</h2>
                </div>
                <div class="si-why-split-right">
                    <p>{{ __('Many students start by looking for a course, an institution or the lowest price. But in reality, your academic choice can affect much more than your enrolment.') }}</p>
                    <p>{{ __('It can influence your visa planning, budget, English preparation, academic progression, employability and long-term options in Ireland. That is why CI Ireland starts by understanding your profile before recommending any route.') }}</p>
                </div>
            </div>

            @php
                $struggles = [
                    ['k' => 'english',  'icon' => 'fa-language',       'title' => 'English Level',    'desc' => 'Understanding whether your English is ready for college or if you need academic preparation first.'],
                    ['k' => 'visa',     'icon' => 'fa-passport',       'title' => 'Visa Planning',    'desc' => 'Choosing a route that makes sense for your current or future visa situation.'],
                    ['k' => 'budget',   'icon' => 'fa-euro-sign',      'title' => 'Budget',           'desc' => 'Understanding the real financial commitment before making a decision.'],
                    ['k' => 'course',   'icon' => 'fa-book-open',      'title' => 'Course Choice',    'desc' => 'Avoiding the mistake of choosing a programme only because it is available or affordable.'],
                    ['k' => 'career',   'icon' => 'fa-bullseye',       'title' => 'Career Goals',     'desc' => 'Connecting your academic route with your professional direction.'],
                    ['k' => 'docs',     'icon' => 'fa-file-lines',     'title' => 'Documents',        'desc' => 'Knowing what needs to be prepared before deadlines become a problem.'],
                    ['k' => 'dates',    'icon' => 'fa-calendar-days',  'title' => 'Intake Dates',     'desc' => 'Planning the right timing instead of rushing into the wrong intake.'],
                    ['k' => 'plans',    'icon' => 'fa-earth-europe',   'title' => 'Long-Term Plans',  'desc' => 'Thinking beyond enrolment and considering what comes after the course.'],
                ];
            @endphp

            <div class="si-tabs" role="tablist" aria-label="{{ __('What students often struggle with') }}">
                <ul class="si-tabs-list">
                    @foreach ($struggles as $i => $s)
                        <li>
                            <button type="button"
                                    class="si-tab @if($i === 0) is-active @endif"
                                    role="tab"
                                    aria-selected="@if($i === 0) true @else false @endif"
                                    aria-controls="si-panel-{{ $s['k'] }}"
                                    id="si-tab-{{ $s['k'] }}"
                                    data-target="si-panel-{{ $s['k'] }}">
                                <span class="si-tab-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <span class="si-tab-icon"><i class="fas {{ $s['icon'] }}"></i></span>
                                <span class="si-tab-label">{{ __($s['title']) }}</span>
                                <span class="si-tab-arrow" aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
                            </button>
                        </li>
                    @endforeach
                </ul>

                <div class="si-tabs-content">
                    <h3 class="si-tabs-title">{{ __('What students often struggle with') }}</h3>
                    <div class="si-tab-panels">
                        @foreach ($struggles as $i => $s)
                            <article class="si-tab-panel @if($i === 0) is-active @endif"
                                     role="tabpanel"
                                     id="si-panel-{{ $s['k'] }}"
                                     aria-labelledby="si-tab-{{ $s['k'] }}"
                                     @if($i !== 0) hidden @endif>
                                <span class="si-panel-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }} / 08</span>
                                <div class="si-panel-icon"><i class="fas {{ $s['icon'] }}"></i></div>
                                <h4 class="si-panel-title">{{ __($s['title']) }}</h4>
                                <p class="si-panel-desc">{{ __($s['desc']) }}</p>
                                <button type="button" class="si-panel-cta" data-open-assessment-modal>
                                    {{ __('Plan this with us') }} <i class="fas fa-arrow-right"></i>
                                </button>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: Profile-first approach --}}
    <section class="content-section">
        <div class="container">
            <div class="si-why-split">
                <div class="si-why-split-left">
                    <span class="si-why-kicker">{{ __('Our approach') }}</span>
                    <h2 class="si-why-title">{{ __('Our recommendation starts with your profile, not with a course catalogue.') }}</h2>
                </div>
                <div class="si-why-split-right">
                    <p>{{ __('Our role is to help you make a clearer, safer and more strategic academic decision.') }}</p>
                    <p>{{ __('Before presenting options, we look at the factors that can directly affect your journey in Ireland. We analyse:') }}</p>
                </div>
            </div>

            @php
                $factors = [
                    ['icon' => 'fa-language',       'label' => 'Your English level'],
                    ['icon' => 'fa-graduation-cap', 'label' => 'Your academic background'],
                    ['icon' => 'fa-briefcase',      'label' => 'Your professional experience'],
                    ['icon' => 'fa-passport',       'label' => 'Your current or future visa situation'],
                    ['icon' => 'fa-euro-sign',      'label' => 'Your budget'],
                    ['icon' => 'fa-file-lines',     'label' => 'Your documents'],
                    ['icon' => 'fa-calendar-days',  'label' => 'Your ideal timeline'],
                    ['icon' => 'fa-compass',        'label' => 'Your preferred study area'],
                    ['icon' => 'fa-bullseye',       'label' => 'Your career goals'],
                    ['icon' => 'fa-earth-europe',   'label' => 'Your long-term plans in Ireland'],
                    ['icon' => 'fa-building-columns', 'label' => 'Compatible institutions and programmes'],
                ];
            @endphp

            <div class="si-orbit">
                <div class="si-orbit-canvas">
                    <div class="si-orbit-ring" aria-hidden="true"></div>
                    <div class="si-orbit-ring si-orbit-ring--inner" aria-hidden="true"></div>

                    <div class="si-orbit-center">
                        <div class="si-orbit-center-glow" aria-hidden="true"></div>
                        <div class="si-orbit-center-icon"><i class="fas fa-user"></i></div>
                        <div class="si-orbit-center-title">{{ __('Your Profile') }}</div>
                        <div class="si-orbit-center-sub">{{ __('what we look at') }}</div>
                    </div>

                    @foreach ($factors as $i => $f)
                        @php
                            $angle = ($i * 360) / count($factors);
                            $side = $angle > 180 ? 'left' : 'right';
                        @endphp
                        <button type="button"
                                class="si-orbit-item si-orbit-item--{{ $side }}"
                                style="--angle: {{ $angle }}deg"
                                data-orbit-index="{{ $i }}"
                                aria-label="{{ __($f['label']) }}">
                            <span class="si-orbit-dot" aria-hidden="true"></span>
                            <span class="si-orbit-chip">
                                <i class="fas {{ $f['icon'] }}"></i>
                                <span class="si-orbit-chip-label">{{ __($f['label']) }}</span>
                            </span>
                        </button>
                    @endforeach
                </div>
            </div>

            <p class="quote-block">{{ __('The right choice is not always the fastest one. It is the one that makes sense for your future.') }}</p>
        </div>
    </section>

    {{-- Section: Career-aware course choice CTA --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="callout-card si-career-callout">
                <div class="si-career-callout-text">
                    <h3 class="callout-card-title">{{ __('Choose your course with your future career in mind') }}</h3>
                    <p>{{ __('Your study route in Ireland should not be chosen in isolation. The course you choose may influence your professional direction, employability, confidence, network and future opportunities.') }}</p>
                    <p>{{ __('That is why CI Ireland helps students think about career from the beginning of the academic planning process. We look at your background, goals, English level and preferred areas of study to help you understand which routes may be more aligned with your future plans.') }}</p>
                    <a class="btn btn-primary" href="{{ $lr('career-bridge') }}">{{ __('Connect My Study Plan with Career Goals') }} <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="si-career-callout-visual">
                    <img src="{{ asset('images/career-mind.webp') }}" alt="{{ __('Plan your course with your future career in mind') }}" loading="lazy">
                    <div class="si-career-callout-badge">
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

    {{-- Section: Find the right route --}}
    @php
        $routes = [
            [
                'tone'     => 'english',
                'icon'     => 'fa-language',
                'num'      => '01',
                'stage'    => 'foundation',
                'profiles' => ['secondary', 'english-school', 'professional'],
                'sub'      => __('Academic fluency'),
                'title'    => __('Academic English'),
                'desc'     => __('Improve your English with a clear academic purpose.'),
                'detail'   => [
                    ['k' => __('Best for'), 'v' => __('College preparation'), 's' => __('English not yet at academic level')],
                    ['k' => __('Focus'),    'v' => __('Writing & exams'),     's' => __('Plus interviews and presentations')],
                    ['k' => __('Outcome'),  'v' => __('Academic readiness'),  's' => __('Confidence for college and work')],
                ],
                'cta' => ['type' => 'modal', 'label' => __('Learn About Academic English')],
            ],
            [
                'tone'     => 'pathway',
                'icon'     => 'fa-route',
                'num'      => '02',
                'stage'    => 'foundation',
                'profiles' => ['secondary', 'english-school', 'graduate'],
                'sub'      => __('Preparatory route'),
                'title'    => __('Pathway Programmes'),
                'desc'     => __('A preparatory route before college, university or masters.'),
                'detail'   => [
                    ['k' => __('Best for'), 'v' => __('Not yet at requirements'),    's' => __('Academic or English level')],
                    ['k' => __('Leads to'), 'v' => __('UG, PG or Masters'),          's' => __('Smoother transition to higher education')],
                    ['k' => __('Focus'),    'v' => __('Academic adaptation'),        's' => __('Adjust to the Irish system')],
                ],
                'cta' => ['type' => 'modal', 'label' => __('Understand Pathways')],
            ],
            [
                'tone'     => 'ug',
                'icon'     => 'fa-graduation-cap',
                'num'      => '03',
                'stage'    => 'degree',
                'profiles' => ['secondary'],
                'sub'      => __("Bachelor's level"),
                'title'    => __('Undergraduate Degrees'),
                'desc'     => __("Start a bachelor's degree in Ireland from secondary school."),
                'detail'   => [
                    ['k' => __('Best for'), 'v' => __('Secondary school done'), 's' => __('Ready for a full degree')],
                    ['k' => __('Outcome'),  'v' => __("Bachelor's degree"),     's' => __('Recognised in Ireland')],
                    ['k' => __('Career'),   'v' => __('Long-term foundation'), 's' => __('Employability and direction')],
                ],
                'cta' => ['type' => 'modal', 'label' => __('Explore Undergraduate Options')],
            ],
            [
                'tone'     => 'pg',
                'icon'     => 'fa-user-graduate',
                'num'      => '04',
                'stage'    => 'advanced',
                'profiles' => ['graduate', 'professional'],
                'sub'      => __('Specialise & advance'),
                'title'    => __('Postgraduate Programmes'),
                'desc'     => __('Specialise, change direction or strengthen your academic profile.'),
                'detail'   => [
                    ['k' => __('Best for'), 'v' => __('Graduates with a degree'),    's' => __('Looking to specialise or pivot')],
                    ['k' => __('Format'),   'v' => __('Shorter than a new degree'), 's' => __('Focused academic route')],
                    ['k' => __('Career'),   'v' => __('Connect prior experience'),  's' => __('To new professional opportunities')],
                ],
                'cta' => ['type' => 'modal', 'label' => __('Explore Postgraduate Options')],
            ],
            [
                'tone'     => 'masters',
                'icon'     => 'fa-medal',
                'num'      => '05',
                'stage'    => 'advanced',
                'profiles' => ['graduate', 'professional'],
                'sub'      => __('Advanced qualification'),
                'title'    => __('Masters'),
                'desc'     => __('An advanced qualification connected to your career goals.'),
                'detail'   => [
                    ['k' => __('Best for'), 'v' => __('Graduates seeking depth'), 's' => __('Strong academic profile')],
                    ['k' => __('Outcome'),  'v' => __("Master's degree"),          's' => __('Internationally recognised')],
                    ['k' => __('Career'),   'v' => __('Advanced positioning'),    's' => __('For your target sector')],
                ],
                'cta' => ['type' => 'modal', 'label' => __('Explore Masters')],
            ],
            [
                'tone'     => 'bridge',
                'icon'     => 'fa-arrow-up-right-dots',
                'num'      => '06',
                'stage'    => 'transition',
                'profiles' => ['english-school'],
                'sub'      => __('Transition route'),
                'title'    => __('English → Higher Education'),
                'desc'     => __('Move from English school to college with a clear plan.'),
                'detail'   => [
                    ['k' => __('Best for'), 'v' => __('Currently in English school'), 's' => __('In Ireland or planning to start')],
                    ['k' => __('Includes'), 'v' => __('Visa, intake, budget'),        's' => __('Documents and English level')],
                    ['k' => __('Outcome'),  'v' => __('Clear transition plan'),       's' => __('A stronger future in Ireland')],
                ],
                'cta' => ['type' => 'link', 'href' => $lr('already-in-ireland'), 'label' => __('Plan My Transition')],
            ],
        ];

        $profiles = [
            ['key' => 'secondary',      'label' => __('Secondary school')],
            ['key' => 'english-school', 'label' => __('English school in Ireland')],
            ['key' => 'graduate',       'label' => __('I have a degree')],
            ['key' => 'professional',   'label' => __('A professional career')],
        ];
    @endphp
    <section class="content-section" id="routes">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Possible routes') }}</span>
                <h2 class="section-title">{{ __('Find the right study route for your profile') }}</h2>
                <p class="section-lead">{{ __('Every student arrives in Ireland at a different stage. That is why CI Ireland helps you understand which academic route makes sense for your current situation, your goals and your future plans.') }}</p>
            </div>

            <div class="si-rs">
                <div class="si-rs-profile" role="group" aria-label="{{ __('Filter routes by your profile') }}">
                    <span class="si-rs-profile-label">{{ __("I'm starting from") }}</span>
                    <div class="si-rs-chips">
                        @foreach ($profiles as $p)
                            <button type="button"
                                    class="si-rs-chip"
                                    data-profile="{{ $p['key'] }}"
                                    aria-pressed="false">
                                {{ $p['label'] }}
                            </button>
                        @endforeach
                        <button type="button"
                                class="si-rs-chip si-rs-chip--reset is-active"
                                data-profile="all"
                                aria-pressed="true">
                            {{ __('Show all routes') }}
                        </button>
                    </div>

                    <div class="si-rs-helper">
                        <span class="si-rs-helper-icon" aria-hidden="true"><i class="fas fa-headset"></i></span>
                        <span class="si-rs-helper-text">{{ __('Not sure which one fits?') }}</span>
                        <a class="si-rs-helper-link" href="https://wa.me/353868179430" target="_blank" rel="noopener">
                            <span>{{ __('Talk with an advisor') }}</span>
                            <span class="si-rs-helper-arrow" aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>

                <div class="si-rs-list" data-active-profile="all" role="list">
                    <div class="si-rs-divider" data-role="recommended" hidden>
                        <span>{{ __('Recommended for you') }}</span>
                    </div>
                    <div class="si-rs-divider" data-role="other" hidden>
                        <span>{{ __('Other routes worth knowing') }}</span>
                    </div>

                    @foreach ($routes as $i => $r)
                        <article class="si-rs-card"
                                 role="listitem"
                                 data-tone="{{ $r['tone'] }}"
                                 data-stage="{{ $r['stage'] }}"
                                 data-profiles="{{ implode(' ', $r['profiles']) }}"
                                 data-default-order="{{ $i }}"
                                 style="order: {{ $i + 10 }};">
                            <div class="si-rs-rail" aria-hidden="true">
                                <span class="si-rs-icon"><i class="fas {{ $r['icon'] }}"></i></span>
                            </div>
                            <div class="si-rs-body">
                                <div class="si-rs-meta">
                                    <span class="si-rs-stage">{{ $r['sub'] }}</span>
                                    <span class="si-rs-badge">
                                        <i class="fas fa-star"></i>
                                        {{ __('Recommended for you') }}
                                    </span>
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
                                    @if ($r['cta']['type'] === 'modal')
                                        <button type="button" class="si-rs-cta" data-open-assessment-modal>
                                            <span>{{ $r['cta']['label'] }}</span>
                                            <span class="si-rs-cta-arrow" aria-hidden="true">→</span>
                                        </button>
                                    @else
                                        <a class="si-rs-cta" href="{{ $r['cta']['href'] }}">
                                            <span>{{ $r['cta']['label'] }}</span>
                                            <span class="si-rs-cta-arrow" aria-hidden="true">→</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    {{-- Section: Already in Ireland CTA --}}
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
                    <a class="btn btn-primary" href="{{ $lr('already-in-ireland') }}">{{ __('Plan My Next Step') }} <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: Process (sticky scroll-stack) --}}
    @include('partials.process-scroll-stack', [
        'kicker' => __('Our process'),
        'title' => __('How planning with CI Ireland works'),
        'lead' => __('Our process is designed to turn confusion into clear next steps.'),
        'steps' => [
            ['icon' => 'fa-user-check', 'title' => __('Profile Assessment'), 'body' => __('We understand your English level, academic background, visa situation, budget and goals.')],
            ['icon' => 'fa-route', 'title' => __('Route Definition'), 'body' => __('We identify which academic paths may be compatible with your profile and plans.')],
            ['icon' => 'fa-building-columns', 'title' => __('Institution Shortlist'), 'body' => __('We present suitable institutions and programmes aligned with your reality.')],
            ['icon' => 'fa-paper-plane', 'title' => __('Application Support'), 'body' => __('We guide you through documents, deadlines, application, offer and enrolment steps.')],
            ['icon' => 'fa-bridge', 'title' => __('Career Connection'), 'body' => __('When relevant, we connect your academic journey with career preparation through Career Bridge.')],
        ],
    ])

    {{-- Section: Career-connection editorial --}}
    @php
        $ccJourney = [
            ['icon' => 'fa-book-open',      'label' => __('Your study')],
            ['icon' => 'fa-graduation-cap', 'label' => __('Graduate')],
            ['icon' => 'fa-people-arrows',  'label' => __('Career Bridge')],
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

            <blockquote class="cc-manifesto">
                <p>{{ __('We do not promise a job. We help you make study decisions with a clearer view of where they could lead.') }}</p>
            </blockquote>

            <div class="cc-cta-row">
                <a class="btn btn-primary" href="{{ $lr('career-bridge') }}">
                    {{ __('Explore Career Bridge') }} <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- Section: Partner institutions (text marquee, matches home pattern) --}}
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
    <section class="content-section si-partners-section">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Partner institutions in Ireland') }}</span>
                <h2 class="section-title">{{ __('Recognised institutions across academic levels') }}</h2>
                <p class="section-lead">{{ __('CI Ireland works with recognised Irish institutions, offering different study options, academic levels and subject areas for international students. Our role is to help you understand which options may make sense for your profile, not simply show you a list of programmes.') }}</p>
            </div>
        </div>
        <div class="si-marquee">
            <div class="si-marquee-track">
                <ul class="si-marquee-list" aria-label="{{ __('Partner institutions') }}">
                    @foreach ($partnerColleges as $college)
                        <li class="si-marquee-item">
                            <span class="si-marquee-name">{{ $college }}</span>
                            <span class="si-marquee-sep" aria-hidden="true"></span>
                        </li>
                    @endforeach
                </ul>
                {{-- duplicated for seamless loop --}}
                <ul class="si-marquee-list" aria-hidden="true">
                    @foreach ($partnerColleges as $college)
                        <li class="si-marquee-item">
                            <span class="si-marquee-name">{{ $college }}</span>
                            <span class="si-marquee-sep" aria-hidden="true"></span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- Section: Campuses across Ireland --}}
    <section class="content-section content-section--alt si-life-section">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Where you\'ll study') }}</span>
                <h2 class="section-title">{{ __('Campuses across Ireland') }}</h2>
                <p class="section-lead">{{ __('Modern facilities, central locations and recognised institutions across Dublin and beyond.') }}</p>
            </div>
            <div class="si-life-grid">
                <figure class="si-life-tile si-life-tile--tall">
                    <img src="{{ asset('images/campus/dcu.webp') }}" alt="" loading="lazy">
                    <figcaption>DCU — Dublin City University</figcaption>
                </figure>
                <figure class="si-life-tile">
                    <img src="{{ asset('images/campus/griffith.webp') }}" alt="" loading="lazy">
                    <figcaption>Griffith College</figcaption>
                </figure>
                <figure class="si-life-tile">
                    <img src="{{ asset('images/campus/nci.webp') }}" alt="" loading="lazy">
                    <figcaption>National College of Ireland</figcaption>
                </figure>
                <figure class="si-life-tile">
                    <img src="{{ asset('images/campus/galway.webp') }}" alt="" loading="lazy">
                    <figcaption>Galway Business School</figcaption>
                </figure>
                <figure class="si-life-tile si-life-tile--wide">
                    <img src="{{ asset('images/campus/dbs.webp') }}" alt="" loading="lazy">
                    <figcaption>Dublin Business School</figcaption>
                </figure>
                <figure class="si-life-tile">
                    <img src="{{ asset('images/campus/tud.webp') }}" alt="" loading="lazy">
                    <figcaption>TU Dublin</figcaption>
                </figure>
            </div>
        </div>
    </section>

    {{-- Section: Study areas --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Study areas') }}</span>
                <h2 class="section-title">{{ __('Study areas that may be part of your route') }}</h2>
                <p class="section-lead">{{ __('Depending on the institution, intake, entry requirements and English level, international students may find options across different study areas.') }}</p>
            </div>
            @php
                $areas = [
                    ['fa-briefcase',       'Business'],
                    ['fa-people-group',    'Management'],
                    ['fa-bullhorn',        'Marketing'],
                    ['fa-chart-line',      'Data Analytics'],
                    ['fa-server',          'IT'],
                    ['fa-microchip',       'Computing'],
                    ['fa-coins',           'Finance'],
                    ['fa-calculator',      'Accounting'],
                    ['fa-utensils',        'Hospitality'],
                    ['fa-stethoscope',     'Healthcare Management'],
                    ['fa-users',           'Human Resources'],
                    ['fa-diagram-project', 'Project Management'],
                    ['fa-truck',           'Supply Chain'],
                    ['fa-shield-halved',   'Cybersecurity'],
                    ['fa-magnet',          'Digital Marketing'],
                ];
                $row1 = array_slice($areas, 0, 8);
                $row2 = array_slice($areas, 8);
            @endphp

            <div class="si-areas">
                <div class="si-areas-row si-areas-row--ltr">
                    <div class="si-areas-track">
                        @foreach (array_merge($row1, $row1) as $a)
                            <span class="si-areas-pill"><i class="fas {{ $a[0] }}"></i> {{ __($a[1]) }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="si-areas-row si-areas-row--rtl" aria-hidden="true">
                    <div class="si-areas-track">
                        @foreach (array_merge($row2, $row2) as $a)
                            <span class="si-areas-pill"><i class="fas {{ $a[0] }}"></i> {{ __($a[1]) }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            <p class="si-disclaimer">{{ __('Course availability depends on the institution, entry requirements, English level and intake.') }}</p>
        </div>
    </section>

    {{-- Section: Why study in Ireland --}}
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Why Ireland') }}</span>
                <h2 class="section-title">{{ __('Why study in Ireland?') }}</h2>
                <p class="section-lead">{{ __('Ireland can be a strategic choice for international students looking for quality education, English immersion, multicultural experience and connection with a dynamic professional environment. With recognised institutions, an international student community and opportunities to develop English in daily life, Ireland can offer more than a qualification. It can become part of a wider academic and professional journey.') }}</p>
            </div>
            <div class="si-why-bento">
                <figure class="si-why-bento-photo">
                    <img src="{{ asset('images/corporate/co-dublin.webp') }}"
                         alt="{{ __('Dublin docklands and Samuel Beckett Bridge at twilight') }}"
                         loading="lazy">
                    <figcaption>
                        <small>{{ __('Dublin') }}</small>
                        <span>{{ __('Modern Ireland, where your route begins') }}</span>
                    </figcaption>
                </figure>
                <div class="si-why-bento-cards">
                    <div class="feature-card">
                        <div class="feature-card-icon"><i class="fas fa-globe"></i></div>
                        <h3 class="feature-card-title">{{ __('International Education') }}</h3>
                        <p class="feature-card-text">{{ __('Study in an academic environment connected to students from different nationalities, backgrounds and goals.') }}</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-card-icon"><i class="fas fa-comments"></i></div>
                        <h3 class="feature-card-title">{{ __('English in Real Life') }}</h3>
                        <p class="feature-card-text">{{ __('Develop your English through study, work, daily life and social interaction.') }}</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-card-icon"><i class="fas fa-briefcase"></i></div>
                        <h3 class="feature-card-title">{{ __('Market Connection') }}</h3>
                        <p class="feature-card-text">{{ __('Ireland has a dynamic professional ecosystem, with international companies and opportunities across different sectors.') }}</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-card-icon"><i class="fas fa-leaf"></i></div>
                        <h3 class="feature-card-title">{{ __('Life Experience') }}</h3>
                        <p class="feature-card-text">{{ __('Living in Ireland can bring independence, maturity, cultural exchange and personal growth.') }}</p>
                    </div>
                </div>
            </div>
            <p class="quote-block">{{ __('Ireland can be a strong choice when your journey is planned with strategy.') }}</p>
        </div>
    </section>

    @include('partials.faq-accordion', [
        'title' => __('Common questions about studying in Ireland'),
        'items' => [
            ['q' => __('Do I need advanced English to study in Ireland?'), 'a' => __('It depends on the course and institution. Some routes require a higher English level, while others may allow previous preparation through Academic English or pathway programmes.')],
            ['q' => __('Can I move from English school to college in Ireland?'), 'a' => __('In many cases, yes. However, it depends on your English level, documents, academic background, visa situation, budget and timeline. That is why a profile assessment is important.')],
            ['q' => __('Does CI Ireland help with the application?'), 'a' => __('Yes. CI Ireland supports students with course selection, institution guidance, documents, application, offer, enrolment and important deadlines.')],
            ['q' => __('Can my course choice impact my career?'), 'a' => __('Yes. Your study area, academic level, institution, English level and professional background can all influence your future career strategy.')],
            ['q' => __('Does CI Ireland guarantee a job after the course?'), 'a' => __('No. No serious company should promise guaranteed employment. CI Ireland offers preparation, guidance and connection with compatible opportunities when available through Career Bridge.')],
        ],
    ])

    @include('partials.final-cta', [
        'title' => __('Do not choose your route in Ireland by trial and error'),
        'text' => __('The right course choice can impact your academic life, visa planning, budget and future opportunities. With CI Ireland, you have a Dublin-based team ready to help you understand your options and plan a clearer path to study in Ireland.'),
        'primaryCta' => ['label' => __('Start My Profile Assessment'), 'href' => $lr('start-your-plan')],
        'secondaryCta' => ['label' => __('Talk to an Advisor'), 'href' => 'https://wa.me/353868179430', 'newTab' => true],
    ])

    @include('partials.profile-assessment-modal')
@endsection

@push('scripts')
    <script src="{{ asset('js/assessment-modal.js') }}" defer></script>
    <script src="{{ asset('js/process-scroll-stack.js') }}" defer></script>
    <script src="{{ asset('js/study-in-ireland.js') }}" defer></script>
@endpush
