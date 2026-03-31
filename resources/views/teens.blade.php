@extends('layouts.app')

@section('title', 'Teens & Junior Programmes - CI Ireland')

@section('head')
    <link rel="preload" as="image" href="{{ asset('images/hero-teens.webp') }}">
    @if (file_exists(public_path('build/manifest.json')))
        @vite('resources/css/teens.css')
    @else
        <link rel="stylesheet" href="/css/teens.css">
    @endif
@endsection

@section('banner')
    <div class="top-banner">
        Curated international experiences designed for young students &mdash; with full programme management and continuous care.
        <button type="button" class="top-banner-cta" onclick="openTeensModal()">Enquire Now <i class="fas fa-arrow-right"></i></button>
    </div>
@endsection

@section('nav')
    <nav class="main-nav">
        <div class="container">
            <div class="nav-content">
                <a href="/" class="logo">
                    <img class="logo-image" src="{{ asset('images/logo-ci.png') }}" alt="CI Ireland">
                </a>
                <ul class="nav-links">
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/higher-education">Higher Education</a></li>
                    <li><a href="/erasmus">Erasmus+</a></li>
                    <li><a href="{{ route('teens') }}" class="active">Teens Programmes</a></li>
                    <li><a href="/corporate">Corporate Learning</a></li>
                    <li><a href="{{ route('professional') }}">CI Professional</a></li>
                    <li><button onclick="openTeensModal()" class="nav-cta" style="border:none;cursor:pointer;font-family:'Montserrat',sans-serif;">Get in Touch</button></li>
                </ul>
                <div class="nav-actions">
                    <button class="hamburger-btn" id="hamburgerBtn" aria-label="Open menu" aria-expanded="false">
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
        <li><a href="/about">About Us <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="/higher-education">Higher Education <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="/erasmus">Erasmus+ <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="{{ route('teens') }}" class="active">Teens Programmes <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="/corporate">Corporate Learning <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="{{ route('professional') }}">CI Professional <i class="fas fa-chevron-right"></i></a></li>
    </ul>
@endsection

@section('mobile-nav-footer')
    <div class="mobile-drawer-footer">
        <button class="mobile-cta-btn" onclick="openTeensModal()">Get in Touch</button>
    </div>
@endsection

