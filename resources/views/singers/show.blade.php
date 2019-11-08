@extends ('../index')
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
                    </table>
                    <table>
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
                        </tbody>

                    </table>
                    <table>
                        <tr style="text-align: left">
                            <td COLSPAN="2"><b>DANH SÁCH BÀI HÁT</b></td>
                        </tr>
                        <tr>
                            <td>STT</td>
                            <td>TÊN BÀI HÁT</td>
                        </tr>
                        @foreach($singer->songs as $key => $song)
                            <tr>
                                <td><img src="{{asset('/storage/public/upload/images/'.$song->image)}}"></td>
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
            @include('pages.newsong')
        </div>
        <div class="row">
            @include('pages.album')
            @include('pages.topic')
        </div>
        <div class="row">
            @include('pages.mv')
            @include('pages.media')
        </div>
    </div>
@endsection

