<div>
    <div class="row mt-5">
        <div class="col-6">
                        <span class="float-left font-weight-bold ml-5">
                            <h3>Playlist Được Nghe Nhiều</h3>
                        </span>
        </div>
        <div class="col-6">
                        <span class="float-right mb-3 mr-5">
                            <a class="btn btn-outline-info" href="">Show all</a>
                        </span>
        </div>
    </div>
    <div class="ml-5 mr-5 mb-5">
        <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                                        <div class="row">
                                           @foreach($popularPlaylists as $playlist)
                                                <div class="col">
                                                    <a href="{{route('guest.playlists.show',$playlist->id)}}"><img width="90px" height="240px"
                                                        src="{{asset('/storage/public/upload/images/'.$playlist->image)}}"
                                                        class="d-block w-100" alt="Playlist chưa có ảnh">
                                                    <p class="mb-0">{{$playlist->name}}</p></a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
{{--{{dd($popularPlaylists)}}--}}
{{--                <div class="carousel-item active">--}}
{{--                    <div class="row">--}}

{{--                        @for($i = 0; $i < 4; $i++)--}}
{{--                            <div class="col">--}}
{{--                                <a href="{{route('guest.playlists.show',$popularPlaylists[$i]->id)}}"><img width="90px" height="240px"--}}
{{--                                    src="{{asset('/storage/public/upload/images/'.$popularPlaylists[$i]->songs[0]->image)}}"--}}
{{--                                    class="d-block w-100" alt="...">--}}
{{--                                <p class="mb-0">{{$popularPlaylists[$i]->name}}</p></a>--}}
{{--                            </div>--}}
{{--                        @endfor--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="carousel-item">--}}
{{--                    <div class="row">--}}

{{--                        @for($i = 4; $i < 8; $i++)--}}
{{--                            <div class="col">--}}
{{--                                <a href="{{route('guest.playlists.show',$popularPlaylists[$i]->id)}}"><img width="90px" height="240px"--}}
{{--                                    src="{{asset('/storage/public/upload/images/'.$popularPlaylists[$i]->songs[0]->image)}}"--}}
{{--                                    class="d-block w-100" alt="...">--}}
{{--                                <p class="mb-0">{{$popularPlaylists[$i]->name}}</p></a>--}}
{{--                            </div>--}}
{{--                        @endfor--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<!-- space -->
<div>
    <hr>
</div>
