<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Singer;
use App\Model\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SongController extends Controller
{
    public function index()
    {
        $STT = 1;
        $songs = Song::all()->sortByDesc('created_at')->take(5);
        return view('index', compact('songs', 'STT'));
    }

    public function show($id)
    {
        $song = Song::findOrFail($id);
        return view('songs.show', compact('song'));
    }

    public function create()
    {
        $categories = Category::all()->groupBy('description');
        return view('songs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $song = new Song();
        $user = Auth::user();
        $singerName = $request->singer_name;
        $artistName = $request->artist_name;
        $singer = Singer::where('name', $singerName)->get();
        $artist = Singer::where('name', $artistName)->get();
        if(count($singer) && count($artist)){
            $song->singer_id = $singer[0]->id;
            $song->artist_id = $artist[0]->id;
        } else {
            Session::flash('errorSongInfo', 'Nhạc sỹ hoặc ca sỹ bạn vừa nhập không tồn tại trên hệ thống.');
            return redirect()->route('songs.create');
        }
        $userId = $user->id;
        $song->name = $request->name;
        $song->category_id = $request->category_id;
        $song->lyric = $request->lyric;
        $song->user_id = $userId;


        if ($request->hasFile('image_file')) {
            $imageFile = $request->file('image_file');
            $imageFileExtension = $imageFile->getClientOriginalExtension();
            $imageFileName = str_replace(".$imageFileExtension", "-" . Str::random(4) . ".$imageFileExtension", $imageFile->getClientOriginalName());
            while (file_exists('../storage/app/public/upload/images/' . $imageFileName)) {
                $imageFileName = str_replace(".$imageFileExtension", "-" . Str::random(4) . ".$imageFileExtension", $imageFile->getClientOriginalName());
            }
            if ($imageFileExtension != 'jpg' && $imageFileExtension != 'png' && $imageFileExtension != 'jpeg') {
                Session::flash('errorImageFile', 'Bạn đã chọn sai file ảnh, vui lòng chọn lại!');
                return redirect()->route('songs.create');
            } else {
                $song->image = $imageFileName;
                $imageFile->storeAs('public/upload/images', $imageFileName);
            }
        } else {
            $song->image = '';
        }

        if ($request->hasFile('song_file')) {
            $songFile = $request->file('song_file');
            $songFileExtension = $songFile->getClientOriginalExtension();
            $songFileName = str_replace(".$songFileExtension", "-" . Str::random(4) . ".$songFileExtension", $songFile->getClientOriginalName());
            while (file_exists('../storage/app/public/upload/songs/' . $songFileName)) {
                $songFileName = str_replace(".$songFileExtension", "-" . Str::random(4) . ".$songFileExtension", $songFile->getClientOriginalName());
            }
            $songFileSize = $songFile->getClientSize();
            $song->file_name = $songFileName;
            $song->size = $songFileSize / 1000;//chuyen doi Byte -> Kilobyte
            if ($songFileExtension != 'mp3') {
                Session::flash('errorSongFile', 'Chúng tôi chỉ hỗ trợ định dạng file MP3, vui lòng chọn lại!');
                return redirect()->route('songs.create');
            }
        } else {
            Session::flash('error', 'Bạn chưa chọn file');
            return redirect()->route('songs.create');
        }
        $songFile->storeAs('public/upload/songs', $songFileName);
        $song->save();
        Session::flash('success', 'Tải bài hát thành công');
        return redirect()->route('songs.create');
    }
}
