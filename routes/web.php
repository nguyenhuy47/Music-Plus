<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/', function () {
//    return view('index');
//});
Route::get('/', 'SongController@index')->name('songs.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/redirect/{social}', 'SocialAuthController@redirect')->name('facebook.login');
Route::get('/callback/{social}', 'SocialAuthController@callback');
Route::group(['prefix' => 'songs'], function () {
    Route::get('/', 'SongController@index')->name('songs.index');
    Route::get('/create', 'SongController@create')->middleware('login')->name('songs.create');
    Route::post('/store', 'SongController@store')->name('songs.store');
    Route::get('/{id}/play', 'SongController@show')->name('songs.play');
    Route::post('/addToPlaylist', 'SongController@addToPlaylist')->name('songs.addToPlaylist');


});

Route::group(['prefix' => 'manage', 'middleware' => ['login']], function () {

    Route::group(['prefix' => 'playlist'], function () {
        Route::get('/', 'PlaylistController@index')->name('playlists.index');
        Route::get('/{playlistId}/show', 'PlaylistController@show')->name('playlists.show');
        Route::get('/{playlistId}/destroy/{songId}', 'PlaylistController@destroy')->name('playlists.destroy');
        Route::post('/', 'PlaylistController@store')->name('playlists.store');
        Route::get('/{id}/destroyAll', 'PlaylistController@destroyAll')->name('playlist.destroyAll');
    });

    Route::group(['prefix' => 'songs'], function () {
        Route::get('/', 'SongController@songManager')->name('songs.index');
        Route::get('/{id}/edit', 'SongController@edit')->name('songs.edit');
        Route::post('/{id}/edit', 'SongController@update')->name('songs.update');
        Route::get('/{id}/destroy', 'SongController@destroy')->name('songs.destroy');
    });
});

Route::post('/singers/store', function (\Illuminate\Http\Request $request) {
    $singer = new \App\Model\Singer();
    $singer->name = $request->name;
    $singer->dob = $request->dob;
    $singer->story = $request->story;
    $singer->save();
    return redirect()->back();
})->name('singers.store');

Route::post('/artists/store', function (\Illuminate\Http\Request $request) {
    $artists = new \App\Model\Artist();
    $artists->name = $request->name;
    $artists->dob = $request->dob;
    $artists->story = $request->story;
    $artists->save();
    return redirect()->back();
})->name('artists.store');
