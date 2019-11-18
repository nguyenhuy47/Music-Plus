@extends ('layouts.masterSideBar')
@section('content')
                <div>
                    <table class="table table-bordered text-center">
                        <thead class="thead-light">
                        <tr>
                            <th colspan="3" style="text-align: center">DANH SÁCH PLAYLIST</th>
                        </tr>
                        <tr>
                            <td>STT</td>
                            <td>TÊN PLAYLIST</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($playlists as $key => $playlist)
                            <tr class="p-2">
                                <td>{{$STT++}}</td>
                                <td style="text-align: left"><a
                                        href="{{ route('guest.playlists.show', $playlist->id) }}">
                                        {{$playlist->name}}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
@endsection
