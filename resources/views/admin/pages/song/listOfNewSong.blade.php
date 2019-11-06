<div style="background-color: white">
    <div class="row mt-5 mb-4">
        <div class="col-6 border-right">
            <div class="font-weight-bold ml-5 mb-3">
                <h3>New Songs</h3>
            </div>
            <div class="ml-4">
                <div class="ml-5 mb-3">
                    <div class="row">
                        @foreach($songs as $key => $song)
                            <div class="col-1">
                                <img src="{{asset('/storage/public/upload/images/'.$song->image)}}"
                                     style="width: 50px; height: 50px" href="">
                            </div>
                            <div class="col-11">
                                <div class="ml-3">
                                    <div><a href="{{route('songs.play', $song->id)}}"></strong>{{$song->name}}</a></div>
                                    <div>      @foreach($song->singers as $singer)
                                            <div>{{$singer->name}}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-outline-info" href="">Show more</a>
            </div>
        </div>

        <!-- popular songs -->
        <div class="col-6 border-left">
            <div class="font-weight-bold ml-5 mb-3">
                <h3>Popolar Songs</h3>
            </div>
            <div class="ml-4">
                <div class="ml-5 mb-3">
                    <div class="row">
                        <div class="col-1">
                            <img src="https://avatar-nct.nixcdn.com/song/2019/10/23/7/8/b/5/1571804802390.jpg"
                                 style="width: 50px; height: 50px" href="">
                        </div>
                        <div class="col-11">
                            <div class="ml-3">
                                <div>Nghe nói anh sắp kết hôn</div>
                                <div>Văn Mai Hương, Hà Anh Tuấn</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ml-5 mb-3">
                    <div class="row">
                        <div class="col-1">
                            <img src="https://avatar-nct.nixcdn.com/song/2019/10/29/7/c/1/5/1572339116027.jpg"
                                 style="width: 50px; height: 50px" href="">
                        </div>
                        <div class="col-11">
                            <div class="ml-3">
                                <div>I Don't Wanna Let You Go</div>
                                <div>Mr. A</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ml-5 mb-3">
                    <div class="row">
                        <div class="col-1">
                            <img src="https://avatar-nct.nixcdn.com/song/2019/10/22/8/2/0/b/1571718224366.jpg"
                                 style="width: 50px; height: 50px" href="">
                        </div>
                        <div class="col-11">
                            <div class="ml-3">
                                <div>Hongkong 12</div>
                                <div>Nguyễn Trọng Tài, MC 12</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ml-5 mb-3">
                    <div class="row">
                        <div class="col-1">
                            <img src="https://avatar-nct.nixcdn.com/song/2019/09/16/b/0/f/f/1568593417642.jpg"
                                 style="width: 50px; height: 50px" href="">
                        </div>
                        <div class="col-11">
                            <div class="ml-3">
                                <div>Cô Thắm Không Về</div>
                                <div>Phát Hồ, Jokes Bii, Thiện</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ml-5 mb-3">
                    <div class="row">
                        <div class="col-1">
                            <img src="https://avatar-nct.nixcdn.com/song/2019/08/28/7/4/3/a/1566982655403.jpg"
                                 style="width: 50px; height: 50px" href="">
                        </div>
                        <div class="col-11">
                            <div class="ml-3">
                                <div>Đi Đu Đưa Đi</div>
                                <div>Bích Phương</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-outline-info" href="">Show more</a>
            </div>
        </div>
    </div>
</div>

<!-- space -->
<div>
    <hr>
</div>
