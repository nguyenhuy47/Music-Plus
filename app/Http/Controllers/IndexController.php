<?php

namespace App\Http\Controllers;

use App\Model\Artist;
use App\Model\Playlist;
use App\Model\Singer;
use App\Model\Song;
use App\Model\TotalLike;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     *  function index compact variable to view index1
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        song-moi-nhat
        $newSongs = Song::all()->sortByDesc('id')->take(5);
//        song-like nhieu
        $songIds = \App\Model\TotalLike::where('item_id', 'like', 'song-%')->orderBy('total_like', 'Desc')->get('item_id')->take(5);
        $favoriteSongs = [];
        foreach ($songIds as $songId) {
            $song = Song::find(str_replace('song-', '', $songId->item_id));
            array_push($favoriteSongs, $song);
        }
//        songs nghe nhieu
        $popularSongs = song::all()->sortByDesc('listen_count')->take(5);

        $singers = Singer::all()->sortByDesc('created_at')->take(4);
        $artists = Artist::all();
        $playlists = Playlist::where('listen_count', '>', 0)
            ->get()
//            ->sortByDesc('listen_count')
            ->take(8);

        /*
         * playlist-nghe-nhieu
         */
        $popularPlaylists = Playlist::all()->sortByDesc('listen_count')->take(8);

        /*
         * playlist-like-nhieu
         */

        $playlistIds = TotalLike::where('item_id', 'like', 'playlist-%')->orderBy('total_like', 'Desc')->get('item_id')->take(8);
        $favoritePlaylists = [];
        foreach ($playlistIds as $playlistId) {
            $playlist = Playlist::find(str_replace('playlist-', '', $playlistId->item_id));
            array_push($favoritePlaylists, $playlist);
        }
        /*
         * playlist-moi-nhat
         */
        $newPlaylists = Playlist::all()->sortByDesc('id')->take(8);

        return view('index1', compact('newSongs', 'singers', 'newPlaylists', 'artists', 'popularPlaylists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
