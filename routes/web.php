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

Route::get('/like/vote', 'LikeController@vote')->middleware('auth');

Route::get('/abcd', function () {
    return view('home-new');
});

Route::get('/', 'SongController@index')->name('songs.index');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');



Route::get('/redirect/{social}', 'SocialAuthController@redirect')->name('facebook.login');
Route::get('/callback/{social}', 'SocialAuthController@callback');


Route::group(['prefix' => 'songs'], function () {
    Route::get('/', 'SongController@index')->name('guest.songs.index');
    Route::get('/create', 'SongController@create')->middleware('login')->name('songs.create');
    Route::post('/store', 'SongController@store')->name('songs.store');
    Route::get('/{id}/play', 'SongController@show')->name('songs.play');
    Route::post('/addToPlaylist', 'SongController@addToPlaylist')->name('songs.addToPlaylist');
});

Route::group(['prefix' => 'playlists'], function () {
    Route::get('playlists/{id}/playAll', 'PlaylistController@playAll')->name('playlists.playAll');
    Route::get('/', 'PlaylistController@guestIndex')->name('guets.playlists.index');
    Route::get('/{playlistId}/show', 'PlaylistController@show')->name('playlists.show');
});

Route::group(['prefix' => 'singers'], function () {
    Route::get('/', 'SingerController@index')->name('singers.index');
    Route::get('/{id}/show', 'SingerController@show')->name('singers.show');
});



Route::group(['prefix' => 'manage', 'middleware' => ['login']], function () {
    Route::group(['prefix' => 'playlist'], function () {
        Route::get('/', 'PlaylistController@index')->name('playlists.index');
        Route::get('/{playlistId}/destroy/{songId}', 'PlaylistController@destroy')->name('playlists.destroy');
        Route::post('/', 'PlaylistController@store')->name('playlists.store');
        Route::get('/{id}/destroyAll', 'PlaylistController@destroyAll')->name('playlist.destroyAll');
        Route::post('/update/{id}', 'PlaylistController@update')->name('playlists.update');
        Route::post('/addSong/{id}', 'PlaylistController@addSong')->name('playlists.addSong');
    });

    Route::group(['prefix' => 'singers'], function () {
        Route::get('/create', 'SingerController@create')->name('singers.create');
        Route::post('/store', 'SingerController@store')->name('singers.store');
        Route::get('/{id}/edit', 'SingerController@edit')->name('singers.edit');
        Route::post('/{id}/update', 'SingerController@update')->name('singers.update');

    });
    Route::group(['prefix' => 'songs'], function () {
        Route::get('/', 'SongController@songManager')->name('songs.index');
        Route::get('/{id}/edit', 'SongController@edit')->name('songs.edit');
        Route::post('/{id}/edit', 'SongController@update')->name('songs.update');
        Route::get('/{id}/destroy', 'SongController@destroy')->name('songs.destroy');
    });

    Route::group(['prefix' => 'artists'], function () {
        Route::get('/', 'ArtistController@index')->name('artists.index');
        Route::get('/create', 'ArtistController@create')->name('artists.create');
        Route::post('/store', 'ArtistController@store')->name('artists.store');
        Route::get('/{id}/show', 'ArtistController@show')->name('artists.show');
        Route::get('/{id}/edit', 'ArtistController@edit')->name('artists.edit');
        Route::post('/{id}/update', 'ArtistController@update')->name('artists.update');

    });
});
