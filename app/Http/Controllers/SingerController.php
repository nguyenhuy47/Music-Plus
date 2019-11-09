<?php

namespace App\Http\Controllers;

use App\Http\Requests\SingerValidate;
use App\Model\Singer;
use App\Model\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SingerController extends Controller
{
    public function index()
    {
        $singers = Singer::where('id', '>', 0)->orderBy('created_at', 'Desc')->paginate(8);
        return view('manager.singers.list', compact('singers'));
    }

    public function create()
    {
        return view('manager.singers.create');
    }

    public function store(SingerValidate $request)
    {
        if ($request->dob >= now('Asia/Ho_Chi_Minh')) {
            return redirect()->back()->with('errorDob', 'Ngày sinh của ca sĩ không hợp lệ');
        }
        if ($request->hasFile('image')) {
            $singer = new Singer();
            $imageName = 'singer' . time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('images/singer', $imageName);
            $singer->image = $imageName;
            $singer->name = $request->name;
            $singer->dob = $request->dob;
            $singer->story = $request->story;
            $singer->save();
            return redirect()->route('singers.create')->with('success', 'Thêm mới ca sĩ thành công');
        } else {
            return redirect()->back()->with('errorFile', 'Bạn chưa chọn ảnh');
        }
    }

    public
    function show($id)
    {
        $singer = Singer::findOrFail($id);
        return view('manager.singers.show', compact('singer', 'songs', 'STT'));

    }

    public
    function edit($id)
    {
        $singer = Singer::findOrfail($id);
        return view('manager.singers.edit', compact('singer'));
    }


    public
    function update(SingerValidate $request, $id)
    {
        $singer = Singer::findOrFail($id);
        $singer->name = $request->name;
        $singer->dob = $request->dob;
        $singer->story = $request->story;
        $singer->save();
        return redirect()->back();
    }

    public
    function playAll($id)
    {
        $singer = Singer::find($id);
        return view('singers.playAll', compact('singer'));
    }


}
