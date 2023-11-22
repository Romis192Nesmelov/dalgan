@extends('layouts.main')

@section('content')
    <div class="section">
        <div class="container">
            <x-row>
                <h1 class="w-100 text-center mb-2 mb-lg-5">{{ $content->head }}</h1>
{{--                <div class="col-lg-2 col-md-4 col-sm-12 d-flex align-items-start justify-content-center">--}}
{{--                    <img class="col-6 col-lg-12 col-md-12 mb-4" src="{{ asset('images/3d_logo.jpg') }}" />--}}
{{--                </div>--}}
{{--                <div class="col-lg-9 col-md-8 col-sm-12 ps-lg-5 d-flex flex-column">--}}
                    {!! $content->text !!}
{{--                </div>--}}
            </x-row>
        </div>
    </div>
    <hr>
    <div data-scroll-destination="contacts" class="section pt-3 pb-0">
        <div class="container">
            <h1 class="w-100 text-center mb-3">{{ end($mainMenu)['name'] }}</h1>
            <h3 class="w-100 text-center text-black-50 mb-3">@include('blocks.contacts_block')</h3>
        </div>
    </div>
    @if ($scroll)
        <script>window.scrollAnchor = "{{ $scroll }}";</script>
    @endif
@endsection
