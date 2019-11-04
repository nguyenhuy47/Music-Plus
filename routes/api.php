<?php

use App\Model\Playlist;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/songs', function (Request $request)
{
    $singers = \App\Model\Song::where('name', 'like', '%' . $request->get('q') . '%')->get();
    return response()->json($singers);
});

Route::get('/singers', function (Request $request)
{
    $singers = \App\Model\Singer::where('name', 'like', '%' . $request->get('q') . '%')->get();
    return response()->json($singers);
});

Route::post('/singers/store', function (Request $request)
{
    $singer = new \App\Model\Singer();
    $singer->name = $request->name;
    $singer->dob = $request->dob;
    $singer->story = $request->story;
    $singer->save();
    return response()->json('Tạo mới ca sỹ thành công.', 200);
})->name('ajax.singers.store');

Route::get('/artists', function (Request $request)
{
    $artists = \App\Model\Artist::where('name', 'like', '%' . $request->get('q') . '%')->get();
    return response()->json($artists);
});

Route::post('/artists/store', function (Request $request)
{
   $artist = new \App\Model\Artist();
   $artist->name = $request->name;
   $artist->dob = $request->dob;
   $artist->story = $request->story;
   $artist->save();
   return response()->json('Tạo mới nhac sỹ thành công.', 200);
})->name('ajax.artists.store');

Route::post('/songs/addToPlayList', function (Request $request)
{
    $playlistId = $request->playlistId;
    $songId = $request->songId;
    $playlist = Playlist::find($playlistId);
    $playlist->songs()->attach($songId);
    return response()->json('Thêm playList thành công', 200);
})->name('ajax.songs.addToPlaylist');
