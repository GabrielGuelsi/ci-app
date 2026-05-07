@extends('layouts.app')

@php $pageActive = 'start-your-plan'; @endphp

@section('title', 'CI Ireland — ' . __('Start Your Plan'))

@section('head')
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/new-shared.css', 'resources/css/start-your-plan.css'])
    @else
        <link rel="stylesheet" href="/css/new-shared.css">
        <link rel="stylesheet" href="/css/start-your-plan.css">
    @endif
@endsection

@include('partials.page-shell')

@section('content')
    @include('partials.hero-split', [
        'kicker' => __('Start Your Plan'),
        'title' => __('Start your plan in Ireland'),
        'subtitle' => __('Not sure which route makes sense for you? Tell us where you are now, what you want to achieve and what stage of the journey you are in. CI Ireland will review your profile and help you understand which study or career pathway may be more suitable for your goals in Ireland.'),
        'primaryCta' => ['label' => __('Start My Profile Assessment'), 'href' => '#assessment'],
        'secondaryCta' => ['label' => __('Speak to an Advisor'), 'href' => 'https://wa.me/353868179430', 'newTab' => true],
    ])

    {{-- Section: Why a clear plan --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Why a clear plan') }}</span>
                <h2 class="section-title">{{ __('Your journey in Ireland should start with a clear plan') }}</h2>
                <p class="section-lead">{{ __('Studying, working and building a future in Ireland involves important decisions. Your English level, academic background, visa situation, budget, documents, career goals and timing can all influence your next step.') }}</p>
            </div>
            <p class="syp-prose">{{ __('That is why CI Ireland starts with a profile assessment. Before recommending a course, route or career service, we first need to understand your current situation and what you want to build in Ireland.') }}</p>
        </div>
    </section>

    {{-- Section: What we help plan --}}
    <section class="content-section">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Plans we support') }}</span>
                <h2 class="section-title">{{ __('What can we help you plan?') }}</h2>
            </div>
            <div class="audience-grid">
                <div class="audience-card">
                    <h3>{{ __('Study in Ireland') }}</h3>
                    <p class="audience-card-tagline">{{ __('For students who want to start their academic journey in Ireland through English, Pathway, Undergraduate, Postgraduate or Masters programmes.') }}</p>
                </div>
                <div class="audience-card">
                    <h3>{{ __('Already in Ireland') }}</h3>
                    <p class="audience-card-tagline">{{ __('For students already living in Ireland, studying English, holding a Stamp 2 or trying to understand what to do next.') }}</p>
                </div>
                <div class="audience-card">
                    <h3>{{ __('Academic English') }}</h3>
                    <p class="audience-card-tagline">{{ __('For students who need to improve their English with a clear academic purpose before moving into Higher Education.') }}</p>
                </div>
                <div class="audience-card">
                    <h3>{{ __('Higher Education') }}</h3>
                    <p class="audience-card-tagline">{{ __('For students who want to progress to college or university in Ireland and need support choosing the right route.') }}</p>
                </div>
                <div class="audience-card">
                    <h3>{{ __('Career Bridge') }}</h3>
                    <p class="audience-card-tagline">{{ __('For students, graduates and professionals who want to prepare for the Irish job market and connect their studies with career goals.') }}</p>
                </div>
                <div class="audience-card">
                    <h3>{{ __('Employer Connection') }}</h3>
                    <p class="audience-card-tagline">{{ __('For candidates who may be ready to engage with employer opportunities, career events, industry visits or talent initiatives when suitable options are available.') }}</p>
                </div>
            </div>
        </div>
    </section>

    @include('partials.process-steps', [
        'kicker' => __('Process'),
        'title' => __('How the profile assessment works'),
        'steps' => [
            ['title' => __('Tell us about your current situation'), 'body' => __('We ask about your location, visa status, English level, academic background, professional experience and goals.')],
            ['title' => __('We review your profile'), 'body' => __('Our team analyses your information to understand which routes may be suitable for your current stage.')],
            ['title' => __('We identify possible pathways'), 'body' => __('Depending on your profile, this may include Academic English, Higher Education, Pathway, Undergraduate, Postgraduate, Masters, Career Bridge or employer connection.')],
            ['title' => __('You speak with our team'), 'body' => __('A CI advisor can explain your options, answer your questions and help you understand the next steps.')],
            ['title' => __('You receive a clearer direction'), 'body' => __('The goal is to help you avoid confusion and understand what makes sense before making an important decision.')],
        ],
    ])

    {{-- Section: The Wizard --}}
    <section class="content-section content-section--alt syp-form-section" id="assessment">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Profile assessment') }}</span>
                <h2 class="section-title">{{ __('Start your profile assessment') }}</h2>
                <p class="section-lead">{{ __('It takes around 4 minutes. Your answers help our Dublin team prepare for your conversation.') }}</p>
            </div>

            <form id="profileAssessment" class="syp-form" novalidate>
                @csrf

                <div class="syp-progress-bar" aria-hidden="true">
                    <div class="syp-progress-fill" id="sypProgressFill"></div>
                </div>
                <div class="syp-progress-label">
                    <span><span id="sypStepCurrent">1</span> / <span id="sypStepTotal">14</span></span>
                </div>

                {{-- Q1 --}}
                <fieldset class="syp-step" data-step="1">
                    <legend class="syp-step-legend">{{ __('Where are you now?') }}</legend>
                    @foreach (['I am in Ireland', 'I am outside Ireland', 'I am planning to move to Ireland', 'I am not sure yet'] as $opt)
                        <label class="syp-radio">
                            <input type="radio" name="location" value="{{ $opt }}" required>
                            <span>{{ __($opt) }}</span>
                        </label>
                    @endforeach
                </fieldset>

                {{-- Q2 --}}
                <fieldset class="syp-step" data-step="2" hidden>
                    <legend class="syp-step-legend">{{ __('What best describes your current situation?') }}</legend>
                    @foreach ([
                        'I am studying English in Ireland', 'I am finishing my English course soon',
                        'I want to start studying in Ireland', 'I want to move into Higher Education',
                        'I am currently in college or university', 'I have recently graduated',
                        'I am a professional looking for career opportunities', 'I am an employer looking for international talent',
                    ] as $opt)
                        <label class="syp-radio">
                            <input type="radio" name="current_situation" value="{{ $opt }}" required>
                            <span>{{ __($opt) }}</span>
                        </label>
                    @endforeach
                </fieldset>

                {{-- Q3 --}}
                <fieldset class="syp-step" data-step="3" hidden>
                    <legend class="syp-step-legend">{{ __('What is your main goal?') }}</legend>
                    @foreach ([
                        'Improve my English', 'Study at college or university in Ireland',
                        'Move from English school to Higher Education', 'Apply for an Undergraduate Degree',
                        'Apply for a Postgraduate Programme', 'Apply for a Masters',
                        'Prepare for the Irish job market', 'Connect with employers',
                        'Understand my options', 'Not sure yet',
                    ] as $opt)
                        <label class="syp-radio">
                            <input type="radio" name="main_goal" value="{{ $opt }}" required>
                            <span>{{ __($opt) }}</span>
                        </label>
                    @endforeach
                </fieldset>

                {{-- Q3.1 --}}
                <fieldset class="syp-step" data-step="4" hidden>
                    <legend class="syp-step-legend">{{ __('What is your long-term goal in Ireland?') }}</legend>
                    @foreach ([
                        'Study only', 'Study and work', 'Build a career in Ireland',
                        'Gain international experience', 'Change career', 'Apply for graduate roles',
                        'Understand work permit possibilities', 'I am not sure yet',
                    ] as $opt)
                        <label class="syp-radio">
                            <input type="radio" name="long_term_goal" value="{{ $opt }}" required>
                            <span>{{ __($opt) }}</span>
                        </label>
                    @endforeach
                </fieldset>

                {{-- Q4 --}}
                <fieldset class="syp-step" data-step="5" hidden>
                    <legend class="syp-step-legend">{{ __('What is your current English level?') }}</legend>
                    @foreach ([
                        'Beginner', 'Elementary', 'Pre-Intermediate', 'Intermediate',
                        'Upper-Intermediate', 'Advanced', 'I have an English certificate', 'I am not sure',
                    ] as $opt)
                        <label class="syp-radio">
                            <input type="radio" name="english_level" value="{{ $opt }}" required>
                            <span>{{ __($opt) }}</span>
                        </label>
                    @endforeach
                </fieldset>

                {{-- Q5 --}}
                <fieldset class="syp-step" data-step="6" hidden>
                    <legend class="syp-step-legend">{{ __('What is your current visa situation?') }}</legend>
                    @foreach ([
                        'Stamp 2', 'Stamp 1G', 'Stamp 1', 'Tourist/visitor permission',
                        'I am outside Ireland', 'I do not have a visa yet', 'I am not sure', 'Prefer not to say',
                    ] as $opt)
                        <label class="syp-radio">
                            <input type="radio" name="visa_status" value="{{ $opt }}" required>
                            <span>{{ __($opt) }}</span>
                        </label>
                    @endforeach
                </fieldset>

                {{-- Q6 --}}
                <fieldset class="syp-step" data-step="7" hidden>
                    <legend class="syp-step-legend">{{ __('What is your highest level of education?') }}</legend>
                    @foreach ([
                        'High school completed', 'Undergraduate degree completed',
                        'Postgraduate completed', 'Masters completed',
                        'Currently studying in college/university', 'Professional qualification', 'Other',
                    ] as $opt)
                        <label class="syp-radio">
                            <input type="radio" name="education_level" value="{{ $opt }}" required>
                            <span>{{ __($opt) }}</span>
                        </label>
                    @endforeach
                </fieldset>

                {{-- Q7 --}}
                <fieldset class="syp-step" data-step="8" hidden>
                    <legend class="syp-step-legend">{{ __('Do you have professional experience?') }}</legend>
                    @foreach ([
                        'No professional experience yet', 'Less than 1 year',
                        '1 to 3 years', '3 to 5 years', 'More than 5 years', 'More than 10 years',
                    ] as $opt)
                        <label class="syp-radio">
                            <input type="radio" name="experience_years" value="{{ $opt }}" required>
                            <span>{{ __($opt) }}</span>
                        </label>
                    @endforeach
                </fieldset>

                {{-- Q8 + Q8.1 --}}
                <fieldset class="syp-step" data-step="9" hidden>
                    <legend class="syp-step-legend">{{ __('Which area are you interested in?') }}</legend>
                    <div class="syp-grid-options">
                        @foreach ([
                            'Business', 'Management', 'Marketing', 'Digital Marketing',
                            'IT / Computing', 'Data Analytics', 'Finance', 'Accounting',
                            'Hospitality', 'Healthcare Management', 'Human Resources',
                            'Project Management', 'Supply Chain', 'Cybersecurity',
                            'I am open to suggestions', 'Other',
                        ] as $opt)
                            <label class="syp-radio">
                                <input type="radio" name="area_of_interest" value="{{ $opt }}" required>
                                <span>{{ __($opt) }}</span>
                            </label>
                        @endforeach
                    </div>
                    <legend class="syp-step-sublegend">{{ __('Do you want your course choice to be connected to your career goals?') }}</legend>
                    @foreach ([
                        'Yes' => 'yes', 'No' => 'no', 'I need help understanding this' => 'help',
                    ] as $label => $val)
                        <label class="syp-radio">
                            <input type="radio" name="career_aligned" value="{{ $val }}" required>
                            <span>{{ __($label) }}</span>
                        </label>
                    @endforeach
                </fieldset>

                {{-- Q9 --}}
                <fieldset class="syp-step" data-step="10" hidden>
                    <legend class="syp-step-legend">{{ __('When would you like to start your next step?') }}</legend>
                    @foreach ([
                        'As soon as possible', 'In the next 1 to 3 months',
                        'In the next 3 to 6 months', 'In the next 6 to 12 months',
                        'Next year', 'I am only exploring options',
                    ] as $opt)
                        <label class="syp-radio">
                            <input type="radio" name="start_timing" value="{{ $opt }}" required>
                            <span>{{ __($opt) }}</span>
                        </label>
                    @endforeach
                </fieldset>

                {{-- Q10 + Q10.1 --}}
                <fieldset class="syp-step" data-step="11" hidden>
                    <legend class="syp-step-legend">{{ __('What kind of support are you looking for?') }} <small>{{ __('(select all that apply)') }}</small></legend>
                    <div class="syp-grid-options">
                        @foreach ([
                            'Course guidance', 'English preparation', 'Higher Education application',
                            'Visa and timing guidance related to study planning', 'Document guidance',
                            'Career preparation', 'CV and LinkedIn support', 'Interview preparation',
                            'Employer connection', 'Full study and career plan', 'I am not sure',
                        ] as $opt)
                            <label class="syp-checkbox">
                                <input type="checkbox" name="support_type[]" value="{{ $opt }}" data-career-trigger="{{ in_array($opt, ['Career preparation','CV and LinkedIn support','Interview preparation','Employer connection','Full study and career plan']) ? '1' : '0' }}">
                                <span>{{ __($opt) }}</span>
                            </label>
                        @endforeach
                    </div>

                    <div class="syp-sub-question" id="sypCareerSupport" hidden>
                        <legend class="syp-step-sublegend">{{ __('What kind of career support would be useful for you?') }} <small>{{ __('(select all that apply)') }}</small></legend>
                        <div class="syp-grid-options">
                            @foreach ([
                                'CV preparation', 'LinkedIn optimisation', 'Interview preparation',
                                'Career direction', 'Irish job market guidance', 'Employer connection',
                                'Work permit awareness', 'Graduate opportunities', 'I am not sure yet',
                            ] as $opt)
                                <label class="syp-checkbox">
                                    <input type="checkbox" name="career_support[]" value="{{ $opt }}">
                                    <span>{{ __($opt) }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </fieldset>

                {{-- Q11 --}}
                <fieldset class="syp-step" data-step="12" hidden>
                    <legend class="syp-step-legend">{{ __('What is your approximate budget for your next study step?') }}</legend>
                    @foreach ([
                        'Less than €3,000', '€3,000 to €6,000', '€6,000 to €9,000',
                        '€9,000 to €12,000', 'More than €12,000', 'I need guidance on costs', 'Prefer not to say',
                    ] as $opt)
                        <label class="syp-radio">
                            <input type="radio" name="budget" value="{{ $opt }}" required>
                            <span>{{ __($opt) }}</span>
                        </label>
                    @endforeach
                </fieldset>

                {{-- Q12 --}}
                <fieldset class="syp-step" data-step="13" hidden>
                    <legend class="syp-step-legend">{{ __('How soon would you like to speak with CI Ireland?') }}</legend>
                    @foreach ([
                        'Today', 'This week', 'Within the next two weeks',
                        'I am not ready to speak yet, I just want information',
                    ] as $opt)
                        <label class="syp-radio">
                            <input type="radio" name="contact_speed" value="{{ $opt }}" required>
                            <span>{{ __($opt) }}</span>
                        </label>
                    @endforeach
                </fieldset>

                {{-- Contact --}}
                <fieldset class="syp-step" data-step="14" hidden>
                    <legend class="syp-step-legend">{{ __('Contact details') }}</legend>
                    <div class="syp-form-row">
                        <div class="syp-form-group">
                            <label for="syp-name">{{ __('Full name') }} <span class="req">*</span></label>
                            <input type="text" id="syp-name" name="full_name" required autocomplete="name">
                        </div>
                        <div class="syp-form-group">
                            <label for="syp-email">{{ __('Email') }} <span class="req">*</span></label>
                            <input type="email" id="syp-email" name="email" required autocomplete="email">
                        </div>
                    </div>
                    <div class="syp-form-row">
                        <div class="syp-form-group">
                            <label for="syp-phone">{{ __('Phone / WhatsApp') }} <span class="req">*</span></label>
                            <input type="tel" id="syp-phone" name="phone" required autocomplete="tel" placeholder="+353 ...">
                        </div>
                        <div class="syp-form-group">
                            <label for="syp-language">{{ __('Preferred language') }}</label>
                            <select id="syp-language" name="preferred_language">
                                <option value="English">{{ __('English') }}</option>
                                <option value="Portuguese">{{ __('Portuguese') }}</option>
                                <option value="Spanish">{{ __('Spanish') }}</option>
                                <option value="Other">{{ __('Other') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="syp-form-row">
                        <div class="syp-form-group syp-form-group--full">
                            <label for="syp-time">{{ __('Preferred contact time') }}</label>
                            <input type="text" id="syp-time" name="preferred_contact_time" placeholder="{{ __('e.g. weekday mornings, after 6pm Dublin time') }}">
                        </div>
                    </div>
                </fieldset>

                <div class="syp-actions">
                    <button type="button" class="btn btn-outline" id="sypBack" hidden>
                        <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                    </button>
                    <button type="button" class="btn btn-primary" id="sypNext">
                        {{ __('Next') }} <i class="fas fa-arrow-right"></i>
                    </button>
                    <button type="submit" class="btn btn-primary" id="sypSubmit" hidden>
                        {{ __('Submit my plan') }} <i class="fas fa-check"></i>
                    </button>
                </div>

                <div class="syp-error" id="sypError" hidden role="alert"></div>

                <div class="syp-success" id="sypSuccess" hidden role="status">
                    <i class="fas fa-check-circle"></i>
                    <h3>{{ __('Thank you. Our team will be in touch soon.') }}</h3>
                    <p>{{ __('We have received your profile assessment and a CI Ireland advisor in Dublin will review it shortly.') }}</p>
                </div>
            </form>
        </div>
    </section>

    {{-- Section: Course choice shapes future --}}
    <section class="content-section">
        <div class="container">
            <div class="callout-card">
                <h3 class="callout-card-title">{{ __('Your course choice can shape your future opportunities') }}</h3>
                <p>{{ __('When you complete this profile assessment, we do not only look at what you want to study. We also consider where you want your studies to take you.') }}</p>
                <p>{{ __('Your English level, academic background, professional experience, visa situation, budget and career goals can all influence the route that makes most sense.') }}</p>
                <p><strong>{{ __('This is why CI Ireland connects study planning with career preparation. Our goal is to help you make decisions with more clarity, more strategy and a better understanding of your future options in Ireland.') }}</strong></p>
            </div>
        </div>
    </section>

    {{-- Section: After submit --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="section-header">
                <span class="section-kicker">{{ __('Next steps') }}</span>
                <h2 class="section-title">{{ __('After you submit your assessment') }}</h2>
                <p class="section-lead">{{ __('Thank you for sharing your information. Our team will review your profile and contact you to understand your goals in more detail.') }}</p>
            </div>
            <p class="syp-prose">{{ __('Based on your answers, we may help you explore one or more of the following routes:') }}</p>
            <div class="tag-cloud">
                @foreach ([
                    'Academic English', 'Higher Education', 'Pathway Programmes',
                    'Undergraduate Degrees', 'Postgraduate Programmes', 'Masters',
                    'Career Bridge', 'Employer connection', 'A full study and career plan in Ireland',
                ] as $route)
                    <span class="tag-pill"><i class="fas fa-arrow-right"></i> {{ __($route) }}</span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Section: Why this assessment --}}
    <section class="content-section">
        <div class="container">
            <div class="callout-card">
                <h3 class="callout-card-title">{{ __('Why this assessment matters') }}</h3>
                <p>{{ __('Many students make decisions based on urgency, price or advice from people whose situation is completely different from theirs. But your route in Ireland should be based on your own profile.') }}</p>
                <p>{{ __('Your English level, visa situation, academic background, documents, budget, professional experience and goals can completely change the best path for you.') }}</p>
                <p><strong>{{ __('This assessment helps CI Ireland understand your starting point and guide you with more clarity.') }}</strong></p>
            </div>
        </div>
    </section>

    {{-- Section: Not sure --}}
    <section class="content-section content-section--alt">
        <div class="container">
            <div class="callout-card">
                <h3 class="callout-card-title">{{ __('Not sure what to choose?') }}</h3>
                <p>{{ __('You do not need to know the answer before speaking with us. Many students come to CI Ireland feeling confused about their options.') }}</p>
                <p><strong>{{ __('Our role is to help you organise the information, understand what is realistic and identify the next step that makes sense for your journey.') }}</strong></p>
                <a class="btn btn-primary" href="https://wa.me/353868179430" target="_blank" rel="noopener">{{ __('Speak to an Advisor') }} <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    {{-- Section: Responsible guidance --}}
    <section class="content-section">
        <div class="container">
            <div class="callout-card cb-warning">
                <h3 class="callout-card-title">{{ __('Responsible guidance') }}</h3>
                <p>{{ __('CI Ireland provides study and career guidance based on your profile and available options. We do not guarantee:') }}</p>
                <ul class="cb-warning-list">
                    <li>{{ __('College acceptance') }}</li>
                    <li>{{ __('Visa approval') }}</li>
                    <li>{{ __('Employment') }}</li>
                    <li>{{ __('Work permit approval') }}</li>
                    <li>{{ __('A specific salary') }}</li>
                    <li>{{ __('A specific timeline') }}</li>
                </ul>
                <p>{{ __('Your journey depends on your profile, documents, English level, budget, visa situation, institutional requirements, employer requirements and official rules.') }}</p>
                <p><strong>{{ __('Our role is to help you make more informed decisions and plan your next steps with greater clarity.') }}</strong></p>
            </div>
        </div>
    </section>

    @include('partials.final-cta', [
        'title' => __('Ready to understand your best route in Ireland?'),
        'text' => __('Start with a profile assessment and let CI Ireland help you plan your next academic or professional step with more clarity.'),
        'primaryCta' => ['label' => __('Start My Profile Assessment'), 'href' => '#assessment'],
        'secondaryCta' => ['label' => __('Talk to an Advisor'), 'href' => 'https://wa.me/353868179430', 'newTab' => true],
    ])
@endsection

@push('scripts')
    @php
        $sypConfig = [
            'submitUrl' => route(app()->getLocale() === 'pt' ? 'pt.start-your-plan.store' : 'start-your-plan.store'),
            'locale' => app()->getLocale(),
            'genericError' => __('Something went wrong. Please try again or contact us directly.'),
        ];
    @endphp
    <script src="{{ asset('js/start-your-plan.js') }}" defer></script>
    <script>
        window.SYP_CONFIG = {!! json_encode($sypConfig, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!};
    </script>
@endpush
