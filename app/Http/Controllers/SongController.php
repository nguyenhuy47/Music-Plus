<?php

namespace App\Http\Controllers;

use App\Model\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SongController extends Controller
{
    public function create()
    {
        return view('songs.create');
    }

    public function store(Request $request)
    {
        $song = new Song();
        $song->name = $request->name;
        $song->categoty_id = $request->category_id;
        $song->lyric = $request->lyric;
        $song->singer_id = $request->singer_id;
        $song->artist_id = $request->artist_id;

        if ($request->hasFile('image_file')) {
            $imageFile = $request->file('image_file');
            $imageFileName = $imageFile->getClientOriginalName();
            $imageFileExtension = $imageFile->getClientOriginalExtension();
            if ($imageFileExtension != 'jpg' && $imageFileExtension != 'png' && $imageFileExtension != 'jpeg') {
                Session::flash('errorImageFile', 'Bạn đã chọn sai file ảnh, vui lòng chọn lại!');
                return redirect()->route('songs.store');
            } else {
                $song->image = $imageFileName;
            }
        } else {
            $song->image = '';
        }

        if ($request->hasFile('song_file')) {
            $songFile = $request->file('song_file');
            $songFileName = $songFile->getClientOriginalName();
            $songFileExtension = $songFile->getClientOriginalExtension();
            $songFileSize = $songFile->getClientSize();
            $song->file_name = $songFileName;
            $song->size = $songFileSize;
            if ($songFileExtension != 'mp3') {
                Session::flash('errorSongFile', 'Chúng tôi chỉ hỗ trợ định dạng file MP3, vui lòng chọn lại!');
                return redirect()->route('songs.store');
            }
        } else {
            Session::flash('error', 'Bạn chưa chọn file');
            return redirect()->route('songs.store');
        }
        $song->save();
        Session::flash('success', 'Tải bài hát thành công');
        return redirect()->route('songs.store');
    }
}
