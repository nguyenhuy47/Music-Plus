@extends ('layouts.app')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nhạc sĩ</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($artists as $key => $artist)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td><a href="{{route('artists.show', $artist->id)}}">{{$artist->name}}</a>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{route('artists.create')}}">Create</a>
@endsection
