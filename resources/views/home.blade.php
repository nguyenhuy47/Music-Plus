<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="6;url={{route('songs.index')}}">

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
    <script type="text/javascript" src="js/css3-mediaqueries.js"></script>
    <script type="text/javascript" href="js/Search.js"></script>
    <link rel="stylesheet" href="css/style_menu.css" type="text/css">
    <link rel="stylesheet" href="css/slider.css">
    <script src="https://kit.fontawesome.com/1cd0cba936.js" crossorigin="anonymous"></script>
    <style>
        .gooey{
            position: absolute;
            top: 90%;
            left: 50%;
            width: 142px;
            height: 40px;
            margin: -20px 0 0 -71px;
            background: #ffffff00;
            filter: contrast(20);
        }

        .dot{
            position: absolute;
            width: 16px;
            height: 16px;
            top: 12px;
            left: 15px;
            filter: blur(1px);
            background: cyan;
            border-radius: 50%;
            transform: translateX(0);
            animation: dot 2.8s infinite;
        }

        .dots{
            transform: translateX(0);
            margin-top: 12px;
            margin-left: 31px;
            animation: dots 2.8s infinite;
        }

        .my-dot{
            display: block;
            float: left;
            width: 10px;
            height: 10px;
            margin-left: 16px;
            filter: blur(1px);
            background: cyan;
            border-radius: 50%;
        }


        @keyframes dot{
            50%    {transform: translateX(55px)}
        }

        @keyframes dots{
            50%    {transform: translateX(-31px)}
        }
    </style>
    <script>
        let run;

        function countDown() {
            let second = 3;
            let loading = document.getElementById('loading');
            let countDown = document.getElementById('count-down');
            countDown.innerHTML = 'Quay về trang chủ sau: ' + second + ' giây!';
            run = setInterval(function () {
                second--;
                countDown.innerHTML = 'Quay về trang chủ sau: ' + second + ' giây!';
                if (second <= 0) {
                    countDown.setAttribute("style", "display: none;");
                    loading.setAttribute('style', 'display:block');
                }
                if (second <= -3) {
                    clearInterval(run);
                }
            }, 1000);
        }
    </script>
</head>
<body onload="countDown()">
<div id="app">
    @include('layouts.top-nav')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Thông báo</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            Đăng nhập thành công!
                        </div>
                        <div id="count-down" class="card-body" style="display: block"></div>
                        <div id="loading" class="gooey" style="display: none">
                            <span class="my-dot dot"></span>
                            <div class="dots">
                                <span class="my-dot"></span>
                                <span class="my-dot"></span>
                                <span class="my-dot"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>

