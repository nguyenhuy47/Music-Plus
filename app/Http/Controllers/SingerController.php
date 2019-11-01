<?php

namespace App\Http\Controllers;

use App\Http\Requests\SingerValidate;
use App\Model\Comment;
use App\Model\CommentList;
use App\Model\Singer;
use App\Model\Song;


class SingerController extends Controller
{
    public function index()
    {
        $STT = 1;
        $songs = Song::all();
        $singers = Singer::all();
        return view('manager.singers.index', compact('singers','songs','STT'));
    }

    public function create()
    {
        return view('manager.singers.create');
    }

    public function store(SingerValidate $request)
    {
        $singer = new Singer();
        $singer->name = $request->name;
        $singer->dob = $request->dob;
        $singer->story = $request->story;
        $commentList = new CommentList();
        $commentList->save();
        $singer->comment_list_id = $commentList->id;
        $singer->save();
        return redirect()->back();
    }

    public function show($id)
    {
        $STT = 1;
        $songs = Song::all();
        $singer = Singer::findOrFail($id);
        $comments = Comment::where('comment_list_id', '=', $singer->comment_list_id)->get()->sortByDesc('created_at');
        return view('manager.singers.show', compact('singer','songs','STT', 'comments'));
    }

    public function edit($id)
    {
        $singer =  Singer::findOrfail($id);
        return view('manager.singers.edit', compact('singer'));
    }


    public function update(SingerValidate $request, $id)
    {
        $singer = Singer::findOrFail($id);
        $singer->name = $request->name;
        $singer->dob = $request->dob;
        $singer->story = $request->story;
        $singer->save();
        return redirect()->route('singers.index');
    }

    public function destroy($id)
    {
        //
    }
}
