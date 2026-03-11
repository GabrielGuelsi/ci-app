<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CI Ireland - Home Page</title>
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
        /* Numbers + Benefits Bento */
        .ci-impact {
            padding: 70px 0;
            background:
                radial-gradient(circle at 100% 0%, rgba(242, 101, 34, 0.08) 0%, transparent 45%),
                radial-gradient(circle at 0% 100%, rgba(61, 31, 61, 0.1) 0%, transparent 45%),
                #fbfaf9;
        }

        .impact-header {
            margin-bottom: 30px;
            text-align: left;
        }

        .impact-label {
            display: inline-block;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            color: var(--ci-orange);
            margin-bottom: 10px;
        }

        .impact-title {
            font-size: clamp(28px, 3.8vw, 48px);
            line-height: 1.05;
            color: var(--ci-purple);
            font-weight: 900;
            text-transform: uppercase;
            max-width: 820px;
        }

        .impact-grid {
            display: grid;
            grid-template-columns: repeat(12, minmax(0, 1fr));
            gap: 16px;
        }

        .impact-card {
            position: relative;
            border-radius: 22px;
            background: white;
            overflow: hidden;
            padding: 26px;
            border: 1px solid rgba(61, 31, 61, 0.08);
            box-shadow: 0 14px 35px rgba(14, 6, 14, 0.08);
            transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
        }

        .impact-card::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 1px;
            background: linear-gradient(135deg, rgba(242, 101, 34, 0.45), rgba(61, 31, 61, 0.24));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask-composite: exclude;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .impact-card:hover {
            transform: translateY(-6px);
            border-color: rgba(242, 101, 34, 0.4);
            box-shadow: 0 20px 45px rgba(14, 6, 14, 0.14);
        }

        .impact-card:hover::before {
            opacity: 1;
        }

        .impact-card-number {
            font-size: clamp(36px, 5vw, 58px);
            line-height: 1;
            font-weight: 900;
            color: var(--ci-orange);
            margin-bottom: 12px;
        }

        .impact-card h3 {
            font-size: 20px;
            font-weight: 800;
            color: var(--ci-purple);
            margin-bottom: 8px;
        }

        .impact-card p {
            font-size: 14px;
            line-height: 1.6;
            color: #574a57;
        }

        .impact-highlight {
            background: linear-gradient(145deg, var(--ci-purple) 0%, var(--ci-dark-purple) 100%);
            color: white;
        }

        .impact-highlight .impact-card-number,
        .impact-highlight h3,
        .impact-highlight p {
            color: white;
        }

        .impact-card-xl {
            grid-column: span 6;
            min-height: 250px;
        }

        .impact-card-md {
            grid-column: span 3;
            min-height: 250px;
        }

        .impact-card-wide {
            grid-column: span 4;
            min-height: 210px;
        }

        /* Trusted By — Logo Loop */
        .trusted-by {
            padding: 64px 0 56px;
            background: white;
            overflow: hidden;
        }

        .trusted-by-header {
            text-align: center;
            margin-bottom: 44px;
        }

        .trusted-by-label {
            display: inline-block;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            color: var(--ci-orange);
            margin-bottom: 10px;
        }

        .trusted-by-title {
            font-size: clamp(22px, 3vw, 34px);
            font-weight: 900;
            color: var(--ci-purple);
            text-transform: uppercase;
        }

        .trusted-by-title span {
            color: var(--ci-orange);
        }

        .marquee-wrapper {
            position: relative;
            overflow: hidden;
        }

        .marquee-wrapper::before,
        .marquee-wrapper::after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            width: 140px;
            z-index: 2;
            pointer-events: none;
        }

        .marquee-wrapper::before {
            left: 0;
            background: linear-gradient(to right, white 20%, transparent 100%);
        }

        .marquee-wrapper::after {
            right: 0;
            background: linear-gradient(to left, white 20%, transparent 100%);
        }

        .marquee-track {
            display: flex;
            width: max-content;
            animation: marquee-scroll 38s linear infinite;
        }

        .marquee-track:hover {
            animation-play-state: paused;
        }

        @keyframes marquee-scroll {
            from { transform: translateX(0); }
            to   { transform: translateX(-50%); }
        }

        .marquee-list {
            display: flex;
            align-items: center;
            gap: 56px;
            padding: 12px 28px;
            list-style: none;
        }

        .marquee-item {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 160px;
            height: 72px;
            padding: 10px 16px;
            border-radius: 12px;
            background: white;
            border: 1.5px solid #eeeeee;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            cursor: default;
        }

        .marquee-item:hover {
            transform: scale(1.06);
            border-color: rgba(242, 101, 34, 0.3);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        }

        .marquee-item img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
            -webkit-user-drag: none;
            pointer-events: none;
        }

        @media (max-width: 768px) {
            .trusted-by {
                padding: 48px 0 40px;
            }

            .marquee-wrapper::before,
            .marquee-wrapper::after {
                width: 60px;
            }

            .marquee-list {
                gap: 20px;
                padding: 10px 10px;
            }

            .marquee-item {
                width: 120px;
                height: 56px;
                padding: 8px 12px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .marquee-track {
                animation: none;
                flex-wrap: wrap;
                width: 100%;
                justify-content: center;
            }
        }

        /* ===== Find Your Program ===== */
        .find-program {
            padding: 88px 0 96px;
            background: #f9f8f6;
        }

        .find-program-header {
            text-align: center;
            margin-bottom: 44px;
        }

        .find-program-label {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--ci-orange);
            margin-bottom: 12px;
        }

        .find-program-title {
            font-size: clamp(30px, 5vw, 50px);
            font-weight: 900;
            color: var(--ci-purple);
            line-height: 1.1;
            margin-bottom: 10px;
        }

        .find-program-subtitle {
            font-size: 17px;
            color: var(--text-light);
            font-weight: 500;
        }

        /* Persona Tabs */
        .persona-tabs {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 40px;
        }

        .persona-tab {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 26px;
            border-radius: 50px;
            border: 2px solid #e0ddd8;
            background: white;
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
            font-size: 15px;
            font-weight: 600;
            color: #888;
            transition: all 0.25s ease;
            white-space: nowrap;
        }

        .persona-tab:hover {
            border-color: var(--ci-orange);
            color: var(--ci-orange);
        }

        .persona-tab.active {
            background: var(--ci-orange);
            border-color: var(--ci-orange);
            color: white;
            box-shadow: 0 4px 20px rgba(242, 101, 34, 0.28);
        }

        /* Program Panels */
        .program-panels {
            position: relative;
        }

        .program-panel {
            display: none;
        }

        .program-panel.active {
            display: block;
            animation: fadeInPanel 0.35s ease forwards;
        }

        @keyframes fadeInPanel {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .program-panel-inner {
            display: flex;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 48px rgba(0, 0, 0, 0.11);
            background: white;
            min-height: 440px;
        }

        .program-panel-image {
            flex: 0 0 45%;
            position: relative;
            overflow: hidden;
        }

        .program-panel-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
            transition: transform 0.5s ease;
        }

        .program-panel-inner:hover .program-panel-image img {
            transform: scale(1.03);
        }

        .program-panel-content {
            flex: 1;
            padding: 52px 52px 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .program-panel-tag {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--ci-orange);
            margin-bottom: 10px;
        }

        .program-panel-title {
            font-size: clamp(22px, 2.8vw, 34px);
            font-weight: 900;
            color: var(--ci-purple);
            line-height: 1.15;
            margin-bottom: 14px;
        }

        .program-panel-desc {
            font-size: 15px;
            color: var(--text-light);
            line-height: 1.65;
            margin-bottom: 24px;
        }

        .program-bullets {
            list-style: none;
            margin-bottom: 34px;
            display: flex;
            flex-direction: column;
            gap: 11px;
        }

        .program-bullets li {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            font-size: 14px;
            color: var(--text-dark);
            font-weight: 500;
            line-height: 1.45;
        }

        .program-bullets li::before {
            content: '';
            flex-shrink: 0;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--ci-orange);
            margin-top: 4px;
        }

        .program-panel-ctas {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .program-cta-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            background: var(--ci-orange);
            color: white;
            border-radius: 50px;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.25s;
        }

        .program-cta-primary:hover {
            background: var(--ci-orange-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(242, 101, 34, 0.35);
        }

        .program-cta-secondary {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            font-weight: 700;
            color: var(--ci-purple);
            text-decoration: none;
            transition: gap 0.25s, color 0.25s;
        }

        .program-cta-secondary:hover {
            gap: 10px;
            color: var(--ci-orange);
        }

        @media (max-width: 900px) {
            .program-panel-content {
                padding: 40px 36px;
            }
        }

        @media (max-width: 768px) {
            .find-program {
                padding: 60px 0 68px;
            }

            .find-program-header {
                margin-bottom: 32px;
                padding: 0 4px;
            }

            .persona-tabs {
                flex-wrap: wrap;
                justify-content: center;
                gap: 8px;
                margin-bottom: 28px;
                padding: 0;
            }

            .persona-tab {
                flex: 0 1 calc(50% - 4px);
                justify-content: center;
                padding: 10px 14px;
                font-size: 13px;
            }

            .program-panel-inner {
                flex-direction: column;
                border-radius: 16px;
                min-height: unset;
            }

            .program-panel-image {
                flex: none;
                height: 230px;
            }

            .program-panel-content {
                padding: 30px 24px 34px;
            }

            .program-panel-ctas {
                gap: 14px;
            }
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
        .coming-soon-toast {
            position: fixed;
            right: 24px;
            bottom: 24px;
            z-index: 1200;
            background: #1f1f1f;
            color: #fff;
            padding: 14px 18px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
            font-size: 14px;
            font-weight: 600;
            line-height: 1.4;
            max-width: 320px;
            opacity: 0;
            transform: translateY(12px);
            pointer-events: none;
            transition: opacity 0.25s ease, transform 0.25s ease;
        }

        .coming-soon-toast.show {
            opacity: 1;
            transform: translateY(0);
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
        }        /* Hamburger Button */
        .hamburger-btn {
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 34px;
            height: 22px;
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0;
            z-index: 1100;
            flex-shrink: 0;
        }

        .hamburger-btn span {
            display: block;
            width: 100%;
            height: 3px;
            background: var(--text-dark);
            border-radius: 2px;
            transition: transform 0.3s ease, opacity 0.3s ease;
            transform-origin: center;
        }

        .hamburger-btn.open span:nth-child(1) {
            transform: translateY(9.5px) rotate(45deg);
        }

        .hamburger-btn.open span:nth-child(2) {
            opacity: 0;
            transform: scaleX(0);
        }

        .hamburger-btn.open span:nth-child(3) {
            transform: translateY(-9.5px) rotate(-45deg);
        }

        /* Mobile Nav Overlay */
        .mobile-nav-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            z-index: 1049;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .mobile-nav-overlay.open {
            opacity: 1;
            visibility: visible;
        }

        /* Mobile Nav Drawer */
        .mobile-nav-drawer {
            position: fixed;
            top: 0;
            right: -320px;
            width: 300px;
            height: 100vh;
            background: white;
            z-index: 1050;
            transition: right 0.32s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: -6px 0 40px rgba(0, 0, 0, 0.12);
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            padding: 0;
        }

        .mobile-nav-drawer.open {
            right: 0;
        }

        .mobile-drawer-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 24px;
            border-bottom: 1px solid #f0f0f0;
            position: sticky;
            top: 0;
            background: white;
            z-index: 1;
        }

        .mobile-drawer-close {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            background: #f5f5f5;
            border-radius: 50%;
            cursor: pointer;
            font-size: 16px;
            color: var(--text-dark);
            transition: background 0.2s, color 0.2s;
        }

        .mobile-drawer-close:hover {
            background: var(--ci-orange);
            color: white;
        }

        .mobile-nav-links {
            list-style: none;
            padding: 16px 0;
            flex: 1;
        }

        .mobile-nav-links li {
            border-bottom: 1px solid #f5f5f5;
        }

        .mobile-nav-links li:last-child {
            border-bottom: none;
        }

        .mobile-nav-links a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 24px;
            font-weight: 600;
            font-size: 15px;
            color: var(--text-dark);
            text-decoration: none;
            transition: color 0.2s, background 0.2s, padding-left 0.2s;
        }

        .mobile-nav-links a:hover,
        .mobile-nav-links a:active {
            color: var(--ci-orange);
            background: #fdf4ef;
            padding-left: 30px;
        }

        .mobile-nav-links a i {
            font-size: 13px;
            opacity: 0.4;
        }

        .mobile-drawer-footer {
            padding: 20px 24px 30px;
            border-top: 1px solid #f0f0f0;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .mobile-login-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 20px;
            border: 2px solid #ddd;
            background: white;
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
            color: var(--text-dark);
            font-family: 'Montserrat', sans-serif;
        }

        .mobile-login-btn:hover {
            border-color: var(--ci-orange);
            color: var(--ci-orange);
        }

        .mobile-cta-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--ci-orange);
            color: white;
            border: none;
            padding: 13px 24px;
            border-radius: 25px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Montserrat', sans-serif;
        }

        .mobile-cta-btn:hover {
            background: var(--ci-orange-hover);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .nav-links {
                display: none;
            }

            .hamburger-btn {
                display: flex;
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

            .impact-card-xl,
            .impact-card-md,
            .impact-card-wide {
                grid-column: span 6;
            }
        }

        @media (max-width: 768px) {
            .hero {
                height: auto;
                min-height: 720px;
                align-items: flex-start;
                padding: 110px 0 34px;
                flex-direction: column;
            }

            .hero-content {
                max-width: none;
                width: 100%;
                padding: 0 24px;
                margin-top: 8px;
            }

            .hero-label {
                font-size: 11px;
                letter-spacing: 1.6px;
                padding: 7px 14px;
                margin-bottom: 14px;
            }

            .hero-title {
                font-size: clamp(32px, 10.5vw, 62px);
                line-height: 0.92;
                margin-bottom: 8px;
                overflow-wrap: break-word;
            }

            .hero-subtitle {
                font-size: clamp(24px, 7.2vw, 34px);
                line-height: 1.08;
                margin-top: 14px;
                max-width: 95%;
            }

            .hero-bg {
                width: 115%;
                height: 100%;
                right: -15%;
                top: 0;
                transform: none;
                opacity: 0.28;
                background-position: center 30%;
                mask-image: linear-gradient(to bottom, black 42%, transparent 100%);
                -webkit-mask-image: linear-gradient(to bottom, black 42%, transparent 100%);
            }

            .hero-overlay {
                background: linear-gradient(180deg, rgba(61, 31, 61, 0.15) 0%, rgba(61, 31, 61, 0.72) 45%, rgba(61, 31, 61, 0.96) 100%);
            }

            .secondary-content {
                flex-direction: column;
                gap: 10px;
            }

            .slider-controls {
                position: relative;
                left: auto;
                bottom: auto;
                margin-top: 26px;
                padding: 0 24px;
                width: 100%;
                flex-direction: column;
                align-items: stretch;
                gap: 16px;
            }

            .slide-indicators {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
                width: 100%;
            }

            .slide-item {
                min-width: 0;
                padding: 8px 0;
                border-bottom-width: 2px;
            }

            .slide-number {
                font-size: 12px;
                margin-bottom: 4px;
            }

            .slide-name {
                font-size: 14px;
                line-height: 1.2;
                white-space: normal;
            }

            .slider-arrows {
                margin-left: 0;
                justify-content: flex-start;
            }

            .arrow-btn {
                width: 46px;
                height: 46px;
                font-size: 16px;
            }

            .ci-impact {
                padding: 52px 0;
            }

            .impact-card-xl,
            .impact-card-md,
            .impact-card-wide {
                grid-column: span 12;
                min-height: unset;
            }

            .coming-soon-toast {
                right: 16px;
                bottom: 16px;
                max-width: calc(100vw - 32px);
            }
        }

        @media (max-width: 480px) {
            .hero {
                min-height: 680px;
                padding-top: 96px;
            }

            .hero-content,
            .slider-controls {
                padding-left: 18px;
                padding-right: 18px;
            }

            .hero-subtitle {
                max-width: 100%;
            }

            .slide-name {
                font-size: 13px;
            }
        }

        /* ===================================================
           SOCIAL PROOF / TESTIMONIALS
        =================================================== */
        .testimonials {
            background: linear-gradient(155deg, #140820 0%, #2b0f44 45%, #1a0a2e 100%);
            padding: 96px 0 100px;
            position: relative;
            overflow: hidden;
        }

        .testimonials::before {
            content: '';
            position: absolute;
            top: -120px;
            right: -120px;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(242,101,34,0.06) 0%, transparent 70%);
            pointer-events: none;
        }

        .testimonials::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 380px;
            height: 380px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(242,101,34,0.05) 0%, transparent 70%);
            pointer-events: none;
        }

        .testimonials-header {
            text-align: center;
            margin-bottom: 60px;
            position: relative;
            z-index: 1;
        }

        .testimonials-label {
            display: inline-block;
            background: rgba(242, 101, 34, 0.12);
            color: var(--ci-orange);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            padding: 6px 20px;
            border-radius: 30px;
            margin-bottom: 18px;
            border: 1px solid rgba(242, 101, 34, 0.28);
        }

        .testimonials-title {
            font-size: clamp(28px, 4vw, 46px);
            font-weight: 800;
            color: #fff;
            margin-bottom: 14px;
            line-height: 1.15;
        }

        .testimonials-subtitle {
            font-size: 17px;
            color: rgba(255, 255, 255, 0.6);
            max-width: 520px;
            margin: 0 auto;
            line-height: 1.65;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 26px;
            position: relative;
            z-index: 1;
        }

        /* --- Card shell --- */
        .testimonial-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: 0 8px 36px rgba(0,0,0,0.28);
            transition: transform 0.28s ease, box-shadow 0.28s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 56px rgba(0,0,0,0.38);
        }

        /* --- Large photo at top --- */
        .testimonial-photo-wrap {
            width: 100%;
            height: 325px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .testimonial-photo-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center center; /* fine-tune per card with style="object-position: X Y" */
            display: block;
            transition: transform 0.4s ease;
        }

        .testimonial-card:hover .testimonial-photo-wrap img {
            transform: scale(1.04);
        }

        .testimonial-photo-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #2d1045 0%, #5a2d8a 60%, #3D1F3D 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .testimonial-photo-placeholder svg {
            width: 56px;
            height: 56px;
            color: rgba(255,255,255,0.2);
        }

        /* --- Card body --- */
        .testimonial-body {
            padding: 22px 24px 20px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            flex: 1;
        }

        .testimonial-stars {
            color: var(--ci-orange);
            font-size: 17px;
            letter-spacing: 3px;
            line-height: 1;
        }

        .testimonial-quote {
            font-size: 14px;
            color: #4a4a4a;
            line-height: 1.75;
            font-style: italic;
            flex: 1;
            position: relative;
            padding-top: 6px;
        }

        .testimonial-quote::before {
            content: '\201C';
            font-size: 68px;
            color: rgba(242, 101, 34, 0.1);
            font-style: normal;
            font-family: Georgia, serif;
            line-height: 0.8;
            position: absolute;
            top: -4px;
            left: -6px;
        }

        .testimonial-student {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .student-name {
            font-size: 13.5px;
            font-weight: 700;
            color: #1a1a1a;
            line-height: 1.3;
        }

        .student-course {
            font-size: 11.5px;
            color: #aaa;
            line-height: 1.4;
        }

        .testimonial-divider {
            height: 1px;
            background: #efefef;
        }

        .testimonial-consultant {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .consultant-photo {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
            border: 2px solid var(--ci-orange);
        }

        .consultant-info {
            min-width: 0;
        }

        .consultant-name {
            font-size: 13px;
            font-weight: 700;
            color: #222;
            line-height: 1.3;
        }

        .consultant-badge {
            font-size: 11px;
            color: #1dab5f;
            font-weight: 600;
            margin-top: 2px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .consultant-badge svg {
            width: 12px;
            height: 12px;
            flex-shrink: 0;
        }

        @media (max-width: 1024px) {
            .testimonials-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 640px) {
            .testimonials {
                padding: 64px 0 72px;
            }
            .testimonials-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }
            .testimonials-header {
                margin-bottom: 40px;
            }
            .testimonial-photo-wrap {
                height: 325px;
            }
        }
    
        /* ===================================================
           FOOTER (LAYOUT 4)
        =================================================== */
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
            align-items: center;
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
            .footer-top {
                grid-template-columns: repeat(1, minmax(0, 1fr));
            }

            .footer-brand,
            .footer-contact {
                grid-column: span 1;
            }
        }

        @media (max-width: 768px) {
            .ci-footer {
                padding: 64px 0 30px;
            }

            .footer-contact {
                grid-template-columns: 1fr;
            }

            .footer-map-wrap {
                aspect-ratio: 16 / 9;
            }
        }\r\n    </style>
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
                    <span>Admissions Team +353 83 083 7734 / +353 86 014 2313</span>
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
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/higher-education">Higher Education</a></li>
                    <li><a href="#" data-coming-soon="true">Erasmus+</a></li>
                    <li><a href="#" data-coming-soon="true">Teens</a></li>
                    <li><a href="#">Corporate</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>

                <div class="nav-actions">
                    <button class="login-btn">
                        <i class="far fa-user"></i>
                        Log in
                    </button>
                    <button class="hamburger-btn" id="hamburgerBtn" aria-label="Open menu" aria-expanded="false">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Nav Overlay -->
    <div class="mobile-nav-overlay" id="mobileNavOverlay"></div>

    <!-- Mobile Nav Drawer -->
    <div class="mobile-nav-drawer" id="mobileNavDrawer" aria-hidden="true">
        <div class="mobile-drawer-header">
            <a href="#" class="logo">
                <img class="logo-image" src="{{ asset('images/logo-ci.png') }}" alt="CI Exchange" style="height:44px;">
            </a>
            <button class="mobile-drawer-close" id="mobileDrawerClose" aria-label="Close menu">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <ul class="mobile-nav-links">
            <li><a href="#">About Us <i class="fas fa-chevron-right"></i></a></li>
            <li><a href="#">Higher Education <i class="fas fa-chevron-right"></i></a></li>
            <li><a href="#" data-coming-soon="true">Erasmus+ Professional Mobility <i class="fas fa-chevron-right"></i></a></li>
            <li><a href="#" data-coming-soon="true">Teens Programmes <i class="fas fa-chevron-right"></i></a></li>
            <li><a href="#" data-coming-soon="true">Ecommerce <i class="fas fa-chevron-right"></i></a></li>
            <li><a href="#">Corporate Learning <i class="fas fa-chevron-right"></i></a></li>
            <li><a href="#">Contact <i class="fas fa-chevron-right"></i></a></li>
        </ul>
        <div class="mobile-drawer-footer">
            <button class="mobile-login-btn"><i class="far fa-user"></i> Log in</button>
            <button class="mobile-cta-btn">Apply Now</button>
        </div>
    </div>

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
    <!-- Trusted By — Logo Loop -->
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
                    <li class="marquee-item"><img src="{{ asset('images/partners/nci.webp') }}" alt="NCI"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/citycolleges.png') }}" alt="City Colleges"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/DBS.png') }}" alt="DBS"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/dorset.png') }}" alt="Dorset College"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/Griffith.jpg') }}" alt="Griffith College"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/holmes.png') }}" alt="Holmes Institute Dublin"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/ibat.png') }}" alt="IBAT College"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/Tudublin.jpg') }}" alt="TU Dublin"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/DCU.webp') }}" alt="DCU"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/independent.png') }}" alt="Independent College"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/ICD.png') }}" alt="ICD"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/galwaybss.jpg') }}" alt="Galway Business School"></li>
                </ul>

                <!-- List B — duplicate for seamless loop -->
                <ul class="marquee-list" aria-hidden="true">
                    <li class="marquee-item"><img src="{{ asset('images/partners/nci.webp') }}" alt="NCI"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/citycolleges.png') }}" alt="City Colleges"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/DBS.png') }}" alt="DBS"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/dorset.png') }}" alt="Dorset College"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/Griffith.jpg') }}" alt="Griffith College"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/holmes.png') }}" alt="Holmes Institute Dublin"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/ibat.png') }}" alt="IBAT College"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/Tudublin.jpg') }}" alt="TU Dublin"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/DCU.webp') }}" alt="DCU"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/independent.png') }}" alt="Independent College"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/ICD.png') }}" alt="ICD"></li>
                    <li class="marquee-item"><img src="{{ asset('images/partners/galwaybss.jpg') }}" alt="Galway Business School"></li>
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
                            <img src="{{ asset('images/hero-higher-education.jpg') }}" alt="Higher Education in Ireland" loading="lazy">
                        </div>
                        <div class="program-panel-content">
                            <div class="program-panel-tag">Higher Education</div>
                            <h3 class="program-panel-title">Study at a Top Irish University</h3>
                            <p class="program-panel-desc">Complete support for international students looking to study at universities and colleges in Ireland — from Pathway programmes through Undergraduate, Postgraduate and Masters degrees.</p>
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
                            <img src="{{ asset('images/hero-erasmus.jpg') }}" alt="Erasmus Programs in Ireland" loading="lazy">
                        </div>
                        <div class="program-panel-content">
                            <div class="program-panel-tag">Erasmus+ Professional Mobility</div>
                            <h3 class="program-panel-title">Professional Mobility for Educators</h3>
                            <p class="program-panel-desc">International professional mobility programmes for educators and education professionals — designed to drive professional development and educational innovation.</p>
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
                            <img src="{{ asset('images/hero-teens.jpg') }}" alt="Teens Programs in Ireland" loading="lazy">
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
                            <img src="{{ asset('images/hero-corporate-programs.jpg') }}" alt="Corporate Programs" loading="lazy">
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

    <!-- =============================================
         SOCIAL PROOF / TESTIMONIALS
    ============================================== -->
    <section class="testimonials" id="testimonials">
        <div class="container">

            <div class="testimonials-header">
                <div class="testimonials-label">Success Stories</div>
                <h2 class="testimonials-title">Real Students, Real Results</h2>
                <p class="testimonials-subtitle">See how our advisors helped hundreds of students achieve their dream of studying in Ireland.</p>
            </div>

            <div class="testimonials-grid">

                <!-- -- CARD 1 - ALINY -- -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        {{-- Adjust object-position to frame the photo correctly:
                             "center top"    -> shows top of image
                             "center center" -> shows middle (default)
                             "center 60%"    -> shifts down, shows lower portion
                             "center bottom" -> shows very bottom
                        --}}
                        <img src="{{ asset('students/alinystudent.jpg') }}" alt="Yago & Tiago Gontijo with Aliny" style="object-position: center 60%;">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">★★★★★</div>
                        <p class="testimonial-quote">So much gratitude for clearing up all our doubts and for all the support throughout our entire process! Highly recommended!</p>
                        <div class="testimonial-student">
                            <div class="student-name">Yago &amp; Tiago Gontijo</div>
                            <div class="student-course">BA in Business — Independent College</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/aliny.jpg') }}" alt="Aliny" class="consultant-photo">
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

                <!-- -- CARD 2 - ALBERT -- -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        <img src="{{ asset('students/albertstudent.jpg') }}" alt="Albert's student" style="object-position: center center;">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">★★★★★</div>
                        <p class="testimonial-quote">Incredible support and dedication throughout every step of my application process. Moving to Ireland was a dream — Albert made it real!</p>
                        <div class="testimonial-student">
                            <div class="student-name">Juan Fernando</div>
                            <div class="student-course">Higher Diploma in Science in Data Analytics - City colleges</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/albert.jpg') }}" alt="Albert" class="consultant-photo">
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

                <!-- -- CARD 3 - GABRIEL -- -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        <img src="{{ asset('students/gabrielstudent.jpg') }}" alt="Gabriel's student" style="object-position: center center;">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">★★★★★</div>
                        <p class="testimonial-quote">Professional, caring and always available. My dream of studying in Ireland became a reality thanks to Gabriel's guidance!</p>
                        <div class="testimonial-student">
                            <div class="student-name">Bruno Silva</div>
                            <div class="student-course">Cybersecurity — City Colleges</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/gabriel.jpg') }}" alt="Gabriel" class="consultant-photo">
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

                <!-- -- CARD 4 - ROMARIO -- -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        <img src="{{ asset('students/romariostudent.jpg') }}" alt="Romario's student" style="object-position: center center;">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">★★★★★</div>
                        <p class="testimonial-quote">Every detail of my application was handled with precision and warmth. Outstanding service — I could not have done it without Romario!</p>
                        <div class="testimonial-student">
                            <div class="student-name">Elis</div>
                            <div class="student-course">Higher Certificate in Sound Engineering and Music Prodution - DBS</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/romario.jpg') }}" alt="Romario" class="consultant-photo">
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

                <!-- -- CARD 5 - TALITA -- -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                       
                        <img src="{{ asset('students/talitastudent.jpg') }}" alt="Talita's student" style="object-position: center center;">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">★★★★★</div>
                        <p class="testimonial-quote">From my very first question to my arrival in Dublin, I felt fully supported every step of the way. Talita is simply the best!</p>
                        <div class="testimonial-student">
                            <div class="student-name">Yari Yolibet</div>
                            <div class="student-course">BA in Business - Holmes Institute </div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/talita.jpg') }}" alt="Talita" class="consultant-photo">
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

                <!-- -- CARD 6 - WAGNER -- -->
                <div class="testimonial-card">
                    <div class="testimonial-photo-wrap">
                        <img src="{{ asset('students/wagnerstudent.jpg') }}" alt="Wagner's student" style="object-position: center center;">
                    </div>
                    <div class="testimonial-body">
                        <div class="testimonial-stars">★★★★★</div>
                        <p class="testimonial-quote">Wagner's knowledge of Irish education is truly unmatched. He made the whole process smooth and stress-free. Best decision I ever made!</p>
                        <div class="testimonial-student">
                            <div class="student-name">Pedro Costa</div>
                            <div class="student-course">BSc in Computing — TU Dublin</div>
                        </div>
                        <div class="testimonial-divider"></div>
                        <div class="testimonial-consultant">
                            <img src="{{ asset('consultant/wagner.jpg') }}" alt="Wagner" class="consultant-photo">
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

    <!-- WhatsApp Float -->
    <div class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </div>

    <div class="coming-soon-toast" id="comingSoonToast" role="status" aria-live="polite"></div>
    <!-- Footer -->
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
                        <a class="footer-social-link" href="https://www.facebook.com/CI.Intercambio.Irlanda" title="https://www.facebook.com/CI.Intercambio.Irlanda" target="_blank" rel="noopener">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a class="footer-social-link" href="https://www.linkedin.com/company/ci-irlanda/?originalSubdomain=ie" target="_blank" rel="noopener"  title="https://www.linkedin.com/company/ci-irlanda/?originalSubdomain=ie">
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
        // Slider and hero performance controls
        const AUTOPLAY_MS = 6000;
        const mobileQuery = window.matchMedia('(max-width: 768px)');

        const heroSection = document.querySelector('.hero');
        const heroBg = document.querySelector('.hero-bg');
        const heroTitleWhite = document.querySelector('.hero-title-white');
        const heroTitleOrange = document.querySelector('.hero-title-orange');
        const heroSubtitle = document.querySelector('.hero-subtitle');

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
                name: 'Erasmus+ Professional Mobility',
                titleWhite: 'Erasmus+',
                titleOrange: 'Professional Mobility',
                subtitle: 'Professional mobility for educators & education professionals',
                bg: "{{ asset('images/hero-erasmus.jpg') }}",
                position: 'center center'
            },
            {
                number: '03',
                name: 'Teens Programmes',
                titleWhite: 'Teens',
                titleOrange: 'Programmes',
                subtitle: 'Short and long-term study experiences in Ireland',
                bg: "{{ asset('images/hero-teens.jpg') }}",
                position: 'center 35%'
            },
            {
                number: '04',
                name: 'Corporate Learning',
                titleWhite: 'Corporate',
                titleOrange: 'Learning',
                subtitle: 'Tailored language and training solutions for companies',
                bg: "{{ asset('images/hero-corporate-programs.jpg') }}",
                position: 'center center'
            }
        ];

        let currentSlide = 0;
        let autoplayTimer;
        let isHeroInView = true;
        let parallaxTicking = false;
        let slideToken = 0;

        const fallbackBg = slides[0].bg;
        const brokenImages = new Set();

        function preloadImage(url) {
            return new Promise((resolve, reject) => {
                const img = new Image();
                img.decoding = 'async';
                img.onload = () => resolve(url);
                img.onerror = reject;
                img.src = url;
            });
        }

        function preloadNonInitialSlides() {
            slides.slice(1).forEach((slide) => {
                preloadImage(slide.bg).catch(() => {
                    brokenImages.add(slide.bg);
                });
            });
        }

        function getSlideBg(slide) {
            return brokenImages.has(slide.bg) ? fallbackBg : slide.bg;
        }

        function shouldAutoplay() {
            return !mobileQuery.matches && document.visibilityState === 'visible' && isHeroInView;
        }

        function scheduleAutoplay() {
            clearTimeout(autoplayTimer);
            if (!shouldAutoplay()) return;
            autoplayTimer = setTimeout(() => {
                nextSlide();
                scheduleAutoplay();
            }, AUTOPLAY_MS);
        }

        function updateIndicators() {
            document.querySelectorAll('.slide-item').forEach((item, index) => {
                item.classList.toggle('active', index === currentSlide);
            });
        }

        function updateSlide() {
            const slide = slides[currentSlide];
            const token = ++slideToken;
            const bgToUse = getSlideBg(slide);

            if (heroBg) {
                heroBg.style.opacity = '0';
            }

            setTimeout(() => {
                if (token !== slideToken) return;

                if (heroBg) {
                    heroBg.style.backgroundImage = `url('${bgToUse}')`;
                    heroBg.style.backgroundPosition = slide.position || 'center center';
                    heroBg.style.opacity = mobileQuery.matches ? '0.28' : '0.9';
                }
            }, 220);

            if (heroTitleWhite) heroTitleWhite.style.animation = 'none';
            if (heroTitleOrange) heroTitleOrange.style.animation = 'none';
            if (heroSubtitle) heroSubtitle.style.animation = 'none';

            setTimeout(() => {
                if (token !== slideToken) return;

                if (heroTitleWhite) {
                    heroTitleWhite.textContent = slide.titleWhite;
                    heroTitleWhite.style.animation = 'fadeInUp 0.6s ease-out forwards';
                }

                if (heroTitleOrange) {
                    heroTitleOrange.textContent = slide.titleOrange;
                    heroTitleOrange.style.animation = 'fadeInUp 0.6s ease-out 0.1s forwards';
                }

                if (heroSubtitle) {
                    heroSubtitle.textContent = slide.subtitle;
                    heroSubtitle.style.animation = 'fadeInUp 0.6s ease-out 0.2s forwards';
                }
            }, 50);

            updateIndicators();
        }

        function changeSlide(index) {
            currentSlide = index;
            updateSlide();
            scheduleAutoplay();
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            updateSlide();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            updateSlide();
            scheduleAutoplay();
        }

        function handleParallax() {
            if (!heroBg || !heroSection || mobileQuery.matches || !isHeroInView) return;
            if (parallaxTicking) return;

            parallaxTicking = true;
            requestAnimationFrame(() => {
                const heroTop = heroSection.offsetTop;
                const localScroll = Math.max(0, window.pageYOffset - heroTop);
                heroBg.style.transform = `translateY(calc(-50% + ${localScroll * 0.35}px))`;
                parallaxTicking = false;
            });
        }

        function resetHeroTransform() {
            if (!heroBg) return;
            heroBg.style.transform = mobileQuery.matches ? 'none' : 'translateY(-50%)';
        }

        function setupHeroIntersectionObserver() {
            if (!heroSection || typeof IntersectionObserver === 'undefined') return;

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    isHeroInView = entry.isIntersecting;
                    if (!isHeroInView) {
                        resetHeroTransform();
                    }
                    scheduleAutoplay();
                });
            }, { threshold: 0.15 });

            observer.observe(heroSection);
        }

        function bootHeroSlider() {
            updateSlide();
            resetHeroTransform();
            scheduleAutoplay();
            setupHeroIntersectionObserver();

            if ('requestIdleCallback' in window) {
                requestIdleCallback(preloadNonInitialSlides, { timeout: 1200 });
            } else {
                setTimeout(preloadNonInitialSlides, 700);
            }
        }

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

        // Coming soon toast for sections still under development.
        const comingSoonToast = document.getElementById('comingSoonToast');
        let toastTimeout;

        function showComingSoonToast(message) {
            if (!comingSoonToast) return;
            comingSoonToast.textContent = message;
            comingSoonToast.classList.add('show');
            clearTimeout(toastTimeout);
            toastTimeout = setTimeout(() => {
                comingSoonToast.classList.remove('show');
            }, 2600);
        }

        document.addEventListener('click', (event) => {
            const comingSoonLink = event.target.closest('[data-coming-soon="true"]');
            if (!comingSoonLink) return;
            event.preventDefault();
            event.stopPropagation();
            showComingSoonToast('This section is being upgraded and will be available soon.');
        });

        // Runtime events
        window.addEventListener('scroll', handleParallax, { passive: true });
        window.addEventListener('resize', () => {
            resetHeroTransform();
            scheduleAutoplay();
        }, { passive: true });
        document.addEventListener('visibilitychange', scheduleAutoplay);

        if (typeof mobileQuery.addEventListener === 'function') {
            mobileQuery.addEventListener('change', () => {
                resetHeroTransform();
                scheduleAutoplay();
            });
        } else if (typeof mobileQuery.addListener === 'function') {
            mobileQuery.addListener(() => {
                resetHeroTransform();
                scheduleAutoplay();
            });
        }

        bootHeroSlider();

        // Hamburger / Mobile Nav
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const mobileNavDrawer = document.getElementById('mobileNavDrawer');
        const mobileNavOverlay = document.getElementById('mobileNavOverlay');
        const mobileDrawerClose = document.getElementById('mobileDrawerClose');

        function openMobileNav() {
            hamburgerBtn.classList.add('open');
            hamburgerBtn.setAttribute('aria-expanded', 'true');
            mobileNavDrawer.classList.add('open');
            mobileNavDrawer.setAttribute('aria-hidden', 'false');
            mobileNavOverlay.classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileNav() {
            hamburgerBtn.classList.remove('open');
            hamburgerBtn.setAttribute('aria-expanded', 'false');
            mobileNavDrawer.classList.remove('open');
            mobileNavDrawer.setAttribute('aria-hidden', 'true');
            mobileNavOverlay.classList.remove('open');
            document.body.style.overflow = '';
        }

        hamburgerBtn.addEventListener('click', () => {
            mobileNavDrawer.classList.contains('open') ? closeMobileNav() : openMobileNav();
        });

        mobileDrawerClose.addEventListener('click', closeMobileNav);
        mobileNavOverlay.addEventListener('click', closeMobileNav);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && mobileNavDrawer.classList.contains('open')) closeMobileNav();
        });

        // Find Your Program — persona tab switcher
        const personaTabs = document.querySelectorAll('.persona-tab');
        const programPanels = document.querySelectorAll('.program-panel');

        personaTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = tab.dataset.panel;

                personaTabs.forEach(t => {
                    t.classList.remove('active');
                    t.setAttribute('aria-selected', 'false');
                });
                tab.classList.add('active');
                tab.setAttribute('aria-selected', 'true');

                programPanels.forEach(panel => panel.classList.remove('active'));
                document.getElementById('panel-' + target).classList.add('active');
            });
        });
    </script>
</body>
</html>






