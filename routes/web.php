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


Route::get('/', function () {
    return view('index');
});
Route::get('/', 'SongController@index')->name('songs.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/redirect/{social}', 'SocialAuthController@redirect')->name('facebook.login');
Route::get('/callback/{social}', 'SocialAuthController@callback');
Route::group(['prefix' => 'songs'], function ()
{
    Route::get('/', 'SongController@index')->name('songs.index');
    Route::get('/create', 'SongController@create')->middleware('login')->name('songs.create');
    Route::post('/store', 'SongController@store')->name('songs.store');
    Route::get('/{id}/play', 'SongController@show')->name('songs.play');
    Route::post('/addToPlaylist', 'SongController@addToPlaylist')->name('songs.addToPlaylist');

});

Route::group(['prefix' => 'singers'], function ()
{
    Route::get('/', 'SingerController@index')->name('singers.index');
    Route::get('/create', 'SingerController@create')->middleware('login')->name('singers.create');
    Route::post('/store', 'SingerController@store')->middleware('login')->name('singers.store');
    Route::get('/{id}/show', 'SingerController@show')->name('singers.show');
    Route::get('/{id}/edit', 'SingerController@edit')->middleware('login')->name('singers.edit');
    Route::post('/{id}/update', 'SingerController@update')->middleware('login')->name('singers.update');

});
Route::group(['prefix' => 'manage', 'middleware' => ['login']], function ()
{
    Route::group(['prefix' => 'playlist'], function ()
    {
        Route::get('/', 'PlaylistController@index')->name('playlists.index');
        Route::get('/{playlistId}/show', 'PlaylistController@show')->name('playlists.show');
        Route::get('/{playlistId}/destroy/{songId}', 'PlaylistController@destroy')->name('playlists.destroy');
        Route::post('/', 'PlaylistController@store')->name('playlists.store');
        Route::get('/{id}/destroyAll', 'PlaylistController@destroyAll')->name('playlist.destroyAll');
    });
});



Route::post('/artists/store', function (\Illuminate\Http\Request $request)
{
    $artists = new \App\Model\Artist();
    $artists->name = $request->name;
    $artists->dob = $request->dob;
    $artists->story = $request->story;
    $artists->save();
    return redirect()->back();
})->name('artists.store');
