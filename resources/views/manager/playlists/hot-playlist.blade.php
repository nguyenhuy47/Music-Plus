<div class="row">
    <div class="col-md-9">
        <hr style="border-color: white;">
        <a href="#"><h3 style="color: blue;"> PLAYLIST MỚI NHẤT</h3></a>
        <hr style="border-color: white;">
        <div class="row">
{{--            {{$STT + 1}}--}}
{{--            @foreach($hotPlaylists as $hotPlaylist)--}}
{{--                <div class="caption">--}}
{{--                    <h5><a href="{{route('playlists.hot-playlist', $hotPlaylist->id)}}" style="color: black;"><strong--}}
{{--                                style="color: red;">{{$STT++ . '. '}}</strong>{{$hotPlaylist->name}}</a></h5>--}}
{{--                </div>--}}
{{--            @endforeach--}}
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="">
                        <img src="img/al1.jpg" alt="album1">
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="">
                        <img src="img/al2.jpg" alt="album2">
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="">
                        <img src="img/al3.jpg" alt="album3">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail" style="margin-top: 20px;border-color: green;">
            <h3 align="center"><a href="">CHỦ ĐỀ HOT</a></h3>
            <hr>
            <div class="row" style="margin-bottom: 7px;">
                <a href="">
                    <img src="img/cd1.jpg" alt="" width="90%;">
                </a>
            </div>
            <div class="row" style="margin-bottom: 7px;">
                <a href="">
                    <img src="img/cd2.jpg" alt="" width="90%">
                </a>
            </div>
            <div class="row" style="margin-bottom: 7px;">
                <a href="">
                    <img src="img/cd3.jpg" alt="" width="90%">
                </a>
            </div>
            <div class="row" style="margin-bottom: 7px;">
                <a href="">
                    <img src="img/cd4.jpg" alt="" width="90%">
                </a>
            </div>
        </div>
    </div>
</div>
