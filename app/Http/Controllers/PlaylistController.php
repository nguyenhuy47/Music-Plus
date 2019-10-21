<?php

namespace App\Http\Controllers;

use App\Model\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $playlists = Playlist::where('user_id', $userId)->get();
        return view('manager.playlists.list', compact('playlists'));
    }

    public function show($playlistId)
    {
        $playlist = Playlist::find($playlistId);
        return view('manager.playlists.show', compact('playlist'));
    }

    public function destroy($playlistId, $songId)
    {
        $playlist = Playlist::find($playlistId);
        $playlist->songs()->detach($songId);
        return redirect()->route('playlists.show', $playlist->id);
    }
}
