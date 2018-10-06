<?php

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

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::middleware('auth:api')->group(function(){
    Route::post('logout', 'AuthController@logout');
    Route::get('user/playlist', 'PlaylistController@index');
    Route::post('playlist', 'PlaylistController@store');
    Route::post('playlist-entry', 'PlaylistEntryController@store');
    Route::post('playlist-entry', 'PlaylistEntryController@store');
    Route::get('getuser', 'AuthController@user');
    Route::post('/user/comments', 'CommentController@store');
    Route::get('/user/comments/{id}', 'CommentController@index');
});
  


