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

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('profile', 'UserController@profile')->middleware('login');
Route::post('profile', 'UserController@update_avatar');



Route::get('/redirect/{social}', 'SocialAuthController@redirect')->name('facebook.login');
Route::get('/callback/{social}', 'SocialAuthController@callback');

Route::group(['prefix' => 'guest'], function () {

    Route::group(['prefix' => 'singers'], function () {
        Route::get('/', 'SingerController@guestIndex')->name('guest.singers.index');
        Route::get('/{id}/play', 'SingerController@guestShow')->name('guest.singers.play');
    });

    Route::group(['prefix' => 'artists'], function () {
        Route::get('/', 'ArtistController@guestIndex')->name('guest.artists.index');
        Route::get('/{id}/play', 'ArtistController@guestShow')->name('guest.artists.play');
    });

    Route::group(['prefix' => 'playlists'], function () {
        Route::get('/', 'PlaylistController@guestIndex')->name('guest.playlists.index');
        Route::get('/{playlistId}/show', 'PlaylistController@guestShow')->name('guest.playlists.show');
        Route::get('playlists/{id}/playAll', 'PlaylistController@guestPlayAll')->name('guest.playlists.playAll');
    });

    Route::group(['prefix' => 'songs'], function () {
        Route::get('/', 'SongController@guestIndex')->name('guest.songs.index');
        Route::get('/{id}/play', 'SongController@guestPlay')->name('guest.songs.play');
        Route::get('/newSong', 'SongController@guestIndexNewSong')->name('guest.songs.indexNewSong');

    });




});

Route::group(['prefix' => 'songs'], function () {
    Route::get('/', 'SongController@index')->name('songs.index');

});

Route::group(['prefix' => 'manager', 'middleware' => ['login']], function () {
    Route::group(['prefix' => 'playlist'], function () {
        Route::get('/', 'PlaylistController@index')->name('playlists.index');
        Route::get('/{playlistId}/show', 'PlaylistController@show')->name('playlists.show');
        Route::get('/{playlistId}/destroy/{songId}', 'PlaylistController@destroy')->name('playlists.destroy');
        Route::post('/', 'PlaylistController@store')->name('playlists.store');
        Route::get('/{id}/destroyAll', 'PlaylistController@destroyAll')->name('playlist.destroyAll');
        Route::get('playlists/{id}/playAll', 'PlaylistController@playAll')->name('playlists.playAll');

    });

    Route::group(['prefix' => 'singers'], function () {
        Route::get('/', 'SingerController@index')->name('singers.index');
        Route::get('/create', 'SingerController@create')->middleware('login')->name('singers.create');
        Route::post('/store', 'SingerController@store')->middleware('login')->name('singers.store');
        Route::get('/{id}/show', 'SingerController@show')->name('singers.show');
        Route::get('/{id}/edit', 'SingerController@edit')->middleware('login')->name('singers.edit');
        Route::get('/{id}/play', 'SongController@show')->name('songs.play');
        Route::post('/{id}/update', 'SingerController@update')->middleware('login')->name('singers.update');

    });
    Route::group(['prefix' => 'songs'], function () {
        Route::get('/', 'SongController@songManager')->name('songs.list');
        Route::get('/create', 'SongController@create')->middleware('login')->name('songs.create');
        Route::post('/store', 'SongController@store')->name('songs.store');
        Route::get('/{id}/edit', 'SongController@edit')->name('songs.edit');
        Route::post('/{id}/edit', 'SongController@update')->name('songs.update');
        Route::get('/{id}/destroy', 'SongController@destroy')->name('songs.destroy');
        Route::post('/addToPlaylist', 'SongController@addToPlaylist')->name('songs.addToPlaylist');

    });

    Route::group(['prefix' => 'artists'], function () {
        Route::get('/', 'ArtistController@index')->name('artists.index');
        Route::get('/create', 'ArtistController@create')->middleware('login')->name('artists.create');
        Route::post('/store', 'ArtistController@store')->middleware('login')->name('artists.store');
        Route::get('/{id}/show', 'ArtistController@show')->name('artists.show');
        Route::get('/{id}/edit', 'ArtistController@edit')->middleware('login')->name('artists.edit');
        Route::post('/{id}/update', 'ArtistController@update')->middleware('login')->name('artists.update');

    });
});

Route::group(['prefix' => 'comment', 'middleware' => ['login']], function () {
    Route::post('/store/{commentListId}', 'CommentController@store')->name('comments.store');
    Route::get('/{id}/destroy', 'CommentController@destroy')->name('comments.destroy');
    Route::post('/{id}/update', 'CommentController@update')->name('comments.update');
});
