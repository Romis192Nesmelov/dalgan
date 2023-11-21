<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-language" content="{{ app()->getLocale() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">

    <title>Далган. {{ $settings->title }}</title>
    @foreach($metas as $meta => $params)
        @if ($settings[$meta])
            <meta {{ $params['name'] ? 'name='.$params['name'] : 'property='.$params['property'] }} content="{{ $settings[$meta] }}">
        @endif
    @endforeach

    @if (isset($description) && $description)
        <meta name="description" content="{{ $description }}">
    @endif

    @include('blocks.favicon_block')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prosto+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icomoon/styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loader.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ asset('js/scrollreveal.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/loader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</head>

<body>

<div data-scroll-destination="home">
    @include('blocks.top_line_block', ['href' => request()->path() != '/'])
    <div id="top-image"></div>
</div>

@yield('content')

<footer class="w-100 pt-3 pb-0 section">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <img src="{{ asset('images/logo_white.svg') }}" />
        @include('blocks.main_nav_block', [
            'id' => 'footer-nav',
            'href' => request()->path() != '/'
        ])
    </div>
    <div class="w-100 bg-dark mt-3 pt-3 pb-2 text-center">
        <p class="m-0 text-white">Copyright ©{{ date('Y') }} Dalgan</p>
    </div>
</footer>

<div id="on-top-button" data-scroll="home"><i class="icon-arrow-up12"></i></div>

@if ($scroll)
    <script>window.toScroll = "{{ $scroll }}";</script>
@endif

</body>
</html>
