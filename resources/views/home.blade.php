@extends('layouts.main')

@section('content')
    <div data-scroll-destination="{{ $mainMenu[1]['slug'] }}" class="section">
        <div class="container">
            <x-row>
                <h1 class="w-100 text-center mb-2 mb-lg-5">{{ $content[0]->head }}</h1>
                <div class="col-lg-2 col-md-4 col-sm-12 d-flex align-items-start justify-content-center">
                    <img class="col-6 col-lg-12 col-md-12 mb-4" src="{{ asset('images/3d_logo.jpg') }}" />
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 ps-lg-5 d-flex flex-column">
                    {!! $content[0]->short_text !!}
                    <div class="w-100 d-flex justify-content-lg-end justify-content-center">
                        <a href="{{ route('content',['slug' => $content[0]->slug]) }}">
                            @include('blocks.button_block',[
                                'primary' => false,
                                'icon' => 'icon-clipboard3',
                                'buttonText' => trans('content.details')
                            ])
                        </a>
                    </div>
                </div>
            </x-row>
        </div>
    </div>
    <hr>
    <div data-scroll-destination="{{ $mainMenu[2]['slug'] }}" class="section">
        <div class="container">
            <x-row>
                <div class="col-lg-8 col-md-8 col-sm-12 pe-lg-5 d-flex flex-column">
                    <h1 class="w-100 text-center mb-2 mb-lg-5">{{ $content[1]->head }}</h1>
                    {!! $content[1]->short_text !!}
                    @if ($content[1]->long_text)
                        <div class="w-100 d-flex justify-content-lg-end justify-content-center">
                            <a href="{{ route('content',['slug' => $content[1]->slug]) }}">
                                @include('blocks.button_block',[
                                    'primary' => false,
                                    'icon' => 'icon-clipboard3',
                                    'buttonText' => trans('content.details')
                                ])
                            </a>
                        </div>
                    @endif
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-start justify-content-center">
                    <img class="w-100" src="{{ asset('images/landscape.jpg') }}" />
                </div>
            </x-row>
        </div>
    </div>
    <hr>
    <div data-scroll-destination="contacts" class="section pt-3 pb-0">
        <div class="container">
            <h1 class="w-100 text-center mb-3">{{ $mainMenu[3]['name'] }}</h1>
            <h3 class="w-100 text-center text-black-50 mb-3">@include('blocks.contacts_block')</h3>
        </div>
    </div>
    <script>const scrollCheck = true;</script>
@endsection