@section('content')

    <!-- ===== HERO ===== -->
    <section class="tj-hero">
        <div class="tj-hero-bg" style="background-image: url('{{ asset('images/hero-teens.webp') }}');"></div>
        <div class="tj-hero-overlay"></div>
        <div class="tj-hero-content">
            <div class="tj-hero-kicker">
                <i class="fas fa-star"></i> Teens &amp; Junior Programmes
            </div>
            <h1 class="tj-hero-title">
                Curated International<br>
                <span>Student Experiences</span>,<br>
                Designed with Care<br>
                and Precision
            </h1>
            <p class="tj-hero-sub">
                We design and manage international educational experiences for young students across Ireland and Europe, combining high standards, structured delivery, and continuous support. Based in Ireland, we act as a trusted partner for schools and families seeking safe, well-managed, and carefully curated programmes.
            </p>
            <div class="tj-hero-tags">
                <span class="tj-hero-tag">&#127470;&#127466; Ireland &rarr; Europe</span>
                <span class="tj-hero-tag">&#127466;&#127482; Europe &rarr; Ireland</span>
                <span class="tj-hero-tag">Schools &amp; Families Welcome</span>
            </div>
        </div>
    </section>

    <!-- ===== AUDIENCE TOGGLE ===== -->
    <div class="tj-toggle-section" id="toggleSection">
        <div class="tj-toggle-inner">
            <button class="tj-toggle-btn active" id="btn-outbound" onclick="switchPanel('outbound')">
                <span class="tj-flag">&#127470;&#127466;</span>
                <span class="tj-toggle-label">
                    <span class="tj-toggle-main">Ireland &rarr; Europe</span>
                    <span class="tj-toggle-sub">For schools, groups &amp; families</span>
                </span>
            </button>
            <div class="tj-toggle-divider"></div>
            <button class="tj-toggle-btn" id="btn-inbound" onclick="switchPanel('inbound')">
                <span class="tj-flag">&#127466;&#127482;</span>
                <span class="tj-toggle-label">
                    <span class="tj-toggle-main">Europe &rarr; Ireland</span>
                    <span class="tj-toggle-sub">For schools, groups &amp; families</span>
                </span>
            </button>
        </div>
    </div>

    <!-- ===== PANELS ===== -->
    <div class="tj-panels">

        <!-- ─────── OUTBOUND PANEL (Irish → Europe) ─────── -->
        <div class="tj-panel active" id="panel-outbound">

            <!-- Panel Header -->
            <div class="tj-panel-header">
                <div class="tj-panel-header-left">
                    <div class="tj-kicker">&#127470;&#127466; Ireland &rarr; Europe</div>
                    <h2 class="tj-panel-title">
                        Curated European Experiences<br>
                        for <span>Young Students</span>
                    </h2>
                    <p class="tj-panel-intro">
                        We support schools, groups, and families in organising structured international experiences across Europe &mdash; designed with precision, care, and high standards. Based in Ireland, we act as a trusted partner throughout every stage of the experience.
                    </p>
                </div>
                <div class="tj-panel-header-right">
                    <div class="tj-selectivity-card">
                        <h4>A More Selective Approach to Student Mobility</h4>
                        <p>We do not offer generic programmes or open catalogues. Through our Programme Matching Approach, each experience is carefully selected based on the group's or individual student's profile, objectives, and expectations &mdash; whether you are a school coordinating a group or a family planning independently.</p>
                        <span class="tj-match-tag"><i class="fas fa-check"></i> Programme Matching Approach</span>
                    </div>
                </div>
            </div>

            <!-- Experience Portfolio -->
            <div class="tj-portfolio-section">
                <div class="tj-section-label">Experience Portfolio</div>
                <h3 class="tj-section-title">Programmes for Ireland &rarr; Europe</h3>

                <div class="tj-portfolio-grid">
                    <div class="tj-portfolio-card explorer">
                        <div class="tj-card-icon"><i class="fas fa-compass"></i></div>
                        <div class="tj-card-tag">Programme Type</div>
                        <div class="tj-card-name">Explorer</div>
                        <p class="tj-card-desc">For students ready for more independence, combining learning, cultural exposure, and structured support across European destinations.</p>
                    </div>

                    <div class="tj-portfolio-card immersion">
                        <div class="tj-card-icon"><i class="fas fa-globe-europe"></i></div>
                        <div class="tj-card-tag">Programme Type</div>
                        <div class="tj-card-name">Immersion</div>
                        <p class="tj-card-desc">Short-term, high-impact experiences focused on language learning and cultural immersion &mdash; designed for meaningful international exposure.</p>
                    </div>

                    <div class="tj-portfolio-card academic">
                        <div class="tj-card-icon"><i class="fas fa-graduation-cap"></i></div>
                        <div class="tj-card-tag">Programme Type</div>
                        <div class="tj-card-name">Academic Track</div>
                        <p class="tj-card-desc">Longer-term academic pathways designed for deeper educational development and academic progression in a European environment.</p>
                    </div>
                </div>
            </div>

            <!-- Destinations — Flowing Menu -->
            <div class="tj-destinations-section fm-destinations-section">
                <div class="tj-destinations-header">
                    <div class="tj-section-label">European Destinations</div>
                    <h3 class="tj-section-title">Where the Experience Takes Place</h3>
                </div>
                <div class="fm-wrap">
                    <nav class="fm-menu">
                        <div class="fm-item" data-images="{{ asset('images/teens/swiz1.webp') }},{{ asset('images/teens/swiz2.webp') }}">
                            <a class="fm-item-link" href="#">
                                <span class="fm-dest-flag">&#127464;&#127469;</span>
                                <span class="fm-dest-name">Switzerland</span>
                                <span class="fm-dest-type">Explorer &middot; Academic Track</span>
                            </a>
                            <div class="fm-marquee">
                                <div class="fm-marquee-inner"></div>
                            </div>
                        </div>
                        <div class="fm-item" data-images="{{ asset('images/teens/uk1.webp') }},{{ asset('images/teens/uk2.webp') }}">
                            <a class="fm-item-link" href="#">
                                <span class="fm-dest-flag">&#127468;&#127463;</span>
                                <span class="fm-dest-name">United Kingdom</span>
                                <span class="fm-dest-type">Explorer &middot; Immersion</span>
                            </a>
                            <div class="fm-marquee">
                                <div class="fm-marquee-inner"></div>
                            </div>
                        </div>
                        <div class="fm-item" data-images="{{ asset('images/teens/italy.webp') }},{{ asset('images/teens/italy2.webp') }}">
                            <a class="fm-item-link" href="#">
                                <span class="fm-dest-flag">&#127470;&#127481;</span>
                                <span class="fm-dest-name">Italy</span>
                                <span class="fm-dest-type">Explorer &middot; Immersion</span>
                            </a>
                            <div class="fm-marquee">
                                <div class="fm-marquee-inner"></div>
                            </div>
                        </div>
                        <div class="fm-item" data-images="{{ asset('images/teens/france.webp') }},{{ asset('images/teens/france2.webp') }}">
                            <a class="fm-item-link" href="#">
                                <span class="fm-dest-flag">&#127467;&#127479;</span>
                                <span class="fm-dest-name">France</span>
                                <span class="fm-dest-type">Immersion &middot; Explorer</span>
                            </a>
                            <div class="fm-marquee">
                                <div class="fm-marquee-inner"></div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- Approach Pillars -->
            <div class="tj-pillars-section">
                <div class="tj-section-label">Our Approach</div>
                <h3 class="tj-section-title">A Structured Framework for Every Programme</h3>

                <div class="tj-pillars-grid">
                    <div class="tj-pillar-card">
                        <span class="tj-pillar-num">01</span>
                        <div class="tj-pillar-body">
                            <h4>Global Partner Standard</h4>
                            <p>Careful selection and continuous evaluation of partner institutions across Europe, ensuring consistent quality and reliable delivery.</p>
                        </div>
                    </div>
                    <div class="tj-pillar-card">
                        <span class="tj-pillar-num">02</span>
                        <div class="tj-pillar-body">
                            <h4>Programme Matching Approach</h4>
                            <p>Tailored programme design based on each student's profile, academic value, cultural exposure goals, and required supervision level.</p>
                        </div>
                    </div>
                    <div class="tj-pillar-card">
                        <span class="tj-pillar-num">03</span>
                        <div class="tj-pillar-body">
                            <h4>Student Care Protocol</h4>
                            <p>Ongoing communication, structured monitoring, and immediate response capability throughout the entire programme.</p>
                        </div>
                    </div>
                    <div class="tj-pillar-card">
                        <span class="tj-pillar-num">04</span>
                        <div class="tj-pillar-body">
                            <h4>Dual Support System</h4>
                            <p>An additional layer of coordination connecting families, schools, host institutions abroad, and our dedicated coordination team.</p>
                        </div>
                    </div>
                    <div class="tj-pillar-card">
                        <span class="tj-pillar-num">05</span>
                        <div class="tj-pillar-body">
                            <h4>End-to-End Programme Management</h4>
                            <p>Full oversight from planning to delivery, including programme design, destination selection, accommodation, pre-departure preparation, logistics, and on-the-ground support.</p>
                        </div>
                    </div>
                    <div class="tj-pillar-card">
                        <span class="tj-pillar-num">06</span>
                        <div class="tj-pillar-body">
                            <h4>Live Programme Experience</h4>
                            <p>A digital layer providing structured visibility, communication, and reassurance for families and schools throughout the journey.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel CTA -->
            <div class="tj-panel-cta-section">
                <h2>Plan with Confidence</h2>
                <p>Speak to our team to design the right European experience &mdash; tailored to the student's profile, age group, and objectives.</p>
                <button class="tj-cta-btn" onclick="openTeensModal('outbound')">
                    Design Your Programme <i class="fas fa-arrow-right"></i>
                </button>
            </div>

        </div>
        <!-- /panel-outbound -->

        <!-- ─────── INBOUND PANEL (Europe → Ireland) ─────── -->
        <div class="tj-panel" id="panel-inbound">

            <!-- Panel Header -->
            <div class="tj-panel-header">
                <div class="tj-panel-header-left">
                    <div class="tj-kicker">&#127466;&#127482; Europe &rarr; Ireland</div>
                    <h2 class="tj-panel-title">
                        Premium English &amp; Summer<br>
                        Experiences in <span>Ireland</span>
                    </h2>
                    <p class="tj-panel-intro">
                        We welcome young students from across Europe to Ireland through carefully curated programmes combining English learning, cultural immersion, and structured support &mdash; whether organised through a school or independently by a family.
                    </p>
                </div>
                <div class="tj-panel-header-right">
                    <div class="tj-selectivity-card">
                        <h4>A Curated Programme Selection</h4>
                        <p>Through our Programme Matching Approach, we identify the most suitable programme in Ireland based on the student's age, academic goals, level of independence, and experience expectations &mdash; whether you are a school coordinator or a parent planning independently.</p>
                        <span class="tj-match-tag"><i class="fas fa-map-marker-alt"></i> Based in Ireland</span>
                    </div>
                </div>
            </div>

            <!-- Experience Portfolio -->
            <div class="tj-portfolio-section">
                <div class="tj-section-label">Experience Portfolio</div>
                <h3 class="tj-section-title">Programmes for Europe &rarr; Ireland</h3>

                <div class="tj-portfolio-grid">
                    <div class="tj-portfolio-card foundations">
                        <div class="tj-card-icon"><i class="fas fa-shield-alt"></i></div>
                        <div class="tj-card-tag">Programme Type</div>
                        <div class="tj-card-name">Foundations</div>
                        <p class="tj-card-desc">For younger students beginning their international journey, with high levels of care, safety, and supervision. A structured first experience in Ireland.</p>
                    </div>

                    <div class="tj-portfolio-card explorer">
                        <div class="tj-card-icon"><i class="fas fa-compass"></i></div>
                        <div class="tj-card-tag">Programme Type</div>
                        <div class="tj-card-name">Explorer</div>
                        <p class="tj-card-desc">For teens ready for more independence and social interaction, combining English learning, cultural exposure, and real Irish experiences.</p>
                    </div>

                    <div class="tj-portfolio-card immersion">
                        <div class="tj-card-icon"><i class="fas fa-language"></i></div>
                        <div class="tj-card-tag">Programme Type</div>
                        <div class="tj-card-name">Immersion</div>
                        <p class="tj-card-desc">English-focused programmes combining structured learning and real-life experience &mdash; short-term, high-impact, and designed for genuine language development.</p>
                    </div>
                </div>
            </div>

            <!-- Destinations in Ireland — College-style cards -->
            <div class="tj-ireland-destinations">
                <div class="container">
                    <div class="tj-section-label">Destinations in Ireland</div>
                    <h3 class="tj-section-title">Study Destinations in Ireland</h3>
                    <p class="tj-ireland-destinations-sub">Partner schools across Ireland's main cities, selected through our Global Partner Standard.</p>

                    <div class="partners-grid">

                        <!-- Dublin -->
                        <div class="college-card">
                            <div class="college-card-image" style="background: linear-gradient(135deg, #1a3a6a, #2a5a9a);">
                                <div class="college-partner-badge"><span class="partner-dot"></span> Destination</div>
                            </div>
                            <div class="college-card-body">
                                <h4 class="college-name">Dublin</h4>
                                <p class="college-location"><i class="fas fa-map-pin"></i> Dublin, Ireland</p>
                                <p class="college-desc">School 1 &bull; School 2 &bull; School 3</p>
                                <p class="college-programmes">Foundations &bull; Explorer &bull; Immersion</p>
                            </div>
                        </div>

                        <!-- Cork -->
                        <div class="college-card">
                            <div class="college-card-image" style="background: linear-gradient(135deg, #0a4a2a, #1a6a44);">
                                <div class="college-partner-badge"><span class="partner-dot"></span> Destination</div>
                            </div>
                            <div class="college-card-body">
                                <h4 class="college-name">Cork</h4>
                                <p class="college-location"><i class="fas fa-map-pin"></i> Cork, Ireland</p>
                                <p class="college-desc">School 1 &bull; School 2</p>
                                <p class="college-programmes">Explorer &bull; Immersion</p>
                            </div>
                        </div>

                        <!-- Galway -->
                        <div class="college-card">
                            <div class="college-card-image" style="background: linear-gradient(135deg, #4a1a0a, #6a3010);">
                                <div class="college-partner-badge"><span class="partner-dot"></span> Destination</div>
                            </div>
                            <div class="college-card-body">
                                <h4 class="college-name">Galway</h4>
                                <p class="college-location"><i class="fas fa-map-pin"></i> Galway, Ireland</p>
                                <p class="college-desc">School 1 &bull; School 2</p>
                                <p class="college-programmes">Explorer &bull; Immersion</p>
                            </div>
                        </div>

                        <!-- Limerick -->
                        <div class="college-card">
                            <div class="college-card-image" style="background: linear-gradient(135deg, #3a0a4a, #5a1a6a);">
                                <div class="college-partner-badge"><span class="partner-dot"></span> Coming Soon</div>
                            </div>
                            <div class="college-card-body">
                                <h4 class="college-name">Limerick</h4>
                                <p class="college-location"><i class="fas fa-map-pin"></i> Limerick, Ireland</p>
                                <p class="college-desc">School 1</p>
                                <p class="college-programmes">Foundations &bull; Explorer</p>
                            </div>
                        </div>

                        <!-- Kilkenny -->
                        <div class="college-card">
                            <div class="college-card-image" style="background: linear-gradient(135deg, #0a2a4a, #1a4a6a);">
                                <div class="college-partner-badge"><span class="partner-dot"></span> Coming Soon</div>
                            </div>
                            <div class="college-card-body">
                                <h4 class="college-name">Kilkenny</h4>
                                <p class="college-location"><i class="fas fa-map-pin"></i> Kilkenny, Ireland</p>
                                <p class="college-desc">School 1</p>
                                <p class="college-programmes">Foundations &bull; Immersion</p>
                            </div>
                        </div>

                        <!-- Waterford -->
                        <div class="college-card">
                            <div class="college-card-image" style="background: linear-gradient(135deg, #0a3a2a, #1a5a40);">
                                <div class="college-partner-badge"><span class="partner-dot"></span> Coming Soon</div>
                            </div>
                            <div class="college-card-body">
                                <h4 class="college-name">Waterford</h4>
                                <p class="college-location"><i class="fas fa-map-pin"></i> Waterford, Ireland</p>
                                <p class="college-desc">School 1</p>
                                <p class="college-programmes">Explorer &bull; Immersion</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Approach Pillars -->
            <div class="tj-pillars-section">
                <div class="tj-section-label">Our Approach</div>
                <h3 class="tj-section-title">Local Presence. Real Support.</h3>

                <div class="tj-pillars-grid">
                    <div class="tj-pillar-card">
                        <span class="tj-pillar-num">01</span>
                        <div class="tj-pillar-body">
                            <h4>Global Partner Standard</h4>
                            <p>All partner schools in Ireland are selected through our rigorous standard, ensuring high academic quality, strong welfare systems, safe accommodation, and reliable operations.</p>
                        </div>
                    </div>
                    <div class="tj-pillar-card">
                        <span class="tj-pillar-num">02</span>
                        <div class="tj-pillar-body">
                            <h4>Programme Matching Approach</h4>
                            <p>We identify the most suitable programme in Ireland based on the student's age, academic goals, level of independence, and experience expectations.</p>
                        </div>
                    </div>
                    <div class="tj-pillar-card">
                        <span class="tj-pillar-num">03</span>
                        <div class="tj-pillar-body">
                            <h4>Student Care Protocol</h4>
                            <p>Our local presence in Ireland allows us to provide direct ongoing communication, local coordination, and immediate assistance whenever needed.</p>
                        </div>
                    </div>
                    <div class="tj-pillar-card">
                        <span class="tj-pillar-num">04</span>
                        <div class="tj-pillar-body">
                            <h4>Dual Support System</h4>
                            <p>A connected support layer between families, schools, students, and our team in Ireland &mdash; ensuring nothing falls through the gaps at any stage of the programme.</p>
                        </div>
                    </div>
                    <div class="tj-pillar-card">
                        <span class="tj-pillar-num">05</span>
                        <div class="tj-pillar-body">
                            <h4>End-to-End Programme Management</h4>
                            <p>We manage everything: programme selection, accommodation, activities and excursions, transfers and logistics, and continuous on-the-ground support.</p>
                        </div>
                    </div>
                    <div class="tj-pillar-card">
                        <span class="tj-pillar-num">06</span>
                        <div class="tj-pillar-body">
                            <h4>Live Programme Experience</h4>
                            <p>Students are supported and monitored across every stage, while families remain informed and reassured through structured updates and real-time visibility.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel CTA -->
            <div class="tj-panel-cta-section">
                <h2>Ready to Begin the Irish Experience?</h2>
                <p>Contact our team to start planning &mdash; whether you are a school coordinator or a family enquiring independently, we'll handle everything from programme selection to on-the-ground support.</p>
                <button class="tj-cta-btn" onclick="openTeensModal('inbound')">
                    Begin Planning <i class="fas fa-arrow-right"></i>
                </button>
            </div>

        </div>
        <!-- /panel-inbound -->

    </div>
    <!-- /tj-panels -->

    <!-- ===== LIVE PROGRAMME EXPERIENCE ===== -->
    <section class="tj-lpe-section">
        <div class="tj-lpe-inner">
            <div class="tj-lpe-header">
                <div>
                    <div class="tj-section-label">Live Programme Experience</div>
                    <h2 class="tj-lpe-title">A New Level of <span>Visibility</span> and Reassurance</h2>
                    <p class="tj-lpe-desc">We go beyond programme delivery. Through our Live Programme Experience, families and schools stay connected throughout the journey &mdash; with structured updates that provide reassurance without adding operational burden.</p>
                </div>
                <div class="tj-lpe-right-text">
                    <p>All information is shared <strong>responsibly</strong>, ensuring transparency while respecting student privacy. This creates a more <strong>connected, controlled, and reassuring experience</strong> for everyone involved &mdash; schools, families, and students alike.</p>
                </div>
            </div>

            <div class="tj-lpe-body">
                <div class="tj-lpe-features">
                    <div class="tj-lpe-feature">
                        <div class="tj-lpe-icon"><i class="fas fa-calendar-check"></i></div>
                        <h4>Daily Activity Updates</h4>
                        <p>Regular updates on programme activities, schedules, and student engagement throughout the experience.</p>
                    </div>
                    <div class="tj-lpe-feature">
                        <div class="tj-lpe-icon"><i class="fas fa-star"></i></div>
                        <h4>Key Programme Highlights</h4>
                        <p>Curated highlights from the most meaningful moments of the programme, shared with schools and families.</p>
                    </div>
                    <div class="tj-lpe-feature">
                        <div class="tj-lpe-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <h4>Structured Location Check-ins</h4>
                        <p>Structured location updates when appropriate, providing an additional layer of visibility and safety.</p>
                    </div>
                    <div class="tj-lpe-feature">
                        <div class="tj-lpe-icon"><i class="fas fa-heart"></i></div>
                        <h4>Wellbeing &amp; Routine Updates</h4>
                        <p>Regular wellbeing check-ins ensuring students are settling well, engaged, and supported throughout.</p>
                    </div>
                </div>

                {{-- Decorative update feed mockup --}}
                <div class="tj-lpe-feed" aria-hidden="true">
                    <div class="tj-feed-card">
                        <div class="tj-feed-header">
                            <div class="tj-feed-badge"><i class="fas fa-circle"></i> Live Updates</div>
                            <div class="tj-feed-avatars">
                                <span></span><span></span><span></span>
                            </div>
                        </div>
                        <ul class="tj-feed-list">
                            <li class="tj-feed-item">
                                <div class="tj-feed-item-icon" style="background:rgba(242,101,34,0.1);color:var(--ci-orange);"><i class="fas fa-calendar-check"></i></div>
                                <div class="tj-feed-item-text">
                                    <span class="tj-feed-item-title">Day 3 — Activity Summary</span>
                                    <span class="tj-feed-item-meta">Morning session completed · 09:45</span>
                                </div>
                            </li>
                            <li class="tj-feed-item">
                                <div class="tj-feed-item-icon" style="background:rgba(16,185,129,0.1);color:#10B981;"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="tj-feed-item-text">
                                    <span class="tj-feed-item-title">Location Check-in</span>
                                    <span class="tj-feed-item-meta">Campus confirmed · All students present</span>
                                </div>
                            </li>
                            <li class="tj-feed-item">
                                <div class="tj-feed-item-icon" style="background:rgba(59,130,246,0.1);color:#3B82F6;"><i class="fas fa-star"></i></div>
                                <div class="tj-feed-item-text">
                                    <span class="tj-feed-item-title">Programme Highlight Shared</span>
                                    <span class="tj-feed-item-meta">Cultural visit · City Centre · 14:00</span>
                                </div>
                            </li>
                            <li class="tj-feed-item">
                                <div class="tj-feed-item-icon" style="background:rgba(139,92,246,0.1);color:#8B5CF6;"><i class="fas fa-heart"></i></div>
                                <div class="tj-feed-item-text">
                                    <span class="tj-feed-item-title">Wellbeing Check-in</span>
                                    <span class="tj-feed-item-meta">All students settling well · Evening</span>
                                </div>
                            </li>
                        </ul>
                        <div class="tj-feed-footer">
                            <i class="fas fa-lock"></i> Shared securely with registered contacts only
                        </div>
                    </div>
                </div>
            </div>

            <p class="tj-lpe-note">
                <i class="fas fa-lock" style="color:var(--ci-orange);margin-right:8px;"></i>
                All information is shared responsibly, ensuring transparency while fully respecting student privacy and data protection standards.
            </p>
        </div>
    </section>

    <!-- ===== WHY CI IRELAND ===== -->
    <section style="background: var(--ci-purple); padding: 80px 20px; text-align:center;">
        <div class="container">
            <div class="tj-section-label" style="color: rgba(255,255,255,0.55);">Built on Experience. Focused on Trust.</div>
            <h2 style="font-size: clamp(1.6rem,3vw,2.4rem); font-weight:800; color:#fff; margin-bottom:16px; max-width:680px; margin-left:auto; margin-right:auto; line-height:1.2;">
                With an Established Presence in Ireland and Extensive Experience in International Education
            </h2>
            <p style="font-size:1rem; color:rgba(255,255,255,0.75); max-width:620px; margin:0 auto 40px; line-height:1.75;">
                We deliver programmes with clarity, responsibility, and consistency. We understand what is at stake when working with young students. That is why we take an active role in every stage of the experience.
            </p>
            {{-- TODO: confirm these numbers with your team before going live --}}
            <div class="tj-why-stats">
                <div class="tj-why-stat">
                    <span class="tj-why-stat-num">10+</span>
                    <span class="tj-why-stat-label">Years Experience</span>
                </div>
                <div class="tj-why-stat">
                    <span class="tj-why-stat-num">12+</span>
                    <span class="tj-why-stat-label">Countries Served</span>
                </div>
                <div class="tj-why-stat">
                    <span class="tj-why-stat-num">500+</span>
                    <span class="tj-why-stat-label">Programmes Delivered</span>
                </div>
            </div>
            <button class="tj-cta-btn" onclick="openTeensModal()">
                Speak to Our Team <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </section>

    <!-- ===== CONTACT MODAL ===== -->
    <div class="tj-modal-overlay" id="teensModal">
        <div class="tj-modal-box">
            <button class="tj-modal-close" onclick="closeTeensModal()"><i class="fas fa-times"></i></button>
            <div class="tj-modal-kicker">Get in Touch</div>
            <h2 class="tj-modal-title">Find the Right Programme</h2>
            <p class="tj-modal-sub">Tell us a bit about yourself and the student &mdash; we'll explore the best options together.</p>

            <form class="tj-modal-form" onsubmit="return false;">

                <div class="tj-direction-group">
                    <label>Who are you? <span class="req">*</span></label>
                    <div class="tj-radio-options tj-radio-options--three">
                        <label class="tj-radio-label">
                            <input type="radio" name="who" value="school" onchange="toggleSchoolField(this)"> &#127979; School or Institution
                        </label>
                        <label class="tj-radio-label">
                            <input type="radio" name="who" value="family" onchange="toggleSchoolField(this)"> &#128106; Parent or Family
                        </label>
                        <label class="tj-radio-label">
                            <input type="radio" name="who" value="individual" onchange="toggleSchoolField(this)"> &#128100; Individual
                        </label>
                    </div>
                </div>

                <div class="tj-form-row">
                    <div class="tj-form-group">
                        <label for="tj-name">Full Name <span class="req">*</span></label>
                        <input id="tj-name" type="text" placeholder="Your full name" required autocomplete="name">
                    </div>
                    <div class="tj-form-group">
                        <label for="tj-email">Email <span class="req">*</span></label>
                        <input id="tj-email" type="email" placeholder="your@email.com" required autocomplete="email">
                    </div>
                </div>

                <div class="tj-form-row">
                    <div class="tj-form-group">
                        <label for="tj-phone">Phone / WhatsApp <span class="req">*</span></label>
                        <input id="tj-phone" type="tel" placeholder="+353 83 123 4567" required autocomplete="tel">
                    </div>
                    <div class="tj-form-group tj-conditional-field" id="schoolFieldWrapper" style="display:none;">
                        <label for="tj-school">School / Organisation</label>
                        <input type="text" id="schoolField" placeholder="School or organisation name" autocomplete="organization">
                    </div>
                </div>

                <div class="tj-direction-group">
                    <label>Programme Direction <span class="req">*</span></label>
                    <div class="tj-radio-options">
                        <label class="tj-radio-label" id="radio-outbound">
                            <input type="radio" name="direction" value="outbound"> &#127470;&#127466; Ireland &rarr; Europe
                        </label>
                        <label class="tj-radio-label" id="radio-inbound">
                            <input type="radio" name="direction" value="inbound"> &#127466;&#127482; Europe &rarr; Ireland
                        </label>
                    </div>
                </div>

                <div class="tj-form-row full">
                    <div class="tj-form-group">
                        <label for="tj-message">Tell us about the student</label>
                        <textarea id="tj-message" placeholder="Age, dates in mind, programme interests, any specific requirements..."></textarea>
                    </div>
                </div>

                <button type="submit" class="tj-modal-submit">
                    Send Enquiry <i class="fas fa-arrow-right"></i>
                </button>
                <div id="tj-form-status" aria-live="polite" style="height:0;overflow:hidden;font-size:14px;margin-top:8px;"></div>
            </form>

        </div>
    </div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js" defer></script>
<script src="/js/teens.js" defer></script>
@endpush
