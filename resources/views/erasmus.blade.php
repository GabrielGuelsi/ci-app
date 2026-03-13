<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erasmus+ Professional Mobility - CI Ireland</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-ci.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-ci.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --ci-orange: #F26522;
            --ci-orange-hover: #E55512;
            --ci-purple: #3D1F3D;
            --ci-dark-purple: #2A152A;
            --ci-deepest: #1a0c1a;
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

        /* ─────────────── TOP BANNER ─────────────── */
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
        .top-banner a:hover { gap: 10px; }

        /* ─────────────── NAV ─────────────── */
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
        .logo { display: flex; align-items: center; text-decoration: none; }
        .logo-image { height: 52px; width: auto; object-fit: contain; display: block; }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
            list-style: none;
        }
        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 14px;
            transition: color 0.3s;
        }
        .nav-links a:hover, .nav-links a.active { color: var(--ci-orange); }
        .nav-cta {
            background: var(--ci-orange);
            color: white !important;
            padding: 10px 22px;
            border-radius: 999px;
            font-weight: 700 !important;
            font-size: 13px !important;
            transition: background 0.3s !important;
        }
        .nav-cta:hover { background: var(--ci-orange-hover) !important; color: white !important; }

        /* ─────────────── HAMBURGER ─────────────── */
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
        .hamburger-btn.open span:nth-child(1) { transform: translateY(9.5px) rotate(45deg); }
        .hamburger-btn.open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
        .hamburger-btn.open span:nth-child(3) { transform: translateY(-9.5px) rotate(-45deg); }

        .mobile-nav-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.45);
            z-index: 1049;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        .mobile-nav-overlay.open { opacity: 1; visibility: visible; }

        .mobile-nav-drawer {
            position: fixed;
            top: 0;
            right: -320px;
            width: 300px;
            height: 100vh;
            background: white;
            z-index: 1050;
            transition: right 0.32s cubic-bezier(0.4,0,0.2,1);
            box-shadow: -6px 0 40px rgba(0,0,0,0.12);
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }
        .mobile-nav-drawer.open { right: 0; }

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
            width: 36px; height: 36px;
            display: flex; align-items: center; justify-content: center;
            background: transparent;
            border: none;
            cursor: pointer;
            color: var(--text-dark);
            font-size: 18px;
            border-radius: 8px;
            transition: background 0.2s, color 0.2s;
        }
        .mobile-drawer-close:hover { background: var(--ci-orange); color: white; }

        .mobile-nav-links {
            list-style: none;
            padding: 16px 0;
            flex: 1;
        }
        .mobile-nav-links li { border-bottom: 1px solid #f5f5f5; }
        .mobile-nav-links li:last-child { border-bottom: none; }
        .mobile-nav-links a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 24px;
            font-weight: 600;
            font-size: 16px;
            color: var(--text-dark);
            text-decoration: none;
            transition: color 0.2s, background 0.2s, padding-left 0.2s;
        }
        .mobile-nav-links a:hover { color: var(--ci-orange); background: #fdf4ef; padding-left: 30px; }
        .mobile-nav-links a.active { color: var(--ci-orange); }
        .mobile-nav-links a i { font-size: 13px; opacity: 0.4; }

        .mobile-drawer-footer {
            padding: 20px 24px;
            border-top: 1px solid #f0f0f0;
            display: flex;
            gap: 12px;
        }
        .mobile-cta-btn {
            flex: 1;
            background: var(--ci-orange);
            color: white;
            border: none;
            border-radius: 999px;
            padding: 12px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
        }

        /* ─────────────── HERO ─────────────── */
        @keyframes radarRing {
            0%   { r: 0;   opacity: 0.55; }
            100% { r: 170; opacity: 0;    }
        }
        @keyframes drawPath {
            from { stroke-dashoffset: 1; }
            to   { stroke-dashoffset: 0; }
        }
        @keyframes dotAppear {
            from { opacity: 0; transform: scale(0); }
            to   { opacity: 1; transform: scale(1); }
        }
        @keyframes dublinPulse {
            0%, 100% { r: 26; opacity: 0.22; }
            50%      { r: 40; opacity: 0.50; }
        }

        .er-hero {
            background: linear-gradient(145deg, #2f1236 0%, #3D1F3D 55%, #231023 100%);
            background-image:
                radial-gradient(circle, rgba(242,101,34,0.18) 0%, transparent 55%),
                linear-gradient(145deg, #2f1236 0%, #3D1F3D 55%, #231023 100%);
            background-size: 900px 900px, 100% 100%;
            background-position: -150px -200px, center;
            background-repeat: no-repeat;
            min-height: 100vh;
            min-height: 100dvh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 120px 0 100px;
        }

        .er-hero-split {
            display: grid;
            grid-template-columns: 50fr 50fr;
            gap: 64px;
            align-items: center;
            width: 100%;
        }

        .er-hero-content {
            position: relative;
            z-index: 1;
        }
        .er-hero-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 999px;
            border: 1px solid rgba(242,101,34,0.5);
            background: rgba(242,101,34,0.1);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--ci-orange);
            margin-bottom: 32px;
        }
        .er-hero-title {
            font-size: clamp(38px, 4.8vw, 68px);
            font-weight: 900;
            color: #fff;
            line-height: 1.08;
            margin-bottom: 28px;
            letter-spacing: -1.5px;
        }
        .er-hero-title span { color: var(--ci-orange); }
        .er-hero-sub {
            font-size: 17px;
            color: rgba(255,255,255,0.7);
            line-height: 1.8;
            max-width: 520px;
            margin-bottom: 44px;
        }
        .er-hero-ctas {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }
        .er-cta-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            background: var(--ci-orange);
            color: #fff;
            border-radius: 999px;
            font-weight: 700;
            font-size: 15px;
            text-decoration: none;
            transition: background 0.3s, transform 0.2s;
            border: none;
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
        }
        .er-cta-primary:hover { background: var(--ci-orange-hover); transform: translateY(-2px); }
        .er-cta-ghost {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            background: transparent;
            color: rgba(255,255,255,0.85);
            border-radius: 999px;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.28);
            transition: border-color 0.3s, background 0.3s;
        }
        .er-cta-ghost:hover { border-color: rgba(255,255,255,0.6); background: rgba(255,255,255,0.08); }

        /* Country chips — hidden on desktop, shown on mobile below SVG map */
        .er-hero-countries { display: none; }

        /* Hero stats strip */
        .er-hero-stats {
            display: flex;
            align-items: center;
            gap: 24px;
            margin-top: 48px;
            padding-top: 36px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        .er-hero-stat {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .er-hero-stat-num {
            font-size: 28px;
            font-weight: 900;
            color: #fff;
            line-height: 1;
            letter-spacing: -0.5px;
        }
        .er-hero-stat-label {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.45);
        }
        .er-hero-stat-divider {
            width: 1px;
            height: 36px;
            background: rgba(255,255,255,0.15);
        }

        /* SVG map panel */
        .er-hero-map {
            position: relative;
            z-index: 1;
            min-height: 460px;
            display: flex;
            align-items: center;
        }
        .er-hero-map svg {
            width: 100%;
            height: auto;
            display: block;
            filter: drop-shadow(0 0 40px rgba(242,101,34,0.12));
        }
        /* Radar rings */
        .radar-ring {
            fill: none;
            stroke: var(--ci-orange);
            stroke-width: 1.2;
            animation: radarRing 3.2s ease-out 3;  /* 3 cycles then stops */
            transform-box: fill-box;
            transform-origin: center;
            will-change: opacity;
        }
        .radar-ring:nth-child(2) { animation-delay: 1.06s; }
        .radar-ring:nth-child(3) { animation-delay: 2.13s; }
        .radar-ring:nth-child(4) { animation-delay: 3.2s; }
        /* Flight paths */
        .flight-path {
            fill: none;
            stroke: rgba(242,101,34,0.55);
            stroke-width: 1.5;
            stroke-dasharray: 0.04 0.028;
            stroke-dashoffset: 1;
            animation: drawPath 1.8s ease-out forwards;
            will-change: stroke-dashoffset;
        }
        /* City dots */
        .city-dot {
            opacity: 0;
            transform-box: fill-box;
            transform-origin: center;
            animation: dotAppear 0.4s ease-out forwards;
            will-change: opacity, transform;
        }
        /* Dublin pulse ring */
        .dublin-pulse {
            fill: none;
            stroke: #F26522;
            stroke-width: 1.5;
            animation: dublinPulse 2.4s ease-in-out infinite;
            transform-box: fill-box;
            transform-origin: center;
            will-change: opacity;
        }

        /* Reduced motion — show final state, no animation */
        @media (prefers-reduced-motion: reduce) {
            .radar-ring, .flight-path, .city-dot, .dublin-pulse {
                animation: none !important;
            }
            .city-dot    { opacity: 1; }
            .flight-path { stroke-dashoffset: 0; }
            .dublin-pulse { opacity: 0.3; }
        }

        /* ─────────────── SECTION SHARED ─────────────── */
        .er-section-kicker {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--ci-orange);
            margin-bottom: 12px;
        }
        .er-section-title {
            font-size: clamp(28px, 3.5vw, 44px);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 16px;
        }
        .er-section-sub {
            font-size: 16px;
            line-height: 1.7;
            max-width: 600px;
        }

        /* ─────────────── PROGRAMME SECTIONS ─────────────── */
        .er-programme {
            padding: 100px 0;
        }
        .er-programme--dark {
            background: #1e0e24;
        }
        .er-programme--light {
            background: #f7f5f4;
        }
        .er-programme--white {
            background: #fff;
        }
        .er-programme--dark .er-section-title,
        .er-programme--dark .er-section-sub { color: #fff; }
        .er-programme--dark .er-section-sub { color: rgba(255,255,255,0.65); }
        .er-programme--light .er-section-title { color: var(--ci-purple); }
        .er-programme--light .er-section-sub { color: var(--text-light); }
        .er-programme--white .er-section-title { color: var(--ci-purple); }
        .er-programme--white .er-section-sub { color: var(--text-light); }

        .er-programme-header {
            text-align: center;
            max-width: 680px;
            margin: 0 auto 64px;
        }

        .er-programme-body {
            display: grid;
            grid-template-columns: 45fr 55fr;
            gap: 60px;
            align-items: start;
        }
        .er-programme-body.reversed {
            grid-template-columns: 55fr 45fr;
        }
        .er-programme-body.reversed .er-programme-prose { order: 2; }
        .er-programme-body.reversed .er-programme-box  { order: 1; }

        .er-programme-prose { }
        .er-programme-prose .er-section-kicker { display: block; margin-bottom: 10px; }
        .er-programme-prose .er-section-title { margin-bottom: 18px; }
        .er-programme-prose p {
            font-size: 15px;
            line-height: 1.8;
            margin-bottom: 14px;
        }
        .er-programme--dark .er-programme-prose p { color: rgba(255,255,255,0.65); }
        .er-programme--light .er-programme-prose p { color: var(--text-light); }
        .er-programme--white .er-programme-prose p { color: var(--text-light); }

        /* Who it's for / How it works sub-label */
        .er-sub-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--ci-orange);
            margin-bottom: 16px;
            display: block;
        }

        /* Who-chips grid */
        .er-who-chips {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 20px;
        }
        .er-who-chip {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
        }
        .er-programme--dark .er-who-chip {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.8);
        }
        .er-who-chip i {
            width: 28px; height: 28px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(242,101,34,0.15);
            color: var(--ci-orange);
            font-size: 12px;
            flex-shrink: 0;
        }
        .er-erasmus-note {
            font-size: 12px;
            font-style: italic;
            color: rgba(255,255,255,0.45);
            padding: 12px 16px;
            border-left: 2px solid rgba(242,101,34,0.4);
            margin-top: 8px;
        }

          /* Horizontal stepper */
          .er-stepper {
              width: 100%;
              margin-top: 6px;
          }
          .er-stepper-indicators {
              display: flex;
              align-items: center;
              padding: 10px 0 22px;
          }
          .er-stepper-indicator {
              border: none;
              background: transparent;
              padding: 0;
              cursor: pointer;
              outline: none;
          }
          .er-stepper-indicator-inner {
              display: flex;
              height: 32px;
              width: 32px;
              align-items: center;
              justify-content: center;
              border-radius: 999px;
              font-weight: 700;
              font-size: 13px;
              background: #222;
              color: #a3a3a3;
              transition: all 0.3s ease;
          }
          .er-programme--dark .er-stepper-indicator-inner {
              background: rgba(255,255,255,0.12);
              color: rgba(255,255,255,0.65);
          }
          .er-stepper-number { display: inline; }
          .er-stepper-dot,
          .er-stepper-check { display: none; }
          .er-stepper-indicator.is-active .er-stepper-indicator-inner {
              background: var(--ci-orange);
              color: var(--ci-orange);
          }
          .er-stepper-indicator.is-complete .er-stepper-indicator-inner {
              background: var(--ci-orange);
              color: #fff;
          }
          .er-stepper-indicator.is-active .er-stepper-number,
          .er-stepper-indicator.is-complete .er-stepper-number { display: none; }
          .er-stepper-indicator.is-active .er-stepper-dot { display: block; }
          .er-stepper-indicator.is-complete .er-stepper-check { display: block; }
          .er-stepper-dot {
              width: 10px;
              height: 10px;
              border-radius: 999px;
              background: #fff;
          }
          .er-stepper-check {
              width: 16px;
              height: 16px;
              color: #fff;
          }
          .er-stepper-connector {
              position: relative;
              margin: 0 8px;
              height: 2px;
              flex: 1;
              overflow: hidden;
              border-radius: 999px;
              background: #d4d4d8;
          }
          .er-programme--dark .er-stepper-connector { background: rgba(255,255,255,0.2); }
          .er-stepper-connector-inner {
              position: absolute;
              left: 0;
              top: 0;
              height: 100%;
              width: 0%;
              background: var(--ci-orange);
              transition: width 0.4s ease;
          }
          .er-stepper-connector.is-complete .er-stepper-connector-inner { width: 100%; }
          .er-stepper-content {
              position: relative;
              overflow: hidden;
              transition: height 0.35s ease;
              min-height: 90px;
          }
          .er-stepper-panel {
              position: absolute;
              left: 0;
              right: 0;
              top: 0;
              opacity: 0;
              transform: translateY(8px);
              transition: transform 0.35s ease, opacity 0.35s ease;
          }
          .er-stepper-panel.is-active {
              position: relative;
              opacity: 1;
              transform: translateY(0);
          }
          .er-stepper-panel h4 {
              font-size: 15px;
              font-weight: 700;
              margin-bottom: 6px;
          }
          .er-programme--dark .er-stepper-panel h4 { color: #fff; }
          .er-stepper-panel p {
              font-size: 13px;
              line-height: 1.65;
              margin-bottom: 0 !important;
          }
          .er-programme--dark .er-stepper-panel p { color: rgba(255,255,255,0.7); }
          .er-stepper-footer { padding-top: 18px; }
          .er-stepper-nav {
              display: flex;
              align-items: center;
          }
          .er-stepper-nav--spread { justify-content: space-between; }
          .er-stepper-nav--end { justify-content: flex-end; }
          .er-stepper-back {
              transition: all 350ms;
              border-radius: 6px;
              padding: 4px 10px;
              color: #a3a3a3;
              cursor: pointer;
              border: none;
              background: transparent;
              font-weight: 600;
          }
          .er-stepper-back:hover { color: #52525b; }
          .er-stepper-back:disabled {
              pointer-events: none;
              opacity: 0.6;
              color: #a3a3a3;
          }
          .er-stepper-next {
              transition: all 350ms;
              display: inline-flex;
              align-items: center;
              justify-content: center;
              border-radius: 9999px;
              background-color: var(--ci-orange);
              color: #fff;
              font-weight: 600;
              letter-spacing: -0.01em;
              padding: 6px 16px;
              cursor: pointer;
              border: none;
          }
          .er-stepper-next:hover { background-color: var(--ci-orange-hover); }

        /* Partnership / Info box */
        .er-programme-box {
            background: #fff;
            border-left: 3px solid var(--ci-orange);
            border-radius: 0 20px 20px 0;
            padding: 36px 32px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.07);
        }
        .er-programme--dark .er-programme-box {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-left: 3px solid var(--ci-orange);
            border-radius: 0 20px 20px 0;
        }
        .er-box-section { margin-bottom: 28px; }
        .er-box-section:last-child { margin-bottom: 0; }
        .er-box-section h4 {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--ci-orange);
            margin-bottom: 14px;
        }
        .er-box-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 4px;
        }
        .er-box-chip {
            padding: 6px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
            background: rgba(242,101,34,0.08);
            border: 1px solid rgba(242,101,34,0.2);
            color: var(--ci-purple);
        }
        .er-programme--dark .er-box-chip {
            background: rgba(242,101,34,0.1);
            border-color: rgba(242,101,34,0.25);
            color: rgba(255,255,255,0.8);
        }
        .er-box-bullets {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .er-box-bullets li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 13px;
            line-height: 1.6;
            color: var(--text-light);
        }
        .er-programme--dark .er-box-bullets li { color: rgba(255,255,255,0.65); }
        .er-box-bullets li::before {
            content: '';
            width: 6px; height: 6px;
            background: var(--ci-orange);
            border-radius: 50%;
            flex-shrink: 0;
            margin-top: 6px;
        }

        /* ─────────────── FOCUS AREAS (SCROLL STACK) ─────────────── */
        .er-focus {
            background: var(--ci-deepest);
            position: relative;
        }
        .er-focus::before {
            content: '';
            position: absolute;
            width: 700px; height: 700px;
            background: radial-gradient(circle, rgba(242,101,34,0.1) 0%, transparent 65%);
            top: -200px; left: 50%;
            transform: translateX(-50%);
            pointer-events: none;
        }
        .er-focus-header {
            text-align: center;
            max-width: 640px;
            margin: 0 auto;
            padding: 100px 20px 60px;
            position: relative;
            z-index: 1;
        }
        .er-focus-header .er-section-title { color: #fff; }
        .er-focus-header .er-section-sub { color: rgba(255,255,255,0.6); margin: 0 auto; }

        /* scroll stack – same pattern as higher-education */
        .scroll-stack-outer {
            position: relative;
            height: 250vh;
        }
        .scroll-stack-sticky {
            position: sticky;
            top: 0;
            height: 100vh;
            height: 100dvh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }
        .stack-inner-header {
            text-align: center;
            padding: 40px 20px 24px;
            position: relative;
            z-index: 1;
        }
        .stack-cards-wrap {
            position: relative;
            width: 100%;
            max-width: 900px;
            height: 580px;
            margin: 0 auto;
            overflow: hidden;
        }
        .stack-cards-wrap::before,
        .stack-cards-wrap::after {
            content: '';
            position: absolute;
            left: 0; right: 0;
            pointer-events: none;
            z-index: 50;
        }
        .stack-cards-wrap::before {
            top: 0; height: 52px;
            background: linear-gradient(to bottom, var(--ci-deepest), transparent);
        }
        .stack-cards-wrap::after {
            bottom: 0; height: 72px;
            background: linear-gradient(to top, var(--ci-deepest) 20%, transparent);
        }
        .step-card {
            position: absolute;
            top: 0; left: 24px; right: 24px;
            height: 520px;
            border-radius: 24px;
            padding: 44px 56px;
            display: grid;
            grid-template-columns: 160px 1fr;
            gap: 44px;
            align-items: center;
            will-change: transform, opacity;
            transform-origin: center center;
            overflow: hidden;
            box-shadow: 0 24px 64px rgba(0,0,0,0.55), 0 0 0 1px rgba(255,255,255,0.07);
            transition: transform 0.18s cubic-bezier(0.25,0.46,0.45,0.94), opacity 0.18s ease;
        }
        .stack-progress {
            position: absolute;
            bottom: 16px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
            z-index: 60;
        }
        .stack-dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            transition: background 0.3s, transform 0.3s;
            cursor: pointer;
        }
        .stack-dot.active { background: var(--ci-orange); transform: scale(1.3); }

        /* Focus area card themes */
        .step-card[data-step="1"] {
            background: linear-gradient(145deg, #32183a 0%, #210f2a 100%);
            border: 1px solid rgba(242,101,34,0.28);
        }
        .step-card[data-step="2"] {
            background: linear-gradient(145deg, #0d2540 0%, #081828 100%);
            border: 1px solid rgba(255,255,255,0.1);
        }
        .step-card[data-step="3"] {
            background: linear-gradient(145deg, #1a2f1a 0%, #0e1e0e 100%);
            border: 1px solid rgba(255,255,255,0.1);
        }
        .step-card[data-step="4"] {
            background: linear-gradient(135deg, #F26522 0%, #d44000 100%);
            border: none;
        }
        .step-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 28px;
            pointer-events: none;
            opacity: 0.5;
        }
        .step-card[data-step="1"]::before {
            background: radial-gradient(ellipse at top right, rgba(242,101,34,0.18) 0%, transparent 60%);
        }
        .step-left {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 16px;
            position: relative;
            z-index: 1;
        }
        .step-number {
            font-size: 100px;
            font-weight: 900;
            line-height: 1;
            letter-spacing: -4px;
            color: rgba(255,255,255,0.06);
            position: absolute;
            top: -20px; left: -10px;
            pointer-events: none;
            user-select: none;
        }
        .step-card[data-step="4"] .step-number { color: rgba(255,255,255,0.15); }
        .step-badge {
            background: rgba(242,101,34,0.15);
            border: 1px solid rgba(242,101,34,0.35);
            color: var(--ci-orange);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 6px 14px;
            border-radius: 999px;
            position: relative;
            z-index: 1;
        }
        .step-card[data-step="4"] .step-badge {
            background: rgba(255,255,255,0.2);
            border-color: rgba(255,255,255,0.4);
            color: #fff;
        }
        .step-icon-wrap {
            width: 64px; height: 64px;
            background: rgba(242,101,34,0.12);
            border: 1px solid rgba(242,101,34,0.25);
            border-radius: 18px;
            display: flex; align-items: center; justify-content: center;
            font-size: 24px;
            color: var(--ci-orange);
            position: relative; z-index: 1;
        }
        .step-card[data-step="4"] .step-icon-wrap {
            background: rgba(255,255,255,0.2);
            border-color: rgba(255,255,255,0.4);
            color: #fff;
        }
        .step-right { position: relative; z-index: 1; }
        .step-title {
            font-size: 26px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 14px;
            line-height: 1.2;
        }
        .step-desc {
            font-size: 15px;
            line-height: 1.75;
            color: rgba(255,255,255,0.65);
            margin-bottom: 20px;
        }
        .step-card[data-step="4"] .step-desc { color: rgba(255,255,255,0.85); }
        .step-bullets {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .step-bullets li {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: rgba(255,255,255,0.6);
            font-weight: 500;
        }
        .step-card[data-step="4"] .step-bullets li { color: rgba(255,255,255,0.9); }
        .step-bullets li::before {
            content: '';
            width: 6px; height: 6px;
            background: var(--ci-orange);
            border-radius: 50%;
            flex-shrink: 0;
        }
        .step-card[data-step="4"] .step-bullets li::before { background: #fff; }

        /* ─────────────── PROGRAMME MODELS ─────────────── */
        .er-models {
            background: #f7f5f4;
            padding: 100px 0;
        }
        .er-models-header {
            text-align: center;
            max-width: 600px;
            margin: 0 auto 64px;
        }
        .er-models-header .er-section-title { color: var(--ci-purple); }
        .er-models-header .er-section-sub { color: var(--text-light); margin: 0 auto; }
        .er-models-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }
        .er-model-card {
            border-radius: 24px;
            padding: 44px 40px;
            box-shadow: 0 16px 48px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }
        .er-model-card--light {
            background: #fff;
            border-top: 3px solid var(--ci-orange);
        }
        .er-model-card--dark {
            background: linear-gradient(145deg, #2f1236 0%, #3D1F3D 100%);
            color: #fff;
        }
        .er-model-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 24px;
        }
        .er-model-card--light .er-model-badge {
            background: rgba(242,101,34,0.1);
            border: 1px solid rgba(242,101,34,0.3);
            color: var(--ci-orange);
        }
        .er-model-card--dark .er-model-badge {
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.25);
            color: #fff;
        }
        .er-model-icon {
            width: 56px; height: 56px;
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px;
            margin-bottom: 20px;
        }
        .er-model-card--light .er-model-icon {
            background: rgba(242,101,34,0.1);
            color: var(--ci-orange);
        }
        .er-model-card--dark .er-model-icon {
            background: rgba(255,255,255,0.12);
            color: #fff;
        }
        .er-model-title {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 10px;
            line-height: 1.2;
        }
        .er-model-card--light .er-model-title { color: var(--ci-purple); }
        .er-model-card--dark .er-model-title { color: #fff; }
        .er-model-desc {
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 28px;
        }
        .er-model-card--light .er-model-desc { color: var(--text-light); }
        .er-model-card--dark .er-model-desc { color: rgba(255,255,255,0.65); }
        .er-model-sub {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--ci-orange);
            margin-bottom: 12px;
        }
        .er-model-card--dark .er-model-sub { color: rgba(255,255,255,0.5); }
        .er-model-chips { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 24px; }
        .er-model-chip {
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
        }
        .er-model-card--light .er-model-chip {
            background: #f0eeee;
            color: var(--ci-purple);
        }
        .er-model-card--dark .er-model-chip {
            background: rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.75);
        }
        .er-model-bullets { list-style: none; display: flex; flex-direction: column; gap: 8px; }
        .er-model-bullets li {
            display: flex; align-items: flex-start; gap: 10px;
            font-size: 13px; line-height: 1.6;
        }
        .er-model-card--light .er-model-bullets li { color: var(--text-light); }
        .er-model-card--dark .er-model-bullets li { color: rgba(255,255,255,0.65); }
        .er-model-bullets li::before {
            content: '';
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--ci-orange);
            flex-shrink: 0;
            margin-top: 6px;
        }
        .er-model-card--dark .er-model-bullets li::before { background: rgba(255,255,255,0.5); }

        /* ─────────────── DIFFERENTIALS ─────────────── */
        .er-why {
            background: var(--ci-deepest);
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        .er-why::before {
            content: '';
            position: absolute;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(242,101,34,0.09) 0%, transparent 65%);
            top: -200px; right: -200px;
            pointer-events: none;
        }
        .er-why-header {
            text-align: center;
            max-width: 600px;
            margin: 0 auto 64px;
            position: relative; z-index: 1;
        }
        .er-why-header .er-section-title { color: #fff; }
        .er-why-header .er-section-sub { color: rgba(255,255,255,0.6); margin: 0 auto; }
        .er-why-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 48px;
            position: relative; z-index: 1;
        }
        .er-why-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.09);
            border-radius: 20px;
            padding: 32px 28px;
            backdrop-filter: blur(10px);
            transition: border-color 0.3s, background 0.3s;
        }
        .er-why-card:hover {
            border-color: rgba(242,101,34,0.35);
            background: rgba(242,101,34,0.05);
        }
        .er-why-icon {
            width: 52px; height: 52px;
            border-radius: 14px;
            background: rgba(242,101,34,0.12);
            border: 1px solid rgba(242,101,34,0.25);
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
            color: var(--ci-orange);
            margin-bottom: 20px;
        }
        .er-why-card h4 {
            font-size: 17px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 10px;
        }
         .er-why-card p {
              font-size: 13px;
              line-height: 1.7;
              color: rgba(255,255,255,0.58);
          }
          .er-bridge {
              display: grid;
              grid-template-columns: 1.1fr 0.9fr;
              gap: 28px;
              align-items: center;
              padding: 32px 36px;
              border-radius: 22px;
              border: 1px solid rgba(255,255,255,0.12);
              background: linear-gradient(145deg, rgba(255,255,255,0.04) 0%, rgba(255,255,255,0.02) 100%);
              box-shadow: 0 20px 50px rgba(0,0,0,0.35);
              position: relative; z-index: 1;
          }
          .er-bridge::before {
              content: '';
              position: absolute;
              inset: 0;
              border-radius: 22px;
              background: radial-gradient(circle at top right, rgba(242,101,34,0.18) 0%, transparent 55%);
              pointer-events: none;
          }
          .er-bridge-title {
              font-size: 20px;
              font-weight: 800;
              color: #fff;
              margin-bottom: 10px;
          }
          .er-bridge-text {
              font-size: 14px;
              line-height: 1.7;
              color: rgba(255,255,255,0.7);
          }
          .er-bridge-visual {
              display: flex;
              align-items: center;
              justify-content: center;
          }
          .er-bridge svg {
              width: 100%;
              max-width: 320px;
              height: auto;
          }

        /* ─────────────── WORK WITH US / CTA ─────────────── */
        .er-contact {
            background: linear-gradient(145deg, #2f1236 0%, #3D1F3D 100%);
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        .er-contact::before {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(242,101,34,0.15) 0%, transparent 65%);
            top: -150px; right: -150px;
            pointer-events: none;
        }
        .er-contact-split {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 64px;
            align-items: start;
            position: relative; z-index: 1;
        }
        .er-contact-prose .er-section-title { color: #fff; margin-bottom: 16px; }
        .er-contact-prose .er-section-sub { color: rgba(255,255,255,0.65); margin-bottom: 32px; }
        .er-contact-bullets {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }
        .er-contact-bullets li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 14px;
            color: rgba(255,255,255,0.7);
            line-height: 1.6;
        }
        .er-contact-bullets li i {
            width: 28px; height: 28px;
            border-radius: 8px;
            background: rgba(242,101,34,0.15);
            color: var(--ci-orange);
            display: flex; align-items: center; justify-content: center;
            font-size: 12px;
            flex-shrink: 0;
            margin-top: 2px;
        }
        .er-form-card {
            background: #fff;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 24px 64px rgba(0,0,0,0.3);
        }
        .er-form-title {
            font-size: 20px;
            font-weight: 800;
            color: var(--ci-purple);
            margin-bottom: 6px;
        }
        .er-form-sub {
            font-size: 13px;
            color: var(--text-light);
            margin-bottom: 28px;
        }
        .er-form { display: flex; flex-direction: column; gap: 14px; }
        .er-form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
        .er-form-group { display: flex; flex-direction: column; gap: 6px; }
        .er-form-group label {
            font-size: 12px;
            font-weight: 700;
            color: var(--ci-purple);
            letter-spacing: 0.3px;
        }
        .er-form-group input,
        .er-form-group select,
        .er-form-group textarea {
            width: 100%;
            padding: 13px 16px;
            border: 1.5px solid #e0dde0;
            border-radius: 12px;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            color: var(--text-dark);
            background: #faf9fa;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            -webkit-appearance: none;
            resize: none;
        }
        .er-form-group input::placeholder,
        .er-form-group textarea::placeholder { color: #bbb; }
        .er-form-group input:focus,
        .er-form-group select:focus,
        .er-form-group textarea:focus {
            border-color: var(--ci-orange);
            box-shadow: 0 0 0 3px rgba(242,101,34,0.12);
            background: #fff;
        }
        .er-form-submit {
            width: 100%;
            padding: 16px;
            background: var(--ci-orange);
            color: #fff;
            border: none;
            border-radius: 14px;
            font-family: 'Montserrat', sans-serif;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 6px;
        }
        .er-form-submit:hover { background: var(--ci-orange-hover); transform: translateY(-1px); }

        /* ─────────────── COMING SOON TOAST ─────────────── */
        .coming-soon-toast {
            position: fixed;
            right: 24px; bottom: 24px;
            z-index: 1200;
            background: #1f1f1f;
            color: #fff;
            padding: 14px 18px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.25);
            font-size: 14px;
            font-weight: 600;
            line-height: 1.4;
            max-width: 320px;
            opacity: 0;
            transform: translateY(12px);
            pointer-events: none;
            transition: opacity 0.25s ease, transform 0.25s ease;
        }
        .coming-soon-toast.show { opacity: 1; transform: translateY(0); }

        /* ─────────────── FOOTER ─────────────── */
        .ci-footer {
            background: linear-gradient(180deg, #2A152A 0%, #1f0e1f 100%);
            color: #f6eef6;
            padding: 80px 0 36px;
            position: relative;
            overflow: hidden;
        }
        .ci-footer::before, .ci-footer::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            opacity: 0.35;
        }
        .ci-footer::before {
            width: 420px; height: 420px;
            background: radial-gradient(circle, rgba(242,101,34,0.26) 0%, transparent 70%);
            top: -180px; right: -140px;
        }
        .ci-footer::after {
            width: 520px; height: 520px;
            background: radial-gradient(circle, rgba(255,255,255,0.12) 0%, transparent 70%);
            bottom: -220px; left: -200px;
        }
        .footer-stack { display: grid; gap: 26px; position: relative; z-index: 1; }
        .footer-panel {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 20px;
            padding: 28px;
            backdrop-filter: blur(8px);
            box-shadow: 0 18px 40px rgba(11,4,11,0.35);
        }
        .footer-top {
            display: grid;
            grid-template-columns: repeat(12, minmax(0,1fr));
            gap: 20px;
            align-items: center;
        }
        .footer-brand { grid-column: span 5; display: flex; flex-direction: column; gap: 16px; }
        .footer-logo { height: 48px; width: auto; object-fit: contain; }
        .footer-tagline { font-size: 15px; line-height: 1.6; color: rgba(255,255,255,0.78); max-width: 320px; }
        .footer-contact-pill {
            display: inline-flex; align-items: center; gap: 10px;
            padding: 10px 16px; border-radius: 999px;
            background: rgba(0,0,0,0.25); border: 1px solid rgba(255,255,255,0.1);
            font-weight: 600; font-size: 13px;
        }
        .footer-contact {
            grid-column: span 7;
            display: grid; grid-template-columns: repeat(2, minmax(0,1fr)); gap: 14px;
        }
        .contact-card {
            display: flex; gap: 12px; padding: 16px;
            border-radius: 16px;
            background: rgba(0,0,0,0.22); border: 1px solid rgba(255,255,255,0.08);
        }
        .contact-icon {
            width: 40px; height: 40px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            background: rgba(242,101,34,0.2); color: var(--ci-orange);
            font-size: 18px; flex-shrink: 0;
        }
        .contact-label { font-size: 11px; letter-spacing: 1.6px; text-transform: uppercase; color: rgba(255,255,255,0.58); margin-bottom: 4px; font-weight: 600; }
        .contact-value { font-size: 15px; font-weight: 700; color: #fff; line-height: 1.4; }
        .contact-meta { font-size: 12px; color: rgba(255,255,255,0.6); margin-top: 6px; }
        .footer-map-panel { padding: 0; overflow: hidden; }
        .footer-map-header {
            padding: 24px 28px 16px;
            display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;
        }
        .footer-map-title { font-size: 18px; font-weight: 700; }
        .footer-map-link { font-size: 13px; color: var(--ci-orange); text-decoration: none; font-weight: 600; }
        .footer-map-link:hover { text-decoration: underline; }
        .footer-map-wrap { position: relative; width: 100%; aspect-ratio: 16/6; }
        .footer-map-wrap iframe { position: absolute; inset: 0; width: 100%; height: 100%; border: 0; }
        .footer-social-panel { display: grid; gap: 18px; }
        .footer-social-header h3 { font-size: 20px; font-weight: 800; margin-bottom: 6px; }
        .footer-social-header p { font-size: 14px; color: rgba(255,255,255,0.68); max-width: 520px; line-height: 1.6; }
        .footer-socials { display: flex; flex-wrap: wrap; gap: 12px; }
        .footer-social-link {
            display: inline-flex; align-items: center; gap: 10px;
            padding: 10px 16px; border-radius: 999px;
            background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.16);
            color: #fff; text-decoration: none; font-weight: 600; font-size: 13px;
            transition: all 0.3s ease;
        }
        .footer-social-link i { font-size: 16px; }
        .footer-social-link:hover { transform: translateY(-2px); background: rgba(242,101,34,0.18); border-color: rgba(242,101,34,0.4); }
        .footer-social-link.instagram { background: linear-gradient(135deg, rgba(255,255,255,0.12) 0%, rgba(242,101,34,0.2) 100%); }
        .footer-note { font-size: 12px; color: rgba(255,255,255,0.5); }
        .footer-bottom {
            margin-top: 24px; padding-top: 22px;
            border-top: 1px solid rgba(255,255,255,0.12);
            display: flex; justify-content: space-between; flex-wrap: wrap; gap: 10px;
            font-size: 12px; color: rgba(255,255,255,0.55);
        }

        /* ─────────────── MODAL ─────────────── */
        .modal-overlay {
            position: fixed; inset: 0;
            background: rgba(10,4,12,0.75);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            z-index: 9000;
            display: flex; align-items: center; justify-content: center;
            padding: 20px;
            opacity: 0; visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        .modal-overlay.open { opacity: 1; visibility: visible; }
        .modal-box {
            background: #fff; border-radius: 28px;
            width: 100%; max-width: 520px; padding: 44px 44px 40px;
            position: relative;
            transform: translateY(24px) scale(0.97);
            transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1);
            box-shadow: 0 32px 80px rgba(0,0,0,0.3);
        }
        .modal-overlay.open .modal-box { transform: translateY(0) scale(1); }
        .modal-close {
            position: absolute; top: 18px; right: 18px;
            width: 36px; height: 36px;
            background: #f0eded; border: none; border-radius: 10px;
            cursor: pointer; display: flex; align-items: center; justify-content: center;
            color: #666; font-size: 14px; transition: background 0.2s;
        }
        .modal-close:hover { background: #e0dddd; }
        .modal-header { margin-bottom: 28px; }
        .modal-kicker { font-size: 11px; letter-spacing: 2.5px; text-transform: uppercase; font-weight: 700; color: var(--ci-orange); margin-bottom: 8px; }
        .modal-title { font-size: 24px; font-weight: 900; color: var(--ci-purple); line-height: 1.2; margin-bottom: 6px; }
        .modal-sub { font-size: 13px; color: var(--text-light); line-height: 1.6; }
        .modal-form { display: flex; flex-direction: column; gap: 16px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group label { font-size: 12px; font-weight: 700; color: var(--ci-purple); letter-spacing: 0.3px; }
        .form-group input, .form-group select {
            width: 100%; padding: 13px 16px;
            border: 1.5px solid #e0dde0; border-radius: 12px;
            font-family: 'Montserrat', sans-serif; font-size: 14px;
            color: var(--text-dark); background: #faf9fa; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s; -webkit-appearance: none;
        }
        .form-group input::placeholder { color: #bbb; }
        .form-group input:focus, .form-group select:focus {
            border-color: var(--ci-orange);
            box-shadow: 0 0 0 3px rgba(242,101,34,0.12);
            background: #fff;
        }
        .modal-submit {
            width: 100%; padding: 16px;
            background: var(--ci-orange); color: #fff; border: none; border-radius: 14px;
            font-family: 'Montserrat', sans-serif; font-size: 15px; font-weight: 700; cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            display: flex; align-items: center; justify-content: center; gap: 10px; margin-top: 4px;
        }
        .modal-submit:hover { background: var(--ci-orange-hover); transform: translateY(-1px); }
        .modal-trust { display: flex; justify-content: center; gap: 20px; margin-top: 14px; }
        .modal-trust span { font-size: 11px; color: #aaa; display: flex; align-items: center; gap: 5px; font-weight: 600; }
        .modal-trust i { color: var(--ci-orange); font-size: 10px; }

        /* ─────────────── RESPONSIVE ─────────────── */
        @media (max-width: 1024px) {
            .er-hero-split { grid-template-columns: 1fr 1fr; gap: 32px; }
            .er-programme-body { grid-template-columns: 1fr; gap: 40px; }
            .er-programme-body.reversed .er-programme-prose { order: 1; }
            .er-programme-body.reversed .er-programme-box  { order: 2; }
            .er-why-grid { grid-template-columns: repeat(2,1fr); }
            .er-contact-split { grid-template-columns: 1fr; gap: 40px; }
            .stack-cards-wrap { height: 520px; }
            .step-card { height: 480px; grid-template-columns: 1fr; padding: 32px 28px; gap: 20px; }
            .step-left { flex-direction: row; align-items: center; gap: 14px; }
            .step-number { display: none; }
            .footer-top { grid-template-columns: 1fr; }
            .footer-brand, .footer-contact { grid-column: span 1; }
        }

         @media (max-width: 768px) {
            .nav-links { display: none; }
            .hamburger-btn { display: flex; }
            .er-hero { min-height: auto; padding: 100px 0 70px; }
            .er-hero-split { grid-template-columns: 1fr; gap: 0; }
            /* SVG map — taller, below text */
            .er-hero-map {
                display: flex;
                min-height: auto;
                height: 320px;
                margin-top: 24px;
            }
            .er-hero-map svg {
                height: 320px;
                width: 100%;
            }
            /* Hide SVG city text labels — still too small at mobile scale */
            .city-label { display: none; }
            /* Country chips below the map */
            .er-hero-countries {
                display: flex;
                flex-wrap: wrap;
                gap: 6px;
                margin-top: 16px;
                padding: 0 20px;
            }
            .er-hero-country {
                display: inline-flex;
                align-items: center;
                gap: 4px;
                padding: 4px 10px;
                border-radius: 999px;
                background: rgba(255,255,255,0.05);
                border: 1px solid rgba(255,255,255,0.12);
                font-size: 11px;
                font-weight: 600;
                color: rgba(255,255,255,0.65);
            }
            .er-hero-country i { color: var(--ci-orange); font-size: 9px; }
            .er-hero-country--more {
                background: transparent;
                border-color: transparent;
                color: rgba(255,255,255,0.35);
                font-style: italic;
            }
            .er-hero-content { padding: 0 20px; }
            .er-programme-body { grid-template-columns: 1fr; }
            .er-who-chips { grid-template-columns: 1fr; }
             .er-models-grid { grid-template-columns: 1fr; }
             .er-why-grid { grid-template-columns: 1fr; }
             .er-bridge { grid-template-columns: 1fr; padding: 28px 24px; }
             .er-form-row { grid-template-columns: 1fr; }
            .form-row { grid-template-columns: 1fr; }
            .modal-box { padding: 32px 24px 28px; }
            .modal-title { font-size: 20px; }
            .ci-footer { padding: 64px 0 30px; }
            .footer-contact { grid-template-columns: 1fr; }
            .footer-map-wrap { aspect-ratio: 16/9; }

            .scroll-stack-sticky {
                height: 100vh;
                height: 100dvh;
                padding: 44px 0 52px;
                justify-content: center;
            }
            .stack-cards-wrap { height: 520px; }
            .stack-cards-wrap::before { height: 36px; }
            .stack-cards-wrap::after  { height: 56px; }
            .step-card {
                left: 16px !important; right: 16px !important;
                height: 480px !important;
                padding: 28px 22px;
            }
            .step-title  { font-size: 20px; margin-bottom: 8px; }
            .step-desc   { font-size: 13px; line-height: 1.65; margin-bottom: 12px; }
        }

        @media (max-width: 480px) {
            .er-hero-title { font-size: 30px; }
            .er-hero-stats { gap: 16px; }
            .er-hero-stat-num { font-size: 22px; }
            .er-model-card { padding: 32px 24px; }
            .er-form-card { padding: 28px 20px; }
        }
    </style>
</head>
<body>

    <!-- TOP BANNER -->
    <div class="top-banner">
        Erasmus+ Professional Mobility Programmes — Dublin, Ireland.
        <a href="#contact">Get in Touch <i class="fas fa-arrow-right"></i></a>
    </div>

    <!-- NAV -->
    <nav class="main-nav">
        <div class="container">
            <div class="nav-content">
                <a href="/" class="logo">
                    <img class="logo-image" src="{{ asset('images/logo-ci.png') }}" alt="CI Ireland">
                </a>
                <ul class="nav-links">
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/higher-education">Higher Education</a></li>
                    <li><a href="/erasmus" class="active">Erasmus+ Mobility</a></li>
                    <li><a href="#" data-coming-soon="true">Teens Programmes</a></li>
                    <li><a href="#" data-coming-soon="true">Corporate Learning</a></li>
                    <li><a href="#contact" class="nav-cta">Get in Touch</a></li>
                </ul>
                <button class="hamburger-btn" id="hamburgerBtn" aria-label="Open menu" aria-expanded="false">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- MOBILE NAV OVERLAY -->
    <div class="mobile-nav-overlay" id="mobileNavOverlay"></div>

    <!-- MOBILE NAV DRAWER -->
    <div class="mobile-nav-drawer" id="mobileNavDrawer" aria-hidden="true">
        <div class="mobile-drawer-header">
            <a href="/" class="logo">
                <img class="logo-image" src="{{ asset('images/logo-ci.png') }}" alt="CI Ireland" style="height:44px;">
            </a>
            <button class="mobile-drawer-close" id="mobileDrawerClose" aria-label="Close menu">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <ul class="mobile-nav-links">
            <li><a href="/about">About Us <i class="fas fa-chevron-right"></i></a></li>
            <li><a href="/higher-education">Higher Education <i class="fas fa-chevron-right"></i></a></li>
            <li><a href="/erasmus" class="active">Erasmus+ Mobility <i class="fas fa-chevron-right"></i></a></li>
            <li><a href="#" data-coming-soon="true">Teens Programmes <i class="fas fa-chevron-right"></i></a></li>
            <li><a href="#" data-coming-soon="true">Corporate Learning <i class="fas fa-chevron-right"></i></a></li>
            <li><a href="#contact">Get in Touch <i class="fas fa-chevron-right"></i></a></li>
        </ul>
        <div class="mobile-drawer-footer">
            <button class="mobile-cta-btn" onclick="window.location='#contact'">Get in Touch</button>
        </div>
    </div>

    <!-- ─────────────── HERO ─────────────── -->
    <section class="er-hero">
        <div class="container">
            <div class="er-hero-split">

                <!-- Left: text content -->
                <div class="er-hero-content">
                    <div class="er-hero-kicker">
                        <i class="fas fa-globe-europe"></i>
                        Erasmus+ · Professional Mobility
                    </div>
                    <h1 class="er-hero-title">
                        Connecting European<br><span>Educators</span><br>and <span>Institutions</span>
                    </h1>
                    <p class="er-hero-sub">
                        International professional mobility programmes for teachers, school leaders, and education professionals  interested in developing new skills, exploring innovative teaching methodologies and strengthening international networks of collaboration.
                    </p>
                    <div class="er-hero-ctas">
                        <a href="#programmes" class="er-cta-primary">
                            Explore Programmes <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="#contact" class="er-cta-ghost">
                            Talk to Our Team <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                    
                </div>

                <!-- Right: animated SVG connection map -->
                <div class="er-hero-map" aria-hidden="true">
                    <svg viewBox="0 0 580 460" xmlns="http://www.w3.org/2000/svg" style="overflow:visible;">
                        <defs>
                            <pattern id="mapgrid" width="28" height="28" patternUnits="userSpaceOnUse">
                                <circle cx="14" cy="14" r="1.2" fill="rgba(255,255,255,0.08)"/>
                            </pattern>
                            <!-- No heavy filters — glow handled by CSS drop-shadow on SVG element -->
                        </defs>

                        <!-- Dot grid background -->
                        <rect width="580" height="460" fill="url(#mapgrid)" rx="20"/>

                        <!-- Faint border -->
                        <rect width="580" height="460" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1" rx="20"/>

                        <!-- Radar rings emanating from Dublin (120, 205) -->
                        <circle class="radar-ring" cx="120" cy="205" r="0"/>
                        <circle class="radar-ring" cx="120" cy="205" r="0"/>
                        <circle class="radar-ring" cx="120" cy="205" r="0"/>
                        <circle class="radar-ring" cx="120" cy="205" r="0"/>

                        <!-- ── Flight paths (bezier curves → Dublin) ── -->
                        <!-- Amsterdam → Dublin -->
                        <path class="flight-path" pathLength="1"
                              d="M 275 148 Q 198 118 120 205"
                              style="animation-delay:0.3s"/>
                        <!-- Berlin → Dublin -->
                        <path class="flight-path" pathLength="1"
                              d="M 390 140 Q 256 100 120 205"
                              style="animation-delay:0.7s"/>
                        <!-- Paris → Dublin -->
                        <path class="flight-path" pathLength="1"
                              d="M 255 248 Q 188 182 120 205"
                              style="animation-delay:1.1s"/>
                        <!-- Lisbon → Dublin -->
                        <path class="flight-path" pathLength="1"
                              d="M 135 360 Q 72 282 120 205"
                              style="animation-delay:1.5s"/>
                        <!-- Madrid → Dublin -->
                        <path class="flight-path" pathLength="1"
                              d="M 200 338 Q 120 268 120 205"
                              style="animation-delay:1.9s"/>
                        <!-- Rome → Dublin -->
                        <path class="flight-path" pathLength="1"
                              d="M 388 318 Q 248 228 120 205"
                              style="animation-delay:2.3s"/>

                        <!-- Dublin pulse glow ring -->
                        <circle class="dublin-pulse" cx="120" cy="205" r="26"/>

                        <!-- Dublin hub dot -->
                        <circle cx="120" cy="205" r="12" fill="#F26522"/>
                        <circle cx="120" cy="205" r="6"  fill="#fff" opacity="0.95"/>

                        <!-- Dublin label -->
                        <text x="136" y="201" fill="#F26522" font-size="13" font-family="Montserrat,sans-serif" font-weight="700">Dublin</text>
                        <text x="136" y="217" fill="rgba(255,255,255,0.45)" font-size="10" font-family="Montserrat,sans-serif" font-weight="600">Ireland</text>

                        <!-- ── City dots + labels ── -->
                        <!-- Amsterdam -->
                        <g class="city-dot" style="animation-delay:2.0s">
                            <circle cx="275" cy="148" r="6" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
                            <circle cx="275" cy="148" r="3" fill="#F26522"/>
                            <text x="285" y="152" class="city-label" fill="rgba(255,255,255,0.75)" font-size="12" font-family="Montserrat,sans-serif" font-weight="600">Netherlands</text>
                        </g>
                        <!-- Berlin -->
                        <g class="city-dot" style="animation-delay:2.4s">
                            <circle cx="390" cy="140" r="6" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
                            <circle cx="390" cy="140" r="3" fill="#F26522"/>
                            <text x="400" y="144" class="city-label" fill="rgba(255,255,255,0.75)" font-size="12" font-family="Montserrat,sans-serif" font-weight="600">Germany</text>
                        </g>
                        <!-- Paris -->
                        <g class="city-dot" style="animation-delay:2.8s">
                            <circle cx="255" cy="248" r="6" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
                            <circle cx="255" cy="248" r="3" fill="#F26522"/>
                            <text x="265" y="252" class="city-label" fill="rgba(255,255,255,0.75)" font-size="12" font-family="Montserrat,sans-serif" font-weight="600">France</text>
                        </g>
                        <!-- Lisbon -->
                        <g class="city-dot" style="animation-delay:3.2s">
                            <circle cx="135" cy="360" r="6" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
                            <circle cx="135" cy="360" r="3" fill="#F26522"/>
                            <text x="145" y="364" class="city-label" fill="rgba(255,255,255,0.75)" font-size="12" font-family="Montserrat,sans-serif" font-weight="600">Portugal</text>
                        </g>
                        <!-- Madrid -->
                        <g class="city-dot" style="animation-delay:3.6s">
                            <circle cx="200" cy="338" r="6" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
                            <circle cx="200" cy="338" r="3" fill="#F26522"/>
                            <text x="210" y="342" class="city-label" fill="rgba(255,255,255,0.75)" font-size="12" font-family="Montserrat,sans-serif" font-weight="600">Spain</text>
                        </g>
                        <!-- Rome -->
                        <g class="city-dot" style="animation-delay:4.0s">
                            <circle cx="388" cy="318" r="6" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
                            <circle cx="388" cy="318" r="3" fill="#F26522"/>
                            <text x="398" y="322" class="city-label" fill="rgba(255,255,255,0.75)" font-size="12" font-family="Montserrat,sans-serif" font-weight="600">Italy</text>
                        </g>

                        <!-- Connecting arc decoration — subtle EU semicircle -->
                        <path d="M 80 130 Q 350 60 510 200" fill="none" stroke="rgba(255,255,255,0.04)" stroke-width="1" stroke-dasharray="4 6"/>
                    </svg>
                </div>

                <!-- Country chips — mobile only, appears below SVG map -->
                <div class="er-hero-countries">
                    <span class="er-hero-country"><i class="fas fa-map-marker-alt"></i> Netherlands</span>
                    <span class="er-hero-country"><i class="fas fa-map-marker-alt"></i> Germany</span>
                    <span class="er-hero-country"><i class="fas fa-map-marker-alt"></i> France</span>
                    <span class="er-hero-country"><i class="fas fa-map-marker-alt"></i> Portugal</span>
                    <span class="er-hero-country"><i class="fas fa-map-marker-alt"></i> Spain</span>
                    <span class="er-hero-country"><i class="fas fa-map-marker-alt"></i> Italy</span>
                    <span class="er-hero-country er-hero-country--more">& more</span>
                </div>

            </div>
        </div>
    </section>

    <!-- Pause SVG map animations when hero is scrolled off-screen -->
    <script>
    (function() {
        var map = document.querySelector('.er-hero-map');
        if (!map || !('IntersectionObserver' in window)) return;
        var els = map.querySelectorAll('.radar-ring,.flight-path,.city-dot,.dublin-pulse');
        new IntersectionObserver(function(entries) {
            var state = entries[0].isIntersecting ? '' : 'paused';
            els.forEach(function(el) { el.style.animationPlayState = state; });
        }, { threshold: 0.1 }).observe(map);
    })();
    </script>

    <!-- ─────────────── ERASMUS+ PROFESSIONAL MOBILITY ─────────────── -->
    <section class="er-programme er-programme--dark" id="programmes">
        <div class="container">
                <div class="er-programme-header">
                    <div class="er-section-kicker">Erasmus+ Professional Mobility</div>
                    <h2 class="er-section-title">Professional Development<br>for Educators</h2>
                    <p class="er-section-sub">International professional mobility programmes for educators and education leaders who want to develop new skills, explore innovative teaching methodologies, and strengthen international collaboration networks.</p>
                </div>

            <div class="er-programme-body">
                <!-- LEFT: Who it's for -->
                <div class="er-programme-prose">
                    <span class="er-sub-label">Who it's for</span>
                    <div class="er-who-chips">
                        <div class="er-who-chip">
                            <i class="fas fa-chalkboard-teacher"></i>
                            Primary &amp; Secondary Teachers
                        </div>
                        <div class="er-who-chip">
                            <i class="fas fa-user-tie"></i>
                            School Principals &amp; School Leaders
                        </div>
                        <div class="er-who-chip">
                            <i class="fas fa-sitemap"></i>
                            Academic Coordinators
                        </div>
                        <div class="er-who-chip">
                            <i class="fas fa-graduation-cap"></i>
                            Education &amp; Training Professionals
                        </div>
                        <div class="er-who-chip">
                            <i class="fas fa-people-group"></i>
                            Youth Workers &amp; Social Educators
                        </div>
                        <div class="er-who-chip">
                            <i class="fas fa-project-diagram"></i>
                            Educational Project Coordinators
                        </div>
                    </div>
                    <p class="er-erasmus-note">
                        Many participants join these programmes through Erasmus+ funded projects, which support professional mobilities for educators across Europe.
                    </p>
                </div>

                <!-- RIGHT: How it works -->
                <div class="er-programme-box">
                    <span class="er-sub-label">How it works</span>
                    <div class="er-stepper" data-stepper data-initial="1">
                        <div class="er-stepper-indicators">
                            <button class="er-stepper-indicator" type="button" data-step="1" aria-label="Step 1">
                                <span class="er-stepper-indicator-inner">
                                    <span class="er-stepper-number">1</span>
                                    <span class="er-stepper-dot"></span>
                                    <span class="er-stepper-check" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                            <div class="er-stepper-connector" data-connector="1">
                                <div class="er-stepper-connector-inner"></div>
                            </div>
                            <button class="er-stepper-indicator" type="button" data-step="2" aria-label="Step 2">
                                <span class="er-stepper-indicator-inner">
                                    <span class="er-stepper-number">2</span>
                                    <span class="er-stepper-dot"></span>
                                    <span class="er-stepper-check" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                            <div class="er-stepper-connector" data-connector="2">
                                <div class="er-stepper-connector-inner"></div>
                            </div>
                            <button class="er-stepper-indicator" type="button" data-step="3" aria-label="Step 3">
                                <span class="er-stepper-indicator-inner">
                                    <span class="er-stepper-number">3</span>
                                    <span class="er-stepper-dot"></span>
                                    <span class="er-stepper-check" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                            <div class="er-stepper-connector" data-connector="3">
                                <div class="er-stepper-connector-inner"></div>
                            </div>
                            <button class="er-stepper-indicator" type="button" data-step="4" aria-label="Step 4">
                                <span class="er-stepper-indicator-inner">
                                    <span class="er-stepper-number">4</span>
                                    <span class="er-stepper-dot"></span>
                                    <span class="er-stepper-check" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                            <div class="er-stepper-connector" data-connector="4">
                                <div class="er-stepper-connector-inner"></div>
                            </div>
                            <button class="er-stepper-indicator" type="button" data-step="5" aria-label="Step 5">
                                <span class="er-stepper-indicator-inner">
                                    <span class="er-stepper-number">5</span>
                                    <span class="er-stepper-dot"></span>
                                    <span class="er-stepper-check" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                        </div>

                        <div class="er-stepper-content">
                            <div class="er-stepper-panel" data-step-panel="1">
                                <h4>Pedagogical Workshops &amp; Training Sessions</h4>
                                <p>Structured sessions focused on innovative methodologies and best practices in education.</p>
                            </div>
                            <div class="er-stepper-panel" data-step-panel="2">
                                <h4>Project-Based Learning</h4>
                                <p>Hands-on collaborative projects that bridge theory and real classroom application.</p>
                            </div>
                            <div class="er-stepper-panel" data-step-panel="3">
                                <h4>Cross-Country Educator Collaboration</h4>
                                <p>Exchange experiences with educators from different European education systems.</p>
                            </div>
                            <div class="er-stepper-panel" data-step-panel="4">
                                <h4>Educational &amp; Institutional Visits</h4>
                                <p>Immersive visits that connect learning to real institutional contexts in Ireland.</p>
                            </div>
                            <div class="er-stepper-panel" data-step-panel="5">
                                <h4>Reflection &amp; Experience Exchange Sessions</h4>
                                <p>Structured reflection and peer exchange to consolidate learning and practical insights.</p>
                            </div>
                        </div>

                        <div class="er-stepper-footer">
                            <div class="er-stepper-nav er-stepper-nav--end" data-stepper-nav>
                                <button class="er-stepper-back" type="button" data-stepper-back>Back</button>
                                <button class="er-stepper-next" type="button" data-stepper-next>Continue</button>
                            </div>
                        </div>
                        <p class="er-erasmus-note">
                            The experience is designed so participants return to their institutions with concrete ideas and practical tools to implement new educational approaches.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─────────────── SCHOOL PARTNERSHIPS ─────────────── -->
        <section class="er-programme er-programme--light">
            <div class="container">
                <div class="er-programme-header">
                    <div class="er-section-kicker">School Partnerships &amp; Erasmus Collaboration</div>
                    <h2 class="er-section-title">Strategic Partnerships for<br>Schools &amp; Institutions</h2>
                    <p class="er-section-sub">CI Ireland acts as a strategic partner for schools and educational institutions interested in developing international projects.</p>
                </div>

                <div class="er-programme-body reversed">
                    <div class="er-programme-prose">
                        <p>We support schools that are starting their first international initiatives and those deepening established Erasmus+ collaborations.</p>
                        <p>This model allows schools to develop consistent international projects and build lasting educational partnerships.</p>
                    </div>

                    <div class="er-programme-box">
                        <div class="er-box-section">
                            <h4>Who it's for</h4>
                            <div class="er-box-chips">
                                <span class="er-box-chip">Erasmus+ Schools</span>
                                <span class="er-box-chip">Institutions starting international projects</span>
                                <span class="er-box-chip">Erasmus Coordinators in European schools</span>
                                <span class="er-box-chip">Educational organisations focused on cooperation</span>
                            </div>
                        </div>
                        <div class="er-box-section">
                            <h4>How we support institutions</h4>
                            <ul class="er-box-bullets">
                                <li>Development of international educational programmes</li>
                                <li>Organisation of professional mobilities for educators</li>
                                <li>Design of educational experiences in Ireland</li>
                                <li>Support in implementing educational activities</li>
                                <li>Facilitation of collaboration between institutions from different countries</li>
                            </ul>
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <!-- ─────────────── INTERNATIONAL EDUCATION PROGRAMMES ─────────────── -->
        <section class="er-programme er-programme--white">
            <div class="container">
                <div class="er-programme-header">
                    <div class="er-section-kicker">International Education Programmes in Ireland</div>
                    <h2 class="er-section-title">Pedagogical Innovation &amp;<br>Institutional Development</h2>
                    <p class="er-section-sub">Beyond Erasmus+ mobilities, CI Ireland develops international programmes focused on pedagogical innovation and institutional development.</p>
                </div>

                <div class="er-programme-body">
                    <div class="er-programme-box" style="border-left-color: var(--ci-purple);">
                        <div class="er-box-section">
                            <h4>Who it's for</h4>
                            <div class="er-box-chips">
                                <span class="er-box-chip">Teachers seeking pedagogical innovation</span>
                                <span class="er-box-chip">Educational leaders &amp; school managers</span>
                                <span class="er-box-chip">Academic teams seeking new approaches</span>
                                <span class="er-box-chip">Institutions developing international projects</span>
                            </div>
                        </div>
                        <div class="er-box-section">
                            <h4>How they work</h4>
                            <ul class="er-box-bullets">
                                <li>Structured academic training</li>
                                <li>Collaboration between international educators</li>
                                <li>Development of educational projects</li>
                                <li>Educational experiences in the Irish context</li>
                            </ul>
                        </div>
                    </div>

                    <div class="er-programme-prose">
                        <p>These programmes are designed to strengthen the capacity for pedagogical innovation within participating institutions.</p>
                        <p>Participants work alongside educators from different countries and develop projects rooted in real school contexts in Ireland.</p>
                        <p>The goal is to build practical, transferable approaches that can be implemented directly in their institutions.</p>
                    </div>
                </div>
            </div>
        </section>

    <!-- ─────────────── FOCUS AREAS (SCROLL STACK) ─────────────── -->
    <section class="er-focus" id="focus-areas">
        <div class="er-focus-header">
            <div class="er-section-kicker">Programme Focus Areas</div>
            <h2 class="er-section-title">Four Strategic Pillars</h2>
            <p class="er-section-sub">Our programmes are organised around four key areas of contemporary education, each designed to deliver practical, school-ready insights.</p>
        </div>

        <div class="scroll-stack-outer">
            <div class="scroll-stack-sticky">
                <div class="stack-inner-header" style="display:none;"></div>
                <div class="stack-cards-wrap">

                    <!-- Card 1: Inclusive Education & SEN -->
                    <div class="step-card" data-step="1">
                        <div class="step-left">
                            <div class="step-number">01</div>
                            <div class="step-badge">Inclusive Ed</div>
                            <div class="step-icon-wrap"><i class="fas fa-universal-access"></i></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">Inclusive Education &amp; Special Educational Needs</h3>
                            <p class="step-desc">Programmes focused on inclusive practice, with special attention to Special Educational Needs (SEN) in diverse school contexts.</p>
                            <p class="step-desc"><strong>For schools working on inclusion broadly</strong></p>
                            <ul class="step-bullets">
                                <li>Teaching strategies for heterogeneous classrooms</li>
                                <li>Pedagogical adaptation and classroom differentiation</li>
                                <li>Universal Design for Learning (UDL)</li>
                                <li>Social and emotional wellbeing</li>
                            </ul>
                            <p class="step-desc"><strong>For schools focused on SEN</strong></p>
                            <ul class="step-bullets">
                                <li>Support strategies for SEN in mainstream settings</li>
                                <li>Collaboration between teachers, specialists, and support teams</li>
                                <li>Adapting practice to diverse learning profiles</li>
                                <li>Safe, inclusive environments for specific needs</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Card 2: Digital Transformation -->
                    <div class="step-card" data-step="2">
                        <div class="step-left">
                            <div class="step-number">02</div>
                            <div class="step-badge">Digital</div>
                            <div class="step-icon-wrap"><i class="fas fa-laptop-code"></i></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">Digital Transformation in Education</h3>
                            <p class="step-desc">Explore how digital technologies can transform teaching and learning in a pedagogically meaningful way.</p>
                            <ul class="step-bullets">
                                <li>Digital tools for education</li>
                                <li>Hybrid learning and virtual environments</li>
                                <li>Digital collaboration between students</li>
                                <li>Development of digital competences for educators</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Card 3: STEM -->
                    <div class="step-card" data-step="3">
                        <div class="step-left">
                            <div class="step-number">03</div>
                            <div class="step-badge">STEM</div>
                            <div class="step-icon-wrap"><i class="fas fa-flask"></i></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">STEM Education</h3>
                            <p class="step-desc">Innovative methodologies for teaching science, technology, engineering, and mathematics — making STEM more relevant and engaging for students.</p>
                            <ul class="step-bullets">
                                <li>Project-based learning</li>
                                <li>Real-world problem solving</li>
                                <li>Interdisciplinary integration across scientific areas</li>
                                <li>Critical thinking and creativity</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Card 4: Leadership -->
                    <div class="step-card" data-step="4">
                        <div class="step-left">
                            <div class="step-number">04</div>
                            <div class="step-badge">Leadership</div>
                            <div class="step-icon-wrap"><i class="fas fa-users-gear"></i></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">Leadership in Schools</h3>
                            <p class="step-desc">For principals and educational leaders seeking to strengthen leadership and management competencies.</p>
                            <ul class="step-bullets">
                                <li>Educational leadership</li>
                                <li>Change management in educational institutions</li>
                                <li>Building cultures of innovation in schools</li>
                                <li>Internationalisation of education</li>
                            </ul>
                        </div>
                    </div>

                </div>

                <!-- Progress dots -->
                <div class="stack-progress">
                    <div class="stack-dot active"></div>
                    <div class="stack-dot"></div>
                    <div class="stack-dot"></div>
                    <div class="stack-dot"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─────────────── PROGRAMME MODELS ─────────────── -->
      <section class="er-models">
          <div class="container">
              <div class="er-models-header">
                  <div class="er-section-kicker">Programme Formats</div>
                  <h2 class="er-section-title">Two Ways to Join</h2>
                  <p class="er-section-sub">CI Ireland offers different formats of mobility and professional development.</p>
              </div>

              <div class="er-models-grid">
                  <!-- Open International -->
                  <div class="er-model-card er-model-card--light">
                      <div class="er-model-badge"><i class="fas fa-globe"></i> Open Enrolment</div>
                      <div class="er-model-icon"><i class="fas fa-users"></i></div>
                      <h3 class="er-model-title">Open International Programmes</h3>
                      <p class="er-model-desc">Educators from different countries participate together in multicultural programmes.</p>
                      <div class="er-model-sub">Ideal for</div>
                      <div class="er-model-chips">
                          <span class="er-model-chip">Teachers in individual Erasmus+ mobilities</span>
                          <span class="er-model-chip">Educators interested in international networks</span>
                          <span class="er-model-chip">Institutions offering international experiences</span>
                      </div>
                      <div class="er-model-sub">What you get</div>
                      <ul class="er-model-bullets">
                          <li>Collaborative activities with international educators</li>
                          <li>Exchange across different education systems</li>
                          <li>Expanded professional networks</li>
                      </ul>
                  </div>

                <!-- Institutional Group -->
                  <div class="er-model-card er-model-card--dark">
                      <div class="er-model-badge"><i class="fas fa-school"></i> For Schools</div>
                      <div class="er-model-icon"><i class="fas fa-building-columns"></i></div>
                      <h3 class="er-model-title">Institutional Group Programmes</h3>
                      <p class="er-model-desc">Programmes designed specifically for a school or institution, aligned to its educational strategy.</p>
                      <div class="er-model-sub">Ideal for</div>
                      <div class="er-model-chips">
                          <span class="er-model-chip">Schools in Erasmus+ group projects</span>
                          <span class="er-model-chip">Educational teams developing institutional projects</span>
                          <span class="er-model-chip">Institutions seeking strategic alignment</span>
                      </div>
                      <div class="er-model-sub">What you get</div>
                      <ul class="er-model-bullets">
                          <li>Tailored programme aligned to institutional priorities</li>
                          <li>Direct impact on institutional development</li>
                          <li>Cohesive experience for the full team</li>
                      </ul>
                  </div>
              </div>
          </div>
      </section>

    <!-- ─────────────── WHY CI IRELAND ─────────────── -->
      <section class="er-why">
          <div class="container">
              <div class="er-why-header">
                  <div class="er-section-kicker">Why CI Ireland</div>
                  <h2 class="er-section-title">Why Schools Choose CI Ireland</h2>
                  <p class="er-section-sub">Schools and educational institutions choose CI Ireland for a combination of experience, structure, and international reach.</p>
              </div>

                <div class="er-why-grid">
                    <div class="er-why-card">
                        <div class="er-why-icon"><i class="fas fa-globe"></i></div>
                        <h4>International Programme Experience</h4>
                        <p>Proven experience in designing and delivering international educational programmes for schools and institutions.</p>
                  </div>
                  <div class="er-why-card">
                      <div class="er-why-icon"><i class="fas fa-handshake"></i></div>
                      <h4>Structured Pedagogy &amp; Partners</h4>
                      <p>Structured pedagogical approach supported by certified trainers, universities, and educational partners.</p>
                  </div>
                    <div class="er-why-card">
                        <div class="er-why-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <h4>Dublin &amp; International Network</h4>
                        <p>Strategic location in Dublin combined with an international partner network that strengthens collaboration opportunities.</p>
                    </div>
                </div>

                <div class="er-bridge">
                    <div class="er-bridge-content">
                        <h3 class="er-bridge-title">Connecting Europe and Latin America</h3>
                        <p class="er-bridge-text">CI Ireland acts as a bridge between European and Latin American educational institutions. Through CI’s international network, educators from different regions can share experiences, explore diverse pedagogical practices, and develop international educational projects.</p>
                    </div>
                    <div class="er-bridge-visual" aria-hidden="true">
                        <svg viewBox="0 0 360 200" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="bridgeLine" x1="0" x2="1" y1="0" y2="0">
                                    <stop offset="0" stop-color="#F26522" stop-opacity="0.2" />
                                    <stop offset="0.5" stop-color="#F26522" stop-opacity="1" />
                                    <stop offset="1" stop-color="#F26522" stop-opacity="0.25" />
                                </linearGradient>
                                <radialGradient id="glow" cx="50%" cy="50%" r="50%">
                                    <stop offset="0" stop-color="#F26522" stop-opacity="0.55" />
                                    <stop offset="1" stop-color="#F26522" stop-opacity="0" />
                                </radialGradient>
                            </defs>
                            <rect x="0" y="0" width="360" height="200" rx="20" fill="rgba(255,255,255,0.02)"/>
                            <path d="M40 140 C120 40, 240 40, 320 120" stroke="url(#bridgeLine)" stroke-width="4" fill="none"/>
                            <circle cx="60" cy="140" r="22" fill="url(#glow)"/>
                            <circle cx="60" cy="140" r="8" fill="#F26522"/>
                            <circle cx="300" cy="120" r="22" fill="url(#glow)"/>
                            <circle cx="300" cy="120" r="8" fill="#F26522"/>
                            <text x="36" y="170" fill="rgba(255,255,255,0.65)" font-size="10" font-family="Montserrat, sans-serif" font-weight="600">Latin America</text>
                            <text x="278" y="146" fill="rgba(255,255,255,0.65)" font-size="10" font-family="Montserrat, sans-serif" font-weight="600">Europe</text>
                        </svg>
                    </div>
                </div>
            </div>
        </section>

    <!-- ─────────────── WORK WITH US ─────────────── -->
      <section class="er-contact" id="contact">
          <div class="container">
              <div class="er-contact-split">
                  <div class="er-contact-prose">
                      <div class="er-section-kicker">Work With Us</div>
                      <h2 class="er-section-title">Let's Build Something Together</h2>
                      <p class="er-section-sub">CI Ireland collaborates with schools, educational institutions, and organisations interested in developing international mobility and educational cooperation programmes. If your institution wants to organise a professional mobility, develop an Erasmus+ project, or explore international collaboration, our team will be happy to discuss possible initiatives.</p>
                      <ul class="er-contact-bullets">
                          <li>
                              <i class="fas fa-plane-departure"></i>
                              Organise a professional mobility for your school or team
                          </li>
                          <li>
                              <i class="fas fa-file-signature"></i>
                              Develop or deepen an Erasmus+ project
                          </li>
                          <li>
                              <i class="fas fa-network-wired"></i>
                              Explore international collaboration opportunities
                          </li>
                      </ul>
                  </div>

                <div class="er-form-card">
                    <div class="er-form-title">Get in Touch</div>
                    <div class="er-form-sub">Tell us about your school or institution and we'll get back to you.</div>
                    <form class="er-form" onsubmit="return false;">
                        <div class="er-form-row">
                            <div class="er-form-group">
                                <label>Full Name</label>
                                <input type="text" placeholder="Your full name">
                            </div>
                            <div class="er-form-group">
                                <label>Institution</label>
                                <input type="text" placeholder="Your school or organisation">
                            </div>
                        </div>
                        <div class="er-form-row">
                            <div class="er-form-group">
                                <label>Country</label>
                                <input type="text" placeholder="Your country">
                            </div>
                            <div class="er-form-group">
                                <label>Email</label>
                                <input type="email" placeholder="your@email.com">
                            </div>
                        </div>
                        <div class="er-form-group">
                            <label>Message</label>
                            <textarea rows="4" placeholder="Tell us about your interest in Erasmus+ mobility or school partnerships..."></textarea>
                        </div>
                        <button type="submit" class="er-form-submit">
                            Send Message <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ─────────────── FOOTER ─────────────── -->
    <footer class="ci-footer">
        <div class="container">
            <div class="footer-stack">
                <div class="footer-panel footer-top">
                    <div class="footer-brand">
                        <img class="footer-logo" src="{{ asset('images/logo-ci.png') }}" alt="CI Ireland">
                        <p class="footer-tagline">CI Ireland — Your European Education Mobility Hub in Dublin.</p>
                        <div class="footer-contact-pill">
                            <i class="fas fa-phone"></i>
                            +353 83 083 7734 / +353 86 014 2313
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
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2381.85573145558!2d-6.273963188021604!3d53.34583867464635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670c28196db075%3A0xe343f6fe09993741!2sCI%20Interc%C3%A2mbio%20-%20Irlanda!5e0!3m2!1spt-BR!2sbr!4v1772016557899!5m2!1spt-BR!2sbr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="CI Ireland map"></iframe>
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
                        <a class="footer-social-link" href="https://www.facebook.com/CI.Intercambio.Irlanda" target="_blank" rel="noopener">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a class="footer-social-link" href="https://www.linkedin.com/company/ci-irlanda/?originalSubdomain=ie" target="_blank" rel="noopener">
                            <i class="fab fa-linkedin-in"></i> LinkedIn
                        </a>
                    </div>
                </div>

                <div class="footer-bottom">
                    <span>CI Exchange Ireland. All rights reserved.</span>
                    <span>Connecting European Educators Through Ireland.</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Coming Soon Toast -->
    <div class="coming-soon-toast" id="comingSoonToast" role="status" aria-live="polite"></div>

    <script>
        // ─── Mobile Nav ───
        const hamburgerBtn   = document.getElementById('hamburgerBtn');
        const mobileNavDrawer  = document.getElementById('mobileNavDrawer');
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
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape' && mobileNavDrawer.classList.contains('open')) closeMobileNav();
        });

        // ─── Scroll Stack ───
        function initScrollStack() {
            const outer = document.querySelector('.scroll-stack-outer');
            const cards = Array.from(document.querySelectorAll('.step-card'));
            const dots  = Array.from(document.querySelectorAll('.stack-dot'));
            const n     = cards.length;
            const PEEK  = 38;
            let rafId   = null;

            function getCardH() {
                return cards[0] ? cards[0].offsetHeight : 350;
            }

            function update() {
                if (!outer) return;
                const rect        = outer.getBoundingClientRect();
                const scrollableH = outer.offsetHeight - window.innerHeight;
                const scrolled    = Math.max(0, -rect.top);
                const total       = Math.min(1, scrolled / scrollableH);
                const scaled      = total * n;
                const idx         = Math.min(n - 1, Math.floor(scaled));
                const prog        = idx === n - 1 ? 0 : scaled - Math.floor(scaled);
                const CARD_H      = getCardH();
                const wrapH       = outer.querySelector('.stack-cards-wrap').offsetHeight;
                const base        = Math.round(Math.max(0, (wrapH - CARD_H) / 2));
                const exitD       = base + CARD_H + 30;
                const enterD      = wrapH - base - PEEK;

                cards.forEach((card, i) => {
                    let ty, scale, opacity, z;
                    if (i === idx) {
                        ty      = base - prog * exitD;
                        scale   = 1 - prog * 0.02;
                        opacity = prog > 0.6 ? 1 - (prog - 0.6) / 0.4 : 1;
                        z       = 20;
                    } else if (i === idx + 1) {
                        ty      = base + (1 - prog) * enterD;
                        scale   = 0.97 + prog * 0.03;
                        opacity = 0.55 + prog * 0.45;
                        z       = 10;
                    } else if (i > idx + 1) {
                        ty = wrapH; scale = 0.95; opacity = 0; z = 5;
                    } else {
                        ty = -exitD; scale = 0.98; opacity = 0; z = 0;
                    }
                    card.style.transform = `translateY(${ty}px) scale(${scale})`;
                    card.style.opacity   = String(opacity);
                    card.style.zIndex    = String(z);
                });

                dots.forEach((d, i) => d.classList.toggle('active', i === idx));
                rafId = null;
            }

            function onScroll() {
                if (!rafId) rafId = requestAnimationFrame(update);
            }

            window.addEventListener('scroll', onScroll, { passive: true });
            update();
        }

        // ─── Coming Soon Toast ───
        // Stepper: Erasmus "How it works"
        function initErasmusStepper() {
            const steppers = document.querySelectorAll('[data-stepper]');
            if (!steppers.length) return;

            steppers.forEach((root) => {
                const indicators = Array.from(root.querySelectorAll('[data-step]'));
                const connectors = Array.from(root.querySelectorAll('[data-connector]'));
                const panels = Array.from(root.querySelectorAll('[data-step-panel]'));
                const content = root.querySelector('.er-stepper-content');
                const nav = root.querySelector('[data-stepper-nav]');
                const backBtn = root.querySelector('[data-stepper-back]');
                const nextBtn = root.querySelector('[data-stepper-next]');
                const total = panels.length;
                if (!total) return;

                let current = parseInt(root.getAttribute('data-initial') || '1', 10);
                if (Number.isNaN(current)) current = 1;
                current = Math.min(Math.max(1, current), total);

                const updateHeight = () => {
                    if (!content) return;
                    const active = panels[current - 1];
                    if (active) content.style.height = `${active.offsetHeight}px`;
                };

                const setStep = (step) => {
                    if (step < 1 || step > total) return;
                    current = step;

                    indicators.forEach((btn) => {
                        const s = parseInt(btn.getAttribute('data-step') || '0', 10);
                        const isActive = s === current;
                        const isComplete = s < current;
                        btn.classList.toggle('is-active', isActive);
                        btn.classList.toggle('is-complete', isComplete);
                        btn.classList.toggle('is-inactive', s > current);
                        btn.setAttribute('aria-current', isActive ? 'step' : 'false');
                    });

                    connectors.forEach((conn) => {
                        const s = parseInt(conn.getAttribute('data-connector') || '0', 10);
                        conn.classList.toggle('is-complete', s < current);
                    });

                    panels.forEach((panel) => {
                        const s = parseInt(panel.getAttribute('data-step-panel') || '0', 10);
                        const isActive = s === current;
                        panel.classList.toggle('is-active', isActive);
                        panel.setAttribute('aria-hidden', isActive ? 'false' : 'true');
                    });

                    if (nav) {
                        nav.classList.toggle('er-stepper-nav--end', current === 1);
                        nav.classList.toggle('er-stepper-nav--spread', current !== 1);
                    }
                    if (backBtn) backBtn.disabled = current === 1;
                    if (nextBtn) nextBtn.textContent = current === total ? 'Complete' : 'Continue';

                    updateHeight();
                };

                indicators.forEach((btn) => {
                    btn.addEventListener('click', () => {
                        const target = parseInt(btn.getAttribute('data-step') || '0', 10);
                        if (!Number.isNaN(target)) setStep(target);
                    });
                });

                if (backBtn) backBtn.addEventListener('click', () => setStep(current - 1));
                if (nextBtn) nextBtn.addEventListener('click', () => {
                    if (current < total) setStep(current + 1);
                });

                window.addEventListener('resize', updateHeight);
                setStep(current);
            });
        }

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
            const link = event.target.closest('[data-coming-soon="true"]');
            if (!link) return;
            event.preventDefault();
            event.stopPropagation();
            showComingSoonToast('This section is being upgraded and will be available soon.');
        });

        // ─── Smooth scroll for anchor links ───
        document.querySelectorAll('a[href^="#"]').forEach(a => {
            a.addEventListener('click', e => {
                const target = document.querySelector(a.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            initScrollStack();
            initErasmusStepper();
        });
    </script>
</body>
</html>
