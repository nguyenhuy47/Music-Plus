<!doctype html>
<html lang="en">
<head>
    @include('layouts.admin.title')
    @include('layouts.admin.link-css')
    @include('layouts.admin.link-script')
</head>
<body>
<!-- header -->
@include('layouts.admin.top-nav')
<!-- body -->
<div class="container-fluid alert-light">
    <div class="container pt-0">

        <!-- slide new list songs-->
    @include('admin.pages.song.hot-list')

    <!-- new playlists -->
    @include('admin.pages.playlist.list')

    <!-- popular playlist -->
    @include('admin.pages.popular.list')

    <!-- new song & popular song -->
        <div style="background-color: white">
            <div class="row mt-5 mb-4">

                <!-- new songs -->
            @include('admin.pages.song.new-list')

            <!-- singers -->
                @include('admin.pages.singer.list')
            </div>
        </div>
        <!-- footer -->
@include('layouts.admin.footer')
</body>
</html>
