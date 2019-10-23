<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistValidate;
use App\Model\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{

    public function index()
    {
        $artists = Artist::all();
        return view('artists.index', compact('artists'));
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store(ArtistValidate $request)
    {
        $artist = new Artist();
        $artist->name = $request->name;
        $artist->dob = $request->dob;
        $artist->story = $request->story;
        $artist->save();
        return redirect()->back();
    }

    public function show($id)
    {
        $artist = Artist::findOrFail($id);
        return view('artists.show', compact('artist'));
    }

    public function edit($id)
    {
        $artist = Artist::findOrfail($id);
        return view('artists.edit', compact('artist'));
    }


    public function update(ArtistValidate $request, $id)
    {
        $artist = Artist::findOrFail($id);
        $artist->name = $request->name;
        $artist->dob = $request->dob;
        $artist->story = $request->story;
        $artist->save();
        return redirect()->route('artists.index');
    }


    public function destroy($id)
    {
        //
    }
}
