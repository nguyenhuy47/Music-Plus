@extends('pages.index')
@section('content')
    <div  class="container pt-5">
        <div class="row">
            <div class="col-md-9">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th style="text-align: center">DANH SÁCH BÀI HÁT MỚI NHẤT</th>
                    </tr>
                </table>
                @foreach($songs as $song)
                    <ul class="list-group">
                        <li class="list-group-item bg-light p-0 py-3">
                            <div>
                                <img src="{{asset('/storage/public/upload/images/'.$song->image)}}" width="40" height="40" alt="" class="img thumbnail pull-left mr-2">
                            </div>
                            <a href="{{route('guest.songs.play', $song->id)}}" style="color: black;">
                                <h6 class="mb-1 text-dark">{{$song->name}}</h6>
                            </a>
                            <p class="mb-0 singer"><span>@foreach($song->singers as $singer)<a href="{{route('guest.singers.play', $singer->id)}}">{{$singer->name.""}}</a><br>@endforeach</span></p>
                        </li>
                    </ul>
                @endforeach
                {{ $songs->links() }}
            </div>
            @include('pages.topic')
        </div>
        <div class="row">
            @include('pages.mv')
            @include('pages.media')
        </div>
    </div>
@endsection
