<div id="top-line" class="w-100 d-flex align-items-center justify-content-between">
    <a class="" href="{{ route('home') }}">
        <div class="logo-block d-lg-flex align-items-center justify-content-between">
            @include('blocks.logo_block')
            <img class="logo-text" src="{{ asset('images/logo_text.svg') }}" />
        </div>
    </a>
    @include('blocks.main_nav_block', [
        'id' => 'main-nav',
        'href' => $href
    ])
    <a href="#" class="d-none d-sm-block">
        @include('blocks.button_block',[
            'primary' => false,
            'icon' => 'icon-envelop5',
            'buttonText' => trans('content.feedback'),
            'dataTarget' => 'feedback-modal'
        ])
    </a>
</div>
