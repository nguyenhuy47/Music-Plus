<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
@include('layouts.link-css')
    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">--}}
{{--    <link rel="stylesheet" href="{{asset('css/style_menu.css')}}" type="text/css">--}}
{{--    <link rel="stylesheet" href="{{asset('css/slider.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('css/token-input.css')}} ">--}}
{{--    <link rel="stylesheet" href="{{asset('css/token-input-facebook.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('css/token-input.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('css/token-input-facebook.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('css/app.css')}}">--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}



@include('layouts.jQuery-js')
{{--    ==================================================input suggest============================================--}}
{{--    <script>--}}
{{--        jQuery(document).ready(function ($) {--}}
{{--            $("#list_singer").tokenInput("{{asset('api/singers?q=singer')}}", {--}}
{{--                hintText: 'Nhập tên ca sỹ',--}}
{{--                noResultsText: "Không tìm thấy ca sỹ. " + "<a href='#' data-toggle=\"modal\" data-target=\"#addSinger\">\n" +--}}
{{--                    "    Thêm mới\n" +--}}
{{--                    "</a>",--}}
{{--                searchingText: 'Đang tìm kiếm...',--}}
{{--                theme: 'facebook',--}}
{{--                preventDuplicates: true,--}}
{{--                prePopulate: '',--}}
{{--            });--}}

{{--            $("#list_artist").tokenInput("{{asset('api/artists?q=artist')}}", {--}}
{{--                hintText: 'Nhập tên nhạc sỹ',--}}
{{--                noResultsText: "Không tìm thấy nhạc sỹ. " + "<a href='#' data-toggle=\"modal\" data-target=\"#addArtist\">\n" +--}}
{{--                    "    Thêm mới\n" +--}}
{{--                    "</a>",--}}
{{--                searchingText: 'Đang tìm kiếm...',--}}
{{--                theme: 'facebook',--}}
{{--                preventDuplicates: true,--}}
{{--                prePopulate: '',--}}
{{--            })--}}

{{--            $( ".btn-search-filter").click(function () {--}}
{{--                $( ".search-list").each(function() {--}}
{{--                    $( this ).removeClass("active");--}}
{{--                });--}}
{{--                alert($( this ).attr('value'));--}}
{{--                $('.'+$( this ).attr('value')).addClass("active");--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        function readURL(input) {--}}
{{--            if (input.files && input.files[0]) {--}}
{{--                var reader = new FileReader();--}}

{{--                reader.onload = function (e) {--}}
{{--                    console.log(e);--}}
{{--                    $('#blaha').attr('src', e.target.result);--}}
{{--                };--}}

{{--                reader.readAsDataURL(input.files[0]);--}}
{{--            }--}}
{{--            else {--}}
{{--                console.log('khong co file');--}}
{{--            }--}}
{{--        }--}}

{{--        $("#imgInp").change(function () {--}}
{{--            readURL(this);--}}
{{--        });--}}
{{--    </script>--}}
</head>
<body>
    <div id="app">
        @include('layouts.top-nav')
{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav mr-auto">--}}

{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ml-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                            </li>--}}
{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('layouts.link-js')

{{--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--}}
{{--    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
{{--    <script type="text/javascript" src="{{asset('js/css3-mediaqueries.js')}}"></script>--}}
{{--    <script type="text/javascript" href="js/Search.js"></script>--}}
{{--    <script src="https://kit.fontawesome.com/1cd0cba936.js"></script>--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
{{--    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>--}}
{{--    <script src="{{asset('js/jquery.tokeninput.js')}}"></script>--}}
{{--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>--}}
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>--}}
{{--    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>--}}
{{--    <script src="{{asset('js/jquery.tokeninput.js')}}"></script>--}}
</body>
</html>
