<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('layouts.link-css')
    @include('layouts.link-js')
    <script>
        jQuery(document).ready(function ($) {
            $("#list_singer").tokenInput("{{asset('api/singers?q=singer')}}", {
                hintText: 'Nhập tên ca sỹ',
                noResultsText: "Không tìm thấy ca sỹ. " + "<a href='#' data-toggle=\"modal\" data-target=\"#addSinger\">\n" +
                    "    Thêm mới\n" +
                    "</a>",
                searchingText: 'Đang tìm kiếm...',
                theme: 'facebook',
                preventDuplicates: true,
                prePopulate: '',
            });

            $("#list_artist").tokenInput("{{asset('api/artists?q=artist')}}", {
                hintText: 'Nhập tên nhạc sỹ',
                noResultsText: "Không tìm thấy nhạc sỹ. " + "<a href='#' data-toggle=\"modal\" data-target=\"#addArtist\">\n" +
                    "    Thêm mới\n" +
                    "</a>",
                searchingText: 'Đang tìm kiếm...',
                theme: 'facebook',
                preventDuplicates: true,
                prePopulate: '',
            })

            $(".btn-search-filter").click(function () {
                $(".search-list").each(function () {
                    $(this).removeClass("active");
                });
                alert($(this).attr('value'));
                $('.' + $(this).attr('value')).addClass("active");
            });
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    console.log(e);
                    $('#blaha').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                console.log('khong co file');
            }
        }

        $("#list_artist").tokenInput("{{asset('api/artists?q=artist')}}", {
            hintText: 'Nhập tên nhạc sỹ',
            noResultsText: "Không tìm thấy nhạc sỹ. " + "<a href='#' data-toggle=\"modal\" data-target=\"#addArtist\">\n" +
                "    Thêm mới\n" +
                "</a>",
            searchingText: 'Đang tìm kiếm...',
            theme: 'facebook',
            preventDuplicates: true,
            prePopulate: '',
        });

        $("#list_song").tokenInput("{{asset('api/songs?q=songs')}}", {
            hintText: 'Nhập tên bài hát',
            noResultsText: "Không tìm thấy bài hát.",
            searchingText: 'Đang tìm kiếm...',
            theme: 'facebook',
            preventDuplicates: true,
            prePopulate: '',
        });

    </script>
</head>
<body>
<div id="app">
    @include('layouts.top-nav')
    <main class="py-4">
        @yield('content')
    </main>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                console.log(e);
                $('#blaha').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            console.log('khong co file');
        }
    }

    $("#imgInp").change(function () {
        readURL(this);
    });
</script>

@yield('script')
</body>
</html>
