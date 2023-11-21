<div id="top-line" class="w-100 d-flex align-items-center justify-content-center">
    <a class="" href="{{ route('home') }}">
        <div class="logo-block d-lg-flex align-items-center justify-content-between me-5">
            @include('blocks.logo_block')
            <img class="logo-text" src="{{ asset('images/logo_text.svg') }}" />
        </div>
    </a>
    @include('blocks.main_nav_block', [
        'id' => 'main-nav',
        'href' => $href
    ])
</div>
