<?php

namespace App\Http\Controllers;

use App\Model\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function index()
    {
        $STT = 1;
        $userId = Auth::user()->id;
        $playlists = Playlist::where('user_id', $userId)->get();
        return view('manager.playlists.list', compact('playlists', 'STT'));
    }

    public function show($playlistId)
    {
        $STT = 1;
        $playlist = Playlist::find($playlistId);
        return view('manager.playlists.show', compact('playlist', 'STT'));
    }

    public function showHotPlaylist($id){
        $STT = 1;
        $hotPlaylists = Playlist::all()->sortByDesc('create_at')->take(5);
        $hotPlaylist = Playlist::findOrFail($id);
        return view('manager.playlists.hot-playlist', compact('STT','hotPlaylists', 'hotPlaylist'));

    }

    public function store(Request $request)
    {
        if (!$request->name) {
            return redirect()->back();
        }
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

    public function countPlaylist()
    {
        $playlist = Playlist::all();
        $countByName = $playlist->count($playlist->name);
        return view('manager.playlists.hot-playlist', compact('playlist', 'countByName'));
    }

    public function searchByName(Request $request){
        $STT = 1;
        $playlists = Playlist::where('name','LIKE','%'.$request->keySearch.'%')->get();
        return view('manager.playlists.search',compact('playlists','STT'));

    }

}
