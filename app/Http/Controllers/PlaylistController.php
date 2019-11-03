<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormAddPlaylist;
use App\Http\Requests\FormPlaylist;
use App\Model\Comment;
use App\Model\CommentList;
use App\Model\Playlist;
use App\Model\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function index()
    {
        $STT = 1;
        $songs = Song::all();
        $userId = Auth::user()->id;
        $playlists = Playlist::where('user_id', $userId)->get();
        return view('manager.playlists.list', compact('playlists', 'STT','songs'));
    }

    public function show($playlistId)
    {
        $STT = 1;
        $songs = Song::all();
        $playlist = Playlist::find($playlistId);
        return view('manager.playlists.show', compact('playlist', 'STT','songs'));
    }

    public function playAll($playlistId)
    {
        $STT = 1;
        $songs = Song::all()->sortByDesc('created_at')->take(5);
        $user = Auth::user();
        $playlist = Playlist::find($playlistId);
        return view('playlists.show', compact('playlist', 'songs','STT','user'));
    }

    public function store(FormPlaylist $request)
    {
        $user = Auth::user();
        $playlist = new Playlist();
        $playlist->name = $request->name;
        $playlist->user_id = $user->id;
        $playlist->save();
        return redirect()->back();
    }

    public function destroy($playlistId, $songId)
    {
        $playlist = Playlist::find($playlistId);
        $playlist->songs()->detach($songId);
        return redirect()->route('playlists.show', $playlist->id);
    }

    public function destroyAll($id)
    {
        $playlist = Playlist::find($id);
        $playlist->delete();
        return redirect()->back();
    }

    public function update(FormPlaylist $request, $id)
    {
        $playlist = Playlist::find($id);
        $playlist->name = $request->name;
        $playlist->save();
        return redirect()->back();
    }

    public function addSong(FormAddPlaylist $request, $id)
    {
        $songIds = explode(',', $request->songIds);
        $playlist = Playlist::find($id);
        foreach ($songIds as $songId) {
            $playlist->songs()->attach($songId);
        }
        return redirect()->back();
    }
}
