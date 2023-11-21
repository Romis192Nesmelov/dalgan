@extends('layouts.main')

@section('content')
    <div class="section">
        <div class="container">
            <h1 class="w-100 text-center mb-2 mb-lg-5">{{ $content->head }}</h1>
            {!! $content->long_text !!}
        </div>
    </div>
    <script>const scrollCheck = false;</script>
@endsection
