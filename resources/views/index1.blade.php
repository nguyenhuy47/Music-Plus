@extends('layouts.master')
@section('content')
    <!-- slide new list songs-->
    @include('admin.pages.song.listOfHotSong')

    <!-- new playlists -->
    @include('admin.pages.playlist.list')

    <!-- popular playlist -->
    @include('admin.pages.popular.list')

    <!-- new song & popular song -->
    @include('admin.pages.song.listOfNewSong')
    <!-- singers -->
    @include('admin.pages.singer.listOfNewSinger')
    <!-- footer -->
@endsection
