@extends('layouts.app')

@php
    // Standalone confirmation page — no nav item should be highlighted.
    $pageActive = null;

    $locale = app()->getLocale();
    if (! in_array($locale, ['pt', 'es', 'en'], true)) {
        $locale = 'pt';
    }

    // Self-contained copy table. This page is shown to PT/ES/EN signers, so the
    // body text is kept here (not in the lang JSON files, which only cover the
    // shared site chrome) to keep all three versions strong and in one place.
    $copy = [
        'pt' => [
            'title'    => 'Agreement assinado com sucesso — CI Ireland',
            'headline' => 'Agreement assinado com sucesso!',
            'lead1'    => 'Recebemos a sua assinatura do Higher Education Agreement. Uma cópia assinada foi enviada para o seu e-mail. Em breve, a nossa equipe entrará em contato com os próximos passos da sua jornada de estudos na Irlanda.',
            'lead2'    => 'Estamos muito felizes em ter você com a gente! 🇮🇪',
            'spam'     => 'Não encontrou a cópia? Verifique a sua caixa de spam ou lixo eletrônico.',
            'ctaHome'  => 'Voltar para a página inicial',
            'ctaWhats' => 'Falar com a nossa equipe',
            'refTitle' => 'Indique e ganhe €30',
            'refText'  => 'Conhece alguém que também sonha em estudar na Irlanda? Pelo CI Connect, você ganha <strong>€30</strong> para cada pessoa indicada por você que fechar a matrícula.',
            'refCta'   => 'Participar do CI Connect',
        ],
        'es' => [
            'title'    => 'Agreement firmado con éxito — CI Ireland',
            'headline' => '¡Agreement firmado con éxito!',
            'lead1'    => 'Recibimos tu firma del Higher Education Agreement. Enviamos una copia firmada a tu correo electrónico. Muy pronto, nuestro equipo se pondrá en contacto contigo para los próximos pasos de tu camino de estudios en Irlanda.',
            'lead2'    => '¡Estamos muy felices de tenerte con nosotros! 🇮🇪',
            'spam'     => '¿No encuentras la copia? Revisa tu carpeta de spam o correo no deseado.',
            'ctaHome'  => 'Volver a la página de inicio',
            'ctaWhats' => 'Hablar con nuestro equipo',
            'refTitle' => 'Recomienda y gana €30',
            'refText'  => '¿Conoces a alguien que también sueña con estudiar en Irlanda? Con CI Connect, ganas <strong>€30</strong> por cada persona que recomiendes y que concrete su matrícula.',
            'refCta'   => 'Unirme a CI Connect',
        ],
        'en' => [
            'title'    => 'Agreement signed successfully — CI Ireland',
            'headline' => 'Agreement signed successfully!',
            'lead1'    => "We've received your signature on the Higher Education Agreement. A signed copy has been sent to your email. Our team will be in touch shortly with the next steps of your study journey in Ireland.",
            'lead2'    => "We're thrilled to have you with us! 🇮🇪",
            'spam'     => "Can't find the copy? Check your spam or junk folder.",
            'ctaHome'  => 'Back to homepage',
            'ctaWhats' => 'Talk to our team',
            'refTitle' => 'Refer a friend and earn €30',
            'refText'  => 'Know someone who also dreams of studying in Ireland? With CI Connect, you earn <strong>€30</strong> for every person you refer who enrolls.',
            'refCta'   => 'Join CI Connect',
        ],
    ];

    $t = $copy[$locale];

    $langLabels = ['pt' => 'PT', 'es' => 'ES', 'en' => 'EN'];
@endphp

@section('title', $t['title'])

@section('head')
    {{-- Transactional page: keep it out of search engines. --}}
    <meta name="robots" content="noindex, nofollow">
@endsection

{{--
    Custom chrome: the standard nav + shared footer, but intentionally NO
    marketing top banner ("free profile assessment…") — it doesn't belong on a
    post-signature confirmation. We also hide the header's EN/PT toggle (see
    styles) in favour of the three-language switcher inside the card.
--}}
@section('nav')
    @include('partials.main-nav', ['active' => null])
@endsection

@section('mobile-nav-links')
    @include('partials.mobile-nav', ['active' => null])
@endsection

@section('mobile-nav-footer')
    <div class="mobile-drawer-footer">
        <a class="mobile-cta-btn" href="{{ $lr('home') }}">{{ $t['ctaHome'] }}</a>
    </div>
@endsection

