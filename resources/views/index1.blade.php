@extends('layouts.master')
@section('content')
    <!-- slide new list songs-->
    @include('admin.pages.song.hot-list')

    <!-- new playlists -->
    @include('admin.pages.playlist.list')

    <!-- popular playlist -->
    @include('admin.pages.popular.list')

    <!-- new song & popular song -->
    @include('admin.pages.song.new-list')
    <!-- singers -->
    @include('admin.pages.singer.list')
    <!-- footer -->
@endsection
