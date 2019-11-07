<?php

namespace App\Http\Controllers;

use App\Model\Artist;
use App\Model\Playlist;
use App\Model\Singer;
use App\Model\Song;
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
        $songs = Song::paginate(5);
        $singers = Singer::all()->sortByDesc('created_at')->take(4);
        $playlists = Playlist::where('listen_count','>', 0)
            ->get()
//            ->sortByDesc('listen_count')
            ->take(8);
//        dd($playlists);
        $artists = Artist::all();
        return view('index1', compact('songs','singers','playlists','artists'));
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
