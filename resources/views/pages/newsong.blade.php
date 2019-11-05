<div class="col-md-3" id="bxh" style="margin-top: 2px;">
    <div class="thumbnail" style="border-color: blue;">
        <a href="{{route('guest.songs.indexNewSong')}}"><h3 style="text-align: center;color: blue;">BÀI HÁT MỚI NHẤT</h3></a>
        <hr>
        @foreach($songs as $key => $song)
            <div class="caption">
                <h5><a href="{{route('songs.play', $song->id)}}" style="color: black;"><strong
                            style="color: red;">{{$STT++ . '. '}}</strong>{{$song->name}}</a></h5>
            </div>
        @endforeach
    </div>
</div>
