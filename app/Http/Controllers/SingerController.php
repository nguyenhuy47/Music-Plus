<?php

namespace App\Http\Controllers;

use App\Model\Singer;
use App\Model\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SingerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $singers = Singer::all();
        return view('singers.index', compact('singers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('singers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $singer = new Singer();
        $singer->name = $request->name;
        $singer->dob = $request->dob;
        $singer->story = $request->story;
        $singer->save();
        return redirect()->route('singers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singer = Singer::findOrFail($id);
        $songs = Song::where('singer_id','=',$id)->get();
        return view('singers.show', compact('singer','songs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $singer =  Singer::findOrfail($id);
        return view('singers.edit', compact('singer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $singer = Singer::findOrFail($id);
        $singer->name = $request->name;
        $singer->dob = $request->dob;
        $singer->story = $request->story;
        $singer->save();
        return redirect()->route('singers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
