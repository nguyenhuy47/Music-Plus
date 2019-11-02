<?php

namespace App\Http\Controllers;

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
        return view('manager.playlists.list', compact('playlists', 'STT', 'songs'));
    }

    public function show($playlistId)
    {
        $STT = 1;
        $songs = Song::all();
        $playlist = Playlist::find($playlistId);
        return view('manager.playlists.show', compact('playlist', 'STT', 'songs'));
    }

    public function playAll($playlistId)
    {
        $STT = 1;
        $songs = Song::all()->sortByDesc('created_at')->take(5);
        $user = Auth::user();
        $playlist = Playlist::find($playlistId);
        $comments = Comment::where('comment_list_id', '=', $playlist->comment_list_id)->get()->sortByDesc('created_at');
        return view('manager.playlists.playAll', compact('playlist', 'songs', 'STT', 'user', 'comments'));
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
        $commentList = new CommentList();
        $commentList->save();
        $playlist->comment_list_id = $commentList->id;
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

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

    public function guestIndex()
    {
        $STT = 1;
        $songs = Song::all();
        $playlists = Playlist::all();
        return view('playlists.index',compact('playlists','songs','STT'));
    }

    public function guestShow($playlistId)
    {
        $STT = 1;
        $songs = Song::all();
        $playlist = Playlist::find($playlistId);
        return view('playlists.show', compact('playlist', 'STT', 'songs'));
    }
}
