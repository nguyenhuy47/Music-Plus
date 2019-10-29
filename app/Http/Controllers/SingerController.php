<?php

namespace App\Http\Controllers;

use App\Http\Requests\SingerValidate;
use App\Model\Singer;
use App\Model\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SingerController extends Controller
{
    public function index()
    {
        $singers = Singer::all();
        return view('singers.index', compact('singers'));
    }

    public function create()
    {
        return view('singers.create');
    }

    public function store(SingerValidate $request)
    {
        if($request->dob >= now('Asia/Ho_Chi_Minh')) {
            return redirect()->back()->with('errorDob','Ngày sinh của ca sĩ không hợp lệ');
        }
        $singer = new Singer();
        $singer->name = $request->name;
        $singer->dob = $request->dob;
        $singer->story = $request->story;
        $singer->save();
        return redirect()->route('songs.create')->with('createdSingerSuccess','Thêm mới ca sĩ thành công');

    }

    public function show($id)
    {
        $singer = Singer::findOrFail($id);
        return view('singers.show', compact('singer'));
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
