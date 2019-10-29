@extends('pages.index')
@section('content')
    <div class="container pt-5">
        <div class="row">
            @include('pages.slide')
            @include('pages.newsong')
        </div>
        <div class="row">
            @include('pages.album')
            @include('pages.topic')
        </div>
        <div class="row">
            @include('pages.mv')
            @include('pages.media')
        </div>
    </div>
@endsection
