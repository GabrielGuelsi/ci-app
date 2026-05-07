@extends('layouts.app')

@php $pageActive = 'career-bridge'; @endphp

@section('title', 'CI Ireland — ' . __('Career Bridge'))

@section('head')
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/new-shared.css', 'resources/css/career-bridge.css'])
    @else
        <link rel="stylesheet" href="/css/new-shared.css">
        <link rel="stylesheet" href="/css/career-bridge.css">
    @endif
@endsection

@include('partials.page-shell')

@section('content')
    @include('partials.hero-split', [
        'kicker' => __('Career Bridge'),
        'title' => __('Career Bridge by CI Ireland'),
        'subtitle' => __('Career preparation and employer connection for international students, graduates and professionals building their future in Ireland.') . '<br><br>' . __('Career Bridge helps you understand the Irish job market, strengthen your professional profile and prepare for opportunities that match your background, studies and goals.'),
        'primaryCta' => ['label' => __('Start My Career Plan'), 'href' => $lr('start-your-plan')],
        'secondaryCta' => ['label' => __('Speak to a Career Advisor'), 'href' => 'https://wa.me/353868179430', 'newTab' => true],
    ])

    {{-- Section: Beginning of bigger plan --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Beyond the course') }}</span>
                <h2 class="section-title">{{ __('Studying in Ireland can be the beginning of a bigger plan') }}</h2>
                <p class="section-lead">{{ __('For many international students, the goal is not only to complete a course. The real question is:') }}</p>
            </div>
            <p class="quote-block">{{ __('How can my studies help me build a professional future in Ireland?') }}</p>
            <p class="cb-prose">{{ __('Career Bridge was created to help students, graduates and professionals connect their academic journey with career preparation, market understanding and employer opportunities when available.') }}</p>
            <p class="cb-prose">{{ __('We do not believe career planning should start only after graduation. It should start earlier, with a clear understanding of your skills, your English level, your experience, your study route and the type of opportunities that may fit your profile.') }}</p>
        </div>
    </section>

    {{-- Section: What is Career Bridge --}}
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('What it is') }}</span>
                <h2 class="section-title">{{ __('What is Career Bridge?') }}</h2>
            </div>
            <div class="cb-intro">
                <p>{{ __("Career Bridge is CI Ireland's career preparation and employer connection programme for international talent in Ireland.") }}</p>
                <p>{{ __('It supports students, graduates and professionals who want to become better prepared for the Irish job market. Through Career Bridge, we help you work on your professional profile, understand local expectations, prepare for interviews and connect your academic choices with your career goals.') }}</p>
                <p>{{ __('When suitable opportunities are available, Career Bridge may also support connections with employers looking for international talent.') }}</p>
            </div>
        </div>
    </section>

    {{-- Section: Start before graduation --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="callout-card">
                <h3 class="callout-card-title">{{ __('Career Bridge can start before you graduate') }}</h3>
                <p>{{ __('You do not need to wait until the end of your course to start thinking about your career. In fact, the earlier you understand the Irish job market, employer expectations and your own professional profile, the more prepared you can become.') }}</p>
                <p>{{ __('Career Bridge helps students connect their academic choices with career preparation from an earlier stage. This means looking at your studies, skills, English level, previous experience and future goals together, not separately.') }}</p>
                <a class="btn btn-primary" href="{{ $lr('start-your-plan') }}">{{ __('Start My Career Plan') }} <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    {{-- Section: Audience --}}
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Who it is for') }}</span>
                <h2 class="section-title">{{ __('Who is Career Bridge for?') }}</h2>
            </div>
            <div class="audience-grid">
                <div class="audience-card">
                    <h3>{{ __('International Students') }}</h3>
                    <p class="audience-card-tagline">{{ __('For students currently studying English, pathway, undergraduate, postgraduate or masters programmes who want to start preparing for their professional future in Ireland.') }}</p>
                    <ul>
                        <li>{{ __('Want to understand the Irish job market') }}</li>
                        <li>{{ __('Want to improve your CV and LinkedIn') }}</li>
                        <li>{{ __('Are unsure how to present your experience') }}</li>
                        <li>{{ __('Want to prepare for interviews') }}</li>
                        <li>{{ __('Want to connect your studies with future opportunities') }}</li>
                        <li>{{ __('Want to start career planning before graduation') }}</li>
                    </ul>
                </div>
                <div class="audience-card">
                    <h3>{{ __('Graduates') }}</h3>
                    <p class="audience-card-tagline">{{ __('For international graduates who want to move from study into the Irish job market with more preparation, clarity and confidence.') }}</p>
                    <ul>
                        <li>{{ __('Have recently completed or are close to completing your programme') }}</li>
                        <li>{{ __('Want to understand what employers expect in Ireland') }}</li>
                        <li>{{ __('Need to adapt your CV to the Irish market') }}</li>
                        <li>{{ __('Want to improve your interview performance') }}</li>
                        <li>{{ __('Are unsure which roles match your background') }}</li>
                        <li>{{ __('Want to explore graduate or entry-level opportunities') }}</li>
                    </ul>
                </div>
                <div class="audience-card">
                    <h3>{{ __('Qualified Professionals') }}</h3>
                    <p class="audience-card-tagline">{{ __('For professionals with previous experience who want to adapt their profile to the Irish market and understand how to position themselves more effectively.') }}</p>
                    <ul>
                        <li>{{ __('Have professional experience outside Ireland') }}</li>
                        <li>{{ __('Need to understand how your background fits the Irish market') }}</li>
                        <li>{{ __('Want to adapt your CV and LinkedIn') }}</li>
                        <li>{{ __('Need support with interview preparation') }}</li>
                        <li>{{ __('Want to identify sectors or roles that may fit your profile') }}</li>
                        <li>{{ __('Want to better understand employment and work permit pathways') }}</li>
                    </ul>
                </div>
                <div class="audience-card cb-audience-employer">
                    <h3>{{ __('Employers') }}</h3>
                    <p class="audience-card-tagline">{{ __('For companies looking to connect with motivated international students, graduates and professionals already living, studying or building a future in Ireland.') }}</p>
                    <ul>
                        <li>{{ __('International talent access') }}</li>
                        <li>{{ __('Candidate screening') }}</li>
                        <li>{{ __('Shortlisting') }}</li>
                        <li>{{ __('Career talks') }}</li>
                        <li>{{ __('Industry visits') }}</li>
                        <li>{{ __('Talent days') }}</li>
                        <li>{{ __('Graduate and early career pipelines') }}</li>
                        <li>{{ __('Employer branding with international communities') }}</li>
                    </ul>
                    <a class="btn btn-outline cb-employer-cta" href="{{ $lr('for-employers') }}">{{ __('See For Employers') }}</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: Services --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Services') }}</span>
                <h2 class="section-title">{{ __('What Career Bridge can help you with') }}</h2>
            </div>
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-file-alt"></i></div>
                    <h3 class="feature-card-title">{{ __('Irish CV Preparation') }}</h3>
                    <p class="feature-card-text">{{ __('Your CV needs to be clear, relevant and adapted to the Irish job market. We help you understand how to present your education, experience, skills and achievements in a way that is easier for employers to assess.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fab fa-linkedin"></i></div>
                    <h3 class="feature-card-title">{{ __('LinkedIn Optimisation') }}</h3>
                    <p class="feature-card-text">{{ __('LinkedIn is an important tool for visibility, networking and job search in Ireland. We help you improve your profile so it better reflects your professional background, career goals and target opportunities.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-comments"></i></div>
                    <h3 class="feature-card-title">{{ __('Interview Preparation') }}</h3>
                    <p class="feature-card-text">{{ __('Interviews in Ireland may be different from what you are used to. We help you prepare for common questions, behavioural examples, communication style, confidence and professional storytelling.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-compass"></i></div>
                    <h3 class="feature-card-title">{{ __('Career Direction') }}</h3>
                    <p class="feature-card-text">{{ __('Many students and professionals are unsure which roles or sectors they should target. We help you analyse your background, current studies, skills and goals so you can build a more focused career direction.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-chart-line"></i></div>
                    <h3 class="feature-card-title">{{ __('Market Guidance') }}</h3>
                    <p class="feature-card-text">{{ __('Understanding the Irish job market is essential. We help you learn more about employer expectations, hiring processes, relevant sectors, entry-level roles, graduate opportunities and realistic next steps.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-handshake"></i></div>
                    <h3 class="feature-card-title">{{ __('Employer Connection') }}</h3>
                    <p class="feature-card-text">{{ __('When suitable opportunities are available, Career Bridge may help connect prepared candidates with companies looking for international talent. This may happen through events, introductions, talent pools, career talks, industry visits or recruitment opportunities.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-passport"></i></div>
                    <h3 class="feature-card-title">{{ __('Work Permit Awareness') }}</h3>
                    <p class="feature-card-text">{{ __('For some professionals and graduates, work permits may become part of the long-term career conversation. Career Bridge can help you understand the importance of planning, eligibility awareness, employer expectations and official requirements. We do not provide immigration guarantees, but we help you make more informed decisions.') }}</p>
                </div>
            </div>
        </div>
    </section>

    @include('partials.process-steps', [
        'kicker' => __('The Career Bridge Journey'),
        'title' => __('From academic route to professional readiness'),
        'lead' => __('We help students and professionals understand how their academic route, previous experience and skills can be presented more clearly to employers.'),
        'steps' => [
            ['title' => __('Career Profile Review'), 'body' => __('We start by understanding your background, studies, experience, English level, visa situation and career goals.')],
            ['title' => __('Career Direction'), 'body' => __('We help you identify which roles, sectors or career paths may be more aligned with your profile and current stage in Ireland.')],
            ['title' => __('Professional Profile Preparation'), 'body' => __('We support you with CV, LinkedIn and interview preparation, helping you present yourself more clearly to the Irish market.')],
            ['title' => __('Market Readiness'), 'body' => __('We help you understand employer expectations, hiring processes, professional communication and the steps needed to become a stronger candidate.')],
            ['title' => __('Employer Connection'), 'body' => __('When suitable opportunities are available, we may connect prepared candidates with employers, career events, industry visits, talent days or recruitment processes.')],
        ],
    ])

    {{-- Section: For CI Students / Professionals / Employers --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="cb-tracks">
                <article class="cb-track">
                    <span class="cb-track-tag">{{ __('For CI Students') }}</span>
                    <h3>{{ __('Career Bridge for CI Students') }}</h3>
                    <p>{{ __('If you are already planning your academic journey with CI Ireland, Career Bridge can become part of your long-term strategy. Your course choice, English preparation and career direction should work together.') }}</p>
                    <p>{{ __('That is why CI Ireland connects academic planning with career preparation, helping students think beyond enrolment and start building a more complete plan in Ireland.') }}</p>
                    <a class="btn btn-outline" href="{{ $lr('study-in-ireland') }}">{{ __('Connect My Studies with Career Planning') }}</a>
                </article>
                <article class="cb-track">
                    <span class="cb-track-tag">{{ __('For Professionals') }}</span>
                    <h3>{{ __('Career Bridge for Professionals') }}</h3>
                    <p>{{ __('If you already have professional experience, Career Bridge can help you understand how to reposition your profile for the Irish job market. Many international professionals struggle not because they lack experience, but because they do not know how to communicate their value in the local market.') }}</p>
                    <p>{{ __('We help you refine your CV, LinkedIn, interview answers and career direction so your background becomes easier for employers to understand.') }}</p>
                    <a class="btn btn-outline" href="{{ $lr('start-your-plan') }}">{{ __('Prepare My Professional Profile') }}</a>
                </article>
                <article class="cb-track">
                    <span class="cb-track-tag">{{ __('For Employers') }}</span>
                    <h3>{{ __('Career Bridge for Employers') }}</h3>
                    <p>{{ __('Career Bridge also supports companies interested in connecting with international talent in Ireland. CI Ireland works closely with students, graduates and professionals from different backgrounds, which gives employers access to a diverse and motivated talent pool.') }}</p>
                    <p>{{ __('We can support employers through candidate screening, shortlisting, talent days, career talks, industry visits and early career initiatives.') }}</p>
                    <a class="btn btn-outline" href="{{ $lr('for-employers') }}">{{ __('Connect with International Talent') }}</a>
                </article>
            </div>
        </div>
    </section>

    {{-- Section: What we help you build --}}
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Outcomes') }}</span>
                <h2 class="section-title">{{ __('What we help you build') }}</h2>
            </div>
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-eye"></i></div>
                    <h3 class="feature-card-title">{{ __('Clarity') }}</h3>
                    <p class="feature-card-text">{{ __('Understand your academic and professional options before making important decisions.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-compass"></i></div>
                    <h3 class="feature-card-title">{{ __('Direction') }}</h3>
                    <p class="feature-card-text">{{ __('Identify which study and career routes may be more aligned with your profile, goals and future plans.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-rocket"></i></div>
                    <h3 class="feature-card-title">{{ __('Readiness') }}</h3>
                    <p class="feature-card-text">{{ __('Prepare your CV, LinkedIn, interview skills and professional communication for the Irish market.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-heart"></i></div>
                    <h3 class="feature-card-title">{{ __('Confidence') }}</h3>
                    <p class="feature-card-text">{{ __('Make decisions with more structure, less pressure and better information.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-network-wired"></i></div>
                    <h3 class="feature-card-title">{{ __('Connection') }}</h3>
                    <p class="feature-card-text">{{ __('Access career preparation, employer engagement and suitable opportunities when available.') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: What it does NOT promise --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="callout-card cb-warning">
                <h3 class="callout-card-title">{{ __('What Career Bridge does not promise') }}</h3>
                <p>{{ __('Career Bridge is designed to support preparation, clarity and connection. It does not guarantee:') }}</p>
                <ul class="cb-warning-list">
                    <li>{{ __('A job offer') }}</li>
                    <li>{{ __('Visa approval') }}</li>
                    <li>{{ __('Work permit approval') }}</li>
                    <li>{{ __('Sponsorship from an employer') }}</li>
                    <li>{{ __('A specific salary') }}</li>
                    <li>{{ __('A specific timeline for employment') }}</li>
                </ul>
                <p>{{ __('Career outcomes depend on many factors, including English level, experience, qualifications, visa situation, market demand, employer requirements and individual performance.') }}</p>
                <p><strong>{{ __('Our commitment is to help you become more prepared, more informed and more strategic in your career journey.') }}</strong></p>
            </div>
        </div>
    </section>

    {{-- Section: Why career preparation matters --}}
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Start early') }}</span>
                <h2 class="section-title">{{ __('Why career preparation matters in Ireland') }}</h2>
                <p class="section-lead">{{ __('Many international students wait until the end of their course to think about career. By then, they may realise they need:') }}</p>
            </div>
            <div class="tag-cloud">
                @foreach ([
                    'A stronger CV',
                    'A better LinkedIn profile',
                    'Interview practice',
                    'Clearer career direction',
                    'More knowledge about the Irish job market',
                    'Stronger English communication',
                    'Better understanding of employer expectations',
                    'More time to build connections',
                ] as $need)
                    <span class="tag-pill"><i class="fas fa-clock"></i> {{ __($need) }}</span>
                @endforeach
            </div>
            <p class="quote-block">{{ __('Starting earlier gives you more time to prepare, improve and make better decisions. Career Bridge helps you approach your professional future with more structure.') }}</p>
        </div>
    </section>

    {{-- Section: Common situations --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('We hear this every day') }}</span>
                <h2 class="section-title">{{ __('Common situations we support') }}</h2>
            </div>
            <div class="ai-situations cb-situations">
                @foreach ([
                    ['"I am studying in Ireland, but I do not know how to start my career plan."', 'We help you understand your current profile, possible directions and first steps for career preparation.'],
                    ['"I have experience in my country, but I do not know how to present it in Ireland."', 'We help you adapt your CV, LinkedIn and interview communication to the Irish market.'],
                    ['"I am applying for jobs but not getting responses."', 'We can review your professional profile, job search strategy and how your experience is being presented.'],
                    ['"I want to choose a course that supports my career."', 'We help you connect academic planning with career goals, so your study route is not chosen in isolation.'],
                    ['"I want to understand work permits better."', 'We can help you understand why employment planning, employer requirements and official rules matter. For immigration decisions, students and professionals should always refer to official sources and qualified immigration advice when needed.'],
                ] as $situation)
                    <div class="ai-situation">
                        <div class="ai-situation-quote">{{ __($situation[0]) }}</div>
                        <div class="ai-situation-answer">{{ __($situation[1]) }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Section: Job market --}}
    <section class="content-section">
        <div class="container">
            <div class="callout-card">
                <h3 class="callout-card-title">{{ __('Career Bridge and the Irish job market') }}</h3>
                <p>{{ __('The Irish job market can be competitive, especially for international candidates. Employers may look at your English level, local experience, qualifications, communication skills, visa situation, technical skills and cultural fit.') }}</p>
                <p>{{ __('Career Bridge helps you understand these expectations and prepare your profile with more intention.') }}</p>
                <p><strong>{{ __('The goal is not to make unrealistic promises. The goal is to help you compete with more clarity and preparation.') }}</strong></p>
            </div>
        </div>
    </section>

    @include('partials.faq-accordion', [
        'title' => __('Common questions about Career Bridge'),
        'items' => [
            ['q' => __('Does Career Bridge guarantee a job?'), 'a' => __('No. Career Bridge does not guarantee employment. It offers career preparation, market guidance and employer connection when suitable opportunities are available.')],
            ['q' => __('Can Career Bridge help me with my CV?'), 'a' => __('Yes. Career Bridge can help you adapt your CV to the Irish market and present your experience more clearly.')],
            ['q' => __('Can Career Bridge help me with LinkedIn?'), 'a' => __('Yes. We can help you improve your LinkedIn profile so it better reflects your background, goals and target opportunities.')],
            ['q' => __('Can Career Bridge help me prepare for interviews?'), 'a' => __('Yes. Interview preparation is one of the key areas of Career Bridge, including common questions, behavioural examples and communication style.')],
            ['q' => __('Can Career Bridge connect me with companies?'), 'a' => __('When suitable opportunities are available, Career Bridge may support employer connection through events, introductions, talent pools or recruitment opportunities.')],
            ['q' => __('Is Career Bridge only for CI students?'), 'a' => __('No. Career Bridge can support CI students, graduates, professionals and employers. However, students already planning their academic journey with CI may benefit from connecting study and career planning earlier.')],
            ['q' => __('Can Career Bridge help with work permits?'), 'a' => __('Career Bridge can help you understand the importance of work permit awareness and career planning. We do not guarantee visa or work permit outcomes.')],
        ],
    ])

    @include('partials.final-cta', [
        'title' => __('Build your career in Ireland with more clarity and preparation'),
        'text' => __('Whether you are studying, graduating or already working towards a professional future in Ireland, Career Bridge can help you understand the market, strengthen your profile and prepare for opportunities with more strategy.'),
        'primaryCta' => ['label' => __('Start My Career Plan'), 'href' => $lr('start-your-plan')],
        'secondaryCta' => ['label' => __('Talk to a Career Advisor'), 'href' => 'https://wa.me/353868179430', 'newTab' => true],
    ])
@endsection
