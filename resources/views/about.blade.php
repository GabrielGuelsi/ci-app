@extends('layouts.app')

@section('title', 'About Us - CI Exchange Ireland')

@section('head')
    <link rel="stylesheet" href="/css/about.css">
@endsection

@section('styles')
@endsection

@section('banner')
    <div class="top-banner">
        From Dublin to the World â€” CI Ireland is your European Education Mobility Hub.
        <a href="#">Learn more <i class="fas fa-arrow-right"></i></a>
    </div>
@endsection

@section('nav')
    <nav class="main-nav">
        <div class="container">
            <div class="nav-content">
                <a href="/" class="logo">
                    <img class="logo-image" src="{{ asset('images/logo-ci.png') }}" alt="CI Exchange">
                </a>

                <ul class="nav-links">
                    <li><a href="/about" class="active">About Us</a></li>
                    <li><a href="#team">Our Team</a></li>
                    <li><a href="#values">Values</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <section class="about-hero">
        <div class="container">
            <div class="about-hero-content">
                <div class="about-hero-text">
                    <div class="about-hero-kicker"><i class="fas fa-star"></i> About CI Ireland</div>
                    <h1 class="about-hero-title">An <span>European Education Mobility Hub</span></h1>
                    <p class="about-hero-subtitle">From Dublin, CI Ireland connects students, educators, universities, schools and institutions through academic programs, professional mobility and international educational experiences that promote professional development, educational innovation and global cooperation.</p>

                    <div class="hero-journey">
                        <div class="journey-stop">
                            <div class="journey-flag"><span class="flag-badge flag-br">BR</span></div>
                            <div class="journey-year">1988</div>
                            <div class="journey-label">Born in Brazil</div>
                            <div class="journey-desc">100+ units Â· 1M+ students</div>
                        </div>
                        <div class="journey-connector">
                            <div class="journey-arrow-line"></div>
                        </div>
                        <div class="journey-stop">
                            <div class="journey-flag"><span class="flag-badge flag-ie">IE</span></div>
                            <div class="journey-year">2016</div>
                            <div class="journey-label">Arrived in Dublin</div>
                            <div class="journey-desc">11,000+ students in Ireland</div>
                        </div>
                    </div>

                    <div class="hero-mini-stats">
                        <div class="mini-stat"><span>100+</span> Units in Brazil</div>
                        <div class="mini-stat-dot"></div>
                        <div class="mini-stat"><span>1M+</span> Students worldwide</div>
                        <div class="mini-stat-dot"></div>
                        <div class="mini-stat"><span>11,000+</span> in Ireland</div>
                    </div>
                </div>
                <div class="about-hero-media">
                    <div class="hero-photo-main">
                        <img class="hero-main-img"
                             src="{{ asset('images/about/ci-brasil.webp') }}"
                             alt="CI Brazil headquarters"
                             fetchpriority="high">
                        <div class="hero-photo-gradient"></div>
                        <div class="hero-photo-caption"><i class="fas fa-map-pin"></i> CI Brazil Headquarters</div>
                        <div class="hero-accent-card">
                            <img src="{{ asset('images/about/ci-ireland.webp') }}" alt="CI Ireland office" loading="lazy">
                            <div class="hero-accent-label"><i class="fas fa-map-pin"></i> CI Ireland, Dublin</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-gallery">
        <div class="container">
            <div class="about-gallery-header">
                <h2 class="about-gallery-title">Real stories, real people</h2>
                <p class="about-gallery-copy">We live the journey with our students. This section is designed for real-life photos: team moments, campus visits, and celebrations.</p>
            </div>
            <div class="about-gallery-marquee" aria-label="CI Ireland moments">
                <div class="about-gallery-track">
                    <div class="gallery-item large"  style="--image: url('{{ asset('images/about/about-1.webp') }}');"></div>
                    <div class="gallery-item medium" style="--image: url('{{ asset('images/about/about-2.webp') }}');"></div>
                    <div class="gallery-item tall"   style="--image: url('{{ asset('images/about/about-3.webp') }}');"></div>
                    <div class="gallery-item icon"><i class="fas fa-globe"></i></div>
                    <div class="gallery-item small"  style="--image: url('{{ asset('images/about/about-4.webp') }}');"></div>
                    <div class="gallery-item medium" style="--image: url('{{ asset('images/about/about-5.webp') }}');"></div>

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
                    <div class="pillars-kicker">CI pillars</div>
                    <h2 class="pillars-title">The values that sustain our business</h2>
                </div>
            </div>
            <div class="pillars-grid">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="fas fa-lightbulb"></i></div>
                    <h4>Knowledge</h4>
                    <p>We keep our team in constant training to deliver quality with commitment and dedication.</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="fas fa-eye"></i></div>
                    <h4>Transparency</h4>
                    <p>Clear, reliable information with no surprises. We aim for a complete and honest experience.</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="fas fa-shield-heart"></i></div>
                    <h4>Credibility</h4>
                    <p>We follow the client journey from start to finish with knowledge, transparency, and ethics.</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="fas fa-chart-line"></i></div>
                    <h4>Efficiency</h4>
                    <p>We help students make the right decisions based on reliable data and smooth internal processes.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section team-section" id="team">
        <div class="container">
            <div class="team-header">
                <h2 class="section-title">Meet the team</h2>
                <p class="section-subtitle">Hover each card to meet the people behind the guidance. Warm, experienced, and always on your side.</p>
            </div>

            <div class="team-grid">
                <article class="consultant-card" style="--photo: url('{{ asset('consultant/marilu.avif') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Marilu Rosado</div>
                        <div class="consultant-role">Director &amp; Co-founder</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Marilu Rosado</h4>
                        <p>Our fearless co-founder and the heart of CI Ireland. Mother of Sophie, she calls everyone "beautiful" (but she is the beautiful one). She inspires us daily with her resilience and high spirits. The team mom and the foundation of our company.</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/amandaa.avif') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Amanda Avila</div>
                        <div class="consultant-role">Marketing &amp; Sales Manager</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Amanda Avila</h4>
                        <p>Known as "the creative." Pet mom and content creator. She came to Ireland as a #viajanteCI 7 years ago and has been part of the #dreamteam ever since. A true pillar who brings possibilities, support, and strength to our operation.</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/wagner.webp') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Wagner Marinho</div>
                        <div class="consultant-role">Educational Consultant</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Wagner Marinho</h4>
                        <p>Helpful and deeply committed. He has a cleaning obsession and is the best conflict mediator you will ever meet. He has been part of our team for 7 years.</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/aliny.webp') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Aliny Assis</div>
                        <div class="consultant-role">Educational Consultant</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Aliny Assis</h4>
                        <p>Known as the team's big sister. From Amazonas, she wins everyone with her warmth and humanity. Brave and strong in the best way.</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/talita.webp') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Talita</div>
                        <div class="consultant-role">Educational Consultant</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Talita</h4>
                        <p>Pure friendliness and a creator of catchphrases. Talita knows Ireland deeply, has lived every stage of the journey, studied English, went to college, and has been with our team for over a year.</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/karine.avif') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Karine</div>
                        <div class="consultant-role">Enrollment Operations</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Karine</h4>
                        <p>She processes our enrollments and manages a massive workload with mastery. Our "Kaka" is a star: straightforward, confident, and secretly very sweet.</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/albert.webp') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Albert Zavala</div>
                        <div class="consultant-role">Educational Consultant</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Albert Zavala</h4>
                        <p>Our Mexican consultant who supports Spanish-speaking clients. He also speaks Portuguese and is the best Google Maps operator you will ever meet. An excellent advisor.</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/thamiris.avif') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Thamiris Bastos</div>
                        <div class="consultant-role">Customer Experience</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Thamiris Bastos</h4>
                        <p>Customer Experience at CI Ireland. She is responsible for guiding our students with care, attention, and dedication. Pet mom, based in the Netherlands, and working remotely. We miss her every day.</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/romario.webp') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Romario Jales</div>
                        <div class="consultant-role">Educational Consultant</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Romario Jales</h4>
                        <p>Known as the restless one in the office. His education background elevates every consultation. From the farm to Ireland, and 3 years with our team.</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/amandaz.avif') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Amanda Zangarini</div>
                        <div class="consultant-role">Customer Experience</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Amanda Zangarini</h4>
                        <p>Customer Experience at CI Ireland. Sweet, caring, and always ready with kind words. She supports our students throughout their journey.</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/gabriel.webp') }}');">
                    <div class="consultant-photo"></div>
                    <div class="consultant-body">
                        <div class="consultant-name">Gabriel</div>
                        <div class="consultant-role">Educational Consultant</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Gabriel</h4>
                        <p>Our newest consultant and a real prodigy at just 20. Fluent in Portuguese, English, and Spanish, and an IT student living the day-to-day student life in Ireland.</p>
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.consultant-card').forEach(card => {
        const reset = () => {
            card.style.setProperty('--rx', '0deg');
            card.style.setProperty('--ry', '0deg');
        };

        card.addEventListener('pointermove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;
            const rx = (-y * 8).toFixed(2);
            const ry = (x * 10).toFixed(2);
            card.style.setProperty('--rx', `${rx}deg`);
            card.style.setProperty('--ry', `${ry}deg`);
        });

        card.addEventListener('pointerleave', reset);
    });
</script>
@endpush

