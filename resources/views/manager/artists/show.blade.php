@extends('pages.index')
@section('content')
    <div  class="container pt-5">
        <div class="row">
            <div class="col-md-9">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Featured
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{$artist->name}}</li>
                        <li class="list-group-item">{{$artist->dob}}</li>
                        <li class="list-group-item">{{$artist->story}}</li>
                    </ul>
                    <td><a href="{{route('artists.edit', $artist->id)}}">Thay đổi hông tin nhạc sĩ</a></td>

                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ten bài hát</th>
                        <th scope="col">ten ca sĩ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($artist->songs as $key => $song)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td><a href="{{route('songs.play', $song->id)}}">{{$song->name}}</a></td>
                            <td>
                                @foreach($song->singers as $singer)
                                    <a href="">{{$singer->name}}</a>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

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
