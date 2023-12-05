@extends('layouts.main')

@section('content')
    <div class="section">
        <div class="container">
            {!! $content->text !!}
        </div>
    </div>
@endsection
