<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CI Exchange - Study in Ireland</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-ci.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-ci.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --ci-orange: #F26522;
            --ci-orange-hover: #E55512;
            --ci-purple: #3D1F3D;
            --ci-dark-purple: #2A152A;
            --text-dark: #333;
            --text-light: #666;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }

        /* Top Banner */
        .top-banner {
            background: var(--ci-orange);
            color: white;
            text-align: center;
            padding: 12px;
            font-size: 14px;
            font-weight: 500;
            position: relative;
            z-index: 1000;
        }

        .top-banner a {
            color: white;
            text-decoration: none;
            margin-left: 8px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: gap 0.3s;
        }

        .top-banner a:hover {
            gap: 10px;
        }

        /* Secondary Bar */
        .secondary-bar {
            background: #f5f5f5;
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .secondary-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: var(--text-light);
        }

        .secondary-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .secondary-left a {
            color: var(--text-light);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: color 0.3s;
        }

        .secondary-left a:hover {
            color: var(--ci-orange);
        }

        .secondary-right {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .secondary-right i {
            color: var(--ci-orange);
        }

        /* Main Navigation */
        .main-nav {
            background: white;
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .logo-image {
            height: 52px;
            width: auto;
            object-fit: contain;
            display: block;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 35px;
            list-style: none;
        }

        .nav-links li {
            position: relative;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: color 0.3s;
            padding: 10px 0;
        }

        .nav-links a:hover {
            color: var(--ci-orange);
        }

        .dropdown-icon {
            font-size: 12px;
            transition: transform 0.3s;
        }

        .nav-links li:hover .dropdown-icon {
            transform: rotate(180deg);
        }

        /* Mega Menu */
        .mega-menu {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            background: white;
            min-width: 600px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15);
            border-radius: 12px;
            padding: 30px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .nav-links li:hover .mega-menu {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .mega-menu-column h4 {
            color: var(--ci-orange);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .mega-menu-column ul {
            list-style: none;
        }

        .mega-menu-column li {
            margin-bottom: 10px;
        }

        .mega-menu-column a {
            font-weight: 500;
            font-size: 14px;
            color: var(--text-light);
            padding: 0;
        }

        .mega-menu-column a:hover {
            color: var(--ci-orange);
            padding-left: 5px;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .search-btn {
            width: 40px;
            height: 40px;
            border: none;
            background: transparent;
            cursor: pointer;
            font-size: 18px;
            color: var(--text-dark);
            transition: color 0.3s;
        }

        .search-btn:hover {
            color: var(--ci-orange);
        }

        .login-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border: 2px solid #ddd;
            background: white;
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
            color: var(--text-dark);
        }

        .login-btn:hover {
            border-color: var(--ci-orange);
            color: var(--ci-orange);
        }

        .cta-btn {
            background: var(--ci-orange);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(242, 101, 34, 0.3);
        }

        .cta-btn:hover {
            background: var(--ci-orange-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(242, 101, 34, 0.4);
        }

        /* Hero Section */
        .hero {
            position: relative;
            height: calc(100vh - 140px);
            min-height: 600px;
            background: linear-gradient(135deg, var(--ci-purple) 0%, var(--ci-dark-purple) 100%);
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .hero-bg {
            position: absolute;
            right: -10%;
            top: 50%;
            transform: translateY(-50%);
            width: 70%;
            height: 120%;
            background-size: cover;
            background-position: 72% 75%;
            mask-image: linear-gradient(to left, black 50%, transparent 100%);
            -webkit-mask-image: linear-gradient(to left, black 50%, transparent 100%);
            opacity: 0.9;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 30% 50%, transparent 0%, rgba(61, 31, 61, 0.4) 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
            padding-left: 5%;
        }

        .hero-label {
            display: inline-block;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            padding: 8px 16px;
            border-radius: 20px;
            color: rgba(255,255,255,0.9);
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
            border: 1px solid rgba(255,255,255,0.2);
        }

        .hero-title {
            font-size: 80px;
            font-weight: 900;
            line-height: 0.9;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .hero-title-white {
            color: white;
            display: block;
            text-shadow: 2px 2px 20px rgba(0,0,0,0.3);
        }

        .hero-title-orange {
            color: var(--ci-orange);
            display: block;
            text-shadow: 2px 2px 20px rgba(242, 101, 34, 0.4);
        }

        .hero-subtitle {
            font-size: 32px;
            color: white;
            font-weight: 800;
            text-transform: uppercase;
            margin-top: 20px;
            letter-spacing: 1px;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
        }

        /* Slider Controls */
        .slider-controls {
            position: absolute;
            bottom: 60px;
            left: 5%;
            z-index: 10;
            display: flex;
            align-items: center;
            gap: 40px;
        }

        .slide-indicators {
            display: flex;
            gap: 30px;
        }

        .slide-item {
            cursor: pointer;
            opacity: 0.5;
            transition: all 0.3s;
            padding-bottom: 10px;
            border-bottom: 3px solid transparent;
        }

        .slide-item.active {
            opacity: 1;
            border-bottom-color: var(--ci-orange);
        }

        .slide-number {
            font-size: 14px;
            font-weight: 700;
            color: white;
            margin-bottom: 5px;
        }

        .slide-name {
            font-size: 16px;
            font-weight: 600;
            color: white;
            text-transform: uppercase;
        }

        .slider-arrows {
            display: flex;
            gap: 15px;
            margin-left: 40px;
        }

        .arrow-btn {
            width: 50px;
            height: 50px;
            border: 2px solid rgba(255,255,255,0.3);
            background: transparent;
            border-radius: 50%;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            font-size: 18px;
        }

        .arrow-btn:hover {
            background: rgba(255,255,255,0.1);
            border-color: white;
            transform: scale(1.1);
        }

        /* WhatsApp Float */
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 32px;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s;
            animation: pulse 2s infinite;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 30px rgba(37, 211, 102, 0.6);
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4); }
            50% { box-shadow: 0 4px 30px rgba(37, 211, 102, 0.7); }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-in {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .nav-links {
                display: none;
            }

            .hero-title {
                font-size: 60px;
            }

            .hero-bg {
                width: 100%;
                opacity: 0.4;
                right: 0;
                background-position: center;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 48px;
            }

            .hero-subtitle {
                font-size: 24px;
            }

            .secondary-content {
                flex-direction: column;
                gap: 10px;
            }

            .slider-controls {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Top Banner -->
    <div class="top-banner">
        International student ? Get free advice from our experts to find the perfect course and university in Ireland.
        <a href="#">Learn more <i class="fas fa-arrow-right"></i></a>
    </div>

    <!-- Secondary Bar -->
    <div class="secondary-bar">
        <div class="container">
            <div class="secondary-content">
                <div class="secondary-left">
                    <a href="#"><i class="fas fa-globe"></i> Locations</a>
                </div>
                <div class="secondary-right">
                    <i class="fas fa-headset"></i>
                    <span>Admissions Team +353 1 555 1234</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="main-nav">
        <div class="container">
            <div class="nav-content">
                <a href="#" class="logo">
                    <img class="logo-image" src="{{ asset('images/logo-ci.png') }}" alt="CI Exchange">
                </a>

                <ul class="nav-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Higher Education</a></li>
                    <li><a href="#">Erasmus</a></li>
                    <li><a href="#">Teens</a></li>
                    <li><a href="#">Ecommerce</a></li>
                    <li><a href="#">Corporate Programs</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>

                <div class="nav-actions">
                    <button class="login-btn">
                        <i class="far fa-user"></i>
                        Log in
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-bg" style="background-image: url('{{ asset('images/hero-higher-education.jpg') }}')"></div>
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
                    <div class="slide-name">Erasmus</div>
                </div>
                <div class="slide-item" onclick="changeSlide(2)">
                    <div class="slide-number">03</div>
                    <div class="slide-name">Teens</div>
                </div>
                <div class="slide-item" onclick="changeSlide(3)">
                    <div class="slide-number">04</div>
                    <div class="slide-name">Corporate Programs</div>
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

    <!-- WhatsApp Float -->
    <div class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </div>

    <script>
        // Slider functionality
        const slides = [
            {
                number: '01',
                name: 'Higher Education',
                titleWhite: 'Higher',
                titleOrange: 'Education',
                subtitle: 'In Ireland',
                bg: "{{ asset('images/hero-higher-education.jpg') }}",
                position: '72% 35%'
            },
            {
                number: '02',
                name: 'Erasmus',
                titleWhite: 'Erasmus',
                titleOrange: 'Programmes',
                subtitle: 'For undergraduate and postgraduate students',
                bg: "{{ asset('images/hero-erasmus.jpg') }}",
                position: 'center center'
            },
            {
                number: '03',
                name: 'Teens',
                titleWhite: 'Teens',
                titleOrange: 'Programs',
                subtitle: 'Short and long-term study experiences in Ireland',
                bg: "{{ asset('images/hero-teens.jpg') }}",
                position: 'center 35%'
            },
            {
                number: '04',
                name: 'Corporate Programs',
                titleWhite: 'Corporate',
                titleOrange: 'Programs',
                subtitle: 'Tailored language and training solutions for companies',
                bg: "{{ asset('images/hero-corporate-programs.jpg') }}",
                position: 'center center'
            }
        ];

        let currentSlide = 0;

        function updateSlide() {
            const slide = slides[currentSlide];
            const heroBg = document.querySelector('.hero-bg');
            const heroTitleWhite = document.querySelector('.hero-title-white');
            const heroTitleOrange = document.querySelector('.hero-title-orange');
            const heroSubtitle = document.querySelector('.hero-subtitle');

            // Update background with fade
            heroBg.style.opacity = '0';
            setTimeout(() => {
                heroBg.style.backgroundImage = `url('${slide.bg}')`;
                heroBg.style.backgroundPosition = slide.position || 'center center';
                heroBg.style.opacity = '0.9';
            }, 300);

            // Update text with animation
            heroTitleWhite.style.animation = 'none';
            heroTitleOrange.style.animation = 'none';
            heroSubtitle.style.animation = 'none';

            setTimeout(() => {
                heroTitleWhite.textContent = slide.titleWhite;
                heroTitleOrange.textContent = slide.titleOrange;
                heroSubtitle.textContent = slide.subtitle;

                heroTitleWhite.style.animation = 'fadeInUp 0.6s ease-out forwards';
                heroTitleOrange.style.animation = 'fadeInUp 0.6s ease-out 0.1s forwards';
                heroSubtitle.style.animation = 'fadeInUp 0.6s ease-out 0.2s forwards';
            }, 50);

            // Update indicators
            document.querySelectorAll('.slide-item').forEach((item, index) => {
                item.classList.toggle('active', index === currentSlide);
            });
        }

        function changeSlide(index) {
            currentSlide = index;
            updateSlide();
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            updateSlide();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            updateSlide();
        }

        // Auto-advance slider
        setInterval(nextSlide, 6000);

        // Smooth scroll for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Parallax effect on hero
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const heroBg = document.querySelector('.hero-bg');
            if (heroBg && scrolled < window.innerHeight) {
                heroBg.style.transform = `translateY(calc(-50% + ${scrolled * 0.5}px))`;
            }
        });
    </script>
</body>
</html>
