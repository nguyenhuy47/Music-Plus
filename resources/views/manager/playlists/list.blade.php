<table border="0">
    @foreach($playlists as $key => $playlist)
        <tr><a href="{{ route('playlists.show', $playlist->id) }}">{{ $playlist->name }}</a></tr>
    @endforeach
</table>
