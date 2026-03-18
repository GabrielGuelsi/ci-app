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
        International student ? Get free advice from our experts to find the perfect course and university in Ireland.
        <a href="#">Learn more <i class="fas fa-arrow-right"></i></a>
    </div>
@endsection

@section('secondary-bar')
    <div class="secondary-bar">
        <div class="container">
            <div class="secondary-content">
                <div class="secondary-left">
                    <a href="#"><i class="fas fa-globe"></i> Locations</a>
                </div>
                <div class="secondary-right">
                    <i class="fas fa-headset"></i>
                    <span>Admissions Team +353 83 083 7734 / +353 86 014 2313</span>
                </div>
            </div>
        </div>
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
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/higher-education">Higher Education</a></li>
                    <li><a href="/erasmus">Erasmus+</a></li>
                    <li><a href="{{ route('teens') }}">Teens Programmes</a></li>
                    <li><a href="#" data-coming-soon="true">Corporate Learning</a></li>

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
        <li><a href="{{ route('teens') }}">Teens Programmes <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="#" data-coming-soon="true">Corporate Learning <i class="fas fa-chevron-right"></i></a></li>
        <li><a href="#contact">Get in Touch <i class="fas fa-chevron-right"></i></a></li>
    </ul>
@endsection

@section('mobile-nav-footer')
    <div class="mobile-drawer-footer">
        <button class="mobile-cta-btn" onclick="window.location='#contact'">Get in Touch</button>
    </div>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-bg" style="background-image: url('{{ asset('images/hero-higher-education.webp') }}')"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <div class="hero-label animate-in">Study in Ireland</div>
            <h1 class="hero-title animate-in" style="animation-delay: 0.1s">
                <span class="hero-title-white">Higher</span>
                <span class="hero-title-orange">Education</span>
            </h1>
            <h2 class="hero-subtitle animate-in" style="animation-delay: 0.2s">In Ireland</h2>
        </div>

        <div class="slider-controls">
            <div class="slide-indicators">
                <div class="slide-item active" onclick="changeSlide(0)">
                    <div class="slide-number">01</div>
                    <div class="slide-name">Higher Education</div>
                </div>
                <div class="slide-item" onclick="changeSlide(1)">
                    <div class="slide-number">02</div>
                    <div class="slide-name">Erasmus+ Professional Mobility</div>
                </div>
                <div class="slide-item" onclick="changeSlide(2)">
                    <div class="slide-number">03</div>
                    <div class="slide-name">Teens Programmes</div>
                </div>
                <div class="slide-item" onclick="changeSlide(3)">
                    <div class="slide-number">04</div>
                    <div class="slide-name">Corporate Learning</div>
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
                <span class="impact-label">Why CI Ireland</span>
                <h2 class="impact-title">Numbers and Benefits of Choosing CI</h2>
            </div>

            <div class="impact-grid">
                <article class="impact-card impact-card-xl impact-highlight">
                    <div class="impact-card-number">37</div>
                    <h3>37 Years in the Market</h3>
                    <p>Proven experience helping international students plan their study journey in Ireland.</p>
                </article>

                <article class="impact-card impact-card-md">
                    <div class="impact-card-number">11000+</div>
                    <h3>Over 5,000 Students Placed</h3>
                    <p>A strong track record of successful applications across partner institutions.</p>
                </article>

                <article class="impact-card impact-card-md">
                    <div class="impact-card-number">1200+</div>
                    <h3>Over 1,200 Courses in Our Portfolio</h3>
                    <p>Program options for different profiles, academic goals, and English levels.</p>
                </article>

                <article class="impact-card impact-card-wide">
                    <h3>End-to-End Support</h3>
                    <p>From course selection to university acceptance and beyond.</p>
                </article>

                <article class="impact-card impact-card-wide">
                    <h3>Language and Admission Test Preparation</h3>
                    <p>Guidance for language improvement and preparation for institution-required exams.</p>
                </article>

                <article class="impact-card impact-card-wide">
                    <h3>Career-Focused Outcomes</h3>
                    <p>Programs aligned to employability, internships, and long-term opportunities in Ireland.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- Trusted By &mdash; Logo Loop -->
    <section class="trusted-by" aria-label="Trusted By">
        <div class="container">
            <div class="trusted-by-header">
                <div class="trusted-by-label">Trusted By</div>
                <h2 class="trusted-by-title">Colleges &amp; <span>Corporate Partners</span></h2>
            </div>
        </div>

        <div class="marquee-wrapper">
            <div class="marquee-track" id="marqueeTrack">

                <!-- List A -->
                <ul class="marquee-list" aria-label="Partner logos">
                    <li class="marquee-item"><img src="{{ asset('images/partners/nci.webp') }}" alt="NCI" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/citycolleges.png') }}" alt="City Colleges" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/DBS.png') }}" alt="DBS" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/dorset.png') }}" alt="Dorset College" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/Griffith.jpg') }}" alt="Griffith College" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/holmes.png') }}" alt="Holmes Institute Dublin" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/ibat.png') }}" alt="IBAT College" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/Tudublin.jpg') }}" alt="TU Dublin" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/DCU.webp') }}" alt="DCU" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/independent.png') }}" alt="Independent College" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/ICD.png') }}" alt="ICD" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/galwaybss.jpg') }}" alt="Galway Business School" loading="lazy"></li>
                </ul>

                <!-- List B &mdash; duplicate for seamless loop -->
                <ul class="marquee-list" aria-hidden="true">
                    <li class="marquee-item"><img src="{{ asset('images/partners/nci.webp') }}" alt="NCI" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/citycolleges.png') }}" alt="City Colleges" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/DBS.png') }}" alt="DBS" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/dorset.png') }}" alt="Dorset College" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/Griffith.jpg') }}" alt="Griffith College" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/holmes.png') }}" alt="Holmes Institute Dublin" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/ibat.png') }}" alt="IBAT College" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/Tudublin.jpg') }}" alt="TU Dublin" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/DCU.webp') }}" alt="DCU" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/independent.png') }}" alt="Independent College" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/ICD.png') }}" alt="ICD" loading="lazy"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/galwaybss.jpg') }}" alt="Galway Business School" loading="lazy"></li>
                </ul>

            </div>
        </div>
    </section>

    <!-- Find Your Program -->
    <section class="find-program" id="programs">
        <div class="container">

            <div class="find-program-header">
                <div class="find-program-label">Our Programs</div>
                <h2 class="find-program-title">Find Your Program</h2>
                <p class="find-program-subtitle">What best describes you?</p>
            </div>

            <!-- Persona Tabs -->
            <div class="persona-tabs" role="tablist" aria-label="Program categories">
                <button class="persona-tab active" role="tab" aria-selected="true" aria-controls="panel-higher-ed" data-panel="higher-ed">
                    Higher Education
                </button>
                <button class="persona-tab" role="tab" aria-selected="false" aria-controls="panel-erasmus" data-panel="erasmus">
                    Erasmus+ Professional Mobility
                </button>
                <button class="persona-tab" role="tab" aria-selected="false" aria-controls="panel-teens" data-panel="teens">
                    Teens Programmes
                </button>
                <button class="persona-tab" role="tab" aria-selected="false" aria-controls="panel-corporate" data-panel="corporate">
                    Corporate Learning
                </button>
            </div>

            <!-- Program Panels -->
            <div class="program-panels">

                <!-- Higher Education -->
                <div class="program-panel active" id="panel-higher-ed" role="tabpanel">
                    <div class="program-panel-inner">
                        <div class="program-panel-image">
                            <img src="{{ asset('images/hero-higher-education.webp') }}" alt="Higher Education in Ireland" loading="lazy">
                        </div>
                        <div class="program-panel-content">
                            <div class="program-panel-tag">Higher Education</div>
                            <h3 class="program-panel-title">Study at a Top Irish University</h3>
                            <p class="program-panel-desc">Complete support for international students looking to study at universities and colleges in Ireland from Pathway programmes through Undergraduate, Postgraduate and Masters degrees.</p>
                            <ul class="program-bullets">
                                <li>Pathway, Undergraduate, Postgraduate and Masters programmes available</li>
                                <li>Free personalised counselling to find the right course and institution for you</li>
                                <li>End-to-end support with visas, enrolment &amp; academic progression</li>
                            </ul>
                            <div class="program-panel-ctas">
                                <a href="#" class="program-cta-primary">Get Free Advice <i class="fas fa-arrow-right"></i></a>
                                <a href="#" class="program-cta-secondary">Explore Program <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Erasmus -->
                <div class="program-panel" id="panel-erasmus" role="tabpanel">
                    <div class="program-panel-inner">
                        <div class="program-panel-image">
                            <img src="{{ asset('images/hero-erasmus.webp') }}" alt="Erasmus Programs in Ireland" loading="lazy">
                        </div>
                        <div class="program-panel-content">
                            <div class="program-panel-tag">Erasmus+ Professional Mobility</div>
                            <h3 class="program-panel-title">Professional Mobility for Educators</h3>
                            <p class="program-panel-desc">International professional mobility programmes for educators and education professionals designed to drive professional development and educational innovation.</p>
                            <ul class="program-bullets">
                                <li>Tailored mobility programmes for teachers, trainers and education staff</li>
                                <li>Funded opportunities through the Erasmus+ programme</li>
                                <li>Hands-on professional development in an international environment</li>
                            </ul>
                            <div class="program-panel-ctas">
                                <a href="#" class="program-cta-primary">Talk to an Advisor <i class="fas fa-arrow-right"></i></a>
                                <a href="#" class="program-cta-secondary">Explore Program <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Teens -->
                <div class="program-panel" id="panel-teens" role="tabpanel">
                    <div class="program-panel-inner">
                        <div class="program-panel-image">
                            <img src="{{ asset('images/hero-teens.webp') }}" alt="Teens Programs in Ireland" loading="lazy">
                        </div>
                        <div class="program-panel-content">
                            <div class="program-panel-tag">Teens Programmes</div>
                            <h3 class="program-panel-title">A Summer That Changes Everything</h3>
                            <p class="program-panel-desc">Short and long-term study experiences designed for teenagers who want to grow in confidence, language, and independence.</p>
                            <ul class="program-bullets">
                                <li>Dedicated personal team providing 24/7 care and guidance</li>
                                <li>Real English immersion in authentic academic environments</li>
                                <li>Lifelong global friendships and international connections</li>
                            </ul>
                            <div class="program-panel-ctas">
                                <a href="#" class="program-cta-primary">Talk to an Advisor <i class="fas fa-arrow-right"></i></a>
                                <a href="#" class="program-cta-secondary">Explore Program <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Corporate -->
                <div class="program-panel" id="panel-corporate" role="tabpanel">
                    <div class="program-panel-inner">
                        <div class="program-panel-image">
                            <img src="{{ asset('images/hero-corporate-programs.webp') }}" alt="Corporate Programs" loading="lazy">
                        </div>
                        <div class="program-panel-content">
                            <div class="program-panel-tag">Corporate Learning</div>
                            <h3 class="program-panel-title">Upskill Your Team Abroad</h3>
                            <p class="program-panel-desc">Tailored language and professional development programs for companies investing in their people.</p>
                            <ul class="program-bullets">
                                <li>Language training combined with real professional development</li>
                                <li>Internationally recognized certificates and qualifications</li>
                                <li>Fully flexible schedules designed around your team's calendar</li>
                            </ul>
                            <div class="program-panel-ctas">
                                <a href="#" class="program-cta-primary">Talk to an Advisor <i class="fas fa-arrow-right"></i></a>
                                <a href="#" class="program-cta-secondary">Explore Program <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /program-panels -->
        </div>
    </section>

    <!-- Social Proof / Testimonials -->
    <section class="testimonials" id="testimonials">
        <div class="container">

            <div class="testimonials-header">
                <div class="testimonials-label">Success Stories</div>
                <h2 class="testimonials-title">Real Students, Real Results</h2>
                <p class="testimonials-subtitle">See how our advisors helped hundreds of students achieve their dream of studying in Ireland.</p>
            </div>

            <div class="testimonials-grid">

                <!-- Card 1 - Aliny -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        <img src="{{ asset('students/alinystudent.webp') }}" alt="Yago & Tiago Gontijo with Aliny" style="object-position: center 60%;" loading="lazy">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p class="testimonial-quote">So much gratitude for clearing up all our doubts and for all the support throughout our entire process! Highly recommended!</p>
                        <div class="testimonial-student">
                            <div class="student-name">Yago &amp; Tiago Gontijo</div>
                            <div class="student-course">BA in Business &mdash; Independent College</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/aliny.webp') }}" alt="Aliny" class="consultant-photo" loading="lazy">
                            <div class="consultant-info">
                                <div class="consultant-name">Aliny</div>
                                <div class="consultant-badge">
                                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                    Verified Advisor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 - Albert -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        <img src="{{ asset('students/albertstudent.webp') }}" alt="Albert's student" style="object-position: center center;" loading="lazy">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p class="testimonial-quote">Incredible support and dedication throughout every step of my application process. Moving to Ireland was a dream &mdash; Albert made it real!</p>
                        <div class="testimonial-student">
                            <div class="student-name">Juan Fernando</div>
                            <div class="student-course">Higher Diploma in Science in Data Analytics - City colleges</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/albert.webp') }}" alt="Albert" class="consultant-photo" loading="lazy">
                            <div class="consultant-info">
                                <div class="consultant-name">Albert</div>
                                <div class="consultant-badge">
                                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                    Verified Advisor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 - Gabriel -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        <img src="{{ asset('students/gabrielstudent.webp') }}" alt="Gabriel's student" style="object-position: center center;" loading="lazy">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p class="testimonial-quote">Professional, caring and always available. My dream of studying in Ireland became a reality thanks to Gabriel's guidance!</p>
                        <div class="testimonial-student">
                            <div class="student-name">Bruno Silva</div>
                            <div class="student-course">Cybersecurity &mdash; City Colleges</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/gabriel.webp') }}" alt="Gabriel" class="consultant-photo" loading="lazy">
                            <div class="consultant-info">
                                <div class="consultant-name">Gabriel</div>
                                <div class="consultant-badge">
                                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                    Verified Advisor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 4 - Romario -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        <img src="{{ asset('students/romariostudent.webp') }}" alt="Romario's student" style="object-position: center center;" loading="lazy">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p class="testimonial-quote">Every detail of my application was handled with precision and warmth. Outstanding service &mdash; I could not have done it without Romario!</p>
                        <div class="testimonial-student">
                            <div class="student-name">Elis</div>
                            <div class="student-course">Higher Certificate in Sound Engineering and Music Prodution - DBS</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/romario.webp') }}" alt="Romario" class="consultant-photo" loading="lazy">
                            <div class="consultant-info">
                                <div class="consultant-name">Romario</div>
                                <div class="consultant-badge">
                                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                    Verified Advisor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 5 - Talita -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        <img src="{{ asset('students/talitastudent.webp') }}" alt="Talita's student" style="object-position: center center;" loading="lazy">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p class="testimonial-quote">From my very first question to my arrival in Dublin, I felt fully supported every step of the way. Talita is simply the best!</p>
                        <div class="testimonial-student">
                            <div class="student-name">Yari Yolibet</div>
                            <div class="student-course">BA in Business - Holmes Institute</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/talita.webp') }}" alt="Talita" class="consultant-photo" loading="lazy">
                            <div class="consultant-info">
                                <div class="consultant-name">Talita</div>
                                <div class="consultant-badge">
                                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                    Verified Advisor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 6 - Wagner -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        <img src="{{ asset('students/wagnerstudent.webp') }}" alt="Wagner's student" style="object-position: center center;" loading="lazy">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p class="testimonial-quote">Wagner's knowledge of Irish education is truly unmatched. He made the whole process smooth and stress-free. Best decision I ever made!</p>
                        <div class="testimonial-student">
                            <div class="student-name">Pedro Costa</div>
                            <div class="student-course">BSc in Computing &mdash; TU Dublin</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/wagner.webp') }}" alt="Wagner" class="consultant-photo" loading="lazy">
                            <div class="consultant-info">
                                <div class="consultant-name">Wagner</div>
                                <div class="consultant-badge">
                                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                    Verified Advisor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /testimonials-grid -->
        </div>
    </section>
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
            name: 'Erasmus+ Professional Mobility',
            titleWhite: 'Erasmus+',
            titleOrange: 'Professional Mobility',
            subtitle: 'for educators & education professionals',
            bg: "{{ asset('images/hero-erasmus.webp') }}",
            position: 'center center'
        },
        {
            number: '03',
            name: 'Teens Programmes',
            titleWhite: 'Teens',
            titleOrange: 'Programmes',
            subtitle: 'Short and long-term study experiences in Ireland',
            bg: "{{ asset('images/hero-teens.webp') }}",
            position: 'center 35%'
        },
        {
            number: '04',
            name: 'Corporate Learning',
            titleWhite: 'Corporate',
            titleOrange: 'Learning',
            subtitle: 'Tailored language and training solutions for companies',
            bg: "{{ asset('images/hero-corporate-programs.webp') }}",
            position: 'center center'
        }
    ];
</script>
<script src="/js/welcome.js" defer></script>
@endpush

