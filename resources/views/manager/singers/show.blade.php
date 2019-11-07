@extends ('layouts.master')
@section('content')
    @include('includes.facebookSDK')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-9">
                <div class="bg-img"
                     style="background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8DLra_TvgM3_gEswm-Zi4Smw5onyLo6aeOEl6tsFl3IEQXeM7&s) center center / cover no-repeat rgb(83, 62, 56);">
                    <div class="lammonen row mx-0" style="background-color: rgba(0,0,0,.65);">
                        <div class="col-3">
                            <img src="{{asset('/storage/singer_image/'.$singer->image)}}"  width="288" height="288" alt="song-thumbnail" class="img img-responsive p-4">
                        </div>
                        <div class="col-9">
                            <div class="py-4 pr-6 text-white mb-5 text-center">
                                <h2>{{$singer->name}}</h2>
                                <p>{{$singer->dob}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <h2>TIỂU SỬ</h2><br><li>{{$singer->story}}</li>
                <div>
                    <table class="table">
                        <tbody>
                        <tr style="text-align: left">
                            <td colspan="2">
                                <div class="row">
                                    <div class="col-md-5">
                                        <b>DANH SÁCH BÀI HÁT</b>
                                    </div>
                                    <div class="col-md-7">
                                        <a href="{{ route('singers.playAll', $singer->id) }}">{{'Nghe tất cả  '}}
                                            <i class="fa fa-play-circle"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @foreach($singer->songs as $song)
                            <tr>
                                <td><a href="{{route('songs.play', $song->id)}}"><img height="50" width="50" src="{{asset('/storage/public/upload/images/'.$song->image)}}"></a></td>
                                <td style="text-align: left"><a
                                        href="{{route('songs.play', $song->id)}}">{{$song->name}}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="comment">
                    @include('includes.commentfb', ['commentItem' => 'singer-'.$singer->id])
                </div>
            </div>
        </div>
    </div>
@endsection

