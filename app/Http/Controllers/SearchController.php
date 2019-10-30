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
        if($request->search === 'songs'){

            $songs = Song::where('name','LIKE','%'.$request->keySearch.'%')->get();
            return view('songs.search',compact('songs','STT'));
//            return response()->json($songs);

        }elseif ($request->search === 'singers'){
            $singers = Singer::where('name','LIKE','%'.$request->keySearch.'%')->get();
            return view('singers.search',compact('singers','STT'));
//            return response()->json($singers);

        }elseif ($request->search === 'playlists'){
            $playlists = Playlist::where('name','LIKE','%'.$request->keySearch.'%')->get();
            return view('manager.playlists.search',compact('playlists','STT'));
//            return response()->json($playlists);
        }
        else{
            $songs = Song::where('name','LIKE','%'.$request->keySearch.'%')->get();
            $singers = Singer::where('name','LIKE','%'.$request->keySearch.'%')->get();
            $playlists = Playlist::where('name','LIKE','%'.$request->keySearch.'%')->get();
            return view('searchAll',compact('songs','singers','playlists','STT','STT1','STT2'));
        }
    }

}
