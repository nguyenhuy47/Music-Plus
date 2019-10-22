<table border="0">
    <tr>
        <th>Playlist: {{ $playlist->name }}</th>
        <th>Nghe tất cả</th>
    </tr>
    @foreach($playlist->songs as $song)
        <tr>
            <td>{{ $song->name }}</td>
            <td><a href="{{ route('playlists.destroy', ['playlistId' => $playlist->id, 'songId' => $song->id]) }}" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
        </tr>
    @endforeach
</table>
