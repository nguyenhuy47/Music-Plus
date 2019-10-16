<<<<<<< HEAD
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
    @if (Session::has('success'))
        <p class="text-success">{{Session::get('success')}}</p>
    @endif
    @if (Session::has('errorImageFile'))
        <p class="text-danger">{{Session::get('errorImageFile')}}</p>
    @endif
    @if (Session::has('errorSongFile'))
        <p class="text-danger">{{Session::get('errorSongFile')}}</p>
    @endif
    @if (Session::has('error'))
        <p class="text-danger">{{Session::get('error')}}</p>
    @endif
    @if (Session::has('errorSongInfo'))
        <p class="alert alert-danger">{{Session::get('errorSongInfo')}}</p>
    @endif
    <form method="post" action="{{route('songs.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <div class="form-group">
                <label>Bài hát</label>
                <input type="text" class="form-control" name="name" placeholder="Tên bài hát">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Upload bài hát</label>
                <input type="file" class="form-control-file" name="song_file">
            </div>
            <div class="form-group">
                <label>Ảnh bài hát</label>
                <input type="file" class="form-control-file" name="image_file">
            </div>
            <div class="form-group">
                <label>Ca sĩ</label>
                <input type="text" class="form-control" name="singer_id" placeholder="Tên ca sĩ">
            </div>
            <div class="form-group">
                <label>Nhạc sĩ</label>
                <input type="text" class="form-control" name="artist_id" placeholder="Nhạc sĩ">
            </div>
            <div class="form-group">
                <label>Thể loại</label>
                <select name="category_id" class="custom-select">
                    @foreach($categories as $groupName => $group)
                        <optgroup label="{{ $groupName }}">
                            @foreach($group as $key => $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Lời bài hát</label>
                <textarea class="form-control" name="lyric" rows="3"></textarea>
            </div>
        </div>
        <button type="submit">Upload</button>
    </form>
</div>
<script src="/js/app.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://vodkabears.github.io/vide/js/jquery.vide.min.js"></script>
</body>
</html>

