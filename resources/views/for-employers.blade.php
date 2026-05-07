@extends('layouts.app')

@php $pageActive = 'for-employers'; @endphp

@section('title', 'CI Ireland — ' . __('For Employers'))

@section('head')
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/new-shared.css', 'resources/css/for-employers.css'])
    @else
        <link rel="stylesheet" href="/css/new-shared.css">
        <link rel="stylesheet" href="/css/for-employers.css">
    @endif
@endsection

@include('partials.page-shell')

@section('content')
    @include('partials.hero-split', [
        'kicker' => __('For Employers'),
        'title' => __('Connect with international talent in Ireland'),
        'subtitle' => __('CI Ireland helps employers connect with international students, graduates and professionals who are already living, studying or building their future in Ireland.') . '<br><br>' . __('Through Career Bridge, we support companies looking to access motivated international talent, build early career pipelines and engage with diverse communities in a more structured way.'),
        'primaryCta' => ['label' => __('Partner with CI Ireland'), 'href' => 'https://wa.me/353868179430', 'newTab' => true],
        'secondaryCta' => ['label' => __('Speak to Our Employer Team'), 'href' => 'https://wa.me/353868179430', 'newTab' => true],
    ])

    {{-- Section: International talent already here --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Talent in Ireland') }}</span>
                <h2 class="section-title">{{ __('International talent is already here. The challenge is connecting with the right people.') }}</h2>
                <p class="section-lead">{{ __('Ireland attracts students and professionals from all over the world. Many of them bring international experience, language skills, strong motivation and the ambition to build a long-term future in the country.') }}</p>
            </div>
            <p class="fe-prose">{{ __('But for employers, reaching this talent pool can be difficult without the right connection point. CI Ireland works closely with international students, graduates and professionals, helping companies engage with candidates who are already connected to Ireland and interested in developing their careers here.') }}</p>
        </div>
    </section>

    {{-- Section: Why partner --}}
    <section class="content-section">
        <div class="container">
            <div class="callout-card">
                <h3 class="callout-card-title">{{ __('Why partner with CI Ireland?') }}</h3>
                <p>{{ __('CI Ireland is more than an education agency. We support international students across different stages of their journey, from academic planning and higher education to career preparation and employer connection.') }}</p>
                <p>{{ __('This gives us a unique position between education, international talent and the Irish job market.') }}</p>
                <p><strong>{{ __('For employers, this means access to a community of internationally minded candidates who are actively investing in their future in Ireland.') }}</strong></p>
            </div>
        </div>
    </section>

    {{-- Section: Visibility before market --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Early access') }}</span>
                <h2 class="section-title">{{ __('Build visibility with international talent before they enter the job market') }}</h2>
                <p class="section-lead">{{ __('Many companies only meet candidates when they are already applying for jobs. CI Ireland gives employers the opportunity to engage earlier with international students, graduates and professionals who are actively preparing their future in Ireland.') }}</p>
            </div>
            <p class="fe-prose">{{ __('Through career talks, industry visits, talent days and employer-led initiatives, companies can build visibility, share industry expectations and connect with motivated international talent before recruitment starts. This creates a more meaningful connection between employers and candidates.') }}</p>
        </div>
    </section>

    {{-- Section: Audience --}}
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Talent profiles') }}</span>
                <h2 class="section-title">{{ __('Who we can help you connect with') }}</h2>
            </div>
            <div class="audience-grid">
                <div class="audience-card">
                    <h3>{{ __('International Students') }}</h3>
                    <p class="audience-card-tagline">{{ __('Students currently studying English, pathway, undergraduate, postgraduate or masters programmes in Ireland.') }}</p>
                    <p>{{ __('They may be looking for part-time roles, internships, work experience, graduate opportunities or long-term career pathways depending on their profile, visa status and stage of study.') }}</p>
                </div>
                <div class="audience-card">
                    <h3>{{ __('Graduates') }}</h3>
                    <p class="audience-card-tagline">{{ __('International graduates who have completed or are completing higher education in Ireland and are preparing to enter the job market.') }}</p>
                    <p>{{ __('This audience may be suitable for graduate roles, early career programmes, junior positions, internships or career development opportunities.') }}</p>
                </div>
                <div class="audience-card">
                    <h3>{{ __('Qualified Professionals') }}</h3>
                    <p class="audience-card-tagline">{{ __('Professionals with previous international experience who are now living in Ireland, studying, retraining or seeking opportunities to reposition themselves in the Irish market.') }}</p>
                    <p>{{ __('This group may bring sector experience, language skills and international perspectives.') }}</p>
                </div>
                <div class="audience-card">
                    <h3>{{ __('Multilingual Talent') }}</h3>
                    <p class="audience-card-tagline">{{ __('Candidates who speak Portuguese, Spanish and other languages, depending on the profile of our student and professional community at each stage.') }}</p>
                    <p>{{ __('This can be valuable for companies serving international markets, multilingual customers or diverse teams.') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: Support --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('How we support') }}</span>
                <h2 class="section-title">{{ __('How we support employers') }}</h2>
            </div>
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-users"></i></div>
                    <h3 class="feature-card-title">{{ __('Talent Access') }}</h3>
                    <p class="feature-card-text">{{ __('We help companies reach international students, graduates and professionals who may be aligned with their hiring needs or future talent strategy.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-search"></i></div>
                    <h3 class="feature-card-title">{{ __('Candidate Screening') }}</h3>
                    <p class="feature-card-text">{{ __('We can support initial profile review to help identify candidates whose background, interests and goals may align with available opportunities.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-list-check"></i></div>
                    <h3 class="feature-card-title">{{ __('Shortlisting') }}</h3>
                    <p class="feature-card-text">{{ __('When appropriate, we can help organise a shortlist of candidates based on the criteria discussed with the employer.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-microphone"></i></div>
                    <h3 class="feature-card-title">{{ __('Career Talks') }}</h3>
                    <p class="feature-card-text">{{ __('Companies can engage with international students and professionals through talks about industry expectations, career paths, hiring processes and employability skills.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-building"></i></div>
                    <h3 class="feature-card-title">{{ __('Industry Visits') }}</h3>
                    <p class="feature-card-text">{{ __('Employers can host selected students or candidates for company visits, helping them understand the workplace, sector and professional expectations in Ireland.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-calendar-day"></i></div>
                    <h3 class="feature-card-title">{{ __('Talent Days') }}</h3>
                    <p class="feature-card-text">{{ __('We can support employer-led events designed to introduce career opportunities, meet potential candidates and build brand awareness among international talent.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-graduation-cap"></i></div>
                    <h3 class="feature-card-title">{{ __('Early Career Pipelines') }}</h3>
                    <p class="feature-card-text">{{ __('We can help companies build visibility with international students and graduates before they enter the job market.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-bullhorn"></i></div>
                    <h3 class="feature-card-title">{{ __('Employer Branding') }}</h3>
                    <p class="feature-card-text">{{ __("Through CI Ireland's international community, companies can strengthen their presence among students and professionals who are motivated to build a future in Ireland.") }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: Solutions --}}
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Solutions') }}</span>
                <h2 class="section-title">{{ __('Employer solutions') }}</h2>
            </div>
            <div class="fe-solutions">
                <article class="route-card">
                    <h3 class="route-card-title">{{ __('Recruitment Support') }}</h3>
                    <p class="route-card-desc">{{ __('For companies looking for candidates for specific roles, CI Ireland can help identify potential international talent from our community and wider network. This may include candidate attraction, initial screening, shortlisting and introductions when suitable profiles are available.') }}</p>
                    <a href="https://wa.me/353868179430" target="_blank" rel="noopener" class="route-card-cta">{{ __('Discuss Recruitment Support') }} <i class="fas fa-arrow-right"></i></a>
                </article>
                <article class="route-card">
                    <h3 class="route-card-title">{{ __('Graduate and Early Career Talent') }}</h3>
                    <p class="route-card-desc">{{ __('For employers interested in junior, graduate or early career profiles, we can help connect your company with international students and recent graduates preparing for the Irish job market.') }}</p>
                    <a href="https://wa.me/353868179430" target="_blank" rel="noopener" class="route-card-cta">{{ __('Explore Graduate Talent') }} <i class="fas fa-arrow-right"></i></a>
                </article>
                <article class="route-card">
                    <h3 class="route-card-title">{{ __('Career Talks and Employer Events') }}</h3>
                    <p class="route-card-desc">{{ __('Companies can participate in career talks, webinars, workshops or in-person events to build visibility with international candidates and share insights about their sector.') }}</p>
                    <a href="https://wa.me/353868179430" target="_blank" rel="noopener" class="route-card-cta">{{ __('Plan an Employer Event') }} <i class="fas fa-arrow-right"></i></a>
                </article>
                <article class="route-card">
                    <h3 class="route-card-title">{{ __('Industry Visits') }}</h3>
                    <p class="route-card-desc">{{ __('Industry visits allow students and professionals to experience the workplace, understand company culture and learn more about career paths in Ireland.') }}</p>
                    <a href="https://wa.me/353868179430" target="_blank" rel="noopener" class="route-card-cta">{{ __('Host an Industry Visit') }} <i class="fas fa-arrow-right"></i></a>
                </article>
                <article class="route-card">
                    <h3 class="route-card-title">{{ __('Talent Days') }}</h3>
                    <p class="route-card-desc">{{ __('Talent Days are structured employer engagement events designed to connect companies with potential candidates in a more direct and meaningful way.') }}</p>
                    <a href="https://wa.me/353868179430" target="_blank" rel="noopener" class="route-card-cta">{{ __('Create a Talent Day') }} <i class="fas fa-arrow-right"></i></a>
                </article>
            </div>
        </div>
    </section>

    {{-- Section: Different talent --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Talent community') }}</span>
                <h2 class="section-title">{{ __('What makes our talent community different?') }}</h2>
            </div>
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-map-pin"></i></div>
                    <h3 class="feature-card-title">{{ __('Already connected to Ireland') }}</h3>
                    <p class="feature-card-text">{{ __('Many candidates in our community are already living, studying or preparing their future in Ireland.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-globe"></i></div>
                    <h3 class="feature-card-title">{{ __('International mindset') }}</h3>
                    <p class="feature-card-text">{{ __('International students and professionals often bring adaptability, resilience, multilingual skills and cross-cultural experience.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-fire"></i></div>
                    <h3 class="feature-card-title">{{ __('Motivated to progress') }}</h3>
                    <p class="feature-card-text">{{ __('Our community is made of people actively investing in their education, employability and long-term plans.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-bridge"></i></div>
                    <h3 class="feature-card-title">{{ __('Supported through Career Bridge') }}</h3>
                    <p class="feature-card-text">{{ __('Candidates may also receive preparation through Career Bridge, including CV, LinkedIn, interview support and market guidance.') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon"><i class="fas fa-layer-group"></i></div>
                    <h3 class="feature-card-title">{{ __('Diverse backgrounds') }}</h3>
                    <p class="feature-card-text">{{ __('Our students and professionals come from different countries, academic areas and professional sectors.') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: Talent shaped --}}
    <section class="content-section">
        <div class="container">
            <div class="callout-card">
                <h3 class="callout-card-title">{{ __('Talent shaped by study, preparation and ambition') }}</h3>
                <p>{{ __('Many candidates in the CI Ireland community are not only looking for a job. They are investing in their education, improving their English, adapting to a new country and preparing for long-term professional growth.') }}</p>
                <p>{{ __('Through Career Bridge, candidates may also receive guidance on CV, LinkedIn, interview preparation and Irish market expectations.') }}</p>
                <p><strong>{{ __('For employers, this means access to international talent that is already engaged in a journey of development and progression.') }}</strong></p>
            </div>
        </div>
    </section>

    {{-- Section: Sectors --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Sectors') }}</span>
                <h2 class="section-title">{{ __('Sectors we may support') }}</h2>
                <p class="section-lead">{{ __('Depending on candidate availability, employer requirements and market demand, CI Ireland may support talent connection across areas such as:') }}</p>
            </div>
            <div class="tag-cloud">
                @foreach ([
                    'Business', 'Sales', 'Customer Service', 'Administration',
                    'Marketing', 'Digital Marketing', 'Finance', 'Accounting',
                    'Hospitality', 'Healthcare Support', 'IT', 'Data',
                    'Operations', 'Project Support', 'Human Resources', 'Multilingual roles',
                ] as $sector)
                    <span class="tag-pill"><i class="fas fa-briefcase"></i> {{ __($sector) }}</span>
                @endforeach
            </div>
            <p class="fe-disclaimer">{{ __('Candidate availability depends on the current talent pool, visa conditions, experience, English level and employer requirements.') }}</p>
        </div>
    </section>

    @include('partials.process-steps', [
        'kicker' => __('Process'),
        'title' => __('How the employer process works'),
        'steps' => [
            ['title' => __('Employer Consultation'), 'body' => __('We start by understanding your company, hiring needs, sector, role requirements and ideal candidate profile.')],
            ['title' => __('Talent Mapping'), 'body' => __('We review whether there may be suitable candidates within our community, student network or wider talent pool.')],
            ['title' => __('Candidate Preparation'), 'body' => __('When relevant, candidates may receive guidance through Career Bridge to better understand the role, expectations and application process.')],
            ['title' => __('Shortlist and Introduction'), 'body' => __('We share suitable candidate profiles or support introductions based on the agreed criteria and availability.')],
            ['title' => __('Follow-up and Partnership Development'), 'body' => __('We review outcomes, feedback and future opportunities to build a stronger long-term partnership.')],
        ],
    ])

    {{-- Section: Beyond recruitment --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="callout-card">
                <h3 class="callout-card-title">{{ __('Partner with CI Ireland beyond recruitment') }}</h3>
                <p>{{ __('Not every employer partnership needs to start with an open role. Companies can also engage with our international community through educational and career-focused initiatives.') }}</p>
                <p><strong>{{ __('Examples include:') }}</strong></p>
                <div class="tag-cloud fe-beyond-cloud">
                    @foreach ([
                        'Career talks', 'CV and interview workshops', 'Sector insight sessions',
                        'Graduate employability panels', 'Company presentations', 'Industry visits',
                        'Talent days', 'Employer branding campaigns', 'Early career awareness initiatives',
                    ] as $option)
                        <span class="tag-pill"><i class="fas fa-arrow-right"></i> {{ __($option) }}</span>
                    @endforeach
                </div>
                <p>{{ __('This can be especially valuable for companies that want to build visibility with international talent before hiring.') }}</p>
            </div>
        </div>
    </section>

    {{-- Section: Work permit note --}}
    <section class="content-section">
        <div class="container">
            <div class="callout-card cb-warning">
                <h3 class="callout-card-title">{{ __('Important note on work permits and employment eligibility') }}</h3>
                <p>{{ __('International hiring can involve visa conditions, work rights and employment permit considerations.') }}</p>
                <p>{{ __('CI Ireland can support awareness and help employers and candidates understand the importance of planning. However, employment eligibility, visa conditions and work permit decisions depend on official rules, employer requirements and individual circumstances.') }}</p>
                <p><strong>{{ __('Companies and candidates should always refer to official guidance or qualified immigration advice when needed.') }}</strong></p>
            </div>
        </div>
    </section>

    {{-- Section: Why this matters --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="callout-card">
                <h3 class="callout-card-title">{{ __('Why this matters for employers') }}</h3>
                <p>{{ __('International talent can bring more than qualifications. It can bring language skills, cultural awareness, adaptability, ambition and a strong desire to build a future in Ireland.') }}</p>
                <p>{{ __('For companies, connecting with this talent early can support recruitment, diversity, employer branding and long-term workforce planning.') }}</p>
                <p><strong>{{ __('CI Ireland offers a practical connection point between international education and the Irish job market.') }}</strong></p>
            </div>
        </div>
    </section>

    @include('partials.faq-accordion', [
        'title' => __('Common employer questions'),
        'items' => [
            ['q' => __('Can CI Ireland help us find candidates for open roles?'), 'a' => __('Yes. When suitable profiles are available, CI Ireland can support candidate attraction, initial screening, shortlisting and introductions.')],
            ['q' => __('Do you only work with students?'), 'a' => __('No. We work with international students, graduates and professionals at different stages of their journey in Ireland.')],
            ['q' => __('Can you help with graduate or early career talent?'), 'a' => __('Yes. CI Ireland can support companies interested in connecting with international students and graduates preparing for the Irish job market.')],
            ['q' => __('Can companies organise talks or events with CI Ireland?'), 'a' => __('Yes. Employers can partner with CI Ireland for career talks, industry visits, talent days, workshops and employer branding initiatives.')],
            ['q' => __('Does CI Ireland guarantee candidate placement?'), 'a' => __('No. Candidate suitability depends on the role, profile, availability, visa conditions, English level, experience and employer requirements. Our role is to support connection, preparation and introduction where there is alignment.')],
            ['q' => __('Does CI Ireland provide immigration advice?'), 'a' => __('CI Ireland can support general awareness around work rights and employment permit considerations, but we do not replace official guidance or qualified immigration advice.')],
        ],
    ])

    @include('partials.final-cta', [
        'title' => __('Build your international talent pipeline in Ireland'),
        'text' => __('Whether your company is hiring now or wants to build visibility with international students, graduates and professionals, CI Ireland can help you connect with a motivated and diverse talent community.'),
        'primaryCta' => ['label' => __('Partner with CI Ireland'), 'href' => 'https://wa.me/353868179430', 'newTab' => true],
        'secondaryCta' => ['label' => __('Speak to Our Employer Team'), 'href' => 'https://wa.me/353868179430', 'newTab' => true],
    ])
@endsection
