<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Music Plus</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
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
</head>
<body>
@include('layouts.top-nav')
<div class="container pt-5">
    <div class="player">
        <audio controls autoplay>
            <source src="{{asset('/storage/upload/songs/'.$song->file_name)}}" type="audio/mpeg">
        </audio>
    </div>
    <div class="social-plugin">

    </div>
    <div class="lyric" id="_divLyricHtml">
        <div class="pd_name_lyric">
            <h2 class="name_lyric"><b>Lời bài hát: {{ $song->name }}</b></h2>
            <p class="name_post">
                Nhạc sĩ: {{ $song->artist->name}}
            </p>
            <p class="name_post">Lời đăng bởi: {{ $song->user->name }}</p>
        </div>
        <hr>
        <p id="divLyric" class="pd_lyric trans" style="height:auto;max-height:none;">
            {!! nl2br($song->lyric) !!}
        </p>
    </div>
</div>
<script src="/js/app.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://vodkabears.github.io/vide/js/jquery.vide.min.js"></script>
</body>
</html>
