<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playlist;

class PlaylistEntryController extends Controller
{
    public function store (Request $request){
        $this->validate($request, [
            'videoId'=> 'required',
            'video_title'=> 'required',
            'playlistId'=> 'required'
        ]);

        $playlist = Playlist::find($request->playlistId);

        $entry = $playlist->entries()->create([
            'user_id'=> $request->user()->id,
            'playlist_id'=> $request->playlistId,
            'video_id'=> $request->videoId,
            'video_title'=> $request->video_title
        ]);

        return response()->json($entry, 200);

     

    }
}
