<?php

namespace App\Http\Controllers;

use App\Http\Requests\SingerValidate;
use App\Model\Singer;
use App\Model\Song;


class SingerController extends Controller
{
    public function index()
    {
        $STT = 1;
        $songs = Song::all();
        $singers = Singer::all();
        return view('singers.index', compact('singers','songs','STT'));
    }

    public function create()
    {
        return view('singers.create');
    }

    public function store(SingerValidate $request)
    {
        $singer = new Singer();
        $singer->name = $request->name;
        $singer->dob = $request->dob;
        $singer->story = $request->story;
        $singer->save();
        return redirect()->back();
    }

    public function show($id)
    {
        $STT = 1;
        $songs = Song::all();
        $singer = Singer::findOrFail($id);
        return view('singers.show', compact('singer','songs','STT'));
    }

    public function edit($id)
    {
        $singer =  Singer::findOrfail($id);
        return view('singers.edit', compact('singer'));
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
