@extends ('layouts.master')
@section('content')
    @include('includes.facebookSDK')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-9">

                <div>
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th colspan="2" style="text-align: center"><b>{{strtoupper($singer->name) }}</b></th>
                        <tr style="text-align: left">
                        </tr>
                        </thead>
                            <td COLSPAN="2"><b>THÔNG TIN</b></td>
                        </tr>

                        <tbody>
                        <tr>
                            <td>Ngày sinh</td>
                            <td>{{$singer->dob}}</td>

                        </tr>
                        <tr>
                            <td>Tiểu sử</td>
                            <td>{{$singer->story}}</td>
                        </tr>
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
                        <tr>
                            <td>STT</td>
                            <td>TÊN BÀI HÁT</td>
                        </tr>
                        @foreach($singer->songs as $key => $song)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td style="text-align: left"><a href="{{route('songs.play', $song->id)}}">{{$song->name}}</a></td>
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