@section('styles')
    /* Hide the standard EN/PT header toggle; this page has its own 3-language switcher. */
    .main-nav .lang-toggle { display: none !important; }

    .signed-section {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: calc(100vh - 220px);
        padding: 64px 0;
        background:
            radial-gradient(900px 480px at 50% -10%, rgba(242, 101, 34, 0.08), transparent 70%),
            #ffffff;
    }

    .signed-langs {
        display: inline-flex;
        gap: 4px;
        margin: 0 auto 28px;
        padding: 4px;
        border-radius: var(--radius-pill);
        background: #f4efea;
    }
    .signed-langs a {
        padding: 7px 16px;
        border-radius: var(--radius-pill);
        font-size: 0.78rem;
        font-weight: 800;
        letter-spacing: 0.04em;
        color: #7a746e;
        text-decoration: none;
        transition: background 0.2s, color 0.2s;
    }
    .signed-langs a:hover { color: #1c1c1c; }
    .signed-langs a.active { background: var(--ci-orange); color: #fff; }

    .signed-card {
        max-width: 620px;
        width: 100%;
        margin: 0 auto;
        text-align: center;
        background: #ffffff;
        border: 1px solid #f0ece8;
        border-radius: 24px;
        padding: 48px 40px 56px;
        box-shadow: 0 24px 60px rgba(40, 22, 10, 0.08);
    }

    .signed-badge {
        width: 96px;
        height: 96px;
        margin: 0 auto 28px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(242, 101, 34, 0.12);
        color: var(--ci-orange);
        font-size: 46px;
        animation: signed-pop 0.5s ease-out both;
    }

    @keyframes signed-pop {
        0%   { transform: scale(0.6); opacity: 0; }
        60%  { transform: scale(1.08); opacity: 1; }
        100% { transform: scale(1); }
    }

    .signed-title {
        color: #1c1c1c;
        font-size: clamp(1.8rem, 4.5vw, 2.6rem);
        font-weight: 800;
        line-height: 1.15;
        margin: 0 0 18px;
    }

    .signed-lead {
        color: #54504c;
        font-size: 1.05rem;
        font-weight: 500;
        line-height: 1.65;
        margin: 0 auto 16px;
        max-width: 52ch;
    }

    .signed-note {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 8px;
        padding: 10px 16px;
        border-radius: var(--radius-pill);
        background: #faf6f2;
        color: #7a746e;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .signed-note i { color: var(--ci-orange); }

    .signed-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        justify-content: center;
        margin-top: 36px;
    }

    .signed-actions .btn-outline {
        color: var(--ci-orange);
        border: 1px solid rgba(242, 101, 34, 0.4);
    }
    .signed-actions .btn-outline:hover {
        background: rgba(242, 101, 34, 0.08);
        border-color: var(--ci-orange);
    }

    .signed-referral {
        max-width: 620px;
        width: 100%;
        margin: 22px auto 0;
        display: flex;
        align-items: center;
        gap: 20px;
        text-align: left;
        background: linear-gradient(135deg, rgba(242, 101, 34, 0.10), rgba(242, 101, 34, 0.04));
        border: 1px solid rgba(242, 101, 34, 0.22);
        border-radius: 20px;
        padding: 24px 28px;
    }

    .signed-referral-icon {
        flex: 0 0 auto;
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--ci-orange);
        color: #fff;
        font-size: 24px;
    }

    .signed-referral-body { flex: 1 1 auto; min-width: 0; }

    .signed-referral-kicker {
        display: inline-block;
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--ci-orange);
        margin-bottom: 4px;
    }

    .signed-referral-title {
        color: #1c1c1c;
        font-size: 1.2rem;
        font-weight: 800;
        line-height: 1.2;
        margin: 0 0 6px;
    }

    .signed-referral-text {
        color: #54504c;
        font-size: 0.92rem;
        font-weight: 500;
        line-height: 1.5;
        margin: 0;
    }

    .signed-referral-cta { flex: 0 0 auto; }

    @media (max-width: 640px) {
        .signed-referral {
            flex-direction: column;
            align-items: flex-start;
        }
        .signed-referral-cta { width: 100%; justify-content: center; }
    }

    @media (max-width: 520px) {
        .signed-card { padding: 36px 22px 40px; border-radius: 20px; }
        .signed-actions .btn-primary,
        .signed-actions .btn-outline { width: 100%; justify-content: center; }
    }
@endsection

@section('content')
    <section class="signed-section">
        <div class="container">
            <div class="signed-card">
                <div class="signed-langs" role="group" aria-label="Language">
                    @foreach ($langLabels as $code => $label)
                        <a href="{{ route('agreement-signed.' . $code) }}"
                           hreflang="{{ $code === 'pt' ? 'pt-BR' : $code }}"
                           @class(['active' => $code === $locale])
                           @if ($code === $locale) aria-current="true" @endif>{{ $label }}</a>
                    @endforeach
                </div>

                <div class="signed-badge" aria-hidden="true">
                    <i class="fas fa-circle-check"></i>
                </div>

                <h1 class="signed-title">{{ $t['headline'] }}</h1>

                <p class="signed-lead">{{ $t['lead1'] }}</p>
                <p class="signed-lead">{{ $t['lead2'] }}</p>

                <span class="signed-note">
                    <i class="fas fa-envelope" aria-hidden="true"></i>
                    {{ $t['spam'] }}
                </span>

                <div class="signed-actions">
                    <a href="{{ $lr('home') }}" class="btn-primary">{{ $t['ctaHome'] }}</a>
                    <a href="https://wa.me/353868179430" target="_blank" rel="noopener" class="btn-outline">
                        <i class="fab fa-whatsapp" aria-hidden="true"></i> {{ $t['ctaWhats'] }}
                    </a>
                </div>
            </div>

            {{-- CI Connect referral program: student earns €30 for each referral that enrolls. --}}
            <div class="signed-referral">
                <div class="signed-referral-icon" aria-hidden="true">
                    <i class="fas fa-gift"></i>
                </div>
                <div class="signed-referral-body">
                    <span class="signed-referral-kicker">CI Connect</span>
                    <h2 class="signed-referral-title">{{ $t['refTitle'] }}</h2>
                    <p class="signed-referral-text">{!! $t['refText'] !!}</p>
                </div>
                <a href="https://crm.ciireland.ie/f/ci-connect" target="_blank" rel="noopener" class="btn-primary signed-referral-cta">
                    {{ $t['refCta'] }} <i class="fas fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
