@extends ('../index')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-9">

                <div>
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th colspan="2" style="text-align: center"><b>{{strtoupper($singer->name) }}</b></th>
                        </tr>
                        </thead>
                        <tr style="text-align: left">
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
                            <td COLSPAN="2"><b>DANH SÁCH BÀI HÁT</b></td>
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
                @if($singer->comment_list_id)
                    <div class="comment col-md-9">
                        <div class="create-comment">
                            <form action="{{route('comments.store', $singer->comment_list_id)}}" method="post">
                                @csrf
                                <textarea name="content" cols="30" rows="3" class="form-control"></textarea>
                                <button class="btn btn-primary" type="submit">Bình luận</button>
                            </form>
                        </div>
                        <hr>
                        <div class="show-comment col-md-12">
                            @foreach($comments as $comment)
                                <div class="row">
                                    <div class="col-md-3"><b>avatar</b></div>
                                    <div class="col-md-9">
                                        <div class="col-md-12"><b>{{$comment->user->name}}</b>{{' - ' . $comment->created_at}}</div>
                                        <div class="col-md-12">{{$comment->content}}</div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                @endif
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

