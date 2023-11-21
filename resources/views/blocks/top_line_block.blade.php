<div id="top-line" class="w-100 d-flex align-items-center justify-content-center">
    <a class="" href="{{ route('home') }}">
        <div class="logo-block me-3">
            <img class="w-100" src="{{ asset('images/logo.svg') }}" />
        </div>
    </a>
    @include('blocks.main_nav_block', [
        'id' => 'main-nav',
        'href' => $href
    ])
</div>
