@extends ('layouts.app')
@section('content')
    <div class="card" style="width: 18rem;">
    <div class="card-header">
        Featured
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{{$singer->name}}</li>
        <li class="list-group-item">{{$singer->dob}}</li>
        <li class="list-group-item">{{$singer->story}}</li>
    </ul>
        <td><a href="{{route('singers.edit', $singer->id)}}">Thay đổi hông tin ca sĩ</a></td>

    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ten bai hat</th>
            <th scope="col">ten nhac si</th>
        </tr>
        </thead>
        <tbody>
        @foreach($songs as $key => $song)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td><a href="{{route('songs.play', $song->id)}}">{{$song->name}}</a></td>
            <td><a href="">{{$song->artist->name}}</a></td>
        </tr>
            @endforeach
        </tbody>
    </table>
@endsection
