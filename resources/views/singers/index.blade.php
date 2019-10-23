@extends ('layouts.app')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ca si</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($singers as $key => $singer)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td><a href="{{route('singers.show', $singer->id)}}">{{$singer->name}}</a>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{route('singers.create')}}">Create</a>
@endsection
