@extends('layouts.app')

@section('title', __('About Us') . ' - CI Exchange Ireland')

@section('head')
    @if (file_exists(public_path('build/manifest.json')))
        @vite('resources/css/about.css')
    @else
        <link rel="stylesheet" href="/css/about.css">
    @endif
@endsection

@section('styles')
@endsection

@section('banner')
    <div class="top-banner">
        {{ __('From Dublin to the World — CI Ireland is your European Education Mobility Hub.') }}
        <a href="#">{{ __('Learn more') }} <i class="fas fa-arrow-right"></i></a>
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
                    <li><a href="{{ $lr('about') }}" class="active">{{ __('About Us') }}</a></li>
                    <li><a href="{{ $lr('higher-education') }}">{{ __('Higher Education') }}</a></li>
                    <li><a href="{{ $lr('professional') }}">{{ __('CI Professional') }}</a></li>
                    <li><a href="#contact" class="nav-cta">{{ __('Get in Touch') }}</a></li>
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
        <li><a href="{{ $lr('about') }}" class="active">{{ __('About Us') }} <i class="fas fa-chevron-right"></i></a></li>
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
    <section class="about-hero">
        <div class="container">
            <div class="about-hero-content">
                <div class="about-hero-text">
                    <div class="about-hero-kicker"><i class="fas fa-star"></i> {{ __('About CI Ireland') }}</div>
                    <h1 class="about-hero-title">{!! __('An <span>European Education Mobility Hub</span>') !!}</h1>
                    <p class="about-hero-subtitle">{{ __('From Dublin, CI Ireland connects students, educators, universities, schools and institutions through academic programs, professional mobility and international educational experiences that promote professional development, educational innovation and global cooperation.') }}</p>

                    <div class="hero-journey">
                        <div class="journey-stop">
                            <div class="journey-flag"><span class="flag-badge flag-br">BR</span></div>
                            <div class="journey-year">1988</div>
                            <div class="journey-label">{{ __('Born in Brazil') }}</div>
                            <div class="journey-desc">{{ __('100+ units · 1M+ students') }}</div>
                        </div>
                        <div class="journey-connector">
                            <div class="journey-arrow-line"></div>
                        </div>
                        <div class="journey-stop">
                            <div class="journey-flag"><span class="flag-badge flag-ie">IE</span></div>
                            <div class="journey-year">2016</div>
                            <div class="journey-label">{{ __('Arrived in Dublin') }}</div>
                            <div class="journey-desc">{{ __('11,000+ students in Ireland') }}</div>
                        </div>
                    </div>

                    <div class="hero-mini-stats">
                        <div class="mini-stat"><span>100+</span> {{ __('Units in Brazil') }}</div>
                        <div class="mini-stat-dot"></div>
                        <div class="mini-stat"><span>1M+</span> {{ __('Students worldwide') }}</div>
                        <div class="mini-stat-dot"></div>
                        <div class="mini-stat"><span>11,000+</span> {{ __('in Ireland') }}</div>
                    </div>
                </div>
                <div class="about-hero-media">
                    <div class="hero-photo-main">
                        <img class="hero-main-img"
                             src="{{ asset('images/about/ci-brasil.webp') }}"
                             alt="{{ __('CI Brazil headquarters') }}"
                             fetchpriority="high">
                        <div class="hero-photo-gradient"></div>
                        <div class="hero-photo-caption"><i class="fas fa-map-pin"></i> {{ __('CI Brazil Headquarters') }}</div>
                        <div class="hero-accent-card">
                            <img src="{{ asset('images/about/ci-ireland.webp') }}" alt="{{ __('CI Ireland office') }}" loading="lazy">
                            <div class="hero-accent-label"><i class="fas fa-map-pin"></i> {{ __('CI Ireland, Dublin') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-gallery">
        <div class="container">
            <div class="about-gallery-header">
                <h2 class="about-gallery-title">{{ __('Real stories, real people') }}</h2>
                <p class="about-gallery-copy">{{ __('We live the journey with our students. This section is designed for real-life photos: team moments, campus visits, and celebrations.') }}</p>
            </div>
            <div class="about-gallery-marquee" aria-label="CI Ireland moments">
                <div class="about-gallery-track">
                    <div class="gallery-item large"  style="--image: url('{{ asset('images/about/about-1.webp') }}');" role="img" aria-label="CI Ireland students"></div>
                    <div class="gallery-item medium" style="--image: url('{{ asset('images/about/about-2.webp') }}');" role="img" aria-label="CI Ireland campus"></div>
                    <div class="gallery-item tall"   style="--image: url('{{ asset('images/about/about-3.webp') }}');" role="img" aria-label="CI Ireland experience"></div>
                    <div class="gallery-item icon" aria-hidden="true"><i class="fas fa-globe"></i></div>
                    <div class="gallery-item small"  style="--image: url('{{ asset('images/about/about-4.webp') }}');" role="img" aria-label="CI Ireland team"></div>
                    <div class="gallery-item medium" style="--image: url('{{ asset('images/about/about-5.webp') }}');" role="img" aria-label="CI Ireland Dublin"></div>

                    <div class="gallery-item large"  style="--image: url('{{ asset('images/about/about-1.webp') }}');" aria-hidden="true"></div>
                    <div class="gallery-item medium" style="--image: url('{{ asset('images/about/about-2.webp') }}');" aria-hidden="true"></div>
                    <div class="gallery-item tall"   style="--image: url('{{ asset('images/about/about-3.webp') }}');" aria-hidden="true"></div>
                    <div class="gallery-item icon" aria-hidden="true"><i class="fas fa-globe"></i></div>
                    <div class="gallery-item small"  style="--image: url('{{ asset('images/about/about-4.webp') }}');" aria-hidden="true"></div>
                    <div class="gallery-item medium" style="--image: url('{{ asset('images/about/about-5.webp') }}');" aria-hidden="true"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section pillars-section" id="values">
        <div class="container">
            <div class="pillars-header">
                <div>
                    <div class="pillars-kicker">{{ __('CI pillars') }}</div>
                    <h2 class="pillars-title">{{ __('The values that sustain our business') }}</h2>
                </div>
            </div>
            <div class="pillars-grid">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="fas fa-lightbulb"></i></div>
                    <h4>{{ __('Knowledge') }}</h4>
                    <p>{{ __('We keep our team in constant training to deliver quality with commitment and dedication.') }}</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="fas fa-eye"></i></div>
                    <h4>{{ __('Transparency') }}</h4>
                    <p>{{ __('Clear, reliable information with no surprises. We aim for a complete and honest experience.') }}</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="fas fa-shield-heart"></i></div>
                    <h4>{{ __('Credibility') }}</h4>
                    <p>{{ __('We follow the client journey from start to finish with knowledge, transparency, and ethics.') }}</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="fas fa-chart-line"></i></div>
                    <h4>{{ __('Efficiency') }}</h4>
                    <p>{{ __('We help students make the right decisions based on reliable data and smooth internal processes.') }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section team-section" id="team">
        <div class="container">
            <div class="team-header">
                <h2 class="section-title">{{ __('Meet the team') }}</h2>
                <p class="section-subtitle">{{ __('Hover each card to meet the people behind the guidance. Warm, experienced, and always on your side.') }}</p>
            </div>

            <div class="team-grid">
                <article class="consultant-card" style="--photo: url('{{ asset('consultant/malu.webp') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Marilu Rosado</div>
                        <div class="consultant-role">{{ __('Director & Co-founder') }}</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Marilu Rosado</h4>
                        <p>{{ __('Our fearless co-founder and the heart of CI Ireland. Mother of Sophie, she calls everyone "beautiful" (but she is the beautiful one). She inspires us daily with her resilience and high spirits. The team mom and the foundation of our company.') }}</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/amandaa.avif') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Amanda Avila</div>
                        <div class="consultant-role">{{ __('Marketing & Sales Manager') }}</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Amanda Avila</h4>
                        <p>{{ __('Known as "the creative." Pet mom and content creator. She came to Ireland as a #viajanteCI 7 years ago and has been part of the #dreamteam ever since. A true pillar who brings possibilities, support, and strength to our operation.') }}</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/wagner.webp') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Wagner Marinho</div>
                        <div class="consultant-role">{{ __('Educational Consultant') }}</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Wagner Marinho</h4>
                        <p>{{ __('Helpful and deeply committed. He has a cleaning obsession and is the best conflict mediator you will ever meet. He has been part of our team for 7 years.') }}</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/aliny.webp') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Aliny Assis</div>
                        <div class="consultant-role">{{ __('Educational Consultant') }}</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Aliny Assis</h4>
                        <p>{{ __("Known as the team's big sister. From Amazonas, she wins everyone with her warmth and humanity. Brave and strong in the best way.") }}</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/talita.webp') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Talita</div>
                        <div class="consultant-role">{{ __('Educational Consultant') }}</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Talita</h4>
                        <p>{{ __('Pure friendliness and a creator of catchphrases. Talita knows Ireland deeply, has lived every stage of the journey, studied English, went to college, and has been with our team for over a year.') }}</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/karine.webp') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Karine</div>
                        <div class="consultant-role">{{ __('Enrollment Operations') }}</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Karine</h4>
                        <p>{{ __('She processes our enrollments and manages a massive workload with mastery. Our "Kaka" is a star: straightforward, confident, and secretly very sweet.') }}</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/albert.webp') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Albert Zavala</div>
                        <div class="consultant-role">{{ __('Educational Consultant') }}</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Albert Zavala</h4>
                        <p>{{ __('Our Mexican consultant who supports Spanish-speaking clients. He also speaks Portuguese and is the best Google Maps operator you will ever meet. An excellent advisor.') }}</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/thamiris.avif') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Thamiris Bastos</div>
                        <div class="consultant-role">{{ __('Customer Experience') }}</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Thamiris Bastos</h4>
                        <p>{{ __('Customer Experience at CI Ireland. She is responsible for guiding our students with care, attention, and dedication. Pet mom, based in the Netherlands, and working remotely. We miss her every day.') }}</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/romario.webp') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Romario Jales</div>
                        <div class="consultant-role">{{ __('Educational Consultant') }}</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Romario Jales</h4>
                        <p>{{ __('Known as the restless one in the office. His education background elevates every consultation. From the farm to Ireland, and 3 years with our team.') }}</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/amandazanga.webp') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Amanda Zangarini</div>
                        <div class="consultant-role">{{ __('Customer Experience') }}</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Amanda Zangarini</h4>
                        <p>{{ __('Customer Experience at CI Ireland. Sweet, caring, and always ready with kind words. She supports our students throughout their journey.') }}</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/gabriel.webp') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Gabriel</div>
                        <div class="consultant-role">{{ __('Educational Consultant') }}</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Gabriel</h4>
                        <p>{{ __('Our newest consultant and a real prodigy at just 20. Fluent in Portuguese, English, and Spanish, and an IT student living the day-to-day student life in Ireland.') }}</p>
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="/js/about.js" defer></script>
@endpush

