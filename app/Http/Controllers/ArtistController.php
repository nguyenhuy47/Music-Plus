<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistValidate;
use App\Model\Artist;
use App\Model\Song;

class ArtistController extends Controller
{

    public function index()
    {
        $STT = 1;
        $songs = Song::all();
        $artists = Artist::paginate(10);
        return view('manager.artists.list', compact('artists','songs','STT'));
    }

    public function create()
    {
        return view('manager.artists.create');
    }

    public function store(ArtistValidate $request)
    {
        if($request->dob >= now('Asia/Ho_Chi_Minh')) {
            return redirect()->back()->with('errorDob','Ngày sinh của nhạc sĩ không hợp lệ');
        }

        $artist = new Artist();
        $artist->name = $request->name;
        $artist->dob = $request->dob;
        $artist->story = $request->story;
        $artist->save();
        return redirect()->route('songs.create')->with('createdArtistSuccess','Thêm mới nhạc sĩ thành công');
    }

    public function show($id)
    {
        $STT = 1;
        $songs = Song::all();
        $artist = Artist::findOrFail($id);
        return view('manager.artists.show', compact('artist','songs','STT'));
    }

    public function edit($id)
    {
        $artist = Artist::findOrfail($id);
        return view('manager.artists.edit', compact('artist'));
    }


    public function update(ArtistValidate $request, $id)
    {
        $artist = Artist::findOrFail($id);
        $artist->name = $request->name;
        $artist->dob = $request->dob;
        $artist->story = $request->story;
        $artist->save();
        return redirect()->back()->with('notification', 'Cập nhật thông tin nhạc sĩ thành công');
    }


    public function destroy($id)
    {
        //
    }
}
