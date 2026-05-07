{{--
    Shared section wrappers for new pages: top banner, mobile drawer footer.
    Pages set $pageActive = '<route-key>' for nav highlighting.
--}}
@section('banner')
    <div class="top-banner">
        {{ __('Free profile assessment with our Dublin team. Plan study and career with clarity.') }}
        <a href="{{ $lr('start-your-plan') }}">{{ __('Start now') }} <i class="fas fa-arrow-right"></i></a>
    </div>
@endsection

@section('nav')
    @include('partials.main-nav', ['active' => $pageActive ?? null])
@endsection

@section('mobile-nav-links')
    @include('partials.mobile-nav', ['active' => $pageActive ?? null])
@endsection

@section('mobile-nav-footer')
    <div class="mobile-drawer-footer">
        @include('partials.lang-toggle')
        <a class="mobile-cta-btn" href="{{ $lr('start-your-plan') }}">{{ __('Start Your Plan') }}</a>
    </div>
@endsection
