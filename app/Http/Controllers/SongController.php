<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormUploadRequest;
use App\Jobs\SetPathFile;
use App\Jobs\UploadFile;
use App\Model\Artist;
use App\Model\Category;
use App\Model\Comment;
use App\Model\CommentList;
use App\Model\Playlist;
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
        $singers =  Singer::all()->sortByDesc('created_at')->take(4);
        $songs = Song::all()->sortByDesc('created_at')->take(5);
        return view('index1', compact('songs','singers'));
    }

    public function showAll()
    {
        $songs = Song::all()->sortByDesc('created_at');
        return view('songs.index', compact('songs'));
    }

    public function show($id)
    {
        $songKey = 'song_' . $id;
        if (!Session::has($songKey)) {
            Song::where('id', $id)->increment('listen_count');
            Session::put($songKey, 1);
        }
        $STT = 1;
        $user = Auth::user();
        $songs = Song::all()->sortByDesc('created_at')->take(5);
        $song = Song::findOrFail($id);
        return view('admin.pages.song.show', compact('song', 'songs', 'STT', 'user'));


    }

    public function create()
    {
        $categories = Category::all()->groupBy('description');
        return view('manager.songs.create', compact('categories'));
    }

    public function store(FormUploadRequest $request)
    {
        $song = new Song();
        $user = Auth::user();
        $singerIdsStr = $request->singer_ids;
        $artistIdsStr = $request->artist_ids;
        $singerIds = explode(',', $singerIdsStr);
        $artistIds = explode(',', $artistIdsStr);
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
            $songFileSize = $songFile->getClientSize();
            $song->file_name = $songFileName;
            $song->size = $songFileSize / 1000;//chuyen doi Byte -> Kilobyte
            if ($songFileExtension != 'mp3') {
                Session::flash('errorSongFile', 'Chúng tôi chỉ hỗ trợ định dạng file MP3, vui lòng chọn lại!');
                return redirect()->route('songs.create');
            }
        } else {
            Session::flash('errorSongFile', 'Bạn chưa chọn file');
            return redirect()->route('songs.create');
        }

        $songFile->storeAs('/', $songFileName, 'public');
        $song->save();

        UploadFile::dispatch($songFileName);
        SetPathFile::dispatch($songFileName, $songFileExtension, $song->id);

        $song->artists()->attach($artistIds);
        $song->singers()->attach($singerIds);
        Session::flash('success', 'Tải bài hát thành công');
        return redirect()->route('songs.create');
    }

    public function edit($id)
    {
        $categories = Category::all()->groupBy('description');
        $song = Song::findOrFail($id);
        return view('manager.songs.edit', compact('song', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $song = Song::findOrFail($id);
        $songImage = $song->image;
        if ($request->input('name')) {
            $song->name = $request->input('name');
        }

        if ($request->hasFile('image_file')) {
            $imageFile = $request->file('image_file');
            $imageFileName = $imageFile->getClientOriginalName();
            $song->image = $imageFileName;
            $imageFile->storeAs('public/upload/images', $imageFileName);
        } else {
            $song->image = $songImage;
        }

        if ($request->input('singer_ids')) {
            $singerIds = explode(',', $request->input('singer_ids'));
            $song->singers()->sync($singerIds);
        }

        if ($request->input('artist_ids')) {
            $artistIds = explode(',', $request->input('artist_ids'));
            $song->artists()->sync($artistIds);
        }

        $song->category_id = $request->input('category_id');
        if ($request->input('lyric')) {
            $song->lyric = $request->input('lyric');
        }

        $song->save();
        return redirect()->back()->with('notification', 'Cập nhật thông tin bài hát thành công');
    }

    public function songManager()
    {
        $user = Auth::user();
        $songs = Song::where('user_id', $user->id)->get();
        return view('manager.songs.list', compact('songs'));
    }

    public function destroy($id)
    {
        $song = Song::find($id);
        $song->delete();
        return redirect()->back();
    }

}
