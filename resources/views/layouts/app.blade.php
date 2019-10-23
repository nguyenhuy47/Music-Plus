<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('js/css3-mediaqueries.js')}}"></script>
    <script type="text/javascript" href="js/Search.js"></script>
    <link rel="stylesheet" href="{{asset('css/style_menu.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slider.css')}}">
    <script src="https://kit.fontawesome.com/1cd0cba936.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/token-input.css')}} ">
    <link rel="stylesheet" href="{{asset('css/token-input-facebook.css')}}">
    <script src="{{asset('js/jquery.tokeninput.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/token-input.css')}}">
    <link rel="stylesheet" href="{{asset('css/token-input-facebook.css')}}">
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}

    {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('js/jquery.tokeninput.js')}}"></script>

{{--    ==================================================input suggest============================================--}}
    <script>
        jQuery(document).ready(function ($) {
            $("#list_singer").tokenInput("{{asset('api/singers?q=singer')}}", {
                hintText: 'Nhập tên ca sỹ',
                noResultsText: "Không tìm thấy ca sỹ ",
                searchingText: 'Đang tìm kiếm...',
                theme: 'facebook',
                preventDuplicates: true,
                prePopulate: '',
            })
        });
        jQuery(document).ready(function ($) {
            $("#list_artist").tokenInput("{{asset('api/artists?q=artist')}}", {
                hintText: 'Nhập tên ca sỹ',
                noResultsText: "Không tìm thấy ca sỹ ",
                searchingText: 'Đang tìm kiếm...',
                theme: 'facebook',
                preventDuplicates: true,
                prePopulate: '',
            })
        });

    </script>
{{--    ===================================================modal=============================================--}}
    <script>
        $(document).ready(function () {
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
            });
        })
    </script>
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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    console.log(e);
                    $('#blaha').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
            else {
                console.log('khong co file');
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>--}}
</body>
</html>
