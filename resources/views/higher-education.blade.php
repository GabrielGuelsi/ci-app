<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Higher Education in Ireland - CI Ireland</title>
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
            gap: 30px;
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

        /* ─────────────── HERO ─────────────── */
        .he-hero {
            display: grid;
            grid-template-columns: 55fr 45fr;
            min-height: calc(100vh - 52px);
            overflow: hidden;
        }

        .he-hero-left {
            background: linear-gradient(145deg, #2f1236 0%, #3D1F3D 55%, #231023 100%);
            padding: 80px 70px 80px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .he-hero-left::before {
            content: '';
            position: absolute;
            width: 560px; height: 560px;
            background: radial-gradient(circle, rgba(242,101,34,0.22) 0%, transparent 65%);
            top: -200px; right: -180px;
            pointer-events: none;
        }
        .he-hero-left::after {
            content: '';
            position: absolute;
            width: 300px; height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.06) 0%, transparent 70%);
            bottom: -100px; left: -80px;
            pointer-events: none;
        }

        .he-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            padding: 8px 16px;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.25);
            background: rgba(255,255,255,0.08);
            color: rgba(255,255,255,0.85);
            width: fit-content;
            margin-bottom: 24px;
        }
        .he-kicker i { color: var(--ci-orange); }

        .he-hero-title {
            font-size: clamp(32px, 3.8vw, 56px);
            font-weight: 900;
            line-height: 1.08;
            color: #fff;
            margin-bottom: 20px;
        }
        .he-hero-title span { color: var(--ci-orange); }

        .he-hero-sub {
            font-size: 16px;
            line-height: 1.75;
            color: rgba(255,255,255,0.72);
            max-width: 480px;
            margin-bottom: 32px;
        }

        /* Academic level ladder */
        .he-level-ladder {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 36px;
        }
        .level-pill {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            padding: 7px 16px;
            border-radius: 999px;
            letter-spacing: 0.5px;
        }
        .level-pill.active {
            background: var(--ci-orange);
            border-color: var(--ci-orange);
        }
        .level-arrow {
            color: rgba(255,255,255,0.35);
            font-size: 10px;
        }

        /* CTAs */
        .he-hero-ctas {
            display: flex;
            gap: 14px;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }
        .he-cta-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--ci-orange);
            color: #fff;
            text-decoration: none;
            padding: 16px 28px;
            border-radius: 999px;
            font-weight: 700;
            font-size: 14px;
            transition: background 0.3s, gap 0.3s;
            white-space: nowrap;
        }
        .he-cta-primary:hover { background: var(--ci-orange-hover); gap: 14px; }
        .he-cta-secondary {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.3s;
        }
        .he-cta-secondary:hover { color: #fff; }

        /* Trust badges */
        .he-trust-row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        .he-trust-row span {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: rgba(255,255,255,0.6);
            font-weight: 600;
        }
        .he-trust-row i { color: var(--ci-orange); font-size: 11px; }

        /* Hero right / image */
        .he-hero-right {
            position: relative;
            overflow: hidden;
        }
        .he-hero-right img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 30%;
            display: block;
        }
        .he-hero-right-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(35,10,35,0.45) 0%, transparent 50%);
            pointer-events: none;
        }

        /* Floating consultation card */
        .he-consult-card {
            position: absolute;
            bottom: 40px;
            left: 28px;
            background: rgba(255,255,255,0.14);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 20px;
            padding: 18px 22px;
            display: flex;
            align-items: center;
            gap: 14px;
            color: #fff;
            box-shadow: 0 12px 40px rgba(0,0,0,0.35);
        }
        .he-consult-icon {
            width: 46px; height: 46px;
            background: var(--ci-orange);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }
        .he-consult-label {
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 0.3px;
        }
        .he-consult-sub {
            font-size: 11px;
            color: rgba(255,255,255,0.7);
            margin-top: 2px;
            font-weight: 500;
        }

        /* Photo caption */
        .he-photo-caption {
            position: absolute;
            top: 24px;
            right: 20px;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(6px);
            color: rgba(255,255,255,0.85);
            font-size: 11px;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .he-photo-caption i { color: var(--ci-orange); }

        /* Stats strip at right top */
        .he-stat-strip {
            position: absolute;
            top: 24px;
            left: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .he-stat-badge {
            background: rgba(0,0,0,0.55);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 12px;
            padding: 10px 16px;
            color: #fff;
            text-align: center;
        }
        .he-stat-badge .num {
            font-size: 20px;
            font-weight: 900;
            color: var(--ci-orange);
            display: block;
        }
        .he-stat-badge .lbl {
            font-size: 10px;
            font-weight: 600;
            color: rgba(255,255,255,0.65);
            letter-spacing: 0.5px;
        }

        /* ─────────────── PROCESS SECTION ─────────────── */
        .he-process {
            background: var(--ci-deepest);
            position: relative;
        }
        .he-process-header { display: none; }
        .he-process::before {
            content: '';
            position: absolute;
            width: 700px; height: 700px;
            background: radial-gradient(circle, rgba(242,101,34,0.12) 0%, transparent 65%);
            top: -200px; left: 50%;
            transform: translateX(-50%);
            pointer-events: none;
        }

        .he-section-header {
            text-align: center;
            max-width: 640px;
            margin: 0 auto 36px;
            position: relative;
            z-index: 1;
        }
        .he-section-kicker {
            display: inline-block;
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--ci-orange);
            font-weight: 700;
            margin-bottom: 12px;
        }
        .he-section-title {
            font-size: clamp(28px, 3.5vw, 44px);
            font-weight: 900;
            color: #fff;
            line-height: 1.1;
            margin-bottom: 14px;
        }
        .he-section-title span { color: var(--ci-orange); }
        .he-section-sub {
            font-size: 16px;
            color: rgba(255,255,255,0.55);
            line-height: 1.7;
        }

        /* ── Scroll Stack inner header (sticky) ── */
        .stack-inner-header {
            flex-shrink: 0;
            text-align: center;
            padding: 56px 20px 32px;
            max-width: 600px;
            width: 100%;
        }

        /* ── ReactBits-style Scroll Stack ── */
        .scroll-stack-outer {
            position: relative;
            height: 250vh;
        }
        .scroll-stack-sticky {
            position: sticky;
            top: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }
        .stack-cards-wrap {
            position: relative;
            width: 100%;
            max-width: 900px;
            height: 390px;
            margin: 0 auto;
            overflow: hidden;
        }
        /* Gradient fade masks — top clips exiting cards, bottom shows peek */
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
            height: 350px;
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
            transition: transform 0.18s cubic-bezier(0.25, 0.46, 0.45, 0.94),
                        opacity 0.18s ease;
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
        .stack-dot.active {
            background: var(--ci-orange);
            transform: scale(1.3);
        }

        .step-card[data-step="1"] {
            background: linear-gradient(145deg, #32183a 0%, #210f2a 100%);
            border: 1px solid rgba(242,101,34,0.28);
        }
        .step-card[data-step="2"] {
            background: linear-gradient(145deg, #1e1a40 0%, #131030 100%);
            border: 1px solid rgba(255,255,255,0.1);
        }
        .step-card[data-step="3"] {
            background: linear-gradient(145deg, #162038 0%, #0e1428 100%);
            border: 1px solid rgba(255,255,255,0.1);
        }
        .step-card[data-step="4"] {
            background: linear-gradient(135deg, #F26522 0%, #d44000 100%);
            border: none;
        }

        /* Glow accent per card */
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
            top: -20px;
            left: -10px;
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
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: var(--ci-orange);
            position: relative;
            z-index: 1;
        }
        .step-card[data-step="4"] .step-icon-wrap {
            background: rgba(255,255,255,0.2);
            border-color: rgba(255,255,255,0.4);
            color: #fff;
        }

        .step-right {
            position: relative;
            z-index: 1;
        }

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

        /* ─────────────── PARTNERS SECTION ─────────────── */
        .he-partners {
            background: #f7f5f4;
            padding: 100px 0;
        }

        .he-partners .he-section-title { color: var(--ci-purple); }
        .he-partners .he-section-kicker { color: var(--ci-orange); }
        .he-partners .he-section-sub { color: var(--text-light); }

        .partners-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .college-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .college-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(0,0,0,0.12);
        }

        .college-card-image {
            height: 180px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: transparent;
        }

        .college-partner-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(6px);
            border-radius: 999px;
            padding: 5px 12px;
            font-size: 11px;
            font-weight: 700;
            color: var(--ci-purple);
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .partner-dot {
            width: 7px; height: 7px;
            background: var(--ci-orange);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.3); }
        }

        .campus-photo {
            position: absolute;
            inset: 0;
            width: 100%; height: 100%;
            object-fit: cover;
            mix-blend-mode: normal;
            opacity: 1;
            z-index: 0;
            pointer-events: none;
        }
        .college-logo-wrap {
            position: absolute;
            bottom: 12px;
            left: 16px;
            width: 52px; height: 52px;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 4px 16px rgba(0,0,0,0.22);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 4px;
            z-index: 2;
        }
        .college-logo-wrap img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .college-card-body {
            padding: 20px 20px 22px;
        }

        .college-name {
            font-size: 16px;
            font-weight: 800;
            color: var(--ci-purple);
            margin-bottom: 4px;
        }

        .college-location {
            font-size: 12px;
            color: var(--text-light);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 12px;
        }
        .college-location i { color: var(--ci-orange); font-size: 10px; }

        .college-desc {
            font-size: 13px;
            color: var(--text-light);
            line-height: 1.65;
        }

        /* ─────────────── BOTTOM CTA ─────────────── */
        .he-bottom-cta {
            background: linear-gradient(135deg, #2f1236 0%, #3D1F3D 100%);
            padding: 90px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .he-bottom-cta::before {
            content: '';
            position: absolute;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(242,101,34,0.2) 0%, transparent 65%);
            top: 50%; left: 50%;
            transform: translate(-50%,-50%);
            pointer-events: none;
        }
        .he-bottom-cta-inner { position: relative; z-index: 1; }
        .he-bottom-cta h2 {
            font-size: clamp(28px, 3.5vw, 46px);
            font-weight: 900;
            color: #fff;
            margin-bottom: 14px;
        }
        .he-bottom-cta h2 span { color: var(--ci-orange); }
        .he-bottom-cta p {
            font-size: 16px;
            color: rgba(255,255,255,0.65);
            margin-bottom: 36px;
            max-width: 480px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.7;
        }
        .he-bottom-cta .he-cta-primary { font-size: 15px; padding: 18px 34px; }

        /* ─────────────── FIND YOUR STARTING POINT ─────────────── */
        .he-pathways {
            background: #fff;
            padding: 100px 0;
        }
        .he-pathways .he-section-header { margin-bottom: 56px; }

        .pathway-flow {
            max-width: 780px;
            margin: 0 auto 48px;
            display: flex;
            flex-direction: column;
        }

        .pathway-item {
            display: grid;
            grid-template-columns: 56px 1fr;
            gap: 28px;
            position: relative;
        }

        .pathway-timeline {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 4px;
        }

        .pathway-num {
            width: 44px; height: 44px;
            background: var(--ci-orange);
            color: #fff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 900;
            flex-shrink: 0;
            position: relative;
            z-index: 1;
        }

        .pathway-connector {
            width: 2px;
            flex: 1;
            background: linear-gradient(to bottom, var(--ci-orange), rgba(242,101,34,0.15));
            margin: 8px 0;
            min-height: 32px;
        }

        .pathway-card {
            background: #f7f5f4;
            border: 1px solid rgba(0,0,0,0.06);
            border-radius: 20px;
            padding: 28px 32px;
            margin-bottom: 12px;
            transition: box-shadow 0.3s, transform 0.3s;
        }
        .pathway-card:hover {
            box-shadow: 0 8px 32px rgba(0,0,0,0.08);
            transform: translateX(4px);
        }
        .pathway-item--last .pathway-card { margin-bottom: 0; }

        .pathway-entry-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            font-weight: 700;
            color: var(--ci-orange);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 10px;
        }
        .pathway-entry-tag i { font-size: 12px; }

        .pathway-name {
            font-size: 20px;
            font-weight: 800;
            color: var(--ci-purple);
            margin-bottom: 10px;
        }

        .pathway-desc {
            font-size: 14px;
            line-height: 1.75;
            color: var(--text-light);
        }

        /* Bottom CTA card */
        .pathway-cta-card {
            max-width: 780px;
            margin: 0 auto;
            background: linear-gradient(135deg, #2f1236 0%, #3D1F3D 100%);
            border-radius: 24px;
            padding: 32px 40px;
            display: flex;
            align-items: center;
            gap: 28px;
        }
        .pathway-cta-icon {
            width: 56px; height: 56px;
            background: rgba(242,101,34,0.2);
            border: 1px solid rgba(242,101,34,0.4);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: var(--ci-orange);
            flex-shrink: 0;
        }
        .pathway-cta-text { flex: 1; }
        .pathway-cta-text h4 {
            font-size: 18px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 4px;
        }
        .pathway-cta-text p {
            font-size: 13px;
            color: rgba(255,255,255,0.6);
            line-height: 1.6;
        }

        /* ─────────────── RESPONSIVE ─────────────── */
        @media (max-width: 1024px) {
            .he-hero { grid-template-columns: 1fr; min-height: auto; }
            .he-hero-left { padding: 80px 40px; }
            .he-hero-right { height: 420px; }
            .partners-grid { grid-template-columns: repeat(2, 1fr); }
            .step-card { grid-template-columns: 1fr; padding: 40px 32px; }
            .step-left { flex-direction: row; align-items: center; }
            .step-number { display: none; }
        }

        @media (max-width: 1024px) {
            .stack-cards-wrap { height: 380px; }
            .step-card { height: 340px; grid-template-columns: 1fr; padding: 32px 28px; gap: 20px; }
            .step-left { flex-direction: row; align-items: center; gap: 14px; }
            .step-number { display: none; }
        }
        @media (max-width: 768px) {
            .nav-links { display: none; }
            .he-hero-left { padding: 60px 24px; }
            .he-hero-right { height: 300px; }
            .partners-grid { grid-template-columns: 1fr; }
            .he-level-ladder { gap: 6px; }
            .level-pill { font-size: 11px; padding: 6px 12px; }
            .he-hero-ctas { flex-direction: column; align-items: flex-start; }
            .pathway-cta-card { flex-direction: column; text-align: center; padding: 28px 24px; }
            .pathway-card { padding: 22px 20px; }

            /* ── Mobile scroll stack: auto-height sticky, section bg fills below ── */
            .scroll-stack-sticky {
                height: auto;
                padding: 44px 0 52px;
                justify-content: flex-start;
            }
            .stack-inner-header { padding: 0 20px 28px; }
            .stack-cards-wrap   { height: 360px; }
            .stack-cards-wrap::before { height: 36px; }
            .stack-cards-wrap::after  { height: 56px; }
            .step-card {
                left: 16px !important; right: 16px !important;
                height: 320px !important;
                padding: 28px 22px;
            }
            .step-title  { font-size: 20px; margin-bottom: 8px; }
            .step-desc   { font-size: 13px; line-height: 1.65; margin-bottom: 12px; }
        }

        /* ─────────────── CONSULTATION MODAL ─────────────── */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(10, 4, 12, 0.75);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            z-index: 9000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        .modal-overlay.open {
            opacity: 1;
            visibility: visible;
        }
        .modal-box {
            background: #fff;
            border-radius: 28px;
            width: 100%;
            max-width: 520px;
            padding: 44px 44px 40px;
            position: relative;
            transform: translateY(24px) scale(0.97);
            transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 32px 80px rgba(0,0,0,0.3);
        }
        .modal-overlay.open .modal-box {
            transform: translateY(0) scale(1);
        }
        .modal-close {
            position: absolute;
            top: 18px; right: 18px;
            width: 36px; height: 36px;
            background: #f0eded;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 14px;
            transition: background 0.2s;
        }
        .modal-close:hover { background: #e0dddd; }
        .modal-header { margin-bottom: 28px; }
        .modal-kicker {
            font-size: 11px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--ci-orange);
            margin-bottom: 8px;
        }
        .modal-title {
            font-size: 24px;
            font-weight: 900;
            color: var(--ci-purple);
            line-height: 1.2;
            margin-bottom: 6px;
        }
        .modal-sub {
            font-size: 13px;
            color: var(--text-light);
            line-height: 1.6;
        }
        .modal-form { display: flex; flex-direction: column; gap: 16px; }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group label {
            font-size: 12px;
            font-weight: 700;
            color: var(--ci-purple);
            letter-spacing: 0.3px;
        }
        .form-group label .req { color: var(--ci-orange); margin-left: 2px; }
        .form-group input,
        .form-group select {
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
        }
        .form-group input::placeholder { color: #bbb; }
        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--ci-orange);
            box-shadow: 0 0 0 3px rgba(242,101,34,0.12);
            background: #fff;
        }
        .form-group select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%23666' d='M1 1l5 5 5-5'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 36px;
        }
        .modal-submit {
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
            margin-top: 4px;
        }
        .modal-submit:hover {
            background: var(--ci-orange-hover);
            transform: translateY(-1px);
        }
        .modal-trust {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 14px;
        }
        .modal-trust span {
            font-size: 11px;
            color: #aaa;
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 600;
        }
        .modal-trust i { color: var(--ci-orange); font-size: 10px; }
        @media (max-width: 560px) {
            .modal-box { padding: 32px 24px 28px; }
            .form-row { grid-template-columns: 1fr; }
            .modal-title { font-size: 20px; }
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
        }
    </style>
