<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/token-input.css')}}">
    <link rel="stylesheet" href="{{asset('css/token-input-facebook.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('js/jquery.tokeninput.js')}}"></script>
    <script>
        $(document).ready(function() {
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
<div class="container pt-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                <input type="text" id="list_singer" class="form-control" name="singer_ids" placeholder="Tên ca sĩ">
            </div>
            <div class="form-group">
                <label>Nhạc sĩ</label>
                <input type="text" id="list_artist" class="form-control" name="artist_ids" placeholder="Nhạc sĩ">
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

<!-- Modal -->
<div class="modal fade" id="addArtist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới nhạc sỹ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('artists.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    Tên nhạc sỹ:
                    <input type="text" class="form-control" name="name">
                    Ngày sinh:
                    <input type="date" class="form-control" name="dob">
                    Tiểu sử:
                    <textarea name="story" class="form-control" rows="3"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addSinger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới ca sỹ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('singers.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    Tên ca sỹ:
                    <input type="text" class="form-control" name="name">
                    Ngày sinh:
                    <input type="date" class="form-control" name="dob">
                    Tiểu sử:
                    <textarea name="story" class="form-control" rows="3"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
