<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - CI Exchange Ireland</title>
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
            background: #f7f5f4;
            color: var(--text-dark);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

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

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 15px;
            transition: color 0.3s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--ci-orange);
        }

        .about-hero {
            position: relative;
            padding: 96px 0 90px;
            background: linear-gradient(135deg, #2f1236 0%, #3D1F3D 50%, #231023 100%);
            color: #fff;
            overflow: hidden;
        }

        .about-hero::before,
        .about-hero::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .about-hero::before {
            width: 420px;
            height: 420px;
            background: radial-gradient(circle, rgba(242,101,34,0.28) 0%, transparent 70%);
            top: -160px;
            right: -120px;
        }

        .about-hero::after {
            width: 360px;
            height: 360px;
            background: radial-gradient(circle, rgba(255,255,255,0.12) 0%, transparent 70%);
            bottom: -180px;
            left: -120px;
        }

        .about-hero-content {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: repeat(12, minmax(0, 1fr));
            gap: 30px;
            align-items: start;
        }

        .about-hero-text {
            grid-column: span 7;
        }

        .about-hero-kicker {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 8px 16px;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.3);
            background: rgba(255,255,255,0.1);
            margin-bottom: 18px;
        }

        .about-hero-title {
            font-size: clamp(34px, 4.8vw, 60px);
            font-weight: 900;
            line-height: 1.05;
            margin-bottom: 16px;
        }

        .about-hero-title span {
            color: var(--ci-orange);
        }

        .about-hero-subtitle {
            font-size: 18px;
            line-height: 1.7;
            color: rgba(255,255,255,0.78);
            max-width: 520px;
        }

        .about-hero-card {
            grid-column: span 5;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.18);
            border-radius: 24px;
            padding: 26px;
            backdrop-filter: blur(8px);
            box-shadow: 0 20px 45px rgba(10, 3, 10, 0.35);
        }

        .hero-card-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .hero-card-list {
            display: grid;
            gap: 12px;
            font-size: 14px;
            color: rgba(255,255,255,0.72);
        }

        .hero-card-list span {
            color: #fff;
            font-weight: 700;
        }

        /* ── Hero Media (single photo + PiP accent) ── */
        .about-hero-media {
            grid-column: span 5;
            position: relative;
            z-index: 1;
        }

        .hero-photo-main {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            height: 480px;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.55);
        }

        .hero-main-img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center center;
        }

        .hero-photo-gradient {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 55%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, transparent 100%);
            z-index: 1;
            pointer-events: none;
        }

        .hero-photo-caption {
            position: absolute;
            bottom: 14px;
            left: 14px;
            background: rgba(0, 0, 0, 0.55);
            backdrop-filter: blur(6px);
            color: #fff;
            font-size: 11px;
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 6px;
            letter-spacing: 0.5px;
            z-index: 2;
        }

        /* PiP: Ireland accent card */
        .hero-accent-card {
            position: absolute;
            bottom: 14px;
            right: 14px;
            width: 136px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.7);
            border: 2px solid rgba(255, 255, 255, 0.2);
            z-index: 2;
        }

        .hero-accent-card img {
            width: 100%;
            height: 82px;
            object-fit: cover;
            display: block;
        }

        .hero-accent-label {
            background: rgba(0, 0, 0, 0.78);
            backdrop-filter: blur(4px);
            padding: 5px 8px;
            font-size: 9px;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.88);
            display: flex;
            align-items: center;
            gap: 4px;
            letter-spacing: 0.5px;
        }

        .hero-accent-label i {
            color: var(--ci-orange);
            font-size: 8px;
        }

        /* ── Flag country badges ── */
        .flag-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 1.5px;
        }

        .flag-br {
            background: linear-gradient(135deg, #009c3b, #00b348);
            color: #fedf00;
            box-shadow: 0 3px 10px rgba(0, 156, 59, 0.4);
        }

        .flag-ie {
            background: linear-gradient(135deg, #169b62, #1db876);
            color: #fff;
            box-shadow: 0 3px 10px rgba(22, 155, 98, 0.4);
        }

        /* ── Hero Journey Strip ── */
        .hero-journey {
            display: flex;
            align-items: center;
            gap: 0;
            margin-top: 32px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 18px;
            padding: 20px 24px;
            max-width: 480px;
        }

        .journey-stop {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .journey-flag {
            font-size: 26px;
            line-height: 1;
            margin-bottom: 8px;
        }

        .journey-year {
            font-size: 28px;
            font-weight: 900;
            color: var(--ci-orange);
            line-height: 1;
        }

        .journey-label {
            font-size: 13px;
            font-weight: 700;
            color: #fff;
            margin-top: 2px;
        }

        .journey-desc {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.5);
            margin-top: 2px;
            letter-spacing: 0.3px;
        }

        .journey-connector {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0 20px;
            padding-bottom: 16px;
        }

        .journey-arrow-line {
            display: flex;
            align-items: center;
            gap: 4px;
            color: rgba(242, 101, 34, 0.6);
        }

        .journey-arrow-line::before {
            content: '';
            display: block;
            width: 40px;
            height: 1px;
            background: linear-gradient(to right, rgba(242,101,34,0.4), var(--ci-orange));
        }

        .journey-arrow-line::after {
            content: '▶';
            font-size: 9px;
            color: var(--ci-orange);
        }

        /* ── Hero Mini Stats ── */
        .hero-mini-stats {
            display: flex;
            gap: 20px;
            margin-top: 16px;
            flex-wrap: wrap;
        }

        .mini-stat {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.55);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .mini-stat span {
            font-size: 14px;
            font-weight: 800;
            color: rgba(255, 255, 255, 0.9);
        }

        .mini-stat-dot {
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.25);
        }

        .section {
            padding: 80px 0;
        }

        .section-title {
            font-size: clamp(26px, 3.4vw, 42px);
            font-weight: 800;
            color: var(--ci-purple);
            margin-bottom: 14px;
        }

        .section-subtitle {
            font-size: 16px;
            color: #63586a;
            line-height: 1.7;
            max-width: 620px;
        }

        /* Image strip inspired by sample */
        .about-gallery {
            padding: 70px 0 40px;
            background: #fff;
        }

        .about-gallery-header {
            display: grid;
            grid-template-columns: repeat(12, minmax(0, 1fr));
            gap: 24px;
            align-items: start;
            margin-bottom: 32px;
        }

        .about-gallery-title {
            grid-column: span 7;
            font-size: clamp(28px, 3.8vw, 44px);
            font-weight: 800;
            color: var(--ci-purple);
            line-height: 1.2;
        }

        .about-gallery-title span {
            color: var(--ci-orange);
        }

        .about-gallery-copy {
            grid-column: span 5;
            font-size: 15px;
            line-height: 1.7;
            color: #6a5b6f;
        }

        .about-gallery-marquee {
            position: relative;
            overflow: hidden;
        }

        .about-gallery-marquee::before,
        .about-gallery-marquee::after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            width: 120px;
            pointer-events: none;
            z-index: 2;
        }

        .about-gallery-marquee::before {
            left: 0;
            background: linear-gradient(to right, #fff 20%, transparent 100%);
        }

        .about-gallery-marquee::after {
            right: 0;
            background: linear-gradient(to left, #fff 20%, transparent 100%);
        }

        .about-gallery-track {
            display: flex;
            width: max-content;
            gap: 20px;
            animation: gallery-marquee 36s linear infinite;
        }

        .about-gallery-track:hover {
            animation-play-state: paused;
        }

        .gallery-item {
            position: relative;
            flex: 0 0 auto;
            border-radius: 26px;
            overflow: hidden;
            background-image: var(--image);
            background-size: cover;
            background-position: center;
            height: 240px;
            width: 260px;
            box-shadow: 0 16px 40px rgba(12, 6, 12, 0.12);
        }

        .gallery-item::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0,0,0,0.08) 0%, rgba(0,0,0,0.2) 100%);
            opacity: 0.6;
        }

        .gallery-item.large {
            width: 320px;
            height: 300px;
        }

        .gallery-item.tall {
            width: 260px;
            height: 320px;
        }

        .gallery-item.medium {
            width: 260px;
            height: 260px;
        }

        .gallery-item.small {
            width: 220px;
            height: 220px;
        }

        .gallery-item.icon {
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--ci-orange);
            color: #fff;
            font-size: 38px;
        }

        @keyframes gallery-marquee {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }

        @media (prefers-reduced-motion: reduce) {
            .about-gallery-track {
                animation: none;
                flex-wrap: wrap;
                width: 100%;
                justify-content: center;
            }

            .about-gallery-marquee::before,
            .about-gallery-marquee::after {
                display: none;
            }
        }

        .story-grid {
            display: grid;
            grid-template-columns: repeat(12, minmax(0, 1fr));
            gap: 28px;
            align-items: start;
        }

        .story-card {
            grid-column: span 6;
            background: #fff;
            border-radius: 24px;
            padding: 28px;
            border: 1px solid rgba(61,31,61,0.1);
            box-shadow: 0 18px 45px rgba(18, 8, 18, 0.08);
        }

        .story-card h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--ci-purple);
        }

        .story-card p {
            font-size: 15px;
            line-height: 1.7;
            color: #574a57;
        }

        .pillars-section {
            background: linear-gradient(150deg, #2a132f 0%, #3a1a41 60%, #2a152a 100%);
            color: #fff;
        }

        .pillars-header {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            align-items: start;
            margin-bottom: 32px;
        }

        .pillars-kicker {
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--ci-orange);
            margin-bottom: 10px;
            font-weight: 700;
        }

        .pillars-title {
            font-size: clamp(26px, 3.4vw, 40px);
            font-weight: 800;
            color: #fff;
        }

        .pillars-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }

        .pillar-card {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            padding: 22px;
            box-shadow: 0 18px 35px rgba(12,6,14,0.3);
            min-height: 210px;
        }

        .pillar-icon {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: rgba(255,255,255,0.12);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
            color: #fff;
            font-size: 18px;
        }

        .pillar-card h4 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .pillar-card p {
            font-size: 13px;
            line-height: 1.6;
            color: rgba(255,255,255,0.7);
        }

        .stats-strip {
            margin-top: 40px;
            background: linear-gradient(135deg, #fff5ed 0%, #ffffff 100%);
            border-radius: 24px;
            padding: 28px;
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            border: 1px solid rgba(242,101,34,0.2);
        }

        .stat-item {
            display: grid;
            gap: 6px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 900;
            color: var(--ci-orange);
        }

        .stat-label {
            font-size: 13px;
            color: #6a5b6f;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .team-section {
            background: #f4f1f6;
        }

        .team-header {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 36px;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 22px;
        }

        .consultant-card {
            position: relative;
            border-radius: 26px;
            overflow: hidden;
            background: #140d1c;
            color: #fff;
            padding: 20px;
            min-height: 360px;
            border: 1px solid rgba(255,255,255,0.08);
            box-shadow: 0 18px 45px rgba(11,4,11,0.25);
            transform-style: preserve-3d;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            --rx: 0deg;
            --ry: 0deg;
        }

        .consultant-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 20% 10%, rgba(242,101,34,0.35), transparent 55%);
            opacity: 0.7;
        }

        .consultant-card:hover {
            transform: perspective(800px) rotateX(var(--rx)) rotateY(var(--ry)) translateY(-6px);
            box-shadow: 0 24px 60px rgba(11,4,11,0.35);
        }

        .consultant-photo {
            position: relative;
            border-radius: 20px;
            height: 220px;
            overflow: hidden;
            background-image:
                var(--photo),
                linear-gradient(135deg, rgba(255,255,255,0.2) 0%, rgba(242,101,34,0.35) 100%);
            background-size: cover;
            background-position: center;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.12);
            z-index: 1;
        }

        .consultant-body {
            position: relative;
            z-index: 1;
            margin-top: 16px;
            display: grid;
            gap: 6px;
        }

        .consultant-name {
            font-size: 18px;
            font-weight: 800;
        }

        .consultant-role {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1.6px;
            color: rgba(255,255,255,0.7);
        }

        .consultant-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(16,10,22,0.95), rgba(61,31,61,0.85));
            padding: 22px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            gap: 12px;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
            z-index: 2;
        }

        .consultant-card:hover .consultant-overlay {
            opacity: 1;
            transform: translateY(0);
        }

        .consultant-overlay h4 {
            font-size: 16px;
            font-weight: 700;
        }

        .consultant-overlay p {
            font-size: 13px;
            line-height: 1.6;
            color: rgba(255,255,255,0.8);
        }

        .ci-footer {
            background: linear-gradient(180deg, #2A152A 0%, #1f0e1f 100%);
            color: #f6eef6;
            padding: 80px 0 36px;
            position: relative;
            overflow: hidden;
        }

        .ci-footer::before,
        .ci-footer::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            opacity: 0.35;
            filter: blur(0.5px);
        }

        .ci-footer::before {
            width: 420px;
            height: 420px;
            background: radial-gradient(circle, rgba(242, 101, 34, 0.26) 0%, transparent 70%);
            top: -180px;
            right: -140px;
        }

        .ci-footer::after {
            width: 520px;
            height: 520px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.12) 0%, transparent 70%);
            bottom: -220px;
            left: -200px;
        }

        .footer-stack {
            display: grid;
            gap: 26px;
            position: relative;
            z-index: 1;
        }

        .footer-panel {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 20px;
            padding: 28px;
            backdrop-filter: blur(8px);
            box-shadow: 0 18px 40px rgba(11, 4, 11, 0.35);
        }

        .footer-top {
            display: grid;
            grid-template-columns: repeat(12, minmax(0, 1fr));
            gap: 20px;
            align-items: start;
        }

        .footer-brand {
            grid-column: span 5;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .footer-logo {
            height: 48px;
            width: auto;
            object-fit: contain;
        }

        .footer-tagline {
            font-size: 15px;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.78);
            max-width: 320px;
        }

        .footer-contact-pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            border-radius: 999px;
            background: rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.1);
            font-weight: 600;
            font-size: 13px;
        }

        .footer-contact {
            grid-column: span 7;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .contact-card {
            display: flex;
            gap: 12px;
            padding: 16px;
            border-radius: 16px;
            background: rgba(0, 0, 0, 0.22);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(242, 101, 34, 0.2);
            color: var(--ci-orange);
            font-size: 18px;
            flex-shrink: 0;
        }

        .contact-label {
            font-size: 11px;
            letter-spacing: 1.6px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.58);
            margin-bottom: 4px;
            font-weight: 600;
        }

        .contact-value {
            font-size: 15px;
            font-weight: 700;
            color: #fff;
            line-height: 1.4;
        }

        .contact-meta {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 6px;
        }

        .footer-map-panel {
            padding: 0;
            overflow: hidden;
        }

        .footer-map-header {
            padding: 24px 28px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .footer-map-title {
            font-size: 18px;
            font-weight: 700;
        }

        .footer-map-link {
            font-size: 13px;
            color: var(--ci-orange);
            text-decoration: none;
            font-weight: 600;
        }

        .footer-map-link:hover {
            text-decoration: underline;
        }

        .footer-map-wrap {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 6;
        }

        .footer-map-wrap iframe {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        .footer-social-panel {
            display: grid;
            gap: 18px;
        }

        .footer-social-header h3 {
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .footer-social-header p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.68);
            max-width: 520px;
            line-height: 1.6;
        }

        .footer-socials {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .footer-social-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.16);
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .footer-social-link i {
            font-size: 16px;
        }

        .footer-social-link:hover {
            transform: translateY(-2px);
            background: rgba(242, 101, 34, 0.18);
            border-color: rgba(242, 101, 34, 0.4);
        }

        .footer-social-link.instagram {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.12) 0%, rgba(242, 101, 34, 0.2) 100%);
        }

        .footer-note {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.5);
        }

        .footer-bottom {
            margin-top: 24px;
            padding-top: 22px;
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.55);
        }

        @media (max-width: 1024px) {
            .about-hero-content,
            .story-grid {
                grid-template-columns: repeat(1, minmax(0, 1fr));
            }

            .about-hero-text,
            .about-hero-card,
            .about-hero-media,
            .story-card {
                grid-column: span 1;
            }

            .hero-photo-main {
                height: 320px;
            }

            .about-gallery-header {
                grid-template-columns: repeat(1, minmax(0, 1fr));
            }

            .about-gallery-title,
            .about-gallery-copy {
                grid-column: span 1;
            }

            .about-gallery-marquee::before,
            .about-gallery-marquee::after {
                width: 80px;
            }

            .pillars-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .stats-strip {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .footer-top {
                grid-template-columns: repeat(1, minmax(0, 1fr));
            }

            .footer-brand,
            .footer-contact {
                grid-column: span 1;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .about-gallery-marquee::before,
            .about-gallery-marquee::after {
                width: 40px;
            }

            .gallery-item {
                width: 210px;
                height: 220px;
            }

            .gallery-item.large {
                width: 260px;
                height: 260px;
            }

            .pillars-grid {
                grid-template-columns: 1fr;
            }

            .stats-strip {
                grid-template-columns: 1fr;
            }

            .footer-contact {
                grid-template-columns: 1fr;
            }

            .footer-map-wrap {
                aspect-ratio: 16 / 9;
            }
        }
    </style>
</head>
<body>
    <div class="top-banner">
        International student ? Get free advice from our experts to find the perfect course and university in Ireland.
        <a href="#">Learn more <i class="fas fa-arrow-right"></i></a>
    </div>

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

    <section class="about-hero">
        <div class="container">
            <div class="about-hero-content">
                <div class="about-hero-text">
                    <div class="about-hero-kicker"><i class="fas fa-star"></i> About CI Ireland</div>
                    <h1 class="about-hero-title">We have become <span> EXPERTS IN HIGHER EDUCATION </span></h1>
                    <p class="about-hero-subtitle">Born in Brazil in 1988, CI became one of Latin America's largest exchange companies. In 2016, we brought that expertise to Dublin — and have been building success stories on the Emerald Isle ever since.</p>

                    <!-- Journey strip: Brazil → Ireland -->
                    <div class="hero-journey">
                        <div class="journey-stop">
                            <div class="journey-flag"><span class="flag-badge flag-br">BR</span></div>
                            <div class="journey-year">1988</div>
                            <div class="journey-label">Born in Brazil</div>
                            <div class="journey-desc">100+ units · 1M+ students</div>
                        </div>
                        <div class="journey-connector">
                            <div class="journey-arrow-line"></div>
                        </div>
                        <div class="journey-stop">
                            <div class="journey-flag"><span class="flag-badge flag-ie">IE</span></div>
                            <div class="journey-year">2016</div>
                            <div class="journey-label">Arrived in Dublin</div>
                            <div class="journey-desc">5,000+ students in Ireland</div>
                        </div>
                    </div>

                    <!-- Mini stats row -->
                    <div class="hero-mini-stats">
                        <div class="mini-stat"><span>100+</span> Units in Brazil</div>
                        <div class="mini-stat-dot"></div>
                        <div class="mini-stat"><span>1M+</span> Students worldwide</div>
                        <div class="mini-stat-dot"></div>
                        <div class="mini-stat"><span>5,000+</span> in Ireland</div>
                    </div>
                </div>
                <div class="about-hero-media">
                    <div class="hero-photo-main">
                        <img class="hero-main-img" src="{{ asset('images/about/ci-brasil.jpg') }}" alt="CI Brazil headquarters">
                        <div class="hero-photo-gradient"></div>
                        <div class="hero-photo-caption"><i class="fas fa-map-pin"></i> CI Brazil Headquarters</div>
                        <div class="hero-accent-card">
                            <img src="{{ asset('images/about/ci-ireland.jpg') }}" alt="CI Ireland office">
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
                <h2 class="about-gallery-title">Real stories, real people </h2>
                <p class="about-gallery-copy">We live the journey with our students. This section is designed for real-life photos: team moments, campus visits, and celebrations.</p>
            </div>
            <div class="about-gallery-marquee" aria-label="CI Ireland moments">
                <div class="about-gallery-track">
                    <div class="gallery-item large" style="--image: url('{{ asset('images/about/about-1.jpg') }}');"></div>
                    <div class="gallery-item medium" style="--image: url('{{ asset('images/about/about-2.jpg') }}');"></div>
                    <div class="gallery-item tall" style="--image: url('{{ asset('images/about/about-3.jpg') }}');"></div>
                    <div class="gallery-item icon"><i class="fas fa-globe"></i></div>
                    <div class="gallery-item small" style="--image: url('{{ asset('images/about/about-4.jpg') }}');"></div>
                    <div class="gallery-item medium" style="--image: url('{{ asset('images/about/about-5.jpg') }}');"></div>

                    <div class="gallery-item large" style="--image: url('{{ asset('images/about/about-1.jpg') }}');" aria-hidden="true"></div>
                    <div class="gallery-item medium" style="--image: url('{{ asset('images/about/about-2.jpg') }}');" aria-hidden="true"></div>
                    <div class="gallery-item tall" style="--image: url('{{ asset('images/about/about-3.jpg') }}');" aria-hidden="true"></div>
                    <div class="gallery-item icon" aria-hidden="true"><i class="fas fa-globe"></i></div>
                    <div class="gallery-item small" style="--image: url('{{ asset('images/about/about-4.jpg') }}');" aria-hidden="true"></div>
                    <div class="gallery-item medium" style="--image: url('{{ asset('images/about/about-5.jpg') }}');" aria-hidden="true"></div>
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
                        <div class="consultant-role">Director & Co-founder</div>
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
                        <div class="consultant-role">Marketing & Sales Manager</div>
                    </div>
                    <div class="consultant-overlay">
                        <h4>Amanda Avila</h4>
                        <p>Known as "the creative." Pet mom and content creator. She came to Ireland as a #viajanteCI 7 years ago and has been part of the #dreamteam ever since. A true pillar who brings possibilities, support, and strength to our operation.</p>
                    </div>
                </article>

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/wagner.jpg') }}');">
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

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/aliny.jpg') }}');">
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

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/talita.jpg') }}');">
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

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/albert.jpg') }}');">
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

                <article class="consultant-card" style="--photo: url('{{ asset('consultant/romario.jpg') }}');">
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


                <article class="consultant-card" style="--photo: url('{{ asset('consultant/gabriel.jpg') }}');">
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
    <footer class="ci-footer" id="contact">
        <div class="container">
            <div class="footer-stack">
                <div class="footer-panel footer-top">
                    <div class="footer-brand">
                        <img class="footer-logo" src="{{ asset('images/logo-ci.png') }}" alt="CI Exchange">
                        <p class="footer-tagline">Study in Ireland with confidence. Our Dublin team helps you choose, apply, and arrive.</p>
                        <div class="footer-contact-pill">
                            <i class="fas fa-phone"></i>
                            Admissions Team +353 83 083 7734 / +353 86 014 2313
                        </div>
                    </div>
                    <div class="footer-contact">
                        <div class="contact-card">
                            <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <div class="contact-label">Visit us</div>
                                <div class="contact-value">CI Intercambio - Irlanda</div>
                                <div class="contact-meta">Dublin office</div>
                            </div>
                        </div>
                        <div class="contact-card">
                            <div class="contact-icon"><i class="fab fa-instagram"></i></div>
                            <div>
                                <div class="contact-label">Instagram</div>
                                <div class="contact-value">@ciirlanda</div>
                                <div class="contact-meta">Send us a DM for quick questions</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-panel footer-map-panel">
                    <div class="footer-map-header">
                        <div class="footer-map-title">Find us on the map</div>
                        <a class="footer-map-link" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2381.85573145558!2d-6.273963188021604!3d53.34583867464635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670c28196db075%3A0xe343f6fe09993741!2sCI%20Interc%C3%A2mbio%20-%20Irlanda!5e0!3m2!1spt-BR!2sbr!4v1772016557899!5m2!1spt-BR!2sbr" target="_blank" rel="noopener">Open in Google Maps</a>
                    </div>
                    <div class="footer-map-wrap">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2381.85573145558!2d-6.273963188021604!3d53.34583867464635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670c28196db075%3A0xe343f6fe09993741!2sCI%20Interc%C3%A2mbio%20-%20Irlanda!5e0!3m2!1spt-BR!2sbr!4v1772016557899!5m2!1spt-BR!2sbr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="CI Intercambio - Irlanda map"></iframe>
                    </div>
                </div>

                <div class="footer-panel footer-social-panel">
                    <div class="footer-social-header">
                        <h3>Follow CI Ireland</h3>
                        <p>Instagram, Facebook, and LinkedIn updates from our Dublin team.</p>
                    </div>
                    <div class="footer-socials">
                        <a class="footer-social-link instagram" href="https://www.instagram.com/ciirlanda/" target="_blank" rel="noopener">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                        <a class="footer-social-link" href="#" aria-disabled="true" title="Add your Facebook link">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a class="footer-social-link" href="#" aria-disabled="true" title="Add your LinkedIn link">
                            <i class="fab fa-linkedin-in"></i> LinkedIn
                        </a>
                    </div>
                    <div class="footer-note">Share your Facebook and LinkedIn URLs to activate these links.</div>
                </div>

                <div class="footer-bottom">
                    <span>CI Exchange Ireland. All rights reserved.</span>
                    <span>Designed for future students worldwide.</span>
                </div>
            </div>
        </div>
    </footer>

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
</body>
</html>






