</head>
<body>

    <!-- TOP BANNER -->
    <div class="top-banner">
        Free one-to-one consultation for international students — find your perfect Irish university.
        <a href="#consultation">Book Now <i class="fas fa-arrow-right"></i></a>
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
                    <li><a href="/higher-education" class="active">Higher Education</a></li>
                    <li><a href="#" data-coming-soon="true">Erasmus+ Professional Mobility</a></li>
                    <li><a href="#" data-coming-soon="true">Teens Programmes</a></li>
                    <li><a href="#">Corporate Learning</a></li>
                    <li><a href="#consultation"><button onclick="openModal()" class="he-cta-primary" style="border:none;cursor:pointer;">Free Consultation</button></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ─────────────── HERO ─────────────── -->
    <section class="he-hero">
        <div class="he-hero-left">
            <div class="he-kicker">
                <i class="fas fa-graduation-cap"></i> Higher Education in Ireland
            </div>

            <h1 class="he-hero-title">
                Your Higher Education<br>
                Journey, <span>Guided Every</span><br>
                Step of the Way
            </h1>

            <p class="he-hero-sub">
                Complete support for international students looking to study at universities and colleges in Ireland — with free, one-to-one consultancy at every stage.
            </p>

            <!-- Academic ladder -->
            <div class="he-level-ladder">
                <span class="level-pill">English</span>
              
                <span class="level-pill">Pathway</span>
                
                <span class="level-pill">Undergraduate</span>
               
                <span class="level-pill">Postgraduate & Masters</span>
            </div>

            <div class="he-hero-ctas">
                <button onclick="openModal()" class="he-cta-primary" style="border:none;cursor:pointer;">
                    Book Your Free 1-to-1 Consultation <i class="fas fa-arrow-right"></i>
                </button>
                <a href="#partners" class="he-cta-secondary">
                    Explore Colleges <i class="fas fa-chevron-down"></i>
                </a>
            </div>

            <div class="he-trust-row">
                <span><i class="fas fa-check"></i> Free of charge</span>
                <span><i class="fas fa-check"></i> One-to-one session</span>
            </div>
        </div>

        <div class="he-hero-right">
            <img src="{{ asset('images/herodcu.jpg') }}" alt="DCU Campus, Dublin">
            <div class="he-hero-right-overlay"></div>

            <div class="he-stat-strip">
                <div class="he-stat-badge">
                    <span class="num">12+</span>
                    <span class="lbl">Partner Colleges</span>
                </div>
                <div class="he-stat-badge">
                    <span class="num">5K+</span>
                    <span class="lbl">Students Placed</span>
                </div>
            </div>

            <div class="he-consult-card">
                <div class="he-consult-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div>
                    <div class="he-consult-label">Free 1-to-1 Consultation</div>
                    <div class="he-consult-sub">With a specialist advisor</div>
                </div>
            </div>

            <div class="he-photo-caption">
                <i class="fas fa-map-pin"></i> DCU Campus, Dublin
            </div>
        </div>
    </section>

    <!-- ─────────────── FIND YOUR STARTING POINT ─────────────── -->
    <section class="he-pathways" id="pathways">
        <div class="container">
            <div class="he-section-header">
                <div class="he-section-kicker" style="color: var(--ci-orange);">Academic Programmes</div>
                <h2 class="he-section-title" style="color: var(--ci-purple);">Find Your <span style="color: var(--ci-orange);">Starting Point</span></h2>
                <p class="he-section-sub" style="color: var(--text-light);">Your entry point depends on your existing qualifications. CI Ireland assesses your profile and places you in the right programme from day one.</p>
            </div>

            <div class="pathway-flow">

                <!-- 01 English -->
                <div class="pathway-item">
                    <div class="pathway-timeline">
                        <div class="pathway-num">01</div>
                        <div class="pathway-connector"></div>
                    </div>
                    <div class="pathway-card">
                        <div class="pathway-entry-tag"><i class="fas fa-user-circle"></i> Entry point if you need to develop your English</div>
                        <h3 class="pathway-name">English with Academic Purpose</h3>
                        <p class="pathway-desc">An intensive English course for students looking to enter universities in Ireland. The programme develops the linguistic skills required for international academic environments and prepares students for proficiency exams.</p>
                    </div>
                </div>

                <!-- 02 Pathway -->
                <div class="pathway-item">
                    <div class="pathway-timeline">
                        <div class="pathway-num">02</div>
                        <div class="pathway-connector"></div>
                    </div>
                    <div class="pathway-card">
                        <div class="pathway-entry-tag"><i class="fas fa-user-circle"></i> Entry point if you need to build your academic foundation</div>
                        <h3 class="pathway-name">Pathway Programs</h3>
                        <p class="pathway-desc">Preparatory programmes that help students develop the academic skills and knowledge needed before entering an undergraduate degree at an Irish university or college.</p>
                    </div>
                </div>

                <!-- 03 Undergraduate -->
                <div class="pathway-item">
                    <div class="pathway-timeline">
                        <div class="pathway-num">03</div>
                        <div class="pathway-connector"></div>
                    </div>
                    <div class="pathway-card">
                        <div class="pathway-entry-tag"><i class="fas fa-user-circle"></i> Entry point if you are ready for university-level study</div>
                        <h3 class="pathway-name">Undergraduate Programs</h3>
                        <p class="pathway-desc">Full degree programmes offered by internationally recognised universities and colleges across Ireland — from 3 to 4-year bachelor degrees across a wide range of disciplines.</p>
                    </div>
                </div>

                <!-- 04 Postgraduate & Masters -->
                <div class="pathway-item pathway-item--last">
                    <div class="pathway-timeline">
                        <div class="pathway-num">04</div>
                    </div>
                    <div class="pathway-card">
                        <div class="pathway-entry-tag"><i class="fas fa-user-circle"></i> Entry point if you already hold an undergraduate degree</div>
                        <h3 class="pathway-name">Postgraduate & Masters</h3>
                        <p class="pathway-desc">Specialisation programmes (Postgraduate Diploma) and Masters degrees offered by internationally recognised higher education institutions — the natural next step for graduates looking to advance their careers.</p>
                    </div>
                </div>

            </div>

            <!-- Bottom CTA -->
            <div class="pathway-cta-card">
                <div class="pathway-cta-icon"><i class="fas fa-compass"></i></div>
                <div class="pathway-cta-text">
                    <h4>Not sure where you fit?</h4>
                    <p>Our advisors will assess your profile and guide you to the right starting point — at no cost.</p>
                </div>
                <button onclick="openModal()" class="he-cta-primary" style="border:none;cursor:pointer;white-space:nowrap;">
                    Talk to an Advisor <i class="fas fa-arrow-right"></i>
                </button>
            </div>

        </div>
    </section>

    <!-- ─────────────── HOW IT WORKS (SCROLL STACK) ─────────────── -->
    <section class="he-process" id="process">
        <div class="scroll-stack-outer">
            <div class="scroll-stack-sticky">

                <!-- Header stays visible while scrolling through cards -->
                <div class="stack-inner-header">
                    <div class="he-section-kicker">How It Works</div>
                    <h2 class="he-section-title">Your Journey to an <span>Irish College</span></h2>
                    <p class="he-section-sub">A simple, guided process — we handle the complexity so you can focus on your future.</p>
                </div>

                <div class="stack-cards-wrap">

                    <!-- Step 1 -->
                    <div class="step-card" data-step="1">
                        <div class="step-left">
                            <div class="step-number">01</div>
                            <div class="step-badge">Step 01</div>
                            <div class="step-icon-wrap"><i class="fas fa-comments"></i></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">Get in Touch</h3>
                            <p class="step-desc">Complete our simple form and a specialist advisor will reach out to schedule your free one-to-one consultation.</p>
                            <ul class="step-bullets">
                               
                             
                            </ul>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step-card" data-step="2">
                        <div class="step-left">
                            <div class="step-number">02</div>
                            <div class="step-badge">Step 02</div>
                            <div class="step-icon-wrap"><i class="fas fa-search"></i></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">Understanding Your Profile</h3>
                            <p class="step-desc">Our team asks the right questions to understand your background and goals — so we can place you in the perfect programme.</p>
                            <ul class="step-bullets">
                                <li>Academic background review</li>
                                <li>Goals, budget and visa requirements</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="step-card" data-step="3">
                        <div class="step-left">
                            <div class="step-number">03</div>
                            <div class="step-badge">Step 03</div>
                            <div class="step-icon-wrap"><i class="fas fa-file-alt"></i></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">We Handle Everything</h3>
                            <p class="step-desc">We submit the full application on your behalf and keep you updated at every stage — no stress, no confusion.</p>
                            <ul class="step-bullets">
                                <li>Full application submitted by our team</li>
                                <li>Real-time updates throughout</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="step-card" data-step="4">
                        <div class="step-left">
                            <div class="step-number">04</div>
                            <div class="step-badge">Step 04</div>
                            <div class="step-icon-wrap"><i class="fas fa-trophy"></i></div>
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">College Acceptance!</h3>
                            <p class="step-desc">Your Irish journey begins, and our team remains by your side with visa guidance, academic follow-ups, and ongoing support whenever you need it.</p>
                            <ul class="step-bullets">
                                <li>Course enrolment completed</li>
                                <li>Dedicated support whenever you need it</li>
                            </ul>
                        </div>
                    </div>

                </div>

                <!-- Progress dots -->
                <div class="stack-progress">
                    <div class="stack-dot active" data-dot="0"></div>
                    <div class="stack-dot" data-dot="1"></div>
                    <div class="stack-dot" data-dot="2"></div>
                    <div class="stack-dot" data-dot="3"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─────────────── PARTNER INSTITUTIONS ─────────────── -->
    <section class="he-partners" id="partners">
        <div class="container">
            <div class="he-section-header">
                <div class="he-section-kicker">Our Network</div>
                <h2 class="he-section-title" style="color: var(--ci-purple);">Partner <span>Institutions</span></h2>
                <p class="he-section-sub" style="color: var(--text-light);">We work with Ireland's leading universities and colleges to find the perfect fit for every student profile.</p>
            </div>

            <div class="partners-grid">

                <!-- TU Dublin -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #3a1060, #5a2090);">
                        <img class="campus-photo" src="{{ asset('images/campus/tud.jpg') }}" alt="">
                        <div class="college-partner-badge"><span class="partner-dot"></span> Partner</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/Tudublin.jpg') }}" alt="TU Dublin">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">TU Dublin</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> Dublin, Ireland</p>
                        <p class="college-desc">Ireland's first Technological University, offering a wide range of undergraduate and postgraduate programmes across multiple campuses in Dublin.</p>
                    </div>
                </div>

                <!-- DCU -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #0a2a6a, #1a4a9a);">
                        <img class="campus-photo" src="{{ asset('images/campus/dcu.jpg') }}" alt="">
                        <div class="college-partner-badge"><span class="partner-dot"></span> Partner</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/DCU.webp') }}" alt="Dublin City University">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">Dublin City University</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> Dublin, Ireland</p>
                        <p class="college-desc">A young, dynamic university known for innovation, enterprise and research, consistently ranked among Ireland's top universities.</p>
                    </div>
                </div>

                <!-- NCI -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #0a4a3a, #1a6a54);">
                        <img class="campus-photo" src="{{ asset('images/campus/nci.jpg') }}" alt="">
                        <div class="college-partner-badge"><span class="partner-dot"></span> Partner</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/nci.webp') }}" alt="National College of Ireland">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">National College of Ireland</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> Dublin, Ireland</p>
                        <p class="college-desc">Specialising in business and technology programmes, NCI offers a personalised learning environment in the heart of Dublin's IFSC.</p>
                    </div>
                </div>

                <!-- Griffith -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #6a1a0a, #9a2a10);">
                        <img class="campus-photo" src="{{ asset('images/campus/griffith.jpg') }}" alt="">
                        <div class="college-partner-badge"><span class="partner-dot"></span> Partner</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/Griffith.jpg') }}" alt="Griffith College">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">Griffith College</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> Dublin, Ireland</p>
                        <p class="college-desc">One of Ireland's largest independent third-level colleges, offering a broad range of degrees, postgraduate and professional programmes.</p>
                    </div>
                </div>

                <!-- DBS -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #0a1a5a, #1a2a8a);">
                        <img class="campus-photo" src="{{ asset('images/campus/dbs.jpg') }}" alt="">
                        <div class="college-partner-badge"><span class="partner-dot"></span> Partner</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/DBS.png') }}" alt="Dublin Business School">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">Dublin Business School</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> Dublin, Ireland</p>
                        <p class="college-desc">Dublin Business School is an independent third-level college, offering market focused programmes across diverse areas.</p>
                    </div>
                </div>

                <!-- City Colleges -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #3a0a5a, #5a1a7a);">
                        <img class="campus-photo" src="{{ asset('images/campus/citycolleges.jpg') }}" alt="">
                        <div class="college-partner-badge"><span class="partner-dot"></span> Partner</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/citycolleges.png') }}" alt="City Colleges">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">City Colleges</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> Dublin, Ireland</p>
                        <p class="college-desc">Text here about city college.</p>
                    </div>
                </div>

                <!-- Dorset -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #0a3a4a, #1a5a6a);">
                        <img class="campus-photo" src="{{ asset('images/campus/dorset.jpg') }}" alt="">
                        <div class="college-partner-badge"><span class="partner-dot"></span> Partner</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/dorset.png') }}" alt="Dorset College">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">Dorset College</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> Dublin, Ireland</p>
                        <p class="college-desc">A modern college in the heart of Dublin offering programmes in business, computing and hospitality in a vibrant, multicultural setting.</p>
                    </div>
                </div>

                <!-- ICD -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #4a2a0a, #6a4010);">
                        <img class="campus-photo" src="{{ asset('images/campus/icd.jpg') }}" alt="">
                        <div class="college-partner-badge"><span class="partner-dot"></span> Partner</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/ICD.png') }}" alt="ICD">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">ICD</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> Dublin, Ireland</p>
                        <p class="college-desc">Texto sobre a ICD</p>
                    </div>
                </div>

                <!-- Independent College -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #1a3a0a, #2a5a15);">
                        <img class="campus-photo" src="{{ asset('images/campus/independent.jpg') }}" alt="">
                        <div class="college-partner-badge"><span class="partner-dot"></span> Partner</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/independent.png') }}" alt="Independent College">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">Independent College</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> Dublin, Ireland</p>
                        <p class="college-desc">Offering a range of accounting, marketing and bussiness programmes in a supportive and student-centred learning environment.</p>
                    </div>
                </div>

                <!-- Holmes -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #3a0a1a, #5a1a30);">
                         <img class="campus-photo" src="{{ asset('images/campus/holmes.jpg') }}" alt="">
                        <div class="college-partner-badge"><span class="partner-dot"></span> Partner</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/holmes.png') }}" alt="Holmes College">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">Holmes Institute Dublin</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> Dublin, Ireland</p>
                        <p class="college-desc">An international college offering higher education programmes in business and computing in a diverse learning community.</p>
                    </div>
                </div>

                <!-- Galway Business School -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #0a1a4a, #1a2a6a);">
                         <img class="campus-photo" src="{{ asset('images/campus/galway.jpg') }}" alt="">
                        <div class="college-partner-badge"><span class="partner-dot"></span> Partner</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/galwaybss.jpg') }}" alt="Galway Business School">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">Galway Business School</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> Galway, Ireland</p>
                        <p class="college-desc">Offering business and management programmes in the vibrant city of Galway on Ireland's stunning west coast.</p>
                    </div>
                </div>

                <!-- IBAT -->
                <div class="college-card">
                    <div class="college-card-image" style="background: linear-gradient(135deg, #2a0a4a, #420a6a);">
                         <img class="campus-photo" src="{{ asset('images/campus/ibat.jpg') }}" alt="">
                        <div class="college-partner-badge"><span class="partner-dot"></span> Partner</div>
                        <div class="college-logo-wrap">
                            <img src="{{ asset('images/partners/ibat.png') }}" alt="IBAT College Dublin">
                        </div>
                    </div>
                    <div class="college-card-body">
                        <h4 class="college-name">IBAT College Dublin</h4>
                        <p class="college-location"><i class="fas fa-map-pin"></i> Dublin, Ireland</p>
                        <p class="college-desc">A Dublin-based college focused on business, accounting and technology programmes for domestic and international students.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ─────────────── BOTTOM CTA ─────────────── -->
    <section class="he-bottom-cta" id="consultation">
        <div class="container">
            <div class="he-bottom-cta-inner">
                <h2>Ready to Start Your <span>Irish Adventure?</span></h2>
                <p>Book your one-to-one consultation with one of our specialist advisors. Honest guidance.</p>
                <button onclick="openModal()" class="he-cta-primary" style="border:none;cursor:pointer;">
                    Book Your Consultation <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- ─── Consultation Modal ─── -->
    <div class="modal-overlay" id="consultModal">
        <div class="modal-box">
            <button class="modal-close" onclick="closeModal()"><i class="fas fa-times"></i></button>
            <div class="modal-header">
                <div class="modal-kicker">Free Consultation</div>
                <h2 class="modal-title">Start Your Academic Planning</h2>
                <p class="modal-sub">Fill in your details and one of our advisors will get in touch.</p>
            </div>
            <form class="modal-form" onsubmit="return false;">
                <div class="form-row">
                    <div class="form-group">
                        <label>Full Name <span class="req">*</span></label>
                        <input type="text" placeholder="Your full name" required>
                    </div>
                    <div class="form-group">
                        <label>Email <span class="req">*</span></label>
                        <input type="email" placeholder="your@email.com" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Phone / WhatsApp <span class="req">*</span></label>
                        <input type="tel" placeholder="+353 83 123 4567" required>
                    </div>
                    <div class="form-group">
                        <label>Visa Type <span class="req">*</span></label>
                        <select required>
                            <option value="" disabled selected>Select visa type</option>
                            <option>EU Passport</option>
                            <option>Stamp 2</option>
                            <option>Stamp 4</option>
                            <option>Stamp 1/1G</option>
                            <option>Other/Not sure</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="modal-submit">
                    Request Free Consultation <i class="fas fa-arrow-right"></i>
                </button>
            </form>
            <div class="modal-trust">
                <span><i class="fas fa-check"></i> Free</span>
                <span><i class="fas fa-check"></i> One-to-one</span>
               
            </div>
        </div>
    </div>

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
                        <a class="footer-social-link" href="https://www.linkedin.com/company/ci-irlanda/?originalSubdomain=ie" target="_blank" rel="noopener" title="https://www.linkedin.com/company/ci-irlanda/?originalSubdomain=ie">
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
        // ─── ReactBits Scroll Stack ───
        function initScrollStack() {
            const outer  = document.querySelector('.scroll-stack-outer');
            const cards  = Array.from(document.querySelectorAll('.step-card'));
            const dots   = Array.from(document.querySelectorAll('.stack-dot'));
            const n    = cards.length;
            const PEEK = 38;

            let rafId = null;

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

                // Center cards inside the wrap (works at any screen height)
                const wrapH  = outer.querySelector('.stack-cards-wrap').offsetHeight;
                const base   = Math.round(Math.max(0, (wrapH - CARD_H) / 2));
                const exitD  = base + CARD_H + 30;          // distance to clear top
                const enterD = wrapH - base - PEEK;         // distance to peek from bottom

                cards.forEach((card, i) => {
                    let ty, scale, opacity, z;

                    if (i === idx) {
                        // Active: centered (base), then flies up as next arrives
                        ty      = base - prog * exitD;
                        scale   = 1 - prog * 0.02;
                        opacity = prog > 0.6 ? 1 - (prog - 0.6) / 0.4 : 1;
                        z       = 20;
                    } else if (i === idx + 1) {
                        // Next: peeks from bottom (base + enterD), rises to center (base)
                        ty      = base + (1 - prog) * enterD;
                        scale   = 0.97 + prog * 0.03;
                        opacity = 0.55 + prog * 0.45;
                        z       = 10;
                    } else if (i > idx + 1) {
                        // Future: hidden below
                        ty = wrapH; scale = 0.95; opacity = 0; z = 5;
                    } else {
                        // Past: gone above
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

        // ─── Modal ───
        function openModal() {
            document.getElementById('consultModal').classList.add('open');
            document.body.style.overflow = 'hidden';
        }
        function closeModal() {
            document.getElementById('consultModal').classList.remove('open');
            document.body.style.overflow = '';
        }
        document.getElementById('consultModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });
        document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });

        document.addEventListener('DOMContentLoaded', initScrollStack);
    </script>

</body>
</html>
