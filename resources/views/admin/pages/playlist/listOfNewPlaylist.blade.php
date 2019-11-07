<div>
    <div class="row mt-5">
        <div class="col-6">
                        <span class="float-left font-weight-bold ml-5">
                            <h3>New Playlist</h3>
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

                        @for($i = 1; $i < 5; $i++)
                            <div class="col">
                                <img
                                    src="{{asset('/storage/public/upload/images/'.$playlists[$i]->songs[0]->image)}}"
                                    class="d-block w-100" alt="...">
                                <p class="mb-0"><a>{{$playlists[$i]->name}}</a></p>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">

                        @for($i = 5; $i < 9; $i++)
                            <div class="col">
                                <img
                                    src="{{asset('/storage/public/upload/images/'.$playlists[$i]->songs[0]->image)}}"
                                    class="d-block w-100" alt="...">
                                <p class="mb-0"><a>{{$playlists[$i]->name}}</a></p>
                            </div>
                        @endfor
                    </div>
                </div>

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
