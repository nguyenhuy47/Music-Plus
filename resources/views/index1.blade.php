@extends('layouts.master')
@section('content')
    <!-- slide new list songs-->
    @include('admin.pages.song.listOfHotSong')

    <!-- new playlists -->
    @include('admin.pages.playlist.listOfNewPlaylist')

    <!-- popular playlist -->
    @include('admin.pages.playlist.listOfLikesPlaylist')
    <!-- new song & popular song -->
    <div style="background-color: white">
        <div class="row mt-5 mb-4">
            @include('admin.pages.song.listOfNewSong')
            @include('admin.pages.song.listOfLikesSong')

        </div>
    </div>
    <div>
        <hr>
    </div>

    <!-- singers -->
    @include('admin.pages.singer.listOfNewSinger')
    <!-- footer -->
@endsection
