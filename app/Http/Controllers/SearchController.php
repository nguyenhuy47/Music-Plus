<?php

namespace App\Http\Controllers;

use App\Model\Playlist;
use App\Model\Singer;
use App\Model\Song;
use Illuminate\Http\Request;

class SearchController extends Controller
{
//    public function showSong($id){
//        $song = Song::findOrFail($id);
//        $data = 'Ten bai hat'.$song->name;
//        return $data;
//    }



    public function searchByName(Request $request){
        $STT = 1;
        $STT1 = 1;
        $STT2 = 1;
        $keyword = trim($request->keySearch);
        if($request->search === 'songs'){
            $songs = Song::where('name','LIKE','%'.$keyword.'%')->get()->toArray();
            return view('admin.pages.song.search',compact('songs','STT','keyword'));

        }elseif ($request->search === 'singers'){
            $singers = Singer::where('name','LIKE','%'.$keyword.'%')->get()->toArray();
            return view('admin.pages.singer.search',compact('singers','STT','keyword'));


        }elseif ($request->search === 'playlists'){
            $playlists = Playlist::where('name','LIKE','%'.$keyword.'%')->get()->toArray();
            return view('admin.pages.playlist.search',compact('playlists','STT','keyword'));

        }
//        else{
//            $songs = Song::where('name','LIKE','%'.$keyword.'%')->get()->toArray();
//            $singers = Singer::where('name','LIKE','%'.$keyword.'%')->get()->toArray();
//            $playlists = Playlist::where('name','LIKE','%'.$keyword.'%')->get()->toArray();
//            return view('searchAll',compact('songs','singers','playlists','STT','STT1','STT2','keyword'));
//        }
    }

}
